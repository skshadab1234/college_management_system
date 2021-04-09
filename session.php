<?php
require 'reuseable_files/database.inc.php';

if(isset($_SESSION['USER_ID'])){
	$sql = "SELECT * FROM student_login where id = '".$_SESSION['USER_ID']."'";
	$res = mysqli_query($con,$sql);
	$user = mysqli_fetch_assoc($res);
}else{

	
}