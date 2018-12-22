<?php 
include '../connect.php';
  session_start();

  if(isset($_SESSION['uid'])){
    mysqli_close($conn); // Closing Connection
    header('Location: ../index.php'); // Redirecting To Home Page
    exit();
  }
  $error = '';

  if (isset($_POST['login'])) {
    if (empty($_POST['user_id']) || empty($_POST['password'])) {
      $error = "<p style='color:red;'>Username or Password is invalid</p>";
    }else{
      $username = $_POST['user_id'];
      $pass = $_POST['password'];
      $pass = md5($pass);
      
      $query = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$username' AND password = '$pass' ");
      $rows = mysqli_num_rows($query);
      if ($rows>0) {
        // if (!empty($query)) {
          while ($list = mysqli_fetch_assoc($query)) {
            $_SESSION['uid'] = $list['uid'];
            header('Location: ../index.php');
          }
        // }
      }
      else{
        $error = "<p style='color:red;'>Username or Password is invalid!</p>";
      }
      
      mysqli_close($conn);

    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>JayBlaqAir-Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../foundation/css/foundation.css">

  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body style="background-color: #cceaf7;">


<div class="row">

  <div class="col"></div>
  <div class="col-3 center" style="padding-top: 170px;">

        <img src="../img/logo2.png" width="300" alt="logo">

      <br><br>

      <form method="post" action="#">
        <div class="form-icons">
          <h4>Login</h4>
          <?php echo $error; ?>
          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-user"></i>
            </span>
            <input class="input-group-field" type="text" placeholder="Username" name="user_id" required>
          </div>

          <div class="input-group">
            <span class="input-group-label">
              <i class="fa fa-key"></i>
            </span>
            <input class="input-group-field" type="password" placeholder="Password" name="password" required>
          </div>
        </div>

    <button class="button expanded" name="login" type="submit">Login</button>
    <small>Don't have an account? <a href="signup.php">Sign up here</a></small>
  </form>
  </div>

  <div class="col" style="padding-top: 138px;">
    <img src="../img/movingplane.gif" width="500" style="opacity: 0.4">
  </div>

</div>
  


<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/jquery.localize.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../foundation/js/vendor/foundation.js"></script>
<script type="text/javascript" src="../fontawesome/js/all.js"></script>
<script type="text/javascript" src="../js/responsivevoice.js"></script>

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