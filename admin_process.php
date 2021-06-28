<?php  require_once( 'Application.php'); ?>

<?php

    //start a  session
    session_start();

    $data  = new Application();
    
    echo "page "; 
    // if  the   email  and   password is  post
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        
        
        echo "here";
        // I am  escaping the  string 
      
        //http session
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] =  $_POST["password"];
        
        echo  "here two";
        $email    =  $_POST["email"];
        
        $port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                
        $server   =  "127.0.0.1:$port";
        
        $conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
       
        $sql = "SELECT *  FROM `register` WHERE email='".$email."'";  
            
         //the result from  querying  the  database
        $result = $conn->query($sql) or die($conn->error);
        
        if(mysqli_num_rows($result) > 0){
            
         
             $sql1 = "SELECT *  FROM `register` WHERE email='".$email."'";  
             
             $result1 = $conn->query($sql1) or die($conn->error);
             
             $row = $result1->fetch_assoc();
              
            if (password_verify($_POST["password"], $row['password'])) {
                 
                header("Location:adminhome.php");

            }else {

              
                //header("Location:index.php");  
                echo  "hello";
            }
            
                    
        }else{
            echo mysqli_num_rows($result); 
            //header("Location:index.php");  
            //echo "hello login";
        }
        
    }else{
        
        echo "Something is not  right";
        //header("Location:login.php");  

    }
  
?>