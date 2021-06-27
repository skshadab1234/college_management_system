<?php
require 'reuseable_files/database.inc.php';
require 'reuseable_files/constant.inc.php';
require 'reuseable_files/functions_demand.inc.php';
include ('smtp/PHPMailerAutoload.php');


// Student Login
if (isset($_POST['enroll_no']) && isset($_POST['password']))
{
    $enroll_no = get_safe_value($_POST['enroll_no']);
    $password = get_safe_value($_POST['password']);
    $query = "SELECT * FROM student_login WHERE enroll_no = '$enroll_no'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            if (password_verify($password, $row["student_password"]))
            {
                $_SESSION["enroll_no"] = $enroll_no;
                $_SESSION["STD_ID"] = $row['id'];
                $arr = array(
                    'status' => 'success',
                    'msg' => 'Wait a minute....redirecting',
                    'field' => 'signup_success'
                );
            }
            else
            {
                //return false;
                $arr = array(
                    'status' => 'error',
                    'msg' => 'Email or Password is incorredt',
                    'field' => 'password_error'
                );
            }
        }
    }else{
        $arr = array(
            'status' => 'login_error',
            'msg' => 'Enter Correct Details',
            'field' => 'password_error'
        );
    }
    echo json_encode($arr);

}


// Faculty Login
elseif (isset($_POST['facultyIdNo']) && isset($_POST['password']))
{
    $facultyIdNo = get_safe_value($_POST['facultyIdNo']);
    $password = get_safe_value($_POST['password']);
    $query = "SELECT * FROM faculty_login WHERE faculty_login_id = '$facultyIdNo'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            if (password_verify($password, $row["password"]))
            {
                $_SESSION["FAC_ID"] = $row['id'];
                $arr = array(
                    'status' => 'success',
                    'msg' => 'Wait a minute....redirecting',
                    'field' => 'signup_success'
                );
            }
            else
            {
                //return false;
                $arr = array(
                    'status' => 'error',
                    'msg' => 'Email or Password is incorredt',
                    'field' => 'password_error'
                );
            }
        }
    }else{
        $arr = array(
            'status' => 'login_error',
            'msg' => 'Enter Correct Details',
            'field' => 'password_error'
        );
    }
    echo json_encode($arr);

}

// Student Forogt password Feature
elseif (isset($_POST['email_id_student']) && isset($_POST['forgotpass']))
{
    $email_id_student = get_safe_value($_POST['email_id_student']);
    $rand = rand(1111111, 9999999);
    $insert_code = mysqli_query($con, "UPDATE student_login SET reset_password_code='$rand' WHERE student_email = '$email_id_student'");

    $query = "SELECT * FROM student_login WHERE student_email = '$email_id_student'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $html = 
'<!doctype html>
<html lang="en-US">

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>Reset Password Email Template</title>
  <meta name="description" content="Reset Password Email Template.">
  <style type="text/css">
  a:hover {
    text-decoration: underline !important;
  }
  </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
  <!--100% body table-->
  <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: " Open Sans ", sans-serif;">
    <tr>
      <td>
        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td style="height:80px;">&nbsp;</td>
          </tr>
          <tr>
            <td style="height:20px;">&nbsp;</td>
          </tr>
          <tr>
            <td>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
                <tr>
                  <td style="padding:0 35px;">
                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:" Rubik ",sans-serif;">You have
                          requested to reset your password</h1> <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;"> We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your password, click the following link and follow the instructions. </p> <a href="' . FRONT_SITE_PATH_STUDENT . 'change_password' . PHP_EXT . '?email_id=' . $email_id_student . '&reset-code=' . $row['reset_password_code'] . '" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                          Password</a> </td>
                </tr>
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
              </table>
            </td>
            <tr>
              <td style="height:20px;">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:80px;">&nbsp;</td>
            </tr>
        </table>
      </td>
      </tr>
  </table>
  <!--/100% body table-->
</body>

</html>';
    if (mysqli_num_rows($result) > 0)
    {
        $response = send_email($email_id_student, $html, 'Reset Your Password', 'Message has been sended check your mail');
        if ($response['status'] == 'success')
        {
            $arr = array(
                'status' => 'success',
                'msg' => $response['msg']
            );
        }
        else
        {
            $arr = array(
                'status' => 'error',
                'msg' => $response['msg']
            );
        }
        echo json_encode($arr);
    }
    else
    {
        $arr = array(
            'status' => 'error_account'
        );
        echo json_encode($arr);
    }
}

