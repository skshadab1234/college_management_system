<?php
require 'session.php';
include('../smtp/PHPMailerAutoload.php');

if (isset($_POST['description']) && $_POST['description'] !='') {
	$admit_no = $student_login['Admission_NO'];
	$description = get_safe_value($_POST['description']);
	// prx($student_login);
	$notice_date = date("Y-m-d");
	$notice_time = date("h:i a");

  $requested_added_on = date("Y-m-d h:i a");

  $notice_short_desc = "We take upto 2 working days to update your profile. <br> Requested at ".$notice_date."";
	mysqli_query($con,'Insert into profle_update_request(admit_no,description,request_added_on,status) VALUES('.$admit_no.',"'.$description.'","'.$requested_added_on.'","0")');

	mysqli_query($con,'Insert into notice_board(notice_admit_no,notice_title,notice_short_desc,notice_links,notice_date,notice_time,notice_status) VALUES('.$admit_no.',"Requested to update a profle","'.$notice_short_desc.'"," ","'.$notice_date.'","'.$notice_time.'","0")');

	$html = '<!doctype html>
<html lang="en-US">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Reset Password Email Template</title>
<meta name="description" content="Reset Password Email Template.">
<style type="text/css">
a:hover {text-decoration: underline !important;}
</style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<!--100% body table-->
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
<tr>
<td>
<table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
  align="center" cellpadding="0" cellspacing="0">
  <tr>
      <td style="height:80px;">&nbsp;</td>
  </tr>
  <tr>
      <td style="height:20px;">&nbsp;</td>
  </tr>
  <tr>
      <td>
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
              style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
              <tr>
                  <td style="height:40px;">&nbsp;</td>
              </tr>
              <tr>
                  <td style="padding:0 35px;">
                      <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have
                          requested to Update your Profile</h1>
                      <span
                          style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                      <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                          Your Message: "'.$description.'"
                      </p>

                      <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                          We will let you know when your profile get updated. First we have to cross check that really you have mistake on profile or not. 

                          <br>

                          If yes then we will update your profile. <br>
                          otherwise you will get punished.	
                      </p>
                  </td>
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

	$response = send_email($student_login['student_email'],$html,'Request to update profile','Message has been sended check your mail');
	if ($response['status'] == 'success') {
		$arr=array('status'=>'success','msg'=>$response['msg']);
	}else{
		$arr=array('status'=>'error','msg'=>$response['msg']);
	}
	echo json_encode($arr); 
}