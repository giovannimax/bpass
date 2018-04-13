<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BPASS Online Management System</title>
    <link rel = "icon" type ="img/jpg" href="logo.ico"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <?php
    include 'connect.php';
    $ID = $_SESSION['ID'];
    if(empty($_SESSION['ID'])){
      header("location:login.php");
    }
    $today = date("Y-m-d");
    $totalQty = 0;
    $totalCheckOut = 0;
  ?>



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">HOSCOMCO E-Commerce</a>
            </div>


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <li>
                <a href="user_panel.php">Dashboard</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="homecare.php?CatID=1001">Home Cleaners</a></li>
                    <li><a href="homecare.php?CatID=1002">Laundry Care</a></li>
                    <li><a href="homecare.php?CatID=1003">Hand Hygiene</a></li>
                  </ul>
                </li>

                <li>
                    <a href="cart.php">Cart</a>
                </li>
                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
                <li>
                    <a href="user_transaction.php">Transaction History</a>
                </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <hr>

        <div class="container"><div class="coats sing-c text-center">
            <h3 class="c-head">Your Shopping Cart(
              <?php $loaditems = mysqli_query($con, "SELECT * FROM cart WHERE  RegID = '$ID' AND CheckOut = '0'")or die(mysqli_errno());
                $countcart = mysqli_num_rows($loaditems);
                echo $countcart;
                ?>)</h3>
            <p><?php $res = ($countcart == 0) ? "Your cart is feeling empty" : "You have ". $countcart ." Item/s."; echo $res;?></a></p>
        </div>
        <?php

          $loadcart = mysqli_query($con, "SELECT cart.Qty, cart.Price, cart.ProdID, cart.CartID, cart.CheckOut, Products.ProdName, Products.ProdID FROM cart INNER JOIN Products ON Products.ProdID=cart.ProdID WHERE  RegID = '$ID' AND CheckOut = '0'")or die(mysqli_errno());
          $countcart = mysqli_num_rows($loadcart);

          if($countcart > 0){
            echo "<table class='table table-hover'>";
            echo "<tr>";
              echo "<th class='bg-primary'>Cart ID</th>";
              echo "<th class='bg-primary'>Item ID</th>";
              echo "<th class='bg-primary'>Item Name</th>";
              echo "<th class='bg-primary'>Quantity</th>";
              echo "<th class='bg-primary'>Total Price</th>";
            echo "</tr>";
            while($getcartinfo = mysqli_fetch_array($loadcart)){
              $totalQty += $getcartinfo['Qty'];
              $totalCheckOut += $getcartinfo['Price'];
              $CartID = $getcartinfo['CartID'];
              echo "<tr>";
                echo "<td>" . $getcartinfo['CartID'] . "</td>";
                echo "<td>" . $getcartinfo['ProdID'] . "</td>";
                echo "<td>" . $getcartinfo['ProdName'] . "</td>";
                echo "<td>" . $getcartinfo['Qty'] . "</td>";
                echo "<td>" . $getcartinfo['Price'] . "</td>";
              echo "</tr>";
            }
            echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td class='bg-primary'>Total Cart Quantity</td>";
              echo "<td>" . $totalQty . "</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td class='bg-primary'>Total Checkout Price:</td>";
              echo "<td>₱" . $totalCheckOut . "</td>";
            echo "</tr>";
            echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td><button type='button' class='btn btn-success form-control' name='Checkbtn'  data-toggle='modal' data-target='#check'>Checkout</button></td>";
            echo "</tr>";

          }

          if(isset($_POST['yesBTN'])){

            $selectcart = mysqli_query($con, "SELECT * FROM cart WHERE CartID = '$CartID'")or die(mysqli_errno());


            while($getcart = mysqli_fetch_array($selectcart)){
              $checkinventory = mysqli_query($con, "SELECT * FROM Inventory WHERE ProdID = '".$getcart['ProdID']."'")or die(mysqli_errno());
              while($getstocks = mysqli_fetch_array($checkinventory)){
                $stocks = $getstocks['Stocks'];
              }
              $newstocks = $stocks - $getcart['Qty'];
              $updatestocks = mysqli_query($con, "UPDATE inventory SET Stocks = '$newstocks' WHERE ProdID = '".$getcart['ProdID']."'")or die(mysqli_errno());
            }

            $update = mysqli_query($con, "UPDATE cart SET CheckOut = '1' WHERE CartID = '$CartID' AND RegID = '$ID'")or die(mysqli_errno());

            $insert = mysqli_query($con, "INSERT INTO Transactions VALUES('', '$CartID', '$ID', '$totalQty', '$totalCheckOut', '$today')")or die(mysqli_errno());
            header("location:user_transaction.php");

          }

        ?>

        <hr>

        <!-- CONFIRMATION FORM -->
        <div class="modal fade" id="check" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <div class="modal-header text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">ARE YOU SURE?</h4>
                </div>
                <div class="modal-body text-center">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="submit" class="btn btn-success btn-lg" value="YES" name="yesBTN">
                    </div>
                    <div class="col-md-6">
                      <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">NO</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END OF CONFIRMATION FORM -->

    </div>
    <!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
