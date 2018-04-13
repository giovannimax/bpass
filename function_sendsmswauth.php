<?php
    include 'connect.php';

     $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 25);
    $authcode = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);


    $ID = $_SESSION['ID'];
    $AuthCode = $authcode;//$_SESSION['AUTHCODE'];
    $select = mysqli_query($con, "SELECT * FROM Accounts WHERE RegID = '$ID'")or die(mysqli_error());

    while($get = mysqli_fetch_array($select)){
      $contact = $get['Contact'];
    }

    // Start of SMS Message
    $msg = "Your authorization code is: " . $authcode;
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 25);
    $arr_post_body = array(
        "message_type" => "SEND",
        "mobile_number" => $contact,
        "shortcode" => "29290 44149",
        "message_id" => $randomString,
        "message" => "test abc",
        "client_id" => "7098cdcca1c55cc0137ed588f56bce6ce47c7e4bd29f4dbfbe6e21708dad60d3",
        "secret_key" => "6d69fb1b00e52fe5a6e0441c91b6e5590fe56b7322709f5aedd8b65ae673a5b8"
    );

    $query_string = "";
    foreach($arr_post_body as $key => $frow)
    {
        $query_string .= '&'.$key.'='.$frow;
    }

    $URL = "https://rest.nexmo.com/sms/api/";

    $curl_handler = curl_init();
    curl_setopt($curl_handler, CURLOPT_URL, $URL);
    curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
    curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
    curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($curl_handler);
    curl_close($curl_handler);

    header("location:auth_code_ver.php");
    echo "<script>alert('Success! SMS Sent');window.location.href='auth_code_ver.php';</script>";
    exit(0);
    // End of SMS message


    // Start of Message Notification
     try
    {
     $message_type = $_POST["message_type"];
     }
 catch (Exception $e)
    {
     echo "Error";
       exit(0);
     }
   
    if (strtoupper($message_type) == "OUTGOING")
    {
    try
     {
      // Retrieve the parameters from the body
     $message_id = $_POST["message_id"];
  $mobile_number = $_POST["mobile_number"];
     $shortcode = $_POST["shortcode"];
     $status = $_POST["status"];
     $timestamp = $_POST["timestamp"];
    $credits_cost = $_POST["credits_cost"];
    echo "Accepted";
        exit(0);
       }
     catch (Exception $e)
   {
      echo "Error";
         exit(0);
     }
   }
   else
    {
    echo "Error";
     exit(0);
     }
  
    // // End of Message Notification
?>
