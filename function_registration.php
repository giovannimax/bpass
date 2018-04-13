<?php
  $Uname = $Fname . $Lname;

  //Search if exists
  $searchacc = mysqli_query($con, "SELECT * FROM Accounts WHERE Fname = '$Fname' AND Lname = '$Lname' AND Mname = '$Mname'")or die(mysqli_errno());
  $resacc = mysqli_num_rows($searchacc);
  //End of search

  //Search Email and Contact
  $searchin = mysqli_query($con, "SELECT * FROM Accounts WHERE Email = '$Email' OR Contact = '$Contact'")or die(mysqli_errno());
  $resin = mysqli_num_rows($searchin);
  //End of Search

  if($CPword != $Pword){
    echo "<div class='alert alert-warning' role='alert'>Password does not match</div>";
  }else if($resacc > 0){
    echo "<div class='alert alert-warning' role='alert'>Account name already taken</div>";
  }else if($resin > 0){
    echo "<div class='alert alert-warning' role='alert'>Mobile #/Email already taken</div>";
  }else{
    //Generate ID w/insertion & SMS Msg
    $cnt = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());
    $res = mysqli_num_rows($cnt);
    $year = date("Y");

    if($res > 0){
      $var1 = 1 + ($year * 100000);
      $IDNum = $var1 + $res;
      $ID = $Fname[0] . $Lname[0] . (string)$IDNum;

      $today = date("Y-m-d");

      $register = mysqli_query($con, "INSERT INTO accounts VALUES('$ID', '$Fname', '$Lname', '$Mname', '$Uname', '$Pword', '$today', '$Address', '$Contact', '$Email', '$Gender', '$Q1', '$Q1Ans', '$Q2', '$Q2Ans', '1')")or die(mysqli_errno());
      $insertshares = mysqli_query($con, "INSERT INTO Membership_fundnshare VALUES('$ID', '0000.00', '0000.00', '0000.00', '0000.00', '0000.00')")or
       die(mysqli_errno());
      $loanset = mysqli_query($con, "INSERT INTO loan_set VALUES('$ID', '17')")or die(mysqli_errno());

      $_SESSION['ID'] = $ID;
      header("location:function_sendsmswauth.php");
    }else{
      $ID = $Fname[0] . $Lname[0] . (string)$year . "00001";

      $today = date("Y-m-d");

      $register = mysqli_query($con, "INSERT INTO accounts VALUES('$ID', '$Fname', '$Lname', '$Mname', '$Uname', '$Pword', '$today', '$Address', '$Contact', '$Email', '$Gender', '$Q1', '$Q1Ans', '$Q2', '$Q2Ans', '1')")or die(mysqli_errno());
      $insertshares = mysqli_query($con, "INSERT INTO Membership_fundnshare VALUES('$ID', '0000.00', '0000.00', '0000.00', '0000.00', '0000.00')")or die(mysqli_errno());
     $loanset = mysqli_query($con, "INSERT INTO loan_set VALUES('$ID', '17')")or die(mysqli_errno());


      $_SESSION['ID'] = $ID;
      header("location:function_sendsmswauth.php");
    }
    //End of Generate ID w/insertion & SMS Msg
  }

?>
