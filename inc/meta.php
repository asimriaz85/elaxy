<?php 
error_reporting(0);
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link href="/css/pagination.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="/js/1.7-jquery.min.js"></script>
        <script type="text/javascript" src="/assets/js/jquery-ui-1.10.0.custom.min.js"></script>
        <link rel="stylesheet" href="/assets/css/jquery-ui-1.10.0.custom.min.css" type="text/css"/>
        
        <script type="text/javascript">
      $(document).ready(function(){
	  
	    $(".box,.loginbox").mouseenter(function(){
			$(".loginbox").show();
			});


				});
			
			</script>
            
            
<script type="text/javascript">
$(document).ready(function() {
       
        $('.masterTooltip').hover(function(){
               
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
                
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; 
                var mousey = e.pageY + 10; 
                $('.tooltip')
                .css({ top: mousey, left: mousex })
        });
});
</script>
            
            
      <link href="/jqueryNotificationBar/style.css" rel="stylesheet" type="text/css" />
 
<script>
    $(document).ready(function() {
       
        $('.downbar').delay(1000).fadeIn(400).addClass('up');
        $('.jquery-bar').hide().delay(2500).slideDown(400);
        $('.jquery-arrow').click(function(){
            $('.downbar').toggleClass('up', 400);          
            $('.jquery-bar').slideToggle();
        });     
    });
</script>      
            
            
           
<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.validate.js"></script>

<script> 
		function validatePassword(){	
		var validator = $("#password_form").validate({ rules: { password :"required", confirmpassword:{ equalTo: "#password" }	}, 
		messages: { password :" Enter Password", confirmpassword :" Enter Confirm Password Same as Password" } }); 
		 } </script> 





   <link rel="stylesheet" href="/datepicker/jquery-ui.css" />



<script>
$(function() {
$( "#datepicker" ).datepicker();

});

</script>



   <script>
  (function(i,s,o,g,r,a,m){i['
GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49404893-1', 'elaxy.co.uk');
  ga('send', 'pageview');

</script>        

