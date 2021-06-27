<?php

function prx($value)
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
	die();
}

function pr($value)
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

function get_safe_value($str){
    global $con;
    $str=mysqli_real_escape_string($con,$str);
    return $str;

}


function redirect($link){
	?>
	<script>
		window.location.href='<?php echo $link?>';
	</script>
	<?php
	die();
}

function send_email($email,$html,$subject,$user_msg){
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="ksfjjks@gmail.com";
	$mail->Password="adsenseaccount";
	$mail->setFrom("ksfjjks@gmail.com");
	$mail->addAddress($email);
	$mail->IsHTML(true);
	$mail->Subject=$subject;
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	 if($mail->send()){
        $arr = array("status"=>'success','msg'=>$user_msg);
     }else{
        $arr = array('status'=>'error','msg'=>'echo "Please Try again later. Our System facing some problems. we appologize for this mistake";');
     }
     return $arr;
}

// function student_fees_details($admission_no){
// 	global $con;
// 	$arr[]=array();
// 	$res=mysqli_query($con,"select * from student_fees_details where Admission_No='$admission_no'");
	
// 	if (mysqli_num_rows($res)>0) {
// 		while($row=mysqli_fetch_assoc($res)){
// 			$arr[0]=$row;
// 			// total fees
// 			$arr[0]['total_fees_percentage'] = '100%';

// 			// calculating percentage of remain fees from total fees
// 			$total_fees = $row['Total_fees'];
// 			$paid_fees = $row['Paid_Fees'];

// 			$paid_percentage = ($total_fees - $paid_fees) / $total_fees * 100;
// 			$arr[0]['remain_fees_percentage'] = number_format($paid_percentage);

// 			if (number_format($paid_percentage) > 50) {
// 				$arr[0]['paid_percentage_color_impression'] = 'danger';
// 			}else{
// 				$arr[0]['paid_percentage_color_impression'] = 'success';
// 			}

// 			// calculating paid fess percentage from total fees
// 			$total_fees = $row['Total_fees'];
// 			$remain_fees = $row['Balance_Fees'];

// 			$remain_percentage = ($total_fees - $remain_fees) / $total_fees * 100;
// 			$arr[0]['paid_fees_percentage'] = number_format($remain_percentage);

// 			if ( 50 < $remain_percentage) {
// 				$arr[0]['remain_percentage_color_impression'] = 'success';
// 			}else{
// 				$arr[0]['remain_percentage_color_impression'] = 'danger';
// 			}



// 		}
// 	}
// 	return $arr;
// }


function get_timetable_for_specific_department($branch,$semester,$day){
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"select * from timetable_all_dept LEFT JOIN subject on timetable_all_dept.Lecture_Name = subject.id where Department_Name='$branch' && Semester_No='$semester' && Day_Name = '$day' && status = 1");
	while ($row = mysqli_fetch_assoc($res)) {
		if (mysqli_num_rows($res) > 1)  {
			$arr[] = $row;
		}
	}

	return $arr;
}


function Subjects(){
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"select * from subject");
	while ($row = mysqli_fetch_assoc($res)) {
		if (mysqli_num_rows($res) > 0)  {
			$arr[] = $row;
		}
	}

	return $arr;
}



function Branch(){
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"select * from branch Where status=1");
	while ($row = mysqli_fetch_assoc($res)) {
		if (mysqli_num_rows($res) > 0)  {
			$arr[] = $row;
		}
	}

	return $arr;
}

function get_faculty_details($fid){
	global $con;

	$res = mysqli_query($con, "SELECT * FROM `faculty_login` WHERE faculty_login_id = '$fid'");
	$row = mysqli_fetch_assoc($res);

	return $row;
}

function numberofStudentJoined($lectname,$lectDate,$lectTime){
	global $con;

	$res = mysqli_query($con, "SELECT COUNT(*) AS numberofStudentJoined, Status FROM `student_attendance` WHERE  Lecture_Name = '$lectname' && Lecture_Date = '$lectDate' && Lecture_Time = '$lectTime' && Status = '1'");
	$row = mysqli_fetch_assoc($res);

	return $row;
}

function SubjectQuzForToday($today_date,$branch_id){
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"SELECT *,quiz_question.subject_name as sid,quiz_question.id as qid FROM `quiz_question` LEFT JOIN subject ON subject.id = quiz_question.subject_name LEFT JOIN faculty_login on quiz_question.faculty_created_id = faculty_login.faculty_login_id  where  quiz_date = '$today_date'  && quiz_branch_id = '$branch_id' && quiz_question.status = '1' GROUP BY quiz_topic");
	while ($row = mysqli_fetch_assoc($res)) {
			$arr[] = $row;
	}

	return $arr;
}

function numberofquestonpersubjectQuiz($subject_name,$quiz_date,$quiz_topic){
	global $con;
	$res = mysqli_query($con, "SELECT COUNT(*) AS numberofquestonpersubjectQuiz FROM `quiz_question` LEFT JOIN subject ON subject.id = quiz_question.subject_name WHERE subject.subject_name = '$subject_name' && quiz_date = '$quiz_date'  && status = '1' && quiz_topic='$quiz_topic'");
	$row = mysqli_fetch_assoc($res);

	return $row;
}

function getQuizQuestionBySubjectName($subject_name,$today_date){
	global $con;
	$arr[] = array();

	$res=mysqli_query($con,"SELECT * FROM `quiz_question` LEFT JOIN subject ON subject.id = quiz_question.subject_name   where subject.subject_name = '$subject_name' && quiz_date = '$today_date' && quiz_question.status = '1'");
	while ($row = mysqli_fetch_assoc($res)) {
			$arr[] = $row;
	}

	return $arr;
}


