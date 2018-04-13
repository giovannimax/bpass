<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Dashboard</title>
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
   <?php
      include("userheader.php");
    ?>
    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard</h1>
          </div>
        </div>
      </div>
    </header>

  
    <br/>
   

<section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="admin_panel.php">Dashboard</a></li>
          <li class="active">Users</li>
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
              <a href="user_loan_form.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Loan Application <span class="badge"></span></a>
              <a href="user_paymenthistory.php" class="list-group-item active"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> History <span class="badge"></span></a>
                <!-- <a href="#" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Logs<span class="badge"></span></a> -->
              <!-- <a href="user_settings.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings<span class="badge"></span></a> -->
            </div>
          </div>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Users</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post" action = "<?php $_SERVER['PHP_SELF']?>">
                     
                        </span>
                      </div>
                    </form>
                  </div>
                </div>
                <br>
                

                <div class="container">
        <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">

                        <legend class="text-center header"></legend>
                         <div class="panel-body text-center">
                            <center>
                     <a href="user_loanhistory.php"> <img src="eshop inv/12.png" class="img-responsive"  /></a></center>
                        </div>
                             
               
            </div>
        </div>
        


        <div class="col-md-3">
            <div>
                <div class="panel panel-default">
                    <legend class="text-center header"></legend>
                    <div class="panel-body text-center"><center>
     <a href="user_paymenthistory1.php"> <img src="eshop inv/14.png" class="img-responsive" /></a></center>
                        </div>
                        
                    </div>
                </div>
            </div>
        

           <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
