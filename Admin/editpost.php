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

  <title>Pssv | Post News</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

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
      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

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
          <li>
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
            <h3 class="page-header"><i class="fa fa-edit"></i>Edit News</h3>
            <ol class="breadcrumb">
              <li><a href="index.php">Go Back</a></li>
              <li><i class="fa fa-home"></i>Home</li>
              <li><i class="fa fa-file-text-o"></i>Edit</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
              <!-- CKEditor -->
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Posts News
                  </header>
                  <div class="panel-body">
                    <div class="form">
                      <?php
                      $allnews = DB::query('SELECT * FROM posts WHERE id=:id', array(':id'=>$_GET['id']));
                      foreach ($allnews as $key) {
                        ?>
                        <form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
                          <div class="form-group">
                            <div class="col-lg-12 col-sm-10">
                              <label for="">Title</label>
                              <input class="form-control" type="text" name="title" value="<?php echo $key['title'] ?>" placeholder="Enter Title">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12 col-sm-10">
                              <textarea class="form-control ckeditor" name="content" rows="6"><?php echo $key['content'] ?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-lg-12 col-sm-10">
                              <label for="">Attach Image</label>
                              <input class="form-control" type="file" name="image" value="<?php echo $key['image'] ?>">
                            </div>
                          </div>
                          <button class="btn btn-primary pull-right mt-3" type="submit" name="update">Post</button>
                          <button class="btn btn-danger pull-right mt-3" type="submit" name="delete">Delete</button>

                        </form>
                        <?php
                        if (isset($_POST['update'])) {
                          $target = "../images/".basename($_FILES['image']['name']);
                          $title = $_POST['title'];
                          $content = $_POST['content'];
                          $image = $_POST['image'];
                          if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                            DB::query('UPDATE posts SET title=:title,content=:content,image=:image WHERE id=:id', array(':title'=>$title,':content'=>$content,':image'=>$file,':id'=>$key['id']));
                            echo "<script>window.open('index.php', '_self')</script>";
                          }else {
                            echo "
                            <div class='alert alert-danger'>
                             File wasn't uploaded Successfully!!!
                            </div>
                            ";
                          }
                        }elseif (isset($_POST['delete'])) {
                          DB::query('DELETE FROM posts WHERE id=:id', array(':id'=>$key['id']));
                          echo "
                          <div class='alert alert-success'>
                          post Deleted Successfully!!!
                          </div>
                          ";
                          echo "<script>window.open('index.php', '_self')</script>";
                        }
                      }
                       ?>
                    </div>

                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
        <!-- page end-->
            </div>
          </div>
        </div>
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
  <?php
}else {
  echo "<script>window.open('login.php', '_self')</script>";
}
 ?>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>
