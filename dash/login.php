<!DOCTYPE html>
<html lang="en">
<?php include('include/DB.php') ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Login | Petit Séminaire Saint Vincent de Ndera</title>

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.jpg">
  <!-- Bootstrap core CSS -->
  <link href="login/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="login/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="login/css/style.css" rel="stylesheet">
  <link href="login/css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Mutware
    Template URL: https://templatemag.com/Mutware-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
        <form class="form-login" action="" method="post" enctype="multipart/form-data">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password"><br>
          <button class="btn btn-theme btn-block" name="login" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
        <!--  <div class="login-social-link centered">
            <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>-->
        </div>
      </form>
      <?php
        if (isset($_POST['login'])) {
          $username = $_POST['username'];
          $password = $_POST['password'];
          if (DB::query('SELECT username FROM user WHERE username = :username', array(':username'=>$username))) {
            if (password_verify($password , DB::query('SELECT password FROM user WHERE username=:username', array(':username'=>$username))[0]['password'])) {
              $cstrong = True;
              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
              $user_id = DB::query('SELECT id FROM user WHERE username=:username', array(':username'=>$username))[0]['id'];
              DB::query('INSERT INTO login VALUES(\'\', :token, :u_id)', array(':token'=>sha1($token),':u_id'=>$user_id));
              setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE );
              setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE );
              echo "<script>window.open('index.php', '_self')</script>";
            }else {
              echo "<script>alert('Unknown Password')</script>";
            }
          }else {
            echo "<script>alert('Unknown User and Wrong password')</script>";
          }
      }
       ?>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="login/lib/jquery/jquery.min.js"></script>
  <script src="login/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="login/lib/jquery.backstretch.min.js"></script>
</body>

</html>
