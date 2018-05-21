
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title> -->

<?php

require('connection.php');


// if(isset($_POST['add_inout'])){

        date_default_timezone_set("Asia/Manila");
        $dateNow = ''.$_POST["date_in_inout"].'';
        $datenow_OT = ''.$_POST["date_out_inout"].'';
        $time_in_inout = ''.$_POST["time_in_inout"].'';
        $time_out_inout = ''.$_POST["time_out_inout"].'';
        $username_mail = ''.$_POST["username_inout"].'';
        $to = ''.$_POST["email_inout"].'';
        $subject = 'REQUEST FOR ADDING TIME IN AND OUTs';
        $message = 
        'From: '.$_POST["name_inout"].'
        Reason: '.$_POST["message_inout"].' 
        When: 
                From: '.$datenow_OT.'/'.$time_in_inout.'
                To: '.$datenow_OT.'/'.$time_out_inout.'';
                
            
        $headers = 'From: k.imc.corp@gmail.com';

        if(mail($to,$subject,$message,$headers))

$username_inout   =   $_POST['username_inout'];
$din   =   $_POST['date_in_inout'];
$tin   =   $_POST['time_in_inout'];
$time_out   =   $_POST['time_out_inout'];
$date_out   =   $_POST['date_out_inout'];
$message_inout   =   $_POST['message_inout'];
$date1 = $din; 
$time1 = $tin;
$date2 = $date_out; 
$time2 = $time_out;
 

$before = strtotime($date1 . " " . $time1);
$after = strtotime($date2 . " " . $time2);
$diff = $after - $before;

$hours = floor($diff / 3600);
$minutes = floor(($diff - $hours * 3600) / 60);
$seconds = $diff - $hours * 3600 - $minutes * 60;




if($message_inout==''){
    $connection->query("INSERT INTO time_in_out_backup (username,timein,datein,timeout,dateout,totaldays,totalhrs,totalmins,totalsecs,status,reason,archive_tinout,add_in_out) 
    VALUES ('$username_inout','$tin:00', '$din','$time_out:00','$date_out','N/A','$hours','$minutes','$seconds','Out','$message_inout','', 'PENDING')");
}


if($message_inout!=''){
        $connection->query("INSERT INTO time_in_out_backup (username,timein,datein,timeout,dateout,totaldays,totalhrs,totalmins,totalsecs,status,reason,archive_tinout,add_in_out) 
        VALUES ('$username_inout','$tin:00', '$din','$time_out:00','$date_out','N/A','$hours','$minutes','$seconds','OVERTIME','$message_inout','', 'PENDING')");
    }
// echo '<script type="text/javascript">';
// echo 'setTimeout(function () { 
// swal({
//   title: "Email Sent",
//   type: "success",
//   showConfirmButton:false,
// });';
// echo '},);</script>';

// echo "<script>setTimeout(\"location.href = 'adminvalidation.php';\",2000);</script>";
// }
?>

