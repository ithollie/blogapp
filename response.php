
<?php

session_start();

$port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
$server   =  "127.0.0.1:$port";

$conn = new mysqli($server, "azure" , "6#vWHD_$", "localdb");

$sql    = mysqli_query($conn,  "SELECT *  FROM  `blogs` WHERE title= '".$_GET['title']."'") or die($conn->error);

$rows  = mysqli_fetch_assoc($sql);

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" :$rows['discription'];
?>