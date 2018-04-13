<?php
      include 'connect.php';
      //if(empty($_SESSION['ID'])){
        //header("location:login.php");
      //} else

      include('sessionchecker.php');
      
      $ID = $_SESSION['ID'];

      $searchuser = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$ID'")or die(mysqli_error());
      while($getname = mysqli_fetch_array($searchuser))
        $NAME = $getname['Fname'];
      $_SESSION['Name'] = $NAME;

     

        //Login Successful
       
      $selectloanstat = mysqli_query($con, "SELECT * FROM loan WHERE RegID = '$ID'")or die(mysqli_error());
      $resloanstat = mysqli_num_rows($selectloanstat);
      if($resloanstat > 0){
        while($getloanstat = mysqli_fetch_array($selectloanstat)){
          $LoanStat = $getloanstat['Status'];
          $LoanCurID = $getloanstat['LoanID'];
          $_SESSION['LoanCurID'] = $LoanCurID;
        }

      }else{
        $LoanStat = "N\A";
        $_SESSION['LoanCurID'] = "N\A";
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
            <li <?php if($currURL=="user_panel") echo "class='active'";?>><a href="user_panel.php">Dashboard</a></li>
            <li <?php if($currURL=="user_loan_form"||$currURL=="user_paymenthistory"||$currURL=="user_loanhistory"||$currURL=="user_paymenthistory1") echo "class='active'";?>><a href="user_loan_form.php">Loans</a></li>
            <!--  <li <?php if($currURL=="user_paymenthistory"||$currURL=="user_loanhistory") echo "class='active'";?>><a href="user_paymenthistory.php">History</a></li> -->
           <!--   <li><a href="#">Logs</a></li> -->
            <li <?php if($currURL=="user_settings") echo "class='active'";?>><a href="user_settings.php">Settings</a></li>
             <li <?php if($currURL=="user_attendance") echo "class='active'";?>><a href="user_attendance.php">Attendance</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo $_SESSION['Name']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

