<?php include('include/header.php'); 

include("../connection.php");

?>
	<div id="welcome" title="Welcome to Admintasia">
		<p><b>Admin Panel</b> is a <b>lightweight</b>, fully and easily customisable <b>administration user interface</b>. Please proceed to the actual demo by clicking the button below. Enjoy !</p>
	</div>

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="other-box yellow-box ui-corner-all">
					<div class="cont tooltip ui-corner-all" title="Tooltip example - this is an example for the tooptip plugin! - You can add tooltips to any element">
						<h3>Welcome !</h3>
						<p><b>Admin Panel</b> is a <b>complete</b>, fully and easily customisable <b>backend administration user interface</b>. Please proceed to the actual demo by clicking the <b>Ok</b> button below. Enjoy !</p>

					</div>
				</div>
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>Administration Options</h1>
					<div class="other">

						<ul id="dashboard-buttons">
							<li>
								<a href="add-categories.php" class="Book_phones tooltip" title="Categories">
									Categories
								</a>
							</li>
							<li>
								<a href="user-management.php" class="Books tooltip" title="User Management">
									User Management
								</a>

							</li>
							<li>
								<a href="ad-management.php" class="Box_recycle tooltip" title="Ad Management">
									Ad Management
								</a>
							</li>
							
							<li>
								<a href="add-sponsored-links.php" class="Box_content tooltip" title="Sponsored Links">
									Sponsored Links
								</a>
							</li>
							<li>
								<a href="add-safity-tips.php" class="Briefcase_files tooltip" title="Safity Tips">
									Safity Tips
								</a>

							</li>
							<li>
								<a href="footer-pages.php" class="Chart_4 tooltip" title="Add Pages">
									Add Pages
								</a>
							</li>
                            
                            <li>
								<a href="newsletter.php" class="Chart_4 tooltip" title="News Letter">
									Newsletter
								</a>
							</li>
							<!--<li>
								<a href="#" class="Clipboard_3 tooltip" title="Clipboard 3">
									Clipboard
								</a>

							</li>
							<li>
								<a href="#" class="Chart_5 tooltip" title="Chart 5">
									Chart
								</a>
							</li>
							<li>
								<a href="#" class="Glass tooltip" title="Glass">
									Glass
								</a>

							</li>
							<li>
								<a href="#" class="Globe tooltip" title="Globe">
									Globe
								</a>
							</li>
							<li>
								<a href="#" class="Mail_compose tooltip" title="Mail compose">
									Mail compose
								</a>

							</li>
							<li>
								<a href="#" class="Mail_open tooltip" title="Mail open">
									Mail open
								</a>
							</li>
							<li>
								<a href="#" class="Monitor tooltip" title="Monitor">
									Monitor
								</a>

							</li>
							<li>
								<a href="#" class="Star tooltip" title="Star">
									Star
								</a>
								<div class="clearfix"></div>
							</li>-->
						</ul>
						<div class="clearfix"></div>
					</div>
					

				</div>
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>Categories And Sub categories Graphical Report</h1>
					<div class="other">
                    
                    <div class="bars MT30">
        <?php 
		
		$select_categories_name1="SELECT * FROM categories WHERE parent_off=0";
		$run_categories_name1_query=mysql_query($select_categories_name1);
		$total_categories_name1=mysql_num_rows($run_categories_name1_query);
		$count=1;
		while($fetch_categories_name1=mysql_fetch_array($run_categories_name1_query)){
			
		?>
        
                    <div id="bar-<?php echo $count; ?>">
                    </div>
                  <?php $count++; } ?> 
                </div>

						<script type="text/javascript">

        $(document).ready(function () {

	<?php 
	$select="SELECT * FROM categories WHERE parent_off=0";
$run=mysql_query($select);
$count=1;
while($fetch=mysql_fetch_array($run)){
	
	$id=$fetch['id'];
	$categories_name=$fetch['name'];
	
	$select_sub_cat="SELECT * FROM categories WHERE parent_off='".$id."'";
	$run_sub_cat=mysql_query($select_sub_cat);
	$num_rows=mysql_num_rows($run_sub_cat);
	
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	?>
          

           $('#bar-<?php echo $count; ?>').jqbar({ label: '<?php echo $categories_name; ?>', value: <?php echo $num_rows; ?>, barColor: '<?php echo $color; ?>', orientation: 'v' });

            
			<?php $count++; } ?>        

        });
    </script>
						<div class="clearfix"></div>
					</div>
					

				</div>
                
                
                
                
                <div class="page-title ui-widget-content ui-corner-all">
					<h1>Ads Graphical Report</h1>
					<div class="other">
                    
                    <div class="bars MT30">
        <?php 
		
		$select_categories_name1="SELECT DISTINCT name FROM ad_price";
		$run_categories_name1_query=mysql_query($select_categories_name1);
		$total_categories_name1=mysql_num_rows($run_categories_name1_query);
		$count=1;
		while($fetch_categories_name1=mysql_fetch_array($run_categories_name1_query)){
			
		?>
        
                    <div id="ads-<?php echo $count; ?>">
                    </div>
                  <?php $count++; } ?> 
                </div>

						<script type="text/javascript">

        $(document).ready(function () {

	<?php 
	$select="SELECT DISTINCT name FROM ad_price";
$run=mysql_query($select);
$count=1;
while($fetch=mysql_fetch_array($run)){
	
	$f_name=$fetch['name'];
	
	
	$select_sub_cat="SELECT * FROM ad_price WHERE name='".$f_name."'";
	$run_sub_cat=mysql_query($select_sub_cat);
	$num_rows=mysql_num_rows($run_sub_cat);
	
	
	
	$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	?>
          

           $('#ads-<?php echo $count; ?>').jqbar({ label: '<?php echo $f_name; ?>', value: <?php echo $num_rows; ?>, barColor: '<?php echo $color; ?>', orientation: 'v' });

            
			<?php $count++; } ?>        

        });
    </script>
						<div class="clearfix"></div>
					</div>
					

				</div>
                
                <!--Revinue-->
                <div class="page-title ui-widget-content ui-corner-all">
					<h1>Ads Revenue of <?php echo date("M-Y"); ?></h1>
					<div class="other">
                    
                    <?php 
					
					
					$first_date=  date('Y-m-01');
   $last_date= date('Y-m-t');
					
					$sql_urgent_count = "SELECT *
