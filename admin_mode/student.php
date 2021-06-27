<?php
require 'admin_resuse_files/header.php';
include ('../smtp/PHPMailerAutoload.php');
?>
<style>
.dtr-title{
	font-weight: 700;
	position: absolute;
	left: 10px
}
.dtr-data{
	position: absolute;
	right: 10px;
}
.dtr-details{
	position: relative;
}

td.child{
	line-height: 50px;
}

@media (max-width: 991.98px){
	.dtr-control{
	position: relative;
	}
	.dtr-control::before{
		content: '';
	    position: absolute;
	    left: 44%;
	    width: 10px;
	    height: 10px;
	    background: steelblue;
	    top: 65%;
	    border-radius: 50%;
	}	
}

</style>
<div class="app-main__outer">
<div class="app-main__inner" >

<?php
if (isset($_GET['action']) && $_GET['action']!=''  && $_GET['action']=='viewall') {

if (isset($_GET['delete_student'])  && $_GET['delete_student']!= '') {
  $delete_student=get_safe_value($_GET['delete_student']);
  mysqli_query($con,"delete from student_login where student_email='$delete_student'");
  redirect('student'.PHP_EXT.'?action=viewall');
}
?>
				<div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
                            </div>
                            <div>Student 
                            </div>
								
                        </div>
                     </div>
                </div>
				<div class="main-card mb-3 card table-responsive">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table-responsive table table-hover text-center table-striped table-bordered"><thead>                                    
								<tr>
                                    <th width="2%">Sr.No</th>
                                    <th width="5%">Enroll No</th>
                                    <th width="20%">Student Details</th>
                                    <th width="5%">Student Family Details</th>
                                    <th width="10%">Address</th>
                                    <th width="5%">Image</th>
                                    <th width="5%">Branch</th>
                                    <th width="10%">Semester</th>
                                    <th width="15%">Admission Date</th>
                                    <th width="15%">Status</th>
                                    <th width="20%">Settings</th>
                                </tr>
                             </thead>
                              <tbody>
                              	<?php
                              	
								$res = mysqli_query($con, "SELECT *,student_login.id as sid FROM `student_login` LEFT JOIN branch ON student_login.BRANCH = branch.id");

								if (mysqli_num_rows($res) >0) {
									foreach ($res as $key => $value) {
										$key+=1;
										?><tr>
				                                <td><?= $key ?></td>
				                                <td><?= $value['enroll_no']?></td>
				                                <td>
					                                <table class="table  text-center table-striped">
					                                	
					                                	<tbody>
						                                	<tr>
                                                <th>Name</th>
							                                	<td><?= $value['firstname'].' '.$value['last_name']?></td>
                                              </tr>
							                                	<tr>
                                                  <th>DOB</th>
                                                  <td><?= $value['STUDENT_DOB'] ?></td>        
                                                </tr> 
                                                <tr>
                                                    <th>Email</th>
                                                  <td><?= $value['student_email'] ?></td>
                                                </tr>

                                                <tr>
                                                  <th>Mob Number</th>
                                                  <td><?= $value['student_phone'] ?></td>  
                                                </tr>
                                                
                                                <tr>
                                                  <th>Gender</th>  
                                                  <td><?= $value['GENDER'] ?></td>
                                                </tr>

                                                <tr>
                                                  <th>Place Of Birth</th>
                                                  <td><?= $value['PLACEOFBIRTH'] ?></td>
                                                </tr>
							                                </tr>
						                                </tbody>
					                                </table>
				                            	</td>
                                      <td>
                                          <table class="table  text-center table-striped">
                                            <tbody>
                                              <tr>
                                                <th>Father Name</th>
                                                <td><?= $value['FATHERNAME'] ?></td>
                                               </tr> 
                                               <tr>
                                                <th>Father Mob Number</th>
                                                <td><?= $value['FATHERMOBILEPHONE'] ?></td>
                                               </tr>

                                               <tr>
                                                <th>Father Profession</th>
                                                <td><?= $value['FATHERPROFESSION'] ?></td>
                                               </tr>

                                               <tr>
                                                <th>Mother Name</th>
                                                <td><?= $value['MOTHERNAME'] ?></td>
                                               </tr>

                                               <tr>
                                                <th>Mother Mob Number</th>
                                                <td><?= $value['MOTHERMOBILEPHONE'] ?></td>
                                               </tr>

                                               <tr>
                                                <th>Mother Profession</th>
                                                  <td><?= $value['MOTHERPROFESSION'] ?></td>
                                               </tr>
                                              </tr>
                                            </tbody>
                                          </table>
                                      </td>
				                                <td> <?= $value['ADDRESS'] ?></td>
				                                <td><?php
				                                if ($value['picture_link'] != '') {
				                                	?>
													<a href="<?= FRONT_SITE_IMAGE_STUDENT.'/'.$value['picture_link'] ?>" target="_blank">
							                          <img src="<?= FRONT_SITE_IMAGE_STUDENT.'/'.$value['picture_link'] ?>"  style="width: 50px;height: 50px;object-fit: cover;object-position: center;border-radius: 50%;">
							                         </a>
				                                	<?php
				                                }else{
				                                	?>
				                                		<i class="pe-7s-add-user" style="font-size: 30px"></i>
				                                	<?php
				                                }
				                                ?> </td>
				                                <td> <?= $value['branch_name'] ?></td>
				                                <td> <?= $value['semester'] ?> Semester</td>
				                                <td><?= date('d M, Y', strtotime($value['added_on'])) ?></td>
                                        <td>
                                          <?php
                                            if ($value['student_status'] == 1) {
                                              ?>
                                              <button class="btn btn-success">Active</button>
                                              <?php
                                            }else{
                                              ?>
                                                <button class="btn btn-danger">Not Active</button>
                                              <?php
                                            }
                                          ?>
                                        </td>
				                                <td>	
						                          <a class="btn btn-info btn-sm" href="student?action1=new_student&id=<?= $value['student_email'] ?>">
						                              <i class="fas fa-pencil-alt">
						                              </i>
						                              Edit
						                          </a>
						                          <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="remove_student('<?php echo $value['firstname'] ?>','<?php echo $value['last_name'] ?>','<?= $value['student_email']?>')">
						                              <i class="fas fa-trash">
						                              </i>
						                              Delete
						                          </a>
				                                </td>
				                            </tr>
										<?php
							                         
									}
								}
                              	?>
                              </tbody>
                          </table>
                        </div>
                </div>
					<a href="student?action1=new_student" style="position: fixed;right: 20px;bottom: 120px;"><i class="pe-7s-plus" style="font-size: 2rem;background: #0C9;padding: 14px;border-radius: 50%;color: #fff;"></i></a>   		
                

<?php
}elseif (isset($_GET['action1']) && $_GET['action1']!='' && $_GET['action1']=='new_student') {
$ran = rand(1111,9999);
$count_admit=mysqli_fetch_assoc(mysqli_query($con,"select COUNT(*) as total_admit from student_login"));
$count_admit= $count_admit['total_admit'] + 1;
$enroll_no = 'CSN'.$ran;
$firstname = '';
$last_name = '';
$student_email = '';
$STUDENT_DOB = '';
$student_phone = '';
$FATHERNAME = '';
$FATHERMOBILEPHONE = '';
$FATHERPROFESSION = '';
$MOTHERNAME = '';
$MOTHERMOBILEPHONE = '';
$MOTHERPROFESSION = '';
$GENDER = '';
$PLACEOFBIRTH = '';
$ADDRESS = '';
$DEPARTMENT = '';
$BRANCH = '';
$semester = '';
$id = '';
$page_type = 'Add New STUDENT';
$picture_link = "";
$image_status= "required";  

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($_GET['id']);
	$image_status='';
  $row=mysqli_fetch_assoc(mysqli_query($con,"select * from student_login where student_email='$id'"));
	$count_admit = $row['Admission_NO'];
  $enroll_no = $row['enroll_no'];
  $firstname = $row['firstname'];
  $last_name = $row['last_name'];
  $student_email = $row['student_email'];
  $STUDENT_DOB = $row['STUDENT_DOB'];
  $student_phone = $row['student_phone'];
  $FATHERNAME = $row['FATHERNAME'];
  $FATHERMOBILEPHONE = $row['FATHERMOBILEPHONE'];
  $FATHERPROFESSION = $row['FATHERPROFESSION'];
  $MOTHERNAME = $row['MOTHERNAME'];
  $MOTHERMOBILEPHONE = $row['MOTHERMOBILEPHONE'];
  $MOTHERPROFESSION = $row['MOTHERPROFESSION'];
  $GENDER = $row['GENDER'];
  $PLACEOFBIRTH = $row['PLACEOFBIRTH'];
  $ADDRESS = $row['ADDRESS'];
  $DEPARTMENT =$row['DEPARTMENT'];
  $BRANCH = $row['BRANCH'];
  $semester = $row['semester'];
	$page_type = 'Edit '.$firstname.' '.$last_name;
	$picture_link = $row['picture_link'];
}


