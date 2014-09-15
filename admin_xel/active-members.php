

<?php include('include/header.php'); 

$tblname='registration';

?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>Active Members</h3>
					
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
						    <th width="157">First Name</th>
						    <th width="180">Last Name</th>
						    <th width="143" style="width:132px">Email</th>
						    <th width="143" style="width:132px">Phone</th>
						    <th width="143" style="width:132px">Country</th>
						    <th width="143" style="width:132px">Agrement Status</th>
						    <th width="143" style="width:132px">Active Status</th>
						   
                            
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php $select_query=mysql_query("SELECT * FROM $tblname WHERE status=1 ORDER BY id"); 
						$row=mysql_num_rows($select_query);
						while($fetch_member=mysql_fetch_array($select_query)){
							
							$id=$fetch_member['id'];
							$first_name=$fetch_member['first_name'];
							$last_name=$fetch_member['last_name'];
							$email=$fetch_member['email'];
							$phone=$fetch_member['phone'];
							$country=$fetch_member['country'];
							$status=$fetch_member['status'];
							
							
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $first_name; ?></td>
						    <td><?php echo $last_name; ?></td>
						    <td><?php echo $email; ?></td>
						    <td><?php echo $phone; ?></td>
						    <td><?php echo $country; ?></td>
						    <td>&nbsp;</td>
						    <td><?php if($status==1){
								echo "Actice";
							}
							
							if($status==0){
								
								echo "Not Actice";
							} ?></td>
					      
					       
						   
                             
						    
						    <td>
								<a class="btn_no_text btn ui-state-default ui-corner-all " title="Edit" href="edit-member.php?id=<?php echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a><!--<a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete.php?id=<?php //echo $id; ?>&action=<?php //echo "delete";?>&tblname=<?php //echo $tblname; ?>&page_name=<?php //echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
									<span class="ui-icon ui-icon-circle-close"></span>
								</a>-->
                                
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