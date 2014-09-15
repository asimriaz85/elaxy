<?php

	include("connection.php");
	
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$f_name=$_REQUEST['f_name'];	
$post_id=$_REQUEST['post_id'];
$user_id=$_REQUEST['user_id'];	
$name=mysql_real_escape_string($_POST['name']);
$email=mysql_real_escape_string($_POST['email']);
$phone=mysql_real_escape_string($_POST['phone']);
$message=mysql_real_escape_string($_POST['message']);
if(strlen($name)>0 && strlen($email)>0 && strlen($message)>0)
{
	
	 $time=date("Y-m-d");
	$select="SELECT user_id FROM postcode_location WHERE id='".$post_id."'";
	$run_select=mysql_query($select);
	$fetch_user=mysql_fetch_array($run_select);
	
	$send_id=$fetch_user['user_id'];
	
	$sender_user="SELECT email FROM  registration WHERE id='".$send_id."'";
	$run_user=mysql_query($sender_user);
	$fetch_sender=mysql_query($run_user);
	$sender_email=$fetch_sender['email'];
	
	
	

	 $insert="INSERT INTo message(post_id,user_id,name,email,message,f_name,date_time,phone) VALUES('".$post_id."','".$user_id."','".$name."','".$email."','".$message."','".$f_name."','".$time."','".$phone."')";

$run=mysql_query($insert);
echo "Thank You !";

  
}
}


?>