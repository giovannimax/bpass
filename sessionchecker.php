<?php
if(empty($_SESSION['ID'])){
	header("Location:login.php?status=invalid");
}
?>