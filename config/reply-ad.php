<?php

	include("../connection.php");
	
	if(isset($_REQUEST['submit'])){
		
		/*echo '<pre>';
		print_r($_REQUEST);
		echo '</pre>';
		exit;*/
	
	$post_id=$_REQUEST['post_id'];
	
	$f_id=$_REQUEST['f_id'];
	
	$s_user=$_REQUEST['s_user'];
	
	 $post_email=$_REQUEST['post_email'];
	
	
	$your_name=$_REQUEST['your_name'];
	 $your_email=$_REQUEST['your_email'];
	$message=$_REQUEST['message'];
	
	
	
	if(!empty($your_name) && !empty($your_email) && !empty($message)){
		
		$insert="INSERT INTO message (post_id,s_user,post_email,your_name,your_email,message)VALUES('".$post_id."','".$s_user."','".$post_email."','".$your_name."','".$your_email."','".$message."')";
		
		$run=mysql_query($insert);
		
		if($run){
			$msg="Your message send successfully";
			
			header("Location:../reply-ad.php?post_id=$post_id&f_id=$f_id");
		}
		
		
	} else{
		
	$error="Please fill all the Required field";
	
	header("Location:../reply-ad.php?your_name=$your_name&your_email=$your_email&message=$message&post_id=$post_id&f_id=$f_id");	
	}
	
	
	
	}
	
	
	
	
	
	
	


?>