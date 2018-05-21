<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>

<?php
require('connection.php');

if(isset($_GET['retrieve'])){


    $username = $_GET['retrieve'];
    
    $db = mysqli_connect("localhost","root","","special_project");
    $sql = "SELECT * FROM user_credentials where username='$username' ";
    $result = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($result)){

      $sql= "UPDATE announcement set archive_ann='' where username='$username'";
      $sql1= "UPDATE time_in_out_backup set archive_tinout='' where username='$username'";
      $sql2= "UPDATE request_leave set archive_leave='' where username='$username'";
      $sql3= "UPDATE request_ot set archive_ot='' where username='$username'";
      $sql4= "UPDATE request_wfh set archive_wfh='' where username='$username'";
      $sql5= "UPDATE user_credentials set archive='' where username='$username'";

      mysqli_query($db,$sql);
      mysqli_query($db,$sql1);
      mysqli_query($db,$sql2);
      mysqli_query($db,$sql3);
      mysqli_query($db,$sql4);
      mysqli_query($db,$sql5);

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { 
        swal({
          title: "Employee Retrieve",
          type: "success",
          showConfirmButton:false,
        });';
      echo '},);</script>';
      
      echo "<script>setTimeout(\"location.href = 'archive.php';\",2000);</script>";
  }

}

    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>