<?php
    include('connection.php');
    include('insert.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">
    <link rel="stylesheet" href="assets/css/reminders.css">
    <link rel="stylesheet" href="assets/css/scroll.css">

    <link rel="stylesheet" href="assets/css/welcome.css">
    
       
    <link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />

    <title>Kestrel-IMC</title>

</head>

<body onload="startTime()">

<!-- HEADER -->
<header>

    <!-- FOR ICON -->
    <div class="icon-bar-ann">
        <a href="reminders.php" ><p id="bck-ann">BACK</p><i class='fa fa-arrow-left faa-horizontal animated'></i></a> 
        <!-- <a href="logout.php" ><p id="lgout-ann">LOGOUT</p><i class='fa fa-sign-out'></i></a>  -->
    </div>
    <!-- END/FOR ICON -->

    <!-- FOR CLOCK -->
    <div id="clockdate">
    <div class="clockdate-wrapper">
        <div id="clock"></div>
        <div id="date"></div>
        <h6><i class="fa fa-map-marker"></i> Edit Announcement</h6>
    </div>
    </div>
    <!-- END/FOR CLOCK -->

    <!-- FOR LOGO -->
    <div class="logo-ann">
        <img src="assets/img/kestrellogo.png" alt="">
    </div>
    <!-- END/FOR LOGO -->
    
    <!-- SESSION -->
    <?php
        include('connection.php');
        session_start();      
        if(isset($_SESSION["password"]) && ($_SESSION["position"]=='Admin')){ 
            $uname = $_SESSION["username"];
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT user_image, first_name FROM user_credentials where username='$uname' ";
            $result = mysqli_query($db,$sql);
                        
            while($row=mysqli_fetch_array($result)){
                echo'<input id="user_img" name="user_img" type="hidden" class="form-control" value="'.$row["user_image"].'" > ';

                echo'<div class="welcome-uname-cont">';
                echo'   <div class="content">
                            <div class="content__container">
                                <ul class="content__container__list">
                                <li class="content__container__list__item">Hi! '.$row["first_name"].'</li>
                                <li class="content__container__list__item">Welcome to KESTREL</li>
                                <li class="content__container__list__item">Hi! '.$row["first_name"].'</li>
                                <li class="content__container__list__item">Welcome to KESTREL</li>
                                </ul>
                            </div>
                        </div>                    
                ';
                echo'</div>';

                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                
            }
        }  
                            
        else{  
            header("location:logout.php");  
        } 
    ?>
    <!-- END/SESSION -->

</header>
<!-- END/HEADER -->



    <!-- SIGN UP -->
    <div class="modal-dialog sign-up-modal ">
        <div class="modal-body mod-bod">
            <?php
                     
                $rem_id = $_GET['editrem'];
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT * FROM announcement where rem_id='$rem_id' ";
                $result = mysqli_query($db,$sql);
                while($row=mysqli_fetch_array($result)){
                    echo"<form method='post' action='reminderconn.php' enctype='multipart/form-data'>";
                       
                        echo"<input id='rem_id' name='rem_id' type='hidden' class='form-control' value='".$row['rem_id']."' />";
                        echo"<input id='username' name='username' type='hidden' class='form-control' value='".$row['username']."' />";
                        echo"<input id='user_img' name='user_img' type='hidden' class='form-control' value='".$row['user_image']."' />";
                        echo"<input id='date_posted' name='date_posted' type='hidden' class='form-control' value='".$row['date']."' />";
                      
                        echo"<div class='ann-contents'>";
                            // middlename
                            echo"<p>DATE POSTED: ".$row['date']." </p>";
                            echo"<p>POSTED BY: ".$row['name']." </p>";
                            echo"<textarea id='ann' name='ann' type='text' class='form-control ann'>".$row['announcement']."</textarea>";
                        
                            //submit
                            echo"<div class='form-group text-right'>";
                                echo"<button type='submit' id='updateRem' name='updateRem' class='btn btn-warning but-update-ann'>UPDATE   
                                </button>";

                                echo"<button type='button'  class='btn btn-info but-update-ann' data-toggle='modal' data-target='#myModal'>
                                <i class='fa fa-trash'></i>DELETE   
                                </button>";

                            echo"</div>";
                        echo"</div>";
                        
                    //end
                    echo"</form>";


                    //FOR CONFIRM PASS/DELETE-EMPLOYEE
                    echo'<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                        echo'<div class="modal-dialog">';
                            echo' <div class="modal-content">';
                               
                                echo"<div class='modal-header mod-head-dlt-emp'>";
                                   echo'<p><i class="fa fa-exclamation-triangle warning"></i>
                                   DELETE ANNOUNCEMENT ';
                                   echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                                   echo'</p>';
                               echo"</div>";

                               echo'<div class="modal-body mod-bod-dlt-emp">';
                                   echo'<p>ARE YOU SURE YOU WANT TO DELETE THIS ANNOUNCEMENT?</p>';
                               echo'</div>';

                               echo'<div class="modal-footer mod-footer-dlt-emp">';
                                   echo "<span class='span-dlt-emp'><a href='reminderconn.php?deleterem=".$row['rem_id']."'>";

                                       echo "<button type='button' class='btn btn-danger but-dlt-ann'>YES
                                       </button>";

                                       echo"<input id='rem_id' name='rem_id' type='hidden' class='form-control' value='".$row['rem_id']."' />";
                                       echo"<input id='username' name='username' type='hidden' class='form-control' value='".$row['username']."' />";
                                       echo"<input id='name' name='name' type='hidden' class='form-control' value='".$row['name']."' />";
                                       echo"<input id='user_img' name='user_img' type='hidden' class='form-control' value='".$row['user_image']."' />";
                                       echo"<input id='date_posted' name='date_posted' type='hidden' class='form-control' value='".$row['date']."' />";

                                   echo"</a></span>";

                                   echo "<span class='span-dlt-emp'><a>";
                                       echo "<button type='button'  data-dismiss='modal' class='btn btn-danger but-dlt-ann'>NO
                                       </button>";
                                   echo"</a></span>";
                  
                               echo'</div>';
                 
                           echo'</div>';
                       echo'</div>';
                   echo'</div>';
                   //END/FOR CONFIRM PASS/DELETE-EMPLOYEE
                     
                     }
            ?>



  </div>

  </div>

  <div class="footer-edit">
    <p>Copyright © 2018 Kestrel IMC Corp. All rights reserved.</p>
    </div>

<!-- Latest compiled and minified JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
         <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/admin-clock.js"></script> 
    <script type="text/javascript" src="assets/js/update.js"></script>
    <!-- <script type="text/javascript" src="assets/js/ann-edit.js"></script> -->
   

    
<!-- 
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>