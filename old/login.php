<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

</head>

<body>


<?php require_once('inc/header.php'); 
if(isset($_SESSION['login_email_id']) && isset($_SESSION['login_password'])){
header("location:404.php?msg=Sorry you are not allowed");
}

?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div class="signup">
<div class="head">
<h2>Sign in Now</h2>

</div>
<div class="signup" style="border-top:none;">
<div class="form-area">


<form class="pure-form pure-form-aligned" method="post" action="config/login.php">
    <fieldset>
  <?php if(isset($_SESSION['error'])){?> <div id="error"> <?php echo $_SESSION['error'];  ?></div><?php } ?>

        <div class="pure-control-group">
            <label for="username">Username *</label>
            <input id="username" type="text" placeholder="Username" name="login_email" required="">
        </div>

       
        <div class="pure-control-group">
            <label for="password">Password *</label>
            <input id="password" type="password" placeholder="Password" name="login_password" required="">
        </div>
        
       
          <div class="pure-controls">
            <label for="cb" class="pure-checkbox">
                <input id="cb" type="checkbox"> Keep me logged in
            </label>

            <button type="submit" class="pure-button pure-button-primary" name="Login">Sign in</button>
             <label class="pure-checkbox">
            Problem in signing in ?
             
</label> 
      

<label><span><a href="forgot-password.php">Recover password</a></span> or <span><a href="create-account.php">Create new account</a></span></label>
 </div>
       


    </fieldset>
</form>



</div>

</div>
</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
