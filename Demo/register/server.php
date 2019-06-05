<?php 
	session_start();

	// variable declaration
	$num = mt_rand(1000,9999);
	$department="";
	$username = "";
	$batchno = "";
	$mobileno = "";
	$userid = "";
	$email    = "";
	$proffession="";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$department = mysqli_real_escape_string($db, $_POST['department']);

		$proffession = mysqli_real_escape_string($db, $_POST['proffession']);

		$userid = mysqli_real_escape_string($db, $_POST['userid']);

		$batchno = mysqli_real_escape_string($db, $_POST['batchno']);

		$mobileno = mysqli_real_escape_string($db, $_POST['mobileno']);

		$username = mysqli_real_escape_string($db, $_POST['username']);

		$email = mysqli_real_escape_string($db, $_POST['email']);

		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled

		if (empty($department)) { array_push($errors, "Course is required"); }

		if (empty($proffession)) { array_push($errors, "Proffession is required"); }
		if (empty($userid)) { array_push($errors, "Userid is required"); }
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($batchno)) { array_push($errors, "Batch No. is required"); }

		if (empty($mobileno)) { array_push($errors, "Mobile Number is required"); }

		if (empty($email)) { array_push($errors, "Email is required"); }
		
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "password didnt match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query1 = "SELECT * from user_record WHERE userid='$userid'";
			$query2 = "SELECT email from register WHERE email = '$email'";
			$query3 = "SELECT count(userid) AS total from register WHERE userid='$userid";
			$res1 = mysqli_query($db,$query1);
			$res2 = mysqli_query($db,$query2);
			$res3 = mysql_query($db,$query3);
			$count1 = mysqli_num_rows($res1);
			$count2 = mysqli_num_rows($res2);
			$values = mysqli_fetch_assoc($res3);
			$num_rows=$values['total'];


			if ($count1>0 )
			 
				{
					

			   		 if($count2>0) 
			    		{
						array_push($errors, "Email id already exist.");
			    		}
		   				else 
						{
							$query = "INSERT INTO register (userid,department,proffession,username,batchno,mobileno, email, password) 
						  	VALUES('$userid','$department' ,'$proffession','$username','$batchno','$mobileno', '$email', '$password')";
							mysqli_query($db, $query);

								$_SESSION['username'] = $username;
								$_SESSION['success'] = "You are now logged in";
								if ($proffession == 'Student' && $department=='CSE') 
							{
								header('location:login.php');
							}
								else 
								{
									header('location:login.php');
								}
						}		
					
				}
				else{
				array_push($errors, "userid didnt match/already exists");

			}
		}

	}

	
	/*--------------- LOGIN USER------------------*/

	if (isset($_POST['login_user'])) {

		$department = mysqli_real_escape_string($db, $_POST['department']);
		$proffession = mysqli_real_escape_string($db, $_POST['proffession']);
		//$username = mysqli_real_escape_string($db, $_POST['username']);
		$userid = mysqli_real_escape_string($db, $_POST['userid']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($department)) {
			array_push($errors, "Course is required");
		}
	if (empty($proffession)) {
				array_push($errors, "Proffession is required");
			}
			if (empty($userid)) {
			array_push($errors, "Userid is required");
		}
		
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT userid,department,password,proffession FROM register WHERE userid='$userid'AND department ='$department' AND password='$password' AND proffession='$proffession'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				if ($proffession == 'Student' && $department=='CSE') {
					header('location:/taskone/demo/student.php');
				}
				else {
					header('location:/taskone/demo/admin.php');
				}
			}else {
				array_push($errors, "Wrong userID/password combination/proffession/department");
			}
		}
	}

	//Forgot Password
	if (isset($_POST['forgot_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['Email']);
		$_SESSION['num1'] = $num;
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (count($errors) == 0) {
			$query = "SELECT email FROM register WHERE email ='$email'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
				echo "<script type='text/javascript'>alert('Your Code is '+'$num')

					window.location.href = '/education/register/reset.php'
				</script>";	
								
			}
			else {
				array_push($errors, "Wrong Email");
			}

		}
	}

	//Rest

	if (isset($_POST['reset_pass'])) {
		echo $_SESSION['num1'];
		$email = mysqli_real_escape_string($db, $_POST['Email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$code = mysqli_real_escape_string($db, $_POST['code']);
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "password didnt match");
		}
		
		if ($_SESSION['num1'] != $code){
			array_push($errors, "code didnt match");
		}
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "UPDATE register SET password = '$password' WHERE email = '$email'";
			if(mysqli_query($db, $query)){
			
				header('location: /education/register/login.php');
			}
			
		}

	}


?>
