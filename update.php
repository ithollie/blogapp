<?php include 'Database.php'; ?>

<?php
    
    session_start();
   
    $database  = new  Database();
    
    $port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
    
    $server   =  "127.0.0.1:$port";
    
    $conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
    
    $store_title  = array($_POST['title']);
    
    
    $titleOld  =  $_POST["title"];
  
    if(isset($_POST['submit'])  &&  isset($_POST["title"]) && isset($_POST["description"])){
    
        $title = $_POST["title"];
        
        $sql = "SELECT  *  FROM  `blogs` WHERE  id=".$_GET['id']."";
        
        $result =   mysqli_query($conn, $sql) or die($conn->error);
    
        $login_user =  "SELECT  *  FROM  `register` WHERE  email='".$_SESSION['email']."'";
        
        $rows = mysqli_fetch_assoc($result);
         
        $login_user_result  = mysqli_query($conn, $login_user) or die($conn->error);
        
        $login_user_array  = mysqli_fetch_assoc($login_user_result);
        
        if($rows['id']  > 0 ){
    
            echo "hello";
            
            $description = mysql_escape_string($_POST["description"]);
            
            $newTitle    =  $_POST["title"];
            $id          =  $rows['id'];
            
            $update  =   "UPDATE blogs  SET title='".$title."' ,  discription='".$description."'  WHERE  id='".$id."'";
                
            $update_string =   mysqli_query($conn, $update) or die($conn->error);
                
            header("Location:home.php?id=".$login_user_array['id']."");
                
           
        }else{
            
            echo  "Error";
           
           
        }             
    
    }else{
        
        echo  "one of  the  filed is  null";
    }
?>