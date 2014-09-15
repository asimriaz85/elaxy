<?php

	include("../connection.php");
	
	/*echo '<pre>';
	print_r($_REQUEST);
	echo '</pre>';
	
	
	exit;*/
	
	
	$id=$_REQUEST['id'];
	
	$page_name=$_REQUEST['page_name']; 
	
	
	$select_images="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$id."'";
	$run_image=mysql_query($select_images);
	while($fetch_image=mysql_fetch_array($run_image)){
		
		$photo=$fetch_image['file_name'];
		
		
		
		
		if(file_exists("uploads/$photo")){
	unlink("../uploads/$photo");	
	}
	
	$del1="DELETE FROM  users_images WHERE postcode_loaction_id='".$id."'";
	$run1=mysql_query($del1);
		
	}
	
	
	$del2="DELETE FROM  ad_title_description WHERE postcode_loaction_id='".$id."'";
	$run2=mysql_query($del2);
	
	
	$del3="DELETE FROM   your_web_link WHERE postcode_loaction_id='".$id."'";
	$run3=mysql_query($del3);
	
	$delete="DELETE FROM  postcode_location WHERE id='".$id."'";
	$run=mysql_query($delete);
	
	if($run){
		
		header("location:../$page_name");
		
	}

?>