<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BPASS Online Management System</title>
    <link rel = "icon" type ="img/jpg" href="logo.ico"/>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <?php
    include 'connect.php';
    $ID = $_SESSION['ID'];
    if(empty($_SESSION['ID'])){
      header("location:login.php");
    }
    $today = date("Y-m-d");
    $totalQty = 0;
    $totalCheckOut = 0;
  ?>



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
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
                    <a href="contact.php">Contact Us</a>
                </li>
                <li>
                    <a href="user_transaction.php">Transaction History</a>
                </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
      <table class="table table-hover">
        <tr>
          <th>Transaction ID</th>
          <th>Cart ID</th>
          <th>Total Items</th>
          <th>Total Checkout</th>
          <th>Date</th>
          <th></th>
        </tr>
        <?php
          $loadtrans = mysqli_query($con, "SELECT * FROM transactions WHERE RegID = '$ID' ORDER BY Date")or die(mysqli_errno());
          $restrans = mysqli_num_rows($loadtrans);

          if($restrans > 0){
            while($gettrans = mysqli_fetch_array($loadtrans)){
              echo "<tr>";
                echo "<td>" . $gettrans['TransID'] . "</td>";
                echo "<td>" . $gettrans['CartID'] . "</td>";
                echo "<td>" . $gettrans['TotalItems'] . "</td>";
                echo "<td>₱" . $gettrans['TotalCost'] . "</td>";
                echo "<td>" . $gettrans['Date'] . "</td>";
                echo "<td><a href='user_trans_details.php?RegID=$ID&CartID=".$gettrans['CartID']."' class='btn btn-primary form-control'>View Transactions</a></td>";
              echo "</tr>";
            }
          }else{

          }

        ?>
      </table>
      <hr>

    </div>
    <!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
