  
<?php
include('connect.php');
include('errors.php');

$errors = array(); 

if(isset($_POST['submit']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = mysqli_real_escape_string($conn,$_POST['password']); 
 $Pass = md5($_POST['password']); 	//encrypt the password before saving in the database

 // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array 
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
 
  // first check the database to make sure 
  // a user does not already exist with the same email
  $user_check_query = "SELECT * FROM users WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
   
    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
    
  	$sql= "INSERT INTO users (Email,Password) 
  			  VALUES( '$email', '$password')";
  	mysqli_query($conn, $sql);
  	$_SESSION['email'] = $email;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: taskmanager.php');
  }
}

?>