<?php 
include('lib/config.php');
include('lib/db_setting.php');
include('lib/db.class.php');
include('lib/ads.class.php');

function build_query($table="",$val_array=array(),$cri='AND',$oderby="DESC"){
		
		$i = 1;
		$query= "SELECT * FROM {$table}  ";		
		if(!empty($val_array)){
			foreach($val_array as $key=>$v){
				
				if(!empty($v) || $v != ""){
					if($i ==1){
						$query .= " WHERE " . $key . " = '" . $v . "'";
						$i = 2;
					} else {
						$query .= " ".$cri." " . $key . " = '" . $v . "' ";
					}
				}
			}
			
			return $query;
		}
	}
	
	if(isset($_POST['search'])){
		
		$val['stockid']					=$stockid;
				$val['Stock_No']				=(isset($_POST['stockid'])) ? $_POST['stockid'] :'';
				$val['Body_Type']				=$Body_Type;
				$val['Make']					=(isset($_POST['make'])) ? $_POST['make'] :'';
				$val['Model']					=(isset($_POST['model'])) ? $_POST['model'] :'';
				$val['Model_Type']				=$Model_Type;
				$val['Year']					=(isset($_POST['yearfrom'])) ? $_POST['yearfrom'] :'';
				$val['Month']					=$Month;
				$val['Chassis_No']				=(isset($_POST['chassisno'])) ? $_POST['chassisno'] :'';
				$val['Transmission']			=$Transmission;
				$val['Engine_CC']				=$Engine_CC;
				$val['Fuel_Type']				=$Fuel_Type;
				$val['Drive_Side']				=$Drive_Side;
				$val['Drive_Type']				=$Drive_Type;
				$val['Made_In']					=$Made_In;
				$val['Mileage']					=$Mileage;
				$val['Doors']					=$Doors;
				$val['Exterior_Color']			=(isset($_GET['color'])) ? $_GET['color'] :'';
				$val['Interior_Color']			=$Interior_Color;
				$val['Grade']					=$Grade;
				$val['Interior_Type']			=$Interior_Type;
				$val['Steering']				=$Steering;
				$val['Price']					=(isset($_GET['pricerange'])) ? $_GET['pricerange'] :'';;
				$val['Transportation_Cost']		=$Transportation_Cost;
				$val['M3_Value']				=$M3_Value;
				$val['Gross_Weight']			=$Gross_Weight;
				$val['Net_Weight']				=$Net_Weight;
				$val['Length']					=$Length;
				$val['Width']					=$Width;
				$val['Height']					=$Height;
				$val['Type_of_Motor']			=$Type_of_Motor;
				$val['Number_of_Passengers']	=(isset($_POST['seats'])) ? $_POST['seats'] :'';
				$val['Status']					= (isset($_GET['st'])) ? $_GET['st'] :13;
				$val['Features']				=$Features;
				$val['Other_Features']			=$Other_Features;
				$val['Stock_Status']			=$Stock_Status;
				$val['Country_Name']			=(isset($_GET['country'])) ? $_GET['country'] :'';;
				$val['Port_Name']				=$Port_Name;
				$val['Stcok_img']				=$Stcok_img;
				$val['Model_Name']				=$Model_Name;	
				
				$sql =  build_query('stock',$val);
				
				$stock =stock_class::find_by_sql($sql);
		
		
		}


?>

<!DOCTYPE html>

<html>

<head>

<?php require_once('inc/meta.php'); ?>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">



<!--Paginatio Start-->

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

<!--Pagination End-->







</head>



<body>



<!-- the input fields that will hold the variables we will use -->

	<input type='hidden' id='current_page' />

	<input type='hidden' id='show_per_page' />



<?php require_once('inc/header.php');



 

