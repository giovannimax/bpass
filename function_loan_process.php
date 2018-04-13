<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
$now = date('Y-m-d h:i:s', time());
 $select = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$ID'")or die(mysqli_errno());
 while($getinfo = mysqli_fetch_array($select)){
   $Name = $getinfo['Fname'] . " " . $getinfo['Mname'] . " " . $getinfo['Lname'];
   $PBNO = $getinfo['PBNO'];
   $SOI = $getinfo['SOI'];
   $Add = $getinfo['Address'];
   $Coll = $getinfo['collateral'];
 }
 $selectfunds = mysqli_query($con, "SELECT * FROM Membership_fundnshare WHERE RegID = '$ID'")or die(mysqli_errno());
 while($getfunds = mysqli_fetch_array($selectfunds)){
   $Capital = $getfunds['Capital'];
 }
 $selectloanperc = mysqli_query($con, "SELECT loan_set.ls_conf, loan_set.RegID, loan_config.l_conf, loan_config.l_perc FROM loan_set INNER JOIN loan_config ON loan_set.ls_conf=loan_config.l_conf WHERE RegID = '$ID'")or die(mysqli_errno());

 while($getloanperc = mysqli_fetch_array($selectloanperc)){
   $loanperc = $getloanperc['l_perc'];
 }

 if(isset($_POST['Submitbtn'])){

   //Declaration
   $PBNO = $_POST['pbno'];
   $SRCINCOME = $_POST['srcincome'];
   $SRCOLL = $_POST['srccoll'];
   $LOANTYPE = $_POST['loantype'];
   $COMAKERS1 = $_POST['Comakers1'];
   $COMAKERS2 = $_POST['Comakers2'];
   $Amount = $_POST['amount'];
   $MODE = $_POST['modepayment'];
   $TOTAL = $_POST['total'];
   $BRGYpermit = '';
   $BSNpermit = '';
   $filevalidator=1;
   //End of declaration

if(!empty($_FILES['businesspermit'])){
    $file_type = $_FILES['businesspermit']['type']; //returns the mimetype
      $allowed = array("image/jpeg", "image/gif", "image/png");
      if(!in_array($file_type, $allowed)) {

        //echo $error_message;

         $filevalidator=0;
      }

  }

  if(!empty($_FILES['barangaypermit'])){ 
      $file_type = $_FILES['barangaypermit']['type']; //returns the mimetype
      if(!in_array($file_type, $allowed)) {
        //echo $error_message;

         $filevalidator=0;
      }

  }

   $getfund1 = mysqli_query($con, "SELECT * FROM Membership_fundnshare WHERE RegID = '$COMAKERS1'")or die(mysqli_errno());
   $getfund2 = mysqli_query($con, "SELECT * FROM Membership_fundnshare WHERE RegID = '$COMAKERS2'")or die(mysqli_errno());
   $resfund1 = mysqli_num_rows($getfund1);
    $resfund2 = mysqli_num_rows($getfund2);
    if($resfund1 > 0 ){
   while($funds1 = mysqli_fetch_array($getfund1))
     $worth1 = $funds1['Capital'] * 0.90;
  }else{ $worth1 = 0.00; }
    
   if($resfund2 > 0){
  while($funds2 = mysqli_fetch_array($getfund2))
  $worth2 = $funds2['Capital'] * 0.90;
  }else{ $worth2 = 0.00; }


    $loanfactor = ($worth1 + $worth2 +($Capital * $loanperc));
    if($Amount > $loanfactor){
       echo "<div class='alert alert-warning' role='alert'>Your loan amount exceeded your loan factor. Please add 2 Co-makers</div>";
    }else if($MODE == "def"){ //If mode chosen is null
       echo "<div class='alert alert-warning' role='alert'>Please choose a mode of payment</div>";
    }else if($LOANTYPE == "def"){ //If type chosen is null
       echo "<div class='alert alert-warning' role='alert'>Please choose a loan type</div>";
    }else if($Amount==0){
      echo "<div class='alert alert-warning' role='alert'>Amount must not be 0.</div>";
    }else if ($filevalidator==1) {

      if($LOANTYPE=="loan1"){

      $path2 = "images/" . basename($_FILES['businesspermit']['name']);
      $path1 = "images/" . basename($_FILES['barangaypermit']['name']);

      if(move_uploaded_file($_FILES['businesspermit']['tmp_name'], $path2) && move_uploaded_file($_FILES['barangaypermit']['tmp_name'], $path1)){
$insertloan = mysqli_query($con, "INSERT INTO loan VALUES('', '$ID', '$PBNO', '$SRCINCOME', '$LOANTYPE', '$COMAKERS1', '$COMAKERS2', '$Amount','$TOTAL', '$MODE','$now', '$path1', '$path2', '$SRCOLL','0', 'Pending')")or die(mysqli_errno());
        echo "<script>alert('Loan Applied.');window.location.href='user_panel.php';</script>";
         mysqli_query($con, "INSERT INTO history_logs (date,action,data,RegID)VALUES(NOW(),'Apply Loan','$Name','$ID')")or die(mysqli_error());
      }else{
        echo "<div class='alert alert-success' role='alert'>404 File Upload Error</div>";
      }
    } else {
      $path2 = "images/" . basename($_FILES['businesspermit']['name']);

      if(move_uploaded_file($_FILES['businesspermit']['tmp_name'], $path2)){

        $insertloan = mysqli_query($con, "INSERT INTO loan VALUES('', '$ID', '$PBNO', '$SRCINCOME', '$LOANTYPE', '$COMAKERS1', '$COMAKERS2', '$Amount','$TOTAL', '$MODE','$now', '$path2', '', '$SRCOLL','0', 'Pending')")or die(mysqli_errno());
        echo "<script>alert('Loan Applied.');window.location.href='user_panel.php';</script>";
         mysqli_query($con, "INSERT INTO history_logs (date,action,data,RegID)VALUES(NOW(),'Apply Loan','$Name','$ID')")or die(mysqli_error());
      }else{
        echo "<div class='alert alert-success' role='alert'>404 File Upload Error</div>";
      }
    }

  } else {
    echo "<div class='alert alert-success' role='alert'>Only .jpg and .png are allowed</div>";
   //End of validations
  }

 }
?>
