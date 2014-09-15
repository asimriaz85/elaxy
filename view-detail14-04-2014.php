<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen">
     
<?php //include("inc/lightbox-jquery.php"); ?>

<!--Ajax Form Post-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
        
         <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
	</script>
  <script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=200,width=400');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>
<!--END-->
</head>

<body>
<?php require_once('inc/header.php'); 

//include("inc/login-security.php");

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
	    $user_id;
	  $f_id=$_REQUEST['f_id'];
	 
	  $sub_cat_id=$_REQUEST['sub_cat_id'];
	  $feature=$_REQUEST['feature']; 
	  
	  $select_main_cat="SELECT main_cat_id FROM postcode_location WHERE id='".$post_id."'";
	  $run_main_cat=mysql_query($select_main_cat);
	  $fetch_main_cat=mysql_fetch_array($run_main_cat);
	  $main_cat_id=$fetch_main_cat['main_cat_id'];
	  
	  $select_category="SELECT id,name FROM categories WHERE id='".$main_cat_id."'";
	  $run_main_category=mysql_query($select_category);
	  $main_categories=mysql_fetch_array($run_main_category);
	   $category_name=$main_categories['name'];
	  
	   //Total CAt1 Ad//
$total_sub1_add = "SELECT id, COUNT(main_cat_id) FROM postcode_location WHERE main_cat_id='".$main_cat_id."' AND status='1'"; 
	 
$result_sub1_ad = mysql_query($total_sub1_add) or die(mysql_error());
$row_sub1_ad = mysql_fetch_array($result_sub1_ad);
	  $total_sub1_ad=$row_sub1_ad['COUNT(main_cat_id)'];
	  
	  
	  
	  $sub2_name= "SELECT id,name,parent_off FROM categories WHERE id='".$sub_cat_id."'"; 
	 
$result_name2 = mysql_query($sub2_name) or die(mysql_error());
$row_name2 = mysql_fetch_array($result_name2);
	 
	    $sub2_name=$row_name2['name'];
	   $c_id=$row_name2['id'];
	  $parent_off=$row_name2['parent_off'];
	  
	  //Total CAt1 Ad//
 $total_sub2_add = "SELECT id, COUNT(sub_cat_id) FROM postcode_location WHERE sub_cat_id='".$sub_cat_id."' AND status='1'"; 
	 
$result_sub2_ad = mysql_query($total_sub2_add) or die(mysql_error());
$row_sub2_ad = mysql_fetch_array($result_sub2_ad);
	   $total_sub2_ad=$row_sub2_ad['COUNT(sub_cat_id)'];
	  
	$select_pname="SELECT id,name FROM categories WHERE id='".$parent_off."'";
	$run_select_pname=mysql_query($select_pname);
	 
	$fetch_pname=mysql_fetch_array($run_select_pname);
	 $pid=$fetch_pname['id'];
	  $pname=$fetch_pname['name'];   
	   
	  
	  
	  $select_views="SELECT post_id,user_id FROM views WHERE post_id='".$post_id."' AND user_id='".$user_id."'";
	  $run_views=mysql_query($select_views);
	  $num_views=mysql_num_rows($run_views);
	  $fetch_views=mysql_fetch_array($run_views);
	  $view_post_id=$fetch_views['post_id'];
	  $view_user_id=$fetch_views['user_id'];
	  
	  if($num_views==0){
		  $insert_views="INSERT INTO views(post_id,user_id)VALUES('".$post_id."','".$user_id."')";
		  $run_insert_views=mysql_query($insert_views);
		  
	  }
	  
	  
	  
	  
	 
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
		
		$main_cat=$fetch_post['main_cat_id'];
		$sub_cat_id_id=$fetch_post['sub_cat_id'];
		$sub_sub_cat=$fetch_post['sub_sub_cat'];
		$sub_cat_child_child=$fetch_post['sub_cat_child_child'];
		$sub_cat_child_child_child=$fetch_post['sub_cat_child_child_child'];
		
		$select_maincat="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$main_cat."'";
	$run_maincat=mysql_query($select_maincat);
	$fetch_maincat=mysql_fetch_array($run_maincat);
	 $cat_maincat_name=$fetch_maincat['name'];
	
	$select_cat_id1="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_cat_id_id."'";
	$run_cat_id1=mysql_query($select_cat_id1);
	$fetch_cat_id1=mysql_fetch_array($run_cat_id1);
	 $cat_name1=$fetch_cat_id1['name'];
	
	$select_cat_id2="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_sub_cat."'";
	$run_cat_id2=mysql_query($select_cat_id2);
	$fetch_cat_id2=mysql_fetch_array($run_cat_id2);
	  $cat_name2=$fetch_cat_id2['name'];
	$cat_name2_id=$fetch_cat_id2['id'];
	
	$select_cat_id3="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_cat_child_child."'";
	$run_cat_id3=mysql_query($select_cat_id3);
	$fetch_cat_id3=mysql_fetch_array($run_cat_id3);
	 $cat_name3=$fetch_cat_id3['name'];
	$cat_name3_id=$fetch_cat_id3['id'];
	
	$select_cat_id4="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_cat_child_child_child."'";
	$run_cat_id4=mysql_query($select_cat_id4);
	$fetch_cat_id4=mysql_fetch_array($run_cat_id4);
	$cat_name4=$fetch_cat_id4['name'];
	$cat_name4_id=$fetch_cat_id4['id'];
		
		
		
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

