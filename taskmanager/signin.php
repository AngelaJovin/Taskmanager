<?php

include('connect.php');
include('errors.php');

  if(isset($_POST['submit'])) 
	   {
		$email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
		$Pass = md5($_POST['password']);
		$errors = array(); 

		if (empty($email)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM users WHERE Email='$email' AND Password='$password'";
			$results = mysqli_query($conn, $query);
			if (mysqli_num_rows($results) == 1) {
			  $_SESSION['email'] = $email;
			  $_SESSION['password'] = $password;
			  $_SESSION['success'] = "You are now logged in";
			  header('location: taskmanager.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
 ?>