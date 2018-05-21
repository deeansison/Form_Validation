<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

<?php
    session_start();  
    $host = "localhost";  
    $username = "root";  
    $password = "";  
    $database = "special_project";  
    $message = "";  
    try{  
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password );  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        if(isset($_POST["login"])){  
            
            if(empty($_POST["username"]) || empty($_POST["password"])){  
            } 
            
            if(!empty($_POST["username"]) || !empty($_POST["password"])){  
                $query = "SELECT username, password, position FROM user_credentials WHERE BINARY username = :username AND BINARY password = :password AND position = :position";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                array(  
                    'username'     =>     $_POST["username"],  
                    'password'     =>     $_POST["password"],
                    'position'     =>     $_POST["position"],  
                    
                    )  
                ); 
                 
                $count = $statement->rowCount();  
                if($count > 0){  
                    $_SESSION["username"] = $_POST["username"]; 
                    $_SESSION["password"] = $_POST["password"];
                    $_SESSION["position"] = $_POST["position"]; 
                    
             

                    if( $_SESSION["position"]=='Admin'){
                        header("location:adminvalidation.php");  
                    }

                    if( $_SESSION["position"]=='Employee'){
                        header("location:user.php");  
                    }
                 
                }  
                
                else{  
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { 
                    swal({
                        title: "Wrong Password",
                        icon: "error",
                        confirmButtonText: "Try Again?",
                    });';
                    echo '},);</script>';
                }  
            }
        }  
    }  

    catch(PDOException $error){  
        $message = $error->getMessage();  
    }  
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    
    <link rel="stylesheet" href="assets/css/tooltip.css">
    
    <link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />


    <title>Kestrel-IMC</title>

</head>

<body onload="startTime()">
    
    <!-- MAIN CONTAINER -->
    <div class="main-container">    
        <!-- FOR ICON SIDENAV -->
        <div class="icon-bar-back">
            <a href="logout.php"><p id="bck">BACK</p><i class='fa fa-arrow-left faa-horizontal animated '></i></a> 
        </div> 
        <!-- END/FOR ICON SIDENAV -->

       <!-- CLOCK -->
        <div id="clockdate">
            <div class="clockdate-wrapper-login">
                <div id="clock"></div>
                <div id="date"></div>
            </div>
        </div>
        <!-- END/CLOCK -->

        <!-- LOGO -->
        <div class="logo-login">
            <img src="assets/img/kestrellogo.png" alt="">
        </div>
        <!-- END/LOGO -->
    
        <!-- BODY -->
        <div class="modal-body">
            <!-- FOR CONTS -->
            <div class="conts">
                <!-- FOR FORM -->
                <form action="login.php" method="post" role="form">

                    <!-- USER CONTAINER -->
                    <?php
                        include('connection.php');

                        if(isset($_SESSION["username"])){  
                            $uname = $_SESSION["username"];
                            $db = mysqli_connect("localhost","root","","special_project");
                            $sql = "SELECT user_image,company_position, position, first_name, last_name FROM user_credentials where username='$uname' ";
                            $result = mysqli_query($db,$sql);
                            
                            while($row=mysqli_fetch_array($result)){
                                echo'<div class="im-con">';
                                    echo'<img class="usr-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                                echo '</div>';
                                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                
                                echo'<input id="position" name="position" type="hidden" class="form-control" value="'.$row["position"].'" > ';
                            
                                echo'<div class="usr-p-con">';
                                    echo"<p id='usrname'>".$row["first_name"]." ".$row["last_name"]."</p>";
                                    echo"<p id='comp_pos'>".$row["company_position"]."</p>";
                                echo '</div>';

                            }
                        }  
                    
                        else{  
                            header("location:logout.php");  
                        } 
                    ?>
                    <!-- END/USER CONTAINER -->

                    <!-- FOR PASSWORD INPUT -->
                    <div class="content">
                        <div class="fld">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="password" id="input-4" name="password" placeholder="Password"  required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="content">
                        <div class="fld">
                            <span class="input input--hoshi">
                                <button type="submit" name="login" class="btn btn-primary btn-block login_but">LOGIN</button>
                            </span>
                        </div>
                    </div>
                    <!-- END/FOR PASSWORD INPUT -->

                </form>
                <!-- END/FOR FORM -->
            </div>
            <!-- END/FOR CONTS --> 
        </div>
        <!-- END/FOR MODAL BODY -->
       
        <div class="footer-login">
        <p>Copyright © 2018 Kestrel IMC Corp. All rights reserved.</p>
        </div>

    </div>
    <!-- END/FOR MAIN CONTAINER -->

  
  
    <!-- Latest compiled and minified JavaScript -->
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/index-clock.js"></script>

</body>
</html>