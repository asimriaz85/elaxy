<?php
		ob_start();
		include("connection.php");
		
		session_start();
		
		/*echo '<pre>';
		print_r($_SESSION);
		echo '<pre>';*/
	
	$session_email=$_SESSION['login_email_id'];
	$session_first_name=$_SESSION['first_name'];
	$session_last_name=$_SESSION['last_name'];
	$session_phone=$_SESSION['phone'];
	
	if(isset($session_email)){
		
		 $select_user="SELECT * FROM registration WHERE email='".$session_email."'";
		$run_email=mysql_query($select_user);
		$fetch_status=mysql_fetch_array($run_email);
		  $ustatus=$fetch_status['status'];
		$uemail=$fetch_status['email'];
		
		if($ustatus==0){
			unset($_SESSION);
			session_start();
			$error="You are blocked by admin please contact with admin";
			$_session['error']=$error;
			?>
            <script type="text/javascript">
<!--
window.location = "login.php?error=<?php echo $error; ?>"
//-->
</script>
            <?php
			//header("location:login.php");
		}
		
		if($uemail!=$session_email){
			
			session_start();
			$error="Invalid User Name or Password";
			$_session['error']=$error;
			
			header("location:login.php");
		}
	}
	
	
	$select_user_id="SELECT id FROM  registration WHERE email='".$session_email."'";
	$run_user_id=mysql_query($select_user_id);
	$fetch_user_id=mysql_fetch_array($run_user_id);
	$user_id=$fetch_user_id['id'];
	
	////Get Page Name////
	function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

$page_name=curPageName();
	////END page Name////
		

?>

<header>

<div class="top-wrapper">

<?php 
 $select_announcements="SELECT id,announcements FROM announcements";
 $run_announcements=mysql_query($select_announcements);
 
 
 if(mysql_num_rows($run_announcements)>0){
 ?>
<!--<div id="sticky">-->
<div class="jquery-bar">
 <span class="notification">
 <div class="top-header">
<?php 
while($fetch_announcements=mysql_fetch_array($run_announcements)){
	
	
?>
<div class="sologen"><?php echo $fetch_announcements['announcements']; ?></div>

    
    <?php } ?>
    <div class="welcome">Welcome, <span><?php echo $session_first_name."!"; ?></span></div>

    <p class="jquery-arrow down"><img src="jqueryNotificationBar/img/up-arrow.png" alt="Click to Hide Notification" style="cursor:pointer;"></p>
    </div>
    </span>
    
  </div>
  <span class="downbar jquery-arrow"><img src="jqueryNotificationBar/img/down-arrow.png" alt="Click to Show Notification" style="cursor:pointer;"></span>

  <?php } ?>

</div>

<div class="clear"></div>

<div class="header-bg">
<div class="header-wrapper">
<div class="logo"><a href="index.php"><img src="images/logo.png" width="243" height="55"  alt="logo" /></a></div>
<div class="header-btn">

<ul>

<li><a href="post-ad1.php"><img src="images/post-ad.png" width="170" height="43"  alt="post ad" /></a></li>
<?php if(!isset($_SESSION['login_email_id'])){ ?>
<li><a href="create-account.php"><img src="images/register-btn.png" width="120" height="43"  alt="register" /></a></li><?php } ?>
<?php if(!isset($_SESSION['login_email_id'])){
   ?>

<li><a href="login.php" class="box"><img src="images/login-btn.png" width="100" height="43"  alt="Login" /></a></li>


</ul>


</div>
<?php /*?><div class="loginbox">
<div class="head-login">Please Login</div>

<form class="loginform" method="post" action="config/login.php">
Username<br><input type="text" value="" placeholder="User Name" name="login_email"/><br>
Password<br><input type="password" placeholder="Password" name="login_password"/><br>
<input type="submit" value="submit" name="Login">
<p><a href="forgot-password.php">Forgot your Password ?</a></p>
</form>
</div><?php */?>
<?php } 
if(isset($_SESSION['login_email_id'])){ ?>
<li>| &nbsp;<a href="manage_ads.php">My Elaxy</a>&nbsp;&nbsp;|</li>
<?php } 

	if(isset($_SESSION['login_email_id'])){
  $logout= "logout";
  ?>
  <li><a href="config/logout.php" class="box"><img src="images/logout.png" width="100" height="43"  alt="Logout" /></a></li>

  <?php
  
		 }
 ?>

</div>
</div>

<div class="clear"></div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50458241-1', 'auto');
  ga('send', 'pageview');

</script>

</header>