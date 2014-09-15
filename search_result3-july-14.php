<?php error_reporting(0);

include("connection.php");



function get_lan_lat($postcode=''){

    

    $postcode = str_replace(" ","+",$postcode);

    

    $url ="http://maps.googleapis.com/maps/api/geocode/xml?address=".$postcode."+UK&sensor=false";

    $result = simplexml_load_file($url);



    if(!empty($result->result->geometry->location)){ 

        $lat = get_object_vars($result->result->geometry->location); 

        

    } else {

        $lat = array(0,0);

    }

    

    return $lat;

    

    

} // end of function 





 $name_keyword=$_REQUEST['name'];



$parent_categories=$_REQUEST['parent_categories'];



 







	$cdate=date('Y-m-d');



if(!empty($_POST['region'])){

  $lat_lang = get_lan_lat($_POST['region']);

$sql_ids_loc = "SELECT id,postcode, companyname, town,lat, lang, distance

  FROM (

 SELECT z.id,

        z.postcode,

      	z.companyname,

      	z.town,

        z.lat, z.lang,

        p.radius,

        p.distance_unit

                 * DEGREES(ACOS(COS(RADIANS(p.latpoint))

                 * COS(RADIANS(z.lat))

                 * COS(RADIANS(p.longpoint - z.lang))

                 + SIN(RADIANS(p.latpoint))

                 * SIN(RADIANS(z.lat)))) AS distance

  FROM postcode_location AS z

  JOIN (   /* these are the query parameters */

        SELECT  ".$lat_lang['lat']."  AS latpoint,  ".$lat_lang['lng']." AS longpoint,

                ".$_POST['miles']." radius,      69.0 AS distance_unit

    ) AS p

  WHERE z.lat

     BETWEEN p.latpoint  - (p.radius / p.distance_unit)

         AND p.latpoint  + (p.radius / p.distance_unit)

    AND z.lang

     BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))

         AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))

 ) AS d

 WHERE distance <= radius

 ORDER BY distance

 LIMIT 15

 ";

$rs_ids_loc = mysql_query($sql_ids_loc);

$row_ids_loc = mysql_num_rows($rs_ids_loc);

if($row_ids_loc > 0){

    

    while($res = mysql_fetch_array($rs_ids_loc)){

        $ids_loc[] = $res[0]; 

    }

}





$ids = implode(",", $ids_loc);

} else {

    $ids = search_sub_cat($parent_categories);

}















//echo $ids;





if(!empty($parent_categories) && !empty($name_keyword)){



if(!empty($_POST['region'])){

  $lat_lang = get_lan_lat($_POST['region']);









 $sql_search_view = "SELECT postcode_location.id, postcode_location.main_cat_id, postcode_location.item_price, postcode_location.status, postcode_location.lat, postcode_location.lang, postcode_location.date, ad_title_description.id, ad_title_description.postcode_loaction_id, ad_title_description.title, ad_title_description.description, ad_title_description.url FROM postcode_location Inner Join ad_title_description ON postcode_location.id = ad_title_description.postcode_loaction_id WHERE postcode_location.status ='1' and ad_title_description.title like '%".$name_keyword."%' AND postcode_location.id IN(SELECT id FROM ( SELECT z.id, z.postcode, z.companyname, z.town, z.lat, z.lang, p.radius, p.distance_unit * DEGREES(ACOS(COS(RADIANS(p.latpoint)) * COS(RADIANS(z.lat)) * COS(RADIANS(p.longpoint - z.lang)) + SIN(RADIANS(p.latpoint)) * SIN(RADIANS(z.lat)))) AS distance FROM postcode_location AS z JOIN ( /* these are the query parameters */ SELECT ".$lat_lang['lat']." AS latpoint, ".$lat_lang['lng']." AS longpoint, ".$_POST['miles']." radius, 69.0 AS distance_unit ) AS p WHERE z.lat BETWEEN p.latpoint - (p.radius / p.distance_unit) AND p.latpoint + (p.radius / p.distance_unit) AND z.lang BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) ) AS d WHERE distance <= radius ORDER BY distance)"; 



} else {

    $ids = search_sub_cat($parent_categories);

 



  $sql_search_view = "SELECT



postcode_location.id,



postcode_location.main_cat_id,



postcode_location.item_price,



postcode_location.status,

postcode_location.lat,

postcode_location.lang,



postcode_location.date,



ad_title_description.id,



ad_title_description.postcode_loaction_id,



ad_title_description.title,



ad_title_description.description,



ad_title_description.url



FROM



postcode_location



Inner Join ad_title_description ON postcode_location.id = ad_title_description.postcode_loaction_id



 WHERE  postcode_location.status ='1' and ad_title_description.title like '%".$name_keyword."%' and postcode_location.main_cat_id IN (".$ids.")"; 



}



}



