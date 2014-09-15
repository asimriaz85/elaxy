<?php

ob_start();
include('include/header.php');
$id=$_REQUEST['id'];

	
		if(isset($_REQUEST['submit'])){
			
			
			/*echo '<pre>';
			print_r($_REQUEST);
			echo '</pre>';*/
			
			$up_main_cat_id=$_REQUEST['main_cat_id'];
			$up_sub_cat_id=$_REQUEST['sub_cat_id'];
			$up_title=$_REQUEST['title'];
			$up_price=$_REQUEST['price'];
			$up_description=$_REQUEST['description'];
			$up_list=$_REQUEST['list'];
			$up_published_date001=$_REQUEST['published_date'];
			
			
$pieces = explode("/", $up_published_date001);
$month= $pieces[0]; // piece1
$date= $pieces[1]; // piece2
$year= $pieces[2]; // piece3

$up_published_date=$year."-".$month."-".$date;

			$up_status=$_REQUEST['status'];
			
			 $select_title_description="SELECT id,postcode_loaction_id,title,description FROM ad_title_description WHERE postcode_loaction_id='".$id."'";
			$run_title=mysql_query($select_title_description);
			$fetch_title_des=mysql_fetch_array($run_title);
			$title_id=$fetch_title_des['id'];
			
			
			
			
			 $update_title="UPDATE ad_title_description SET title='$up_title',description='$up_description' WHERE id='$id'";
			$update_title=mysql_query($update_title);
			
			
			
			
			  $update="UPDATE postcode_location SET main_cat_id='$up_main_cat_id',sub_cat_id='$up_sub_cat_id',item_price='$up_price',date='$up_published_date',status='$up_status' WHERE id='$id'";
			$run_update=mysql_query($update);
			
			
			
			
		}


	/*$select_post_id="SELECT id,postcode_loaction_id FROM ad_price WHERE id='".$id."' ";
	$run_post_id=mysql_query($select_post_id);
	$fetch_post_id=mysql_fetch_array($run_post_id);
	$post_id=$fetch_post_id['postcode_loaction_id'];*/


	?>
    <!--Nice Editor-->
        <script src="nice_editor/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
    <?php
	
	
	//$select_status="SELECT id,status FROM postcode_location WHERE id='".$id."'";
	
	
	
	$select_status = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id WHERE postcode_location.id='".$id."' ";	
	
			$run_query=mysql_query($select_status);
			$fetch_query=mysql_fetch_array($run_query);
	  		
	  		$status=$fetch_query['status'];
			$title=$fetch_query['title'];
			$description=$fetch_query['description'];
			$item_price=$fetch_query['item_price'];
			$published_date=$fetch_query['date'];
			
			
			
			$main_cat_id=$fetch_query['main_cat_id'];
	$sub_cat_id=$fetch_query['sub_cat_id'];
			
			
			 $ad_price_feature_name=$fetch_query['name'];
			
			 
			
			
			
