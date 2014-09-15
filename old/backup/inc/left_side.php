<section class="left_search">

<form name="search-form" method="post" class="form">


<input type="text" id="name" name="username">
<div class="search_cate">

<select>
			<option>Select A Category</option>
           
</select>

</div>
<div class="search_cate">
<select>
			<option>Select A Region</option>
           
</select>

</div>
<input type="text" id="username" name="user">



<div class="search_cate">

<select>
			<option>Select A Category</option>
           
</select>

</div>
<div class="search_cate">
<select>
			<option>Select A Region</option>
           
</select>

</div>

<input type="submit" class="button position" name="button" id="button" value="Submit" />
</form>


<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>


<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>

<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>


<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>


	<section class="search-ad">
    <img src="images/web_protection-128.png" />
    <br />
    
    <?php if(isset($sub_cat_id)){  
	
	 $select_par="SELECT parent_off,name FROM categories WHERE id='".$sub_cat_id."' ";
	$run_par=mysql_query($select_par);
	$fetch_par=mysql_fetch_array($run_par);
	 $parent_d=$fetch_par['parent_off'];
	
	 $select_tips="SELECT * FROM safity_tipds WHERE cat_id='".$parent_d."'";
	$run_tips=mysql_query($select_tips);
	$fetch_tips=mysql_fetch_array($run_tips);
	$tips_des=$fetch_tips['tips_des'];
	?>
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