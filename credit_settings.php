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
  <body>
    <?php
      include 'creditheader.php';
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
          <li class="active">Settings >> Staff Members</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#">Staff Members</a></li>
        </ul>

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="prof">
            <form method="post" action="update_info.php">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Staff Members</h3>
                </div>
                <div class="panel-body">
                  <div class="panel-body">

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Credit Committee</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-bordered table-condensed table-hover">
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                          </tr>
                          <?php
                            if(isset($_POST['regCred'])){
                              $Fname = $_POST['Fname'];
                              $Lname = $_POST['Lname'];
                              $Mname = $_POST['Mname'];
                              $Email = $_POST['Email'];
                              $Contact = $_POST['Contact'];
                              $pass = $_POST['pass'];

                              $search = mysqli_query($con, "SELECT * FROM credit_comm WHERE Lname = '$Lname' AND Fname = '$Fname' AND Mname = '$Mname' AND Email = '$Email' AND Contact = '$Contact'")or die(mysqli_errno());
                              $res = mysqli_num_rows($search);

                              if($res > 0){
                                echo "<script>alert('Credit Committee Already Exists');</script>";
                                $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                                $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                                $loadcredit = mysqli_query($con, "SELECT * FROM credit_comm ORDER BY Lname")or die(mysqli_errno());
                                while($getcredit = mysqli_fetch_array($loadcredit)){
                                  echo "<tr>";
                                  echo "<td>" . $getcredit['CreditID'] . "</td>";
                                  echo "<td>" . $getcredit['Lname'] . ", " . $getcredit['Fname'] . " " . $getcredit['Mname'] . "</td>";
                                  echo "<td>" . $getcredit['Email'] . "</td>";
                                  echo "<td>" . $getcredit['Contact'] . "</td>";
                                  echo "</tr>";
                                }

                                $select = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());

                                $count = mysqli_num_rows($select);
                                //echo $count;
                                $totalpg = $count / 5;
                                $totalpg = ceil($totalpg);
                                echo "<nav aria-label='Page navigation'>";
                                echo "<ul class='pagination pagination-sm'>";
                                for($ktr = 1; $ktr <= $totalpg; $ktr++){
                                  echo "<li><a href='credit_settings.php?p=$ktr'>" . $ktr . "</a></li>";
                                }
                                echo "</ul>";
                                echo "</nav>";
                              }else{
                                $Pword = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

                                $countrows = mysqli_query($con, "SELECT * FROM credit_comm")or die(mysqli_errno());
                                $ktr = mysqli_num_rows($countrows);
                                $year = date("Y");
                                $var = $ktr + (1 + ($year * 100000));
                                $ID = "CREDIT-" . $Fname[0] . $Mname[0] . $Lname[0] . (string)$var;

                                $insert = mysqli_query($con, "INSERT INTO credit_comm VALUES('$ID', '$Fname', '$Lname', '$Mname', '$Email', '$Contact', '$pass', '1')")or die(msqli_errno());
                                $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                                $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                                $loadcredit = mysqli_query($con, "SELECT * FROM credit_comm ORDER BY Lname ")or die(mysqli_errno());
                                while($getcredit = mysqli_fetch_array($loadcredit)){
                                  echo "<tr>";
                                  echo "<td>" . $getcredit['CreditID'] . "</td>";
                                  echo "<td>" . $getcredit['Lname'] . ", " . $getcredit['Fname'] . " " . $getcredit['Mname'] . "</td>";
                                  echo "<td>" . $getcredit['Email'] . "</td>";
                                  echo "<td>" . $getcredit['Contact'] . "</td>";
                                  echo "</tr>";
                                }

                                $select = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());

                                $count = mysqli_num_rows($select);
                                //echo $count;
                                $totalpg = $count / 5;
                                $totalpg = ceil($totalpg);
                                echo "<nav aria-label='Page navigation'>";
                                echo "<ul class='pagination pagination-sm'>";
                                // for($ktr = 1; $ktr <= $totalpg; $ktr++){
                                //   echo "<li><a href='credit_settings.php?p=$ktr'>" . $ktr . "</a></li>";
                                // }
                                echo "</ul>";
                                echo "</nav>";
                              }

                            }else{
                              $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                              $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                              $loadcredit = mysqli_query($con, "SELECT * FROM credit_comm ORDER BY Lname")or die(mysqli_errno());
                              while($getcredit = mysqli_fetch_array($loadcredit)){
                                echo "<tr>";
                                echo "<td>" . $getcredit['CreditID'] . "</td>";
                                echo "<td>" . $getcredit['Lname'] . ", " . $getcredit['Fname'] . " " . $getcredit['Mname'] . "</td>";
                                echo "<td>" . $getcredit['Email'] . "</td>";
                                echo "<td>" . $getcredit['Contact'] . "</td>";
                                echo "</tr>";
                              }

                              $select = mysqli_query($con, "SELECT * FROM Accounts")or die(mysqli_errno());

                              $count = mysqli_num_rows($select);
                              //echo $count;
                              $totalpg = $count / 5;
                              $totalpg = ceil($totalpg);
                              echo "<nav aria-label='Page navigation'>";
                              echo "<ul class='pagination pagination-sm'>";
                              // for($ktr = 1; $ktr <= $totalpg; $ktr++){
                              //   echo "<li><a href='credit_settings.php?p=$ktr'>" . $ktr . "</a></li>";
                              // }
                              echo "</ul>";
                              echo "</nav>";
                            }
                          ?>
                          <!-- <tr>
                            <td>CREDIT-KMI201700001</td>
                            <td>Killian Maynard Toribio Ilao</td>
                            <td>kmi.cc@credit.com</td>
                            <td>09178250475</td>
                            <td><a class="btn btn-default">View Details</a></td>
                          </tr> -->
                        </table>
                      </div>
                      <div class="panel-footer"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCredit">Add Staff</button></div>
                    </div>

                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- CREDIT FORM -->
        <div class="modal fade" id="addCredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Staff</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="Fname" placeholder="Enter First Name" required>
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="Lname" placeholder="Enter Last Name" required>
                  </div>
                  <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="Mname" placeholder="Enter Middle Name" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email" placeholder="Enter Email Address" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact #</label>
                        <div class="input-group">
                          <span class="input-group-addon">+63</span>
                          <input type="number" name="Contact" class="form-control" placeholder="Contact #" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                          <input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <input type="submit" name="regCred" class="btn btn-primary" value="Register Staff">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END OF CREDIT FORM -->

        <!-- ADMIN FORM -->
        <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Add Admin</h4>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="Fname" placeholder="Enter First Name" required>
                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="Lname" placeholder="Enter Last Name" required>
                  </div>
                  <div class="form-group">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="Mname" placeholder="Enter Middle Name" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email" placeholder="Enter Email Address" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact #</label>
                        <div class="input-group">
                          <span class="input-group-addon">+63</span>
                          <input type="number" name="Contact" class="form-control" placeholder="Contact #" required>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <input type="submit" name="regAdm" class="btn btn-primary" value="Register Admin">
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END OF ADMIN FORM -->

      </div>
    </section>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
