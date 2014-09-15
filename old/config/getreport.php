<?php

		ob_start();
		
		include("../connection.php");
		/*echo '<pre>';
		print_r($_REQUEST);
		echo '</pre>';*/
		
		$post_id=$_REQUEST['post_id'];
		$feature=$_REQUEST['feature'];
		$ad_userid=$_REQUEST['ad_userid'];
		$sub_cat_id=$_REQUEST['sub_cat_id'];
		$reporter_id=$_REQUEST['reporter_id'];
		$report_message=$_REQUEST['report_message'];
		
		
		$insert="INSERT INTO ad_abuse (postcode_loaction_id,feature,ad_user_id,reporter_id,report_message)VALUES('".$post_id."','".$feature."','".$ad_userid."','".$reporter_id."','".$report_message."')";
		
		$run=mysql_query($insert);
		
		if($run){
			
			
			header("Location:../view-detail.php?post_id=$post_id&feature=$feature&sub_cat_id=$sub_cat_id");
			
			 
			
		}
		
		
		
		
			
				
		

?>