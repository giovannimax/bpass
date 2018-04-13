<?php
  include 'connect.php';
  if(empty($_SESSION['ID'])){
    header("location:login.php");
  }

  $RegID = $_REQUEST['RegID'];
  $ls_conf = $_REQUEST['ls_conf'];

  $decloan = $ls_conf - 1;
  $updateconfig = mysqli_query($con, "UPDATE loan_set SET ls_conf = '$decloan' WHERE RegID = '$RegID'")or die(mysqli_errno());
  header("location:admin_loan_config.php");
?>
