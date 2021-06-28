<?php  require_once( 'Application.php'); ?>

<?php

    //start a  session
    session_start();

    $data  = new Application();
    
    echo "page "; 
    // if  the   email  and   password is  post
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        
        //http session
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['password'] =  $_POST["password"];
        
        $email    =  $_POST["email"];
       
        $port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                
        $server   =  "127.0.0.1:$port";
        
        $conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
       
        $sql = "SELECT *  FROM `register` WHERE email='".$email."'";  
            
        $result = $conn->query($sql) or die($conn->error);
        
        if(mysqli_num_rows($result) > 0){
             
             $sql1 = "SELECT *  FROM `register` WHERE email='".$email."'";  
             
             $result1 = $conn->query($sql1) or die($conn->error);
             
             $row = $result1->fetch_assoc();
             
             saveUserId($row['id']);
              
            if (password_verify($_POST["password"], $row['password']) &&  $row['admin'] !="true") {
                 
                header("Location:home.php?id=".$row['id']);
            
            }elseif(password_verify($_POST["password"], $row['password']) &&  $row['admin'] === "true") {

           
                header("Location:admin.php?id=".$row['id']." &admin=".$row['email']."");  
                

            }else{
                
                echo " That is  not  a valiable  user";
            }
            
                    
        }else{
            
            header("Location:index.php?message='error'");  
          
        }
        
    }else{
        
        header("Location:login.php");  

    }
   
    function  saveUserId($id){
        
        session_start();
        $_SESSION['USER_ID'] = $id;
    }
    
    function  getUserId($id){
        
        session_start();
        return  $_SESSION['USER_ID'];
    
    }
?>