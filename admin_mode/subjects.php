<?php
require 'admin_resuse_files/header.php';
?>

<div class="app-main__outer">
<div class="app-main__inner" >

<?php
if (isset($_GET['action']) && $_GET['action']!=''  && $_GET['action']=='viewall') {
	if (isset($_GET['delete_subject'])  && $_GET['delete_subject']!='') {

      $delete_subject_code=get_safe_value($_GET['delete_subject']);
      mysqli_query($con,"delete from subject where subject_code='$delete_subject_code'");
      redirect('subjects'.PHP_EXT.'?action=viewall');
    }
?>
					<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-notebook icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Subject's 
                                </div>
									
                            </div>
                         </div>
                    </div>


                   
					<div class="main-card mb-3 card" >
                            <div class="card-body">
                                <table style="width: 100%;" id="example" class="table table-hover text-center table-striped table-bordered"><thead>                                    
									<tr>
                                        <th>Sr.No</th>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Subject Type</th>
                                        <th>Scheme</th>
                                        <th>Subject Semester</th>
                                        <th>Subject Branch</th>
                                        <th>Theory / Practical Marks</th>
                                        <th>Setting</th>
                                    </tr>
                                 </thead>
                                  <tbody id="dump_courses_here">
                                  	<?php
                                  	$res = mysqli_query($con,"SELECT *,subject.id as sid FROM subject LEFT JOIN branch ON subject.branch_id = branch.id");

									if (mysqli_num_rows($res) >0) {
										foreach ($res as $key => $row) {
											?><tr>
					                                <td><?= $key+=1 ?></td>
					                                <td><?= $row['subject_code']?></td>
					                                <td><?= $row['subject_name'].' ('.$row['subject_alias'].')'?></td>
					                                <td> <?= $row['subject_type'] ?></td>
					                                <td> <?= $row['scheme'].' Scheme' ?></td>
					                                <td> <?= $row['semester'] ?></td>
					                                <td> <?= $row['branch_name'] ?></td>
					                                <td> <?= $row['Theory_marks'].' / '.$row['practical_marks'] ?></td>
					                                <td>	
							                          <a class="btn btn-info btn-sm" href="subjects?action1=new_subject&id=<?= $row['sid'] ?>">
							                              <i class="fas fa-pencil-alt">
							                              </i>
							                              Edit
							                          </a>
							                          <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="remove_subject('<?php echo $row['subject_name'] ?>', '<?= $row['subject_code']?>')">
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
						<a href="subjects?action1=new_subject" style="position: fixed;right: 20px;bottom: 120px;"><i class="pe-7s-plus" style="font-size: 2rem;background: #0C9;padding: 14px;border-radius: 50%;color: #fff;"></i></a>   		
                    

<?php
}elseif (isset($_GET['action1']) && $_GET['action1']!='' && $_GET['action1']=='new_subject') {
	$subject_name = '';
	$subject_alias = '';
	$semester = '';
	$branch_id = '';
	$subject_code = '';
	$subject_type = '';
	$scheme = '';
	$Theory_marks = '';
	$practical_marks = '';
	$id = '';

	if(isset($_GET['id']) && $_GET['id']>0){
		$id=get_safe_value($_GET['id']);
        $row=mysqli_fetch_assoc(mysqli_query($con,"select * from subject where id='$id'"));
        $subject_name = $row['subject_name'];
        $subject_alias = $row['subject_alias'];
        $semester = $row['semester'];
        $branch_id = $row['branch_id'];
        $subject_code = $row['subject_code'];
        $subject_type = $row['subject_type'];
        $scheme = $row['scheme'];
        $Theory_marks = $row['Theory_marks'];
		$practical_marks = $row['practical_marks'];

	}

	if(isset($_POST['upload_new_subject']))
	{
		$subject_name = get_safe_value($_POST['subject_name']);
		$subject_alias = get_safe_value($_POST['subject_alias']);
		$semester = get_safe_value($_POST['semester']);
		$branch_id = get_safe_value($_POST['branch_id']);
		$subject_code = get_safe_value($_POST['subject_code']);
		$subject_type = get_safe_value($_POST['subject_type']);
		$scheme = get_safe_value($_POST['scheme']);
		$Theory_marks = get_safe_value($_POST['Theory_marks']);
		$practical_marks = get_safe_value($_POST['practical_marks']);

	if($id==''){
	    $sql = "select * from subject where subject_name = '$subject_name' && subject_code = '$subject_code' && Theory_marks = '$Theory_marks && practical_marks = $practical_marks'";
	  }else{
	    $sql="select * from subject where subject_code = '$subject_code' and id!='$id'";
	  }

	  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
	    $_SESSION['error_data_exist'] = "Subject Eixsts";
	  }else {
	    if($id==''){
	    	mysqli_query($con,"INSERT into subject(subject_name,subject_alias,semester,branch_id,subject_code,subject_type,scheme,Theory_marks,practical_marks) VALUES('$subject_name','$subject_alias','$semester','$branch_id','$subject_code','$subject_type','$scheme','$Theory_marks','$practical_marks')");
	    	redirect('subjects?action=viewall');
	    }else{
	    	mysqli_query($con,"UPDATE subject SET subject_name = '$subject_name', subject_alias = '$subject_alias', semester = '$semester', branch_id='$branch_id', subject_code= '$subject_code', subject_type='$subject_type', scheme='$scheme', Theory_marks='$Theory_marks', practical_marks='$practical_marks' WHERE id='$id'");

	    	redirect('subjects?action=viewall');
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
	            <div>Add New Subject 
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
              <form id="upload_new_subject" method="post" name="upload_new_subject">
                <div class="card-body">
                  <div class="row">
                  	  <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="subject_name">Subject Name</label>
                        <input type="text" name="subject_name" class="form-control" id="subject_name" placeholder="Subject Name" value="<?= $subject_name ?>">
                      </div>

                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="subject_alias">Subject Alias</label>
                        <input type="text" name="subject_alias" class="form-control" id="subject_alias" placeholder="Subject Alias" value="<?= $subject_alias ?>">
                      </div>


                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="subject_code">Subject Code</label>
                        <input type="text" name="subject_code" class="form-control" id="subject_code" placeholder="Subject Code" value="<?= $subject_code ?>">
                      </div>

                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                       	<label for="subject_type">Subject type</label>
							<select name="subject_type" id="subject_type" class="form-control select2">
								<?php
									$subject_type_ch = array('Core','Optional');
									foreach ($subject_type_ch as $key => $value) {
										if ($row['subject_type'] == $value) {
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
                       	<label for="scheme">Subject Scheme</label>
							<select name="scheme" id="scheme" class="form-control select2">
								<?php
									for ($x = ord('A'); $x <= ord('Z'); $x++){
										if ($row['scheme'] == chr($x)) {
											?>
												<option value="<?= chr($x) ?>" selected=""><?= chr($x) ?></option>
											<?php
										}else{
											?>
											<option value="<?= chr($x) ?>"><?= chr($x) ?></option>
											<?php
										}
										
									}
								?>
	                        </select>
						</div>


                       <div class="col-sm-12 col-md-6 mt-2 form-group">
                       	<label for="semester">Semester</label>
							<select name="semester" id="semester" class="form-control select2">
								<?php
									$semester_pattern = array('1','2','3','4','5','6','7','8','9','10');
									foreach ($semester_pattern as $key => $value) {
										if ($row['semester'] == $value) {
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
                       	<label for="branch_id">Branch</label>
							<select name="branch_id" id="branch_id" class="form-control select2">

							<?php
									$res_branch = mysqli_query($con,'SELECT * FROM branch WHERE status = 1');
									foreach ($res_branch as $key => $value) {
										if ($row['branch_id'] == $value['id']) {
											?>
												<option value="<?= $value['id'] ?>" selected=""><?= $value['branch_name'] ?></option>
											<?php
										}else{
											?>
											<option value="<?= $value['id'] ?>"><?= $value['branch_name'] ?></option>
											<?php
										}
										
									}
								?>

							</select>
						</div>

						 <div class="col-sm-12 col-md-6 mt-2 form-group">
	                        <label for="Theory_marks">Theory marks</label>
	                        <input type="text" name="Theory_marks" class="form-control" id="Theory_marks" placeholder="Theory marks" value="<?= $Theory_marks ?>">
	                     </div>

	                      <div class="col-sm-12 col-md-6 mt-2 form-group">
	                        <label for="practical_marks">Practical Marks</label>
	                        <input type="text" name="practical_marks" class="form-control" id="practical_marks" placeholder="Practical Marks" value="<?= $practical_marks ?>">
	                      </div>
                  </div>   
			     <div class="card-footer">
                  <button type="submit" name="upload_new_subject" class="btn btn-primary float-right">Save</button>
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
  $("form[name='upload_new_subject']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      
      subject_name: {
        required: true,
        rangelength: [2, 50],
      },
      subject_alias: {
        required: true,
        rangelength: [2, 255],
      },
      subject_code: {
        required: true,
        rangelength: [2, 255],
      },
      Theory_marks: {
        required: true,
      },
      practical_marks: {
        required: true,
      },
    },
    // Specify validation error messages
    messages: {
      subject_name: {
      	 rangelength: "Enter Correct Subject Name",
      },
      subject_code: {
      	 rangelength: "Enter Correct Subject Code",
      },
      subject_alias: {
      	 rangelength: "Enter Correct Subject Alias",
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

	function remove_subject(subject_name,subject_code){
      var result=confirm('Do you want to delete '+subject_name+'?');
      if(result==true){
        var cur_path=window.location.href;
        window.location.href=cur_path+"&delete_subject="+subject_code;
      }
    }

</script>
