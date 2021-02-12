<form class="" action="" method="post">
  <input type="text" name="username" value="">
  <input type="password" name="pass" value="">
  <input type="submit" name="add" value="add">
</form>
<?php
include('include/DB.php');
  if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $password = $_POST['username'];
    DB::query('INSERT INTO user VALUES(\'\',:username,:password)', array(
      ':username'=>$username,':password'=>password_hash($password, PASSWORD_BCRYPT)
    ));
    echo "<script>alert('user added successful!')</script>";
}
 ?>
