<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body>
    <?php
      include 'connect.php';
      $ID = $_SESSION['ID'];
      if(empty($_SESSION['ID'])){
        header("location:login.php");
      }
      $searchadmin = mysqli_query($con, "SELECT * FROM superadmin WHERE AdminID = '$ID'")or die(mysqli_errno());
      while($getadmininfo = mysqli_fetch_array($searchadmin)){
        $Fname = $getadmininfo['Fname'];
        $_SESSION['Name'] = $Fname;
      }
    ?>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="#">BPASS Online Management System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="admin_panel.php">Dashboard</a></li>
            <li><a href="admin_user_profiling.php">User Profiling</a></li>
            <li><a href="credit_loan_monitoring.php">Loan Process Monitor</a></li>
            <li><a href="credit_fundshares.php">Membership Funds/Shares</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Dashboard</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
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
              
              <a href="admin_user_profiling.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profiling <span class="badge"><?php

                $selectuser = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());
                $resusers = mysqli_num_rows($selectuser);

                echo "$resusers";
              ?></span></a>
              <a href="admin_log.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Log Book <span class="badge">~</span></a>
              <a href="admin_settings_staff.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="badge"></span></a>
            </div>
          </div>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-6">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                      <?php
                        $selectuser = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());
                        $resusers = mysqli_num_rows($selectuser);

                        echo "$resusers";
                      ?></h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php $loaditems = mysqli_query($con, "SELECT Products.ProdID, Products.ProdName, Products.CatID, Products.Price, Categories.CatDesc, Inventory.Stocks, Inventory.NoSold FROM Products
                    INNER JOIN Categories
                    ON Products.CatID=Categories.CatID
                    INNER JOIN Inventory
                    ON Products.ProdID=Inventory.ProdID
                    WHERE Inventory.Stocks <= 5")or die(mysqli_errno());
                    ?></h2>
                  
                  </div>
                </div>
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Latest Users</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Joined</th>
                        <th>Options</th>
                      </tr>
                      <?php
                        $today = date("Y-m-d");

                        $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                        $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;
                        $select_rec_users = mysqli_query($con, "SELECT * FROM Accounts WHERE MemDate = '$today' LIMIT ".$lim.",3")or die(mysqli_errno());

                        while($get_rec_users = mysqli_fetch_array($select_rec_users)){
                          $ID = $get_rec_users['RegID'];
                          echo "<tr>";
                          echo "<td>" . $get_rec_users['Fname'] . " " . $get_rec_users['Mname'] . " " . $get_rec_users['Lname'] . "</td>";
                          echo "<td>" . $get_rec_users['Contact'] . "</td>";
                          echo "<td>" . $get_rec_users['MemDate'] . "</td>";
                          echo "<td><a class='btn btn-success' href='activateacc.php?RegID=$ID'>Activate</a></td>";
                          echo "<td><a class='btn btn-danger' href='deactivateacc.php?RegID=$ID'>Deactivate</a></td>";
                          echo "</tr>";
                        }

                        $select = mysqli_query($con, "SELECT * FROM Accounts WHERE MemDate = '$today'")or die(mysqli_errno());

                        $count = mysqli_num_rows($select);
                        //echo $count;
                        $totalpg = $count / 5;
                        $totalpg = ceil($totalpg);
                        echo "<nav aria-label='Page navigation'>";
                        echo "<ul class='pagination pagination'>";
                        for($ktr = 1; $ktr <= $totalpg; $ktr++){
                          echo "<li><a href='credit_fundnshares.php?p=$ktr'>" . $ktr . "</a></li>";
                        }
                        echo "</ul>";
                        echo "</nav>";
                      ?>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer> -->

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
