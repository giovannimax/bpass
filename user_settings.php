  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Loan Application</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

    <script type="text/javascript">
      function ShowEnHidePass(){
        var anonBtn = document.getElementById("anonbtn");
        var anonLogo = document.getElementById("anon");
        var Password = document.getElementById("password");

        if(Password.type === "password"){
          anonLogo.className = "glyphicon glyphicon-eye-open";
          Password.type = "text";
        }else if(Password.type === "text"){
          anonLogo.className = "glyphicon glyphicon-eye-close";
          Password.type = "password";
        }

      }
    </script>
  </head>
  <body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
    <?php
   include("userheader.php");

     $select = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$ID'")or die(mysqli_error());
     while($getinfo = mysqli_fetch_array($select)){
       $Fname = $getinfo['Fname'];
       $Mname = $getinfo['Mname'];
       $Lname = $getinfo['Lname'];
       $Uname = $getinfo['Uname'];
       $Pword = $getinfo['Pword'];
       $MemDate = $getinfo['MemDate'];
       $Email = $getinfo['Email'];
       $Contact = $getinfo['Contact'];
      
     }

    
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


    <section id="main">
      <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#prof" aria-controls="prof" role="tab" data-toggle="tab">Profile</a></li>
          <li role="presentation"><a href="#sec" aria-controls="sec" role="tab" data-toggle="tab">Security</a></li>
          <li role="presentation"><a href="user_panel.php">Go Back</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="prof">
            <form method="post" action="update_info.php">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Information</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="Fname" value="<?php echo $Fname; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="Mname" value="<?php echo $Mname; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="Lname" value="<?php echo $Lname; ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Membership Date</label>
                        <input type="date" class="form-control" name="Uname" value="<?php echo $MemDate; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" class="form-control" name="Uname" value="<?php echo $Email; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Contact #</label>
                        <input type="number" class="form-control" name="Uname" value="<?php echo $Contact; ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div role="tabpanel" class="tab-pane" id="sec">
            <form method="post" action="update_sec.php">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Security</h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="Uname" value="<?php echo $ID; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Userame</label>
                        <input type="text" class="form-control" name="Uname" value="<?php echo $Uname; ?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                          <input id="password" type="password" class="form-control" name="Pword" value="<?php echo $Pword; ?>" readonly>
                          <span class="input-group-btn">
                            <button type="button" class="btn btn-default" onclick="ShowEnHidePass()" id="anonbtn"><span id="anon" class="glyphicon glyphicon-eye-close"></span></button>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr>

                 
                </div>
              </div>
            </form>
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
