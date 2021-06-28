 
<?php   include'Application.php'; ?>

<?php

    session_start();
   
    $condition  =  false;
     
    $port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
    
    $server   =  "127.0.0.1:$port";
    
    $conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
        
    $firstname   =  $_POST["firstname"];
    $lastname    =  $_POST["lastname"];
    $email       =  $_POST["email"];
    $address     =  $_POST["address"];
    $birthday    =  $_POST["day"];
    $password    =  $_POST["password"];
    
    $phone =  "6109985196";
    
    $activate  =  1;
    
    $sqltest  = "SELECT *  FROM  `register`  WHERE email='".$email."'";

    $re  =  mysqli_query($conn,   $sqltest) or die($conn->error);
    
    $admin  = "false";
          
    if(mysqli_num_rows($re) == 0){
        
            $hash_password  =  password_hash($password, PASSWORD_BCRYPT);
            
            $sql = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `address`  , `birthday`, `password`, `phone`, `activate`,  `admin`) VALUES ('$firstname', '$lastname' ,'$email',  '$address', '$birthday', '$hash_password' , '$phone', '$activate', '$admin')";
    
            $condition  =  true;
            
             if (isset($_POST["firstname"]) && isset($_POST["lastname"]) &&  $condition  ==  true) {
                
                $password_encrypted = password_hash($_POST["password"], PASSWORD_BCRYPT);
    
                if($_POST["password"] ==  $_POST["confirm_password"] && $password_encrypted != null &&  $condition == 1){
                    
                    
                    mysqli_query($conn ,  $sql) or die($conn->error);
                    
                    header("Location:index.php?success='true'");
                   
            
                }else{
                  
                    header("Location:register.php");
                    
                }
    
            
            
        }else{
           
            header("Location:register.php");
    
        }
    }else{
        echo  " User already  exist";
    }
    $conn->close();

?>