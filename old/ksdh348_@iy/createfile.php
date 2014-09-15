<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>




<?php

		



$content = '<?php 

include("include/header.php");
	
?>  

 <div id="wrapper">
    <!--Adds Div-->
    <?php
	include("include/limelight_ad.php");
	 ?>
		<!--End Add divs-->
        
</div>
<div id="search_bg2">
    <div id="categories_main">
    sdhfsdhflsdhflshdfsldfh
    	
        	</div>
    
    <div style="clear:both;"></div>
</div>
    
    
    


	




    <div class="clear_both"></div>
</div>

    </div>';
$fp = fopen("../myText.php","wb");
fwrite($fp,$content);
fclose($fp);
?>
</body>
</html>