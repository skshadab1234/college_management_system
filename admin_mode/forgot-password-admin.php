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
    <title>Forgot Password Faculty</title>
  </head>
  <body>
    
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">
Forgot Password</div>
</div>
<div class="form-container">

<div class="form-inner">
  <form class="login" method="post" id="signupForm">
    <div class="field">
      <input type="email" placeholder="Email id" id="email_id_admin" required>
    </div>
    <div class="field btn">
    <div class="btn-layer">
    </div>
    
    <input type="submit" value="Send" id="submit_form">
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
          
            var re=new RegExp();
            re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;


                         
            var email_id_admin = jQuery('#email_id_admin').val();
            var forgotpass = 'forgotpass';

            if (email_id_admin  == '') {
               Swal.fire({
                  position: 'top-end',
                  icon: 'error',
                  title: 'Please enter your email id',
                  showConfirmButton: false,
                  timer: 3500
                })
            }else{
              jQuery('#submit_form').attr('disabled',true);
            jQuery('#submit_form').val("Wait.....");
            if(re.test(email_id_admin)){
               jQuery.ajax({
                url:"../verify.php",
                type:"post",
                data: {
                    email_id_admin:email_id_admin,
                    forgotpass:forgotpass
                },
                success:function(data){
                    var result = jQuery.parseJSON(data);
                   if (result.status == 'success') {
                      Swal.fire({
                          position: 'top-end',
                          icon: 'success',
                          title: 'Mail Send Succcessfully',
                          text: 'Check Your Mail and reset your password',
                          showConfirmButton: false,
                          timer: 3500
                        })
                      jQuery('#submit_form').attr('disabled',false);
                      jQuery('#submit_form').val("Send");
                   }

                   if (result.status == 'error_account') {
                      Swal.fire({
                          position: 'top-end',
                          icon: 'error',
                          title: 'Email id didn\'t exist',
                          showConfirmButton: false,
                          timer: 3500
                        })
                      jQuery('#submit_form').attr('disabled',false);
                      jQuery('#submit_form').val("Send");
                   }
                }
              });
            }else{
               Swal.fire({
                  position: 'top-end',
                  icon: 'error',
                  title: 'Email Id is not valid',
                  showConfirmButton: false,
                  timer: 3500
                })
               jQuery('#submit_form').attr('disabled',false);
               jQuery('#submit_form').val("Send");
            }  
            }

            
        e.preventDefault();
    }); 
});
        </script>
  </body>
</html>
