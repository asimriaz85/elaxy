<?php

		include("connection.php");
		
		  $subid=$_REQUEST['subid'];
?>

<select name="region">
<option value="">Please Select</option>
    <?php 
	 $select_region="SELECT id,sub_cat_id,town,status FROM  postcode_location WHERE sub_cat_id='".$subid."' AND status='1'"; 
	$run_region=mysql_query($select_region);
	while($fetch_region=mysql_fetch_array($run_region)){
	$region_id=$fetch_region['id'];
	echo $town=$fetch_region['town'];
	?>
    <option value="<?php echo $town; ?>"><?php echo $town; ?></option>
    <?php } ?>
    </select>