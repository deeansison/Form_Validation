<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">
    <link rel="stylesheet" href="assets/css/welcome.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
   
    <link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />

    <title>Kestrel-IMC</title>
</head>

<body onload="startTime()">

<!-- HEADER -->
<header>

    <!-- FOR ICON -->
    <div class="icon-bar-adminval">
        <a href="logout.php" ><p id="lgout">LOGOUT</p><i class='fa fa-sign-out'></i></a> 
    </div>
    <!-- END/FOR ICON -->

    <!-- FOR CLOCK -->
    <div id="clockdate">
        <div class="clockdate-wrapper">
            <div id="clock"></div>
            <div id="date"></div>
            <h6><i class="fa fa-map-marker"></i> Home Page</h6>
        </div>
    </div>
    <!-- END/FOR CLOCK -->

    <!-- FOR LOGO -->
        <div class="logo-adminval">
            <img src="assets/img/kestrellogo.png" alt="">
        </div>
    <!-- END/FOR LOGO -->

    <!-- SESSION -->
    <?php
        include('connection.php');
        session_start();      
        if(isset($_SESSION["password"]) && ($_SESSION["position"]=='Admin')){  
            $username = $_SESSION["username"];
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT user_image, first_name, last_name FROM user_credentials where username='$username' ";
            $result = mysqli_query($db,$sql);
                        
            while($row=mysqli_fetch_array($result)){  

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

                echo'<input id="user_img" name="user_img" type="hidden" class="form-control" value="'.$row["user_image"].'" > ';
                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
            }
        }  
        
        else{  
            header("location:logout.php");  
        } 
    ?>
    <!-- END/SESSION -->

