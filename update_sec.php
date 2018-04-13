<?php
	include_once 'connect.php';

	$capital = $_POST['capital'];
	$savings = $_POST['savings'];
	$damayan = $_POST['damayan'];
	$marketing = $_POST['marketing'];
	$healthcare = $_POST['healthcare'];
	$RegID = $_SESSION['regID'];

	$sql1 = "UPDATE membership_fundnshare SET Capital = $capital, Savings = $savings, Damayan = $damayan, Marketing = $marketing, Healthcare = $healthcare WHERE RegID = $RegID";

	$sql2 = mysqli_query($sql1,$sql2);

	header('location: admin_user_profiling.php')
?>