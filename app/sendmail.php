
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>

<?php

require('connection.php');


if(isset($_POST['sendemail'])){

    date_default_timezone_set("Asia/Manila");
    $dateNow = date('m-d-Y H:i:s');
    $datenow_OT = date('Y-m-d');
    $username = ''.$_POST["username"].'';
    $to = ''.$_POST["email"].'';
    $subject = ''.$_POST["subject"].'';
    $message = 
    'From: '.$_POST["name"].'
    Reason: '.$_POST["message"].' 
    When: 
            From: '.$datenow_OT.'----18:00
            To: '.$_POST["date_OT"].'---'.$_POST["time_OT"].'';

    $time_OT = ''.$_POST["time_OT"].'';
    $name = ''.$_POST["name"].'';
    $date_OT = ''.$_POST["date_OT"].'';
    $email_user = ''.$_POST["email_user"].'';
    $purpose_project = ''.$_POST["message"].'';
    $to_email = ''.$_POST["email"].'';
    $headers = 'From: aa4189412@gmail.com';
 
    if(mail($to,$subject,$message,$headers))

      $connection->query("INSERT INTO request_OT (username, name, datenow_OT, date_OT, time_in, time_out, purpose_project, status, verified_by, send_date, req_for_OT, to_email, email_user, archive_ot) 
      VALUES ('$username', '$name', '$datenow_OT', '$date_OT' ,'18:00:00','$time_OT:00', '$purpose_project','PENDING', '' ,'$dateNow','OVERTIME' , '$to_email', '$email_user', '')");

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
  
    date_default_timezone_set("Asia/Manila");
    $dateNow = date('m-d-Y H:i:s');
    $datenow_OT = date('Y-m-d');
    $username = ''.$_POST["username"].'';
    $to = ''.$_POST["email"].'';
    $subject = ''.$_POST["subject"].'';
    $message = 
    'From: '.$_POST["name"].'
    Reason: '.$_POST["message"].' 
    When: 
           From: '.$datenow_OT.'----18:00
           To: '.$_POST["date_OT"].'---'.$_POST["time_OT"].'';

    $time_OT = ''.$_POST["time_OT"].'';
    $name = ''.$_POST["name"].'';
    $date_OT = ''.$_POST["date_OT"].'';
    $email_user = ''.$_POST["email_user"].'';
    $purpose_project = ''.$_POST["message"].'';
    $to_email = ''.$_POST["email"].'';
    $headers = 'From: aa4189412@gmail.com';

    if(mail($to,$subject,$message,$headers))

        $connection->query("INSERT INTO request_OT (username, name, datenow_OT, date_OT, time_in, time_out, purpose_project, status, verified_by, send_date, req_for_OT, to_email, email_user, archive_ot) 
        VALUES ('$username', '$name', '$datenow_OT', '$date_OT' ,'18:00:00','$time_OT:00', '$purpose_project','PENDING', '' ,'$dateNow','OVERTIME' , '$to_email', '$email_user', '')");

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