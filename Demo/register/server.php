<?php
    session_start();

    // variable declaration
    $num = mt_rand(1000, 9999);
    $course="";
    $userId = "";
    $firstName ="";
    $lastName = "";
    $batch = "";
    $mobile = "";
    $emailId = "";
    $password_1 = "";
    $password_2 = "";
    $errors = array();
    $_SESSION['success'] = "";

    // connect to database
    $db = mysqli_connect('localhost', 'root', '', 'lms_projectdb');
    $db2 = mysqli_connect('localhost', 'root', '', 'documents');

    // REGISTER USER
    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $course = mysqli_real_escape_string($db, $_POST['course']);

        $batch = mysqli_real_escape_string($db, $_POST['batch']);

        $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

        $userId = mysqli_real_escape_string($db, $_POST['userId']);

        $emailId = mysqli_real_escape_string($db, $_POST['emailId']);
        
        $firstName = mysqli_real_escape_string($db, $_POST['firstName']);

        $lastName = mysqli_real_escape_string($db, $_POST['lastName']);

        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

        // form validation: ensure that the form is correctly filled

        if ($password_1 != $password_2) {
            array_push($errors, "Password didnt match");
        }

        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            $query1 = "SELECT * from user WHERE userId='$userId'";
            $query2 = "SELECT * from user WHERE emailId='$emailId'";
            
            $res1 = mysqli_query($db, $query1);
            $res2 = mysqli_query($db, $query2);
            
            
            $count1 = mysqli_num_rows($res1);
            $count2 = mysqli_num_rows($res2);
            
            
            
            if ($count1>0) {
                array_push($errors, "User Id already exist.");
            } elseif ($count2>0) {
                array_push($errors, "Email Id already exist.");
            } else {
                $query = "INSERT INTO user (userId,firstName,lastName,emailId,mobile,batch,course,profession,password)
						VALUES('$userId','$firstName' ,'$lastName','$emailId','$mobile','$batch','$course','student','$password')";
                mysqli_query($db, $query);

                $_SESSION['userId'] = $userId;
				$_SESSION['success'] = "You are now logged in";
                header('location:login.php');
            }
        } else {
            array_push($errors, "userId didnt match/already exists");
        }
    }
    

    
    /*--------------- LOGIN USER------------------*/

    if (isset($_POST['login_user'])) {

        // $department = mysqli_real_escape_string($db, $_POST['department']);
        // $profession = mysqli_real_escape_string($db, $_POST['profession']);
        //$userId = mysqli_real_escape_string($db, $_POST['userId']);
        $userId = mysqli_real_escape_string($db, $_POST['userId']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        // if (empty($department)) {
        // 		array_push($errors, "Course is required");
        // 	}
        // if (empty($profession)) {
        // 			array_push($errors, "Proffession is required");
        // 		}
        if (empty($userId)) {
            array_push($errors, "UserId is required");
        }
        
        if (empty($password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT userId,password FROM user WHERE userId='$userId' AND password='$password'";
            $results = mysqli_query($db, $query);

            if (mysqli_num_rows($results) == 1) {
                $_SESSION['userId'] = $userId;
                $_SESSION['success'] = "You are now logged in";
                if ($profession == 'student') {
                    header('location:/lms_project/demo/student.php');
                } else {
                    header('location:/lms_project/demo/admin.php');
                }
            } else {
                array_push($errors, "Username or Password is incorrect.");
            }
        }
    }

    //Forgot Password
    if (isset($_POST['forgot_user'])) {
        $emailId = mysqli_real_escape_string($db, $_POST['Email']);
        $_SESSION['num1'] = $num;
        if (empty($emailId)) {
            array_push($errors, "Email is required");
        }
        if (count($errors) == 0) {
            $query = "SELECT emailId FROM register WHERE emailId ='$emailId'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                echo "<script type='text/javascript'>alert('Your Code is '+'$num')

					window.location.href = '/education/register/reset.php'
				</script>";
            } else {
                array_push($errors, "Wrong Email");
            }
        }
    }

    //Rest

    if (isset($_POST['reset_pass'])) {
        echo $_SESSION['num1'];
        $emailId = mysqli_real_escape_string($db, $_POST['Email']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        $code = mysqli_real_escape_string($db, $_POST['code']);
        if (empty($emailId)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }

        if ($password_1 != $password_2) {
            array_push($errors, "password didnt match");
        }
        
        if ($_SESSION['num1'] != $code) {
            array_push($errors, "code didnt match");
        }
        if (count($errors) == 0) {
            $password = md5($password_1);
            $query = "UPDATE register SET password = '$password' WHERE emailId = '$emailId'";
            if (mysqli_query($db, $query)) {
                header('location: /education/register/login.php');
            }
        }
    }

 