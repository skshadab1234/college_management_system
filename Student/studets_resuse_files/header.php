<?php
require 'session.php';
if (!isset($_SESSION['STD_ID'])) {
  header("location:login");
}
$full_name_student = $student_login['firstname'].' '.$student_login['last_name'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">

    <!-- Disable tap highlight on IE -->	
    <meta name="msapplication-tap-highlight" content="no">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
<link href="<?php echo FRONT_SITE_PATH ?>assets/css/main.d810cf0ae7f39f28f336.css" rel="stylesheet"></head>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <div class="app-header header-shadow "> <!-- bg-premium-dark header-text-light -->
             <div class="app-header__logo">
                <div class="logo-src" style="background:url(<?php echo FRONT_GLOBAL_IMAGE."logo.jpg"; ?>);background-size: cover;width: 43px;height: 50px"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>  
              <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>

                </div>
                <div class="app-header-right">
                    <div class="header-dots">
                    <div class="widget-content">
                        <div class="widget-content-left  ml-3 header-user-info" style="color: #313131"> <!-- rgba(255,255,255,0.8) -->
                            <div class="widget-heading" > <?= date('M d,Y') ?></div>
                            <div class="widget-subheading" id="currentTime" ></div>
                        </div>      
                    </div>
                                        

                        <button type="button" class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-info"></span>
                                    <i class="icon text-primary  ion-contrast"></i>
                                </span>
                            </button>
                        <div class="dropdown">
                            <button type="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-danger"></span>
                                    <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
                                    <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header mb-0">
                                    <div class="dropdown-menu-header-inner bg-deep-blue">
                                        <div class="menu-header-image opacity-1" style="background-image: url(<?= FRONT_GLOBAL_IMAGE.'city3.jpg' ?>);"></div>
                                        <div class="menu-header-content text-dark">
                                            <h5 class="menu-header-title">Notifications</h5>
                                            <h6 class="menu-header-subtitle">You have <b>21</b> unread messages</h6>
                                        </div>
                                    </div>
                                </div>
                                <ul class="tabs-animated-shadow tabs-animated nav nav-justified tabs-shadow-bordered p-3">
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link active" data-toggle="tab" href="#tab-messages-header">
                                            <span>Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-events-header">
                                            <span>Events</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a role="tab" class="nav-link" data-toggle="tab" href="#tab-errors-header">
                                            <span>System Errors</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div class="notifications-box">
                                                        <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column">
                                                            <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands Meeting</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the production release
                                                                            <span class="badge badge-danger ml-2">NEW</span>
                                                                        </h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-primary vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Something not important
                                                                            <div class="avatar-wrapper mt-2 avatar-wrapper-overlap">
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="<?= $student_login['picture_link'] ?>" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/2.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/3.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/4.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/5.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/9.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/7.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm">
                                                                                    <div class="avatar-icon">
                                                                                        <img src="assets/images/avatars/8.jpg" alt="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="avatar-icon-wrapper avatar-icon-sm avatar-icon-add">
                                                                                    <div class="avatar-icon"><i>+</i></div>
                                                                                </div>
                                                                            </div>
                                                                        </h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-info vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">This dot has an info state</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-danger vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">All Hands Meeting</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-warning vertical-timeline-element">
                                                                <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <p>Yet another one, at <span class="text-success">15:00 PM</span>
                                                                        </p><span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-success vertical-timeline-element">
                                                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">Build the production release
                                                                            <span class="badge badge-danger ml-2">NEW</span>
                                                                        </h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="vertical-timeline-item dot-dark vertical-timeline-element">
                                                                <div><span class="vertical-timeline-element-icon bounce-in"></span>
                                                                    <div class="vertical-timeline-element-content bounce-in">
                                                                        <h4 class="timeline-title">This dot has a dark state</h4>
                                                                        <span class="vertical-timeline-element-date"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-events-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div class="vertical-without-time vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at 
                                                                        <a href="javascript:void(0);">12:00 PM</a>
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the production release</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                                                        labore et dolore magna elit enim at minim veniam quis nostrud
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title text-success">Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-success"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">All Hands Meeting</h4>
                                                                    <p>Lorem ipsum dolor sic amet, today at 
                                                                        <a href="javascript:void(0);">12:00 PM</a>
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-warning"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <p>Another meeting today, at <b class="text-danger">12:00 PM</b></p>
                                                                    <p>Yet another one, at <span class="text-success">15:00 PM</span></p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-danger"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title">Build the production release</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur eiusmdd tempor incididunt ut
                                                                        labore et dolore magna elit enim at minim veniam quis nostrud
                                                                    </p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vertical-timeline-item vertical-timeline-element">
                                                            <div>
                                                                <span class="vertical-timeline-element-icon bounce-in">
                                                                    <i class="badge badge-dot badge-dot-xl badge-primary"> </i>
                                                                </span>
                                                                <div class="vertical-timeline-element-content bounce-in">
                                                                    <h4 class="timeline-title text-success">Something not important</h4>
                                                                    <p>Lorem ipsum dolor sit amit,consectetur elit enim at minim veniam quis nostrud</p>
                                                                    <span class="vertical-timeline-element-date"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-errors-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="no-results pt-3 pb-0">
                                                    <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                        <span class="swal2-success-line-tip"></span>
                                                        <span class="swal2-success-line-long"></span>
                                                        <div class="swal2-success-ring"></div>
                                                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                    </div>
                                                    <div class="results-subtitle">All caught up!</div>
                                                    <div class="results-title">There are no system errors!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav flex-column">
                                    <li class="nav-item-divider nav-item"></li>
                                    <li class="nav-item-btn text-center nav-item">
                                        <button class="btn-shadow btn-wide btn-pill btn btn-focus btn-sm">View Latest Changes</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="dropdown">
                            <button type="button" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="p-0 btn btn-link dd-chart-btn">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-success"></span>
                                    <i class="icon text-success ion-ios-analytics"></i>
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header">
                                    <div class="dropdown-menu-header-inner bg-premium-dark">
                                        <div class="menu-header-image" style="background-image: url('assets/images/dropdown-header/abstract4.jpg');"></div>
                                        <div class="menu-header-content text-white">
                                            <h5 class="menu-header-title">Student's Online</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-chart">
                                    <div class="widget-chart-content">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-focus"></div>
                                            <i class="lnr-users text-white"></i>
                                        </div>
                                        <div class="widget-numbers">
                                            <span>344k</span>
                                        </div>
                                    </div>
                                    <div class="widget-chart-wrapper">
                                        <div id="dashboard-sparkline-carousel-3-pop"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="<?= $student_login['picture_link'] ?>" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                            <div class="dropdown-menu-header">
                                                <div class="dropdown-menu-header-inner bg-info">
                                                    <div class="menu-header-image opacity-2" style="background-image: url(<?= FRONT_GLOBAL_IMAGE.'city3.jpg' ?>);"></div>
                                                    <div class="menu-header-content text-left">
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <img width="42" class="rounded-circle" src="<?= $student_login['picture_link'] ?>" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading"><?= $full_name_student ?></div>
                                                                </div>
                                                                <div class="widget-content-right mr-2">
                                                                    <a href="<?= FRONT_SITE_PATH ?>logout.php"><button class="btn-pill btn-shadow btn-shine btn btn-focus">Logout</button></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="scroll-area-xs" style="height: 150px;">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">Activity</li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Chat
                                                                <div class="ml-auto badge badge-pill badge-info">8</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Recover Password</a>
                                                        </li>
                                                        <li class="nav-item-header nav-item">My Account
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Settings
                                                                <div class="ml-auto badge badge-success">New</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Messages
                                                                <div class="ml-auto badge badge-warning">512</div>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="javascript:void(0);" class="nav-link">Logs</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider mb-0 nav-item"></li>
                                            </ul>
                                            <div class="grid-menu grid-menu-2col">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-6">
                                                        <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-warning">
                                                            <i class="pe-7s-chat icon-gradient bg-amy-crisp btn-icon-wrapper mb-2"></i> Message Inbox
                                                        </button>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <button class="btn-icon-vertical btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                            <i class="pe-7s-ticket icon-gradient bg-love-kiss btn-icon-wrapper mb-2"></i>
                                                            <b>Support Tickets</b>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="nav flex-column">
                                                <li class="nav-item-divider nav-item">
                                                </li>
                                                <li class="nav-item-btn text-center nav-item">
                                                    <button class="btn-wide btn btn-primary btn-sm"> Open Messages </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading"> <?= $full_name_student ?></div>
                                    <div class="widget-subheading"> <?= $student_login['BRANCH']?></div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                        <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
          <div class="app-main">
            <div class="app-sidebar sidebar-shadow "> <!-- bg-slick-carbon sidebar-text-light -->
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>   
                 <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Menu</li>
                            <li  class="mt-3 mm-active">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-rocket"></i>Dashboards
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>

                             <li class="mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-study"></i>Student's
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                 <ul>
                                    <li>
                                        <a href="index.html"  >
                                            <i class="metismenu-icon"></i>Course's
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html"  >
                                            <i class="metismenu-icon"></i>Time Table
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-commerce.html" >
                                            <i class="metismenu-icon"></i>Facilities
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-sales.html" >
                                            <i class="metismenu-icon">
                                            </i>Training and Placements
                                        </a>
                                    </li>
                                </ul>
                            </li>  

                            <li class="mt-3">
                                    <!-- Examination Section -->

                                <a href="#">
                                    <i class="metismenu-icon pe-7s-notebook"></i>Examination
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                 <ul>
                                    <li>
                                        <a href="index.html"  >
                                            <i class="metismenu-icon"></i>Exam Notice
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-commerce.html" >
                                            <i class="metismenu-icon"></i>Rules
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-sales.html" >
                                            <i class="metismenu-icon">
                                            </i>Results
                                        </a>
                                    </li>
                                </ul>

                            </li>


                            <li  class=" mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-date"></i>Events
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                 <ul>
                                    <li>
                                        <a href="index.html"   >
                                            <i class="metismenu-icon"></i>Seminar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-commerce.html"  >
                                            <i class="metismenu-icon"></i>Workshop
                                        </a>
                                    </li>
                                </ul>
                            </li>


                             <li  class="mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-chat"></i>Chats
                                    <i class="metismenu-state-icon fa fa-circle " style="font-size: 10px;color: red"></i>
                                </a>
                             </li>

                             <li  class="mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-news-paper"></i>Blogs
                                </a>
                             </li>

                             <li  class="mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-settings"></i>Setting
                                </a>
                             </li>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<script type="text/javascript">
function timeTo12HrFormat(time)
{   // Take a time in 24 hour format and format it in 12 hour format
    var time_part_array = time.split(":");
    var ampm = 'AM';

    if (time_part_array[0] >= 12) {
        ampm = 'PM';
    }

    

    if (time_part_array[1] < 10 ) {
        time_part_array[1]  = '0'+time_part_array[1];
    }

    if (time_part_array[2] < 10 ) {
        time_part_array[2]  = '0'+time_part_array[2];
    }

    if (time_part_array[0] > 12) {
        time_part_array[0] = time_part_array[0] - 12;
    }

    formatted_time = time_part_array[0] + ':' + time_part_array[1] + ':' + time_part_array[2] + ' ' + ampm;

    return formatted_time;
}



    setInterval(()=>{
            var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

        $("#currentTime").html(timeTo12HrFormat(time)); 
    },1000);  

</script>