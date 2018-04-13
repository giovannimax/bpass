<?php 
include 'connect.php';
$id="";
if(empty($_SESSION['tempID']))
  $id = $_SESSION['id'];
else
  $id = $_SESSION['tempID'];
$sql = "SELECT code FROM accounts WHERE RegID = '$id'";
$result = mysqli_query($con, $sql);
$code = "";

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $code = $row['code'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BPASS Verification</title>

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
  <body  style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">BPASS</span>
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
      <h1 class="page-header text-center"> BPASS Online Management System </h1>
    </div>

    <div class="container">
      <div class="well well-lg">
        <?php
          if(isset($_POST['btnSubmit'])){
  //$code = $_POST['code'];
  $auth = $_POST['auth'];

  if($code == $auth){
    $result = mysqli_query($con, "UPDATE accounts SET verify = '1' WHERE RegID = '$id'");
    $insertshares = mysqli_query($con, "INSERT INTO Membership_fundnshare VALUES('$id', '0000.00', '0000.00', '0000.00', '0000.00', '0000.00')");
    echo "<script> alert('Success!') </script>";
    header("location: login.php");
  }else{
    echo "<div class='alert alert-warning' role='alert'>Invalid verification code.</div>";
    //header("location:login.php");
  }

}

 if(!empty($_GET)){
    echo "<div class='alert alert-warning' role='alert'>Your number is not yet verified.</div>";
  }

        ?>
            <form id="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

              <div class="form-group">
                <label>Enter Authorization Code</label>
                <input type="hidden" name="code" value="<?php $code ?>">
                <input type="text" name="auth" class="form-control" placeholder="Authorization code here" required>
              </div>

              <input type="submit" name="btnSubmit" class="btn btn-default" value="Submit">
            </form>
      </div>
    </div>
  </body>
</html>
