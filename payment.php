 
 <?php
      include 'connect.php';
     // $result = $con->query("SELECT RegID, Lname, Fname FROM accounts WHERE ID = ") or die(mysqli_error());

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

$now = date('Y-m-d h:i:s', time());
       if(isset($_POST['submit'])){
                  $loanidd = $_POST['loanid'];
                  $paid = $_POST['amntpd'];
                  $regid =  $_POST['RegID'];
                  $Contact = "";
                  $select = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$regid'")or die(mysqli_errno());
     while($getinfo = mysqli_fetch_array($select)){
       $Contact = $getinfo['Contact'];
     }


                    // $payment= mysqli_query($con, "SELECT * FROM payment ORDER BY payment_id DESC ") or die (mysqli_error());
                  $payment1 = mysqli_query($con,"INSERT INTO payment (LoanID,paid,date,RegID)
                                  VALUES('$loanidd','$paid','$now','$regid')");
                                   // or die (mysqli_error());
                  $loan = mysqli_query($con, "SELECT * FROM loan WHERE loanID = '$loanidd'")or die(mysqli_error());
                  while($row = mysqli_fetch_array($loan)){
                     $currbal=0 ;
                              $bal= mysqli_query($con, "SELECT * FROM payment WHERE loanID = '$loanidd'")or die(mysqli_error());
                              while($rowbal = mysqli_fetch_array($bal)){
                                $currbal+=$rowbal['paid'];
                              }
                               //echo $row['total'] - $currbal;
                               
                               $finbal = number_format((float)$row['total'] - $currbal, 2, '.', '');
                                
                               if($finbal<=0){
                                $payment1 = mysqli_query($con,"UPDATE loan SET Status = 'Fully Paid' WHERE loanID = '$loanidd'");
                                mysqli_query($con,"UPDATE penalties SET Status = '1' WHERE RegID = '$regid'");
                                $sms = "LoanID: $loanidd. Loan fully paid.";
                                  itexmo($Contact,$sms,"TR-GIOVA948358_56KHG");
                              } else{
                                 $sms = "LoanID: $loanidd. Payment added, P".$paid." was deducted on your account. Your new balance is P".$finbal;
                                  itexmo($Contact,$sms,"TR-ARMYL862372_WTV47");
                              }
                  }
                  // if($payment1 > 0){
                  //   echo "<script>alert (Successfully Added)</script>";
                  //   header("location:paymenthistory.php");

                  // }else {
                  //   echo"<script>alert (Not Accepted. try again)</script>";
                  //   header("location:paymenthistory.php");
                  // }
                
                  }            
                  // mysqli_query($con, "INSERT INTO payment_logs (date,action,data)VALUES(NOW(),'Payment','$Fname')")or die(mysqli_error());

                ?>
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
     <script src="js/jquery.js"></script>
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    
      

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
            <li><a href="credit_fundnshares.php">Membership Funds/Shares</a></li>
            <li class="active"><a href="payment.php">Payment</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</h1>
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
           <?php
            include("creditnavigation.php");
          ?>
          <div class="col-md-9">
            <!-- Website Overview -->
            
               
                  <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel el-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Payment Form</h3>
              </div>

             
         

             <div class="panel-body">
             <form class="form-group" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <label>TransactionID:</label>
                      <input type="text" class="form-control" name="loanid" onkeyup="viewpayloan(this);" required >
                      
                    </div>
                <div class="col-md-12" id="payloancont">


                </div>

                        
                      </br></br></br></br></br></br></br></br></br></br></br>
                    
                          <div class="form-group">
                          <input type="submit" name="submit" class="btn btn-success" value="submit">
                          <a type="button" name="Cancel" class="btn btn-danger" value="Cancel" href="user_panel.php">Cancel</a>
                              </div>
                            </div>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
              

              <!-- Latest Users -->
              <!-- <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Notifications</h3>
                </div>
                <div class="panel-body">

                </div>
              </div> --

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster --><!-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function viewpayloan(payloan){
        var payl = $(payloan).val();
         $.get( "payloan.php",{id:payl}, function( data ) {
             $("#payloancont").html(data);
            });
      }
    </script>
  </body>
</html>
