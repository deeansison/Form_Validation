<?php
    require('connection.php');
    // error_reporting(0);

    




    if(isset($_POST['signUpBtn'])){

        define("MAX_SIZE","1000");
        function getExtension($str){
            $i=strrpos($str,".");
            if(!$i){return "";}
            $l=strlen($str)-$i;
            $ext=substr($str,$i+1,$l);
            return $ext;

        }

        $error = 0;
        $userimage = $_FILES['USERIMAGE']['name'];
      
        if($userimage){
            $filename = stripslashes($_FILES['USERIMAGE']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);


            if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")
                && ($extension != "JPG") && ($extension != "JPEG") && ($extension != "PNG") && ($extension != "GIF"))

                {
                    echo'<h3> Unknown Extension </h3>';
                    $error=1;

                }

                else{
                    $size = filesize($_FILES['USERIMAGE']['tmp_name']);
                    if($size > MAX_SIZE*1024){

                        echo'<h4>You have exceeded the size limit</h4>';
                        $error=1;
                    }

                    $userimage=time().'.'.$extension;
                    $newname="assets/img/userimages/".$userimage;
                    
                    $copied = copy($_FILES['USERIMAGE']['tmp_name'], $newname);

                    if(!$copied){
                        echo '<h3>Copy Unsuccessful!</h3>';
                    }

                    else echo'';

                }
        }

        
    $firstName   =   $_POST['fn'];
    $middleName   =   $_POST['mn'];
    $lastName  =   $_POST['ln'];
    $emailAdd  =   $_POST['ea'];
    $contNum  =   $_POST['cn'];
    $userName  =   $_POST['uname'];
    $password  =   $_POST['rpassword'];
    $pos = $_POST['pos'];
    $status =   $_POST['status'];
    

    $connection->query("INSERT INTO user_credentials (first_name, middle_name, last_name, email_address, contact_number, username, password, user_image, status, position) VALUES ('$firstName', '$middleName', '$lastName', '$emailAdd', '$contNum', '$userName','$password', '".$newname."' ,'Out' , '$pos')");

    header("Location:admin.php");

}




