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
   		 $loan = mysqli_query($con, "SELECT * FROM loan WHERE RegID='$userr' AND Status='Approved'")or die(mysqli_errno());

while($getloan = mysqli_fetch_array($loan)){
		$newload = $getloan['total']+100;
		mysqli_query($con, "UPDATE loan SET total = '$newload' WHERE LoanID ='".$getloan['LoanID']."'")or die(mysqli_errno());
		mysqli_query($con, "INSERT INTO penalties(amount,date,RegID,LoanID) VALUES('100','$datee','$userr','".$getloan['LoanID']."')")or die(mysqli_errno());
}

 }

}
foreach ($attend as $att) {
       
         // echo "INSERT INTO time('account_no','time','date') VALUES('$RegID','$timee','$datee')";
        mysqli_query($con, "INSERT INTO time(account_no,time,date) VALUES('$att','$timee','$datee')")or die(mysqli_errno());
        //echo "INSERT INTO time(account_no,time,date) VALUES('$att','$timee','$datee')";
}

header("Location:index.php");
?>