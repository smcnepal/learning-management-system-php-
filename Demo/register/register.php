<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION FORM</title>
	<link rel="shortcut icon" href="tts.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-sm-7">
		<div class="registerHeader">
		<h3>REGISTRATION FORM</h3>
	</div>
	
	<form  method="post" action="register.php">
	<div id="registerForm">
		<?php include('errors.php'); ?>

		<div class="row form-group">
			<div class="col-sm-4">
				<label>SELECT A COURSE</label>
			</div>
			<div class="col-sm-8">
				<select name="department">
					<option value="">--- SELECT ---</option>
					<option value="CSE">CSE</option>
					<option value="ISE">ISE</option>	
				</select>
			</div>
		</div>		

		<div class="row form-group">
			<div class="col-sm-4">
				<label>USER ID</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="userid" placeholder="user_id" value"<?php echo $userid; ?>">
			</div>
		 </div>

		<div class="row  form-group">
			<div class="col-sm-4">
				<label>FIRST NAME</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="username" placeholder="John"value="<?php echo $username; ?>">
			</div>				
		 </div>

		 <div class="row  form-group">
			<div class="col-sm-4">
				<label>LAST NAME</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="username" placeholder="Jecob"value="<?php echo $username; ?>">
			</div>				
		 </div>

		<div class="row form-group">
			<div class="col-sm-4">
				<label>BATCH NO.</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="batchno" placeholder=""value="<?php echo $batchno; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-sm-4">
				<label>MOBILE NO.</label>
			</div>
			<div class="col-sm-8">
				<input type="text" name="mobileno" placeholder="+919620000000"value="<?php echo $mobileno; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-sm-4">
				<label>EMAIL ID</label>
			</div>
			<div class="col-sm-8">
				<input type="email" name="email" placeholder="example@provider.com" value="<?php echo $email; ?>">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-sm-4">
				<label>PASSWORD</label>
			</div>
			<div class="col-sm-8">
				<input type="password" name="password_1">
			</div>
		</div>

		<div class="row form-group">
			<div class="col-sm-4">
				<label>CONFIRM PASSWORD</label>
			</div>
			<div class="col-sm-8">
				<input type="password" name="password_2">
			</div>
		</div>

		<div class="row form-group">
			<div type="submit" class="btn btn-primary pull-right" name="reg_user"><STRONG>REGISTER</STRONG></div>
		</div>
		<h6><a style="text-decoration: none;" href="login.php">
			Already a member? | Signin</a>
		</h6> 
	</form>
	</div>

		</div>
		<div class="col-sm-5">
			<img src="2.jpg" width= 100% id="proAd"/>
		</div>
	</div>
	
</body>
</html>