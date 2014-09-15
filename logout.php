<?php require_once('connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php');
$select_left_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='logout' AND location='bottom' AND status='Show'";
$run_left=mysql_query($select_left_adsen);
$fetch_left_adsen=mysql_fetch_array($run_left);
$ad_code_left=$fetch_left_adsen['ad_code'];
$adsen_left_image=$fetch_left_adsen['images'];

 ?>
</head>

<body>
<?php require_once('inc/header.php'); ?>
<section class="main-wrapper">
  <h1>You have logged out! Thank you for using Elaxy. We love to see you back again!</h1>
  <div class="left_ad">
    <?php if(!empty($ad_code_left)){ echo $ad_code_left; } else if(!empty($adsen_left_image)){?>
    <img src="admin_xel/media/large_gallery/<?php echo $adsen_left_image; ?>">
    <?php } ?>
  </div>
</section>
<div class="clear"></div>
<?php require_once('inc/footer.php'); ?>
</body>
</html>