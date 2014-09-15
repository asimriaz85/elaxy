<?php
ob_start();

error_reporting(0);
include("../../connection.php");
if(isset($_REQUEST['submit'])){
	 $cat_id=$_REQUEST['category'];
	$tips_des=$_REQUEST['tips_des'];
	

if(!empty($cat_id)&&!empty($tips_des)){
	
				 
	 
			
			$insert="INSERT INTO safity_tipds(cat_id,tips_des) values('$cat_id','$tips_des')" or die (mysql_error());

$query=mysql_query($insert) or die (mysql_error());


		




if($insert){
	$msg="Ad Image Added Successfully";
		header("location:../add-safity-tips.php?msg=$msg");
}
			
			
		
}

else{
	$error="Please Fill All Empty Fields";	
		header("location:../add-safity-tips.php?error=$error&cat_id1=$cat_id&tips_des=$tips_des");
}

}

?>