<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>HOSCOMCO E-Commerce</title>
    <link rel = "icon" type ="img/jpg" href="logo.ico"/>

</head>

<body>

<?php
  include "connect.php";
  $ID = $_SESSION['ID'];
  if(empty($_SESSION['ID'])){
    header("location:login.php");
  }
  $ProdID = $_REQUEST['ProdID'];
?>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">BPASS Online Management System</a>
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
          <a href="contact.php">Contact Us</a></li>
        <li>
        <li>
            <a href="user_transaction.php">Transaction History</a>
        </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

    <!-- Page Content -->
    <div class="container">
      <hr>
      <div class="row">
        <div class="col-md-6">
          <?php
            $ProdID = $_REQUEST['ProdID'];


            $loadproduct = mysqli_query($con, "SELECT * FROM products WHERE ProdID = '$ProdID'") or die (mysqli_errno());

            while($getprod = mysqli_fetch_array($loadproduct)){

              $image = $getprod['image'];
              $ProdName = $getprod['ProdName'];
              $ProdDesc = $getprod['ProdDesc'];
              $Price = $getprod['Price'];

              echo "<div class = 'thumbnail'>";
              echo "<img src = '" . $image ."' alt = ''> ";
              echo "</div>";
            }


          ?>
        </div>
        <div class="col-md-6 col-sm-6">
          <h3>Name: <span class="label label-warning"><?php echo $ProdName; ?></span></h3>
          <h3>Description</h3>
          <blockquote class="blockqoute">
            <p><?php echo $ProdDesc;?></p>
          </blockquote>
          <h3>Price: <span class="label label-warning">₱<?php echo $Price; ?></span></h3>
          <?php
            $checkstocks = mysqli_query($con, "SELECT * FROM Inventory WHERE ProdID = '$ProdID' AND Stocks <= '5'")or die(mysqli_errno());
            $resstocks = mysqli_num_rows($checkstocks);

            if($resstocks > 0){
              echo "<button type='button' class='btn btn-primary form-control' disabled>Add to Cart</button>";
            }else{
              echo "<button type='button' class='btn btn-primary form-control' data-toggle='modal' data-target='#cart'>Add to Cart</button>";
            }
          ?>
        </div>
      </div>
      <hr>

      <?php
        if(isset($_POST['Addqty'])){
          $qty = $_POST['qty'];


          $searchstock = mysqli_query($con, "SELECT * FROM inventory WHERE ProdID = '$ProdID'")or die(mysqli_errno());
          while($getstock = mysqli_fetch_array($searchstock)){
            $stocks = $getstock['Stocks'];
          }

          if($qty > $stocks){


          }else{
            $searchcart = mysqli_query($con, "SELECT * FROM cart WHERE RegID = '$ID' AND CheckOut = '0'")or die(mysqli_errno());
            $rescart = mysqli_num_rows($searchcart);

            if($rescart > 0){ // If cart has existing items not yet checked out
              $searchdupl = mysqli_query($con, "SELECT * FROM cart WHERE RegID = '$ID' AND CheckOut = '0' AND ProdID = '$ProdID'")or die(mysqli_errno());
              $resdupl = mysqli_num_rows($searchdupl);

              if($resdupl > 0){ // If duplicate
                while($getdupl = mysqli_fetch_array($searchdupl)){
                  $qty1 = $getdupl['Qty'];
                  $cartid = $getdupl['CartID'];

                }

                // Computation
                $fqty = $qty + $qty1;
                echo $fqty;
                $total = $fqty * $Price;
                echo $total;

                //mysqli_query($con, "INSERT INTO cart VALUES('$CartID', '$ID', '$ProdID', '$fqty', '$total', '0')");
                mysqli_query($con, "UPDATE cart SET Qty = '$fqty', Price = '$total' WHERE CartID = '$cartid' AND ProdID = '$ProdID' AND CheckOut = '0' AND RegID = '$ID'")or die(mysqli_errno());

              }else{ // If no duplicate
                $searchorder = mysqli_query($con, "SELECT * FROM cart WHERE RegID = '$ID' AND CheckOut = '0'")or die(mysqli_errno());
                $search = mysqli_num_rows($searchorder);

                if($search > 0){
                  while($getsearch = mysqli_fetch_array($searchorder)){
                    $cartID = $getsearch['CartID'];
                  }

                  $stotal = $qty * $Price;

                  mysqli_query($con, "INSERT INTO cart VALUES('$cartID', '$ID', '$ProdID', '$qty', '$stotal', '0')");
                }
              }

            }else{ // If no item in the cart

              $CartID = substr(str_shuffle("1234567890"), 0, 15);
              $subtotal = $qty*$Price;
              $insert = mysqli_query($con, "INSERT INTO cart VALUES('$CartID', '$ID', '$ProdID', '$qty', '$subtotal', '0')");
            }
          }


        }
      ?>

      <!-- CANCELATION CONFIRMATION FORM -->
      <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">HOW MANY QUANTITY?</h4>
              </div>
              <div class="modal-body text-center">
                <div class="row">
                  <div class="col-md-12">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="qty">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <div class="col-md-6">
                  <input type="submit" name="Addqty" value="Add Item" class="btn btn-success form-control">
                </div>
                <div class="col-md-6">
                  <button type="button" class="btn btn-danger form-control" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- END OF CANCELATION CONFIRMATION FORM -->


    </div>

    <!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
