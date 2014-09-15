<?php

	include("../../connection.php");
	if(isset($_REQUEST['submit'])){
	
	$county_id=$_REQUEST['county_id'];
	$city_name=$_REQUEST['city_name'];
	
	if(!empty($county_id) && !empty($city_name)){
		
		
		$insert="INSERT INTO city (county_id,city_name)VALUES('".$county_id."','".$city_name."')";
		$run=mysql_query($insert);
		
		if($run){
			$msg="City Added Successfully";
			header("location:../city.php?msg=$msg");
		} 
		if(!$run){
			
			$error="City not added due to Error!";
			header("location:../city.php?error=$error&county_id=$county_id&city_name=$city_name");
		}
	}
	else{
		$error="Please fill all the required fields";
			header("location:../city.php?error=$error&county_id=$county_id&city_name=$city_name");
	}
	
	}


?>