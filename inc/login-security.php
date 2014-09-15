<?php



 if(!isset($_SESSION['login_email_id']) && !isset($_SESSION['login_password'])){
	 $error="Please Login Here";
	 
	 session_start();
			 $_SESSION['error']=$error;
//header("Location:login.php");
?>
<script type="text/javascript">
<!--
window.location = "login.php"
//-->
</script>
<?php
}
?>