<?php
ob_start();

error_reporting(0);
include("../../connection.php");
if(isset($_REQUEST['submit'])){
	
	
	$description=mysql_real_escape_string($_REQUEST['description']);
	

if(!empty($description)){
	
	
			
			$insert="INSERT INTO sponsored_links(description) values('$description')" or die (mysql_error());

$query=mysql_query($insert) or die (mysql_error());


if($insert){
	$msg="Sponsored Link Added Successfully";
		header("location:../add-sponsored-links.php?msg=$msg");
}
			
			
		
		
}

else{
	$error="Please Fill All Empty Fields";	
		header("location:../add-sponsored-links.php?error=$error&description=$description");
}

}

?>