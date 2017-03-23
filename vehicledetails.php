<?php
ob_start();
session_start();
if($_SESSION['adhaar']==FALSE)
{
header("Location:user.html");
}
ob_end_clean();

$d=date("Y-m-d");
$case=$_POST["case"];
$name=$_POST["name"];
$type=$_POST["type"];
$reg=$_POST["reg"];
$chasis=$_POST["chasis"];
$eng=$_POST["eng"];
$model=$_POST["model"];
$color=$_POST["color"];
$rand = rand(0,1000000000);
if($_POST["severity"]!="")
{
$severity=$_POST["severity"];
}
else
{
$severity="Low";
}

$mysql=mysqli_connect("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha") or die("Can't connect to DB");
$query="insert into vehicletheft(date,tid,Case_Type,Name,Vehicle_Type,Regno,Chasis_Numb,Eng_Numb,Model,Color,Severity) values('".$d."','".$rand."','".$case."','".$name."','".$type."','".$reg."','".$chasis."','".$eng."','".$model."','".$color."','".$severity."')";
$res=mysqli_query($mysql,$query);
$query1="insert into vehicletheft_history(date,tid,Case_Type,Name,Vehicle_Type,Regno,Chasis_Numb,Eng_Numb,Model,Color,Severity) values('".$d."','".$rand."','".$case."','".$name."','".$type."','".$reg."','".$chasis."','".$eng."','".$model."','".$color."','".$severity."')";
$res1=mysqli_query($mysql,$query1);

if(($res && $res1)==true)
{
echo "<script type=\"text/javascript\">
alert(\" Registered complaint successfully. Please note your tracking ID $rand. A copy is sent to your email\");
window.location=\"user_lodgecomplaint.php\";
</script>";
$res2=mysqli_query($mysql,"select E_mail from user where Adhaar_No='".$_SESSION['adhaar']."'");
				while($row = mysqli_fetch_array($res2))
    				{
    				$email =$row['E_mail'];
    				}
 				
$to= $email;
$subject="Tracking ID";
$message="
<html>
<head>
<title>Tracking ID</title>
</head>
<body>
<div style='
    background: #f5f5f5;
    max-width: 600px;
    margin: 20px auto; 
    border: 1px solid #282887;
'>
	<div style='
    padding: 10px;
    background: #66CDAA;
    text-align: center;
    border-bottom: 1px solid #282887;
	font-size: 30px;
'>
<p><strong> SURAKSHA</strong></p>
</div>
	<div style='
    padding: 20px;
    text-align: center;
    color: #008B8B;
'>
<h3> Dear Sir/Madam</h3>
<h3 style='
    text-align: center;
    margin-bottom: 20px;
'>Thank you for using suraksha to lodge your complaint</h3> 
				<h3 style='
    margin-bottom: 10px;
'>Your tracking ID is <strong>$rand</strong></h3>
 </div>
	</div>
</body>
</html>
";
$headers="MIME-Version:1.0" . "\r\n";
$headers .="Content-type:text/html;charset=UTF-8". "\r\n";

$headers .= 'From: <simuneti@simunet.in>' . "\r\n";

$mail=mail($to,$subject,$message,$headers);
}

else
{
echo "<script type=\"text/javascript\">
alert(\" Couldnt register complaint successfully\");
window.location=\"user_lodgecomplaint.php\";
</script>";
}
mysqli_close($mysql);
?>
