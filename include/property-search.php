<form method="post" action="search_property.php?property=<?php echo $sub_cat_id; ?>">
    <!--Search-->

<div id="vehicle_main">
    <div id="vehicle_first_search">Search in <?php echo $category_name; ?>:</div>
    <div id="vehicle_second_search">
    <input type="text" name="search_in" value="" placeholder="e.g, parking" />
    </div>
    <div id="vehicle_third">Location:</div>
    <div id="vehicle_forth">
    <input type="text" name="location" value="london" />
    
    </div>
    <div class="clear_both2"></div>
</div>

<div id="vehicle_main_search">
    <div id="vehicle_first_search">Min Beds:</div>
    <div id="vehicle_second_search">
    
    <select name="min_bed">
    <option value="">Any</option>
    <?php for($i=1;$i<=5;$i++){ ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php } ?>
    </select></div>
    <div id="vehicle_third_search">Max Bed:</div>
    <div id="vehicle_forth_search">
    <select name="max_bed">
    <option value="">Any</option>
    <?php for($j=1;$j<=5;$j++){ ?>
    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
    <?php } ?>
    </select>
    
    </div>
    <div class="clear_both2"></div>
</div>


	
    	<div id="vehicle_main_search">
    <div id="vehicle_first_search">Seller Type:</div>
    <div id="vehicle_second_search">
    
    
    <select name="seller_type">
    <option value="">Any</option>
    <option value="Agency">Agency</option>
    <option value="Private">Private</option>
    </select></div>
    <div id="vehicle_third_search">Property Type:</div>
    <div id="vehicle_forth_search">
    <select name="property_type">
    <option value="">Any</option>
    
    <option value="Flat">Flat</option>
    <option value="House">House</option>
    
    </select>
    
    </div>
    <div class="clear_both2"></div>
</div>

      
      
       

<div id="vehicle_main_search">
    <div id="vehicle_first_search">Price (per week):</div>
    <div id="vehicle_second_search"><input type="text" name="from_price"></div>
    <div id="vehicle_third_search"><input type="text" name="to_price"></div>
    <div id="vehicle_forth_search">
   &nbsp;
    
    </div>
    <div class="clear_both2"></div>
</div>
<div style="margin-left:200px;"><input type="submit" name="submit" value="Search"></div>
<!--END-->
    </form>