

<?php include('include/header.php'); 

$tblname='ad_abuse';

	$id=$_REQUEST['id'];
	$post_id=$_REQUEST['post_id'];
	
	
	
	//ad details//
	
	$select_abuse="SELECT id,postcode_loaction_id,feature,ad_user_id,reporter_id,reporter_id FROM ad_abuse WHERE id='".$id."' ";
	$run=mysql_query($select_abuse);
	$fetch_abuse=mysql_fetch_array($run);
	
	$feature =$fetch_abuse['feature'];
	$ad_user_id =$fetch_abuse['ad_user_id'];
	
	
	$ad_user_email="SELECT email FROM registration WHERE id='".$ad_user_id."'";
	$run_user_email=mysql_query($ad_user_email);
	$fetch_user_email=mysql_fetch_array($run_user_email);
	$ad_user_mail=$fetch_user_email['email'];
	
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.id ='".$post_id."' AND ad_price.name='".$feature."'";	

	$result = mysql_query($sql);
	
	$fetch_result=mysql_fetch_array($result);
	
	$title=$fetch_result['title'];
	$description=$fetch_result['description'];
	$price=$fetch_result['item_price'];
	$feature_name=$fetch_result['name'];
	
?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>Ad Report Details</h1>
					<div class="other">

					 
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Ad Report Detail</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                    
                                    
                                    <div id="abuse_main">
    <div id="abuse_left">
    
    <div id="abuse_main">
    <div id="abuse_left2"><b>Reporter Email</b></div>
    <div id="abuse_right2"><b>Message</b></div>
    </div>
    
    <div id="abuse_main2">
    
   <?php 
   $select_reporter_name_message="SELECT reporter_id,report_message FROM ad_abuse WHERE postcode_loaction_id='".$post_id."'";
   $run_reporter_message=mysql_query($select_reporter_name_message);
   while($fetch_report_name_message=mysql_fetch_array($run_reporter_message)){
	   $reporter_id=$fetch_report_name_message['reporter_id'];
	   $report_message=$fetch_report_name_message['report_message'];
   
   	
		$select_reporter="SELECT email FROM registration WHERE id='".$reporter_id."'";
		$run_reporter=mysql_query($select_reporter);
		$fetch_reporter=mysql_fetch_array($run_reporter);
		$reporter_name=$fetch_reporter['email'];
   
   
   ?>
    
    <div id="abuse_left2"><?php echo $reporter_name; ?></div>
    <div id="abuse_right2"><?php echo $report_message; ?></div>
    <?php } ?>
    </div>
    
    
    
    </div>
    <div id="abuse_right">
    <table width="24%" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Ad Detail</font></strong></div></td>
    </tr>
    <tr>
      <td height="42">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="13%" height="42">User Email</td>
      <td width="1%">:</td>
      <td width="86%"><?php echo $ad_user_mail; ?></td>
    </tr>
    <tr>
      <td height="51">Title:</td>
      <td>:</td>
      <td><?php echo $title; ?></td>
    </tr>
    <tr>
      <td height="47">Feature</td>
      <td>:</td>
      <td><?php echo $feature_name; ?>
        
        </td>
    </tr>
    <tr>
      <td height="43">Price</td>
      <td>:</td>
      <td><?php echo $price; ?></td>    
    </tr>
    <tr>
      <td height="56">Description</td>
      <td>:</td>
      <td><?php echo $description; ?></td>    
    </tr>
    <tr>
      <td>Images</td>
      <td>:</td>
      <td><?php 
	  $select_post_images="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'";
	  $run_post_images=mysql_query($select_post_images);
	  
	  ?>
	  <table width="90" border="0" cellspacing="5" cellpadding="2">
                        <tr>
                          <?php
		
		   
		   
            while($fetch_post_image=mysql_fetch_array($run_post_images)){
				$file_name=$fetch_post_image['file_name'];
			if($num==3){
			$num=0;
			echo "</tr><tr>";
}
			?>
                          <td width="76" height="104"><table width="81" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="94%" >&nbsp;</td>
                              </tr>
                              <tr>
                                <td class="ts-display-pf-img"><img src="../uploads/<?php echo $file_name; ?>" width="75" height="75" /></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td align="right">&nbsp;</td>
                              </tr>
                          </table></td>
                          <?php
			 $num++;
			}
	?>
                        </tr>
                      </table>
	  
	  </td></tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
  <!--Emil Message-->
  <form method="post" id="form" action="submit.php?ad_user_mail=<?php echo $ad_user_mail; ?>&title=<?php echo $title; ?>&description=<?php echo $description; ?>">
    
    
    
    <div id="contact_seller_contaner">
    <div id="contact_seller_name">Message</div>
    <div id="contact_seller_input">
      <label for="textarea"></label>
      <textarea name="message" id="textarea" cols="30" rows="5"></textarea>
    </div>
    <div style="clear:both;"></div>
</div>
<div><button type="submit" name="send message" id="send_message_button">Send Message</button></div>
</form>
  <!--END-->
  
  
  </div>
  
  </div>
    <div style="clear:both;"></div>
</div>
                                    
                                     
                               
                                    
                        
                                    
                                    
                                    

					 
						<div class="clearfix"></div>
					</div>
					

				</div>
				

			</div>
			<div class="clearfix"></div>
		</div>
<?php include('include/sidebar.php'); ?>

	</div>
	<div class="clearfix"></div>
<?php include('include/footer.php'); ?>
</body>
</html>