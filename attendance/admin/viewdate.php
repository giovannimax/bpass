
<?php
  include '../../connect.php';
  $reqdate = $_GET['date'];
  $result= mysqli_query($con,"SELECT * FROM time WHERE date = '$reqdate'")or die (mysqli_error());
  $users = mysqli_query($con,"SELECT * FROM accounts ORDER BY Lname")or die (mysqli_error());
  $rows=array();
 while($row=mysqli_fetch_array($result)){
      array_push($rows, $row['account_no']);
}
  $rowcount = mysqli_num_rows($result);
 $usercount = mysqli_num_rows($users);
  if($rowcount>0){
?>

<div class="col-md-6">
  <h4>Present (<span class="text-success"><?php echo $rowcount;?></span>)</h4>
  <table class="table table-bordered">
    <tr>
    <th>
      RegID
    </th>
    <th>
      Name
    </th></tr>
    
                    <?php
                        $users = mysqli_query($con,"SELECT * FROM accounts ORDER BY Lname")or die (mysqli_error());
                         while($acc=mysqli_fetch_array($users)){
                            if (in_array($acc['RegID'], $rows)) {
                              echo "<tr><td>".$acc['RegID']."</td>";
                              echo "<td>".$acc['Lname'].', '.$acc['Fname'].' '.$acc['Mname']."</td></tr>";
                            
                         }

                       }
                        //echo $pres;
                      ?>
 </table>
                </div>
<div class="col-md-6">
             <h4>Absent (<span class="text-danger"><?php echo $usercount-$rowcount;?></span>)</h4>
  <table class="table table-bordered">
    <tr>
    <th>
      RegID
    </th>
    <th>
      Name
    </th></tr>
    
                    <?php
                    $users = mysqli_query($con,"SELECT * FROM accounts ORDER BY Lname")or die (mysqli_error());
                         while($acc=mysqli_fetch_array($users)){
                            if (!in_array($acc['RegID'], $rows)) {
                              echo "<tr><td>".$acc['RegID']."</td>";
                              echo "<td>".$acc['Lname'].', '.$acc['Fname'].' '.$acc['Mname']."</td></tr>";
                           
                         }

                       }
                        //echo $pres;
                      ?>
 </table>
 
</div>

<?php } else { ?>
  <div class="row">
    <br>
    <div class="col-md-12">
      <span class="text-danger">No attendance yet.</span>
    </div>
    
  </div>


<?php } ?>