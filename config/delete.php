<?php

	include("../connection.php");
	
	
	
	 $img_id=$_REQUEST['id'];
	 $id=$_REQUEST['postcode_loaction_id'];
	 
	 
	 
	 $select="SELECT file_name FROM users_images WHERE id='".$img_id."'";
	 $run_qu=mysql_query($select);
	 $fetch_qu=mysql_fetch_array($run_qu);
	 $photo=$fetch_qu['file_name'];
	 
	
	  $delete="DELETE FROM users_images WHERE id='".$img_id."'";
	$run=mysql_query($delete);
	
	if(file_exists("../uploads/$photo")){
	unlink("../uploads/$photo");	
	}
	
	//header("Location:../addimage.php?id=$id");
	
	?>
    
    	
	
	
	
