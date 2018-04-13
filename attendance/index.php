<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Users</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
  </head>
  <body style="background:url(../images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    <?php
      include '..\adminheader.php';
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
          <li><a href="../admin_panel.php">Dashboard</a></li>
          <li class="active">Users</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="../admin_panel.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              
              <a href="../admin_user_profiling.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profiling <span class="badge"><?php

                $selectuser = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());
                $resusers = mysqli_num_rows($selectuser);

                echo "$resusers";
              ?></span></a>
              <a href="../admin_log.php" class="list-group-item"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Log Book <span class="badge">~</span></a>
              <a href="attendance/index.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Attendance <span class="badge">~</span></a>
               <a href="admin/record.php" class="list-group-item"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Attendance Record <span class="badge">~</span></a>
               
              <a href="../admin_settings_staff.php" class="list-group-item"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="badge"></span></a>
            </div>
          </div>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Users</h3>
              </div>
              <div class="panel-body">
            <?php 
              $nowdate = date("Y-m-d");
              $userss = mysqli_query($con,"SELECT * FROM accounts")or die (mysqli_error());
              $roww= mysqli_query($con,"SELECT * FROM time WHERE date = '$nowdate'")or die (mysqli_error());
              $pres = mysqli_num_rows($roww);
              if($pres<=0){
            ?>
                <form method="POST" action="test.php">
                 <table class="table table-bordered table-hover">
                  <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                     <th>Contact No.</th>
                    <th>Membership Date</th>
                  </tr>
                <?php 

                $result= mysqli_query($con,"SELECT * FROM accounts ORDER BY Lname")or die (mysqli_error());
              while($row=mysqli_fetch_array($result)){
                  echo "<tr>";

                  echo "<td><input type='checkbox' class='att' name='attended[]' value='".$row['RegID']."'></td>";
                 echo "<td>".$row['RegID']."</td>";
                  echo "<td>".$row['Lname'].", ".$row['Fname']." ".$row['Mname']."</td>";
                   echo "<td>".$row['Gender']."</td>";
                   echo "<td>".$row['Contact']."</td>";
                   echo "<td>".date("F d, Y",strtotime($row['MemDate']))."</td>";
                    
                  echo "</tr>";
              }
                ?>
                </table>
                <input type="submit" name="submit" class="btn btn-success">
                <br>
                </form>
              <?php
                } else {
              ?>
              <div class="row">
                <div class="col-md-12">
                  Date: <?php echo date("F d, Y");?><br>
                  <h3>Today's Attandance:</h3>
                </div>
              </div><br>
                <div class="col-md-6">
                  <div class="well dash-box"><h2>
                    <?php
                   
                        echo $pres;
                      ?>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                      </h2>
                    <h4>Present</h4>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="well dash-box"><h2>
                    <?php
                        echo mysqli_num_rows($userss)-$pres;
                      ?>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                      </h2>
                    <h4>Absent</h4>
                  </div>
                </div>

              <?php
                }
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <?php 
      if($_POST){
        $RegID  = $_POST['regid'];
        $datee = date("Y-m-d");
        $timee = date("H:i:s");
         // echo "INSERT INTO time('account_no','time','date') VALUES('$RegID','$timee','$datee')";
         mysqli_query($con, "INSERT INTO time(account_no,time,date) VALUES('$RegID','$timee','$datee')")or die(mysqli_errno());
      }

    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script>
      $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

      $(".att").click(function () {
     $('#checkAll').not(this).prop('checked', this.checked);
 });

      function getprofile(regtxt){
        var regt = $(regtxt).val();
       $.get("attendprofile.php",{RegID:regt}, function( data ) {
             $("#profcont").html(data);
            });
      }
    </script>
  </body>
</html>
