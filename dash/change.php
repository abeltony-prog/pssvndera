<!doctype html>
<html class="no-js" lang="en">
<?php include('include/logins.php'); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Update Fee | Petit Séminaire Saint Vincent de Ndera</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.jpg">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <?php
  if (Login::isLoggedIn()) {
    ?>
    <!-- Start Welcome area -->
    <div class="container-fluid">
      <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="../index.php">Petit Séminaire Saint Vincent de Ndera</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a class="fa fa-home" href="index.php"> Home</a></li>
        <li><a class="fa fa-users" href="staff.php"> Staff Members</a></li>
        <li><a class="fa fa-mobile" href="contact.php"> Contact Us</a></li>
        <li class="dropdown active">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="fee.php">Add Fees</a></li>
              <li><a href="calendar.php">School Calendar</a></li>
            </ul>
          </li>
      </ul>
      <ul >
        <form  class="nav navbar-nav navbar-right" action="" method="post">
          <button style="margin-top: 6px;margin-right: 10px;background-color: transparent; border: None;" class="btn btn-primary glyphicon glyphicon-log-out" type="submit" name="logout">Logout</button>
        </form>
        <?php include('include/logout.php') ?>
      </ul>
    </div>
  </nav><br><br><br><br>
  <div id="fh5co-staff">
    <div class="row animate-box">
      <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
        <h2><small><a href="fee.php">Home</a></small>  / Change Password</h2>
      </div>
    </div><br><br>
    <?php
    $pass = DB::query('SELECT password FROM user WHERE id=:id', array(':id'=>Login::isLoggedIn()));
    foreach ($pass as $key) {
      ?>
      <div class="container">
        <div class="row col-md-12">
          <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="form-group col-md-6">
            <label for="email">Recent Password:</label>
            <input type="text" name="recent" class="form-control" id="fee" value="<?php echo $key['password'] ?>" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="email">New Password:</label>
            <input type="text" name="new" class="form-control" id="fee" value="" placeholder="New Password">
          </div>
          <div class="form-group col-md-6">
          <button type="submit" class="btn btn-default">Reload</button>
          <button type="submit" name="change" class="btn btn-warning">Change</button>
        </div>
        </form>
        </div>
      </div>

      <?php
      if (isset($_POST['change'])) {
        $recent = $key['password'];
        $new = $_POST['new'];
        DB::query('UPDATE user SET password=:new WHERE id=:id', array(':new'=>password_hash($new, PASSWORD_BCRYPT),':id'=>Login::isloggedin()));
        echo "Password Changed!!";
      }
    }
     ?>
	</div>

    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
    <?php
  }else {
    echo "<script>window.open('login.php', '_self')</script>";
  }
   ?>
</body>

</html>
