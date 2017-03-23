<?php
echo "<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>";
echo "<script type=\"text/javascript\" src=\"clonetable.js\"></script>";
	function get_products()
	{
		$conn=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha");
		$data=mysqli_query($conn,"select * from accident");
		$a=array();
		while($object= mysqli_fetch_object($data))
		{
		   $a[]=$object;
		}
		mysqli_close($conn);
		return $a;
	}
		echo "<form action=\"insert_accident.php\" method=\"post\">"; 
		echo "<table style=\"width:70%;margin-left:80px;\" class=\"table table-striped table-bordered table-hover\">";
		$a=get_products();
		$i=1;
		echo "<thead>";
		echo "<tr style=\"text-align:center;\">";
		echo "<th>ID</th><th>TID</th><th>Case Type</th><th>Name</th><th>Contact</th><th>Accident Location</th><th>Severity</th>";
		echo "</tr>";
		echo "</thead>";
		foreach($a as $aa)
		{
			echo "<tbody>";
			echo "<tr id=\"1\">";
			echo "<td>";
			echo $i++;
			echo "</td>";
			echo "<td><input type=\"text\" value=\"$aa->tid\" size=\"10\" name=\"tid\" readonly/></td><td><input type=\"text\" value=\"$aa->Case_Type\" size=\"10\" name=\"case\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$aa->Name\" name=\"name\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$aa->Mobile\" name=\"mobile\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$aa->Acc_Location\" name=\"loc\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$aa->Severity\" name=\"sev\" readonly/></td><td><input type=\"submit\" value=\"Handle\"/></td>";
			echo "</tr>";			
			echo "</tbody>";
		}
		echo "</table>";	
		echo "</form>";
?>

