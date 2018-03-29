<!DOCTYPE html>

<?php
    //error_reporting(0);
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
                echo '<script type="text/javascript"> alert("All fields are required!") </script>';
            } 
            
            if(!empty($_POST["username"])  || empty($_POST["password"])){  
                $query = "SELECT * FROM user_credentials WHERE username = :username AND password = :password AND position = 'Employee' ";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                array(  
                    'username'     =>     $_POST["username"],  
                    'password'     =>     $_POST["password"]          
                    )  
                );  
                $count = $statement->rowCount();  
                if($count > 0){  
                    $_SESSION["username"] = $_POST["username"]; 
                    $_SESSION["password"] = $_POST["password"]; 
                    
                    header("location:user.php");  
                }
            } 

            if(!empty($_POST["username"]) || !empty($_POST["password"])){  
                $query = "SELECT * FROM user_credentials WHERE username = :username AND password = :password AND position = 'Admin' ";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                array(  
                    'username'     =>     $_POST["username"],  
                    'password'     =>     $_POST["password"]  
                    )  
                );  
                $count = $statement->rowCount();  
                if($count > 0){  
                    $_SESSION["username"] = $_POST["username"]; 
                    $_SESSION["password"] = $_POST["password"]; 
             
                    header("location:adminvalidation.php");  
                }  
                
                else{  
                    $message = '<label>Wrong Data</label>';  
                    echo '<script type="text/javascript"> alert("Wrong Data!") </script>';
                }  
            }
        }  
    }  

    catch(PDOException $error){  
        $message = $error->getMessage();  
    }  
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/fieldanimate.css">

    <link rel="stylesheet" href="assets/css/iconanimate.css">
    <title>Kestrel-DDM</title>
</head>


<body>

    <div class="main-container">    
    
    
        <div class="icon-bar_back">
            <a href="logout.php"><p id="bck">BACK</p><i class='fa fa-arrow-left faa-horizontal animated '></i></a> 
        </div> 

        <div class="logo">
        <img src="assets/img/kestrellogo.png" alt="">
    </div>
    
        <div class="modal-body">
            <div class="conts">
                <form action="login.php" method="post" role="form">

                    <?php
                        include('connection.php');

                        if(isset($_SESSION["username"])){  
                            $uname = $_SESSION["username"];
                            $db = mysqli_connect("localhost","root","","special_project");
                            $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                            $result = mysqli_query($db,$sql);
                            
                            while($row=mysqli_fetch_array($result)){
                                echo'<div class="im-con">';
                                    echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                                echo '</div>';
                                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                            
                                echo'<div class="p-con">';
                                    echo"<p id='usrname'>".$_SESSION["username"]."</p>";
                                echo '</div>';

                            }
                        }  
                    
                        else{  
                            header("location:index.php");  
                        } 
                    ?>

                    <div class="content">
                        <div class="fld">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="password" id="input-4" name="password" placeholder="Password"/>
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
                </form>
            </div> 
        </div>
    </div>
  
    <!-- Latest compiled and minified JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

</body>
</html>