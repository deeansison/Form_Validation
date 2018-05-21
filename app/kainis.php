<?php


require('connection.php');



// if(isset($_POST["search_rejected"])){

//     $db = mysqli_connect("localhost","root","","special_project");
//     $output='';
//     // $query = "SELECT name FROM request_OT where status='REJECTED' ORDER BY OT_id DESC";
//                     // $sql2 = "SELECT name, status, send_date, req_for_leave, leave_ID FROM request_leave where status='PENDING' ORDER BY leave_ID DESC";
//                     // $sql3 = "SELECT name, status, send_date, req_for_wfh, wfh_ID FROM request_wfh where status='PENDING' ORDER BY wfh_ID DESC";
//     $query="SELECT name, status, send_date, req_for_OT
//     FROM request_OT where status='REJECTED' AND name='".$_POST["search_rejected"]."'";
//     $query1="SELECT name, status, send_date, req_for_leave
//     FROM request_leave where status='REJECTED' AND name='".$_POST["search_rejected"]."'";
//     $query2="SELECT name, status, send_date, req_for_wfh
//     FROM request_wfh where status='REJECTED' AND name='".$_POST["search_rejected"]."'";


// $output='<table id="table"> 

// <tbody>
// ';
//     $result = mysqli_query($db,$query);

    
//     if(mysqli_num_rows($result) > 0){

//         while($row = mysqli_fetch_array($result)){

//             $output .='

//            <tr>
//                 <td>'.$row["name"].'</td> 
//                 <td>'.$row['status'].'</td> 
//                 <td>'.$row['send_date'].'</td>
//                 <td>'.$row["req_for_OT"].'</td> 
               
//             </tr>

//             ';

//         }

//     }


//     $result1 = mysqli_query($db,$query1);

//     if(mysqli_num_rows($result1) > 0){

//         while($row1 = mysqli_fetch_array($result1)){

//             $output .='

//            <tr>
//                 <td>'.$row1["name"].'</td> 
//                 <td>'.$row1['status'].'</td> 
//                 <td>'.$row1['send_date'].'</td>
//                 <td>'.$row1["req_for_leave"].'</td> 
               
//             </tr>

//             ';

//         }

//     }

//     $result2 = mysqli_query($db,$query2);

//     if(mysqli_num_rows($result2) > 0){

//         while($row2 = mysqli_fetch_array($result2)){

//             $output .='

//            <tr>
//                 <td>'.$row2["name"].'</td> 
//                 <td>'.$row2['status'].'</td> 
//                 <td>'.$row2['send_date'].'</td>
//                 <td>'.$row2["req_for_wfh"].'</td> 
               
//             </tr>

//             ';

//         }

//     }


//     else{

//         $output .='

//         <tr>
//             <td></td> 
//             <td></td> 
//             <td></td> 
//             <td></td> 
//             <td></td> 
//          </tr>


//          ';

//     }
//     $output .='</tbody></table>';
//     echo $output;


// }









//SEARCH
if(isset($_POST["search"])){

    $db = mysqli_connect("localhost","root","","special_project");
    $output='';
    // $query = "SELECT name FROM request_OT where status='REJECTED' ORDER BY OT_id DESC";
                    // $sql2 = "SELECT name, status, send_date, req_for_leave, leave_ID FROM request_leave where status='PENDING' ORDER BY leave_ID DESC";
                    // $sql3 = "SELECT name, status, send_date, req_for_wfh, wfh_ID FROM request_wfh where status='PENDING' ORDER BY wfh_ID DESC";
    $query="SELECT name, status, send_date, req_for_OT
    FROM request_OT where status='REJECTED' AND name='".$_POST["search"]."'";
    $query1="SELECT name, status, send_date, req_for_leave
    FROM request_leave where status='REJECTED' AND name='".$_POST["search"]."'";
    $query2="SELECT name, status, send_date, req_for_wfh
    FROM request_wfh where status='REJECTED' AND name='".$_POST["search"]."'";


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