<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="stylesheet" href="assets/css/reminders.css">
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>

<?php
    require('connection.php');

    //APPROVE OT REQUEST
    if(isset($_POST['approve_ot_req'])){

        $ot_req_date  =   $_POST['ot_req_date'];
        $ot_now_date  =   $_POST['ot_now_date'];
        $ot_req_time  =   $_POST['ot_req_time'];
        $OT_id  =   $_POST['OT_id'];
        $username  =   $_POST['username'];
        $username_emp  =   $_POST['username_emp'];
        $ot_req_timein =   $_POST['ot_req_timein'];
        $reason =   $_POST['reason'];
        $name_emp =   $_POST['name_emp'];


        $to =   $_POST['email_OT'];
        $headers = 'From: aa4189412@gmail.com';
        $subject = "APPROVED REQUEST OF OVERTIME";
        $message = 
        'REQUEST OF OVERTIME IS APPROVED BY: '.$_POST["name_emp"].'
            Reason: '.$_POST["reason"].' 
            From 18:00 To: '.$_POST["ot_req_timein"].'
        ';
       

        $date1 = $ot_now_date; 
        $time1 = '18:00:00';
        $date2 = $ot_req_date; 
        $time2 = $ot_req_time;
        
        $before = strtotime($date1 . " " . $time1);
        $after = strtotime($date2 . " " . $time2);
        $diff = $after - $before;

        if(mail($to,$subject,$message,$headers))

        $days_of_OT = floor(abs($before - $after) / 86400);
        $hours = floor($diff / 3600);
        $minutes = floor(($diff - $hours * 3600) / 60);
        $seconds = $diff - $hours * 3600 - $minutes * 60;

        $connection->query("UPDATE request_ot SET verified_by = '".$username."' , status = 'APPROVED' WHERE OT_id='$OT_id' ");

        // FOR BACKUP
        $connection->query("INSERT INTO time_in_out_backup (username,timein,datein,timeout,dateout,totaldays,totalhrs,totalmins,totalsecs,status,reason,archive_tinout, add_in_out) 
        VALUES ('$username_emp','$ot_req_timein','$ot_now_date','$ot_req_time','$ot_req_date','$days_of_OT','$hours','$minutes','$seconds','OVERTIME','$reason','', '')");
            
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
        swal({
            title: "OVERTIME REQUEST APPROVED",
            type: "success",
            showConfirmButton:false,
        });';
        echo '},);</script>';

        echo "<script>setTimeout(\"location.href = 'show_request.php';\",2000);</script>";
    }
    //END/APPROVE OT REQUEST


    //APPROVE LEAVE REQUEST
    if(isset($_POST['approve_leave_req'])){

        $leave_ID  =   $_POST['leave_ID'];
        $username  =   $_POST['username'];
        $start_leave  =   $_POST['start_leave'];
        $end_leave  =   $_POST['end_leave'];
        $reason =   $_POST['reason'];
        $name_emp =   $_POST['name_emp'];
        $username_emp  =   $_POST['username_emp'];
        $to =   $_POST['email_leave'];
        $headers = 'From: aa4189412@gmail.com';
        $subject = "APPROVED REQUEST OF LEAVE";
        $message = 
        'REQUEST OF LEAVE IS APPROVED BY: '.$_POST["name_emp"].'
            Reason: '.$_POST["reason"].' 
            Start Date: '.$_POST["start_leave"].'
            End Date: '.$_POST["end_leave"].'
        ';

       
        
    
        $date1 = $start_leave; 
        $time1 = '00:00:00';
        $date2 = $end_leave; 
        $time2 = '00:00:00';
     
        $before = strtotime($date1 . " " . $time1);
        $after = strtotime($date2 . " " . $time2);
    
        $before = strtotime($date1 . " " . $time1);
        $after = strtotime($date2 . " " . $time2);
        $diff = $after - $before;

        $days_ofleave = floor(abs($before - $after) / 86400);
        $hours = floor($diff / 3600);
        $minutes = floor(($diff - $hours * 3600) / 60);
        $seconds = $diff - $hours * 3600 - $minutes * 60;

        if(mail($to,$subject,$message,$headers))

        $connection->query("UPDATE request_leave SET verified_by = '".$username."' , status = 'APPROVED' WHERE leave_ID='$leave_ID' ");
        // FOR BACKUP
        $connection->query("INSERT INTO time_in_out_backup (username,timein,datein,timeout,dateout,totaldays,totalhrs,totalmins,totalsecs,status,reason,archive_tinout, add_in_out) 
        VALUES ('$username_emp','00:00:00', '$start_leave','00:00:00','$end_leave','$days_ofleave','$hours','$minutes','$seconds','ON LEAVE','$reason','', '')");
     
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
        swal({
            title: "LEAVE REQUEST APPROVED",
            type: "success",
            showConfirmButton:false,
        });';
        echo '},);</script>';

        echo "<script>setTimeout(\"location.href = 'show_request.php';\",2000);</script>";
    

    }
    //END/APPROVE LEAVE REQUEST

    //APPROVE WFH REQUEST
    if(isset($_POST['approve_wfh_req'])){

        $wfh_ID  =   $_POST['wfh_ID'];
        $username  =   $_POST['username'];
        $date_wfh  =   $_POST['date_wfh'];
        $timein_wfh  =   $_POST['timein_wfh'];
        $timeout_wfh  =   $_POST['timeout_wfh'];
        $reason =   $_POST['reason'];
        $name_emp =   $_POST['name_emp'];
        $username_emp  =   $_POST['username_emp'];

        $to =   $_POST['email_wfh'];
        $headers = 'From: aa4189412@gmail.com';
        $subject = "APPROVED REQUEST OF WORK FROM HOME";
        $message = 
        'REQUEST OF WORK FROM HOME IS APPROVED BY: '.$_POST["name_emp"].'
            Reason: '.$_POST["reason"].' 
            Date : '.$_POST["date_wfh"].' 
            From: '.$_POST["timein_wfh"].'
            To: '.$_POST["timeout_wfh"].'
        ';


        $date1 = $date_wfh; 
        $time1 = $timein_wfh;
        $date2 = $date_wfh; 
        $time2 = $timeout_wfh;
        
        $before = strtotime($date1 . " " . $time1);
        $after = strtotime($date2 . " " . $time2);
    
        $before = strtotime($date1 . " " . $time1);
        $after = strtotime($date2 . " " . $time2);
        $diff = $after - $before;
        
        $days_ofwfh = floor(abs($before - $after) / 86400);
        $hours = floor($diff / 3600);
        $minutes = floor(($diff - $hours * 3600) / 60);
        $seconds = $diff - $hours * 3600 - $minutes * 60;

        if(mail($to,$subject,$message,$headers))

        $connection->query("UPDATE request_wfh SET verified_by = '".$username."' , status = 'APPROVED' WHERE wfh_ID='$wfh_ID' ");
    
         // FOR BACKUP
         $connection->query("INSERT INTO time_in_out_backup (username,timein,datein,timeout,dateout,totaldays,totalhrs,totalmins,totalsecs,status,reason,archive_tinout, add_in_out) 
         VALUES ('$username_emp','$timein_wfh', '$date_wfh','$timeout_wfh','$date_wfh','$days_ofwfh','$hours','$minutes','$seconds','WORK FROM HOME','$reason','', '')");
      
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
        swal({
            title: "WORK FROM HOME REQUEST APPROVED",
            type: "success",
            showConfirmButton:false,
        });';
        echo '},);</script>';

        echo "<script>setTimeout(\"location.href = 'show_request.php';\",2000);</script>";
        
    }
    //END/APPROVE WFH REQUEST

    //OT REJECT
    if(isset($_POST['reject_ot_req'])){

        $OT_id  =   $_POST['OT_id'];
        $username  =   $_POST['username'];

        $to =   $_POST['email_OT'];
        $headers = 'From: aa4189412@gmail.com';
        $subject = "REJECTED REQUEST OF OVERTIME";
        $message = 
        'REQUEST OF OVERTIME IS REJECTED BY: '.$_POST["name_emp"].'
            Reason: '.$_POST["reason"].' 
            From 18:00 To: '.$_POST["ot_req_timein"].'
        ';

        if(mail($to,$subject,$message,$headers))
        
      
        
        $connection->query("UPDATE request_ot SET verified_by='".$username."' , status='REJECTED' WHERE OT_id='$OT_id'");

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
                swal({
                    title: "OVERTIME REQUEST REJECTED",
                    type: "error",
                    showConfirmButton:false,
                });';
        echo '},);</script>';
        echo "<script>setTimeout(\"location.href = 'show_request.php';\",2000);</script>";     
    }
    //END/OT REJECT

    //LEAVE REJECT
    if(isset($_POST['reject_leave_req'])){

        $leave_ID  =   $_POST['leave_ID'];
        $username  =   $_POST['username'];

        $to =   $_POST['email_leave'];
        $headers = 'From: aa4189412@gmail.com';
        $subject = "REJECTED REQUEST OF LEAVE";
        $message = 
        'REQUEST OF LEAVE IS REJECTED BY: '.$_POST["name_emp"].'
            Reason: '.$_POST["reason"].' 
            Start Date: '.$_POST["start_leave"].'
            End Date: '.$_POST["end_leave"].'
        ';

        if(mail($to,$subject,$message,$headers))

       
        // $connection->query( "DELETE FROM request_leave where leave_ID='$leave_ID'");
        $connection->query("UPDATE request_leave SET verified_by='".$username."' , status='REJECTED' WHERE leave_ID='$leave_ID'");
                
        echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                swal({
                    title: "LEAVE REQUEST REJECTED",
                    type: "error",
                    showConfirmButton:false,
            });';
        echo '},);</script>';
        echo "<script>setTimeout(\"location.href = 'show_request.php';\",2000);</script>";
                
    }
    //END/LEAVE REJECT

    //WORK FROM HOME
    if(isset($_POST['reject_wfh_req'])){

        $wfh_ID  =   $_POST['wfh_ID'];
        $username  =   $_POST['username'];

        $to =   $_POST['email_wfh'];
        $headers = 'From: aa4189412@gmail.com';
        $subject = "REJECTED REQUEST OF WORK FROM HOME";
        $message = 
        'REJECTED OF WORK FROM HOME IS APPROVED BY: '.$_POST["name_emp"].'
            Reason: '.$_POST["reason"].' 
            Date : '.$_POST["date_wfh"].' 
            From: '.$_POST["timein_wfh"].'
            To: '.$_POST["timeout_wfh"].'
        ';

        
        if(mail($to,$subject,$message,$headers))
        
        $connection->query("UPDATE request_wfh SET verified_by='".$username."' , status='REJECTED' WHERE wfh_ID='$wfh_ID'");
                
                
        echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                swal({
                    title: "WORK FROM HOME REQUEST REJECTED",
                    type: "error",
                    showConfirmButton:false,
            });';
        echo '},);</script>';
        echo "<script>setTimeout(\"location.href = 'show_request.php';\",2000);</script>";
    }
    //END/WORK FROM HOME

    
if(isset($_GET['retrieve'])){


    $OT_id = $_GET['retrieve'];
    
    $db = mysqli_connect("localhost","root","","special_project");
    $sql = "SELECT status FROM request_ot where OT_id='$OT_id' ";
    $result = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($result)){
  
        $status   = $row['status'];
       
        $connection->query("UPDATE request_ot SET  status = 'PENDING' WHERE OT_id='$OT_id' ");
    
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            swal({
            title: "Overtime Request Retrieve",
            type: "success",
            showConfirmButton:false,
            });';
        echo '},);</script>';
        
        echo "<script>setTimeout(\"location.href = 'archive.php';\",2000);</script>";
    }
    
}


  
if(isset($_GET['retrieve_leave'])){


    $leave_ID = $_GET['retrieve_leave'];
    
    $db = mysqli_connect("localhost","root","","special_project");
    $sql = "SELECT status FROM request_leave where leave_ID='$leave_ID' ";
    $result = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($result)){
  
        $status   = $row['status'];
       
        $connection->query("UPDATE request_leave SET  status = 'PENDING' WHERE leave_ID='$leave_ID' ");
    
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            swal({
            title: "Leave Request Retrieve",
            type: "success",
            showConfirmButton:false,
            });';
        echo '},);</script>';
        
        echo "<script>setTimeout(\"location.href = 'archive.php';\",2000);</script>";
    }
    
}



if(isset($_GET['retrieve_wfh'])){


    $wfh_ID = $_GET['retrieve_wfh'];
    
    $db = mysqli_connect("localhost","root","","special_project");
    $sql = "SELECT status FROM request_wfh where wfh_ID='$wfh_ID' ";
    $result = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($result)){
  
        $status   = $row['status'];
       
        $connection->query("UPDATE request_wfh SET  status = 'PENDING' WHERE wfh_ID='$wfh_ID' ");
    
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            swal({
            title: "Work From Home Request Retrieve",
            type: "success",
            showConfirmButton:false,
            });';
        echo '},);</script>';
        
        echo "<script>setTimeout(\"location.href = 'archive.php';\",2000);</script>";
    }
    
}


