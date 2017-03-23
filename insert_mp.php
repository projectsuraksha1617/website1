<?php
$tid=$_POST["tid"];
$type=$_POST["case"];
$name=$_POST["name"];
$gen=$_POST["gender"];
$age=$_POST["age"];
$mob=$_POST["mobile"];

$photo=$_POST["photo"];
$severity=$_POST["sev"];
$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("can't connect to DB");
$query="insert into missingperson1(tid,Case_type,Name,Gender,Age,Mobile,Photo,Severity) values('".$tid."','".$type."','".$name."','".$gen."','".$age."','".$mob."','".$photo."','".$severity."')";
$res=mysqli_query($mysql,$query);
if($res==true){
	include "delete_mp.php";
	
	
}  
else{
echo "<script type=\"text/javascript\">
	alert(\" Case could not be handled
		Err!! Row couldnt be inserted. Please Check!!\");
	window.location=\"casenoti.php\";
	</script>";

}

?>