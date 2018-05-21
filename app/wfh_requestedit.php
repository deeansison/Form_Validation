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
        <link rel="stylesheet" href="assets/css/request_edit.css">
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
            <a href="show_request.php" ><p id="bck-ann">BACK</p><i class='fa fa-arrow-left faa-horizontal animated'></i></a> 
         
        </div>
        <!-- END/FOR ICON -->
    
        <!-- FOR CLOCK -->
        <div id="clockdate">
        <div class="clockdate-wrapper">
            <div id="clock"></div>
            <div id="date"></div>
            <h6><i class="fa fa-map-marker"></i> Work From Home Request Form</h6>
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
              
                    echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
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
            <div class="modal-body req-modal-bod">

                <?php
                        
                    $wfh_ID = $_GET['wfh_ID'];
                    $db = mysqli_connect("localhost","root","","special_project");
                    $sql = "SELECT wfh_ID, username, name,  date_wfh, timein_wfh,timeout_wfh, purpose_project_wfh, status, send_date, to_email, req_for_wfh, email_user FROM request_wfh where wfh_ID='$wfh_ID' ";
                    $result = mysqli_query($db,$sql);
                    while($row=mysqli_fetch_array($result)){
                        echo"<form method='post' action='form_request.php' enctype='multipart/form-data'>";
                            echo"<div class='req-contents'>";
                                    // middlename
                                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                echo'<input id="username_emp" name="username_emp" type="hidden" class="form-control" value="'.$row["username"].'" > ';
                                echo'<input id="wfh_ID" name="wfh_ID" type="hidden" class="form-control" value="'.$row["wfh_ID"].'" > ';
                                echo'<input id="name_emp" name="name_emp" type="hidden" class="form-control" value="'.$row["name"].'" > ';
                                echo'<textarea id="reason" name="reason" style="display:none;" class="form-control">'.$row["purpose_project_wfh"].'</textarea>';
                                echo'<input id="email_wfh" name="email_wfh" type="hidden" class="form-control" value="'.$row["email_user"].'" > ';
                                
                                echo"<p><b>REQUEST FOR:</b> ".$row['req_for_wfh']." </p>";
                                echo"<p><b>REQUEST STATUS:</b> ".$row['status']." </p>";
                                echo"<p><b>EMPLOYEE NAME:</b> ".$row['name']." </p>";
                                echo"<p><b>EMAILED TO:</b> ".$row['to_email']." </p>";
                                echo"<p><b>SEND DATE:</b> ".$row['send_date']." </p>";
                                echo"<p><b>PURPOSE/PROJECT:</b> ".$row['purpose_project_wfh']." </p>";
                                
                                echo'<div class="fld">
                                    <span class="input input--hoshi">
                                        <input class="input__field input__field--hoshi" type="text" id="date_wfh" name="date_wfh" value="'.$row["date_wfh"].'" placeholder="From *"/>
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            <b>REQUEST DATE:</b>
                                        </label>
                                    </span>
                                </div>';
        
                                echo'<div class="fld">
                                    <span class="input input--hoshi">
                                        <input class="input__field input__field--hoshi" type="text" id="timein_wfh" name="timein_wfh" value="'.$row["timein_wfh"].'" placeholder="START TIME *"/>
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            <b>START TIME:</b>
                                        </label>
                                    </span>
                                </div>';
                            
                                echo'<div class="fld">
                                    <span class="input input--hoshi">
                                        <input class="input__field input__field--hoshi" type="text" id="timeout_wfh" name="timeout_wfh" value="'.$row["timeout_wfh"].'" placeholder="START TIME *"/>
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            <b>START TIME:</b>
                                        </label>
                                    </span>
                                </div>';
                
                                echo"<div class='form-group'>";
                                    echo"<button type='submit' id='approve_wfh_req' name='approve_wfh_req' class='btn btn-warning but-approve'>APPROVE   
                                    </button>";
                                    echo"<button type='submit' id='reject_wfh_req' name='reject_wfh_req' class='btn btn-warning but-approve'>REJECT   
                                    </button>";
                                echo"</div>";

                            echo"</div>";
                        echo"</form>";
                    }
                ?>
            </div>

        <div class="footer-wfh">
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
        <script type="text/javascript" src="assets/js/ann-edit.js"></script>
       
    
        
    <!-- 
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
    </body>
    
    
    </html>



