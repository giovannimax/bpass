<?php
include '..\connect.php';
$attend = $_POST['attended'];
//print_r($attend);
 $datee = date("Y-m-d");
 $timee = date("H:i:s");

 $select_users = mysqli_query($con, "SELECT * FROM accounts")or die(mysqli_errno());

 while($get_users = mysqli_fetch_array($select_users)){

 	if (!in_array($get_users['RegID'], $attend)) {
 		$userr = $get_users['RegID'];
   		mysqli_query($con, "INSERT INTO penalties(amount,date,RegID) VALUES('100','$datee','$userr')")or die(mysqli_errno());
}

 }

foreach ($attend as $att) {
       
         // echo "INSERT INTO time('account_no','time','date') VALUES('$RegID','$timee','$datee')";
        mysqli_query($con, "INSERT INTO time(account_no,time,date) VALUES('$att','$timee','$datee')")or die(mysqli_errno());
        //echo "INSERT INTO time(account_no,time,date) VALUES('$att','$timee','$datee')";
}

header("Location:index.php");
?>