
<section class="left_search">
<?php

	  $select_cat_parent="SELECT id,name,parent_off FROM categories WHERE id='".$sub_cat_id."'";
	$run_cat_parent=mysql_query($select_cat_parent);
	$fetch_cat_parent=mysql_fetch_array($run_cat_parent);
	 $parent_categories=$fetch_cat_parent['parent_off'];


$select_parent_category="SELECT id,name FROM categories WHERE id='".$parent_categories."' order by name asc";
$run_parent_category=mysql_query($select_parent_category);

?>
<ul id="list">
<?php 
while($fetch_parent=mysql_fetch_array($run_parent_category)){
	$parent_id=$fetch_parent['id'];
$parent_cat=($fetch_parent['name']);

	$total_parent_add = "SELECT id, COUNT(main_cat_id) FROM postcode_location WHERE main_cat_id='".$parent_id."'AND status='1'"; 
	 
$result_parent_ad = mysql_query($total_parent_add) or die(mysql_error());
$row_parent_ad = mysql_fetch_array($result_parent_ad);
	  $total_p_ad=$row_parent_ad['COUNT(main_cat_id)'];
	  

?>

    <li style="color:#000;"><?php echo $parent_cat; ?>&nbsp;<?php echo "($total_p_ad)"; ?>
    <ul>
    <?php 

$select_child="SELECT id,name FROM categories WHERE parent_off='".$parent_id."' order by name asc";
$run_child=mysql_query($select_child);
$fetch_child=mysql_fetch_array($run_child);
$child_id=$fetch_child['id'];
$child_name=ucfirst($fetch_child['name']);


//Total CAt1 Ad//
 $total_sub1_add = "SELECT id, COUNT(sub_cat_id) FROM postcode_location WHERE sub_cat_id='".$child_id."' AND status='1'"; 
	 
$result_sub1_ad = mysql_query($total_sub1_add) or die(mysql_error());
$row_sub1_ad = mysql_fetch_array($result_sub1_ad);
	  $total_sub1_ad=$row_sub1_ad['COUNT(sub_cat_id)'];
//End//

?>

        <li style="color:#000;"><?php echo $child_name; ?>&nbsp;<?php echo "($total_sub1_ad)"; ?>
        <ul>
        <?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$child_id."' LIMIT 0,3";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	$cat_name=ucfirst($fetch_select_cat['name']);
	
	//Total CAt1 Ad//
$total_subsub_add = "SELECT id, COUNT(sub_sub_cat) FROM postcode_location WHERE sub_sub_cat='".$cat_id."' AND status='1'"; 
	 
$result_subsub_add = mysql_query($total_subsub_add) or die(mysql_error());
$row_subsub_add = mysql_fetch_array($result_subsub_add);
	  $total_subsub_add=$row_subsub_add['COUNT(sub_sub_cat)'];
//End//

?>
            <li><a <?php if($cat_id==$sub_cat_id){?>  class="leftside_selected"  href="#"<?php } if($cat_id!=$sub_cat_id){ ?>  style="color:#FFF;" href="left_search.php?sub_cat_id=<?php echo $cat_id; ?>&parent_off=<?php echo $parent_id; ?>&c_id=<?php echo $child_id; ?>"<?php } ?>><?php echo ucfirst($cat_name); ?>&nbsp;<?php echo "($total_subsub_add)"; ?></a></li>
           <?php } ?>
           <li id='more' style="cursor:pointer;">View more</li>
           
            <?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$child_id."' LIMIT 0,3";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	$cat_name=ucfirst($fetch_select_cat['name']);
	
	//Total CAt1 Ad//
$total_subsub_add = "SELECT id, COUNT(sub_sub_cat) FROM postcode_location WHERE sub_sub_cat='".$cat_id."' AND status='1'"; 
	 
$result_subsub_add = mysql_query($total_subsub_add) or die(mysql_error());
$row_subsub_add = mysql_fetch_array($result_subsub_add);
	  $total_subsub_add=$row_subsub_add['COUNT(sub_sub_cat)'];
//End//

?>
            <li id="<?php echo $cat_id; ?>" style="display:none;"><a <?php if($cat_id==$sub_cat_id){?>  class="leftside_selected"  href="#"<?php } if($cat_id!=$sub_cat_id){ ?>  style="color:#FFF;" href="left_search.php?sub_cat_id=<?php echo $cat_id; ?>&parent_off=<?php echo $parent_id; ?>&c_id=<?php echo $child_id; ?>"<?php } ?>><?php echo ucfirst($cat_name); ?>&nbsp;<?php echo "($total_subsub_add)"; ?></a></li>
           <?php } ?>
           
           <br /><li id='less' style='display:none; cursor:pointer;'>View less</li>
            </li>
        </ul>
        </li>
        
        
        </li>
        <?php } ?>
    </ul>
<script>
$('#more').click(function(){
    $('#more').css('display','none');
	<?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$child_id."' LIMIT 5,300";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	?>
    $('#<?php echo $cat_id; ?>').css('display','inline');
     <?php } ?> 
    $('#less').css('display','inline');    
});
                 
$('#less').click(function(){
    $('#less').css('display','none');
	<?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$child_id."' LIMIT 5,300";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	?>
    $('#<?php echo $cat_id; ?>').css('display','none');
   <?php } ?>   
    $('#more').css('display','inline');    
});
</script>

<section class="search-ad">
<?php  $select_states="SELECT id,state_name FROM states ORDER BY state_name"; ?>

<ul class="leftside_ul">

<?php 


$run_states=mysql_query($select_states);
while($fetch_states=mysql_fetch_array($run_states)){
	$state_id=$fetch_states['id'];
	$state_name=$fetch_states['state_name'];
	
	
	

?>
 <li><a style="color:#FFF;" href="#"><?php echo $state_name; ?></a>
 </li>
 <?php } ?>
 
</ul>


</section>


	<section class="search-ad">
<!--    <img src="images/web_protection-128.png" />
-->    <br />
    
    <?php if(isset($sub_cat_id)){  
	
	 $select_par="SELECT parent_off,name FROM categories WHERE id='".$sub_cat_id."' ";
	$run_par=mysql_query($select_par);
	$fetch_par=mysql_fetch_array($run_par);
	 $parent_d=$fetch_par['parent_off'];
	 	 $name=ucfirst($fetch_par['name']);

	
	 $select_tips="SELECT * FROM safity_tipds WHERE cat_id='".$parent_d."'";
	$run_tips=mysql_query($select_tips);
	$num_rows=mysql_num_rows($run_tips);
	$fetch_tips=mysql_fetch_array($run_tips);
	$tips_des=$fetch_tips['tips_des'];
	if($num_rows > 0){
	?>
    
    <div style="color:#FFF;"><?php echo $name." "."Safity Tipe"; ?></div>
    <?php } ?>
    <div style="color:#FFF"><?php echo $tips_des ?></div>
    <?php } ?>
    
    <?php if(isset($parent_categories)){  
	
	 
	
	 $select_tips2="SELECT * FROM safity_tipds WHERE cat_id='".$parent_categories."'";
	$run_tips2=mysql_query($select_tips2);
	$fetch_tips2=mysql_fetch_array($run_tips2);
	$tips_des2=$fetch_tips2['tips_des'];
	?>
    <div style="color:#FFF"><?php echo $tips_des2 ?></div>
    <?php } ?>
    
    </section>
    

 </section>