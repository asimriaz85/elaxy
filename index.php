<?php session_start();
include("connection.php");
include("lib/db_setting.php");
include("lib/db.class.php");
 include('lib/adsens.class.php');

$l_ad=adsens_Class::find_by_loc_pos('Home','Left600');
$r_ad=adsens_Class::find_by_loc_pos('Home','Right600');
$btm_ad=adsens_Class::find_by_loc_pos('Home','Bottom');

//$left_ad=$adsens->Display_Ads('Home','Left600');
//$category_ad=$adsens->Display_Ads('Home','undercategory');
//$footer_ad=$adsens->Display_Ads('Home','Bottom');

 ?>
<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>
<link href="/css/custom.css" rel="stylesheet">
<meta name="google-site-verification" content="e3MxpgV5bfaRLd1a2E2okCF9v3fQ9kCpTy_kTWfUx3A" />
</head>

<body>


<?php require_once('inc/header.php');
 
	


 $select_right_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='Home' AND location='Right600' AND status='Show'";
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

<div class="left_ad" style="width:160px;">&nbsp;


<?php if(!empty($l_ad->ad_code)){ echo $l_ad->ad_code; } else if(!empty($l_ad->images)){ ?> <img src="admin_xel/media/upl_gallery/<?=$l_ad->images?>"> <?php } ?>







</div>

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
         <?php if(!empty($category_ad['AdCode'])){ echo $category_ad['AdCode']; } else if(!empty($category_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $category_ad['Image']; ?>"> <?php } ?>
        </div>
<div class="right_ad_home"><?php if(!empty($r_ad->ad_code)){ echo $r_ad->ad_code; } else if(!empty($r_ad->images)){ ?> <img src="admin_xel/media/upl_gallery/<?=$r_ad->images?>"> <?php } ?> 



</div>

<div class="clear"></div>
<div class="relate-post">

<h1>Recently viewed ads </h1>

<div class="detail-post">
<?php if(!empty($_SESSION["products"])){ ?>
<h2><span style="float:right;"><img src="/images/clear.png" width="16" height="16"><a href="/clear-history.php?emptycart=1&return_url=http://elaxy.co.uk">Clear history</a></span></h2>



<?php
}
  
 
 
 
if(!empty($_SESSION["products"])){
  foreach ($_SESSION["products"] as $cart_itm)
    { ?>
<div class="relate-pro">



<div><a href="<?=$cart_itm["url"]?>"><?php if(!empty($cart_itm["image"])) { ?><img src="/thumb.php?src=/uploads/<?=$cart_itm["image"]?>&w=121&h=84" width="121" height="84" alt="" /><?php } else { ?> <img src="/images/noimage_thumbnail.png" width="121" height="84" alt="" />  <?php } ?>
</a></div>



<p><a href="<?=$cart_itm["url"]?>"><?=substr($cart_itm["name"], 0, 15)."....."?></a></p>

<p><strong><?php if(!empty($cart_itm["price"])){ ?>&pound; <?php echo $cart_itm["price"]; } ?></strong><!--<br>London--></p>


<div class="clear"></div>
</div>

<?php } } else { ?>

No Recent View Items

<?php } ?>

</div>







</div>
<div class="clear"></div>
<div style="float:left; margin-left:80px;">
<?php if(!empty($btm_ad->ad_code)){ echo $btm_ad->ad_code; } else if(!empty($btm_ad->images)) { ?> <img src="admin_xel/media/upl_gallery/<?=$btm_ad->images?>"> <?php } ?> 
</div>
</div>

 
</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
