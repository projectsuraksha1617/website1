<?php
$tid=$_POST["tid"];
$type=$_POST["case"];
$name=$_POST["name"];
$reg=$_POST["regno"];
$model=$_POST["model"];
$color=$_POST["color"];
$severity=$_POST["sev"];
$mysql=mysqli_connect("simunet.in","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("can't connect to DB");
$query="DELETE from vehicletheft2 where tid='$tid' AND Case_Type='$type' AND Name='$name' AND Regno='$reg' AND Model='$model' AND Color='$color'AND Severity='$severity'";
$res=mysqli_query($mysql,$query);
if($res==true){

	echo "<script type=\"text/javascript\">
	alert(\" Case Completed. Please Check!!\");
	window.location=\"active_cases.php\";
	</script>";

}  
else{

	echo "<script type=\"text/javascript\">
	alert(\" Case could not be handled.
		Err!! Row could not be deleted... Please Check!!\");
	window.location=\"active_cases.php\";
	</script>";
}
?>