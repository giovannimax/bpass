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
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    <?php
      include 'adminheader.php';
    ?>

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
          <li class="active">Users</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="admin_panel.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              
              <a href="admin_user_profiling.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profiling <span class="badge"><?php

                $selectuser = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());
                $resusers = mysqli_num_rows($selectuser);

                echo "$resusers";
              ?></span></a>
              <a href="admin_log.php" class="list-group-item"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Log Book <span class="badge">~</span></a>
              <a href="attendance/index.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Attendance <span class="badge">~</span></a>
               <a href="attendance/admin/record.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Attendance Record <span class="badge">~</span></a>
               
              <a href="admin_settings_staff.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="badge"></span></a>
            </div>
          </div>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Users</h3>
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
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Membership Date</th>
                    <th>Joined</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <?php
                    if(isset($_POST['Searchbtn'])){
                      $search = $_POST['searchtxb'];

                      $select_users = mysqli_query($con, "SELECT * FROM accounts WHERE Fname LIKE '%$search%' OR Lname LIKE '%$search%' OR Mname LIKE '%$search%'")or die(mysqli_errno());

                      while($get_users = mysqli_fetch_array($select_users)){
                        $ID = $get_users['RegID'];
                        echo "<tr>";
                        echo "<td>" . $get_users['RegID']."</td>";
                        echo "<td>" . $get_users['Fname'] . " " . $get_users['Mname'] . " " . $get_users['Lname'] . "</td>";
                        echo "<td>" . $get_users['MemDate'] . "</td>";
                        echo "<td><a class='btn btn-success' href='activateacc.php?RegID=$ID'>Activate</a></td>";
                        echo "<td><a class='btn btn-danger' href='deactivateacc.php?RegID=$ID'>Deactivate</a></td>";
                        echo "<td><a class='btn btn-primary' href='admin_view_user_details.php?RegID=$ID'>View Details</a></td>";
                        echo "</tr>";
                      }
                    }else{
                      $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                      $lim = ($p == 1 || $p =="") ? 0 : ($p*10)-10;

                      $select_users = mysqli_query($con, "SELECT * FROM Accounts ORDER BY MemDate LIMIT ".$lim.",10")or die(mysqli_errno());

                      while($get_users = mysqli_fetch_array($select_users)){
                        $ID = $get_users['RegID'];
                        echo "<tr>";
                        echo "<td>" . $get_users['RegID']."</td>";
                        echo "<td>" . $get_users['Fname'] . " " . $get_users['Mname'] . " " . $get_users['Lname'] . "</td>";
                        echo "<td>" . $get_users['MemDate'] . "</td>";
                        echo "<td><a class='btn btn-success' href='activateacc.php?RegID=$ID'>Activate</a></td>";
                        echo "<td><a class='btn btn-danger  ' href='deactivateacc.php?RegID=$ID'>Deactivate</a></td>";
                        echo "<td><a class='btn btn-primary' href='admin_view_user_details.php?RegID=$ID'>View Details</a></td>";
                        echo "</tr>";
                      }

                      $select = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());

                       $count = mysqli_num_rows($select);
                       //echo $count;
                       $totalpg = $count / 10;
                       $totalpg = ceil($totalpg);
                       echo "<nav aria-label='Page navigation'>";
                       echo "<ul class='pagination pagination'>";
                       for($ktr = 1; $ktr <= $totalpg; $ktr++){
                         echo "<li><a href='admin_user_profiling.php?p=$ktr'>" . $ktr . "</a></li>";
                       }
                       echo "</ul>";
                       echo "</nav>";
                    }

                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
