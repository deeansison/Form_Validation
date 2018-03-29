<?php
 require('connection.php');

if(isset($_POST['export'])){

    $db = mysqli_connect("localhost","root","","special_project");
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

$output = fopen("php://output","w");

fputcsv($output, array('username', 'date_in', 'time_in', 'time_out'));
$query = "SELECT username, date_in, time_in, time_out FROM t_in_out";
$result = mysqli_query($db,$query);

while($row=mysqli_fetch_assoc($result)){

    fputcsv($output,$row);

}

fclose($output);
}








if(isset($_POST["date_in"], $_POST["date_out"])){

    $db = mysqli_connect("localhost","root","","special_project");
    $output='';
    $query="SELECT username, date_in, time_in, time_out FROM t_in_out where date_in BETWEEN '".$_POST["date_in"]."'  AND
  
    '".$_POST["date_out"]."' ";
    
    
    $result = mysqli_query($db,$query);

    $output .= "
    
    <table id='myTable'>
    <tr>
    <th width='10%'>USERNAME</th>
        <th width='10%'>Date</th>
        <th width='10%'>Time In</th>
        <th width='10%'>Time Out</th>
    </tr>
    
    
    
    
    ";

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){



            $output .='

           <tr>
            <td>'.$row["username"].'</td> 
           <td>'.$row["date_in"].'</td> 
           <td>'.$row["time_in"].'</td>
           <td>'.$row["time_out"].'</td> 
            </tr>


            ';

        }

    }

    else{


        $output .='

        <tr>
         <td>NOT EXIST</td> 
        
         </tr>


         ';

    }
    $output .='<table>';
    echo $output;


}

?>