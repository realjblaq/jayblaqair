<?php 
	include 'connect.php';
	session_start();

	if(!isset($_SESSION['uid'])){
		mysqli_close($conn); // Closing Connection
		header('Location: authentication/login.php'); // Redirecting To Home Page
		exit();
	}

	$sessionID = $_SESSION['uid'];
	$nothing='';
	$user_id='';

	$booking_query=mysqli_query($conn, "SELECT * FROM bookings WHERE uid = '$sessionID'");
	$listx='';   

	if (mysqli_num_rows($booking_query)>0 ) {
	 	while ($erowx = mysqli_fetch_assoc($booking_query)) {
        $bid =  $erowx['bid'];
        $full_name =  $erowx['full_name'];
        $wherefrom = $erowx['wherefrom'];
        $whereto =  $erowx['whereto'];
        $trip_type = $erowx['trip_type'];
        $passengers =  $erowx['passengers'];
        $departure_date =  $erowx['departure_date'];
        $cost =  $erowx['cost'];
       
        $listx .='<tbody style="text-align:center;">
			    <tr>
			    <td>'.$wherefrom.'</td>
			      <td>'.$whereto.'</td>
			      <td>'.$trip_type.'</td>
			      <td>'.$passengers.'</td>
			      <td>'.$departure_date.'</td>
			      <td>'.number_format($cost,2).'</td>
			      <td style="text-align: : center;">
			      	<button onclick="delete_flight(\''.$bid.'\')" class="button alert" style="color:white;"><i class="fa fa-ban"></i> Cancel flight</a></td>
			      </tr>
		  		 </tbody>';

    	}

	} else{
		$nothing='<h5 class="center" style="color:red;">You have no flight reservations</h5>';
	}
    

// echo $sessionID; exit();s
    
$user_query=mysqli_query($conn, "SELECT user_id FROM users WHERE uid = '$sessionID'");
    while ($erowy = mysqli_fetch_assoc($user_query)) {
        $user_id =  $erowy['user_id'];
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>JayBlaqAir-Reservations</title>
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

<div class="row pushdown">
	<div class="col"></div>
	<div class="col-10">

		<div class="row">
			<fieldset class="fieldset" style="width: 100%;">
  			<legend><img src="img/footerlogo.png" width="50"><span  data-localize="search"><small>Hi, </small><?php echo ucfirst($user_id); ?>/<h3>MY RESERVATIONS</h3></span></legend>
			<table class="hover">
		  <thead class="callout primary">
		    <tr>
		      <th style="text-align: center;" width="150">Departure Airport</th>
		      <th style="text-align: center;" width="150">Arrival Airport</th>
		      <th style="text-align: center;" width="150">Trip Type</th>
		      <th style="text-align: center;" width="150">No. of Passengers</th>
		      <th style="text-align: center;" width="150">Departure Date</th>
		      <th style="text-align: center;" width="150">Amount (GHS)</th>
		      <th style="text-align: center;" width="150">Action</th>
		    </tr>
		  </thead>
		   	<?php echo $listx;?>
		</table>
			<?php echo $nothing; ?>
			</fieldset>
		</div>

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
	
	function delete_flight(flight){
		swal({
				  title: "Are you sure?",
				  text: "Once canceled, you cannot recover this reservation!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {'.mysqli_query($conn, $sql).'
				    window.location.href = 'cancel_booking.php?bookingID='+flight;
				  } else {
				    swal("Your reservation is safe!");

				 }
				});
	}
</script>
</body>
</html>