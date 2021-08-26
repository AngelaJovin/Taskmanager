<?php
$servername = "localhost";
$uname="root";
$pword="";
$dbname="taskmanager";


// Create connection
$conn = new mysqli($servername,$uname ,$pword, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>