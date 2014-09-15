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

	$sub_cat_id=$_REQUEST['sub_cat_id'];
	$sub_cat_name=$_REQUEST['sub_cat_name'];
	
	$select_cat_name="SELECT id,name,parent_off FROM categories WHERE id='".$sub_cat_id."'";
	$run_cat_name=mysql_query($select_cat_name);
	$fetch_cat_name=mysql_fetch_array($run_cat_name);
	 $category_name=$fetch_cat_name['name'];
	 $parent_off=$fetch_cat_name['parent_off'];
	
	$select_pname="SELECT id,name FROM categories WHERE id='".$parent_off."'";
	$run_select_pname=mysql_query($select_pname);
	 
	$fetch_pname=mysql_fetch_array($run_select_pname);
	
	  $pname=$fetch_pname['name'];
	
	
	$cdate=date('Y-m-d');
	
	



?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<?php
include("inc/left_side2.php");

include("inc/view-search.php");
?>
 





</section>

<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>

</body>
</html>