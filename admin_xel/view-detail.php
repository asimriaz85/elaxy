
<?php 

include("include/header.php");
?>


<link href="prettyPhoto/styles/prettyPhoto.css" rel="stylesheet"  type="text/css" media="screen" title="prettyPhoto main stylesheet" />

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<!--<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
--><script type="text/javascript" src="prettyPhoto/js/fade.js"></script>
<script type="text/javascript" src="prettyPhoto/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="prettyPhoto/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="prettyPhoto/js/quicksand.js"></script>
<script type="text/javascript" src="prettyPhoto/js/quicksand_config.js"></script>
<script type="text/javascript" src="prettyPhoto/js/jquery.twitter.js"></script>
<script type="text/javascript" src="prettyPhoto/js/hoverIntent.js"></script>
<script type="text/javascript" src="prettyPhoto/js/superfish.js"></script>
<script type="text/javascript" src="prettyPhoto/js/supersubs.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	//Menu
	jQuery("ul.sf-menu").supersubs({ 
	minWidth		: 12,		// requires em unit.
	maxWidth		: 27,		// requires em unit.
	extraWidth		: 3	// extra width can ensure lines don't sometimes turn over due to slight browser differences in how they round-off values
						   // due to slight rounding differences and font-family 
	}).superfish();  // call supersubs first, then superfish, so that subs are 
					 // not display:none when measuring. Call before initialising 
					 // containing tabs for same reason. 
					 

	/* prettyPhoto */
	jQuery('a[data-rel]').each(function() {jQuery(this).attr('rel', jQuery(this).data('rel'));});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'facebook', gallery_markup:'' ,slideshow:2000});
});
</script>



<!--Ajax Form Post-->
<script type="text/javascript" src="contact-message/js/jquery.validate.js"></script> 
		 <script type="text/javascript" src="contact-message/js/jquery.form.js"></script> 

        <script type="text/javascript">
            $('document').ready(function(){

			$('#form').validate({
                    rules:{
                        "name":{
                            required:true,
                            maxlength:40
                        },

                        "email":{
                            required:true,
                            email:true,
                            maxlength:100
                        },

                        "message":{
                            required:true
                        }},

                    messages:{
                        "name":{
                            required:"This field is required"
                        },

                        "email":{
                            required:"This field is required",
                            email:"Please enter a valid email address"
                        },

                        "message":{
                            required:"This field is required"
                        }},

                    submitHandler: function(form){
                      $(form).ajaxSubmit({
        target: '#preview', 
        success: function() { 
        $('#formbox').slideUp('fast'); 
        } 
    }); 
			
                    }
                
            })
						
        });
        </script> 
<!--END-->




<?php
$cdate=date('Y-m-d');

	   $post_id=$_REQUEST['post_id'];
	  $f_id=$_REQUEST['f_id'];
	 
	  $sub_cat_id=$_REQUEST['sub_cat_id'];
	  $feature=$_REQUEST['feature']; 
	  
	 
	 $select_price="SELECT name,price,days,postcode_loaction_id FROM ad_price WHERE postcode_loaction_id='".$post_id."'";
	 $run_price=mysql_query($select_price);
	 $fetch_price=mysql_fetch_array($run_price);
	 $price=$fetch_price['price'];
	 $postcode_loaction_id=$fetch_price['postcode_loaction_id'];
	 $f_name=$fetch_price['name'];
	 
	 
	 
	 $ad_image="SELECT file_name FROM users_images WHERE postcode_loaction_id='".$postcode_loaction_id."'";
	 $run_ad_image=mysql_query($ad_image);
	 $fetch_ad_image=mysql_fetch_array($run_ad_image);
	 $ad_image1=$fetch_ad_image['file_name'];
	 
	 
	  $select_post="SELECT * FROM postcode_location WHERE id='".$postcode_loaction_id."'";
	 $run_post=mysql_query($select_post);
	 $fetch_post=mysql_fetch_array($run_post);
	 
	 $published_date1=$fetch_post['date'];
	 
	   $u_id=$fetch_post['user_id'];
	 
	 $town1=$fetch_post['town'];
	 $price=$fetch_post['item_price'];
	 
	 $daysago = (strtotime($cdate) - strtotime($published_date1)) / (60 * 60 * 24);
	 
	 $select_title="SELECT title,description FROM ad_title_description WHERE postcode_loaction_id='".$postcode_loaction_id."'";
	 $run_title=mysql_query($select_title);
	 $fetch_title=mysql_fetch_array($run_title);
	 $ad_title=$fetch_title['title'];
	 $ad_description=$fetch_title['description'];
	
	
	
