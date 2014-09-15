

<section class="left_search">

<ul id="list" class="leftside_ul">
    <li style="color:#000;"><?php echo $category_name; ?>&nbsp;<?php echo "($total_p_ad)"; ?>
    <ul>
        
        <?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$sub_cat_id."' order by name asc LIMIT 0,5";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	$cat_name=ucfirst($fetch_select_cat['name']);
	
	//Total CAt1 Ad//
$total_subsub_add = "SELECT id, COUNT(sub_cat_id) FROM postcode_location WHERE sub_cat_id='".$cat_id."' AND status='1'"; 
	 
$result_subsub_add = mysql_query($total_subsub_add) or die(mysql_error());
$row_subsub_add = mysql_fetch_array($result_subsub_add);
	  $total_subsub_add=$row_subsub_add['COUNT(sub_cat_id)'];
//End//

?>
            <li style="font-size:12px;"><a <?php if($cat_id==$sub_cat_id){?>  class="leftside_selected"  href="#"<?php } if($cat_id!=$sub_cat_id){ ?>  style="color:#FFF;" href="view.php?sub_cat_id=<?php echo $cat_id; ?>&sub_cat_name=<?php echo $cat_name; ?>&df=sub_cat_id"<?php } ?>><?php echo $cat_name; ?>&nbsp;<?php echo "($total_subsub_add)"; ?></a></li>
           
           <?php } ?>
           
            <li id='more' style="cursor:pointer;">See full List</li>
           
           <?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$sub_cat_id."' order by name asc LIMIT 5,300";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	$cat_name=ucfirst($fetch_select_cat['name']);
	
	//Total CAt1 Ad//
$total_subsub_add = "SELECT id, COUNT(sub_cat_id) FROM postcode_location WHERE sub_cat_id='".$cat_id."' AND status='1'"; 
	 
$result_subsub_add = mysql_query($total_subsub_add) or die(mysql_error());
$row_subsub_add = mysql_fetch_array($result_subsub_add);
	  $total_subsub_add=$row_subsub_add['COUNT(sub_cat_id)'];
//End//

?>
            <li id="<?php echo $cat_id; ?>" style="font-size:12px; display:none;"><a <?php if($cat_id==$sub_cat_id){?>  class="leftside_selected"  href="#"<?php } if($cat_id!=$sub_cat_id){ ?>  style="color:#FFF;" href="left_search.php?sub_cat_id=<?php echo $cat_id; ?>&parent_off=<?php echo $parent_off; ?>&c_id=<?php echo $c_id; ?>"<?php } ?>><?php echo $cat_name; ?>&nbsp;<?php echo "($total_subsub_add)"; ?></a></li>
           
           <?php } ?>
            <br /><li id='less' style='display:none; cursor:pointer;'>less</li>
            </li>
        
        </li>
        
        
        </li>
    </ul>
<script>
$('#more').click(function(){
    $('#more').css('display','none');
	<?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$sub_cat_id."' LIMIT 5,300";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	?>
    $('#<?php echo $cat_id; ?>').css('display','block');
     <?php } ?> 
    $('#less').css('display','block');    
});
                 
$('#less').click(function(){
    $('#less').css('display','none');
	<?php 
$select_cat="SELECT * FROM categories WHERE parent_off='".$sub_cat_id."' LIMIT 5,300";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	?>
    $('#<?php echo $cat_id; ?>').css('display','none');
   <?php } ?>   
    $('#more').css('display','block');    
});
</script>



<section class="search-ad">
<?php  $select_states="SELECT id,state_name FROM states ORDER BY state_name"; ?>

<ul class="leftside_ul">
<li style="color:#000;">United Kingdom</li>
<?php 


$run_states=mysql_query($select_states);
while($fetch_states=mysql_fetch_array($run_states)){
	$state_id=$fetch_states['id'];
	$state_name=$fetch_states['state_name'];
	
	
	

?>
 <li style="margin-left:10px;"><a style="color:#FFF;" href="left_search.php?state_id=<?php echo $state_id;?>&state_name=<?php echo $state_name; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&parent_off=<?php echo $parent_off; ?>&c_id=<?php echo $c_id; ?>"><?php echo $state_name; ?></a>
 </li>
 <?php } ?>
 
</ul>


</section>




<br />



	<section class="search-ad" style="margin-top:130px; margin-left:-132px;">
    <!--<img src="images/web_protection-128.png" />-->
    <br />
    
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