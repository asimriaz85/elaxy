<?php include "../../connection.php";

	

	 
	 $action=$_REQUEST['action'];
	 $n_id=$_REQUEST['id'];
	 $tblname=$_REQUEST['tblname'];
	 $redirect=$_REQUEST['page_name'];
	 
	
	    
 
if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete'){
	
	
	$select_img="select image from $tblname where id='$n_id'";
$select_qry=mysql_query($select_img) or die(mysql_error());
$fetch_img=mysql_fetch_array($select_qry);
$photo=$fetch_img['image'];

if(file_exists("../media/upl_gallery/$photo") && file_exists("../media/large_gallery/$photo") && file_exists("../media/thumb_gallery/$photo") && file_exists("../media/logo_gallery/$photo") )
        {
		unlink("../media/upl_gallery/$photo");
		unlink("../media/large_gallery/$photo");
		unlink("../media/thumb_gallery/$photo");
		unlink("../media/logo_gallery/$photo");
		}
	
	
$delete1="DELETE from $tblname where id='".$n_id."'";
$query1=mysql_query($delete1) or die(mysql_error());






header("location:../$redirect?msg=Deleted Successfully !");
}

 
  if(isset($_REQUEST['action'])){
   
	$action=$_REQUEST['action'];
		
		if($action == 'multidel'){
			
		  $mcheck=$_REQUEST['list'];
		
		$num=sizeof($mcheck);
		
		
				
		for($i=0; $i<$num; $i++){
		 $mcheck[$i]; 
		$select_splayers="select * from tblname where id='".$mcheck[$i]."'";
		$select_qry=mysql_query($select_splayers) or die(mysql_error());
		$fetch_splayers=mysql_fetch_array($select_qry);
		
	 $photo=$fetch_splayers['image'];
		if(file_exists("../media/upl_gallery/$photo") && file_exists("../media/large_gallery/$photo") && file_exists("../media/thumb_gallery/$photo") && file_exists("../media/logo_gallery/$photo") )
        {
		unlink("../media/upl_gallery/$photo");
		unlink("../media/large_gallery/$photo");
		unlink("../media/thumb_gallery/$photo");
		unlink("../media/logo_gallery/$photo");
		}
		
		
		
		$delall=mysql_query("DELETE from $tblname  WHERE id='".$mcheck[$i]."'") or die(mysql_error());
		header("location:../$redirect?msg=All Selected Data Deleted Successfully !");	
		}	
			
}
}//end post
?>