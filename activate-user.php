<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

</head>

<body>


<?php require_once('inc/header.php'); 

$email=$_REQUEST['id'];

if(isset($_SESSION['login_email_id']) && isset($_SESSION['login_password'])){
header("location:404.php?msg=Sorry you are not allowed");
}

if(isset($email)){
	
	
			
			$status=1;
		
		 $update="UPDATE  registration SET status={$status} WHERE email='{$email}'";
		$run=mysql_query($update) or die(mysql_error());
		
		}
?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div class="signup">
<div class="head">
<h2>Your Elaxy account has been activated</h2>
 <h2>Thanks for creating an account. Please login to start using your account.</h2>
<h2>Sign in Now</h2>

</div>
<div class="signup" style="border-top:none;">
<div class="form-area">


<form class="pure-form pure-form-aligned" method="post" action="config/login.php">
    <fieldset>
  <?php if(isset($_SESSION['error'])){?> <div id="error"> <?php echo $_SESSION['error'];  ?></div><?php } ?>

        <div class="pure-control-group">
           <label for="username" class="login_font" id="black_text">Username *</label>
             <input id="username" type="text" placeholder="Username" name="login_email" class="fields" required>
        </div>

       
        <div class="pure-control-group">
           <label for="password" class="login_font">Password *</label>
            <input id="password" type="password" placeholder="Password" style="width:285px; height:45px;" name="login_password" required>
        </div>
        
       
          <div class="pure-controls" id="keeplogin_div">
            <label for="cb" class="pure-checkbox black_color">
                <input id="cb" type="checkbox" class="black_color"> Keep me Signed in
            </label>

            <button type="submit" class="pure-button pure-button-primary black_color" name="Login">Sign in</button>
             <label class="pure-checkbox black_color">
            Log in Problem ?
             
</label> 
      

<label style="color:#000;"><span><a href="forgot-password.php" style="color:#000;">Recover password</a></span> or <span><a href="create-account.php" style="color:#000;">Create new account</a></span></label>
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