// Faculty Forogt password Feature
elseif (isset($_POST['email_id_faculty']) && isset($_POST['forgotpass']))
{
    $email_id_faculty = get_safe_value($_POST['email_id_faculty']);
    $rand = rand(1111111, 9999999);
    $insert_code = mysqli_query($con, "UPDATE faculty_login SET reset_password_code_faculty='$rand' WHERE faculty_email = '$email_id_faculty'");

    $query = "SELECT * FROM faculty_login WHERE faculty_email = '$email_id_faculty'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $html = 
'<!doctype html>
<html lang="en-US">

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>Reset Password Email Template</title>
  <meta name="description" content="Reset Password Email Template.">
  <style type="text/css">
  a:hover {
    text-decoration: underline !important;
  }
  </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
  <!--100% body table-->
  <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: " Open Sans ", sans-serif;">
    <tr>
      <td>
        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td style="height:80px;">&nbsp;</td>
          </tr>
          <tr>
            <td style="height:20px;">&nbsp;</td>
          </tr>
          <tr>
            <td>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
                <tr>
                  <td style="padding:0 35px;">
                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:" Rubik ",sans-serif;">You have
                          requested to reset your password</h1> <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;"> We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your password, click the following link and follow the instructions. </p> <a href="' . FRONT_SITE_PATH_TEACHER . 'change_password' . PHP_EXT . '?email_id=' . $email_id_faculty . '&reset-code=' . $row['reset_password_code_faculty'] . '" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                          Password</a> </td>
                </tr>
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
              </table>
            </td>
            <tr>
              <td style="height:20px;">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:80px;">&nbsp;</td>
            </tr>
        </table>
      </td>
      </tr>
  </table>
  <!--/100% body table-->
</body>

</html>';
    if (mysqli_num_rows($result) > 0)
    {
        $response = send_email($email_id_faculty, $html, 'Reset Your Password', 'Message has been sended check your mail');
        if ($response['status'] == 'success')
        {
            $arr = array(
                'status' => 'success',
                'msg' => $response['msg']
            );
        }
        else
        {
            $arr = array(
                'status' => 'error',
                'msg' => $response['msg']
            );
        }
        echo json_encode($arr);
    }
    else
    {
        $arr = array(
            'status' => 'error_account'
        );
        echo json_encode($arr);
    }
}


// ADMIN FORGOT Password
elseif (isset($_POST['email_id_admin']) && isset($_POST['forgotpass']))
{
    $email_id_admin = get_safe_value($_POST['email_id_admin']);
    $rand = rand(1111111, 9999999);
    $insert_code = mysqli_query($con, "UPDATE admin_mode SET admin_reset_password_code='$rand' WHERE admin_email = '$email_id_admin'");

    $query = "SELECT * FROM admin_mode WHERE admin_email = '$email_id_admin'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $html = 
'<!doctype html>
<html lang="en-US">

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>Reset Password Email Template</title>
  <meta name="description" content="Reset Password Email Template.">
  <style type="text/css">
  a:hover {
    text-decoration: underline !important;
  }
  </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
  <!--100% body table-->
  <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: " Open Sans ", sans-serif;">
    <tr>
      <td>
        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td style="height:80px;">&nbsp;</td>
          </tr>
          <tr>
            <td style="height:20px;">&nbsp;</td>
          </tr>
          <tr>
            <td>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
                <tr>
                  <td style="padding:0 35px;">
                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:" Rubik ",sans-serif;">You have
                          requested to reset your password</h1> <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;"> We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your password, click the following link and follow the instructions. </p> <a href="' . FRONT_SITE_PATH_ADMIN . 'change_password' . PHP_EXT . '?email_id=' . $email_id_admin . '&reset-code=' . $row['admin_reset_password_code'] . '" style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                          Password</a> </td>
                </tr>
                <tr>
                  <td style="height:40px;">&nbsp;</td>
                </tr>
              </table>
            </td>
            <tr>
              <td style="height:20px;">&nbsp;</td>
            </tr>
            <tr>
              <td style="height:80px;">&nbsp;</td>
            </tr>
        </table>
      </td>
      </tr>
  </table>
  <!--/100% body table-->
</body>

</html>';
    if (mysqli_num_rows($result) > 0)
    {
        $response = send_email($email_id_admin, $html, 'Reset Your Password', 'Message has been sended check your mail');
        if ($response['status'] == 'success')
        {
            $arr = array(
                'status' => 'success',
                'msg' => $response['msg']
            );
        }
        else
        {
            $arr = array(
                'status' => 'error',
                'msg' => $response['msg']
            );
        }
        echo json_encode($arr);
    }
    else
    {
        $arr = array(
            'status' => 'error_account'
        );
        echo json_encode($arr);
    }
}


