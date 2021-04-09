<?php
require '../reuseable_files/database.inc.php';

if(isset($_SESSION['FAC_ID'])){
	$sql = "SELECT * FROM faculty_login where faculty_login_id = '".$_SESSION['FAC_ID']."'";
	$res = mysqli_query($con,$sql);
	$faculty_login = mysqli_fetch_assoc($res);
}