<?php include "../../connection.php";

	

	 
	 $action=$_REQUEST['action'];
	 $n_id=$_REQUEST['id'];
	 $tblname=$_REQUEST['tblname'];
	 $redirect=$_REQUEST['page_name']; 
	 
	
	    
 
if(isset($_REQUEST['action']) && $_REQUEST['action']=='delete'){
	
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
		
		
		
		
		$delall=mysql_query("DELETE from $tblname  WHERE id='".$mcheck[$i]."'") or die(mysql_error());
		header("location:../$redirect?msg=All Selected Data Deleted Successfully !");	
		}	
			
}
}//end post
?>