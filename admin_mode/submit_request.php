<?php

require 'session.php';

if (isset($_POST['course_code']) && $_POST['course_code'] != '' && isset($_POST['course_name']) && $_POST['course_name'] != '' && isset($_POST['academic_pattern']) && $_POST['academic_pattern'] != '' && isset($_POST['no_of_sem_year']) && $_POST['no_of_sem_year'] != '')  {
	
	$course_code = get_safe_value($_POST['course_code']);
	$course_name = get_safe_value($_POST['course_name']);
	$academic_pattern = get_safe_value($_POST['academic_pattern']);
	$no_of_sem_year = get_safe_value($_POST['no_of_sem_year']);

	$res = mysqli_query($con,"SELECT * FROM branch WHERE branch_name = '$course_name' && branch_code = '$course_code' && academic_pattern = '$academic_pattern' && no_of_sem_year ='$no_of_sem_year'");

	if (mysqli_num_rows($res) > 0) {
		$arr = array('status'=>'exist');	
	}else{
		$insert_course = mysqli_query($con,"INSERT into branch(branch_name,branch_code,academic_pattern,no_of_sem_year,status) VALUES('$course_name','$course_code','$academic_pattern','$no_of_sem_year',1)");
		$arr = array('status'=>'success');
	}
	echo json_encode($arr);
}elseif (isset($_POST['fetch_courses'])) {
	$course_html = '';
	$res = mysqli_query($con,"SELECT * FROM branch");

	$course_html .= '';
	if (mysqli_num_rows($res) >0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$i = 1;

			$course_html .= '<tr >
                                <td contenteditable="true">'.$row['id'].'</td>
                                <td contenteditable="true">'.$row['branch_code'].'</td>
                                <td contenteditable="true">'.$row['branch_name'].'</td>
                                <td contenteditable="true"> '.$row['no_of_sem_year'].' '.$row['academic_pattern'].'</td>
                                <td><button class="btn btn-primary btn-default border-0 ">Edit</button> 
                                	<button class="ml-2 btn border-0 ">Delete</button>
                                </td>
                            </tr>';

            $i = $i + 1;                
		}

		$course_html .= '</table>';
		echo $course_html;
	}
}

