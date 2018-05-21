<?php
    include('connection.php');
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/iconanimate.css">
    <link rel="stylesheet" href="assets/css/welcome.css">
    <link rel="stylesheet" href="assets/css/all-report.css">
    <link rel="stylesheet" href="assets/css/scroll.css">
    <link rel="stylesheet" href="assets/css/tooltip.css">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />

    <link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />

    
    <title>Kestrel-IMC</title>
</head>


<body>

<!-- HEADER -->
<header>

     <!-- ICON -->
    <div class="icon-bar-admin-report">
        <a href="adminvalidation.php" ><p id="bck">BACK</p><i class='fa fa-arrow-left faa-horizontal animated'></i></a>
    </div>
    <!-- END/ICON -->
    <div class="logo">
        <img src="assets/img/kestrellogo.png" alt="">
      
    </div>
    <h6><i class="fa fa-map-marker"></i> Daily Time Record (DTR) Reports</h6>
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
            header("location:logout.php");  
        } 
    ?>
    <!-- END/SESSION -->

</header>
<!-- END/HEADER -->

<!-- MAIN CONTENTS -->

<div class="row prof-main-cont-report">

<div class="col-sm-4">
    <div class="clear_dwnload_btn">
    <a href="time_in_out_edit.php">
    <button type="button" class="btn btn-info clear-rep">
        <i class="fa fa-clock-o lck_icon"></i>    
        TIME IN/OUT REQUEST</button>
                </a>
      
   
<form method='post' action='export.php'>   

        <!-- <button type="submit" name="exportall" id="exportall" class="btn btn-primary backup-rep">
            <i class="fa fa-download lck_icon"></i>
            DTR(BACKUP)
        </button>   -->
    </div>

    <div class="content2">
        <div class="fld">      
          <select class="form-control dropdown-filter" id='myInput' name='myInput' style='display:inline-block' onchange='myFunction()'>
            <option value ="">ALL EMPLOYEE</option>
                <?php
                    $db = mysqli_connect("localhost","root","","special_project");
                    $sql = "SELECT * FROM user_credentials where archive='' ";
                    $result = mysqli_query($db,$sql);
                        
                    while($row=mysqli_fetch_array($result)){
                        echo'<option value="'.$row["username"].'">'.$row["first_name"].' '.$row["last_name"].'</option>';
                    }
                                                
                ?>
            </select>
        </div>
    </div>
        
    <div class="content2">
        <div class="fld">
            <button type="submit" name="export" id="export" class="btn btn-primary btn-download">
                <i class="fa fa-download lck_icon"></i>
            DOWNLOAD</button>  
        </div> 
    </div>

    <div class="content2">
        <div class="fld">
            <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="date_in1" name="date_in1" placeholder="From *"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                    <div class="lck">
                        <i class="fa fa-calendar lck_icon"></i>
                    </div>
                </label>
            </span>
        </div>
    </div>

    <div class="content2">
        <div class="fld">
            <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="date_out1" name="date_out1" placeholder="To *"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                </label>
            </span>
        </div> 
    </div>

    <div class="content2">
        <div class="fld">
            <button type="submit" name="download" id="download" class="btn btn-primary btn-download">
            <i class="fa fa-download lck_icon"></i>
            DOWNLOAD</button>
        </div>
    </div>

</form>

<div class="content2">

    <button type="submit" name="filter1" id="filter1" class="btn btn-primary  btn-filter">
        <i class="fa fa-filter lck_icon"></i>
    FILTER</button>

    <form><button type="submit" onClick="window.location.reload()" class="btn btn-primary btn-refresh tooltip-left" data-tooltip='Click to Refresh'>
        <i class="fa fa-refresh fa-spin"></i>
    </button></form>

</div> 
                        

