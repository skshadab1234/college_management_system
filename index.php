<?php
	require 'session.php';
	if (!isset($_SESSION['USER_ID'])) {
		header("Location:login.php");
	}


	?>
<!doctype html>
<html lang="en">
   <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"  media="screen,projection"/>
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
<body>

        
        
<div class="container" style="margin-top: 100px">
<?php
			if (isset($_SESSION['access_token']) || isset($_SESSION['USER_ID'])) {
				echo $user['firstname'].' '.$user['last_name'];
				echo '<h5><a href="logout.php">Logout</a></h5>';
			}else{
				echo "<a href='login.php'>Login</a>";
			}
?>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>