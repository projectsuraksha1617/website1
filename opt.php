<?php
session_start();
define('DEMO_HOME','http://simunet.in');
define('PROJECT_CATEGORY','php');
define('PROJECT_SLUG','otp-system-using-php');
//$project_url = DEMO_HOME.'/'.PROJECT_CATEGORY.'/'.PROJECT_SLUG;
if(isset($_POST['otp_submit'])){
//Generate OTP USING bin2hex() function
$msg="";
$err="";
if(empty($_POST['otp_email'])) $err = "Enter Your Email Id"; else $email = $_POST['otp_email'];
if($email and filter_var($email, FILTER_VALIDATE_EMAIL) === false) $err = "Enter Your Email Id"; else $re_email = $_POST['otp_email'];
if(!$err){
$otp_code = strtoupper(bin2hex(openssl_random_pseudo_bytes(3)));
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//$headers .= 'From: <simuneti@simunet.in>' . "\r\n";
//
$emailSubject = "OTP - SURAKSHA OPT CODE";
$emailContent = "<div style='
    background: #f5f5f5;
    max-width: 600px;
    margin: 20px auto; 
    border: 1px solid #282887;
'>
	<div style='
    padding: 10px;
    background: #fdd55d;
    text-align: center;
    border-bottom: 1px solid #282887;
'>
<img src='http://www.insbyrah.com/wp-content/uploads/2016/08/cropped-INSBYRAH_LOGO_NEW.png' width='200'></div>
	<div style='
    padding: 20px;
    text-align: center;
    color: #282887;
'><h2 style='
    text-align: center;
    margin-bottom: 20px;
'>Thanks to request an OTP</h2> 
				<p style='
    margin-bottom: 10px;
'>Your OTP Code for this transaction is <strong>$otp_code</strong></p>
 </div>
	</div>";
mail($customer_email ,$emailSubject ,$emailContent); // Using mail() Function to send otp pin via email
try {
    $dbLink = new PDO("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha");
    $statement = $dbLink->prepare("INSERT INTO opt (n_otp_code,n_otp_email) VALUES(:otp_code, :otp_email) ON DUPLICATE KEY UPDATE    
		n_otp_code=:otp_code, n_otp_email=:otp_email");
	$statement->execute(array(
    "otp_code" => "$otp_code",
    "otp_email" => "$re_email"
	));
	$statement2 = $dbLink->prepare("INSERT INTO opt1 (n_otp_code,n_otp_email) VALUES(:otp_code, :otp_email) ON DUPLICATE KEY UPDATE    
		n_otp_code=:otp_code, n_otp_email=:otp_email");
	$statement2->execute(array(
    "otp_code" => "$otp_code",
    "otp_email" => "$re_email"
	));
    $dbLink = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
$msg ="An OTP Code sent to your email id";
$_SESSION['email'] = $re_email;
}
}

if(isset($_POST['otp_verify'])){
//Generate OTP USING bin2hex() function
$msg="";
$err="";
if(empty($_POST['otp_code'])) $err = "Enter OTP Code"; else $otp_code = $_POST['otp_code'];
if($otp_code and strlen($otp_code) !== 6) $err = "Invalid OTP Code Entered By You!"; else $re_otp_code = $_POST['otp_code'];
if(empty($_POST['otp_email'])) $err = "Invalid Session"; else $email = $_POST['otp_email'];
if($email and filter_var($email, FILTER_VALIDATE_EMAIL) === false) $err = "Invalid Session mail"; else $re_email = $_POST['otp_email'];
if(!$err){

try {
     $dbLink = new PDO("localhost","simuneti_meghana","Projectsuraksha@2017","simuneti_suraksha");
    $statement = $dbLink->prepare("SELECT n_otp_email from opt where n_otp_email = :otp_email and n_otp_code = :otp_code");
	$statement->execute(array(
    "otp_email" => "$re_email",
    "otp_code" => "$re_otp_code"
	));
	$fetch = $statement->fetch();
	if($fetch[0]){
	$msg ="Thanks To Verify Your OTP Code!";
	$preparedStatement = $dbLink->prepare("DELETE from opt where n_otp_email=:otp_email");
	$preparedStatement->execute(array(':otp_email' => $re_email));
	session_destroy();
	}else{
	$err = "Invalid OTP Code";
	}
    $dbLink = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>OTP System</title>
<!--<meta name="description" content="Here is a demo of an otp system, which is much secured then others, here are cryptographically secure random numbers. Create your awesome secured otp system using php"/>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->
<link rel="stylesheet" href="<?php echo $project_url;?>/assets/css/app.css" type="text/css"/>
<script src="<?php echo $project_url;?>/assets/js/app.js" type="text/javscript"/></script>
</head>
<body>
	<div class="main_wrapper">
		<div class="inner_wrapper">
			<div class="otp_form">
				<h1 class="otp_login_form_heading">OTP System In PHP</h1>
				<?php if($_GET['otp_varification'] !=="yes"){?>
				<form class="otp_login_form" action="user.php" method="post">
					<?php if($err):?>
					<p class="otp_app_err"><?php echo $err;?></p>
					<?php endif;?>
					<?php if($msg):?>
					<p class="otp_app_msg"><?php echo $msg;?></p>
					<script type="text/javascript">
						setTimeout(function(){
						window.location.href="<?php echo $project_url;?>/?otp_varification=yes&email=<?php echo $_POST['otp_email'];?>";
						},3000);
					</script>
					<?php endif;?>
					<input type="email" name="otp_email" class="otp_login_form_input" value="" placeholder="Enter Your Email" required/>
					<input type="submit" name="otp_submit" class="otp_login_form_button" value="Send OTP">
					<p class="otp_app_hint">Please Enter Your Email id, So we can send an <b>OTP PIN</b> code to your email id.</p>
				</form>
				
				
				<?php }else{?>
					<form class="otp_login_form" action="" method="post">
					<?php if($err):?>
					<p class="otp_app_err"><?php echo $err;?></p>
					<?php endif;?>
					<?php if($msg):?>
					<p class="otp_app_msg_success"><?php echo $msg;?></p>
					<?php else:?>
					<?php if(($_GET['email'] == $_SESSION['email']) and filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) !== false){?>
					<p>Your email id is</p>
					<input type="email" name="otp_email" class="otp_login_form_input" value="<?php echo $_GET['email'];?>" readonly style="border:1px solid #f9f9f9; background:#f9f9f9;" required/>
					<?php }else{?>
					<p style="color:red; margin-bottom:20px;">Invalid Activity Found In This Session</p>
					<?php } ?>
					<input type="text" name="otp_code" class="otp_login_form_input" value="" placeholder="Enter OTP Code" required/>
					<input type="submit" name="otp_verify" class="otp_login_form_button" value="Confirm OTP">
					<p class="otp_app_hint">Please Enter OTP Code, Check Your MailBox To Get This</p>
					<?php endif ;?>
				</form>
				<a href="<?php echo $project_url;?>" class="otp_login_form_button_green">Re-Send OTP</a>
				<?php } ?>
			</div>
		</div>			
</body>
</html>