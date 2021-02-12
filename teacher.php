<!DOCTYPE HTML>
<?php include('dash/include/logins.php'); ?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Petit Séminaire Saint &mdash;  Vincent de Ndera </title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="freehtml5.co" />

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Pricing -->
	<link rel="stylesheet" href="css/pricing.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-right">
							<p class="site"><a href="english/index.php"><img width="15" src="images/flagicon.jpg" alt=""></a></p>
							<p class="site"><a href="index.php"><img width="15" src="images/flagicon2.jpg" alt=""></a></p>
							<p class="num">Call: +250 783 714 159</p>
							<ul class="fh5co-social">
								<li><a style="color: blue;" href="#"><i class="icon-facebook2"></i></a></li>
								<li><a style="color:darkblue" href="#"><i class="icon-twitter2"></i></a></li>
								<li><a style="color:red" href="#"><i class="icon-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="col-md-12 col-sm-12 col-xs-4">
						<div class="text-center" id="fh5co-logo"><a class="col-md-12 col-sm-12 col-xs-4" href="index.php"><img width="90" src="images/logo.jpg" alt=""><h1>Petit Séminaire Saint  Vincent de Ndera</h1></a></div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 text-center menu-1">
							<ul>
								<li><a href="index.php">Accueil</a></li>
								<li><a style="color: orange;" href="teacher.php">Administration</a></li>
								<li><a href="about.php">Historique</a></li>
								<li><a href="index.php#LavieauSeminaire">La vie au Séminaire</a></li>
								<li><a href="blog.php">Actualité</a></li>
								<li><a href="contact.php">Contactez-nous</a></li>
							</ul>

						</div>
					</div>

				</div>
			</div>
		</nav>

	<div id="fh5co-staff">
		<div class="container">
			<div class="row">
				<?php
				    $ARCHEVEQUE = "ARCHEVEQUE";
				    $one = DB::query('SELECT * FROM staff WHERE staff=:staff ORDER BY id DESC LIMIT 1', array(':staff'=>$ARCHEVEQUE));
				    foreach ($one as $value) {
				      ?>
							<div class="row">

							<div class="pricing pricing--rabten">
								<div class="col-md-4 animate-box">
									<div class="staff">
										<img class="staff-img" src="images/<?php echo $value['image'] ?>" alt="">
										<div class="text-center">
											<p><?php echo $value['title'] ?></p>
											<h3><?php echo $value['name']; ?></h3>
										</div>
									</div>
							</div>
							</div>
							</div>
				      <?php
				    }
				 ?>
				<?php
				    $RECTEUR = "RECTEUR";
				    $one = DB::query('SELECT * FROM staff WHERE staff=:staff ORDER BY id DESC LIMIT 1', array(':staff'=>$RECTEUR));
				    foreach ($one as $value) {
				      ?>
							<div class="row">

							<div class="pricing pricing--rabten">
								<div class="col-md-4 animate-box">
									<div class="staff">
										<img class="staff-img" src="images/<?php echo $value['image'] ?>" alt="">
										<div class="text-center">
											<p><?php echo $value['title'] ?></p>
											<h3><?php echo $value['name']; ?></h3>
										</div>
									</div>
							</div>
							</div>
							</div>
				      <?php
				    }
				 ?>
			</div>
			<div class="row">
				<div class="row animate-box">
					<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
						<h2>Autres Pretres Formateurs</h2>
					</div>
				</div>
				<?php
				    $AUTRES_PRETRES_FORMATEURS = "AUTRES PRETRES FORMATEURS";
				    $one = DB::query('SELECT * FROM staff WHERE staff=:staff ORDER BY id DESC LIMIT 5', array(':staff'=>$AUTRES_PRETRES_FORMATEURS));
				    foreach ($one as $value) {
				      ?>
				      <div class="col-md-4 text-center">
				        <div class="staff">
				          <img class="staff-img" src="images/<?php echo $value['image'] ?>" alt="">
				          <p><?php echo $value['title'] ?></p>
				          <h3><?php echo $value['name']; ?></h3>
				          <p>Tel :<?php echo $value['tel']."<br> Email: ".$value['email'] ?></p>
				        </div>
				      </div>
				      <?php
				    }
				 ?>
				</div>

			</div>
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
						<h2>Comité des parents</h2>
					</div>
				</div>
				<?php
						$COMITE_DES_PARENT = "COMITE DES PARENT";
						$two = DB::query('SELECT * FROM staff WHERE staff=:staff ORDER BY id DESC LIMIT 4', array(':staff'=>$COMITE_DES_PARENT));
						foreach ($two as $var) {
							?>
							<div class="col-md-3 text-center">
								<div class="staff">
									<img class="staff-img" src="images/<?php echo $var['image'] ?>" alt="">
									<p><?php echo $var['title'] ?></p>
									<h3><?php echo $var['name']; ?></h3>
									<p>Tel :<?php echo $var['tel']."<br> Email: ".$var['email'] ?></p>
								</div>
							</div>
							<?php
						}
				 ?>
				 </div>
				</div>
				<footer id="fh5co-footer" role="contentinfo" style="background-image: url(images/img_bg_5.jpg);">
					<div class="overlay"></div>
					<div class="container">
						<div class="row row-pb-md">
							<div class="col-md-4 col-sm-12 col-xs-6 col-md-push-1 fh5co-widget">
								<h3>Acces Rapide</h3>
								<p>
									<a href="calendar.php">Calendrier Scolaire</a><br>
									<a href="teacher.php">Administration</a><br>
									<a href="teacher.php">Comité des parents</a><br>
									<a href="pricing.php">Minerval</a>
								</p>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-6 col-md-push-1 fh5co-widget">
								<h3>Autres liens</h3>
								<ul class="fh5co-footer-links">
									<li><a style="color:#fff" href="http://www.archidiocesekigali.org/">www.archidiocesekigali.org</a></li>
									<li><a style="color:#fff" href="https://eglisecatholiquerwanda.org/">www.eglisecatholiquerwanda.org</a></li>
									<li><a style="color:#fff" href="http://www.vatican.va/">www.vatican.va</a></li>
								</ul>
							</div>

							<div class="col-md-4 col-sm-12 col-xs-6 col-md-push-1 fh5co-widget">
								<h3>Contactez - nous</h3>
								<ul class="fh5co-footer-links">
									<li>Email : psndera@yahooo.fr</li>
									<li>Tel : +250 788 452 770 Or +250 783 714 159  </li>
								</ul>
							</div>
						</div>

						<div class="row copyright">
							<div class="col-md-12 text-center">
								<p>
									<small class="block">&copy; 2020 website. All Rights Reserved.</small>
									<small class="block">Designed by <a href="http://onicode.app.netlify/" target="_blank">Niyindagiye Abel Tony</a></small>
								</p>
							</div>
						</div>

					</div>
				</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Count Down -->
	<script src="js/simplyCountdown.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>
	<script>
    var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
	</script>
	</body>
</html>
