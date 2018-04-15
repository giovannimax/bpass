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
    <script type="text/javascript" src="js/jquery.js"></script>
    <style type="text/css">
      .mytable{
        display: table;
      }
      .myrowtable{
        display: table-row;
      }
      .mycelltable{
        display: table-cell;
      }


      /* Style the Image Used to Trigger the Modal */
.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999; /* Sit on top */
    padding-top: 50px;  /*Location of the box */
    left: 0;
    top: 0;
    /*width: 100%;  Full width 
    height: 100%;  Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 600px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

    </style>
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
              
              <a href="user_loan_form.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Loan Application <span class="badge"></span></a>
              <a href="user_paymenthistory.php" class="list-group-item active"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> History <span class="badge"></span></a>
                <!-- <a href="#" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Logs<span class="badge"></span></a> -->
              <!-- <a href="user_settings.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings<span class="badge"></span></a> -->
            </div>
          </div>


          
           <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel el-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title" style="color: white">History</h3>
                </div>
              </div>
              <div class="panel panel-default">
       
                <div class="panel-body">
                <?php
                $loanid = $_GET['id'];
              $result= mysqli_query($con,"SELECT * FROM loan WHERE LoanID = $loanid")or die (mysqli_error());
              while($row=mysqli_fetch_array($result)){
             
              ?>
    
          <div class="panel panel-default">
              <div style="background: #5cb85c;" class="panel-heading">
                <h3 class="panel-title"><span class="label-success label label-default"><?php echo date("F d, Y H:i:s",strtotime($row['date'])); ?></span></h3>
              </div>
              <div class="panel-body">
                <form class="form-group" method="post" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Name:</label>
                      <input type="text" class="form-control" value="Jennesa General Seras" readonly="">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>PB No.:</label>
                        <input type="text" class="form-control" name="pbno" value="5180926136384143" readonly="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" name="address" value="2461 Middleville Road, Monrovia, " readonly="">
                  </div>
                  <hr>
                  <div class="form-group">
                    <label>Source of Income</label>
                    <input type="text" class="form-control" name="srcincome" value="<?php echo $row['Income'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Loan Type</label>
                    <input type="text" name="" class="form-control" value="<?php 
              $resultt= mysqli_query($con,"SELECT * FROM loantype WHERE LT_ID = '".$row['LT_ID']."'")or die (mysqli_error());
              while($roww=mysqli_fetch_array($resultt)){
                echo $roww['LTDesc'];
              }
             ?>" readonly>
                  </div>

                  <!-- Comakers -->
                  <div id="comakers" style="display: block;"><div class="form-group" readonly>
                      <label>Co-makers ID:</label>
                      <div class="row">
                        <div class="col-md-6">
                          
                           <input type="text" name="" class="form-control" value="<?php 
                            $resultt= mysqli_query($con,"SELECT * FROM accounts WHERE RegID = '".$row['ComakersOne']."'")or die (mysqli_error());
                            while($roww=mysqli_fetch_array($resultt)){
                              echo $roww['Fname']." ".$roww['Lname'];
                            }
                           ?>" readonly>

                        </div><div class="col-md-6">
                            <input type="text" name="" class="form-control" value="<?php 
                            $resultt= mysqli_query($con,"SELECT * FROM accounts WHERE RegID = '".$row['ComakersTwo']."'")or die (mysqli_error());
                            while($roww=mysqli_fetch_array($resultt)){
                              echo $roww['Fname']." ".$roww['Lname'];
                            }
                           ?>" readonly>
                        </div>                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Amount Applied</label>
                            <div class="input-group">
                              <span class="input-group-addon">₱</span>
                              <input style="text-align: right;" type="number" id="amount" class="form-control" name="amount" onkeyup="getslideval(this);" value="<?php echo $row['Amount'];?>" readonly>
                              <span class="input-group-addon">.00</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Mode of Payment</label>
                            <input type="text" name="" id="paymod" class="form-control" value="<?php 
                            $resultt= mysqli_query($con,"SELECT * FROM paymenttype WHERE Pay_ID = '".$row['Pay_ID']."'")or die (mysqli_error());
                            while($roww=mysqli_fetch_array($resultt)){
                              echo $roww['PDesc'];
                            }
                           ?>" readonly>
                          </div>
                           <div id="expaycont">
                               <font style="margin-top: 5px;"> Amount</font>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="amntapp"></span></font><br>
                               <font id="intid" style="margin-top: 5px;">Interest (3%)</font>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="intapp"></span></font><br>
                               <label style="margin-top: 5px;" >Penalties</label>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span></span>
                                <?php 
                                  $totalpen=0;
                                  $getpen = mysqli_query($con, "SELECT * FROM penalties WHERE RegID = '$ID' AND LoanID ='$loanid'")or die(mysqli_error());
                                  while($getpenn = mysqli_fetch_array($getpen)){
                                          //$famnt = $getintt['percent']/100;
                                           $totalpen+=$getpenn['amount'];
                                    }
                                        echo "<input type='hidden' id='totpen' value='".$totalpen."'>";
                                        echo $totalpen;
                                ?>
                              </font><br>
                              <font style="margin-top: 5px;">Total</font>
                              <input type="hidden" name="total" value="" id="txttot">
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="amnttot"></span></font><br>
                              <label style="margin-top: 5px;" >Expected Payment</label>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="expay"></span></font><br>
                              <label style="margin-top: 5px;" >Balance</label>
                           
                              <font style="position: absolute;margin-top:5px;right: 15px;">&#8369; <span id="paybal">
                              <?php
                                 $loan = mysqli_query($con, "SELECT * FROM loan WHERE loanID = '$loanid'")or die(mysqli_error());
                  while($loanrow = mysqli_fetch_array($loan)){
                     $currbal=0 ;
                              $bal= mysqli_query($con, "SELECT * FROM payment WHERE loanID = '$loanid'")or die(mysqli_error());
                              while($rowbal = mysqli_fetch_array($bal)){
                                $currbal+=$rowbal['paid'];
                              }
                               //echo $row['total'] - $currbal;
                               echo number_format((float)$loanrow['total'] - $currbal, 2, '.', '');
                              

                  }

                              ?>
                              </span></font><br>
                              <label id="intid" style="margin-top: 5px;">Due Date</label>
                                
                              <font style="position: absolute;margin-top:5px;right: 15px;"><span>
                                <?php
                                $date = $row['date'];
                                  echo date("F d, Y",strtotime($date."+90 days"));
                                ?>
                              </span></font><br>
                            </div>
                        </div>
                      </div>

                      <hr>
                  <?php if($row['LT_ID']=="loan1"){ 

                    ?>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Business Permit</label><br>
                            <!-- Trigger the Modal -->
                            <img class="myImg" src="<?php echo $row['BSNPermit'];?>" onclick="imagemodal(this);" alt="Business Permit" height="200">

                          <!-- The Modal -->
                          <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                          </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Barangay Permit</label><br>
                           <img class="myImg" src="<?php echo $row['BRGYPermit'];?>" onclick="imagemodal(this);" alt="Barangay Permit" height="200">
                          </div>
                        </div>
                      </div>

                      <?php } else { ?>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Identification</label><br>
                            <!-- Trigger the Modal -->
                            <img class="myImg" src="<?php echo $row['BRGYPermit'];?>" onclick="imagemodal(this);" alt="Business Permit" height="200">

                          <!-- The Modal -->
                          <div id="myModal" class="modal">

                            <!-- The Close Button -->
                            <span class="close">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="img01">

                            <!-- Modal Caption (Image Text) -->
                            <div id="caption"></div>
                          </div>
                          </div>
                        </div>


                      <?php } ?>
                    </div>
                  <!-- End of Comakers -->
                </form>
              </div>
            </div>

    <hr>

     <div class="col-md-12">
            <h3>Payments</h3><br>

            <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>Date</th>
            <th>Amount</th>
          </tr>
          </thead>
          <tbody>
            <?php
            $totalpmnt=0;
            $paymnt= mysqli_query($con, "SELECT * FROM payment WHERE loanID = '$loanid'")or die(mysqli_error());
                  while($paymntt = mysqli_fetch_array($paymnt)){
                  echo "<tr><td>".date("F d, Y h:m A",strtotime($paymntt['date']))."</td>";
                  echo "<td>&#8369; ".$paymntt['paid']."</td><tr>";
                  $totalpmnt+=$paymntt['paid'];
              }
              ?>
          </tbody>
        </table>
        <label>Total: &#8369; <?php echo $totalpmnt;?></label>
          </div>
<a href="user_loanhistory.php" class="btn btn-danger">Go Back</a>
  </div> 

  <?php } ?>
                </div>
              </div>
  <!-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">


  function imagemodal(img){
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");

    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
  }


  window.onload = function calculate(){
    var paymeth = $("#paymod").val();
    var pentot = parseInt($("#totpen").val());
    if(paymeth=="Weekly"){
     var amnt = parseInt($("#amount").val());
     
      var intapp = parseFloat(amnt*<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '1'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                $famnt = $getintt['percent']/100;
                 echo number_format((float)$famnt, 2, '.', '');
                }
      ?>);
      var temptot = amnt + intapp;
      var amnttot = (temptot+pentot).toFixed(2);
      var payex = (amnttot/12).toFixed(2);
      $("#intid").text("Interest (<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '1'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                //$famnt = $getintt['percent']/100;
                 echo $getintt['percent'].'%';
                }
      ?>)");
      $("#amnttot").text(amnttot);
      $("#txttot").val(amnttot)
      $("#amntapp").text(amnt);
      $("#intapp").text(intapp);
      $("#expay").text(payex);
    } else {
      var amnt = parseInt($("#amount").val());
      var intapp = parseFloat(amnt*<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '2'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                $famnt = $getintt['percent']/100;
                 echo number_format((float)$famnt, 2, '.', '');
                }
      ?>);
      var temptot = amnt + intapp;
      var amnttot = (temptot+pentot).toFixed(2);
      var payex = (amnttot/3).toFixed(2);
      $("#intid").text("Interest (<?php
        $getint = mysqli_query($con, "SELECT * FROM interest WHERE intID = '2'")or die(mysqli_error());
        while($getintt = mysqli_fetch_array($getint)){
                //$famnt = $getintt['percent']/100;
                 echo $getintt['percent'].'%';
                }
      ?>)");
      $("#amnttot").text(amnttot);
      $("#txttot").val(amnttot)
      $("#amntapp").text(amnt);
      $("#intapp").text(intapp);
      $("#expay").text(payex);
    } 


}
    </script>
  </body>
</html>
