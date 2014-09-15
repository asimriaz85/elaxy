<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 <link href="uploadfile.css" rel="stylesheet">
    <script src="js/1.9.1-jquery.min.js"></script>
    <script src="jquery.uploadfile.min.js"></script>   


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php"); 

include("inc/validation.php");
	
	
	 //echo $id=$_REQUEST['id'];
	  //$postcode_id=$_REQUEST['postcode_id'];
	  
	 $postcode_id=$_REQUEST['id'];
	 if(isset($_REQUEST['update'])){
		 
		 
		 
		 $up_title=$_REQUEST['title'];
		 $up_description=$_REQUEST['description'];
		 
		 $selectall=$_REQUEST['list'];
		 
		 $featured_p=$_REQUEST['featured_p'];
		 
		 $via_email=$_REQUEST['via_email'];
		 
		 $via_phone=$_REQUEST['via_phone'];
		 
		 
		  $update="UPDATE  ad_title_description SET title='".$up_title."',description ='".$up_description."' WHERE postcode_loaction_id ='".$postcode_id."'";
		 $run_updte=mysql_query($update);
		 
		 
		 $delall=mysql_query("DELETE from ad_price  WHERE postcode_loaction_id='".$postcode_id."'") or die(mysql_error());
		 $num= sizeof($selectall);
	for($i=0; $i<$num; $i++){
		   $element=$selectall[$i]; 
		  
		   $element2= str_replace("featured",$featured_p,$element);
		  
		  
		  $pieces = explode("_", $element2);
    $select_name= $pieces[0]; // piece1
   $select_price= $pieces[1]; // piece2
		 $select_days= $pieces[2];
		 
		 
		 
		 
		 
		  $insert4="INSERT INTO ad_price(postcode_loaction_id,name,price,days)VALUES('".$postcode_id."','".$select_name."','".$select_price."','".$select_days."')";
		 
		 
		 $run_insert4=mysql_query($insert4);
		 
	}
		 
		  $update_contact="UPDATE contact_via SET via_email='$via_email',via_phone='$via_phone' WHERE postcode_loaction_id='$postcode_id'";
		 $run_contact=mysql_query($update_contact);
		 
		 
	 }
	 
	 
	   $select_postcode_location="SELECT main_cat_id,sub_cat_id,sub_sub_cat,sub_cat_child_child,sub_cat_child_child_child,postcode,companyname,town,map FROM postcode_location WHERE id='".$postcode_id."'";
	 $run_postcode_location=mysql_query($select_postcode_location);
	 $fetch_postcode_location=mysql_fetch_array($run_postcode_location);
	 
	 $main_cat_id =$fetch_postcode_location['main_cat_id'];
	 $sub_cat_id=$fetch_postcode_location['sub_cat_id'];
	 $sub_sub_cat =$fetch_postcode_location['sub_sub_cat'];
	 $sub_cat_child_child =$fetch_postcode_location['sub_cat_child_child'];
	 $sub_cat_child_child_child =$fetch_postcode_location['sub_cat_child_child_child'];
	 
	 $postcode=$fetch_postcode_location['postcode'];
	 $companyname =$fetch_postcode_location['companyname'];
	 $town=$fetch_postcode_location['town'];
	 $map=$fetch_postcode_location['map'];
	 
	 
	 $select_main_cat="SELECT id,name FROM categories WHERE id='".$main_cat_id."'";
	$run_main_cat=mysql_query($select_main_cat);
	$fetch_main_cat=mysql_fetch_array($run_main_cat);
	$main_category=$fetch_main_cat['name'];
	
	
	$select_child1="SELECT id,name FROM categories WHERE id='".$sub_cat_id."'";
	$run_child1=mysql_query($select_child1);
	$fetch_child1=mysql_fetch_array($run_child1);
	 $child1=$fetch_child1['name'];
	
	
	$select_child2="SELECT id,name FROM categories WHERE id='".$sub_sub_cat."'";
	$run_child2=mysql_query($select_child2);
	$fetch_child2=mysql_fetch_array($run_child2);
	 $child2=$fetch_child2['name'];
	
	
	$select_child3="SELECT id,name FROM categories WHERE id='".$sub_cat_child_child."'";
	$run_child3=mysql_query($select_child3);
	$fetch_child3=mysql_fetch_array($run_child3);
	 $child3=$fetch_child3['name'];
	
	
	$select_child4="SELECT id,name FROM categories WHERE id='".$sub_cat_child_child_child."'";
	$run_child4=mysql_query($select_child4);
	$fetch_child4=mysql_fetch_array($run_child4);
	 $child4=$fetch_child4['name'];
	 
	 ////Title Description////
	$select_title_description="SELECT title,description FROM ad_title_description WHERE postcode_loaction_id='".$postcode_id."'";
	$run_title_description=mysql_query($select_title_description);
	$fetch_title_description=mysql_fetch_array($run_title_description);
	
	$title=$fetch_title_description['title'];
	$description=$fetch_title_description['description'];
	
	///END///
	
	///Web Link///
	 $select_weblink="SELECT postcode_loaction_id,link_site,price FROM your_web_link WHERE postcode_loaction_id='".$postcode_id."'";
	$run_weblink=mysql_query($select_weblink);
	$fetch_web_link=mysql_fetch_array($run_weblink);
	
	$link_site_postcode_location_id=$fetch_web_link['postcode_loaction_id'];
	
	$link_site=$fetch_web_link['link_site'];
	
	$price=$fetch_web_link['price'];
	//END//
	
	
	//ad price and features//
	$select_ad_price="SELECT postcode_loaction_id,name,price,days FROM ad_price WHERE postcode_loaction_id='".$postcode_id."'";
	$run_ad_price=mysql_query($select_ad_price);
	while($fetch_ad_price=mysql_fetch_array($run_ad_price)){
	
	$ad_price_postcode_loaction_id=$fetch_ad_price['postcode_loaction_id'];
	$ad_price_name.=$fetch_ad_price['name'];
	$ad_price_price=$fetch_ad_price['price'];
	$ad_price_days=$fetch_ad_price['days'];
	
	}
	
	//Via Contact//
	
	$select_via_contact="SELECT via_email,via_phone FROM contact_via WHERE postcode_loaction_id='".$postcode_id."'";
	$run_via_contact=mysql_query($select_via_contact);
	$fetch_via_contat=mysql_fetch_array($run_via_contact);
	$select_via_email=$fetch_via_contat['via_email'];
	$select_via_phone=$fetch_via_contat['via_phone'];
	
	
	
	
	
	
	
	//END//
	
	
