<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="IbrahimThollie">

<title> Register </title>

<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="stylel.css">
<link rel='stylesheet' media='screen and (min-width: 164px) and (max-width: 900px)' href="convert.css" />
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<link rel="shortcut icon" href="images.png">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="javascript/ajax.js"></script>

</head>
<body style="background-color:#671636;background-image: url({{url_for('static', filename='/uploads/bac.jpg')}});background-repeat:no-repeat;background-size:cover;background-position:center;">
    <div id="titlelogin" style="width:100%; height:10%;background-color:#ca7396">
    
	  <h1 style="float:center;width: 10%;margin: auto;padding-top:11px;text-align:center;background-color:; font-size:24px; font-weight:700;color:black"></h1>

  <div id="message" style="float:right">	
  </div>
	</div>
    <div id="wrapper" style="background-color:#ca7396">
      <div id="state" style="padding-top: 1px; background-color:;text-align:center; width:100%; height:100%">
        <div id="stt" style="padding-top: 5px;width:60%; height:100%; background-color:; text-align:center;margin:auto">
          <div class="container" style="background-color:red">

            <div class="row">

              <div class="Absolute-Center is-Responsive" style="padding-top: 84px;">
                
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                  <form  id="loginForm"  action="register_process.php" method="post" role="form" enctype ="multipart/form-data">
                    <div class="form-group input-group">
                      <span style="font-weight: bold;color:white"  class="input-group-addon" ><strong>firstname</strong></span>
                      <input id="email" style="font-size:24px;border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="firstname" placeholder="firstname" required/>
                    </div>
                    <div style="text-align:center" class="form-group input-group">
                      <span style="font-weight: bold;color:white" class="input-group-addon"><strong>lastname</strong></span>
                      <input id="password" style="border-radius: 10px;font-size:24px;padding-left:12px;background-color:white" class="form-control" type="text" name="lastname" placeholder="lastname" required/>
                    </div>
                    <div class="form-group input-group">
                      <span style="font-weight: bold;color:white"  class="input-group-addon" ><strong>email</strong></span>
                      <input id="email" style="font-size:24px;border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="email" placeholder="email" required/>
                    </div>
                    <div class="form-group input-group">
                      <span style="font-weight: bold;color:white"  class="input-group-addon" ><strong>address</strong></span>
                      <input id="email" style="font-size:24px;border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="address" placeholder="address" required/>
                    </div>
                    <div class="form-group input-group">
                      <span style="font-weight: bold;color:white"  class="input-group-addon" ><strong>birthday</strong></span>
                      <input id="email" style="font-size:24px;border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="text" name="day" placeholder="birthday" required/>
                    </div>
                    <div class="form-group input-group">
                      <span style="font-weight: bold;color:white"  class="input-group-addon" ><strong>password</strong></span>
                      <input id="email" style="font-size:24px;border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="password" name="password" placeholder="password" required/>
                    </div>

                    <div class="form-group input-group">
                      <span style="font-weight: bold;color:white"  class="input-group-addon" ><strong>confirm password</strong></span>
                      <input id="email" style="font-size:24px;border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="password" name="confirm_password" placeholder="confirm_password" required/>
                    </div>
                    <div class="form-group input-group">
                    <span style="color:white" class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input style="border-radius: 10px;padding-left:12px;background-color:white" class="form-control" type="file" name="file" required />

                  </div>
                
                    <button  class="btnlogin btn btn-def btn-block" style="background-color:green;float:center; width:100%; text-align:center; text-align:center" type="submit" id="login">Sigup</button>
                    
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>		
     </div>	
</div>
<script>
    window.addEventListener(`DOMContentLoaded` ,cs.initialize);
</script>
</body>
</html>
