<?php 
ob_start();
include('include/header.php');
 
 
 $id=$_REQUEST['id'];
 
 
 		if(isset($_REQUEST['submit'])){
			
			
			$up_county_id=$_REQUEST['county_id'];
			$up_city_name=$_REQUEST['city_name'];
			
			if(!empty($up_county_id) && !empty($up_city_name)){
				
				 $update="UPDATE city SET county_id='$up_county_id',city_name='$up_city_name' WHERE id='$id'";
				$run_update=mysql_query($update);
				
				if($run_update){
				$msg="Update Successfully";
					
				}
				
				
				if(!$run_update){
				$error="Data not Updated due to Error!";
					
				}
			} else{
				
			$error="Please fill all the required fields";	
			}
			
			
		}
 
 
	$select="SELECT id,county_id,city_name FROM city WHERE id='".$id."'";
	$run=mysql_query($select);
	$fetch=mysql_fetch_array($run);
	$county_id01=$fetch['county_id'];
	$city_name=$fetch['city_name'];
	
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
					<h1>Edit Cities</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" state_name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Cities</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit Cities </font></strong></div></td>
    </tr>
    <tr>
      <td width="32%">&nbsp;</td>
      <td width="2%">&nbsp;</td>
      <td width="66%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">County Name</td>
      <td>:</td>
      <td>
      <select name="county_id">
      <option value="">SELECT County</option>
      <?php 
	  $select_county="SELECT id,county_name FROM county";
	  $run_county=mysql_query($select_county);
	  while($fetch_county=mysql_fetch_array($run_county)){
	  $county_id=$fetch_county['id'];
	  $county_name=$fetch_county['county_name'];
	  ?>
      <option value="<?php echo $county_id; ?>"<?php if($county_id==$county_id01){ ?> selected="selected"<?php } ?>><?php echo $county_name; ?></option>
      <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="33">City</td>
      <td>:</td>
      <td><input name="city_name" type="text" id="state_name2" size="20" value="<?php echo $city_name; ?>" /></td>
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