//SEARCH
if(isset($_POST["search"])){

    $db = mysqli_connect("localhost","root","","special_project");
    $output='';
   
    $query="SELECT name, status, send_date, req_for_OT, OT_id
    FROM request_OT where status='PENDING' AND name='".$_POST["search"]."'";
    $query1="SELECT name, status, send_date, req_for_leave, leave_ID
    FROM request_leave where status='PENDING' AND name='".$_POST["search"]."'";
    $query2="SELECT name, status, send_date, req_for_wfh, wfh_ID
    FROM request_wfh where status='PENDING' AND name='".$_POST["search"]."'";

    $output='<table id="table"> 

    <tbody>
    ';
        $result = mysqli_query($db,$query);

        
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .='

            <tr>
                    <td>'.$row["name"].'</td> 
                    <td>'.$row['status'].'</td> 
                    <td>'.$row['send_date'].'</td>
                    <td>'.$row["req_for_OT"].'</td> 
                    <td class="edit-delete-column-body">
                        <a id="edit-row" href="OT_requestedit.php?OT_id='.$row["OT_id"].' ">
                        <i class="fa fa-edit"></i>VIEW</a>
                        <br>
                    </td>  
                
                </tr>

                ';

            }

        }


        $result1 = mysqli_query($db,$query1);

        if(mysqli_num_rows($result1) > 0){

            while($row1 = mysqli_fetch_array($result1)){

                $output .='

            <tr>
                    <td>'.$row1["name"].'</td> 
                    <td>'.$row1['status'].'</td> 
                    <td>'.$row1['send_date'].'</td>
                    <td>'.$row1["req_for_leave"].'</td> 
                    <td class="edit-delete-column-body">
                        <a id="edit-row" href="leave_requestedit.php?leave_ID='.$row1["leave_ID"].' ">
                        <i class="fa fa-edit"></i>VIEW</a>
                        <br>
                    </td>  
                
                </tr>

                ';

            }

        }

        $result2 = mysqli_query($db,$query2);

        if(mysqli_num_rows($result2) > 0){

            while($row2 = mysqli_fetch_array($result2)){

                $output .='

            <tr>
                    <td>'.$row2["name"].'</td> 
                    <td>'.$row2['status'].'</td> 
                    <td>'.$row2['send_date'].'</td>
                    <td>'.$row2["req_for_wfh"].'</td> 
                    <td class="edit-delete-column-body">
                        <a id="edit-row" href="wfh_requestedit.php?wfh_ID='.$row2["wfh_ID"]. ' ">
                        <i class="fa fa-edit"></i>VIEW</a>
                        <br>
                    </td>  
                
                </tr>

                ';

            }

        }


        else{

            $output .='

            <tr>
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
            </tr>


            ';

        }

    $output .='</tbody></table>';
    echo $output;

}


