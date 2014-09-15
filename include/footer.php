<hr class="hr_line" />
<div style="clear:both;"></div>
<div id="wrapper">
    <div id="social_media_main">
    <div id="facebook"><a href="#"><img src="images/facebook.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/tweeter.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/in.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/gplus.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/s5.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/tweeter2.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/dig.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/gmail.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/mail.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/plus.png" /></a></div>
    <div id="facebook"><a href="#"><img src="images/zero.png" /></a></div>
    <div class="clear_both"></div>
</div>
    
    
    <div id="footer_menu_main">
    <div id="footer_menu1">
    
			
					
                       
    <?php
	
		$select_pages="SELECT id,page_name,description FROM pages WHERE status='Show'";
		$run_pages=mysql_query($select_pages);
		
	
	?>
    
    
    <table width="197" border="0" cellspacing="5" cellpadding="2">
                        <tr>
                          <?php
		
		   
		   
           while($fetch_pages=mysql_fetch_array($run_pages)){ 
		   
		   $page_name=$fetch_pages['page_name'];
		   $page_id=$fetch_pages['id'];
			if($num==4){
			$num=0;
			echo "</tr><tr>";
}
			?>
                          <td width="175" height="62" valign="top"><table width="157" border="0" cellspacing="0" cellpadding="0" style="height:10px;">
                              <tr>
                                <td width="94%" >&nbsp;</td>
                              </tr>
                              <tr>
                                <td id="footer_font" style="height:10px;"><a href="elaxy.content.php?id=<?php echo $page_id;  ?>"><?php echo $page_name;?></a></td>
                              </tr>
                              <tr>
                                <td height="20" align="right">&nbsp;</td>
                              </tr>
                          </table></td>
                          <?php
			 $num++;
			}
	?>
</tr>
                      </table>
    
    </div>
    
    
    <div style="clear:both;"></div>
    
    
</div>
    </div>
   <?php 
 $select_announcements="SELECT id,announcements FROM announcements";
 $run_announcements=mysql_query($select_announcements);
 
 
 if(mysql_num_rows($run_announcements)>0){
 ?>
<!--<div id="sticky">-->
<div class="jquery-bar2">
 <span class="notification">
 
<?php 
while($fetch_announcements=mysql_fetch_array($run_announcements)){
	
	
?>
    <p><?php echo $fetch_announcements['announcements']; ?></p>
    <?php } ?>
    <p class="jquery-arrow2 down2"><img src="jqueryNotificationBar/img/up-arrow.png" alt="Click to Hide Notification" style="cursor:pointer;"></p>
    </span>
    
  </div>
  <span class="downbar2 jquery-arrow2"><img src="jqueryNotificationBar/img/down-arrow.png" alt="Click to Show Notification" style="cursor:pointer;"></span>

  <?php } ?>	
    <div id="footer_bg">
    <div id="wrapper">
    <div id="footer_copy">
    <div id="footer_copy_text">Copyright &copy; Elaxy 2013. All rights reserved</div>
    <div id="powered_by"><a href="#" style="margin-left:20px;">Powered by Rana Technologies</a></div>
    
    <div style="clear:both;"></div>
    </div>
</div>
    </div>
    
    