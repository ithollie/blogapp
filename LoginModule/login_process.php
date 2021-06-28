
my  login  module. 
Ibrahim  Thollie 
<?php

    // start a  session
    session_start();

    // conction  instance  
    $conn = new mysqli('localhost', 'root', '',  'users');  

    // if  the   email  and   password is  post
    if (isset($_POST["email"]) && isset($_POST["password"])) {

        // I am  escaping the  string 
        $email  =        mysqli_real_escape_string($conn, $_POST["email"]);
        $password  =     mysqli_real_escape_string($conn, $_POST["password"]);

        // I am checking  if  email and  password  is   not  empty.
        if(!empty($email) && !empty($password)){

            // sql  query string 
            $sql = "SELECT * FROM users WHERE email='".$email."'";

            // the result from  querying  the  database e
            $result = mysqli_query($conn, $sql);

            $row = $result->fetch_assoc();
            
            // I  am  checking  if  the database useremail ,   password is  equal  to   the  post. 
            if ($row['email']  ==  $email && $row['userpassword'] == $password) {
                    
                //link  to  the home  page 
                header("Location:home.php");
                    
            }else{
                //link   to   the  login page  if  email  is  not equal  to  database email
                 header("Location:index.php"); 
            }
            
            //close  conccetion 
            $conn->close();

            

        }else{

            header("Location:index.php");  
        }
        
    }else{
        
        echo "Something is not  right";
        header("Location:login.php");  

    }
  
?>