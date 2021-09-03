<?php

require_once('connect.php');

if(isset($_POST['submit']))
{
 $title = mysqli_real_escape_string($conn,$_POST['title']);
 $assignedto = mysqli_real_escape_string($conn,$_POST['assignedto']);
 $assignedby = mysqli_real_escape_string($conn,$_POST['assignedby']);
 $description = mysqli_real_escape_string($conn,$_POST['description']);


 $sql = "insert into tasks (Title,AssignedTo,AssignedBy,Description)
     values ('$title', '$assignedto', '$assignedby', '$description')";

 $result = mysqli_query($conn,$sql);

    if($result){   
      header("location: taskmanager.html");
      exit();
      }

    else{
      echo"<script>alert('wrong code')";
    }
}

?>