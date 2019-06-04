<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h4>Reset Password</h4>
	</div>
	
	<form method="post" action="reset.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Verify Code</label>
			<input type="number" name="code">
			
		</div>	
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="Email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn" name="reset_pass">Reset</button>
		</div>
		
		<p>
			Not yet a member? <a href="register.php">Signup</a>
		</p>
	</form>


</body>
</html>