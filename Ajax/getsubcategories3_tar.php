<script>
$(document).ready(function() {
		$('.preset_text4').click(function(){			
			var target4 = $(this).attr("id");
			
			
			
			$.post("Ajax/getsubcategories4.php",
    {cat_id4: target4},
    function(data4){
        $('#result4').html(data4);
    });
		});
	});
</script>
<?php

	include("../connection.php");
	
	
	
	   $cat_id3=$_REQUEST['cat_id3']; 
	   
	   
					 $selectsubcategories3="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id3."' AND show_hide='Show'";
					$run_subcategories3=mysql_query($selectsubcategories3);
					
					  $num_rows3=mysql_num_rows($run_subcategories3);
if($num_rows3 >0){
?>
 <h4>Sub Category</h4>
 <div class="catHolder">
 
 					<?php
					
					while($fetch_subcategories3=mysql_fetch_array($run_subcategories3)){
						$subcategories3_id=$fetch_subcategories3['id'];
						$subcategories3_name=$fetch_subcategories3['name'];
					
					?>
                    <span class="preset_text4" id="<?php echo $subcategories3_id; ?>" onClick="javascript:display4(this.id)"><?php echo ucfirst($subcategories3_name); ?></span>
                    
                    <?php }  
                     ?>
                    
                </div>
                
                <?php
}
                if($num_rows3=="0"){
					
						?>
						
						<input id="category-select_submit-category" name="submit-category" class="button pull-right" value="Continue" data-parent-component="#post-ad-category-select" type="submit">
						
						<?php
						 
					 }
                     ?>
                     
                     <div id="result4"></div>
                
                
                <script>
				$(document).ready( function()
{
    $("span").click( function()
    {
        $(".selected3").removeClass("selected3");
        $(this).addClass("selected3");
    } );
});
				</script>