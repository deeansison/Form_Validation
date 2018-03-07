<!DOCTYPE html>

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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    <title>Kestrel-DDM</title>
</head>

<body>
      
<div class="row main-row">

<!-- REMINDER COLUMN -->
    <div class="col-sm-4 rem-box">

        <p id="rem">REMINDERS:</p>
        <?php
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT * FROM announcement ";
            $result = mysqli_query($db,$sql);
                        
            while($row=mysqli_fetch_array($result)){
            echo '<div class="row main-row ann-card">';

                echo '<div class="col-sm-4 u-cont">';
                    echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                    echo '<p id="ann_name">'.$row["username"].'</p>';
                echo '</div>';
                
                echo '<div class="col-sm-8 a-cont">';
                    echo '<p  id="ann_msg">'.$row["announcement"].'</p>';
                echo '</div>';

            echo '</div>';
            }
        ?>
    </div>
    
<!-- USER COLUMN -->
    
    <div class="col-sm-8 log-box">
            <div class="logo">
                <img src="assets/img/kestrellogo.png" alt="">
            </div>
    <div class='user-img'>
        
            <?php
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT * FROM user_credentials";
                $result = mysqli_query($db,$sql);
                        
                while($row=mysqli_fetch_array($result)){
                    echo"<form action='index.php' method='post' role='form'>";
                        echo"<input class='username' name='username' type='hidden' class='form-control' value='".$row['username']."'>";
                        echo " <button type='submit' class='selectuser' name='selectuser'   ><img src='".$row['user_image']."'></button>";
                    echo"</form>";
                }
            ?> 
            
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