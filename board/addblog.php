<!doctype html>
<html lang="en">
<?php include('include/logins.php'); ?>

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
   <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/libs/css/style.css">
   <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
   <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
   <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
   <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
   <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
   <script src="tinymce/tinymce.min.js" charset="utf-8"></script>
   <script type="text/javascript">
     tinymce.init({
       selector: '#myTextarea'
     })
   </script>
   <title>Add New Post - PssvNdera</title>
</head>
<?php
if (Login::isLoggedIn()) {
  ?>
<body>
   <!-- ============================================================== -->
   <!-- main wrapper -->
   <!-- ============================================================== -->
   <div class="dashboard-main-wrapper">
       <!-- ============================================================== -->
       <!-- navbar -->
       <!-- ============================================================== -->
       <div class="dashboard-header">
         <?php
         include('mainlayout.php');
          ?>
       </div>
       <!-- ============================================================== -->
       <!-- end navbar -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- left sidebar -->
       <!-- ============================================================== -->
       <div class="nav-left-sidebar sidebar-dark">
           <div class="menu-list">
             <?php include('layout.php') ?>
           </div>
       </div>
       <!-- ============================================================== -->
       <!-- end left sidebar -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- wrapper  -->
       <!-- ============================================================== -->
       <div class="dashboard-wrapper">
           <div class="dashboard-ecommerce">
               <div class="container-fluid dashboard-content ">
                   <!-- ============================================================== -->
                   <!-- pageheader  -->
                   <!-- ============================================================== -->
                   <div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="page-header">
                               <h2 class="pageheader-title">Pssv Ndera Blog Post</h2>
                               <p class="pageheader-text">Online WebApp</p>
                               <div class="page-breadcrumb">
                                   <nav aria-label="breadcrumb">
                                       <ol class="breadcrumb">
                                           <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                           <li class="breadcrumb-item active" aria-current="page">Pssv Ndera Add Post</li>
                                       </ol>
                                   </nav>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- ============================================================== -->
                   <!-- end pageheader  -->
                   <!-- ============================================================== -->
                   <div class="ecommerce-widget">
                     <div class="row">
                         <!-- ============================================================== -->
                         <!-- validation form -->
                         <!-- ============================================================== -->
                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                             <div class="card">
                                 <h5 class="card-header">Post Blog</h5>
                                 <div class="card-body">
                                     <form class="needs-validation" method="post" enctype="multipart/form-data">
                                         <div class="form-row">
                                           <div class="col-xl-12 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom04">Title</label>
                                               <input type="text" name="title" class="form-control" id="validationCustom04">
                                           </div>
                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                 <textarea id="myTextarea" class="form-control" name="content" rows="8" cols="80"></textarea>
                                             </div>
                                             <div class="col-xl-12 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Attach Image</label>
                                                 <input type="file" name="image" class="form-control" id="validationCustom04">
                                             </div>
                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                                                 <button class="btn btn-success" type="submit" name="post"><i class="fa fa-plus"></i> Post</button>
                                             </div>
                                         </div>
                                     </form>
                                     <?php
                                       if (isset($_POST['post'])) {
                                         $target = "../images/".basename($_FILES['image']['name']);
                                         $title = $_POST['title'];
                                         $content= $_POST['content'];
                                         $file = $_FILES['image']['name'];
                                         DB::query('INSERT INTO posts VALUES(\'\', :title,:content,:image,NOW())', array(':title'=>$title,':content'=>$content,':image'=>$file));
                                         echo "
                                         <div class='alert alert-success'>
                                         News Posted Successfully!!!
                                         </div>
                                         ";
                                       }
                                      ?>
                                 </div>
                             </div>
                         </div>
                         <!-- ============================================================== -->
                         <!-- end validation form -->
                         <!-- ============================================================== -->
                     </div>
                   </div>
               </div>
           </div>
           <!-- ============================================================== -->
           <!-- ============================================================== -->
       </div>
       <!-- ============================================================== -->
       <!-- end wrapper  -->
       <!-- ============================================================== -->
   </div>
   <!-- ============================================================== -->
   <!-- end main wrapper  -->
   <!-- ============================================================== -->
   <!-- Optional JavaScript -->
   <!-- jquery 3.3.1 -->
   <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
   <!-- bootstap bundle js -->
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
   <!-- slimscroll js -->
   <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
   <!-- main js -->
   <script src="assets/libs/js/main-js.js"></script>
   <!-- chart chartist js -->
   <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
   <!-- sparkline js -->
   <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
   <!-- morris js -->
   <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
   <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
   <!-- chart c3 js -->
   <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
   <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
   <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
   <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
<?php
}else {
echo "<script>window.open('login.php', '_self')</script>";
}
?>
</html>
