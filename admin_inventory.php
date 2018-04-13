<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Users</title>
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
          <a class="navbar-brand" href="#">HOSCOMCO</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="admin_panel.php">Dashboard</a></li>
            <li class="active"><a href="admin_inventory.php">E-Shop Inventory</a></li>
            <li><a href="admin_po_monitoring.php">Purchase Order Monitoring</a></li>
            <li><a href="admin_user_profiling.php">User Profiling</a></li>
            <li><a href="admin_log.php">Log Book</a></li>
            <li><a href="admin_settings_staff.php">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo $_SESSION['Name']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Dashboard </h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="admin_panel.php">Dashboard</a></li>
          <li class="active">Inventory</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="admin_panel.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="admin_inventory.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> E-Shop Inventory <span class="badge">12</span></a>
              <a href="admin_po_monitoring.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Purchase Order Monitoring <span class="badge">~</span></a>
              <a href="admin_user_profiling.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profiling <span class="badge"><?php

                $selectuser = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());
                $resusers = mysqli_num_rows($selectuser);

                echo "$resusers";
              ?></span></a>
              <a href="#" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Log Book <span class="badge">~</span></a>
              <a href="admin_settings_staff.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="badge"></span></a>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Inventory</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-7 col-sm-7 col-lg-7">
                    <form method="post" action = "<?php $_SERVER['PHP_SELF']?>">
                      <div class="input-group">
                        <input type="text" class="form-control" name="searchtxb" placeholder="Search here...">
                        <span class="input-group-btn">
                          <input type="submit" class="btn btn-default" name="Searchbtn"><span class="glyphicon glyphicon-search"></span>
                        </span>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-2 col-sm-2 col-lg-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItem">Add New Item</button>
                  </div>
                  <div class="col-md-2 col-sm-2 col-lg-2">
                    <a href="admin_purchaseorder.php" class="btn btn-primary">Create Purchase Order</a>
                  </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stocks</th>
                    <th># Sold</th>
                    <th></th>
                  </tr>
                  <?php
                    if(isset($_POST['regItem'])){
                      $ProdName = $_POST['prodname'];
                      $ProdDesc = $_POST['proddesc'];
                      $Catid = $_POST['Cat'];
                      $Price = $_POST['price'];

                      $searchitems = mysqli_query($con, "SELECT * FROM Products WHERE ProdName = '$ProdName' AND ProdDesc = '$ProdDesc'")or die(mysqli_errno());
                      $res = mysqli_num_rows($searchitems);

                      if($res > 0){
                        echo "<script>alert('Item Already Exists');</script>";
                        $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                        $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                        $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.CatID, Products.Price, Categories.CatDesc, Inventory.Stocks, Inventory.NoSold
                                                         FROM Products INNER JOIN Categories
                                                         ON Products.CatID=Categories.CatID
                                                         INNER JOIN Inventory
                                                         ON Products.ProdID=Inventory.ProdID
                                                         ORDER BY Inventory.Stocks LIMIT ".$lim.",5")or die(mysqli_errno());
                        while($getitems = mysqli_fetch_array($loaditems)){
                          if($getitems['Stocks'] <=5){
                            echo "<tr class='danger'>";
                            echo "<td>" . $getitems['ProdID'] . "</td>";
                            echo "<td>" . $getitems['ProdName'] . "</td>";
                            echo "<td>" . $getitems['CatDesc'] . "</td>";
                            echo "<td>" . $getitems['Price'] . "</td>";
                            echo "<td>" . $getitems['Stocks'] . "</td>";
                            echo "<td>" . $getitems['NoSold'] . "</td>";
                            echo "<td><a href='#.php' class='btn btn-info'>Edit Details</a></td>";
                            echo "</tr>";
                          }else{
                            echo "<tr>";
                            echo "<td>" . $getitems['ProdID'] . "</td>";
                            echo "<td>" . $getitems['ProdName'] . "</td>";
                            echo "<td>" . $getitems['CatDesc'] . "</td>";
                            echo "<td>" . $getitems['Price'] . "</td>";
                            echo "<td>" . $getitems['Stocks'] . "</td>";
                            echo "<td>" . $getitems['NoSold'] . "</td>";
                            echo "<td><a href='#.php' class='btn btn-info'>Edit Details</a></td>";
                            echo "</tr>";
                          }
                        }

                        $select = mysqli_query($con, "SELECT * FROM Products")or die(mysqli_errno());

                         $count = mysqli_num_rows($select);
                         //echo $count;
                         $totalpg = $count / 5;
                         $totalpg = ceil($totalpg);
                         echo "<nav aria-label='Page navigation'>";
                         echo "<ul class='pagination pagination'>";
                         for($ktr = 1; $ktr <= $totalpg; $ktr++){
                           echo "<li><a href='admin_inventory.php?p=$ktr'>" . $ktr . "</a></li>";
                         }
                         echo "</ul>";
                         echo "</nav>";
                      }else{
                        $prodpath = "eshop inv/" . basename($_FILES['prodimg']['name']);
                        if(move_uploaded_file($_FILES['prodimg']['tmp_name'], $prodpath)){
                          $insertitem = mysqli_query($con, "INSERT INTO Products VALUES('', '$ProdName', '$ProdDesc', '$Catid','$prodpath', '$Price')")or die(mysqli_errno());
                          $prodid = mysqli_insert_id($con);
                          $insertinv = mysqli_query($con, "INSERT INTO Inventory VALUES('', '$prodid', '5', '0')")or die(mysqli_errno());

                          $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                          $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                          $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.CatID, Products.Price, Categories.CatDesc, Inventory.Stocks, Inventory.NoSold
                                                           FROM Products INNER JOIN Categories
                                                           ON Products.CatID=Categories.CatID
                                                           INNER JOIN Inventory
                                                           ON Products.ProdID=Inventory.ProdID
                                                           ORDER BY Inventory.Stocks LIMIT ".$lim.",5")or die(mysqli_errno());
                          while($getitems = mysqli_fetch_array($loaditems)){
                            if($getitems['Stocks'] <=5){
                              echo "<tr class='danger'>";
                              echo "<td>" . $getitems['ProdID'] . "</td>";
                              echo "<td>" . $getitems['ProdName'] . "</td>";
                              echo "<td>" . $getitems['CatDesc'] . "</td>";
                              echo "<td>" . $getitems['Price'] . "</td>";
                              echo "<td>" . $getitems['Stocks'] . "</td>";
                              echo "<td>" . $getitems['NoSold'] . "</td>";
                              echo "<td><a href='#.php' class='btn btn-info'>Edit Details</a></td>";
                              echo "</tr>";
                            }else{
                              echo "<tr>";
                              echo "<td>" . $getitems['ProdID'] . "</td>";
                              echo "<td>" . $getitems['ProdName'] . "</td>";
                              echo "<td>" . $getitems['CatDesc'] . "</td>";
                              echo "<td>" . $getitems['Price'] . "</td>";
                              echo "<td>" . $getitems['Stocks'] . "</td>";
                              echo "<td>" . $getitems['NoSold'] . "</td>";
                              echo "<td><a href='#.php' class='btn btn-info'>Edit Details</a></td>";
                              echo "</tr>";
                            }
                          }

                          $select = mysqli_query($con, "SELECT * FROM Products")or die(mysqli_errno());

                           $count = mysqli_num_rows($select);
                           //echo $count;
                           $totalpg = $count / 5;
                           $totalpg = ceil($totalpg);
                           echo "<nav aria-label='Page navigation'>";
                           echo "<ul class='pagination pagination'>";
                           for($ktr = 1; $ktr <= $totalpg; $ktr++){
                             echo "<li><a href='admin_inventory.php?p=$ktr'>" . $ktr . "</a></li>";
                           }
                           echo "</ul>";
                           echo "</nav>";
                       }
                      }
                    }else{
                      $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                      $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                      $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.CatID, Products.Price, Categories.CatDesc, Inventory.Stocks, Inventory.NoSold
                                                       FROM Products INNER JOIN Categories
                                                       ON Products.CatID=Categories.CatID
                                                       INNER JOIN Inventory
                                                       ON Products.ProdID=Inventory.ProdID
                                                       ORDER BY Inventory.Stocks LIMIT ".$lim.",5")or die(mysqli_errno());
                      while($getitems = mysqli_fetch_array($loaditems)){
                        if($getitems['Stocks'] <=5){
                          echo "<tr class='danger'>";
                          echo "<td>" . $getitems['ProdID'] . "</td>";
                          echo "<td>" . $getitems['ProdName'] . "</td>";
                          echo "<td>" . $getitems['CatDesc'] . "</td>";
                          echo "<td>" . $getitems['Price'] . "</td>";
                          echo "<td>" . $getitems['Stocks'] . "</td>";
                          echo "<td>" . $getitems['NoSold'] . "</td>";
                          echo "<td><a href='#.php' class='btn btn-info'>Edit Details</a></td>";
                          echo "</tr>";
                        }else{
                          echo "<tr>";
                          echo "<td>" . $getitems['ProdID'] . "</td>";
                          echo "<td>" . $getitems['ProdName'] . "</td>";
                          echo "<td>" . $getitems['CatDesc'] . "</td>";
                          echo "<td>" . $getitems['Price'] . "</td>";
                          echo "<td>" . $getitems['Stocks'] . "</td>";
                          echo "<td>" . $getitems['NoSold'] . "</td>";
                          echo "<td><a href='#.php' class='btn btn-info'>Edit Details</a></td>";
                          echo "</tr>";
                        }
                      }

                      $select = mysqli_query($con, "SELECT * FROM Products")or die(mysqli_errno());

                       $count = mysqli_num_rows($select);
                       //echo $count;
                       $totalpg = $count / 5;
                       $totalpg = ceil($totalpg);
                       echo "<nav aria-label='Page navigation'>";
                       echo "<ul class='pagination pagination'>";
                       for($ktr = 1; $ktr <= $totalpg; $ktr++){
                         echo "<li><a href='admin_inventory.php?p=$ktr'>" . $ktr . "</a></li>";
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

        <!-- ITEM FORM -->
        <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Item</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="prodname" placeholder="Enter Item Name" required>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="proddesc" placeholder="Enter Item Description" required>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="Cat">
                      <option value="1001">Home Cleaners</option>
                      <option value="1002">Laundry Care</option>
                      <option value="1003">Hand Hygiene</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <div class="input-group">
                      <span class="input-group-addon">₱</span>
                      <input type="number" class="form-control" name="price" required>
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Image</label><br>
                    <label>Upload Image</label>
                    <input type="file" name="prodimg" required>
                    <p class="help-block">Only png and jpg allowed</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <input type="submit" name="regItem" class="btn btn-primary" value="Register Item">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END OF ITEM FORM -->
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
