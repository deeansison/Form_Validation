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
            <a href="time_in_out_edit.php" ><p id="bck-ann">BACK</p><i class='fa fa-arrow-left faa-horizontal animated'></i></a> 
         
        </div>
        <!-- END/FOR ICON -->
    
        <!-- FOR CLOCK -->
        <div id="clockdate">
        <div class="clockdate-wrapper">
            <div id="clock"></div>
            <div id="date"></div>
            <h6><i class="fa fa-map-marker"></i> Time In/Out Employee</h6>
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
    
        <!-- CONTENT -->
        <div class="modal-body req-modal-bod">
<br>
            <?php
                     
                $inout_ID = $_GET['inout_ID'];
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT * FROM time_in_out_backup where inout_ID='$inout_ID' ";

                $sql="SELECT 
                user_credentials.first_name, 
                user_credentials.last_name,
                user_credentials.email_address,
                time_in_out_backup.datein, 
                time_in_out_backup.dateout, 
                time_in_out_backup.username, 
                time_in_out_backup.timein, 
                time_in_out_backup.timeout, 
                time_in_out_backup.inout_ID, 
                time_in_out_backup.status,
                time_in_out_backup.reason
                FROM time_in_out_backup 
                INNER JOIN user_credentials ON time_in_out_backup.username=user_credentials.username 
                where  time_in_out_backup.inout_ID='$inout_ID'";


                $result = mysqli_query($db,$sql);
                while($row=mysqli_fetch_array($result)){
                    echo"<form method='POST' action='out_edit.php' enctype='multipart/form-data'>";
                        echo"<div class='req-contents'>";
                            // middlename
                            echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$row["username"].'" > ';
                            echo'<input id="inoutid" name="inoutid" type="hidden" class="form-control" value="'.$row["inout_ID"].'" > ';
                            echo'<input id="date_out" name="date_out" type="hidden" class="form-control" value="'.$row["datein"].'" > ';
                            echo'<input id="email_emp" name="email_emp" type="hidden" class="form-control" value="deeansison@gmail.com > ';
                            echo'<input id="status" name="status" type="hidden" class="form-control" value="'.$row["status"].'" > ';

                            // echo"<p><b>DATE AND TIME IN:</b> ".$row['datein']."/".$row['timein']." </p>";
                            // echo"<p><b>STATUS:</b> ".$row['status']."</p>";
                            echo"<p><b>NAME:</b> ".$row['first_name']." ".$row['last_name']." </p>";

                        echo'<div class="fld">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="status_emp" name="status_emp" 
                                value="'.$row["status"].'" placeholder="From *" autocomplete="off" list="status_list" />
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <b>STATUS:</b>
                                </label>
                            </span>
                        </div>';

                        echo'
                        <datalist id="status_list">
                            <option value="Out">
                            <option value="Overtime">
                        </datalist> 
                        ';

                            echo'<div class="fld">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="din" name="din" 
                                value="'.$row["datein"].'"placeholder="From *"/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <b>DATE IN:</b>
                                </label>
                            </span>
                        </div>';

                        echo'<div class="fld">
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="time" id="tin" name="tin" 
                            value="'.$row["timein"].'"placeholder="From *"/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <b>TIME IN:</b>
                            </label>
                        </span>
                    </div>';

                            echo'<div class="fld">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="time_out" name="time_out" 
                                value="'.$row["dateout"].'"placeholder="From *"/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <b>DATE OUT:</b>
                                </label>
                            </span>
                        </div>';
                            
                            echo'<div class="fld">
                                <span class="input input--hoshi">
                                    <input class="input__field input__field--hoshi" type="time" id="time_out" name="time_out" 
                                    value="'.$row["timeout"].'"placeholder="From *"/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                        <b>TIME OUT:</b>
                                    </label>
                                </span>
                            </div>';

                            echo'
                                <span class="input input--hoshi">
                                   
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                        <b>PROJECT/PURPOSE:</b>
                                    </label>
                                    <textarea type="text" class="form-control msg-text-field" id="reason" name="reason" />'.$row["reason"].'</textarea>
                                </span></br></br>
                            ';
                    
                            echo"<div class='form-group'>";
                            echo"<button type='submit' id='button_out' name='button_out' class='btn btn-warning but-approve'>APPROVE  
                            </button>";

                            echo"<button type='submit' id='button_out_reject' name='button_out_reject' class='btn btn-warning but-approve'>REJECT  
                            </button>";
                        echo"</div>";
                    echo"</form>";
                }


            ?>
        </div>
        <div class="footer-tinout">
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
     
    </body>
 </html>


  