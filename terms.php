<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>BPASS Online Management System | Registration</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
  .navbar{
    margin-bottom:0;
    border-radius:0;
  }
</style>
</head>

<body style="background:url(images/9.jpg) no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">
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
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <div class="container">
    <h2 class="page-header text-center" style="color: white;"> Terms and Conditions </h2>
  </div>

  <div class="container">
    <?php
    include 'connect.php';
   

    function itexmo($number,$message,$apicode){
      $ch = curl_init();
      $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
      curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($itexmo));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      return curl_exec ($ch);
      curl_close ($ch);
    }
    if(isset($_POST['Register'])){
      $Fname = $_POST['fname'];
      $Lname = $_POST['lname'];
      $Mname = $_POST['mname'];
      $Gender = $_POST['gender'];
      $Email = $_POST['email'];
      $Contact = $_POST['contact'];
      $Address = $_POST['address'];
      $Pword = $_POST['pword'];
      $CPword = $_POST['cpword'];
      $DOB = $_POST['dob'];
      $soi = $_POST['soi'];
      $PBNO = $_POST['pbno'];
      $coll = $_POST['coll'];
      $verify = 0;
      $qid1 = 1;
      $qid2 = 2;

      $Uname = $Fname . $Lname;

          //Search if exists
      $searchacc = mysqli_query($con, "SELECT * FROM accounts WHERE Fname = '$Fname' AND Lname = '$Lname' AND Mname = '$Mname'")or die(mysqli_errno());
      $resacc = mysqli_num_rows($searchacc);
          //End of search

          //Search Email and Contact
      $searchin = mysqli_query($con, "SELECT * FROM accounts WHERE Email = '$Email' OR Contact = '$Contact'")or die(mysqli_errno());
      $resin = mysqli_num_rows($searchin);
          //End of Search

          //Get age
      $age = date_diff(date_create($DOB), date_create('today'))->y;
          //End of get age
      // echo $age;

      if($age < 18 || $age > 60){
        echo "<div class='alert alert-warning' role='alert'>Your age is not qualified in registering in the cooperatives</div>";
      }else if($CPword != $Pword){
        echo "<div class='alert alert-warning' role='alert'>Password does not match</div>";
      }else if($resacc > 0){
        echo "<div class='alert alert-warning' role='alert'>Account name already taken</div>";
      }else if($resin > 0){
        echo "<div class='alert alert-warning' role='alert'>Mobile #/Email already taken</div>";
      }else{
            //Generate ID w/insertion & SMS Msg
        $cnt = mysqli_query($con, "SELECT * FROM accounts")or die(mysqli_errno());
        $res = mysqli_num_rows($cnt);
        $year = date("Y");
        $code =strtoupper(substr(md5($Uname), 0, 5));
        $hash =md5($Uname);
        $con = new mysqli("localhost", "root", "", "hoscomo");

        if($res > 0){
          $var1 = 1 + ($year * 100000);
          $IDNum = $var1 + $res;
          $ID = $Fname[0] . $Lname[0] . (string)$IDNum;
          }
          $today = date("Y-m-d");
          mysqli_query($con, "INSERT INTO accounts (RegID, Fname, Lname, Mname, Uname, Pword, MemDate, DOB, Address, Contact, Email, Gender, SOI, PBNO,collateral, code, verify, QIDone, QIDtwo) VALUES('$ID', '$Fname', '$Lname', '$Mname', '$Uname', '$Pword', '$today', '$DOB', '$Address', '$Contact', '$Email', '$Gender', '$soi', '$PBNO','$coll','$code', $verify, $qid1, $qid2)");

           $_SESSION['id'] = $ID;
          itexmo($Contact,"Your BPASS verification code is ".$code,"TR-ARMYL862372_WTV47");
                  header("location: auth_code_ver.php");

        //   if($register){
        //     echo "Successfully added!";
        //   } else {
        //     echo "Error: <br>" . mysqli_error($con);
        //   }
        //   $insertshares = mysqli_query($con, "INSERT INTO Membership_fundnshare VALUES('$ID', '0000.00', '0000.00', '0000.00', '0000.00', '0000.00')");

         
        //   echo "<div class='alert alert-success' role='alert'>Registration successful. Please check your SMS</div>";
        //   header("location:auth_code_ver.php");
        // else{
        //   $ID = $Fname[0] . $Lname[0] . (string)$year . "00001";

        //   $today = date("Y-m-d");

        //   $register = mysqli_query($con, "INSERT INTO accounts (RegID, Fname, Lname, Mname, Uname, Pword, MemDate, DOB, Address, Contact, Email, Gender, PBNO, code) VALUES('$ID', '$Fname', '$Lname', '$Mname', '$Uname', '$Pword', '$today', '$DOB', '$Address', '$Contact', '$Email', '$Gender', '$SOI', '$PBNO', '$code')")or die(mysqli_errno());


        //    itexmo($Contact,"Your BPASS verification code is ".$code,"TR-GIOVA948358_56KHG");
        //           header("location: auth_code_ver.php");


        //   $insertshares = mysqli_query($con, "INSERT INTO Membership_fundnshare VALUES('$ID', '0000.00', '0000.00', '0000.00', '0000.00', '0000.00')")or die(mysqli_errno());

        }
      }
    
    ?>
    </div>

    <div class="container">
      <div class="well well-lg">
        <ol>
        <li> The association can recruit a farmer to become their member without questioning their belief or religion, with the age of 20 years old and above who are willing to be a member of the association.</li>
        <li> Those who want to be a member must join the General Assembly in order to tell his/her purpose in joining the association. Those interested to become a member must sign the application form upon registration.</li>
        <li> A member must attend the regular meetings,and pay the membership fees and the monthly dues.</li>
        <li> The member must pay 100 pesos in every absences in regular meetings as their penalty.</li>
        <li> Forum-  there will be a forum if half of the members  of the association are present  in attending the meeting.</li>
        <li> The member has the right to attend the meetings of the association, to join and interact with the discussion every meeting and to attend urgent meetings if there is. The members must also pay 100 pesos for the registration fee.</li>
       <li> Loan - 5℅ interest will be given for those member who has a monthly loan and 3% interest for weekly loans.</li>
        <li> The loan will be due in three months and failure to pay within due date will generate an additional payment of 10 pesos everyday.</li>
        <ol>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    function showindows() {
    var myWindow = window.open("terms.php", "_blank", "width=200,height=100");
}
  </script>
  </html>