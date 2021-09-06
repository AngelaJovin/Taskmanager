<?php

include('connect.php');

  if(isset($_POST['submit'])) 
	   {
		$email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
         
		$sql= "select * from users where Email='$email' AND Password='$password'";
		     
		$result = mysqli_query($conn,$sql);

        if($result){
	    $row=mysqli_num_rows($result);

	    if($row == true) {
		   header("location: taskmanager.php");
		   exit();	  
	       }

	    else {
           echo "<h1>OOPS ERROR!</h1>";}
           }

	    else{
		   echo "<script>alert('Please enter correct data!')</script>". mysqli_error($con);
		   exit();
		   }
	    }

	    else{
	       echo"mysqli_error()";
	       }

 ?>