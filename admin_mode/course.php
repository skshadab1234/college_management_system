<?php
require 'admin_resuse_files/header.php';
?>

<div class="app-main__outer">
<div class="app-main__inner" >

<?php
if (isset($_GET['action']) && $_GET['action']!=''  && $_GET['action']=='viewall') {

	if (isset($_GET['delete_course'])  && $_GET['delete_course']>0) {
      $delete_course_id=get_safe_value($_GET['delete_course']);
      mysqli_query($con,"delete from branch where id='$delete_course_id'");
      redirect('course'.PHP_EXT.'?action=viewall');
    }
?>
					<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Course's 
                                </div>
									
                            </div>
                         </div>
                    </div>


                   
					<div class="main-card mb-3 card" >
                            <div class="card-body">
                                <table style="width: 100%;" class="table table-hover text-center table-striped table-bordered"><thead>                                    
									<tr>
                                        <th>Sr.No</th>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Course Duration</th>
                                        <th>Setting</th>
                                    </tr>
                                 </thead>
                                  <tbody id="dump_courses_here">
                                  	<?php
                                  	$res = mysqli_query($con,"SELECT * FROM branch");

									if (mysqli_num_rows($res) >0) {
										while ($row = mysqli_fetch_assoc($res)) {
											?><tr>
					                                <td><?= $row['id'] ?></td>
					                                <td><?= $row['branch_code']?></td>
					                                <td><?= $row['branch_name']?></td>
					                                <td> <?= $row['no_of_sem_year'].' '.$row['academic_pattern']?></td>
					                                <td>	
							                          <a class="btn btn-info btn-sm" href="course?action1=new_course&id=<?= $row['id'] ?>">
							                              <i class="fas fa-pencil-alt">
							                              </i>
							                              Edit
							                          </a>
							                          <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="remove_course('<?php echo $row['branch_name'] ?>', '<?= $row['id']?>')">
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
						<a href="course?action1=new_course" style="position: fixed;right: 20px;bottom: 120px;"><i class="pe-7s-plus" style="font-size: 2rem;background: #0C9;padding: 14px;border-radius: 50%;color: #fff;"></i></a>   		
                    

<?php
}elseif (isset($_GET['action1']) && $_GET['action1']!='' && $_GET['action1']=='new_course') {
	$course_name = '';
	$course_code = '';
	$id = '';
	$academic_pattern = '';
	$no_of_sem_year = '';

	if(isset($_GET['id']) && $_GET['id']>0){
		$id=get_safe_value($_GET['id']);
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from branch where id='$id'"));
        $course_name = $row['branch_name'];
        $course_code = $row['branch_code'];
        $academic_pattern = $row['academic_pattern'];
        $no_of_sem_year = $row['no_of_sem_year'];

	}

	if(isset($_POST['upload_new_course']))
	{
		$course_name = get_safe_value($_POST['course_name']);
		$course_code = get_safe_value($_POST['course_code']);
		$academic_pattern = get_safe_value($_POST['academic_pattern']);
		$no_of_sem_year = get_safe_value($_POST['no_of_sem_year']);

	if($id==''){
	    $sql = "select * from branch where branch_name = '$course_name' && branch_code = '$course_code' && academic_pattern = '$academic_pattern && no_of_sem_year = $no_of_sem_year'";
	  }else{
	    $sql="select * from branch where branch_name = '$course_name' and id!='$id'";
	  }

	  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
	    $_SESSION['error_data_exist'] = "Course Eixsts";
	  }else {
	    if($id==''){
	    	mysqli_query($con,"INSERT into branch(branch_name,branch_code,academic_pattern,no_of_sem_year,status) VALUES('$course_name','$course_code','$academic_pattern','$no_of_sem_year',1)");
	    	redirect('course?action=viewall');
	    }else{
	    	mysqli_query($con,"UPDATE branch SET branch_name = '$course_name', branch_code = '$course_code', academic_pattern = '$academic_pattern', no_of_sem_year='$no_of_sem_year' WHERE id='$id'");

	    	redirect('course?action=viewall');
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
	            <div>Add New Course 
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
              <form id="add_new_course" method="post" name="add_new_course">
                <div class="card-body">
                  <div class="row">
                  	  <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="course_code">Course Code</label>
                        <input type="text" name="course_code" class="form-control" id="course_code" placeholder="Course Code" value="<?= $course_code ?>">
                      </div>

                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="course_name">Course Name</label>
                        <input type="text" name="course_name" class="form-control" id="course_name" placeholder="Course Name" value="<?= $course_name ?>">
                      </div>


                       <div class="col-sm-12 col-md-6 mt-2 form-group">
                       	<label for="academic_pattern">Academic Pattern</label>
							<select name="academic_pattern" id="academic_pattern" class="form-control select2">
								<?php
									$academic_pattern_arr = array('Year','Semester');
									foreach ($academic_pattern_arr as $key => $value) {
										if ($row['academic_pattern'] == $value) {
											?>
												<option value="<?= $value ?>" selected=""><?= $value ?></option>
											<?php
										}else{
											?>
											<option value="<?= $value ?>"><?= $value ?></option>
											<?php
										}
										
									}
								?>
	                        </select>
						</div>


                       <div class="col-sm-12 col-md-6 mt-2 form-group">
                       	<label for="no_of_sem_year">No of Semester / Year</label>
							<select name="no_of_sem_year" id="no_of_sem_year" class="form-control select2">

							<?php
								for ($i=1; $i <= 10 ; $i++) { 
									if ($row['no_of_sem_year'] == $i) {
										?>
											<option value="<?= $i ?>" selected=""><?= $i ?></option>
										<?php
									}else{
										?>
											<option value="<?= $i ?>"><?= $i ?></option>
										<?php
									}
								}
							?>

							</select>
						</div>
                  </div>   
			     <div class="card-footer">
                  <button type="submit" name="upload_new_course" class="btn btn-primary float-right">Save</button>
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
  $("form[name='add_new_course']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      
      course_code: {
        required: true,
        rangelength: [2, 6],
      },
      course_name: {
        required: true,
        rangelength: [2, 255],
      },
    },
    // Specify validation error messages
    messages: {
      course_name: {
      	 rangelength: "Enter Correct Course Name",
      },
      course_code: {
      	 rangelength: "Enter Correct Course Code",
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

	function remove_course(branch_name,id){
      var result=confirm('Do you want to delete '+branch_name+'?');
      if(result==true){
        var cur_path=window.location.href;
        window.location.href=cur_path+"&delete_course="+id;
      }
    }

</script>
