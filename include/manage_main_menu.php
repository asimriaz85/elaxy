


<div id="tabs">
  <ul>
    <li><a href="manage.php" <?php if($page_name=="manage.php"){  ?> style="background:#FFF; color:#000; text-decoration:underline; height:30px; margin-right:20px;">Manage my ads<?php } else{ ?><span style="background-color:#5E5E5E; height:30px; margin-right:20px; color:#FFF; font-weight:bold; border-top-right-radius: 8px; border-top-left-radius: 5px;">Manage my ads</span><?php } ?></a></li>
    
    
    <li><a href="details.php"><?php if($page_name=="details.php" || $page_name=="change_password.php" || $page_name="deactivate_account.php"){?> <span style="background:#FFF; color:#000; text-decoration:underline; height:30px; margin-right:20px; font-weight:bold; border-top-right-radius: 8px; border-top-left-radius: 5px;">My Details</span><?php } else {?><span style="background-color:#5E5E5E; height:20px; margin-right:20px; color:#FFF; font-weight:bold; border-top-right-radius: 8px; border-top-left-radius: 5px;">My Details</span><?php } ?></a></li>
    
    
    <li><a href="replies.php"><?php if($page_name=="replies.php"){?> <span style="background:#FFF; color:#000; text-decoration:underline; height:30px; margin-right:20px; font-weight:bold; border-top-right-radius: 8px; border-top-left-radius: 5px;">Replies</span><?php } else {?><span style="background-color:#5E5E5E; height:20px; margin-right:20px; color:#FFF; font-weight:bold; border-top-right-radius: 8px; border-top-left-radius: 5px;">Replies</span><?php } ?></a></li>
    
    <!--<li><a href="replies.php"><span>Replies</span></a></li>-->
   
  </ul>
  
</div>