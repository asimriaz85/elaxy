
<?php 

include("include/header.php");


	/*echo '<pre>';
	print_r($_REQUEST);
	echo '</pre>';*/
	
	
	
	
	$name_keyword=$_REQUEST['name'];
	$parent_categories=$_REQUEST['parent_categories'];
	$subcat=$_REQUEST['subcat'];
	$region=$_REQUEST['region'];
	$cdate=date('Y-m-d');
	
?>  
        <div id="wrapper">
    <!--Adds Div-->
    <?php include("include/limelight_ad.php"); ?>
		<!--End Add divs-->
        
</div>


			
    
<div id="wrapper2">
    <div id="view_main_div">
    <!--Left Side-->
    <?php 
	include("include/left_side.php");
	
	?>
    
    <!--End Left Side-->
    <div id="view_middle_div">
    <div id="sponsered_div">
    <span>Sponsored Link</span> 
    </div>
    <div id="sponsered_link">
    <div id="sponsered_link_image"><img src="images/noimage_thumbnail.png" /></div>
    <div id="sponsered_link_link">
    <div>Subaru Dealers</div>
    <div>www.abc.com.uk</div>
    <div>Mega van, electric cushman vehicles</div>
    </div>
    <div class="clear_both2"></div>
</div>

<div id="sponsered_link">
    <div id="sponsered_link_image"><img src="images/noimage_thumbnail.png" /></div>
    <div id="sponsered_link_link">
    <div>Subaru Dealers</div>
    <div>www.abc.com.uk</div>
    <div>Mega van, electric cushman vehicles</div>
    </div>
    <div class="clear_both2"></div>
</div>

<div id="sponsered_link">
    <div id="sponsered_link_image"><img src="images/noimage_thumbnail.png" /></div>
    <div id="sponsered_link_link">
    <div>Subaru Dealers</div>
    <div>www.abc.com.uk</div>
    <div>Mega van, electric cushman vehicles</div>
    </div>
    <div class="clear_both2"></div>
</div>

<div id="sponsered_link">
    <div id="sponsered_link_image"><img src="images/noimage_thumbnail.png" /></div>
    <div id="sponsered_link_link">
    <div>Subaru Dealers</div>
    <div>www.abc.com.uk</div>
    <div>Mega van, electric cushman vehicles</div>
    </div>
    <div class="clear_both2"></div>
</div>
    <!--Ad start from db-->
    
    
    <?php
	

	$tbl_name="postcode_location";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	 $query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "search-result.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	if(empty($name_keyword)&&!empty($parent_categories) && empty($subcat) && empty($region)){
	 $sql = "SELECT * FROM $tbl_name WHERE status=1 AND main_cat_id='$parent_categories' LIMIT $start, $limit";	
	}
	
	if(empty($name_keyword)&&!empty($parent_categories) && !empty($subcat) && empty($region)){
	 $sql = "SELECT * FROM $tbl_name WHERE status=1 AND main_cat_id='$parent_categories' AND sub_cat_id='$subcat' LIMIT $start, $limit";
	}
	
	if(empty($name_keyword)&&!empty($parent_categories) && !empty($subcat) && !empty($region)){
	 $sql = "SELECT * FROM $tbl_name WHERE status=1 AND main_cat_id='$parent_categories' AND sub_cat_id='$subcat' AND town='$region' LIMIT $start, $limit";
	}
	
	
	
	if(!empty($name_keyword)&& empty($parent_categories) && empty($subcat) && empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	
	
	if(!empty($name_keyword)&&!empty($parent_categories) && empty($subcat) && empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE postcode_location.main_cat_id ='".$parent_categories."'
AND postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	
	
	if(!empty($name_keyword)&&!empty($parent_categories) && !empty($subcat) && empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE postcode_location.main_cat_id ='".$parent_categories."' AND postcode_location.sub_cat_id ='".$subcat."'
AND postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	if(!empty($name_keyword)&&!empty($parent_categories) && !empty($subcat) && !empty($region)){
		
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE postcode_location.main_cat_id ='".$parent_categories."' AND postcode_location.sub_cat_id ='".$subcat."' AND postcode_location.town ='".$region."'
AND postcode_location.status ='1'
AND ad_title_description.title = '".$name_keyword."' LIMIT $start, $limit";	
	}
	
	
	
	 
	$result = mysql_query($sql);
	
	$search_rows_count=mysql_num_rows($result);
	
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
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
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
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
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
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}

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
		
		



  


		
		
				
				
				
			//End//
			
			
			
			?>
    
    <div id="ad_bg_div">
    
    <div class="clear_both2"></div>
    <div id="ad_main_div">
    <div class="clear_both2"></div>
    <div id="ad_img_div"><?php if($image_num_rows > 0){ ?><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><img src="uploads/<?php echo $image_name; ?>" width="100" height="75" /></a><?php } else { ?> <a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><img src="images/noimage_thumbnail.png"></a><?php } ?></div>
    <div id="ad_title_div">
    
    <div><?php echo $title; ?></div>
    <div><?php echo substr($description, 0, 50)."....."; ?></div>
    <div><?php echo $town; ?></div>
    
    </div>
    <div id="ad_feature"><?php echo $feature_name; ?></div>
    <div id="ad_price">&pound;<?php echo $feature_price; ?><br /><?php echo $daysago." "."days ago"; ?></div>
    <div style="clear:both;"></div>
</div>
    
    </div>
    
    <?php  } 
	
	
	
	 }  
	 
	 if($num_rows ==0){
		 ?>
         <div id="ad_bg_div">
    
    <div class="clear_both2"></div>
    <div id="ad_main_div">
    <div class="clear_both2"></div>
    <div id="ad_img_div"><?php if($image_num_rows > 0){ ?><a href="view-detail.php?post_id=<?php echo $post_id; ?>"><img src="uploads/<?php echo $image_name; ?>" width="100" height="75" /></a><?php } else { ?> <a href="view-detail.php?post_id=<?php echo $post_id; ?>"><img src="images/noimage_thumbnail.png"></a><?php } ?></div>
    <div id="ad_title_div">
    
    <div><?php echo $title; ?></div>
    <div><?php echo substr($description, 0, 50)."....."; ?></div>
    <div><?php echo $town; ?></div>
    
    </div>
    <div id="ad_feature">Free</div>
    <div id="ad_price">&pound;Price<br /><?php echo $daysago." "."days ago" ?></div>
    <div style="clear:both;"></div>
</div>
    
    </div>
         <?php
		 
	 }
	
	
	
	
	
	
	} } else { echo "Sorry no result match"; }?>
    
    <!--Ad End From db-->
   <div style="margin-left:200px;"> <?php echo $pagination;?></div>
    
    </div>
    <div id="right_side_red_top_main"><div id="right_side_red_top">
    
    
    </div>
    
    <div id="right_side_blue_ad"></div>
    
    
    </div>
    <div style="clear:both;"></div>
</div>

    </div>
    
  
    <?php 
	include("include/footer.php");
	?>

</body>
</html>