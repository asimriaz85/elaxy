
<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000;">
               
    <form enctype="multipart/form-data" class="pure-form pure-form-stacked" action="search_property.php" style="padding-left:10px;">
    <input type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id; ?>" />
    <fieldset>
        <legend>Refine Search</legend>
         <div class="pure-u-1 pure-u-med-1-3">
         <label>Search in <?php echo $category_name; ?>:* </label>
       <input type="text" name="search_in" value="" class="pure-input-2-3" />
        <label>Location*: </label>
    
         <input type="text" name="location" value="london" class="pure-input-2-3" />

   </div>
       <div class="pure-u-1 pure-u-med-1-3">  
        <label>Min Beds:*: </label>
        <select name="min_bed" class="pure-input-2-3">
    <option value="">Any</option>
    <?php for($i=1;$i<=5;$i++){ ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php } ?>
    </select>
         <label>Max Bed*: </label>
        <select name="max_bed" class="pure-input-2-3">
    <option value="">Any</option>
    <?php for($j=1;$j<=5;$j++){ ?>
    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
    <?php } ?>
    </select>


</div>
        
        <div class="pure-u-1 pure-u-med-1-3">  
        <label>Seller Type:* </label>
        <select name="seller_type" class="pure-input-2-3">
    <option value="">Any</option>
    <option value="Agency">Agency</option>
    <option value="Private">Private</option>
    </select>
         <label>Property Type:* </label>
       <select name="property_type" class="pure-input-2-3">
    <option value="">Any</option>
    
    <option value="Flat">Flat</option>
    <option value="House">House</option>
    
    </select>


</div>	
        
        
        <h4>Price (per week):</h4>
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

