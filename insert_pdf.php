<?php
if(!empty($_POST['submit']))
{
$tid=$_POST['tid'];
$name=$_POST['copname'];
$status=$_POST['status'];
$mobile=$_POST['mobile'];
$details=$_POST['details'];
$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("Can't connect to DB");
$query="insert into pdf(tid,Name,Status,Mobile,Details) values('".$tid."','".$name."','".$status."','".$mobile."','".$details."')";
$res=mysqli_query($mysql,$query);
if($res==true){
	$tid=$_POST["tid"];

$query="DELETE from lostsim3 where tid='$tid'";
$res=mysqli_query($mysql,$query);
if($res==true){
echo "<script type='text/javascript'>
alert(\"PDF generated successfully\");window.location=\"completed.php\";
</script>";

}
}
}

?>