else if(!empty($parent_categories) && empty($name_keyword)){



	



	  $sql_search_view = "SELECT



postcode_location.id,



postcode_location.main_cat_id,



postcode_location.item_price,



postcode_location.status,

postcode_location.lat,

postcode_location.lang,

postcode_location.date,



ad_title_description.id,



ad_title_description.postcode_loaction_id,



ad_title_description.title,



ad_title_description.description,



ad_title_description.url



FROM



postcode_location



Inner Join ad_title_description ON postcode_location.id = ad_title_description.postcode_loaction_id



 WHERE  postcode_location.status ='1' and  postcode_location.main_cat_id IN (".$ids.")"; 







 



	}



else if(empty($parent_categories) && !empty($name_keyword))



{



	



	 $sql_search_view = "SELECT



postcode_location.id,



postcode_location.user_id,



postcode_location.main_cat_id,



postcode_location.item_price,



postcode_location.status,

postcode_location.lat,

postcode_location.lang,



postcode_location.date,



ad_title_description.id,



ad_title_description.postcode_loaction_id,



ad_title_description.title,



ad_title_description.description,



ad_title_description.url



FROM



postcode_location



Inner Join ad_title_description ON postcode_location.id = ad_title_description.postcode_loaction_id



 WHERE  postcode_location.status ='1' and ad_title_description.title like '%".$name_keyword."%'"; 



	}











//var_dump($sql_search_view);







$result_search_view = mysql_query($sql_search_view);











 $num_rows_views=mysql_num_rows($result_search_view);



	



	$get_postcode=mysql_fetch_array($result_search_view);



	

$mappins = mysql_query($sql_search_view);

	







	

	











?>



<!DOCTYPE html>



<html>



<head>

 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<?php require_once('inc/meta.php'); ?>

<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
	</script>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">



<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">





 <?php

 $mrk_cnt = 0;

while ($obj =mysql_fetch_array($mappins))  // get all rows (markers)

{

    $lat[$mrk_cnt] = $obj['lat'];  // save the lattitude

    $lng[$mrk_cnt] = $obj['lang'];  // save the longitude

    $inf[$mrk_cnt] = $obj['title'];  // save the info-window

    $mrk_cnt++;                      // increment the marker counter

}

//$res->close();

// Now we have the lattitude, longitude and info-window text for each marker 

// stored in php arrays. Now we need to write the marker's JavaScript 

// dynamically with this information

	

?>



<script type='text/javascript'>

var point;

var mrktx;

function load() {

   addTo = 0;

   var latlng = new google.maps.LatLng(52.355518, -1.17432);

   var myOptions = {

      zoom: 7,

      center: latlng,

      mapTypeId: google.maps.MapTypeId.ROADMAP

   };

   // NOTE: all values: latitude, longitude, zoom, etc.

   //       should also come from the database for flexibility

       

   var map = new google.maps.Map(document.getElementById("map_canvas"), 

              myOptions);

// This next block of JavaScript needs to be generated by PHP 

// to 'add-in' the information from the arrays



<?php

for ($lcnt = 0; $lcnt < $mrk_cnt; $lcnt++)

{

		

    echo "var point$lcnt = new google.maps.LatLng($lat[$lcnt], $lng[$lcnt]);\n";

    echo "var mrktx$lcnt = \"$inf[$lcnt]\";\n";

	echo "var infowindow$lcnt = new google.maps.InfoWindow({

   			content: mrktx$lcnt

			});";

    echo "var marker$lcnt = new google.maps.Marker({position: point$lcnt, map: map});\n";

	echo "google.maps.event.addListener(marker$lcnt, 

         'click', function() {

   		     infowindow$lcnt.open(map,marker$lcnt);

          });\n";

}

?>

}

</script>















</head>







<body>



<?php require_once('inc/header.php'); 



?>















<section class="main-wrapper">



<?php require_once('inc/top_ads.php'); ?>















<div class="clear"></div>











<?php require_once('inc/search_bar.php'); ?>











<div class="clear"></div>







<?php



require_once("inc/left_side.php");



?>











<div id="contant_area" style="float:left;">



<div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000; float:left;">



               



    <div id="contant_area">


