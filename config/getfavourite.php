<?php
ob_start();
include("../connection.php");
	 //echo $fav=$_REQUEST['fav'];
	 
	 /*echo '<pre>';
	 print_r($_REQUEST);
	 echo '</pre>';*/
	 
	 $post_id=$_REQUEST['post_id'];
	 $feature=$_REQUEST['feature'];
	 $uid=$_REQUEST['uid'];
	 $sub_cat_id=$_REQUEST['sub_cat_id'];
	  $url=$_REQUEST['url'];
	 
	 
	 
	  $insert="INSERT INTO favourite(postcode_loaction_id,feature,user_id)VALUES('".$post_id."','".$feature."','".$uid."')";
	 
	 $run=mysql_query($insert);
	 
	 if($run){
		 echo $msg="AD IS NOW SAVED IN FAVOURITIES";
		 header("location:/ad/{$url}");
	 }
	 
	 
	 
	 
	 

?>