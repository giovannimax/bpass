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
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    <?php
      include 'creditheader.php';
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
          <?php
            include("creditnavigation.php");
          ?>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title"></h3>
              </div>
                <div class="panel-body">
                  <label>Date:</label><input type="date" id="datepick" value="<?php echo date("Y-m-d");?>" onchange="getattend(this);" class="form-control"><br>
                  <div class="attformcont">
                    
                  </div>

                </div>
              </div>
              </div>

              <!-- Latest Users -->
              <!-- <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Notifications</h3>
                </div>
                <div class="panel-body">

                </div>
              </div> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script type="text/javascript">
       dateee= $("#datepick").val();
       $.get( "recdate.php",{date:dateee}, function( data ) {
             $(".attformcont").html(data);
        });
      function getattend(txtdate){
        datee = $(txtdate).val();
       $.get( "recdate.php",{date:datee}, function( data ) {
             $(".attformcont").html(data);
        });
      }
    </script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
