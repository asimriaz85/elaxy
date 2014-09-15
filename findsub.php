



<?php

	include("connection.php");
	
	
	
		 $sub_cat_id=$_REQUEST['sub_cat_id']; 
		 ?>
         <input type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id; ?>" />
         <?php
		 
		
		$select_subcat_name="SELECT id,name,parent_off FROM categories WHERE parent_off='".$sub_cat_id."'";
		$run_subcatquery=mysql_query($select_subcat_name);
		while($fetch_subcat_query=mysql_fetch_array($run_subcatquery)){
			
			$sub_subcat_id=$fetch_subcat_query['id'];
			
			$category_subname=$fetch_subcat_query['name'];
			
		?>
       
                                   <li class="blurred"  onclick="getsubchild('findsubchild.php?sub_cat_id='+<?php echo $sub_subcat_id; ?>)"><a href="#"><?php echo $category_subname; ?></a></li> 
                               
        <?php	
			
		}

?>