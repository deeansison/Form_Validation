<?php
require('connection.php');


if(isset($_POST['updateRem'])){

$rem_id  =   $_POST['rem_id'];
$ann  =   $_POST['ann'];

$connection->query("UPDATE announcement SET announcement = '".$ann."'
WHERE rem_id='$rem_id' ");


header('location:reminders.php');

}
if(isset($_GET['deleterem'])){

    $rem_id = $_GET['deleterem'];

 
    $db = mysqli_connect("localhost","root","","special_project");
	$result = mysqli_query($db,"SELECT * FROM announcement WHERE rem_id=$rem_id");
	$row = mysqli_fetch_array($result);


     $sql= "DELETE FROM announcement where rem_id='$rem_id'";
 	mysqli_query($db, $sql);


	header('location:reminders.php');
}

    ?>