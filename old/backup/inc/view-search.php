<div id="contant_area">
<?php



$tbl_name="postcode_location";

 $sql_search_view = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'";	

$result_search_view = mysql_query($sql_search_view);
	
	$num_rows_views=mysql_num_rows($result_search_view);
	
	if($num_rows_views >0){
		while($row_search_view = mysql_fetch_array($result_search_view))
		{
			
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
<div class="list-pricing"><?php echo "&pound;". $feature_price; ?>

<span><?php echo $daysago." "."days ago"; ?></span></div>

</section>

<?php } } else{ ?><?php echo "Sorry no result found"; } ?>
<div id="demo3">                   
                </div>
<div class="right_ad"><?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?><img src="ksdh348_@iy/media/large_gallery/<?php echo $adsen_right_image; ?>"> <?php } ?></div>
</div>