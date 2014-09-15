
<div id="pointermenu2">
<ul>
<li><a href="manage.php" <?php if($page_name=="manage.php"){?> style="color:#000; text-decoration:underline;"<?php } ?>>Show All</a></li>

<li><a href="live-ad.php" <?php if($page_name=="live-ad.php"){?> style="color:#000; text-decoration:underline;"<?php } ?>>Live</a></li>

<li><a href="pending-ad.php" <?php if($page_name=="pending-ad.php"){?> style="color:#000; text-decoration:underline;"<?php } ?>>Pending Approval</a></li>

<li><a href="cancelled-ad.php" <?php if($page_name=="cancelled-ad.php"){?> style="color:#000; text-decoration:underline;"<?php } ?>>Expired</a></li>
<li><a href="#">Inactive</a></li>
<li><a href="favourites.php?uid=<?php echo $user_id; ?>">Favourites</a></li>

</ul>

</div>