<div class="search-bar">
<form method="post" action="search_result.php" enctype="multipart/form-data">
<div class="search1"><input type="text" name="name" placeholder="What are you looking for ?" /></div>

<div class="select_cate">

<select name="parent_categories">
			<option>Select A Category</option>
            <?php 
$select_cat="SELECT id,name FROM  categories WHERE show_hide='Show' AND parent_off='0'"; 
$run_select_cat=mysql_query($select_cat);
while($fetch_categories=mysql_fetch_array($run_select_cat)){
$cat_id=$fetch_categories['id'];
$cat_name=$fetch_categories['name'];
?>
<option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
<?php } ?>
           
</select>


</div>

<div class="select_cate">

<select name="region">
			<option>Select A Region</option>
           <?php 
$select_county="SELECT id,county_name FROM county ORDER BY county_name"; 
$run_select_county=mysql_query($select_county);
while($fetch_county=mysql_fetch_array($run_select_county)){
$county_id=$fetch_county['id'];
$county_name=$fetch_county['county_name'];

?>
<option value="<?php echo $county_id; ?>"><?php echo $county_name; ?></option>
<?php } ?>
</select>


</div>

<div class="sb_b"><input type="submit" value="" name="submit" /></div>





</form>


</div>