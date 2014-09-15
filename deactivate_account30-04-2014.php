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



			  <table width="955" class="pure-table pure-table-bordered">

  <tr>

    <td width="12%" height="36">&nbsp;</td>

    <td width="88%"><?php if(isset($success_error)){ echo $success_error; } if(isset($error)){ echo $error; } ?></td>

  </tr>

  <tr>

    <td height="36" colspan="2">Please don't leave us!</td>

    </tr>

  <tr>

    <td height="36" colspan="2">Every time an account is deactivated, one of the team cries and it takes hours to get them talking again :(</td>

    </tr>

</table>

<table width="955" class="pure-table pure-table-bordered">

<form method="post" action="">

<?php 

			$select_deactivate_radio="SELECT id,radio_text FROM deactivate_radio ORDER BY id";

			$run_deactivate_radio=mysql_query($select_deactivate_radio);

			while($fetch_deactivate_radio=mysql_fetch_array($run_deactivate_radio)){

				$radio_id=$fetch_deactivate_radio['id'];

			$radio_text=$fetch_deactivate_radio['radio_text'];

			?>



  <tr>

    <td width="48"><input type="radio" name="" value="<?php echo $radio_id; ?>" /> test</td>

    <td width="895"><?php echo $radio_text; ?></td>

  </tr>

  <?php } ?>

  <tr><td width="48">&nbsp;</td>

  <td width="895"><input type="submit" name="deactive" value="Deactive my Account"></td></tr>

  </form>

</table>



	  </div>

      

      

      

			

			

		</div>

		</div></div>









</div>





</section>

<div class="clear"></div>



<?php require_once('inc/footer.php'); ?>





</body>

</html>