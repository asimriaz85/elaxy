<!DOCTYPE html>

<html>

<head>

<?php require_once('inc/meta.php'); ?>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">

<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">

 <script src="js/1.9.1-jquery.min.js"></script>

 <script>

<!--//////////////////////-->



function showUser(str)

{

if (str=="")

  {

  document.getElementById("txtHint").innerHTML="";

  return;

  }

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else

  {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState==4 && xmlhttp.status==200)

    {

    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;

    }

  }

xmlhttp.open("GET","getmodel.php?q="+str,true);

xmlhttp.send();

}



<!--////////////////////////-->



	





</script>



</head>



<body>

<?php 

require_once('inc/header.php'); 



	$df=$_REQUEST['df'];

	$sub_cat_id=$_REQUEST['sub_cat_id'];

	$sub_cat_name=$_REQUEST['sub_cat_name'];

	

	 $select_cat_name="SELECT id,name,parent_off FROM categories WHERE id='".$sub_cat_id."'";

	$run_cat_name=mysql_query($select_cat_name);

	$fetch_cat_name=mysql_fetch_array($run_cat_name);

	 $category_name=$fetch_cat_name['name'];

	$main_cat_id=$fetch_cat_name['id'];

	 $parent_off=$fetch_cat_name['parent_off'];

	

	

	//Total Parent Add//

	$total_parent_add = "SELECT id, COUNT(main_cat_id) FROM postcode_location WHERE main_cat_id='".$main_cat_id."' AND status='1'"; 

	 

$result_parent_ad = mysql_query($total_parent_add) or die(mysql_error());

$row_parent_ad = mysql_fetch_array($result_parent_ad);

	  $total_p_ad=$row_parent_ad['COUNT(main_cat_id)'];

	

	$cdate=date('Y-m-d');

	

	







?>





<section class="main-wrapper">

<?php require_once('inc/top_ads.php'); ?>







<div class="clear"></div>





<?php require_once('inc/search_bar.php'); ?>





<div class="clear"></div>



<?php

include("inc/left_side_main.php");


 if($sub_cat_id==1){


include("inc/vehicle-search.php");
}
else if($sub_cat_id==2){
	include("inc/property-search.php");
	
	}
	else if($sub_cat_id==6){
	include("inc/motorbikes-search.php");
	
	}
 include("inc/view-search.php");





?>





</section>



<div class="clear"></div>



<?php require_once('inc/footer.php'); ?>



</body>

</html>