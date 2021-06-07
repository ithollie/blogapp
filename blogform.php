
<?php

session_start();

if (isset($_GET['logout'])) {

    session_destroy();

    unset($_SESSION['email']);

    header("location: index.php");
}

$blog_user  =  $_SESSION['blog_user'];
$blog_user_last_name  =  $_SESSION['blog_user_last_name'];

$name = $blog_user . " ". $blog_user_last_name;

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>BlueBee</title>
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" href="css/stylel.css">
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body style="background-color:#671636">
  <div id="titlelogin" style="width:100%; height:10%;background-color:#671636">
	  <h1 style="float: left;width: 10%;margin: auto;padding-top:11px;text-align:center;background-color:; font-size:42px; font-weight:700;color:white">BlueBees</h1>
	  <div style="float:right;margin: 12px;" class="waves-effect waves-light btn"><a style="color:black;float:right; text-decoration:none;" href="logout.php">logout</a></div>
	</div>
	<div id="" style="color:white; font-size:24px; font-weight:300"></div>
	<div id="wrapper" style="background-color:#671636">
		<div id="state" style="padding-top: 1px; background-color:;text-align:center; width:100%; height:100%">
			
			<div id="stt" style="padding-top: 5px;width:60%; height:100%; background-color:; text-align:center;margin:auto">
				
				<div class="container" style="background-color:">
          <div class="row">
            <div class="Absolute-Center is-Responsive">
              
              <div class="col-sm-12 col-md-10 col-md-offset-1">
                <form  id="loginForm" action="blog_process.php" method="post" enctype ="multipart/form-data">
                  <div class="form-group input-group">
                    <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input style="border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="title" placeholder="title" value="title" />
                  </div>
                  <div class="form-group input-group">
                    <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input style="border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="author" placeholder="Author" value="<?php echo $name  ?>" required />
                  </div>
                  
                 
                  <div class="form-group input-group">
                    <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <textarea style="width:30%; border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" cols="80" name="description" placeholder="Description"  value="description" required /></textarea>
                  </div>
                 
                  <div class="form-group input-group">
                    <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input style="border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="file" name="file" required />

                  </div>
                
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-def btn-block">Submit</button>
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
//window.addEventListener(`DOMContentLoaded` ,c.initialize);
//window.addEventListener(`DOMContentLoaded` ,mainPage.main);
</script>
</body>
</html>
