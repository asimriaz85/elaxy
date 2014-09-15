<!DOCTYPE html>
<html><head>
<?php //require_once('inc/meta.php'); ?>

<?php 
error_reporting(0);
$id=$_REQUEST['id'];
include("connection.php");
 $select_page_content="SELECT id,page_name,description,title,m_keywords,meta_description FROM pages WHERE id='".$id."' AND status='Show'";
$run_page_content=mysql_query($select_page_content);
$fetch_page_content=mysql_fetch_array($run_page_content);

$description=$fetch_page_content['description'];
$title=$fetch_page_content['title'];
$keywords=$fetch_page_content['m_keywords'];
$meta_desctiption=$fetch_page_content['meta_description'];

 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<meta name="description" content="<?php echo $meta_desctiption; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="assets/js/jquery-1.9.0.min.js"></script>-->
<script type="text/javascript" src="js/1.7-jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-ui-1.10.0.custom.min.js"></script>
        <link rel="stylesheet" href="assets/css/jquery-ui-1.10.0.custom.min.css" type="text/css"/>
        
        <script type="text/javascript">
      $(document).ready(function(){
	  
	    $(".box,.loginbox").mouseenter(function(){
			$(".loginbox").show();
			});

$(".box,.loginbox").mouseleave(function(){
		$(".loginbox").hide();
			});
				});
			
			</script>
            
             <!--Tootl Tip-->
<script type="text/javascript">
$(document).ready(function() {
        // Tooltip only Text
        $('.masterTooltip').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip')
                .css({ top: mousey, left: mousex })
        });
});
</script>
            
            
      <link href="jqueryNotificationBar/style.css" rel="stylesheet" type="text/css" />
  <!--<script src="jqueryNotificationBar/js/jquery.min.js"></script>-->
<!--<script src="jqueryNotificationBar/js/jquery-ui.min.js"></script>-->
<script>
    $(document).ready(function() {
        // jBar Script by Todd Motto
        $('.downbar').delay(1000).fadeIn(400).addClass('up');
        $('.jquery-bar').hide().delay(2500).slideDown(400);
        $('.jquery-arrow').click(function(){
            $('.downbar').toggleClass('up', 400);          
            $('.jquery-bar').slideToggle();
        });     
    });
</script>      
            
            
            <!--Password Match validation-->
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>

<script> 
		function validatePassword(){	
		var validator = $("#password_form").validate({ rules: { password :"required", confirmpassword:{ equalTo: "#password" }	}, 
		messages: { password :" Enter Password", confirmpassword :" Enter Confirm Password Same as Password" } }); 
		 } </script> 
<!--END-->



<!--Date picker-->
   <link rel="stylesheet" href="datepicker/jquery-ui.css" />

<!--<script src="datepicker/ui-1.10.2-jquery-ui.js"></script>-->

<script>
$(function() {
$( "#datepicker" ).datepicker();

});

</script>
<!--END-->

</head>

<body>


<?php require_once('inc/header.php'); 

$id=$_REQUEST['id'];

$select_left_adsen="SELECT id,ad_code FROM adsens_ad WHERE ad_page_name='Home' AND location='Left' AND status='Show'";
$run_left=mysql_query($select_left_adsen);
$fetch_left_adsen=mysql_fetch_array($run_left);
$adsen_left_image=$fetch_left_adsen['images'];
$ad_code_left=$fetch_left_adsen['ad_code'];


 $select_right_adsen="SELECT id,ad_code FROM adsens_ad WHERE ad_page_name='Home' AND location='Right' AND status='Show'";
$run_right=mysql_query($select_right_adsen);
$fetch_right_adsen=mysql_fetch_array($run_right);
$ad_code_right=$fetch_right_adsen['ad_code'];






?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div id="contant_area_home" style="width:1023px;">

<div style="margin-left:10px; margin-right:10px;">
 <?php echo ($description); ?>
		
</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
