<?php

	include("../connection.php");
	
	/*echo '<pre>';
	print_r($_REQUEST);
	echo '</pre>';
	
	
	exit;*/
	
	
	$id=$_REQUEST['id'];
	$id2=$_REQUEST['id2'];
	
	$page_name=$_REQUEST['page_name']; 
	$delete="DELETE FROM  ad_price WHERE id='".$id."'";
	$run=mysql_query($delete);
	
	if($run){
		
		header("location:../$page_name");
		
	}

?>