// Student Password Reset Code
elseif (isset($_POST['newpass_student']) && isset($_POST['crmpass_student']) && isset($_POST['email_id']))
{
    $newpass_student = get_safe_value($_POST['newpass_student']);
    $crmpass_student = get_safe_value($_POST['crmpass_student']);
    $email_id = get_safe_value($_POST['email_id']);

    if ($newpass_student == $crmpass_student)
    {
        $newpass_student_hash = password_hash($newpass_student, PASSWORD_DEFAULT);

        if (isset($_POST['login_attempted']))
        {
            $update = mysqli_query($con, "UPDATE student_login SET student_password  = '$newpass_student_hash', new_login  = 1 where student_email = '$email_id'");
        }
        else
        {
            $update = mysqli_query($con, "UPDATE student_login SET student_password  = '$newpass_student_hash' where student_email = '$email_id'");
        }

        $arr = array(
            "status" => "success"
        );
    }
    else
    {
        $arr = array(
            "status" => "error"
        );
    }
    echo json_encode($arr);
}

// Faculty Password Reset Code
elseif (isset($_POST['newpass_faculty']) && isset($_POST['crmpass_faculty']) && isset($_POST['email_id_faculty']))
{
    $newpass_faculty = get_safe_value($_POST['newpass_faculty']);
    $crmpass_student = get_safe_value($_POST['crmpass_faculty']);
    $email_id_faculty = get_safe_value($_POST['email_id_faculty']);

    if ($newpass_faculty == $crmpass_student)
    {
        $newpass_faculty_hash = password_hash($newpass_faculty, PASSWORD_DEFAULT);

        if (isset($_POST['login_attempted']))
        {
            $update = mysqli_query($con, "UPDATE faculty_login SET password  = '$newpass_faculty_hash', new_login_faculty  = 1 where faculty_email   = '$email_id_faculty'");
        }
        else
        {
            $update = mysqli_query($con, "UPDATE faculty_login SET password  = '$newpass_faculty_hash' where faculty_email   = '$email_id_faculty'");
        }

        $arr = array(
            "status" => "success"
        );
    }
    else
    {
        $arr = array(
            "status" => "error"
        );
    }
    echo json_encode($arr);
}


// Admin Login
elseif (isset($_POST['AdminIdNo']) && isset($_POST['password']))
{
    $AdminIdNo = get_safe_value($_POST['AdminIdNo']);
    $password = get_safe_value($_POST['password']);
    $query = "SELECT * FROM admin_mode WHERE admin_login_id = '$AdminIdNo' and admin_status=1";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            if (password_verify($password, $row["admin_password"]))
            {

                $_SESSION["ADMINID"] = $row['id'];

                $current_time = date("Y-m-d h:i a");

                $res =mysqli_query($con,"UPDATE admin_mode SET admin_last_login=now() WHERE id = '".$_SESSION['ADMINID']."'");
                $arr = array(
                    'status' => 'success',
                    'msg' => 'Wait a minute....redirecting',
                    'field' => 'signup_success'
                );
            }
            else
            {
                //return false;
                $arr = array(
                    'status' => 'error',
                    'msg' => 'Email or Password is incorrect',
                    'field' => 'password_error'
                );
            }
        }
    }else{
        $arr = array(
            'status' => 'login_error',
            'msg' => 'Enter Correct Details',
            'field' => 'password_error'
        );
    }
    echo json_encode($arr);
}

// Admin Password Reset

elseif (isset($_POST['newpass_admin']) && isset($_POST['crmpass_admin']) && isset($_POST['email_id_admin']))
{
    $newpass_admin = get_safe_value($_POST['newpass_admin']);
    $crmpass_admin = get_safe_value($_POST['crmpass_admin']);
    $email_id_admin = get_safe_value($_POST['email_id_admin']);

    if ($newpass_admin == $crmpass_admin)
    {
        $newpass_admin_hash = password_hash($newpass_admin, PASSWORD_DEFAULT);

        if (isset($_POST['login_attempted']))
        {
            $update = mysqli_query($con, "UPDATE admin_mode SET admin_password  = '$newpass_admin_hash', new_login_admin  = 1 where admin_email   = '$email_id_admin'");
        }
        else
        {
            $update = mysqli_query($con, "UPDATE admin_mode SET admin_password  = '$newpass_admin_hash' where admin_email   = '$email_id_admin'");
        }

        $arr = array(
            "status" => "success"
        );
    }
    else
    {
        $arr = array(
            "status" => "error"
        );
    }
    echo json_encode($arr);
}