</header>
<!-- HEADER -->

    <!-- MAIN CONT -->
    <div class="main-user-cont">
        
    <!-- CONT ONE -->
        <div class="user-cont-one">                         
    
            <?php
                $db = mysqli_connect("localhost","root","","special_project");
                $username = $_SESSION["username"];
                $sql = "SELECT * FROM user_credentials where username='$username'";
                $result = mysqli_query($db,$sql);
                
                while($row=mysqli_fetch_array($result)){
                    
                    echo'<div class="im-con">';
                        echo'<img class="usr-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                    echo '</div>';

                    echo'<div class="p-con">';
                        echo"<p id='usr-name'>".$row['first_name']." ".$row['last_name']."</p>";
                        echo"<p id='usr-pos'>".$row['position']."</p>";
                    echo '</div>';
         
                    echo"<input id='statusform' name='statusform' type='hidden' class='form-control' value='".$row['status']."'>";

                }
            ?>

            <!-- HIDDEN FIELDS -->
            <div id="status">
                <input id="statusdummy" name="statusdummy" type="hidden" class="form-control">
                <input id="statusdummy2" name="statusdummy2" type="hidden"  disabled/>
                <input id="time_in" name="time_in" type="hidden" class="form-control"> 
                <input id="date_in" name="date_in" type="hidden" class="form-control"> 
                <input id="time_out" name="time_out" type="hidden" class="form-control"> 
                <input id="date_out" name="date_out" type="hidden" class="form-control">

                <?php
                    $db = mysqli_connect("localhost","root","","special_project");
                    $username = $_SESSION["username"];
                    $sql = "SELECT timein, datein  FROM time_in_out_backup where username='$username' AND status='On Work'";
                    $result = mysqli_query($db,$sql);
                    
                    while($row=mysqli_fetch_array($result)){
                
                        echo"<input id='tin' name='tin' type='hidden' class='form-control' value='".$row['timein']."'>";
                        echo"<input id='din' name='din' type='hidden' class='form-control' value='".$row['datein']."'>";

                    }
                ?>

            </div>
             <!-- END/HIDDEN FIELDS -->

            <!-- BUTTONS IN, OUT -->
            <div class="btns-admin-val">
                
                <!-- TIME IN -->
                <button type="submit" id="button_in" name='button_in'  class="btn btn-success btnin">
                TIME-IN</button>
                <!-- END/TIME IN -->

                <!-- TIME OUT -->
                <button type="submit" id="button_out" name='button_out'  class="btn btn-danger btnout">
                TIME-OUT</button><br>
                <!-- END/TIME OUT -->

            </div>
            <!-- END/BUTTONS IN, OUT -->


            <!-- BUTTON MANAGE ACCOUNT -->
            <div class="btns-admin-val">
                <a href="admin.php" class="btn btn btn-success m-accounts" role="button">
                MANAGE ACCOUNTS</a>
            </div>
            <!-- END/BUTTON MANAGE ACCOUNT -->

            <!-- BUTTON ANNOUNCEMENT -->
            <div class="btns-admin-val">
                <button type="button" class="btn btn btn-success p-announcements" data-toggle="modal" data-target="#myModal1">
                FORM REQUEST</button>
            </div>
            <!-- END/BUTTON ANNOUNCEMENT -->

            <!-- BUTTON ANNOUNCEMENT -->
            <div class="btns-admin-val">
                <button type="button" class="btn btn btn-success p-announcements" data-toggle="modal" data-target="#myModal">
                ANNOUNCEMENT</button>
            </div>
            <!-- END/BUTTON ANNOUNCEMENT -->

            <!-- BUTTON ANNOUNCEMENT -->
            <div class="btns-admin-val">
                <button type="button" class="btn btn btn-success p-announcements" data-toggle="modal" data-target="#myModal2">
                ADD TIME IN/OUT</button>
            </div>
            <!-- END/BUTTON ANNOUNCEMENT -->

            <!-- BUTTON REPORTS -->
            <div class="btns-admin-val">
               <a href="all-report.php" class="btn btn btn-success m-accounts" role="button">
               DTR REPORTS</a>
            </div>
            <!-- END/BUTTON REPORTS -->

            <!-- ARCHIVE ARCHIVE -->
            <div class="btns-admin-val">
                <a href="archive.php" class="btn btn btn-success m-accounts" role="button">
                ARCHIVE</a>
            </div>
            <!-- END/BUTTON ARCHIVE -->
 
        </div>
        <!-- CONT ONE -->
    </div>
    <!-- MAIN CONT -->


    <!-- ANNOUNCEMENT MODAL -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-m">
            <div class="modal-content mod-cont">
                    
                <div class="modal-header mod-head">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-pencil-square-o"></i>
                        ANNOUNCEMENT
                    </h4>
                    <a href="reminders.php">
                        <p class="edit-view-announcement"> 
                        SHOW ALL ANNOUNCEMENTS</p>
                    </a>
                </div>
                <!-- <form action="" method="POST" id="register" role="form"> -->
                <div class="modal-body mod-bod">
                    <div class= 'rem-post'>
                        <textarea id="ann" name="ann" type="text" class="form-control ann-text-field" placeholder="Write Announcement..." required="required" ></textarea>
                    </div>
                </div>

                <div class="modal-footer mod-footer">
                    <button type="submit" id="annpost" name='annpost'  class="btn btn-success ann-but">POST</button>
                </div>
      <!-- </form> -->
            </div>
        </div>
    </div>
    <!-- END/ANNOUNCEMENT MODAL -->


    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content form-cont">

                <div class='modal-header form-head'>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modal-title-req-form" value="">
                    <i class="fa fa-clock-o"></i>
                    REQUEST FORM</h4>

                    <a id="request_show" href="show_request.php">SHOW REQUESTS</a>

                </div>

                <button type="button" id="ot_button" name='ot_button'  class="btn btn-success form-but">OT FORM</button>
                <button type="button" id="onleave_button" name='onleave_button'  class="btn btn-success form-but">ONLEAVE FORM</button>
                <button type="button" id="wfh_button" name='wfh_button'  class="btn btn-success form-but">WORK FROM HOME</button>
                
                <div class="ot_form">
                    <form action="sendmail.php" method="post" enctype='multipart/form-data'>              
            
                        <div class="modal-body">
                        
                        <?php
                            $db = mysqli_connect("localhost","root","","special_project");
                            $username = $_SESSION["username"];
                            $sql = "SELECT * FROM user_credentials where username='$username'";
                            $result = mysqli_query($db,$sql);
                            
                            while($row=mysqli_fetch_array($result)){

                            echo'<div class="content-admin-val">
                              
                                <div class="fld-admin-val">
                                    <span class="input input--hoshi">
                                        <div class="msg_cont-admin-val">
                                            <span class="need-admin-val">FROM: </span>
                                        </div>
                                        <input class="input__field input__field--hoshi" type="text"  id="name" name="name" value="'.$row['first_name'].' '.$row['last_name'].'"placeholder="TO *" required/>
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                        </label>    
                                    </span>
                                </div>
                            </div>';
                            echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                            echo'<input id="email_user" name="email_user" type="hidden" class="form-control" value="'.$row["email_address"].'" > ';
                            echo'<input id="name_emp" name="name_emp" type="hidden" class="form-control" value="'.$row["first_name"].' '.$row["last_name"].'" > ';
                            }
                            
                        ?>
                        <div class="content-admin-val">
                            <!-- FOR Email -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>TO: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="email"  id="email" name="email" autocomplete='off' placeholder="@gmail.com" 
                                    list="email-search" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                            <datalist id="email-search">
                                <?php
                                            
                                    $db = mysqli_connect("localhost","root","","special_project");
                                    $sql = "SELECT email_address FROM user_credentials where position='Admin' AND archive='' ";
                                    $result = mysqli_query($db,$sql);
                                                                
                                    while($row=mysqli_fetch_array($result)){
                                        $email_address=$row['email_address'];
                                       
                                        echo' 

                                            <option value="'.$email_address.'"></option>';
                                    }
                                                            
                                ?>
                            </datalist>

                        <div class="content-admin-val">
                            <!-- FOR SUBJECT -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>SUBJECT: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="text"  id="subject" name="subject" value="REQUEST FOR OVERTIME" placeholder="SUBJECT *" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <!-- FOR DATE OT -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>FROM (
                                            <input id="datenow_OT" name='datenow_OT'/>) TO: 
                                        </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="text"  id="date_OT" name="date_OT" placeholder="OVERTIME DATE *" autocomplete="off" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>FROM (18:00) TO: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="time" id="time_OT" name="time_OT"  placeholder="TO *" autocomplete="off" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <!-- FOR MESSAGE -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>PURPOSE/PROJECT: </span>
                                    </div>
                                    <textarea  id="message" name="message" type="text" class="form-control msg-text-field" value="" placeholder="PURPOSE/PROJECT *"  required></textarea> 
                                    </label>    
                                </span>
                            </div>
                        </div>
                            
                                
                        </div>

                        <div class="modal-footer mod-footer-ot-req">
                            <button type='submit' id="sendemail" name="sendemail">SEND</button>         
                        </div>
                    </form>
                </div>



                <!-- ON LEAVE -->
                <div class="onleave_form hide">
                    <form action="sendmailleave.php" method="post" enctype='multipart/form-data'>              
            
                        <div class="modal-body">

                        <?php
                            $db = mysqli_connect("localhost","root","","special_project");
                            $username = $_SESSION["username"];
                            $sql = "SELECT * FROM user_credentials where username='$username' AND archive='' ";
                            $result = mysqli_query($db,$sql);
                            
                            while($row=mysqli_fetch_array($result)){

                            echo'<div class="content-admin-val">
                                <!-- FOR Email -->
                                <div class="fld-admin-val">
                                    <span class="input input--hoshi">
                                        <div class="msg_cont-admin-val">
                                            <span class="need-admin-val">FROM: </span>
                                        </div>
                                        <input class="input__field input__field--hoshi" type="text"  id="name_leave" name="name_leave" value="'.$row['first_name'].' '.$row['last_name'].'"placeholder="TO *" required/>
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                        </label>    
                                    </span>
                                </div>
                            </div>';
                            echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                            echo'<input id="email_user" name="email_user" type="hidden" class="form-control" value="'.$row["email_address"].'" > ';
                            echo'<input id="name_emp" name="name_emp" type="hidden" class="form-control" value="'.$row["first_name"].' '.$row["last_name"].'" > ';
                            }
                            
                        ?>
                        <div class="content-admin-val">
                            <!-- FOR Email -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>TO: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="email"  id="email_leave" name="email_leave"  autocomplete='off' placeholder="@gmail.com" 
                                    list="email-search" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                       
                       <datalist id="email-search">
                                <?php
                                            
                                    $db = mysqli_connect("localhost","root","","special_project");
                                    $sql = "SELECT email_address FROM user_credentials where position='Admin'";
                                    $result = mysqli_query($db,$sql);
                                                                
                                    while($row=mysqli_fetch_array($result)){
                                        $email_address=$row['email_address'];
                                       
                                        echo' 

                                            <option value="'.$email_address.'"></option>';
                                    }
                                                            
                                ?>
                            </datalist>
                        <div class="content-admin-val">
                            <!-- FOR SUBJECT -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>SUBJECT: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="text"  id="subject_leave" name="subject_leave" value="REQUEST FOR LEAVE" placeholder="SUBJECT *" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <!-- FOR DATE OT -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>START DATE: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="text"  id="start_date" name="start_date" value="" placeholder="START DATE *" autocomplete="off" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">    
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>END DATE: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="text"  id="end_date" name="end_date" value="" placeholder="END DATE *" autocomplete="off" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <!-- FOR MESSAGE -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>PURPOSE: </span>
                                    </div>
                                    <textarea  id="message_leave" name="message_leave" type="text" class="form-control msg-text-field" value="" placeholder="PURPOSE *"  autocomplete="off" required></textarea> 
                                    </label>    
                                </span>
                            </div>
                        </div>
                            
                                
                        </div>

                        <div class="modal-footer mod-footer-ot-req">
                            <button type='submit' id="sendemail" name="sendemail">SEND</button>         
                        </div>
                    </form>
                </div>
                          


                <!-- WORK FROM HOME -->
                <div class="wfh_form hide">
                    <form action="sendmailwfh.php" method="post" enctype='multipart/form-data'>              
            
                        <div class="modal-body">
                           

                        <?php
                            $db = mysqli_connect("localhost","root","","special_project");
                            $username = $_SESSION["username"];
                            $sql = "SELECT * FROM user_credentials where username='$username' AND archive='' ";
                            $result = mysqli_query($db,$sql);
                            
                            while($row=mysqli_fetch_array($result)){

                            echo'<div class="content-admin-val">
                                <!-- FOR Email -->
                                <div class="fld-admin-val">
                                    <span class="input input--hoshi">
                                        <div class="msg_cont-admin-val">
                                            <span class="need-admin-val">FROM: </span>
                                        </div>
                                        <input class="input__field input__field--hoshi" type="text"  id="name_wfh" name="name_wfh" value="'.$row['first_name'].' '.$row['last_name'].'"placeholder="TO *" required/>
                                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                        </label>    
                                    </span>
                                </div>
                            </div>';
                            echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                            echo'<input id="email_user" name="email_user" type="hidden" class="form-control" value="'.$row["email_address"].'" > ';
                            echo'<input id="name_emp" name="name_emp" type="hidden" class="form-control" value="'.$row["first_name"].' '.$row["last_name"].'" > ';
                            }
                            
                        ?>
                        <div class="content-admin-val">
                            <!-- FOR Email -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>TO: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="email"  id="email_wfh" name="email_wfh"  autocomplete='off' placeholder="@gmail.com" 
                                    list="email-search" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <!-- FOR SUBJECT -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>SUBJECT: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="text"  id="subject_wfh" name="subject_wfh" value="WORK FROM HOME REQUEST" placeholder="Subject *" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <!-- FOR DATE OT -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>DATE: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="text"  id="date_wfh" name="date_wfh" value="" placeholder="DATE *" autocomplete="off" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>

                        <div class="content-admin-val">
                            <!-- FOR DATE OT -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>FROM: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="time" id="timein_wfh" name="timein_wfh"  placeholder="TIME *" autocomplete="off" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>
                        </div>    
                            
                        <div class="content-admin-val">
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>TO: </span>
                                    </div>
                                    <input class="input__field input__field--hoshi" type="time" id="timeout_wfh" name="timeout_wfh"  placeholder="TIME *" autocomplete="off" required/>
                                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    </label>    
                                </span>
                            </div>

                        </div>

                            <datalist id="email-search">
                                <?php
                                            
                                    $db = mysqli_connect("localhost","root","","special_project");
                                    $sql = "SELECT email_address FROM user_credentials where position='Admin'";
                                    $result = mysqli_query($db,$sql);
                                                                
                                    while($row=mysqli_fetch_array($result)){
                                        $email_address=$row['email_address'];
                                       
                                        echo' 

                                            <option value="'.$email_address.'"></option>';
                                    }
                                                            
                                ?>
                            </datalist>
                        <div class="content-admin-val">
                            <!-- FOR MESSAGE -->
                            <div class="fld-admin-val">
                                <span class="input input--hoshi">
                                    <div class="msg_cont-admin-val">
                                        <span class='need-admin-val'>REASON: </span>
                                    </div>
                                    <textarea  id="message_wfh" name="message_wfh" type="text" class="form-control msg-text-field" value="" placeholder="REASON *"  required></textarea> 
                                    </label>    
                                </span>
                            </div>
                        </div>
                            
                                
                        </div>

                        <div class="modal-footer mod-footer-ot-req">
                            <button type='submit' id="sendemail" name="sendemail">SEND</button>         
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>











            
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">

                    <div class="modal-content form-cont">

                        <div class='modal-header form-head'>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="modal-title-req-form" value="">
                            <i class="fa fa-clock-o"></i>
                            REQUEST FOR TIME IN/OUT</h4>

                            <a id="request_show" href="#"></a>

                        </div>

                        
                        <?php
                                $username = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT status FROM user_credentials where username='$username'";
                                $result = mysqli_query($db,$sql);
                                                                        
                                while($row=mysqli_fetch_array($result)){
                                    echo'
                                    <input class="input__field input__field--hoshi" type="hidden"  value="'.$row["status"].'"
                                     id="status_onwork" name="status_onwork" required/>
                                     
                                     ';
                                               
                                }  
                        ?>    


