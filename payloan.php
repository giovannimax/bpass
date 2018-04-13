<?php include("connect.php"); 

$loanid = $_GET['id'];

 $loan = mysqli_query($con, "SELECT * FROM loan WHERE loanID = '$loanid' AND (Status = 'Fully Paid' or Status='Approved')")or die(mysqli_error());
$rowcountt=mysqli_num_rows($loan);
if($rowcountt>0){
                      while($row = mysqli_fetch_array($loan)){
?>
          <input type="hidden" name="RegID" value="<?php echo $row['RegID']; ?>">
                <div class="col-md-12">
                   <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="" class="form-control" value="<?php 
              $resultt= mysqli_query($con,"SELECT * FROM accounts WHERE RegID = '".$row['RegID']."'")or die (mysqli_error());
              while($roww=mysqli_fetch_array($resultt)){
                echo $roww['Fname']." ".$roww['Lname'];
              }
             ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label>Loan Type</label>
                    <input type="text" name="" class="form-control" value="<?php 
              $resultt= mysqli_query($con,"SELECT * FROM loantype WHERE LT_ID = '".$row['LT_ID']."'")or die (mysqli_error());
              while($roww=mysqli_fetch_array($resultt)){
                echo $roww['LTDesc'];
              }
             ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                          <div class="form-group">
                            <label>Mode of Payment</label>
                            <input type="text" name="" id="paymod" class="form-control" value="<?php 
                            $resultt= mysqli_query($con,"SELECT * FROM paymenttype WHERE Pay_ID = '".$row['Pay_ID']."'")or die (mysqli_error());
                            while($roww=mysqli_fetch_array($resultt)){
                              echo $roww['PDesc'];
                            }
                           ?>" readonly>
                          </div>
                        </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div id="expaycont">
                               <font style="margin-top: 5px;"> Amount</font>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="amntapp"><?php echo $row["Amount"];?></span></font><br>
                              <?php if($row["Pay_ID"]=="p2"){ ?>
                               <font style="margin-top: 5px;">Interest (3%)</font>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="intapp"><?php
                               echo number_format((float)($row['Amount']*0.03), 2, '.', '');
                              ?></span></font><br>

                              <?php } else { ?>
                                <font style="margin-top: 5px;">Interest (5%)</font>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="intapp"><?php
                               echo number_format((float)($row['Amount']*0.05), 2, '.', '');
                              ?></span></font><br>


                              <?php } ?>

                              <font style="margin-top: 5px;">Total</font>
                              <input type="hidden" name="total" value="" id="txttot">
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="amnttot"><?php echo $row["total"];?></span></font><br>
                            <label style="margin-top: 5px;" >Expected Payment</label>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="expay">
                                <?php
                                if($row["Pay_ID"]=="p2"){
                                  $expay = $row["total"]/12;
                                } else {
                                   $expay = $row["total"]/3;
                                }

                                echo number_format((float)$expay, 2, '.', '');
                                ?>
                              </span></font><br>
                              <label style="margin-top: 5px;" >Balance</label>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="paybal"><?php
                               $currbal=0 ;
                              $bal= mysqli_query($con, "SELECT * FROM payment WHERE loanID = '$loanid'")or die(mysqli_error());
                              while($rowbal = mysqli_fetch_array($bal)){
                                $currbal+=$rowbal['paid'];
                              }
                               //echo $row['total'] - $currbal;
                               echo number_format((float)$row['total'] - $currbal, 2, '.', '');
                               ?></span></font>
                              <div class="col-md-12">
                              <div class="form-group">
                                 <label>Amount Paid</label>
                                <input type="text" class="form-control" name="amntpd" required <?php
                                  if($row['Status']=="Denied"||$row['Status']=="Pending"||$row['Status']=="Fully Paid")
                                    echo "readonly";
                                ?> ><br>
                                <font style="margin-top: 5px;">Status</font>
              <?php 
                        $statlbl = '';
                        if($row['Status']=="Approved"||$row['Status']=="Fully Paid")
                        $statlbl = "label-success";
                        else if($row['Status']=="Pending")
                          $statlbl = "label-muted";
                        else
                          $statlbl = "label-danger";
            ?>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;"><span class="<?php echo $statlbl;?> label label-default"><?php echo $row['Status'];?></span></font>
                              </div>

                              <label id="intid" style="margin-top: 5px;">Due Date</label>
                                
                              <font style="position: absolute;margin-top:5px;right: 15px;"><span>
                                <?php
                                $date = $row['date'];
                                  echo date("F d, Y",strtotime($date."+90 days"));
                                ?>
                              </span></font><br>
              
                          </div>
                      </div>
                  </div>
                </div>

        <?php }

        } else {
          echo "<font class='text-danger'>Loan not found.</font>";
        } ?>