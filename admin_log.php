<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Users</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
  </head>
  <body  style="background:url(images/9.jpg) no-repeat center center fixed;
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
    ?>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BPASS Online Management System</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
         <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="admin_panel.php">Dashboard</a></li>
            <li><a href="admin_user_profiling.php">User Profiling</a></li>
            <li><a href="admin_log.php">Log Book</a></li>
             <li><a href="attendance/index.php">Attendance</a></li>
              <li><a href="/attendance/admin/record.php">Attendance History</a></li>
            <li><a href="admin_settings_staff.php">Settings</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, <?php echo $_SESSION['Name']; ?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Dashboard </h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="admin_panel.php">Dashboard</a></li>
          <li class="active">User</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">User</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post" action = "<?php $_SERVER['PHP_SELF']?>">
                      <div class="input-group">
                        <input type="text" class="form-control" name="searchtxb" placeholder="Search here...">
                        <span class="input-group-btn">
                          <input type="submit" class="btn btn-default" name="Searchbtn"><span class="glyphicon glyphicon-search"></span>
                        </span>
                      </div>
                    </form>
                  </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Message</th>
                    <th>Date</th>
                  </tr>
                  <?php
                    $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                    $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                    $searchlog = mysqli_query($con, "SELECT * FROM archive_useractive ORDER BY Date LIMIT ".$lim.",8")or die(mysqli_errno());

                    while($getlog = mysqli_fetch_array($searchlog)){
                      echo "<tr>";
                      echo "<td>" . $getlog['Archive_UAID'] . "</td>";
                      echo "<td>" . $getlog['Msg'] . "</td>";
                      echo "<td>" . $getlog['Date'] . "</td>";
                      echo "</tr>";
                    }


                    $select = mysqli_query($con, "SELECT * FROM archive_useractive")or die(mysqli_errno());

                     $count = mysqli_num_rows($select);
                     //echo $count;
                     $totalpg = $count / 5;
                     $totalpg = ceil($totalpg);
                     echo "<nav aria-label='Page navigation'>";
                     echo "<ul class='pagination pagination'>";
                     for($ktr = 1; $ktr <= $totalpg; $ktr++){
                       echo "<li><a href='admin_log.php?p=$ktr'>" . $ktr . "</a></li>";
                     }
                     echo "</ul>";
                     echo "</nav>";

                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- ITEM FORM -->
        <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Item</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="prodname" placeholder="Enter Item Name" required>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="proddesc" placeholder="Enter Item Description" required>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="Cat">
                      <option value="1001">Home Cleaners</option>
                      <option value="1002">Laundry Care</option>
                      <option value="1003">Hand Hygiene</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <div class="input-group">
                      <span class="input-group-addon">₱</span>
                      <input type="number" class="form-control" name="price" required>
                      <span class="input-group-addon">.00</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Image</label><br>
                    <label>Upload Image</label>
                    <input type="file" name="prodimg" required>
                    <p class="help-block">Only png and jpg allowed</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <input type="submit" name="regItem" class="btn btn-primary" value="Register Item">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END OF ITEM FORM -->
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
