<div id="contant_area">
<?php



$tbl_name="postcode_location";

$adjacents = 3;

$sql_search_view1 = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'";
$total_pages = mysql_query($sql_search_view1);
$total_num_rows=mysql_num_rows($total_pages);
 $total_pages = $total_num_rows;

/* Setup vars for query. */
$targetpage = $page_name;     //your file name  (the name of this file)
$limit = 10;                                 //how many items to show per page
$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;	                              //if no page var is given, set start to 0

/* Get data. */



 $sql_search_view = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' LIMIT $start, $limit";	

$result_search_view = mysql_query($sql_search_view);
	
	$num_rows_views=mysql_num_rows($result_search_view);
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev&sub_cat_id=$sub_cat_id\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter&sub_cat_id=$sub_cat_id\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&sub_cat_id=$sub_cat_id\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&sub_cat_id=$sub_cat_id\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&sub_cat_id=$sub_cat_id\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1&sub_cat_id=$sub_cat_id\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&sub_cat_id=$sub_cat_id\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&sub_cat_id=$sub_cat_id\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1&sub_cat_id=$sub_cat_id\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage&sub_cat_id=$sub_cat_id\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1&sub_cat_id=$sub_cat_id\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2&sub_cat_id=$sub_cat_id\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter&sub_cat_id=$sub_cat_id\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next&sub_cat_id=$sub_cat_id\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}
	
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

<?php }  
 }  else{ ?><?php echo "Sorry no result found"; } ?>
 <br /><br />
 <div style="margin-top:80px; margin-left:210px;"><?php echo $pagination; ?></div>
<div id="demo3">
                   
                </div>
<div class="right_ad"><?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?><img src="ksdh348_@iy/media/large_gallery/<?php echo $adsen_right_image; ?>"> <?php } ?></div>
</div>