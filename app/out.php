<?php
require('connection.php');
    $time_out   =   $_POST['time_out'];
    $date_out   =   $_POST['date_out'];
    $username   =   $_POST['username'];

    $connection->query("UPDATE t_in_out set time_out='$time_out' , date_out='$date_out' , statusform='Out' where username='$username' && statusform='On Work'");
    $connection->query("UPDATE user_credentials set status='Out' where username='$username' ");
    
?>