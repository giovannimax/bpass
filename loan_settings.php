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
          <li class="active">Settings >> Loan Settings</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <ul class="nav nav-tabs" role="tablist">
          <!-- <li role="presentation" class="active"><a href="#">Staff Members</a></li> -->
        </ul>

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="prof">
          <!--   <form method="post" action="update_info.php"> -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Loan Settings</h3>
                </div>
                <div class="panel-body">
                  <div class="panel-body">

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">Select interest percentage</h3>
                      </div>
                      <div class="panel-body">
                        <form method="POST">
                        <div class="col-md-6">
                        <label>
                          Weekly
                        </label>
                        <select name="personalpercent" class="form-control">
                        <?php
                          $int;
                          $result= mysqli_query($con,"SELECT * FROM interest WHERE intID = '1'")or die (mysqli_error());
                          while($row=mysqli_fetch_array($result)){
                            $int=$row['percent'];
                          }
             
                          for($i=1;$i<=10;$i++){
                             if($int==$i)
                            echo '<option value='.$i.' selected>'.$i.'%</option>';
                          else
                            echo '<option value='.$i.'>'.$i.'%</option>';
                          }

                        ?>
                        </select>
                      </div>
                       <div class="col-md-6">
                        <label>
                          Monthly
                        </label>
                        <select name="buspercent" class="form-control  ">
                        <?php
                          $int;
                          $result= mysqli_query($con,"SELECT * FROM interest WHERE intID = '2'")or die (mysqli_error());
                          while($row=mysqli_fetch_array($result)){
                            $int=$row['percent'];
                          }
             
                          for($i=1;$i<=10;$i++){
                             if($int==$i)
                            echo '<option value='.$i.' selected>'.$i.'%</option>';
                          else
                            echo '<option value='.$i.'>'.$i.'%</option>';
                          }

                        ?>
                        </select>
                      </div>
                    </div>
                      <div class="panel-footer"><input type="submit" name="save" value="Save" class="btn btn-primary"></div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>

        <?php
        if(!empty($_POST)){
          $busi = $_POST['buspercent'];
          $emert = $_POST['emerpercent'];
          $person = $_POST['personalpercent'];
          //echo "UPDATE interest SET percent = '$busi' WHERE intID = '2'";
          mysqli_query($con,"UPDATE interest SET percent = '$busi' WHERE intID = '2'")or die (mysqli_error());
          mysqli_query($con,"UPDATE interest SET percent = '$emert' WHERE intID = '3'")or die (mysqli_error());
          mysqli_query($con,"UPDATE interest SET percent = '$person' WHERE intID = '1'")or die (mysqli_error());
          header("Location: loan_settings.php");
        }
        ?>

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
