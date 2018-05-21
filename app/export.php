<?php
    require('connection.php');

    //EXPORT DATA FOR BACK-UP
    if(isset($_POST['exportall'])){

        $db = mysqli_connect("localhost","root","","special_project");
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=K.IMC[DTR(BACKUP)].csv');
        $output = fopen("php://output","w");
        fputcsv($output, array('first_name', 'last_name', 'date in', 'time in', 'date out', 'time out',  'total days', 'total hours', 'total mins', 'total secs', 'status', 'reason'));
            
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
        WHERE time_in_out_backup.add_in_out=''
        ORDER BY time_in_out_backup.datein DESC";
        
        $result = mysqli_query($db,$query);

        while($row=mysqli_fetch_assoc($result)){
            fputcsv($output,$row);
        }
        fclose($output);
    }


    if(isset($_POST['download'], $_POST["date_in1"], $_POST["date_out1"])){
 
        $datein=$_POST["date_in1"];
        $dateout=$_POST["date_out1"];
        $username_emp=$_POST['myInput'];


        //BETWEEN DATE
        if($username_emp==''){
            $db = mysqli_connect("localhost","root","","special_project");
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=K.IMC('.$datein.'-'.$dateout.'/DTR).csv');
            $output1 = fopen("php://output","w");

            fputcsv($output1, array('first_name', 'last_name', 'date_in', 'time_in', 'time_out', 'date_out', 'total days',  'total hours', 
            'total mins', 'total secs', 'status', 'reason'));
   
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
            WHERE  time_in_out_backup.add_in_out='' AND time_in_out_backup.datein BETWEEN  '".$_POST["date_in1"]."'  AND '".$_POST["date_out1"]."' 
            ORDER BY time_in_out_backup.datein DESC";

            $result = mysqli_query($db,$query);
                while($row=mysqli_fetch_assoc($result)){
                    fputcsv($output1,$row);
                }
                fclose($output1);
            }
    
        //BETWEEN DATE AND BASE ON SELECTED EMPLOYEE
        else{
            $db = mysqli_connect("localhost","root","","special_project");
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=K.IMC('.$datein.'-'.$dateout.'/'.$username_emp.'/DTR).csv' );
            $output1 = fopen("php://output","w");

            fputcsv($output1, array('first_name', 'last_name', 'date_in', 'time_in', 'time_out', 'date_out', 'total days',  
            'total hours', 'total mins', 'total secs', 'status', 'reason'));
           
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
            WHERE  time_in_out_backup.add_in_out='' AND time_in_out_backup.username='$username_emp'  
            AND  time_in_out_backup.datein BETWEEN  '".$_POST["date_in1"]."'  AND '".$_POST["date_out1"]."'
            ORDER BY time_in_out_backup.datein DESC";

            $result = mysqli_query($db,$query);

            while($row=mysqli_fetch_assoc($result)){
                fputcsv($output1,$row);
            }

            fclose($output1);
        }
          
    }



    //EXPORT DATA BASED ON EMPLOYEE SELECTED
    if(isset($_POST['export'])){

        $name  =   $_POST['myInput'];

        if($name==''){
            
            $db = mysqli_connect("localhost","root","","special_project");
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=K.IMC(DTR).csv');
            $output = fopen("php://output","w");
            fputcsv($output, array('first_name','last_name', 'date_in', 'time_in', 'time_out', 'date_out', 'total days', 'total hours', 
            'total mins', 'total secs', 'status'));

            // $query = "SELECT name, datein, timein, dateout, timeout, totaldays, totalhrs , totalmins, totalsecs, status FROM time_in_out_backup WHERE archive_tinout='' ";
           
           
            
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
            WHERE  time_in_out_backup.add_in_out=''
             ORDER BY time_in_out_backup.datein DESC";

            $result = mysqli_query($db,$query);
        
                while($row=mysqli_fetch_assoc($result)){
        
                    fputcsv($output,$row);
        
                }
        
                fclose($output);
            
        }


        else{
            $db = mysqli_connect("localhost","root","","special_project");
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=K.IMC('.$name.'/DTR).csv');
            $output = fopen("php://output","w");

            fputcsv($output, array('first_name', 'last_name', 'date_in', 'time_in', 'time_out', 'date_out', 'total days',  'total hours', 'total mins', 'total secs', 'status', 'reason'));
            // $query = "SELECT name, datein, timein, dateout, timeout, totaldays, totalhrs , totalmins, totalsecs, status FROM time_in_out_backup where name='$name' AND archive_tinout=''";





            

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
WHERE  time_in_out_backup.add_in_out='' AND  time_in_out_backup.username='$name' 
ORDER BY time_in_out_backup.datein DESC";







            $result = mysqli_query($db,$query);
    
            while($row=mysqli_fetch_assoc($result)){
    
                fputcsv($output,$row);
    
            }

            
        fclose($output);
        }

   

    }







?>