<script>

$(document).ready(function() {

		$('.preset_text7').click(function(){			

			var target7 = $(this).attr("id");

			

			

			alert(target7);

			

		});

	});

</script>

<?php



	include("../connection.php");

	

	

	

	     $cat_id6=$_REQUEST['cat_id6']; 

	  

	  $selectsubcategories6="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id6."' AND show_hide='Show' order by name asc";

					$run_subcategories6=mysql_query($selectsubcategories6);

					 $num_rows6=mysql_num_rows($run_subcategories6);

	if($num_rows6 >0){  



?>

 <h4>Sub Category</h4>

 <div class="catHolder">

 

 					<?php

					

					while($fetch_subcategories6=mysql_fetch_array($run_subcategories6)){

						$subcategories6_id=$fetch_subcategories6['id'];

						$subcategories6_name=$fetch_subcategories6['name'];

					

					?>

                    <span class="preset_text7" id="<?php echo $subcategories6_id; ?>" onClick="javascript:display7(this.id)"><?php echo ucfirst($subcategories6_name); ?></span>

                    <?php } ?>

                    

                </div>

                <?php } 

				

				if($num_rows6=="0"){

					?>

                    <input id="category-select_submit-category" name="submit-category" class="button pull-right" value="Continue" data-parent-component="#post-ad-category-select" type="submit">

                    <?php

				}

				

				?>

                <script>

				$(document).ready( function()

{

    $("span").click( function()

    {

        $(".selected7").removeClass("selected7");

        $(this).addClass("selected7");

    } );

});

				</script>