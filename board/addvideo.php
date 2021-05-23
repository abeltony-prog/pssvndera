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
   <title>Upload Video - PssvNdera</title>
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
                               <h2 class="pageheader-title">Pssv Ndera Videos</h2>
                               <p class="pageheader-text">Online WebApp</p>
                               <div class="page-breadcrumb">
                                   <nav aria-label="breadcrumb">
                                       <ol class="breadcrumb">
                                           <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                                           <li class="breadcrumb-item active" aria-current="page">Pssv Ndera Videos</li>
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
                                 <h5 class="card-header">Upload Video</h5>
                                 <div class="card-body">
                                     <form class="needs-validation" method="post" action="" enctype="multipart/form-data">
                                         <div class="form-row">
                                           <div class="col-xl-12 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom04">Attach video</label>
                                               <input type="file" name="image" class="form-control" id="validationCustom04">
                                           </div>
                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Description</label>
                                                 <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
                                             </div>

                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                                                 <button class="btn btn-success" name="upload" type="submit"><i class="fa fa-plus"></i> Add</button>
                                             </div>
                                         </div>
                                     </form>
                                     <?php
                                       if (isset($_POST['upload'])) {
                                         $target = "../images/".basename($_FILES['image']['name']);
                                         $file = $_FILES['image']['name'];
                                         $description = $_POST['description'];
                                         if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                           DB::query('INSERT INTO video VALUES(\'\', :image,:description,NOW())', array(':image'=>$file,':description'=>$description));
                                           echo "<script>window.open('addvideo.php', '_self')</script>";
                                           echo "
                                           <div class='alert alert-success'>
                                           Video uploaded Successfully!!!
                                           </div>
                                           ";
                                         }else {
                                           echo "
                                           <div class='alert alert-success'>
                                           Video wasn't uploaded Successfully!!!
                                           </div>
                                           ";
                                         }

                                       }
                                      ?>
                                 </div>
                             </div>
                         </div>
                         <!-- ============================================================== -->
                         <!-- end validation form -->
                         <!-- ============================================================== -->
                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                         <div class="row">
                           <?php
                             $video = DB::query('SELECT * FROM video');
                             foreach ($video as $var) {
                               ?>
                           <div class="card-group">
                             <div class="card-body">
                               <div class="card-body">
                                 <video width="320" height="240" controls>
                                   <source src="../images/<?php echo $var['image'] ?>" type="video/mp4">
                                     <source src="../images/<?php echo $var['image'] ?>" type="video/ogg">
                                       Your browser does not support the video tag.
                                     </video>
                                     <form method="post" enctype="multipart/form-data">
                                       <button class="btn btn-danger" type="submit" name="delete"><i class="fa fa-trash"></i> Delete</button>
                                     </form>
                               </div>
                             </div>
                           </div>
                           <?php
                           if (isset($_POST['delete'])) {
                             DB::query('DELETE FROM video WHERE id=:id', array(':id'=>$var['id']));
                             echo "<script>window.open('video.php', '_self')</script>";
                             echo "
                             <div class='alert alert-success'>
                             Video delete Successfully!!!
                             </div>
                             ";
                           }
                         }
                        ?>
                         </div>
                         </div>
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
