<?php
    include('connection.php');
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
        <a href="adminvalidation.php" ><p id="bck-ann">BACK</p><i class='fa fa-arrow-left faa-horizontal animated'></i></a> 
        <a href="logout.php" ><p id="lgout-ann">LOGOUT</p><i class='fa fa-sign-out'></i></a> 
    </div>
    <!-- END/FOR ICON -->

    <!-- FOR CLOCK -->
    <div id="clockdate">
    <div class="clockdate-wrapper">
        <div id="clock"></div>
        <div id="date"></div>
        <h6><i class="fa fa-map-marker"></i> Announcements</h6>
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

<!-- SEARCH BAR -->
    <div class="container">
        <div class="content">
            <div class="fld">
                <span class="input input--hoshi">
                    <input class="input__field input__field--hoshi" type="text" id="search-announcement" autocomplete="off" onkeyup="AnnouncementSearch()" name="search" placeholder="Search name"/>
                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                        <div class="ann-icon">
                            <i class="fa fa-search ann-icon-fafa"></i>
                        </div>
                    </label>
                </span>
            </div> 
        </div>
    </div>
<!-- END/SEARCH BAR -->
           
<!-- TABLE HEADER -->
<div class="container">
    <div class="container-table">
        <table class="table-one">
            <thead class="thead-one">
                <tr class="tr-one">
                    <th class="th-one">Name</th>
                    <th class="th-one">Announcement</th>
                    <th class="th-one">Date Posted</th>
                    <th class="edit-delete-column-head"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<!-- END/TABLE HEADER -->


<!-- TABLE BODY -->
<div class="container">
    <div class="container-table">
        <table id="table">
            <tbody>
                <?php
                    $db = mysqli_connect("localhost","root","","special_project");
                    $sql = "SELECT * FROM announcement where archive_ann='' ORDER BY date DESC";
                    $result = mysqli_query($db,$sql);
                                
                    while($row=mysqli_fetch_array($result)){
                                   
                        echo"<tr>";
                            echo"<td>".$row['name']."</td> ";
                            echo"<td>".$row['announcement']."</td>"; 
                            echo"<td>".$row['date']."</td> ";
                            echo"<td class='edit-delete-column-body'>";
                                echo"<a id='edit-row' href='reminderedit.php?editrem=" .$row['rem_id']. " '>
                                <i class='fa fa-edit'></i> VIEW</a>";
                                echo"<br>";
                            echo"</td>"; 
                        echo"</tr>";
                              
                    }
                ?> 
                <?php
                    // $db = mysqli_connect("localhost","root","","special_project");
                    // $sql = "SELECT * FROM announcement where archive_ann='Archive' ORDER BY date DESC";
                    // $result = mysqli_query($db,$sql);
                                
                    // while($row=mysqli_fetch_array($result)){
                                   
                    //     echo"<tr>";
                    //         echo"<td>".$row['name']."</td> ";
                    //         echo"<td>".$row['announcement']."</td>"; 
                    //         echo"<td>".$row['date']."</td> ";
                    //         echo"<td class='edit-delete-column-body'>";
                    //             echo"<a id='edit-row' href='reminderconn.php?deleterem=".$row['rem_id']."'>
                    //             <i class='fa fa-edit'></i>Delete</a>";
                    //             echo"<br>";
                    //         echo"</td>"; 
                    //     echo"</tr>";
                    
                    // }
                ?> 
            </tbody>
        </table>
    </div>
</div>

<div class="footer-read">
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
    <script type="text/javascript" src="assets/js/admin.js"></script>
    
    <script type="text/javascript" src="assets/js/filter-announcement.js"></script>
    <script type="text/javascript" src="assets/js/ann-edit.js"></script>
    
<!-- 
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>