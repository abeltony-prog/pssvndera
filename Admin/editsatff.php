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

  <title>PSSV | Edit</title>

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
  <?php
  if (Login::isLoggedIn()) {
    ?>
  <!-- container section start -->
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
          <li  class="active">
            <a class="" href="staff.php">
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
            <h3 class="page-header"><i class="fa fa-files-o"></i> Edit user</h3>
            <ol class="breadcrumb">
              <li><i class="icon_genius"></i><a href="staff.php">Administraion</a></li>
              <li><i class="fa fa-users"></i>staff</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Member Of Administraion
              </header>
              <?php
              $edit = DB::query('SELECT * FROM staff WHERE id=:id', array(':id'=>$_GET['id']));
              foreach ($edit as $e) {
                ?>
                <div class="panel-body">
                  <div class="form">
                    <form class="form-validate form-horizontal" method="post" action="" enctype="multipart/form-data">
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Fullnames<span class="required">*</span></label>
                        <div class="col-lg-10">
                          <input class="form-control" id="cname" name="name" minlength="5" type="text" value="<?php echo $e['name'] ?>" required />
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Title<span class="required">*</span></label>
                        <div class="col-lg-10">
                          <input class="form-control" id="cname" name="title" minlength="5" type="text" value="<?php echo $e['title'] ?>" required />
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Telphone<span class="required">*</span></label>
                        <div class="col-lg-10">
                          <input class="form-control" id="cname" name="tel" minlength="5" type="text" value="+<?php echo $e['tel'] ?>" required />
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Email<span class="required">*</span></label>
                        <div class="col-lg-10">
                          <input class="form-control" id="cname" name="email" minlength="5" type="email" value="<?php echo $e['email'] ?>" required />
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Staff Category<span class="required">*</span></label>
                        <div class="col-lg-10">
                          <select id="cname" minlength="5" class="form-control" name="staff" id="">
                            <option value="<?php echo $e['staff'] ?>"><?php echo $e['staff'] ?></option>
                            <option value="RECTEUR">RECTEUR</option>
                            <option value="COMITE DES PARENT">COMITE DES PARENT</option>
                            <option value="AUTRES PRETRES FORMATEURS">AUTRES PRETRES FORMATEURS</option>
                            <option value="ARCHEVEQUE">ARCHEVEQUE</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group ">
                        <label for="cname" class="control-label col-lg-2">Attach Photo<span class="required">*</span></label>
                        <div class="col-lg-10">
                          <input class="form-control" id="cname" name="image" minlength="5" type="file"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-success" name="update" type="submit">Update</button>
                          <button class="btn btn-danger" name="delete" type="submit">Remove</button>
                        </div>
                      </div>
                    </form>
                    <?php
                    if (isset($_POST['update'])) {
                      $target = "../images/".basename($_FILES['image']['name']);
                      $name = $_POST['name'];
                      $title = $_POST['title'];
                      $tel = $_POST['tel'];
                      $email = $_POST['email'];
                      $staff = $_POST['staff'];
                      $file = $_FILES['image']['name'];
                      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                        DB::query('UPDATE staff SET name=:name,title=:title,tel=:tel,email=:email,staff=:staff,image=:image WHERE id=:id', array(':name'=>$name,':title'=>$title,':tel'=>$tel,':email'=>$email,':staff'=>$staff,':image'=>$file,':id'=>$var['id']));
                        echo "
                        <div class='alert alert-success'>
                        Updated Successfully!!!
                        </div>
                        ";
                        echo "<script>window.open('staff.php', '_self')</script>";
                      }else {
                        echo "
                        <div class='alert alert-success'>
                        wasn't uploaded Successfully!!!
                        </div>
                        ";
                      }
                    }elseif (isset($_POST['delete'])) {
                      DB::query('DELETE FROM staff WHERE id=:id', array(':id'=>$_GET['id']));
                      echo "
                      <div class='alert alert-success'>
                      Member Deleted Successfully!!!
                      </div>
                      ";
                      echo "<script>window.open('staff.php', '_self')</script>";
                    }
                     ?>
                  </div>

                </div>

                <?php
              }
               ?>
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