<?php



















	



	



	if($num_rows_views >0){ ?>
  <div class="tophd"> <div class="mapbtn"><a href="#myDivID" id="fancyBoxLink" onClick="load()"><img src="/images/map.png" width="20" height="20">Map View</a></div></div>
 
  
  
  <div style="display:none">
    <div id="myDivID">
        <div id="map_canvas" style="width: 625px; height: 500px; margin-left:10px;"></div>
    </div>
</div>

<script type="text/javascript">
    $("a#fancyBoxLink").fancybox({
        'href'   : '#myDivID',
        'titleShow'  : false,
        'transitionIn'  : 'elastic',
        'transitionOut' : 'elastic'
    });
	
	
	
</script>
<div class="clear"></div>

<?php


		do



		{



			$user_id=$get_postcode['user_id'];



			 $post_id=$get_postcode['postcode_loaction_id'];



			



			$published_date=$get_postcode['date'];



			$town=$get_postcode['town'];



			



			



			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);



			



			 $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";



			$run_image_query=mysql_query($select_image_query);



			



			$fetch_image_query=mysql_fetch_array($run_image_query);



			 $image_name=$fetch_image_query['file_name'];



			//End Image//



			



			



			$title=$get_postcode['title'];



			$url=$get_postcode['url'];



			$description=$get_postcode['description'];



			



			//End Title Description//



			



			$feature_name=$get_postcode['name'];



				$feature_price=$get_postcode['item_price'];



				$ad_price_days=$get_postcode['days'];



				$ad_main_cat=$get_postcode['main_cat_id'];



				



				



				$email="SELECT email,phone FROM registration WHERE id='".$user_id."'";



				$run_email=mysql_query($email);



				$fetch_email=mysql_fetch_array($run_email);



				$email_id=$fetch_email['email'];



				$phone=$fetch_email['phone'];



?>



<section class="listing-box">











<div class="list-image"><a href="http://elaxy.co.uk/ad/<?=$url?>"><img src="uploads/<?php echo $image_name; ?>" width="121" height="84" alt="" /></a></div>



<div class="list-detail">



<div class="list-hd"><a href="http://elaxy.co.uk/ad/<?=$url?>"><?php echo $title; ?></a></div>



<div class="list-cnt"><?php echo substr($description, 0, 70)."....."; ?></div>



<div class="list-loc"><?php echo $town; ?></div>



</div>



<?php if($feature_name!="Free Ad"){ ?><!--<div class="list-feature"> <?php //echo $feature_name;   ?></div>--><?php } ?>



<div class="list-star"></div>



<div class="list-pricing">



 <?php if($ad_main_cat == 3) { ?>



                   



                    <?php } else if ($ad_main_cat == 4){ ?>



                    



                    <?php } else if ($ad_main_cat == 5){ ?>



                    



                    <?php } else if ($parent_categories == 8){ ?>



                     <?php } else if ($sub_cat_id == 84){ ?>



                    



                    <?php } else if ($sub_cat_id == 85){ ?>



                   



                    



                    <?php } else { ?>



                    <?php echo "&pound;". $feature_price; ?>



                    <?php } ?>



















<span><?php echo $daysago." "."days ago"; ?></span></div>



<span><?php //echo $phone; ?></span>











</section>







<?php } while($get_postcode = mysql_fetch_array($result_search_view));  ?>



<div class="clear"></div>

<!--<div id="map_canvas" style="width: 625px; height: 500px; margin-left:10px;"></div>-->

<?php

//echo $sql_search_view;

 }  else{ ?><?php echo "Sorry no result found"  ;

 	//$locKam = get_lan_lat($_POST['region']);

 	//print_r($locKam);

	//echo $sql_search_view;

  }







 // print_r($lat_lang);

 // print_r($ids_loc);

  ?>



 <br /><br />



 <div style="margin-top:80px; margin-left:210px;"><?php //echo $pagination; ?></div>



<div id="demo3">



                   



                </div>



<div class="right_ad"><?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?><img src="ksdh348_@iy/media/large_gallery/<?php echo $adsen_right_image; ?>"> <?php } ?></div>



</div>  











   



    </div>







</div>























</section>







<div class="clear"></div>







<?php require_once('inc/footer.php'); ?>







 <?php 

 

 function search_sub_cat($id=0){

   

    $ids = $id;

	

	$res_ids[] = $ids;

	

    do{

        $subsql = "select id from `categories` where parent_off IN (" . $ids . ") "; 

        $subrs = mysql_query($subsql); 

        $row = mysql_num_rows($subrs);

        if($row > 0){

            while($res = mysql_fetch_array($subrs)){

                $res_ids[] = $res[0];

                $ids_to_search[] = $res[0];

            }

            $ids = implode(',',$ids_to_search);

            $ids_to_search = '';

        }

    }while($row !=0);

    

    return !empty($res_ids) ? implode(',',$res_ids) : 0;

    

}

 

 ?>



</body>



</html>