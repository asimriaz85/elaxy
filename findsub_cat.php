



<?php

	include("connection.php");
	
	
	
		 $categories_id=$_REQUEST['cat_id']; 
		 
		 ?>
         <input type="hidden" name="main_cat" value="<?php echo $categories_id; ?>" />
         <?php
		
		$select_cate_name="SELECT id,name,parent_off FROM categories WHERE parent_off='".$categories_id."'";
		$run_catquery=mysql_query($select_cate_name);
		while($fetch_cat_query=mysql_fetch_array($run_catquery)){
			
			$sub_cat_id=$fetch_cat_query['id'];
			
			$category_name=$fetch_cat_query['name'];
			
		?>
       
                                   <li onclick="getsub('findsub.php?sub_cat_id='+<?php echo $sub_cat_id; ?>)"><a href="#"><?php echo $category_name; ?></a>
                                   </li> 
                               
        <?php	
			
		}

?>

