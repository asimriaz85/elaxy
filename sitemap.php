<!DOCTYPE html>

<html>

<head>

<?php require_once('inc/meta.php'); ?>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">

 <script src="js/1.9.1-jquery.min.js"></script>

 



</head>



<body>

<?php 

require_once('inc/header.php'); ?>





<section class="main-wrapper">

<?php require_once('inc/top_ads.php'); ?>







<div class="clear"></div>





<?php require_once('inc/search_bar.php'); ?>





<div class="clear"></div>



<?php

include("inc/left_side_sitemap.php");

?>

 <div id="contant_area" style="float:left;">

<div id="contant_area_home">

<?php if(isset($_SESSION['msg'])){ ?> <div style="font-size:14px; color:#F00; font-weight:bold; text-align:center; margin-top:10px; margin-bottom:10px;"><?php echo $_SESSION['msg'];?> </div><?php } ?>

<div style="float:left;" class="veicals">

        <?php 



	

		 

	 $select="SELECT id,name FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name LIMIT 0,5";

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

	 $select_sub_categories="SELECT id,name FROM categories WHERE parent_off='".$id."' AND show_hide='Show'";

	$run_sub_cat=mysql_query($select_sub_categories);

	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){

		

		$sub_cat_id=$fetch_sub_cat['id'];

		$sub_cat_name=$fetch_sub_cat['name'];

	?>

        <li><a href="view.php?sub_cat_id=<?php echo $sub_cat_id; ?>&sub_cat_name=<?php echo $sub_cat_name;?>"><?php echo $sub_cat_name; ?></a></li>

        

        <?php } ?>

        

        </ul>





        

        

        

        

<?php } ?>

        

        </div>

        

        <div style="float:left;" class="veicals">

        <?php 



	

		 

	 $select="SELECT id,name FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name LIMIT 5,2";

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

	$select_sub_categories="SELECT id,name FROM categories WHERE parent_off='".$id."' AND show_hide='Show'";

	$run_sub_cat=mysql_query($select_sub_categories);

	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){

		

		$sub_cat_id=$fetch_sub_cat['id'];

		$sub_cat_name=$fetch_sub_cat['name'];

	?>

        <li><a href="view.php?sub_cat_id=<?php echo $sub_cat_id; ?>&sub_cat_name=<?php echo $sub_cat_name;?>"><?php echo $sub_cat_name; ?></a></li>

        

        <?php } ?>

        

        </ul>





        

        

        

        

<?php } ?>

        

        </div>

        

        <div style="float:left;" class="veicals">

        <?php 



	

		 

	 $select="SELECT id,name FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name LIMIT 7,5";

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

	$select_sub_categories="SELECT id,name FROM categories WHERE parent_off='".$id."' AND show_hide='Show'";

	$run_sub_cat=mysql_query($select_sub_categories);

	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){

		

		$sub_cat_id=$fetch_sub_cat['id'];

		$sub_cat_name=$fetch_sub_cat['name'];

	?>

        <li><a href="view.php?sub_cat_id=<?php echo $sub_cat_id; ?>&sub_cat_name=<?php echo $sub_cat_name;?>"><?php echo $sub_cat_name; ?></a></li>

        

        <?php } ?>

        

        </ul>





        

        

        

        

<?php } ?>

        

        </div>

<div class="right_ad_home"><?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?><img src="admin_xel/media/large_gallery/<?php echo $adsen_right_image; ?>"> <?php } ?> </div>



</div>    

    

    



</div>











</section>



<div class="clear"></div>



<?php require_once('inc/footer.php'); ?>



</body>

</html>