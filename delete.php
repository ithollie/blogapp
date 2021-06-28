<?php  include 'Database.php';  $database =  new  Database(); ?>

<?php 

$condition  =  false;

$id = $_REQUEST["q"];

$port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                
$server   =  "127.0.0.1:$port";
        
$conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
        
$sql = "DELETE  FROM `blogs`  WHERE id='".$id."'";

$result   =  mysqli_query($conn ,  $sql) or die($conn->error);
            
if ($result === TRUE) {

    $condition =  true;
}

if($condition ==  true){

    echo $id === "" ? "no suggestion" : $id;
}

?>