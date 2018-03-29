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
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">

    <title>Kestrel-DDM</title>
</head>


<body onload="startTime()">

<!-- HEADER -->
<header>

    <!-- ICON -->
    <div class="icon-bar-admin">
        <a href="adminvalidation.php" ><p id="ho">HOME</p><i class='fa fa-home'></i></a> 
        <a href="logout.php" ><p id="so">LOGOUT</p><i class='fa fa-sign-out'></i></a> 
    </div>
    <!-- END/ICON -->

    <!-- CLOCK AND DATE -->
    <div id="clockdate">
        <div class="clockdate-wrapper">
            <div id="clock"></div>
            <div id="date"></div>
        </div>
    </div>
    <!-- END/CLOCK AND DATE -->
    

    <?php
        include('connection.php');
        session_start();      
        if(isset($_SESSION["password"])){  
            $uname = $_SESSION["username"];
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
            $result = mysqli_query($db,$sql);
                        
            while($row=mysqli_fetch_array($result)){
                echo' <div class="logo">
                    <img src="assets/img/kestrellogo.png" alt="">
                </div>';
                echo'<div class="welcome-uname-cont">';
                    echo'<span id="welcome-name">Good Day '.$_SESSION["username"].'!</span>';
                echo'</div>';
                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
            }
        }  
     
        else{  
            header("location:index.php");  
        } 
    ?>

</header>
<!-- END/HEADER -->

 
    
    
<!--ADD EMPLOYEE-->
    
