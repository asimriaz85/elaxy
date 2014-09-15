
<script>
$(document).ready(function() {
		$('.preset_text2').click(function(){			
			var target2 = $(this).attr("id");
			
			
			
			$.post("Ajax/getsubcategories2.php",
    {cat_id2: target2},
    function(data2){
        $('#result2').html(data2);
    });
		});
	});
	
	
</script>

<?php

	include("../connection.php");
	
	
	
	  $cat_id=$_REQUEST['cat_id']; 

?>
<h4>Main Category</h4>

                <div class="catHolder">
                <?php
				$selectsubcategories1="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id."' AND show_hide='Show'";
				$run_subctegories1=mysql_query($selectsubcategories1);
				while($fetch_subcategoies1=mysql_fetch_array($run_subctegories1)){
				$subcategories1_id=$fetch_subcategoies1['id'];
				$subcategories1name=$fetch_subcategoies1['name'];
				?>
                    <span class="preset_text2" id="<?php echo $subcategories1_id; ?>" onClick="javascript:display2(this.id)"><?php echo $subcategories1name; ?></span>
                    <?php } ?>
                </div>
               <div id="result2"></div>
                
               <div id="result3"></div>
                
                <div id="result4"></div>
                
                
                <script>
				$(document).ready( function()
{
    $("span").click( function()
    {
        $(".selected").removeClass("selected");
        $(this).addClass("selected");
    } );
});
				</script>