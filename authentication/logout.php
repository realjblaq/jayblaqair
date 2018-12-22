<?php
session_start();
unset($_SESSION['uid']);
session_destroy(); // Destroying All Sessions
header("Location: login.php"); // Redirecting To Login Page
?>

