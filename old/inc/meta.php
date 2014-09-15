<?php 
error_reporting(0);
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elaxy</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/pagination.css" rel="stylesheet" type="text/css" />

<!--<script type="text/javascript" src="assets/js/jquery-1.9.0.min.js"></script>-->
<script type="text/javascript" src="js/1.7-jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-ui-1.10.0.custom.min.js"></script>
        <link rel="stylesheet" href="assets/css/jquery-ui-1.10.0.custom.min.css" type="text/css"/>
        
        <script type="text/javascript">
      $(document).ready(function(){
	  
	    $(".box,.loginbox").mouseenter(function(){
			$(".loginbox").show();
			});

/*$(".box,.loginbox").mouseleave(function(){
		$(".loginbox").hide();
			});*/
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


           
