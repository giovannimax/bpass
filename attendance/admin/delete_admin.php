<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `admin1` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
	header('location:admin.php');