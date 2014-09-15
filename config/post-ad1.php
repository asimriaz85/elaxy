<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 <link href="uploadfile.css" rel="stylesheet">
    <script src="js/1.9.1-jquery.min.js"></script>
    <script src="jquery.uploadfile.min.js"></script> 
    
  <script type="text/javascript">
	$(document).ready(function() {
		$('.preset_text').click(function(){			
			var target = $(this).attr("id");
			
			
			
			$.post("Ajax/getsubcategories1.php",
    {cat_id: target},
    function(data){
        $('#result1').html(data);
    });
		});
	});
</script>
<script type="text/javascript">
function display(inPut)
{
var t=document.getElementById("inputboxID");
t.value = inPut;
}

function display2(inPut2)
{
var t2=document.getElementById("inputboxID2");
t2.value = inPut2;
}

function display3(inPut3)
{
var t3=document.getElementById("inputboxID3");
t3.value = inPut3;
}

function display4(inPut4)
{
var t4=document.getElementById("inputboxID4");
t4.value = inPut4;
}

function display5(inPut5)
{
var t5=document.getElementById("inputboxID5");
t5.value = inPut5;
}

function display6(inPut6)
{
var t6=document.getElementById("inputboxID6");
t6.value = inPut6;
}

function display7(inPut7)
{
var t7=document.getElementById("inputboxID7");
t7.value = inPut7;
}


</script>

</head>

<body>
<?php 

require_once('inc/header.php'); 
include("inc/login-security.php");
?>
<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:1020px;">
<form method="post" action="post-ad.php">

	
    	<input type="hidden" name="main_cat" id="inputboxID" class="inptBx"/>
            
            <input type="hidden" name="sub_cat_id" id="inputboxID2" class="inptBx2"/>
            
             <input type="hidden" name="sub_sub_cat" id="inputboxID3" class="inptBx3"/>
             
             <input type="hidden" name="sub_cat_child_child" id="inputboxID4" class="inptBx4"/>
             
             <input type="hidden" name="sub_cat_child_child_child" id="inputboxID5" class="inptBx5"/>


<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000; border:none;">
<div class="catContainer">
        <h1>Add Your Post</h1>
        <div class="catSelect2">
            <h2>
                <span>Select a category</span>
                
            </h2>
            <div class="Left">
            
            
            
                <ul>
                
                <?php 
$select_cat="SELECT id,name FROM  categories WHERE show_hide='Show' AND parent_off='0'"; 
$run_select_cat=mysql_query($select_cat);
while($fetch_categories=mysql_fetch_array($run_select_cat)){
$cat_id=$fetch_categories['id'];
$cat_name=$fetch_categories['name'];

//Select Images//

$select_images="SELECT cat_id,image FROM categories_image WHERE cat_id='".$cat_id."'";
$run_image_query=mysql_query($select_images);
$fetch_image=mysql_fetch_array($run_image_query);
$image=$fetch_image['image'];
//End//

?>
                
                    <li class="menu preset_text" id="<?php echo $cat_id; ?>"onClick="javascript:display(this.id)">
                        <a href="#">
                            <img src="ksdh348_@iy/media/thumb_gallery/<?php echo $image; ?>" alt="<?php echo $cat_name; ?>">
                            <span><?php echo $cat_name; ?></span>
                        </a>
                    </li>
                    <?php } ?>
                    
                </ul>
            </div>
            <div>
            <div class="Right">
            
            <div id="result1"></div>
              </div> 
            </div>
        </div>
    </div>
          
</div>
<div class="clear"></div>
</form>

</div>
</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>

<script>
$('li.menu').click(function(){
    $('li.menu').removeClass("active");
    $(this).addClass("active");
});

$(document).ready( function()
{
    $("span").click( function()
    {
        $(".selected").removeClass("selected");
        $(this).addClass("selected");
    } );
});
</script>


</body>
</html>