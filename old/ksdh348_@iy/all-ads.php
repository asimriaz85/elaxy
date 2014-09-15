

<?php include('include/header.php'); 

$tblname='postcode_location';

?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>All Members</h3>
					
				</div>
                
				<div class="hastable">
                 <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
				  <form name="myform" class="pager-form" method="post" action="config/delete.php?tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>">
                  
                 
         <!--<div style="float:left; width:500px; margin-left:150px;"><a href="javascript:checkAll(document.myform.list)" style="color:#000000;"><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Check All</button></a> <a href="javascript:uncheckAll(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Uncheck All</button></a>  <a href="javascript:delcheck(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Delete</button></a>
         
                    </div>--><br />
                   
                    <input type="hidden" name="action" value="multidel">
					  <table class="display" id="example"> 
						<thead> 
						<tr>
							<th width="58">&nbsp;</th>
						    <th width="157">Cagtegory</th>
						    <th width="180">Sub Category</th>
						    <th width="143" style="width:132px">Title</th>
						    <th width="143" style="width:132px">Description</th>
						    <th width="143" style="width:132px">Price</th>
						    <th width="143" style="width:132px">Added Date</th>
						    <th width="143" style="width:132px">Contact Person</th>
						    <th width="143" style="width:132px">Active Status</th>
						    <th width="143" style="width:132px">Ad Type</th>
						   
                            
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php 
						
						$sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id";

$result = mysql_query($sql);

						while($row = mysql_fetch_array($result))
		{
			
			    $add_id=$row['id'];
			   
			  
			   
  $publish_date=$row['date'];
  
  $status=$row['status'];
	
	$price=$row['item_price'];
		
	$main_cat_id=$row['main_cat_id'];
	$sub_cat_id=$row['sub_cat_id'];	
	
	$user_id=$row['user_id'];	




$title=$row['title'];
$description=$row['description'];

	
		
		
		 $ad_price_name=$row['name'];
		 $ad_price_days=$row['days'];
		
		$end_date=  date('Y-m-d', strtotime($publish_date. ' +'. $ad_price_days. 'day'));
		
		$cdate=date('Y-m-d');
		
		 $select_post_id="SELECT id,postcode_loaction_id FROM ad_price WHERE id='".$add_id."'";
		$run_postcode_id=mysql_query($select_post_id);
		$fetch_postcode_id=mysql_fetch_array($run_postcode_id);
		  $postcode_id=$fetch_postcode_id['postcode_loaction_id'];
		  $price_id=$fetch_postcode_id['id'];
		
		/* $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$postcode_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];*/
			 
			 
			 $select_category="SELECT id,name FROM  categories WHERE id='".$main_cat_id."'";
			 $run_categories=mysql_query($select_category);
			 $fetch_categories=mysql_fetch_array($run_categories);
			 $category_name=$fetch_categories['name'];
			 
			 
			 $select_subcategory="SELECT id,name FROM  categories WHERE id='".$sub_cat_id."'";
			 $run_subcategories=mysql_query($select_subcategory);
			 $fetch_subcategories=mysql_fetch_array($run_subcategories);
			 $subcategory_name=$fetch_subcategories['name'];
		
				
				$select_users="SELECT id,email FROM registration WHERE id='".$user_id."'";
				$run_users=mysql_query($select_users);
				$fetch_users=mysql_fetch_array($run_users);
				$user_email=$fetch_users['email'];			
							
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $category_name; ?></td>
						    <td><?php echo $subcategory_name; ?></td>
						    <td><?php echo $title; ?></td>
						    <td><?php echo $description; ?></td>
						    <td><?php echo "&pound; ".$price;?></td>
						    <td><?php echo $publish_date; ?></td>
						    <td><?php echo $user_email; ?></td>
						    <td><?php if($status==1){ echo "Active"; } if($status==0){ echo "Inactive"; } ?></td>
						    <td><?php echo $ad_price_name; ?></td>
					      
					       
						   
                             
						    
						    <td>
								<a class="btn_no_text btn ui-state-default ui-corner-all " title="Edit" href="edit-ad-management.php?id=<?php echo $add_id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a><a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete.php?id=<?php echo $ad_price; ?>&action=<?php echo "delete";?>&tblname=ad_price&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
									<span class="ui-icon ui-icon-circle-close"></span>
								</a>
                                
							</td>
						</tr>
						<?php } ?>
						
						</tbody>
                        <!--<tfoot>
		<tr>
			<th><input type="text" name="search_engine" value="Search engines" class="search_init" style="display:none;" /></th>
			<th><input type="text" name="search_browser" value="Category Name" class="search_init" /></th>
			<th><input type="text" name="search_platform" value="Search platforms" class="search_init" style="display:none;" /></th>
			<th><input type="text" name="search_version" value="Show Hide" class="search_init" /></th>
			<th><input type="text" name="search_grade" value="Search grades" class="search_init" style="display:none;" /></th>
		</tr>
	</tfoot>-->
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