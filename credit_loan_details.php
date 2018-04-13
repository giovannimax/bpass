<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Credit Area | Loan Application</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

  <style type="text/css">
    label{
      color:white;
    }
  </style>

    <script type="text/javascript">
      function ShowComakers(){
        var ddlLoan = document.getElementById("ltype");
        var divComakers = document.getElementById("comakers");

        divComakers.style.display = ddlLoan.value == "Y" ? "" : "none";

        if(ddlLoan.value == "loan1"){
          divComakers.style.display = "";
        }else if(ddlLoan.value == "loan2"){
          divComakers.style.display = "";
        }else if(ddlLoan.value == "loan3"){
          divComakers.style.display = "";
        }
      }
    </script>
  </head>
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    <?php
     include 'connect.php';

      function itexmo($number,$message,$apicode){
      $ch = curl_init();
      $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
      curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($itexmo));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      return curl_exec ($ch);
      curl_close ($ch);
    }

     if(empty($_SESSION['ID'])){
       header("location:login.php");
     }

     $ID = $_SESSION['ID'];
     $NAME = $_SESSION['Name'];
     $RegID = $_REQUEST['RegID'];
     $Stat = $_REQUEST['Status'];

     $select = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$RegID'")or die(mysqli_errno());
     while($getinfo = mysqli_fetch_array($select)){
       $Name = $getinfo['Fname'] . " " . $getinfo['Mname'] . " " . $getinfo['Lname'];
       $ADD = $getinfo['Address'];
       $Contact = $getinfo['Contact'];
     }

     $selectloaninfo = mysqli_query($con, "SELECT * FROM Loan WHERE RegID = '$RegID' AND Status = '$Stat'")or die(mysqli_errno());
     while($getloaninfo = mysqli_fetch_array($selectloaninfo)){
       $LoanID = $getloaninfo['LoanID'];
       $PBNO = $getloaninfo['PBNo'];
       $INC = $getloaninfo['Income'];
       $LT_ID = $getloaninfo['LT_ID'];
       $COONE = $getloaninfo['ComakersOne'];
       $COTWO = $getloaninfo['ComakersTwo'];
       $AMT = $getloaninfo['Amount'];
       $Pay_ID = $getloaninfo['Pay_ID'];
       $BRGY = $getloaninfo['BRGYPermit'];
       $BSN = $getloaninfo['BSNPermit'];
     }

     $selectpay = mysqli_query($con, "SELECT * FROM paymenttype WHERE Pay_ID = '$Pay_ID'")or die(mysqli_errno());
     while($getpay = mysqli_fetch_array($selectpay)){
       $PayType = $getpay['PDesc'];
     }

     $selectloan = mysqli_query($con, "SELECT * FROM loantype WHERE LT_ID = '$LT_ID'")or die(mysqli_errno());
     while($getloan = mysqli_fetch_array($selectloan)){
       $LoanType = $getloan['LTDesc'];
     }

     // Logic
     if(isset($_POST['submitBtn'])){
       $Status = $_POST['stat'];

       if($Status == $Stat){
         echo "<script>alert('Please choose a different status or hit cancel');</script>";
       }else{
         $updateloan = mysqli_query($con, "UPDATE Loan SET Status = '$Status' WHERE RegID = '$RegID' AND LoanID = '$LoanID'")or die(mysqli_errno());
         if($Status=="Approved"){
         $ID =$_SESSION['id'];
          itexmo($Contact,"Your loan has been approved. Your loanID is $LoanID . Use your loanID for payment.".$code,"TR-ARMYL862372_WTV47");
        }
          echo "<script>alert('Loan Updated');window.location.href='credit_loan_monitoring.php';</script>";
       }
     }
     // End of Logic
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
            <li class="active"><a href="credit_loan_monitoring.php">Loan Process Monitor</a></li>
            <li><a href="credit_fundnshares.php">Membership Funds/Shares</a></li>
             <li><a href="payment.php">Payment</a></li>
           
            <li><a href="#">Settings</a></li>
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

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Credit Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
          <div class="row">
            <div class="col-md-6">
              <label>Name:</label>
              <input type="text" class="form-control" value="<?php echo $Name; ?>" readonly>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>PB No.:</label>
                <input type="text" class="form-control" value="<?php echo $PBNO; ?>" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control" value="<?php echo $ADD; ?>" readonly>
          </div>

          <hr>

          <div class="form-group">
            <label>Source of Income</label>
            <input type="text" class="form-control" value="<?php echo $INC; ?>" readonly>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Loan Type</label>
                <input type="text" class="form-control" value="<?php echo $LoanType; ?>" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Mode of Payment</label>
                <input type="text" class="form-control" value="<?php echo $PayType; ?>" readonly>
              </div>
            </div>
          </div>

          <hr>

          <label>Co-maker ID:</label>
          <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $COONE; ?>" readonly>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" value="<?php echo $COTWO; ?>" readonly>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Amount Applied</label>
                  <div class="input-group">
                    <span class="input-group-addon">₱</span>
                    <input type="number" class="form-control" value="<?php echo $AMT; ?>" readonly>
                    <span class="input-group-addon">.00</span>
                  </div>
                </div>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-md-5">
                <label>Business Permit</label><br>
                <img src="<?php echo $BRGY; ?>" class="img-thumbnail">
              </div>
              <div class="col-md-5">
                <label>Barangay Permit</label><br>
                <img src="<?php echo $BSN; ?>" class="img-thumbnail">
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <?php
                    if($Stat == "Approved" || $Stat == "Denied"||$Stat == "Fully Paid"){
                      echo "<select class='form-control'>";
                      echo "<option>--DISABLED--</option>";
                      echo "</select>";
                    }else{
                      echo "<select class='form-control' name='stat'>";
                      echo "<option value='Approved'>Approve</option>";
                      echo "<option value='Denied'>Deny</option>";
                      echo "</select>";
                    }
                  ?>
                </div>
                <div class="form-group">
                  <?php
                    if($Stat == "Approved" || $Stat == "Denied"||$Stat == "Fully Paid"){
                      echo "<input type='submit' class='btn btn-primary' value='Submit' disabled>";
                    }else{
                        echo "<input type='submit' class='btn btn-primary' value='Submit' name='submitBtn'>";
                    }
                  ?>
                </div>
                <div class="form-group">
                  <a href="credit_loan_monitoring.php" class="btn btn-primary">Cancel</a>
                </div>
              </div>
            </div>
        </form>
        <hr>
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
