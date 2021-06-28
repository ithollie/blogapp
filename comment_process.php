
<?php
    
    session_start();
   
    $port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
    
    $server   =  "127.0.0.1:$port";
    
    $conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
    
    
    if(isset($_POST["description"]) && isset($_POST["submit"]) ){

        
        $sql = "SELECT  *  FROM  `blogs` WHERE  id=".$_GET['id']."";
        
        $result =   mysqli_query($conn, $sql) or die($conn->error);
    
        $rows = mysqli_fetch_assoc($result);
        
        $user = "SELECT  *  FROM  `register` WHERE  email='".$_SESSION['email']."'";
        
        $userSql  =   mysqli_query($conn, $user) or die($conn->error);
        
        $userRow = mysqli_fetch_assoc($userSql);
         
        if($rows['id']  > 0 ){
            
            $title    =     $rows['title'];
            $id          =  $rows['id'];
            $author      =  $rows['author'];
            
            $description = mysql_escape_string($_POST["description"]);
            
            $table  = strval($id.$title);
            
             $sqltable  = "CREATE TABLE `".$table."`  (

                `id` int(11) AUTO_INCREMENT  PRIMARY KEY,
                `blog_id`varchar(100) NOT  NULL,
                `title` varchar(100) NOT NULL,
                `author` varchar(100) NOT NULL,
                `discription` varchar(2000) NOT NULL
         
            )";  

            if (mysqli_query($conn,  $sqltable) ===  TRUE)
            {
                
                echo "Table registration created successfully";

            }
            
            $insert  =   "INSERT  INTO  `".$table."` (`blog_id`,  `title`, `author`, `discription`) VALUES('$id','$title' ,  '$author' ,  '$description')";
            
            mysqli_query($conn, $insert) or die($conn->error);
                
            header("Location:home.php?id=".$userRow['id']."");
                
           
        }else{
            
            echo  "Error";
           
           
        }             
    
    }else{
        
        echo  "one of  the  filed is  null";
    }
?>