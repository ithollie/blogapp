<?php include 'Database.php'; ?>

<?php

    session_start();
   
    $database  = new  Database();
    
    $title = $_REQUEST["q"];

    echo " Check  this  here ";

    $description  =  $database->findByDescription($title);


    if($database->update_post($title, $description) == true  && !empty($description)){


        echo $title === "" ? "no suggestion" : $title;
    }

?>