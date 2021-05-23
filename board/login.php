<!doctype html>
<html lang="en">
<?php include('include/DB.php') ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pssv Ndera Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="index.html"><img width="70" class="logo-img" src="assets/images/artisans logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
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
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
