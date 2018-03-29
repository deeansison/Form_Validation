<?php
    include('connection.php')
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

 
<!-- MAIN ROW  -->
<div class="row main-row">

    <!-- FOR USER PROFILE -->

    <!--USER-->
    <div class='user-prof'>
        <?php
            $db = mysqli_connect("localhost","root","","special_project");
            $sql = "SELECT * FROM user_credentials";
            $result = mysqli_query($db,$sql);
                        
            while($row=mysqli_fetch_array($result)){

            // VIEW USER
                echo"<form action='index.php' method='post' role='form'>";
                    echo"<div class='crds'>";
                        echo "<span><a href='profile.php?view=".$row['username']." '>";
                            echo"<button type='button' class='selectuser' name='selectuser'>";
                                echo"<div class='crds2'>";
                                    echo"<input class='username' name='username' type='hidden' class='form-control' value='".$row['username']."'>";
                                    echo'<div class="im-con">';
                                        echo'<img class="user-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                                    echo '</div>';
                                    echo'<div class="prof-con">';
                                        echo"<p id='usr-fname'>".$row['first_name']." ".$row['last_name']."</p>";
                                        echo"<p id='comp-pos'>".$row['company_position']."</p>";
                                    echo '</div>';
                                echo"</div>";
                            echo"</button>";
                        echo"</a></span>";
                    echo"</div>";
                echo"</form>";
            //END/ VIEW USER
            }
        ?>  
        
        <!-- ADD NEW EMPLOYEE -->
        <div id="new-emp">
            <div class='crds'>
                <button type='button' class='selectuser' name='selectuser'>
                    <div class='crds2'>
                        <div class="addim-con">
                            <i class='fa fa-user-plus user'></i>
                        </div>
                        <p>ADD NEW EMPLOYEE</p>
                    </div>
                </button>
            </div>
        </div>
        <!-- END/ADD NEW EMPLOYEE -->
    </div>
    <!--END/USER-->
    <!-- END/FOR USER PROFILE -->
</div>
<!--END/MAIN ROW-->
    
    
<!--ADD EMPLOYEE-->
    
    <div class="modal-dialog sign-up-modal hide">
        <div class="modal-content">             
            <form method="post" action="insert.php" enctype="multipart/form-data">

                <!-- FOR IMAGE AND ACCESS -->
                <div class="content1">
                    <span class="input input--hoshi">
                        <div class="cont">
                            <!-- FOR IMAGE -->
                            <div class="addim-con">
                                <img id="blah" src="assets\img\userimages\default_user.png" alt="your image" />
                            </div>
                            <div class="file-upload">
                                <label for="USERIMAGE" class="file-upload__label">Upload Image</label>
                                <input type="file" name="USERIMAGE" id="USERIMAGE" accept="assets/img/userimages/*" class="img-up" onchange="readURL(this);" />
                            </div>
                            <!-- END/FOR IMAGE -->

                            <!-- FOR ACCESS -->
                            <div class="cont2">
                                <div class="inputs">
                                    <label>
                                        <input type="radio" id="admin" name="pos" value="Admin" required />
                                        <div class="rdio"></div>
                                        <span>Admin</span>
                                    </label>

                                    <label>
                                        <input type="radio" id="employee" name="pos" value="Employee" required />
                                        <div class="rdio"></div>
                                        <span>Employee</span>
                                    </label>
                                </div>
                            </div>
                            <!-- END/FOR ACCESS -->
                        </div>
                    </span>
                </div>
                <!-- END/FOR IMAGE AND ACCESS -->


                <!-- FOR FIRST NAME, MIDDLE NAME , LAST NAME -->
                <div class="content2">
                    <div class="cont2">

                        <!-- FOR FIRST NAME -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span class='need'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="text"  id="fn" name="fn" placeholder="First Name *" required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-user lck_icon"></i>
                                    </div>
                                </label>    
                            </span>
                        </div>
                        <!-- END/FOR FIRST NAME -->
                    
                        <!-- FOR MIDDLE NAME -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span class='need'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="text" id="mn" name="mn" placeholder="Middle Name" />
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                </label>
                            </span>
                        </div>
                        <!-- END/FOR MIDDLE NAME -->

                        <!-- FOR LAST NAME -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span class='need'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="text" id="ln" name="ln" placeholder="Last Name *" required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                </label>
                            </span>
                        </div>
                        <!--END/FOR LAST NAME -->
                    </div>
                </div>
                <!-- END/FOR FIRST NAME, MIDDLE NAME , LAST NAME -->

                <!-- FOR USER NAME, PASSWORD , CONFIRM PASSWORD -->
                <div class="content2">
                    <div class="cont2">

                        <!-- FOR USERNAME -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span class='need'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="text"  id="uname" name="uname" placeholder="Username *" required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>
                        <!-- END/FOR USERNAME -->

                        <!-- FOR PASSWORD -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span class='need'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="password" id="rpassword" name="rpassword" placeholder="Password *"  onkeyup='check();' required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                </label>
                            </span>
                        </div>
                        <!-- END/FOR PASSWORD -->

                        <!-- FOR CONFIRM PASSWORD -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span id='correctpass'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *"  onkeyup='check();' required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">  
                                </label>
                            </span>
                        </div>
                        <!-- END/FOR CONFIRM PASSWORD -->      
                    </div>
                </div>
                <!-- END/FOR USER NAME, PASSWORD , CONFIRM PASSWORD -->
               
                <!-- FOR EMAIL ADD, CONTACT NUMBER , COMPANY POSITION -->
                <div class="content2">
                    <div class="cont2">

                        <!-- FOR EMAIL ADD -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                            <div class="msg_cont">
                                <span class='need'></span>
                            </div>
                            <input class="input__field input__field--hoshi" type="text"  id="ea" name="ea" placeholder="Email Address *" required/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <div class="lck">
                                    <i class="fa fa-at lck_icon"></i>
                                </div>
                            </label>
                            </span>
                        </div>
                        <!-- END/FOR EMAIL ADD -->
                        
                        <!-- FOR CONTACT NUMBER -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span class='need'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="text" id="cn" name="cn" placeholder="Contact Number *" required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-phone lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>
                        <!--END/FOR CONTACT NUMBER -->

                        <!-- FOR CONTACT NUMBER -->
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="msg_cont">
                                    <span class='need'></span>
                                </div>
                                <input class="input__field input__field--hoshi" type="text" id="cp" name="cp" placeholder="Company Position *" required/>
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-briefcase lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>
                        <!-- END/FOR CONTACT NUMBER -->
                    </div>
                </div>
                <!-- END/FOR EMAIL ADD, CONTACT NUMBER , COMPANY POSITION -->

                <!-- FOR BUTTON UPDATE -->
                <div class="content2">
                    <div class="cont2">
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <div class="grp_bts">
                                    <button type="submit" id="signUpBtn" name='signUpBtn' class="btn btn-danger sgnup-button">Sign Up
                                    </button>
                                    <button type="button" id="signUpBtnDum" name='signUpBtnDum' class="btn btn-danger sgnup-buttondum">Sign Up
                                    </button>
                                </div>
                            </span>
                       </div>
                    </div>
                </div>
                <!--END/ FOR BUTTON UPDATE -->
                  
            </form>
        </div>
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
    <script type="text/javascript" src="assets/js/user_timeinout.js"></script>
    <script type="text/javascript" src="assets/js/admin.js"></script>
    <script type="text/javascript" src="assets/js/announce.js"></script>
    <script type="text/javascript" src="assets/js/img.js"></script>

</body>
</html>