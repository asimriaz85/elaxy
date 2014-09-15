






<div id="left_side">
    <div id="form_main_div">
    <form method="post" name="" action="left_search.php?sub_cat_id=<?php echo $sub_cat_id; ?>" enctype="multipart/form-data">
  
  <div>Search Only:</div>
   <div id="left_view_div_input">
   <input type="checkbox" name="urgent" value="urgnet" />&nbsp;&nbsp;Urgent ads
  </div>
  <div id="left_view_div_input">
   <input type="checkbox" name="feature" value="feature" />&nbsp;&nbsp;Featured ads
  </div>
  
  <div id="left_view_div_input">
   <input type="checkbox" name="image_only" value="image_only" />&nbsp;&nbsp;Only ads with pictures
  </div>
   
    <div id="left_view_div_input"><input type="submit" name="search" value="Search"></div>
    
    
    <div id="left_view_div_input">
   <a href="#">All categories</a>
   </div>
   
   <div id="left_view_div_input">
   
   <ul id="infopanel">
   <?php 
   
    $select_categories="SELECT id ,name,show_hide,parent_off FROM categories WHERE show_hide='Show' AND id='".$sub_cat_id."'"; 
   $run_select_query=mysql_query($select_categories);
   $fetch_select_cquery=mysql_fetch_array($run_select_query);
  $subcategory_name=$fetch_select_cquery['name'];
  $subcategory_p_id=$fetch_select_cquery['parent_off'];
  
   $select_main_category="SELECT id,name,show_hide FROM categories WHERE show_hide='Show' AND id='".$subcategory_p_id."'";
  $run_select_main_category=mysql_query($select_main_category);
  $fetch_select_main_cat=mysql_fetch_array($run_select_main_category);
  $main_category=$fetch_select_main_cat['name'];
  
  $select_num_sub_cat="SELECT id,user_id,sub_cat_id FROM postcode_location WHERE sub_cat_id='".$sub_cat_id."'";
  $run_num_sub_cat=mysql_query($select_num_sub_cat);
  $num_rows_sub_cat=mysql_num_rows($run_num_sub_cat);
   
   ?>
   		<li><?php echo $main_category; ?></li>
   		<li><?php echo $subcategory_name."&nbsp;&nbsp;(".$num_rows_sub_cat.")"; ?></li>
        <?php 
		 $select_sub_cat1="SELECT id,name,show_hide,parent_off FROM categories WHERE show_hide='Show' AND parent_off='".$sub_cat_id."'";
		$run_sub_cat1=mysql_query($select_sub_cat1);
		while($fetch_sub_cat1=mysql_fetch_array($run_sub_cat1)){
			
			$sub_cat1_name=$fetch_sub_cat1['name'];
			 $sub_cat1_id=$fetch_sub_cat1['id'];
			 
			 
			 
			
			$select_sub_sub_cat="SELECT id,user_id,COUNT(sub_sub_cat) FROM postcode_location WHERE sub_sub_cat='".$sub_cat1_id."' ";
			$run_sub_sub_cat=mysql_query($select_sub_sub_cat);
			$fetch_sub_sub_cat=mysql_fetch_array($run_sub_sub_cat);
			$number_rows=$fetch_sub_sub_cat['COUNT(sub_sub_cat)'];
		?>
        <li><a href="left_search2.php?sub_cat_id=<?php echo $sub_cat_id; ?>&sub_cat1_id=<?php echo $sub_cat1_id; ?>"><?php echo $sub_cat1_name."&nbsp;&nbsp;(".$number_rows.")"; ?></a></li>
   <?php } ?>
   </ul>
   </div>
    <div class="showmore">+ More Details</div>
    </form>
   <div class="clear_both"></div>
   
   <div id="left_view_div_input">
   <a href="view.php?sub_cat_id=<?php echo $sub_cat_id; ?>">United Kindom</a>
   </div>
<div id="left_view_div_input">
   
   <ul id="">
   <?php 
   
   $select_countries="SELECT id ,country_name FROM  kingdom_countries WHERE id='".$country_id01."'"; 
   $run_select_counties=mysql_query($select_countries);
  $fetch_select_countries=mysql_fetch_array($run_select_counties);
  $country_id02=$fetch_select_countries['id'];
  $country_name=$fetch_select_countries['country_name'];
  
  
   
   
   ?>
   		<li><a href="country_wise.php?country_id=<?php echo $country_id02; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>"><?php echo $country_name; ?></a></li>
        
        <?php 
		
		$select_country_state="SELECT id,country_id,state_name FROM country_state WHERE country_id='".$country_id02."'";
		$run_country_state=mysql_query($select_country_state);
		while($fetch_state=mysql_fetch_array($run_country_state)){
			$state_id=$fetch_state['id'];
			$state_name=$fetch_state['state_name'];
		?>
   		<li><a href="country_wise.php?state_id=<?php echo $state_id; ?>&country_id=<?php echo $country_id02; ?>"><?php echo $state_name; ?></a></li>
       
   <?php } ?>
   </ul>
   <!-- <div class="showmore2">+ More Details</div>-->
   </div>
   <div class="clear_both"></div>
   
   <div id="small_box"></div>
   
   <div id="small_box"></div>
   
   <div id="small_box"></div>
    </div>
    
    
    <div class="clear_both"></div>
    </div>