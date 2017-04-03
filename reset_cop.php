<?php
//file reset.php
//title:Build your own Forgot Password PHP Script
session_start();
$token=$_GET['token'];
include("settings.php");
connect();
if(!isset($_POST['password'])){
$q="select email from tokens_cop where token='".$token."' and used=0";
$r=mysql_query($q);
while($row=mysql_fetch_array($r))
   {
$email=$row['email'];
   }
If ($email!=''){
          $_SESSION['email']=$email;
}
else die("Invalid link or Password already changed");}
$pass=$_POST['password'];
$email=$_SESSION['email'];
if(!isset($pass)){
echo '<form method="post">
enter your new password:<input type="password" name="password" />
<input type="submit" value="Change Password">
</form>
';}
if(isset($_POST['password'])&&isset($_SESSION['email']))
{
$q="update cops set Create_Password='".($pass)."' and Confirm_Password='".($pass)."' where E_mail='".$email."'";
$r=mysql_query($q);
if($r)mysql_query("select tokens_cop set used=1 where token='".$token."'");echo "Your password is changed successfully";
if(!$r)echo "An error occurred";
	}