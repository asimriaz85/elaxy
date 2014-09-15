<?php 
ob_start();
include('include/header.php');
 
	$id=$_REQUEST['id'];
	
	if(isset($_REQUEST['submit'])){
		$up_category=$_REQUEST['category'];
		$up_tips_des=$_REQUEST['tips_des'];
		
		
		$update="UPDATE safity_tipds SET cat_id='$up_category',tips_des='$up_tips_des' WHERE id='$id'";
		$run_update=mysql_query($update);
		
		if($run_update){
			$msg="Update Successfully";
		}
		
		if(!$run_update){
			$error="Data not updated due to error!";
		}
		
		
	}
	
	
	
	$select_safity_tips="SELECT id,cat_id,tips_des FROM  safity_tipds WHERE id='".$id."'";
	$run_query_safity_tips=mysql_query($select_safity_tips);
	$fetch_safity_tips=mysql_fetch_array($run_query_safity_tips);
	$cat_id1=$fetch_safity_tips['cat_id'];
	$tips_des=$fetch_safity_tips['tips_des'];
	
	
?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>Edit Safity Tips</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Edit Safity Tips</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit Safity Tips</font></strong></div></td>
    </tr>
    <tr>
      <td width="29%">&nbsp;</td>
      <td width="2%">&nbsp;</td>
      <td width="69%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Category Name</td>
      <td>&nbsp;</td>
      <td><select tabindex="1" class="field select medium" name="category" >
        <option value="">Please Select Category</option>
        <?php
		$select_categories="SELECT id,name,show_hide FROM categories WHERE show_hide='Show' AND parent_off='0'";
		$run_categories=mysql_query($select_categories);
		while($fetch_categories=mysql_fetch_array($run_categories)){
			$cat_id=$fetch_categories['id'];
			$cat_name=$fetch_categories['name'];
		?>
        <option value="<?php echo $cat_id; ?>" <?php if($cat_id1==$cat_id){?> selected="selected"<?php } ?>> <?php echo $cat_name; ?> </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Description</td>
      <td>:</td>
      <td><textarea name="tips_des"><?php echo $tips_des; ?></textarea>   
      </tr>
    <!--<tr>
      <td>Ad Imge:</td>
      <td>:</td>
      <td><input type="file" name="client_image" class="" id="inputdis" />    
      </tr>-->
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>    
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