?>
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>View &amp; Update Ad Status</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
        
        				
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div id="div_hight" align="center"><strong><font color="#FFFFFF">Update Ad Status</font></strong></div></td>
    </tr>
    <tr>
      <td height="24" valign="bottom">&nbsp;</td>
      <td valign="bottom">&nbsp;</td>
      <td valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td height="51">Category</td>
      <td>:</td>
      <td><select name="main_cat_id"> 
      <?php 
      $select_category="SELECT id,name FROM  categories WHERE parent_off='0'";
			 $run_categories=mysql_query($select_category);
			 while($fetch_categories=mysql_fetch_array($run_categories)){
			 $category_name=$fetch_categories['name'];
			 $category_id=$fetch_categories['id'];
			 ?>
      <option value="<?php echo $category_id; ?>" <?php if($category_id==$main_cat_id){ ?> selected="selected"<?php } ?>><?php echo $category_name; ?></option>
      <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td height="51">Sub Category</td>
      <td>:</td>
      <td>
       <select name="sub_cat_id">
      <?php 
      $select_subcategory01="SELECT id,name FROM  categories WHERE parent_off!='0'";
			 $run_subcategories01=mysql_query($select_subcategory01);
			while($fetch_subcategories01=mysql_fetch_array($run_subcategories01)){
			 $subcategory_name01=$fetch_subcategories01['name'];
			 $subcategory_id01=$fetch_subcategories01['id'];
			 
			 ?>
             
            <option value="<?php echo $subcategory_id01; ?>" <?php if($sub_cat_id==$subcategory_id01){ ?> selected="selected"<?php } ?>><?php echo $subcategory_name01; ?></option>
             <?php } ?>
             </select>
      
      </td>
    </tr>
    <tr>
      <td width="29%" height="51">Title</td>
      <td width="2%">:</td>
      <td width="69%"><input type="text" name="title" value="<?php echo $title; ?>" /></td>
    </tr>
    <tr>
      <td height="58">Price</td>
      <td>&nbsp;</td>
      <td><input type="text" name="price" value="<?php echo $item_price; ?>" /></td>
    </tr>
    <!--<tr>
      <td height="58">Added Date</td>
      <td>:</td>
      <td><input type="text" name="end_date" value="<?php //echo $published_date; ?>" /></td>
    </tr>-->
    <tr>
      <td height="58">Description</td>
      <td>:</td>
      <td><textarea name="description" cols="50" rows="10" id="area1"><?php echo $description; ?></textarea></td>
    </tr>
    <tr>
      <td height="165">Price Pakage</td>
      <td>:</td>
      <td><?php 
	 //ad price and features//
	$select_ad_price="SELECT postcode_loaction_id,name,price,days FROM ad_price WHERE postcode_loaction_id='".$post_id."' AND name='".$ad_price_feature_name."'";
	$run_ad_price=mysql_query($select_ad_price);
	$fetch_ad_price=mysql_fetch_array($run_ad_price);
	
	$ad_price_postcode_loaction_id=$fetch_ad_price['postcode_loaction_id'];
	  $ad_price_name=$fetch_ad_price['name'];
	 $ad_price_price=$fetch_ad_price['price'];
	 $ad_price_days=$fetch_ad_price['days'];
	
	
	  
	  ?>
        
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <?php if($ad_price_name=="urgent"){ ?>
          
          <tr>
            
            <td width="14%" height="49"><input type="checkbox" name="list" class="childCheckBox cb" value="urgent_9.95_7" id="one" rel="9.95" <?php  if ($ad_price_name=="urgent") {?> checked="checked"<?php }?> /></td>
            <td width="43%">URGENT</td>
            <td width="43%">7 days - &pound;9.95</td>
            </tr>
          <?php }?>
          
          <?php if($ad_price_name=="feature"){ ?>
          <tr>
            <td height="43"><input type="checkbox" name="list class="childCheckBox cb" value="featured" rel="15.50" <?php   if ($ad_price_name=="feature") {?> checked="checked"<?php }?> /></td>
            <td>Featured</td>
            <td><?php 
		 
		 $select_feature_pakage="SELECT id,days,price FROM  lime_price";
		 $run_feature_pakage=mysql_query($select_feature_pakage);
		 $num_rows_pakage=mysql_num_rows($run_feature_pakage);
		 ?>
              
              
              <select name="featured_p" id="model">
                <?php 
		 
		  
		 while($fetch_lime_pake=mysql_fetch_array($run_feature_pakage)){
		 
		 $days_pack=$fetch_lime_pake['days'];
		 $price_pack=$fetch_lime_pake['price'];
		 
		 if($num_rows_pakage >0){
		 ?>
                
                <option value="<?php echo 'feature_'.$price_pack.'_'.$days_pack; ?>"<?php if($price_pack==$ad_price_price){?> selected="selected"<?php } ?>><?php echo $days_pack.' days - &pound;'.$price_pack; ?> </option>
                <?php } }?>
                
                
                
                </select></td>
            </tr>
          <?php } ?>
          
          <?php if($ad_price_name=="spotlight"){ ?>
          <tr>
            <td height="65"><input type="checkbox" name="list[]" value="spotlight_23.50_7" class="childCheckBox cb" rel="23.50" <?php  if ($ad_price_name=="spotlight") {?> checked="checked"<?php }?> /></td>
            <td>Spotlight</td>
            <td>7 days - &pound;23.50</td>
            </tr>
          <?php } ?>
          </table>
        
        </td>
    </tr>
    <tr>
      <td height="71">Published Date</td>
      <td>:</td>
      <td><input type="text" name="published_date" value="<?php echo $published_date; ?>" id="datepicker"></td>
    </tr>
    <tr>
      <td height="71">Status</td>
      <td>:</td>
      <td>
        <select name="status">
          <option value="1"<?php if($status==1){?> selected<?php } ?>>Active</option>
          
          <option value="0"<?php if($status==0){?> selected<?php } ?>>Not Active</option>
          
          </select>
        
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
				

			</div>
			<div class="clearfix"></div>
		</div>
<?php include('include/sidebar.php'); ?>

	</div>
	<div class="clearfix"></div>
<?php include('include/footer.php'); ?>
</body>
</html>