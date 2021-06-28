?php  

session_start();

include 'Database.php';  $database  =  new Database();

$port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
                
$server   =  "127.0.0.1:$port";
        
$conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");
       

$users   =  mysqli_query($conn ,"SELECT * FROM `register`  WHERE  email='".$_SESSION['email']."'" ) or die($conn->error);

$blogssql   =  mysqli_query($conn , "SELECT * FROM  `blogs` WHERE  email='".$_SESSION['email']."' ORDER  BY  `title`  LIMIT  4") or die($conn->error);

$postss   =  mysqli_query($conn,   "SELECT *  FROM `blogs` WHERE  email='".$_SESSION['email']."' ORDER  BY  `title`") or die($conn->error);

$user   = mysqli_fetch_assoc($users);

$posts   = mysqli_fetch_assoc($postss);

if(mysqli_num_rows($postss) >  0){

    foreach($posts as $item){
      
        $_SESSION['title'] =  $posts['title'];
        $_SESSION['blog_user'] = $user['firstname'];

    }
}
$firstname  = $user['firstname'];
$lastname   = $user['lastname'];

$_SESSION['blog_user'] = $user['firstname'];
$_SESSION['blog_user_last_name'] = $user['lastname'];

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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <!-- Modal stylesheet -->
    	<link rel="stylesheet" href="css/style.css">
    
      
      <!-- Modal Materialize -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="shortcut icon" href="images/images.png">
    	<link rel="stylesheet" href="css/login.css">
    	<!--<link rel="stylesheet" href="css/gt.css">-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
      <!-- Modal media jquery -->
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    	
      <!-- Modal media queries -->
      <link rel='stylesheet' media='screen and (min-width: 164px) and (max-width: 900px)' href="css/convert.css" />
      <!--<link rel='stylesheet' media='screen and (min-width: 701px) and (max-width: 900px)' href='css/medium.css' />-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <!-- Modal javascripts links -->
      <script src="javascript/system.js"></script>
     
    
  </head>
  <body>
  
	<div id="wrapper"  style="height:auto">
  	  <!-- Modal model -->
    
  		<div  id="header" data-login-name="" data-login-email="" data-login-id="" style="  background-position: 100px 5px;  background-size: 150px;text-align:center; background-color:;background-image: url('images/h.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;" class="carousel-item red white-text" href="#one!">
  			
        <div  id="te" style="padding-top: 0px;margin:0px;position:relative;background-color:white ;">
            			<ul>

                    <li id="messages" ><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red">message</i>2</a></li>
                    <li id="friends_accepted" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="#"><i class="material-icons">person_pin</i>1</a></li>
                    <li id="friendRequest" ><a class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" href="#"><i class="material-icons">feedback</i>3</a></li>
            	    	<li><a class="waves-effect waves-light btn #e91e63" style="width:100px;text-transform: lowercase;color:white; text-decoration:none;background-color:" href="#">Bluebees</a></li>
            				<li><a class="waves-effect waves-light btn red"   style="text-transform: lowercase;color:white; text-decoration:none;background-color:" href="logout.php">logout</a></li>
            				<li><a class="waves-effect waves-light btn brown" style="text-transform: lowercase;color:; text-decoration:none;background-color:brown" href="blogform.php">Add post</a></li>
            			
                  </ul>
  		  </div>
  		  
  	    <div id="lastfirst" style="width:100%;height:20%;position:relative;top:0px; background-color:">
  	
  	    </div>
        <div id="" style="width:100%; height:20PX;background-color:;">
            <div id="te" style="background-color:; padding-top:0px;position:relative;background:;padding-top: 1px;">
                    <ul>
                        
                        <li id="messages" ><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red"></i><?php echo $firstname ?></a></li>
                        <li id="friends_accepted" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="#"><i class="material-icons"></i><?php echo $lastname ?></a></li>
                        <li id="friendRequest" ><a class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" href="#"><i class="material-icons"></i>online</a></li>
                    </ul>
            </div>
  		</div>

          <div id="welcome" ><h1 id="firstname" style="font-size:31px;color:;font-weight:700;padding-top:1px">Welcome <?php  echo  $firstname .' '. $lastname ?>  </h1></div>
  		</div>
  		

            <br />
          

            <div id="profile_picture" style="padding-top: 50px;text-align:center; width:100%; height:10%; background-color:#e91e63">

            <img style="width:100px;margin:auto ; margin-left:auto;  margin-right:auto; height:100px;"  src="profile/profile.jpg" alt="" class=" responsive-img">  

            </div>
            <div  id="te" style="padding-top: 0px;margin:0px;position:relative;background-color:white ;">
            			<ul>

                    <li id="messages" ><a class="waves-effect waves-light btn  white" style="font-weight:700; font-size:24px;text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red"></i><strong>search  for  a post</strong></a></li>
                    
            			
                  </ul>
  		  </div>
  		  
            <div id="searchdiv" style="text-align:center">
                <input id="input"  onkeyup="showHint()" style="text-align;center;  border-radius: 10px;padding-left:12px;background-color:black;width:70%; color:white; font-weight:700;  font-size:20px" class="form-control" type="text" name="title" placeholder="search blog" value="">
		        </div>
            <p>Suggestions: <span id="txtHint"></span></p>
            <div id="searchBlogDisplay" style="width:100%;padding-bottom:4px; text-align:center;">

            <div id="" style="width:100%; height:20PX;background-color:;">
                          <div id="te" style="background-color:; padding-top:0px;position:relative;background:white;padding-top: 1px;">
                                  <ul>
                                      
                                      <li id="messages"><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red"></i> Ibrahim </a></li>
                                      <li id="friends_accepted"><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="#"><i class="material-icons"></i>United States</a></li>
                                  </ul>
                          </div>
  		        </div>

            <div id="paragraph"  style="margin-top:38px;  padding-top: 3px;margin-left:3px;  margin-right:3px">
            <p id="paragrah_one"  style="background-color:;color:black;font-size:20px; text-align:left;font-family: Times, Times New Roman, Georgia, serif;"> The U.S. is a country of 50 states covering a vast swath of North America, with Alaska in the northwest and Hawaii extending the nation’s presence into the Pacific Ocean. Major Atlantic Coast cities are New York, a global finance and culture center, and capital Washington, DC. Midwestern metropolis Chicago is known for influential architecture and on the west coast, Los Angeles' Hollywood is famed for</p>
            </div>  
            </div>

                  <h1 style="color:black; text-align: center;font-size:34px; font-weight: 400;font-size:24px; margin_left:auto; margin-right:auto;color:red ; font-size:31px;color:;font-weight:700; font-family: Times, Times New Roman, Georgia, serif;" >Posts</h1>

            <div id="content" style="height:500px; font-size:24px; text-align:center">
                
                <?php while($row = mysqli_fetch_array($blogssql, MYSQLI_ASSOC)){ ?>

                        <div id="<?php echo $row['id'] ?>" >

                            <div id="" style="width:100%; height:20PX;background-color:;">
                                
                              <div id="te" style="background-color:; padding-top:0px;position:relative;background:white;padding-top: 1px;">
                                      <ul>
                                          
                                          <li id="" ><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" ><i class="material-icons" style="color:red"></i> <?php echo $row['author'] ?></a></li>
                                          <li id="" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" ><i class="material-icons"></i><?php echo $row['title'] ?></a></li>
                                      </ul>
                              </div>
                            </div>
                            
                          <br />
                          <div id="">
                          
                          <p style="text-align:left;font-size:20px; font-family: Times, Times New Roman, Georgia, serif;"> <?php echo $row['discription'] ?></p>                        
                        
                          </div>

                          <img    src="profile/profile.jpg"  >
                          
                          
                          
                          


                          <div id="" style="width:100%; height:57px;background-color:white;padding-top:0px">
                              <div id="te" style=" padding-top:0px;position:relative;background:;padding-top: 0px;">
                                      <ul>
                                          <li ><a id="delete"   data-key="<?php echo $row['id'] ?>" class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:">Delete</a></li>
                                          <li ><a  data-key-key="<?php  echo   $row['id'] ?>" class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="updateform.php"><i class="material-icons"></i>Edit</a></li>
                                          <li id="friendRequest" ><a class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" ><i class="material-icons"></i>like</a></li>
                                          <li id="friendRequest" ><a class="waves-effect waves-light btn  teal" style="text-transform: lowercase;color:; text-decoration:none;background-color: yellow" ><i class="material-icons"></i>dislike</a></li>

                                        </ul>
                              </div>
                          </div>
                      
                        </div>
                    
                <?php } ?>
            </div>

</div>
<br />
</br >
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
</div>
<br />
<br />


	
        <script>

      var  deletepost =  document.querySelectorAll("#delete");
    
      function deletePost(){

          for(let  v  =  0;  v <  deletepost.length;  v++){

            deletepost[v].addEventListener('click', function(event){

                console.log("id =  " + event.target.attributes[1].nodeValue);

                if(event.target.attributes[1].nodeValue != 0){

                  var xmlhttp = new XMLHttpRequest();

                  xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        alert("Do  you  want to delete  post");

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

          document.getElementById("txtHint").innerHTML = "";

          return;

        } else {

        
          var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

              document.getElementById("txtHint").innerHTML = this.responseText;
            
            }

          };

          xmlhttp.open("GET", "response.php?q=" + input, true);
          xmlhttp.send();
        }
    }
  
    deletePost();

</script>   
<script>

//window.addEventListener(`DOMContentLoaded` ,Controller.initialize);
//window.addEventListener(`DOMContentLoaded`, Objects.object_initialize);
//window.addEventListener(`DOMContentLoaded` ,c.initialize);
</script>

</body>
</html>
