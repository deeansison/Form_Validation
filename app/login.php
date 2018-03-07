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
             
                    header("location:admin.php");  
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
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Kestrel-DDM</title>
</head>

<body>
    
    <div class="main-container">    
        <div class="modal-dialog login-in-modal" id="logincont">
            <div class="modal-content">
                <div class="login-text">                     
                    <h2>Login</h2>
                </div>
            <div class="modal-body">
                <form action="login.php" method="post" role="form">
   
                <?php
                    include('connection.php');
                    //session_start();  

                    if(isset($_SESSION["username"])){  
                        $uname = $_SESSION["username"];
                        $db = mysqli_connect("localhost","root","","special_project");
                        $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                        $result = mysqli_query($db,$sql);
                        
                        while($row=mysqli_fetch_array($result)){
                            echo"<div class='user-image'>";
                            echo"<img src='".$row['user_image']."'>";
                            echo "</div>";
                            echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                        }
                    }  
                   
                    else{  
                        header("location:index.php");  
                    } 
                ?>


                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="login" class="btn btn-danger btn-lg login-button">Login
                                <span class="glyphicon glyphicon-menu-right"></span>
                        </button>
                    </div>
                </form>
            </div>
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