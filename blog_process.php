
<?php include 'Database.php'; ?>

<?php

    session_start();
  
    $target_dir = "uploads";

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    try {
       
                    if(isset($_POST['submit'])  &&  isset($_POST["title"]) && isset($_POST["author"]) && isset($_POST["description"])) {
                
                        $check = getimagesize($_FILES["file"]["tmp_name"]);
                
                        $folder  = "uploads/";
                
                        if (!file_exists($folder)) {
                
                            mkdir($folder, 0777, true);
                        }
                        
                        $_SESSION['author'] = $_POST["author"];
                        $_SESSION['title '] = $_POST["title"];
                        $_SESSION['description'] = $_POST["description"];
                        
                        $title  =    $_POST["title"];
                        $author  =   $_POST["author"];
                        $email  =    $_SESSION['email'];
                        
                        $description  =  mysql_escape_string($_POST["description"]);
                        
                        $port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                                
                        $server   =  "127.0.0.1:$port";
                        
                        $conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
                        
                        $sqltext = "SELECT  *  FROM  `blogs` WHERE  title='".$title."'";
                
                        $check = mysqli_query($conn, $sqltext) or die($conn->error);
                        
                        $rows = mysqli_fetch_assoc($check);
                        
                        
                        $imgname = basename($_FILES["file"]["name"]);
                        
                        
                        if(mysqli_num_rows($check) == 0){
                                
                                if(strlen($_POST["description"]) != 20 && strlen($_POST["title"]) > 4){
                                    
                                    $conditionOne = false;
                                    
                                    $sql = "INSERT INTO `blogs` (author, email ,discription, title, postImage) VALUES('".$author."', '$email', '".$description."', '$title','$imgname')";
                                    
                                    $result  =  mysqli_query($conn, $sql) or die($conn->error);
                                    
                                    move_uploaded_file($file_tmp, $folder.$file_name);
                                    
                                    if($result == TRUE) {
                                    
                                        $conditionOne =  true;
                                  
                                        if(!empty($title) &&  !empty($author) && !empty($email)  &&  !empty($description)  && $conditionOne == true){
                                    
                                            $sql1 = "SELECT *  FROM `register` WHERE email='".$email."'";  
                                             
                                            $result1 = $conn->query($sql1) or die($conn->error);
                                             
                                            $row = $result1->fetch_assoc();
                                            
                                            header("Location:home.php?id=".$row['id']);
                                    
                            
                                        }else{
                                        
                                            header("Location:blogform.php?error_message='error'");
                                        }
                                    }
                                }else{
                                    
                                    header("Location:blogform.php?error_message='emptyfiled'");
                                }
                        }else{
                            
                            header("Location:blogform.php?error_message='exist'");
                        }
                        
                        
                        
                        
                    }else{
                        
                         header("Location:blogform.php?error_message='notpost'");
                        
                    }  
          
    }catch(Exception $e) {
        
          echo 'Message: ' .$e->getMessage();
    }
                    

    ?>