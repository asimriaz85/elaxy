<!DOCTYPE html>
<html><head>
<?php 
ob_start();
require_once('inc/meta.php'); ?>
<link href="css/login.css" rel="stylesheet" type="text/css" />

</head>

<body>


<?php require_once('inc/header.php'); 

ob_start();
$email=$_REQUEST['id'];
$email_id.=$_REQUEST['id'];

if(isset($_REQUEST['submit'])){
	$new_password=$_REQUEST['new_password'];
	
	$enc_password=md5($new_password);
	
	
	if(!empty($enc_password)){
		
		 $update="UPDATE registration SET password='$enc_password' WHERE email='$email_id'";
		$run_update=mysql_query($update);
		
		if($run_update);
		$reset_msg="Your password has been rest";
		$_SESSION['reset_msg']=$reset_msg;
		?>
        <script>
		window.location = "manage_ads.php"
		</script>
        <?php
	} else{
	$error="Password Not Changed due to Invalid link";	
	}
	
}

?>
<?php include("inc/validation.php"); ?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>



<div id="contant_area_home" style="width:1023px;">

<div id="login_div" style="margin-left:300px;">
	<div id="wrappertop"></div>
    
    <div id="wrapper">
<h1>Reset password</h1>

<div class="clear_both"></div>

	<p>To reset your password please enter your new password and password confirmation below.</p>
    
    <div class="clear_both2"></div>
    <div id="error"><?php if(isset($error)){ echo $error;} ?></div>
    <form method="post" action="">
    <div id="reset_password_div">
    <div id="reset_password_email">New Password:</div>
    <div id="reset_password_email2"><input type="password"   id="ValidPassword" name="new_password" /></div>
    <div style="clear:both;"></div>
    
</div>
 <div class="clear_both2"></div>
 <div id="dash_div"></div>
 <div class="clear_both2"></div>
 
 <div id="reset_password_div">
    <div id="reset_password_email">Confirm Password:</div>
    <div id="reset_password_email2"><input type="password"   id="ValidConfirmPassword" name="confirm_password" /></div>
    <div style="clear:both;"></div>
    
</div>
 
  <div class="clear_both2"></div>
  
  <div class="clear_both2"></div>
 <div id="dash_div"></div>
 <div class="clear_both2"></div>
 
 
  <div id="reset_password_button"><input type="submit" name="submit" value="Reset my password"/></div>
    </form>
    

    </div>
		
</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
