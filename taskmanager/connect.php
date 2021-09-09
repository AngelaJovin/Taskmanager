<?php

include('errors.php');
session_start();
$servername = "localhost";
$uname="root";
$pword="";
$dbname="taskmanager";
$errors = array(); 


// Create connection
$conn = new mysqli($servername,$uname ,$pword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['Token'])) {
  $_SESSION['Token']=mysqli_real_escape_string($conn,$_GET['Token']);
  }

if (isset($_POST['reset-password'])) {
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  // ensure that the user exists on our system
  $query = "SELECT Email FROM users WHERE Email='$email'";
  $result = mysqli_query($conn,$query);

  if (empty($email)) {
    array_push($errors, "Your email is required");
  }else if(mysqli_num_rows($result) <= 0) {
    array_push($errors, "Sorry, no user exists on our system with that email");
  }
  // generate a unique random token of length 100
  $token = bin2hex(random_bytes(50));

  if (count($errors) == 0) {
    // store token in the passresets database table against the user's email
    $sql = "INSERT INTO passresets(Email, Token) VALUES ('$email', '$token')";
    $results = mysqli_query($conn, $sql);

    // Send email to user with the token in a link they can click on
    $to = $email;
    $subject = "Reset your password on examplesite.com";
    $msg = "Hi there, click on this <a href=\"newpass.php?token=" . $token . "\">link</a> to reset your password on our site";
    $msg = wordwrap($msg,70);
    $headers = "From: info@examplesite.com";
    mail($to, $subject, $msg, $headers);
    header('location: pending.php?email=' . $email);
  }
}

// ENTER A NEW PASSWORD
if (isset($_POST['new_password'])) {
  $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
  $new_pass_c = mysqli_real_escape_string($conn, $_POST['new_pass_c']);

  // Grab to token that came from the email link
  $token = $_SESSION['Token'];
  if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
  if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
  if (count($errors) == 0) {
    // select email address of user from the password_reset table 
    $sql = "SELECT Email FROM passresets WHERE Token='$token' LIMIT 1";
    $results = mysqli_query($conn, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $new_pass = md5($new_pass);
      $sql = "UPDATE users SET Password='$new_pass' WHERE Email='$email'";
      $results = mysqli_query($conn, $sql);
      header('location: taskmanager.php');
    }
  }
}

if (isset($_POST['edit'])) {
	$id = $_POST['ID'];
	$title = $_POST['title'];
	$assignedto = $_POST['assignedto'];
  $assignedby = $_POST['assignedby'];

	mysqli_query($conn, "UPDATE tasks SET Title='$title', AssignedTo='$assignedto', AssignedBy='$assignedby' WHERE ID=$id");
	header('location: taskmanager.php');
}

?>