?>  
        <div id="wrapper">
    <!--Adds Div-->
     <?php include("include/limelight_ad.php"); ?>
		<!--End Add divs-->
        
        
        <div id="view_main_div">
    <div id="detail_page_ad_title1"><?php echo $ad_title; ?></div>
    <div id="detail_page_ad_title_price"><?php echo "&pound; ".$price; ?></div>
    <div id="detail_page_ad_title_posted"><img src="images/Calendar.png" /><div><?php echo "Posted ".$daysago." "."days ago"; ?></div></div>
     <div id="detail_page_ad_title_user"><img src="images/User.png" /><div>Posted by</div></div>
     
       <div id="detail_page_ad_title_mail"><!--<a href="reply-ad.php?post_id=<?php //echo $post_id; ?>&f_id=<?php //echo $f_id; ?>"><img src="images/mail.png" /><div>Reply to this Ad</div></a>--></div>
        <?php 
       if(isset($_SESSION['login_email_id'])){
		   ?>
        <div id="detail_page_ad_title_favorites"><a href="config/getfavourite.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&uid=<?php echo $user_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>"><img src="images/Favorites.png" /><div>Favourite</div></a></div>
        
       
        <div id="detail_page_ad_title_report"><a href="report_message.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $u_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $user_id; ?>&?iframe=true&width=50%&height=50%" rel="prettyPhoto[iframes]">Report Ad</a></div>
        
        <?php } ?>
        
    <div style="clear:both;"></div>
</div>

<div id="detail_page_ad_title_location"><?php echo $town1; ?></div>

<div class="clear_both"></div>

<div id="ad_description_main">
    <div id="ad_description">
	<div><?php echo $ad_description; ?></div>
    <div>
            
            
            <?php 
			 $select_image="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$postcode_loaction_id."'";
			$run_image1=mysql_query($select_image);
			
			
			
				?>
                
                
                <table width="158" border="0" cellspacing="5" cellpadding="2">
                        <tr>
                          <?php
		
		   
		   
            while($fetch_image=mysql_fetch_array($run_image1)){
				$file_name=$fetch_image['file_name'];
			if($num==3){
			$num=0;
			echo "</tr><tr>";
}
			?>
                          <td width="195" height="104"><table width="137" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="94%" >&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="ts-display-pf-img"><a class="image" href="uploads/<?php echo $file_name; ?>" data-rel="prettyPhoto[mixed]" ><img src="uploads/<?php echo $file_name; ?>" width="75" height="75" /></a></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right">&nbsp;</td>
                              </tr>
                          </table></td>
                          <?php
			 $num++;
			}
	?>
                        </tr>
                      </table>

               
            
            
          </div>
    
    </div>
    
    
    <?php 
	
	 if(isset($_SESSION['login_email_id']) && $u_id!==$user_id){ ?>

	
	
    
    <div id="ad_images">
    
    <div id="preview"></div>
        <div id="formbox">
    
    <form method="post" id="form" action="submit.php?post_id=<?php echo $post_id; ?>&user_id=<?php echo $user_id; ?>&f_name=<?php echo $f_name; ?>">
    
    
    
    <div id="conact_seller">Contact Seller</div>
    
    <div id="contact_seller_contaner">
    <div id="contact_seller_name">Name</div>
    <div id="contact_seller_input"><input type="text" name="name" /></div>
    <div style="clear:both;"></div>
</div>

<div id="contact_seller_contaner">
    <div id="contact_seller_name">Email</div>
    <div id="contact_seller_input"><input type="text" name="email" /></div>
    <div style="clear:both;"></div>
</div>
    
    <div id="contact_seller_contaner">
    <div id="contact_seller_name">Message</div>
    <div id="contact_seller_input">
      <label for="textarea"></label>
      <textarea name="message" id="textarea" cols="30" rows="5"></textarea>
    </div>
    <div style="clear:both;"></div>
</div>
<div><button type="submit" name="send message" id="send_message_button">Send Message</button></div>
</form>
</div>
    </div>
    <?php } ?>
    <div style="clear:both;"></div>
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
	$targetpage = "view-detail.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
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
AND postcode_location.sub_cat_id = '".$sub_cat_id."' LIMIT $start, $limit";	
	
	
	
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
			
			
			
			//Title Description//
			/*$select_title_description="SELECT title,description FROM ad_title_description WHERE postcode_loaction_id='".$post_id."'";
			$run_select_title=mysql_query($select_title_description);
			$fetch_select_title=mysql_fetch_array($run_select_title);*/
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
    <div id="ad_img_div"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature;?>"><img src="uploads/<?php echo $image_name; ?>" width="100" height="75" /></a></div>
    <div id="ad_title_div">
    
    <div><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature;?>"><?php echo $title; ?></a></div>
    <div><?php echo substr($description, 0, 50)."....."; ?></div>
    <div><?php echo $town; ?></div>
    
    </div>
    <div id="ad_feature"><?php echo $feature_name; ?></div>
    <div id="ad_price">&pound;<?php echo $feature_price; ?><br /><?php echo $daysago." "."days ago"; ?></div>
    <div style="clear:both;"></div>
</div>
    
    </div>
    
    <?php  
	
	
	
	 
	 
	 
	
	
	
	
	
	
	} } else{ echo "Sorry no result found"; }?>
    
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