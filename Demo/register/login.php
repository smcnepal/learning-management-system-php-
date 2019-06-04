<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login for notes</title>
	<link rel="shortcut icon" href="tts.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image: url(bg.jpeg);background-repeat: no-repeat;">

	<div class="header">
		<h4>LOGIN FORM</h4>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

			<div class="input-group">
				<label>SELECT A COURSE</label>
				<select name="department">
					<option value="CSE">CSE</option>
					<option value="ISE">ISE</option>
				
				</select>
			</div>
			<label class="radio-inline">
			<input type="radio" name="proffession" value="Student" required="required">STUDENT
			</label>
			<label class="radio-inline">
			<input type="radio" name="proffession" value="Faculty" required="required">ADMIN
			</label>

		<div class="input-group">
			<label>USER ID</label>
			<input type="text" name="userid" placeholder="INT14CS001" required="required" >
		</div>
		<div class="input-group">
			<label>PASSWORD</label>
			<input type="password" name="password" placeholder="****************" required="required">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user"><strong>LOGIN</strong></button>
		</div>
		
		<p>
			 <a style="color: white;text-decoration: none;" href="forgot.php">forgot password ?</a>
		</p>
	</form>


</body>
</html>