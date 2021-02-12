<!DOCTYPE html>
<html lang="en">
<?php include('include/logins.php'); ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>PSSV | Change Password</title>

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
  <?php
  if (Login::isLoggedIn()) {
    ?>
  <div class="container">
    <?php
    $passwords = DB::query('SELECT * FROM user WHERE id=:id', array(':id'=>$_GET['id']));
    foreach ($passwords as $pass) {
      ?>
      <form class="login-form" method="post" action="">
        <div class="login-wrap">
          <p class="login-img"><i class="icon_lock_alt"></i></p>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_lock"></i></span>
            <input type="password" name="old" class="form-control" value="<?php echo $pass['password'] ?>" placeholder="Recent Password" autofocus>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" name="new" class="form-control" placeholder="New Password">
          </div>
          <button class="btn btn-success btn-lg btn-block" name="change" type="submit">Change</button>
          <a class="btn btn-default btn-lg btn-block" href="index.php">Go Back</a>
        </div>
      </form>
      <?php
      if (isset($_POST['change'])) {
        $recent = $pass['password'];
        $new = $_POST['new'];
        DB::query('UPDATE user SET password=:new WHERE id=:id', array(':new'=>password_hash($new, PASSWORD_BCRYPT),':id'=>Login::isloggedin()));
        echo "
        <div class='alert alert-success'>
        Password Changed
        </div>
        ";
      }
    }
     ?>
  </div>
  <?php
}else {
  echo "<script>window.open('login.php', '_self')</script>";
}
 ?>

</body>

</html>
