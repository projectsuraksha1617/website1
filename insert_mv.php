<?php
$tid=$_POST["tid"];
$type=$_POST["case"];
$name=$_POST["name"];
$reg=$_POST["regno"];
$model=$_POST["model"];
$color=$_POST["color"];
$severity=$_POST["sev"];
$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("can't connect to DB");
$query="insert into vehicletheft1(tid,Case_type,Name,Regno,Model,Color,Severity) values('".$tid."','".$type."','".$name."','".$reg."','".$model."','".$color."','".$severity."')";
$res=mysqli_query($mysql,$query);
if($res==true){
	include "delete_mv.php";
	
	
}  
else{
echo "<script type=\"text/javascript\">
	alert(\" Case could not be handled
		Err!! Row couldnt be inserted. Please Check!!\");
	window.location=\"casenoti.php\";
	</script>";

}

?>