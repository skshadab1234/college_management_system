<?php
require 'faculty_resuse_files/header.php';
?>


<div class="app-main__outer">
<div class="app-main__inner">
	   <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                	Quiz Responses
                </div>
            </div>
         </div>
    </div>

    <?php
    	if (isset($_GET['get_quiz_date']) && $_GET['get_quiz_date'] != '') {
    		$get_quiz_date = get_safe_value($_GET['get_quiz_date']);
            $query = "&& quiz_date = '$get_quiz_date'";
            $title = 'List of Quiz Created On '.date('d M, Y', strtotime($get_quiz_date));
            ?>

            	<div class="main-card mb-3 card table-responsive">
              <div class="card-header p-2 pt-3">
                <h3 class="card-title"><?= $title ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
               <table id="example" class="table text-center	table-bordered dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="example1_info" style="width:100%">
              <thead>
                  <tr>
                      <th style="width: 5%" >Sr.No</th>
                      <th style="width: 20%">Question Name</th>
                        <th style="width: 10%">Subject Name</th>
                      <th style="width: 10%">Branch</th>
                      <th style="width: 15%">Quiz Topic</th>
                      <th style="width: 10%">Quiz Marks</th>
                      <th style="width: 10%">Date</th>
                      <th style="width: 20%">Settings</th>
                  </tr>
              </thead>
              <tbody>
           
           <?php
          
           $sql = "SELECT *,quiz_question.id as qid,subject.id as sid FROM `quiz_question` LEFT JOIN subject ON quiz_question.subject_name = subject.id LEFT JOIN branch ON quiz_question.quiz_branch_id = branch.id WHERE faculty_created_id='".$faculty_login['faculty_login_id']."' $query";
           
           $resullt = mysqli_query($con,$sql);
           if (mysqli_num_rows($resullt) > 0) {
           	foreach ($resullt as $key => $value) {
              ?>
                <tr role="row" class="odd">
                  <td><?= $key+=1 ?></td>
                  <td><?= $value['question_name'] ?></td>
                  <td><?= $value['subject_name'] ?></td>
                  <td><?= $value['branch_name']?></td>
                  <td><?= $value['quiz_topic']?></td>
                  <td><?= pr(totalmarksQuestion($value['sid'],date('Y-m-d',strtotime($value['quiz_date'])))) ?></td>
                  <td><?= date('d M, Y', strtotime($value['quiz_date'])) ?></td>
                  
                   <td class="project-actions">
                          <a class="btn btn-info btn-sm" href="quiz_master?action1=new_quiz&id=<?= $value['qid'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#" onclick="remove_question('<?php echo $value['question_name'] ?>', '<?= $value['qid']?>')">
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
              <!-- /.card-body -->
            </div>
            <?php
    	}else{
    		?>

    			<form action="">
    				<div class="row">
    					<div class="col-sm-12 col-md-6">
    						<div class="form-group">
		    					<label for="">Quiz Topic</label>
		    					<select name="" id="" class="form-control">
		    						<option value="">1</option>
		    						<option value="">1</option>
		    						<option value="">1</option>
		    					</select>
		    				</div>
    					</div>

    					<div class="col-sm-12 col-md-6">
    						<div class="form-group">
		    					<label for="">Quiz Date</label>
		    					<input type="text" name="quiz_date" class="form-control">
		    				</div>
    					</div>
    				</div>
    			</form>
    		<?php
    	}
    ?>

    

<?php
require 'faculty_resuse_files/footer.php';
?>