<div>
<?php require_once('inc/search_bar.php'); ?>
<ol class="breadcrumb">
  <li><?php echo ucfirst($cat_maincat_name)."&nbsp;>&nbsp;"; ?></li>
  <li><?php echo ucfirst($cat_name1)."&nbsp;>&nbsp;"; ?></li>
  <li class="active"> <?php if(!empty($cat_name2)){ ?><?php echo ucfirst($cat_name2); ?><?php } if(!empty($cat_name3)){ ?> <?php echo "&nbsp;>&nbsp;".ucfirst($cat_name3); ?><?php } if(!empty($cat_name4)){ ?><?php echo "&nbsp;>&nbsp;".ucfirst($cat_name4); ?><?php } ?></li>
</ol>


</div>

<div class="clear"></div>

<div class="view-ad">



<div class="clear"></div>

<div class="slide_contact">
 
<div><img src="images/lead.jpg" alt="ad banner" /></div>


<div class="clear"></div>
</div>


<div class="widget2">
              <h3 class="head-gray" style="margin-bottom:10px;"><?php echo $ad_title; ?> </h3>
              <div style="margin-bottom:10px;">
               <a href="" class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i> <?php echo "Posted ".$daysago." "."days ago"; ?></a> 
                     
                    
                    
                    <a href="#" id = "div2" style="display:none; width:50px;" class="btn btn-default"><i class="glyphicon glyphicon-phone"></i> <?php echo $phone; ?></a>
                    
                    
                      <a href="config/getfavourite.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&uid=<?php echo $user_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>" class="btn btn-default"><i class="glyphicon glyphicon-star"></i> Favourite</a>
                      <a href="report_message.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $u_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $user_id; ?>" onclick="return popitup('report_message.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $u_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $user_id; ?>')" class="btn btn-default"><i class="glyphicon glyphicon-flag"></i> Report Ad</a>
                      
                      </div>
              
              <div class="clear"></div>
              <?php if(isset($_REQUEST['msg'])){?>
        <div class="alert alert-danger"><?php echo $_REQUEST['msg']; ?></div>
        <?php } ?>
              
              <div class="col-md-6">
              <?php
$ad_image="SELECT file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'";
	 $run_ad_image=mysql_query($ad_image);
	 $fetch_ad_image=mysql_fetch_array($run_ad_image);
	 $ad_image1=$fetch_ad_image['file_name'];
?>
              <a class="fancybox img-thumbnail"  href="uploads/<?php echo $ad_image1 ?>" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img class="img-responsive" src="uploads/<?php echo $ad_image1 ?>"></a>
              
<div class="thumbs clearfix"> 
 <?php 
  $ad_image2="SELECT file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'";
	 $run_ad_image2=mysql_query($ad_image2);
 while($fetch_ad_image2=mysql_fetch_array($run_ad_image2)){ 
 $ad_image2=$fetch_ad_image2['file_name'];
 ?>
 
<a href="uploads/<?php echo $ad_image2 ?>" data-fancybox-group="gallery" class="fancybox"> <img src="uploads/<?php echo $ad_image2 ?>" style="height: 100px; width:100px"> </a>
<?php } ?>

 </div>              
              
                  
                  
                  
<div class="col-md-12" style="padding:0; margin-top:20px;">
                  <h2 class="head-red">Summary</h2>
<table class="table table-striped">
                        <tbody>
                        
                        <?php 
