<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
 


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");

include("inc/lightbox-jquery.php");
	
	
	
	

///End///


///Manage////
$tbl_name="postcode_location";	

/* Get data. */
	 /* Get data. */
	$sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1' AND postcode_location.user_id='".$user_id."'";	

$result = mysql_query($sql);
	
	$num_rows_views=mysql_num_rows($result);

 ?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:99%">






<div id="tabs_area">
	<div id="header">
	<?php include("inc/manage-menu.php"); ?>
	</div>
	<div id="main">
		<div id="contents">
            
            <?php
			if($num_rows_views >0){
			?>
            
                  <table width="1126" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th width="85">Picture</th>
            <th width="73">Title</th>
            <th width="164">Description</th>
            <th width="117">Date Published</th>
            <th width="54">Status</th>
            <th width="58">Views</th>
             <th width="65">Replies</th>
             <th width="148">Options</th>
              <th width="322">&nbsp;</th>
        </tr>
    </thead>

    <tbody>
    <?php
	$count=1;
		while($row = mysql_fetch_array($result))
		{
			
			   $add_id=$row['id'];
  $publish_date=$row['date'];
  
  $status=$row['status'];
  
  $f_name=$row['name'];
	
	
		
		



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
             
             
             <script type="text/javascript">
		$(document).ready(function() {
			
			
			
			
			$("#various-loop<?php echo $postcode_id; ?>").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
			
			
			
			});
	</script>
             
             <?php 
			 
			 
			 
			 
		
		
		if($end_date >= $cdate){
		
		 $select_message="SELECT id,post_id FROM  message WHERE post_id='".$postcode_id."' AND f_name='".$f_name."'";
		$run_message=mysql_query($select_message);
		 $message_num_rows=mysql_num_rows($run_message);
		


		if($count%2==0){ $even_odd='pure-table-odd'; }
		if($count%2!=0){ $even_odd=''; }
		

?>
        <tr class="<?php echo $even_odd; ?>"  >
            <td><img src="uploads/<?php echo $image_name; ?>" width="75" height="75" /></td>
            <td align="center"><?php echo $title; ?></td>
            <td><?php echo substr($description, 0, 70)."....."; ?></td>
             <td align="center"><?php echo $publish_date; ?></td>
            <td align="center"><?php if($status==1){ echo "Active"; } if($status==0){ echo "Inactive"; } ?></td>
             <td>&nbsp;</td>
            <td align="center"><a href="inbox.php?post_id=<?php echo $postcode_id; ?>&t=<?php echo $title; ?>"><?php echo $message_num_rows; ?></a></td>
            <td><a href="update-ads.php?id=<?php echo $postcode_id; ?>">Update</a>&nbsp;|&nbsp;<a href="config/delete-ads.php?id=<?php echo $add_id; ?>&page_name=<?php echo $page_name; ?>">Delete</a>&nbsp;|&nbsp;Improve</td>
            <td><a href="http://www.facebook.com/sharer.php?u=http://elaxy.co.uk/view-detail.php?post_id=<?php echo $postcode_id; ?>" target="_blank"><img src="images/facebook-icon.png" alt="Facebook" border="0" /></a><a href="http://twitter.com/share?url=http://elaxy.co.uk/view-detail.php?post_id=<?php echo $postcode_id; ?>&text=Elaxy Share Ad" target="_blank"><img src="images/twitter.png" alt="Twitter" border="0" /></a><a href="https://plus.google.com/share?url=http://elaxy.co.uk/view-detail.php?post_id=<?php echo $postcode_id; ?>" target="_blank"><img src="images/google.png" alt="Google" border="0" /></a><a href="http://www.linkedin.com/shareArticle?mini=true&url=http://elaxy.co.uk/view-detail.php?post_id=<?php echo $postcode_id; ?>" target="_blank"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a><a href="tell-a-friend.php?u=http://elaxy.co.uk/view-detail.php?post_id=<?php echo $postcode_id; ?>" id="various-loop<?php echo $postcode_id; ?>"><img src="images/send-mail-tell-a-friend-icone-4996-48.png" border="0" /></a></td>
        </tr>
        
         
        
         
        <?php $count++; } }?>
         

      
    </tbody>
</table>
<?php } ?>
                			</div>
			
      
      
      
			
			
	</div>
		

</div></div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>