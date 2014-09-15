<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");

$post_id=$_REQUEST['post_id'];


///Manage////
$tbl_name="postcode_location";	

/* Get data. */
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id AND postcode_location.id='".$post_id."'";	

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
            
                  <table width="955" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th width="48"></th>
            <th width="101">Picture</th>
            <th width="117">Title</th>
            <th width="176">Description</th>
            <th width="134">Date Published</th>
            <th width="82">Status</th>
            <th width="80">Views</th>
             <th width="83">Replies</th>
              <th width="109">Options</th>
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
		
		if($count%2==0){ $even_odd='pure-table-odd'; }
		if($count%2!=0){ $even_odd=''; }
		

?>
        <tr class="<?php echo $even_odd; ?>"  >
            <td><input name="" type="checkbox" value=""></td>
            <td><img src="uploads/<?php echo $image_name; ?>" width="75" height="75" /></td>
            <td><?php echo $title; ?></td>
            <td><?php echo substr($description, 0, 50)."....."; ?></td>
             <td><?php echo $publish_date; ?></td>
            <td><?php if($status==1){ echo "Active"; } if($status==0){ echo "Inactive"; } ?></td>
             <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="update-ads.php?id=<?php echo $postcode_id; ?>" onclick="javascript:return confirm('Are you sure you want to update this?')">Update</a>&nbsp;|&nbsp;<a href="config/delete-ads.php?id=<?php echo $add_id; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">Delete</a>&nbsp;|&nbsp;Improve</td>
        </tr>
        
         
        
         
        <?php $count++; } ?>
         

      
    </tbody>
</table>
<?php } ?>
                			
			
		</div>
	</div>
    </div>
		





</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>