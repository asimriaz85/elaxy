<?php

	ob_start();
error_reporting(0);
include("../../connection.php");	
	if(isset($_REQUEST['submit'])){
		
		$state_id=$_REQUEST['state_id'];
		$region_name=$_REQUEST['region_name'];
		
		
		if(!empty($state_id) && !empty($region_name)){
			
			$insert="INSERT INTO region(state_id,region_name)VALUES('".$state_id."','".$region_name."')";
			$run=mysql_query($insert);
			
			if($run){
				$msg="County Name Added successfully";
				header("location:../region.php?msg=$msg");
			}
			if(!$run){
				
				$error="County Name not Added due to error!";
				header("location:../region.php?error=$error");
			}
			
			
		} else{
			
			$error="Please insert all required fields";
				header("location:../region.php?error=$error&state_id=$state_id&region_name=$region_name");
		}
		
		
	}


?>