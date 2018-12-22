<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "jayflyair";

	try {
		 $conn = new mysqli($servername, $username, $password,$dbname) or die("Connect failed: %s\n". $conn -> error);
		
	} catch (Exception $e) {
		echo $e;
		
	}
?>