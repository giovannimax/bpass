<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>BPASS Online Management System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "css/bootstrap.css" />
	</head>
	<body>
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					
					<p class = "navbar-text pull-right">BPASS Online Management System</p>
				</div>
				<ul class = "nav navbar-nav navbar-right">
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i> <?php echo htmlentities($admin_name)?> <b class = "caret"></b></a>
						<ul class = "dropdown-menu">
							<li><a href = "logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container-fluid" style = "margin-top:70px;">
			<ul class = "nav nav-pills">
				<li class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Account <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a href = "student.php"><span class = "glyphicon glyphicon-user"></span> Member</a></li>
					</ul>
				</li>
				<li><a href = "record.php"><span class = "glyphicon glyphicon-book"></span> Record</a></li>
			</ul>
			<br />
		
			
		</div>
		
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	
</html>