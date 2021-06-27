<?php
require 'session.php';
if (!isset($_SESSION['ADMINID'])) {
  header("location:login");
}


if ($admin_login['new_login_admin'] == 0) {
    header("location:update_password.php");
}


$page_url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if ($page_url == FRONT_SITE_PATH_ADMIN.'course.php') {
    $title = 'Course\'s';
    $course_active = 'mm-active';
}elseif ($page_url == FRONT_SITE_PATH_ADMIN.'index.php' ||  $page_url == FRONT_SITE_PATH_ADMIN) {
    $dashboard_active = 'mm-active';
    $title = 'Dashboard';
}elseif ($page_url == FRONT_SITE_PATH_ADMIN.'faculty.php') {
    $faculty_active = 'mm-active';
    $title = 'Faculty';
}elseif ($page_url == FRONT_SITE_PATH_ADMIN.'student.php') {
    $student_active = 'mm-active';
    $title = 'Student';
}elseif ($page_url == FRONT_SITE_PATH_ADMIN.'students_fees.php') {
    $studentfees_active = 'mm-active';
    $title = 'Student Fees Details';
}elseif ($page_url == FRONT_SITE_PATH_ADMIN.'subjects.php') {
    $subjects_active = 'mm-active';
    $title = 'Subjects';
}elseif ($page_url == FRONT_SITE_PATH_ADMIN.'timetable.php') {
    $timetable_active = 'mm-active';
    $title = 'Timetable';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $title ?></title>
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
<style type="text/css">
    a{
        text-decoration: none
    }
    a:hover{
        text-decoration: none;
    }
    .app-header__logo .logo-src{
        height: 47px;
        left: 0;
    }
    .logo-src a{
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        color: #007bff;
        font-weight: 700;
        font-family: sans-serif;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar fixed-footer">
        <div class="app-header header-shadow "> <!-- bg-premium-dark header-text-light -->
             <div class="app-header__logo">
                <!-- style="background:url(<?php echo FRONT_GLOBAL_IMAGE."logo.jpg"; ?>);background-size: cover;width: 43px;height: 50px" -->
                <div class="logo-src" >
                    <a href="index">Admin <sub style="font-size: 10px;text-transform: capitalize;font-style: italic;letter-spacing: 2px">panel</sub></a>
                </div>
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
                    </div>


                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="50px" height="45px" class="rounded-circle" src="<?= FRONT_SITE_IMAGE_ADMIN.'/'.$admin_login['admin_picture'] ?>" alt="">
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
                                                                    <img width="50px" height="45px" class="rounded-circle" src="<?= FRONT_SITE_IMAGE_ADMIN.'/'.$admin_login['admin_picture'] ?>" alt="">
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading"><?= $admin_login['fullname'] ?></div>
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
                                                            <a href="change_password<?=PHP_EXT ?>?changepassword=<?= $admin_login['admin_email'] ?>" class="nav-link">Change Password</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading"> <?= $admin_login['fullname'] ?></div>
                                    <div class="widget-subheading"> <?php if ($admin_login['admin_last_login'] == '')  {
                                        echo 'Login First Time';
                                    }else {
                                        echo "Last Login: ".date("d M, h:i A",strtotime($admin_login['admin_last_login']));
                                    } ?></div>
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
                            <li  class="mt-3 <?= $dashboard_active ?>">
                                <a href="index"<?= PHP_EXT ?>>
                                    <i class="metismenu-icon pe-7s-rocket"></i>Dashboards
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>


                             <li  class="mt-3 <?= $course_active ?>">
                                <a href="course<?= PHP_EXT ?>?action=viewall" >
                                    <i class="metismenu-icon pe-7s-study"></i>Courses
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>


                             <li  class="mt-3 <?= $faculty_active ?>">
                                <a href="faculty<?= PHP_EXT ?>?action=viewall">
                                    <i class="metismenu-icon pe-7s-user"></i>Faculty
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>


                              <li  class="mt-3 <?= $student_active ?>">
                                <a href="student<?= PHP_EXT ?>?action=viewall">
                                    <i class="metismenu-icon pe-7s-user"></i>Student
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>


                              <li  class="mt-3 <?= $subjects_active ?>">
                                <a href="subjects<?= PHP_EXT ?>?action=viewall">
                                    <i class="metismenu-icon pe-7s-notebook"></i>Subject's
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>

                              <li  class="mt-3 <?= $timetable_active ?>">
                                <a href="timetable<?= PHP_EXT ?>">
                                    <i class="metismenu-icon pe-7s-news-paper"></i>Timetable
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>

                              <li  class="mt-3 <?= $studentfees_active ?>">
                                <a href="students_fees<?= PHP_EXT ?>?action=viewall">
                                    <i class="metismenu-icon pe-7s-cash"></i>Student Fess Details
                                    <!-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> -->
                                </a>
                             </li>

                            <!--  <li class="mt-3">
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-study"></i>Student's
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                 <ul>
                                    <li>
                                        <a href="timetable"<?= PHP_EXT ?>  >
                                            <i class="metismenu-icon"></i>Time Table
                                        </a>
                                    </li>
                                     <li>
                                        <a href="index.html"  >
                                            <i class="metismenu-icon"></i>Notice's
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
                            </li>  --> 

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