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
            <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Purchase Order #<?php echo $poID; ?></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h4 class="panel-title">Delivery</h4>
              </div>
              <div class="panel-body">
                <table class="table table-bordered table-condensed table-hover">
                  <tr>
                    <th class="bg-primary">ID</th>
                    <th class="bg-primary">Description</th>
                    <th class="bg-primary">Quantity</th>
                    <th class="bg-primary">Status</th>
                    <th class="bg-primary"></th>
                  </tr>
                  <?php
                    $loaditems = mysqli_query($con, "SELECT purchase_order.poid, purchase_order.isDelivered, purchase_order.ProdID, purchase_order.Qty, Products.ProdID, Products.ProdName FROM purchase_order
                      INNER JOIN Products
                      ON purchase_order.ProdID=Products.ProdID
                      WHERE purchase_order.poid = '$poID'");

                    while($getitems = mysqli_fetch_array($loaditems)){
                      if($getitems['isDelivered'] == 1){
                        $prevQty = $getitems['Qty'];
                        $ProdID = $getitems['ProdID'];
                        $ProdName = $getitems['ProdName'];
                        echo "<tr>";
                        echo "<td>" . $ProdID . "</td>";
                        echo "<td>" . $ProdName . "</td>";
                        echo "<td>" . $prevQty . "</td>";
                        echo "<td>Delivered</td>";
                        echo "<td><a href='#' class='btn btn-danger form-control' disabled>DISABLED</a></td>";
                        echo "</tr>";
                      }else{
                        $prevQty = $getitems['Qty'];
                        $ProdID = $getitems['ProdID'];
                        $ProdName = $getitems['ProdName'];
                        echo "<tr>";
                        echo "<td>" . $ProdID . "</td>";
                        echo "<td>" . $ProdName . "</td>";
                        echo "<td>" . $prevQty . "</td>";
                        echo "<td>In-complete</td>";
                        echo "<td><a href='admin_delivery_process.php?poid=$poID&ProdID=$ProdID&Qty=$prevQty' class='btn btn-primary form-control'>Add Delivery</a></td>";
                        echo "</tr>";
                      }
                    }
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
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
