<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
 
 <script type="text/javascript" src="js/script.js"></script>

</head>

<body>
<?php require_once('inc/header.php'); 

if(isset($_SESSION['login_email_id']) && isset($_SESSION['login_password'])){
header("location:404.php?msg=Your are not allowed");
}
?>






<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:99%">

<div class="signup" style="border-bottom:none;">
<div class="head">
<h2>Create Your Account Signing</h2>
<h3>Signing up is completley free</h3>
</div>

<div class="form-area">

<!--<div class="social-icon">
<ul>
<li><img src="images/facebook.jpg" width="201" height="35" alt="Facebook"></li>
<li><img src="images/sing.jpg" width="201" height="35" alt="Google"></li>
<li><img src="images/sing1.jpg" width="201" height="35" alt="Twitter"></li>
</ul>

<ul style="border-bottom:none;">
<li><img src="images/sing2.jpg" width="201" height="35" alt="GitHub"></li>
<li><img src="images/sing3.jpg" width="201" height="35" alt="Linkedin"></li>
<li><img src="images/sing4.jpg" width="201" height="35" alt="Instagram"></li>
</ul>


</div>-->
</div>


</div>
<div class="signup" style="border-top:none;">
<form class="pure-form pure-form-aligned" method="post" id="mainform">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">First Name *</label>
            <input id="name" type="text" placeholder="Username" name="first_name" size="50">
            <span class="first_name_val validation"></span>
        </div>

        <div class="pure-control-group">
            <label for="username">Last Name *</label>
            <input id="username" type="text" placeholder="username" name="last_name" size="50">
            <span class="last_name_val validation"></span>
        </div>

        <div class="pure-control-group">
            <label for="email">Email Address *</label>
            <input id="email" type="email" placeholder="Email Address" name="email" size="50">
            <span class="email_val validation"></span>
        </div>

        <div class="pure-control-group">
            <label for="password">Password *</label>
            <input id="password" type="password" placeholder="Password" name="password" style="width:285px;">
             <span class="password_val validation"></span>
        </div>
        
         <div class="pure-control-group">
            <label for="cpassword">Confirm Password *</label>
            <input id="cpassword" type="password" placeholder="Password" name="confirm_password" style="width:285px;">
            <span class="confirm_password_val validation"></span>
        </div> 

        <div class="pure-controls">
            <label for="cb" class="pure-checkbox">
                <input id="cb" type="checkbox" name="terms_condition" value="1"> I agree to tha Terms & Conditions.<span class="terms_condition validation"></span>
            </label>
            </div>
          <div class="pure-controls">
            <label for="cb1" class="pure-checkbox">
                <input id="cb1" type="checkbox" name="newsletter" value="1"> Sing me up for the top 10 Newsletter!
            </label>
			<input name="register" type="button" value="Submit" class="button-success pure-button">
<!--            <button type="submit" class="button-success pure-button">Submit</button>
-->             <label class="pure-checkbox">
            You have an account already?<span><a href="login.php">Long here</a></span>
             
</label> 
      

<label>  Note; Fields marked with' are required.</label>
 </div>
       


    </fieldset>
</form></div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>