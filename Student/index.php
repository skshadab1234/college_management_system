<?php
   require 'studets_resuse_files/header.php';
   $fees_details = student_fees_details($student_login['Admission_NO'])[0];

    
   ?>
<style type="text/css">
   .live_style{
   transition: .2s ease-in-out;
   -webkit-animation: live 1.4s infinite ease-in-out;
   animation: live 1.4s infinite ease-in-out;
   -webkit-animation-fill-mode: both;
   animation-fill-mode: both;
   position: absolute;
   }
   

@-webkit-keyframes live {
  0%, 80%, 100% { -webkit-transform: scale(0.8) }
  40% { -webkit-transform: scale(1.0) }
}
@keyframes live {
  0%, 80%, 100% { 
    transform: scale(0.8);
    -webkit-transform: scale(0.8);
  } 40% { 
    transform: scale(1.0);
    -webkit-transform: scale(1.0);
  }
}

.indicators_icon_title{
    position: absolute;
    top: -2px;
    font-size: 14px;
    font-weight: 700;
}
</style>
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
         <div class="page-title-actions">
            <select class="select2 form-control">
               <option value="" > Choose Academic Year</option>
               <option value="2020 - 2021">2020 - 2021</option>
               <option value="2021 - 2022">2021 - 2022</option>
            </select>
         </div>
      </div>
   </div>
   <div class="tabs-animation">
      <div class="row">
         <div class="col-md-6 col-xl-4">
            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
               <div class="widget-chat-wrapper-outer">
                  <div class="widget-chart-content">
                     <h6 class="widget-subheading">Total Fees</h6>
                     <div class="widget-chart-flex">
                        <div class="widget-numbers mb-0 w-100">
                           <div class="widget-chart-flex">
                              <div class="fsize-4">
                                 <small class="opacity-5"><i class="fas fa-rupee-sign"></i></small>
                                 <?= number_format($fees_details['Total_fees']) ?>
                              </div>
                              <div class="ml-auto">
                                 <div class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                    <span class="text-success pl-2"><?= $fees_details['total_fees_percentage'] ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-4">
            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
               <div class="widget-chat-wrapper-outer">
                  <div class="widget-chart-content">
                     <h6 class="widget-subheading">Paid Amount</h6>
                     <div class="widget-chart-flex">
                        <div class="widget-numbers mb-0 w-100">
                           <div class="widget-chart-flex">
                              <div class="fsize-4">
                                 <small class="opacity-5"><i class="fas fa-rupee-sign"></i></small>
                                 <?= number_format($fees_details['Paid_Fees']) ?>
                              </div>
                              <div class="ml-auto">
                                 <div class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                    <span class="text-<?= $fees_details['paid_percentage_color_impression'] ?> pl-2"><?= $fees_details['paid_fees_percentage'] ?>%</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-4">
            <div class="card-shadow-primary mb-3 widget-chart widget-chart2 text-left card">
               <div class="widget-chat-wrapper-outer">
                  <div class="widget-chart-content">
                     <h6 class="widget-subheading">Balance Amount</h6>
                     <div class="widget-chart-flex">
                        <div class="widget-numbers mb-0 w-100">
                           <div class="widget-chart-flex">
                              <div class="fsize-4">
                                 <small class="opacity-5"><i class="fas fa-rupee-sign"></i></small>
                                 <?= number_format($fees_details['Balance_Fees']) ?>
                              </div>
                              <div class="ml-auto">
                                 <div class="widget-title ml-auto font-size-lg font-weight-normal text-muted">
                                    <span class="text-<?= $fees_details['remain_percentage_color_impression'] ?> pl-2"><?= $fees_details['remain_fees_percentage'] ?>%</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
        <?php
                $dayOfWeek = date('l'); 
                if($dayOfWeek == 'Saturday' || $dayOfWeek == 'Sunday') { 
                    $display_none ='style="display:none"';    
                }else{
                    $display_none = '';
                }
            ?>
         <div class="col-12 col-sm-12 col-lg-6" <?= $display_none ?>>
            
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
                        <div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                           
                           <?php
                           $student_timetable = array_filter(get_timetable_for_specific_department($student_login['BRANCH'],$student_login['semester'],date("l")));

                            foreach ($student_timetable as $key => $value) {
                                $current_time = date('h:i a');
                                $startTime = $value['Lecture_Start_at'];
                                $EndTime = $value['Lecture_end_at'];
                                $date1 = DateTime::createFromFormat('h:i a', $current_time);
                                $date2 = DateTime::createFromFormat('h:i a', $startTime);
                                $date3 = DateTime::createFromFormat('h:i a', $EndTime);
                                if ($date1 > $date2 && $date1 < $date3)
                                {
                                   $check_the_session_icon = '<span class="vertical-timeline-element-icon bounce-in">
                                         <i class="badge badge-dot badge-dot-xl badge-danger live_style "> </i>
                                         </span>';
                                    $rand = rand(111111,999999);
                                   $subhead_message = '<p>Join now <a href="javascript:void(0)" id="redirecttolecture"" >Link goes here</a>
                                   <input type="hidden" id="randomNumbers" value='.$rand.'> <br><input type="hidden" id="fid" value='.$value['Teacher_id'].'><input type="hidden" id="lecture_time" value='.$value['Lecture_Start_at'].'> <input type="hidden" id="lecture_end_time" value='.$value['Lecture_end_at'].'>
                                   <textarea id="lecturename" style="display:none">'.$value['Lecture_Name'].'</textarea>';
                                }else{


                                    if ($date1 < $date2) {
                                        $check_the_session_icon = '<span class="vertical-timeline-element-icon bounce-in">
                                         <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                         </span>';   
                                         $subhead_message = '';
                                    }else{
                                    // here we have to check wheher the student has attend lecture or not

                                        $check_the_session_icon = '<span class="vertical-timeline-element-icon bounce-in">
                                                <i class="metismenu-icon pe-7s-close-circle text-danger" style="font-size: 18px;background: #fff;"></i>
                                            </span>';
                                        $subhead_message = '<p class="text-danger">You are absent today for this lecture</p>';
                                    }
                                    
                                    
                                }

                            ?>
                            
                           <div class="vertical-timeline-item vertical-timeline-element">
                              <div>
                                 <?= $check_the_session_icon ?>
                                 <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title"><?= $value['Lecture_Name'] ?></h4>
                                    <?= $subhead_message ?>
                                    </p>
                                    <span class="vertical-timeline-element-date"><?= ucwords($value['Lecture_Start_at']) ?></span>
                                 </div>
                              </div>
                           </div>
                           <?php
                           }
                           ?>
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

         <div class="col-12 col-sm-12 col-lg-6">
             sasas
         </div>  
      </div>
      
      <script type="text/javascript">
          $(document).ready( () =>{
            $("#redirecttolecture").click(() => { 
                var randomNumbers = $("#randomNumbers").val();
                var subject_name  = $("#lecturename").val();
                var fid = $("#fid").val();
                var lecture_time = $("#lecture_time").val();
                var lecture_end_time = $("#lecture_end_time").val();

                $.ajax({
                    url: 'attendance_check.php',
                    method:'post',
                    data: {randomNumbers:randomNumbers, subject_name:subject_name, fid:fid, lecture_time:lecture_time, lecture_end_time:lecture_end_time},
                    success: function(data) {
                        console.log(data);
                    }
                });

            });
          });
      </script>
<!-- https://meet.google.com/mhz-qxtk-tdb      -->
    <?php
   require 'studets_resuse_files/footer.php';
   ?>

