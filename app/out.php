<?php
require('connection.php');

$time_out   =   $_POST['time_out'];
$date_out   =   $_POST['date_out'];
$username   =   $_POST['username'];
$tin   =   $_POST['tin'];
$din   =   $_POST['din'];

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


  $connection->query("UPDATE user_credentials set status='Out' where username='$username' ");
  $connection->query("UPDATE time_in_out_backup set timeout='$time_out' ,dateout='$date_out', 
  totaldays='N/A',totalhrs='$hours',totalmins='$minutes',totalsecs='$seconds',status='Out',reason='N/A' 
  where username='$username' && status='On Work' "); 
 
?>

