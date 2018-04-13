<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Loan Application</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

    
  <style type="text/css">
    label{
      color:white;
    }
  </style>

    <script type="text/javascript">
      function ShowComakers(){
        var ddlLoan = document.getElementById("ltype");
        var divComakers = document.getElementById("comakers");

        divComakers.style.display = ddlLoan.value == "Y" ? "" : "none";

        if(ddlLoan.value == "loan1"){
          divComakers.style.display = "";
        }else if(ddlLoan.value == "loan2"){
          divComakers.style.display = "";
        }else if(ddlLoan.value == "loan3"){
          divComakers.style.display = "";
        }
      }
    </script>
  </head>
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    <?php
     include 'connect.php';
     if(empty($_SESSION['ID'])){
       header("location:login.php");
     }
     $RegID = $_REQUEST['RegID'];
     $selectfunds = mysqli_query($con, "SELECT * FROM Membership_fundnshare WHERE RegID = '$RegID'")or die(mysqli_errno());
     while($getfunds = mysqli_fetch_array($selectfunds)){
       $Capital = $getfunds['Capital'];
       $Savings = $getfunds['Savings'];
       $Damayan = $getfunds['Damayan'];
       $Marketing = $getfunds['Marketing'];
       $HealthCare = $getfunds['HealthCare'];
     }
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
          <li class="active">Credit Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <?php
          if(isset($_POST['UpdateFundsbtn'])){
            $Capital = $_POST['capital'];
            $Savings = $_POST['savings'];
            $Damayan = $_POST['damayan'];
            $Marketing = $_POST['marketing'];
            $Health = $_POST['health'];
            $Pword = $_POST['pword'];
            $ID = $_POST['id'];

            $checksec = mysqli_query($con, "SELECT * FROM credit_comm WHERE Pword = '$Pword' AND CreditID = '$ID'")or die(mysqli_errno());
            $ressec = mysqli_num_rows($checksec);

            if($ressec > 0){
              $updatefunds = mysqli_query($con, "UPDATE Membership_fundnshare SET Capital = '$Capital', Savings = '$Savings', Damayan = '$Damayan', Marketing = '$Marketing', HealthCare = '$Health' WHERE RegID = '$RegID'")or die(mysqli_errno());
              echo "<div class='alert alert-success' role='alert'>Update Successful</div>";
            }else{
              echo "<div class='alert alert-danger' role='alert'>Update Unsuccessful</div>";
            }
          }else if(isset($_POST['Cancelbtn'])){
            header("location:credit_fundnshares.php");
          }
        ?>
        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Share Capital</label>
                <div class="input-group">
                  <span class="input-group-addon">₱</span>
                  <input type="number" value="<?php echo $Capital; ?>" class="form-control" name="capital">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Savings</label>
                <div class="input-group">
                  <span class="input-group-addon">₱</span>
                  <input type="number" value="<?php echo $Savings; ?>" class="form-control" name="savings">
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Damayan</label>
                <div class="input-group">
                  <span class="input-group-addon">₱</span>
                  <input type="number" value="<?php echo $Damayan; ?>" class="form-control" name="damayan">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Marketing Share</label>
                <div class="input-group">
                  <span class="input-group-addon">₱</span>
                  <input type="number" value="<?php echo $Marketing; ?>" class="form-control" name="marketing">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Health Care</label>
                <div class="input-group">
                  <span class="input-group-addon">₱</span>
                  <input type="number" value="<?php echo $HealthCare; ?>" class="form-control" name="health">
                  <span class="input-group-addon">.00</span>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Enter Password</label>
                <input type="password" class="form-control" name="pword">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Enter ID</label>
                <input type="text" class="form-control" name="id">
              </div>
            </div>
            <div class="col-md-2">
              <input type="submit" name="UpdateFundsbtn" class="btn btn-warning" value="Update">
            </div>
            <div class="col-md-2">
              <input type="submit" name="Cancelbtn" class="btn btn-danger" value="Cancel">
            </div>
          </div>
        </form>
        <hr>
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
