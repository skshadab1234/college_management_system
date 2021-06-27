<?php
require 'session.php';
if (!isset($_SESSION['STD_ID'])) {
  header("location:login");
}
$full_name_student = $student_login['firstname'].' '.$student_login['last_name'];

if ($student_login['new_login'] == 0) {
    header("location:update_password.php");
}

$page_url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if ($page_url == FRONT_SITE_PATH_STUDENT.'timetable.php' || $page_url == FRONT_SITE_PATH_STUDENT.'notice.php') {
    $open_menu = 'mm-active';
}

if ($page_url == FRONT_SITE_PATH_STUDENT.'timetable.php') {
    $active = 'mm-active';
    $title = 'TimeTable';
}elseif ($page_url == FRONT_SITE_PATH_STUDENT || $page_url == FRONT_SITE_PATH_STUDENT.'index.php') {
    $title = 'Dashboard';
      $dash_active = 'mm-active';
}elseif ($page_url == FRONT_SITE_PATH_STUDENT.'notice.php') {
      $noticeactive = 'mm-active';
      $title = 'Notice Board';
}elseif ($page_url == FRONT_SITE_PATH_STUDENT.'chat.php') {
      $chatactive = 'mm-active';
      $opacity =  '1';
      $title = 'Chat App';
      $chathide_component = 'display:none';
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=  $title ?></title>
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

<style>
    a{
        color: #000;
        text-decoration: none;
    }
    a:hover{
        color: #000;
        text-decoration: none;
    }
</style>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar fixed-footer">
        <div class="app-header header-shadow "> <!-- bg-premium-dark header-text-light -->
             <div class="app-header__logo">
                <!-- style="background:url(<?php echo FRONT_GLOBAL_IMAGE."logo.jpg"; ?>);background-size: cover;width: 43px;height: 50px" -->
                <div class="logo-src" >
                    <a href="index">Student <sub style="font-size: 10px;text-transform: capitalize;font-style: italic;letter-spacing: 2px">panel</sub></a>
                </div>
                <div class="header__pane ml-auto" style="<?= $chathide_component ?>">
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
                            <button type="button" id="ToggleNotification" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"
                                class="p-0 mr-2 btn btn-link">
                                <span class="icon-wrapper icon-wrapper-alt rounded-circle">
                                    <span class="icon-wrapper-bg bg-danger"></span>
                                    <i class="icon text-danger icon-anim-pulse ion-android-notifications"></i>
                                    <div id="addindicator"></div>
                                    <!-- <span class="badge badge-dot badge-dot-sm badge-danger">Notifications</span> -->
                                </span>
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu-xl rm-pointers dropdown-menu dropdown-menu-right">
                                <div class="dropdown-menu-header mb-0">
                                    <div class="dropdown-menu-header-inner bg-deep-blue">
                                        <div class="menu-header-image opacity-1" style="background-image: url(<?= FRONT_GLOBAL_IMAGE.'city3.jpg' ?>);"></div>
                                        <div class="menu-header-content text-dark">
                                            <h5 class="menu-header-title">Notifications</h5>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-messages-header" role="tabpanel">
                                        <div class="scroll-area-sm">
                                            <div class="scrollbar-container">
                                                <div class="p-3">
                                                    <div class="notifications-box">
                                                        <div class="vertical-time-simple vertical-without-time vertical-timeline vertical-timeline--one-column" id="Notifications_section">
                                                                                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
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
                                            <img width="42" class="rounded-circle" src="<?= FRONT_SITE_IMAGE_STUDENT.'/'.$student_login['picture_link'] ?>" alt="">
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
                                                                    <img width="42" class="rounded-circle" src="<?= FRONT_SITE_IMAGE_STUDENT.'/'.$student_login['picture_link'] ?>" alt="">
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
                                            <div class="scroll-area-xs" style="height: 130px;">
                                                <div class="scrollbar-container ps">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item-header nav-item">My Account
                                                        </li>
                                                        <li class="nav-item">
                                                            <a href="profile<?= PHP_EXT ?>" class="nav-link">Profile
                                                            </a>
                                                        </li>
                                                         <li class="nav-item">
                                                            <a href="change_password<?=PHP_EXT ?>?changepassword=<?= $student_login['student_email'] ?>" class="nav-link">Change Password</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading"> <?= $full_name_student ?></div>
                                    <div class="widget-subheading"> <?= $student_login['branch_name']?></div>
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
          <div class="app-main" >
            <div class="app-sidebar sidebar-shadow " style="<?= $chathide_component ?>"> <!-- bg-slick-carbon sidebar-text-light -->
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
                            <li  class="mt-3 <?= $dash_active ?>">
                                <a href="index"<?= PHP_EXT ?>>
                                    <i class="metismenu-icon pe-7s-rocket"></i>Dashboards
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>

                             <li class="mt-3 <?= $open_menu ?>">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-study"></i>Student's
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                 <ul>
                                    <li class="<?= $active ?>">
                                        <a href="timetable"<?= PHP_EXT ?>  >
                                            <i class="metismenu-icon"></i>Time Table
                                        </a>
                                    </li>
                                     <li class="<?= $noticeactive ?>">
                                        <a href="notice"<?= PHP_EXT ?>   >
                                            <i class="metismenu-icon"></i>Notice's
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a href="dashboards-commerce.html" >
                                            <i class="metismenu-icon"></i>Facilities
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboards-sales.html" >
                                            <i class="metismenu-icon">
                                            </i>Training and Placements
                                        </a>
                                    </li> -->
                                </ul>
                            </li>  

                            <!-- <li class="mt-3"> -->
                                    <!-- Examination Section -->

                                <!-- <a href="#">
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
 -->

                         <!--    <li  class=" mt-3">
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
 -->

                             <li  class="mt-3 <?= $chatactive ?>">
                                <a href="chat<?= PHP_EXT ?>">
                                    <i class="metismenu-icon pe-7s-chat"></i>Chats
                                    <i class="metismenu-state-icon fa fa-circle " style="font-size: 10px;color: red;opacity: <?= $opacity ?>"></i>
                                </a>
                             </li>

                             <!-- <li  class="mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-news-paper"></i>Blogs
                                </a>
                             </li>

                             <li  class="mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-settings"></i>Setting
                                </a>
                             </li> -->

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<script type="text/javascript">
$(document).ready(()=>{
            setInterval(()=>{
                $.ajax({
                    url:"ajax_request.php",
                    method:"post",
                    data:"notification",
                    success:function(data) {
                        var res = jQuery.parseJSON(data);
                        $("#addindicator").html(res.indicator);
                        $("#Notifications_section").html(res.data);
                    }
                })
            },2000)

            $("#ToggleNotification").click(()=>{
               $.ajax({
                    url:"ajax_request.php",
                    method:"post",
                    data:"notification_seen",
                    success:function(data) {
                        
                    }
                })     
            })
})
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