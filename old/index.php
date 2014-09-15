<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>

</head>

<body>


<?php require_once('inc/header.php'); 

$select_left_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='Home' AND location='Left' AND status='Show'";
$run_left=mysql_query($select_left_adsen);
$fetch_left_adsen=mysql_fetch_array($run_left);
$adsen_left_image=$fetch_left_adsen['images'];
$ad_code_left=$fetch_left_adsen['ad_code'];


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
<div class="left_ad"><?php if(!empty($ad_code_left)){ echo $ad_code_left; } else if(!empty($adsen_left_image)){?><img src="ksdh348_@iy/media/large_gallery/<?php echo $adsen_left_image; ?>"> <?php } ?></div>
<div id="contant_area_home">
<div class="veicals">
<?php 
	
		 
	$select="SELECT id,name FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name LIMIT 0,4";
	$run=mysql_query($select);
	while($fetch=mysql_fetch_array($run)){
		
		$name=$fetch['name'];
	    $id=$fetch['id'];
		
		$select_image="SELECT image FROM categories_image WHERE cat_id='".$id."' ";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		
		$image=$fetch_image['image'];
		
	?>

		<div class="car"><img src="ksdh348_@iy/media/logo_gallery/<?php echo $image; ?>" alt="<?php echo $name; ?>"  /></div>
        
        <div class="car_title"><h2><?php echo $name; ?></h2></div>
       <div class="clear"></div> 
        <ul>
        <?php
	$select_sub_categories="SELECT id,name FROM categories WHERE parent_off='".$id."' AND show_hide='Show'";
	$run_sub_cat=mysql_query($select_sub_categories);
	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){
		
		$sub_cat_id=$fetch_sub_cat['id'];
		$sub_cat_name=$fetch_sub_cat['name'];
	?>
        <li><a href="view<?php echo $sub_cat_id; ?>-<?php echo $sub_cat_name;?>.html"><?php echo $sub_cat_name; ?></a></li>
        
        <?php } ?>
        
        </ul>


        
        
        
        
<?php } ?>

</div>

<div class="veicals">
<?php 
	
		 
	$select="SELECT id,name FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name LIMIT 4,4";
	$run=mysql_query($select);
	while($fetch=mysql_fetch_array($run)){
		
		$name=$fetch['name'];
	    $id=$fetch['id'];
		
		$select_image="SELECT image FROM categories_image WHERE cat_id='".$id."' ";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		
		$image=$fetch_image['image'];
		
	?>

		<div class="car"><img src="ksdh348_@iy/media/logo_gallery/<?php echo $image; ?>" alt="<?php echo $name; ?>"  /></div>
        
        <div class="car_title"><h2><?php echo $name; ?></h2></div>
       <div class="clear"></div> 
        <ul>
        <?php
	$select_sub_categories="SELECT id,name FROM categories WHERE parent_off='".$id."' AND show_hide='Show'";
	$run_sub_cat=mysql_query($select_sub_categories);
	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){
		
		$sub_cat_id=$fetch_sub_cat['id'];
		$sub_cat_name=$fetch_sub_cat['name'];
	?>
        <li><a href="view.php?sub_cat_id=<?php echo $sub_cat_id; ?>"><?php echo $sub_cat_name; ?> -</a></li>
        
        <?php } ?>
        
        </ul>

<?php } ?>

</div>

		<div class="veicals">
<?php 
	
		 
	$select="SELECT id,name FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name LIMIT 8,4";
	$run=mysql_query($select);
	while($fetch=mysql_fetch_array($run)){
		
		$name=$fetch['name'];
	    $id=$fetch['id'];
		
		$select_image="SELECT image FROM categories_image WHERE cat_id='".$id."' ";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		
		$image=$fetch_image['image'];
		
	?>

		<div class="car"><img src="ksdh348_@iy/media/logo_gallery/<?php echo $image; ?>" alt="<?php echo $name; ?>"  /></div>
        
        <div class="car_title"><h2><?php echo $name; ?></h2></div>
       <div class="clear"></div> 
        <ul>
        <?php
	$select_sub_categories="SELECT id,name FROM categories WHERE parent_off='".$id."' AND show_hide='Show'";
	$run_sub_cat=mysql_query($select_sub_categories);
	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){
		
		$sub_cat_id=$fetch_sub_cat['id'];
		$sub_cat_name=$fetch_sub_cat['name'];
	?>
    
        <li><a href="view-<?php echo $sub_cat_id; ?>-<?php echo $sub_cat_name;?>.html"><?php echo $sub_cat_name; ?> -</a></li>
        
        <?php } ?>
        
        </ul>

<?php } ?>

</div>
        

<div class="right_ad_home"><?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?><img src="ksdh348_@iy/media/large_gallery/<?php echo $adsen_right_image; ?>"> <?php } ?> </div>

</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
