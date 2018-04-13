<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BPASS| Authorization Verification</title>

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
        if(empty($_SESSION['ID'])){
          header("location:login.php");
        }

      ?>
    </div>

    <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="well well-lg">
            <?php
              if($_REQUEST['btn'] == "edit"){
                $qty = $_REQUEST['Qty'];
                $poid = $_REQUEST['poID'];
                $prodid = $_REQUEST['ProdID'];
                $unitprice = $_REQUEST['Price'];

                if(isset($_POST['Editbtn'])){
                  $Qty = $_POST['qty'];

                  if($Qty <= 0){
                    echo "<div class='alert alert-warning' role='alert'>Invalid Quantity</div>";
                  }else{
                    $newprice = $Qty * $unitprice;

                    $update = mysqli_query($con, "UPDATE purchase_order SET Qty = '$Qty', Total = '$newprice' WHERE poID = '$poid' AND ProdID = '$prodid' AND Status = 'Pending'")or die(mysqli_errno());
                    header("location:admin_purchaseorder.php");
                  }
                }
              }else if($_REQUEST['btn'] == "delete"){
                $poid = $_REQUEST['poID'];
                $prodid = $_REQUEST['ProdID'];
                $delete = mysqli_query($con, "DELETE FROM purchase_order WHERE poID = '$poid' AND ProdID = '$prodid' AND Status = 'Pending'")or die(mysqli_errno());
                header("location:admin_purchaseorder.php");
              }
            ?>
            <form id="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="text-center">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="qty" class="form-control" placeholder="<?php echo $qty; ?>" required>
                </div>
                <input type="submit" name="Editbtn" class="btn btn-success" value="Submit">
                <a href="admin_purchaseorder.php" class="btn btn-danger">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
