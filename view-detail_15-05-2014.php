<?php include("connection.php");
 require_once('ads.class.php');

$adsens= new adsens;
//$top_ad=$adsens->Display_Ads('Home','Left');
$left_ad=$adsens->Display_Ads('Detail','Left');
$right_ad=$adsens->Display_Ads('Detail','Right');
$footer_ad=$adsens->Display_Ads('Detail','Bottom');

 ?>
<?php
 
 //include("inc/login-security.php");

$cdate=date('Y-m-d');


/////////////Adsens Images//
	
	





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
		$map_postcode=$fetch_post['postcode'];
		
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
	 $cate_id=$fetch_post['main_cat_id'];
	 
	 
	 $daysago = (strtotime($cdate) - strtotime($published_date1)) / (60 * 60 * 24);
	 
	 $select_title="SELECT title,description FROM ad_title_description WHERE postcode_loaction_id='".$postcode_loaction_id."'";
	 $run_title=mysql_query($select_title);
	 $fetch_title=mysql_fetch_array($run_title);
	 $ad_title=$fetch_title['title'];
	 $ad_description=$fetch_title['description'];
	 

?>

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
<script type="text/javascript">
<?php

    // First, we need to take their postcode and get the lat/lng pair:
    $postcode = $map_postcode;
    // Sanitize their postcode:
    $search_code = urlencode($postcode);
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . $search_code . '&sensor=false';
    $json = json_decode(file_get_contents($url));
    $lat = $json->results[0]->geometry->location->lat;
    $lng = $json->results[0]->geometry->location->lng;
    // Now build the lookup:
    $address_url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&sensor=false';
    $address_json = json_decode(file_get_contents($address_url));
    $address_data = $address_json->results[0]->address_components;
    $street = str_replace('Dr', 'Drive', $address_data[1]->long_name);
    $town = $address_data[2]->long_name;
    $county = $address_data[3]->long_name;
    $array = array('street' => $street, 'town' => $town, 'county' => $county);

?>
</script>
<script src= "http://maps.google.com/maps?file=api&amp;v=2&amp;key=" type="text/javascript"> </script>
<script type="text/javascript">
/* Error messages for possible errors */
		var error_address_empty 	= 'Please enter a valid address first.';
		var error_invalid_address 	= 'This address is invalid. Make sure to enter your street number and city as well?'; 
		var error_google_error 		= 'There was a problem processing your request, please try again.';
		var error_no_map_info		= 'Sorry! Map information is not available for this address.';
		
		
		/**********************************************************************************************************************/
		/* CHANGE THIS TO YOUR ADDRESS - The default address of your store, This address will display on the map on startup */
		/**********************************************************************************************************************/
		var default_address = '<?=$street." ".$town." ".$county?>';
		
		
		
		var current_address = null; /* Current address we are displaying, we save it here for directions */
		var map				  = null; /* Instance of Google Maps object */
		var geocoder		  = null; /* Instance of Google Deocoder object */
		var gdir				  = null; /* Instance of Google Directions object */
		var map_compatible  = false; /* Whether or not user's browser is compatible to show the map */
		
		/* Check if the browser is compatible */
		if( GBrowserIsCompatible() ) {
			map_compatible = true;
		}
		
		/* Initialize the map this will be called when the document is loaded from: <body onLoad="initialize_map();"> */
		function initialize_map() {
			if( map_compatible ) {
				map 	  	= new GMap2(document.getElementById('map_canvas'));        
				geocoder = new GClientGeocoder();
				show_address(default_address);
				
				/* This displays the zoom controls for the map. If you don't want them just delete the line */
				map.addControl(new GSmallMapControl());
				
				/* This displays the map type. If you don't want that feature then just delete this */
				map.addControl(new GMapTypeControl());
				
			}
		}
		
		/* This function will move the map and shows the address passed to it */
		function show_address(address) {
			if( map_compatible && geocoder ) {
				/* Save this address in current_address value to use later if user wants directions */
				current_address = address;		
				geocoder.getLatLng(
				address,
				function( point ) {
					if( !point ) {
						alert(error_no_map_info);
					} else {
						map.setCenter(point, 10);
						var marker = new GMarker(point);
						map.addOverlay(marker);
						marker.openInfoWindowHtml(address);
					}
				}
				);
			}
			return false;
		}
		
		/* Get the directions */
		function get_directions() {
			if( map_compatible ) {
				if( document.direction_form.from_address.value == '' ) {
					alert(error_address_empty);
					return false;
				}
				/**
				 * Delete the contents of 'directions' DIV first 
				 * because user might ask for directions more than once.
				**/
				document.getElementById('directions').innerHTML = '';
				
				gdir = new GDirections(map, document.getElementById('directions'));
				
				/* Setup to event handlers, one: when the directions are loaded, two: if there was any error */
				GEvent.addListener(gdir, 'load',  onGDirectionsLoad);
				GEvent.addListener(gdir, 'error', handleErrors);
				
				/* Show the directions */
				set_directions(document.direction_form.from_address.value, current_address);			
			}
			return false;
		}
		
		/* This will actually set the directions on the map and loads the direction table */
		function set_directions(fromAddress, toAddress) {
      	gdir.load("from: " + fromAddress + " to: " + toAddress,
                	{ "locale": "en" });
    	}
		
		/* This will handle the errors might happen while retrieving the directions */
		function handleErrors(){
			if( gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS )
				alert(error_invalid_address);
			else if( gdir.getStatus().code == G_GEO_SERVER_ERROR )
				alert(error_google_error);
			else if( gdir.getStatus().code == G_GEO_MISSING_QUERY )
				alert(error_address_empty);
			else 
				alert(error_invalid_address);
		}
		
		/* This function will be called when the directions are loaded */
		function onGDirectionsLoad(){
			/* We will simple scroll down to the directions, but with a little delay so it's loaded */
			setTimeout('eval(\'window.location = "#directions_table"\;\')', 500);
		}