?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div class="left_ad"><img src="images/120x600ad.jpg" width="120" height="600" /></div>
<div id="contant_area">
<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000; border:none;">
<div class="catContainer">
<form class="post-ad-next-step form-flow-mergable Active" id="form" name="address" action="" method="post" enctype="multipart/form-data">
        <h1>Add Your Post</h1>
        <div class="catSelect selected">
             <div class="Right">
             	<h4>Your Selected Category <a href="post-ad1.php">(back to change or edit)</a></h4>
             	<div class="catHolder">
                	<span class="selected"><?php echo $main_category; ?></span> <?php if(!empty($child1)){ ?><span><?php echo $child1; ?></span><?php } if(!empty($child2)){ ?> <span><?php echo $child2; ?></span><?php } if(!empty($child3)){ ?><?php echo $child3;  } if(!empty($child4)){ ?><span><?php echo $child4; ?></span><?php } ?>
                </div>                                            
             </div>
             <div class="Right">
             	<h4>Ad title</h4>
             	<div class="catHolder">
                	<label>Title<b>*</b>:</label>
                	<input type="text" name="title" id="ValidField2" value="<?php echo $title; ?>"/>                                  
                </div>                                            
             </div>  
               
             <div class="Right">
             	<h4>Description</h4>
             	<div class="catHolder">
                	<label>Description<b>*</b>:</label>
                	<textarea name="description" cols="50" rows="10" id="area1"><?php echo $description; ?></textarea>                                  
                </div>                                            
             </div> 
              
                 
             <div class="Right">
             	<h4>Make your ad stand out! Select an option below to promote your ad</h4>
             	<div class="catHolder">
                	<p>Link to your website for <strong>£7.50</strong> - view example</p>
                	<label class="lable-p"><input type="checkbox" name="list[]" class="childCheckBox cb" value="urgent_9.95_7" id="one" rel="9.95" <?php $mystring = $ad_price_name;
