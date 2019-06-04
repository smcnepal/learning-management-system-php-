<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION FORM</title>
	<link rel="shortcut icon" href="tts.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-image: url(bg.jpeg);background-repeat: no-repeat;">
	<div class="header">
		<h3>REGISTRATION FORM</h3>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>SELECT A COURSE</label>
			<select name="department">
				<option value="CSE">CSE</option>
				<option value="ISE">ISE</option>
				
			</select>
		</div>

		
			<label class="radio-inline">
			<input type="radio" name="proffession" value="Student">STUDENT
			</label>
			<label class="radio-inline">
			<input type="radio" name="proffession" value="Faculty">ADMIN
			</label>
		

			<div class="input-group">
			<label>USER ID</label>
			<input type="text" name="userid" placeholder=" 1NT14CS001" value"<?php echo $userid; ?>">
		 </div>

			<div class="row">
				<div class=" col-sm-6 input-group">
					<label>STUDENT NAME</label>
					<input type="text" name="username" placeholder="MUKESH BABU"value="<?php echo $username; ?>">
				</div>
				
		 </div>

		<div class="input-group">
			<label>BATCH NO.</label>
			<input type="text" name="batchno" placeholder="151"value="<?php echo $batchno; ?>">
		</div>
		<div class="input-group">
			<label>MOBILE NO.</label>
			<input type="text" name="mobileno" placeholder="+919620000000"value="<?php echo $mobileno; ?>">
		</div>
		<div class="input-group">
			<label>EMAIL ID</label>
			<input type="email" name="email" placeholder="mukeshbabu47@petritec.com" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>PASSWORD</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>CONFIRM PASSWORD</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user"><STRONG>REGISTER</STRONG></button>
		</div>
		<p>
			Already a member? <a style="color: white;text-decoration: none;" href="login.php">| Signin</a>
		</p>
	</form>
</body>
</html>