<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

</head>

<body>


<?php require_once('inc/header.php'); 


?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div class="signup">
<div class="head">
<h2>Forgot Password</h2>

</div>

<div class="form-area">

<?php if(isset($_SESSION['error'])){?> <div id="error" style="color:#F00; font-weight:bold; text-align:center;"> <?php echo $_SESSION['error'];  ?></div><?php } ?>
<?php if(isset($_REQUEST['error_block'])){?> <div id="error" style="color:#F00; font-weight:bold; text-align:center;"> <?php echo $_REQUEST['error_block'];  ?></div><?php } ?>
<form class="pure-form" style="margin-left:125px; margin-top:25px; float:left;" method="post" action="forgotten-password-confirmation.php">
    <fieldset>
        <label for="email">Email</label>
        <input id="email" type="email" placeholder="Email" name="login_email" class="fields" required>


           <button type="submit" class="pure-button pure-button-primary" name="submit">Recover</button>
       
         <div class="pure-control-group">
          <label>Don't have an account ?</label>
          <label><span><a href="create-account.php">Create an account</a></span></label>
          </div>
    </fieldset>
</form>




</div>


</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