FROM postcode_location
INNER JOIN  ad_price ON ad_price.postcode_loaction_id=postcode_location.id WHERE ad_price.name='urgent' AND postcode_location.date >='".$first_date."' AND postcode_location.date <='".$last_date."'";
$run_urgent_count=mysql_query($sql_urgent_count);
$urgent_count=mysql_num_rows($run_urgent_count);

$sql_urgent="SELECT SUM(price) FROM ad_price INNER JOIN postcode_location ON postcode_location.id=ad_price.postcode_loaction_id WHERE ad_price.name='urgent' AND postcode_location.date >='2014-02-01' AND postcode_location.date <='2014-02-28'";


$run_urgent=mysql_query($sql_urgent);


while($fetch_urgent=mysql_fetch_array($run_urgent)){
	
	   $urgent_id=$fetch_urgent['id'];
	   $urgent_price=$fetch_urgent['SUM(price)'];
	 
}


$sql_feature_count = "SELECT *
FROM postcode_location
INNER JOIN  ad_price ON ad_price.postcode_loaction_id=postcode_location.id WHERE ad_price.name='feature' AND postcode_location.date >='".$first_date."' AND postcode_location.date <='".$last_date."'";
$run_feature_count=mysql_query($sql_feature_count);
$feature_count=mysql_num_rows($run_feature_count);

$sql_feature="SELECT SUM(price) FROM ad_price INNER JOIN postcode_location ON postcode_location.id=ad_price.postcode_loaction_id WHERE ad_price.name='feature' AND postcode_location.date >='2014-02-01' AND postcode_location.date <='2014-02-28'";


$run_feature=mysql_query($sql_feature);


while($fetch_feature=mysql_fetch_array($run_feature)){
	
	   $feature_id=$fetch_feature['id'];
	   $feature_price=$fetch_feature['SUM(price)'];
	 
	 
	
}
					
		$sql_spotlight_count = "SELECT *
FROM postcode_location
INNER JOIN  ad_price ON ad_price.postcode_loaction_id=postcode_location.id WHERE ad_price.name='spotlight' AND postcode_location.date >='".$first_date."' AND postcode_location.date <='".$last_date."'";
$run_spotlight_count=mysql_query($sql_spotlight_count);
$spotlight_count=mysql_num_rows($run_spotlight_count);

$sql_spotlight="SELECT SUM(price) FROM ad_price INNER JOIN postcode_location ON postcode_location.id=ad_price.postcode_loaction_id WHERE ad_price.name='spotlight' AND postcode_location.date >='2014-02-01' AND postcode_location.date <='2014-02-28'";


$run_spotlight=mysql_query($sql_spotlight);


while($fetch_spotlight=mysql_fetch_array($run_spotlight)){
	
	   $spotlight_id=$fetch_spotlight['id'];
	   $spotlight_price=$fetch_spotlight['SUM(price)'];
	 
	 
	
}
		
		
					
					
					?>
                    
                    
                    <table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="12%" height="44">&nbsp;</td>
    <td width="16%"><h3>Urgent Ads</h3></td>
    <td width="16%"><h3>Feature Ads</h3></td>
    <td width="13%"><h3>Spotlight Ads</h3></td>
    <td width="59%"><h3>Total</h3> </td>
  </tr>
  <tr>
    <td height="34" valign="middle"><h3>Number Of Ads</h3></td>
    <td><?php echo $urgent_count; ?></td>
    <td><?php echo $feature_count; ?></td>
    <td><?php echo $spotlight_count; ?></td>
    <td><?php echo $urgent_count+$feature_count+$spotlight_count; ?></td>
  </tr>
  <tr>
    <td height="65"><h3>Total Ads Amount</h3></td>
    <td><?php echo $urgent_price; ?></td>
    <td><?php echo $feature_price; ?></td>
    <td><?php echo $spotlight_price; ?></td>
    <td><?php echo $urgent_price+$feature_price+$spotlight_price; ?></td>
  </tr>
</table>

                    

						
						<div class="clearfix"></div>
				  </div>
					

				</div>
                <!--END-->
                
                
                
                
			</div>
			<div class="clearfix"></div>
		</div>
<?php include('include/sidebar.php'); ?>

	</div>
	<div class="clearfix"></div>
<?php include('include/footer.php'); ?>
</body>
</html>