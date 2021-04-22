<?php
require '../reuseable_files/database.inc.php';
require '../reuseable_files/functions_demand.inc.php';
require '../reuseable_files/constant.inc.php';

if(isset($_SESSION['STD_ID'])){
	$sql = "SELECT * FROM student_login LEFT JOIN branch on student_login.BRANCH = branch.id where student_login.id = '".$_SESSION['STD_ID']."'";
	$res = mysqli_query($con,$sql);
	$student_login = mysqli_fetch_assoc($res);
}
date_default_timezone_set("Asia/Calcutta");
