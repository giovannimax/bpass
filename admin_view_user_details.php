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

    <script type="text/javascript">
      function ShowEnHidePass(){
        var anonBtn = document.getElementById("anonbtn");
        var anonLogo = document.getElementById("anon");
        var Password = document.getElementById("password");

        if(Password.type === "password"){
          anonLogo.className = "glyphicon glyphicon-eye-open";
          Password.type = "text";
        }else if(Password.type === "text"){
          anonLogo.className = "glyphicon glyphicon-eye-close";
          Password.type = "password";
        }

      }
    </script>
  </head>
  <body>
    <?php
     include 'connect.php';
     if(empty($_SESSION['ID'])){
       header("location:login.php");
     }

     $ID = $_REQUEST['RegID'];

     //User Details
     $select = mysqli_query($con, "SELECT Accounts.RegID, Accounts.Fname, Accounts.Mname, Accounts.Lname, Accounts.MemDate, Accounts.Email, Accounts.Contact, loan_set.ls_conf, loan_set.RegID, loan_config.l_conf, loan_config.l_perc, Membership_fundnshare.RegID, Membership_fundnshare.Capital, Membership_fundnshare.Savings, Membership_fundnshare.Damayan, Membership_fundnshare.Marketing, Membership_fundnshare.HealthCare FROM Accounts
     INNER JOIN loan_set
     ON loan_set.RegID=Accounts.RegID
     INNER JOIN loan_config
     ON loan_config.l_conf=loan_set.ls_conf
     INNER JOIN Membership_fundnshare
     ON Membership_fundnshare.RegID=Accounts.RegID
     WHERE accounts.RegID = '$ID'")or die(mysqli_errno());

     while($getinfo = mysqli_fetch_array($select)){
       $RegID = $getinfo['RegID'];
       $Fname = $getinfo['Fname'];
       $Mname = $getinfo['Mname'];
       $Lname = $getinfo['Lname'];
       $MemDate = date("Y-m-d", strtotime($getinfo['MemDate']));
       $Email = $getinfo['Email'];
       $Contact = $getinfo['Contact'];

       $L_CONF = $getinfo['l_conf'];
       $L_PERC = $getinfo['l_perc'];

       $Capital = $getinfo['Capital'];
       $Savings = $getinfo['Savings'];
       $Marketing = $getinfo['Marketing'];
       $Damayan = $getinfo['Damayan'];
       $HealthCare = $getinfo['HealthCare'];

     }
     //End of User Details
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
            <li><a href="#">Dashboard</a></li>
            
            <li><a href="admin_fundnshares.php">Membership Funds/Shares</a></li>
            <li class="active"><a href="admin_user_profiling.php">User Profiling</a></li>
            <li><a href="#">Database</a></li>
            <li><a href="#">Log Book</a></li>
            <li><a href="#">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo $Fname; ?></a></li>
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

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#prof" aria-controls="prof" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#sec" aria-controls="sec" role="tab" data-toggle="tab">Security</a></li>
            <li role="presentation"><a href="admin_user_profiling.php">Go Back</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="prof">
              <form method="post" action="update_info.php">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Information</h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>First Name</label>
                          <input type="text" class="form-control" name="Fname" value="<?php echo $Fname; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Middle Name</label>
                          <input type="text" class="form-control" name="Mname" value="<?php echo $Mname; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="Lname" value="<?php echo $Lname; ?>" readonly>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Membership Date</label>
                          <input type="date" class="form-control" name="Uname" value="<?php echo $MemDate; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Email Address</label>
                          <input type="email" class="form-control" name="Uname" value="<?php echo $Email; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Contact #</label>
                          <input type="number" class="form-control" name="Uname" value="<?php echo $Contact; ?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-1">
                        <input type="submit" class="btn btn-info" name="UpdateSecuritybtn" value="Update" enabled>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div role="tabpanel" class="tab-pane" id="sec">
              <form method="post" action="update_sec.php">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Funds and Shares</h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Capital</label>
                          <div class="input-group">
                            <span class="input-group-addon">₱</span>
                            <input type="number" value="<?php echo $Capital; ?>" class="form-control" name="damayan">
                            <span class="input-group-addon">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Savings</label>
                          <div class="input-group">
                            <span class="input-group-addon">₱</span>
                            <input type="number" value="<?php echo $Savings; ?>" class="form-control" name="damayan">
                            <span class="input-group-addon">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Damayan</label>
                          <div class="input-group">
                            <span class="input-group-addon">₱</span>
                            <input type="number" value="<?php echo $Damayan; ?>" class="form-control" name="damayan">
                            <span class="input-group-addon">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Loanable Amount Percentage</label>
                          <div class="input-group">
                            <input type="number" value="<?php echo $L_PERC; ?>" class="form-control" name="damayan">
                            <span class="input-group-addon">%</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Marketing</label>
                          <div class="input-group">
                            <span class="input-group-addon">₱</span>
                            <input type="number" value="<?php echo $Marketing; ?>" class="form-control" name="damayan">
                            <span class="input-group-addon">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Health Care</label>
                          <div class="input-group">
                            <span class="input-group-addon">₱</span>
                            <input type="number" value="<?php echo $HealthCare; ?>" class="form-control" name="damayan">
                            <span class="input-group-addon">.00</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-1">
                      <input type="submit" class="btn btn-info" name="UpdateSecuritybtn" value="Update" disabled>
                    </div>
                  </div>
                </div>
              </form>
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
