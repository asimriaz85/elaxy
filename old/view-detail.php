<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">

<?php include("inc/lightbox-jquery.php"); ?>

<!--Ajax Form Post-->
<script type="text/javascript" src="contact-message/js/jquery.validate.js"></script> 
		 <script type="text/javascript" src="contact-message/js/jquery.form.js"></script> 

        <script type="text/javascript">
            $('document').ready(function(){

			$('#form').validate({
                    rules:{
                        "name":{
                            required:true,
                            maxlength:40
                        },

                        "email":{
                            required:true,
                            email:true,
                            maxlength:100
                        },

                        "message":{
                            required:true
                        }},

                    messages:{
                        "name":{
                            required:"This field is required"
                        },

                        "email":{
                            required:"This field is required",
                            email:"Please enter a valid email address"
                        },
						
						"phone":{
                            required:"This field is required",
                            
                        },

                        "message":{
                            required:"This field is required"
                        }},

                    submitHandler: function(form){
                      $(form).ajaxSubmit({
        target: '#preview', 
        success: function() { 
        $('#formbox').slideUp('fast'); 
        } 
    }); 
			
                    }
                
            })
						
        });
        </script> 
<!--END-->
</head>

<body>
<?php require_once('inc/header.php'); 

include("inc/login-security.php");

$cdate=date('Y-m-d');


/////////////Adsens Images//
	
	


$select_left_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='Detail' AND location='Left' AND status='Show'";
$run_left=mysql_query($select_left_adsen);
$fetch_left_adsen=mysql_fetch_array($run_left);
$ad_code_left=$fetch_left_adsen['ad_code'];
$adsen_left_image=$fetch_left_adsen['images'];


$select_right_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='Detail' AND location='Right' AND status='Show'";
$run_right=mysql_query($select_right_adsen);
$fetch_right_adsen=mysql_fetch_array($run_right);
$ad_code_right=$fetch_right_adsen['ad_code'];
$adsen_right_image=$fetch_right_adsen['images'];




	   $post_id=$_REQUEST['post_id'];
	  $f_id=$_REQUEST['f_id'];
	 
	  $sub_cat_id=$_REQUEST['sub_cat_id'];
	  $feature=$_REQUEST['feature']; 
	  
	 
	 $select_price="SELECT name,price,days,postcode_loaction_id FROM ad_price WHERE postcode_loaction_id='".$post_id."'";
	 $run_price=mysql_query($select_price);
	 $fetch_price=mysql_fetch_array($run_price);
	 $price=$fetch_price['price'];
	 $postcode_loaction_id=$fetch_price['postcode_loaction_id'];
	 $f_name=$fetch_price['name'];
	 
	 
	 
	 
	 
	 
	  $select_post="SELECT * FROM postcode_location WHERE id='".$postcode_loaction_id."'";
	 $run_post=mysql_query($select_post);
	 $fetch_post=mysql_fetch_array($run_post);
	 
	 $published_date1=$fetch_post['date'];
	 
	    $u_id=$fetch_post['user_id'];
		
		$select_post_ad_name="SELECT id,first_name,last_name,phone FROM registration WHERE id='".$u_id."'";
		$run_select_post_ad_name=mysql_query($select_post_ad_name);
		$fetch_post_user=mysql_fetch_array($run_select_post_ad_name);
		$ad_post_name=$fetch_post_user['first_name'];
		$phone=$fetch_post_user['phone'];
	 
	 $town1=$fetch_post['town'];
	 $price=$fetch_post['item_price'];
	 
	 $daysago = (strtotime($cdate) - strtotime($published_date1)) / (60 * 60 * 24);
	 
	 $select_title="SELECT title,description FROM ad_title_description WHERE postcode_loaction_id='".$postcode_loaction_id."'";
	 $run_title=mysql_query($select_title);
	 $fetch_title=mysql_fetch_array($run_title);
	 $ad_title=$fetch_title['title'];
	 $ad_description=$fetch_title['description'];

?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div class="view-ad">
<?php if(isset($_REQUEST['msg'])){?>
        <div id="error"><?php echo $_REQUEST['msg']; ?></div>
        <?php } ?>
<div class="ad-title"><h1>Ad Title</h1><span>Location</span></div>
<div class="clear"></div>
<div class="ad-icon">
<ul>