<?php
    $uname = $_GET['edit'];
    $db = mysqli_connect("localhost","root","","special_project");
    $sql = "SELECT * FROM user_credentials where username='$uname' ";
    $result = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($result)){

        echo"<div class='modal-dialog sign-up-modal'>";
            echo"<div class='modal-content'>";            
                echo"<form method='post' action='insert.php' enctype='multipart/form-data'>";

                echo"<input id='uname' name='uname' type='hidden' class='form-control' placeholder='User Name' value='".$row['username']."' />";

                    echo"<div class='content1'>";
                        echo"<span class='input input--hoshi'>";
                            echo"<div class='cont'>";
                                echo"<div class='addim-con'>";
                                    echo"<img id='blah' src='".$row['user_image']."' alt='your image' />";
                                echo"</div>";
                                echo"<div class='file-upload'>";
                                    echo"<label for='USERIMAGE' class='file-upload__label'>Upload Image</label>";
                                    echo"<input type='hidden' id='img_name' name='img_name' value='".$row['user_image']."' class='form-control' />";
                                    echo"<input type='file' name='USERIMAGE' id='USERIMAGE' accept='assets/img/userimages/*' class='img-up' onchange='readURL(this);' />";
                                echo"</div>";
                            echo"</div>";
                        echo"</span>";
                    echo"</div>";


                    echo"<div class='content2'>";
                        echo"<div class='cont2'>";

                            echo"<div class='fld2'>";
                                echo"<span class='input input--hoshi'>";
                                    echo"<div class='msg_cont'>";
                                        echo"<span class='need'></span>";
                                    echo"</div>";
                                    echo"<input class='input__field input__field--hoshi' type='text'  id='fn' name='fn' value='".$row['first_name']."' placeholder='First Name *' required/>";
                                    echo"<label class='input__label input__label--hoshi input__label--hoshi-color-1' for='input-4'>";
                                        echo"<div class='lck'>";
                                            echo"<i class='fa fa-user lck_icon'></i>";
                                        echo"</div>";
                                    echo"</label>";    
                                echo"</span>";
                            echo"</div>";
                        
                            echo"<div class='fld2'>";
                                echo"<span class='input input--hoshi'>";
                                    echo"<div class='msg_cont'>";
                                        echo"<span class='need'></span>";
                                    echo"</div>";
                                    echo"<input class='input__field input__field--hoshi' type='text' id='mn' name='mn' value='".$row['middle_name']."' placeholder='Middle Name' />";
                                    echo"<label class='input__label input__label--hoshi input__label--hoshi-color-1' for='input-4'>";
                                    echo"</label>";
                                echo"</span>";
                            echo"</div>";

                            echo"<div class='fld2'>";
                                echo"<span class='input input--hoshi'>";
                                    echo"<div class='msg_cont'>";
                                        echo"<span class='need'></span>";
                                    echo"</div>";
                                    echo"<input class='input__field input__field--hoshi' type='text' id='ln' name='ln' value='".$row['last_name']."' placeholder='Last Name *' />";
                                    echo"<label class='input__label input__label--hoshi input__label--hoshi-color-1' for='input-4'>";
                                    echo"</label>";
                                echo"</span>";
                            echo"</div>";

                        echo"</div>";
                    echo"</div>";

                    echo"<div class='content2'>";
                        echo"<div class='cont2'>";

                            echo"<div class='fld2'>";
                                echo"<span class='input input--hoshi'>";
                                    echo"<div class='msg_cont'>";
                                        echo"<span class='need'></span>";
                                    echo"</div>";
                                    echo"<input class='input__field input__field--hoshi' type='text'  id='ea' name='ea' placeholder='Email Address *' value='".$row['email_address']."' required/>";
                                    echo"<label class='input__label input__label--hoshi input__label--hoshi-color-1' for='input-4'>";
                                        echo"<div class='lck'>";
                                            echo"<i class='fa fa-at lck_icon'></i>";
                                        echo"</div>";
                                    echo"</label>";
                                echo"</span>";
                            echo"</div>";
                            
                            echo"<div class='fld2'>";
                                echo"<span class='input input--hoshi'>";
                                    echo"<div class='msg_cont'>";
                                        echo"<span class='need'></span>";
                                    echo"</div>";
                                    echo"<input class='input__field input__field--hoshi' type='text' id='cn' name='cn' placeholder='Contact Number *' value='".$row['contact_number']."' required/>";
                                    echo"<label class='input__label input__label--hoshi input__label--hoshi-color-1' for='input-4'>";
                                        echo"<div class='lck'>";
                                            echo"<i class='fa fa-phone lck_icon'></i>";
                                        echo"</div>";
                                    echo"</label>";
                                echo"</span>";
                            echo"</div>";

                            echo"<div class='fld2'>";
                                echo"<span class='input input--hoshi'>";
                                    echo"<div class='msg_cont'>";
                                        echo"<span class='need'></span>";
                                    echo"</div>";
                                    echo"<input class='input__field input__field--hoshi' type='text' id='cp' name='cp' placeholder='Company Position *' value='".$row['company_position']."' required/>";
                                    echo"<label class='input__label input__label--hoshi input__label--hoshi-color-1' for='input-4'>";
                                        echo"<div class='lck'>";
                                            echo"<i class='fa fa-briefcase lck_icon'></i>";
                                        echo"</div>";
                                    echo"</label>";
                                echo"</span>";
                            echo"</div>";

                        echo"</div>";
                    echo"</div>";

                    echo"<div class='content2'>";
                        echo"<div class='cont2'>";
                            echo"<div class='fld2'>";
                                echo"<span class='input input--hoshi'>";
                                    echo"<div class='grp_bts'>";
                                        // echo"<button type='submit' id='updateButton' name='updateButton' class='btn btn-danger update-button'>UPDATE
                                        // </button>";
                                        echo"<button type='submit' id='updateButton' name='updateButton' class='btn btn-danger update-button'>UPDATE
                                        </button>";
                                    echo"</div>";
                                echo"</span>";
                            echo"</div>";
                        echo"</div>";
                    echo"</div>";
                    
                echo"</form>";
             echo"</div>";
        echo"</div>";
    
    }
    ?>

    
<!-- Latest compiled and minified JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
        <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="assets/js/admin-clock.js"></script> 
    <script type="text/javascript" src="assets/js/img.js"></script>

</body>
</html>