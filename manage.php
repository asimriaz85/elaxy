
<?php

include("include/header.php");

include("include/login-security.php");
	
?>
<script src="ksdh348_@iy/js/checkall.js"></script>

<div id="wrapper">
<div><h1>My Elaxy</h1></div>

<div class="cleasr_both2"></div>
<?php
if(isset($_SESSION['reset_msg'])){
		
		?>
                
                
                <div id="active_account">
        
                    <div id="manage_password_main">
    <div id="manage_password_div1"><img src="images/green-round-tick.png" /></div>
    <div id="manage_password_div1"><h2>Success</h2></div>
   <div class="clear_both"></div>
</div>
 <div><?php echo $_SESSION['reset_msg']; ?></div>
                </div>
                <?php } 
				
				if(isset($_SESSION['login_email_id'])){
				
				?>
                
                		
                        
                        	<div id="manage_bg">
                            
                            <?php include("include/manage_main_menu.php"); ?>
            <div id="manage_add_div">
            <!--Menu Details-->
    <?php include("include/manage_menu.php"); ?>
    <!--End-->

            
            
            <div class="clear_both11"></div>
            
                
                		
            <form method="post" action="" name="myform">
            
             <input type="hidden" name="action" value="multidel">
            <table width="100%" border="0" cellspacing="2" cellpadding="2">
            
  <tr>
    <td><input type="checkbox" name="checkall" /></td>
    <td>Picture</td>
    <td>Title</td>
    <td>Date Published</td>
    <td>Status</td>
    <td>Type</td>
    <td>Last Date</td>
    <td>Views</td>
    <td>Replies</td>
    <td>Option</td>
  </tr>
  
<?php
	

	$tbl_name="postcode_location";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	 $query = "SELECT COUNT(*) as num FROM $tbl_name WHERE user_id=$user_id";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "manage.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id AND postcode_location.user_id='".$user_id."'  LIMIT $start, $limit";	

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
?>

	<?php
		while($row = mysql_fetch_array($result))
		{
			
			    $add_id=$row['id'];
			   
			  
			   
  $publish_date=$row['date'];
  
  $status=$row['status'];
	
	
		
		




$title=$row['title'];
$description=$row['description'];

	
		
		
		 $ad_price_name=$row['name'];
		 $ad_price_days=$row['days'];
		
		$end_date=  date('Y-m-d', strtotime($publish_date. ' +'. $ad_price_days. 'day'));
		
		$cdate=date('Y-m-d');
		
		 $select_post_id="SELECT id,postcode_loaction_id FROM ad_price WHERE id='".$add_id."'";
		$run_postcode_id=mysql_query($select_post_id);
		$fetch_postcode_id=mysql_fetch_array($run_postcode_id);
		  $postcode_id=$fetch_postcode_id['postcode_loaction_id'];
		
		 $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$postcode_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
		
		

?>
<tr>
    <td><input type="checkbox" /></td>
    <td><img src="uploads/<?php echo $image_name; ?>" width="75" height="75" /></td>
    <td><?php echo $title; ?></td>
    <td><?php echo $publish_date; ?></td>
    <td><?php if($status==1){ echo "Active"; } if($status==0){ echo "Inactive"; } ?></td>
    <td><?php echo $ad_price_name; ?></td>
    <td><?php echo $end_date; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><a href="update-ads.php?id=<?php echo $add_id; ?>">Update</a>&nbsp;|&nbsp;<a href="config/delete-ads.php?id=<?php echo $id2; ?>&page_name=<?php echo $page_name; ?>">Delete</a>&nbsp;|&nbsp;Improve</td>
  </tr>

<?php
		 }
	
	
	
	
	?>
    
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><?php echo $pagination;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    
    

 
</table>
            
            </form>
            
           
            
             <div class="clear_both2"></div>
            </div>
                            	
                                	<div class="clear_both"></div>
                                    
                            </div>
                
                <?php } 
				
				else{
					$error="Please Login Here";
	 
	 session_start();
			$_SESSION['error']=$error;
header("location:login.php");
				}
				?>
                
                
                </div>




</body>
</html>