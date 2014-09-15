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
    
    <!--Data table Grids With Search-->
<style type="text/css">
			@import "datatables/css/demo_page.css";
			@import "datatables/css/demo_table.css";
		</style>
		<!--<script type="text/javascript" language="javascript" src="datatables/js/jquery.js"></script>-->
		<script type="text/javascript" language="javascript" src="datatables/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			var asInitVals = new Array();
			
			$(document).ready(function() {
				var oTable = $('#example').dataTable( {
					"oLanguage": {
						"sSearch": "Search all columns:"
					}
				} );
				
				$("tfoot input").keyup( function () {
					/* Filter on the column (the index) of this element */
					oTable.fnFilter( this.value, $("tfoot input").index(this) );
				} );
				
				
				
				/*
				 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
				 * the footer
				 */
				$("tfoot input").each( function (i) {
					asInitVals[i] = this.value;
				} );
				
				$("tfoot input").focus( function () {
					if ( this.className == "search_init" )
					{
						this.className = "";
						this.value = "";
					}
				} );
				
				$("tfoot input").blur( function (i) {
					if ( this.value == "" )
					{
						this.className = "search_init";
						this.value = asInitVals[$("tfoot input").index(this)];
					}
				} );
			} );
		</script>
        <!--End Data table grids-->
    
    <!--Fancy Box-->
    
    <!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

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
    
    <!--Graph Chart-->
    
     <link href="css/demo.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/jqbar.css" />
    
    <script src="js/jqbar.js" type="text/javascript"></script>
    <!--END-->
    
</head>
<body>
	<div id="header">
		<div id="top-menu">
			<?php 
			
			if($session->logged_in){

?>
<span>Logged in as <b><?php  echo $admin_name; ?></b></span>
<?php }
			?>
            
			
			
			| <?php if($session->logged_in){ ?><a href="logout.php" title="Logout">Logout</a><?php } ?>
		</div>
		<div id="sitename">
			<a href="dashboard.php" class="logo float-left" title="Elaxy">&nbsp;</a>
			
			<div id="login" title="Members Login">
				<form action="#" method="post" enctype="multipart/form-data" class="forms" name="form" >
					<ul>
						<li>
							<label for="email" class="desc">
								Email:
							</label>
							<div>
								<input type="text" tabindex="1" maxlength="255" value="" class="field text full" name="email" id="email" />
							</div>
						</li>
						<li>
							<label for="password" class="desc">
								Password:
							</label>
							<div>
								<input type="text" tabindex="1" maxlength="255" value="" class="field text full" name="password" id="password" />
							</div>
						</li>
					</ul>
				</form>
			</div>
			<div id="dialog" title="Dialog Title">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
		</div>
		<ul id="navigation" class="sf-navbar">
			<li>
				<a href="dashboard.php">Dashboard</a>
				<!--<ul>
					<li><a href="index.php">Administration</a></li>
					<li><a href="forms.php">Forms</a></li>
					<li><a href="tables.php">Tables</a></li>
					<li><a href="msg.php">Response Messages</a></li>
				</ul>-->
			</li>
			<li>
				<a href="#">Categories</a>
				<ul>
					<li>
						<a href="add-categories.php">Add Main Categories</a>
						<ul>
							<li><a href="categories-management.php">Management</a></li>
							
						</ul>
					</li>
					<!--<li>
						<a href="sub-categories.php">Add Subcategories</a>
                        <ul>
                        <li><a href="sub-management.php">Management</a></li>
                        </ul>
					</li>-->
					
				</ul>
			</li>
			<li>
				<a href="#">Users</a>
				<ul>
					<li>
						<a href="user-management.php">User's Management</a>
					</li>
					
				</ul>
			</li>
			<li>
				<a href="#">User Ads Management</a>
				<ul>
					<li>
						<a href="ad-management.php">Ads Management</a>
					</li>
					
				</ul>
			</li>
            <li><a href="#">Pakages</a>
            <ul>
            
            	 <li>
            <a href="lime-ad-pakages.php">Lime Ad Pakage</a>
            </li>
             <li>
            <a href="lime-ad-pakages-management.php">Lime Ad Management</a>
            </li>
            <li><a href="prime-ad.php">Prime Ad Pakage</a></li>
            <li><a href="prime-ad-pakages-management.php">Prime Ad Management</a></li>
            <li><a href="quick-ad.php">Quick Ad Pakage</a></li>
            <li><a href="quick-ad-pakages-management.php">Quick Ad Management</a></li>
            </ul>
            
            <li><a href="add-sponsored-links.php">Sponsored links</a>
            <ul>
            <li><a href="sponsored-links-management.php">Sponsored Management</a></li>
            </ul>
            </li>
            
            		
                    	<li><a href="#">Reports </a>
            <ul>
            <li><a href="ad-abuse.php">Ad Abuse Report</a></li>
            </ul>
            </li>
            
            
            <li><a href="#">Pages</a>
            <ul>
            <li><a href="footer-pages.php">Create Pages</a></li>
            <li><a href="footer-pages-management.php">Pages Management</a></li>
            </ul>
            </li>
            
            
            <li><a href="#">Adsens</a>
            <ul>
            <li><a href="home-page.php">Add Adsens</a></li>
            
            <li><a href="adsens-management.php">Adsens Management</a></li>
           
            
            </ul>
            </li>
            
            
            <li><a href="#">Announcements</a>
            <ul>
            <li><a href="add-announcements.php">Add Announcements</a></li>
            
            <li><a href="announcements-management.php">Announcements Management</a></li>
            </ul>
            </li>
            
            <li><a href="#">Ads</a>
            <ul>
            <li><a href="all-ads.php">All Ads</a></li>
            
            <!--<li><a href="announcements-management.php">Announcements Management</a></li>-->
            </ul>
            </li>
            
            <li><a href="admin-settings.php">Admin Settings</a></li>
            
             <li><a href="#">Location</a>
             <ul>
             <li><a href="add-states.php">Add States</a></li>
             
             <li><a href="states-management.php">State Management</a></li>
             <li><a href="region.php">Add Region</a></li>
             <li><a href="region-management.php">Region Management</a></li>
              <li><a href="county.php">Add County</a></li>
              <li><a href="county-management.php">County Management</a></li>
              <li><a href="town.php">Add Town</a></li>
              <li><a href="town-management.php">Town Management</a></li>
              
             </ul>
             
             </li>
            <li><a href="#">Safety Tips</a>
            
            <ul>
            <li><a href="add-safity-tips.php">Add Safety Tips</a></li>
            <li><a href="safity-tips-management.php">Safety Tips Management</a></li>
            </ul>
            
            </li>
            
            </li>
           
		</ul>
	</div>