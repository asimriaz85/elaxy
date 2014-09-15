<link href="style.css" rel="stylesheet" media="all" />
<!--<script>
function closeBox() {
window.parent.$.prettyPhoto.close();
}
</script>-->


    <script type="text/javascript">
	function closeME() {
    parent.$.fancybox.close();
	}
</script>
	
	    
      
    

<?php

	/*echo '<pre>';
	print_r($_REQUEST);
	echo '<pre>';*/
	
	$post_id=$_REQUEST['post_id'];
	$f_id=$_REQUEST['f_id'];
	$feature=$_REQUEST['feature'];
	$ad_userid=$_REQUEST['ad_userid'];
	$sub_cat_id=$_REQUEST['sub_cat_id'];
	$reporter_id=$_REQUEST['reporter_id'];
	
	

?>

<form method="post" id="myForm" action="config/getreport.php?post_id=<?php echo $post_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $ad_userid; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $reporter_id; ?>">
<textarea name="report_message" cols="50" rows="5" placeholder="Write your report here...."></textarea>

<input type="submit" name="submit" value="Send report" onclick="closeME();" />
<!--<input type="submit" name="submit" value="Send report" id="myForm" />-->
</form>