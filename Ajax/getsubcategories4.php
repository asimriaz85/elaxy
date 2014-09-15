<script>

$(document).ready(function() {

		$('.preset_text5').click(function(){			

			var target5 = $(this).attr("id");

			

			

			

			$.post("Ajax/getsubcategories5.php",

    {cat_id5: target5},

    function(data5){

        $('#result5').html(data5);

    });

		});

	});

</script>

<?php



	include("../connection.php");

	

	

	

	   $cat_id4=$_REQUEST['cat_id4']; 

	  

	  $selectsubcategories4="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id4."' AND show_hide='Show' order by name asc";

					$run_subcategories4=mysql_query($selectsubcategories4);

					 $num_rows4=mysql_num_rows($run_subcategories4);

	if($num_rows4 >0){  



?>

 <h4>Sub Category</h4>

 <div class="catHolder">

 

 					<?php

					

					while($fetch_subcategories4=mysql_fetch_array($run_subcategories4)){

						$subcategories4_id=$fetch_subcategories4['id'];

						$subcategories4_name=$fetch_subcategories4['name'];

					

					?>

                    <span class="preset_text5" id="<?php echo $subcategories4_id; ?>" onClick="javascript:display5(this.id)"><?php echo ucfirst($subcategories4_name); ?></span>

                    <?php } ?>

                    

                </div>

                <?php } 

				

				if($num_rows4==0){

					?>

                    <input id="category-select_submit-category" name="submit-category" class="button pull-right" value="Continue" data-parent-component="#post-ad-category-select" type="submit">

                    <?php

				}

				

				?>

                

                <div id="result5"></div>

                

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