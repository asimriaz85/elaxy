<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000;">
           
           <div style="width:460px; float:left;">
              <form enctype="multipart/form-data" class="pure-form pure-form-stacked" action="/search_vechile.php" style="padding-left:10px;">
    <input type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id; ?>" />
    <fieldset>
        <legend>Refine Search</legend>
           
      <div class="adv-search">
      <div class="body black">

        
      <div class="col-md-4">              
         Make*:      
         <select name="make" class="form-control" onchange="showUser(this.value)">
       <?php 
	
	$select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='38' ORDER BY name ASC";
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
          </div>
        
       <div class="col-md-4"> Year*:
         
         <select name="year" class="form-control" >
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
        
       <div class="col-md-4">Model :     
          <input class="form-control"  type="text"  name="model" id="model">
          </div>
          <div class="col-md-4">Fuel Type*:   
         <select name="fuel_type" class="form-control">
    <option value="">Any</option>
    <option value="Petrol">Petrol</option>
     <option value="Diesel">Diesel</option>
      <option value="Other">Other</option>
    </select>
          </div>
          
          <div class="col-md-4">Body Type :   
         <select name="body_type" class="form-control">
	
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
          </div>
          
         <div class="col-md-4">Transmission :   
         <select name="transmission" class="form-control">
    <option value="">Any</option>
    
    <option value="Manual">Manual</option>
    <option value="Automatic">Automatic</option>
    <option value="Other">Other</option>
    
    </select>
          </div>
          
            <div class="col-md-4">Engine Size(CC):     
         <input type="text" name="engine_size" class="form-control" />
          </div>
            <div class="col-md-4">Mileage:    
          <input type="text" name="mileage" class="form-control" />
          </div>
          <div class="clear"></div>
     <h4>Price Range : </h4>
        <div class="clear"></div>
           <div class="col-md-4">From :     
        <input type="text" name="from_price" class="form-control">
          </div>
            <div class="col-md-4">To :    
         <input type="text" name="to_price" class="form-control">
          </div>
         
        </div>
    </div>
<div class="clear"></div>

<input type="submit" name="submit" value="Submit" style="float:right;" class="pure-button pure-button-primary" />
        
        </fieldset>
        </form> 
               
    </div>
               
               
               
     
      </div>  
        
       <div style="float:left">  
        <?php  if(!empty($right_ad['AdCode'])){ echo $right_ad['AdCode']; } else if(!empty($right_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $right_ad['Image']; ?>"> <?php }  ?>   
        </div>
    </div>

