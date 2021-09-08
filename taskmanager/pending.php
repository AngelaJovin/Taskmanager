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

	<title>New Password</title>
	
</head>
<body>
	<form class="card p-4 rounded shadow" method="POST" action="signin.php">
    <p>
	We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account. 
	</p>
    <p>
    Please login into your email account and click on the link we sent to reset your password
    </p>
	</form>

    <script src="https://kit.fontawesome.com/939695db0f.js" crossorigin="anonymous"></script>
<script src="./js/bootstrap.min.js"></script>
<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
<!-- Popper JS -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
</body>
</html>