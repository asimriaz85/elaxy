
<?php 

include("include/header.php");


/*$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo $url;*/


//include("include/login-security.php");





			
				  $post_id=$_REQUEST['post_id'];
				$f_id=$_REQUEST['f_id'];
				
				 $select_user_id="SELECT user_id FROM postcode_location WHERE id='".$post_id."'";
				$run_user=mysql_query($select_user_id);
				$fetch_user=mysql_fetch_array($run_user);
				   $s_user=$fetch_user['user_id'];
				 
				 $select_post_email="SELECT id,email FROM  registration WHERE id='".$s_user."'";
				 $run_post_email=mysql_query($select_post_email);
				 $fetch_post_email=mysql_fetch_array($run_post_email);
				 
				    $post_email=$fetch_post_email['email'];




$your_name=$_REQUEST['your_name'];
	$your_email=$_REQUEST['your_email'];
	$message=$_REQUEST['message'];


?>  
        <div id="wrapper">
    <!--Adds Div-->
    <div id="green_div">
                             <div id="green_first"></div>
                              
                           <div id="green_other"></div>
                           
                            <div id="green_other"></div>
                            
                           <div id="green_other"></div>
                           
                            <div id="green_other"></div>
                            
                           <div id="green_other"></div>
                           
                           <div id="green_other"></div>
                           
                           <div id="green_other"></div>
                           
                           
                             <div class="placeadd_here"><a href="#">Place your add here..Click here</a></div>
		</div>
		<!--End Add divs-->
        
        
        
<div id="manage_bg">
                            
                            
<div class="clear_both"></div>
	
            <div id="manage_add_div">
           

            
            
            <div class="clear_both"></div>
            
                
                		
            <form method="post" action="config/reply-ad.php" class="Active">
            
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <input type="hidden" name="f_id" value="<?php echo $f_id ?>">
            
            <input type="hidden" name="s_user" value="<?php echo $s_user; ?>">
            
            <input type="hidden" name="post_email" value="<?php echo $post_email; ?>">
            
            
            
            <div id="reset_password_div">
    <div id="status_select">Your message:</div>
    <div id="status_update_btn">
      <label for="textarea"></label>
      <textarea name="message" id="ValidField" cols="45" rows="5"><?php echo $message; ?></textarea>
    </div>
    
    <div class="clear_both11"></div>
</div>
            <hr class="hr_dot_manage" />
            
            <div class="clear_both2"></div>
            
                      <div id="reset_password_div">
    <div id="status_select">Your Name:</div>
    <div id="status_update_btn"><input type="text" name="your_name" id="ValidField2" value="<?php echo $your_name; ?>" /></div>
    
    <div class="clear_both11"></div>
</div>
            <hr class="hr_dot_manage" />
            <div class="clear_both2"></div>
                      <div id="reset_password_div">
    <div id="status_select">Your Email:</div>
    <div id="status_update_btn"><input type="text" name="your_email" id="ValidField3" value="<?php echo $your_email ?>" /></div>
    
    <div class="clear_both11"></div>
</div>
            <hr class="hr_dot_manage" />
            <div class="clear_both2"></div>
            
             <div class="clear_both2"></div>
             <div id="margin_left"><input type="submit" name="submit" value="Submit"></div>
            
            </form>
             <div class="clear_both2"></div>
            </div>
                            	
                                	<div class="clear_both"></div>
                                    
                            </div>



        
</div>


			
    
<div id="wrapper2">
    <div id="view_main_div">
    <!--Left Side-->
    <?php 
	include("include/left_side.php");
	
	?>
    
    <!--End Left Side-->
    <div id="view_middle_div">
    
    






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
	$targetpage = "view.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT id,user_id,date,status,town FROM $tbl_name WHERE status=1 LIMIT $start, $limit";
	$result = mysql_query($sql);
	
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
			 $select_ad_price="SELECT name,price,days FROM ad_price WHERE postcode_loaction_id='".$post_id."'";
			$run_ad_price=mysql_query($select_ad_price);
			
			$num_rows=mysql_num_rows($run_ad_price);
		
		if($num_rows >0){
			
			while($fetch_ad_price=mysql_fetch_array($run_ad_price)){
				
				 $feature_name=$fetch_ad_price['name'];
				$feature_price=$fetch_ad_price['price'];
				$ad_price_days=$fetch_ad_price['days'];
		
		



  


		
		
				
				
				
			//End//
			
			
			
			?>
    
    <div id="ad_bg_div">
    
    <div class="clear_both2"></div>
    <div id="ad_main_div">
    <div class="clear_both2"></div>
    <div id="ad_img_div"><?php if($image_num_rows > 0){ ?><img src="uploads/<?php echo $image_name; ?>" width="100" height="75" /><?php } else { ?> <img src="images/noimage_thumbnail.png"> <?php } ?></div>
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
    <div id="ad_img_div"><?php if($image_num_rows > 0){ ?><img src="uploads/<?php echo $image_name; ?>" width="100" height="75" /><?php } else { ?> <img src="images/noimage_thumbnail.png"> <?php } ?></div>
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
	
	
	
	
	
	
	}?>
    
    <!--Ad End From db-->
   <div style="margin-left:200px;"> <?php echo $pagination;?></div>
    
    </div>
    <div id="right_side_red_top_main"><div id="right_side_blue_ad2"></div>
    
    <div id="right_side_blue_ad2"></div>
    
    
    </div>
    <div style="clear:both;"></div>
</div>

    </div>
    
  
    <?php 
	include("include/footer.php");
	?>

</body>
</html>