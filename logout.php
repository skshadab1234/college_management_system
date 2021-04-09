<?php
	require_once "reuseable_files/database.inc.php";
	unset($_SESSION['USER_ID']);
	session_destroy();
	header('Location: login.php');
	exit();
?>