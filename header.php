<!-- navbar -->

	<!-- blinking button -->
	<script type="text/javascript">
	      function blink() {
	        var blinks = document.getElementsByTagName('blink');
	        for (var i = blinks.length - 1; i >= 0; i--) {
	          var s = blinks[i];
	          s.style.visibility = (s.style.visibility === 'visible') ? 'hidden' : 'visible';
	        }
	        window.setTimeout(blink, 1500);
	      }
	      if (document.addEventListener) document.addEventListener("DOMContentLoaded", blink, false);
	      else if (window.addEventListener) window.addEventListener("load", blink, false);
	      else if (window.attachEvent) window.attachEvent("onload", blink);
	      else window.onload = blink;

	</script>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php" style="margin-right: 54px">
		    <img src="img/logo2.png" width="400	" alt="logo">
		</a>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav ml-center">
		      <a class="nav-item nav-link" href="index.php" data-localize="menu.home" style="width: 100px;">Home</span></a>
		      <a class="nav-item nav-link" href="about.php" data-localize="menu.about" style="width: 100px;">About</a>
		      <a class="nav-item nav-link" href="contact.php" style="margin-right: 300px;" data-localize="menu.contact" style="width: 100px;">Contact</a>
		      <blink>
  		      	<a class="nav-item nav-link button" href="book.php" data-localize="menu.bookflights" style="width: 160px; color: white;">Book Flight</span></a>
  		      </blink>
  		      <a class="nav-item nav-link" href="profile.php" data-localize="menu.reservations" style="width: 150px;">Reservations</span></a>
		      <!-- <a href="book.php" class="hollow button secondary" data-localize="menu.book">Book a Flight</a>
		      <a href="profile.php" class="hollow button secondary" data-localize="menu.mybook" style="margin-right: 50px;">My Bookings</a> -->
		    </div>

	  	</div>
	  	<div class="navbar-nav ml-auto" style="margin-top: 15px;">
	  		<a class="nav-item nav-link active" href=""><i class="fa fa-language fa-2x"></i></a>

	  			<select class="selectpicker nav-item nav-link" data-width="fit" style="width: 100px; height: 10%;" id="langlist">
			    	<option  class="lang_selector" data-value="en"  style="background-image:url('img/en.png');">English</option>
				  	<option  class="lang_selector" data-value="sp">Español</option>
				  	<option  class="lang_selector" data-value="sp"">Français</option>
				</select>
		      <!-- <a class="nav-item nav-link active" href="http://twitter.com" target="_blank"><img src="img/twitter.png" width="100" style="margin-left: 10px;"></span></a>
		      <a class="nav-item nav-link active" href="http://facebook.com" target="_blank"><img src="img/facebook.png" width="100"></a>
		      <a class="nav-item nav-link active" href="http://instagram.com" target="_blank"><img src="img/instagram.png" width="100"></a>
		      <a class="nav-item nav-link active" href="http://whatsapp.com" target="_blank"><img src="img/whatsapp.png" width="100"></a>
 -->
		      <a class=" nav-link" href="authentication/logout.php" style="margin-left: 70px;" data-localize="logout">Logout</a>

		</div>
	</nav>
	