$ids=get_veh_cat($_REQUEST['sub_cat_id']);

 $sub_cat_id=$_REQUEST['sub_cat_id'];

	 $make=$_REQUEST['make'];

	$year=$_REQUEST['year'];

	$model=$_REQUEST['model'];

	$fuel_type=$_REQUEST['fuel_type'];

	$body_type=$_REQUEST['body_type'];

	$transmission=$_REQUEST['transmission'];

	$engine_size=$_REQUEST['engine_size'];

	$mileage=$_REQUEST['mileage'];

	$from_price=$_REQUEST['from_price'];

	$to_price=$_REQUEST['to_price'];

	$cdate=date('Y-m-d');

	

	$tbl_name="postcode_location";

	

		

	/* Get data. */

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	   $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") ";		

		

	}

	

	

	if(!empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	  $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' ";		

		

	}

	

	

	if(!empty($make) && !empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' ";		

		

	}

	

	if(!empty($make) && !empty($year) && !empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."'  ";		

		

	}

	

	if(!empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."'  ";		

		

	}

	

	

	if(!empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."'  ";		

		

	}

	

	

	if(!empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."'  ";		

		

	}

	

	

	if(!empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."'  ";		

		

	}

	

	if(!empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."' AND vehicle_make_mode.mileage='".$mileage."'  ";		

		

	}

	

	

	if(!empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."' AND vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.from_price='".$from_price."'  ";		

		

	}

	

	

	if(!empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	  $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."' AND vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'  ";		

		

	}

	

	

	

	

	if(empty($make) && !empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.year='".$year."' ";		

		

	}

	

	

	if(empty($make) && !empty($year) && !empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."'   ";		

		

	}

	

	if(empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."'  ";		

		

	}

	

	

	if(empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."'  ";		

		

	}

	

	

	if(empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' ";		

		

	}

	

	

	if(empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."'  ";		

		

	}

	

	

	

	  if(empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."' AND vehicle_make_mode.mileage='".$mileage."'   ";		

		

	}

	

	

	if(empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."' AND vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price='".$from_price."'   ";		

		

	}

	

	if(empty($make) && !empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.year='".$year."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND vehicle_make_mode.transmission='".$transmission."' AND vehicle_make_mode.engine_size='".$engine_size."' AND vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'   ";		

		

	}

	

	

	

	if(!empty($make) && empty($year) && !empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."'   ";		

		

	}

	

	

	if(!empty($make) && empty($year) && !empty($model) && !empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' ";		

	}

	

	

	if(!empty($make) && empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."'    ";		

		

	}

	

	

	if(!empty($make) && empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."'    ";		

		

	}

	

	

	if(!empty($make) && empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."'  AND  vehicle_make_mode.engine_size='".$engine_size."'    ";		

		

	}

	

	

	if(!empty($make) && empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."'  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."'   ";		

		

	}

	

	

	if(!empty($make) && empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."'  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price='".$from_price."'   ";		

		

	}

	

	

	if(!empty($make) && empty($year) && !empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.make_id='".$make."' AND vehicle_make_mode.model='".$model."' AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."'  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."'   ";		

		

	}

	

	

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."'   ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."'  ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."'  ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price='".$from_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND vehicle_make_mode.body_type='".$body_type."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."'   ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."'   ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."'   ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price ='".$from_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && !empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.fuel_type='".$fuel_type."' AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND vehicle_make_mode.body_type='".$body_type."' ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.") AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price ='".$from_price."'  ";		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& !empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND vehicle_make_mode.body_type='".$body_type."' AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && !empty($transmission)&& empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND  vehicle_make_mode.transmission='".$transmission."'";		

		

	}

	

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && !empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."'  ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' ";		

		

	}

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price ='".$from_price."'   ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && !empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")    AND  vehicle_make_mode.transmission='".$transmission."' AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'   ";		

		

	}

	

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& !empty($engine_size) && empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& !empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price ='".$from_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& !empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."' ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && !empty($mileage) && empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")   AND  vehicle_make_mode.mileage='".$mileage."' ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && !empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price ='".$from_price."'  ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && !empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND  vehicle_make_mode.engine_size='".$engine_size."' AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."' ";		

		

	}

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && !empty($from_price) && empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND  vehicle_make_mode.mileage='".$mileage."' AND  vehicle_make_mode.price ='".$from_price."'  ";		

		

	}

	

	

	

	if(empty($make) && empty($year) && empty($model) && empty($fuel_type)&& empty($body_type) && empty($transmission)&& empty($engine_size) && empty($mileage) && !empty($from_price) && !empty($to_price)){

	

	 $sql = "SELECT *

FROM postcode_location

INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id   INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id INNER JOIN  vehicle_make_mode ON  vehicle_make_mode.postcode_loaction_id = postcode_location.id

WHERE  postcode_location.status ='1'

AND postcode_location.main_cat_id IN (".$ids.")  AND  vehicle_make_mode.mileage='".$mileage."' AND vehicle_make_mode.price >='".$from_price."' AND vehicle_make_mode.price <='".$to_price."'  ";		

		

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

			

			$post_id=$row['postcode_loaction_id'];

			

			$published_date=$row['date'];

			$town=$row['town'];

			

			

			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);

			

			

			$select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";

			$run_image_query=mysql_query($select_image_query);

			

			$fetch_image_query=mysql_fetch_array($run_image_query);

			 $image_name=$fetch_image_query['file_name'];

			

			

			//End Image//

			

			//Title Description//

			/*$select_title_description="SELECT title,description FROM ad_title_description WHERE postcode_loaction_id='".$post_id."'";

			$run_select_title=mysql_query($select_title_description);

			$fetch_select_title=mysql_fetch_array($run_select_title);*/

			$title=$row['title'];

			$description=$row['description'];

			

			//End Title Description//

			

			

			$feature_name=$row['name'];

				$feature_price=$row['item_price'];

				$ad_price_days=$row['days'];

		

		







  

$email="SELECT email,phone FROM registration WHERE id='".$user_id."'";

				$run_email=mysql_query($email);

				$fetch_email=mysql_fetch_array($run_email);

				$email_id=$fetch_email['email'];

				$phone=$fetch_email['phone'];



		

		

				

				

				

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

<span><?php echo $phone; ?></span>

</section>



<?php } ?><?php } if($num_rows_views == 0){ echo "Sorry no result found"; }?>





</div> </div>

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