<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

</head>

<body>


<?php require_once('inc/header.php'); 

$post_id=$_SESSION['max_id'];
?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div class="signup">
<div class="head">
<h2><?php echo $_SESSION['msg']; ?></h2>

</div>
<div class="signup" style="border-top:none;">
<div class="form-area">




<div style="margin-left:130px; float:left;"><img src="images/lead.jpg" alt="ad banner" /></div>
<div style="width:500px; margin-left:250px; margin-top:20px;">

<div style="width:100%; margin-bottom:50px; margin-left:95px;">
<div style="float:left; width:35%;"><a href="post-ad1.php" class="login_font" id="black_text" style="text-decoration:none;"><img src="images/post-ad2.png" width="170" height="43"></a></div>
    <div style="float:left; width:28%;"><a href="view-ad.php?post_id=<?php echo $post_id; ?>" class="login_font" id="black_text" style="text-decoration:none;"><img src="images/view-ads2.png" width="130" height="43"></a></div>
    
    
    <div style="clear:both;"></div>
</div>
</div>


</div>

</div>
</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
