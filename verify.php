<?php

require 'reuseable_files/database.inc.php';
 
if (isset($_POST['enroll_no']) && isset($_POST['password'])) {
	$enroll_no = $_POST['enroll_no'];
	$password = $_POST['password'];
			$query = "SELECT * FROM student_login WHERE enroll_no = '$enroll_no'";  
           $result = mysqli_query($con, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_assoc($result))  
                {  
                     if(password_verify($password, $row["password"])) 
                     {  
                          $_SESSION["enroll_no"] = $enroll_no; 
                          $_SESSION["STD_ID"] = $row['id'];  
                            $arr=array('status'=>'success','msg'=>'Wait a minute....redirecting','field'=>'signup_success');
                     }  
                     else  
                     {  
                          //return false;  
                     $arr=array('status'=>'error','msg'=>'Email or Password is incorredt','field'=>'password_error');
                     }  
                }  
           } 
echo json_encode($arr);

}elseif(isset($_POST['facultyIdNo']) && isset($_POST['password'])){
  $facultyIdNo = $_POST['facultyIdNo'];
  $password = $_POST['password'];
      $query = "SELECT * FROM faculty_login WHERE faculty_login_id = '$facultyIdNo'";  
           $result = mysqli_query($con, $query);  

           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_assoc($result))  
                {
                           $_SESSION["FAC_ID"] = $facultyIdNo;    
                            $arr=array('status'=>'success','msg'=>'Wait a minute....redirecting','field'=>'signup_success');
                        echo json_encode($arr); 
                }  
           } 

  
}

