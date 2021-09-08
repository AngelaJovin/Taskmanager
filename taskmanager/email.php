<?php 
include('connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="./css/styles.css">
<link rel="stylesheet" href="./css/bootstrap.min.css"> 

	<title>Password Reset</title>
</head>
<body>
	<form class="card p-4 rounded shadow" method="POST" action="email.php">
    <h3 class="text-center pt-5">Reset Password</h3>
		<!-- form validation messages -->
		<?php //include('messages.php'); ?>
        <div class="addnew-form">
              <input type="email" class="" placeholder="Enter Your Email" name="email" aria-describedby="emailHelp" required>        
            </div>
			<button type="submit" name="reset-password" class="mx-auto button">Submit</button>
			</form>

    <script src="https://kit.fontawesome.com/939695db0f.js" crossorigin="anonymous"></script>
<script src="./js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
</body>
</html>