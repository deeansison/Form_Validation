<?php

try {
    $connection = new PDO('mysql:host=localhost;dbname=special_project', 'root', '');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEXCEPTION $e){
    die('There is an error in the database connection: '.$e->getMessage());
}

?>