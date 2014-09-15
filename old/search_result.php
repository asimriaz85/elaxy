<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">


</head>

<body>
<?php require_once('inc/header.php'); 

$name_keyword=$_REQUEST['name'];
	$parent_categories=$_REQUEST['parent_categories'];
	$region=$_REQUEST['region'];
	$cdate=date('Y-m-d');
	
	$tbl_name="postcode_location";
	
	
	/* Get data. */
	if(empty($name_keyword)&&!empty($parent_categories)  && empty($region)){
	 $sql = "SELECT * FROM $tbl_name WHERE status=1 AND main_cat_id='$parent_categories' LIMIT $start, $limit";	
	}
	
	if(empty($name_keyword)&&!empty($parent_categories)  && empty($region)){
	 $sql = "SELECT * FROM $tbl_name WHERE status=1 AND main_cat_id='$parent_categories' LIMIT $start, $limit";
	}
	
	if(empty($name_keyword)&&!empty($parent_categories)  && !empty($region)){
	 $sql = "SELECT * FROM $tbl_name WHERE status=1 AND main_cat_id='$parent_categories' AND town='$region' LIMIT $start, $limit";
	}
	
	
	
	if(!empty($name_keyword)&& empty($parent_categories) && empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	
	
	if(!empty($name_keyword)&&!empty($parent_categories) && empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE postcode_location.main_cat_id ='".$parent_categories."'
AND postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	
	
	if(!empty($name_keyword)&&!empty($parent_categories) && empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE postcode_location.main_cat_id ='".$parent_categories."'AND postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	if(!empty($name_keyword)&&!empty($parent_categories) && !empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE postcode_location.main_cat_id ='".$parent_categories."' AND postcode_location.town ='".$region."'
AND postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	$result = mysql_query($sql);
	
	$search_rows_count=mysql_num_rows($result);

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
<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000;">
               
    <div id="contant_area">
    <?php 
	
	if($search_rows_count >0){
		while($row = mysql_fetch_array($result))
		{
			
			$post_id=$row['id'];
			
			$published_date=$row['date'];
			$town=$row['town'];
			
			
			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);
			
			//SelectImage//
			$select_image="SELECT file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'";
			$run_image=mysql_query($select_image);
			$image_num_rows=mysql_num_rows($run_image);
			
			$fetch_image=mysql_fetch_array($run_image);
			
			 $image_name=$fetch_image['file_name'];
			//End Image//
			
			//Title Description//
			
			
			
			$select_title_description="SELECT title,description FROM ad_title_description WHERE postcode_loaction_id='".$post_id."'";
			$run_select_title=mysql_query($select_title_description);
			$fetch_select_title=mysql_fetch_array($run_select_title);
			$title=$fetch_select_title['title'];
			$description=$fetch_select_title['description'];
			
			//End Title Description//
			
			
			//Ad Price Feature//
			 $select_ad_price="SELECT id,name,price,days FROM ad_price WHERE postcode_loaction_id='".$post_id."'";
			$run_ad_price=mysql_query($select_ad_price);
			
			$num_rows=mysql_num_rows($run_ad_price);
		
		if($num_rows >0){
			
			while($fetch_ad_price=mysql_fetch_array($run_ad_price)){
				$f_id=$fetch_ad_price['id'];
				 $feature_name=$fetch_ad_price['name'];
				$feature_price=$fetch_ad_price['price'];
				$ad_price_days=$fetch_ad_price['days'];
	?>
    
    
      <section class="listing-box">
  <div class="list-image"><?php if($image_num_rows > 0){ ?><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><img src="uploads/<?php echo $image_name; ?>" width="121" height="84" alt="" /></a><?php } else { ?> <a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><img src="images/noimage_thumbnail.png"></a><?php } ?></div>
<div class="list-detail">
<div class="list-hd"><?php echo $title; ?></div>
<div class="list-cnt"><?php echo substr($description, 0, 70)."....."; ?></div>
<div class="list-loc"><?php echo $town; ?></div>
</div>
<?php if($feature_name!="Free Ad"){ ?><div class="list-feature"> <?php echo $feature_name;   ?></div><?php } ?>
<div class="list-star"></div>
<div class="list-pricing"><?php echo "&pound; ". $feature_price; ?>

<span><?php echo $daysago." "."days ago"; ?></span></div>

</section>

<?php  } 
	 }
	 
	 
		}
	}else { echo "Sorry no result match"; }
	 
	 ?>
    </div>     
    </div>

</div>





</section>

<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>