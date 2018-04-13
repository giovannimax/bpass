<!DOCTYPE html>
<html lang = "eng">
	<head>
		<meta charset = "utf-8" />
		<title>BPASS Online Management System</title>
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css"/>
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
	</head>
	<body style="background:url(../images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
 

 <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BPASS Online Management System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
             <li ><a href="admin_panel.php">Dashboard</a></li>
            <li class="active"><a href="admin_user_profiling.php">User Profiling</a></li>
            <li><a href="admin_log.php">Log Book</a></li>
             <li><a href="attendance/index.php">Attendance</a></li>
              <li><a href="/attendance/admin/record.php"> History</a></li>
              <li><a href="user_logs.php">Logs</a></li>
            <li><a href="admin_settings_staff.php">Settings</a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="admin_panel.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              
              <a href="/organization/admin_user_profiling.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profiling <span class="badge"></span></a>
              <a href="admin_log.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Log Book <span class="badge">~</span></a>
              <a href="attendance/index.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Attendance <span class="badge">~</span></a>
               <a href="admin/record.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Attendance History <span class="badge">~</span></a>
              <a href="admin_settings_staff.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="badge"></span></a>
            </div>
          </div>

			<div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel el-default">
              
              
              </div>
         
			
			<div class = "col-lg-9	 well">
				<h3><strong> Attendance</strong> || Login</h3>
			
				<div id = "result"></div>
				<br />
				<br />
				<form enctype = "multipart/form-data">
					<div class = "form-group">
						<label>Member ID:</label>
						<input type = "text" id = "student" class = "form-control" required = "required"/>
						<br />
						<br />
						<div id = "error"></div>
						<br />
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-login"></span>Login</button>
					</div>


				</form>
			</div>
			
			 
        </div>
      </div>
    </div>

		
			
			<a style = "float:right; margin-top:-1px;" href = "index.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a> 
		</div>
	</div>

	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
</html>