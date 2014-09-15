<?php include("connection.php");
 require_once('ads.class.php');

$adsens= new adsens;

$left_ad=$adsens->Display_Ads('Home','Left');
$category_ad=$adsens->Display_Ads('Home','undercategory');
$footer_ad=$adsens->Display_Ads('Home','Bottom');

 ?>
<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>

</head>

<body>


<?php require_once('inc/header.php');
 
	


 $select_right_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='Home' AND location='Right' AND status='Show'";
$run_right=mysql_query($select_right_adsen);
$fetch_right_adsen=mysql_fetch_array($run_right);
$ad_code_right=$fetch_right_adsen['ad_code'];
$adsen_right_image=$fetch_right_adsen['images'];

?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div class="left_ad" style="width:160px;">&nbsp;<?php if(!empty($left_ad['AdCode'])){ echo $left_ad['AdCode']; } else if(!empty($left_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $left_ad['Image']; ?>"> <?php } ?></div>
<div id="contant_area_home" >
<?php /*?> if(isset($_SESSION['msg'])){ ?> <div style="font-size:14px; color:#F00; font-weight:bold; text-align:center; margin-top:10px; margin-bottom:10px;"><?php echo $_SESSION['msg'];?> </div><?php }<?php */?>
<div style="float:left;" class="veicals">
        <?php 

	
		 
	 $select="SELECT id,name,cat_url FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name asc LIMIT 0,5";
	$run=mysql_query($select);
	while($fetch=mysql_fetch_array($run)){
		
		$name=$fetch['name'];
	    $id=$fetch['id'];
		$maincaturl=$fetch['cat_url'];
		
		
		
		$select_image="SELECT image FROM categories_image WHERE cat_id='".$id."'";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		
		$image=$fetch_image['image'];
		
	?>
    
<div class="car"><img src="admin_xel/media/logo_gallery/<?php echo $image; ?>" alt="<?php echo $name; ?>"  /></div>
        
        <div class="car_title"><h2><?php echo $name; ?></h2></div>
       <div class="clear"></div> 
		
        <ul>
        <?php
	 $select_sub_categories="SELECT id,name,cat_url FROM categories WHERE parent_off='".$id."' AND show_hide='Show' ORDER BY name asc";
	$run_sub_cat=mysql_query($select_sub_categories);
	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){
		
		$sub_cat_id=$fetch_sub_cat['id'];
		$sub_cat_name=$fetch_sub_cat['name'];
		$sub_cat_url=$fetch_sub_cat['cat_url'];
	?>
        <li><a href="http://elaxy.co.uk/cat/<?=$sub_cat_url?>"><?php echo $sub_cat_name; ?></a></li>
        
        <?php } ?>
        
        </ul>


        
        
        
        
<?php } ?>
        
        </div>
        
        <div style="float:left;" class="veicals">
        <?php 

	
		 
	 $select="SELECT id,name,cat_url FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name asc LIMIT 5,2";
	$run=mysql_query($select);
	while($fetch=mysql_fetch_array($run)){
		
		$name=$fetch['name'];
	    $id=$fetch['id'];
		
		
		
		$select_image="SELECT image FROM categories_image WHERE cat_id='".$id."'";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		
		$image=$fetch_image['image'];
		
	?>
    
<div class="car"><img src="admin_xel/media/logo_gallery/<?php echo $image; ?>" alt="<?php echo $name; ?>"  /></div>
        
        <div class="car_title"><h2><?php echo $name; ?></h2></div>
       <div class="clear"></div> 
		
        <ul>
        <?php
	$select_sub_categories="SELECT id,name,cat_url FROM categories WHERE parent_off='".$id."' AND show_hide='Show' ORDER BY name asc";
	$run_sub_cat=mysql_query($select_sub_categories);
	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){
		
		$sub_cat_id=$fetch_sub_cat['id'];
		$sub_cat_name=$fetch_sub_cat['name'];
		$sub_cat_url=$fetch_sub_cat['cat_url'];
	?>
        <li><a href="http://elaxy.co.uk/cat/<?=$sub_cat_url?>"><?php echo $sub_cat_name; ?></a></li>
        
        <?php } ?>
        
        </ul>


        
        
        
        
<?php } ?>
        
        </div>
        
        <div style="float:left;" class="veicals">
        <?php 

	
		 
	 $select="SELECT id,name,cat_url FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name asc LIMIT 7,15";
	$run=mysql_query($select);
	while($fetch=mysql_fetch_array($run)){
		
		$name=$fetch['name'];
	    $id=$fetch['id'];
		
		
		
		$select_image="SELECT image FROM categories_image WHERE cat_id='".$id."'";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		
		$image=$fetch_image['image'];
		
	?>
    
<div class="car"><img src="admin_xel/media/logo_gallery/<?php echo $image; ?>" alt="<?php echo $name; ?>"  /></div>
        
        <div class="car_title"><h2><?php echo $name; ?></h2></div>
       <div class="clear"></div> 
		
        <ul>
        <?php
	$select_sub_categories="SELECT id,name,cat_url FROM categories WHERE parent_off='".$id."' AND show_hide='Show' ORDER BY name asc";
	$run_sub_cat=mysql_query($select_sub_categories);
	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){
		
		$sub_cat_id=$fetch_sub_cat['id'];
		$sub_cat_name=$fetch_sub_cat['name'];
		$sub_cat_url=$fetch_sub_cat['cat_url'];
	?>
        <li><a href="http://elaxy.co.uk/cat/<?=$sub_cat_url?>"><?php echo $sub_cat_name; ?></a></li>
        
        <?php } ?>
        
        </ul>


        
        
        
        
<?php } ?>
        <?php if(!empty($category_ad['AdCode'])){ echo $category_ad['AdCode']; } else if(!empty($category_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $category_ad['Image']; ?>"> <?php } ?>
        </div>
<div class="right_ad_home"><?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?><img src="admin_xel/media/upl_gallery/<?php echo $adsen_right_image; ?>"> <?php } ?> </div>

<div class="clear"></div>
<div style="float:left; margin-left:80px;">
<?php if(!empty($footer_ad['AdCode'])){ echo $footer_ad['AdCode']; } else if(!empty($footer_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $footer_ad['Image']; ?>"> <?php } ?>
</div>
</div>

 
</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
