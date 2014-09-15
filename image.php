<style>
.previes{
	width:200px;
}
</style>



<?php

		include("connection.php");
		include("include/login-security.php");
		
		 $image_id=$_REQUEST['image_id'];
		echo  $postcode_loaction_id=$_REQUEST['postcode_loaction_id'];
		
		
		$select_image="SELECT id,file_name FROM users_images WHERE id='".$image_id."'";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		$file_name=$fetch_image['file_name'];
		$img_id=$fetch_image['id'];
		
?>


<img src="uploads/<?php echo $file_name; ?>">

<a href="config/delete.php?id=<?php echo $img_id ?>&postcode_loaction_id=<?php echo $postcode_loaction_id; ?>" id="subbtn" onclick="javascript:parent.jQuery.fancybox.close();">DELETE</a>

