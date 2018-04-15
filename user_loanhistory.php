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
              <a href="user_loanhistory.php" class="list-group-item active"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> History <span class="badge"></span></a>
                <!-- <a href="#" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Logs<span class="badge"></span></a> -->
              <!-- <a href="user_settings.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings<span class="badge"></span></a> -->
            </div>
          </div>

          
           <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel el-default">
              <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">History</h3>
                </div>
              </div>
              <div class="panel panel-default">
       
                <div class="panel-body">
                 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
          <thead>
          <tr>
            <th>TransactionID</th>
            <th>Loan Type</th>
            <th>Amount</th>
            <th>Date / Time</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody>
              <?php
              $i=1;
              $result= mysqli_query($con, "SELECT * FROM loan WHERE RegID = '$ID' ORDER BY date DESC ") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
             // $id=$row['history_id'];
              ?>
          <tr>
            <td><?php echo $row['LoanID'] ?></td>
            <td><?php 
              $resultt= mysqli_query($con,"SELECT * FROM loantype WHERE LT_ID = '".$row['LT_ID']."'")or die (mysqli_error());
              while($roww=mysqli_fetch_array($resultt)){
                echo $roww['LTDesc'];
              }
             ?></td>
            <td>&#8369; <?php echo $row['Amount']; ?></td>
            <td><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></td>
            <?php 
            $statlbl = '';
            if($row['Status']=="Approved"||$row['Status']=="Fully Paid")
            $statlbl = "label-success";
            else if($row['Status']=="Pending")
              $statlbl = "label-muted";
            else
              $statlbl = "label-danger";
            ?>
            <td><span class="<?php echo $statlbl;?> label label-default"><?php echo $row['Status'];?></span></td>
            <td><a href="viewloan.php?id=<?php echo $row['LoanID'] ?>" class="btn btn-success" aria-hidden="true">View</a></td>
          </tr>
              <?php $i+=1; } ?>
          </tbody>
          </table>

  </div>  
                </div>
              </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
