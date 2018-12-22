<?php 
include '../connect.php';
session_start();

	// register page
	$message = '';
	$passerror = '';
	if(isset($_POST['sign_up']))
	{
			$user_id = $_POST['user_id'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password2 = $_POST['password2'];

			$sql = "INSERT INTO users (user_id, email, password)
	   	 	VALUES ('".$user_id."','".$email."',md5('".$password."'))";

	    	$result = mysqli_query($conn,$sql);

	   		if ($result) {

	   			$message = '<script type="text/javascript">
								setTimeout(function () {
									swal("Good job!","You have signed up. Now click OK to login.","success").then( function(val) {
										if (val == true) window.location.href = \'login.php\';
									});
								}, 200);  
							</script>';
			}
			else
			{
				$message = "<script type='text/javascript'>swal('Error!', 'Wrong input!', 'error')</script>";		   
			}
	}
	else{
				$message = "<script type='text/javascript'>swal('Error!', 'Wrong input!', 'error')</script>";		   
		}


?>

<!DOCTYPE html>
<html>
<head>
  <title>JayBlaqAir-Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../foundation/css/foundation.css">

  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body style="background-color: #cceaf7;">
<?php echo $message; ?>

<div class="row">

  <div class="col" style="padding-top: 138px;">
  	<img src="../img/movingplane.gif" width="500" style="opacity: 0.4">
  </div>
  <div class="col-3 center" style="padding-top: 170px;">

        <img src="../img/logo2.png" width="300" alt="Jayblaqair" value="jayblaqair">

      <br><br>

      <form method="post" action="#">
        <div class="form-icons">
          <h4>Register for an account</h4>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-user"></i>
            </span>
            <input class="input-group-field" type="text" placeholder="Username" name="user_id" required>
          </div>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-envelope"></i>
            </span>
            <input class="input-group-field" type="email" placeholder="Email" name="email" required>
          </div>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-key"></i>
            </span>
            <input class="input-group-field" type="password" placeholder="Password" name="password" id="pass1" required>
          </div>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-key"></i>
            </span>
            <input class="input-group-field" type="password" placeholder="Confirm password" name="password2" id="pass2" required>
          </div>

        </div>

    <button class="button expanded" type="submit" name="sign_up">Sign Up</button>
    <small>Already have an account? <a href="login.php">Login here</a></small>
  </form>
  </div>

  <div class="col"></div>

</div>
  


<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/jquery.localize.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../foundation/js/vendor/foundation.js"></script>
<script type="text/javascript" src="../fontawesome/js/all.js"></script>
<script type="text/javascript" src="../js/responsivevoice.js"></script>
<script type="text/javascript" src="../js/sweetalert.min.js"></script>
	

<script type="text/javascript">
	
	$(function(){
    	
    	$('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');

    	//--------------------------------------------------------------------------------------
    	$('*').mouseenter(function() { // Attach this function to all mouseenter events for 'a' tags 
		  responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
		  responsiveVoice.speak($(this).text()); // Speak the text contents of all nodes within the current 'a' tag
		});
		
		// <!-- validate password -->

		var pass1 = document.getElementById("pass1"), 
		pass2 = document.getElementById("pass2");

		function validatePassword(){
		  if(pass1.value != pass2.value) {
		    pass2.setCustomValidity("Passwords Don't Match");
		  } else {
		    pass2.setCustomValidity('');
		  }
		}

		pass1.onchange = validatePassword;
		pass2.onkeyup = validatePassword;

    });



</script>

</body>
</html>