<!-- <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-clock-o"></i> ADD TIME IN/OUT</h4>
                <a href="time_in_out_edit.php">
                    <p class="edit-view-announcement"> 
                    TIME OUT EMPLOYEE</p>
                </a>
            </div>
            <div class="modal-body clear-bod">
                <div class="clear_dwnload_btn">
                    <div class="fld">
                        <span class="input input--hoshi">
                            <select class="form-control dropdown-filter" id='name' name='name' style='display:inline-block' required/>
                        
                                <option value ="">SELECT EMPLOYEE</option> -->
                                <?php
                                                
                                    // $db = mysqli_connect("localhost","root","","special_project");
                                    // $sql = "SELECT * FROM user_credentials where archive='' ";
                                    // $result = mysqli_query($db,$sql);
                                                            
                                    // while($row=mysqli_fetch_array($result)){
                                    //     echo' <option value="'.$row["username"].'">'.$row["first_name"].' '.$row["last_name"].'</option>';
                                        
                                    // }                   
                                ?>
                            <!-- </select>   
                        </span>
                    </div>
                </div>

                <div class="clear_dwnload_btn">
                    <div class="fld">
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="text" id="date_in" name="date_in" placeholder="Date *"/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <div class="lck">
                                    <i class="fa fa-calendar lck_icon"></i>
                                </div>
                            </label>
                        </span>
                    </div>
                </div>

                <div class="msg_cont-reports">
                    <i class="fa fa-clock-o lck_icon"></i> <span class="need-admin-val">TIME IN: </span>
                </div>

                <div class="clear_dwnload_btn">
                    <div class="fld">
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="time" id="time_in" name="time_in"  placeholder="TO *" autocomplete="off" required/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <div class="lck">
                                    <i class=""></i>
                                </div>
                            </label>
                        </span>
                    </div>
                </div>

                <div class="msg_cont-reports">
                    <i class="fa fa-clock-o lck_icon"></i> <span class="need-admin-val">TIME OUT: </span>
                </div>

                <div class="clear_dwnload_btn">
                    <div class="fld">
                        <span class="input input--hoshi">
                            <input class="input__field input__field--hoshi" type="time" id="time_out" name="time_out"  placeholder="TO *" autocomplete="off" required/>
                            <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                                <div class="lck">
                                    <i class=""></i>
                                </div>
                            </label>
                        </span>
                    </div>
                </div>
       
                <button type="button" name="add_inout" id="add_inout" class="btn btn-primary btn-clear">
                <i class=""></i>ADD</button>
                        
            </div>                   
        </div>
    </div>
</div> -->
</div>

    
 <div class="col-sm-8">     
    <div class="table-responsive"> 
        <table id="table">
            <thead>
                <tr>
                <th style='display:none'>Name</th>
                    <th>Name</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Total Days</th>
                    <th>Total Time</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    
                    $db = mysqli_connect("localhost","root","","special_project");
                    // $sql = "SELECT * FROM time_in_out_backup where archive_tinout='' ORDER BY datein DESC";
                    $sql="SELECT 
                    user_credentials.first_name, 
                    user_credentials.last_name,
                    time_in_out_backup.username, 
                    time_in_out_backup.datein, 
                    time_in_out_backup.timein, 
                    time_in_out_backup.dateout, 
                    time_in_out_backup.timeout ,
                    time_in_out_backup.totaldays, 
                    time_in_out_backup.totalhrs, 
                    time_in_out_backup.totalmins,
                    time_in_out_backup.totalsecs, 
                    time_in_out_backup.status
                    FROM time_in_out_backup 
                    INNER JOIN user_credentials ON time_in_out_backup.username=user_credentials.username 
                    where time_in_out_backup.archive_tinout='' AND time_in_out_backup.add_in_out=''
                     ORDER BY time_in_out_backup.datein DESC";
                    $result = mysqli_query($db,$sql);
                    while($row=mysqli_fetch_array($result)){
                        
                        echo"<tr>";
                        echo"<td style='display:none'>".$row['username']."</td> ";
                            echo"<td value".$row['username'].">".$row['first_name']." ".$row['last_name']."</td> ";
                            echo"<td>".$row['datein']." : ".$row['timein']."</td> ";
                            echo"<td>".$row['dateout']." : ".$row['timeout']."</td> ";
                            echo"<td>".$row['totaldays']."</td> ";
                            echo"<td>".$row['totalhrs'].":".$row['totalmins'].":".$row['totalsecs']."</td> ";
                            echo"<td>".$row['status']."</td> ";
                        echo"</tr>"; 
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
                    
<div class="footer-report">
    <p>Copyright © 2018 Kestrel IMC Corp. All rights reserved.</p>
</div>

 <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


        <script type="text/javascript" src="assets/js/filter.js"></script>
        <script type="text/javascript" src="assets/js/add_tin_tout.js"></script>
        <!-- <script type="text/javascript" src="assets/js/try.js"></script> -->



</body>