</script>
</head>

<body onLoad="initialize_map();">
<?php require_once('inc/header.php'); ?>
<section class="main-wrapper">
  <?php require_once('inc/top_ads.php'); ?>
  <div class="clear"></div>
  <div>
    <?php require_once('inc/search_bar.php'); ?>
    <ol class="breadcrumb">
      <li><?php echo ucfirst($cat_maincat_name)."&nbsp;>&nbsp;"; ?></li>
      <li><?php echo ucfirst($cat_name1)."&nbsp;>&nbsp;"; ?></li>
      <li class="active">
        <?php if(!empty($cat_name2)){ ?>
        <?php echo ucfirst($cat_name2); ?>
        <?php } if(!empty($cat_name3)){ ?>
        <?php echo "&nbsp;>&nbsp;".ucfirst($cat_name3); ?>
        <?php } if(!empty($cat_name4)){ ?>
        <?php echo "&nbsp;>&nbsp;".ucfirst($cat_name4); ?>
        <?php } ?>
      </li>
    </ol>
  </div>
  <div class="clear"></div>
  <div class="view-ad">
    <div class="clear"></div>
    <div class="widget2">
      <h3 class="head-gray" style="margin-bottom:10px;"><?php echo $ad_title; ?> </h3>
      <div style="margin-bottom:10px;">
        <div class="btn btn-default"><i class="glyphicon glyphicon-calendar"></i> <?php echo "Posted ".$daysago." "."days ago"; ?></div>
        <div class="btn btn-default"><i class="glyphicon glyphicon-user"></i> Posted by&nbsp;&nbsp;<?php echo $ad_post_name; ?></div>
        <a href="#" id = "div2" style="display:none;" class="btn btn-default"><i class="glyphicon glyphicon-phone"></i> <?php echo $phone; ?></a> <a href="#" id= "div1" onclick = "replace()" class="btn btn-default"><i class="glyphicon glyphicon-phone"></i> <?php echo substr($phone,0, -4).'&nbsp;XXXX'; ?></a> <a href="config/getfavourite.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&uid=<?php echo $user_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>" class="btn btn-default"><i class="glyphicon glyphicon-star"></i> Favourite</a> <a href="report_message.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $u_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $user_id; ?>" onclick="return popitup('report_message.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&feature=<?php echo $feature; ?>&ad_userid=<?php echo $u_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&reporter_id=<?php echo $user_id; ?>')" class="btn btn-default"><i class="glyphicon glyphicon-flag"></i> Report Ad</a> </div>
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
        <!--<a class="fancybox img-thumbnail"  href="uploads/<?php //echo $ad_image1 ?>" data-fancybox-group="gallery" ><img class="img-responsive" src="uploads/<?php //echo $ad_image1 ?>" width="500" height="400"></a>-->
        
       <ul class="nav nav-tabs">
  <li class="active"><a href="#images" data-toggle="tab" style="font-weight:bold;">Images</a></li>
  <li><a href="#map" data-toggle="tab" style="font-weight:bold;">MAP</a></li>
 
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="images"><div class="thumbs clearfix">
          <?php 
  $ad_image2="SELECT file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'";
	 $run_ad_image2=mysql_query($ad_image2);
 while($fetch_ad_image2=mysql_fetch_array($run_ad_image2)){ 
 $ad_image2=$fetch_ad_image2['file_name'];
 ?>
          <a href="uploads/<?php echo $ad_image2 ?>" data-fancybox-group="gallery" class="fancybox"> <img src="uploads/<?php echo $ad_image2 ?>" style="height: 100px; width:100px"> </a>
          <?php } ?>
        </div></div>
  <div class="tab-pane" id="map"><div id="map_canvas" style="width: 475px; float: left; clear: both; height: 200px; border: 2px solid #F0EEEC; position: relative; background-color: #E5E3DF;"></div></div>
 
