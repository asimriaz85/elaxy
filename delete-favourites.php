<?php

include("connection.php");

$post_id=$_REQUEST['post_id'];
$user_id=$_REQUEST['user_id'];

	
		$delete="DELETE FROM favourite WHERE postcode_loaction_id='".$post_id."' AND user_id='".$user_id."'";
		$run=mysql_query($delete);
		
		if($run){
			
			
			$msg="Ad Delete From Favourites";
			
			header("location:favourites.php?menu_name=manage_ads.php&msg=$msg&uid=$user_id");
		}

?>