if(isset($_POST['upload_new_student']))
{
  $count_admit = get_safe_value($_POST['count_admit']);
	$enroll_no = get_safe_value($_POST['enroll_no']);
  $firstname = get_safe_value($_POST['firstname']);
  $last_name = get_safe_value($_POST['last_name']);
  $student_email = get_safe_value($_POST['student_email']);
  $STUDENT_DOB = get_safe_value($_POST['STUDENT_DOB']);
  $student_phone = get_safe_value($_POST['student_phone']);
  $FATHERNAME = get_safe_value($_POST['FATHERNAME']);
  $FATHERMOBILEPHONE = get_safe_value($_POST['FATHERMOBILEPHONE']);
  $FATHERPROFESSION = get_safe_value($_POST['FATHERPROFESSION']);
  $MOTHERNAME = get_safe_value($_POST['MOTHERNAME']);
  $MOTHERMOBILEPHONE = get_safe_value($_POST['MOTHERMOBILEPHONE']);
  $MOTHERPROFESSION = get_safe_value($_POST['MOTHERPROFESSION']);
  $GENDER = get_safe_value($_POST['GENDER']);
  $PLACEOFBIRTH = get_safe_value($_POST['PLACEOFBIRTH']);
  $ADDRESS = get_safe_value($_POST['ADDRESS']);
  $DEPARTMENT =get_safe_value($_POST['DEPARTMENT']);
  $BRANCH = get_safe_value($_POST['BRANCH']);
  $semester = get_safe_value($_POST['semester']);
	$picture_link=date("Y-m-d_his").'_'.$_FILES['picture_link']['name'];
	

if($id==''){
    $sql = "select * from student_login where student_email = '$student_email' && student_phone = '$student_phone' && enroll_no = '$enroll_no'";
  }else{
    $sql="select * from student_login where student_email= '$student_email' && id!=".$row['id']."";
  }

  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
    $_SESSION['error_data_exist'] = "Student Eixsts";

  }else {
    if($id==''){
    	move_uploaded_file($_FILES['picture_link']['tmp_name'],'../global_images/student_images/'.$picture_link);	
    	$student_password1= rand(111111,999999);
    	$student_password = password_hash($student_password1, PASSWORD_DEFAULT);
      $added_on = date('Y-m-d h:i:s a');
      mysqli_query($con,"INSERT into student_login(picture_link,Admission_NO,enroll_no,firstname,last_name,student_password,student_email,STUDENT_DOB,student_phone,FATHERNAME,FATHERMOBILEPHONE,FATHERPROFESSION,MOTHERNAME,MOTHERMOBILEPHONE,MOTHERPROFESSION,GENDER,PLACEOFBIRTH,ADDRESS,DEPARTMENT,BRANCH,semester,added_on,student_status) VALUES('$picture_link','$count_admit','$enroll_no','$firstname','$last_name','$student_password','$student_email','$STUDENT_DOB','$student_phone','$FATHERNAME','$FATHERMOBILEPHONE','$FATHERPROFESSION','$MOTHERNAME','$MOTHERMOBILEPHONE','$MOTHERPROFESSION','$GENDER','$PLACEOFBIRTH','$ADDRESS','$DEPARTMENT','$BRANCH','$semester','$added_on',1)");

    	$html = '<!doctype html>
<html lang="en-US">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<style type="text/css">
a:hover {
text-decoration: underline !important;
}
</style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
<!--100% body table-->
<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: " Open Sans ", sans-serif;">
<tr>
  <td>
    <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td style="height:80px;">&nbsp;</td>
      </tr>
      <tr>
        <td style="height:20px;">&nbsp;</td>
      </tr>
      <tr>
        <td>
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
            <tr>
              <td style="height:40px;">&nbsp;</td>
            </tr>
            <tr>
              <td style="padding:0 35px;">
                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:" Rubik ",sans-serif;">You Account has been Successfully Created</h1> <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                <p>Email id is '.$student_email.'</p>
                <p>Login id is '.$enroll_no.'</p>
                <p>Password is '.$student_password1.'</p>

               <p>Kindly Login With this Credntials and Update your password for a Safer Side</p>
               <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:24px;font-family:" Rubik ",sans-serif;">Thank You From Admin</h1>
            </tr>
            <tr>
              <td style="height:40px;">&nbsp;</td>
            </tr>
          </table>
        </td>
        <tr>
          <td style="height:20px;">&nbsp;</td>
        </tr>
        <tr>
          <td style="height:80px;">&nbsp;</td>
        </tr>
    </table>
  </td>
  </tr>
</table>
<!--/100% body table-->
</body>

</html>';
    	send_email($student_email,$html,'Congratulations Your Account Has Been Created','');
    	redirect('student?action=viewall');

    }else{
   	 $picture_link_update  ='';
      if($_FILES['picture_link']['name']!=''){
        $faculty_image_update=date("Y-m-d_his").'_'.$_FILES['picture_link']['name'];
        move_uploaded_file($_FILES['picture_link']['tmp_name'],'../global_images/student_images/'.$picture_link);
        $picture_link_update=", picture_link='$picture_link'";
       }
    	mysqli_query($con,"UPDATE student_login SET firstname = '$firstname',last_name='$last_name',student_email='$student_email',STUDENT_DOB='$STUDENT_DOB',student_phone='$student_phone',FATHERNAME='$FATHERNAME',FATHERMOBILEPHONE='$FATHERMOBILEPHONE',FATHERPROFESSION='$FATHERPROFESSION',MOTHERNAME='$MOTHERNAME',MOTHERMOBILEPHONE='$MOTHERMOBILEPHONE',MOTHERPROFESSION='$MOTHERPROFESSION',GENDER='$GENDER',PLACEOFBIRTH='$PLACEOFBIRTH',ADDRESS='$ADDRESS',DEPARTMENT='$DEPARTMENT',BRANCH='$BRANCH',semester='$semester' $picture_link_update WHERE student_email = '$student_email'");
      send_email($student_email,'Login and Check your Details are proper or Not..','Congratulations Your Account Has Been Updated','');
    	redirect('student?action=viewall');
    }	
}
}

