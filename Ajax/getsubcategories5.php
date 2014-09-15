<script>

$(document).ready(function() {

		$('.preset_text6').click(function(){			

			var target6 = $(this).attr("id");

			

			

			

			$.post("Ajax/getsubcategories6.php",

    {cat_id6: target6},

    function(data6){

        $('#result6').html(data6);

    });

		});

	});

</script>

<?php



	include("../connection.php");

	

	

	

	     $cat_id5=$_REQUEST['cat_id5']; 

	  

	  $selectsubcategories5="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id5."' AND show_hide='Show' order by name asc";

					$run_subcategories5=mysql_query($selectsubcategories5);

					 $num_rows5=mysql_num_rows($run_subcategories5);

	if($num_rows5 >0){  



?>

 <h4>Sub Category</h4>

 <div class="catHolder">

 

 					<?php

					

					while($fetch_subcategories5=mysql_fetch_array($run_subcategories5)){

						$subcategories5_id=$fetch_subcategories5['id'];

						$subcategories5_name=$fetch_subcategories5['name'];

					

					?>

                    <span class="preset_text6" id="<?php echo $subcategories5_id; ?>" onClick="javascript:display6(this.id)"><?php echo ucfirst($subcategories5_name); ?></span>

                    <?php } ?>

                    

                </div>

                <?php } 

				

				if($num_rows5=="0"){

					?>

                    <input id="category-select_submit-category" name="submit-category" class="button pull-right" value="Continue" data-parent-component="#post-ad-category-select" type="submit">

                    <?php

				}

				

				?>

                

                <div id="result6"></div>

                <script>

				$(document).ready( function()

{

    $("span").click( function()

    {

        $(".selected6").removeClass("selected6");

        $(this).addClass("selected6");

    } );

});

				</script>