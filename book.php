<?php 
include 'connect.php';
	session_start();

	if(!isset($_SESSION['uid'])){
		mysqli_close($conn); // Closing Connection
		header('Location: authentication/login.php'); // Redirecting To Home Page
		exit();
	}

	//query for airports-----------------------------------------------------------
	$airport_querry=mysqli_query($conn, "SELECT * FROM airports ORDER BY airport_name ASC");
	$airport_list='';
	while ($erow = mysqli_fetch_assoc($airport_querry)) {
		$aid =  $erow['aid'];
		$airport_name =  $erow['airport_name'];

		$airport_list .= '<option value='.$aid.'>'.$airport_name.'</option>';
	}
	//----------------------------------------------------------------------------

?>

<!DOCTYPE html>
<html>
<head>
	<title>JayBlaqAir-Book Flight</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="foundation/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/foundation-datepicker.css">

	<!-- ------------------------------------------------------------------------ -->
	<script type="text/javascript">
		function showArrive(){
	      document.getElementById('arriveDate').style.display ='inline-block';
	    }
	    function hideArrive(){
	      document.getElementById('arriveDate').style.display = 'none';
	    }
	</script>
	<!-- ------------------------------------------------------------------------ -->
</head>
<body ">

	<?php include 'header.php' ?>

		<div class="row" style="margin-bottom: 47px;">
		<div class="col"></div>
		<div class="col-6">

			
			<fieldset class="fieldset">
  				<legend><img src="img/footerlogo.png" width="50"><span  data-localize="search">Search Flights</span></legend>

  				<!-- form ----------------------------------------------------- -->
  				<form method="get" action="search.php">

  					<div class="grid-container">
  						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline1" name="tripType" class="custom-control-input" onclick="hideArrive()" required value="oneway">
						  <label class="custom-control-label" for="customRadioInline1" data-localize="oneway">One way</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
						  <input type="radio" id="customRadioInline2" name="tripType" class="custom-control-input" onclick="showArrive()" required value="roundtrip">
						  <label class="custom-control-label" for="customRadioInline2" data-localize="round">Round trip</label>
						</div>
  					</div>
	  				
					<!-- inputs -->
					<br>
					<!-- ---------------------------------------------------- -->
					<div class="grid-container">
					    <div class="grid-x grid-padding-x">
					      <div class="medium-6 cell">
					        <label><i class="fa fa-plane-departure"></i> <span data-localize="dep">Departure airport</span>
					          <select type="text" placeholder="Departure airport" name="departure_airport" required> 
					          	<?php echo $airport_list; ?>
					          </select>
					        </label>
					      </div>
					      <div class="medium-6 cell">
					        <label><i class="fa fa-plane-arrival"></i> <span data-localize="arr">Arrival airport</span>
					          <select type="text" placeholder="Arrival airport" name="arrival_airport" required>
					          	<?php echo $airport_list; ?>
					          </select>
					        </label>
					      </div>
					    </div>
					 </div>
					 <!-- ----------------------------------------------------- -->
					 <div class="grid-container">
					    <div class="grid-x grid-padding-x">
					      <div class="medium-6 cell">
					        <label> <i class="fa fa-calendar-alt"></i> <span data-localize="depdate">Departing date</span>
					          <input id="deptdate" type="text" placeholder="Departing date" name="departing_date" required>
					        </label>
					      </div>
					      <div class="medium-6 cell" style="display: none;" id="arriveDate">
					        <label><i class="fa fa-calendar-alt"></i> <span data-localize="arrdate">Arriving date</span>
					          <input id="arrdate" type="text" placeholder="Arriving date" name="arriving_date" required>
					        </label>
					      </div>
					    </div>
					 </div>
					 <!-- ----------------------------------------------------- -->
					 <div class="grid-container">
					    <div class="grid-x grid-padding-x">
					      <div class="medium-6 cell">
					        <label> <i class="fa fa-users"></i> <span data-localize="no">Number of passengers</span>
					          <input type="number" placeholder="No. of passengers" name="number_of_passengers" required value="1" min="1">
					        </label>
					      </div>
					      <div class="medium-6 cell">
					        <label><i class="fa fa-bed"></i> <span data-localize="class">Class</span>
					          <select type="text" placeholder="Class" name="class" required>
					          	<option>Economy Class</option>
					          	<option>Business Class</option>
					          	<option>First Class</option>
					          </select>
					        </label>
					      </div>
					    </div>
					 </div>

					 <div class="grid-container" style="float: right;">
					 	<button class="button large" type="submit" name="search_flights" data-localize="search2">
						 	Search
						 </button>
					 </div>
					 
  					
  				</form>

  			</fieldset>

		</div>
		<div class="col"></div>
	</div>

	<?php include 'footer.php' ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.localize.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="foundation/js/vendor/foundation.js"></script>
<script type="text/javascript" src="fontawesome/js/all.js"></script>
<script type="text/javascript" src="js/foundation-datepicker.js"></script>

<script type="text/javascript" src="js/responsivevoice.js"></script>


<script type="text/javascript">
	
	$(function(){
    	
    	$('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');

    	//--------------------------------------------------------------------------------------
    	$('*').mouseenter(function() { // Attach this function to all mouseenter events for 'a' tags 
		  responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
		  responsiveVoice.speak($(this).text()); // Speak the text contents of all nodes within the current 'a' tag
		});

    	//....................................................................................
		$('#deptdate').fdatepicker({
			initialDate: '2018-01-01',
			format: 'yyyy-mm-dd',
			disableDblClickSelection: true,
			leftArrow:'<<',
			rightArrow:'>>',
			closeIcon:'X',
			closeButton: true
		});

		$('#arrdate').fdatepicker({
			initialDate: '2018-01-01',
			format: 'yyyy-mm-dd',
			disableDblClickSelection: true,
			leftArrow:'<<',
			rightArrow:'>>',
			closeIcon:'X',
			closeButton: true
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
</script>
</body>
</html>