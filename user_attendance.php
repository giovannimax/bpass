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
      include 'userheader.php';
      $id = $_SESSION['ID'];
    ?>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Attendance </h1>
          </div>
        </div>
      </div>
    </header>

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
                      <!-- <div class="input-group">
                        <input type="text" class="form-control" name="searchtxb" placeholder="Search here...">
                        <span class="input-group-btn">
                          <input type="submit" class="btn btn-default" name="Searchbtn"><span class="glyphicon glyphicon-search"></span>
                        </span>
                      </div> -->
                    </form>
                  </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                  <tr>
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  <?php
                    // if(isset($_POST['Searchbtn'])){
                    //   $search = $_POST['searchtxb'];



                    //   $select_userss = mysqli_query($con, "SELECT * FROM accounts WHERE Fname LIKE '%$search%' OR Lname LIKE '%$search%' OR Mname LIKE '%$search%'")or die(mysqli_errno());

                    //   while($get_userss = mysqli_fetch_array($select_userss)){
                    //       $idd=$get_userss['RegID'];
                    //   $select_attendance = mysqli_query($con, "SELECT * FROM time WHERE account_no = '$idd' ORDER BY date DESC")or die(mysqli_errno());

                    //   while($get_attend = mysqli_fetch_array($select_attendance)){
                    //     $ID = $get_attend['account_no'];
                    //     echo "<tr>";
                    //     echo "<td>" . $get_attend['account_no']."</td>";
                    //     $select_users = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$ID'")or die(mysqli_errno());

                    //   while($get_users = mysqli_fetch_array($select_users)){
                    //     echo "<td>" . $get_users['Fname'] . " " . $get_users['Mname'] . " " . $get_users['Lname'] . "</td>";
                    //   }

                    //    echo "<td>" . date("h:i a", strtotime($get_attend['time'])). "</td>";
                    //     echo "<td>" . $get_attend['date'] . "</td>";
                    //     echo "</tr>";
                    //   }

                    // }

                    // }else{
                      $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                      $lim = ($p == 1 || $p =="") ? 0 : ($p*10)-10;

                      //$select_users = mysqli_query($con, "SELECT * FROM Accounts ORDER BY MemDate LIMIT ".$lim.",10")or die(mysqli_errno());
                      $select_attendance = mysqli_query($con, "SELECT * FROM time WHERE account_no = '$id' ORDER BY date DESC LIMIT ".$lim.",10")or die(mysqli_errno());

                      while($get_attend = mysqli_fetch_array($select_attendance)){
                        $ID = $get_attend['account_no'];
                        echo "<tr>";
                        echo "<td>" . $get_attend['account_no']."</td>";
                        $select_users = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$ID'")or die(mysqli_errno());

                      while($get_users = mysqli_fetch_array($select_users)){
                        echo "<td>" . $get_users['Fname'] . " " . $get_users['Mname'] . " " . $get_users['Lname'] . "</td>";
                      }

                        echo "<td>" . date("h:i a", strtotime($get_attend['time'])). "</td>";
                        echo "<td>" . $get_attend['date'] . "</td>";
                        echo "</tr>";
                      }

                      $select = mysqli_query($con, "SELECT * FROM time")or die(mysqli_errno());

                       $count = mysqli_num_rows($select);
                       //echo $count;
                       $totalpg = $count / 10;
                       $totalpg = ceil($totalpg);
                       echo "<nav aria-label='Page navigation'>";
                       echo "<ul class='pagination pagination'>";
                       for($ktr = 1; $ktr <= $totalpg; $ktr++){
                         echo "<li><a href='record.php?p=$ktr'>" . $ktr . "</a></li>";
                       }
                       echo "</ul>";
                       echo "</nav>";
                    //}

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
