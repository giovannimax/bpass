 
<?php
  include 'connect.php';
  $reqdate = $_GET['date'];
?>


 <table class="table table-striped table-hover">
                  <tr>
                     <th>Payment ID</th>
                    <th>TransactionID</th>
                    <th>Name</th>
                    <th>Amount Paid</th>
                    <th>Account Receivable</th>
                    <th>Date</th>
               
                  </tr>

                  <tbody>

                      <?php
                      $totrec=0;
                      $totamnt="";
                      $result= mysqli_query($con, "SELECT * FROM payment WHERE date(date) ='$reqdate'") or die (mysqli_error());
                      while ($row= mysqli_fetch_array ($result) ){
                      $id=$row['payment_id'];
                      $idd=$row['RegID'];
                      $lidd=$row['LoanID'];
                      ?>
                     <tr>
                     
                    <td><?php echo $row['payment_id']; ?></td>
                    <td><?php echo $row['LoanID']; ?></td>
                    <td>
                      <?php
                        $resultt= mysqli_query($con, "SELECT * FROM accounts WHERE RegID='$idd'") or die (mysqli_error());
                      while ($roww= mysqli_fetch_array ($resultt) ){
                        echo $roww['Fname']." ".$roww['Mname']." ".$roww['Lname'];
                      }
                      ?>
                    </td>
                    <td>&#8369; <?php $totamnt = $row['paid']; echo $row['paid']; ?></td>
                    <td>&#8369;
                      <?php
                        
                        $resulttt= mysqli_query($con, "SELECT * FROM loan WHERE LoanID='$lidd'") or die (mysqli_error());
                      while ($rowww= mysqli_fetch_array ($resulttt) ){
                        if($rowww['Pay_ID']=='p2'){
                           $totrec=$totrec+($totamnt/12);
                           echo number_format((float)$totamnt/12, 2, '.', '');
                         }else{
                          //$totrec+=$totamnt/3;
                          $totrec=$totrec+($totamnt/3);
                           echo number_format((float)$totamnt/3, 2, '.', '');
                         }

                          
                      }
                      ?>
                    </td>
                     <td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>

                    
                  

                    
                      </tr>
                      <?php } ?>
                          
                      </tbody>
</table>

<span class="text-success" >Total Receivables: &#8369; <?php echo $totrec;?></span>
