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

if (isset($_GET['delete_faculty'])  && $_GET['delete_faculty']!= '') {
  $delete_faculty=get_safe_value($_GET['delete_faculty']);
  mysqli_query($con,"delete from faculty_login where faculty_email='$delete_faculty'");
  redirect('faculty'.PHP_EXT.'?action=viewall');
}
?>
				<div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
                            </div>
                            <div>Faculty 
                            </div>
								
                        </div>
                     </div>
                </div>
				<div class="main-card mb-3 card table-responsive">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="   table-responsive table table-hover text-center table-striped table-bordered"><thead>                                    
								<tr>
                                    <th width="2%">Sr.No</th>
                                    <th width="5%">Login Id</th>
                                    <th width="20%">Persional Info</th>
                                    <th width="5%">Faculty Email</th>
                                    <th width="10%">Number</th>
                                    <th width="5%">Image</th>
                                    <th width="5%">Desgination</th>
                                    <th width="5%">Branch</th>
                                    <th width="10%">Salary</th>
                                    <th width="15%">Working</th>
                                    <th width="20%">Settings</th>
                                </tr>
                             </thead>
                              <tbody>
                              	<?php
                              	
								$res = mysqli_query($con, "SELECT *,faculty_login.id as fid FROM `faculty_login` LEFT JOIN branch ON faculty_login.branch_id = branch.id");

								if (mysqli_num_rows($res) >0) {
									foreach ($res as $key => $value) {
										$key+=1;
										?><tr>
				                                <td><?= $key ?></td>
				                                <td><?= $value['faculty_login_id']?></td>
				                                <td>
					                                <table class="table  text-center table-striped">
					                                	<thead>
					                                		<tr>
					                                			<th>Name</th>
					                                			<th>DOB</th>
					                                		</tr>
					                                	</thead>
					                                	<tbody>
						                                	<tr>
							                                	<td><?= $value['first_name'].' '.$value['middle_name'].' '.$value['last_name']?></td>
							                                	<td><?= date('d M, Y', strtotime($value['dob'])) ?></td>
							                                </tr>
						                                </tbody>
					                                </table>
				                            	</td>
				                                <td> <?= $value['faculty_email'] ?></td>
				                                <td> <?= $value['mb_number'] ?></td>
				                                <td><?php
				                                if ($value['faculty_image'] != '') {
				                                	?>
													<a href="<?= FRONT_SITE_IMAGE_TEACHER.'/'.$value['faculty_image'] ?>" target="_blank">
							                          <img src="<?= FRONT_SITE_IMAGE_TEACHER.'/'.$value['faculty_image'] ?>"  style="width: 50px;height: 50px;object-fit: cover;object-position: center;border-radius: 50%;">
							                         </a>
				                                	<?php
				                                }else{
				                                	?>
				                                		<i class="pe-7s-add-user" style="font-size: 30px"></i>
				                                	<?php
				                                }
				                                ?> </td>
				                                <td> <?= $value['desgination'] ?></td>
				                                <td> <?= $value['branch_name'] ?></td>
				                                <td> Rs. <?= number_format($value['salary'],1) ?></td>
				                                <td> <?= date('d M, Y', strtotime($value['joining_date'])) ?> - <?php 
				                                if ($value['leaving_date'] != '') {
				                                	echo date('d M, Y', strtotime($value['leaving_date']));
				                                }else{
				                                	
				                                }
				                                 ?></td>
				                                <td>	
						                          <a class="btn btn-info btn-sm" href="faculty?action1=new_faculty&id=<?= $value['faculty_email'] ?>">
						                              <i class="fas fa-pencil-alt">
						                              </i>
						                              Edit
						                          </a>
						                          <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="remove_course('<?php echo $value['first_name'] ?>','<?php echo $value['middle_name'] ?>', '<?php echo $value['last_name'] ?>','<?= $value['faculty_email']?>')">
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
					<a href="faculty?action1=new_faculty" style="position: fixed;right: 20px;bottom: 120px;"><i class="pe-7s-plus" style="font-size: 2rem;background: #0C9;padding: 14px;border-radius: 50%;color: #fff;"></i></a>   		
                

<?php
}elseif (isset($_GET['action1']) && $_GET['action1']!='' && $_GET['action1']=='new_faculty') {
$ran = rand(1111,9999);
$faculty_login_id = 'SK'.$ran;
$first_name = '';
$middle_name = '';
$last_name = '';
$dob = '';
$faculty_alias = '';
$faculty_email = '';
$mb_number = '';
$desgination = '';
$branch_id = '';
$salary = '';
$joining_date = '';
$leaving_date = '';
$id = '';
$page_type = 'Add New Faculty';
$faculty_image = "";
$image_status= "required";  

if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($_GET['id']);
	$image_status='';
    $row=mysqli_fetch_assoc(mysqli_query($con,"select * from faculty_login where faculty_email='$id'"));
	$faculty_login_id = $row['faculty_login_id'];
	$first_name = $row['first_name'];
	$middle_name = $row['middle_name'];
	$last_name = $row['last_name'];
	$dob = $row['dob'];
	$faculty_alias = $row['faculty_alias'];
	$faculty_email = $row['faculty_email'];
	$mb_number = $row['mb_number'];
	$desgination = $row['desgination'];
	$branch_id = $row['branch_id'];
	$salary = $row['salary'];
	$joining_date = $row['joining_date'];
	$leaving_date = $row['leaving_date'];
	$page_type = 'Edit '.$first_name.' '.$middle_name.' '.$last_name;
	$faculty_image = $row['faculty_image'];
}


if(isset($_POST['upload_new_faculty']))
{
	$faculty_login_id = get_safe_value($_POST['faculty_login_id']);
	$first_name = get_safe_value($_POST['first_name']);
	$middle_name = get_safe_value($_POST['middle_name']);
	$last_name = get_safe_value($_POST['last_name']);
	$dob = get_safe_value($_POST['dob']);
	$faculty_alias = get_safe_value($_POST['faculty_alias']);
	$faculty_email = get_safe_value($_POST['faculty_email']);
	$mb_number = get_safe_value($_POST['mb_number']);
	$desgination = get_safe_value($_POST['desgination']);
	$branch_id = get_safe_value($_POST['branch_id']);
	$salary = get_safe_value($_POST['salary']);
	$joining_date = get_safe_value($_POST['joining_date']);
	$leaving_date = get_safe_value($_POST['leaving_date']);
	$faculty_image=date("Y-m-d_his").'_'.$_FILES['faculty_image']['name'];
	

if($id==''){
    $sql = "select * from faculty_login where faculty_email = '$faculty_email' && mb_number = '$mb_number' && faculty_login_id = '$faculty_login_id'";
  }else{
    $sql="select * from faculty_login where faculty_email= '$faculty_email' && id!=".$row['id']."";
  }

  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
    $_SESSION['error_data_exist'] = "Faculty Eixsts";

  }else {
    if($id==''){
    	move_uploaded_file($_FILES['faculty_image']['tmp_name'],'../global_images/teacher_images/'.$faculty_image);	
    	$faculty_password1= rand(111111,999999);
    	$faculty_password = password_hash($faculty_password1, PASSWORD_DEFAULT);
    	mysqli_query($con,"INSERT into faculty_login(faculty_image,faculty_login_id,first_name,middle_name,last_name,dob,password,faculty_alias,faculty_email,mb_number,desgination,branch_id,salary,joining_date,leaving_date,status) VALUES('$faculty_image','$faculty_login_id','$first_name','$middle_name','$last_name','$dob','$faculty_password','$faculty_alias','$faculty_email','$mb_number','$desgination','$branch_id','$salary','$joining_date','$leaving_date',1)");

    	$html = '<!doctype html>
<html lang="en-US">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Reset Password Email Template</title>
<meta name="description" content="Reset Password Email Template.">
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
                <p>Email id is '.$faculty_email.'</p>
                <p>Login id is '.$faculty_login_id.'</p>
                <p>Password is '.$faculty_password1.'</p>

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
    	send_email($faculty_email,$html,'Congratulations Your Account Has Been Created','');
    	redirect('faculty?action=viewall');

    }else{
   	 $faculty_image_update  ='';
      if($_FILES['faculty_image']['name']!=''){
        $faculty_image_update=date("Y-m-d_his").'_'.$_FILES['faculty_image']['name'];
        move_uploaded_file($_FILES['faculty_image']['tmp_name'],'../global_images/teacher_images/'.$faculty_image);
        $faculty_image_update=", faculty_image='$faculty_image'";
       }
    	mysqli_query($con,"UPDATE faculty_login SET first_name = '$first_name',last_name='$last_name',middle_name='$middle_name',dob='$dob',faculty_alias='$faculty_alias',faculty_email='$faculty_email',mb_number='$mb_number',desgination='$desgination',branch_id='$branch_id',salary='$salary',joining_date='$joining_date',leaving_date='$leaving_date' $faculty_image_update WHERE faculty_email = '$faculty_email'");
    	send_email($faculty_email,'Login and Check your Details are proper or Not..','Congratulations Your Account Has Been Updated','');
    	redirect('faculty?action=viewall');
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
          <form id="add_new_faculty" method="post" name="add_new_faculty" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
              	  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="faculty_login_id">Faculty Login id</label>
                    <input type="hidden" name="faculty_login_id" value="<?= $faculty_login_id ?>">
                    <input type="text" disabled="" class="form-control"  value="<?= $faculty_login_id ?>">
                  </div>


                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="first_name">Faculty Image</label>
                    <input type="file" name="faculty_image" class="form-control" id="faculty_image" <?= $image_status ?>>
                    <?php
	                    if (isset($_GET['id']) && $_GET['id']!='') {
	                      if ($row['faculty_image'] != '') {
		                      ?>
		                       <a href="<?= FRONT_SITE_IMAGE_TEACHER.'/'.$faculty_image ?>" target="_blank">
		                          <img src="<?= FRONT_SITE_IMAGE_TEACHER.'/'.$faculty_image ?>" width="30px">
		                         </a>
		                      <?php
		                    }
		                }
	                    ?>
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?= $first_name ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Middle Name" value="<?= $middle_name ?>">
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name"  value="<?= $last_name ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="dob">Dob</label>
                    <input type="text" name="dob" class="form-control" id="dob" placeholder="YYYY-MM-DD" value="<?= $dob ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="faculty_alias">Faculty Alias</label>
                    <input type="text" name="faculty_alias" class="form-control" id="faculty_alias" placeholder="Faculty Alias" value="<?= $faculty_alias ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="faculty_email">Faculty Email</label>
                    <input type="text" name="faculty_email" class="form-control" id="faculty_email"  placeholder="email@email.com" value="<?= $faculty_email ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="mb_number">Mobile Number</label>
                    <input type="text" name="mb_number" class="form-control" id="mb_number" placeholder="Mobile Number" value="<?= $mb_number ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="desgination">Designation</label>
                    <input type="text" name="desgination" class="form-control" id="desgination" placeholder="Designation" value="<?= $desgination ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="branch_id">Branch Id</label>
                    <!-- <input type="text" name="branch_id" class="form-control" id="branch_id" value="<?= $branch_id ?>">
                     -->
                     <select name="branch_id" id="branch_id" class="form-control">
                     	<?php
                     		$res_branch = mysqli_query($con,"SELECT * FROM branch where status = 1");
                     		while ($row_branch = mysqli_fetch_assoc($res_branch)) {
                     			
                     			if ($row['branch_id'] == $row_branch['id']) {
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
                    <label for="salary">Salary</label>
                    <input type="text" name="salary" class="form-control" id="salary" placeholder="Salary" value="<?= $salary ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="joining_date">Joining Date</label>
                    <input type="text" name="joining_date" class="form-control" id="joining_date" placeholder="YYYY-MM-DD" value="<?= $joining_date ?>">
                  </div>
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="leaving_date">Leaving Date</label>
                    <input type="text" name="leaving_date" class="form-control" id="leaving_date" placeholder="YYYY-MM-DD" value="<?= $leaving_date ?>">
                  </div>

              </div>   
		     <div class="card-footer">
              <button type="submit" name="upload_new_faculty" class="btn btn-primary float-right">Save</button>
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
$("form[name='add_new_faculty']").validate({
// Specify validation rules
rules: {
  // The key name on the left side is the name attribute
  // of an input field. Validation rules are defined
  // on the right side
  faculty_image: {
    extension: "png|jpg|jpeg",
  },	 
  first_name: {
    required: true,
    rangelength: [3, 20],
  },
  middle_name: {
    required: true,
    rangelength: [3, 20],
  },
  last_name: {
    required: true,
    rangelength: [3, 20],
  },
  dob:{
	  	required: true,
    dateISO: true
  },
  joining_date:{
	  	required: true,
    dateISO: true
  },
  leaving_date:{
    dateISO: true
  },
  faculty_alias:{
  	required: true,
  	rangelength:[1,5]
  },
  faculty_email:{
  	required: true,
  	email: true
  },
  mb_number:{
  	required: true,
  	rangelength:[9,10]
  },
  desgination:{
  	required:true,
  	rangelength:[6,20]
  },
  salary:{
  	required:true,
  	rangelength:[4,6]
  }
},
// Specify validation error messages
messages: {
  faculty_image: {
    required: "Please upload image",
    extension: "Please Select .png,.jpg,.jpeg only..."
  },
  faculty_email:{
  	email: 'Enter Correct Email'
  },
  mb_number:{
  	rangelength:'Enter Correct Mobile Number'
  },
  desgination:{
  	rangelength:"Enter Correct Deignation Of Faculty"
  },
  salary:{
  	rangelength:"Enter Correct Salary Package "
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

function remove_course(first_name,last_name,middle_name,faculty_email){
  var result=confirm('Do you want to delete '+first_name+' '+middle_name+' '+last_name+'?');
  if(result==true){
    var cur_path=window.location.href;
    window.location.href=cur_path+"&delete_faculty="+faculty_email;
  }
}

</script>
