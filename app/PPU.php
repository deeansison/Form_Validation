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
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    <title>Kestrel-DDM</title>
</head>


<header>
    <!-- Static navbar -->
    <div class="container nav-cntainer">
    <!-- Static navbar -->
        <nav class="navbar navbar-default nav-cntents">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                        aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span id="openBtn" onclick="openNav()"><img src="assets/img/kestrellogo.png" alt=""></span>
                </div>
            <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle dt" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php
                            include('connection.php');
                            session_start();      
                            if(isset($_SESSION["password"])){  
                                $uname = $_SESSION["uname"];
                                $db = mysqli_connect("localhost","root","","special_project");
                                $sql = "SELECT user_image FROM user_credentials where username='$uname' ";
                                $result = mysqli_query($db,$sql);
                        
                                while($row=mysqli_fetch_array($result)){
                                    echo '<input id="user_img" name="user_img" type="hidden" class="form-control" value="'.$row["user_image"].'" > '; 
                                    echo "<img class='crd-img' src='".$row['user_image']."'width='10%' height='10%'>";
                                    echo'<input id="username" name="username" type="hidden" class="form-control" value="'.$_SESSION["username"].'" > ';
                                }
                            }  
                            
                            else{  
                                header("location:index.php");  
                            } 
                        ?>
                    </a>
                  
                    <ul class="dropdown-menu">
                        
                        <?php
                            echo '<li>';
                                echo '<a href="logout.php">Logout</a>';
                            echo '</li>';
                            
                            $uname = $_SESSION["username"];
                            $db = mysqli_connect("localhost","root","","special_project");
                            $sql = "SELECT * FROM user_credentials where username='$uname' ";
                            $result = mysqli_query($db,$sql);
                            while($row=mysqli_fetch_array($result)){
                                echo '<li>';
                                    echo "<a href='user_profile.php?view=".$row['username']." '>View Profile</a>";
                                echo '</li>';
                            }
                        ?>
                        
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>

                </li>
            </ul>
            </div>
            <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

</header>