if(isset($_POST['updateButton'])){
 
    $userName  =   $_POST['uname'];
	$firstName   =   $_POST['fn'];
    $middleName   =   $_POST['mn'];
    $lastName  =   $_POST['ln'];
    $emailAdd  =   $_POST['ea'];
    $contNum  =   $_POST['cn'];
        
    $db = mysqli_connect("localhost","root","","special_project");
    $result = mysqli_query($db, "SELECT * FROM user_credentials WHERE username=$userName");
    $row = mysqli_fetch_array($result);
		
		if($_FILES['USERIMAGE']['name']==null) {
			$connection->query("UPDATE user_credentials SET first_name = '$firstName',  middle_name = '$middleName' , last_name = '$lastName' , 
            email_address = '$emailAdd', contact_number = '$contNum'
            WHERE username='$userName' ");
		}
		
		else {
			$error=0;
		}

		define ("MAX_SIZE","1000"); 
		function getExtension($str)
		{
			 $i = strrpos($str,".");
			 if (!$i) { return ""; }
			 $l = strlen($str) - $i;
			 $ext = substr($str,$i+1,$l);
			 return $ext;
		}
        
        
		$userimage = $_FILES['USERIMAGE']['name'];
        if($userimage){
            $filename = stripslashes($_FILES['USERIMAGE']['name']);
            $extension = getExtension($filename);
            $extension = strtolower($extension);
		 	
			if(($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif") && ($extension != "JPG") && ($extension != "JPEG") && ($extension != "PNG") && ($extension != "GIF")) {
				echo '<h3>Unknown Extension</h3>';
		 		$error = 1;
		 	}
			
		 	else {
		 		$size = filesize($_FILES['USERIMAGE']['tmp_name']);
		 		
				if($size > MAX_SIZE*1024) {
		 			echo '<h4>You have exceeded the size limit!</h4>';
		 			$error=1;
		 		}
				
		 		$userimage=time().'.'.$extension;
                $newname="assets/img/userimages/".$userimage;

                $copied = copy($_FILES['USERIMAGE']['tmp_name'], $newname);
		 		if(!$copied) {
		 			echo '<h3>Copy unsuccessful!</h3>';
		 			$error=1;
		 		}
		 		else echo '';
		 	}
		 
            unlink("".$row['user_image'] );
            $connection->query("UPDATE user_credentials SET first_name = '$firstName',  middle_name = '$middleName' , last_name = '$lastName' , 
            email_address = '$emailAdd', contact_number = '$contNum',  
            user_image='".$newname."' WHERE username='$userName' ");
            $connection->query("UPDATE announcement SET user_image = '".$newname."'
            WHERE username='$userName' ");

			
		}
		
		header("location:profile.php?view=".$_POST['uname']."");
}



if(isset($_POST['updatePriv'])){

    $host = "localhost";  
    $username = "root";  
    $password = "";  
    $database = "special_project";  
    $message = "";  


   
    
    try{  
        $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password );  
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

         
            if(empty($_POST["password"])){  
                $message = '<label>No User Selected</label>';  
            } 

            if(!empty($_POST["password"])){  
                $query = "SELECT * FROM user_credentials WHERE password = :password AND username = :uname ";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                    array(  
                        'uname'     =>     $_POST["uname"],  
                        'password'     =>     $_POST["password"]  
                    )  
                );  
                $count = $statement->rowCount();  
                if($count > 0){  

                    $cpassword  =   $_POST['cpassword'];
                    $userName  =   $_POST['uname'];
                    $upuserName  =   $_POST['un'];
                    $password  =   $_POST['rpassword'];
                    $pos = $_POST['pos'];
                 
                    $connection->query("UPDATE user_credentials SET username = '$upuserName',  password = '$password' , position = '$pos' 
                              WHERE username='$userName' ");
                    $connection->query("UPDATE t_in_out SET username = '$upuserName'
                                WHERE username='$userName' ");
                    $connection->query("UPDATE announcement SET username = '$upuserName'
                              WHERE username='$userName' ");




                    

                    header("location:logout.php");  
                }
                       
                else{  
                    echo "<script>";
echo " alert('Wrong Password');      
        window.location.href='profile.php?view=".$_POST['uname']."';
</script>";
                 
                    // header("refresh:5; location:profile.php?view=".$_POST['uname']."");  
                    // echo '<script type="text/javascript"> alert("All fields are required!") </script>';
                }  
            } 
       
    }   
    
    catch(PDOException $error){  
        $message = $error->getMessage();  
    }  














//     $db = mysqli_connect("localhost","root","","special_project");
//     $rec = mysqli_query($db, "SELECT password FROM user_credentials WHERE username=$userName");
//     $record = mysqli_fetch_array($rec);

//     $realpass = $record['password'];
        
// if($cpassword===$realpass){
//     $connection->query("UPDATE user_credentials SET username = '$upuserName',  password = '$password' , position = '$pos' 
//             WHERE username='$userName' ");
//     $connection->query("UPDATE t_in_out SET username = '$upuserName'
//             WHERE username='$userName' ");
//     $connection->query("UPDATE announcement SET username = '$upuserName'
//             WHERE username='$userName' ");

// header('location:logout.php');
// }

// if($cpassword!==$realpass){
//     echo '<script type="text/javascript"> alert("Wrong Data!") </script>';
//     header('location:userupdate.php');
// }


}




if(isset($_GET['deleteemp'])){

    $username = $_GET['deleteemp'];

 
    $db = mysqli_connect("localhost","root","","special_project");
	$result = mysqli_query($db,"SELECT * FROM user_credentials WHERE username=$username");
	$row = mysqli_fetch_array($result);

	$path = $row['user_image'];
	 	if(!unlink($path)) {
	 		echo '<h3>Error deleting files</h3>';
	 	}
	 	else {
	 		echo '<h3>File deleted</h3>';
         }
         
    

     $sql= "DELETE FROM user_credentials where username='$username'";
 	mysqli_query($db, $sql);


	header('location:admin.php');
}


?>

    