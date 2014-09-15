<?php

	session_start();
	
	if(isset($_SESSION['login_email_id']) && ($_SESSION['login_password'])){
	session_destroy();
	session_unset();	
	header("location:../logout.php"); 
}else{
    session_destroy();
	session_unset();
    header("location:../logout.php"); 
}
?>