if($category_name=="Cars, Vans & Trucks"){
$select_vehicle_make_model="SELECT * FROM vehicle_make_mode WHERE postcode_loaction_id='".$post_id."'";
$run_vehicle_make_model=mysql_query($select_vehicle_make_model);
$num_rows_vehicle=mysql_num_rows($run_vehicle_make_model);
$fetch_vehicle_make_model=mysql_fetch_array($run_vehicle_make_model);
$make_id=$fetch_vehicle_make_model['make_id'];
$year=$fetch_vehicle_make_model['year'];
$model=$fetch_vehicle_make_model['model'];
$fuel_type=$fetch_vehicle_make_model['fuel_type'];
$body_type=$fetch_vehicle_make_model['body_type'];
$transmission=$fetch_vehicle_make_model['transmission'];
$colour=$fetch_vehicle_make_model['colour'];
$engine_size=$fetch_vehicle_make_model['engine_size'];
$mileage=$fetch_vehicle_make_model['mileage'];
$car_price=$fetch_vehicle_make_model['price'];
$dealer=$fetch_vehicle_make_model['dealer'];

if($dealer=="No"){
	$seller_type="Private";
	
}

if($dealer=="Yes"){
	$seller_type="Agent";
	
}

$select_make_name="SELECT id,name FROM categories WHERE id='".$make_id."'";
$run_make_name=mysql_query($select_make_name);
$fetch_make_name=mysql_fetch_array($run_make_name);
$make_name=$fetch_make_name['name'];
?>
<?php if($num_rows_vehicle > 0){ ?>
                        <tr><td class="span3">Make</td><td><?php echo $make_name; ?></td></tr>
                            <tr><td>Model</td><td><?php echo $model; ?></td></tr>
                            <tr><td>Year</td><td><?php echo $year; ?></td></tr>
                             <tr><td>Mileage </td><td><?php echo $mileage." miles"; ?></td></tr>
                            <tr><td>Seller type</td><td><?php echo $seller_type ?></td></tr>
                         <tr><td>Body Type</td><td><?php echo $body_type; ?></td></tr>
                            <tr><td>Fuel Type</td><td><?php echo $fuel_type; ?></td></tr>
                           
                            <tr><td>Transmission</td><td><?php echo $transmission; ?></td></tr>
                            <tr><td>Colour</td><td><?php echo $colour; ?></td></tr>
                            <tr><td>Engine Size</td><td><?php echo $engine_size." cc" ?></td></tr>
                            <?php } } ?>
                            
               <?php 
if($category_name=="Flats & Houses"){
$select_property_holiday_rent="SELECT * FROM property_holiday_rent WHERE postcode_loaction_id='".$post_id."'";
$run_property_holiday_rent=mysql_query($select_property_holiday_rent);
$num_rows_property=mysql_num_rows($run_property_holiday_rent);
$fetch_property_holiday_rent=mysql_fetch_array($run_property_holiday_rent);
$date_available=$fetch_property_holiday_rent['date_available'];
$rent_price=$fetch_property_holiday_rent['rent_price'];
$rent_period=$fetch_property_holiday_rent['rent_period'];
$property_type=$fetch_property_holiday_rent['property_type'];
$no_rooms=$fetch_property_holiday_rent['no_rooms'];
$acting_agent=$fetch_property_holiday_rent['acting_agent'];





?>
<?php if($num_rows_property > 0){ ?>

<tr><td class="span3">Seller Type</td><td><?php echo $acting_agent; ?></td></tr>
                            <tr><td>Date Available</td><td><?php echo $date_available; ?></td></tr>
                            <tr><td>Property Type</td><td><?php echo $property_type; ?></td></tr>
                             <tr><td>No of Beds </td><td><?php echo $no_rooms; ?></td></tr>

<?php } } ?>               
                            
   <?php 
 
 ///Jobs///
 
if($category_name=="Jobs"){
$select_job_contract="SELECT * FROM job_contract WHERE postcode_loaction_id='".$post_id."'";
$run_job_contract=mysql_query($select_job_contract);
$num_rows_job_contract=mysql_num_rows($run_job_contract);
$fetch_job_contract=mysql_fetch_array($run_job_contract);

$job_contract=$fetch_job_contract['job_contract'];
$job_salary=$fetch_job_contract['salary'];


?>
<?php if($run_job_contract > 0){ ?>
<tr><td class="span3">Job Type</td><td><?php echo $job_contract; ?></td></tr>
                            <tr><td>Salary</td><td><?php echo $job_salary; ?></td></tr>

<?php } } ?>                         
                            
    
    <?php 
