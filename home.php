
<?php  

session_start();

require_once 'Database.php'; 

$database  =  new Database();

$port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                
$server   =  "127.0.0.1:$port";
        
$conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb") or  die("Connection failed: " . $conn->connect_error);
      
if($conn->connect_error) {
    
    header('location: loginFailed.php');
  
}else{
            // the display  all  users 
            $all    = mysqli_query($conn,  "SELECT *  FROM  `register` ") or die($conn->error);
            
            $alls   = mysqli_fetch_assoc($all);
            
            foreach($a as $alls){
                
                echo   $a['firstname'];
                
            }
           
            $id = intval($_GET['id']);
            
            $message   = "";
            
            $admin = rawurldecode($_GET['admin']);
            
            echo  $admin;
            
            $url_query  =   mysqli_query($conn ,"SELECT * FROM `register`  WHERE  email='".$_SESSION['email']."'" ) or die($conn->error);
            
            $url   = mysqli_fetch_assoc($url_query);
            
            $uri = $_GET['id'];
            
            $users   =  mysqli_query($conn ,"SELECT * FROM `register`  WHERE  email='".$_SESSION['email']."'" ) or die($conn->error);
            
            $blogssql   =  mysqli_query($conn , "SELECT * FROM  `blogs`") or die($conn->error);
            
            $postss   =  mysqli_query($conn,   "SELECT *  FROM `blogs` WHERE  email='".$_SESSION['email']."' ORDER  BY  `title`") or die($conn->error);
            
            $user   = mysqli_fetch_assoc($users);
            
            $posts   = mysqli_fetch_assoc($postss);
           
            if(mysqli_num_rows($postss) >  0){
            
                foreach($posts as $item){
                  
                    $_SESSION['title'] =  $items['title'];
                    
                    $_SESSION['blog_user'] = $user['firstname'];
            
                }
            }  
            
            $firstname  = $user['firstname'];
            $lastname   = $user['lastname'];
        
           
            $_SESSION['USER_ID'] =  $user['id'];
            $_SESSION['blog_user'] = $user['firstname'];
            $_SESSION['blog_user_last_name'] = $user['lastname'];
            
        
            function  saveUserId($id){
                
                session_start();
                $_SESSION['USER_ID'] = $id;
            }
                
            function  getUserId(){
                    
                session_start();
                return  $_SESSION['USER_ID'];
            }
            
            saveUserId($user['id']);
            
            ?>
            
            <?php
            
            if (!isset($_SESSION['email'])) {
            
                $_SESSION['msg'] = "You have to log in first";
            
                header('location: index.php');
            
            }
            
           
            if (isset($_GET['logout'])) {
            
                session_destroy();
                
                unset($_SESSION['email']);
                
                header("location: index.php");
            }
            $conn->close();
}

?>
    
