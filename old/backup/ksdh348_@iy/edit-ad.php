<?php

ob_start();
include('include/header.php');
$id=$_REQUEST['id'];
$email=$_REQUEST['email'];
$first_name=$_REQUEST['first_name'];
	
	if(isset($_REQUEST['submit'])){
		
		$up_status=$_REQUEST['status'];
		
		$update="UPDATE postcode_location SET status='$up_status' WHERE id='$id'";
		$run_update=mysql_query($update);
		
		
		if($run_update){
			
			
			$admininfo="support@elaxy.co.uk";
	
	$to =  $email;
	$subject = 'Elaxy Staff Active Your Ad';
	$headers = "From: ".$admininfo." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message.='<table width="100%" border="0">
  <tr>
    <td colspan="2">Dear '.$_REQUEST['first_name'].', </td>
  </tr>
  <tr>
    <td><strong>Congradulations!</strong></td>
   
  </tr>
  <tr>
    <td><strong>Your ad is now approved by our staff and is now actice.<br>You can view or updagte your ad on "ad URL"</strong></td>
    
  </tr>
  <tr>
    <td>If you have any further questions, please contact us back.</td>
    
  </tr>
  
  <tr>
    <td>Regards,</td>
    
  </tr>
  
  <tr>
    <td>Support Team</td>
    
  </tr>
  
  <tr>
    <td><img src="http://elaxy.co.uk/images/logo.png"></td>
    
  </tr>
  
</table>';
	$message .= "</body></html>";
	$send=mail($to, $subject, $message, $headers);
			
		}
		
		
	}
	
	//$select_status="SELECT id,status FROM postcode_location WHERE id='".$id."'";
	
	
	
	$select_status = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.id = '".$id."'";	
	
			$run_query=mysql_query($select_status);
			$fetch_query=mysql_fetch_array($run_query);
	  		
	  		$status=$fetch_query['status'];
			$title=$fetch_query['title'];
			$description=$fetch_query['description'];
			
			
			
			
			
			
			 
			
			
			
?>
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>View &amp; Update Ad Status</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
        
        				
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div id="div_hight" align="center"><strong><font color="#FFFFFF">Update Ad Status</font></strong></div></td>
    </tr>
    <tr>
      <td height="24" valign="bottom">&nbsp;</td>
      <td valign="bottom">&nbsp;</td>
      <td valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td width="29%" height="51">Title</td>
      <td width="2%">:</td>
      <td width="69%"><?php echo $title; ?></td>
    </tr>
    <tr>
      <td height="58">Description</td>
      <td>:</td>
      <td><?php echo $description; ?></td>
    </tr>
    <tr>
      <td height="165">Price Pakage</td>
      <td>:</td>
      <td><?php 
	 //ad price and features//
	$select_ad_price="SELECT postcode_loaction_id,name,price,days FROM ad_price WHERE postcode_loaction_id='".$id."'";
	$run_ad_price=mysql_query($select_ad_price);
	while($fetch_ad_price=mysql_fetch_array($run_ad_price)){
	
	$ad_price_postcode_loaction_id=$fetch_ad_price['postcode_loaction_id'];
	 $ad_price_name.=$fetch_ad_price['name'];
	 $ad_price_price.=$fetch_ad_price['price'];
	 $ad_price_days=$fetch_ad_price['days']."<br>";
	
	}
	  
	  ?>
      
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="14%" height="49"><input type="checkbox" name="list[]" class="childCheckBox cb" value="urgent_9.95_7" id="one" rel="9.95" <?php $mystring = $ad_price_name;
$findme   = 'urgent';
$pos = strpos($mystring, $findme); if ($pos !== false) {?> checked="checked"<?php }?> /></td>
    <td width="43%">URGENT</td>
    <td width="43%">7 days - &pound;9.95</td>
  </tr>
  <tr>
    <td height="43"><input type="checkbox" name="list[]" class="childCheckBox cb" value="featured" rel="15.50" <?php $mystring = $ad_price_name;
$findme   = 'feature';
$pos = strpos($mystring, $findme); if ($pos !== false) {?> checked="checked"<?php }?> /></td>
    <td>Featured</td>
    <td><?php 
		 
		 $select_feature_pakage="SELECT id,days,price FROM  lime_price";
		 $run_feature_pakage=mysql_query($select_feature_pakage);
		 $num_rows_pakage=mysql_num_rows($run_feature_pakage);
		 ?>
         
         
         <select name="featured_p" id="model">
         <?php 
		 
		  
		 while($fetch_lime_pake=mysql_fetch_array($run_feature_pakage)){
		 
		 $days_pack=$fetch_lime_pake['days'];
		 $price_pack=$fetch_lime_pake['price'];
		 
		 if($num_rows_pakage >0){
		 ?>
         
         <option value="<?php echo "feature_".$price_pack."_".$days_pack; ?>"<?php if($price_pack==$ad_price_price){?> selected="selected"<?php } ?>><?php echo $days_pack." days - &pound;".$price_pack; ?> </option>
         <?php } }?>
         
         
         
       </select></td>
  </tr>
  <tr>
    <td height="65"><input type="checkbox" name="list[]" value="spotlight_23.50_7" class="childCheckBox cb" rel="23.50" <?php $mystring = $ad_price_name;
$findme   = 'spotlight';
$pos = strpos($mystring, $findme); if ($pos !== false) {?> checked="checked"<?php }?> /></td>
    <td>Spotlight</td>
    <td>7 days - &pound;23.50</td>
  </tr>
      </table>

      </td>
    </tr>
    <tr>
      <td height="82">Images</td>
      <td>:</td>
      <td>
	  <?php
      
	  $select_images="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$id."'";
	  $run_image=mysql_query($select_images);
	  while($fetch_image=mysql_fetch_array($run_image)){
		  $image=$fetch_image['file_name'];
		  ?>
          <img src="../uploads/<?php echo $image; ?>" width="75" height="75" />
		  <?php
		  
	  }
	  
	  ?></td>
    </tr>
    <tr>
      <td height="71">Status</td>
      <td>:</td>
      <td>
        <select name="status">
       <option value="1"<?php if($status==1){?> selected<?php } ?>>Active</option>
       
       <option value="0"<?php if($status==0){?> selected<?php } ?>>Not Active</option>
       
       </select>
        
        </td>
    </tr>
    <tr>
      <td colspan="3"><div class="buttons" style="width:200px;">
        <button type="submit" value="Submit" class="ui-state-default ui-corner-all" id="saveForm" name="submit" >Submit</button>
        
        <br /><br />
        </div></td>
    </tr>
  </table>
                                    
                          </div>
                                    
                                    
                                    

					  </form>
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