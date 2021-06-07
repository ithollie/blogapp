<?php  include 'Application.php';  ?>

<?php
    class Blog{

        private $author;
        private $title;
        private $email;
        private $description;
        private $image;

        function __constructor($title, $author,  $email , $description, $image){
            
            $this->author = $author;
            $this->title  = $title;
            $this->email  = $email;
            $this->discription = $description;
            $this->image       = $image;

        }

        function save_post(){
        
            $database = new Application();

            $database->save_post($author, $email , $description);
            
            $applkication->conn->close();
        }

        function findById($id){

            $database = new Application();

            if(!empty($title)){

               return $database->findById($id);

            }
            $applkication->conn->close();
        }

        function findByBlogTitle($title){

            $database = new Application();

            if(!empty($title)   &&  $title.length >  2){

                return  $database->findByBlogTitle($title);
            }
            $applkication->conn->close();
        
        }

        function getAuthor(){

            return $this->author;
        }

        function getEmail(){
            return  $this->email;
        }

        function getDiscription(){
            return  $this->description;
        }
        
    }

?>