<section class="top-ads">
<section class="ads-120">
<ul>

	<?php 
$select_limelight_ad="SELECT *
FROM postcode_location
inner join ad_price on ad_price.postcode_loaction_id = postcode_location.id

WHERE postcode_location.status = 1 AND ad_price.name='spotlight' 
ORDER BY date LIMIT 8";
$run_limelight=mysql_query($select_limelight_ad);

while($fetch_limelight=mysql_fetch_array($run_limelight)){

  $ad_price_id=$fetch_limelight['id'];
$publish_date=$fetch_limelight['date'];
$ad_price_days=$fetch_limelight['days'];

$end_date=  date('Y-m-d', strtotime($publish_date. ' +'. $ad_price_days. 'day'));
		
		$cdate=date('Y-m-d');
		
		  $select_post_id="SELECT id,postcode_loaction_id FROM ad_price WHERE id='".$ad_price_id."'";
		$run_postcode_id=mysql_query($select_post_id);
		$fetch_postcode_id=mysql_fetch_array($run_postcode_id);
		  $postcode_id=$fetch_postcode_id['postcode_loaction_id'];
		
		 $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$postcode_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
			 
			 $title_name="SELECT title FROM ad_title_description WHERE postcode_loaction_id='".$postcode_id."'";
			 $run_title_name=mysql_query($title_name);
			 $fetch_title_name=mysql_fetch_array($run_title_name);
			 $title_ad_name=$fetch_title_name['title'];
		
		
	if($end_date >= $cdate){
	

?>


<li><img src="uploads/<?php echo $image_name; ?>" width="120" height="120" alt="ad-box" title="<?php echo $title_ad_name; ?>" class="masterTooltip" /></li>

 <?php } } ?>

</ul>


</section>

<div class="clear"></div>
<!--<section class="post-ad"><span>Place your ads here</span><a href="#"><img src="images/click-here.png" width="120" height="33"  alt="Click Here" /></a></section>-->

</section>