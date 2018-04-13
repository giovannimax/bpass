<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BPASS Online Management System | Authorization Verification</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .navbar{
        margin-bottom:0;
        border-radius:0;
      }
    </style>
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
      <h1 class="page-header text-center"> Delivery Form </h1>
    </div>

    <div class="container">
      <?php
        include 'connect.php';
        if(empty($_SESSION['ID'])){
          header("location:login.php");
        }
        $today = date("Y-m-d");

        // REQUEST Variables
        $PrevQty = $_REQUEST['Qty'];
        $ProdID = $_REQUEST['ProdID'];
        $poID = $_REQUEST['poid'];

        if(isset($_POST['Addbtn'])){
          $DeliveredQty = $_POST['qty'];

          // Search if existing item is delivered in the same day
          $searchdel = mysqli_query($con, "SELECT * FROM deliveries WHERE poid = '$poID' AND ProdID = '$ProdID' AND Date = '$today'")or die(mysqli_errno());
          $resdel = mysqli_num_rows($searchdel);

          if($resdel > 0){ // If search is true

            // Get the previous delivered amount
            while($getdelamt = mysqli_fetch_array($searchdel)){
              $PrevDelAmt = $getdelamt['DelAmt'];
            }

            $totaldelivered = $DeliveredQty + $PrevDelAmt;
            $Amt = $PrevQty - $totaldelivered;

            if($Amt <= 0){ // If Amt is equal to 0 or less than 0
              $deldeliveries = mysqli_query($con, "UPDATE deliveries SET DelAmt = '$totaldelivered' WHERE poid = '$poID' AND ProdID = '$ProdID' AND Date = '$today'")or die(mysqli_errno());

              // Update Stocks Logic
              $selectinventory = mysqli_query($con, "SELECT * FROM Inventory WHERE ProdID = '$ProdID'")or die(mysqli_errno());

              while($getinventory = mysqli_fetch_array($selectinventory)){
                $stocks = $getinventory['Stocks'];
                $id = $getinventory['InvID'];
              }
              $addStocks = $DeliveredQty + $stocks;

              $updateInventory = mysqli_query($con, "UPDATE inventory SET Stocks = '$addStocks' WHERE ProdID = '$ProdID' AND InvID = '$id'")or die(mysqli_errno());
              // End of Logic

              $checkpo = mysqli_query($con, "SELECT * FROM purchase_order WHERE poid = '$poID' AND isDelivered = '0'")or die(mysqli_errno());
              $respo = mysqli_num_rows($checkpo);

              if($respo > 1){ // Check if more than 1 item is not yet delivered
                $updatepo=mysqli_query($con, "UPDATE purchase_order SET isDelivered = '1' WHERE poid = '$poID' AND ProdID = '$ProdID'")or die(mysqli_errno());
                header("location:admin_delivery.php?poid=$poID");
              }else if($respo == 1){ // Check if only 1 item is not yet delivered
                $updatepo=mysqli_query($con, "UPDATE purchase_order SET Status = 'Complete', isDelivered = '1' WHERE poid = '$poID'")or die(mysqli_errno());
                header("location:admin_delivery.php?poid=$poID");
              }

            }else{ // If there are still remaing quantity to be delivered

              $deldeliveries = mysqli_query($con, "UPDATE deliveries SET DelAmt = '$totaldelivered' WHERE poid = '$poID' AND ProdID = '$ProdID' AND Date = '$today'")or die(mysqli_errno());

              // Update Stocks Logic
              $selectinventory = mysqli_query($con, "SELECT * FROM Inventory WHERE ProdID = '$ProdID'")or die(mysqli_errno());

              while($getinventory = mysqli_fetch_array($selectinventory)){
                $stocks = $getinventory['Stocks'];
                $id = $getinventory['InvID'];
              }
              $addStocks = $DeliveredQty + $stocks;

              $updateInventory = mysqli_query($con, "UPDATE inventory SET Stocks = '$addStocks' WHERE ProdID = '$ProdID' AND InvID = '$id'")or die(mysqli_errno());
              // End of Logic

              $checkpo = mysqli_query($con, "SELECT * FROM purchase_order WHERE poid = '$poID' AND isDelivered = '0'")or die(mysqli_errno());
              $respo = mysqli_num_rows($checkpo);

              $updatepo=mysqli_query($con, "UPDATE purchase_order SET Status = 'In-complete' WHERE poid = '$poID' AND ProdID = '$ProdID'")or die(mysqli_errno());
              header("location:admin_delivery.php?poid=$poID");
            }

          }else{ // If search is false
            // Compute total items delivered
            $Amt = $PrevQty - $DeliveredQty;

            if($Amt <= 0){ // If Amt is equal to 0 or less than 0
              $insertdeliveries = mysqli_query($con, "INSERT INTO deliveries VALUES('$poID', '$ProdID', '$DeliveredQty', '$today')")or die(mysqli_errno());

              // Update Stocks Logic
              $selectinventory = mysqli_query($con, "SELECT * FROM Inventory WHERE ProdID = '$ProdID'")or die(mysqli_errno());

              while($getinventory = mysqli_fetch_array($selectinventory)){
                $stocks = $getinventory['Stocks'];
                $id = $getinventory['InvID'];
              }
              $addStocks = $DeliveredQty + $stocks;

              $updateInventory = mysqli_query($con, "UPDATE inventory SET Stocks = '$addStocks' WHERE ProdID = '$ProdID' AND InvID = '$id'")or die(mysqli_errno());
              // End of Logic

              $checkpo = mysqli_query($con, "SELECT * FROM purchase_order WHERE poid = '$poID' AND isDelivered = '0'")or die(mysqli_errno());
              $respo = mysqli_num_rows($checkpo);

              if($respo > 1){ // Check if more than 1 item is not yet delivered
                $updatepo=mysqli_query($con, "UPDATE purchase_order SET isDelivered = '1' WHERE poid = '$poID' AND ProdID = '$ProdID'")or die(mysqli_errno());
                header("location:admin_delivery.php?poid=$poID");
              }else if($respo == 1){ // Check if only 1 item is not yet delivered
                $updatepo=mysqli_query($con, "UPDATE purchase_order SET Status = 'Complete', isDelivered = '1' WHERE poid = '$poID'")or die(mysqli_errno());
                header("location:admin_delivery.php?poid=$poID");
              }

            }else{ // If there are still remaing quantity to be delivered
              $insertdeliveries = mysqli_query($con, "INSERT INTO deliveries VALUES('$poID', '$ProdID', '$DeliveredQty', '$today')")or die(mysqli_errno());

              // Update Stocks Logic
              $selectinventory = mysqli_query($con, "SELECT * FROM Inventory WHERE ProdID = '$ProdID'")or die(mysqli_errno());

              while($getinventory = mysqli_fetch_array($selectinventory)){
                $stocks = $getinventory['Stocks'];
                $id = $getinventory['InvID'];
              }
              $addStocks = $DeliveredQty + $stocks;

              $updateInventory = mysqli_query($con, "UPDATE inventory SET Stocks = '$addStocks' WHERE ProdID = '$ProdID' AND InvID = '$id'")or die(mysqli_errno());
              // End of Logic

              $checkpo = mysqli_query($con, "SELECT * FROM purchase_order WHERE poid = '$poID' AND isDelivered = '0'")or die(mysqli_errno());
              $respo = mysqli_num_rows($checkpo);

              $updatepo=mysqli_query($con, "UPDATE purchase_order SET Status = 'In-complete' WHERE poid = '$poID'")or die(mysqli_errno());
              header("location:admin_delivery.php?poid=$poID");
            }
          }
        }
      ?>
    </div>

    <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="well well-lg">
            <form id="login" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <div class="text-center">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="qty" class="form-control" required>
                </div>
                <input type="submit" name="Addbtn" class="btn btn-success" value="Submit">
                <a href="admin_delivery.php?poid=$poID" class="btn btn-danger">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
