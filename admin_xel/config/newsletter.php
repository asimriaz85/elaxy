<?php
ob_start();
error_reporting(0);
	include("../connection.php");
	if(isset($_REQUEST['submit'])){
		$editor=$_POST['editor1'];
		$subject=$_POST['subject'];
	
	if (!empty($_POST['editor1']) && !empty($_POST['subject']))
{
	
			 $value = htmlspecialchars($_POST['editor1']);
			
	
	$insert="INSERT INTO newsletter(subject,newsletter)VALUES('".$subject."','".$editor."')";
	$run_insert=mysql_query($insert);
	
	if($run_insert){
		$msg="Newsletter added successfully";
		header("../location:newsletter.php?msg=$msg");
		
	} if(!$run_insert){
		$error="Newsletter Not added due to error!";
		header("../location:newsletter.php?error=$error&subject=$subject&editor=$editor");
	}
	
	
	
} else{
	$error="Please fill all the fields";
	header("../location:newsletter.php?error=$error&subject=$subject&editor=$editor");
}

	}
?>

