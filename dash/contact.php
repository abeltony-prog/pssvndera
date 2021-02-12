<!doctype html>
<html class="no-js" lang="en">
<?php include('include/logins.php'); ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact | Petit Séminaire Saint Vincent de Ndera</title>
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
        <li class="active"><a class="fa fa-mobile" href="contact.php"> Contact Us</a></li>

      </ul>
      <ul >
        <form  class="nav navbar-nav navbar-right" action="" method="post">
          <button style="margin-top: 6px;margin-right: 10px;background-color: transparent; border: None;" class="btn btn-primary glyphicon glyphicon-log-out" type="submit" name="logout">Logout</button>
        </form>
        <?php include('include/logout.php') ?>
      </ul>
    </div>
  </nav><br><br><br><br>
  <div class="container">
    <div class="row">
      <?php
      $contacts = DB::query('SELECT * FROM contact ORDER BY id DESC LIMIT 20');
      foreach ($contacts as $key) {
        ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            <div style="background-color: lightgray;"  class="hpanel widget-int-shape responsive-mg-b-30">
                <div class="panel-body">
                    <div class="stats-title">
                        <h4><?php echo $key['fname']." ".$key['lname']; ?></h4>
                    </div>
                    <div class="m-t-xl widget-cl-2">
                      <h2><?php echo $key['sub'] ?></h2>
                        <p>
                          <?php echo $key['message'] ?> <strong style="color:darkblue" ><a href="#"><?php echo $key['email'] ?></a><?php echo $key['tel']; ?></strong>
                      </p>
                    </div>
                    <span class="pull-right"><?php echo $key['posted_at'] ?></span>
                </div>
            </div>
        </div>
        <?php
      }
       ?>
    </div>
  </div>
  <?php
}else {
  echo "<script>window.open('login.php', '_self')</script>";
}
 ?>
</body>

</html>
