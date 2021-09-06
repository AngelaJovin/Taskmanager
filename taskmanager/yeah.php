  
<?php
include('connect.php');

$sql="SELECT  `Title`, `AssignedTo`, `AssignedBy`, `Description` FROM `tasks` ";

$result=$conn->query($sql);

if($result->num_rows>0){

    
	echo"<h2>Admin Index</h2>";
	echo"<h3>Details of students that registered for Seminar.</h3>";
		echo "<table style='padding:1px 20px'>";

		
		echo "<tr>";
		echo"<th >Title</th>";
		echo"<th >Assigned To</th>";
		echo"<th >Assigned By</th>";
		echo"<th >Description</th>";
		echo "</tr>";

		while($row=$result->fetch_assoc()){
			extract($row);

			echo "<tr>";
			echo"<td style='border:  solid black'>{$row['Title']}</td>";
			echo"<td style='border:  solid black'>{$row['AssignedTo']}</td>";
			echo"<td style='border:  solid black'>{$row['AssignedBy']}</td>";
			echo"<td style='border:  solid black'>{$row['escription']}</td>";

        echo "</tr>";
        }

		//echo "ID:".$row["id"]."NAME:".$row["name"]."REG NO:"
		//.$row["Registrationnumber"]."SEMINARTIME:".$row["seminartime"]."<br>";
		//echo"</style";
	//echo"</table>";
	echo"</center>";
	echo"<div>";
	echo"<a href='home page.html'><button style='width:70px'>EXIT</button></a>";
	echo"</div>";
	echo"<br>";


}
else {
	echo"<div class='alert alert-danger'><strong>No task</strong></div>";
}
?>