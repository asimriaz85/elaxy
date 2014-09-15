
<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000;">
               
    <form enctype="multipart/form-data" class="pure-form pure-form-stacked" action="search_vechile.php" style="padding-left:10px;">
    <input type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id; ?>" />
    <fieldset>
        <legend>Refine Search</legend>
         <div class="pure-u-1 pure-u-med-1-3">
         <label>Make*: </label>
       <select name="make" class="pure-input-2-3" onchange="showUser(this.value)">
       <?php 
	
	$select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$sub_cat_id."'";
	$run_make=mysql_query($select_make);
	?>
	<option value="">Any</option>
    <?php 
	
	while($fetch_make=mysql_fetch_array($run_make)){
		$make_id=$fetch_make['id'];
		$make_name=$fetch_make['name'];
	?>
        <option value="<?php echo $make_id; ?>"<?php if($child2_id==$make_id){?> selected="selected"<?php } ?>><?php echo $make_name; ?> </option>
        <?php } ?>
        </select>
        <label>Year*: </label>
    
         <select name="year" class="pure-input-2-3" >
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
       <div class="pure-u-1 pure-u-med-1-3">  
        <label>Model*: </label>
        <div id="txtHint">
        <select name="model"  class="pure-input-2-3">
    <option value="">Any</option>
    </select>
    </div>
         <label>Fuel Type*: </label>
        <select name="fuel_type" class="pure-input-2-3">
    <option value="">Any</option>
    <option value="Petrol">Petrol</option>
     <option value="Diesel">Diesel</option>
      <option value="Other">Other</option>
    </select>


</div>
        
        <div class="pure-u-1 pure-u-med-1-3">  
        <label>Body Type: </label>
        <select name="body_type" class="pure-input-2-3">
	
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
    
    
    </select>
         <label>Transmission*: </label>
       <select name="transmission" class="pure-input-2-3">
    <option value="">Any</option>
    
    <option value="Manual">Manual</option>
    <option value="Automatic">Automatic</option>
    <option value="Other">Other</option>
    
    </select>


</div>	
        
    <div class="pure-u-1 pure-u-med-1-3">  
        <label>Engine Size(CC): </label>
        <input type="text" name="engine_size" class="pure-input-2-3" />
         <label>Mileage: </label>
         <input type="text" name="mileage" class="pure-input-2-3" />

</div>    
        <h4>Price Range:</h4>
        <div class="pure-u-1 pure-u-med-1-3">  
        <label>From : </label>
        <input type="text" name="from_price" class="pure-input-2-3">
        </div>
        <div class="pure-u-1 pure-u-med-1-3">  
         <label>To: </label>
         <input type="text" name="to_price" class="pure-input-2-3">

</div>
<div class="clear"></div>
<p></p>
<input type="submit" name="submit" value="Submit" class="pure-button pure-button-primary" />
        
        </fieldset>
        </form>     
    </div>

