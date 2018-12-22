<?php 
	include 'connect.php';
	session_start();

	$class_fair = '';
	$passenger_number = '';
	$total_cost = '';
	$message='';


	if(isset($_POST['book'])){
		$passenger_number=$_GET['number_of_passengers'];

		if ($_POST['class']=="Economy") {
			$class_fair = $_GET['economy_class_cost'];
		}elseif ($_POST['class']=="Business Class") {
			$class_fair = $_GET['business_class_cost'];
		}elseif ($_POST['class']=="First Class") {
			$class_fair = $_GET['business_class_cost'];
		}

		$total_cost = ($class_fair * $passenger_number); 
		
		// -------------------

		$sql = "INSERT INTO bookings (uid, full_name, flight_name, wherefrom, whereto, trip_type, passengers,	departure_date, cost)
	   	 	VALUES ('".$_SESSION['uid']."','".$_POST['fullname']."','".$_GET['flight_name']."','".$_GET['from']."','".$_GET['to']."','".$_GET['trip_Type']."','".$_GET['number_of_passengers']."','".$_GET['departure_date']."','".$total_cost."')";

	    	$result = mysqli_query($conn,$sql);

	   		if ($result) {

	   			$message = '<script type="text/javascript">
								setTimeout(function () {
									swal("Good job!","You have booked for a flight. Total cost is GHS'.number_format($total_cost,2).'","success").then( function(val) {
										if (val == true) window.location.href = \'profile.php\';
									});
								}, 200);  
							</script>';
			}
			else
			{
				$message = "<script type='text/javascript'>swal('Error!', 'Invalid request!', 'error')</script>";		   
			}

		// -------------------

		// $message = '<script type="text/javascript">
		// 						setTimeout(function () {
		// 							swal("Good job!","Total cost is GHS'.$class_fair.'","success").then( function(val) {
		// 								if (val == true) window.location.href = \'index.php\';
		// 							});
		// 						}, 200);  
		// 					</script>';
		
	}else{
	$message = "<script type='text/javascript'>swal('Error!', 'Invalid request!', 'error')</script>";		   

	}

	
	// echo $passenger_number;
	// echo $class_fair;
	// echo $total_cost;
	// echo $message;
	// exit();
?>
<!DOCTYPE html>
<html>
<head>
	<title>JayBlaqAir-Booking Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="foundation/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/foundation-datepicker.css">
</head>
<body>
	<?php echo $message; ?>
	<?php include 'header.php'; ?>

	<div class="row">
		<div class="col"></div>
		<div class="col-6">
			<fieldset class="fieldset">
  				<legend><img src="img/footerlogo.png" width="50"><span  data-localize="search">Provide your Details</span></legend>
					<!-- inputs -->
					<br>
					<form method="post" action="#">

					<div class="grid-container">
					    <div class="grid-x grid-padding-x">
					      <div class="medium-6 cell">
					        <label><i class="fa fa-user"></i> <span data-localize="dep">Your Full Name</span>
					          <input class="input-group-field" type="text" placeholder="Full name" name="fullname" required>

					        </label>
					      </div>
					      <div class="medium-6 cell">
					        <label><i class="fa fa-plane-arrival"></i> <span data-localize="arr">Class</span>
					          <select type="text" placeholder="Arrival airport" name="class" required>
					          	<option>Economy</option>
					          	<option>Business Class</option>
					          	<option>First Class</option>
					          </select>
					        </label>
					      </div>
					    </div>
					 </div>

					<!-- ---------------------------------------------------- -->
					<div class="grid-container">
					    <div class="grid-x grid-padding-x">
					      <div class="medium-6 cell">
					        <label><i class="fa fa-plane-departure"></i> <span data-localize="dep">From</span>
					          <input class="button disabled" id="deptdate" type="text" placeholder="Departing date" name="departure_airport" required value="<?php echo $_GET['from'];?>" disabled>
					        </label>
					      </div>
					      <div class="medium-6 cell">
					        <label><i class="fa fa-plane-arrival"></i> <span data-localize="arr">To</span>
					          <input class="button disabled" id="deptdate" type="text" placeholder="Departing date" name="arrival_airport" required value="<?php echo $_GET['to'];?>" disabled>
					        </label>
					      </div>
					    </div>
					 </div>
					 <!-- ----------------------------------------------------- -->
					 <div class="grid-container">
					    <div class="grid-x grid-padding-x">
					      <div class="medium-6 cell">
					        <label> <i class="fa fa-calendar-alt"></i> <span data-localize="depdate">Flight</span>
					          <input class="button disabled" id="deptdate" type="text" placeholder="Departing date" name="departing_date" required value="<?php echo $_GET['flight_name'];?>" disabled>
					        </label>
					      </div>
					      <div class="medium-6 cell" style="display: inline-block;" id="arriveDate">
					        <label><i class="fa fa-calendar-alt"></i> <span data-localize="arrdate">Trip type</span>
					          <input class="button disabled" id="deptdate" type="text" placeholder="Departing date" name="trip_type" required value="<?php echo $_GET['trip_Type'];?>" disabled>
					        </label>
					      </div>
					    </div>
					 </div>
					 <!-- ----------------------------------------------------- -->
					 <div class="grid-container">
					    <div class="grid-x grid-padding-x">
					      <div class="medium-6 cell">
					        <label> <i class="fa fa-users"></i> <span data-localize="no">Number of passengers</span>
					          <input class="button disabled" id="deptdate" type="text" placeholder="Departing date" name="no_of_passengers" required value="<?php echo $_GET['number_of_passengers'];?>" disabled>
					        </label>
					      </div>
					      <div class="medium-6 cell">
					        <label><i class="fa fa-calendar-alt"></i> <span data-localize="class">Departure Date</span>
					          <input class="button disabled" id="deptdate" type="text" placeholder="Departing date" name="total_cost" required value="<?php echo $_GET['departure_date'];?>" disabled>
					        </label>
					      </div>
					    </div>
					 </div>

					 <div class="grid-container" style="float: right;">
					 	<button class="button large" type="submit" name="book" data-localize="search2">
						 	Book
						 </button>
					 </div>
					 
  					
  				</form>

  			</fieldset>
		</div>
		<div class="col"></div>

	</div>
	<?php include 'footer.php' ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="foundation/js/vendor/foundation.js"></script>
<script type="text/javascript" src="fontawesome/js/all.js"></script>
<script type="text/javascript" src="js/foundation-datepicker.js"></script>
<script type="text/javascript" src="js/responsivevoice.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
</body>
</html>