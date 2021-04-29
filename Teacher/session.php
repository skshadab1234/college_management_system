<?php
require '../reuseable_files/database.inc.php';
require '../reuseable_files/functions_demand.inc.php';
require '../reuseable_files/constant.inc.php';

if(isset($_SESSION['FAC_ID'])){
	$sql = "SELECT * FROM faculty_login LEFT JOIN branch on faculty_login.branch_id = branch.id  where faculty_login_id = '".$_SESSION['FAC_ID']."'";
	$res = mysqli_query($con,$sql);
	$faculty_login = mysqli_fetch_assoc($res);
}