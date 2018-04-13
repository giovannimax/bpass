 <?php
     include '../connect.php';
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
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-info" name="UpdateSecuritybtn" value="Login" enabled>
                      </div>
                    </div>
                  </div>
                </div>
              </form>