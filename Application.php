<?php  include 'Database.php';  ?>

<?php
    class  Application{

        public  $conn;

        function  __construct(){
            
            $this->conn  =  new  Database();

        }
    }
?>