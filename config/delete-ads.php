<?php

	include("../connection.php");
	
	/*echo '<pre>';
	print_r($_REQUEST);
	echo '</pre>';
	
	
	exit;*/
	
	
	$n_id=$_REQUEST['id'];
	$page_name=$_REQUEST['page_name'];
	$menu_name=$_REQUEST['menu_name'];
	
	$delete1="DELETE from postcode_location where id='".$n_id."'";
$query1=mysql_query($delete1) or die(mysql_error());

$delete2="DELETE FROM ad_abuse WHERE postcode_loaction_id='".$n_id."'";
$query2=mysql_query($delete2)or die(mysql_error());

$delete3="DELETE FROM ad_price WHERE postcode_loaction_id='".$n_id."'";
$query3=mysql_query($delete3)or die(mysql_error());

$delete4="DELETE FROM ad_title_description WHERE postcode_loaction_id='".$n_id."'";
$query4=mysql_query($delete4)or die(mysql_error());

$delete5="DELETE FROM contact_via WHERE postcode_loaction_id='".$n_id."'";
$query5=mysql_query($delete5)or die(mysql_error());

 $delete6="DELETE FROM favourite WHERE postcode_loaction_id='".$n_id."'";
$query6=mysql_query($delete6)or die(mysql_error());

$delete7="DELETE FROM job_contract WHERE postcode_loaction_id='".$n_id."'";
$query7=mysql_query($delete7)or die(mysql_error());

$delete8="DELETE FROM message WHERE post_id='".$n_id."'";
$query8=mysql_query($delete8)or die(mysql_error());

$delete9="DELETE FROM property_holiday_rent WHERE postcode_loaction_id='".$n_id."'";
$query9=mysql_query($delete9)or die(mysql_error());

/*$delete10="DELETE FROM property_holiday_rent WHERE postcode_loaction_id='".$n_id."'";
$query10=mysql_query($delete10)or die(mysql_error());*/

$delete11="DELETE FROM vehicle_make_mode WHERE postcode_loaction_id='".$n_id."'";
$query11=mysql_query($delete11)or die(mysql_error());

/*$delete12="DELETE FROM vehicle_make_mode WHERE postcode_loaction_id='".$n_id."'";
$query12=mysql_query($delete12)or die(mysql_error());*/

$delete13="DELETE FROM views WHERE post_id='".$n_id."'";
$query13=mysql_query($delete13)or die(mysql_error());

$delete14="DELETE FROM your_web_link WHERE postcode_loaction_id='".$n_id."'";
$query14=mysql_query($delete14)or die(mysql_error());

$delete15="DELETE FROM youtube_link WHERE postcode_loaction_id='".$n_id."'";
$query15=mysql_query($delete15)or die(mysql_error());

 $select_img="select file_name from users_images where postcode_loaction_id='$n_id'";
$select_qry=mysql_query($select_img) or die(mysql_error());
while($fetch_img=mysql_fetch_array($select_qry)){
$photo=$fetch_img['users_images'];
if(file_exists("uploads/$photo"))
        {
		unlink("uploads/$photo");
		
		}
		
		$delete16="DELETE from users_images where postcode_loaction_id='".$n_id."'";
$query16=mysql_query($delete11) or die(mysql_error()); 
}
	
	
		$msg="Ad Deleted Successfully";
		header("location:../$page_name?msg=$msg&menu_name=$menu_name");
		
	

?>