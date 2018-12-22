<?php 
include 'connect.php';

$eidx = '';
$message='';

if (isset($_GET['bookingID'])) {
	$eidx = $_GET['bookingID'];

	$sql = "DELETE FROM bookings WHERE bid='$eidx'"; 
	mysqli_query($conn, $sql);
	header("location: profile.php");


}
// echo $eidx;exit();

// $sql = "DELETE FROM bookings WHERE bid='$eidx'"; 
// if(mysqli_query($conn, $sql)){
// 	$message = '<script type="text/javascript">
// 				swal({
// 				  title: "Are you sure?",
// 				  text: "Once canceled, you will not be able to recover this reservation!",
// 				  icon: "warning",
// 				  buttons: true,
// 				  dangerMode: true,
// 				})
// 				.then((willDelete) => {
// 				  if (willDelete) {
// 				    window.location.href = \'profile.php\';
// 				  } else {
// 				    //swal("Your imaginary file is safe!");
// 				    window.location.href = \'profile.php\';

// 				  }
// 				});
// 				</script>';

// }  
// else{ 
//     echo "ERROR: Could not execute $sql. "  
//                                    . mysqli_error($conn); 
// } 
// mysqli_close($conn); 


?>

<!DOCTYPE html>
<html>
<head>
	<title>Jayblaqair-Cancel Flight</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="foundation/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="css/foundation-datepicker.css">

	<script type="text/javascript" src="js/sweetalert.min.js"></script>

</head>
<body>

	<?php echo $message;
	    // header('Location:profile.php');

	?>



<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/jquery.localize.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="foundation/js/vendor/foundation.js"></script>
<script type="text/javascript" src="fontawesome/js/all.js"></script>
<script type="text/javascript" src="js/responsivevoice.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>

</body>
</html>

