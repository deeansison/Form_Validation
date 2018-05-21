
<?php
require('connection.php');
    // if(isset($_POST['add_inout'])){
        date_default_timezone_set("Asia/Manila");
        $dateNow = ''.$_POST["date_in_inout_in"].'';
        $datenow_OT = ''.$_POST["date_out_inout_in"].'';
        $time_in_inout = ''.$_POST["time_in_inout_in"].'';
        $time_out_inout = ''.$_POST["time_out_inout_in"].'';
        $username_mail = ''.$_POST["username_inout_in"].'';
        $to = ''.$_POST["email_inout_in"].'';
        $subject = 'REQUEST FOR ADDING TIME IN AND OUT';
        $message = 
        'From: '.$_POST["name_inout_in"].'
        Reason: '.$_POST["message_inout_in"].' 
        When: 
                From: '.$datenow_OT.'/'.$time_in_inout.'
                To: '.$datenow_OT.'/'.$time_out_inout.'';
                
            
        $headers = 'From: k.imc.corp@gmail.com';

        if(mail($to,$subject,$message,$headers))





    $username_inout   =   $_POST['username_inout_in'];
    $din   =   $_POST['date_in_inout_in'];
    $tin   =   $_POST['time_in_inout_in'];
    $time_out   =   $_POST['time_out_inout_in'];
    $date_out   =   $_POST['date_out_inout_in'];
    $message_inout   =   $_POST['message_inout_in'];
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

    $connection->query("UPDATE user_credentials set status='Out' where username='$username_inout' ");
    $connection->query("UPDATE time_in_out_backup set timeout='$time_out:00' ,dateout='$date_out', 
    totaldays='N/A',totalhrs='$hours',totalmins='$minutes',totalsecs='$seconds',status='Out',reason='$message_inout', add_in_out='PENDING'  
    where username='$username_inout' && status='On Work' "); 
}

if($message_inout!=''){

    $connection->query("UPDATE user_credentials set status='Out' where username='$username_inout' ");
    $connection->query("UPDATE time_in_out_backup set timeout='$time_out:00' ,dateout='$date_out', 
    totaldays='N/A',totalhrs='$hours',totalmins='$minutes',totalsecs='$seconds',status='OVERTIME',reason='$message_inout', add_in_out='PENDING'  
    where username='$username_inout' && status='On Work' "); 
}

    // $connection->query("INSERT INTO time_in_out_backup (username,timein,datein,timeout,dateout,totaldays,totalhrs,totalmins,totalsecs,status,reason,archive_tinout) 
    // VALUES ('$username_inout','$tin', '$din','$time_out:00','$date_out','N/A','$hours','$minutes','$seconds','Out','N/A','')");

?>


            

<!--   

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->