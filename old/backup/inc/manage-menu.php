<link rel="stylesheet" href="css/tabs/basic.css">
 <link rel="stylesheet" href="css/tabs/tabs.css">

<?php 
$menu_name=$_REQUEST['menu_name'];
if($page_name==$menu_name){
	
	 $selectedClass=="selected_class";
} if($page_name!=$menu_name){ $selectedClass=""; }
?>

<ul id="primary">
		<li><a href="manage_ads.php?menu_name=manage_ads.php" <?php if($menu_name!="details.php" && $menu_name!="replies.php"){?> class="selected_class" <?php }?>>Manage my ads</a>
        <?php if($menu_name!="details.php" && $menu_name!="replies.php"){?>
        <ul id="secondary">
				<li><a href="manage_ads.php?menu_name=manage_ads.php">Show All</a></li>
				<li><a href="live-ad.php?menu_name=manage_ads.php">Live</a></li>
				<li><a href="pending-ad.php?menu_name=manage_ads.php">Pending Approvals</a></li>
				<li><a href="cancelled-ad.php?menu_name=manage_ads.php">Expired</a></li>
                <li><a href="#">Inactive</a></li>
                <li><a href="favourites.php?uid=<?php echo $user_id; ?>">Favourites</a></li>
			</ul>
        <?php } ?>
        </li>
		<li><a href="details.php?menu_name=details.php"<?php if($menu_name!="manage_ads.php" && $menu_name!="replies.php"){?> class="selected_class" <?php }?>>My Details</a>
        <?php if($menu_name!="manage_ads.php" && $menu_name!="replies.php" && $page_name!="manage_ads.php"){?>
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
				<li><a href="manage_ads.php?menu_name=replies.php">Show All</a></li>
				<li><a href="live-ad.php?menu_name=replies.php">Live</a></li>
				<li><a href="pending-ad.php?menu_name=replies.php">Pending Approvals</a></li>
				<li><a href="cancelled-ad.php?menu_name=replies.php">Expired</a></li>
                <li><a href="#">Inactive</a></li>
                <li><a href="favourites.php?uid=<?php echo $user_id; ?>">Favourites</a></li>
			</ul>
            <?php } ?>
        </li>
		
	</ul>