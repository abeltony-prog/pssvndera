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
   <title>Add Staff Member - PssvNdera</title>
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
                               <h2 class="pageheader-title">Pssv Ndera Staff</h2>
                               <p class="pageheader-text">Online WebApp</p>
                               <div class="page-breadcrumb">
                                   <nav aria-label="breadcrumb">
                                       <ol class="breadcrumb">
                                           <li class="breadcrumb-item"><a href="staff.php" class="breadcrumb-link">Staff Members</a></li>
                                           <li class="breadcrumb-item active" aria-current="page">Pssv Ndera Add Staff</li>
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
                                 <h5 class="card-header">Add Member</h5>
                                 <div class="card-body">
                                   <?php
                                   if (isset($_POST['add'])) {
                                     $target = "../images/".basename($_FILES['image']['name']);
                                     $name = $_POST['name'];
                                     $title = $_POST['title'];
                                     $tel = $_POST['tel'];
                                     $email = $_POST['email'];
                                     $staff = $_POST['staff'];
                                     $file = $_FILES['image']['name'];
                                     if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                                       DB::query('INSERT INTO staff VALUES(\'\',:name,:title,:tel,:email,:staff,:image)', array(':name'=>$name,':title'=>$title,':tel'=>$tel,':email'=>$email,':staff'=>$staff,':image'=>$file));
                                       echo "
                                       <div class='alert alert-success'>
                                       Member added Successfully!!!
                                       </div>
                                       ";
                                       echo "<script>window.open('staff.php', '_self')</script>";
                                     }else {
                                       echo "
                                       <div class='alert alert-success'>
                                       Member wasn't added Successfully!!!
                                       </div>
                                       ";                    }
                                   }
                                    ?>
                                     <form class="needs-validation" method="post" action="" enctype="multipart/form-data">
                                         <div class="form-row">
                                             <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">FullNames</label>
                                                 <input type="text" class="form-control" name="name" id="validationCustom03" placeholder="FullNames" required>
                                             </div>
                                             <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Role & Title</label>
                                                 <input type="text" class="form-control" id="validationCustom03" name="title" placeholder="Role & Title" required>
                                             </div>
                                             <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom03">Phone Number</label>
                                                 <input type="text" class="form-control"  name="tel" id="validationCustom03" placeholder="Phone Number" required>
                                             </div>

                                             <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">State</label>
                                                 <input type="email" name="email" class="form-control" id="validationCustom04" placeholder="Email">
                                             </div>
                                             <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                 <label for="validationCustom04">Attach Photo</label>
                                                 <input type="file" name="image" class="form-control" id="validationCustom04">
                                             </div>
                                             <div class="col-xl-6 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                               <label for="validationCustom04">Category</label>
                                             <select class="form-control" name="staff">
                                               <option value="">Select Staff Category</option>
                                               <option value="RECTEUR">RECTEUR</option>
                                               <option value="COMITE DES PARENT">COMITE DES PARENT</option>
                                               <option value="AUTRES PRETRES FORMATEURS">AUTRES PRETRES FORMATEURS</option>
                                               <option value="ARCHEVEQUE">ARCHEVEQUE</option>
                                             </select>
                                           </div>
                                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pull-right">
                                                 <button class="btn btn-primary" type="submit" name="add"><i class="fa fa-plus"></i></button>
                                             </div>
                                         </div>
                                     </form>
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
