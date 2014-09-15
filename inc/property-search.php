
<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000;">
               <div style="width:460px; float:left;">
    <form enctype="multipart/form-data" class="pure-form pure-form-stacked" action="/search_property.php" style="padding-left:10px;">
    <input type="hidden" name="sub_cat_id" value="<?php echo $sub_cat_id; ?>" />
    <fieldset>
        <legend>Refine Search</legend>
        
         <div class="adv-search">
      <div class="body black">

        
      <div class="col-md-4"> 
      Search in <?php echo $category_name; ?>:* 
       <input type="text" name="search_in" value="" class="form-control" />
      
      
      </div>

 <div class="col-md-4"> 
 Location*:
  <input type="text" name="location" value="london" class="form-control" />
      
      </div>
       <div class="col-md-4"> 
      Min Beds:*:
      
      <select name="min_bed" class="form-control">
    <option value="">Any</option>
    <?php for($i=1;$i<=5;$i++){ ?>
    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php } ?>
     <option value="5+">5+</option>
    </select>
      
      </div>
      
       <div class="col-md-4"> 
       Max Bed*:
       <select name="max_bed" class="form-control">
    <option value="">Any</option>
    <?php for($j=1;$j<=5;$j++){ ?>
    <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
    <?php } ?>
     <option value="5+">5+</option>
    </select>
      </div>
      
      
       <div class="col-md-4"> 
      Seller Type:*
       <select name="seller_type" class="form-control">
    <option value="">Any</option>
    <option value="Agency">Agency</option>
    <option value="Private">Private</option>
    </select>
      </div>
      
       <div class="col-md-4"> 
      Property Type:*
       <select name="property_type" class="form-control">
    <option value="">Any</option>
    
    <option value="Flat">Flat</option>
    <option value="House">House</option>
    
    </select>
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
        
        
        
      
        
     
<div class="clear"></div>

<input type="submit" name="submit" value="Submit" class="pure-button pure-button-primary" />
        
        </fieldset>
        </form>     
        </div>
        
        
        <div style="float:left">  
        <?php  if(!empty($right_ad['AdCode'])){ echo $right_ad['AdCode']; } else if(!empty($right_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $right_ad['Image']; ?>"> <?php }  ?>   
        </div>
        
        
    </div>

