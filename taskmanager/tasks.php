<!doctype html> 
<html>
	 <head> <meta charset="utf-8">
	  <title>Show MySQL DB Data</title>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
		</head> 
		<body>
			 <div class="container">
			 <table class="table table-bordered"> 
				 <thead> 
					 <tr> 
						 <th>ID</th>
						  <th>Name</th>
						   <th>Email</th> 
						   <th>Phone Number</th>
						    </tr> 
							</thead>
							 <tbody>
								  <tr>
									   <?php include("DBConfig.php");
									    $result = mysql_query("SELECT * FROM test_demo"); 
										while($test = mysql_fetch_array($result)) { $id = $test['id'];
											 echo"<td>".$test['id']."</td>";
											  echo"<td>".$test['name']."</td>";
											   echo"<td>".	$test['email']."</td>"; 
											   echo"<td>".$test['phone_number']."</td>"; 
											   echo "</tr>";
											    } 
												mysql_close($conn);
												 ?>
												 </table> 
												</div> 
											</body> 
											</html>