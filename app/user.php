<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <title>Kestrel-DDM</title>
</head>

<header>
    <!-- Static navbar -->
    <div class="container nav-cntainer">
    <!-- Static navbar -->
        <nav class="navbar navbar-default nav-cntents">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span id="openBtn" onclick="openNav()"><img src="assets/img/kestrellogo.png" alt=""></span>
                </div>
            <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle dt" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php
                            include('connection.php');
                            session_start();      
                            if(isset($_SESSION["password"])){  
                                $uname = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                                $result = mysqli_query($db,$sql);
                        
                                while($row=mysqli_fetch_array($result)){
                                    echo '<input id="user_img" name="user_img" type="hidden" class="form-control" value="'.$row["user_image"].'" > '; 
                                    echo "<img class='crd-img' src='".$row['user_image']."'width='10%' height='10%'>";
                                    echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                }
                            }  
                            
                            else{  
                                header("location:index.php");  
                            } 
                        ?>
                    </a>
                  
                    <ul class="dropdown-menu">
                        
                        <?php
                            echo '<li>';
                                echo '<a href="logout.php">Logout</a>';
                            echo '</li>';
                            
                            $uname = $_SESSION["username"];
                            $db = mysqli_connect("localhost","root","","special_project");
                            $sql = "SELECT username FROM user_credentials where username='$uname' ";
                            $result = mysqli_query($db,$sql);
                            while($row=mysqli_fetch_array($result)){
                                echo '<li>';
                                    echo "<a href='user_profile.php?view=".$row['username']." '>View Profile</a>";
                                echo '</li>';
                            }
                        ?>
                        
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>

                </li>
            </ul>
            </div>
            <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

</header>

<body onload="startTime()">
    <div class="user-cont">
        <div class="clock-cont">                         
            <div id="clockdate">
                <div class="clockdate-wrapper">
                    <div id="clock"></div>
                    <div id="date"></div>
                </div>
            </div>

            <?php
                $db = mysqli_connect("localhost","root","","special_project");
                $uname = $_SESSION["username"];
                $sql = "SELECT status FROM user_credentials where username='$uname'";
                $result = mysqli_query($db,$sql);
                while($row=mysqli_fetch_array($result)){
                    echo"<input id='statusform' name='statusform' type='hidden' class='form-control' value='".$row['status']."'>";
                }
            ?>

            <div id="status">
                <input id="statusdummy" name="statusdummy" type="hidden" class="form-control">
                <input id="statusdummy2" name="statusdummy2" type="text"  disabled/>
                <input id="time_in" name="time_in" type="hidden" class="form-control"> 
                <input id="date_in" name="date_in" type="hidden" class="form-control"> 
                <input id="time_out" name="time_out" type="hidden" class="form-control"> 
                <input id="date_out" name="date_out" type="hidden" class="form-control">
            </div>

            <button type="submit" id="button_in" name='button_in'  class="btn btn-success">Time-In</button>
            <button type="submit" id="button_out" name='button_out'  class="btn btn-danger">Time-Out</button>
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