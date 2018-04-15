<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Loan Application</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-slider.css" />
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <script src="js/bootstrap-slider.js"></script>

 <style type="text/css">
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0; 
} 

.invalid:focus{
  border-color: red;
}  
 </style>

    <script type="text/javascript">
      function ShowComakers(ddload){
      var selectedloan = $(ddload).val();

      if(selectedloan=="def"){
          $("#comakers").css({'display':'none'});
      } else if(selectedloan=="loan1"){
           $.get( "businessloan.php", function( data ) {
             $("#comakers").html(data);
            });
           $("#comakers").css({'display':'block'});
        } else if(selectedloan=="loan2"){
           $.get( "personalloan.php", function( data ) {
             $("#comakers").html(data);
            });
           $("#comakers").css({'display':'block'});
        } else{
           $.get( "emerloan.php", function( data ) {
             $("#comakers").html(data);
            });
           $("#comakers").css({'display':'block'});
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
          <li class="active">Dashboard</li>
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
              
              <a href="user_loan_form.php" class="list-group-item active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Loan Application <span class="badge"></span></a>
              <a href="user_loanhistory.php" class="list-group-item"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> History <span class="badge"></span></a>
                <!-- <a href="#" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Logs<span class="badge"></span></a> -->
             <!--  <a href="user_settings.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings<span class="badge"></span></a> -->
            </div>
          </div>



          <div class="col-md-9">
            <!-- Website Overview -->
            <?php
              include 'function_loan_process.php';

              $loans = mysqli_query($con, "SELECT * FROM loan WHERE RegID = '$ID' AND (Status = 'Pending' OR Status = 'Approved')")or die(mysqli_error());
               $rowcountt=mysqli_num_rows($loans);
            ?>
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Loan Form</h3>
              </div>
              <div class="panel-body">
                <?php
              if($rowcountt==0){
              ?>
                <form class="form-group" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Name:</label>
                      <input type="text" class="form-control" value="<?php echo $Name; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tin No.:</label>
                        <input type="text" class="form-control" name="pbno" value="<?php echo $PBNO; ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $Add; ?>" readonly>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label>Source of Income</label>
                    <input type="text" class="form-control" name="srcincome" value="<?php echo $SOI; ?>" readonly>
                  </div>
                   <div class="form-group">
                    <label>Collateral</label>
                    <input type="text" class="form-control" name="srccoll" value="<?php echo $Coll; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label>Loan Type</label>
                    <select class="form-control" id="ltype" onchange="ShowComakers(this)" name="loantype">
                      <option value="def">-- Select Loan Type --</option>
                      <option value="loan1">Business Loan</option>
                      <option value="loan2">Personal Loan</option>
                      <option value="loan3">Emergency Loan</option>
                    </select>
                  </div>

                  <!-- Comakers -->
                  <div id="comakers" style="display: none">
                    
                  </div>
                  <!-- End of Comakers -->
                  <?php
                    if($_SESSION['LoanCurID'] == "N\A"){
                      $checkfunds = mysqli_query($con, "SELECT * FROM membership_fundnshare WHERE RegID = '$ID'")or die(mysqli_error());
                      while($getfundsinfo = mysqli_fetch_array($checkfunds)){
                        $getCapital = $getfundsinfo['Capital'];
                      }
                      if($getCapital <= 500){
                        echo "<input type='submit' name='Submitbtn' class='btn btn-success' value='Submit' >";
                      }else{
                        echo "<input type='submit' name='Submitbtn' class='btn btn-success' value='Submit'>";
                      }
                    }else{
                      $checkfunds = mysqli_query($con, "SELECT * FROM membership_fundnshare WHERE RegID = '$ID'")or die(mysqli_error());
                      while($getfundsinfo = mysqli_fetch_array($checkfunds)){
                        $getCapital = $getfundsinfo['Capital'];
                      }
                      if($getCapital <= 500){
                        echo "<input type='submit' name='Submitbtn' class='btn btn-success' value='Submit' >";
                      }else{
                        $LoanCurID = $_SESSION['LoanCurID'];
                        $checkloan = mysqli_query($con, "SELECT * FROM Loan WHERE RegID = '$ID' AND LoanID = '$LoanCurID'")or die(mysqli_error());
                        while($getloan = mysqli_fetch_array($checkloan)){

                          if($getloan['Status'] == "Pending" || $getloan['Status'] == "For Interview" || $getloan['Status'] == "For Signature"){
                            echo "<input type='submit' name='Submitbtn' class='btn btn-success' value='Submit'>";
                          }else{
                            echo "<input type='submit' name='Submitbtn' class='btn btn-success' value='Submit'>";


                            
                          }


                        }
                      }
                     
                    }

                  ?>
                  <a type="button" name="Cancel" class="btn btn-danger" value="Cancel" href="user_panel.php">Cancel</a>
                </form>
              </div>
              <?php } else { ?>

               <font class="text-danger">You have an existing or pending Loan. You are only allowed to apply loan once.</font>

              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
  </body>
</html>
