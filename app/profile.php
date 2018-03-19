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
            <li><a href="admin.php">home |</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle dt" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php
                            include('connection.php');
                            session_start();      
                            if(isset($_SESSION["password"])){  
                                $uname = $_SESSION["username"];
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
                            $sql = "SELECT username FROM user_credentials where username='$uname' ";
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

<div class="row prof-main-row">

            <div class="col-sm-4 prof-emp-box">
                    <?php
                        $uname = $_GET['view'];
                        $db = mysqli_connect("localhost","root","","special_project");
                        $sql = "SELECT * FROM user_credentials where username='$uname'";
                       
                        $result = mysqli_query($db,$sql);
                  
                       
                        while($row=mysqli_fetch_array($result)){
                            echo"<div class='card'>";
                     
                            echo"<img class='crd-img' src='".$row['user_image']."' width='30%;'>";
                            echo"<div class='container'>";
                         
                            echo"<p>User Name: ".$row['username']."</p>";
                            echo"<p>Email Address ".$row['email_address']."</p>";
                            echo"<p>Contact Number ".$row['contact_number']."</p>";
                            echo"<p>Status: ".$row['status']."</p>";
                            echo"</div>";
                            echo" <h4><a href='userupdate.php?edit=".$row['username']."'>Update Info</a></h4>";
                            echo" <h4><a href='insert.php?deleteemp=".$row['username']."'>Delete Employee</a></h4>";
                            // echo" <h4><a href='insert.php?deleteemp=".$row['username']."'>Delete Employee</a></h4>";
                            echo"<button type='button' class='btn btn-danger btn-lg' data-toggle='modal' data-target='#myModal'>Update Security Settings</button>";
                            echo"</div>";


                             //for modal
                          
                            
                           
                        }
                    ?>

<?php
                     
                     $uname = $_GET['view'];
                     $db = mysqli_connect("localhost","root","","special_project");
                     $sql = "SELECT * FROM user_credentials where username='$uname' ";
                     $result = mysqli_query($db,$sql);
                     while($row=mysqli_fetch_array($result)){

                        //  username
                        echo"<form method='post' action='insert.php' enctype='multipart/form-data'>";
                        // echo"<input id='uname' name='uname' type='hidden' class='form-control' placeholder='User Name' value='".$row['username']."' />";
                        //   <!-- Modal -->
                          echo"<div class='modal fade' id='myModal' role='dialog'>";
                          echo"<div class='modal-dialog'>";
                            
                              // <!-- Modal content-->
                              echo"<div class='modal-content'>";
                              echo"<div class='modal-header'>";
                              echo"<button type='button' class='close' data-dismiss='modal'>&times;</button>";
                              echo"<h4 class='modal-title'>...</h4>";
                              echo"</div>";
                              echo"<div class='modal-body'>";
                               //username
                                    echo"<div class='form-group'>";
                                    echo"<div class='input-group'>";
                                    echo"<span class='input-group-addon'>";
                                    echo"<span class='glyphicon glyphicon-user'></span>";
                                    echo"</span>";
                                    echo"<input id='un' name='un' type='text' class='form-control' placeholder='New User Name' required/>";
                                    echo"</div>";
                                    echo"</div>";
                               
                                //password
                                    echo"<div class='form-group'>";
                                    echo"<div class='input-group'>";
                                    echo"<span class='input-group-addon'>";
                                    echo"<span class='glyphicon glyphicon-lock'></span>";
                                    echo"</span>";
                                    echo"<input id='rpassword' name='rpassword' type='password' class='form-control' placeholder='New Password' required />";
                                    echo"</div>";
                                    echo"</div>";
                                  
                                
                                 //position
                                 echo"<div class='form-group text-center'>";
                                 echo"<div class='input-group'>";
                                 echo"<h4 class='modal-title'>New Position</h4>";
                                 echo"<select id='pos' name='pos' class='form-control'>";                      
                                 echo"<option value='Admin'>Admin</option>";
                                 echo"<option value='Employee'>Employee</option>";
                                 echo"</select>";
                                 echo"</div>";
                                 echo"</div>";
                                 echo"<button type='submit' id='ok' name='ok' class='btn btn-danger btn-lg login-button'>OK 
                                 </button>";
   
                                    // cpassword
                                    echo"<div class='cpass hide'>";
                                    echo"<p>Confirm first the password before updates</p>";
                                    
                                    echo"<div class='form-group'>";
                                    echo"<div class='input-group'>";
                                    echo"<span class='input-group-addon'>";
                                    echo"<span class='glyphicon glyphicon-lock'></span>";
                                    echo"</span>";
                                    echo"<input id='uname' name='uname' type='hidden' class='form-control' placeholder='User Name' value='".$row['username']."' />";
                                    echo"<input id='password' name='password' type='password' class='form-control' placeholder='Old Password' required />";
                                
                                    echo"</div>";
                                    echo"<button type='submit' id='updatePriv' name='updatePriv' class='btn btn-danger btn-lg login-button'>UPDATE 
                                    </button>";
                                    echo"</div>";
                                    echo"</div>";
                                   


                              echo"</div>";
                              echo"<div class='modal-footer'>";
                              echo"<h4 class='modal-title'>Note: If you update this section, the session will automatically destroy.</h4>";
                              
                       
                             

                              
                           
                                // echo"<button type='submit' id='updatePriv' name='updatePriv' class='btn btn-danger btn-lg login-button'>DONE 
                                // </button>";
                             

                              

                              
                              echo"</div>";
                              echo"</div>";
                              echo"</div>";
                              echo"</div>";
                              echo"</form>";
                     }

                     ?>
            
            <!-- </div>
        </div>  
    </div> -->
    </div>
       
      
    <div class="col-sm-8 emp-data-box">
    <!-- <div class="employee-modal ">
        <div class="container body-container"> -->
        <!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Dates.."> -->
   
        <table id="customers">
        <tr>
    <th>Date</th>
    <th>Time In</th>
    <th>Time Out</th>
  </tr>
                    <?php
                        $uname = $_GET['view'];
                        $db = mysqli_connect("localhost","root","","special_project");
                        $sql = "SELECT * FROM t_in_out where username='$uname'";
                       
                        $result = mysqli_query($db,$sql);
                  
                       
                        while($row=mysqli_fetch_array($result)){
                      echo"<tr>";
                            echo"<td>".$row['date_in']."</td> ";
                            echo"<td>".$row['time_in']."</td>"; 
                            echo"<td>".$row['time_out']."</td> ";
                            echo"</tr>"; 
                       
                        }
                    ?>
</table>

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
    <script type="text/javascript" src="assets/js/data.js"></script>
    
    <script type="text/javascript" src="assets/js/update.js"></script>
   

    
<!-- 
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script> -->
</body>


</html>