<?php

    require('connection.php');
    $username   = $_POST['username'];
    $ann        = $_POST['ann'];
    $user_img   = $_POST['user_img'];

    $connection->query("INSERT INTO announcement (username, announcement, user_image ) VALUES ('$username', '$ann', '$user_img')");

?>