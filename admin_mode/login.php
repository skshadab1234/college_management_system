<?php
require 'session.php';
if (isset($_SESSION['ADMINID'])) {
  header("location:index");
}
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
  </head>
  <body>
    
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">
Admin Login</div>
</div>
<div class="form-container">

<div class="form-inner">
  <form class="login" method="post" id="frmsubmit">
    <div class="field">
      <input type="text" placeholder="Admin Id No." id="AdminIdNo" required>
    </div>
    <div class="field">
      <input type="password" placeholder="Password" id="password" required>
    </div>
    <div class="pass-link">
      <a href="forgot-password-admin"<?= PHP_EXT ?>>Forgot password?</a></div>
    <div class="field btn">
    <div class="btn-layer">
    </div>
    
    <input type="submit" value="Login" id="submit_form">
  </div>
  </form>
</div>
</div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.all.min.js"></script>

  <script type="text/javascript" src="../assets/js/dark-light-mode.js"></script>
      <script type="text/javascript">
       jQuery(document).ready(function(){

            jQuery('#submit_form').click(function(e){
          
            var AdminIdNo = jQuery('#AdminIdNo').val();
            var password = jQuery('#password').val();
            

            // disabling button click on click
            jQuery('#submit_form').attr('disabled',true);
            jQuery('.loader').show();
            jQuery('.loader').fadeIn();
            
            jQuery.ajax({
                url:"../verify.php",
                type:"post",
                data: {
                    AdminIdNo:AdminIdNo,
                    password:password,
                },
                success:function(data){
                    jQuery('#submit_form').attr('disabled',false);
                    jQuery('.loader').hide();
                    jQuery('#submit_form').html('next');
                    var result = jQuery.parseJSON(data);
                    if (result.status == 'error') {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Password is incorrect',
                        })
                    }

                    if (result.status == 'login_error') {
                        Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: 'Logid id you have enter is incorrect',
                        })
                    }

                    if (result.status == 'success') {
                        Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: 'Login Successfully',
                          showConfirmButton: false,
                          timer: 1500
                        })

                        setTimeout( () =>{
                          window.location = 'index.php';
                        },1500);
                    }
                }



            });
        e.preventDefault();
    }); 
});
        </script>
  </body>
</html>
