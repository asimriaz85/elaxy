<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">


</head>

<body>
<?php require_once('inc/header.php');

 

 $sub_cat_id=$_REQUEST['sub_cat_id'];
	 $search_in=$_REQUEST['search_in'];
	$location=$_REQUEST['location'];
	$min_bed=$_REQUEST['min_bed'];
	$max_bed=$_REQUEST['max_bed'];
	$seller_type=$_REQUEST['seller_type'];
	$property_type=$_REQUEST['property_type'];
	$from_price=$_REQUEST['from_price'];
	$to_price=$_REQUEST['to_price'];
	$cdate=date('Y-m-d');
	
	$tbl_name="postcode_location";
	
		
	/* Get data. */
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	  $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' LIMIT $start, $limit";		
		
	}
	
	
	if(!empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' LIMIT $start, $limit";		
		
	}
	
	
	if(!empty($search_in) && !empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' LIMIT $start, $limit";		
		
	}
	
	if(!empty($search_in) && !empty($location) && !empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms='".$min_bed."'  LIMIT $start, $limit";		
		
	}
	
	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' LIMIT $start, $limit";		
		
	}
	
	
	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		
		
	}
	
	
	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		
		
	}
	
	
	
	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.rent_price='".$from_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && !empty($to_price)){
	
	  $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.rent_price >='".$from_price."' AND property_holiday_rent.rent_price <='".$to_price."'  LIMIT $start, $limit";		
		
	}
	
	
	
	
	if(empty($search_in) && !empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND postcode_location.town='".$location."' LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && !empty($location) && !empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms='".$min_bed."'   LIMIT $start, $limit";		
		
	}
	
	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		
		
	}
	
	
	
	
	
	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  LIMIT $start, $limit";		
		
	}
	
	
	
	  
	
	
	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  AND property_holiday_rent.price='".$from_price."'   LIMIT $start, $limit";		
		
	}
	
	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && !empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND postcode_location.town='".$location."' AAND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'   LIMIT $start, $limit";		
		
	}
	
	
	
	if(!empty($search_in) && empty($location) && !empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms='".$min_bed."'   LIMIT $start, $limit";		
		
	}
	
	
	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."'LIMIT $start, $limit";		
	}
	
	
	
	
	
	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'     LIMIT $start, $limit";		
		
	}
	
	
	
	
	
	
	
	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND  property_holiday_rent.price='".$from_price."'   LIMIT $start, $limit";		
		
	}
	
	
	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.no_rooms ='".$max_bed."'   AND property_holiday_rent.acting_agent='".$seller_type."' LIMIT $start, $limit";		
		
	}
	
	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.no_rooms ='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'   LIMIT $start, $limit";		
		
	}
	
	
	
	
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.no_rooms ='".$max_bed."'AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  LIMIT $start, $limit";		
		
	}
	
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.no_rooms ='".$max_bed."'AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND  property_holiday_rent.price='".$from_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.no_rooms ='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'   AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' LIMIT $start, $limit";		
		
	}
	
	
	
	
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'   AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND  property_holiday_rent.price ='".$from_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'   AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'    AND property_holiday_rent.acting_agent='".$seller_type."' LIMIT $start, $limit";		
		
	}
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' LIMIT $start, $limit";		
		
	}
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  LIMIT $start, $limit";		
		
	}
	
	
	
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  AND  property_holiday_rent.price ='".$from_price."'  LIMIT $start, $limit";		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'AND  property_holiday_rent.property_type='".$property_type."'LIMIT $start, $limit";		
		
	}
	
	
	
	
	
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'    AND  property_holiday_rent.property_type='".$property_type."' AND  property_holiday_rent.price Between'".$from_price."' LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."'    AND  property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'   LIMIT $start, $limit";		
		
	}
	
	
	
	
	
	
	
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& !empty($from_price) && empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND  property_holiday_rent.price ='".$from_price."'  LIMIT $start, $limit";		
		
	}
	
	
	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& !empty($from_price) && !empty($to_price)){
	
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id
WHERE  postcode_location.status ='1'
AND postcode_location.sub_cat_id = '".$sub_cat_id."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."' LIMIT $start, $limit";		
		
	}
	
	$result = mysql_query($sql);
	
	$num_rows_views=mysql_num_rows($result);


?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div class="clear"></div>







<?php
include("inc/left_side.php");
?>



<div id="contant_area">

<?php

if($num_rows_views >0){
		while($row = mysql_fetch_array($result))
		{
			
			$post_id=$row['postcode_loaction_id'];
			
			$published_date=$row['date'];
			$town=$row['town'];
			
			
			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);
			
			
			$select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
			
			
			//End Image//
			
			
			$title=$row['title'];
			$description=$row['description'];
			
			//End Title Description//
			
			
			$feature_name=$row['name'];
				$feature_price=$row['item_price'];
				$ad_price_days=$row['days'];
		
		
			//End//
			
			?>
<section class="listing-box content">
<div class="list-image"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature;?>"><img src="uploads/<?php echo $image_name; ?>" width="121" height="84" alt="" /></a></div>
<div class="list-detail">
<div class="list-hd"><a href="view-detail.php?post_id=<?php echo $post_id; ?>&f_id=<?php echo $f_id; ?>&sub_cat_id=<?php echo $sub_cat_id; ?>&feature=<?php echo $feature;?>"><?php echo $title; ?></a></div>
<div class="list-cnt"><?php echo substr($description, 0, 70)."....."; ?></div>
<div class="list-loc"><?php echo $town; ?></div>
</div>
<?php if($feature_name!="Free Ad"){ ?><div class="list-feature"> <?php echo $feature_name;   ?></div><?php } ?>
<div class="list-star"></div>
<div class="list-pricing"><?php echo "&pound;". $feature_price; ?>

<span><?php echo $daysago." "."days ago"; ?></span></div>

</section>

<?php }  } if($num_rows_views == 0){ echo "Sorry no result found"; }?>
</div>

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