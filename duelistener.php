<?php
include("connect.php");

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
?>

<table border="2px">
  <tr>
    <td>
      LoanID
    </td>
    <td>
      RegID
    </td>
    <td>
     Date
    </td>
    <td>
      Due Date
    </td>
    <td>
      is Due
    </td>
  </tr>

<?php

  $loans = mysqli_query($con, "SELECT * FROM loan")or die(mysqli_error());
                  while($row = mysqli_fetch_array($loans)){
                $date = date("Y-m-d", strtotime($row['date']));
                $regid = $row['RegID'];
                $loanid = $row['LoanID'];
                $duedate = strtotime(date("Y-m-d")) - strtotime($date);
                $Contact = "";
                //$todate = strtotime(date("Y-m-d"));
$userinfo = mysqli_query($con, "SELECT * FROM accounts WHERE RegID = '$regid'")or die(mysqli_error());
                  while($roww = mysqli_fetch_array($userinfo)){
                  $Contact = $roww['Contact'];
      }
                echo "<tr>";
                echo "<td>".$loanid."</td>";
                echo "<td>".$regid."</td>";
                echo "<td>".$date."</td>";
                echo "<td>". date("Y-m-d",strtotime($date."+90 days"))."</td>";
                if(strtotime(date("Y-m-d"))===strtotime($date."+90 days")){
                  echo "<td>Yes</td>";
                  if($row['duesent']==0){
                    $sms = "LoanID: $loanid. Your loan will be due tomorrow (".date("F d, Y",strtotime(date("Y-m-d")."+1 day")).").";
                    itexmo($Contact,$sms,"TR-ARMYL862372_WTV47");

                   mysqli_query($con, "UPDATE loan SET duesent = 1 WHERE LoanID = '$loanid'")or die(mysqli_error());
             
                  }
              }else {
                  echo "<td>No</td>";
                }
                echo "</tr>";
          }


    $url1=$_SERVER['REQUEST_URI'];
    header("Refresh: 5; URL=$url1");

?>

</table>
