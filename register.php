<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'reuseable_files/database.inc.php';
 function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$added_on = date('Y-m-d h:i:s');
	if(empty($name) && empty($email) && empty($password) && empty($repassword)){
		$arr = array('status'=>'error', 'msg'=>'All Field is required', 'field'=>'signup_error');
	}elseif (empty($name)) {
		$arr = array('status'=>'error', 'msg'=>'Name is required', 'field'=>'name_error');
	}elseif (empty($email)) {
		$arr = array('status'=>'error', 'msg'=>'Email is required', 'field'=>'email_error');
	}elseif(!checkemail($email)){
		$arr=array('status'=>'error','msg'=>'Enter Correct Email address','field'=>'email_error');
	}elseif (empty($password)) {
		$arr = array('status'=>'error', 'msg'=>'Password is required', 'field'=>'password_error');
	}elseif ($password != $repassword) {
		$arr = array('status'=>'error', 'msg'=>'Password did not match', 'field'=>'repassword_error');
	}else{
			$sql = "SELECT * FROM users where google_email='$email'";
			$res= mysqli_query($con,$sql);
			if (mysqli_num_rows($res) > 0) {
				$arr = array('status'=>'error', 'msg'=>'Email already exists', 'field'=>'signup_error');
			}else{
				$password = password_hash($password, PASSWORD_DEFAULT);
				$verification_code = rand(11111,99999);
				$sql = "insert into users (firstname,google_email,password,verification_code,added_on) VALUES('$name','$email','$password','$verification_code','$added_on')";
				$res= mysqli_query($con,$sql);

				$html = "Verify Your Account Email </br><a href='verify.php?rand_str=".$verification_code."'>Click here to verify</a>";
				$subject = "Verify your Account";

	     	 require 'vendor/autoload.php';

				$mail = new PHPMailer(true);

				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				// Gmail ID which you want to use as SMTP server
				$mail->Username = 'ks615044@gmail.com';
				// Gmail Password
				$mail->Password = '1@Shadabparveen1';
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->Port = 587;

				// Email ID from which you want to send the email
				$mail->setFrom('ks615044@gmail.com');
				// Recipient Email ID where you want to receive emails
				$mail->addAddress($email);

				$mail->isHTML(true);
				$mail->Subject = $subject;
				$mail->Body = $html;

            $mail->send();
				$arr = array('status'=>'success', 'msg'=>'Verify Your email', 'field'=>'signup_success');
			}
	}

	echo json_encode($arr);
}