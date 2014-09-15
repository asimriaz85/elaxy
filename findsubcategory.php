<?php

	include("connection.php");
	 $catid=$_REQUEST['catid'];
	?>
	
    <select name="subcat" onChange="getregion('findregion.php?subid='+this.value)">
    <option value="">Please Select</option>
    <?php 
	$select_subcat="SELECT id,name,show_hide,parent_off FROM  categories WHERE parent_off='".$catid."' AND show_hide='Show'"; 
	$run_subcat=mysql_query($select_subcat);
	while($fetch_subcat=mysql_fetch_array($run_subcat)){
	$subcat_id=$fetch_subcat['id'];
	echo $sub_catname=$fetch_subcat['name'];
	?>
    <option value="<?php echo $subcat_id; ?>"><?php echo $sub_catname; ?></option>
    <?php } ?>
    </select>