<?php
	require_once "reuseable_files/database.inc.php";
	require_once "reuseable_files/constant.inc.php";

	if (isset($_SESSION['STD_ID'])) {
		unset($_SESSION['STD_ID']);
		unset($_SESSION['enroll_no']);
		session_destroy();
		header("location:login.php");		
	}

	if (isset($_SESSION['FAC_ID'])) {
		unset($_SESSION['FAC_ID']);
		session_destroy();
		header("location:login.php");		
	}
?>