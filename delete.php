<?php  include 'Database.php';  $database =  new  Database(); ?>

<?php 

$q = $_REQUEST["q"];

if($database->deletePost($q) ==  true){

    echo $q === "" ? "no suggestion" : $q;
}

?>