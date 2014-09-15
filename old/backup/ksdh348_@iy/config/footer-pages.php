<?php
ob_start();
error_reporting(0);
include("../../connection.php");if(isset($_REQUEST['submit'])){
	
	
	$name=$_REQUEST['name'];
	$hide_show=$_REQUEST['hide_show'];
	$description=mysql_real_escape_string($_REQUEST['description']);
	
	$title=$_REQUEST['title'];
	$keywords=$_REQUEST['keywords'];
	$meta_description=$_REQUEST['meta_description'];
	
	
	
	
	if(!empty($name) && !empty($description)){
		
		
		 $select_pagename="SELECT page_name FROM pages WHERE page_name='".$name."'";
		$run_page_name=mysql_query($select_pagename);
		$fetch_page_name=mysql_fetch_array($run_page_name);
		$page_name=$fetch_page_name['page_name'];
		
		if($page_name==$name){
			
			$error="Page Name already exist!";
	header("location:../footer-pages.php?error=$error&name=$name&description=$description&hide_show=$hide_show");
		}
		
		if($page_name!=$name){
		
		 $insert="INSERT INTO pages(page_name,description,status,title,m_keywords,meta_description)VALUES('".$name."','".$description."','".$hide_show."','".$title."','".$keywords."','".$meta_description."')";
		
		$run=mysql_query($insert);
		
		if($run){
			/*$content = '<?php 

include("include/header.php");
	
?>  

 <div id="wrapper">
    <!--Adds Div-->
    <?php
	include("include/limelight_ad.php");
	 ?>
		<!--End Add divs-->
        
</div>
<div id="search_bg2">
    <div id="categories_main">
   <?php echo $description; ?>
    	
        	</div>
    
    <div style="clear:both;"></div>
</div>
    
    
    


	




    <div class="clear_both"></div>
</div>

    </div>';
$fp = fopen("../../elaxy.$name.php","wb");
fwrite($fp,$content);
fclose($fp);*/
			
			
			
			
			$msg="Page added Successfully";
			
				header("location:../footer-pages.php?msg=$msg");

			
			
		} if(!$run){
		$error="Page is not created due to error!";
	header("location:../footer-pages.php?error=$error&name=$name&description=$description&hide_show=$hide_show&title=$title&keywords=$keywords&meta_description=$meta_description");
		}
		
				}
		
	} else{
		$error="Please fill all the required fields!";
	header("location:../footer-pages.php?error=$error&name=$name&description=$description&hide_show=$hide_show&title=$title&keywords=$keywords&meta_description=$meta_description");	
	}
	
}

?>