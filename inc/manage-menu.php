<link rel="stylesheet" href="css/tabs/basic.css">
 <link rel="stylesheet" href="css/tabs/tabs.css">

<?php 
$menu_name=$_REQUEST['menu_name'];
if($page_name==$menu_name){
	
	 $selectedClass=="selected_class";
} if($page_name!=$menu_name){ $selectedClass=""; }
?>

<ul id="primary">
		<li><a href="manage_ads.php?menu_name=manage_ads.php" <?php if($menu_name!="details.php" && $menu_name!="replies.php" && $menu_name!="live-ad.php" && $menu_name!="pending-ad.php" && $menu_name!="cancelled-ad.php"){?> class="selected_class" <?php }?>>Manage my ads</a>
        <?php if($menu_name!="details.php" && $menu_name!="replies.php" && $page_name!='replies.php' && $page_name!="view-ad.php"){?>
        <ul id="secondary">
				<li><a href="manage_ads.php?menu_name=manage_ads.php" <?php if($_SERVER['REQUEST_URI']=="/manage_ads.php?menu_name=manage_ads.php" || $_SERVER['REQUEST_URI']=="/manage_ads.php"){ ?> style="text-decoration:none; color:#000;" <?php } ?> > Show All </a></li>
				<li><a href="live-ad.php?menu_name=manage_ads.php" <?php if($_SERVER['REQUEST_URI']=="/live-ad.php?menu_name=manage_ads.php"){ ?> style="text-decoration:none; color:#000;" <?php } ?> >Live</a></li>
				<li><a href="pending-ad.php?menu_name=manage_ads.php" <?php if($_SERVER['REQUEST_URI']=="/pending-ad.php?menu_name=manage_ads.php" ){ ?> style="text-decoration:none; color:#000;" <?php } ?> >Pending Approvals</a></li>
				<li><a href="expire-ad.php?menu_name=manage_ads.php" <?php if($_SERVER['REQUEST_URI']=="/expire-ad.php?menu_name=manage_ads.php" ){ ?> style="text-decoration:none; color:#000;" <?php } ?> >Expired</a></li>
                <li><a href="cancelled-ad.php?menu_name=manage_ads.php" <?php if($_SERVER['REQUEST_URI']=="/cancelled-ad.php?menu_name=manage_ads.php" ){ ?> style="text-decoration:none; color:#000;" <?php } ?> >Inactive</a></li>
                <li><a href="favourites.php?uid=<?php echo $user_id; ?>&menu_name=manage_ads.php" <?php if($_SERVER['REQUEST_URI']=="/favourites.php?uid=".$user_id."&menu_name=manage_ads.php"){ ?> style="text-decoration:none; color:#000;" <?php } ?> >Favourites</a></li>
			</ul>
        <?php } ?>
        </li>
		<li><a href="details.php?menu_name=details.php"<?php if($menu_name!="manage_ads.php" && $menu_name!="replies.php" && $menu_name!="live-ad.php" && $menu_name!="pending-ad.php" && $menu_name!="cancelled-ad.php"){?> class="selected_class" <?php }?>>My Details</a>
        <?php if($menu_name!="manage_ads.php" && $menu_name!="replies.php" && $page_name!="manage_ads.php" && $page_name!="inbox.php" && $page_name!='replies.php' && $page_name!="view-ad.php"){?>
        <ul id="secondary">
				<li><a href="details.php?menu_name=details.php">Update my details</a></li>
				<li><a href="change_password.php?menu_name=details.php">Change my password</a></li>
				<li><a href="deactivate_account.php?menu_name=details.php">Deactivte my account</a></li>
			</ul>
            <?php } ?>
        </li>
		<li><a href="replies.php?menu_name=replies.php" <?php if($menu_name!="manage_ads.php" && $menu_name!="details.php"){?> class="selected_class" <?php } ?>>Replies</a>
        
        <?php if($menu_name!="manage_ads.php" && $menu_name!="details.php" && $page_name!="manage_ads.php"){?>
        <ul id="secondary">
				<li><a href="manage_ads.php?menu_name=replies.php" <?php if($_SERVER['REQUEST_URI']=="manage_ads.php?menu_name=manage_ads.php" || $_SERVER['REQUEST_URI']=="manage_ads.php"){ ?> style="text-decoration:none; color:#000;" <?php }  ?>>Show All</a></li>
				<li><a href="live-ad.php?menu_name=replies.php">Live</a></li>
				<li><a href="pending-ad.php?menu_name=replies.php">Pending Approvals</a></li>
				<li><a href="cancelled-ad.php?menu_name=replies.php">Expired</a></li>
                <li><a href="#">Inactive</a></li>
                <li><a href="favourites.php?uid=<?php echo $user_id; ?>&menu_name=replies.php">Favourites</a></li>
			</ul>
            <?php } ?>
        </li>
		
	</ul>