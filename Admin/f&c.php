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

  <title>PSSV | Calendar & Fees</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <?php
  if (Login::isLoggedIn()) {
    ?>
  <section id="container" class="">
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">PSSV <span class="lite">Ndera</span></a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <?php
                $admin = DB::query('SELECT * FROM user WHERE id=:id', array(':id'=>Login::isLoggedIn()));
                foreach ($admin as $key) {
                ?>
                <span class="username"><?php echo $key['username'] ?></span>
                <b class="caret"></b>
                <?php
                }
               ?>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li>
                <a href="contact.php"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="f&c.php"><i class="icon_document_alt"></i>Fees & Calendar Docs </a>
              </li>
              <li>
                <form action="" method="post">
                  <button style="margin-top: 6px;margin-right: 10px;background-color: transparent; border: None;" type="submit" name="logout">Logout</button>
              </form>
              <?php include('include/logout.php') ?>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->


    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li>
            <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li  class="">
            <a class="" href="widgets.php">
                          <i class="icon_genius"></i>
                          <span>Administraion</span>
                      </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_plus_alt"></i>
                          <span>Post</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="video.php">Video</a></li>
              <li><a class="" href="form_component.php"><span>News</span></a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-calendar"></i> Shool Calendar & Fees </h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
              <li><i class="fa fa-money"></i>Fees</li>
              <li><i class="fa fa-calendar"></i>Calendar</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Upload Calendar
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Attach Document<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="image" minlength="5" type="file" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" name="Upload" type="submit">Upload</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
                <?php
                if (isset($_POST['Upload'])) {
                  $target = "../images/".basename($_FILES['image']['name']);
                  $file = $_FILES['image']['name'];
                  DB::query('INSERT INTO calendar VALUES(\'\',:image)', array(':image'=>$file));
                  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    echo "<script>alert('Calendar Added Successfully!!!')</script>";
                    echo "<script>window.open('index.php', '_self')</script>";
                  }else {
                    echo "<span>Calendar wasn't Added</span>";
                  }
                }
                 ?>
              </div>
            </section>
            <section class="panel">
              <header class="panel-heading">
                Submit Bank Details
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="get" action="">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Bank Name<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="name" minlength="5" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Bank Code<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="code" minlength="5" type="text" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Paying Details<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="details" minlength="5" type="text" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" name="conferm" type="submit">Conferm</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
                <?php
                if (isset($_POST['conferm'])) {
                  $name = $_POST['name'];
                  $code = $_POST['code'];
                  $details = $_POST['details'];
                  DB::query('INSERT INTO fee VALUES(\'\', :name, :code,:details)', array(':name'=>$name,':code'=>$code,':details'=>$details));
                  echo "<script>alert('Bank Add Successfully!!!')</script>";
                  echo "<script>window.open('fee.php', '_self')</script>";
                }
                 ?>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section end -->
  <?php
}else {
  echo "<script>window.open('login.php', '_self')</script>";
}
 ?>
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
