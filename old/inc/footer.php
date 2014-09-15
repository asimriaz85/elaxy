<footer class="sub-footer-wrapper">
<div class="sub-footer">

<?php
	
		$select_pages="SELECT id,page_name,description FROM pages WHERE status='Show'";
		$run_pages=mysql_query($select_pages);
		$total_rows=mysql_num_rows($run_pages);
		while($fetch_pages=mysql_fetch_array($run_pages)){ 
		   
		   $page_name=$fetch_pages['page_name'];
		   $page_id=$fetch_pages['id'];
	
	?>

<ul>
<li style=" width:150px;"><a href="elaxy.content.php?id=<?php echo $page_id;  ?>"><?php echo $page_name; ?></a></li>
</ul>
<?php } ?>



</div>
</footer>




<div class="clear"></div>

<div class="footer">


<div class="footer-wrapper">
<div class="copyright">Copyright &copy; Elaxy 2014. All rights reserved <span>Powered by Rana Technologies</span></div>



</div>
<!-- Start Cookie Assisstant (http://cookieassistant.com) -->
<script src="http://app.cookieassistant.com/widget.js?token=IvysBkPudRqIUxNtO3GPXw" type="text/javascript"></script>
<div id="cookie_assistant_container"></div>
<!-- End Cookie Assistant -->
<a href="http://ranktrackr.net">ranktrackr.net</a>
<!-- wrap -->


</div>
