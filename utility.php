<?php

session_start();

include 'Database.php'; 

$database  =  new Database();

$port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                
$server   =  "127.0.0.1:$port";
        
$conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb") or  die("Connection failed: " . $conn->connect_error);
      
if($conn->connect_error) {
    
    
    header('location: loginFailed.php');
  
  
}

function  getAllUsers(){
    
   $sql  =   mysqli_query($conn ,"SELECT * FROM `register`" ) or die($conn->error);
            
   $url   = mysqli_fetch_assoc($url_query);
            
   $conn->close();     
        
}


?>