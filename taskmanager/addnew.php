<?php

require_once('connect.php');

if(isset($_POST['submit']))
{
  $emailOwner=$_SESSION["email"];
 $title = mysqli_real_escape_string($conn,$_POST['title']);
 $assignedto = mysqli_real_escape_string($conn,$_POST['assignedto']);
 $assignedby = mysqli_real_escape_string($conn,$_POST['assignedby']);


//  $sql = "insert into tasks (Title,AssignedTo,AssignedBy,Owner)
//      values ('$title', '$assignedto', '$assignedby','$emailOwner')";

     $sql = "INSERT INTO `tasks`(`Title`, `AssignedTo`, `AssignedBy`, `Owner`) VALUES (\"$title\",\"$assignedto\",\"$assignedby\",\"$emailOwner\")";

 $result = mysqli_query($conn,$sql);

 if (mysqli_query($conn, $sql)) {
  // echo "New record created successfully";
} else {
  // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



    if($result){   
      header("location: taskmanager.php");
      exit();
      }

    else{
      echo"<script>alert('wrong code')";
    }
}


?>