$findme   = 'urgent';
$pos = strpos($mystring, $findme); if ($pos !== false) {?> checked="checked"<?php }?> /> URGENT</label>
                	<p>Up to 3 times more views and replies*. Perfect if you need to sell, rent or hire quickly. View example <b>7 days - £9.95</b></p>
                	<label class="lable-p bg-colgreen"><input type="checkbox" name="list[]" class="childCheckBox cb" value="featured" rel="15.50" <?php $mystring = $ad_price_name;
$findme   = 'feature';
$pos = strpos($mystring, $findme); if ($pos !== false) {?> checked="checked"<?php }?> /> FEATURED</label>
                	<p>Up to 7 times more views and replies*. Your ad will appear at the top of the listings for 3, 7 or 14 days. View example
                    <?php 
		 
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
         
         <option value="<?php echo "feature_".$price_pack."_".$days_pack; ?>"><?php echo $days_pack." days - &pound;".$price_pack; ?> </option>
         <?php } }?>
         
         </select>
                    
                    </p>
                    <label class="lable-p bg-colblue"><input type="checkbox" name="list[]" value="spotlight_23.50_7" class="childCheckBox cb" rel="23.50" <?php $mystring = $ad_price_name;
$findme   = 'spotlight';
$pos = strpos($mystring, $findme); if ($pos !== false) {?> checked="checked"<?php }?> /> Spotlight</label>
                	<p>Your ad will appear on the Elaxy homepage and will be seen by millions of people. View example <b>7 days - £23.50</b></p>                            
                </div>                                            
             </div>   
             <div class="Right">
             	<h4>How would you like to be contacted?</h4>
             	<div class="catHolder">
                	<p>Please select at least one contact option for your ad</p>
                	<label>Contact Name</label>
                	<input name="name" type="text" value="<?php echo $session_first_name; ?>"/><p>&nbsp;</p>                
                	<label><input type="checkbox" name="via_email" <?php if($select_via_email==$session_email){?> checked="checked"<?php } ?> value="<?php echo $session_email; ?>" /> Via email on</label>
                	<input name="email" type="text" value="<?php echo $session_email; ?>"  /><p>Your email address won't appear on your ad</p>
                	<label><input type="checkbox" name="via_phone" <?php if($select_via_phone==$session_phone){?> checked="checked"<?php } ?> value="<?php echo $session_phone; ?>" /> By phone on</label>
                	<input name="phone" type="text"  size="50" value="<?php echo $session_phone; ?>" />
                </div>                                            
             </div>   
             <!--<div class="Right">
             	<div class="catHolder" style="background:lightyellow">
                	<label><b>Total Amount:</b></label>
                	<span class="m0">$250.05</span>               

                </div>                                            
             </div>-->   
             <div class="Right">
             	<div class="catHolder">
                	<label style="width:50%; line-height:42px;">By clicking 'Post my ad', you agree to Elaxy's terms of use and posting rules</label>
                	<input id="category-select_submit-category" name="update" class="button pull-right" value="Post My Add" data-parent-component="#post-ad-category-select" type="submit">                 
                </div>                                            
             </div>                                                                                             
               <p>*Average comparison in ad views and replies between ads that are not promoted and "urgent" or "featured" ads respectively, measured on the Elaxy website from March 2012 to March 2013</p>                      
        </div>
        </form>
    </div>
          
</div>
<div class="clear"></div>
<div class="right_ad" style="left: 782px;"><img src="images/120x600ad.jpg" width="120" height="600" /></div>
</div>
</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>