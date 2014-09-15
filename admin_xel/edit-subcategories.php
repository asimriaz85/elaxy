<?php 
ob_start();
include('include/header.php');
 
	$id=$_REQUEST['id'];
	
	
	
		if(isset($_REQUEST['submit'])){
			
			/*echo '<pre>';
			print_r($_REQUEST);
			echo '</pre>';
			
			exit;*/
			
			  $up_parent_off=$_REQUEST['parent_off_name']; 
			 $up_name=$_REQUEST['name'];
			 $up_show_hide=$_REQUEST['show_hide'];
			
			 function string_limit_words($string, $word_limit) {
   $words = explode(' ', $string);
   return implode(' ', array_slice($words, 0, $word_limit));
}

$utitle=mysql_real_escape_string($up_name);

$utitle=htmlentities($utitle);

$date=date("Y/m/d");

$newtitle=string_limit_words($utitle, 6);
$urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);

$newurltitle=str_replace(" ","-",$newtitle);
$url=$newurltitle;	


			$update="UPDATE categories SET parent_off='".$up_parent_off."',name='".$up_name."',show_hide='".$up_show_hide."',cat_url='".$url."' WHERE id='".$id."'" ;
			$run_update=mysql_query($update);
			
			if($run_update){
				
				$msg="Update Successfully";
			}
			else{
			$error="Current Data is not updated due to error!";	
			}
			
		}
	
	
	
	
	$select_sub="SELECT id,name,parent_off,show_hide FROM categories WHERE id='".$id."'";
	$run_sub=mysql_query($select_sub);
	$fetch_sub=mysql_fetch_array($run_sub);
	
	 $sub_cat_name=$fetch_sub['name'];
	$show_hide=$fetch_sub['show_hide'];	
	$parent_off_id=$fetch_sub['parent_off'];
			
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
					<h1>Edit Sub Categories</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Sub Categories</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Add Sub Category </font></strong></div></td>
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
      <select name="parent_off_name">
     
     
      <?php
	  	
			$select_categories="SELECT id,name FROM categories WHERE parent_off='0'";
			$run_query=mysql_query($select_categories);
			while($fetch_query=mysql_fetch_array($run_query)){
	  		$cat_id=$fetch_query['id'];
	  		$cat_name=$fetch_query['name'];
	   ?>
      <option value="<?php echo $cat_id; ?>"<?php if($cat_id==$parent_off_id){?> selected="selected"<?php } ?>><?php echo $cat_name; ?></option>
      
      <?php } ?>
      	</select></td>
    </tr>
    <tr>
      <td height="33">Sub Category:</td>
      <td>:</td>
      <td><input name="name" type="text" id="name" size="20" value="<?php echo $sub_cat_name; ?>"></td>
    </tr>
    <tr>
      <td height="47">Active/Notactive</td>
      <td>:</td>
      <td>
      
                                    
        <select tabindex="1" class="field select small" name="show_hide" > 	                                   
          
          <option value="Show" <?php if($show_hide=='Show'){?> selected="selected"<?php } ?>>
            Show
            </option>
          <option value="Hide"  <?php if($show_hide=='Hide'){?> selected="selected"<?php } ?>>
            Hide
            </option>
          
          </select>
      
        </td>
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