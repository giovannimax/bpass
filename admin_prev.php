<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | PO Process</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
    <?php
      include 'connect.php';
      if(empty($_SESSION['ID'])){
        header("location:login.php");
      }
      $today = date("Y-m-d");
      $total = 0;
      $poID = $_REQUEST['poid'];
      $lol = "";
    ?>

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
          <ul class="nav navbar-nav">
            <li><a href="admin_po_monitoring.php">Go Back</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <div class="panel-title">
                  <div class="pull-left">
                    <p class="text-left">Blooming Petals Association</p>
                    <p class="text-left"> Brgy. Malubog, Cebu City</p>
                  </div>
                    <p class="text-right">BPASS Cooperative</p>
                    <p class="text-right"> Brgy. Malubog, Cebu City</p>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-bordered table-condensed table-hover">
                  <tr>
                    <th class="bg-primary">ID</th>
                    <th class="bg-primary">Description</th>
                    <th class="bg-primary">Quantity</th>
                    <th class="bg-primary">Unit Price</th>
                    <th class="bg-primary">Total</th>
                    <th class="bg-primary">Status</th>
                  </tr>
                  <?php
                    $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.Price, Inventory.Stocks, Inventory.NoSold, purchase_order.Qty, purchase_order.Total, purchase_order.poID, purchase_order.isDelivered FROM purchase_order
                    INNER JOIN Products
                    ON purchase_order.ProdID=Products.ProdID
                    INNER JOIN Inventory
                    ON Products.ProdID=Inventory.ProdID
                    WHERE poid = '$poID'")or die(mysqli_errno());



                    while($getitems = mysqli_fetch_array($loaditems)){
                      if($getitems['isDelivered'] == 1){
                        echo "<tr>";
                        echo "<td>" . $getitems['ProdID'] . "</td>";
                        echo "<td>" . $getitems['ProdName'] . "</td>";
                        echo "<td>". $getitems['Qty'] . "</td>";
                        echo "<td>" . $getitems['Price'] . "</td>";
                        echo "<td>" . $getitems['Total'] . "</td>";
                        echo "<td>Complete</td>";
                        echo "</tr>";
                      }else{
                        echo "<tr>";
                        echo "<td>" . $getitems['ProdID'] . "</td>";
                        echo "<td>" . $getitems['ProdName'] . "</td>";
                        echo "<td>". $getitems['Qty'] . "</td>";
                        echo "<td>" . $getitems['Price'] . "</td>";
                        echo "<td>" . $getitems['Total'] . "</td>";
                        echo "<td>In-complete</td>";
                        echo "</tr>";
                      }

                    }
                  ?>
                  <?php
                    $poID = $_REQUEST['poid'];
                    $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.Price, Inventory.Stocks, Inventory.NoSold, purchase_order.Qty, purchase_order.Total, purchase_order.poID FROM purchase_order
                    INNER JOIN Products
                    ON purchase_order.ProdID=Products.ProdID
                    INNER JOIN Inventory
                    ON Products.ProdID=Inventory.ProdID
                    WHERE poid = '$poID'")or die(mysqli_errno());

                    while($getitems = mysqli_fetch_array($loaditems)){
                      $total = $total + $getitems['Total'];
                    }
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td class='text-default bg-primary'>Total Checkout</td>";
                    echo "<td class='text-Default bg-primary'>".$total."</td>";
                    echo "<td></td>";
                    echo "</tr>";
                  ?>
                </table>
                <?php

                  $loaditems = mysqli_query($con, "SELECT * FROM deliveries WHERE poid = '$poID' ORDER BY Date")or die(mysqli_errno());

                  while($getitems = mysqli_fetch_array($loaditems)){
                    if($lol == $getitems['Date']){
                      $lol = $getitems['Date'];
                      echo "<tr>";
                      echo "<td>" . $getitems['ProdID'] . "</td>";
                      echo "<td>" . $getitems['DelAmt'] . "</td>";
                      echo "<td class='bg-primary'>" . $lol . "</td>";
                      echo "</tr>";
                    }else{
                      echo "</table>";
                      echo "<hr>";
                      echo "<table class='table table-condensed table-bordered table-hover'>";
                      echo "<tr>";
                      echo "<td class='bg-primary'>ID</td>";
                      echo "<td class='bg-primary'>Delivered</td>";
                      echo "<td class='bg-primary'>Date Received</td>";
                      echo "</tr>";
                      $lol = $getitems['Date'];
                      echo "<tr>";
                      echo "<td>" . $getitems['ProdID'] . "</td>";

                      echo "<td>" . $getitems['DelAmt'] . "</td>";
                      echo "<td class='bg-primary'>" . $lol . "</td>";
                      echo "</tr>";
                    }
                  }

                  echo "</table>";
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
