<?php
   require 'studets_resuse_files/header.php';
   $fees_details = student_fees_details($student_login['Admission_NO'])[0];

    
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
                                  $numberofquestonpersubjectQuiz =  numberofquestonpersubjectQuiz($value['subject_name'],date('Y-m-d'));
                                  ?>
                                  <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                            </div>
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="42" class="rounded" src="<?= $value['faculty_image'] ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?= $value['subject_name'].' - '.$numberofquestonpersubjectQuiz['numberofquestonpersubjectQuiz'].' Questions' ?></div>
                                                <div class="widget-subheading"><?= $value['quiz_topic'] ?></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <a href="<?= FRONT_SITE_PATH_STUDENT.'quiz_today'.PHP_EXT.'?quiz_id='.urlencode($value['subject_name']).'&date='.$value['quiz_date'].'&topic='.urlencode($value['quiz_topic']).'&startTime='.$value['quiz_start_time'] ?>">
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
