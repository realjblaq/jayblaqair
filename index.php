<?php 
	include 'connect.php';
	session_start();

	if(!isset($_SESSION['uid'])){
		mysqli_close($conn); // Closing Connection
		header('Location: authentication/login.php'); // Redirecting To Home Page
		exit(); 	
	}
	$session_id=$_SESSION['uid'];

	//for user name
	$ses_sql=mysqli_query($conn, "SELECT user_id FROM users WHERE uid='$session_id'");
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session =$row['user_id'];
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>JayBlaqAir-Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="foundation/css/foundation.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>
<body>

	<?php include 'header.php' ?>

		<!-- slider -->

		<div style="height: 500x; width:100%;">
			
		
		   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="img/slide1.png" alt="First slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="img/slide14.png" alt="Second slide">
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="img/slide31.png" alt="Third slide">
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
		  </div>
		  <br>
		
	<!-- content -->
	<div class="row">
		<div class="col">
			<div class="row" style="position: fixed; padding-left: 20px; margin-bottom: 100px;">
				<button class="button warning" id="minustext" onclick="resizeText(-1)">-</button>
				<span style="text-align: center; padding: 10px;">Change text size</span>
			<button class="button primary" id="plustext" onclick="resizeText(1)" >+</button>

			</div>
			

		</div>
		<div class="col-6"style="">
			<a  href="book.php" class="hollow button secondary large" data-localize="book2">Book a Flight</a> <img src="img/pline.png" width="200">
			<br><br>
			<div class="row spacedown">
				<div class="col">
					<img src="img/home1.jpg">
				</div>
				<div class="col">
					<h4 data-localize="super">Super Comfort for All</h4>
					<p data-localize="kicking">
						Kicking back in a First-Class seat, champagne in hand, is the stuff of traveller dreams. It’s that once-in-a-lifetime, bucket-list ticket that’s always just out of reach. But why should that level of luxury be reserved for the ultra-wealthy? Our services provide all with comfort to suit your need.
					</p>
				</div>
			</div>
			<hr class="hr"></hr>

			<div class="row spacedown">
				<div class="col">
					<h4 data-localize="greater">Greater Accra City</h4>
					<p data-localize="greater2">
						Greater Accra Region, the gateway to Ghana and home of our vibrant capital city, is one of the most exciting and distinctive regions. Although the smallest region, it is the most densely populated, containing the two great metropolitan areas of Accra and Tema, the country's major industrial and commercial centres. Kotoka International Airport is located about 12km from the centre of the city.
					</p>
				</div>
				<div class="col">
					
					<img src="img/home2.png">
				</div>
			</div>

			<hr class="hr"></hr>

			<div class="row spacedown">
				<div class="col">
					<img src="img/home3.jpg">					
				</div>
				<div class="col">
					<h4 data-localize="you">You Deserve That Holiday</h4>
					<p data-localize="the">
						The season for everyone disappearing for 2 weeks somewhere hot and luxurious is upon us, but are you one of those people who decides you are too busy for a holiday?  Sometimes taking time off work can feel daunting. How much work will pile up while you’re away? What tasks are you going to miss?  Is it really worth taking a holiday? The answer is, yes!
					</p>
				</div>
			</div>

			<a href="book.php" class="hollow button secondary large" style="float: right;" data-localize="book3">Book a Flight</a><img src="img/pline2.png" width="200" style="float: right;">


		</div>
		<div class="col"></div>
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
    	// $('.selectpicker').selectpicker();
    	$('.carousel').carousel();

    	$('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');

    	// ---------------------------------------------------------------------------------------------------------

    	$('*').mouseenter(function() { // Attach this function to all mouseenter events for 'a' tags 
		  responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
		  responsiveVoice.speak($(this).text()); // Speak the text contents of all nodes within the current 'a' tag
		});

		//-----------------------------------------------------------------------------------------------------------
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