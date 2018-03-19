<?php
require('connection.php');






    $time_out   =   $_POST['time_out'];
    $date_out   =   $_POST['date_out'];
    $username   =   $_POST['username'];
    
   
   
    //$tin   =   $_POST['tin'];
    //$thenTimestamp = strtotime($tin);
    // $date1 = new DateTime('tin');
    ////$dateout = new DateTime('now');
    // $date2 = $dateout->diff($thenTimestamp);
    // $dateout = time();

    //$date2 = $dateout - $thenTimestamp;
    ////$minutes = floor($date2 / 60);

    // $date2 = new DateTime('07:42:00');
    
    // $diff = $date2->diff($thenTimestamp);
    
    // $hours = $diff->s;
    // $hours = $hours + ($diff->days*24);
    // $then = "2018-03-10 07:59:00";
    // $now = time();
     
    // //convert $then into a timestamp.
    // $thenTimestamp = strtotime($then);
     
    // //Get the difference in seconds.
    // $difference = $now - $thenTimestamp;
    // $datetime1 = new DateTime();
    // $datetime2 = new DateTime('2018-03-10 08:13:00');
    // $interval = $datetime1->diff($datetime2);
    // $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
    // echo $elapsed;
   

    // $tin   =   $_POST['tin'];
    // $thenTimestamp = strtotime($tin);
    // $start_date = new DateTime('2018-03-10 08:13:00');
    // $since_start = $start_date->diff('now');
    // echo $since_start->days.' days total<br>';
    // echo $since_start->y.' years<br>';
    // echo $since_start->m.' months<br>';
    // echo $since_start->d.' days<br>';
    // echo $since_start->h.' hours<br>';
    // echo $since_start->i.' minutes<br>';
    // echo $since_start->s.' seconds<br>';

// $minutes = $since_start->days * 24 * 60;
// $minutes += $since_start->h * 60;
// $minutes += $since_start->i;

$tin   =   $_POST['tin'];
$din   =   $_POST['din'];
$Time = $tin;
$Date = $din;
$DateTime = $Date . " " . $Time;


$Timeout = $time_out;
$Dateout = $date_out;
$DateTimeout = $Dateout . " " . $Timeout;



$date1 = new DateTime($DateTime);
$date2 = $date1->diff(new DateTime($DateTimeout));


                // echo $date2->days.'Total days'."\n";
                // echo $date2->y.' years'."\n";
                // echo $date2->m.' months'."\n";
                // echo $date2->d.' days'."\n";
                // echo $date2->h.' hours'."\n";
                // echo $date2->i.' minutes'."\n";
                // echo $date2->s.' seconds'."\n";

                // $('#date1').datepicker();
                // $('#date2').datepicker();
                
                // $('#date2').change(function () {
                //     var diff = $('#date1').datepicker("getDate") - $('#date2').datepicker("getDate");
                //     $('#diff').text(diff / (1000 * 60 * 60 * 24) * -1);
                // });


    $connection->query("UPDATE t_in_out set time_out='$time_out',date_out='$date_out',total_days='$date2->days',total_hrs='$date2->h',total_min='$date2->i',total_sec='$date2->s',statusform='Out' where username='$username' && statusform='On Work'");
    $connection->query("UPDATE user_credentials set status='Out' where username='$username' ");

  

?>


<?php
                // $date1 = new DateTime('2012-06-01 02:12:51');
                // $date2 = $date1->diff(new DateTime('2014-05-12 11:10:00'));
                // echo $date2->days.'Total days'."\n";
                // echo $date2->y.' years'."\n";
                // echo $date2->m.' months'."\n";
                // echo $date2->d.' days'."\n";
                // echo $date2->h.' hours'."\n";
                // echo $date2->i.' minutes'."\n";
                // echo $date2->s.' seconds'."\n";
                ?>