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
        session_start();
        ob_start();

        $ID = $_SESSION['ID'];
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
                <a class="navbar-brand" href="index.php">HOSCOMCO E-Commerce</a>
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
            <li class="active">
                <a href="contact.php">Contact Us</a>
            </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">


        <hr>


        <hr>


        <!--CONTACT FORM -->
        <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">

                        <legend class="text-center header">Contact us</legend>
                <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Message" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>


        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <legend class="text-center header">Our Office</legend>
                    <div class="panel-body text-center">
                        <h4>Address</h4>
                        <div>
                        Faustino St., Isadora Heights<br />
                        Brgy. Holy Spirit, Quezon City<br />
                        Tel. Nos. 428-9114, 427-5967<br />
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>



        <!-- Footer
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy;2017 HOSCOMCO, All rights reserved</p>
                </div>
            </div>
        </footer>-->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