//SEARCH
if(isset($_POST["search_rejected"])){

    $db = mysqli_connect("localhost","root","","special_project");
    $output='';
   
    $query="SELECT name, status, send_date, req_for_OT, OT_id
    FROM request_OT where status='REJECTED' AND name='".$_POST["search_rejected"]."'";
    $query1="SELECT name, status, send_date, req_for_leave, leave_ID
    FROM request_leave where status='REJECTED' AND name='".$_POST["search_rejected"]."'";
    $query2="SELECT name, status, send_date, req_for_wfh, wfh_ID
    FROM request_wfh where status='REJECTD' AND name='".$_POST["search_rejected"]."'";


    $output='<table id="table"> 

    <tbody>
    ';
        $result = mysqli_query($db,$query);

        
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .='

            <tr>
                    <td>'.$row["name"].'</td> 
                    <td>'.$row['status'].'</td> 
                    <td>'.$row['send_date'].'</td>
                    <td>'.$row["req_for_OT"].'</td> 
                    <td class="edit-delete-column-body">
                        <a id="retrieve-row" href="form_request.php?retrieve='.$row["OT_id"].'">
                        <i class="fa fa-edit"></i>RETRIEVE</a>
                        <br>
                    </td>
                </tr>

                ';

            }

        }


        $result1 = mysqli_query($db,$query1);

        if(mysqli_num_rows($result1) > 0){

            while($row1 = mysqli_fetch_array($result1)){

                $output .='

            <tr>
                    <td>'.$row1["name"].'</td> 
                    <td>'.$row1['status'].'</td> 
                    <td>'.$row1['send_date'].'</td>
                    <td>'.$row1["req_for_leave"].'</td> 
                    <td class="edit-delete-column-body">
                        <a id="retrieve-row" href="form_request.php?retrieve_leave='.$row["leave_ID"].'">
                        <i class="fa fa-edit"></i>RETRIEVE</a>
                        <br>
                    </td>
                </tr>

                ';

            }

        }

        $result2 = mysqli_query($db,$query2);

        if(mysqli_num_rows($result2) > 0){

            while($row2 = mysqli_fetch_array($result2)){

                $output .='

            <tr>
                    <td>'.$row2["name"].'</td> 
                    <td>'.$row2['status'].'</td> 
                    <td>'.$row2['send_date'].'</td>
                    <td>'.$row2["req_for_wfh"].'</td> 
                    <td class="edit-delete-column-body">
                        <a id="retrieve-row" href="form_request.php?retrieve_wfh='.$row["wfh_ID"].'">
                        <i class="fa fa-edit"></i>RETRIEVE</a>
                        <br>
                    </td>
                </tr>

                ';

            }

        }


        else{

            $output .='

            <tr>
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
            </tr>


            ';

        }
    $output .='</tbody></table>';
    echo $output;

}

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>