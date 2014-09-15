<!DOCTYPE html>
<html>
 <head>
 <?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
 <script type="text/javascript" src="js/script.js"></script>
 <style>
.validation {
	color:#F00;
	font-weight:bold;
	margin-left:10px;
	font-size:14px;
}
</style>
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
       <div class="head" style="font-family:Arial, Helvetica, sans-serif;">
        <h2>Create an Elaxy Account</h2>
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
       <table width="100%" border="0">
        <tr>
           <td width="47%" valign="top"><form class="pure-form pure-form-aligned" method="post" id="mainform" style="color:#000;">
               <fieldset>
                <div class="pure-control-group">
                   <label for="name" class="login_font">First Name *</label>
                   <input id="name" type="text" placeholder="First Name" name="first_name" class="fields">
                   <span class="first_name_val validation"></span> </div>
                <div class="pure-control-group">
                   <label for="username" class="login_font">Last Name *</label>
                   <input id="username" type="text" placeholder="Last Name" name="last_name" class="fields">
                   <span class="last_name_val validation"></span> </div>
                <div class="pure-control-group">
                   <label for="cpassword" class="login_font">Telephone Number *</label>
                   <input id="cpassword" type="text" placeholder="Phone" name="telephone_number" class="fields">
                   <span class="telephone_number_val validation"></span> </div>
                <div class="pure-control-group">
                   <label for="cpassword" class="login_font">Country *</label>
                   <input id="cpassword" type="text" placeholder="Country" name="country" class="fields">
                   <span class="country_val validation"></span> </div>
                <div class="pure-control-group">
                   <label for="email" class="login_font">Email Address *</label>
                   <input id="email" type="email" placeholder="Email address" name="email" required class="fields">
                   <span class="email_val validation"></span> </div>
                <div class="pure-control-group">
                   <label for="password" class="login_font">Password *</label>
                   <input id="password" type="password" placeholder="Password" name="password" class="fields" style="width:285px; height:45px;">
                   <span class="password_val validation"></span> </div>
                <div class="pure-control-group">
                   <label for="cpassword" class="login_font">Confirm Password *</label>
                   <input id="cpassword" type="password" placeholder="Confirm Password" name="confirm_password" class="fields" style="width:285px; height:45px;">
                   <span class="confirm_password_val validation"></span> </div>
                <div class="pure-controls" style="margin-left:16em;">
                   <label for="cb" class="pure-checkbox">
                    <input id="cb" type="checkbox" name="terms_condition" value="1">
                    I agree to the Terms &amp; Conditions.<span class="terms_condition validation"></span> </label>
                 </div>
                <div class="pure-controls" style="margin-left:16em;">
                   <label for="cb1" class="pure-checkbox">
                    <input id="cb1" type="checkbox" name="newsletter" value="1">
                    Sign me up for the top 10 Newsletter! </label>
                   <input name="register" type="button" value="Submit" class="pure-button pure-button-primary">
                   <!--            <button type="submit" class="button-success pure-button">Submit</button>
-->
                   <label class="pure-checkbox black_color"> You have an account already? <span class="black_color"><a href="login.php" style="color:#000; font-weight:bold;">Login here</a></span> </label>
                   <label class=""> Note: Fields marked with * are required.</label>
                 </div>
              </fieldset>
             </form></td>
           <td width="53%" valign="top" style="font-family:Arial, Helvetica, sans-serif;"><div>
              <h2 style="color:#000;text-align:left; margin-left:10px;">Create an Elaxy Account</h2>
             </div>
            <p style="color:#000;margin-left:10px; font-size:12px;">If you want to post your ads efficiently in a single location,
               all while keeping an eye on your statistics and consumer information,
               look no further than Elaxy. </p>
            <p style="color:#000;margin-left:10px; font-size:12px;">Create an account, agree to our terms
               and condition and get posting.</p>
            <div>
              <h2 style="color:#000;text-align:left;margin-left:10px;">Manage all your postings in My Elaxy</h2>
             </div>
            <p  style="color:#000;margin-left:10px; font-size:12px;">Managing all of your ads in one place is a vital aspect
               of keeping on top of your business. </p>
            <p  style="color:#000;margin-left:10px; font-size:12px;">Once you’ve filled out
               Elaxy’s initial registration form, you won’t have to fill out
               your contact information again, ultimately saving you precious
               time and making posting your ads simpler than ever before. </p>
            <p  style="color:#000;margin-left:10px; font-size:12px;">Additionally, Elaxy allows you to view your page stats;
               this handy tool allows you to see how many people are viewing
               your ads and how they reply. With this crucial information, you
               can learn and adapt your ads depending on your audience.               </p>
            <p  style="color:#000;margin-left:10px; font-size:12px;">Feedback is a fantastic way of improving and who better to
               receive it from than your consumers? Grow as a business and gain custom.</p></td>
         </tr>
      </table>
     </div>
  </div>
 </section>
<div class="clear"></div>
<?php require_once('inc/footer.php'); ?>
</body>
</html>