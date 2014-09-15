
 <script type="text/javascript">
  
</script>
<?php include("include/header2.php"); 

	$id=$_REQUEST['id'];
	
	$link=$_REQUEST['page_name'];
	
	$select_categories="SELECT id,name FROM categories WHERE id='".$id."'";
			$run_query=mysql_query($select_categories);
			$fetch_query=mysql_fetch_array($run_query);
	  		$cat_id=$fetch_query['id'];
	  		$cat_name=$fetch_query['name'];
?>
<div class="page-title ui-widget-content ui-corner-all">
					
					<div class="other">

						<form action="config/sub-categories2.php" method="post" enctype="multipart/form-data" class="forms" name="form" onsubmit="javascript:parent.jQuery.fancybox.close();" >
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
        
        				
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div id="div_hight" align="center"><strong><font color="#FFFFFF">Add Sub Category of <?php echo $cat_name; ?> </font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Category</td>
      <td>:</td>
      <td>
      
      <?php
	  	
			
			
				echo $cat_name;
	   ?>
       <input type="hidden" name="parent_off" value="<?php echo $cat_id; ?>">
       <input type="hidden" name="link" value="<?php echo $link ?>">
      
      </td>
    </tr>
    <tr>
      <td height="33">Sub Category:</td>
      <td>:</td>
      <td><input name="name" type="text" id="name" size="20" value="<?php echo $name; ?>"></td>
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
      <td colspan="3"><div class="buttons" style="width:200px;">
        <button type="submit" value="Submit" class="ui-state-default ui-corner-all" id="saveForm" name="submit" >Submit</button>
        
        <br /><br />
        </div></td>
    </tr>
  </table>
                                    
                          </div>
                                    
                                    
                                    

					  </form>
						<div class="clearfix"></div>
					</div>
					

				</div>
                </body>
                </html>