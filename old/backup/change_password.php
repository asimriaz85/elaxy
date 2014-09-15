<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
 


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");

if(isset($_REQUEST['change_my_password'])){
		
		
		
		
		$up_current_password=$_REQUEST['current_password'];
		$cpassword=md5($up_current_password);
		$up_new_password=$_REQUEST['new_password'];
		$up_confirm_password=$_REQUEST['confirm_password'];
		
		$enc_password=md5($up_new_password);
		
		
		if(!empty($up_current_password)&&!empty($up_new_password)&&!empty($up_confirm_password)){
			
		$select_password="SELECT id,password FROM registration WHERE email='".$session_email."'";
		$run_password=mysql_query($select_password);
		$fetch_password=mysql_fetch_array($run_password);
		
		$password_current=$fetch_password['password'];
		
		if($password_current!=$cpassword){
			
			$error="The current password you entered is incorrect";
		}
		
		if($up_new_password!=$up_confirm_password){
			
			
			$error="Your new password not matched with confirm password";
			
		}
		
		
		if($password_current==$cpassword && $up_new_password==$up_confirm_password){
			
				$update="UPDATE registration SET password='$enc_password' WHERE email='$session_email'";
				$run_update=mysql_query($update);
				
				if($run_update){
					
					$success_error="Thanks - your password has now been updated";
				}
			
		}
			
			
			
		}
		
		
	}
	

?>
<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:99%">






<div id="tabs_area">
	<div id="header">
	<?php include("inc/manage-menu.php"); ?>
	</div>
	<div id="main">
		<div id="contents">
            <form method="post" action="">
				<table width="955" class="pure-table pure-table-bordered">
  <tr>
    <td height="36">&nbsp;</td>
    <td><?php if(isset($success_error)){ echo $success_error; } if(isset($error)){ echo $error; } ?></td>
  </tr>
  <tr>
    <td width="12%" height="36">Current Password:</td>
    <td width="88%"><input type="password" name="current_password" id="ValidPassword1" value="" /></td>
  </tr>
  <tr>
    <td height="38">New Password</td>
    <td><input type="password" name="new_password" id="ValidPassword"  /></td>
  </tr>
  <tr>
    <td height="36">Confirm Password</td>
    <td><input type="password" name="confirm_password" id="ValidConfirmPassword"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="change_my_password" value="change my password"></td>
  </tr>
</table>
</form>
	  </div>
      
      
      
			
			
		</div>
		</div></div>





</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>