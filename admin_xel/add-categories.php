<?php 
ob_start();
include('include/header.php');
 
	$name=$_REQUEST['name'];
	$desc=$_REQUEST['desc'];
	$hide_show=$_REQUEST['hide_show'];
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
					<h1>Add Categories</h1>
					<div class="other">

						<form action="config/add-categories.php" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Categories</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Add New Category </font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Name:</td>
      <td>:</td>
      <td><input name="name" type="text" id="name" size="20" value="<?php echo $name ?>"></td>
    </tr>
    <tr>
      <td height="47">Active/Notactive</td>
      <td>:</td>
      <td>
        <?php
                                    if(isset($hide_show)){
                                    ?>
        <select tabindex="1" class="field select small" name="hide_show" > 	                                   
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
        
        <select tabindex="1" class="field select small" name="hide_show" > 
          
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
      <td>Icon:</td>
      <td>:</td>
      <td><input type="file" name="client_image" class="" id="inputdis" />
      
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