
<?php 

	include 'connect.php';
	session_start();

	if(!isset($_SESSION['uid'])){
		mysqli_close($conn); // Closing Connection
		header('Location: authentication/login.php'); // Redirecting To Home Page
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>JayBlaqAir-About</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="foundation/css/foundation.css">
</head>
<body>

	<?php include 'header.php' ?>

	<br>
	<br>
	<div class="pushdown">
		<div class="row">
			<div class="col">
				<div class="row" style="position: fixed; padding-left: 20px;">
					<button class="button" id="minustext" onclick="resizeText(-1)" style="background-color: red;">-</button>
					<span style="text-align: center; padding: 10px;">Change text size</span>
					<button class="button primary" id="plustext" onclick="resizeText(1)" >+</button>

				</div>
			
			</div>
			<div class="col-6 center">
				<!-- <div class="row">
					<div class="col">
						<h3 data-localize="missio">MISSION</h3>
						<P style="text-align: justify;" data-localize="themission">The mission of Southwest Airlines is dedication to the highest quality of Customer Service delivered with a sense of warmth, friendliness, individual pride, and Company Spirit.</P>
					</div>
					<div class="col">
						<h3 data-localize="visio">VISSION</h3>
						<p style="text-align: justify;" data-localize="tobe">To be amongst the most innovative and admired brands, renowned for service excellence.</p>
					</div>
				</div> <br> -->
				<h3 data-localize="meet">MEET OUR TEAM</h3>
				<p data-localize="we" style="text-align: center;">We are all very different. We were born in different cities, at different times, we love different music, food, movies. But we have something that unites us all. It is our company. We are its heart. We are not just a team, we are a family.</p>

				<br><br>

				<div>
					<span>
						<img src="img/abandoh.png" class="aboutimage">
					</span>
					<span>
						<img src="img/ronky.png" class="aboutimage">
					</span>
					<span>
						<img src="img/student1.png" class="aboutimage">
					</span>
				</div>
					<br><br>	
				<a href="contact.php" class="hollow button secondary large" data-localize="contactus">CONTACT US</a>							
			</div>
			<div class="col"></div>
		</div>

		
	</div>



	<?php include 'footer.php' ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.localize.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="foundation/js/vendor/foundation.js"></script>
<script type="text/javascript" src="fontawesome/js/all.js"></script>
<script type="text/javascript" src="js/responsivevoice.js"></script>


<script type="text/javascript">
	
	$(function(){
		$('*').mouseenter(function() { // Attach this function to all mouseenter events for 'a' tags 
		  responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
		  responsiveVoice.speak($(this).text()); // Speak the text contents of all nodes within the current 'a' tag
		});

		//-------------------------------------------------------------------
		$('#langlist').change(function() {
          if ($(this).val() === 'Español') {
            $("[data-localize]").localize("mylanguage", { language: "es" });
          }
          if ($(this).val() === 'English') {
            $("[data-localize]").localize("mylanguage", { language: "en" });
          }
          if ($(this).val() === 'Français') {
            $("[data-localize]").localize("mylanguage", { language: "fr" });
          }
      	});

	});

	//----------------------------------------------------------------------------------------------------------
      	function resizeText(multiplier) {
		  if (document.body.style.fontSize == "") {
		    document.body.style.fontSize = "1.0em";
		  }
		  document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
		}
	
</script>
</body>
</html>