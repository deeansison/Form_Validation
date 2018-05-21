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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    <link rel="stylesheet" href="assets/css/tooltip.css">
    
    <link rel="stylesheet" href="assets/css/footer.css">
    
    <link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />

    <title>Kestrel-IMC</title>

</head>

<body>

<!-- HEADER -->
<header>


    <!-- ICON -->
        <div class="icon-bar-profile">
            <a href="admin.php" ><p id="bck">BACK</p><i class='fa fa-arrow-left faa-horizontal animated '></i></a> 
            <!-- <a href="adminvalidation.php" ><p id="ho">HOME</p><i class='fa fa-home'></i></a>  -->
            <a href="logout.php" ><p id="lgout">LOGOUT</p><i class='fa fa-sign-out'></i></a> 
        </div>
    <!-- END/ICON -->


    <!-- SESSION -->
    <?php
        include('connection.php');
        session_start();      
        if(isset($_SESSION["password"]) && ($_SESSION["position"]=='Admin')){  
            $uname = $_SESSION["username"];
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
            $result = mysqli_query($db,$sql);
        
            while($row=mysqli_fetch_array($result)){
                echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
            }
        }  
    
        else{  
            header("location:logout.php");  
        } 
    ?>
    <!-- END/SESSION -->


</header>
<!-- END/HEADER -->


