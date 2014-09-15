<?php

	include("../../connection.php");
	if(isset($_REQUEST['submit'])){
	
	$county_id=$_REQUEST['county_id'];
	$town_name=$_REQUEST['town_name'];
	
	if(!empty($county_id) && !empty($town_name)){
		
		
		$insert="INSERT INTO town (county_id,town_name)VALUES('".$county_id."','".$town_name."')";
		$run=mysql_query($insert);
		
		if($run){
			$msg="Couty Added Successfully";
			header("location:../town.php?msg=$msg");
		} 
		if(!$run){
			
			$error="County not added due to Error!";
			header("location:../town.php?error=$error&county_id=$county_id&town_name=$town_name");
		}
	}
	else{
		$error="Please fill all the required fields";
			header("location:../town.php?error=$error&county_id=$county_id&town_name=$town_name");
	}
	
	}


?>