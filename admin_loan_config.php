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
      include 'connect.php';
      $ID = $_SESSION['ID'];
      if(empty($_SESSION['ID'])){
        header("location:login.php");
      }
      $searchadmin = mysqli_query($con, "SELECT * FROM Admin WHERE AdminID = '$ID'")or die(mysqli_errno());
      while($getadmininfo = mysqli_fetch_array($searchadmin)){
        $Fname = $getadmininfo['Fname'];
        $_SESSION['Name'] = $Fname;
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
          <a class="navbar-brand" href="#">HOSCOMCO</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="admin_panel.php">Dashboard</a></li>
            <li><a href="admin_inventory.php">E-Shop Inventory</a></li>
            <li><a href="admin_po_monitoring.php">Purchase Order Monitoring</a></li>
            <li><a href="admin_user_profiling.php">User Profiling</a></li>
            <li><a href="admin_log.php">Log Book</a></li>
            <li class="active"><a href="admin_settings_staff.php">Settings</a></li>
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
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Admin Dashboard</h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Settings >> Loan Configuration</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="admin_loan_config.php">Loan Configuration</a></li>
          <li role="presentation"><a href="admin_settings_staff.php?AdminID=$ID">Staff Members</a></li>
        </ul>

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="prof">
            <form method="post" action="update_info.php">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Loan Configuration</h3>
                </div>
                <div class="panel-body">
                  <div class="panel-body">

                    <table class="table table-bordered table-condensed table-hover">
                      <tr class="text-center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Loan Percentage</th>
                        <th>Increase Loan %</th>
                        <th>Decrease Loan %</th>
                      </tr>
                      <?php
                        $p = (empty($_REQUEST['p'])) ? 0 : $_REQUEST['p'];

                        $lim = ($p == 1 || $p =="") ? 0 : ($p*5)-5;

                        $loadconfig = mysqli_query($con, "SELECT accounts.RegID, accounts.Fname, accounts.Lname, loan_config.l_conf, loan_config.l_perc, loan_set.ls_conf, loan_set.RegID FROM accounts INNER JOIN loan_set ON loan_set.RegID=accounts.RegID INNER JOIN loan_config ON loan_config.l_conf=loan_set.ls_conf ORDER BY loan_set.ls_conf LIMIT ".$lim.",5 ")or die(mysqli_errno());

                        while($getconfig = mysqli_fetch_array($loadconfig)){
                          $ID = $getconfig['RegID'];
                          $loanperc = $getconfig['l_perc'] * 100;
                          echo "<tr class='text-center'>";
                          echo "<td>" . $getconfig['RegID'] . "</td>";
                          echo "<td>" . $getconfig['Fname'] . " " . $getconfig['Lname'] . "</td>";
                          echo "<td>" . $loanperc . "%</td>";
                          if($getconfig['ls_conf'] == 1){
                            echo "<td><a class='btn btn-success' href='incloan.php?RegID=$ID&ls_conf=".$getconfig['ls_conf']."'><span class='glyphicon glyphicon-arrow-up'><span></a></td>";
                            echo "<td><a class='btn btn-danger' href='decloan.php?RegID=$ID&ls_conf=".$getconfig['ls_conf']."' disabled><span class='glyphicon glyphicon-arrow-down'><span></a></td>";
                          }else if($getconfig['ls_conf'] == 19){
                            echo "<td><a class='btn btn-success' href='incloan.php?RegID=$ID&ls_conf=".$getconfig['ls_conf']."' disabled><span class='glyphicon glyphicon-arrow-up'><span></a></td>";
                            echo "<td><a class='btn btn-danger' href='decloan.php?RegID=$ID&ls_conf=".$getconfig['ls_conf']."'><span class='glyphicon glyphicon-arrow-down'><span></a></td>";
                          }else{
                            echo "<td><a class='btn btn-success' href='incloan.php?RegID=$ID&ls_conf=".$getconfig['ls_conf']."'><span class='glyphicon glyphicon-arrow-up'><span></a></td>";
                            echo "<td><a class='btn btn-danger' href='decloan.php?RegID=$ID&ls_conf=".$getconfig['ls_conf']."'><span class='glyphicon glyphicon-arrow-down'><span></a></td>";
                          }

                          echo "</tr>";
                        }

                        $select = mysqli_query($con, "SELECT * FROM loan_set")or die(mysqli_errno());

                        $count = mysqli_num_rows($select);
                        //echo $count;
                        $totalpg = $count / 5;
                        $totalpg = ceil($totalpg);
                        echo "<nav aria-label='Page navigation'>";
                        echo "<ul class='pagination pagination'>";
                        for($ktr = 1; $ktr <= $totalpg; $ktr++){
                          echo "<li><a href='admin_loan_config.php?p=$ktr'>" . $ktr . "</a></li>";
                        }
                        echo "</ul>";
                        echo "</nav>";

                      ?>
                    </table>

                  </div>
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
