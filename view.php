<?php include("connection.php");
 include('lib/db_setting.php');
  include('lib/db.class.php');
 include('lib/ads.class.php');
 include('lib/category.class.php');
  require_once('ads.class.php');



require_once('inc/pagination.php');

$adsens= new adsens;
$left_ad=$adsens->Display_Ads('View','Left');
$right_ad=$adsens->Display_Ads('View','Right');

$footer_ad=$adsens->Display_Ads('View','Bottom');

 ?><!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
<link rel="stylesheet" href="http://purecss.io/combo/1.11.5?/css/main-grid.css&/css/main.css&/css/rainbow/baby-blue.css">
<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css?v=2.1.5" media="screen">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox').fancybox();
	});
	</script>
 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
 

 
 
 
 
 
 
 
 
 
 
 
 <script>


function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
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



	


</script>

</head>

<body>
<?php 
require_once('inc/header.php'); 
	
	$sqlcat=mysql_query("select * from categories where cat_url='".mysql_real_escape_string($_GET['caturl'])."'");
	$rscat=mysql_fetch_array($sqlcat);
	
	$sub_cat_id=$rscat['id'];
	 $sub_cat_name=$rscat['name'];
	  $sub_cat_url=$rscat['cat_url'];
	 
	
	$select_cat_name="SELECT id,name,parent_off FROM categories WHERE id='".$sub_cat_id."' ORDER BY name ASC";
	$run_cat_name=mysql_query($select_cat_name);
	$fetch_cat_name=mysql_fetch_array($run_cat_name);
	  $category_name=$fetch_cat_name['name'];
	 $c_id=$fetch_cat_name['id'];
	  $parent_off=$fetch_cat_name['parent_off'];
	
	$select_pname="SELECT id,name,cat_url FROM categories WHERE id='".$parent_off."' ORDER BY name ASC";
	$run_select_pname=mysql_query($select_pname);
	 
	$fetch_pname=mysql_fetch_array($run_select_pname);
	 $pid=$fetch_pname['id'];
	  $pname=$fetch_pname['name'];
	  $purl=$fetch_pname['cat_url'];
	$cdate=date('Y-m-d');
	

	$total_parent_add = "SELECT id, COUNT(main_cat_id) FROM postcode_location WHERE main_cat_id='".$parent_off."' AND status='1'"; 
	 
$result_parent_ad = mysql_query($total_parent_add) or die(mysql_error());
$row_parent_ad = mysql_fetch_array($result_parent_ad);
	  $total_p_ad=$row_parent_ad['COUNT(main_cat_id)'];
	

$total_sub1_add = "SELECT id, COUNT(sub_cat_id) FROM postcode_location WHERE sub_cat_id='".$sub_cat_id."' AND status='1'"; 
	 
$result_sub1_ad = mysql_query($total_sub1_add) or die(mysql_error());
$row_sub1_ad = mysql_fetch_array($result_sub1_ad);
	  $total_sub1_ad=$row_sub1_ad['COUNT(sub_cat_id)'];

	
	


$select_left_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='View' AND location='Left' AND status='Show'";
$run_left=mysql_query($select_left_adsen);
$fetch_left_adsen=mysql_fetch_array($run_left);
$ad_code_left=$fetch_left_adsen['ad_code'];
$adsen_left_image=$fetch_left_adsen['images'];


$select_right_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='View' AND location='Right' AND status='Show'";
$run_right=mysql_query($select_right_adsen);
$fetch_right_adsen=mysql_fetch_array($run_right);
$ad_code_right=$fetch_right_adsen['ad_code'];
$adsen_right_image=$fetch_right_adsen['images'];




?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>


<?php


include("inc/left_side.php");
?>

 <div id="contant_area" style="float:left;">
 

 
 
<?php 
	if($sub_cat_name=='Cars' || $sub_cat_name=='Campervans'  || $sub_cat_name=='Vans' ||  $sub_cat_name=='Motorhomes' || $sub_cat_name=='Commercial Trucks' ){
	
	include("inc/vehicle-search.php");
	
	}
	?>
    
    
    <?php 
	if($pname=='Motorbikes, Scooters & Parts' && $category_name!='Motorbike Parts & Accessories'){
	
	include("inc/motorbikes-search.php");
	 if(!empty($right_ad['AdCode'])){ echo $right_ad['AdCode']; } else if(!empty($right_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $right_ad['Image']; ?>"> <?php }
	 } 
	
	
	
	if($pname=='Flats & Houses'){
	
	include("inc/property-search.php");
	 if(!empty($right_ad['AdCode'])){ echo $right_ad['AdCode']; } else if(!empty($right_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $right_ad['Image']; ?>"> <?php }
	}
	?>
   
    <div class="tophd"> <div class="mapbtn"><a href="#myDivID" id="fancyBoxLink" onClick="load()"><img src="/images/map.png" width="20" height="20">Map View</a></div></div>
      
   
    <?php
	include("inc/view-search.php");
	
	?>
    
    
 <div class="clear"></div>   

</div>





</section>


<div class="clear"></div>
<div style="margin: 0 auto;
width: 1022px;">
<?php if(!empty($footer_ad['AdCode'])){ echo $footer_ad['AdCode']; } else if(!empty($footer_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $footer_ad['Image']; ?>"> <?php } ?>
</div>
<?php require_once('inc/footer.php'); ?>

</body>
</html>