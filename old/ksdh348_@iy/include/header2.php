<?php

error_reporting(0);
include("include/session.php");
	
	
	
	 $admin_name=$_SESSION['username'];
	 
	 if(!isset($_SESSION['username'])){
header("location:index.php?error=Please Login");
}

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

$page_name=curPageName();


	 


	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Elaxy | backend admin user interface</title>
	<link href="style.css" rel="stylesheet" media="all" />
	<link href="" rel="stylesheet" title="style" media="all" />
	<!--<script type="text/javascript" src="js/jquery-1.3.2.js"></script>-->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
    <script src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.7.2.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/tablesorter.js"></script>
	<script type="text/javascript" src="js/tablesorter-pager.js"></script>
	<script type="text/javascript" src="js/cookie.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
    <script type="text/javascript" src="js/checkall.js"></script>
	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* EXAMPLE */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');

	</script>
	<![endif]-->
	<!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
    <!--[if IE 8]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
    <!--[if IE 9]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
    
    <!--Fancy Box-->
    
    <!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancybox//lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.js?v=2.1.4"></script>
    
	
    
	<link rel="stylesheet" type="text/css" href="fancybox/source/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	
    <!--END-->
    
    
    <!--End-->
</head>
<body>
	