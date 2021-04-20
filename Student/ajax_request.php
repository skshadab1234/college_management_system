 
 <?php
 $html = '';
  require 'session.php';                           
 if (isset($_POST['timetable'])) {
  
   $student_timetable = array_filter(get_timetable_for_specific_department($student_login['BRANCH'],$student_login['semester'],date("l")));

  foreach ($student_timetable as $key => $value) {
      $current_time = date('h:i a');
      $startTime = $value['Lecture_Start_at'];
      $EndTime = $value['Lecture_end_at'];
      
      $final_time = date('h:i',strtotime($startTime)).' - '.date('h:i',strtotime($EndTime));
      $date1 = DateTime::createFromFormat('h:i a', $current_time);
      $date2 = DateTime::createFromFormat('h:i a', $startTime);
      $date3 = DateTime::createFromFormat('h:i a', $EndTime);
      
     
      
      // prx($student_login);
      if ($date1 > $date2 && $date1 < $date3)
      {
        $noentry_endtime = strtotime("+15 minutes",strtotime($startTime));
        $noentry_endtime = date('h:i a', $noentry_endtime);
        
        if ($current_time > $noentry_endtime) {
          if ($date1 > $date2) {
            $resultant  = mysqli_query($con, "Select * from student_attendance where Students_Admit_No = ".$student_login['Admission_NO']."  &&  Status = '1'");

            $row = mysqli_fetch_assoc($resultant);
            
            if ($row['Students_Admit_No'] == $student_login['Admission_NO'] && $row['Lecture_Time'] == $final_time && $row['Lecture_Date'] == date('Y-m-d')) {
               $subhead_message = '<p class="text-success">You are present today for this lecture</p>'; 
            }else{
                $subhead_message = '<p class="text-danger">You are Late to Join</p>';
            }

          }
        }
        else{

          $numberofStudentJoined = numberofStudentJoined($value['Lecture_Name'], date('Y-m-d'),$final_time);
          // prx($numberofStudentJoined);

          if ($numberofStudentJoined['numberofStudentJoined'] > 1) {
            $displayJoinedUsers = $numberofStudentJoined['numberofStudentJoined'].' Student\'s Joined';
          }else{
            $displayJoinedUsers = $numberofStudentJoined['numberofStudentJoined'].' Student Join';
          }

         
           $rand = rand(111111,999999);
            $subhead_message ='<p>'.$displayJoinedUsers.' - '.'<a href="javascript:void(0)" id="redirecttolecture"" >Click to Join</a>
           <input type="hidden" id="randomNumbers" value='.$rand.'> <br><input type="hidden" id="fid" value='.$value['Teacher_id'].'><input type="hidden" id="lecture_time" value='.$value['Lecture_Start_at'].'> <input type="hidden" id="lecture_end_time" value='.$value['Lecture_end_at'].'>
           <textarea id="lecturename" style="display:none">'.$value['Lecture_Name'].'</textarea> <textarea id="subject_name" style="display:none">'.$value['subject_name'].'</textarea><input type="hidden" id="lecture_link" value= '.$value['lecture_join_link'].'>';
        }


         $check_the_session_icon = '<span class="vertical-timeline-element-icon ">
               <i class="badge badge-dot badge-dot-xl badge-danger live_style "> </i>
               </span>';

           

      }else{


          if ($date1 > $date2) {
            
              // here we have to check wheher the student has attend lecture or not

            $resultant  = mysqli_query($con, "Select * from student_attendance where Students_Admit_No = ".$student_login['Admission_NO']."  && Lecture_Name = '".$value['Lecture_Name']."' &&  Lecture_Time = '".$final_time."' &&  Status = '1'");

          $row = mysqli_fetch_assoc($resultant);
          
           
          if ($row['Students_Admit_No'] == $student_login['Admission_NO']  && $row['Lecture_Time'] == $final_time && $row['Lecture_Date'] == date('Y-m-d')) {
            $check_the_session_icon = '<span class="vertical-timeline-element-icon ">
                      <i class="metismenu-icon pe-7s-check text-success" style="font-size: 18px;background: #fff;"></i>
                  </span>';
           $subhead_message = '<p class="text-success">You are present today for this lecture</p>'; 
          }else{
            $check_the_session_icon = '<span class="vertical-timeline-element-icon ">
                      <i class="metismenu-icon pe-7s-close-circle text-danger" style="font-size: 18px;background: #fff;"></i>
                  </span>';
              $subhead_message = '<p class="text-danger">You are absent today for this lecture</p>';
          }
          
              

          }else{
          
              $check_the_session_icon = '<span class="vertical-timeline-element-icon ">
               <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
               </span>';   
               $subhead_message = '';
              
          }
          
          
      }

  
$html .= '<div class="vertical-timeline-item vertical-timeline-element">
    <div>
       '.$check_the_session_icon.'
       <div class="vertical-timeline-element-content ">
          <h4 class="timeline-title">'.$value['subject_name'].'</h4>
          '.$subhead_message.'
          </p>
          <span class="vertical-timeline-element-date">'.date('h:i a',strtotime($value['Lecture_Start_at'])).'</span>
       </div>
    </div>
 </div>';
 
 }

echo $html; 
 }
 ?>
<script type="text/javascript">
   $("#redirecttolecture").click(() => { 
                
                var randomNumbers = $("#randomNumbers").val();
                var lecturename  = $("#lecturename").val();
                var subject_name  = $("#subject_name").val();
                var fid = $("#fid").val();
                var lecture_time = $("#lecture_time").val();
                var lecture_end_time = $("#lecture_end_time").val();
                var lecture_join_link = $("#lecture_link").val();

                var r = confirm("Join "+subject_name+" Lecture Now");
                if (r == true) {
                    $.ajax({
                      url: 'attendance_check.php',
                      method:'post',
                      data: {randomNumbers:randomNumbers, lecturename:lecturename, fid:fid, lecture_time:lecture_time, lecture_end_time:lecture_end_time},
                      success: function(data) {
                          var result = $.parseJSON(data);
                          if (result.status == "success_inserted") {
                              swal({
                                title: 'You are Present in this Lecture',
                                icon: "success",
                              }).then(function() {
                                window.open(lecture_join_link, '_blank');
                        });

                          }
                          if (result.status == "already_exist") {
                              swal({
                                title: 'You are Present in this Lecture',
                                icon: "success",
                                text: "You have already joined the lecture, Click ok to Continue",
                              }).then(function() {
                                window.open(lecture_join_link, '_blank');
                        });
                          }

                      }
                  });

                } else {
                  swal({
                    title: 'Join to get attendance',
                    icon: "error",
                    button: "Ok",
                  });
                }

                
            });
</script>