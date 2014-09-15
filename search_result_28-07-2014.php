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
	
	if(!empty($name_keyword)){
				$name_keyword_statement="AND postcode_location.name_keywords='".$name_keyword."'";
				
			}
			
			if(!empty($region)){
				$region_statement="AND postcode_location.region='".$region."'";
				
			}
			
			if(!empty($parent_categories)){
				$parent_categories_statement="AND postcode_location.main_cat_id='".$parent_categories."'";
				
			}
	
	$tbl_name="postcode_location";
	
	
	

?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<?php
include("inc/left_side3.php");
?>


<div id="contant_area" style="float:left;">
<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000;">
               
    <div id="contant_area">
<?php



$tbl_name="postcode_location";

$adjacents = 3;





  $sql_search_view = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
$name_keyword_statement $parent_categories_statement $region_statement";	

$result_search_view = mysql_query($sql_search_view);
	
	$num_rows_views=mysql_num_rows($result_search_view);
	
	
	if($num_rows_views >0){
		while($row_search_view = mysql_fetch_array($result_search_view))
		{
			$user_id=$row_search_view['user_id'];
			 $post_id=$row_search_view['postcode_loaction_id'];
			
			$published_date=$row_search_view['date'];
			$town=$row_search_view['town'];
			
			
			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);
			
			 $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
			//End Image//
			
			
			$title=$row_search_view['title'];
			$description=$row_search_view['description'];
			
			//End Title Description//
			
			$feature_name=$row_search_view['name'];
				$feature_price=$row_search_view['item_price'];
				$ad_price_days=$row_search_view['days'];
				$ad_main_cat=$row_search_view['main_cat_id'];
				
				
				$email="SELECT email,phone FROM registration WHERE id='".$user_id."'";
				$run_email=mysql_query($email);
				$fetch_email=mysql_fetch_array($run_email);
				$email_id=$fetch_email['email'];
				$phone=$fetch_email['phone'];
?>
<section class="listing-box">
<div class="list-image"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature_name;?>"><img src="uploads/<?php echo $image_name; ?>" width="121" height="84" alt="" /></a></div>
<div class="list-detail">
<div class="list-hd"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature_name;?>"><?php echo $title; ?></a></div>
<div class="list-cnt"><?php echo substr($description, 0, 70)."....."; ?></div>
<div class="list-loc"><?php echo $town; ?></div>
</div>
<?php if($feature_name!="Free Ad"){ ?><div class="list-feature"> <?php echo $feature_name;   ?></div><?php } ?>
<div class="list-star"></div>
<div class="list-pricing">
 <?php if($ad_main_cat == 3) { ?>
                   
                    <?php } else if ($ad_main_cat == 4){ ?>
                    
                    <?php } else if ($ad_main_cat == 5){ ?>
                    
                    <?php } else if ($ad_main_cat == 8){ ?>
                   
                    
                    <?php } else { ?>
                    <?php echo "&pound;". $feature_price; ?>
                    <?php } ?>




<span><?php echo $daysago." "."days ago"; ?></span></div>
<span><?php //echo $phone; ?></span>
</section>

<?php }  
 }  else{ ?><?php echo "Sorry no result found"; } ?>
 <br /><br />
 <div style="margin-top:80px; margin-left:210px;"><?php //echo $pagination; ?></div>
<div id="demo3">
                   
                </div>
<div class="right_ad"><?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?><img src="ksdh348_@iy/media/large_gallery/<?php echo $adsen_right_image; ?>"> <?php } ?></div>
</div>     
    </div>

</div>





</section>

<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>