<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Dashboard</h1>
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
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-6">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                      <?php
                        $selectuser = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());
                        $resusers = mysqli_num_rows($selectuser);

                        echo "$resusers";
                      ?></h2>
                    <h4>Users</h4>
                  </div>
                </div>
             
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Latest Users</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Joined</th>
                        <th>Options</th>
                      </tr>
                      <?php
                        $today = date("Y-m-d");

                        $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                        $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;
                        $select_rec_users = mysqli_query($con, "SELECT * FROM Accounts WHERE MemDate = '$today' LIMIT ".$lim.",3")or die(mysqli_errno());

                        while($get_rec_users = mysqli_fetch_array($select_rec_users)){
                          $ID = $get_rec_users['RegID'];
                          echo "<tr>";
                          echo "<td>" . $get_rec_users['Fname'] . " " . $get_rec_users['Mname'] . " " . $get_rec_users['Lname'] . "</td>";
                          echo "<td>" . $get_rec_users['Contact'] . "</td>";
                          echo "<td>" . $get_rec_users['MemDate'] . "</td>";
                          echo "<td><a class='btn btn-success' href='activateacc.php?RegID=$ID'>Activate</a></td>";
                          echo "<td><a class='btn btn-danger' href='deactivateacc.php?RegID=$ID'>Deactivate</a></td>";
                          echo "</tr>";
                        }

                        $select = mysqli_query($con, "SELECT * FROM Accounts WHERE MemDate = '$today'")or die(mysqli_errno());

                        $count = mysqli_num_rows($select);
                        //echo $count;
                        $totalpg = $count / 5;
                        $totalpg = ceil($totalpg);
                        echo "<nav aria-label='Page navigation'>";
                        echo "<ul class='pagination pagination'>";
                        for($ktr = 1; $ktr <= $totalpg; $ktr++){
                          echo "<li><a href='credit_fundnshares.php?p=$ktr'>" . $ktr . "</a></li>";
                        }
                        echo "</ul>";
                        echo "</nav>";
                      ?>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer> -->

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
