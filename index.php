<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BPASS Online Management System</title>

   <link rel="shortcut icon" href="images/logo.png">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!--  Bootstrap Style -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--  Font-Awesome Style -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--  Animation Style -->
    <link href="assets/css/animate.css" rel="stylesheet" />
    <!--  Pretty Photo Style -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet" />
    <!--  Google Font Style -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--  Custom Style -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
   
 <div id="pre-div">
        <div id="loader">
        </div>
    </div>
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
                <div class = "navbar navbar-default navtop">
               
                <label class="navbar-brand" style="color:white" href="index.php"> <img src = "images/logo.png" style = "float:left;" height = "55px" />BPASS ONLINE MANAGEMENT SYSTEM</label>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

               
                </li>
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
        <p>

        <hr>


        <!--CONTACT FORM -->
        <div class="container">
        <div class="row">
        
         <div class="col-md-3">
            <div class="panel panel-default" width="500">

                        <legend class="text-center header"></legend>
                         <div class="panel-body text-center"  ><center>
                     <a href="admin.php"> <img src="eshop inv/3.png" class="img-responsive"  width = "200" /></a></center>
                        </div>
                          
               
            </div>
        </div>



        <div class="col-md-3">
            <div>
                <div class="panel panel-default">
                    <legend class="text-center header"></legend>
                    <div class="panel-body text-center"><center>
     <a href="admin.php"> <img src="eshop inv/2.png" class="img-responsive" width = "200" /></a></center>
                        </div>
                        
                    </div>
                </div>
            </div>
             <div class="col-md-3">
            <div class="panel panel-default">

                        <legend class="text-center header"></legend>
                         <div class="panel-body text-center"><center>
                     <a href="login.php"> <img src="eshop inv/1.png" class="img-responsive" width = "200" /></a></center>
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
<br/><br/>
    <!-- jQuery -->
<div class="row-fluid">
                <div class="col-md-5 col-md-offset-1">
                <h4><span id=tick2>
                </span>&nbsp;| 
<script>
                function show2(){
                if (!document.all&&!document.getElementById)
                return
                thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
                var Digital=new Date()
                var hours=Digital.getHours()
                var minutes=Digital.getMinutes()
                var seconds=Digital.getSeconds()
                var dn="PM"
                if (hours<12)
                dn="AM"
                if (hours>12)
                hours=hours-12
                if (hours==0)
                hours=12
                if (minutes<=9)
                minutes="0"+minutes
                if (seconds<=9)
                seconds="0"+seconds
                var ctime=hours+":"+minutes+":"+seconds+" "+dn
                thelement.innerHTML=ctime
                setTimeout("show2()",1000)
                }
                window.onload=show2
                //-->
</script>
          <?php
            $date = new DateTime();
            echo $date->format('l, F jS, Y');
          ?>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

     <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
     <!--  WOW Script -->
    <script src="assets/js/wow.min.js"></script>
    <!--  Scrolling Script -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  PrettyPhoto Script -->
    <!--  Custom Scripts -->
    <script src="assets/js/custom.js"></script>
</body>

</html>
