<?php
   require 'studets_resuse_files/header.php';
   // $fees_details = student_fees_details($student_login['Admission_NO'])[0];

   ?>

<!-- main section -->
<div class="app-main__outer">
<div class="app-main__inner">
   <div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="metismenu-icon pe-7s-rocket icon-gradient bg-mean-fruit"></i>
            </div>
            <div>
               Hi <strong><?= $full_name_student ?></strong>
               <div class="page-title-subheading">This is your personal dashboard. No one can access your dashboard without login with legal credantials.</div>
            </div>
         </div>
        
      </div>
   </div>
   <div class="tabs-animation">
     <div class="main-card mb-3 card" >
                            <div class="card-body">
                                <table style="width: 100%;" class="table">
                                  <tbody id="dump_courses_here">
                      <tr>
                      <td>
                      <table style="width: 100%;" class="table text-center  table-bordered">
                    <?php
                      $fees_res=mysqli_query($con,"select * from student_fees_details where Admission_No=".$student_login['Admission_NO']."");

                      if (mysqli_num_rows($fees_res)>0) {
                        ?>
                      <thead>
                          <tr>
                            <th>Installment No</th>
                            <th>Total Amount Pay</th>
                            <th>Amount Paid</th>
                            <th>Balance Amount to pay</th>
                            <th>Payment Mode</th>
                            <th>Payment Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($fees_res as $key => $fees_row) {
                        
                      ?>
                          <tr>
                            <td><?= $key+=1 ?></td>
                            <td><?= 'Rs '.number_format($fees_row['Total_fees']) ?></td>
                            <td><?= 'Rs '.number_format($fees_row['Paid_Fees']) ?></td>
                            <td><?= 'Rs '.number_format($fees_row['Balance_Fees']) ?></td>
                            <td><img src="<?= FRONT_SITE_PATH.'/' ?>global_images/<?= $fees_row['payment_mode'].'.png' ?>" width="50px"></td>
                            <td><?= $fees_row['Payment_Status']?></td>
                          </tr>
                                    <?php
                                   }
                                  }
                                  ?>
                          </tbody>
                        </table>

                </td>
                </tr>
                </tbody>
                </table>
                </div>
               </div>                    
              </div> 
      <div class="row">
        <?php
                $dayOfWeek = date('l'); 
                if($dayOfWeek == '' || $dayOfWeek == '') { 
                    $display_none ='style="display:none"';    
                }else{
                    $display_none = '';
                }   
            ?>
         <div class="col-12 col-sm-12 col-lg-6" <?= $display_none ?> >
            
            <div class="main-card mb-3 card" >
               <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                          <h5 class="card-title">Today Section to attempt</h5>
                      </div>
                      <div class="col-sm-6">
                         <h5 class="card-title text-right" style="font-size: 18px;position: relative;top: -10px"><?= date('M d, Y') ?></h5>
                         <?php
                         $dayOfWeek = date('l'); 
                         if($dayOfWeek == 'Saturday' || $dayOfWeek == 'Sunday') { 
                            }
                            ?>
                      </div>
                  </div>
                  <div class="scroll-area">
                     <div class="scrollbar-container ps ps--active-y">
                        <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column" id="today_time_table">
                        </div>
                     </div>
                  </div>
               </div>

               <div class="card-footer">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm-6 col-md-6 mb-2">
                                 <div class="row">
                                     <div class="col-1">
                                         <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                     </div>
                                     <div class="col-7">
                                        <span class="indicators_icon_title">Yet to Start</span>
                                     </div>
                                 </div>
                            </div>
                            <div class="col-sm-6 col-md-6 mb-2">
                                <div class="row">
                                     <div class="col-1">
                                         <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                                     </div>
                                     <div class="col-7">
                                        <span class="indicators_icon_title">Live</span>
                                     </div>
                                 </div>
                            </div>
                            <div class="col-sm-6 col-md-6 mb-2">
                                <div class="row">
                                     <div class="col-1">
                                        <i class="metismenu-icon pe-7s-check text-success" style="font-size: 18px;background: #fff;"></i>
                                     </div>
                                     <div class="col-7">
                                        <span class="indicators_icon_title">Attempt</span>
                                     </div>
                                 </div>
                            </div>
                            <div class="col-sm-6 col-md-6 mb-2">
                                <div class="row">
                                     <div class="col-1">
                                        <i class="metismenu-icon pe-7s-close-circle text-danger" style="font-size: 18px;background: #fff;"></i>
                                     </div>
                                    <div class="col-7">
                                        <span class="indicators_icon_title">N Attempt</span>
                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
         </div>

         <div class="col-12 col-sm-12 col-lg-6" >
             <div class="main-card mb-3 card">

              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                          <h5 class="card-title">Today Quiz</h5>
                      </div>
                      <div class="col-sm-6">
                         <?php
                         $dayOfWeek = date('l'); 
                         if($dayOfWeek == 'Saturday' || $dayOfWeek == 'Sunday') { 
                            }
                            ?>
                      </div>
                  </div>
                     <div class="scrollbar-container ps ps--active-y">
                        <ul class="todo-list-wrapper list-group list-group-flush">
                              <?php
                                $total_quiz_today = array_filter(SubjectQuzForToday(date('Y-m-d'),$student_login['BRANCH']));
                                if (count($total_quiz_today) > 0) {
                                  
                                foreach ($total_quiz_today as $key => $value) {
                                  $quiz_sql = "SELECT * FROM `quiz_student_answer` WHERE quiz_student_Admit_No = " . $student_login['Admission_NO'] . "  && quiz_date = '".$value['quiz_date']."' && subject_name = '".$value['subject_name']."'";
                                  $quiz_answer = mysqli_query($con, $quiz_sql);
                                  $marks_get = marks_get($student_login['Admission_NO'], $value['subject_name'], $value['quiz_date']);

                                  if (mysqli_num_rows($quiz_answer) > 0)
                                  {
                                      $score = '<div class=" mt-2 float-right btn-'.$marks_get['message_color'].' p-2 text-white">'.$marks_get['value'] . ' / ' . totalmarksQuestion(Subject_id($value['subject_name']) , $value['quiz_date'],$value['quiz_topic']).'</div>';
                                  }else{
                                    $score = '';
                                  }  
                        $numberofquestonpersubjectQuiz =  numberofquestonpersubjectQuiz($value['subject_name'],date('Y-m-d'),$value['quiz_topic']);
                                  ?>
                                  <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                            </div>
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="42" class="rounded" src="<?= FRONT_SITE_IMAGE_TEACHER.'/'.$value['faculty_image'] ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?= $value['subject_name'].' - '.$numberofquestonpersubjectQuiz['numberofquestonpersubjectQuiz'].' Questions' ?></div>
                                                <div class=""><?= $value['quiz_topic'] ?><?= $score ?></div>
                                                  

                                            </div>
                                            <div class="widget-content-right">
                                                <a href="<?= FRONT_SITE_PATH_STUDENT.'quiz_today'.PHP_EXT.'?quiz_id='.urlencode($value['subject_name']).'&date='.$value['quiz_date'].'&topic='.urlencode($value['quiz_topic']).'&startTime='.$value['quiz_start_time'].'&question_id='.$value['qid']?>">
                                                  <button class="border-0 btn-transition btn btn-outline-primary ">
                                                      View
                                                  </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                  <?php
                                }
                               }else{
                                ?>
                                  <h5 class="card-title text-center">No Quiz Found</h5>
                                <?php
                               } 
                              ?>
                              
                          </ul>
                        </div>
                     </div>
                  </div>

         </div>  
      </div>
      

      <script type="text/javascript">
          $(document).ready( () =>{
            timetable = 'timetable';

             setInterval( () => {
                $.ajax({
                    url: 'ajax_request.php',
                    method:'post',
                    data: {timetable:timetable},
                    success: function(data) {
                        $('#today_time_table').html(data);
                    }
                });
            },1000)
          });
      </script>
<!-- https://meet.google.com/mhz-qxtk-tdb      -->
    <?php
   require 'studets_resuse_files/footer.php';
   ?>
