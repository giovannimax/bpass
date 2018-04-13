<?php
	session_start();
	ob_start();

	
	if(isset($_POST['submit'])){
		include "connect.php";
		if(empty($_SESSION['ID'])){
        header("location:login.php");
        }

        $ID = $_SESSION['ID'];

		$qty = $_POST['qty'];
		$Price = $_POST['Price'];

		$subtotal = $qty*$price;
		$status = "Pending";


		$mydate = getdate(date("U"));
        $date = "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
        $CartID = substr(str_shuffle("0123456789"), 0, 15);

		$insert_orders = mysqli_query($con,"INSERT INTO transactions VALUES('','$CartID','$ID','$qty','$subtotal','$date')");

		else
		{
			echo mysqli_errno();
		}
	}

?>