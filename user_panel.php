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

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active" style="color:black" >Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="user_panel.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="user_loan_form.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Loan Application <span class="badge"></span></a>
              <a href="user_paymenthistory.php" class="list-group-item"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> History <span class="badge"></span></a>

              <!--  <a href="user_logs.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Logs <span class="badge"></span></a> -->
              <!-- <a href="user_settings.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="badge"></span></a> -->
            </div>

          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title"></h3>
              </div>
              <div class="panel-body">
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> 0</h2>
                    <h4>Failed login</h4>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><?php echo $LoanStat;   ?></h2>
                    <h4>Loan Status</h4>
                  </div>
                </div>
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Notifications</h3>
                </div>
                <div class="panel-body">
                  <script>
                    var countDown = new Date("March 31, 2018 12:00:00").getTime();

                    var x = setInterval(function(){
                      var now = new Date().getTime();

                      var distance = countDown - now;

                      var seconds = Math.floor((distance/1000) % 60);
                      var minutes = Math.floor((distance/1000/60) % 60);
                      var hour = Math.floor((distance/(1000*60*60)) % 24);
                      var days = Math.floor(distance/(1000*60*60*24));

                      document.getElementById("days").innerHTML = days + "d";
                      document.getElementById("hours").innerHTML = hour + "hrs";
                      document.getElementById("minutes").innerHTML = minutes + "min";
                      document.getElementById("seconds").innerHTML = seconds + "sec";
                    }, 1000);
                  </script>
                  <div class="main">
            				<h1 id = "timer_title">Coming Soon!</h1><br>
            				<p id = "days"></p>
                    <p id = "hours"></p>
                    <p id = "minutes"></p>
                    <p id = "seconds"></p>
            			</div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
