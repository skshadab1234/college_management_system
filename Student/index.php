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
         <div class="col-sm-12 col-lg-6">
            <?php
                $dayOfWeek = date('l'); 
                if($dayOfWeek == 'Saturday' || $dayOfWeek == 'Sunday') { 
                    $display_none ='style="display:none"';    
                }else{
                    $display_none = '';
                }
            ?>
            <div class="main-card mb-3 card" <?= $display_none ?>>
               <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                          <h5 class="card-title">Today Section to attempt</h5>
                      </div>
                      <div class="col-sm-6">
                         <h5 class="text-right"><?= date('M d,Y') ?></h5>
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
                           <div class="vertical-timeline-item vertical-timeline-element">
                              <div>
                                 <!-- <span class="vertical-timeline-element-icon bounce-in">
                                 <i class="badge badge-dot badge-dot-xl badge-danger live_style"> </i>
                                 </span> -->
                                 <div class="vertical-timeline-element-content bounce-in">
                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                    <p>Lorem ipsum dolor sic amet, today at 
                                       <a href="javascript:void(0);">12:00 PM</a>
                                    </p>
                                    
                                    <span class="vertical-timeline-element-date">10:30 PM</span>
                                 </div>
                              </div>
                           </div>
                           <hr>
                           <div class="vertical-timeline-item vertical-timeline-element">
                              <div style="position: relative;left: 0">
<!--<span class="vertical-timeline-element-icon bounce-in">
<i class="metismenu-icon pe-7s-check text-success" style="font-size: 18px;background: #fff;"></i>
</span>    -->     <div class="vertical-timeline-element-content bounce-in">
                                    <p>Another meeting today</p>
                                    <p>Yet another one</p>
                                    <span class="vertical-timeline-element-date">12:25 PM</span>
                                 </div>
                              </div>
                           </div>
                           <hr>
                           <div class="vertical-timeline-item vertical-timeline-element">
                              <div>
                                <!--  <span class="vertical-timeline-element-icon bounce-in">
                                 <i class="metismenu-icon pe-7s-close-circle text-danger" style="font-size: 18px;background: #fff;"></i>
                                 </span>
                                 --> <div class="vertical-timeline-element-content bounce-in">
                                    <p>Another meeting today</p>
                                    <p>Yet another one</p>
                                    <span class="vertical-timeline-element-date">12:25 PM</span>
                                 </div>
                              </div>
                           </div>
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
      </div>
      <div class="app-wrapper-footer">
         <div class="app-footer">
            <div class="app-footer__inner">
               <div class="app-footer-right">
                  <ul class="header-megamenu nav">
                     <li class="nav-item">
                        <a data-placement="top" rel="popover-focus" data-offset="300" data-toggle="popover-custom" class="nav-link">
                        Footer Menu
                        <i class="fa fa-angle-up ml-2 opacity-8"></i>
                        </a>
                        <div class="rm-max-width rm-pointers">
                           <div class="d-none popover-custom-content">
                              <div class="dropdown-mega-menu dropdown-mega-menu-sm">
                                 <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                       <div class="col-sm-6 col-xl-6">
                                          <ul class="nav flex-column">
                                             <li class="nav-item-header nav-item">Overview</li>
                                             <li class="nav-item">
                                                <a class="nav-link">
                                                <i class="nav-link-icon lnr-inbox"></i>
                                                <span>Contacts</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link">
                                                   <i class="nav-link-icon lnr-book"></i>
                                                   <span>Incidents</span>
                                                   <div class="ml-auto badge badge-pill badge-danger">5</div>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a class="nav-link">
                                                <i class="nav-link-icon lnr-picture"></i>
                                                <span>Companies</span>
                                                </a>
                                             </li>
                                             <li class="nav-item">
                                                <a disabled="" class="nav-link disabled">
                                                <i class="nav-link-icon lnr-file-empty"></i>
                                                <span>Dashboards</span>
                                                </a>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-sm-6 col-xl-6">
                                          <ul class="nav flex-column">
                                             <li class="nav-item-header nav-item">Sales &amp; Marketing</li>
                                             <li class="nav-item"><a class="nav-link">Queues</a></li>
                                             <li class="nav-item"><a class="nav-link">Resource Groups</a></li>
                                             <li class="nav-item">
                                                <a class="nav-link">
                                                   Goal Metrics
                                                   <div class="ml-auto badge badge-warning">3</div>
                                                </a>
                                             </li>
                                             <li class="nav-item"><a class="nav-link">Campaigns</a></li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   require 'studets_resuse_files/footer.php';
   ?>

