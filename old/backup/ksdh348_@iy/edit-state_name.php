<?php 
ob_start();
include('include/header.php');

$id=$_REQUEST['id'];

		if(isset($_REQUEST['submit'])){
			$up_state_name=$_REQUEST['state_name'];
			
			 $select="SELECT state_name FROM states WHERE state_name='".$up_state_name."' AND id !='".$id."'";
			$run_select=mysql_query($select);
			$fetch_state=mysql_fetch_array($run_select);
			 $state=$fetch_state['state_name'];
			
			if($state != $up_state_name){
				
				$update="UPDATE states SET state_name='$up_state_name' WHERE id='$id'";
				$run_update=mysql_query($update);
				
				if($run_update){
					
					$msg="Update Successfully";
				}
			}
			if($state==$up_state_name){
				
				$error="State name already Exist!";
			}
			
			
			
		}
 
	
	
	
	$select_state="SELECT id,state_name FROM states WHERE id='".$id."'";
				$run_state=mysql_query($select_state);
				$fetch_state_name=mysql_fetch_array($run_state);
				$state_name=$fetch_state_name['state_name'];
	
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
					<h1>Edit States</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" state_name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>States</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit State </font></strong></div></td>
    </tr>
    <tr>
      <td width="32%">&nbsp;</td>
      <td width="2%">&nbsp;</td>
      <td width="66%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">State Name</td>
      <td>:</td>
      <td><input name="state_name" type="text" id="state_name" size="20" value="<?php echo $state_name ?>"></td>
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