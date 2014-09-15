<?php

include("include/header.php");

include("include/login-security.php");

$max_id=$_REQUEST['max_id'];

$select_title="SELECT postcode_loaction_id,title FROM  ad_title_description WHERE postcode_loaction_id='".$max_id."'";
$run_select_title=mysql_query($select_title);
$fetch_title=mysql_fetch_array($run_select_title);

$title=$fetch_title['title'];
?>
<h1>Review Your Order</h1>


<div style="width:80%; margin-left:30px;">
    <div style="float:left; width:46.3%;">Description</div>
    
    <div style="float:left; width:33.4%;">Price</div>
    <div style="clear:both;"></div>
</div>
<div class="clear_both"></div>
<div style="width:80%; margin-left:30px;">
    <div style="float:left; width:46.3%;">New Listing: <?php echo $title; ?></div>
    
    <div style="float:left; width:33.4%;">Free</div>
    <div style="clear:both;"></div>
</div>
<div class="clear_both"></div>
<?php $select_price="SELECT postcode_loaction_id,name,price FROM  ad_price WHERE postcode_loaction_id='".$max_id."'"; 

$run_price=mysql_query($select_price);
while($fetch_price=mysql_fetch_array($run_price)){
	$price_name=$fetch_price['name'];
	$price=$fetch_price['price'];
?>

<div style="width:80%; margin-left:30px;">
    <div style="float:left; width:46.3%;"><?php echo $price_name.":"." ".$title; ?></div>
    
    <div style="float:left; width:33.4%;"><?php echo "&pound;".$price; ?></div>
    <div style="clear:both;"></div>
</div>
<div class="clear_both"></div>


<?php } ?>
<?php 

	$query = "SELECT SUM(price) FROM  ad_price WHERE postcode_loaction_id='".$max_id."'"; 
	 
$result = mysql_query($query) or die(mysql_error());

$fetch_total=mysql_fetch_array($result);

$total=$fetch_total['SUM(price)'];


?>
<div style="width:80%; margin-left:30px;">
    <div style="float:left; width:46.3%;">&nbsp;</div>
    
    <div style="float:left; width:33.4%;"><?php echo "Total &pound;".$total; ?></div>
    <div style="clear:both;"></div>
</div>

<?php 
include("include/footer.php");
?>
</body>
</html>