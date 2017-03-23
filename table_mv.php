<?php
echo "<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>";
echo "<script type=\"text/javascript\" src=\"clonetable.js\"></script>";
	function get_products()
	{
		$conn=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha");
		$data=mysqli_query($conn,"select * from vehicletheft");
		$vehicletheft=array();
		while($object= mysqli_fetch_object($data))
		{
		   $vehicletheft[]=$object;
		}
		mysqli_close($conn);
		return $vehicletheft;
	}
		echo "<form action=\"insert_mv.php\" method=\"post\">"; 
		echo "<table style=\"width:70%;margin-left:80px;\" class=\"table table-striped table-bordered table-hover\">";
		$vehicletheft=get_products();
		$i=1;
		echo "<thead>";
		echo "<tr style=\"text-align:center;\">";
		echo "<th>ID</th><th>TID</th><th>Case Type</th><th>Name</th><th>Registration Number</th><th>Model</th><th>Color</th><th>Severity</th>";
		echo "</tr>";
		echo "</thead>";
		foreach($vehicletheft as $ls)
		{
			echo "<tbody>";
			echo "<tr id=\"1\">";
			echo "<td>";
			echo $i++;
			echo "</td>";
			echo "<td><input type=\"text\" value=\"$ls->tid\" size=\"10\" name=\"tid\" readonly/></td><td><input type=\"text\" value=\"$ls->Case_Type\" size=\"10\" name=\"case\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$ls->Name\" name=\"name\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$ls->Regno\" name=\"regno\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$ls->Model\" name=\"model\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$ls->Color\" name=\"color\" readonly/></td><td><input size=\"10\" type=\"text\" value=\"$ls->Severity\" name=\"sev\" readonly/></td><td><input type=\"submit\" value=\"Handle\"/></td>";
			echo "</tr>";			
			echo "</tbody>";
		}
		echo "</table>";	
		echo "</form>";
?>

