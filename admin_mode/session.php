<?php
require '../reuseable_files/database.inc.php';
require '../reuseable_files/functions_demand.inc.php';
require '../reuseable_files/constant.inc.php';

if(isset($_SESSION['ADMINID'])){
	$sql = "SELECT * FROM admin_mode where id = '".$_SESSION['ADMINID']."'";
	$res = mysqli_query($con,$sql);
	$admin_login = mysqli_fetch_assoc($res);
}