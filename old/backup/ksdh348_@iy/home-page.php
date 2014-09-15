<?php 
ob_start();
include('include/header.php');
 
	$ad_page_name=$_REQUEST['ad_page_name'];
	$location=$_REQUEST['location'];
	$hide_show=$_REQUEST['hide_show'];
	$ad_code=$_REQUEST['ad_code'];
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
					<h1>Adsens</h1>
					<div class="other">

						<form action="config/home-page.php" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Add Adsen Ad</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Add New Adsen </font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Page Name</td>
      <td>&nbsp;</td>
      <td><select tabindex="1" class="field select medium" name="ad_page_name" >
        <option value="">Please Select Location</option>
        <option value="Home" <?php if($ad_page_name=='Home'){?> selected="selected"<?php } ?>> Home </option>
        <option value="View" <?php if($ad_page_name=='View'){?> selected="selected"<?php } ?>> View </option>
        <option value="Detail" <?php if($ad_page_name=='Detail'){?> selected="selected"<?php } ?>> Detail </option>
      </select></td>
    </tr>
    <tr>
      <td height="33">Location:</td>
      <td>:</td>
      <td><select tabindex="1" class="field select medium" name="location" > 
          <option value="">Please Select Location</option>
          <option value="Header" <?php if($location=='Header'){?> selected="selected"<?php } ?>>
            Header
            </option>
          
          <option value="Left" <?php if($location=='Left'){?> selected="selected"<?php } ?>>
            Left
            </option>
          <option value="Right" <?php if($ad_page_name=='Right'){?> selected="selected"<?php } ?>>
            Right
            </option>
          
          </select></td>
    </tr>
    <tr>
      <td height="47">Active/Notactive</td>
      <td>:</td>
      <td>
        <?php
                                    if(isset($hide_show)){
                                    ?>
        <select tabindex="1" class="field select medium" name="hide_show" > 	                                   
          <option value="<?php echo $hide_show; ?>">
            <?php echo $hide_show; ?>
            </option>
          <option value="Show">
            Show
            </option>
          <option value="Hide">
            Hide
            </option>
          
          </select>
        <?php } else{ ?>
        
        <select tabindex="1" class="field select medium" name="hide_show" > 
          
          <option value="Show">
            Show
            </option>
          <option value="Hide">
            Hide
            </option>
          
          </select>
        <?php } ?>
        </td>
    </tr>
    <tr>
      <td>Add Code</td>
      <td>:</td>
      <td><textarea name="ad_code"><?php echo $ad_code; ?></textarea>   
    </tr>
    <tr>
      <td>Ad Imge:</td>
      <td>:</td>
      <td><input type="file" name="client_image" class="" id="inputdis" />    
      </tr>
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