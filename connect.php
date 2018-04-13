<?php
date_default_timezone_set('Asia/Hong_Kong');
session_start();
  ob_start();
  $con = mysqli_connect("localhost", "root","", "hoscomo")or die(mysqli_error());
?>
