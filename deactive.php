<?php session_start(); ?>
<?php include("connection.php"); ?>

<?php
if(isset($_POST['deactive'])){
	
	$update="UPDATE registration SET status=0 WHERE email='".$_SESSION['login_email_id']."'";

				$dact_update=mysql_query($update);
$success_error=mysql_query("DELETE FROM postcode_location where user_id='".$_SESSION['userid']."')");
?>
				<script type="text/javascript"> 
<!--
window.location = "config/logout.php"
//-->
</script>	
				

				
<?php	
	}


?>