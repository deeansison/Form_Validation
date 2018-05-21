<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>
<?php

require('connection.php');

  if(isset($_POST['sendemail'])){
    $username = ''.$_POST["username"].'';
    $to = ''.$_POST["email_wfh"].'';
    $subject = ''.$_POST["subject_wfh"].'';
    $message = 
    'From: '.$_POST["name_wfh"].'
    Reason: '.$_POST["message_wfh"].' 
    When Date: '.$_POST["date_wfh"].'
    From: '.$_POST["timein_wfh"].'
    To: '.$_POST["timeout_wfh"].'
    ';
    $email_user = ''.$_POST["email_user"].'';
    $timein_wfh = ''.$_POST["timein_wfh"].'';
    $timeout_wfh = ''.$_POST["timeout_wfh"].'';
    $name_wfh = ''.$_POST["name_wfh"].'';
    $date_wfh = ''.$_POST["date_wfh"].'';
    $purpose_project_wfh = ''.$_POST["message_wfh"].'';
    $to_email = ''.$_POST["email_wfh"].'';

    $headers = 'From: aa4189412@gmail.com';

    date_default_timezone_set("Asia/Manila");
    $dateNow = date('m-d-Y H:i:s');

    if(mail($to,$subject,$message,$headers))

      $connection->query("INSERT INTO request_wfh (username, name, date_wfh, timein_wfh, timeout_wfh, purpose_project_wfh, status, verified_by, send_date, req_for_wfh, to_email, email_user, archive_wfh) 
      VALUES ('$username', '$name_wfh','$date_wfh','$timein_wfh:00','$timeout_wfh:00', '$purpose_project_wfh','PENDING', '' ,'$dateNow','WORK FROM HOME', '$to_email', '$email_user', '')");

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { 
        swal({
          title: "Email Sent",
          type: "success",
          showConfirmButton:false,
        });';
      echo '},);</script>';
      echo "<script>setTimeout(\"location.href = 'adminvalidation.php';\",2000);</script>";
  }


  if(isset($_POST['sendemail-user'])){
    $username = ''.$_POST["username"].'';
    $to = ''.$_POST["email_wfh"].'';
    $subject = ''.$_POST["subject_wfh"].'';
    $message = 
    'From: '.$_POST["name_wfh"].'
    Reason: '.$_POST["message_wfh"].' 
    When Date: '.$_POST["date_wfh"].'
    From: '.$_POST["timein_wfh"].'
    To: '.$_POST["timeout_wfh"].'
    ';

    $email_user = ''.$_POST["email_user"].'';
    $timein_wfh = ''.$_POST["timein_wfh"].'';
    $timeout_wfh = ''.$_POST["timeout_wfh"].'';

    $name_wfh = ''.$_POST["name_wfh"].'';
    $date_wfh = ''.$_POST["date_wfh"].'';
    $purpose_project_wfh = ''.$_POST["message_wfh"].'';
    $to_email = ''.$_POST["email_wfh"].'';

    $headers = 'From: aa4189412@gmail.com';

    date_default_timezone_set("Asia/Manila");
    $dateNow = date('m-d-Y H:i:s');

    if(mail($to,$subject,$message,$headers))

      $connection->query("INSERT INTO request_wfh (username, name, date_wfh, timein_wfh, timeout_wfh, purpose_project_wfh, status, verified_by, send_date, req_for_wfh, to_email, email_user, archive_wfh) 
      VALUES ('$username', '$name_wfh','$date_wfh','$timein_wfh:00','$timeout_wfh:00', '$purpose_project_wfh','PENDING', '' ,'$dateNow','WORK FROM HOME', '$to_email', '$email_user', '')");

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { 
        swal({
          title: "Email Sent",
          type: "success",
          showConfirmButton:false,
        });';
      echo '},);</script>';
      echo "<script>setTimeout(\"location.href = 'user.php';\",2000);</script>";

  }


?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>