<?php
  $searchuser = mysqli_query($con, "SELECT * FROM Accounts WHERE Email = '$Email' AND Pword = '$Pword'")or die(mysqli_enable_reads_from_master(link)($con));
  $res1 = mysqli_num_rows($searchuser);

  $searchadmin = mysqli_query($con, "SELECT * FROM Admin WHERE Email = '$Email' AND Pword = '$Pword'")or die(mysqli_errno());
  $res2 = mysqli_num_rows($searchadmin);

  $searchcredit = mysqli_query($con, "SELECT * FROM credit_comm WHERE Email = '$Email' AND Pword = '$Pword'")or die(mysqli_errno());
  $res3 = mysqli_num_rows($searchcredit);


  if($res1 > 0){
    while($getdata = mysqli_fetch_array($searchuser)){
    $_SESSION['tempID'] = $getdata['RegID'];
    if($getdata['verify']==1){
    $_SESSION['Name']= $getdata['Fname']." ".$getdata['Lname'];
    $_SESSION['ID'] = $getdata['RegID'];
    header("location:user_panel.php");
    }
   else {
      header("Location:auth_code_ver.php?status=unverified");
    }
  }
  }else if($res2 > 0){
    while($getdata = mysqli_fetch_array($searchadmin)){
      $_SESSION['ID'] = $getdata['AdminID'];
    $_SESSION['Name']= $getdata['Fname']." ".$getdata['Lname'];
    header("location:admin_panel.php");
  }
  }else if($res3 > 0){
    while($getdata = mysqli_fetch_array($searchcredit)){
      $_SESSION['ID'] = $getdata['CreditID'];
  $_SESSION['Name']= $getdata['Fname']." ".$getdata['Lname'];
    header("location:credit_panel.php");  
    }
  }else{
    echo "<div class='alert alert-warning' role='alert'>Login Failed</div>";
  }
?>
