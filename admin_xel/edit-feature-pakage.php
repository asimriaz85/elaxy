<?php 
ob_start();
include('include/header.php');



$id=$_REQUEST['id'];

		
			if(isset($_REQUEST['submit'])){
				
				$up_days=$_REQUEST['days'];
				$up_price=$_REQUEST['price'];
				
				$update="UPDATE  feature_price SET days='".$up_days."',price='".$up_price."' WHERE id='".$id."'";
				$run_update=mysql_query($update);
				
				if($run_update){
					$msg="Update Successfully";
				} else{
				$error="Not updated due to error!";	
				}
			}


	
		$select_feature_pakage="SELECT id,days,price FROM  feature_price WHERE id='".$id."'";
		$run_feature_pakage=mysql_query($select_feature_pakage);
		$fetch_feature_pakage=mysql_fetch_array($run_feature_pakage);
		

$days=$fetch_feature_pakage['days'];
$price=$fetch_feature_pakage['price'];
 
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
					<h1>Add Feature Ad Pakages</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Feature Pakage</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Add New Feature Pakage </font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Days:</td>
      <td>:</td>
      <td><input name="days" type="text" id="name" size="20" value="<?php echo $days; ?>"></td>
    </tr>
    <tr>
      <td height="47">Price</td>
      <td>:</td>
      <td>
        <input name="price" type="text" id="name" size="20" value="<?php echo $price; ?>">
        </td>
    </tr>
    <tr>
      <td colspan="3"><div class="buttons" style="width:200px;">
        <button type="submit" value="Submit" class="ui-state-default ui-corner-all" id="saveForm" name="submit">Update</button>
        
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