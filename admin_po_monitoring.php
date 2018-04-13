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
            <li><a href="admin_inventory.php">E-Shop Inventory</a></li>
            <li class="active"><a href="admin_po_monitoring.php">Purchase Order Monitoring</a></li>
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
                  <div class="col-md-12">
                    <form method="post" action = "<?php $_SERVER['PHP_SELF']?>">
                      <div class="input-group">
                        <input type="text" class="form-control" name="searchtxb" placeholder="Search here...">
                        <span class="input-group-btn">
                          <input type="submit" class="btn btn-default" name="Searchbtn"><span class="glyphicon glyphicon-search"></span>
                        </span>
                      </div>
                    </form>
                  </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>PO ID</th>
                    <th>Vendor Name</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                  <?php
                    $loaditems = mysqli_query($con, "SELECT purchase_order.poid, purchase_order.VendorID, purchase_order.Date, purchase_order.Status, vendor.VendorID, vendor.VendorName FROM purchase_order INNER JOIN vendor ON purchase_order.VendorID=vendor.VendorID GROUP BY poid")or die(mysqli_errno());
                    while($getitems = mysqli_fetch_array($loaditems)){
                      if($getitems['Status'] == "Complete"){
                        echo "<tr class='success'>";
                        echo "<td>" . $getitems['poid'] . "</td>";
                        echo "<td>" . $getitems['VendorName'] . "</td>";
                        echo "<td>" . $getitems['Status'] . "</td>";
                        echo "<td><a href='admin_prev.php?poid=".$getitems['poid']."' class='btn btn-info'>View Details</a></td>";
                        echo "</tr>";
                      }else{
                        echo "<tr>";
                        echo "<td>" . $getitems['poid'] . "</td>";
                        echo "<td>" . $getitems['VendorName'] . "</td>";
                        echo "<td>" . $getitems['Status'] . "</td>";
                        echo "<td><a href='admin_prev.php?poid=".$getitems['poid']."' class='btn btn-info'>View Details</a> <a href='admin_delivery.php?poid=".$getitems['poid']."' class='btn btn-info'>Enter Delivery</a></td>";
                        echo "</tr>";
                      }
                    }
                  ?>
                </table>
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
