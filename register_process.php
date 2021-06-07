
<?php   include 'Application.php' ?>

<?php

   session_start();
   
   $database  = new  Application();

    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    $file_tmp = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];

    if (isset($_POST["file"]) &&  isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["email"]) && isset($_POST["address"]) &&  isset($_POST["day"])) {

        
        $firstname  =    mysqli_real_escape_string($database->conn->conn, $_POST["firstname"]);
        $lastname  =     mysqli_real_escape_string($database->conn->conn, $_POST["lastname"]);
        $email  =        mysqli_real_escape_string($database->conn->conn, $_POST["email"]);
        $address  =      mysqli_real_escape_string($database->conn->conn, $_POST["address"]);
        $birthDay  =     mysqli_real_escape_string($database->conn->conn, $_POST["day"]);

        $password  =     mysqli_real_escape_string($database->conn->conn, $_POST["password"]);
        $confirm_password  =  mysqli_real_escape_string($database->conn->conn, $_POST["confirm_password"]);
        
        
        if(!empty($firstname) &&  !empty($lastname) && !empty($address)  &&  !empty($email) &&  !empty($birthDay) &&  !empty($password) &&  !empty($confirm_password)){
            
            $check = getimagesize($_FILES["file"]["tmp_name"]);

            $folder  = "uploads/";
    
            if (!file_exists($folder)) {
    
                mkdir($folder, 0777, true);
            }

            $password_encrypted = password_hash($password, PASSWORD_BCRYPT);

            $database   =  new  Application();

            if($password ==  $confirm_password && $password_encrypted != null && $database->conn->registration($firstname,   $lastname,  $email, $address, $birthDay, $password_encrypted, 1) ==  true){
                
                move_uploaded_file($file_tmp, $folder.$file_name);
                
                   header("Location:index.php");
            
        
            }else{
                
                header("Location:register.php");
            }

        }else{
        
                header("Location:register.php");
        }   
        
    }
  
?>