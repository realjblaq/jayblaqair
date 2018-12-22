<?php 
include 'connect.php';
session_start();

	$message='';
	$searchlist='';
		$trip_type = $_GET['tripType'];
		$from = $_GET['departure_airport'];
		$to = $_GET['arrival_airport'];
		$depart_date = $_GET['departing_date'];
		$arrive_date = $_GET['arriving_date'];
		$no_of_passengers = $_GET['number_of_passengers'];
		$class = $_GET['class'];

		$fromair_name='';
		$fromair_id='';
		$toair_name='';
		$toair_id='';
		$flight_name='';
		$flight_id='';
        
        $search_query = mysqli_query($conn,"SELECT * FROM trips WHERE (`trip_type` LIKE '%$trip_type%') AND (`wherefrom` LIKE '%$from%') AND (`whereto` LIKE '%$to%')") or die(mysql_error());

            if(mysqli_num_rows($search_query) > 0){ // if one or more rows are returned do following
             
	            while($results = mysqli_fetch_array($search_query)){
	                
	                //get flight name------------------------------------------------------
	                $flight_id=$results['fname'];
	            	$q=mysqli_query($conn, "SELECT fname FROM flights WHERE fid=$flight_id"); 
	            	if (mysqli_num_rows($q) > 0) {
	            	 	while($r = mysqli_fetch_array($q)){  
	            	 		$flight_name=$r['fname'];
	            	 	}
	            	 } 

	            	//get from airport name-----------------------------------------------
	            	$fromair_id=$results['wherefrom'];
	            	$from_query=mysqli_query($conn, "SELECT airport_name FROM airports WHERE aid=$fromair_id"); 
	            	if (mysqli_num_rows($from_query) > 0) {
	            	 	while($req = mysqli_fetch_array($from_query)){  
	            	 		$fromair_name=$req['airport_name'];
	            	 	}
	            	 } 

	            	//get to airport name-----------------------------------------------
	            	$toair_id=$results['whereto'];
	            	$to_query=mysqli_query($conn, "SELECT airport_name FROM airports WHERE aid=$toair_id"); 
	            	if (mysqli_num_rows($to_query) > 0) {
	            	 	while($reqto = mysqli_fetch_array($to_query)){  
	            	 		$toair_name=$reqto['airport_name'];
	            	 	}
	            	 } 

	                $message= '<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Flights found!</strong> Check them out and book now.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>';

					$searchlist.='<div class="card" style="width: 100%;">
								  <div class="card-divider button primary">
								    <strong>'.$flight_name.'</strong>

								    <span style="margin-right: 25px;"></span>
								    <small>First class:</small>
								    <b>GHS'.number_format($results['firstclass_cost'], 2).'</b>

								    <span style="margin-right: 25px;"></span>
								    <small>Business class:</small>
								    <b>GHS'.number_format($results['businessclass_cost'], 2).'</b>

								    <span style="margin-right: 25px;"></span>
								    <small>Economy class:</small>
								    <b>GHS'.number_format($results['economyclass_cost'], 2).'</b>

								    <span style="margin-right: 25px;"></span>
								    <small>ETA:</small>
								    <b>'.$results['eta'].'</b>

								  </div>
								  <div class="card-section" style="background-color:#fbfbfb;">
								  	<div class="row">
								  		<div class="col center">'.$fromair_name.'</div>
								  		<div class="col center"><img src="img/toplane2.gif" width="150" style="hieght:50px; width:100px;"></div>
								  		<div class="col center">'.$toair_name.'</div>
								  	</div>
								  	<div class="row">
								  		<div class="col center"><strong>'.$results['deptime'].'</strong></div>
								  		<div class="col center"><a href="book_details.php?flight_name='.$flight_name.'&from='.$fromair_name.'&to='.$toair_name.'&trip_Type='.$_GET['tripType'].'&number_of_passengers='.$_GET['number_of_passengers'].'&first_class_cost='.$results['firstclass_cost'].'&business_class_cost='.$results['businessclass_cost'].'&economy_class_cost='.$results['economyclass_cost'].'&departure_date='.$_GET['departing_date'].'&class='.$_GET['class'].'" class="button hollow">Book this flight</a></div>
								  		<div class="col center"><strong>'.$results['arrtime'].'</strong></div>
								  	</div>
								  </div>
								</div>';

					       }
	            } else{ // if there is no matching rows do following
	            
		            $message= '<script type="text/javascript">
								setTimeout(function () {
									swal("Sorry, No flights available!","Please try another option.","error").then( function(val) {
										if (val == true) window.location.href = \'book.php\';
									});
								}, 200);  
							</script>';

	        	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>JayBlaqAir-Search Flights</title>
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
	<?php include 'header.php' ?>
	<br>
	<div class="row pushdown">
		<div class="col"></div>
		<div class="col-6" style="margin-bottom: : 50px;">
			<?php echo $message; 
				echo $searchlist;
			?>
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

<script type="text/javascript">
	
	$(function(){
    	
    	$('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');

    	//--------------------------------------------------------------------------------------
    	$('*').mouseenter(function() { // Attach this function to all mouseenter events for 'a' tags 
		  responsiveVoice.cancel(); // Cancel anything else that may currently be speaking
		  responsiveVoice.speak($(this).text()); // Speak the text contents of all nodes within the current 'a' tag
		});

			 // $('.alert').tempAlert("close",5000);

    });

</script>

</body>
</html>