<?php
     class Database{

        private  $server;
        private  $username;
        private  $password;
        private  $database;
        private  $port;
        public   $conn;
        
        function __construct(){
            
                $this->port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                $this->server   =  "127.0.0.1:$port";
                $this->conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
                $this->regtable();
                $this->blogTable();
           

        }       
        function regtable(){

            $sql  = "CREATE TABLE `register` (

                `id` int(11)  AUTO_INCREMENT PRIMARY KEY,
                `firstname` varchar(100) NOT NULL,
                `lastname` varchar(100) NOT NULL,
                `email` varchar(100) NOT NULL,
                `address` varchar(100) NOT NULL,
                `birthday` varchar(100) NOT NULL,
                `password` varchar(100) NOT NULL, 
                `phone` varchar(100) NOT NULL,
                `activate` int(100)  NOT NULL, 
                `admin`  varchar(5)  NOT NULL
         
            )";  

            
            if (mysqli_query($this->conn,  $sql) ===  TRUE)
            {
                
                echo "Table registration created successfully";


            }
    

        }
        function  close(){

            $this->conn->close();
        }
        function blogTable(){

            
            $sql  = "CREATE TABLE `blogs` (

                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `author` varchar(100) NOT NULL,
                `email` varchar(100) NOT NULL,
                `discription` varchar(100) NOT NULL,
                `title` varchar(100) NOT NULL
            
         
            )";  

            if (mysqli_query($this->conn ,  $sql) == TRUE) {
                
                echo "Table blog  created successfully";

            }

        }
        function  userPasswordExist($email,  $password){

          

            $sql = "SELECT *  FROM `register` WHERE email='".$email."'";  
            
            //the result from  querying  the  database
            $result = mysqli_query($this->conn, $sql)or die($this->conn->error);

            $row = $result->fetch_assoc();

            // I  am  checking  if  the database useremail ,   password is  equal  to   the  post. 
            
            if (!empty($row['email'])){
                            
                return  true;
                            
            }else{
                        
                return  false;
            }
    
        }
        function  userEmailExist($email){

                $condition =  false;

                $this->regtable();

                //sql  query string 
                $sql = "SELECT *  FROM register WHERE email='".$email."'";  
            
                //the result from  querying  the  database
                $result = mysqli_query($this->conn, $sql) or die($this->conn->error);

                $row = $result->fetch_assoc(); 


                if ($row['email']  ==  $email) {
                            
                        $condition  = true;
                            
                }else{
                        
                        $condition = false;
                }
                return $condition;
          

        }
        function  findPassword($email){
            
            $hash_password  = "Error";

            $sql ="SELECT *  FROM `register` WHERE email='".$email."'";

            $query = $this->conn->query($sql) or die($this->conn->error);

            $user = $query->fetch_assoc();
            
            return  $user['password'];
    
        }
        function save_post($title ,$author , $email,  $description, $target_file){

            if(!empty($title) && !empty($author)  &&  !empty($email) && !empty($description)){

                $sqltext = "SELECT  *  FROM  `blogs` WHERE  title='".$title."'";

                $check = mysqli_query($this->conn, $sqltext) or die($this->conn->error);

                $rows = mysqli_fetch_assoc($check);

                if(mysqli_num_rows($check) == 0){

                    $sql = "INSERT INTO `blogs` (author, email ,discription, title, postImage) VALUES ('$author', '$email', '$description', '$title','$target_file')";

                    mysqli_query($this->conn, $sql) or die($this->conn->error);
                    
                    return  true;
                   
                }
                if(mysqli_num_rows($check)  >  0 && empty($rows['title'])){  

            
                        $sql = "INSERT INTO `blogs` (author, email ,discription, title ) VALUES ('$author', '$email', '$description', '$title')";

                        mysqli_query($this->conn, $sql) or die($this->conn->error);

                        return true;
                       

                    
                }
            
            } 
        
        

        }
        function  findByDescription($title){

            $sql = "SELECT  discription  FROM  `blogs` WHERE  title='".$title."'";

            $result =   mysqli_query($this->conn, $sql) or die($this->conn->error);

            if(mysqli_num_rows($result) > 0){

                $rows = mysqli_fetch_assoc($result);

                return  $rows['discription'];
                
            }              
        }
        function checkPost($title){

            if(!empty($title)){

                $sql = "SELECT  title  FROM  `blogs`   WHERE  title='".$title."'";

                $result =   mysqli_query($this->conn, $sql) or die($this->conn->error);

                if(mysqli_num_rows($result) > 0){

                    return  true;
                }              
            } 
            return  false;
        }
        function update_post($title , $description){

            if(!empty($title) && !empty($description)){

                $sql = "UPDATE  `blogs` SET title ='".$title."', discription='".$description."'  WHERE  `title`='".$title."'";

                mysqli_query($this->conn, $sql) or die($this->conn->error);

                return   true;

            } 
    
        }
        function findById($id){

            $condition  = false;

            $sql = "SELECT title FROM users WHERE email='".$email."'";
            
            if($this->conn->query($sql) === TRUE){
                
                $condition  =  true;
            }

            return  $condition;
        }
        function  findByBlogTitle($title){

            $condition  = false;

            $sql = "SELECT title FROM users WHERE email='".$email."'";
            
            if($conn->query($sql) === TRUE){

                $condition  =  true;
            }
            return  $condtion;
        }
        function registration($firstname,  $lastname, $email,   $address , $birthday, $password, $activate ) {
           

            $phone =  "6109985196";

            $sqltest  = "SELECT *  FROM  `register`  WHERE email='".$email."'";

            $re  =  mysqli_query($this->conn,   $sqltest) or die($this->conn->error);
          
            if(mysqli_num_rows($re) == 0){

                $sql = "INSERT INTO `register` (`firstname`, `lastname`, `email`, `address`  , `birthday`, `password`, `phone`, `activate`) VALUES ('$firstname', '$lastname' ,'$email',  '$address', '$birthday', '$password', '$phone', '$activate')";

                mysqli_query($this->conn ,  $sql) or die($this->conn->error);

                return  true;

            }
            if(mysqli_num_rows($re) > 0){

                //echo "Error: " . $sqltest . "<br>" . $this->conn->error;

                return   false;
            }
            return  false;

        }
        function getByName() {

            return $this->name;
        }
        function deletePost($id){
            
            $sql = "DELETE  FROM `blogs`  WHERE id='".$id."'";

            $result   =  mysqli_query($this->conn ,  $sql) or die($this->conn->error);
            
            if ($result === TRUE) {

                return  true;
                    
            }
            return   false;
        }
        function  getAllPost($email){

            $sql = "SELECT *  FROM `blogs` WHERE email='".$email."'";

            $result   =  mysqli_query($this->conn ,  $sql) or die($this->conn->error);

            $rows = mysqli_fetch_assoc($result);

            if ($result->num_rows > 0) {

                return   $rows;
                    
            }

        
        }
        function  displayPosts($email){

            $arr  =  array(); 

            $sql = "SELECT * FROM  `blogs` WHERE  email='".$email."'";

            $result   =  mysqli_query($this->conn ,  $sql) or die($this->conn->error);

        
            $rows = mysqli_fetch_assoc($result);

            if ($result->num_rows > 0) {

                
                   return   $rows;
                    
            
            }

            return  $arr;

        }
    }
?>

