<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>

<?php

require('connection.php');

  if(isset($_POST['sendemail'])){
    $username = ''.$_POST["username"].'';
    $to = ''.$_POST["email_leave"].'';
    $subject = ''.$_POST["subject_leave"].'';
    $message = 
    'From: '.$_POST["name_leave"].'
    Reason: '.$_POST["message_leave"].' 
    Start Date: '.$_POST["start_date"].'
    End Date: '.$_POST["end_date"].'
    ';
    $email_user = ''.$_POST["email_user"].'';
    $start_date = ''.$_POST["start_date"].'';
    $name_leave = ''.$_POST["name_leave"].'';
    $end_date = ''.$_POST["end_date"].'';
    $purpose_project_leave = ''.$_POST["message_leave"].'';
    $to_email = ''.$_POST["email_leave"].'';
    $headers = 'From: aa4189412@gmail.com';

    date_default_timezone_set("Asia/Manila");
    $dateNow = date('m-d-Y H:i:s');

    if(mail($to,$subject,$message,$headers))

      $connection->query("INSERT INTO request_leave (username, name, start_leave, end_leave, purpose_project_leave, status, verified_by, send_date, req_for_leave, to_email, email_user, archive_leave) 
      VALUES ('$username', '$name_leave','$start_date','$end_date', '$purpose_project_leave','PENDING', '' ,'$dateNow','ON LEAVE', '$to_email', '$email_user', '')");

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
    $to = ''.$_POST["email_leave"].'';
    $subject = ''.$_POST["subject_leave"].'';
    $message = 
    'From: '.$_POST["name_leave"].'
    Reason: '.$_POST["message_leave"].' 
    Start Date: '.$_POST["start_date"].'
    End Date: '.$_POST["end_date"].'
    ';

    $email_user = ''.$_POST["email_user"].'';
    $start_date = ''.$_POST["start_date"].'';
    $name_leave = ''.$_POST["name_leave"].'';
    $end_date = ''.$_POST["end_date"].'';
    $purpose_project_leave = ''.$_POST["message_leave"].'';
    $to_email = ''.$_POST["email_leave"].'';
    $headers = 'From: aa4189412@gmail.com';

    date_default_timezone_set("Asia/Manila");
    $dateNow = date('m-d-Y H:i:s');

    if(mail($to,$subject,$message,$headers))

      $connection->query("INSERT INTO request_leave (username, name, start_leave, end_leave, purpose_project_leave, status, verified_by, send_date, req_for_leave, to_email, email_user, archive_leave) 
      VALUES ('$username', '$name_leave','$start_date','$end_date', '$purpose_project_leave','PENDING', '' ,'$dateNow','ON LEAVE', '$to_email', '$email_user', '')");

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