<li><strong><?php echo "&pound; ".$price; ?></strong></li>
<li><a href="#"><img src="images/post.png" width="24" height="24" alt="Calendar" /><?php echo "Posted ".$daysago." "."days ago"; ?></a></li>
<li><a href="#"><img src="images/post2.png" width="24" height="24" alt="Post by"  />Posted by&nbsp;&nbsp;<?php echo $ad_post_name; ?></a></li>
<li><img src="images/post3.png" width="24" height="24" alt="reply" /><a href="#">Reply to this ad</a></li>
<li><a href="config/getfavourite.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&uid=<?php echo $user_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>"><img src="images/fav.png" width="24" height="24" alt="star"  />Favourite</a></li>
<li><a href="report_message.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $u_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $user_id; ?>" id="various3"><img src="images/post4.png" width="24" height="24" alt="report flag"  />Report Ad</a></li>
</ul>

</div>

<div class="clear"></div>
<div class="ad-detail"><?php echo $ad_description; ?></div>
<div class="slider">
<?php
$ad_image="SELECT file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'";
	 $run_ad_image=mysql_query($ad_image);
	 $fetch_ad_image=mysql_fetch_array($run_ad_image);
	 $ad_image1=$fetch_ad_image['file_name'];
?>

<div class="main-image">
    <img src="uploads/<?php echo $ad_image1 ?>" width="380" height="380" alt="Placeholder" class="custom">
  </div>

 <ul class="thumbnails">
 <?php 
  $ad_image2="SELECT file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'";
	 $run_ad_image2=mysql_query($ad_image2);
 while($fetch_ad_image2=mysql_fetch_array($run_ad_image2)){ 
 $ad_image2=$fetch_ad_image2['file_name'];
 ?>
    <li><a href="uploads/<?php echo $ad_image2 ?>"><img src="uploads/<?php echo $ad_image2 ?>" width="60" height="60" alt="Thumbnails"></a></li>
    <?php } ?>
  </ul>

</div>
<div class="slide_contact">
<div style="float:left; width:43%">
<form class="pure-form pure-form-stacked" action="submit.php?post_id=<?php echo $post_id; ?>&user_id=<?php echo $user_id; ?>&f_name=<?php echo $f_name; ?>">
    <fieldset>
        <legend>Contact Seller:</legend>

        <div class="pure-g">
            <div class="pure-u-1 pure-u-med-1-3">
                <label for="first-name">First Name</label>
                <input id="first-name" name="name" type="text" value="<?php echo $session_first_name;  ?>" readonly>
            </div>

            <div class="pure-u-1 pure-u-med-1-3">
                <label for="last-name">Email</label>
                <input id="last-name" name="email" type="text" required value="<?php echo $session_email;  ?>" readonly>
            </div>

            <div class="pure-u-1 pure-u-med-1-3">
                <label for="email">Telephone (Optional) </label>
                <input id="email" name="phone" type="text" value="<?php echo $session_phone; ?>" readonly>
            </div>

            <div class="pure-u-1 pure-u-med-1-3">
                <label for="message">Message</label>
                <textarea name="message"  style="width: 345px;
height: 140px; resize:none;"></textarea>
            </div>

            
        </div>

       

        <button type="submit" class="pure-button pure-button-primary" name="send message">Send an Email</button>
    </fieldset>
</form>

</div>






<div><img src="images/lead.jpg" alt="ad banner" /></div>


<div class="clear"></div>
</div>





</div>


<div class="clear"></div>







<section class="left_search">

<form name="search-form" method="post" class="form">


<input type="text" id="name" name="username">
<div class="search_cate">

<select>
			<option>Select A Category</option>
           
</select>

</div>
<div class="search_cate">
<select>
			<option>Select A Region</option>
           
</select>

</div>
<input type="text" id="username" name="user">



<div class="search_cate">

<select>
			<option>Select A Category</option>
           
</select>

</div>
<div class="search_cate">
<select>
			<option>Select A Region</option>
           
</select>

</div>

<input type="submit" class="button position" name="button" id="button" value="Submit" />
</form>


<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>


<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>

<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>


<section class="search-ad">
<img src="images/200x200ad.jpg" width="200" height="200" alt="" />
</section>


 </section>



<?php
include("inc/view-search.php");
?>

</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
  <script src="js/jquery.simpleGal.js"></script>
  

  <script>
  $(document).ready(function () {
    $('.thumbnails').simpleGal({
      mainImage: '.custom'
    });
  });
  </script>


</body>
</html>