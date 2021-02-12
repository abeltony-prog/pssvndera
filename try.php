<?php
  include('connection.php');

  $blog = "SELECT * FROM blog";
  $data = mysqli_connect($conn,$blog);

  while ($blog = mysqli_fetch_assoc()) {
    echo $key['title'];
  }

 ?>
