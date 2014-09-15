<?php

	include("../../connection.php");
	if(isset($_REQUEST['submit'])){
	
	$region_id=$_REQUEST['region_id'];
	$county_name=$_REQUEST['county_name'];
	
	if(!empty($region_id) && !empty($county_name)){
		
		
		$insert="INSERT INTO county (region_id,county_name)VALUES('".$region_id."','".$county_name."')";
		$run=mysql_query($insert);
		
		if($run){
			$msg="Region Added Successfully";
			header("location:../county.php?msg=$msg");
		} 
		if(!$run){
			
			$error="Region not added due to Error!";
			header("location:../county.php?error=$error&region_id=$region_id&county_name=$county_name");
		}
	}
	else{
		$error="Please fill all the required fields";
			header("location:../county.php?error=$error&region_id=$region_id&county_name=$county_name");
	}
	
	}


?>