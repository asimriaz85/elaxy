
<?php 

include("include/header.php");


	 $sub_cat_id=$_REQUEST['sub_cat_id'];
	  $left_sub_cat1_id=$_REQUEST['sub_cat1_id'];
	
	$select_cat_name="SELECT id,name FROM categories WHERE id='".$sub_cat_id."'";
	$run_cat_name=mysql_query($select_cat_name);
	$fetch_cat_name=mysql_fetch_array($run_cat_name);
	$category_name=$fetch_cat_name['name'];
	
	
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
    
    <!--Search Start-->
    <div class="clear_both2"></div>
    
    
    <!--END-->
    <div class="clear_both2"></div>
    
        <?php include("include/sponsored_links.php"); ?>




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
	$targetpage = "left_search2.php"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	  $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND postcode_location.sub_sub_cat='".$left_sub_cat1_id."' LIMIT $start, $limit";	
	
	
	
	/*echo $sql = "SELECT id,user_id,date,status,town FROM $tbl_name WHERE status=1 AND sub_cat_id='".$sub_cat_id."' LIMIT $start, $limit";*/
	$result = mysql_query($sql);
	
	$num_rows_views=mysql_num_rows($result);
	
	
	
	
	
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
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
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
		while($row = mysql_fetch_array($result))
		{
			
			 $post_id=$row['postcode_loaction_id'];
			
			$published_date=$row['date'];
			$town=$row['town'];
			
			
			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);
			
			 $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
			//End Image//
			
			
			$title=$row['title'];
			$description=$row['description'];
			
			//End Title Description//
			
			$feature_name=$row['name'];
				$feature_price=$row['item_price'];
				$ad_price_days=$row['days'];
		
		



  


		
		
				
				
				
			//End//
			
			
			
			?>
    
    <div id="ad_bg_div">
    
    <div class="clear_both2"></div>
    <div id="ad_main_div">
    <div class="clear_both2"></div>
    <div id="ad_img_div"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature_name;?>"><img src="uploads/<?php echo $image_name; ?>" width="100" height="75" /></a></div>
    <div id="ad_title_div">
    
    <div><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature_name;?>"><?php echo $title; ?></a></div>
    <div><?php echo substr($description, 0, 50)."....."; ?></div>
    <div><?php echo $town; ?></div>
    
    </div>
    <div id="ad_feature"><?php /*if(empty($feature_name)){ echo $feature_name= "Free Ad"; } if(!empty($feature_name)){ echo $feature_name=$feature_name; }*/  echo $feature_name;?></div>
    <div id="ad_price">&pound;<?php echo $feature_price; ?><br /><?php echo $daysago." "."days ago"; ?>
    
    
    
    
    
    &nbsp;&nbsp;</div>
    
    <div style="clear:both;"></div>
    
    
</div>
    
    </div>
    
    <?php  
	
	
	
	 
	 
	 
	
	
	
	
	
	
	} } else{ echo "Sorry no result found"; }?>
    
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