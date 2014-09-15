<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
 


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");

$user_id=$_REQUEST['uid'];	
	
	
	
	

///End///


///Manage////
$tbl_name="favourite";

/* Get data. */
	  $sql = "SELECT *
FROM favourite WHERE user_id  ='".$user_id."'";

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
            
                  <table width="1126" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th width="85">Picture</th>
            <th width="73">Title</th>
            <th width="164">Description</th>
            <th width="117">Date Published</th>
            <th width="54">Town</th>
            <th width="58">Feature Name</th>
             <th width="65">Time</th>
             <th width="148">Options</th>
              <th width="322">&nbsp;</th>
        </tr>
    </thead>

    <tbody>
    <?php
	$count=1;
		while($row = mysql_fetch_array($result))
		{
			
			$post_id=$row['postcode_loaction_id'];
			
			   $sql2 = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.id = '".$post_id."'";

$result2=mysql_query($sql2);
		
$row2=mysql_fetch_array($result2);		


 $published_date=$row2['date'];
			 $town=$row2['town'];
			
			
			//$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);
			$seconds = strtotime($end_date) - strtotime($cdate);
 $daysago = $seconds / 60 /  60;
			
			$select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
			 
			//End Image//
			
			
			$title=$row2['title'];
			$description=$row2['description'];
			
			//End Title Description//
			
			$feature_name=$row2['name'];
				$feature_price=$row2['item_price'];
				$ad_price_days=$row2['days'];

			 
			 ?>
             
             
             
             
             <?php 
			 
			 
			 
			 
		
		
		
			
			
			
		


		if($count%2==0){ $even_odd='pure-table-odd'; }
		if($count%2!=0){ $even_odd=''; }
		

?>
        <tr class="<?php echo $even_odd; ?>"  >
            <td><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><img src="uploads/<?php echo $image_name; ?>" width="75" height="75" alt="" /></a></td>
            <td align="center"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>"><?php echo $title; ?></a></td>
            <td><?php echo substr($description, 0, 50)."....."; ?></td>
             <td align="center"><?php echo $town; ?></td>
            <td align="center"><?php if($feature_name!="Free Ad"){ ?><div class="list-feature"> <?php echo $feature_name;   ?></div><?php } ?></td>
             <td align="center"><?php echo "&pound;". $feature_price."&nbsp;"; ?></td>
            <td align="center"><?php echo $daysago." "."days ago"; ?></td>
            <td><a href="delete-favourites.php?id=<?php echo $postcode_id; ?>" onclick="javascript:return confirm('Are you sure you want to update this?')">Delete</a></td>
            
        </tr>
        
         
        
         
        <?php $count++; 
		
		
		
		
		
		
		 }?>
         

      
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