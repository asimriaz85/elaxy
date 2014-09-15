<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
 


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");

////My Details///
if(isset($_REQUEST['update_my_details'])){
		
		
		
		$up_first_name=$_REQUEST['update_first_name'];
		$up_last_name=$_REQUEST['update_last_name'];
		$up_contact_number=$_REQUEST['update_contact_number'];
		$up_newsletter=$_REQUEST['update_newsletter'];
		
		if(!empty($up_first_name)&&!empty($up_last_name)&&!empty($up_contact_number)){
			
			 $update="UPDATE  registration SET first_name='$up_first_name',last_name='$up_last_name',phone='$up_contact_number',newsletter='$up_newsletter' WHERE email='$session_email'";
			$run=mysql_query($update);
			if($run){
				
				
				$error="Thanks - your details have now been updated";
				
			}
		}
		
		
	}
	
	$select_details="SELECT id,first_name,last_name,phone FROM registration WHERE email='".$session_email."'";
	$run_detail=mysql_query($select_details);
	$fetch_detail=mysql_fetch_array($run_detail);
	$first_name=$fetch_detail['first_name'];
	$last_name=$fetch_detail['last_name'];
	$contact_no=$fetch_detail['phone'];
	
	

///End///



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
    <td width="12%" height="36">First Name</td>
    <td width="88%"><input type="text" name="update_first_name" id="ValidField" value="<?php echo $first_name; ?>" /></td>
  </tr>
  <tr>
    <td height="38">Last Name</td>
    <td><input type="text" name="update_last_name" id="ValidField2" value="<?php echo $last_name; ?>" /></td>
  </tr>
  <tr>
    <td height="36">Contract No</td>
    <td><input type="text" name="update_contact_number" id="ValidNumber" value="<?php echo $contact_no; ?>" /></td>
  </tr>
  <tr>
    <td height="28" colspan="2"><input type="checkbox" name="update_newsletter" value="1" checked>&nbsp;I would like to receive news, offers and promotions from Elaxy</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update_my_details" value="Update my details"></td>
  </tr>
</table>
</form>
                			
			
		</div>
	</div>
    </div>
		





</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>