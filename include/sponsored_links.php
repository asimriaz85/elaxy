<div id="sponsered_div">
    <span>Sponsored Link</span> 
    </div>
<div style="min-height:270px;">
    <?php 
	$select_sponsored="SELECT id,title,weblink,description,image FROM sponsored_links WHERE show_hide='Show' ";
	$run_sponsored=mysql_query($select_sponsored);
	while($fetch_sponsored=mysql_fetch_array($run_sponsored)){
		
		echo $sponsored_description=$fetch_sponsored['description'];
	?>
    
<?php } ?>

</div>