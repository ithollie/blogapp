<?php  include 'Application.php'; ?>

<?php

    //start a  session
    session_start();

    $data  = new Application();

    // if  the   email  and   password is  post
    if (isset($_POST["email"]) && isset($_POST["password"]) ) {

        // I am  escaping the  string 
        $email  =        mysqli_real_escape_string($data->conn->conn, $_POST["email"]);
        $password  =     mysqli_real_escape_string($data->conn->conn, $_POST["password"]);

        //http session
        $_SESSION['email'] = $email;
        $_password['password'] =  $password;

        // I am checking  if  email and  password  is   not  empty.
        if(!empty($email) && !empty($password) && $data->conn->userPasswordExist($email,$password) ==  true){
            
            // database password 
            $databasePassword  =  $data->conn->findPassword($email);

            if (password_verify($password, $databasePassword)) {
                 
                header("Location:home.php");


            }else {

                $_SESSION["login_error"] = "Login  not  successfully ";
                header("Location:index.php");  
        
            }
            
                    
        }else{
            
            header("Location:index.php");  
        }
        
    }else{
        
        echo "Something is not  right";
        header("Location:login.php");  

    }
  
?>