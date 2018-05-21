<!DOCTYPE html>


<!-- FOR USERNAME SESSION -->
<?php
    // error_reporting(0);
    session_start();  
    $host = "localhost";  
    $username = "root";  
    $password = "";  
    $database = "special_project";  
    $message = "";  

    try{  
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password );  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        if(isset($_POST["selectuser"])){  
         
            if(empty($_POST["username"])){  
                $message = '<label>No User Selected</label>';  
            } 

            if(!empty($_POST["username"])){  
                $query = "SELECT * FROM user_credentials WHERE username = :username ";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                    array(  
                        'username'     =>     $_POST["username"]  
                    )  
                );  
                $count = $statement->rowCount();  
                if($count > 0){  
                    $_SESSION["username"] = $_POST["username"]; 
                    header("location:login.php");  
                }
                       
                else{  
                    $message = '<label>No User Selected</label>';  
                }  
            } 
        }  
    }  
    
    catch(PDOException $error){  
        $message = $error->getMessage();  
    }  
?>
<!-- END/FOR USERNAME SESSION -->


<!-- CONTENT -->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/scroll.css">
        <link rel="stylesheet" href="assets/css/iconanimate.css">
        <link rel="stylesheet" href="assets/css/tooltip.css">

        <link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />


        <title>Kestrel-IMC</title>
    </head>

<body onload="startTime()">

<!-- HEADER -->
<header>

    <!-- FOR ANNOUNCEMENT ICON -->
    <?php
        $db = mysqli_connect("localhost","root","","special_project");
        $sql = "SELECT * FROM announcement";
        $result = mysqli_query($db,$sql);

            if ($result->num_rows !== 0){
                echo'   <div class="icon-bar">
                            <a id="openBtn" onclick="openNav()"><p id="announcement-nav">ANNOUNCEMENTS</p><i class="fa fa-bell faa-ring animated"></i></a>  
                         </div>
                ';
            }
    ?>
    <!--END/ FOR ANNOUNCEMENT ICON -->

    <!-- FOR SIDENAV ANNOUNCEMENT -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <?php
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT * FROM announcement where archive_ann = '' ORDER BY date DESC";
            $result = mysqli_query($db,$sql);
                        
            while($row=mysqli_fetch_array($result)){
               
                echo '<div class="row main-row ann-card">';
                    echo '<div class="col-sm-4 u-cont">';
                        echo'<div class="im-con">';
                            echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                        echo '</div>';
                    echo '</div>';
                    echo '<p id="ann_name">'.$row["name"].'</p>';
                    echo '<div class="col-sm-8 a-cont">';
                        echo '<p  id="ann_msg">'.$row["announcement"].'</p>';
                        echo '<p id="ann_date">Posted: '.$row["date"].'</p>';  
                    echo '</div>';
                echo '</div>';
            }
        ?>
    </div>
    <!-- END/FOR SIDENAV ANNOUNCEMENT -->

</header>
<!-- END/HEADER -->

    <!-- SIDE NAV OVERLAY -->
    <div id="overlay" onclick="closeNav()"></div>
    <!-- END/SIDE NAV OVERLAY -->
    
    <!-- CLOCK -->
    <div id="clockdate">
        <div class="clockdate-wrapper">
            <div id="clock"></div>
            <div id="date"></div>
        </div>
    </div>
    <!-- END/CLOCK -->

    <!-- LOGO -->
    <div class="logo">
        <img src="assets/img/kestrellogo.png" alt="">
    </div>
    <!-- END/LOGO -->

    <div class='search'>
        <div class="fld2">
            <span class="input input--hoshi">
                <div class="msg_cont">
                    <span class='need'></span>
                </div>

                <input class="input__field input__field--hoshi" type="text"  id="myInput" onkeyup="myFunction()" autocomplete="off" 
                placeholder="Search name" list="uname-search">

                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                    <div class="lck">
                        <i class="fa fa-search lck_icon"></i>
                    </div>
                </label>    
            </span>
        </div>
    </div>

    <datalist id="uname-search">
        <?php
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT first_name, last_name FROM user_credentials where archive='' ";
            $result = mysqli_query($db,$sql);
                                                                
            while($row=mysqli_fetch_array($result)){
                $firstname=$row['first_name'];
                $lastname=$row['last_name'];
                echo'<option value="'.$firstname.' '.$lastname.'"></option>';
            }
         ?>
    </datalist>


    <!-- FOR MAIN CONTENTS -->
    <div class="main-cont-index">
        <ul id="myUL" class='user-cont'>

            <!-- ON WORK -->
            <?php
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT username, user_image, first_name, last_name, company_position, status FROM user_credentials where status='ON WORK' AND archive='' ORDER BY first_name ";
                $result = mysqli_query($db,$sql);
                        
                while($row=mysqli_fetch_array($result)){
                    echo"<li><a href='' value='".$row['first_name']." ".$row['last_name']."'>";
                        echo"<form action='index.php' method='post' role='form'>";
                            echo"<input class='username' name='username' type='hidden' class='form-control' value='".$row['username']."'>";
                            echo"<div class='crds'>";
                                echo"<button type='submit' class='selectuser-onwork' name='selectuser'  data-tooltip='Click to Login'>";
                                    echo"<div class='crds2'>";
                                        echo'<div class="im-con">';
                                            echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                                        echo '</div>';
                                        echo'<div class="p-con">';
                                            echo"<p id='usr'>".$row['first_name']." ".$row['last_name']."</p>";
                                            echo"<p id='ps'>".$row['company_position']."</p>";
                                            echo"<p id='stat'>".$row['status']."</p>";
                                        echo '</div>';
                                    echo"</div>";
                                echo"</button>";
                            echo"</div>";
                        echo"</form>";
                    echo"</a></li>";
                }
            ?>   

            <!-- OUT -->
            <?php
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT username, user_image, first_name, last_name, company_position, status FROM user_credentials where status='OUT' AND archive=''  ORDER BY first_name";
                $result = mysqli_query($db,$sql);
                        
                while($row=mysqli_fetch_array($result)){
                    echo"<li><a href='' value='".$row['first_name']." ".$row['last_name']."'>";
                        echo"<form action='index.php' method='post' role='form'>";
                            echo"<div class='crds'>";
                                echo"<button type='submit' class='selectuser' name='selectuser' data-tooltip='Click to Login'>";
                                    echo"<div class='crds2'>";
                                        echo"<input class='username' name='username' type='hidden' class='form-control' value='".$row['username']."'>";
                                        echo'<div class="im-con">';
                                            echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                                        echo '</div>';
                                        echo'<div class="p-con">';
                                            echo"<p id='usr'>".$row['first_name']." ".$row['last_name']."</p>";
                                            echo"<p id='ps'>".$row['company_position']."</p>";
                                        echo '</div>';
                                    echo"</div>";
                                echo"</button>";
                            echo"</div>";
                        echo"</form>";
                    echo"</a></li>";
                }
            ?>     
        </ul>  
    </div>
    <!-- END/FOR MAIN CONTENTS -->

                
    <div class="footer-index">
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
    <script type="text/javascript" src="assets/js/index-clock.js"></script>
    <script type="text/javascript" src="assets/js/filter-index.js"></script>
   
</body>
</html>
<!-- END/CONTENT -->