<link href="style.css" rel="stylesheet" media="all" />
<!--<script>
function closeBox() {
window.parent.$.prettyPhoto.close();
}
</script>-->


    
	
	    
      
    

<?php

	/*echo '<pre>';
	print_r($_REQUEST);
	echo '<pre>';*/
	
	include("connection.php");
	
	$post_id=$_REQUEST['post_id'];
	$f_id=$_REQUEST['f_id'];
	$feature=$_REQUEST['feature'];
	$ad_userid=$_REQUEST['ad_userid'];
	$sub_cat_id=$_REQUEST['sub_cat_id'];
	$reporter_id=$_REQUEST['reporter_id'];
	
	if(isset($_REQUEST['submit'])){
		
		
		
		$post_id=$_REQUEST['post_id'];
		$feature=$_REQUEST['feature'];
		$ad_userid=$_REQUEST['ad_userid'];
		$sub_cat_id=$_REQUEST['sub_cat_id'];
		$reporter_id=$_REQUEST['reporter_id'];
		$report_message=$_REQUEST['report_message'];
		
		
		$insert="INSERT INTO ad_abuse (postcode_loaction_id,feature,ad_user_id,reporter_id,report_message,report_datetime)VALUES('".$post_id."','".$feature."','".$ad_userid."','".$reporter_id."','".$report_message."','".date("Y-m-d H:i:s")."')";
		
		$run=mysql_query($insert);
		
		
		 ob_start(); ?>
		
		<table width="527" border="0" align="center" cellpadding="2" cellspacing="4">
  <tr>
    <td colspan="2">New Abuse Report</td>
  </tr>
  <tr>
    <td>User ID</td>
    <td><?=$ad_userid?></td>
  </tr>
  <tr>
    <td><p>Ad ID</p></td>
    <td><?=$post_id?></td>
  </tr>
    <tr>
    <td><p>Ad Date &amp; Time</p></td>
    <td><?=date("Y-m-d H:i:s")?></td>
  </tr>
  <tr>
    <td><p>Abuse Details</p></td>
    <td><?=$report_message?></td>
  </tr>
</table>
        
        
      <?php $content = ob_get_contents(); ob_clean();
	  
	  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers  .= "From: Elaxy Abuse"."\r\n";
mail("support@elaxy.co.uk ","Abuse Report", $content,$headers);
	  
	   ?>
        
        
		<?php
		if($run){
			
			$msg="Thank You For Reporting we will check it and take action on it";
			//header("Location:report_thankyou.php?msg=$msg");
			?>
            
            <!--<script type="text/javascript">
	function closeME() {
    parent.$.fancybox.close();
	}
</script>-->
            <?php
			 
			
		}
	}
	
	
	

?>

<?php /*?><form method="post" id="myForm" action="config/getreport.php?post_id=<?php echo $post_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $ad_userid; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $reporter_id; ?>"><?php */?>
<?php if (empty($msg)){ ?>
<form method="post" id="myForm" action="report_message.php?post_id=<?php echo $post_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $ad_userid; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $reporter_id; ?>">

<textarea name="report_message" cols="50" rows="5" placeholder="Write your report here...." style="width:350px;"></textarea>

<input type="submit" name="submit" value="Send report" onclick="closeME();" />
<!--<input type="submit" name="submit" value="Send report" id="myForm" />-->
</form>
<?php } else { echo $msg; } ?>



