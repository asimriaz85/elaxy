<?php
ob_start();
include("../../connection.php");
require_once '../gd_engine/ThumbLib.inc.php';

if(isset($_REQUEST['submit'])){
	
	$name=$_REQUEST['name'];
    $name2=strtolower($name); 
	
	$hide_show=$_REQUEST['hide_show'];
 	$client_image=$_FILES['client_image']['name']; 
	 

if(!empty($name)&&!empty($hide_show)){
	
	
		$select_categories_name=mysql_query("SELECT name FROM categories WHERE name ='".$name2."'");
		$fetch_category_name=mysql_fetch_array($select_categories_name);
		$category_name=$fetch_category_name['name'];
			$category_name2=strtolower($category_name);	 
				 
				 
				 
				 if($name2==$category_name2){
				$error="Category Name already exist";	
		header("location:../add-categories.php?error=$error&name=$name&hide_show=$hide_show");
}
				 
				
		
		
		
		if($name2!=$category_name2){
			
			
			
	 
			
			$insert="INSERT INTO categories(name,show_hide) values('$name2','$hide_show')" or die (mysql_error());

$query=mysql_query($insert) or die (mysql_error());


		//Order query//
			 $query = "SELECT name, MAX(id) FROM categories "; 
		
		

	 
$result = mysql_query($query) or die(mysql_error());


// Print out result
$row = mysql_fetch_array($result);
	  $max_id=$row['MAX(id)'];  
	 
	 //End order Query



$insert2="INSERT INTO categories_image(cat_id,image) values('$max_id','$client_image')" or die (mysql_error());

$query22=mysql_query($insert2) or die (mysql_error());


////Image//
$selet="select * from categories_image order by id DESC LIMIT 1";
$mysql=mysql_query($selet);
while($fetchqry=mysql_fetch_array($mysql)){
$cat_id=$fetchqry['id'];
}
$tmp_name5 = $_FILES["client_image"]["tmp_name"];
$nm5 = $_FILES["client_image"]["name"];
if($nm5!="")
{
//image type, require JPG or GIF
$filetype5 = substr($nm5, -3);
$name5="categories_1_".$cat_id.".jpg";

		if($filetype3=="jpg" || "JPG" || "JPEG" || "jpeg" || "gif" || "png")
		{
					//Move uploaded file to temp folder
			if (move_uploaded_file($tmp_name5, "../media/upl_gallery/$name5"))
			{
			
				 mysql_query("Update categories_image Set image='$name5' where id='$cat_id'")or die(mysql_error());
				$msg="yes";
			}else{
			//if upload fails
			echo $msg="no";
			die("Error uploading file");
			exit();
		}	
	$thumb = PhpThumbFactory::create("../media/upl_gallery/".$name5."");
	if($thumb->resize(45, 40)){

    if(!$thumb->save('../media/logo_gallery/'.$name5)){
    print "<br>Failed to Create Thumb, The required file might be moved, removed or the image is too small";
    }
	}
	
	
	$thumb = PhpThumbFactory::create("../media/upl_gallery/".$name5."");
	if($thumb->resize(200, 100)){

    if(!$thumb->save('../media/thumb_gallery/'.$name5)){
    print "<br>Failed to Create Thumb, The required file might be moved, removed or the image is too small";
    }
	}	
		$thumb = PhpThumbFactory::create("../media/upl_gallery/".$name5."");
	if($thumb->resize(500, 500)){

    if(!$thumb->save('../media/large_gallery/'.$name5)){
    print "<br>Failed to Create Thumb, The required file might be moved, removed or the image is too small";
    }

}

}
}


if($insert){
	$msg="Category Added Successfully";
		header("location:../add-categories.php?msg=$msg");
}
			
			
		}
		
}

else{
	$error="Please Fill All Empty Fields";	
		header("location:../add-categories.php?error=$error&name=$name&hide_show=$hide_show");
}

}

?>