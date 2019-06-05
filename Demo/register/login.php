<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login for notes</title>
	<link rel="shortcut icon" href="tts.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
	<div class="col-sm-7">
		<img src="1.jpeg" width= 100% id="proAd"/>
	</div>
	<div class="col-sm-5">
	<div class="header">
		<h4>LOGIN FORM</h4>
	</div>
	
	<form method="post" action="login.php" width=100px>

		<?php include('errors.php'); ?>
		<div class="form-group">
			<label>USER ID</label>
			<input type="text" name="userid" class="form-control" placeholder="user_id" required="required" >
		</div>
		<br/>
		<div class="form-group">
			<label>PASSWORD</label>
			<input type="password" name="password" class="form-control" required="required">
		</div>
		<div class="form-group">
			<div type="submit" class="login btn btn-success" name="login_user"><strong>LOGIN</strong></div>
		</div>
		
		<p>
			 <a style="text-decoration: none;" href="forgot.php">forgot password ?</a>
		</p>
	</form>

	</div>
</div>
	

</body>
</html>