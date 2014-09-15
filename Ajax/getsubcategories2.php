<script>

$(document).ready(function() {

		$('.preset_text3').click(function(){			

			var target3 = $(this).attr("id");

			

			

			

			$.post("Ajax/getsubcategories3.php",

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

	   

	   

					$selectsubcategories2="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_id2."' AND show_hide='Show' order by name asc";

					$run_subcategories2=mysql_query($selectsubcategories2);

					

					  $num_rows=mysql_num_rows($run_subcategories2);

					 

					if($num_rows >0){



?>

 <h4>Sub Category</h4>

 <div class="catHolder">

 

 					<?php

					

					while($fetch_subcategories2=mysql_fetch_array($run_subcategories2)){

						$subcategories2_id=$fetch_subcategories2['id'];

						$subcategories2_name=$fetch_subcategories2['name'];

					

					?>

                    <span class="preset_text3" id="<?php echo $subcategories2_id; ?>" onClick="javascript:display3(this.id)"><?php echo ucfirst($subcategories2_name); ?></span>

                    <?php } ?>

                </div>

                

                <?php

					}

                if($num_rows=="0"){

					

						?>

						

						<input id="category-select_submit-category" name="submit-category" class="button pull-right" value="Continue" data-parent-component="#post-ad-category-select" type="submit">

						

						<?php

						 

					 }

                     ?>

                     

                     <div id="result3"></div>

                

                

                     

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