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
    include("creditheader.php");
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
            <th>User Name</th>
            <th>Action</th>
            <th>Date / Time</th>
          </tr>
          </thead>
          <tbody>
              <?php
              $result= mysqli_query($con, "SELECT * FROM history ORDER BY history_id DESC ") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['history_id'];
              ?>
          <tr>
            <td><?php echo $row['data']; ?></td>
            <td><span class="label-primary label label-default"><?php echo $row['action']; ?></span></td>
            <td><span class="label-success label label-default"><?php echo date("M d, Y H:i:s",strtotime($row['date'])); ?></span></td>
          </tr>
              <?php } ?>
          </tbody>
          </table>


  </div>  
                </div>
              </div>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>