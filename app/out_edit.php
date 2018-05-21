<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>
<?php
require('connection.php');

if(isset($_POST['button_out'])){
$time_out   =   $_POST['time_out'];
$date_out   =   $_POST['date_out'];
$username   =   $_POST['username'];
$status_emp = $_POST['status_emp'];
$inoutid = $_POST['inoutid'];
$tin   =   $_POST['tin'];
$din   =   $_POST['din'];
$reason   =   $_POST['reason'];
$date1 = $din; 
$time1 = $tin;
$date2 = $date_out; 
$time2 = $time_out;
 

$before = strtotime($date1 . " " . $time1);
$after = strtotime($date2 . " " . $time2);
$diff = $after - $before;

// $days_between = floor(abs($end - $start) / 86400);
$hours = floor($diff / 3600);
$minutes = floor(($diff - $hours * 3600) / 60);
$seconds = $diff - $hours * 3600 - $minutes * 60;


 if($reason==''){
    $connection->query("UPDATE time_in_out_backup set datein='$din', timein='$tin', timeout='$time_out' ,dateout='$date_out', 
    totaldays='N/A',totalhrs='$hours',totalmins='$minutes',totalsecs='$seconds',status='$status_emp',reason='N/A' , add_in_out=''
    where inout_ID='$inoutid' "); 
   
 }

 if($reason!=''){
    $connection->query("UPDATE time_in_out_backup set datein='$din', timein='$tin', timeout='$time_out' ,dateout='$date_out', 
    totaldays='N/A',totalhrs='$hours',totalmins='$minutes',totalsecs='$seconds',status='$status_emp',reason='$reason' , add_in_out=''
    where inout_ID='$inoutid' "); 
   
 }

 echo '<script type="text/javascript">';
 echo 'setTimeout(function () { 
     swal({
         title: "Employee Time In/Out Added",
         type: "success",
         showConfirmButton:false,
     });';
 echo '},);</script>';
 
echo "<script>setTimeout(\"location.href = 'time_in_out_edit.php';\",2000);</script>";

}



if(isset($_POST['button_out_reject'])){


    date_default_timezone_set("Asia/Manila");

    $to = ''.$_POST["email_emp"].'';
    $subject = 'REQUEST FOR ADDING TIME IN AND OUT';
    $message = 
    'YOUR REQUEST FOR TIME IN AND OUT HAS BEEN REJECTED FOR SOME REASONS, PLEASE RE-SEND IT AGAIN, THANKYOU';
            
        
    $headers = 'From: k.imc.corp@gmail.com';

    if(mail($to,$subject,$message,$headers))

    $inoutid = $_POST['inoutid'];
    $connection->query("DELETE FROM time_in_out_backup where inout_ID='$inoutid' "); 
   

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { 
        swal({
            title: "Employee Time In/Out REJECTED",
            type: "error",
            showConfirmButton:false,
        });';
    echo '},);</script>';
    
   echo "<script>setTimeout(\"location.href = 'time_in_out_edit.php';\",2000);</script>";
   

}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>