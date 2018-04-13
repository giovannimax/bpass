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
    ?>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Purchase Order </h1>
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
                <h3 class="panel-title">Purchase Order</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#addItem">Add Item</button>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-success form-control" data-toggle="modal" data-target="#warn">Confirm Purchase Order</button>
                  </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-danger form-control" data-toggle="modal" data-target="#del">Cancel Purchase Order</button>
                  </div>
                </div>
                <hr>
                <table class="table table-bordered table-condensed table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                  <?php
                    if(isset($_POST['yescancelBTN'])){
                      $checkpo = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status = 'Pending'")or die(mysqli_errno());
                      $rescheck = mysqli_num_rows($checkpo);
                      if($rescheck > 0){
                        while($getpoid = mysqli_fetch_array($checkpo)){
                          $poID = $getpoid['poid'];
                        }

                        $deletepo = mysqli_query($con, "DELETE FROM purchase_order WHERE poid ='$poID'")or die(mysqli_errno());
                        header("location:admin_inventory.php");
                      }else{
                        header("location:admin_inventory.php");
                      }

                    }else if(isset($_POST['yesBTN'])){
                      $checkpo = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status = 'Pending'")or die(mysqli_errno());
                      $rescheck = mysqli_num_rows($checkpo);
                      if($rescheck > 0){
                        while($getpoid = mysqli_fetch_array($checkpo)){
                          $poID = $getpoid['poid'];
                        }

                        $updatepo = mysqli_query($con, "UPDATE purchase_order SET Status = 'Processing' WHERE poid ='$poID'")or die(mysqli_errno());
                        header("location:admin_prev.php?poid=$poID");
                      }else{
                        echo "<script>alert('Loan Please add an item');</script>";
                      }

                    }else if(isset($_POST['regQTY'])){
                      $Item = $_POST['item'];
                      $Qty = $_POST['qty'];

                      $checkpo = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status = 'Pending'")or die(mysqli_errno());
                      $respo = mysqli_num_rows($checkpo);

                      if($respo > 0){ //Existing purchase_order
                        while($getpoid = mysqli_fetch_array($checkpo)){
                          $poID = $getpoid['poid'];
                        }

                        $checkitem = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status = 'Pending' AND ProdID = '$Item'")or die(mysqli_errno());
                        $resitem = mysqli_num_rows($checkitem);

                        if($resitem > 0){ // Existing item
                          $getitemprice = mysqli_query($con, "SELECT * FROM products WHERE ProdID = '$Item'")or die(mysqli_errno());
                          while($getitem = mysqli_fetch_array($checkitem)){
                            $prevqty = $getitem['Qty'];
                          }
                          while($getprice = mysqli_fetch_array($getitemprice)){
                            $unitprice = $getprice['Price'];
                          }

                          $totalqty = $Qty + $prevqty;
                          $totalprice = $totalqty * $unitprice;

                          $insertitem = mysqli_query($con, "UPDATE purchase_order SET Qty='$totalqty', Total='$totalprice' WHERE poID = '$poID' AND ProdID = '$Item' AND Status = 'Pending'")or die(mysqli_errno());

                          $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                          $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                          $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.Price, Inventory.Stocks, Inventory.NoSold, purchase_order.Qty, purchase_order.Total, purchase_order.poID FROM purchase_order
                          INNER JOIN Products
                          ON purchase_order.ProdID=Products.ProdID
                          INNER JOIN Inventory
                          ON Products.ProdID=Inventory.ProdID
                          WHERE Status = 'Pending' LIMIT ".$lim.",5")or die(mysqli_errno());

                          while($getitems = mysqli_fetch_array($loaditems)){
                            echo "<tr>";
                            echo "<td>" . $getitems['ProdID'] . "</td>";
                            echo "<td>" . $getitems['ProdName'] . "</td>";
                            echo "<td>". $getitems['Qty'] . "</td>";
                            echo "<td>" . $getitems['Price'] . "</td>";
                            echo "<td>" . $getitems['Total'] . "</td>";
                            echo "<td><a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=edit' class='btn btn-primary'>Edit</a> <a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=delete' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                          }

                          $select = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status='Pending'")or die(mysqli_errno());

                           $count = mysqli_num_rows($select);
                           //echo $count;
                           $totalpg = $count / 5;
                           $totalpg = ceil($totalpg);
                           echo "<nav aria-label='Page navigation'>";
                           echo "<ul class='pagination pagination'>";
                           for($ktr = 1; $ktr <= $totalpg; $ktr++){
                             echo "<li><a href='admin_purchaseorder.php?p=$ktr'>" . $ktr . "</a></li>";
                           }
                           echo "</ul>";
                           echo "</nav>";
                        }else{ //Nonexisting item
                          while($getpoid = mysqli_fetch_array($checkpo)){
                            $poID = $getpoid['poid'];
                          }
                          $getitemprice = mysqli_query($con, "SELECT * FROM products WHERE ProdID = '$Item'")or die(mysqli_errno());
                          //echo $Item;
                          while($getprice = mysqli_fetch_array($getitemprice))
                            $unitprice = $getprice['Price'];

                          $totalprice = $Qty * $unitprice;
                          $insertitem = mysqli_query($con, "INSERT INTO purchase_order VALUES('$poID', '$Item', '$Qty', '$totalprice', '2', '$today','Pending', '0')")or die(mysqli_errno());

                          $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                          $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                          $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.Price, Inventory.Stocks, Inventory.NoSold, purchase_order.Qty, purchase_order.Total, purchase_order.poID FROM purchase_order
                          INNER JOIN Products
                          ON purchase_order.ProdID=Products.ProdID
                          INNER JOIN Inventory
                          ON Products.ProdID=Inventory.ProdID
                          WHERE Status = 'Pending' LIMIT ".$lim.",5")or die(mysqli_errno());

                          while($getitems = mysqli_fetch_array($loaditems)){
                            echo "<tr>";
                            echo "<td>" . $getitems['ProdID'] . "</td>";
                            echo "<td>" . $getitems['ProdName'] . "</td>";
                            echo "<td>". $getitems['Qty'] . "</td>";
                            echo "<td>" . $getitems['Price'] . "</td>";
                            echo "<td>" . $getitems['Total'] . "</td>";
                            echo "<td><a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=edit' class='btn btn-primary'>Edit</a> <a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=delete' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                          }

                          $select = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status='Pending'")or die(mysqli_errno());

                           $count = mysqli_num_rows($select);
                           //echo $count;
                           $totalpg = $count / 5;
                           $totalpg = ceil($totalpg);
                           echo "<nav aria-label='Page navigation'>";
                           echo "<ul class='pagination pagination'>";
                           for($ktr = 1; $ktr <= $totalpg; $ktr++){
                             echo "<li><a href='admin_purchaseorder.php?p=$ktr'>" . $ktr . "</a></li>";
                           }
                           echo "</ul>";
                           echo "</nav>";
                        }
                      }else{ //Nonexisting purchase_order
                        $poID = substr(str_shuffle("1234567890"), 0, 15);

                        $getitemprice = mysqli_query($con, "SELECT * FROM products WHERE ProdID = '$Item'")or die(mysqli_errno());

                        while($getprice = mysqli_fetch_array($getitemprice)){
                          $unitprice = $getprice['Price'];
                        }

                        $totalprice = $Qty * $unitprice;
                        $insertitem = mysqli_query($con, "INSERT INTO purchase_order VALUES('$poID', '$Item', '$Qty', '$totalprice', '2', '$today','Pending', '0')")or die(mysqli_errno());

                        $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                        $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                        $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.Price, Inventory.Stocks, Inventory.NoSold, purchase_order.Qty, purchase_order.Total, purchase_order.poID FROM purchase_order
                        INNER JOIN Products
                        ON purchase_order.ProdID=Products.ProdID
                        INNER JOIN Inventory
                        ON Products.ProdID=Inventory.ProdID
                        WHERE Status = 'Pending' LIMIT ".$lim.",5")or die(mysqli_errno());

                        while($getitems = mysqli_fetch_array($loaditems)){
                          echo "<tr>";
                          echo "<td>" . $getitems['ProdID'] . "</td>";
                          echo "<td>" . $getitems['ProdName'] . "</td>";
                          echo "<td>". $getitems['Qty'] . "</td>";
                          echo "<td>" . $getitems['Price'] . "</td>";
                          echo "<td>" . $getitems['Total'] . "</td>";
                          echo "<td><a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=edit' class='btn btn-primary'>Edit</a> <a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=delete' class='btn btn-danger'>Delete</a></td>";
                          echo "</tr>";
                        }

                        $select = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status='Pending'")or die(mysqli_errno());

                         $count = mysqli_num_rows($select);
                         //echo $count;
                         $totalpg = $count / 5;
                         $totalpg = ceil($totalpg);
                         echo "<nav aria-label='Page navigation'>";
                         echo "<ul class='pagination pagination'>";
                         for($ktr = 1; $ktr <= $totalpg; $ktr++){
                           echo "<li><a href='admin_purchaseorder.php?p=$ktr'>" . $ktr . "</a></li>";
                         }
                         echo "</ul>";
                         echo "</nav>";
                      }
                    }else{
                      $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                      $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                      $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.Price, Inventory.Stocks, Inventory.NoSold, purchase_order.Qty, purchase_order.Total, purchase_order.poID FROM purchase_order
                      INNER JOIN Products
                      ON purchase_order.ProdID=Products.ProdID
                      INNER JOIN Inventory
                      ON Products.ProdID=Inventory.ProdID
                      WHERE Status = 'Pending' LIMIT ".$lim.",5")or die(mysqli_errno());

                      while($getitems = mysqli_fetch_array($loaditems)){
                        echo "<tr>";
                        echo "<td>" . $getitems['ProdID'] . "</td>";
                        echo "<td>" . $getitems['ProdName'] . "</td>";
                        echo "<td>". $getitems['Qty'] . "</td>";
                        echo "<td>" . $getitems['Price'] . "</td>";
                        echo "<td>" . $getitems['Total'] . "</td>";
                        echo "<td><a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=edit' class='btn btn-primary'>Edit</a> <a href='admin_po_process.php?poID=".$getitems['poID']."&ProdID=".$getitems['ProdID']."&Qty=".$getitems['Qty']."&Total=".$getitems['Total']."&Price=".$getitems['Price']."&btn=delete' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                      }

                      $select = mysqli_query($con, "SELECT * FROM purchase_order WHERE Status='Pending'")or die(mysqli_errno());

                       $count = mysqli_num_rows($select);
                       //echo $count;
                       $totalpg = $count / 5;
                       $totalpg = ceil($totalpg);
                       echo "<nav aria-label='Page navigation'>";
                       echo "<ul class='pagination pagination'>";
                       for($ktr = 1; $ktr <= $totalpg; $ktr++){
                         echo "<li><a href='admin_purchaseorder.php?p=$ktr'>" . $ktr . "</a></li>";
                       }
                       echo "</ul>";
                       echo "</nav>";
                    }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- QUANTITY FORM -->
        <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Item</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <select class="form-control" name="item">
                      <?php
                        $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.Price, Inventory.Stocks
                                                         FROM Products INNER JOIN Categories
                                                         ON Products.CatID=Categories.CatID
                                                         INNER JOIN Inventory
                                                         ON Products.ProdID=Inventory.ProdID
                                                         ORDER BY Inventory.Stocks")or die(mysqli_errno());
                        while($getitems = mysqli_fetch_array($loaditems)){
                         if($getitems['Stocks'] <=5){
                           echo "<option class='danger' value='" . $getitems['ProdID'] . "'>" . $getitems['ProdName'] . "</option>";
                         }else{
                           echo "<option value='" . $getitems['ProdID'] . "'>" . $getitems['ProdName'] . "</option>";
                         }
                       }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="qty" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <input type="submit" name="regQTY" class="btn btn-primary" value="Add Quantity">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END OF QUANTITY FORM -->

        <!-- CONFIRMATION FORM -->
        <div class="modal fade" id="warn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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

        <!-- CANCELATION CONFIRMATION FORM -->
        <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                      <input type="submit" class="btn btn-success btn-lg" value="YES" name="yescancelBTN">
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
        <!-- END OF CANCELATION CONFIRMATION FORM -->
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
