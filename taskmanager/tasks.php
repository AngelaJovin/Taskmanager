  
<?php
include('db.php');

$sql="SELECT id, name, Registrationnumber, course, day, seminartime FROM seminar";

$result=$con->query($sql);

if($result->num_rows>0){

    
	echo"<h2>Admin Index</h2>";
	echo"<h3>Details of students that registered for Seminar.</h3>";
		echo "<table style='padding:1px 20px'>";

		
		echo "<tr>";
		echo"<th >ID</th>";
		echo"<th >NAME</th>";
		echo"<th >REG NO</th>";
		echo"<th >COURSE</th>";
		echo"<th >DAY</th>";
		echo"<th >TIME</th>";

		echo "</tr>";

		while($row=$result->fetch_assoc()){
			extract($row);

			echo "<tr>";
			echo"<td style='border:  solid black'>{$row['id']}</td>";
			echo"<td style='border:  solid black'>{$row['name']}</td>";
			echo"<td style='border:  solid black'>{$row['Registrationnumber']}</td>";
			echo"<td style='border:  solid black'>{$row['course']}</td>";
            echo"<td style='border:  solid black'>{$row['day']}</td>";
            echo"<td style='border:  solid black'>{$row['seminartime']}</td>";

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
	echo"<div class='alert alert-danger'><strong>No results</strong></div>";
}
?>