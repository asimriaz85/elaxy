<?php

	include("connection.php");
	 $q=$_REQUEST['q'];
	 
	 $select_model="SELECT id,make_id ,model FROM vehicle_make_mode WHERE make_id='".$q."'";
	 $run_model=mysql_query($select_model);
	 
	 
	 ?>
     
     <select name="model">
     <option value="">Any</option>
     <?php
	 while($fetch_model=mysql_fetch_array($run_model)){
		 $make_id=$fetch_model['make_id'];
		 $model=$fetch_model['model'];
?>
<option value="<?php echo $model; ?>"><?php echo $model; ?></option>
<?php
} ?>

</select>