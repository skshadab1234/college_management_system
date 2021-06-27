<?php
   require 'admin_resuse_files/header.php';
   $get_sem = '';
   $get_branch = '';
   if (isset($_GET['get_sem']) && $_GET['get_sem']>0 && isset($_GET['get_branch']) && $_GET['get_branch']>0) {
     $get_sem = get_safe_value($_GET['get_sem']);
     $get_branch = get_safe_value($_GET['get_branch']);
   }
   ?>

<style>
	@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400);
.blue {
  background: #3498db;
}

.purple {
  background: #9b59b6;
}

.navy {
  background: #34495e;
}

.green {
  background: #2ecc71;
}

.red {
  background: #e74c3c;
}

.orange {
  background: #f39c12;
}

.cs335, .cs426, .md303, .md352, .md313, .cs240 {
  font-weight: 700;
  color: #000;
  font-size: 1rem;
  cursor: pointer;
}

*, *:before, *:after {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

table {
  font-family: 'Open Sans', Helvetica;
  color: #efefef;
  width: 100%;
  height: 80vh;
  text-align: center;
}
table tr:nth-child(2n) {
  background: #eff0f1;
}
table tr:nth-child(2n+3) {
  background: #fff;
}
table th, table td {
  padding: 1em;
  font-size: .7rem;
  letter-spacing: 1px
}

.days, .time {
  text-transform: uppercase;
    text-align: center;
    color: #313131;
    border: 1px solid #ddd;
}

.time {
   font-size: .7rem;
}

/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
  position: relative;
  z-index: 2;
  cursor: pointer;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
  filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  pointer-events: none;
  -moz-transition: ease 0.5s all;
  -o-transition: ease 0.5s all;
  -webkit-transition: ease 0.5s all;
  transition: ease 0.5s all;
}

/* Position tooltip above the element */
[data-tooltip]:before {
  position: absolute;
  bottom: 110%;
  left: 50%;
  margin-bottom: 5px;
  margin-left: -80px;
  padding: 7px;
  width: 160px;
  -moz-border-radius: 6px;
  -webkit-border-radius: 6px;
  border-radius: 6px;
  background-color: black;
  color: #fff;
  content: attr(data-tooltip);
  text-align: center;
  font-size: 14px;
  line-height: 1.2;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
  position: absolute;
  bottom: 110%;
  left: 50%;
  margin-left: -5px;
  width: 0;
  border-top: 5px solid black;
  border-right: 5px solid transparent;
  border-left: 5px solid transparent;
  content: " ";
  font-size: 0;
  line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
  visibility: visible;
  bottom: 90%;
  filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
  opacity: 1;
}

</style>
<div class="app-main__outer">
<div class="app-main__inner">

 <div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-news-paper icon-gradient bg-mean-fruit"></i>
            </div>
            <div>Timetable
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
          <form id="add_new_student" method="get" name="add_new_student" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="get_branch">Select Course</label>
                    <select name="get_branch" id="get_branch" class="form-control">
                      <option value=""><===== Select Course ====></option>
                      <?php
                        $res_branch1 = mysqli_query($con,"SELECT * FROM branch where status = 1");
                        while ($row_branch1 = mysqli_fetch_assoc($res_branch1)) {
                          if ($row_branch1['id'] == $get_branch) {
                            ?>
                            <option value="<?= $row_branch1['id'] ?>" selected=""><?= $row_branch1['branch_name'] ?> Engineering</option>
                            <?php
                          }else{
                            ?>
                            <option value="<?= $row_branch1['id'] ?>"><?= $row_branch1['branch_name'] ?> Engineering</option>
                            <?php
                          }
                        }
                      ?>
                    </select>
                  </div>

                  <div class="col-sm-12 col-md-6 mt-2 form-group">
                    <label for="get_sem">Select Semester</label>
                   <select name="get_sem" id="get_sem" class="form-control">
                      <option value=""><===== Select Sem / Year ====></option>
                      <?php
                        $res_sub = mysqli_query($con,"SELECT * FROM subject GROUP BY semester");
                        while ($row_sub = mysqli_fetch_assoc($res_sub)) {
                          if ($row_sub['semester'] == $get_sem) {
                          ?>
                                <option id="get_sem" selected="" value="<?= $row_sub['semester'] ?>" ><?= $row_sub['semester'] ?></option>
                        <?php
                      }else{
                        ?>
                                <option id="get_sem" value="<?= $row_sub['semester'] ?>" ><?= $row_sub['semester'] ?></option>
                        <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>

<!-- / College Timetable -->
<?php
  if ($get_sem > 0 && $get_branch >0) {
    ?>
    <div class='tab' style="overflow-x: scroll;">
  <table border='0' cellpadding='0' cellspacing='0'>
    <tr class='days'>
      <th></th>
      <th>Monday</th>
      <th>Tuesday</th>
      <th>Wednesday</th>
      <th>Thursday</th>
      <th>Friday</th>
    </tr>
    <tr>
      <td class='time'>9.15 - 10:00</td>
      
      <?php
        $lec1 = array_filter(TimeTable($get_branch,$get_sem,'9:15 am','10:00 am'));
        foreach ($lec1 as $key => $value) {
          
          ?>
      <td class='cs335'  data-tooltip='<?= $value['subject_name'] ?>'><?= $value['subject_alias'] ?></td>     

          <?php
        }
      ?>
    </tr>
    
    <tr>
      <td class='time'>10:00 - 10:45</td>
      
      <?php
        $lec1 = array_filter(TimeTable($get_branch,$get_sem,'10:00 am','10:45 am'));
        foreach ($lec1 as $key => $value) {
          
          ?>
      <td class='cs335 ' data-tooltip='<?= $value['subject_name'] ?>'><?= $value['subject_alias'] ?></td>     

          <?php
        }
      ?>
    </tr>

    <tr>
      <td class='time'>10:45 - 11:30</td>
      
      <?php
        $lec1 = array_filter(TimeTable($get_branch,$get_sem,'10:45 am','11:30 am'));
        foreach ($lec1 as $key => $value) {
          
          ?>
      <td class='cs335 ' data-tooltip='<?= $value['subject_name'] ?>'><?= $value['subject_alias'] ?></td>     

          <?php
        }
      ?>
    </tr>
      
     <tr>
      <td class='time'>11:30 - 12:15</td>
      
      <?php
        $lec1 = array_filter(TimeTable($get_branch,$get_sem,'11:30 am','12:15 pm'));
        foreach ($lec1 as $key => $value) {
          
          ?>
      <td class='cs335 ' data-tooltip='<?= $value['subject_name'] ?>'><?= $value['subject_alias'] ?></td>     

          <?php
        }
      ?>
    </tr>

    <tr>
      <td class='time'>12:15 - 01:00</td>
      
      <?php
        $lec1 = array_filter(TimeTable($get_branch,$get_sem,'12:15 pm','1:00 pm'));
        foreach ($lec1 as $key => $value) {
          
          ?>
      <td class='cs335 ' data-tooltip='<?= $value['subject_name'] ?>'><?= $value['subject_alias'] ?></td>     

          <?php
        }
      ?>
    </tr>
      

  </table>
</div>
    <?php
  }
?>


<script>
 
  function edit_timetable(subject_name,id){
    var person = prompt("Please enter your name", subject_name);

    if (person == null || person == "") {
      txt = "User cancelled the prompt.";
    } else {
      txt = "Hello " + person + "! How are you today?";
    }
    alert(txt);
  }
  $(document).ready(function() {
            $('#get_sem').on('change', function() {
                this.form.submit();
            });
        });

</script>
   <?php
   require 'admin_resuse_files/footer.php';

   ?>