<div class="out">
<!-- <form method='POST' action='add_in_out.php'> -->
                        <div class="time_in_out_form">

                            <div class="modal-body clear-bod">

                            <?php
                                $username = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT * FROM user_credentials where username='$username'";
                                $result = mysqli_query($db,$sql);
                                                                        
                                while($row=mysqli_fetch_array($result)){
                                    echo'
                                    <input class="input__field input__field--hoshi" type="hidden"  value="'.$row["username"].'"
                                     id="username_inout" name="username_inout" required/>
                                     <input class="input__field input__field--hoshi" type="hidden"  value="'.$row["first_name"].' '.$row["last_name"].'"
                                     id="name_inout" name="name_inout" required/>
                                     
                                     ';
                                               
                                }                   
                            ?>


                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>DATE IN*: </span>
                                            </div>

                                            <input class="input__field input__field--hoshi" type="text"  id="date_in_inout" name="date_in_inout" placeholder="DATE IN*"  required/>
                                                
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>TIME IN *: </span>
                                            </div>
                                            <input class="input__field input__field--hoshi" type="time" id="time_in_inout" name="time_in_inout"  placeholder="TO *" autocomplete="off" required/>
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>DATE OUT*: </span>
                                            </div>

                                            <input class="input__field input__field--hoshi" type="text"  id="date_out_inout" name="date_out_inout" placeholder="DATE OUT*"  required/>
                                                
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>TIME OUT *: </span>
                                            </div>
                                            <input class="input__field input__field--hoshi" type="time" id="time_out_inout" name="time_out_inout"  placeholder="TO *" autocomplete="off" required/>
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>REQUEST TO *: </span>
                                            </div>
                                            <input class="input__field input__field--hoshi" type="email"  id="email_inout" name="email_inout" autocomplete='off' placeholder="@gmail.com" 
                                            list="email-search" required/>
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                            
                            </div>

                            <div class="content-admin-val">
                                <div class="fld-admin-val">
                                    <span class="input input--hoshi">
                                        <div class="msg_cont-admin-val">
                                            <span class='need-admin-val'>FOR OVERTIME ONLY!!!</span>
                                        </div>
                                        <div class="msg_cont-admin-val">
                                            <span class='need-admin-val'>(PURPOSE/PROJECT): </span>
                                        </div>
                                        <textarea  id="message_inout" name="message_inout" type="text" class="form-control msg-text-field" value="" placeholder="PURPOSE/PROJECT *"  ></textarea> 
                                        </label>    
                                    </span>
                                </div>
                            </div>

                        

                        </div>
                        </br> </br>
                        <div class="modal-footer mod-footer-ot-req">
                        <button type="button" name="add_inout" id="add_inout" class="btn btn-primary btn-clear">
                            <i class=""></i>SEND</button>  
                        </div>
