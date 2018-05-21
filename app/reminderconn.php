<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>
<?php
require('connection.php');


if(isset($_POST['updateRem'])){

$rem_id  =   $_POST['rem_id'];
$ann  =   $_POST['ann'];

$connection->query("UPDATE announcement SET announcement = '".$ann."', date = now()  WHERE rem_id='$rem_id' ");


echo '<script type="text/javascript">';
     echo 'setTimeout(function () { 
       swal({
         title: "Announcement Updated",
         type: "success",
         showConfirmButton:false,
       });';
     echo '},);</script>';
     
     echo "<script>setTimeout(\"location.href = 'reminders.php';\",2000);</script>";
// header('location:reminders.php');

}


if(isset($_GET['deleterem'])){


  $rem_id = $_GET['deleterem'];
  
  $db = mysqli_connect("localhost","root","","special_project");
  $sql = "SELECT * FROM announcement where rem_id='$rem_id' ";
  $result = mysqli_query($db,$sql);
  while($row=mysqli_fetch_array($result)){

    
    // $username   = $row['username'];
    // $ann        = $row['announcement'];
    // $user_img   = $row['user_image'];
    // $date_posted   = $row['date'];
    // $name   = $row['name'];


    // $connection->query("DELETE FROM announcement WHERE rem_id='$rem_id' ");
    
    // $connection->query("INSERT INTO announcement_backup (rem_id, username, name, announcement, user_image,  date_posted, ann_delete_date, archive_ann ) VALUES ('$rem_id', '$username', '$name' , '$ann', '$user_img', '$date_posted' ,  now() ,'')");

    $connection->query("UPDATE announcement set archive_ann='Archive' where rem_id='$rem_id'");

    echo '<script type="text/javascript">';
     echo 'setTimeout(function () { 
       swal({
         title: "Announcement Deleted",
         type: "success",
         showConfirmButton:false,
       });';
     echo '},);</script>';
     
     echo "<script>setTimeout(\"location.href = 'reminders.php';\",2000);</script>";
  }
    

    // $rem_id = $_GET['deleterem'];

    // $connection->query("DELETE FROM announcement WHERE rem_id='$rem_id' ");

   
  


	// header('location:reminders.php');
}



if(isset($_GET['retrieve'])){


  $rem_id = $_GET['retrieve'];
 

   
    $connection->query("UPDATE announcement set archive_ann='' where rem_id='$rem_id'");

    echo '<script type="text/javascript">';
     echo 'setTimeout(function () { 
       swal({
         title: "Announcement Retrieve",
         type: "success",
         showConfirmButton:false,
       });';
     echo '},);</script>';
     
     echo "<script>setTimeout(\"location.href = 'archive.php';\",2000);</script>";
  }
    

    // $rem_id = $_GET['deleterem'];

    // $connection->query("DELETE FROM announcement WHERE rem_id='$rem_id' ");

   
  


	// header('location:reminders.php');


    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>