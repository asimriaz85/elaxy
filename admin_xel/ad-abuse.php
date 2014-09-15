

<?php include('include/header.php'); 

$tblname='ad_abuse';

?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>Ad Abouse Management</h3>
					
				</div>
				<div class="hastable">
                 <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
				  <form name="myform" class="pager-form" method="post" action="config/delete.php?tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>">
                  
                  <div style="float:left; width:500px; margin-left:150px;"><a href="javascript:checkAll(document.myform.list)" style="color:#000000;"><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Check All</button></a> <a href="javascript:uncheckAll(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Uncheck All</button></a>  <a href="javascript:delcheck(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Delete</button></a>
         
                        </div><br /><br />
                    <input type="hidden" name="action" value="multidel">
					  <table class="display" id="example"> 
						<thead> 
						<tr>
							<th width="58">&nbsp;</th>
						    <th width="157">Title</th>
                            <th>Feature</th>
                            <th>price</th>
						    <th width="180">User</th>
						    <th width="154">Image</th>
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php 
						
						 $sql = "SELECT *
FROM ad_abuse";	
						
						$select_query=mysql_query($sql); 
						$row=mysql_num_rows($select_query);
						while($fetch=mysql_fetch_array($select_query)){
							
							$id=$fetch['id'];
							$postcode_loaction_id=$fetch['postcode_loaction_id'];
							$feature=$fetch['feature'];
							$ad_user_id=$fetch['ad_user_id'];
							$reporter_id=$fetch['reporter_id'];
							$report_message=$fetch['report_message'];
						
						 $select_title="SELECT title FROM  ad_title_description WHERE postcode_loaction_id='".$postcode_loaction_id."' ";	
						
						$run_title=mysql_query($select_title);
						$fetch_title=mysql_fetch_array($run_title);
						$title=$fetch_title['title'];
						
						$select_ad_price="SELECT price,name FROM ad_price WHERE postcode_loaction_id='".$postcode_loaction_id."' AND name='".$feature."' ";	
						
						$run_ad_price=mysql_query($select_ad_price);
						$fetch_ad_price=mysql_fetch_array($run_ad_price);
						//$price=$fetch_ad_price['price'];
						$feature_name=$fetch_ad_price['name'];
						
						$select_image="SELECT id,postcode_loaction_id,file_name FROM  users_images WHERE postcode_loaction_id='".$postcode_loaction_id."' ";	
						
						$run_image=mysql_query($select_image);
						$fetch_image=mysql_fetch_array($run_image);
						$image=$fetch_image['file_name'];
						
						$user="SELECT id,first_name FROM registration WHERE id='".$ad_user_id."'";
						$run_user=mysql_query($user);
						$fetch_user=mysql_fetch_array($run_user);
						$user_name=$fetch_user['first_name'];
						
						
						$select_price="SELECT item_price FROM postcode_location WHERE id='".$postcode_loaction_id."' ";	
						
						$run_price=mysql_query($select_price);
						$fetch_price=mysql_fetch_array($run_price);
						//$price=$fetch_ad_price['price'];
						$item_price=$fetch_price['item_price'];
							
						
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $title; ?></td>
                            <td><?php echo $feature; ?></td>
                            <td><?php echo $item_price; ?></td>
                             <td> <?php echo $user_name; ?></td>
						    <td><img src="../uploads/<?php echo $image; ?>" alt="No Image" width="75" height="75" />
					      
					       
						   
						    
						    <td>
								<a class="btn_no_text btn ui-state-default ui-corner-all " title="Detail" href="ad-abusedetail.php?id=<?php echo $id; ?>&post_id=<?php echo $postcode_loaction_id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>
                               
							</td>
						</tr>
						<?php } ?>
						
						</tbody>
                        <tfoot>
		<tr>
			<th><input type="text" name="search_engine" value="Search engines" class="search_init" style="display:none;" /></th>
			<th><input type="text" name="search_browser" value="title" class="search_init" /></th>
			<th><input type="text" name="search_platform" value="feature" class="search_init" /></th>
            <th><input type="text" name="search_engine" value="price" class="search_init" /></th>
            <th><input type="text" name="search_engine" value="user name" class="search_init"/></th>
			<th><input type="text" name="search_version" value="Show Hide" class="search_init" style="display:none;" /></th>
			<th><input type="text" name="search_grade" value="Search grades" class="search_init" style="display:none;" /></th>
		</tr>
	</tfoot>
					  </table>
                        
                        
                        
						
				  </form>
                    
			  </div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
<?php include('include/sidebar.php'); ?>
	</div>
	<div class="clearfix"></div>
<?php include('include/footer.php'); ?>
</body>
</html>