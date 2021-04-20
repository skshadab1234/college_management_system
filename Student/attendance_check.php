<?php 
require 'session.php';
if (isset($_POST['randomNumbers']) && isset($_POST['lecturename'])) {
	$randomNumbers = get_safe_value($_POST['randomNumbers']);
	$subject_name = get_safe_value($_POST['lecturename']);
	$lecture_time = get_safe_value($_POST['lecture_time']);
	$lecture_time1 = date('h:i', strtotime($lecture_time));
	$lecture_end_time = get_safe_value($_POST['lecture_end_time']);
	$lecture_end_time1 = date('h:i', strtotime($lecture_end_time));
	$final_time = $lecture_time1.' - '.$lecture_end_time1;
	$Admission_NO = $student_login['Admission_NO'];
	$today_date = date("Y-m-d");
	$teacher_details = get_faculty_details($_POST['fid']);
	$teacher_id = $teacher_details['faculty_login_id'];
	$current_time = date('Y-m-d h:i:s a');
	
	$res = mysqli_query($con, "Select * from student_attendance where Students_Admit_No	= '$Admission_NO' && Lecture_Date = '$today_date' && Lecture_Time = '$final_time' && Lecture_Name = '$subject_name'");

	
	$row = mysqli_fetch_assoc($res);


	if (mysqli_num_rows($res)) {
		$arr = array('status'=>'already_exist');
	}else{
		// insert

		$result = mysqli_query($con, "insert into student_attendance(Students_Admit_No,Lecture_Date,Lecture_Time,Lecture_Name,Teacher_id,Status,Joining_Time) Values('$Admission_NO','$today_date','$final_time','$subject_name','$teacher_id',1,'$current_time')");

		// prx("insert into student_attendance(Students_Admit_No,Lecture_Date,Lecture_Time,Lecture_Name,Teacher_id,Status,Joining_Time) Values('$Admission_NO','$today_date','$final_time','$subject_name','$teacher_id',1,'$current_time')");
		$arr = array('status'=>'success_inserted');
	}

	echo json_encode($arr);
}