<!DOCTYPE HTML>
<html>
<head>
      <!-- Modal meta -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Modal title -->
      <title>Bluebees</title>
      <!-- Modal Structure -->
      <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <!-- Modal stylesheet -->
      <link rel="stylesheet" href="css/style.css">

      <!-- Modal Materialize -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="shortcut icon" href='images/images.png'>
      <link rel="stylesheet" href='css/login.css'>
      <!--<link rel="stylesheet" href="css/gt.css">-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <!-- Modal media jquery -->
      <script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>
    	
      <!-- Modal media queries -->
      <link rel="stylesheet" media='screen and (min-width: 164px) and (max-width: 900px)' href='css/convert.css' />
      <!--<link rel="stylesheet" media="screen and (min-width: 701px) and (max-width: 900px)" href="css/medium.css" />-->
      <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

      <!-- Modal javascripts links -->
      <script src="javascript/system.js"></script>
    
  </head>
  <body>
  
	<div id="wrapper"  style="height:; position:">
	    
  	  <!-- Modal model -->
    
  	        <div  id="header" data-login-name="" data-login-email="" data-login-id="" style="  background-position: 100px 5px;  background-size: 150px;text-align:center; background-color:;background-image: url('images/h.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;" class="carousel-item red white-text" href="#one!">
  			
                <div  id="te" style="padding-top: 0px;margin:0px;position:relative;background-color:white ;">
                        
                        <ul>
        
                            <li id="messages" ><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red">message</i>2</a></li>
                            <li id="friends_accepted" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="#"><i class="material-icons">person_pin</i>1</a></li>
                            <li id="friendRequest" ><a class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" href="#"><i class="material-icons">feedback</i>3</a></li>
                    	    <li><a class="waves-effect waves-light btn #e91e63" style="width:100px;text-transform: lowercase;color:white; text-decoration:none;background-color:" href="#">Bluebees</a></li>
                    		<li><a class="waves-effect waves-light btn red"   style="text-transform: lowercase;color:white; text-decoration:none;background-color:" href="logout.php">logout</a></li>
                    		<li><a class="waves-effect waves-light btn brown" style="text-transform: lowercase;color:; text-decoration:none;background-color:brown" href="blogform.php?id='.<?php echo $_GET['id']; ?>.' ">Add post</a></li>
                    			
                          </ul>
          		 </div>
  		  
  	    <div id="lastfirst" style="width:100%;height:20%;position:relative;top:0px; background-color:">
  	
  	    </div>
        <div id="" style="width:100%; height:20PX;background-color:;">
            <div id="te" style="background-color:; padding-top:0px;position:relative;background:;padding-top: 1px;">
                    <ul>
        
                        <li id="messages" ><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red"></i><?php echo $firstname ?></a></li>
                        <li id="friends_accepted" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="#"><i class="material-icons"></i><?php echo $lastname ?></a></li>

                    </ul>
            </div>
  		</div>
            
            <div id="welcome" ><h1 id="firstname" style="font-size:31px;color:;font-weight:700;padding-top:1px">Welcome  Loign  successful :  <?php  echo  $firstname ." ". $lastname ?>  </h1></div>
  		
  		</div>
  		    
  		    <br />
  		    
  		    <div id="current" style="padding-top: 2px; padding-bottom:81px; text-align:center; width:100%; height:10%; background-color:#ffffff">
                
                <h1 style="color:black; font-size:20px;font-weight:700;padding-top:1px">Current members</h1>
                  
                    <?php while($row = mysqli_fetch_array($alls, MYSQLI_ASSOC)){ ?>
                    
                        <div id="" style="width:100%; height:20PX;background-color:;">
                            
                                  <div id="te" style="background-color:; padding-top:0px;position:relative;background:white;padding-top: 1px;">
                                          
                                          <ul>
                                              <h1 style="color:green"><?php  echo $row['firstname'];  ?></h1>
                                              
                                              <li style="color:black" id="messages"><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red"></i><?php  echo $row['firstname']; ?></a></li>
    
                                          </ul>
                                          
                                  </div>
          		        </div>
          		        
                    <?php } ?>
            </div>
            
           
            <div  id="te" style="padding-top: 0px;margin:0px;position:relative;background-color:white ;">
            			
            	<ul>

                    <li id="messages" ><a class="waves-effect waves-light btn  white" style="font-weight:700; font-size:24px;text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red"></i><strong>search  for  a post</strong></a></li>
                    <li id="error" ></li>

            	</ul>
            	
  		    </div>
  		  
  		  
            <div id="searchdiv" style="text-align:center">
                    
                    <input id="input" style="text-align;center;  border-radius: 10px;padding-left:12px;background-color:black;width:70%; color:white; font-weight:700;  font-size:20px" class="form-control" type="text" name="title" placeholder="search blog" value="">
		            <h1 id="find" style="color:black; text-align: center;font-size:34px; font-weight: 400;font-size:24px; margin_left:auto; margin-right:auto;color:red ; font-size:31px;color:;font-weight:700; font-family: Times, Times New Roman, Georgia, serif;">find</h1>
		            
		    </div>
		            <div id="" style="width:100%;  height:auto;  margin:auto;text-align: center;">
		                
                        <h2 style="text-align:center"><a id="findTitle" style="font-size: 30px;font-family: Times, Times New Roman, Georgia, serif;text-transform: lowercase;color:black; text-decoration:none;background-color:"></a></h2>
                        <p id="discription" style="font-size: 20px;font-family: Times, Times New Roman, Georgia, serif;"></p>
                    
                    </div>
                    
                    
                    <div id="searchBlogDisplay" style="width:100%;padding-bottom:4px; text-align:center;">
                        
                        <div id="" style="width:100%; height:10PX;background-color:;">
                              
                        
      		            </div>

                    </div>

            <h1 style="color:black; text-align: center;font-size:34px; font-weight: 400;font-size:24px; margin_left:auto; margin-right:auto;color:red ; font-size:31px;color:;font-weight:700; font-family: Times, Times New Roman, Georgia, serif;" >Posts</h1>

            <div id="content" style="height:; font-size:24px; text-align:center">
                
                <?php while($row = mysqli_fetch_array($blogssql, MYSQLI_ASSOC)){ ?>
                        
                        <div id="<?php echo $row['id'] ?>" >

                            <div id="" style="width:100%; height:20PX;background-color:;">
                                
                              <div id="te" style="background-color:; padding-top:0px;position:relative;background:white;padding-top: 1px;">
                                      <ul>
                                          
                                          <li id="" ><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" ><i class="material-icons" style="color:red"></i> <?php echo $row['author'] ?></a></li>
                                          <li id="" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" ><i class="material-icons"></i><?php echo $row['title']; ?></a></li>
                                          <li id="" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="viewBlog.php?id='<?php echo $row['id']; ?>'"><i class="material-icons"></i><spa>view  blog</spa></a></li>
                                      </ul>
                              </div>
                            </div>
                            
                          <br />
                          <div id="">
                        
                          <p style="text-align:left;font-size:20px; font-family: Times, Times New Roman, Georgia, serif;"> <?php echo $row["discription"] ?></p>                        
                        
                          </div>
                          
                          <img src="uploads/<?php  echo  $row['postImage']; ?>" alt="Girl in a jacket" width="100%" height="600" class=" responsive-img">
                          
                          <div id="txtHint" style="color:red;width:20%;background-color:green"></div>
                          
                          <div id="" style="width:100%; height:57px;background-color:white;padding-top:0px">
                              
                              <div id="te" style="padding-top:0px;position:relative;background:;padding-top: 0px;">
                                  
                                     <ul>
                                          <li id="commet"><a class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" href="comment.php?id='<?php echo $row['id'];  ?>'"><i class="material-icons"></i>comments<span style="color:black"></span></a></li>
                                          <li ><a id="delete" data-key="<?php echo $row["id"] ?>" class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:">Delete</a></li>
                                          <li ><a  data-key-key="<?php  echo   $row["id"] ?>" class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="updateform.php?id='<?php  echo  $row['id'];  ?>'"><i class="material-icons"></i>Edit<span style="color:black"></span></a></li>
                                          <!--
                                          <li id="like"><a data-key="<?php  echo   $row["id"] ?>"  class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" ><i class="material-icons"></i>likes<span style="color:black">34 </span></a></li>
                                          <li id="dislike"><a data-key="<?php  echo   $row["id"] ?>" class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" ><i class="material-icons"></i>dislike<span style="color:black">12</span></a></li>
                                        -->
                                        
                                    </ul>
                              </div>
                              
                          </div>
                          
                        </div>
                        
                    
                <?php } ?>
            </div>

