<?php
require 'faculty_resuse_files/header.php';
?>

<!-- Content Wrapper. Contains page content -->
    
<div class="app-main__outer">
<div class="app-main__inner" >
 <?php
  if (isset($_GET['action']) && $_GET['action']!=''  && $_GET['action']=='viewall') {

    if (isset($_GET['delete_quiz'])  && $_GET['delete_quiz']>0) {
      $delete_quiz=get_safe_value($_GET['delete_quiz']);
      mysqli_query($con,"delete from quiz_question where id='$delete_quiz'");
      mysqli_query($con,"delete from quiz_choices where question_id='$delete_quiz'");
      redirect('quiz_master?action=viewall');
    }
    ?>
    
     <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Quiz Master
                </div>
					
            </div>
         </div>
    </div>

          <?php
            if (isset($_SESSION['error_data_exist'])) {
              echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-warning'></i> Error!</h4>
                    " . $_SESSION['error_data_exist'] . "
                  </div>";
                unset($_SESSION['error_data_exist']);
            }
            if (isset($_SESSION['success_data_exist'])) {
              echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fas fa-warning'></i> Success!</h4>
                    " . $_SESSION['success_data_exist'] . "
                  </div>";
                unset($_SESSION['success_data_exist']);
            }
            ?>

      <!-- Main content -->
            <div class="main-card mb-3 card table-responsive">
              <?php
           if (isset($_GET['get_quiz_date']) && $_GET['get_quiz_date'] != '') {
            $get_quiz_date = get_safe_value($_GET['get_quiz_date']);
            $query = "&& quiz_date = '$get_quiz_date'";
            $title = 'List of Quiz Created On '.date('d M, Y', strtotime($get_quiz_date));
           }else{
            $query = '';
            $title = 'List of all Quiz Created By You';
           }
              ?>
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
                  <td><?= $value['question_marks'] ?></td>
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
            <!-- /.card -->
      <a href="quiz_master?action1=new_quiz" style="position: fixed;right: 20px;bottom: 120px;"><i class="pe-7s-plus" style="font-size: 2rem;background: #0C9;padding: 14px;border-radius: 50%;color: #fff;"></i></a>      
                


<!-- ======================================================================================================================================================== -->
<!-- add  New Employee -->


   <?php
    } else if (isset($_GET['action1']) && $_GET['action1']!='' && $_GET['action1']=='new_quiz') {
      $id='';
      $quiz_question_id = '';
      $quiz_topic = '';
      $question_name ='';
      $subject_name = '';
      $quiz_branch_id = '';
      $question_marks = '';
      $quiz_date = '';
      $quiz_start_time = '';
      $faculty_created_id = '';
      $correct_answer = '';

    if(isset($_GET['id']) && $_GET['id']>0){
        $id=get_safe_value($_GET['id']);
        $row=mysqli_fetch_assoc(mysqli_query($con,"select *from quiz_question where id='$id'"));
        $quiz_question_id = $row['quiz_question_id'];
        $quiz_topic = $row['quiz_topic'];
        $question_name = $row['question_name'];
        $faculty_created_id = $row['faculty_created_id'];
        $subject_name = $row['subject_name'];
        $quiz_branch_id = $row['quiz_branch_id'];
        $question_marks = $row['question_marks'];
        $quiz_date = $row['quiz_date'];
        $quiz_start_time = $row['quiz_start_time'];

     } 


    if(isset($_GET['delete_child']) && $_GET['delete_child']>0){
      $delete_child=get_safe_value($_GET['delete_child']);
      $id=get_safe_value($_GET['id']);
      mysqli_query($con,"delete from quiz_choices where id='$delete_child'");
      redirect('quiz_master?action1=new_quiz&id='.$id);
    }


  if(isset($_POST['upload_new_employee']))
  {
        $quiz_question_id = get_safe_value($_POST['quiz_question_id']);
        $quiz_topic = get_safe_value($_POST['quiz_topic']);
        $question_name = get_safe_value($_POST['question_name']);
        $faculty_created_id = $faculty_login['faculty_login_id'];
        $subject_name = get_safe_value($_POST['subject_name']);
        $quiz_branch_id = get_safe_value($_POST['quiz_branch_id']);
        $question_marks = get_safe_value($_POST['question_marks']);
        $quiz_date = get_safe_value($_POST['quiz_date']);
        $quiz_start_time = get_safe_value($_POST['quiz_start_time']);
        $correct_answer = get_safe_value($_POST['checkmark']);

   if($id==''){
      $sql="select * from quiz_question where question_name='$question_name' && quiz_date='$quiz_date'";
    }else{
      $sql="select * from quiz_question where question_name='$question_name' && id!='$id'";
    } 

  if(mysqli_num_rows(mysqli_query($con,$sql))>0){
      $_SESSION['error_data_exist'] = "Data Eixsts";
      redirect("quiz_master?action=viewall");
    }else {
      if($id==''){
         mysqli_query($con,"insert into quiz_question(quiz_question_id,question_name,faculty_created_id,subject_name,quiz_branch_id,quiz_topic,question_marks,quiz_date,quiz_start_time,status) values('$quiz_question_id','$question_name','$faculty_created_id','$subject_name','$quiz_branch_id','$quiz_topic','$question_marks','$quiz_date','$quiz_start_time','1')");
          $eid=mysqli_insert_id($con);

          if (isset($_POST['option'])) {
              $optionArr = $_POST['option'];
              

              foreach ($optionArr as $key => $val) {
                $optionArr_db = $val;
               
                mysqli_query($con,"insert into quiz_choices(question_id,correct_answer,choices) values('$eid','$correct_answer','$optionArr_db')");
                $_SESSION['success_data_exist'] =  $optionArr_db." Data Inserted";
              }  
          }
            if ($correct_answer != '') {
              redirect('quiz_master?action=viewall');
            }else{
              redirect('quiz_master?action1=new_quiz&id='.$id);
            }

        }
       else {

         $sql="update quiz_question set quiz_question_id ='$quiz_question_id',question_name='$question_name',faculty_created_id='$faculty_created_id',quiz_topic='$quiz_topic',subject_name='$subject_name',quiz_branch_id='$quiz_branch_id',question_marks='$question_marks',quiz_date='$quiz_date',quiz_start_time='$quiz_start_time' where id='$id'";

        // echo "<pre>";
        // print_r($sql);die();
          mysqli_query($con,$sql);

        
          if (isset($_POST['option']) || $_POST['choice_id'] ) {
            $optionNameArr = $_POST['option'];

            foreach($optionNameArr as $key=>$val){
                $optionName_db = $val;
                
            
            if(isset($_POST['choice_id'][$key])){
              $choice_id = $_POST['choice_id'];
              $did=$choice_id[$key];
              mysqli_query($con,"update quiz_choices set question_id='$id',correct_answer='$correct_answer',choices='$optionName_db' where id='$did'");
            }else{
              mysqli_query($con,"insert into quiz_choices(question_id,correct_answer,choices) values('$id','$correct_answer','$optionName_db')");
                }
            }
           }
          $_SESSION['success_data_exist'] = $question_name." Data Updatad";
          redirect('quiz_master?action=viewall');

       }
      }
     } 
      ?>
    
      <div class="container-fluid">
       <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?= 'Question No: '.$quiz_question_id ?></h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="<?= FRONT_SITE_PATH ?>">Home</a></li>
                  <li class="breadcrumb-item ">Quiz Master</li>
                  <li class="breadcrumb-item active"><?= 'Question No: '.$quiz_question_id ?></li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <div class="row">
          <!-- left column -->
          <div class="col-sm-12 col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              <form id="add_new_employee" method="post" action=""  name="add_new_employee">
                <div class="card-body">
                  <div class="row">
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="quiz_question_id">Question id</label>
                        <input type="text" name="quiz_question_id" class="form-control" id="quiz_question_id" placeholder="Add Question Id" value="<?= $quiz_question_id ?>">
                      </div>

                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="question_name">Question Name</label>
                        <input type="text" name="question_name" class="form-control" id="question_name" placeholder="Add Question" value="<?= $question_name ?>">
                      </div>

                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="quiz_topic">Question Topic</label>
                        <input type="text" name="quiz_topic" class="form-control" id="quiz_topic" placeholder="Question Topic" value="<?= $quiz_topic ?>">
                      </div>


                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="question_marks">Question Marks</label>
                        <input type="text" name="question_marks" class="form-control" id="question_marks" placeholder="Question Marks" value="<?= $question_marks ?>">
                      </div>


                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="quiz_date">Quiz Date</label>
                        <input type="text" name="quiz_date" class="form-control" id="quiz_date" placeholder="Question Date" value="<?= $quiz_date ?>">
                      </div>

                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="quiz_start_time">Quiz Start time</label>
                        <input type="text" name="quiz_start_time" class="form-control" id="quiz_start_time" placeholder="Question Start Time" value="<?= $quiz_start_time ?>">
                      </div>
                     
                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="subject_name">Select Subject</label>
                        <select name="subject_name" id="subject_name" class="form-control select2">
                          <option value="">Select</option>
                        <?php
                          $Subject_detail = array_filter(Subjects());
                          foreach ($Subject_detail as $key => $value) {
                            if ($value['id'] == $subject_name) {
                              ?>
                                <option value="<?= $value['id'] ?>" selected=""><?= $value['subject_name'] ?></option>
                              <?php
                            }else{
                              ?>
                                <option value="<?= $value['id'] ?>"><?= $value['subject_name'] ?></option>
                              <?php
                            }
                          }
                        ?>
                        </select>
                      </div>



                      <div class="col-sm-12 col-md-6 mt-2 form-group">
                        <label for="quiz_branch_id">Select Branch</label>
                        <select name="quiz_branch_id" id="quiz_branch_id" class="form-control select2">
                          <option value="">Select</option>
                        <?php
                          $Branch_detail = array_filter(Branch());
                          foreach ($Branch_detail as $key => $value) {
                            if ($value['id'] == $quiz_branch_id) {
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
                  </div>   


                  <?php
                    $quiz_choices=mysqli_query($con,"select * from quiz_choices where question_id='$id'");
                    $ii=1;
                    while($quiz_choices_row=mysqli_fetch_assoc($quiz_choices)){
                      
                    ?>
                      <div class="form-group">
                        <div class="row">
                           <input type="hidden" name="choice_id[]" value="<?php echo $quiz_choices_row['id']?>">
                          <div class="col-sm-2 col-md-2 mt-2 form-group">
                      <?php
                      if ($quiz_choices_row['correct_answer']==$quiz_choices_row['choices']) {
                       ?>
                        <input type="radio" name="checkmark" checked="" value="<?= $quiz_choices_row['choices'] ?>" class="form-control">
                       <?php 
                      }else{
                        ?>
                          <input type="radio" name="checkmark" value="<?= $quiz_choices_row['choices'] ?>" class="form-control">

                        <?php
                      }
                      ?>
                          </div>
                          <div class="col-sm-10 col-md-8 mt-2 form-group">
                            <label for="option">Option <?= $ii ?></label>
                            <input placeholder="Ex: Sohail Khan" name="option[]" class="form-control left" id="option" required value="<?php echo $quiz_choices_row['choices']?>">
                          </div>
                          <div class="col-sm-12 col-md-2">
                            <button type="button" class="btn badge-danger float-right" style="margin-top:34px;" onclick="remove_more_new('<?php echo $quiz_choices_row['id']?>','<?= $quiz_choices_row['choices']?>')">Remove</button>
                          </div>
                        </div>
                      </div>
                    <?php
                    $ii++;
                      }
                    ?>
                    <div id="add_new_child_field"></div>
                  <button type="button" class="btn badge-danger mr-2" onclick="add_more()">Add Option</button>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="upload_new_employee" class="btn btn-primary float-right">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
        </div>
        <!-- /.row -->        
      </div>
            <!-- /.card -->
      <input type="hidden" id="add_more" value="0"/>
    </div>
   <?php
      }else
      { redirect(FRONT_SITE_PATH_TEACHER); }
    ?>


    </div>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "fixedHeader": true,
        "responsive": true,
        "autoWidth": true,
    } );

    $(".btnsk").click(function () {
    //Hide all other elements other than printarea.
    $(this).hide();
    $("#btnsk").hide();
    $(".main-footer").hide();
    $("#printarea").show();
    window.print();
    $(this).show();
    $("#btnsk").show();
    $(".main-footer").show();
});
});

  function add_more(){
      var add_more=jQuery('#add_more').val();
      add_more++;
      jQuery('#add_more').val(add_more);
      var html='<div class="form-group" id="box'+add_more+'"><div class="row"><div class="col-sm-12 col-md-8 mt-2 form-group"><label for="option">Option '+add_more+'</label><input placeholder="Ex: Sohail Khan" name="option[]" class="form-control left" id="option" required></div><div class="col-sm-12 col-md-2"><button type="button" class="btn badge-danger float-right" style="margin-top:34px;" onclick=remove_more("'+add_more+'")>Remove</button></div></div></div>';
      jQuery('#add_new_child_field').append(html);
    }

    function remove_more(id){
      jQuery('#box'+id).remove();
    }

    function remove_more_new(id,opt_name){
      var result=confirm('Are you sure to delete '+opt_name+' ?');
      if(result==true){
        var cur_path=window.location.href;
        window.location.href=cur_path+"&delete_child="+id;
      }
    }

     function remove_question(question_name,id){
      var result=confirm('Do you want to delete '+question_name+'?');
      if(result==true){
        var cur_path=window.location.href;
        window.location.href=cur_path+"&delete_quiz="+id;
      }
    }
</script>
</script>


<?php
require 'faculty_resuse_files/footer.php';
?>