<?php

require('connection.php');



if(isset($_POST["date_in"], $_POST["date_out"])){

    $db = mysqli_connect("localhost","root","","special_project");
    $output='';
    $query="SELECT name, datein, timein, dateout, timeout, totaldays, totalhrs, totalmins, totalsecs, status
    FROM time_in_out_backup where archive_tinout='' AND add_in_out=''  AND datein BETWEEN '".$_POST["date_in"]."'  AND '".$_POST["date_out"]."' ";

    $result = mysqli_query($db,$query);

    $output .= '
    
    <table id="table"  class="order-table">
    <thead>
      <tr">
        <th>Name</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Total Days</th>
        <th>Total Time</th>
        <th>Status</th>
      </tr>
      </thead>
      <tbody>
  
    ';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .='

           <tr>
                <td>'.$row["name"].'</td> 
                <td>'.$row['datein']." : ".$row['timein'].'</td> 
                <td>'.$row['dateout']." : ".$row['timeout'].'</td>
                <td>'.$row["totaldays"].'</td> 
                <td>'.$row['totalhrs'].":".$row['totalmins'].":".$row['totalsecs'].'</td> 
                <td>'.$row['status'].'</td> 
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
            <td</td> 
            <td></td> 
         </tr>


         ';

    }
    $output .='</tbody></table>';
    echo $output;


}




if(isset($_POST["date_in1"], $_POST["date_out1"], $_POST['myInput'])){

  $emp=$_POST['myInput'];

  if($emp==''){
    $db = mysqli_connect("localhost","root","","special_project");
    $output='';
    // $query="SELECT username, datein, timein, dateout, timeout, totaldays, totalhrs, totalmins, totalsecs, status
    // FROM time_in_out_backup where archive_tinout='' AND datein BETWEEN '".$_POST["date_in1"]."'  AND
  
    // '".$_POST["date_out1"]."' ";
    



             

$query="SELECT 
user_credentials.first_name, 
user_credentials.last_name,
time_in_out_backup.datein, 
time_in_out_backup.timein, 
time_in_out_backup.dateout, 
time_in_out_backup.timeout ,
time_in_out_backup.totaldays, 
time_in_out_backup.totalhrs, 
time_in_out_backup.totalmins,
time_in_out_backup.totalsecs, 
time_in_out_backup.status,
time_in_out_backup.reason
FROM time_in_out_backup 
INNER JOIN user_credentials ON time_in_out_backup.username=user_credentials.username 
WHERE time_in_out_backup.archive_tinout='' AND time_in_out_backup.add_in_out='' AND time_in_out_backup.datein BETWEEN '".$_POST["date_in1"]."'  AND '".$_POST["date_out1"]."' 
ORDER BY time_in_out_backup.datein DESC";
    
    $result = mysqli_query($db,$query);

    $output .= '
    
    <table id="table">
    <thead>
      <tr">
        <th>Name</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Total Days</th>
        <th>Total Time</th>
        <th>Status</th>
      </tr>
      </thead>
      <tbody>
  
    ';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .='

           <tr>
                <td>'.$row["first_name"].' '.$row["last_name"].'</td> 
                <td>'.$row['datein']." : ".$row['timein'].'</td> 
                <td>'.$row['dateout']." : ".$row['timeout'].'</td>
                <td>'.$row["totaldays"].'</td> 
                <td>'.$row['totalhrs'].":".$row['totalmins'].":".$row['totalsecs'].'</td> 
                <td>'.$row['status'].'</td> 
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
            <td</td> 
            <td></td> 
         </tr>


         ';

    }
    $output .='</tbody></table>';
    echo $output;
  }








  else{
    $db = mysqli_connect("localhost","root","","special_project");
    $output='';
    // $query="SELECT name, datein, timein, dateout, timeout, totaldays, totalhrs, totalmins, totalsecs, 
    // status FROM time_in_out_backup where archive_tinout='' AND name='".$_POST["myInput"]."' AND datein BETWEEN '".$_POST["date_in1"]."'  AND
  
    // '".$_POST["date_out1"]."' ";
    
    

    
             

$query="SELECT 
user_credentials.first_name, 
user_credentials.last_name,
time_in_out_backup.datein, 
time_in_out_backup.timein, 
time_in_out_backup.dateout, 
time_in_out_backup.timeout ,
time_in_out_backup.totaldays, 
time_in_out_backup.totalhrs, 
time_in_out_backup.totalmins,
time_in_out_backup.totalsecs, 
time_in_out_backup.status,
time_in_out_backup.reason
FROM time_in_out_backup 
INNER JOIN user_credentials ON time_in_out_backup.username=user_credentials.username 
where time_in_out_backup.archive_tinout='' AND time_in_out_backup.add_in_out='' AND time_in_out_backup.username='".$_POST["myInput"]."' AND time_in_out_backup.datein BETWEEN '".$_POST["date_in1"]."'  AND '".$_POST["date_out1"]."' 
ORDER BY time_in_out_backup.datein DESC";



    $result = mysqli_query($db,$query);

    $output .= '
    
    <table id="table">
    <thead>
      <tr">
        <th>Name</th>
        <th>Time In</th>
        <th>Time Out</th>
        <th>Total Days</th>
        <th>Total Time</th>
        <th>Status</th>
      </tr>
      </thead>
      <tbody>
  
    ';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .='

           <tr>
                <td>'.$row["first_name"].' '.$row["last_name"].'</td> 
                <td>'.$row['datein']." : ".$row['timein'].'</td> 
                <td>'.$row['dateout']." : ".$row['timeout'].'</td>
                <td>'.$row["totaldays"].'</td> 
                <td>'.$row['totalhrs'].":".$row['totalmins'].":".$row['totalsecs'].'</td> 
                <td>'.$row['status'].'</td> 
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
            <td</td> 
            <td></td> 
         </tr>


         ';

    }
    $output .='</tbody></table>';
    echo $output;
  }
   


}








?>