</div>


</div>
<footer class="page-footer" style="position:relative;clear: both;background-color:">
          <div class="container">
            <div class="row">
              <div class="">
                <h5 class="">Mission Statement</h5>
                <p class="" style="color:black">Be Beautiful</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <li><a class="grey-text text-lighten-3" href="#!"></a></li>
                  <h2 style="color:black;">Hello My User ID Is: <?php echo " " . getUserId(); ?></h2><br>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2021 Copyright  Vibee inc.
            </div>
          </div>
</footer>

	
        <script>

          var  deletepost =  document.querySelectorAll("#delete");  
          var  likes_click =  document.querySelectorAll("#like");  
          var  dislikes_click =  document.querySelectorAll("#dislike"); 
          var  find           =  document.getElementById("find");
         
          
          find.addEventListener("click",showHint);
          
          
          $(document).ready(function() {
              
                console.log("Ready!");
                
          });

          function likes(){
            
            for(let  v  =  0;  v <  likes_click.length;  v++){
    
                    likes_click[v].addEventListener("click", function(event){
    

                    let  id  =  event.target.attributes[0].nodeValue
    
                    if(event.target.attributes[1].nodeValue != 0){
    
                      var xmlhttp = new XMLHttpRequest();
    
                      xmlhttp.onreadystatechange = function() {
    
                        if (this.readyState == 4 && this.status == 200) {
    

                            document.getElementById("txtHint").innerHTML = this.responseText;
                            
                        }
                        
                      };
    
                      xmlhttp.open("GET", "like.php?blog_id="+ event.target.attributes[0].nodeValue, true);
                      xmlhttp.send();
                
                    }
    
              });
            }
          }
          
      
      function dislikes(){
      
        for(let  v  =  0;  v <  dislikes_click.length;  v++){

            dislikes_click[v].addEventListener("click", function(event){

               

                if(event.target.attributes[0].nodeValue != 0){

                  var xmlhttp = new XMLHttpRequest();

                  xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                
                        document.getElementById("txtHint").innerHTML = this.responseText;
                        

                    }
                  };

                  xmlhttp.open("GET", "dislikes.php?blog_id="+ event.target.attributes[0].nodeValue, true);
                  
                  xmlhttp.send();
            
                }

          });
        }
      }
      
      function deletePost(){

          for(let  v  =  0;  v <  deletepost.length;  v++){

            deletepost[v].addEventListener("click", function(event){

                if(event.target.attributes[1].nodeValue != 0){

                  var xmlhttp = new XMLHttpRequest();

                  xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("txtHint").innerHTML = this.responseText;
                        
                        event.path[5].style.display = "none";

                    }
                  };

                  xmlhttp.open("GET", "delete.php?q=" + event.target.attributes[1].nodeValue, true);
                  xmlhttp.send();
            
                }

          });
        }
      }

      function showHint(event) {

        var input  = document.getElementById("input").value;
        

        if (input.length == 0) {

          document.getElementById("error").innerHTML = "please  enter  something  in  the  search   box";

          return;

        } else {
            
          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                
                 if(this.responseText != null){
                    
                    document.getElementById("findTitle").innerHTML= input;
                    document.getElementById("discription").innerHTML = this.responseText;
                }
                
            
            }

          };

          xmlhttp.open("GET", "response.php?title=" + input, true);
          xmlhttp.send();
        }
    }
  
    deletePost();
    likes();
    dislikes();
    
</script>   
<script>

//window.addEventListener(`DOMContentLoaded` ,Controller.initialize);
//window.addEventListener(`DOMContentLoaded`, Objects.object_initialize);
//window.addEventListener(`DOMContentLoaded` ,c.initialize);
</script>

</body>
</html>

