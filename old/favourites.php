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
require_once('inc/header.php'); 

	
	
$user_id=$_REQUEST['uid'];	
	
	







?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<?php
include("inc/left_side.php");
?>
 <div id="contant_area" style="float:left;">

    
<div id="contant_area">
<?php



$tbl_name="favourite";

/* Get data. */
	  $sql = "SELECT *
FROM favourite WHERE user_id  ='".$user_id."'";

$result = mysql_query($sql);
	
	$num_rows_views=mysql_num_rows($result);
	

 if($num_rows_views >0){
		while($row = mysql_fetch_array($result))
		{
			
			$post_id=$row['postcode_loaction_id'];
			
			
			 $sql2 = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.id = '".$post_id."'";

$result2=mysql_query($sql2);
		
$row2=mysql_fetch_array($result2);		


 $published_date=$row2['date'];
			 $town=$row2['town'];
			
			
			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);
			
			
			$select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
			 
			//End Image//
			
			
			$title=$row2['title'];
			$description=$row2['description'];
			
			//End Title Description//
			
			$feature_name=$row2['name'];
				$feature_price=$row2['item_price'];
				$ad_price_days=$row2['days'];
  


		
		
				
				
				
			//End//
			
			
			?>


<section class="listing-box">
<div class="list-image"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><img src="uploads/<?php echo $image_name; ?>" width="121" height="84" alt="" /></a></div>
<div class="list-detail">
<div class="list-hd"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><?php echo $title; ?></a></div>
<div class="list-cnt"><?php echo substr($description, 0, 70)."....."; ?></div>
<div class="list-loc"><?php echo $town; ?></div>
</div>
<?php if($feature_name!="Free Ad"){ ?><div class="list-feature"> <?php echo $feature_name;   ?></div><?php } ?>
<div class="list-star"></div>
<div class="list-pricing"><?php echo "&pound;". $feature_price."&nbsp;"; ?>

<span><?php echo $daysago." "."days ago"; ?></span></div>

</section>

<?php } } else{ ?><?php echo "Sorry no result found"; } ?>
<div id="demo3">                   
                </div>
</div>    
    

</div>





</section>

<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>

</body>
</html>