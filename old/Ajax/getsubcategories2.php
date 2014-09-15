<script>
$(document).ready(function() {
		$('.preset_text3').click(function(){			
			var target3 = $(this).attr("id");
			
			
			
			$.post("getsubcategories3.php",
    {cat_id3: target3},
    function(data3){
        $('#result3').html(data3);
    });
		});
	});
</script>
<?php

	include("../connection.php");
	
	
	
	  $cat_id2=$_REQUEST['cat_id2']; 

?>
 <h4>Sub Category</h4>
 <div class="catHolder">
 
 					<?php
					$selectsubcategories2="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id2."' AND show_hide='Show'";
					$run_subcategories2=mysql_query($selectsubcategories2);
					while($fetch_subcategories2=mysql_fetch_array($run_subcategories2)){
						$subcategories2_id=$fetch_subcategories2['id'];
						$subcategories2_name=$fetch_subcategories2['name'];
					
					?>
                    <span class="preset_text3" id="<?php echo $subcategories2_id; ?>" onClick="javascript:display3(this.id)"><?php echo $subcategories2_name; ?></span>
                    <?php } ?>
                    
                </div>
                
                <script>
				$(document).ready( function()
{
    $("span").click( function()
    {
        $(".selected2").removeClass("selected2");
        $(this).addClass("selected2");
    } );
});
				</script>