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

    <link rel="stylesheet" href="assets/css/fieldanimate.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">

    <!-- <link rel="stylesheet" href="assets/css/index.css"> -->


    <title>Kestrel-DDM</title>
</head>

<header>
<!-- <div class="kestrel">
<img src="assets/img/kestrellogo.png" alt="">
</div> -->
   
<!-- <div class="icon-bar">
<a href="#" ><p id="pr">PROFILE</p><i class='fa fa-user'></i></a> 
        <a href="logout.php" ><p id="so">LOGOUT</p><i class='fa fa-sign-out'></i></a> 
        
    </div> -->
    <!-- <div id="clockdate">
                <div class="clockdate-wrapper">
                    <div id="clock"></div>
                    <div id="date"></div>
                </div>
            </div> -->


<div class="icon-bar-admin">
<a href="adminvalidation.php" ><p id="ho">HOME</p><i class='fa fa-sign-out'></i></a> 
<a href="logout.php" ><p id="so">LOGOUT</p><i class='fa fa-sign-out'></i></a> 

        
    </div>
<?php
                            include('connection.php');
                            session_start();      
                            if(isset($_SESSION["password"])){  
                                $uname = $_SESSION["username"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                                $result = mysqli_query($db,$sql);
                        
                                while($row=mysqli_fetch_array($result)){
                                    
                                    echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                }
                            }  
                            
                            else{  
                                header("location:index.php");  
                            } 
                        ?>

</header>

<body onload="startTime()">
    
<div class="logo">
        <img src="assets/img/kestrellogo.png" alt="">
    </div>

    <div class="row main-row">
        <div class='user-img'>
            <?php
                $db = mysqli_connect("localhost","root","","special_project");
                $sql = "SELECT * FROM user_credentials";
                $result = mysqli_query($db,$sql);
                        
                while($row=mysqli_fetch_array($result)){
                    echo"<form action='index.php' method='post' role='form'>";
                        echo"<div class='crds'>";
                            echo"<button type='submit' class='selectuser' name='selectuser'>";
                                echo"<div class='crds2'>";
                                    echo"<input class='username' name='username' type='hidden' class='form-control' value='".$row['username']."'>";
                                    echo'<div class="im-con">';
                                        echo'<img class="ann-img" src="'.$row['user_image'].'" width="10%" height="10%" />';
                                    echo '</div>';
                                    echo'<div class="p-con">';
                                        echo"<p id='usr'>".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."</p>";
                                        echo"<p id='ps'>".$row['position']."</p>";
                                    echo '</div>';
                                echo"</div>";
                            echo"</button>";
                        echo"</div>";
                    echo"</form>";
                }
            ?>  
            
            <div id="sup">
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
    </div>
    </div>
    <!-- SIGN UP -->
    <div class="modal-dialog sign-up-modal  hide">
        <div class="modal-content">
            <div class="login-text">                     
   
            </div>
          
            <div class="modal-body ">

            <!-- <button type="submit" id="log-in" name='log-in' class="btn btn-danger btn-lg login-button">Back
                            <span class="glyphicon glyphicon-menu-right"></span>
                        </button><br><br> -->
            <!-- form was here -->                 
                <form method="post" action="insert.php" enctype="multipart/form-data">


                <div class="content">
                        <div class="fld3">
                            <span class="input input--hoshi">
                            <input type="file" name="USERIMAGE" id="USERIMAGE" accept="assets/img/userimages/*" required />
                            </span>
                        </div>

                    </div>
                <div class="content">
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text"  id="fn" name="fn" placeholder="First Name"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>

                        <div class="fld2">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="mn" name="mn" placeholder="Middle Name"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                 
                                </label>
                            </span>
                        </div>

                        <div class="fld2">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="ln" name="ln" placeholder="Last Name"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                  
                                </label>
                            </span>
                        </div>

                    </div>


                    <div class="content">
                        <div class="fld2">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="ea" name="ea" placeholder="Email Address"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>

                        <div class="fld2">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="cn" name="cn" placeholder="Contact Number"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>

                       

                        <div class="fld3">
                        <span class="input input--hoshi">
                        <input type="hidden" id="status" name="status" class="form-control" />
                        
                    <select id="pos" name="pos" class="form-control"> 
                    <option value="Admin">Select Position</option>                     
                            <option value="Admin">Admin</option>
                            <option value="Employee">Employee</option>
                        </select>
                        </span>
                        </div>


                    </div>


                    

                    <div class="content">
                        <div class="fld1">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="uname" name="uname" placeholder="Username"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>

                    </div>
                    

                    <div class="content">
                        <div class="fld1">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text"id="rpassword" name="rpassword" placeholder="Password"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>

                    </div>


                    <div class="content">
                        <div class="fld1">
                            <span class="input input--hoshi">
                                <input class="input__field input__field--hoshi" type="text" id="cpassword" name="cpassword" placeholder="Confirm Password"/>
                                
                                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                    <div class="lck">
                                        <i class="fa fa-lock lck_icon"></i>
                                    </div>
                                </label>
                            </span>
                        </div>

                    </div>

                 

                    
                  
                  

                  
                  
                    
                    <div class="content">
                        <div class="fld3">
                            <span class="input input--hoshi">
                            <button type="submit" id="signUpBtn" name='signUpBtn' class="btn btn-danger btn-lg login-button">Sign Up
                            
                            </button>
                            </span>
                        </div>

                        </div>
                  
                   
                   



               



                   


                    <!-- <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="fn" name="fn" type="text" class="form-control" placeholder="First Name" required />
                        </div>
                    </div> -->

                    <!-- <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="mn" name="mn" type="text" class="form-control" placeholder="Middle Name" required />
                        </div>
                    </div>

                    <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input id="ln" name="ln" type="text" class="form-control" placeholder="Last Name" required />
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input id="ea" name="ea" type="text" class="form-control" placeholder="Email Address" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-phone"></span>
                            </span>
                            <input id="cn" name="cn" type="text" class="form-control" placeholder="Contact Number" required />
                        </div>
                    </div>  
                            
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input id="uname" name="uname" type="text" class="form-control" placeholder="Username" required />
                        </div>
                    </div>
                
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" id="rpassword" name="rpassword" class="form-control" placeholder="Password" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm Password" required />
                        </div>
                    </div>   

                    <div class="form-group">
                        <div class="input-group">
                            <input type="hidden" id="status" name="status" class="form-control" />
                        </div>
                    </div>   

                    <input type="file" name="USERIMAGE" id="USERIMAGE" accept="assets/img/userimages/*" required />   
                            
                    <div class="form-group text-center">
                        <div class="input-group">
                            <select id="pos" name="pos" class="form-control">                      
                                <option value="Admin">Admin</option>
                                <option value="Employee">Employee</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" id="signUpBtn" name='signUpBtn' class="btn btn-danger btn-lg login-button">Sign Up
                            
                        </button>
                    </div> -->

                    
                    
                </form>
            
                <div class="forget-pass">
                    <br><br> 
                </div>
            </div>
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

    <script type="text/javascript" src="assets/js/admin.js"></script>
    <script type="text/javascript" src="assets/js/announce.js"></script>
    <script type="text/javascript" src="assets/js/clock.js"></script> 
    <script type="text/javascript" src="assets/js/user_timeinout.js"></script>
   

    
<!-- 
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>