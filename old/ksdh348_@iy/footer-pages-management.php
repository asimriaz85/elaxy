

<?php include('include/header.php'); 

$tblname='pages';

?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>pages Management</h3>
					
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
						    <th width="157">Page Name</th>
						    <th width="109">Status</th>
						    <th width="132" style="width:132px">Title</th>
						    <th width="132" style="width:132px">Keywords</th>
						    <th width="134" style="width:132px">Meta Description</th>
						   
                            
						    <th width="130" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php $select_query=mysql_query("SELECT * FROM $tblname ORDER BY id"); 
						$row=mysql_num_rows($select_query);
						while($fetch_pages=mysql_fetch_array($select_query)){
							
							$id=$fetch_pages['id'];
							$page_name001=$fetch_pages['page_name'];
							$status=$fetch_pages['status'];
							$title=$fetch_pages['title'];
							$keywords=$fetch_pages['m_keywords'];
							$meta_description=$fetch_pages['meta_description'];
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $page_name001; ?></td>
						    <td><?php echo $status; ?></td>
						    <td><?php echo $title; ?></td>
						    <td><?php echo $keywords; ?></td>
						    <td><?php echo $meta_description; ?></td>
					      
					       
						   
                             
						    
						    <td>
								<a class="btn_no_text btn ui-state-default ui-corner-all " title="Edit" href="edit-footer-pages.php?id=<?php echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>
                                <a class="btn_no_text btn ui-state-default ui-corner-all " title="Page Name Update" href="pagename-update.php?id=<?php echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>
                                <a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete.php?id=<?php echo $id; ?>&action=<?php echo "delete";?>&tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
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