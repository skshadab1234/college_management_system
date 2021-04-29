<?php
require 'session.php';
if (isset($_GET['email_id']) && isset($_GET['reset-code'])) {
  $email_id = get_safe_value($_GET['email_id']);
$reset_code = get_safe_value($_GET['reset-code']);
$sql = "SELECT * FROM student_login where student_email = '$email_id' && reset_password_code  = '$reset_code'";
}else{
  header("location:login");
}

$res = mysqli_query($con,$sql);

if (mysqli_num_rows($res)) {
  ?>
    <!DOCTYPE html>

<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css">
    <!-- <title>Login & Signup Form | CodingNepal</title> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
  </head>
  <body>
    
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">
Change Password</div>
<div class="title signup">
Signup Form</div>
</div>
<div class="form-container">

<div class="form-inner">
  <form class="login" method="post" id="changepassword">
    <div class="field">
      <input type="password" placeholder="New Password" name="newpass_student" id="newpass" required>
    </div>
    <div class="field">
      <input type="text" placeholder="Confirm Password" name="crmpass_student" id="crmpass" required>
    </div>
    <div class="field btn">
    <div class="btn-layer">
    </div>
    <input type="hidden" name="email_id" value="<?= $email_id ?>">
    <input type="submit" value="Send" id="changepassword_submit">
  </div>
  </form>
</div>
</div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.all.min.js"></script>

  <script type="text/javascript" src="<?php FRONT_SITE_PATH ?>assets/js/dark-light-mode.js"></script>
      <script type="text/javascript">
       jQuery(document).ready(function(){

            jQuery('#changepassword').submit(function(e){
          
              var data = $(this).serialize();
            jQuery('#changepassword_submit').attr('disabled',true);
            jQuery('#changepassword_submit').val("Wait.....");
               jQuery.ajax({
                url:"../verify.php",
                type:"post",
                data: data,
                success:function(data){
                    var result = jQuery.parseJSON(data);
                   if (result.status == 'success') {
                      Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: 'Password Changed',
                          text: 'password has been reset.',
                          showConfirmButton: false,
                          timer: 3500
                        })
                      jQuery('#changepassword_submit').attr('disabled',false);
                      jQuery('#changepassword_submit').val("Send");
                      setInterval(()=>{
                        window.location.href = 'login';
                      },3500);
                   }

                   if (result.status == 'error') {
                      Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          title: 'Password Not Matched',
                          showConfirmButton: false,
                          timer: 3500
                        })
                      jQuery('#changepassword_submit').attr('disabled',false);
                      jQuery('#changepassword_submit').val("Send");
                   }
                }
              });

            
        e.preventDefault();
    }); 
});
        </script>
  </body>
</html>
  
  <?php
}else{
  header("location:login.php");
}
?>