<!-- MAIN CONTENTS -->
    <div class="row prof-main-cont">

        <!-- FOR EMPLOYEE CONTAINER -->
        <div class="col-sm-4 prof-emp-cont">
            <?php
                $uname = $_GET['view'];
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT * FROM user_credentials where username='$uname'";
                $result = mysqli_query($db,$sql);
                
                while($row=mysqli_fetch_array($result)){
                            echo"<div class='emp-cont-infos'>";
                                echo' <div class="logo-profile">
                                    <img src="assets/img/kestrellogo.png" alt="">
                                </div>';
                                echo'<div class="im-cont">';
                                    echo'<img class="emp-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                                echo '</div>';
                                
                                echo"<div class='info-cont'>";
                                echo'<input id="username_emp" name="username_emp" type="hidden" class="form-control" value="'.$row["username"].'" > ';
                                    echo"<p><b>Name:</b> ".$row['first_name']." ".$row['last_name']."</p>";
                                    echo"<p><b>Position:</b> ".$row['company_position']."</p>";
                                    echo"<p><b>Email Address:</b> ".$row['email_address']."</p>";
                                    echo"<p><b>Contact Number:</b> ".$row['contact_number']."</p>";
                                echo"</div>";

                                echo"<div class='update-buts'>";

                                    //FOR UPDATE INFO
                                    echo "<span><a href='user_update-user.php?edit=".$row['username']." '>";
                                        echo "<button type='button' class='btn btn-danger edit-profile-but'>CHANGE EMPLOYEE INFORMATION
                                        </button>";
                                    echo"</a></span>";
                                    //END/FOR UPDATE INFO

                                     //FOR DELETE EMPLOYEE
                                     echo "<button type='button' data-toggle='modal' data-target='#myModal1' class='btn btn-danger edit-profile-but'>REMOVE EMPLOYEE
                                     </button>";
                                     //END/FOR DELETE EMPLOYEE

                                    //FOR UPDATE EMPLOYEE
                                    echo"<button type='button' class='btn btn-danger edit-security-but' data-toggle='modal' data-target='#myModal'>CHANGE SECURITY SETTINGS</button>";
                                    //END/FOR UPDATE EMPLOYEE
                                    
                                echo"</div>";

                            echo"</div>";

                            //FOR CONFIRM PASS/DELETE-EMPLOYEE
                            echo'<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
                                echo'<div class="modal-dialog">';
                                    echo' <div class="modal-content">';
                                        
                                        echo"<div class='modal-header mod-head-dlt-emp'>";
                                            echo'<h4><i class="fa fa-exclamation-triangle"></i>
                                            REMOVE EMPLOYEE '.$row['first_name'].' '.$row['last_name'].' ';
                                            echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                                            echo'</h4>';
                                        echo"</div>";
      
                                        echo'<div class="modal-body mod-bod-dlt-emp">';
                                            echo'<p>ARE YOU SURE YOU WANT TO REMOVE EMPLOYEE '.$row['first_name'].' '.$row['last_name'].'?</p>';
                                            // echo'<p>ARE YOU SURE YOU WANT TO PROCEED?</p>';
                                            
                                            // echo'   <div class="fld">
                                            //             <span class="input input--hoshi">
                                            //             <form method="post" action="export.php"> 
                                            //                 <input id="username_emp" name="username_emp" type="hidden" class="form-control" value="'.$row["username"].'" >  
                                            //                 <button type="submit" name="export-profile" id="export-profile" class="btn btn-primary  btn-dwnload">
                                            //                     <i class="fa fa-download lck_icon"></i>
                                            //                 DOWNLOAD EMPLOYEE RECORD</button>    
                                            //             </form>
                                            //             </span>
                                            //         </div>';

                                        echo'</div>';

                                        echo'<div class="modal-footer mod-footer-dlt-emp">';
                                            echo "<span class='span-dlt-emp'><a href='insert.php?deleteemp=".$row['username']."'>";
                                                
                                                    echo "<button type='button' class='btn btn-danger edit-profile-but' name='deleteemp' id='deleteemp'>REMOVE ACCOUNT
                                                    </button>";
                                              
                                            echo"</a></span>";

                                            echo "<span class='span-dlt-emp'><a>";
                                                echo "<button type='button'  data-dismiss='modal' class='btn btn-danger edit-profile-but'>CANCEL
                                                </button>";
                                            echo"</a></span>";
                           
                                        echo'</div>';
                          
                                    echo'</div>';
                                echo'</div>';
                            echo'</div>';
                            //END/FOR CONFIRM PASS/DELETE-EMPLOYEE
                        }
            ?>

            <?php
                     
                $uname = $_GET['view'];
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT * FROM user_credentials where username='$uname' ";
                $result = mysqli_query($db,$sql);
                while($row=mysqli_fetch_array($result)){

                    //FOR MODAL 
                    echo"<div class='modal fade' id='myModal' role='dialog'>";
                    
                        //FOR MODAL DIALOG
                        echo"<div class='modal-dialog'>";
                                
                            //FOR MODAL CONTAINER
                            echo"<div class='modal-content mod-cont'>";
                                    
                                echo"<div class='modal-header m-head'>";
                                    // echo"<p>UPDATE SECURITY SETTINGS</p>";
                                    echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                                    echo'<h4 class="modal-title">
                                            <i class="fa fa-shield"></i>
                                            SECURITY SETTINGS
                                        </h4>';
                                echo"</div>";
                              
                                //FOR MODAL BODY
                                echo"<div class='modal-body mod-body'>";

                                    //FOR SECURITY BUTTONS
                                    echo'<span class="input input--hoshi">';
                                        echo'<div class="grp_bts">
                                           
                                            <button type="submit" id="pass_but" name="pass_but" class="btn btn-danger done-button">Password
                                            </button>
                                            <button type="submit" id="access_but" name="access_but" class="btn btn-danger done-button">Access
                                            </button>  
                                        </div>';
                                    echo'</span>';
                                    //END/FOR SECURITY BUTTONS

                                    //FOR USERNAME     
                                    // <button type="submit" id="uname_but" name="uname_but" class="btn btn-danger done-button">Username
                                    // </button>
                                    // echo"<form method='post' action='insert.php' enctype='multipart/form-data'>";
                                    //     echo'<div class="content-uname hide">';
                                    //         //USERNAME
                                    //         echo'<span class="input input--hoshi">';
                                    //             echo'<div class="msg-cont">';
                                    //                 echo'<span class="msg-cont-text"></span>';
                                    //             echo'</div>';
                                    //             echo'<input class="input__field input__field--hoshi" type="text"  id="un" name="un" autocomplete="off" placeholder="New User Name *" required/>';
                                    //             echo'<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">';
                                    //                 echo'<div class="icon-cont">';
                                    //                     echo'<i class="fa fa-user spcfc-icon"></i>';
                                    //                 echo'</div>';
                                    //             echo'</label>';
                                    //         echo'</span>';    
                                    //         //END/USERNAME

                                    //         //CONFIRM PASSWORD
                                    //         echo'<span class="input input--hoshi">';
                                    //             echo'<div class="msg-cont">';
                                    //                 echo'<span id="msg-cont-text-username">Confirm first your password before the updates</span>';
                                    //             echo'</div>';
                                    //             echo"<input id='uname' name='uname' type='hidden' class='form-control' placeholder='User Name' value='".$row['username']."' />";
                                    //             echo'<input class="input__field input__field--hoshi" type="text"  id="password-uname" name="password" autocomplete="off" placeholder="Password *" required/>';
                                    //             echo'<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">';
                                    //                 echo'<div class="icon-cont">';
                                    //                     echo'<i class="fa fa-key" id="spcfc-icon-username"></i>';
                                    //                 echo'</div>';
                                    //             echo'</label>';
                                    //         echo'</span>';                                          
                                    //         //END/CONFIRM PASSWORD

                                    //         //FOR USERNAME UPDATE BUTTON
                                    //         echo'<span class="input input--hoshi">';
                                    //             echo'<div class="grp_bts">
                                    //                 <button type="submit" id="update-uname" name="update-uname-user" class="btn btn-danger done-button">UPDATE
                                    //                 </button> 
                                    //             </div>';
                                    //         echo'</span>';
                                    //     echo'</div>';
                                    // echo"</form>";
                                    //END/FOR USERNAME

                                    //FOR PASSWORD
                                    echo"<form method='post' action='insert.php' enctype='multipart/form-data'>";
                                        echo'<div class="content-password">';

                                            //PASSWORD
                                            echo'<span class="input input--hoshi">';
                                                echo'<div class="msg-cont">';
                                                    echo'<span class="msg-cont-text"></span>';
                                                echo'</div>';
                                                echo'<input class="input__field input__field--hoshi" type="password"  id="rpassword" name="rpassword" autocomplete="off" placeholder="New Password *" required/>';
                                                echo'<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">';
                                                    echo'<div class="icon-cont">';
                                                        echo'<i class="fa fa-lock spcfc-icon"></i>';
                                                    echo'</div>';
                                                echo'</label>';
                                            echo'</span>';    
                                            //END/PASSWORD

                                            //CONFIRM PASSWORD
                                            echo'<span class="input input--hoshi">';
                                                echo'<div class="msg-cont">';
                                                    echo'<span id="msg-cont-text-password">Confirm first your password before the updates</span>';
                                                echo'</div>';
                                                echo"<input id='uname' name='uname' type='hidden' class='form-control' value='".$row['username']."' />";
                                                echo"<input id='uname-emp' name='uname-emp' type='hidden' class='form-control' value='".$_SESSION['username']."' />";
                                                echo'<input class="input__field input__field--hoshi" type="password"  id="password-pass" name="password" autocomplete="off" placeholder="Password *" required/>';
                                                echo'<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">';
                                                    echo'<div class="icon-cont">';
                                                        echo'<i class="fa fa-key" id="spcfc-icon-password"></i>';
                                                    echo'</div>';
                                                echo'</label>';
                                            echo'</span>';                                          
                                            //END/CONFIRM PASSWORD

                                            //FOR PASSWORD UPDATE BUTTON
                                            echo'<span class="input input--hoshi">';
                                                echo'<div class="grp_bts">
                                                    <button type="submit" id="update-password" name="update-password-user" class="btn btn-danger update-button">UPDATE
                                                    </button>   
                                                </div>';
                                            echo'</span>';
                                            //END/FOR PASSWORD UPDATE BUTTON

                                        echo'</div>';
                                    echo"</form>";
                                    //END/FOR PASSWORD

                                        

                                    //FOR ACCESS  
                                    echo"<form method='post' action='insert.php' enctype='multipart/form-data'>";    
                                        echo'<div class="content-access hide">';

                                            //ACCESS
                                            echo'<span class="input input--hoshi">';
                                                echo'<div class="msg-cont">';
                                                     echo'<span class="msg-cont-text"></span>';
                                                echo'</div>';
                                                
                                                echo'<label class="rb-label">';
                                                    echo'<input type="radio" id="admin" name="pos" value="Admin" required/>';
                                                    echo'<div class="rdio"></div>';
                                                    echo'<span id="admin-span">Admin</span>';
                                                echo'</label>';
                                                    
                                                echo'<label class="rb-label">';
                                                    echo'<input type="radio" id="employee" name="pos" value="Employee" required/>';
                                                    echo'<div class="rdio"></div>';
                                                    echo'<span id="employee-span">Employee</span>';
                                                echo'</label>';  
                                            echo'</span>';  
                                            //END/ACCESS    

                                            //CONFIRM ACCESS
                                            echo'<span class="input input--hoshi">';
                                                echo'<div class="msg-cont">';
                                                    echo'<span id="msg-cont-text-access">Confirm first your password before the updates</span>';
                                                echo'</div>';
                                                echo"<input id='uname' name='uname' type='hidden' class='form-control' placeholder='User Name' value='".$row['username']."' />";
                                                echo"<input id='uname-emp' name='uname-emp' type='hidden' class='form-control' placeholder='User Name' value='".$_SESSION['username']."' />";
                                                echo'<input class="input__field input__field--hoshi" type="password"  id="password-access" name="password" autocomplete="off" placeholder="Password *" required/>';
                                                echo'<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">';
                                                    echo'<div class="icon-cont">';
                                                        echo'<i class="fa fa-key" id="spcfc-icon-access"></i>';
                                                    echo'</div>';
                                                echo'</label>';
                                            echo'</span>';                                          
                                            //END/CONFIRM ACCESS

                                            //FOR ACCESS UPDATE BUTTON
                                            echo'<span class="input input--hoshi">';
                                                echo'<div class="grp_bts">
                                                    <button type="submit" id="update-access" name="update-access-user" class="btn btn-danger update-button">UPDATE
                                                    </button>   
                                                </div>';
                                            echo'</span>';
                                            //END/FOR ACCESS UPDATE BUTTON

                                        echo'</div>';   
                                    //END/FOR ACCESS

                                echo"</div>";       
                                //END/FOR MODAL BODY
                               
                            echo"</div>";
                            //END/FOR MODAL CONTAINER

                        echo"</div>";
                        //END/FOR MODAL DIALOG
                             
                    echo"</div>";
                    //END/FOR MODAL
                }
            ?>
        </div>
        <!-- END/FOR EMPLOYEE CONTAINER -->
       

        <!-- FOR EMPLOYEE DATA -->
        <div class="col-sm-8 emp-data-box">
            <div class="content2">
                <div class="fld">
                    <span class="input input--hoshi">
                        <input class="input__field input__field--hoshi" type="text" id="date_in" name="date_in" placeholder="From *"/>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                            <div class="lck">
                                <i class="fa fa-calendar lck_icon"></i>
                            </div>
                        </label>
                    </span>
                </div>

                <div class="fld">
                    <span class="input input--hoshi">
                        <input class="input__field input__field--hoshi" type="text" id="date_out" name="date_out" placeholder="To *"/>
                        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                        </label>
                    </span>
                </div>
                           
                <div class="fld">
                <!-- <i class="fa fa-filter lck_icon"></i> -->
                        <button type="submit" name="filter" id="filter" class="btn btn-primary filter"  data-tooltip='Click to Filter Dates'>
                            
                        <i class="fa fa-filter lck_icon"></i>FILTER</button>   

                       <button onClick="window.location.reload()" class="btn btn-primary filter-refresh tooltip-right" data-tooltip='Click to Refresh'>
                            <i class="fa fa-refresh fa-spin"></i>
                        </button>
                 
                </div>   

            </div>

            <table id="profile-user-dti">
                <thead>
                    <tr>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Total Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                   
                <tbody>
                    <?php
                        $uname = $_GET['view'];
                        $db = mysqli_connect("localhost","root","","special_project");
                        $sql = "SELECT * FROM time_in_out_backup where username='$uname' AND add_in_out='' ORDER BY datein DESC";
                    
                        $result = mysqli_query($db,$sql);
                        while($row=mysqli_fetch_array($result)){
                            echo"<tr>";
                            echo"<td>".$row['datein']." ".$row['timein']."</td> ";
                            echo"<td>".$row['dateout']." ".$row['timeout']."</td>"; 
                            echo"<td>".$row['totalhrs'].":".$row['totalmins'].":".$row['totalsecs']."</td> ";
                            echo"<td>".$row['status']."</td> ";
                            echo"</tr>"; 
                        }
                    ?>
                </tbody>

            </table>
        </div>
        <!-- END/FOR EMPLOYEE DATA -->

    </div>
    <!-- END/MAIN CONTENTS -->
    
    <div class="footer">
    <p>Copyright © 2018 Kestrel IMC Corp. All rights reserved.</p>
    </div>

<!-- Latest compiled and minified JavaScript -->
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 

        <script type="text/javascript" src="assets/js/admin.js"></script>
        <script type="text/javascript" src="assets/js/data.js"></script>
        <script type="text/javascript" src="assets/js/update.js"></script>

        <script type="text/javascript" src="assets/js/filter-profile.js"></script>

</body>
</html>