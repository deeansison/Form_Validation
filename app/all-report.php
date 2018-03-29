<?php
    include('connection.php');
?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/scroll.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</head>
<body>



<!-- HEADER -->
<header>


    <!-- ICON -->
        <div class="icon-bar-profile">
            <a href="adminvalidation.php" ><p id="ho">HOME</p><i class='fa fa-home'></i></a> 
            <a href="logout.php" ><p id="so">LOGOUT</p><i class='fa fa-sign-out'></i></a> 
        </div>
    <!-- END/ICON -->


    <!-- SESSION -->
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
    <!-- END/SESSION -->


</header>
<!-- END/HEADER -->

<!-- MAIN CONTENTS -->

<div class="row prof-main-cont">
   
   <!-- FOR EMPLOYEE DATA -->
   <div class="col-sm-8 emp-data-box">
<h2>blablabla</h2>



<input type="text" name="date_in" id="date_in" class="form-control" placeholder="from"/> 
<input type="text" name="date_out" id="date_out" class="form-control" placeholder="to" />  
<input type="button" name="filter" id="filter" value="FILTER!!!" class='btn btn-danger' /> 

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search name" title="Type in a name">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Date</th>
    <th style="width:40%;">Time In</th>
    <th style="width:40%;">Time Out</th>
  </tr>
  <?php
                   
                    $db = mysqli_connect("localhost","root","","special_project");
                    $sql = "SELECT * FROM t_in_out";
                 
                    $result = mysqli_query($db,$sql);
                    while($row=mysqli_fetch_array($result)){
                      
                        echo"<tr>";
                        echo"<td>".$row['username']."</td> ";
                        echo"<td>".$row['date_in']."</td> ";
                        echo"<td>".$row['time_in']."</td> ";
                        echo"<td>".$row['time_out']."</td> ";
                       
                        echo"</tr>"; 
                    }
                ?>
</table>

<form method='post' action='export.php'>
<input type="submit" name="export" value="DOWNLOAD !!!!" class='btn btn-danger' />                        
</form>

   

</div>
        <!-- END/FOR EMPLOYEE DATA -->

    </div>
    <!-- END/MAIN CONTENTS -->

 <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
        <script type="text/javascript" src="assets/js/filter.js"></script>
</body>
</html>