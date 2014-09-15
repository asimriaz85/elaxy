<?php
ob_start();
include("../../connection.php");


if(isset($_REQUEST['submit'])){
	
	$name=$_REQUEST['name'];
    $name2=strtolower($name); 
	
	$hide_show=$_REQUEST['hide_show'];
 	$parent_off=$_REQUEST['parent_off']; 
	 

if(!empty($parent_off) && !empty($name)&&!empty($hide_show)){
	
	
		$select_categories_name=mysql_query("SELECT name FROM categories WHERE name ='".$name2."'");
		$fetch_category_name=mysql_fetch_array($select_categories_name);
		$category_name=$fetch_category_name['name'];
			$category_name2=strtolower($category_name);	 
				 
				 
				 
				 if($name2==$category_name2){
				$error="Subcategory Name already exist";	
		header("location:../sub-categories.php?error=$error&name=$name&hide_show=$hide_show&parent_off=$parent_off");
}
				 
				
		
		
		
		if($name2!=$category_name2){
			
			
			
	 
			
			$insert="INSERT INTO categories(name,show_hide,parent_off) values('$name2','$hide_show','$parent_off')" or die (mysql_error());

$query=mysql_query($insert) or die (mysql_error());


		






if($insert){
	$msg="Category Added Successfully";
		header("location:../sub-categories.php?msg=$msg");
}
			
			
		}
		
}

else{
	$error="Please Fill All Empty Fields";	
		header("location:../sub-categories.php?error=$error&name=$name&hide_show=$hide_show&parent_off=$parent_off");
}

}

?>