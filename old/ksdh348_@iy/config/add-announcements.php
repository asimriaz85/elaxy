<?php

ob_start();
error_reporting(0);
include("../../connection.php");if(isset($_REQUEST['submit'])){
	
	
	
	$description=$_REQUEST['description'];
	
	
	
	
	if(!empty($description)){
		
		
		
		
		
		
		  $insert="INSERT INTO announcements(announcements)VALUES('".$description."')";
		
		$run=mysql_query($insert);
		
		if($run){
			
			$msg="Announcements added Successfully";
			
				header("location:../add-announcements.php?msg=$msg");

			
			
		} if(!$run){
		$error="Announcements not added due to error!";
	header("location:../add-announcements.php?error=$error&description=$description");
		}
		
				
		
	} else{
		$error="Please fill all the required fields!";
	header("location:../add-announcements.php?error=$error&description=$description");	
	}
	
}

?>