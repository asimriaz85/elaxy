
<?php

	include("../connection.php");
	
	
	
	  $cat_id4=$_REQUEST['cat_id4']; 

?>
 <h4>Sub Category</h4>
 <div class="catHolder">
 
 					<?php
					$selectsubcategories4="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id4."' AND show_hide='Show'";
					$run_subcategories4=mysql_query($selectsubcategories4);
					while($fetch_subcategories4=mysql_fetch_array($run_subcategories4)){
						$subcategories4_id=$fetch_subcategories4['id'];
						$subcategories4_name=$fetch_subcategories4['name'];
					
					?>
                    <span class="preset_text5" id="<?php echo $subcategories4_id; ?>" onClick="javascript:display5(this.id)"><?php echo $subcategories4_name; ?></span>
                    <?php } ?>
                    
                </div>
                
                <script>
				$(document).ready( function()
{
    $("span").click( function()
    {
        $(".selected4").removeClass("selected4");
        $(this).addClass("selected4");
    } );
});
				</script>