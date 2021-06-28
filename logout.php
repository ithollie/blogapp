<?php
   session_start();

   unset($_SESSION["email"]);
   unset($_SESSION["password"]);
   unset($_SESSION['Error']);

   echo 'You have logout';
   header("Location:index.php?logout='logout'");
?>
