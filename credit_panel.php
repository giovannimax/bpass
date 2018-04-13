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
                <div class="col-md-6">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-piggy-bank" aria-hidden="true"></span> <?php $countunupdatedfunds = mysqli_query($con, "SELECT * FROM Membership_fundnshare WHERE Capital = '0' AND Savings = '0' AND Damayan = '0' AND Marketing = '0' AND HealthCare = '0'")or die(mysqli_errno());
                    $resfunds = mysqli_num_rows($countunupdatedfunds);
                    echo $resfunds; ?></h2>
                    <h4>Funds n' Shares</h4>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="well dash-box">
                    <h2><?php
                      $loadnumloans = mysqli_query($con, "SELECT * FROM loan WHERE Status = 'Pending' OR Status = 'For Signature' OR Status = 'For Interview'")or die(mysqli_errno());
                      $numloans = mysqli_num_rows($loadnumloans);
                      echo $numloans;
                    ?><h2>
                    <h4>Loan Applicants</h4>
                  </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
