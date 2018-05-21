<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
<link rel="icon" href="assets\img\klogo.png" type="image/gif" sizes="10x10" />
<title>Kestrel-IMC</title>

<?php
    require('connection.php');
    error_reporting(0);

    // FOR SIGNUP
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
                && ($extension != "JPG") && ($extension != "JPEG") && ($extension != "PNG") && ($extension != "GIF")){
                    // echo'<h3> Unknown Extension </h3>';
                    $error=1;
                }

            else{
                $size = filesize($_FILES['USERIMAGE']['tmp_name']);
                if($size > MAX_SIZE*1024){

                // echo'<h4>You have exceeded the size limit</h4>';
                $error=1;
            }

            $userimage=time().'.'.$extension;
            $newname="assets/img/userimages/".$userimage;
                    
            $copied = copy($_FILES['USERIMAGE']['tmp_name'], $newname);

            if(!$copied){
                // echo '<h3>Copy Unsuccessful!</h3>';
            }
            else echo'';
            }
        }


        else{
            $newname="assets/img/userimages/default_user.png";
          
        }

        $firstName   =   $_POST['fn'];
        $middleName   =   $_POST['mn'];
        $lastName  =   $_POST['ln'];
        $emailAdd  =   $_POST['ea'];
        $contNum  =   $_POST['cn'];
        $compPos  =   $_POST['cp'];
        $usercode  =   uniqid();
        $userName  =   $_POST['uname'];
        $password  =   $_POST['rpassword'];
        $cpassword  =   $_POST['cpassword'];
        $pos = $_POST['pos'];
    
        $connection->query("INSERT INTO user_credentials (first_name, middle_name, last_name, email_address, contact_number, company_position, username, password, user_image, status, position, archive) VALUES ('$firstName', '$middleName', '$lastName', '$emailAdd', '$contNum','$compPos', '$usercode-$userName','$password', '".$newname."' ,'Out' , '$pos', '')");

        echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                swal({
                    title: "Employee Added",
                    type: "success",
                    showConfirmButton:false,
                });';
            echo '},);</script>';
            
        echo "<script>setTimeout(\"location.href = 'admin.php';\",2000);</script>";
  
    }   
    // END/FOR SIGNUP

    // FOR UPDATE EMPLOYEE INFO
    if(isset($_POST['updateButton'])){
    
        $userName  =   $_POST['uname'];
        $firstName   =   $_POST['fn'];
        $middleName   =   $_POST['mn'];
        $lastName  =   $_POST['ln'];
        $emailAdd  =   $_POST['ea'];
        $contNum  =   $_POST['cn'];
        $cp  =   $_POST['cp'];

            
        $db = mysqli_connect("localhost","root","","special_project");
        $result = mysqli_query($db,"SELECT * FROM user_credentials WHERE username=$userName");
        $row = mysqli_fetch_array($result);
            
            if($_FILES['USERIMAGE']['name']==null) {
                $connection->query("UPDATE user_credentials SET first_name = '$firstName',  middle_name = '$middleName' , last_name = '$lastName' , 
                email_address = '$emailAdd', contact_number = '$contNum' , company_position='$cp' 
                WHERE username='$userName' ");
            }
            
            else {
                $error=0;
            }

            define ("MAX_SIZE","1000"); 
            function getExtension($str){
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
                    // echo '<h3>Unknown Extension</h3>';
                    $error = 1;
                }
                
                else {
                    $size = filesize($_FILES['USERIMAGE']['tmp_name']);
                    
                    if($size > MAX_SIZE*1024) {
                        // echo '<h4>You have exceeded the size limit!</h4>';
                        $error=1;
                    }
                    
                    $userimage=time().'.'.$extension;
                    $newname="assets/img/userimages/".$userimage;

                    $copied = copy($_FILES['USERIMAGE']['tmp_name'], $newname);
                    if(!$copied) {
                        // echo '<h3>Copy unsuccessful!</h3>';
                        $error=1;
                    }
                    else echo '';
                }
            
                unlink("".$row['user_image'] );
                $connection->query("UPDATE user_credentials SET first_name = '$firstName',  middle_name = '$middleName' , last_name = '$lastName' , 
                email_address = '$emailAdd', contact_number = '$contNum', company_position='$cp' , 
                user_image='".$newname."' WHERE username='$userName' ");
                $connection->query("UPDATE announcement SET user_image = '".$newname."'
                WHERE username='$userName' ");

            }
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                swal({
                    title: "Employee Updated",
                    type: "success",
                    showConfirmButton:false,
                });';
            echo '},);</script>';
        
            echo "<script>setTimeout(\"location.href = 'user_profile.php?view=".$_POST['uname']."';\",2000);</script>";
        }
     // END/FOR UPDATE EMPLOYEE INFO


     // FOR UPDATE EMPLOYEE-USER INFO
    if(isset($_POST['updateButton-user'])){
    
        $userName  =   $_POST['uname'];
        $firstName   =   $_POST['fn'];
        $middleName   =   $_POST['mn'];
        $lastName  =   $_POST['ln'];
        $emailAdd  =   $_POST['ea'];
        $contNum  =   $_POST['cn'];
        $cp  =   $_POST['cp'];
            
        $db = mysqli_connect("localhost","root","","special_project");
        $result = mysqli_query($db,"SELECT * FROM user_credentials WHERE username=$userName");
        $row = mysqli_fetch_array($result);
            
            if($_FILES['USERIMAGE']['name']==null) {
                $connection->query("UPDATE user_credentials SET first_name = '$firstName',  middle_name = '$middleName' , last_name = '$lastName' , 
                email_address = '$emailAdd', contact_number = '$contNum' , company_position='$cp' 
                WHERE username='$userName' ");
            }
            
            else {
                $error=0;
            }

            define ("MAX_SIZE","1000"); 
            function getExtension($str){
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
                email_address = '$emailAdd', contact_number = '$contNum', company_position='$cp' , 
                user_image='".$newname."' WHERE username='$userName' ");
                $connection->query("UPDATE announcement SET user_image = '".$newname."'
                WHERE username='$userName' ");

            }
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                swal({
                    title: "Employee Updated",
                    type: "success",
                    showConfirmButton:false,
                });';
            echo '},);</script>';
        
            echo "<script>setTimeout(\"location.href = 'profile.php?view=".$_POST['uname']."';\",2000);</script>";
        }
     // END/FOR UPDATE-USER EMPLOYEE INFO

    // FOR UPDATE USER_USERNAME INFO
    // if(isset($_POST['update-uname'])){

    //     $host = "localhost";  
    //     $username = "root";  
    //     $password = "";  
    //     $database = "special_project";  
    //     $message = "";  

    //         try{  
    //             $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password );  
    //             $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

            
    //             if(empty($_POST["password"])){  
    //                 $message = '<label>No User Selected</label>';  
    //             } 

    //             if(!empty($_POST["password"])){  
    //                 $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname ";  
    //                 $statement = $connect->prepare($query);  
    //                 $statement->execute(  
    //                     array(  
    //                         'uname'     =>     $_POST["uname"],  
    //                         'password'     =>     $_POST["password"]  
    //                     )  
    //                 );  
    //                 $count = $statement->rowCount();  
    //                 if($count > 0){  

    //                     $userName  =   $_POST['uname'];
    //                     $upuserName  =   $_POST['un'];
            
    //                     $connection->query("UPDATE user_credentials SET username = '$upuserName' 
    //                         WHERE username='$userName' ");

    //                     $connection->query("UPDATE t_in_out SET username = '$upuserName'
    //                                 WHERE username='$userName' ");
    //                     $connection->query("UPDATE announcement SET username = '$upuserName'
    //                             WHERE username='$userName' ");

    //                     echo '<script type="text/javascript">';
    //                     echo 'setTimeout(function () { 
    //                     swal({
    //                         title: "USERNAME UPDATED",
    //                         type: "success",
    //                         showConfirmButton:false,
    //                     });';
    //                     echo '},);</script>';

    //                     echo "<script>setTimeout(\"location.href = 'logout.php';\",2000);</script>";
         
    //                 }
                        
    //                 else{  
    //                     echo '<script type="text/javascript">';
    //                     echo 'setTimeout(function () { 
    //                     swal({
    //                         title: "WRONG PASSWORD",
    //                         type: "error",
    //                         showConfirmButton:false,
    //                     });';
    //                     echo '},);</script>';
                        
    //                     echo "<script>setTimeout(\"location.href = 'user_profile.php?view=".$_POST['uname']."';\",2000);</script>";

    //                 }  
    //             } 
    //         }   
        
    //         catch(PDOException $error){  
    //             $message = $error->getMessage();  
    //         }  
    // }
    // END/FOR UPDATE USER_USERNAME INFO


     // FOR UPDATE USER_USERNAME-USER INFO
    //  if(isset($_POST['update-uname-user'])){

    //     $host = "localhost";  
    //     $username = "root";  
    //     $password = "";  
    //     $database = "special_project";  
    //     $message = "";  

    //         try{  
    //             $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password );  
    //             $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

            
    //             if(empty($_POST["password"])){  
    //                 $message = '<label>No User Selected</label>';  
    //             } 

    //             if(!empty($_POST["password"])){  
    //                 $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname ";  
    //                 $statement = $connect->prepare($query);  
    //                 $statement->execute(  
    //                     array(  
    //                         'uname'     =>     $_POST["uname"],  
    //                         'password'     =>     $_POST["password"]  
    //                     )  
    //                 );  
    //                 $count = $statement->rowCount();  
    //                 if($count > 0){  

    //                     $userName  =   $_POST['uname'];
    //                     $upuserName  =   $_POST['un'];
            
    //                     $connection->query("UPDATE user_credentials SET username = '$upuserName' 
    //                         WHERE username='$userName' ");

    //                     $connection->query("UPDATE t_in_out SET username = '$upuserName'
    //                                 WHERE username='$userName' ");
    //                     $connection->query("UPDATE announcement SET username = '$upuserName'
    //                             WHERE username='$userName' ");

    //                     echo '<script type="text/javascript">';
    //                     echo 'setTimeout(function () { 
    //                     swal({
    //                         title: "USERNAME UPDATED",
    //                         type: "success",
    //                         showConfirmButton:false,
    //                     });';
    //                     echo '},);</script>';

    //                     echo "<script>setTimeout(\"location.href = 'profile.php?view=".$_POST['un']."';\",2000);</script>";
         
    //                 }
                        
    //                 else{  
    //                     echo '<script type="text/javascript">';
    //                     echo 'setTimeout(function () { 
    //                     swal({
    //                         title: "WRONG PASSWORD",
    //                         type: "error",
    //                         showConfirmButton:false,
    //                     });';
    //                     echo '},);</script>';
                        
    //                     echo "<script>setTimeout(\"location.href = 'profile.php?view=".$_POST['uname']."';\",2000);</script>";

    //                 }  
    //             } 
    //         }   
        
    //         catch(PDOException $error){  
    //             $message = $error->getMessage();  
    //         }  
    // }
    // END/FOR UPDATE USER_USERNAME-USER INFO

    // FOR UPDATE EMPLOYEE_PASSWORD INFO
    if(isset($_POST['update-password-emp'])){

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
                    $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname ";  
                    $statement = $connect->prepare($query);  
                    $statement->execute(  
                        array(  
                            'uname'     =>     $_POST["uname"],  
                            'password'     =>     $_POST["password"]  
                        )  
                    );  
                    $count = $statement->rowCount();  
                    if($count > 0){  

                        $userName  =   $_POST['uname'];
                        
                        $password  =   $_POST['rpassword'];

                        $connection->query("UPDATE user_credentials SET password = '$password' 
                            WHERE username='$userName' ");

                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "PASSWORD UPDATED",
                            type: "success",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';

                        echo "<script>setTimeout(\"location.href = 'logout.php';\",2000);</script>";
                    }
                        
                    else{  
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "WRONG PASSWORD",
                            type: "error",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';
                        
                        echo "<script>setTimeout(\"location.href = 'employee-profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    
                    }  
                } 
            }   
        
        catch(PDOException $error){  
            $message = $error->getMessage();  
        }  

    }
    //END/ FOR UPDATE EMPLOYEE_PASSWORD INFO

    // FOR UPDATE USER_PASSWORD INFO
    if(isset($_POST['update-password'])){

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
                    $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname ";  
                    $statement = $connect->prepare($query);  
                    $statement->execute(  
                        array(  
                            'uname'     =>     $_POST["uname"],  
                            'password'     =>     $_POST["password"]  
                        )  
                    );  
                    $count = $statement->rowCount();  
                    if($count > 0){  

                        $userName  =   $_POST['uname'];
                        
                        $password  =   $_POST['rpassword'];

                        $connection->query("UPDATE user_credentials SET password = '$password' 
                            WHERE username='$userName' ");

                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "PASSWORD UPDATED",
                            type: "success",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';

                        echo "<script>setTimeout(\"location.href = 'logout.php';\",2000);</script>";
                        session_destroy();  
                    }
                        
                    else{  
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "WRONG PASSWORD",
                            type: "error",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';
                        
                        echo "<script>setTimeout(\"location.href = 'user_profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    
                    }  
                } 
            }   
        
        catch(PDOException $error){  
            $message = $error->getMessage();  
        }  

    }
    //END/ FOR UPDATE USER_PASSWORD INFO


    // FOR UPDATE USER_PASSWORD-USER INFO
    if(isset($_POST['update-password-user'])){

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
                    $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname";  
                    $statement = $connect->prepare($query);  
                    $statement->execute(  
                        array(  
                            'uname'     =>     $_POST["uname-emp"],  
                            'password'     =>     $_POST["password"]  
                        )  
                    );  
                    $count = $statement->rowCount();  
                    if($count > 0){  

                        $userName  =   $_POST['uname'];
                        
                        $password  =   $_POST['rpassword'];

                        $connection->query("UPDATE user_credentials SET password = '$password' 
                            WHERE username='$userName' ");

                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "PASSWORD UPDATED",
                            type: "success",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';

                        echo "<script>setTimeout(\"location.href = 'profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    }
                        
                    else{  
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "WRONG PASSWORD",
                            type: "error",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';
                        
                        echo "<script>setTimeout(\"location.href = 'profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    
                    }  
                } 
            }   
        
        catch(PDOException $error){  
            $message = $error->getMessage();  
        }  

    }
    //END/ FOR UPDATE USER_PASSWORD-USER INFO


    //FOR UPDATE USER_ACCESS-EMPLOYEE INFO
    if(isset($_POST['update-access-emp'])){

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
                    $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname ";  
                    $statement = $connect->prepare($query);  
                    $statement->execute(  
                        array(  
                            'uname'     =>     $_POST["uname"],  
                            'password'     =>     $_POST["password"]  
                        )  
                    );  
                    $count = $statement->rowCount();  
                    if($count > 0){  
                        $userName  =   $_POST['uname'];
                        $pos = $_POST['pos'];
                
                        $connection->query("UPDATE user_credentials SET position = '$pos' 
                            WHERE username='$userName' ");

                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "USERNAME UPDATED",
                            type: "success",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';

                        echo "<script>setTimeout(\"location.href = 'logout.php';\",2000);</script>";
                    }
                        
                    else{  
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "WRONG PASSWORD",
                            type: "error",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';
                        
                        echo "<script>setTimeout(\"location.href = 'employee-profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    

                    }  
                } 
            }   
        
        catch(PDOException $error){  
            $message = $error->getMessage();  
        }  
    }
    //END/FOR UPDATE USER_ACCESS-EMPLOYEE INFO




    //FOR UPDATE USER_ACCESS INFO
    if(isset($_POST['update-access'])){

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
                    $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname ";  
                    $statement = $connect->prepare($query);  
                    $statement->execute(  
                        array(  
                            'uname'     =>     $_POST["uname"],  
                            'password'     =>     $_POST["password"]  
                        )  
                    );  
                    $count = $statement->rowCount();  
                    if($count > 0){  
                        $userName  =   $_POST['uname'];
                        $pos = $_POST['pos'];
                
                        $connection->query("UPDATE user_credentials SET position = '$pos' 
                            WHERE username='$userName' ");

                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "USER ACCESS UPDATED",
                            type: "success",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';

                        echo "<script>setTimeout(\"location.href = 'logout.php';\",2000);</script>";
                    }
                        
                    else{  
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "WRONG PASSWORD",
                            type: "error",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';
                        
                        echo "<script>setTimeout(\"location.href = 'user_profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    

                    }  
                } 
            }   
        
        catch(PDOException $error){  
            $message = $error->getMessage();  
        }  
    }
    //END/FOR UPDATE USER_ACCESS INFO

    //FOR UPDATE USER_ACCESS-USER INFO
    if(isset($_POST['update-access-user'])){

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
                    $query = "SELECT * FROM user_credentials WHERE BINARY password = :password AND BINARY username = :uname ";  
                    $statement = $connect->prepare($query);  
                    $statement->execute(  
                        array(  
                            'uname'     =>     $_POST["uname-emp"],  
                            'password'     =>     $_POST["password"]  
                        )  
                    );  
                    $count = $statement->rowCount();  
                    if($count > 0){  
                        $userName  =   $_POST['uname'];
                        $pos = $_POST['pos'];
                
                        $connection->query("UPDATE user_credentials SET position = '$pos' 
                            WHERE username='$userName' ");

                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "USER ACCESS UPDATED",
                            type: "success",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';

                        echo "<script>setTimeout(\"location.href = 'profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    }
                        
                    else{  
                        echo '<script type="text/javascript">';
                        echo 'setTimeout(function () { 
                        swal({
                            title: "WRONG PASSWORD",
                            type: "error",
                            showConfirmButton:false,
                        });';
                        echo '},);</script>';
                        
                        echo "<script>setTimeout(\"location.href = 'profile.php?view=".$_POST['uname']."';\",2000);</script>";
                    

                    }  
                } 
            }   
        
        catch(PDOException $error){  
            $message = $error->getMessage();  
        }  
    }
    //END/FOR UPDATE USER_ACCESS-USER INFO

    //FOR DELETE EMPLOYEE
    if(isset($_GET['deleteemp'])){

        
        $username = $_GET['deleteemp'];

        $db = mysqli_connect("localhost","root","","special_project");
        $result = mysqli_query($db,"SELECT * FROM user_credentials WHERE username=$username");
        $row = mysqli_fetch_array($result);

        $path = $row['user_image'];
            if(!unlink($path)) {
                // echo '<h3>Error deleting files</h3>';
                echo '';
            }
            else {
                echo '<h3>File deleted</h3>';
            }
 
        // $sql= "DELETE FROM announcement where username='$username'";
        // $sql1= "DELETE FROM time_in_out_backup where username='$username'";
        // $sql2= "DELETE FROM request_leave where username='$username'";
        // $sql3= "DELETE FROM request_ot where username='$username'";
        // $sql4= "DELETE FROM request_wfh where username='$username'";
        // $sql4= "DELETE FROM user_credentials where username='$username'";
       
        $sql= "UPDATE announcement set archive_ann='Archive' where username='$username'";
        $sql1= "UPDATE time_in_out_backup set archive_tinout='Archive' where username='$username'";
        $sql2= "UPDATE request_leave set archive_leave='Archive' where username='$username'";
        $sql3= "UPDATE request_ot set archive_ot='Archive' where username='$username'";
        $sql4= "UPDATE request_wfh set archive_wfh='Archive' where username='$username'";
        $sql5= "UPDATE user_credentials set archive='Archive' where username='$username'";

        mysqli_query($db,$sql);
        mysqli_query($db,$sql1);
        mysqli_query($db,$sql2);
        mysqli_query($db,$sql3);
        mysqli_query($db,$sql4);
        mysqli_query($db,$sql5);

        echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
            swal({
                title: "EMPLOYEE REMOVED",
                type: "success",
                showConfirmButton:false,
            });';
        echo '},);</script>';
                        
        echo "<script>setTimeout(\"location.href = 'admin.php';\",2000);</script>";
        // header('location:admin.php');
    }



?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>