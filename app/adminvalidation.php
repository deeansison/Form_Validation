<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">
    
    <title>Kestrel-DDM</title>
</head>

<header>
<!-- <div class="kestrel">
<img src="assets/img/kestrellogo.png" alt="">
</div> -->
   
<div class="icon-bar">
<a href="#" ><p id="pr">PROFILE</p><i class='fa fa-user'></i></a> 
<a href="logout.php" ><p id="so">LOGOUT</p><i class='fa fa-sign-out'></i></a> 

        
    </div>
    <div id="clockdate">
                <div class="clockdate-wrapper">
                    <div id="clock"></div>
                    <div id="date"></div>
                </div>
            </div>
<?php
                            include('connection.php');
                            session_start();      
                            if(isset($_SESSION["password"])){  
                                $uname = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                                $result = mysqli_query($db,$sql);
                        
                                while($row=mysqli_fetch_array($result)){
                                    
                                    echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                }
                            }  
                            
                            else{  
                                header("location:index.php");  
                            } 
                        ?>





</header>

<body onload="startTime()">


    <div class="user-cont">
        
        <div class="clock-cont">                         
            <div id="clockdate">
                <!-- <div class="clockdate-wrapper">
                    <div id="clock"></div>
                    <div id="date"></div>
                </div> -->
            </div>

            <div class="logo">
        <img src="assets/img/kestrellogo.png" alt="">
    </div>
            <?php
                $db = mysqli_connect("localhost","root","","special_project");
                $uname = $_SESSION["username"];
                $sql = "SELECT * FROM user_credentials where username='$uname'";
                $result = mysqli_query($db,$sql);
                while($row=mysqli_fetch_array($result)){

                    
                    echo'<div class="im-con">';
                    echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                echo '</div>';
                echo'<div class="p-con">';
                    echo"<p id='usr'>".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."</p>";
                    echo"<p id='ps'>".$row['position']."</p>";
                echo '</div>';
         
                    echo"<input id='statusform' name='statusform' type='hidden' class='form-control' value='".$row['status']."'>";
                }
            ?>

            <div id="status">
                <input id="statusdummy" name="statusdummy" type="hidden" class="form-control">
                <input id="statusdummy2" name="statusdummy2" type="hidden"  disabled/>
                <input id="time_in" name="time_in" type="hidden" class="form-control"> 
                <input id="date_in" name="date_in" type="hidden" class="form-control"> 
                <input id="time_out" name="time_out" type="hidden" class="form-control"> 
                <input id="date_out" name="date_out" type="hidden" class="form-control">
            </div>

            <div class="btns">
                <button type="submit" id="button_in" name='button_in'  class="btn btn-success btnin">TIME-IN</button>
                <button type="submit" id="button_out" name='button_out'  class="btn btn-danger btnout">TIME-OUT</button> <br>
              
            </div>
            <div class="btns">
               <a href="admin.php" class="btn btn-info m-accounts" role="button">MANAGE ACCOUNTS</a>
            </div>
        </div>

        

           
        </div>
    </div>



     
 <!-- </form> -->

<!-- Latest compiled and minified JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/clock.js"></script> 
    <script type="text/javascript" src="assets/js/user_timeinout.js"></script>
    <!-- <script type="text/javascript" src="assets/js/admin.js"></script>  -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>