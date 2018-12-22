<?php 

include 'connect.php';
	session_start();

	if(!isset($_SESSION['uid'])){
		mysqli_close($conn); // Closing Connection
		header('Location: authentication/login.php'); // Redirecting To Home Page
		exit();
	}
	
$message="";
	if (isset($_POST['sends'])) {
		$message = '<script type="text/javascript">
								setTimeout(function () {
									swal("Good job!","Message sent!. We will reply you shorlty.","success").then( function(val) {
										if (val == true) window.location.href = \'contact.php\';
									});
								}, 200);  
							</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>JayBlaqAir-Contact</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="foundation/css/foundation.css">

</head>


<body>
	<?php echo $message; ?>

	<?php include 'header.php' ?>


	<div class="row">
		<div class="col">
			<div class="row" style="position: fixed; padding-left: 20px;">
					<button class="button warning" id="minustext" onclick="resizeText(-1)">-</button>
					<span style="text-align: center; padding: 10px;">Change text size</span>
					<button class="button primary" id="plustext" onclick="resizeText(1)" >+</button>

				</div>
		</div>
		<div class="col-6 center"> <br> <br>
			<h5><strong data-localize="get">Get in touch with us:</strong></h5>
			<h6>
				46, Lalumba Street, Oyibi <br>
				Opposite Valley View University, <br>
				Accra, Ghana.
				P.O.Box CT 1891 <br>
				Cantonments, <br>
				Accra, Ghana. <br>
				+233 245879654
			</h6>
			<br> <br>
			<h5><strong data-localize="find">Find us:</strong></h5>

			<div id="map-container" class="z-depth-1" style="height: 300px"></div>
			<br><br>
			<h5><strong data-localize="drop">Drop us a message:</strong></h5>

			<div class="callout">
				
				<form method="post" action="#">
				<div class="row">
				    <div class="col">
				      <input type="text" class="form-control" placeholder="Full name" required>
				    </div>
				    <div class="col">
				      <input type="email" class="form-control" placeholder="Email" required>
				    </div>
			  	</div>

			  <div class="row">
			    <div class="col">
			      <input type="text" class="form-control" placeholder="Mobile number">
			    </div>
			    <div class="col">
			      <input type="text" class="form-control" placeholder="Subject" required>
			    </div>
			  </div>
			 			  
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1" data-localize="your">Your Message</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
			  </div>

			  <button class="hollow button" type="submit" data-localize="send" name="sends">
			  	Send
			  </button>
			</form>
			
			</div>
			

		</div>
		<div class="col"></div>
	</div>

	<?php include 'footer.php' ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.localize.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="foundation/js/vendor/foundation.js"></script>
<script type="text/javascript" src="fontawesome/js/all.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script type="text/javascript" src="js/responsivevoice.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>



	<script type="text/javascript">

		$(function(){
    	
			// Regular map
			function regular_map() {
			var var_location = new google.maps.LatLng(5.799994, -0.127911);

			var var_mapoptions = {
			center: var_location,
			zoom: 14
			};

			var var_map = new google.maps.Map(document.getElementById("map-container"),
			var_mapoptions);

			var var_marker = new google.maps.Marker({
			position: var_location,
			map: var_map,
			title: "New York"
			});
			}

			// Initialize maps
			google.maps.event.addDomListener(window, 'load', regular_map);

	    	//--------------------------------------------------------------------------------------
	    	$('*').mouseenter(function() { // Attach this function to all mouseenter events for 'a' tags 
			  responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
			  responsiveVoice.speak($(this).text()); // Speak the text contents of all nodes within the current 'a' tag
			});
			//---------------------------------------------------------------------------------
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