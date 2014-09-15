<?php 
ob_start();
include('include/header.php');
 
 include("include/validation.php");
 
 if(isset($_REQUEST['submit'])){
	 $up_first_name=$_REQUEST['first_name'];
	 $up_last_name=$_REQUEST['last_name'];
	 $up_email=$_REQUEST['email'];
	 $up_user_name=$_REQUEST['username'];
	 $up_password=$_REQUEST['password'];
	 
	 $update="UPDATE users SET first_name='$up_first_name',last_name='$up_last_name',email='$up_email',username='$up_user_name',password='$up_password' WHERE status='admin'";
	 $run_update=mysql_query($update);
	 
	 if($run_update){
		 $msg="Update Successfully";
	 }
	 else{
		$error="Request Not Updated due to error! "; 
	 }
	 
 }
 
 
 $select_admin="SELECT id,username,password,email,first_name,last_name FROM users WHERE status='admin'";
 $run_admin=mysql_query($select_admin);
 $fetch_admin=mysql_fetch_array($run_admin);
 
 $first_name=$fetch_admin['first_name'];
 $last_name=$fetch_admin['last_name'];
 $email=$fetch_admin['email'];
 $user_name=$fetch_admin['user_name'];
 
 
?>



	<!--
    Dialogue box comment
    <div id="welcome" title="Welcome to Admintasia">
		<p><b>Admintasia</b> is a <b>lightweight</b>, fully and easily customisable <b>administration user interface</b>. Please proceed to the actual demo by clicking the button below. Enjoy !</p>
	</div>-->

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>Admin Settings</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms AdvancedForm" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Settings</h1>
                        
                       
                        
									<div class="divmar">
									  <table width="100%" border="0" cellspacing="2" cellpadding="2">
									    <tr>
									      <td width="21%" height="30"><b>No of Categories</b></td>
									      <td width="23%"><b>No of Sub Categories</b></td>
									      <td width="24%"><b>No of Members</b></td>
									      <td width="32%"><b>No of Ads</b></td>
								        </tr>
									    <tr>
                                         <?php
                                          $select_categories="SELECT id,name FROM categories WHERE parent_off='0'";
										  $run_categories=mysql_query($select_categories);
										  $total_categories=mysql_num_rows($run_categories);
										  ?>
									      <td height="42">
										 <?php echo $total_categories; ?></td>
                                         
                                         <?php
                                          $select_subcategories="SELECT id,name FROM categories WHERE parent_off!='0'";
										  $run_subcategories=mysql_query($select_subcategories);
										  $total_subcategories=mysql_num_rows($run_subcategories);
										  ?>
                                         
									      <td><?php echo $total_subcategories; ?></td>
                                          
                                           <?php
                                          $select_users="SELECT id,first_name FROM  registration";
										  $run_users=mysql_query($select_users);
										  $total_users=mysql_num_rows($run_users);
										  ?>
                                          
                                          
									      <td><?php echo $total_users; ?></td>
                                          
                                          <?php 
										  
										  $all_ads = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id";

$result = mysql_query($all_ads);

$total_ads=mysql_num_rows($result);
										  ?>
                                          
									      <td><?php echo $total_ads; ?></td>
								        </tr>
								      </table>
                                      <br /><br />
                                      
                                      <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="21%" height="36"><b>Active Ads</b></td>
    <?php 
	$active_ads = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id WHERE postcode_location.status='1'";

$result_active = mysql_query($active_ads);

$total_active_ads=mysql_num_rows($result_active);
	?>
    
    <td width="23%"><?php echo $total_active_ads; ?></td>
    <td width="24%"><b>Active Members</b></td>
     									<?php
                                          $active_users="SELECT id,first_name FROM  registration WHERE status='1'";
										  $run_active_users=mysql_query($active_users);
										  $total_actice_users=mysql_num_rows($run_active_users);
										  ?>
    
    
    <td width="32%"><?php echo $total_actice_users; ?></td>
  </tr>
  <tr>
   <?php 
	$pending_ads = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id WHERE postcode_location.status='0'";

$result_pending = mysql_query($pending_ads);

$total_pending_ads=mysql_num_rows($result_pending);
	?>
    <td height="38"><b>Pending Ads</b></td>
    <td><?php echo $total_pending_ads; ?></td>
    <td><b>Pending Members</b></td>
    
    <?php
                                          $pending_users="SELECT id,first_name FROM  registration WHERE status='0'";
										  $run_pending_users=mysql_query($pending_users);
										  $total_pending_users=mysql_num_rows($run_pending_users);
										  ?>
    
    <td><?php echo $total_pending_users; ?></td>
  </tr>
  <tr>
    <td height="40"><b>Paid Ads</b></td>
    
    <?php 
	$payed_ads = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id WHERE ad_price.name!='Free Ad'";

$result_payed = mysql_query($payed_ads);

$total_payed_ads=mysql_num_rows($result_payed);
	?>
    
    <td><?php echo $total_payed_ads; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br /><br />
<table width="44%" border="0" cellspacing="2" cellpadding="2">

  <tr>
    <td height="41" colspan="3"><b>Change Admin Settings</b></td>
    </tr>
  <tr>
    <td width="29%" height="38"><b>First Name</b></td>
    <td colspan="2"><input type="text" name="first_name" value="<?php echo $first_name; ?>" id="ValidField" /></td>
  </tr>
  <tr>
    <td height="34"><b>Last Name</b></td>
    <td colspan="2"><input type="text" name="last_name" value="<?php echo $last_name; ?>" id="ValidField2" /></td>
  </tr>
  <tr>
    <td height="41"><b>Email</b></td>
    <td colspan="2"><input type="text" name="email" value="<?php echo $email; ?>" id="ValidEmail" /></td>
  </tr>
  <tr>
    <td height="38"><b>User Name</b></td>
    <td colspan="2"><input type="text" name="username" value="<?php echo $username; ?>" id="ValidField3" /></td>
  </tr>
  <tr>
    <td height="45"><b>Password</b></td>
    <td colspan="2"><input type="password" name="password" value="" id="ValidPassword" /></td>
  </tr>
  <tr>
    <td height="53"><b>Confirm Password</b></td>
    <td colspan="2"><input type="password" name="password" value="" id="ValidConfirmPassword" /></td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td width="9%"><input type="submit" name="submit" id="button" value="Edit" /></td>
    <td width="62%"><input type="reset" name="rest" id="button2" value="Cancle" /></td>
  </tr>
</table>

                                      
									</div>
                                    
                                    
                                    

					  </form>
						<div class="clearfix"></div>
					</div>
					

				</div>
				

			</div>
			<div class="clearfix"></div>
		</div>
<?php include('include/sidebar.php'); ?>

	</div>
	<div class="clearfix"></div>
<?php include('include/footer.php'); ?>
</body>
</html>