<?php  

session_start();

$port     =  $_SERVER['WEBSITE_MYSQL_PORT'];
    
$server   =  "127.0.0.1:$port";
    
$conn =  new mysqli($server, "azure" , "6#vWHD_$", "localdb");

$sql = "SELECT * FROM  `blogs` WHERE  id=".$_GET['id']."";

$result   =  mysqli_query($conn ,  $sql) or die($conn->error);

$items   = mysqli_fetch_assoc($result);

$sqluser = "SELECT * FROM  `register` WHERE  email='".$_SESSION['email']."'";

$resultuser   =  mysqli_query($conn ,  $sqluser) or die($conn->error);

$itemuser   = mysqli_fetch_assoc($resultuser);

$title  = $items['title'];
$author = $items['author'];
$id     = $items['id'];
$discription  = $items['discription'];

$table  = strval($id.$title); 

$sqltable  = "CREATE TABLE `".$table."`  (

                `id` int(11) AUTO_INCREMENT  PRIMARY KEY,
                `blog_id`varchar(100) NOT  NULL,
                `title` varchar(100) NOT NULL,
                `author` varchar(100) NOT NULL,
                `discription` varchar(2000) NOT NULL
         
)";  
if (mysqli_query($conn,  $sqltable) ===  TRUE)
{
        echo "Table registration created successfully";
}
  

$sql_comment = "SELECT  *  FROM  `".$table."`  WHERE blog_id='".$id."'";
        
$result_comment =   mysqli_query($conn, $sql_comment) or die($conn->error);

$_SESSION['title_blog'] = $id;

if (!isset($_SESSION['email'])) {

    header('location:index.php');

}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>blog</title>
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" href="css/stylel.css">
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

</head>
<body style="background-color:#671636">
    <div id="titlelogin" style="width:100%; height:10%;background-color:#671636;color:white">
	  <h1 style="float: left;width: 10%;margin: auto;padding-top:11px;text-align:center;background-color:; font-size:24px; font-weight:700;color:white">BlueBees</h1>
	  <div style="float:right;margin: 12px;" class="waves-effect waves-light btn red">
        <a style="color:white;float:right; text-decoration:none;" href="logout.php">logout</a>

    </div>
    <div style="float:right;margin: 12px;" class="waves-effect waves-light btn red">
        <a style="color:white;float:right; text-decoration:none;" href="home.php?id='<?php echo  $itemuser['id']; ?>'"> home</a>

    </div>
    </div>

    <div id="" style="margin:center">
        
        <h2 style="color:white; text-align:center;font-style:20px">Please make  a comment </h2>
        
        <h2 style="color:white; text-align:center;font-style:20px"><span style="color:green">blog title </span><?php echo $title ; ?> </h2>
        <h2 style="color:white; text-align:center;font-style:20px"><span style="color:green;;">blog author </span><?php echo $author; ?> </h2>
        <pa style="color:white; text-align:center;font-style:20px"><span style="color:green;;">blog discription </span><?php echo $discription; ?> </pa>

    </div>  

	
	<div id="wrapper" style="background-color:#671636;height:auto;">
		
        <div id="state" style="padding-top: 1px; background-color:;text-align:center; width:100%; height:34%">
			
            <div id="stt" data-key="<?php echo $title ?>" style="padding-top: 5px;width:60%; height:100%; background-color:; text-align:center;margin:auto">
				
				<div class="container" style="background-color:;  height:5%;">
                    <div class="row">
                        <div class="Absolute-Center is-Responsive" style="height:5%">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <form  id="loginForm" action="comment_process.php?id='<?php echo $id;  ?>'" method="post" enctype ="multipart/form-data">
                        

                        <div class="form-group input-group">
                            <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <textarea id="paragraph"  style="width:30%; border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" cols="80" name="description" placeholder="discription "  ></textarea>
                        </div>
                        
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" id="submit" class="btn btn-def btn-block" name="submit">Submit</button>
                        </div>
                        
                        </form>
                </div>
            </div>
          </div>
        </div>
	 </div>		
	</div>
	<br />
	<br />
	<br />
	<br />
	<div id="content" style="height:; font-size:24px; text-align:center;  background-color:white;">
                
                <?php while($row = mysqli_fetch_array($result_comment, MYSQLI_ASSOC)){ ?>

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
                          <br />
                          <br />
                          <div id="">
                          
                          <p style="text-align:left;font-size:20px; font-family: Times, Times New Roman, Georgia, serif;"> <?php echo $row["discription"] ?></p>                        
                        
                          </div>

                       
                          
                        </div>
                        
                    
                <?php } ?>
            </div>
    
    
    
    </div>
    
    
    
<script>

    var  editPost =  document.getElementById("submit");
    var  title    =  document.getElementById("stt");
    var  paragraph  = document.getElementById("paragraph");

    function edit(){

            editPost.addEventListener('click', function(event){

                if(event.target.attributes[1].nodeValue != 0){

                    console.log(paragraph.innerText);

                    var xmlhttp = new XMLHttpRequest();

                    xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("txtHint").innerHTML = this.responseText;
                    
                    }
                 };

                 xmlhttp.open("GET", "update.php?q=" + title.attributes[1].value , true);

                 xmlhttp.send();
    
                }else{

                    alert("Text area  is  empty ");
                }

            });

    
    }
    edit();

</script>  


<script>
//window.addEventListener(`DOMContentLoaded` ,c.initialize);
//window.addEventListener(`DOMContentLoaded` ,mainPage.main);
</script>
</body>
</html>

