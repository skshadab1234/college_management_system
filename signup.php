<?php
    require_once "reuseable_files/database.inc.php";
    if (isset($_SESSION['USER_ID'])) {
        header('Location: index.php');
        exit();
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/signup.css">
</head>
<!------ Include the above in your HEAD tag ---------->
<body class="hm-gradient">
    <main>
        <!--MDB Forms-->
        <div class="container mt-4">
            <!-- Grid row -->
            <div class="row">
               <div class="col-md-2"></div>
                <!-- Grid column -->
            <div class="col-md-8 mb-4">
                    <div class="card">
                        <div class="card-body">
                            
                            <!-- Form register -->
                            <form method="post" id="frmsubmit">
                                <h2 class="text-center font-up font-bold deep-orange-text py-4">Sign up</h2>
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="orangeForm-name3" class="form-control name">
                                    <span class="error_span" id="name_error"></span>
                                    <label for="orangeForm-name3">Your name</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="text" id="orangeForm-email3" class="form-control email">
                                    <span class="error_span" id="email_error"></span>
                                    <label for="orangeForm-email3">Your email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="orangeForm-pass3" class="form-control password">
                                    <span class="error_span" id="password_error"></span>
                                    <label for="orangeForm-pass3">Your password</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix grey-text"></i>
                                    <input type="password" id="orangeForm-pass3" class="form-control repassword">
                                    <span class="error_span" id="repassword_error"></span>
                                    <label for="orangeForm-pass3">Repeat password</label>
                                </div>
                       
                                <div class="text-center">
                                    <button class="btn btn-deep-orange" id="submit_form">next<i class="fa fa-angle-double-right pl-2" aria-hidden="true"></i>
                                    </button>
                             <div class="container" style="position: relative;">
                                <span id="signup_error" style="color: red"></span>
                                <span id="signup_success" style="color: green"></span>
                                    <h5 class="loader" style="background-image: url(loader.gif);background-size: cover;width: 20px;height: 20px;display: none;position: absolute;left: 50%"></h5>
                                </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
               <div class="col-md-2"></div>
               
            </div>
        </div>
        <!--MDB Forms-->
      
    </main>

    <script type="text/javascript">
       jQuery(document).ready(function(){
            jQuery('#submit_form').click(function(e){
            
            jQuery('#name_error').html('').hide();
            jQuery('#email_error').html('').hide();
            jQuery('#password_error').html('').hide();
            jQuery('#repassword_error').html('').hide();
            jQuery('#signup_error').html('').hide();
            var name = jQuery('.name').val();
            var email = jQuery('.email').val();
            var password = jQuery('.password').val();
            var repassword = jQuery('.repassword').val();

            // disabling button click on click
            jQuery('#submit_form').attr('disabled',true);
            jQuery('.loader').show();
            jQuery('.loader').fadeIn();
            
            jQuery.ajax({
                url:"register.php",
                type:"post",
                data: {
                    name:name,
                    email:email,
                    password:password,
                    repassword:repassword
                },
                success:function(data){
                    jQuery('#submit_form').attr('disabled',false);
                    jQuery('.loader').hide();
                    jQuery('#submit_form').html('next');
                    var result = jQuery.parseJSON(data);
                    if (result.status == 'error') {
                        jQuery('#'+result.field).fadeIn();
                        jQuery('#'+result.field).html(result.msg);
                        jQuery('#'+result.field).show();
                    }
                    if (result.status == 'success') {
                    jQuery('#submit_form').attr('disabled',true);
                        jQuery('#'+result.field).html(result.msg);
                        jQuery('#'+result.field).show();
                    }
                }



            });
        e.preventDefault();
    }); 
});
        </script>
        <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
  
</body>