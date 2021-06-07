
<?php include 'Database.php'; ?>

<?php

    session_start();
   
    $database  = new  Database();
    $target_dir = "uploads";

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];

    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST['submit'])  &&   isset($_POST["title"]) && isset($_POST["author"]) && isset($_POST["description"])) {

        $check = getimagesize($_FILES["file"]["tmp_name"]);

        $folder  = "uploads/";

        if (!file_exists($folder)) {

            mkdir($folder, 0777, true);
        }
        
        $_SESSION['author'] = $_POST["author"];
        $_SESSION['title '] = $_POST["title"];
        $_SESSION['description'] = $_POST["description"];
        
        $title  =    mysqli_real_escape_string($database->conn, $_POST["title"]);
        $author  =   mysqli_real_escape_string($database->conn, $_POST["author"]);
        $email  =    mysqli_real_escape_string($database->conn, $_SESSION['email']);
        $description  =  mysqli_real_escape_string($database->conn, $_POST["description"]);
        

        if($check  !=  false && !empty($title) &&  !empty($author) && !empty($email)  &&  !empty($description) ){
            
            move_uploaded_file($file_tmp, $folder.$file_name);
            
            echo $_SESSION['email'];
            

            if  ($database->save_post($title, $author ,  $email , $description,$file_name) == true){

                header("Location:home.php");

            }else{
                
                header("Location:blogform.php");
            
            }

        }else{
            
            echo "File  is  not  an  image";

            header("Location:blogform.php");
        }   
        
    }

    ?>