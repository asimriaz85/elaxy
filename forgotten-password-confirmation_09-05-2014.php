<!DOCTYPE html>
<html><head>
<?php 
ob_start();
require_once('inc/meta.php'); ?>
<link href="css/login.css" rel="stylesheet" type="text/css" />

</head>

<body>


<?php require_once('inc/header.php'); 


?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>



<div id="contant_area_home" style="width:1023px;">

<div id="login_div">
	<div id="wrappertop"></div>
    
    <?php 
if(isset($_REQUEST['submit'])){
	 $login_email=$_REQUEST['login_email']; 
	 
	  $select_status="SELECT * FROM registration WHERE email='".$login_email."'";
	 $run_status=mysql_query($select_status);
	 $fetch_u_status=mysql_fetch_array($run_status);
	 $status_u=$fetch_u_status['status'];
	 $email=$fetch_u_status['email'];
	 if($status_u!=1){
		 $error="Your account is blocked or deleted by admin";
		 ?>
         <script type="text/javascript">
<!--
window.location = "forgot-password.php?error_block=<?php echo $error; ?>"
//-->
</script>
         <?php
		 
		// header("location:forgot-password.php?error_block=$error");
	 }
	 
	 if($status_u==1 && $email==$login_email){
	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if (preg_match($regex, $_REQUEST['login_email']) && !empty($_REQUEST['login_email'])) {

		$select_first_name="SELECT first_name FROM registration WHERE email='".$_REQUEST['login_email']."'";
		$run_query=mysql_query($select_first_name);
		$fetch=mysql_fetch_array($run_query);
		
		$first_name=$fetch['first_name'];

$u=uniqid();
					
						
			
			
						
			$to =  $_POST['login_email'];
	$subject = 'Elaxy forgotten password';
	//$headers = "From: ".$admininfo['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	

	$message.= '<html><body>';
	
	$message.='<table width="100%" border="0">';
  
 
  
  $message.='<tr><td width="40%"><img src="http://gravityweb.net/elaxy/images/logo.png"></td><td width="60%"> 		
<h3>Forgotten password</h3></td></tr>';
  
  
  
  $message.='<tr><td height="48">When running a business and trying to complete numerous tasks at once, it can be easy to forget some things. At Elaxy we want to make your experience with our service as stress-free as possible. Therefore, if you forget your password, the process of regaining access to your account couldn’t be more straightforward.</td></tr>';
  
  $message.='<tr><td height="48">After reading our terms and conditions, filling out our registration form and activating your Elaxy account by clicking the link or copying and pasting the link in your address bar, you need to ensure you have your password and email address at hand to log in.</td></tr>';
  
  
  $message.='<tr><td height="54"><a href="http://gravityweb.net/elaxy/reset-password.php?id='.$to.'&key='.$u.'">Reset your password</a></td>
    </tr>';
  $message.='<tr>
    <td height="82">If the link does not work for some reason you can also confirm your email address by copying and pasting the following link into your web browser address bar:</td>
    </tr>';
	
	
	
  $message.='<tr><td height="73"><a href="http://gravityweb.net/elaxy/reset-password.php?id='.$to.'&key='.$u.'">href="http://gravityweb.net/elaxy/reset-password.php?id='.$to.'&key='.$u.'</a></td></tr>';
  $message.='<tr><td>Thanks</td></tr>';
  $message.='<tr><td height="72">Elaxy Team</td></tr>';
  $message.='<tr>
    <td height="72">It’s important not to write down your password for security reasons – you don’t want someone else to log in on your account and access all of your ads; memorising it is therefore the most sensible course of action. However, if you can’t recall your password, simply enter your email address, click on ‘forgotten password’ and we’ll email you back with the information you need to reset it.</td>
  </tr>';
$message.='</table>';
	$message .= "</body></html>";
	
	$mail_sent=mail($to, $subject, $message, $headers);


?>
    
    
			<div id="wrapper2" class="login_bg">
            <div><h1>Forgotten password</h1></div>
            <div><p>We have sent an email to <strong><?php echo $login_email; ?></strong> containing a link to activate your Elaxy account - please click on the link and your account will be activated. </p></div>
            <div>
            
            <div><h2>Having Problems?</h2></div>
            <div><p>If you do not receive the email in a few minutes then please check your junk email folder. If you still don't find the email then please check that you have spelt your email address correctly and <a href="forgot-password.php">try again</a>.</p></div>
            
            <!--<div>If you are still unable to reset your password, please<a href="contactus"> Help & Contact</a>.</div>-->
            <div>
            
							<div id="error"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; } ?></div>
						
            </div>
					
				</div>   



</div>

<?php
	}

}
 else{
	$error="Invalid Email address";
header("location:forgot-password.php?error=$error");	
}
}
?>
		
</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
