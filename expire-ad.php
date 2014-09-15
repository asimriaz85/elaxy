<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
 


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");


	
	
	
	

///End///


///Manage////
$tbl_name="postcode_location";	

/* Get data. */
	 /* Get data. */
	$sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id WHERE  postcode_location.status ='2' AND postcode_location.user_id='".$user_id."' order by postcode_location.date desc";	

$result = mysql_query($sql);
	
	$num_rows_views=mysql_num_rows($result);

 ?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:100.1%">






<div id="tabs_area">
	<div id="header">
	<?php include("inc/manage-menu.php"); ?>
	</div>
	<div id="main">
		<div id="contents">
            
            <?php
			if($num_rows_views >0){
			?>
            
                  <table width="994" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th width="83">Picture</th>
            <th width="91">Title</th>
            <th width="226">Description</th>
            <th width="90">Date Published</th>
            <th width="67">Status</th>
            <th width="54">Views</th>
             <th width="99">Replies</th>
             <th width="248">Options</th>
              </tr>
    </thead>

    <tbody>
    <?php
	$count=1;
		while($row = mysql_fetch_array($result))
		{
			
			   $add_id=$row['postcode_loaction_id'];
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
             
             
             <!--<script type="text/javascript">
		$(document).ready(function() {
			
			
			
			
			$("#various-loop<?php //echo $postcode_id; ?>").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
			
			
			
			});
	</script>-->
             
             <?php 
			 
			 
			 
			 
		
		
		if($end_date >= $cdate){
			
			
			 $query_views = "SELECT id, COUNT(post_id) FROM views WHERE post_id='".$postcode_id."'"; 
	 
$result_views = mysql_query($query_views) or die(mysql_error());
$row_views = mysql_fetch_array($result_views);

$total_views= $row_views['COUNT(post_id)'] ;
		
		 $select_message="SELECT id,post_id FROM  message WHERE post_id='".$postcode_id."' AND f_name='".$f_name."'";
		$run_message=mysql_query($select_message);
		 $message_num_rows=mysql_num_rows($run_message);
		


		if($count%2==0){ $even_odd='pure-table-odd'; }
		if($count%2!=0){ $even_odd=''; }
		

?>
        <tr class="<?php echo $even_odd; ?>"  >
            <td><img src="uploads/<?php echo $image_name; ?>" width="75" height="75" /></td>
            <td align="center"><?php echo $title; ?></td>
            <td><?php echo substr($description, 0, 50)."....."; ?></td>
             <td align="center"><?php echo $publish_date; ?></td>
            <td align="center"><?php if($status==1){ echo "Active"; } if($status==0){ echo "Inactive"; } if($status==2){ echo "Expire"; } ?></td>
             <td align="center"><?php echo $total_views; ?></td>
            <td align="center"><?php if($message_num_rows > 0){ ?><a href="inbox.php?post_id=<?php echo $postcode_id; ?>&t=<?php echo $title; ?>"><?php echo $message_num_rows; ?></a><?php } ?></td>
            <td><a href="update-ads.php?id=<?php echo $postcode_id; ?>" onclick="javascript:return confirm('Are you sure you want to update this?')">Update</a>&nbsp;|&nbsp;<a href="config/delete-ads.php?id=<?php echo $add_id; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">Delete</a>&nbsp;|&nbsp;Improve</td>
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