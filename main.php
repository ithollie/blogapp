
<?php

session_start();

include 'Database.php';  $database  =  new Database();

$sql = "SELECT * FROM  `blogs`";
   
$result   =  mysqli_query($database->conn ,$sql) or die($database->conn->error);

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
  
	<div id="wrapper">
  
  		<div  id="header" data-login-name="" data-login-email="" data-login-id="" style="  background-position: 100px 5px;  background-size: 150px;text-align:center; background-color:;background-image: url('images/h.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;" class="carousel-item red white-text" href="#one!">
  			
        <div  id="te" style="padding-top: 0px;margin:0px;position:relative;background-color:white ;">

                    <ul>

                        <li id="messages" ><a class="waves-effect waves-light btn blue" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="index.php"><i class="material-icons" style="color:red"></i>login</a></li>
            	        <li><a class="waves-effect waves-light btn red" style="width:100px;text-transform: lowercase;color:white; text-decoration:none;background-color:" href="register.php">singup</a></li>
                        <li><a class="waves-effect waves-light btn green" style="width:100px;text-transform: lowercase;color:white; text-decoration:none;background-color:" >Bluebees</a></li>

                    </ul>
  		  </div>
  		  
  	
        
  		  
        </div>  
           
        <div id="searchBlogDisplay" style="width:100%;padding-bottom:4px; text-align:center;">

            <div id="paragraph"  style="margin-top:38px;  padding-top: 3px;margin-left:3px;  margin-right:3px">
            </div>  
            </div>

            <h1 style="color:black; text-align: center;font-size:34px; font-weight: 400;font-size:24px; margin_left:auto; margin-right:auto;color:red ; font-size:31px;color:;font-weight:700; font-family: Times, Times New Roman, Georgia, serif;" >Posts</h1>
            <div id="content" style="height:500px; font-size:24px; text-align:center">


                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                        <div id="blog">

                            <div id="" style="width:100%; height:20PX;background-color:;">

                              <div id="te" style="background-color:; padding-top:0px;position:relative;background:white;padding-top: 1px;">
                                       
                                        <ul>
                                          
                                          <li id="messages" ><a class="waves-effect waves-light btn  white" style="text-transform: lowercase;color:black; text-decoration:none;background-color:" href="#"><i class="material-icons" style="color:red"></i> <?php echo $row['author'] ?></a></li>
                                          <li id="friends_accepted" ><a class="waves-effect waves-light btn  pink" style="text-transform: lowercase;color:white; text-decoration:none;background-color:red" href="#"><i class="material-icons"></i><?php echo $row['title'] ?></a></li>
                                      
                                        </ul>
                              </div>

                            </div>
                            
                          <br />
                          
                          <p style="text-align:left;font-size:20px; font-family: Times, Times New Roman, Georgia, serif;"> <?php echo $row['discription'] ?></p>                        
                          
                      
                        </div>
                    
                <?php } ?>
               
            </div>
        </div>


</div>
<br />
<br />


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
        <script>

      var  deletepost =  document.getElementById("delete");

      

      deletepost.addEventListener('click', function  deletePost(event){

      
          if(event.target.attributes[1].nodeValue != 0){

            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {

              if (this.readyState == 4 && this.status == 200) {

                document.getElementById("txtHint").innerHTML = this.responseText;
              
              }
            };

            xmlhttp.open("GET", "delete.php?q=" + event.target.attributes[1].nodeValue, true);
            xmlhttp.send();
      
          }

    });



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
</script>   
<script>

//window.addEventListener(`DOMContentLoaded` ,Controller.initialize);
//window.addEventListener(`DOMContentLoaded`, Objects.object_initialize);
//window.addEventListener(`DOMContentLoaded` ,c.initialize);
</script>

</body>
</html>
