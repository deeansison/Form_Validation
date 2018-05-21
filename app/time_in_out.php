<?php

require('connection.php');
    $time_in   =   $_POST['time_in'];
    $date_in   =   $_POST['date_in'];
    $time_out   =   $_POST['time_out'];
    $date_out   =   $_POST['date_out'];
    $username   =   $_POST['username'];
    $statusform   =   $_POST['statusform'];

    $connection->query("UPDATE user_credentials set status='On Work' where username='$username' ");

    $connection->query("INSERT INTO time_in_out_backup (username,timein,datein,timeout,dateout,totaldays,totalhrs,totalmins,totalsecs,status,reason, archive_tinout, add_in_out) 
    VALUES ('$username','$time_in', '$date_in','---','---','---','---','---','---','On Work','---', '', '')");


?>