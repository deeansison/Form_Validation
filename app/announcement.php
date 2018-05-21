<?php

    require('connection.php');
    $username   = $_POST['username'];
    $ann        = $_POST['ann'];
    $user_img   = $_POST['user_img'];
    $name_emp   = $_POST['name_emp'];
    $anncode  =   uniqid();
    $connection->query("INSERT INTO announcement (rem_id, name, username, announcement, user_image, date, archive_ann ) VALUES ('$anncode','$name_emp','$username', '$ann', '$user_img', now(), '' )");

?>