?>

 <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
            </div>
            <div><?= $page_type ?>
            </div>
				
        </div>
     </div>
</div>

<div class="row">
      <!-- left column -->
      <div class="col-sm-12 col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
          <form id="add_new_student" method="post" name="add_new_student" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
              	  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="faculty_login_id">Admission No</label>
                    <input type="hidden" name="count_admit" value="<?= $count_admit ?>">
                    <input type="text" disabled="" class="form-control"  value="<?= $count_admit ?>">
                  </div>


                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="first_name">Student Image</label>
                    <input type="file" name="picture_link" class="form-control" id="picture_link" <?= $image_status ?>>
                    <?php
	                    if (isset($_GET['id']) && $_GET['id']!='') {
	                      if ($row['picture_link'] != '') {
		                      ?>
		                       <a href="<?= FRONT_SITE_IMAGE_STUDENT.'/'.$picture_link ?>" target="_blank">
		                          <img src="<?= FRONT_SITE_IMAGE_STUDENT.'/'.$picture_link ?>" width="30px">
		                         </a>
		                      <?php
		                    }
		                }
	                    ?>
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="enroll_no">Enroll Number</label>
                    <input type="hidden" name="enroll_no" value="<?= $enroll_no ?>">
                    <input type="text" class="form-control" disabled="" value="<?= $enroll_no ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" value="<?= $firstname ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name"  value="<?= $last_name ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="STUDENT_DOB">Dob</label>
                    <input type="text" name="STUDENT_DOB" class="form-control" id="STUDENT_DOB" placeholder="YYYY-MM-DD" value="<?= $STUDENT_DOB ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="student_email">Student Email</label>
                    <input type="text" name="student_email" class="form-control" id="student_email" placeholder="Student Email" value="<?= $student_email ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="student_phone">Student Mobille Number</label>
                    <input type="text" name="student_phone" class="form-control" id="student_phone"  placeholder="Student Mobille Number" value="<?= $student_phone ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="PLACEOFBIRTH">Student Place of Birth</label>
                    <input type="text" name="PLACEOFBIRTH" class="form-control" id="PLACEOFBIRTH" placeholder="Student Place of Birth" value="<?= $PLACEOFBIRTH ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="GENDER">Gender</label>
                    <input type="text" name="GENDER" class="form-control" id="GENDER" placeholder="MALE / FEMALE" value="<?= $GENDER ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="ADDRESS">Address</label>
                    <textarea name="ADDRESS" id="ADDRESS" class="form-control"><?= $ADDRESS ?></textarea>
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="DEPARTMENT">Department</label>
                    <!-- <input type="text" name="branch_id" class="form-control" id="branch_id" value="<?= $branch_id ?>">
                     -->
                     <select name="DEPARTMENT" id="DEPARTMENT" class="form-control">
                      <?php
                        $res_branch1 = mysqli_query($con,"SELECT * FROM branch where status = 1");
                        while ($row_branch1 = mysqli_fetch_assoc($res_branch1)) {
                          
                          if ($row_branch1['BRANCH'] == $row_branch1['id']) {
                            ?>
                                <option value="<?= $row_branch1['branch_name'] ?> Engineering" selected=""><?= $row_branch1['branch_name'] ?> Engineering</option>
                            <?php
                          }else{
                            ?>
                              <option value="<?= $row_branch1['branch_name'] ?> Engineering"><?= $row_branch1['branch_name'] ?> Engineering</option>
                            <?php
                          }
                          ?>
                          <?php
                        }
                      ?>
                     </select>
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="BRANCH">Branch Id</label>
                    <!-- <input type="text" name="branch_id" class="form-control" id="branch_id" value="<?= $branch_id ?>">
                     -->
                     <select name="BRANCH" id="BRANCH" class="form-control">
                     	<?php
                     		$res_branch = mysqli_query($con,"SELECT * FROM branch where status = 1");
                     		while ($row_branch = mysqli_fetch_assoc($res_branch)) {
                     			
                     			if ($row['BRANCH'] == $row_branch['id']) {
                     				?>
	                         			<option value="<?= $row_branch['id'] ?>" selected=""><?= $row_branch['branch_name'] ?></option>
                     				<?php
                     			}else{
                     				?>
                     					<option value="<?= $row_branch['id'] ?>"><?= $row_branch['branch_name'] ?></option>
                     				<?php
                     			}
                     			?>
                     			<?php
                     		}
                     	?>
                     </select>
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="semester">Semester</label>
                    <input type="text" name="semester" class="form-control" id="semester" placeholder="Semester" value="<?= $semester ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="FATHERNAME">Father Name</label>
                    <input type="text" name="FATHERNAME" class="form-control" id="FATHERNAME" placeholder="Name of Father" value="<?= $FATHERNAME ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="FATHERMOBILEPHONE">Father Mobile Number </label>
                    <input type="text" name="FATHERMOBILEPHONE" class="form-control" id="FATHERMOBILEPHONE" placeholder="Father Mobile Number" value="<?= $FATHERMOBILEPHONE ?>">
                  </div>

                   <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="FATHERPROFESSION">Father Profession</label>
                    <input type="text" name="FATHERPROFESSION" class="form-control" id="FATHERPROFESSION" placeholder="Father Profession" value="<?= $FATHERPROFESSION ?>">
                  </div>

                   <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="MOTHERNAME">Mother Name </label>
                    <input type="text" name="MOTHERNAME" class="form-control" id="MOTHERNAME" placeholder="Mother Name" value="<?= $MOTHERNAME ?>">
                  </div>


                   <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="MOTHERMOBILEPHONE">Mother Mobile Number</label>
                    <input type="text" name="MOTHERMOBILEPHONE" class="form-control" id="MOTHERMOBILEPHONE" placeholder="Mother Mobile Number" value="<?= $MOTHERMOBILEPHONE ?>">
                  </div>


                   <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="MOTHERPROFESSION">Mother Profession</label>
                    <input type="text" name="MOTHERPROFESSION" class="form-control" id="MOTHERPROFESSION" placeholder="Mother Profession" value="<?= $MOTHERPROFESSION ?>">
                  </div>

              </div>   
		     <div class="card-footer">
              <button type="submit" name="upload_new_student" class="btn btn-primary float-right">Save</button>
            </div>
          </form>

