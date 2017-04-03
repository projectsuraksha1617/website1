<?php
//file name: forgotpassword.php
//Title:Build your own Forgot Password PHP Script

	      
$email=$_GET['email'];
include("settings.php");
connect();
$q="select * from cops where E_mail='".$email."'";
$r=mysql_query($q);
$n=mysql_num_rows($r);
if($n==0){echo "Email id is not registered";die();}
$token=getRandomString(10);
$q="insert into tokens_cop(token,email) values ('".$token."','".$email."')";
mysql_query($q);
function getRandomString($length) 
	   {
    $validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
    $validCharNumber = strlen($validCharacters);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
	return $result;}
 function mailresetlink($to,$token){
$subject = "Forgot Password on simunet.in";
$uri = 'http://'. $_SERVER['HTTP_HOST'] ;
$message = '
<html>
<head>
<title>Forgot Password For simunet.in</title>
</head>
<body>
<p>Click on the given link to reset your password <a href="'.$uri.'/reset.php?token='.$token.'">Reset Password</a></p>

</body>
</html>
';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: Admin<simuneti@simunet.in>' . "\r\n";

if(mail($to,$subject,$message,$headers)){
	echo "We have sent the password reset link to your  email id <b>".$to."</b>"; 
}}

if(isset($_GET['email']))mailresetlink($email,$token);