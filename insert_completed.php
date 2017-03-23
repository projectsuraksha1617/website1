<?php
$tid=$_POST["tid"];
$type=$_POST["case"];
$name=$_POST["name"];
$mob=$_POST["mobile"];
$loc=$_POST["loc"];
$severity=$_POST["sev"];
$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("can't connect to DB");
$query="insert into lostsim3(tid,Case_type,Name,Mobile,Location,Severity) values('".$tid."','".$type."','".$name."','".$mob."','".$loc."','".$severity."')";
$res=mysqli_query($mysql,$query);
if($res==true){
	include "delete_lostsim2.php";
	
	
}  
else{
echo "<script type=\"text/javascript\">
	alert(\" Case could not be handled
		Err!! Row couldnt be inserted. Please Check!!\");
	window.location=\"active_cases.php\";
	</script>";

}

?>












