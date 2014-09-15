<?php 
ob_start();
include('include/header.php');
require_once 'gd_engine/ThumbLib.inc.php';
include "gd_engine/gdengin.php";
 
	 $id=$_REQUEST['id'];
	
	
	//Update//
	if(isset($_REQUEST['submit'])){
			
			 $up_name=$_REQUEST['name'];
			 $up_show_hide=$_REQUEST['show_hide'];
			 $up_parent_off=$_REQUEST['sub_cat'];
			
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

	 $client_image=$_FILES['client_image']['name'];
	
	if($client_image){$categories_update="update categories set name='".$up_name."',show_hide='".$up_show_hide."',parent_off='".$up_parent_off."',cat_url='".$url."' where id='$id'";

$image_update="UPDATE categories_image SET image='".$client_image."' WHERE cat_id='".$id."'";


$query=mysql_query($categories_update) or die (mysql_error());
$query_image=mysql_query($image_update) or die (mysql_error());
}
else{
	
	 $update_categories11="UPDATE categories SET name='".$up_name."',show_hide='".$up_show_hide."',parent_off='".$up_parent_off."',cat_url='".$url."' WHERE id='".$id."'";
$query_categories11=mysql_query($update_categories11) or die (mysql_error);

$msg="Update Successfully";
}



}
$tmp_name5 = $_FILES["client_image"]["tmp_name"];
$nm5 = $_FILES["client_image"]["name"];
if($nm5!="")
{
//image type, require JPG or GIF
$filetype5 = substr($nm5, -3);
$name5="categories_1_".$id.".jpg"; 

		if($filetype3=="jpg" || "JPG" || "JPEG" || "jpeg" || "gif" || "png")
		{
					//Move uploaded file to temp folder
			if (move_uploaded_file($tmp_name5, "media/upl_gallery/$name5"))
			{
			
				 mysql_query("Update categories_image Set image='$name5' where cat_id='$id'")or die(mysql_error());
				$msg="yes";
			}else{
			//if upload fails
			$msg="no";
			die("Error uploading file");
			exit();
		}
		$thumb = PhpThumbFactory::create("media/upl_gallery/".$name5."");
	if($thumb->resize(45, 40)){

    if(!$thumb->save('media/logo_gallery/'.$name5)){
    print "<br>Failed to Create Thumb, The required file might be moved, removed or the image is too small";
    }
		$thumb = PhpThumbFactory::create("media/upl_gallery/".$name5."");
	if($thumb->resize(640, 480)){

    if(!$thumb->save('media/large_gallery/'.$name5)){
    print "<br>Failed to Create Thumb, The required file might be moved, removed or the image is too small";
    }
			
			
			$thumb = PhpThumbFactory::create("media/upl_gallery/".$name5."");
	if($thumb->resize(210, 100)){

    if(!$thumb->save('media/thumb_gallery/'.$name5)){
    print "<br>Failed to Create Thumb, The required file might be moved, removed or the image is too small";
    }
	

}
		}


}
}

$msg="Update Successfully If Image Not change Please Refresh the page";	
			
		}
	
	
	//End//
	
	
	
	
		
			$select="SELECT id,name,show_hide,parent_off FROM categories WHERE id='".$id."'";
			$run_query=mysql_query($select);
			$fetch=mysql_fetch_array($run_query);
			$name=$fetch['name'];
			$show_hide=$fetch['show_hide'];
			 $parent_off=$fetch['parent_off'];
			
			$select_image="SELECT id,cat_id,image FROM categories_image WHERE cat_id='".$id."'";
			$run_image=mysql_query($select_image);
			$fetch_image=mysql_fetch_array($run_image);
			$image=$fetch_image['image'];
			
			$subcat="SELECT id,name,show_hide,parent_off FROM categories WHERE id='".$parent_off."'";
			$run_sub_cat=mysql_query($subcat);
			
			$fetch_sub_cat=mysql_fetch_array($run_sub_cat);
				
				 $subcat_id=$fetch_sub_cat['id'];
				  $sub_parent_id=$fetch_sub_cat['parent_off'];
				  
				  $main_category="SELECT id,name,show_hide,parent_off FROM categories WHERE id='".$sub_parent_id."'";
				  $run_main_cat=mysql_query($main_category);
				  $fetch_main_cat=mysql_fetch_array($run_main_cat);
				  
			$main_cat_name=$fetch_main_cat['name'];
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
					<h1>Edit Categories</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Categories</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="4" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit Category </font></strong></div></td>
    </tr>
    <tr>
      <td width="31%">&nbsp;</td>
      <td width="2%">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Main Category</td>
      <td>:</td>
      <td colspan="2"><?php echo $main_cat_name; ?></td>
    </tr>
    <tr>
      <td height="33">Subcategories</td>
      <td>:</td>
      <td colspan="2">
      <select name="sub_cat">
      <?php 
	  
	  $subcat2="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$sub_parent_id."'";
			$run_sub_cat2=mysql_query($subcat2);
			while($fetch_sub_cat2=mysql_fetch_array($run_sub_cat2)){
				$subcat_name2=$fetch_sub_cat2['name'];
				$subcat_id2=$fetch_sub_cat2['id'];
	  ?>
      <option value="<?php echo $subcat_id2 ?>"<?php if($subcat_id==$subcat_id2){ ?> selected="selected"<?php } ?>><?php echo $subcat_name2; ?></option>
      <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="33">Name:</td>
      <td>:</td>
      <td colspan="2"><input name="name" type="text" id="name" size="20" value="<?php echo $name ?>"></td>
    </tr>
    <tr>
      <td height="47">Active/Notactive</td>
      <td>:</td>
      <td colspan="2">
        <?php
                                    
                                    ?>
        <select tabindex="1" class="field select small" name="show_hide" > 	                                   
          
          <option value="Show" <?php if($show_hide=='Show'){?> selected="selected"<?php } ?>>
            Show
            </option>
          <option value="Hide" <?php if($show_hide=='Hide'){?> selected="selected"<?php } ?>>
            Hide
            </option>
          
          </select>
        
        </td>
    </tr>
    <tr>
      <td>Icon:</td>
      <td>:</td>
      <td width="57%"><input type="file" name="client_image" class="" id="inputdis" />
      
      <td width="10%"><img src="media/logo_gallery/<?php echo $image; ?>" />      
    </tr>
    <tr>
      <td colspan="4"><div class="buttons" style="width:200px;">
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