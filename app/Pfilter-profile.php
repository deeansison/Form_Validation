<!-- FOR FILTERING THE USER PROFILE -->
<?php
    require('connection.php');


    if(isset($_POST["date_in"], $_POST["date_out"], $_POST["username_emp"])){

        $username_emp=$_POST["username_emp"];
        $db = mysqli_connect("localhost","root","","special_project");
        $output='';
        $query="SELECT username, datein, dateout, timein, timeout, totalhrs, totalmins, totalsecs, status FROM time_in_out_backup where  
        username='$username_emp' AND add_in_out='' AND datein BETWEEN '".$_POST["date_in"]."'  AND
    
        '".$_POST["date_out"]."' ORDER BY datein DESC";
    
        $result = mysqli_query($db,$query);

        $output .= '
        
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
    
        ';

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_array($result)){

                $output .="
                    <tr>
                        <td>".$row['datein']." ".$row['timein']."</td> 
                        <td>".$row['dateout']." ".$row['timeout']."</td>
                        <td>".$row['totalhrs'].":".$row['totalmins'].":".$row['totalsecs']."</td> 
                        <td>".$row['status']."</td> 
                    </tr>
                ";

            }

        }

        else{

            $output .='
                <tr>
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