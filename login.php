<?php
    require_once "session.php";
        if (isset($_SESSION['STD_ID'])) {
          header('Location: Student/index.php');
          exit();
        }elseif(isset($_SESSION['FAC_ID'])){
          header('Location: Teacher/index.php');
          exit();
        }

    
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style/login.css">  
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<body style="position: relative;overflow: hidden;">
        <H1 class="login_head">Login as</H1>
    <div class="wrapper">
      <input type="radio" name="select" value="Student" id="option-1">
      <input type="radio" name="select" value="Teacher" id="option-2">
      <label for="option-1" class="option option-1">
        <div class="dot"></div>
        <span>Student</span>
      </label>
      <label for="option-2" class="option option-2">
        <div class="dot"></div>
        <span>Teacher</span>
      </label>
    </div>

    
<script type="text/javascript">
   $(document).ready(function () {
        $('input[type=radio][name=select]').change(function() {
          if (this.value == 'Student') {
              window.location.href="Student/";
          }
          else if (this.value == 'Teacher') {
              window.location.href="Teacher/";
          }
      });
    });
</script>
        <!-- jquery cdn -->
    <script type="text/javascript" src="assets/js/dark-light-mode.js"></script>
</body>