<!-- </form> -->
</div>







<div class="in hide">
                        <div class="time_in_out_form">

                            <div class="modal-body clear-bod">

                        

                            <?php
                                $username = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT * FROM time_in_out_backup where username='$username' and status='On Work'";
                                $result = mysqli_query($db,$sql);
                                                                        
                                while($row=mysqli_fetch_array($result)){
                                    echo'
                                    <input class="input__field input__field--hoshi" type="hidden"  value="'.$row["username"].'"
                                     id="username_inout_in" name="username_inout_in" required/>
                                    
                                               
                                             
                           

                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class="need-admin-val">DATE *: </span>
                                            </div>

                                            <input class="input__field input__field--hoshi" type="text"  id="date_in_inout_in" name="date_in_inout_in" placeholder="DATE *" value="'.$row["datein"].'" disabled/>
                                                
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class="need-admin-val">TIME IN *: </span>
                                            </div>
                                            <input class="input__field input__field--hoshi" type="time" id="time_in_inout_in" name="time_in_inout_in"  placeholder="TO *" value="'.$row["timein"].'" autocomplete="off" disabled/>
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>';
                            }    
                            ?>


                            <?php
                                $username = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT * FROM user_credentials where username='$username'";
                                $result = mysqli_query($db,$sql);
                                                                        
                                while($row=mysqli_fetch_array($result)){
                                    echo'
                                
                                    <input class="input__field input__field--hoshi" type="hidden"  value="'.$row["first_name"].' '.$row["last_name"].'"
                                    id="name_inout_in" name="name_inout_in" required/>
                                  
                                     
                                     ';
                                               
                                }                   
                            ?>
                             <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>DATE OUT*: </span>
                                            </div>

                                            <input class="input__field input__field--hoshi" type="text"  id="date_out_inout_in" name="date_out_inout_in" placeholder="DATE OUT*"  required/>
                                                
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>
                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>TIME OUT *: </span>
                                            </div>
                                            <input class="input__field input__field--hoshi" type="time" id="time_out_inout_in" name="time_out_inout_in"  placeholder="TO *" autocomplete="off" required/>
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                                <div class="content-admin-val">
                                    <div class="fld-admin-val">
                                        <span class="input input--hoshi">
                                            <div class="msg_cont-admin-val">
                                                <span class='need-admin-val'>REQUEST TO *: </span>
                                            </div>
                                            <input class="input__field input__field--hoshi" type="email"  id="email_inout_in" name="email_inout_in" autocomplete='off' placeholder="@gmail.com" 
                                            list="email-search" required/>
                                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                            </label>    
                                        </span>
                                    </div>
                                </div>

                            
                            </div>

                            <div class="content-admin-val">
                                <div class="fld-admin-val">
                                    <span class="input input--hoshi">
                                        <div class="msg_cont-admin-val">
                                            <span class='need-admin-val'>FOR OVERTIME ONLY!!!</span>
                                        </div>
                                        <div class="msg_cont-admin-val">
                                            <span class='need-admin-val'>(PURPOSE/PROJECT): </span>
                                        </div>
                                        <textarea  id="message_inout_in" name="message_inout_in" type="text" class="form-control msg-text-field" value="" placeholder="PURPOSE/PROJECT *"  ></textarea> 
                                        </label>    
                                    </span>
                                </div>
                            </div>

                        

                        </div>
                        </br> </br>
                        <div class="modal-footer mod-footer-ot-req">
                        <button type="button" name="add_inout_in" id="add_inout_in" class="btn btn-primary btn-clear">
                            <i class=""></i>SEND</button>  
                        </div>
</div>



                    </div>
                </div>
            </div>
            
          
        </div>
        <!-- CONT ONE -->
    </div>
    <!-- MAIN CONT -->






    <div class="footer-adminvalidation">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 

    <script type="text/javascript" src="assets/js/clock.js"></script> 
    <script type="text/javascript" src="assets/js/user_timeinout.js"></script>
    <script type="text/javascript" src="assets/js/announce.js"></script>
    <script type="text/javascript" src="assets/js/dateandrequest.js"></script>
    <script type="text/javascript" src="assets/js/add_tin_tout_in.js"></script>
    <script type="text/javascript" src="assets/js/add_tin_tout.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</body>


</html>