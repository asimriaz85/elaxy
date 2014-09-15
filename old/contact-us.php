<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">

</head>

<body>
<?php require_once('inc/header.php'); ?>



<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div class="left_ad"><img src="images/120x600ad.jpg" width="120" height="600" alt="Image Ad" /></div>
<div id="contant_area">


<form class="pure-form pure-form-stacked">
    <fieldset>
        <legend>Contact Seller:</legend>

        <div class="pure-g">
            <div class="pure-u-1 pure-u-med-1-3">
                <label for="first-name">First Name</label>
                <input id="first-name" type="text">
            </div>

            <div class="pure-u-1 pure-u-med-1-3">
                <label for="last-name">Email</label>
                <input id="last-name" type="text" required>
            </div>

            <div class="pure-u-1 pure-u-med-1-3">
                <label for="email">Telephone (Optional) </label>
                <input id="email" type="email">
            </div>

            <div class="pure-u-1 pure-u-med-1-3">
                <label for="message">Message</label>
                <textarea name="message" style="width: 345px;
height: 140px; resize:none;"></textarea>
            </div>

            
        </div>

       

        <button type="submit" class="pure-button pure-button-primary">Send an Email</button>
    </fieldset>
</form>
  

<section class="map">

<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/?ie=UTF8&amp;ll=40.178873,-54.84375&amp;spn=124.590223,346.289063&amp;t=m&amp;z=2&amp;output=embed"></iframe>

</section>


<div class="add_box"><p><strong>Address: </strong><em>Lorem Ipsum is simply dummy text of the printing and typesetting industry</em></p></div>
    
   









<div class="right_ad"><img src="images/120x600ad.jpg" width="120" height="600" alt="vertical ad" /></div>



</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>