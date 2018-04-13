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
        header("location:payment.php");
      }
      $result = $con->query("SELECT RegID, Lname, Fname FROM accounts ORDER BY Lname;") or die(mysqli_error());
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
            <!-- <li><a href="credit_loan_monitoring.php">Loan Process Monitor</a></li>
            <li><a href="credit_fundnshares.php">Membership Funds/Shares</a></li>
            <li><a href="payment.php">Payment</a></li>
            <li  class="active"><a href="paymenthistory.php">Payment History</a></li>
            <li><a href="payment.php">Logs</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</h1>
          </div>
        </div>
      </div>
    </header>

  
    <br/>
   

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
                     <th>Payment ID</th>
                    <th>LoanID</th>
                    <th>Amount Paid</th>
                    <th>Date</th>
               
                  </tr>

                  <tbody>

                      <?php
                      $result= mysqli_query($con, "SELECT * FROM payment ORDER BY date DESC ") or die (mysqli_error());
                      while ($row= mysqli_fetch_array ($result) ){
                      $id=$row['payment_id'];
                      ?>
                     <tr>
                     
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['LoanID']; ?></td>
                    <td>&#8369; <?php echo $row['paid']; ?></td>
                     <td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>

                    
                  

                    
                      </tr>
                      <?php } ?>
                          
                      </tbody>
                    </table>

           <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
