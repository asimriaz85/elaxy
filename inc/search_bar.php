<div class="search-bar">
<form method="post" action="/search_result.php" enctype="multipart/form-data">
<div class="search1" style="width:300px; border-radius:5px;"><input type="text" name="name" placeholder="What are you looking for ?" style="width:250px;" /></div>

<div class="select_cate" >

<select name="parent_categories" >
			<option value="">Select A Category</option>
            <?php 
$select_cat="SELECT id,name FROM  categories WHERE show_hide='Show' AND parent_off='0' order by name asc"; 
$run_select_cat=mysql_query($select_cat);
while($fetch_categories=mysql_fetch_array($run_select_cat)){
$cat_id=$fetch_categories['id'];
$cat_name=$fetch_categories['name'];
?>
<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
<?php } ?>
           
</select>


</div>

<div class="search1" style="width:175px; border-radius:5px;">
<input type="text" name="region" style="width:135px;"  placeholder="Postcode or Location"/>
<!--<select name="region">
			<option value="">Select A Region</option>
           <?php 
//$select_county="SELECT id,county_name FROM county ORDER BY county_name asc"; 
//$run_select_county=mysql_query($select_county);
//while($fetch_county=mysql_fetch_array($run_select_county)){
//$county_id=$fetch_county['id'];
//$county_name=$fetch_county['county_name'];

?>
<option value="<?php //echo $county_id; ?>"><?php //echo $county_name; ?></option>
<?php //} ?>
</select>-->


</div>
<div class="select_cate" style="margin:24px 0 0 3px; width:100px;">
<select name="miles" style="width:90px;">
			 
              <option data-depth="0" value="0.5">+ 1/2 mile</option>
                 <option data-depth="0" value="1.0">+ 1 mile</option>
                <option data-depth="0" value="3.0">+ 3 miles</option>
                 <option data-depth="0" value="5.0">+ 5 miles</option>
                <option data-depth="0" value="10.0">+ 10 miles</option>
                 <option data-depth="0" value="15.0">+ 15 miles</option>
                <option data-depth="0" value="30.0">+ 30 miles</option>
                <option data-depth="0" value="50.0">+ 50 miles</option>
                <option data-depth="0" value="75.0">+ 75 miles</option>
                 <option data-depth="0" value="100.0">+ 100 miles</option>
                <option data-depth="0" value="150.0">+ 150 miles</option>
                <option data-depth="0" value="250.0">+ 250 miles</option>
                 <option data-depth="0" value="500.0">+ 500 miles</option>
                <option data-depth="0" value="1000.0">Nationwide</option>
            </select>
</div>





<div class="sb_b"><input type="submit" value="" name="submit" /></div>


</form>


</div>