<body>
 
 

    <!-- SIGN UP -->
    <div class="modal-dialog sign-up-modal ">
        <div class="modal-content">
            <div class="login-text">                     
                <h2>Update Employee</h2>
            </div>
          
            <div class="modal-body">

            <?php
                     
                     $uname = $_GET['edit'];
                     $db = mysqli_connect("localhost","root","","special_project");
                     $sql = "SELECT * FROM user_credentials where username='$uname' ";
                     $result = mysqli_query($db,$sql);
                     while($row=mysqli_fetch_array($result)){
                         
                         echo"<form method='post' action='insert.php' enctype='multipart/form-data'>";
                       
         
         
                         echo"<input id='uname' name='uname' type='hidden' class='form-control' placeholder='User Name' value='".$row['username']."' />";
         
                         // firstname
                         echo"<div class='form-group'>";
                         echo"<div class='input-group'>";
                         echo"<span class='input-group-addon'>";
                         echo"<span class='glyphicon glyphicon-user'></span>";
                         echo"</span>";
                         echo"<input id='fn' name='fn' type='text' class='form-control' placeholder='First Name' value='".$row['first_name']."' />";
                         echo"</div>";
                         echo"</div>";
         
                         // middlename
                         echo"<div class='form-group'>";
                         echo"<div class='input-group'>";
                         echo"<span class='input-group-addon'>";
                         echo"<span class='glyphicon glyphicon-user'></span>";
                         echo"</span>";
                         echo"<input id='mn' name='mn' type='text' class='form-control' placeholder='Middle Name' value='".$row['middle_name']."' />";
                         echo"</div>";
                         echo"</div>";
         
                         // lastname
                         echo"<div class='form-group'>";
                         echo"<div class='input-group'>";
                         echo"<span class='input-group-addon'>";
                         echo"<span class='glyphicon glyphicon-user'></span>";
                         echo"</span>";
                         echo"<input id='ln' name='ln' type='text' class='form-control' placeholder='Last Name' value='".$row['last_name']."' />";
                         echo"</div>";
                         echo"</div>";
         
                          // email-add
                          echo"<div class='form-group'>";
                          echo"<div class='input-group'>";
                          echo"<span class='input-group-addon'>";
                          echo"<span class='glyphicon glyphicon-envelope'></span>";
                          echo"</span>";
                          echo"<input id='ea' name='ea' type='text' class='form-control' placeholder='Email Add' value='".$row['email_address']."' />";
                          echo"</div>";
                          echo"</div>";
         
                          // mobile-num
                          echo"<div class='form-group'>";
                          echo"<div class='input-group'>";
                          echo"<span class='input-group-addon'>";
                          echo"<span class='glyphicon glyphicon-envelope'></span>";
                          echo"</span>";
                          echo"<input id='cn' name='cn' type='text' class='form-control' placeholder='Contact Number' value='".$row['contact_number']."' />";
                          echo"</div>";
                          echo"</div>";
         
                       
         
                          //image
                          echo"<img class='crd-img' src='".$row['user_image']."' width='30%;'>";
                          echo"<input type='hidden' id='img_name' name='img_name' value='".$row['user_image']."' class='form-control' />";
         
                          //image
                          echo" <input type='file' name='USERIMAGE' id='USERIMAGE' accept='assets/img/userimages/*'>";
         
                         //  //position
                         //  echo"<div class='form-group text-center'>";
                         //  echo"<div class='input-group'>";
                         //  echo"<select id='pos' name='pos'>";                      
                         //  echo"<option value='Admin'>Admin</option>";
                         //  echo"<option value='Employee'>Employee</option>";
                         //  echo"</select>";
                         //  echo"</div>";
                         //  echo"</div>";
         
                          //submit
                          echo"<div class='form-group text-center'>";
                          echo"<button type='submit' id='updateButton' name='updateButton' class='btn btn-danger btn-lg login-button'>UPDATE   
                          </button>";
                          echo"</div>";
         
                        //for modal
                          echo"<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Update PPU</button>";
                         
                         
         
                          //end
                          echo"</form>";
                     
                     }
                     ?>

            
            </div>
        </div>
    </div>



  




    <?php
                     
                     $uname = $_GET['edit'];
                     $db = mysqli_connect("localhost","root","","special_project");
                     $sql = "SELECT * FROM user_credentials where username='$uname' ";
                     $result = mysqli_query($db,$sql);
                     while($row=mysqli_fetch_array($result)){

                        //  username
                        // echo"<form method='post' action='insert.php' enctype='multipart/form-data'>";
                        echo"<input id='uname' name='uname' type='hidden' class='form-control' placeholder='User Name' value='".$row['username']."' />";
                        //   <!-- Modal -->
                          echo"<div class='modal fade' id='myModal' role='dialog'>";
                          echo"<div class='modal-dialog'>";
                            
                              // <!-- Modal content-->
                              echo"<div class='modal-content'>";
                              echo"<div class='modal-header'>";
                              echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                              echo"<h4 class='modal-title'>Modal Header</h4>";
                              echo"</div>";
                              echo"<div class='modal-body'>";
                               // username
                                    // echo"<div class='form-group'>";
                                    // echo"<div class='input-group'>";
                                    // echo"<span class='input-group-addon'>";
                                    // echo"<span class='glyphicon glyphicon-user'></span>";
                                    // echo"</span>";
                                    // echo"<input id='un' name='un' type='text' class='form-control' placeholder='User Name' value='".$row['username']."' />";
                                    // echo"</div>";
                                    // echo"</div>";
                                //position
                                    // echo"<div class='form-group text-center'>";
                                    // echo"<div class='input-group'>";
                                    // echo"<select id='pos' name='pos'>";                      
                                    // echo"<option value='Admin'>Admin</option>";
                                    // echo"<option value='Employee'>Employee</option>";
                                    // echo"</select>";
                                    // echo"</div>";
                                    // echo"</div>";
                                // password
                                    // echo"<div class='form-group'>";
                                    // echo"<div class='input-group'>";
                                    // echo"<span class='input-group-addon'>";
                                    // echo"<span class='glyphicon glyphicon-lock'></span>";
                                    // echo"</span>";
                                    // echo"<input id='rpassword' name='rpassword' type='text' class='form-control' placeholder='Password' value='".$row['password']."' />";
                                    // echo"</div>";
                                    // echo"</div>";

                                    echo"<p>Confirm first the password before updates</p>";
                                    // cpassword
                                    echo"<div class='form-group'>";
                                    echo"<div class='input-group'>";
                                    echo"<span class='input-group-addon'>";
                                    echo"<span class='glyphicon glyphicon-lock'></span>";
                                    echo"</span>";
                                    
                                    echo"<input id='password' name='password' type='text' class='form-control' placeholder='Password' required />";
                                    echo"</div>";
                                    echo"</div>";
                              echo"</div>";
                              echo"<div class='modal-footer'>";
                              echo"<h4 class='modal-title'>Note: If you update this section, the session will automatically destroy.</h4>";
                              
                              echo"<button type='submit' id='done' name='done' class='btn btn-danger btn-lg login-button'>DONE 
                              </button>";
                           
                                // echo"<button type='submit' id='updatePriv' name='updatePriv' class='btn btn-danger btn-lg login-button'>DONE 
                                // </button>";
                             

                              

                              
                              echo"</div>";
                              echo"</div>";
                              echo"</div>";
                              echo"</div>";
                            //   echo"</form>";
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

    <script type="text/javascript" src="assets/js/admin.js"></script>
    <script type="text/javascript" src="assets/js/data.js"></script>
   

    
<!-- 
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>