 <?php
      include 'connect.php';
      if(empty($_SESSION['ID'])){
        header("location:login.php");
      }
      $currURL = basename($_SERVER['PHP_SELF'], ".php");
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
            <li><a href="paymenthistory.php">Payment History</a></li>
            <li  class="active"><a href="user_logs.php">Logs</a></li> -->
            <li class="<?php if($currURL=="credit_settings") echo "active";?>"><a href="credit_settings.php">Settings</a></li>
            <li class="<?php if($currURL=="loan_settings") echo "active";?>"><a href="loan_settings.php">Loan Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo $_SESSION['Name']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>