<?php

require('connection.php');
    $time_in   =   $_POST['time_in'];
    $date_in   =   $_POST['date_in'];
    $time_out   =   $_POST['time_out'];
    $date_out   =   $_POST['date_out'];
    $username   =   $_POST['username'];
    $statusform   =   $_POST['statusform'];

    $connection->query("INSERT INTO t_in_out (time_in,date_in,time_out,date_out,total_days,total_hrs,total_min,total_sec,username,statusform) VALUES ('$time_in', '$date_in', '---','---','---','---','---','---','$username','On Work')");
    $connection->query("UPDATE user_credentials set status='On Work' where username='$username' ");


    


?>