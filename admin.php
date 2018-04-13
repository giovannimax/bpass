<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
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

          <label class="navbar-brand" style="color:white" href="#"> <img src = "images/logo.png" style = "float:left;" height = "40px" /> BPASS ONLINE MANAGEMENT SYSTEM</label>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          
            <h1 class="text-center"> Login </h1>
          </div>
        </div>
      </div>
    </header>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
          <!-- <div class="alert alert-warning" role="alert">Warning Alert</div> -->
          <?php
            include 'connect.php';


            if(isset($_POST['Login'])){
              
              $Email = $_POST['emailadds'];
              $Pword = $_POST['pword'];
             
              include 'function_login.php'; 

               mysqli_query($con, "INSERT INTO history (date,action,data)VALUES(NOW(),'Login','$Email')")or die(mysqli_error());
                    }
                  ?>


            <form id="login" method="post" action="<?php $_SERVER['PHP_SELF']?>" class="well">
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="emailadds" class="form-control" placeholder="Enter Email Address">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pword" class="form-control" pattern="[a-zA-Z0-9 ]+" title="No Special Characters" placeholder="Password">
                  </div>
                  <input type="submit" name="Login" class="btn btn-success form-control" value="Login">
              </form>
              
          </div>
        </div>
      </div>
    </section>

    <!-- <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer> -->

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
