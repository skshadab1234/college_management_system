<?php
	require_once "reuseable_files/database.inc.php";
	require_once "reuseable_files/constant.inc.php";

	if (isset($_SESSION['STD_ID'])) {
		unset($_SESSION['STD_ID']);
		unset($_SESSION['enroll_no']);
		session_destroy();
		header("location:".FRONT_SITE_PATH);		
	}

	if (isset($_SESSION['FAC_ID'])) {
		unset($_SESSION['FAC_ID']);
		session_destroy();
		header("location:".FRONT_SITE_PATH);		
	}

	
	if (isset($_SESSION['ADMINID'])) {
		unset($_SESSION['ADMINID']);
		session_destroy();
		header("location:".FRONT_SITE_PATH);		
	}
?>
