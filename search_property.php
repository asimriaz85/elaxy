<!DOCTYPE html>

<html>

<head>

<?php require_once('inc/meta.php'); ?>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">

<!--Pagination Start-->

<script type="text/javascript" src="pagination/js/jquery.js"></script>

<script type="text/javascript">

$(document).ready(function(){

	

	//how much items per page to show

	var show_per_page = 15; 

	//getting the amount of elements inside content_pgination div

	var number_of_items = $('#content_pgination').children().size();

	//calculate the number of pages we are going to have

	var number_of_pages = Math.ceil(number_of_items/show_per_page);

	

	//set the value of our hidden input fields

	$('#current_page').val(0);

	$('#show_per_page').val(show_per_page);

	

	//now when we got all we need for the navigation let's make it '

	

	/* 

	what are we going to have in the navigation?

		- link to previous page

		- links to specific pages

		- link to next page

	*/

	var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';

	var current_link = 0;

	while(number_of_pages > current_link){

		navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';

		current_link++;

	}

	navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';

	

	$('#page_navigation').html(navigation_html);

	

	//add active_page class to the first page link

	$('#page_navigation .page_link:first').addClass('active_page');

	

	//hide all the elements inside content_pgination div

	$('#content_pgination').children().css('display', 'none');

	

	//and show the first n (show_per_page) elements

	$('#content_pgination').children().slice(0, show_per_page).css('display', 'block');

	

});



function previous(){

	

	new_page = parseInt($('#current_page').val()) - 1;

	//if there is an item before the current active link run the function

	if($('.active_page').prev('.page_link').length==true){

		go_to_page(new_page);

	}

	

}



function next(){

	new_page = parseInt($('#current_page').val()) + 1;

	//if there is an item after the current active link run the function

	if($('.active_page').next('.page_link').length==true){

		go_to_page(new_page);

	}

	

}

function go_to_page(page_num){

	//get the number of items shown per page

	var show_per_page = parseInt($('#show_per_page').val());

	

	//get the element number where to start the slice from

	start_from = page_num * show_per_page;

	

	//get the element number where to end the slice

	end_on = start_from + show_per_page;

	

	//hide all children elements of content_pgination div, get specific items and show them

	$('#content_pgination').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');

	

	/*get the page link that has longdesc attribute of the current page and add active_page class to it

	and remove that class from previously active page link*/

	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');

	

	//update the current page input field

	$('#current_page').val(page_num);

}

  

</script>

<!--PAgination End-->





</head>



<body>

<?php require_once('inc/header.php');



 


$ids=get_veh_cat($_REQUEST['sub_cat_id']);

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

AND postcode_location.main_cat_id IN (".$ids.") LIMIT $start, $limit";		

		

	}

	

	

	if(!empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' LIMIT $start, $limit";		

		

	}

	

	

	if(!empty($search_in) && !empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' LIMIT $start, $limit";		

		

	}

	

	if(!empty($search_in) && !empty($location) && !empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms='".$min_bed."'  LIMIT $start, $limit";		

		

	}

	

	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' LIMIT $start, $limit";		

		

	}

	

	

	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		

		

	}

	

	

	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		

		

	}

	

	

	

	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.rent_price='".$from_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(!empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && !empty($to_price)){

	

	  $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.property_type='".$search_in."' AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.rent_price >='".$from_price."' AND property_holiday_rent.rent_price <='".$to_price."'  LIMIT $start, $limit";		

		

	}

	

	

	

	

	if(empty($search_in) && !empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND postcode_location.town='".$location."' LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && !empty($location) && !empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms='".$min_bed."'   LIMIT $start, $limit";		

		

	}

	

	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		

		

	}

	

	

	

	

	

	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  LIMIT $start, $limit";		

		

	}

	

	

	

	  

	

	

	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND postcode_location.town='".$location."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  AND property_holiday_rent.price='".$from_price."'   LIMIT $start, $limit";		

		

	}

	

	if(empty($search_in) && !empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND postcode_location.town='".$location."' AAND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'   LIMIT $start, $limit";		

		

	}

	

	

	

	if(!empty($search_in) && empty($location) && !empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms='".$min_bed."'   LIMIT $start, $limit";		

		

	}

	

	

	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."'LIMIT $start, $limit";		

	}

	

	

	

	

	

	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'     LIMIT $start, $limit";		

		

	}

	

	

	

	

	

	

	

	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND  property_holiday_rent.price='".$from_price."'   LIMIT $start, $limit";		

		

	}

	

	

	if(!empty($search_in) && empty($location) && !empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND property_holiday_rent.property_type='".$search_in."' AND property_holiday_rent.no_rooms >='".$min_bed."' AND property_holiday_rent.no_rooms <='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.no_rooms ='".$max_bed."'   AND property_holiday_rent.acting_agent='".$seller_type."' LIMIT $start, $limit";		

		

	}

	

	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.no_rooms ='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'   LIMIT $start, $limit";		

		

	}

	

	

	

	

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.no_rooms ='".$max_bed."'AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  LIMIT $start, $limit";		

		

	}

	

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.no_rooms ='".$max_bed."'AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND  property_holiday_rent.price='".$from_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.no_rooms ='".$max_bed."' AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.acting_agent='".$seller_type."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' LIMIT $start, $limit";		

		

	}

	

	

	

	

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND  property_holiday_rent.price ='".$from_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && !empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND property_holiday_rent.acting_agent='".$seller_type."' LIMIT $start, $limit";		

		

	}

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' LIMIT $start, $limit";		

		

	}

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  LIMIT $start, $limit";		

		

	}

	

	

	

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."'  AND  property_holiday_rent.price ='".$from_price."'  LIMIT $start, $limit";		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& !empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.acting_agent='".$seller_type."' AND property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && !empty($property_type)&& empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")AND  property_holiday_rent.property_type='".$property_type."'LIMIT $start, $limit";		

		

	}

	

	

	

	

	

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && !empty($property_type)&& !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND  property_holiday_rent.property_type='".$property_type."' AND  property_holiday_rent.price Between'".$from_price."' LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && !empty($property_type)&& !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND  property_holiday_rent.property_type='".$property_type."' AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."'   LIMIT $start, $limit";		

		

	}

	

	

	

	

	

	

	

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND  property_holiday_rent.price ='".$from_price."'  LIMIT $start, $limit";		

		

	}

	

	

	if(empty($search_in) && empty($location) && empty($min_bed) && empty($max_bed)&& empty($seller_type) && empty($property_type)&& !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  property_holiday_rent ON  property_holiday_rent.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND property_holiday_rent.price >='".$from_price."' AND property_holiday_rent.price <='".$to_price."' LIMIT $start, $limit";		

		

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

<div id='content_pgination'>

<?php



if($num_rows_views >0){

		while($row = mysql_fetch_array($result))

		{

			$user_id_email=$row['user_id'];

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

			

			$email="SELECT email,phone FROM registration WHERE id='".$user_id."'";

				$run_email=mysql_query($email);

				$fetch_email=mysql_fetch_array($run_email);

				$email_id=$fetch_email['email'];

				$phone=$fetch_email['phone'];

			

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

<span><?php echo $phone; ?></span>

</section>



<?php }  } if($num_rows_views == 0){ echo "Sorry no result found"; }?>

</div>

</div>

<?php if($num_rows_views > 15){  ?>

<section class="listing-box_pagination">

<div style="margin-left:150px;" id='page_navigation'></div>

</section>

<?php } ?>

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
<?php 
 
 function get_veh_cat($id=0){
   
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