
<section class="left_search">


<?php 


 $c_id=$_REQUEST['c_id'];
 $state_id=$_REQUEST['state_id'];
 $state_name=$_REQUEST['state_name'];

$parent_off=$_REQUEST['parent_off'];
 $select_parent_name="SELECT name,id FROM  categories WHERE id='".$parent_off."' order by name asc";
$run_parent=mysql_query($select_parent_name);
$fetch_parent_name=mysql_fetch_array($run_parent);
$parent_name=$fetch_parent_name['name'];
$pid=$fetch_parent_name['id'];
$parent_name; 

$cat="SELECT id,name FROM categories WHERE id='".$c_id."' order by name asc";
$run_cat=mysql_query($cat);
$fetch_cat=mysql_fetch_array($run_cat);
$category_name=ucfirst($fetch_cat['name']);


$total_parent_add = "SELECT id, COUNT(main_cat_id) FROM postcode_location WHERE main_cat_id='".$parent_off."'AND status='1'"; 
	 
$result_parent_ad = mysql_query($total_parent_add) or die(mysql_error());
$row_parent_ad = mysql_fetch_array($result_parent_ad);
	  $total_p_ad=$row_parent_ad['COUNT(main_cat_id)'];
	  
	  
	//Total CAt1 Ad//
 $total_sub1_add = "SELECT id, COUNT(sub_cat_id) FROM postcode_location WHERE sub_cat_id='".$c_id."' AND status='1'"; 
	 
$result_sub1_ad = mysql_query($total_sub1_add) or die(mysql_error());
$row_sub1_ad = mysql_fetch_array($result_sub1_ad);
	  $total_sub1_ad=$row_sub1_ad['COUNT(sub_cat_id)'];
//End//


?>
<ul id="list">
    <li style="color:#FFF;"><a href="left_search_main.php?df=main_cat_id&sub_cat_id=<?php echo $pid; ?>" style="color:#FFF;"><?php echo $parent_name ?>&nbsp;<?php echo "($total_p_ad)"; ?></a>
    <ul>
        <li style="color:#FFF;"><a href="view.php?sub_cat_id=<?php echo $c_id; ?>&df=sub_cat_id&sub_cat_name=<?php echo $pname; ?>" style="color:#FFF;"><?php echo $pname; ?>&nbsp;<?php echo "($total_sub1_ad)"; ?></a>
        <ul>
        
        <?php 
 $select_cat="SELECT * FROM categories WHERE id='".$sub_cat_id."' order by name asc";
$run_select_cat=mysql_query($select_cat);
while($fetch_select_cat=mysql_fetch_array($run_select_cat)){
	
	$cat_id=$fetch_select_cat['id'];
	$parent_off=$fetch_select_cat['parent_off'];
	$cat_name=ucfirst($fetch_select_cat['name']);
	
	
	//Total CAt1 Ad//
 $total_subsub_add = "SELECT id, COUNT(sub_sub_cat) FROM postcode_location WHERE sub_sub_cat='".$cat_id."' AND status='1'"; 
	 
$result_subsub_add = mysql_query($total_subsub_add) or die(mysql_error());
$row_subsub_add = mysql_fetch_array($result_subsub_add);
	  $total_subsub_add=$row_subsub_add['COUNT(sub_sub_cat)'];
//End//
	
?>
            <li><a <?php if($cat_id==$sub_cat_id){?>  class="leftside_selected"  href="#"<?php } if($cat_id!=$sub_cat_id){ ?>  style="color:#FFF;" href="left_search.php?sub_cat_id=<?php echo $cat_id; ?>&parent_off=<?php echo $parent_off; ?>&c_id=<?php echo $c_id; ?>"<?php } else{ ?> style="color:#000;"<?php } ?>><?php echo $cat_name; ?>&nbsp;<?php echo "($total_subsub_add)"; ?></a></li>
           
           <?php } ?>
           
            </li>
        </ul>
        </li>
        
        
        </li>
    </ul>


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


</section><br />


	<section class="search-ad">
    <!--<img src="images/web_protection-128.png" />-->
    <br />
    
    <?php if(isset($sub_cat_id)){  
	
	 $select_par="SELECT parent_off,name FROM categories WHERE id='".$sub_cat_id."'  order by name asc";
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
    
    <div style="color:#FFF;"><?php echo $name." "."Safety Tips"; ?></div>
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