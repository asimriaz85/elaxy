<?php include "../../connection.php";

	

	 
	 $action=$_REQUEST['action'];
	 $n_id=$_REQUEST['id'];
	 $tblname=$_REQUEST['tblname'];
	$redirect=$_REQUEST['page_name'];
	 
	
	    
 
if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete'){
	
	
	
	$select_img="select file_name from users_images where postcode_loaction_id='$n_id'";
$select_qry=mysql_query($select_img) or die(mysql_error());
while($fetch_img=mysql_fetch_array($select_qry)){
$photo=$fetch_img['file_name'];


if(file_exists("../../media/uploads/$photo") && file_exists("../../media/uploads/$photo") && file_exists("../../media/uploads/$photo") && file_exists("../../media/uploads/$photo") )
        {
		unlink("../../media/uploads/$photo");
		unlink("../../media/uploads/$photo");
		unlink("../../media/uploads/$photo");
		unlink("../../media/uploads/$photo");
		}
		
}
	
	
$delete1="DELETE from $tblname where id='".$n_id."'";
$query1=mysql_query($delete1) or die(mysql_error());

$delete11="DELETE from users_images where postcode_loaction_id='".$n_id."'";
$query11=mysql_query($delete11) or die(mysql_error()); 

$delete_ad_price="DELETE from ad_price where postcode_loaction_id='".$n_id."'";
$query_ad_price=mysql_query($delete_ad_price) or die(mysql_error()); 


$delete_ad_title_description="DELETE from ad_title_description where postcode_loaction_id='".$n_id."'";
$query_ad_title_description=mysql_query($delete_ad_title_description) or die(mysql_error());

$delete_your_web_link="DELETE from your_web_link where postcode_loaction_id='".$n_id."'";
$query_your_web_link=mysql_query($delete_your_web_link) or die(mysql_error());



header("location:../$redirect?msg=Deleted Successfully !");
}

 
  if(isset($_REQUEST['action'])){
   
	$action=$_REQUEST['action'];
		
		if($action == 'multidel'){
			
		  $mcheck=$_REQUEST['list'];
		
		$num=sizeof($mcheck);
		
		
				
		for($i=0; $i<$num; $i++){
		 $mcheck[$i]; 
		$select_splayers="select * from $tblname where id='".$mcheck[$i]."'";
		$select_qry=mysql_query($select_splayers) or die(mysql_error());
		$fetch_splayers=mysql_fetch_array($select_qry);
		
		$select_img="select file_name from users_images where postcode_loaction_id='".$mcheck[$i]."'";
$select_qry=mysql_query($select_img) or die(mysql_error());
$fetch_img=mysql_fetch_array($select_qry);
$photo=$fetch_img['file_name'];
		
		
	 
		if(file_exists("../../media/uploads/$photo") && file_exists("../../media/uploads/$photo") && file_exists("../../media/uploads/$photo") && file_exists("../../media/uploads/$photo") )
        {
		unlink("../../media/uploads/$photo");
		unlink("../../media/uploads/$photo");
		unlink("../../media/uploads/$photo");
		unlink("../../media/uploads/$photo");
		}
		
		
		
		$delall=mysql_query("DELETE from $tblname  WHERE id='".$mcheck[$i]."'") or die(mysql_error());
		$delall1=mysql_query("DELETE from users_images  WHERE postcode_loaction_id='".$mcheck[$i]."'") or die(mysql_error());
		
		$delete_ad_price="DELETE from ad_price where postcode_loaction_id='".$mcheck[$i]."'";
$query_ad_price=mysql_query($delete_ad_price) or die(mysql_error()); 


$delete_ad_title_description="DELETE from ad_title_description where postcode_loaction_id='".$mcheck[$i]."'";
$query_ad_title_description=mysql_query($delete_ad_title_description) or die(mysql_error());

$delete_your_web_link="DELETE from your_web_link where postcode_loaction_id='".$mcheck[$i]."'";
$query_your_web_link=mysql_query($delete_your_web_link) or die(mysql_error());
		
		header("location:../$redirect?msg=All Selected Data Deleted Successfully !");	
		}	
			
}
}//end post
?>