<?php  

session_start();

include 'Database.php';  $database  =  new Database();

$sql = "SELECT * FROM  `blogs` WHERE  title ='".$_SESSION['title']."'";

$result   =  mysqli_query($database->conn ,  $sql) or die($database->conn->error);

$items   = mysqli_fetch_assoc($result);

$title  = $items['title'];

$author = $items['author'];
$discription   = $items['discription'];

if (!isset($_SESSION['email'])) {

    header('location:updateform.php');

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
        <a style="color:white;float:right; text-decoration:none;" href="home.php">home</a>

    </div>
    </div>

    <p style="color:white;  font-size:20px">Suggestions: <span id="txtHint"></span></p>

    <div id="" style="margin:center">
        <h1 style="color:white; text-align:center;font-style:20px"> leave  blank if  you don't want  to edit </h1>
    </div>  

	<div id="" style="color:white; font-size:24px; font-weight:300"></div>
	<div id="wrapper" style="background-color:#671636">
		
        <div id="state" style="padding-top: 1px; background-color:;text-align:center; width:100%; height:100%">
			
            <div id="stt" data-key="<?php echo $title ?>" style="padding-top: 5px;width:60%; height:100%; background-color:; text-align:center;margin:auto">
				
				<div class="container" style="background-color:">
                    <div class="row">
                        <div class="Absolute-Center is-Responsive">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <form  id="loginForm" action="" method="post" enctype ="multipart/form-data">
                        <div class="form-group input-group">
                            <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input style="border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="title" placeholder="title" value="<?php echo $title ?>" />
                        </div>

                        <div class="form-group input-group">
                            <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input style="border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="author" placeholder="Author" value="<?php  echo  $author  ?>" />
                        </div>
                        
                        <div class="form-group input-group">
                            <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <textarea id="paragraph"  style="width:30%; border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" cols="80" name="description" placeholder="<?php echo $discription ?>" ></textarea>
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
