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
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
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
          <a class="navbar-brand" href="#">BPASS Online Management System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="credit_panel.php">Dashboard</a></li>
           <!--  <li><a href="credit_loan_monitoring.php">Loan Process Monitor</a></li>
            <li class="active"><a href="credit_fundnshares.php">Membership Funds/Shares</a></li>
             <li><a href="payment.php">Payment</a></li>
             <li><a href="paymenthistory.php">Payment History</a></li>
             <li><a href="user_logs.php">Logs</a></li>
            <li><a href="#">Settings</a></li> -->
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
          <li class="active">Users</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <?php
            include("creditnavigation.php");
          ?>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Users</h3>
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
                    <th>Name</th>
                    <th>Capital</th>
                    <th>Savings</th>
                    <th>Damayan</th>
                    <th>Marketing</th>
                    <th>Health Care</th>
                    <th></th>
                  </tr>
                  <?php

                    if(isset($_POST['Searchbtn'])){
                      $search = $_POST['searchtxb'];

                       //Fund Shares
                       $fundshares = mysqli_query($con, "SELECT Membership_fundnshare.Damayan, Membership_fundnshare.Savings, Membership_fundnshare.Capital, Membership_fundnshare.Marketing, Membership_fundnshare.HealthCare, Accounts.Fname, Accounts.Lname, Accounts.Mname, Accounts.RegID
                         FROM Membership_fundnshare INNER JOIN Accounts
                         ON Membership_fundnshare.RegID=Accounts.RegID
                         WHERE Accounts.Fname LIKE '%$search%' OR Accounts.Mname LIKE '%$search%' OR Accounts.Lname LIKE '%$search%'")or die(mysqli_errno());
                       $res = mysqli_num_rows($fundshares);

                       if($res > 0){
                         while($getfunds = mysqli_fetch_array($fundshares)){
                           $RegID = $getfunds['RegID'];
                           $Name = $getfunds['Fname'] . " " . $getfunds['Mname'] . " " . $getfunds['Lname'];
                           $Capital = $getfunds['Capital'];
                           $Damayan = $getfunds['Damayan'];
                           $Savings = $getfunds['Savings'];
                           $Marketing = $getfunds['Marketing'];
                           $HealthCare = $getfunds['HealthCare'];
                         }
                         //End of Fund Shares

                         echo "<tr>";
                         echo "<td>" . $Name . "</td>";
                         echo "<td>" . $Capital . "</td>";
                         echo "<td>" . $Savings . "</td>";
                         echo "<td>" . $Damayan . "</td>";
                         echo "<td>" . $Marketing . "</td>";
                         echo "<td>" . $HealthCare . "</td>";
                         echo "<td><a href='update_funds.php?RegID=$RegID' class='btn btn-info'>Update Funds</a></td>";
                         echo "</tr>";
                       }else{
                         echo "<div class='alert alert-warning' role='alert'>No Results Found</div>";
                       }

                    }else{
                       //Fund Shares
                       $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                       $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                       $fundshares = mysqli_query($con, "SELECT Membership_fundnshare.Damayan, Membership_fundnshare.Savings, Membership_fundnshare.Capital, Membership_fundnshare.Marketing, Membership_fundnshare.HealthCare, Accounts.Fname, Accounts.Lname, Accounts.Mname, Accounts.RegID
                         FROM Membership_fundnshare INNER JOIN Accounts
                         ON Membership_fundnshare.RegID=Accounts.RegID LIMIT ".$lim.",5")or die(mysqli_errno());

                       while($getfunds = mysqli_fetch_array($fundshares)){
                         $RegID = $getfunds['RegID'];

                         echo "<tr>";
                         echo "<td>" . $getfunds['Fname'] . " " . $getfunds['Mname'] . " " . $getfunds['Lname'] . "</td>";
                         echo "<td>" . $getfunds['Capital'] . "</td>";
                         echo "<td>" . $getfunds['Savings'] . "</td>";
                         echo "<td>" . $getfunds['Damayan'] . "</td>";
                         echo "<td>" . $getfunds['Marketing'] . "</td>";
                         echo "<td>" . $getfunds['HealthCare'] . "</td>";
                         echo "<td><a href='update_funds.php?RegID=$RegID' class='btn btn-info'>Update Funds</a></td>";
                         echo "</tr>";

                       }

                       $select = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());

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
                       //End of Fund Shares


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
