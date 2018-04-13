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
    <title>BPASS Online Management System</title>
    <link rel = "icon" type ="img/jpg" href="logo.ico"/>


    <!-- Custom CSS -->
    <!-- <link href="css/heroic-features.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">BPASS Online Management System</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

          <li>
                <a href="user_panel.php">Dashboard</a>
          </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home Care <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="homecare.php?CatID=1001">Home Cleaners</a></li>
            <li><a href="homecare.php?CatID=1002">Laundry Care</a></li>
            <li><a href="homecare.php?CatID=1003">Hand Hygiene</a></li>
          </ul>
        </li>

        <li>
          <a href="cart.php">Cart</a>
        </li>
        <li>
          <a href="contact.php">Contact Us</a></li>
        <li>
        <li>
            <a href="user_transaction.php">Transaction History</a>
        </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

    <!-- Page Content -->
    <div class="container">
      <hr>

      <?php
        include 'connect.php';
        $CatID = $_REQUEST['CatID'];
        $loaditems = mysqli_query($con, "SELECT * FROM products WHERE CatID = '$CatID'")or die(mysqli_errno());

        while($getitems = mysqli_fetch_array($loaditems)){
          // echo "<div class='row'>";
          // echo "<div class='col-lg-12'>";
          // echo "<h3>" . $getitems['CatDesc'] . "</h3>";
          // echo "</div>";
          // echo "</div>";
          $ProdID = $getitems['ProdID'];

          echo "<div class='row text-center'>";
          echo "<div class='col-md-3 col-sm-6'>";
          echo "<div class='thumbnail'>";
          echo "<img src='" . $getitems['image'] . "' alt=''>";
          echo "<div class='caption'>";
          echo "<h3>" . $getitems['ProdName'] . "</h3>";
          echo "<p>" . $getitems['ProdDesc'] . "</p>";
          echo "<p><a href='user_order.php?ProdID=$ProdID' class='btn btn-primary'>Add to Cart</a></p>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      ?>
    </div>

    <!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