if($category_name=="Motorbikes, Scooters & Parts" && $sub2_name!="Motorbike Parts & Accessories"){
$select_vehicle_make_model="SELECT * FROM vehicle_make_mode WHERE postcode_loaction_id='".$post_id."'";
$run_vehicle_make_model=mysql_query($select_vehicle_make_model);
$num_rows_vehicle=mysql_num_rows($run_vehicle_make_model);
$fetch_vehicle_make_model=mysql_fetch_array($run_vehicle_make_model);
$make_id=$fetch_vehicle_make_model['make_id'];
$year=$fetch_vehicle_make_model['year'];
$model=$fetch_vehicle_make_model['model'];
$fuel_type=$fetch_vehicle_make_model['fuel_type'];
$body_type=$fetch_vehicle_make_model['body_type'];
$transmission=$fetch_vehicle_make_model['transmission'];
$colour=$fetch_vehicle_make_model['colour'];
$engine_size=$fetch_vehicle_make_model['engine_size'];
$mileage=$fetch_vehicle_make_model['mileage'];
$car_price=$fetch_vehicle_make_model['price'];
$dealer=$fetch_vehicle_make_model['dealer'];

if($dealer=="No"){
	$seller_type="Private";
	
}

if($dealer=="Yes"){
	$seller_type="Agent";
	
}

$select_make_name="SELECT id,name FROM categories WHERE id='".$make_id."'";
$run_make_name=mysql_query($select_make_name);
$fetch_make_name=mysql_fetch_array($run_make_name);
$make_name=$fetch_make_name['name'];
?>
<?php if($num_rows_vehicle > 0){ ?>

<tr><td class="span3">Make</td><td><?php echo $make_name; ?></td></tr>
                            <tr><td>Model</td><td><?php echo $model; ?></td></tr>
                            <tr><td>Year</td><td><?php echo $year; ?></td></tr>
                             <tr><td>Mileage </td><td><?php echo $mileage." miles"; ?></td></tr>
                            <tr><td>Seller type</td><td><?php echo $seller_type ?></td></tr>
                       
                            <tr><td>Colour</td><td><?php echo $colour; ?></td></tr>
                            <tr><td>Engine Size</td><td><?php echo $engine_size." cc" ?></td></tr>
<?php } } ?>

    
    
    
                            
                            
                        </tbody></table>                  
              </div>                         
                  
              </div>
              
              <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <a href="" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Print</a> 
                      <a href="" class="btn btn-default"><i class="glyphicon glyphicon-user"></i> Posted by&nbsp;&nbsp;<?php echo $ad_post_name; ?></a>  
                    <a href="#" id= "div1" onclick = "replace()" class="btn btn-default"><i class="glyphicon glyphicon-phone"></i> <?php echo substr($phone,0, -4).'&nbsp;XXXX'; ?></a>
                  </div>
                  <div class="panel-body">
                    <h2>Price: <span class="label label-danger"><?php echo "&pound; ".$price; ?></span></h2>
                    
                     <h2>Details</h2>
                  <?php echo $ad_description; ?>
            
            <h2>REPLY TO THIS AD:</h2>
            <form class="pure-form pure-form-stacked" action="submit.php?post_id=<?php echo $post_id; ?>&user_id=<?php echo $user_id; ?>&f_name=<?php echo $f_name; ?>" id="form">
<table class="table  table-striped table-bordered table-condensed">
  <tbody>
    <tr>
      <td>Full Name:</td>
      <td> <input id="first-name" name="name" type="text" value="<?php echo $session_first_name;  ?>" readonly></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td> <input id="last-name" name="email" type="text" required value="<?php echo $session_email;  ?>" readonly></td>
    </tr>
    <tr>
      <td>Telephone (Optional):</td>
      <td> <input id="email" name="phone" type="text" value="<?php echo $session_phone; ?>" readonly></td>
    </tr>
    <tr>
      <td>Message:</td>
      <td><textarea name="message"  style="width: 345px;
height: 140px; resize:none;"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit"  name="send message" class="btn btn-primary">Send an Email</button></td>
    </tr>
  </tbody>
</table>
  </form>                        
                                        
                  </div>
                  <!--<div class="panel-footer">
                      <a href="" class="btn btn-warning"><i class="glyphicon glyphicon-star"></i> Full Stocks</a> 
                      <a href="" class="btn btn-danger"><i class="glyphicon glyphicon-user"></i> Profile</a>                    
                  </div>-->
                </div>              
              </div>
              
              
              
              
              
              
            </div>













</div>

<script type = "text/javascript">
function replace() {
document.getElementById("div1").style.display="none";
document.getElementById("div2").style.display="";
}

</script>
<div class="clear"></div>







<?php //include("inc/left_side5.php"); ?>
<div class="widget2">
              <h3 class="head-gray" style="margin-bottom:10px;">Related Ads </h3>
              </div>

<div class="left_ad"><?php if(!empty($ad_code_left)){ echo $ad_code_left; } else if(!empty($adsen_left_image)){?><img src="admin_xel/media/large_gallery/<?php echo $adsen_left_image; ?>"> <?php } ?></div>





<?php
include("inc/view-search.php");
?>

</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->


 


</body>
</html>