function totalmarksQuestion($subject_name,$date,$topic){
	global $con;

	$res = mysqli_query($con, "SELECT SUM(question_marks) as totalmarksQuestion FROM `quiz_question`  LEFT JOIN subject ON subject.id = quiz_question.subject_name  WHERE subject.id ='$subject_name' && quiz_date = '$date' && quiz_topic='$topic'");
	$row = mysqli_fetch_assoc($res);
	return $row['totalmarksQuestion'];
}

function marks_get($student_id,$subject_name,$date){
	global $con;
$arr[] = array();
	$res = mysqli_query($con, "SELECT SUM(marks_get) as marks_get FROM `quiz_student_answer`  WHERE quiz_student_Admit_No  = ".$student_id." && subject_name ='$subject_name' && quiz_date = '$date' ");
	$row = mysqli_fetch_assoc($res);
	if ($row['marks_get'] == Null) {
		$arr['color'] = 'red';
		$arr['value'] = '0';				
	}else{
		$arr['color'] = '';
		$arr['value'] = $row['marks_get'];
	}

	if ($row['marks_get'] > $row['marks_get'] / 2) {
		$arr['message'] = "Excellent";	
		$arr['message_color'] = 'success';
	}else{
		$arr['message'] = "Need Some Practice";	
		$arr['message_color'] = 'danger';
	}
	return $arr;
}


function TimeTable($branch_id,$Semester_No,$lecture_start,$lecture_end)
{
	global $con;
	$arr[] = array();

	$res=mysqli_query($con,"SELECT *,timetable_all_dept.id as tid FROM `timetable_all_dept` LEFT JOIN subject ON timetable_all_dept.Lecture_Name = subject.id WHERE Department_Name = '$branch_id' && Semester_No = '$Semester_No'  && Lecture_Start_at = '$lecture_start' && Lecture_end_at = '$lecture_end'");
	
	while ($row = mysqli_fetch_assoc($res)) {
			$arr[] = $row;
	}

	return $arr;	

}


function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}

function profilerequestByadmitno($admit_no)
{
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"SELECT * FROM `profle_update_request` WHERE admit_no = '$admit_no'");
	
	while ($row = mysqli_fetch_assoc($res)) {
			$arr[] = $row;
	}

	return $arr;	
}	


function notification($admit_no,$limit= '')
{
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"SELECT * FROM `notice_board` WHERE notice_admit_no = '$admit_no' ORDER BY id DESC $limit");
	
	while ($row = mysqli_fetch_assoc($res)) {
			$arr[] = $row;
	}

	return $arr;	
}

function times_ago($timestamp){
  $time_ago = strtotime($timestamp);
  $current_time = time();
  $time_differnece = $current_time - $time_ago;

     // For seconds
     $seconds = $time_differnece;
      // For Minute
      $minute = round($seconds / 60); 
  
      // For Hour
       $hour = round($seconds / 3600);

      // For Day
       $day = round($seconds / 86400);

    // For Week
       $week = round($seconds / 604800);

    // For Month
       $month = round($seconds / 2629440);

    // For Year
       $year = round($seconds / 31553280);


     if ($seconds <= 60) {
         return "(Just Now)";
       }  
     elseif ($minute <= 60) {
         if ($minute ==  1) {
           return "(One Minute ago)";
         }
         else{
          return "($minute minutes ago)";
         }
       }  
     elseif ($hour <= 24) {
         if ($hour == 1) {
           return "(an hour ago)";
         }
         else{
          return "($hour hrs ago)";
         }
       }
       elseif ($day <= 30) {
           if ($day == 1) {
             return "(Yesterday)";
           }
           else{
            return "($day days ago)";
           }
         }

         elseif ($week <= 4.3) {
           if ($day == 1) {
             return "(a week ago)";
           }
           else{
            return "($week weeks ago)";
           }
         }
       elseif ($month <= 12) {
             if ($month == 1) {
               return "(a month ago)";
             }
             else{
              return "($month months ago)";
             }
           }
       else{
        if ($year == 1) {
          return "(a year ago)";
        }else{
          return "($year years ago)";
        }
       }        
}

function getNotice($status,$optional='')
{
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"SELECT * FROM `college_notice` LEFT JOIN branch ON college_notice.branch_id = branch.id WHERE college_notice_status = '$status' $optional");
	
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
				$arr[] = $row;
		}

	}
	return $arr;	

}

function TotalTeacher()
{
	global $con;
	$res = mysqli_query($con,"select COUNT(*) as total FROM faculty_login WHERE status = 1");
	$row = mysqli_fetch_assoc($res);

	return $row['total'];
}

function TotalStudent()
{
	global $con;
	$res = mysqli_query($con,"select COUNT(*) as total FROM student_login WHERE student_status = 1");
	$row = mysqli_fetch_assoc($res);

	return $row['total'];
}


function TotalCourses()
{
	global $con;
	$res = mysqli_query($con,"select COUNT(*) as total FROM branch WHERE status = 1");
	$row = mysqli_fetch_assoc($res);

	return $row['total'];
}

function Subject_id($subject_name)
{
	global $con;
	$res = mysqli_query($con,"select id FROM subject WHERE subject_name = '$subject_name'");
	$row = mysqli_fetch_assoc($res);

	return $row['id'];
	
}

function quiz_topicCreatedByFaculty($quiz_topic,$quiz_date){
	global $con;
	$arr[] = array();
	$res=mysqli_query($con,"SELECT * FROM `quiz_question` WHERE college_notice_status = '$status' $optional");
	
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
				$arr[] = $row;
		}

	}
	return $arr;
}