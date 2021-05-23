<?php
if (!Login::isLoggedIn()) {
  die("<script>window.open('login.php', '_self')</script>");
}
if (isset($_POST['logout'])) {
    DB::query('DELETE FROM login WHERE u_id =:userid', array(':userid'=>Login::isLoggedIn()));
      echo "<script>window.open('login.php', '_self')</script>";
    if (isset($_COOKIE['SNID'])) {
    DB::query('DELETE FROM login WHERE token =:token', array(':token'=>sha1($_COOKIE['SNID'])));
        echo "<script>window.open('login.php', '_self')</script>";
    }
    setcookie('SNID', '1' , time()-3600);
    setcookie('SNID_', '1' , time()-3600);
}
 ?>