<?php
}

else{
redirect(FRONT_SITE_PATH_ADMIN);
}
?>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.all.min.js"></script>

<?php
require 'admin_resuse_files/footer.php';
?>


<script>
// Wait for the DOM to be ready
$(function() {

// Initialize form validation on the registration form.
// It has the name attribute "registration"
$("form[name='add_new_student']").validate({
// Specify validation rules
rules: {
  // The key name on the left side is the name attribute
  // of an input field. Validation rules are defined
  // on the right side
  picture_link: {
    extension: "png|jpg|jpeg",
  },	 
  firstname: {
    required: true,
    rangelength: [3, 20],
  },
  last_name: {
    required: true,
    rangelength: [3, 20],
  },
  STUDENT_DOB:{
	  	required: true,
      dateISO: true
  },
  student_email:{
  	required: true,
  	email: true
  },
  student_phone:{
  	required: true,
  	rangelength:[9,10]
  },
  student_phone:{
  	required:true,
  	rangelength:[2,20]
  },
  GENDER:{
  	required:true,
  	rangelength:[4,6]
  },
  PLACEOFBIRTH:{
    required:true,
    rangelength:[4,20]
  },
  ADDRESS:{
    required:true,
    rangelength:[20,50]
  },
  semester:{
    required:true,
    rangelength:[1,2]
  },
  FATHERNAME:{
    required:true,
    rangelength:[4,40]
  },
  FATHERMOBILEPHONE:{
    required:true,
    rangelength:[4,40]
  },
  FATHERPROFESSION:{
    required:true,
    rangelength:[4,40]
  },
  MOTHERNAME:{
    required:true,
    rangelength:[4,40]
  },
  MOTHERMOBILEPHONE:{
    required:true,
    rangelength:[4,40]
  },
  MOTHERPROFESSION:{
    required:true,
    rangelength:[4,40]
  },
  
},
// Specify validation error messages
messages: {
  picture_link: {
    required: "Please upload image",
    extension: "Please Select .png,.jpg,.jpeg only..."
  },
  student_email:{
  	email: 'Enter Correct Email'
  },
  student_phone:{
  	rangelength:'Enter Correct Mobile Number'
  },
  semester:{
  	rangelength:"Enter Correct Semester Number"
  },
  STUDENT_DOB:{
  	rangelength:"Enter Correct Date Of Birth"
  },
  ADDRESS:{
    rangelength:"Enter Correct Correct Address "
  },
},

    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }


});
});

function remove_student(first_name,last_name,student_email){
  var result=confirm('Do you want to delete '+first_name+' '+last_name+'?');
  if(result==true){
    var cur_path=window.location.href;
    window.location.href=cur_path+"&delete_student="+student_email;
  }
}

</script>
