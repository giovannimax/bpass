<?php

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BPASS | Authorization Verification</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .navbar{
        margin-bottom:0;
        border-radius:0;
      }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BPASS Online Management System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <h1 class="page-header text-center"> Authorization Verification </h1>
    </div>

    <div class="container">
      <?php
        include 'connect.php';

        $ID = $_SESSION['ID'];
        if(empty($_SESSION['ID'])){
          header("location:login.php");
        }
        $now = date("Y-m-d");
        $RegID = $_REQUEST['RegID'];
        echo $RegID;

        if(isset($_POST['Submit'])){
          $Auth = $_POST['auth'];
          $checkpass = mysqli_query($con, "SELECT * FROM Admin WHERE Pword = '$Auth' AND AdminID = '$ID'")or die(mysqli_errno());
          $res = mysqli_num_rows($checkpass);

          if($res > 0){
            $deactivate = mysqli_query($con, "UPDATE Accounts SET isActive = '0' WHERE RegID = '$RegID'")or die(mysqli_errno());

            $now = date("now");
            $Msg = "DEACTIVATION SUCCESS: Admin ID: " . $ID . " Deactivated User ID: " . $RegID . " at " . $now;
            $log = mysqli_query($con, "INSERT INTO Archive_UserActive VALUES('', '$ID', '$Msg', '$RegID', '$now')")or die(mysqli_errno());
        		echo "<script>alert('Account Deactivated!');window.location.href='admin_view_user_details.php?RegID=$RegID';</script>";
          }else{
            echo "<script>alert('Deactivation Failed!');window.location.href='admin_view_user_details.php?RegID=$RegID';</script>";
          }
        }
      ?>
    </div>

    <div class="container">
      <div class="well well-lg">

            <form id="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

              <div class="form-group text-center ">
                <h1><label>Enter Password</label></h1>
                <input style="height:100px; font-size:35px;" type="password" name="auth" class="form-control" placeholder="Password here" required>
              </div>

              <input type="submit" name="Submit" class="btn btn-default" value="Submit">
            </form>
      </div>
    </div>
  </body>
</html>
