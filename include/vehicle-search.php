<form method="post" action="search_vechile.php?car=<?php echo $sub_cat_id; ?>">
    <!--Search-->

<div id="vehicle_main">
    <div id="vehicle_first_search">Make*:</div>
    <div id="vehicle_second_search">
    
    <?php 
	
	$select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$sub_cat_id."'";
	$run_make=mysql_query($select_make);
	?>
    <select name="make" onchange="showUser(this.value)">
	<option value="">Any</option>
    <?php 
	
	while($fetch_make=mysql_fetch_array($run_make)){
		$make_id=$fetch_make['id'];
		$make_name=$fetch_make['name'];
	?>
    <option value="<?php echo $make_id; ?>"<?php if($child2_id==$make_id){?> selected="selected"<?php } ?>><?php echo $make_name; ?></option>
    <?php } ?>
    </select></div>
    <div id="vehicle_third">Year*:</div>
    <div id="vehicle_forth">
    <select name="year">
    <option value="">Any</option>
    <?php 
	$currentYear = date("Y"); 
	$years = range ($currentYear, 1930); 
	foreach ($years as $value) {
echo "<option value=\"$value\">$value</option>\n";
} 
	?>
    
    
    </select>
    
    </div>
    <div class="clear_both2"></div>
</div>

<div id="vehicle_main_search">
    <div id="vehicle_first_search">Model*:</div>
    <div id="vehicle_second_search">
    <div id="txtHint">
    <select name="model">
    <option value="">Any</option>
    </select></div></div>
    <div id="vehicle_third_search">Fuel Type*:</div>
    <div id="vehicle_forth_search">
    <select name="fuel_type">
    <option value="">Any</option>
    <option value="Petrol">Petrol</option>
     <option value="Diesel">Diesel</option>
      <option value="Other">Other</option>
    </select>
    
    </div>
    <div class="clear_both2"></div>
</div>


	
    	<div id="vehicle_main_search">
    <div id="vehicle_first_search">Body Type:</div>
    <div id="vehicle_second_search">
    
    
    <select name="body_type">
	
    <option value="">Any</option>
    <option value="2 Door Saloon">2 Door Saloon</option>
    <option value="4 Door Saloon">4 Door Saloon</option>
    <option value="Saloon">Saloon</option>
    <option value="Convertible">Convertible</option>
    <option value="Coupe">Coupe</option>
    <option value="Estate">Estate</option>
    <option value="3 Door Hatchback">3 Door Hatchback</option>
    <option value="5 Door Hatchback">5 Door Hatchback</option>
    <option value="Sports">Sports</option>
    <option value="Light 4x4 Utility">Light 4x4 Utility</option>
     <option value="MPV">MPV</option>
      <option value="Other">Other</option>
    
    
    </select></div>
    <div id="vehicle_third_search">Transmission*:</div>
    <div id="vehicle_forth_search">
    <select name="transmission">
    <option value="">Any</option>
    
    <option value="Manual">Manual</option>
    <option value="Automatic">Automatic</option>
    <option value="Other">Other</option>
    
    </select>
    
    </div>
    <div class="clear_both2"></div>
</div>

      
      
      <div id="vehicle_main_search">
    <div id="vehicle_first_search">Engine Size(CC):</div>
    <div id="vehicle_second_search"><input type="text" name="engine_size" /></div>
    <div id="vehicle_third_search">Mileage</div>
    <div id="vehicle_forth_search">
    <input type="text" name="mileage" />
    
    </div>
    <div class="clear_both2"></div>
</div> 

<div id="vehicle_main_search">
    <div id="vehicle_first_search">Price Range:</div>
    <div id="vehicle_second_search">From&nbsp;<input type="text" name="from_price"></div>
    <div id="vehicle_third_search">to</div>
    <div id="vehicle_forth_search">
   <input type="text" name="to_price">
    
    </div>
    <div class="clear_both2"></div>
</div>
<div style="margin-left:200px;"><input type="submit" name="submit" value="Search"></div>
<!--END-->
    </form>