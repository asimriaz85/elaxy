<?php 
ob_start();
include('include/header.php');
 
	$id=$_REQUEST['id'];
	
	
	if(isset($_REQUEST['submit'])){
		
		$up_first_name=$_REQUEST['first_name'];
		$up_last_name=$_REQUEST['last_name'];
		$up_phone=$_REQUEST['phone'];
		$up_email=$_REQUEST['email'];
		$up_country=$_REQUEST['country'];
		$up_status=$_REQUEST['status'];
		
		
		$update="UPDATE registration SET first_name='$up_first_name',last_name='$up_last_name',phone='$up_phone',country='$up_country',status='$up_status' WHERE id='$id'";
		$run_update=mysql_query($update);
		
		if($run_update){
			
			$msg="Update Successfully";
		}
		
		else{
		$error="Data Not Updated Because of Error!";	
		}
		
	}
	
	
	
	$select_user="SELECT * FROM registration WHERE id='".$id."'";
	$run_user=mysql_query($select_user);
	$fetch_user=mysql_fetch_array($run_user);
	
	$first_name=$fetch_user['first_name'];
	$last_name=$fetch_user['last_name'];
	$phone=$fetch_user['phone'];
	$email=$fetch_user['email'];
	$country=$fetch_user['country'];
	$status=$fetch_user['status'];
	
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
					<h1>Edit Member</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Member</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit Menber </font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">First Name</td>
      <td>:</td>
      <td><input name="first_name" type="text" id="name" size="20" value="<?php echo $first_name ?>"></td>
    </tr>
    <tr>
      <td height="47">Last Name</td>
      <td>:</td>
      <td><input name="last_name" type="text" id="name2" size="20" value="<?php echo $last_name ?>" /></td>
    </tr>
    <tr>
      <td height="47">Phone</td>
      <td>:</td>
      <td><input name="phone" type="text" id="name3" size="20" value="<?php echo $phone ?>" /></td>
    </tr>
    <tr>
      <td height="47">Email</td>
      <td>:</td>
      <td><input name="email" type="text" id="name4" size="20" value="<?php echo $email ?>" /></td>
    </tr>
    <tr>
      <td height="47">Country</td>
      <td>:</td>
      <td><input name="country" type="text" id="name4" size="20" value="<?php echo $country; ?>" /></td>
    </tr>
    <tr>
      <td height="47"><span style="width:132px">Agrement Status</span></td>
      <td>:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="47">Status</td>
      <td>:</td>
      <td><select name="status">
      <option value="1" <?php if($status==1){?> selected="selected"<?php } ?>>Active</option>
      <option value="0"<?php if($status==0){?> selected="selected"<?php } ?>>Not Active</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="3"><div class="buttons" style="width:200px;">
        <button type="submit" value="Submit" class="ui-state-default ui-corner-all" id="saveForm" name="submit">Submit</button>
        
        <br /><br />
        </div></td>
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