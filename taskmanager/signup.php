  
<?php

require_once('connect.php');

if(isset($_POST['submit']))
{
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $password = mysqli_real_escape_string($conn,$_POST['password']);
 
 $Pass = md5($_POST['password']);

 $sql = "insert into users (Email,Password)
     values ('$email', '$password')";

 $result = mysqli_query($conn,$sql);

    if($result){   
      header("location: taskmanager.php");
      exit();
      }

    else{
      echo"<script>alert('wrong code')";
    }
}

?>