<!DOCTYPE html>
<html lang="en">
<?php include('include/DB.php') ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>PSSV |Login</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="post">
      <div class="login-wrap">
        <p class="login-img"><i class="fa fa-user"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="username" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button name="login" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
  </div>
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

</body>

</html>