</div>
        <div class="clear"></div>
        
       
        <div class="col-md-12" style="padding:0; margin-top:20px;">
        
        <?php if($category_name!='Jobs' || $category_name!='Community' || $category_name!='Barter') { ?>
          <h2 class="head-red">Summary</h2>
          <?php } ?>
          <table class="table table-striped" style="font-weight:bold; font-size: 15px;">
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
              <tr>
                <td class="span3">Make</td>
                <td><?php echo $make_name; ?></td>
              </tr>
              <tr>
                <td>Model</td>
                <td><?php echo $model; ?></td>
              </tr>
              <tr>
                <td>Year</td>
                <td><?php echo $year; ?></td>
              </tr>
              <tr>
                <td>Mileage </td>
                <td><?php echo $mileage." miles"; ?></td>
              </tr>
              <tr>
                <td>Seller type</td>
                <td><?php echo $seller_type ?></td>
              </tr>
              <tr>
                <td>Body Type</td>
                <td><?php echo $body_type; ?></td>
              </tr>
              <tr>
                <td>Fuel Type</td>
                <td><?php echo $fuel_type; ?></td>
              </tr>
              <tr>
                <td>Transmission</td>
                <td><?php echo $transmission; ?></td>
              </tr>
              <tr>
                <td>Colour</td>
                <td><?php echo $colour; ?></td>
              </tr>
              <tr>
                <td>Engine Size</td>
                <td><?php echo $engine_size." cc" ?></td>
              </tr>
              <tr>
                <td>Are you a Auto Trader?</td>
                <td><?php echo $dealer ?></td>
              </tr>
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
              <tr>
                <td class="span3">Seller Type</td>
                <td><?php echo $acting_agent; ?></td>
              </tr>
              <tr>
                <td>Date Available</td>
                <td><?php echo $date_available; ?></td>
              </tr>
              <tr>
                <td>Property Type</td>
                <td><?php echo $property_type; ?></td>
              </tr>
              <tr>
                <td>No of Beds </td>
                <td><?php echo $no_rooms; ?></td>
              </tr>
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
              <tr>
                <td class="span3">Job Type</td>
                <td><?php echo $job_contract; ?></td>
              </tr>
              <tr>
                <td>Salary</td>
                <td><?php echo $job_salary; ?></td>
              </tr>
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
              <tr>
                <td class="span3">Make</td>
                <td><?php echo $make_name; ?></td>
              </tr>
              <tr>
                <td>Model</td>
                <td><?php echo $model; ?></td>
              </tr>
              <tr>
                <td>Year</td>
                <td><?php echo $year; ?></td>
              </tr>
              <tr>
                <td>Mileage </td>
                <td><?php echo $mileage." miles"; ?></td>
              </tr>
              <tr>
                <td>Seller type</td>
                <td><?php echo $seller_type ?></td>
              </tr>
              <tr>
                <td>Colour</td>
                <td><?php echo $colour; ?></td>
              </tr>
              <tr>
                <td>Engine Size</td>
                <td><?php echo $engine_size." cc" ?></td>
              </tr>
              <tr>
                <td>Are you a Auto Trader?</td>
                <td><?php echo $dealer ?></td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
       
        
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"> </div>
          <div class="panel-body">
            <?php if($main_cat_id == 3) { ?>
            <?php } else if ($main_cat_id == 4){ ?>
            <?php } else if ($main_cat_id == 5){ ?>
            <?php } else if ($main_cat_id == 8){ ?>
            <?php } else { ?>
            <h2>Price:
              <span class="label label-danger" style="margin-top: 10px; clear:both;"><?php echo "&pound; ".$price; ?></span></h2>
            <?php } ?>
            <div class="clear"></div>
            <h2>Details</h2>
            <?php echo substr($ad_description,0,500); ?>
            <h2>Reply to this ad:</h2>
            <?php
				$postid = base64_encode($post_id);
				$uid = base64_encode($user_id);
				$fname = base64_encode($f_name);
				
			?>
            <form class="pure-form pure-form-stacked" action="submit.php?p=<?php echo $postid; ?>&u=<?php echo $uid; ?>&n=<?php echo $fname; ?>&re=<?=urlencode($_SERVER['REQUEST_URI'])?>" id="form" method="post">
              <table class="table  table-striped table-bordered table-condensed">
                <tbody>
                  <tr>
                    <td>Full Name:</td>
                    <td><input id="first-name" name="name" type="text" <?php if(!empty($session_first_name)){ ?>value="<?php echo $session_first_name;  ?>" readonly <?php } ?>></td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td><input id="last-name" name="email" type="text" required <?php if(!empty($session_email)){ ?> value="<?php echo $session_email;  ?>" readonly <?php } ?>></td>
                  </tr>
                  <tr>
                    <td>Telephone (Optional):</td>
                    <td><input id="email" name="phone" type="text" <?php if(!empty($session_email)){ ?> value="<?php echo $session_phone; ?>" readonly <?php } ?>></td>
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
  <div class="left_ad">
    <?php if(!empty($left_ad['AdCode'])){ echo $left_ad['AdCode']; } else if(!empty($left_ad['Image'])){?>
    <img src="admin_xel/media/upl_gallery/<?php echo $left_ad['Image']; ?>">
    <?php } ?>
  </div>
  <div style="float:right;">
    <?php if(!empty($right_ad['AdCode'])){ echo $right_ad['AdCode']; } else if(!empty($right_ad['Image'])){?>
    <img src="admin_xel/media/upl_gallery/<?php echo $right_ad['Image']; ?>">
    <?php } ?>
  </div>
  <?php
include("inc/view-search.php");
?>
</section>
<div class="clear"></div>
<div style="margin: 0 auto;
width: 750px;">
  <?php if(!empty($footer_ad['AdCode'])){ echo $footer_ad['AdCode']; } else if(!empty($footer_ad['Image'])){?>
  <img src="admin_xel/media/upl_gallery/<?php echo $footer_ad['Image']; ?>">
  <?php } ?>
</div>
<?php require_once('inc/footer.php'); ?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

</body>
</html>