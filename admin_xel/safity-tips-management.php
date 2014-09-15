

<?php include('include/header.php'); 

$tblname='safity_tipds';

?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>Safity Tips Management</h3>
					
				</div>
				<div class="hastable">
                 <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];?></div><?php } ?>
				  <form name="myform" class="pager-form" method="post" action="config/delete.php?tblname=<?php echo $tblname; ?>&cat_id=<?php echo $cat_id; ?>&page_name=<?php echo $page_name; ?>">
                  
                  <div style="float:left; width:500px; margin-left:150px;"><a href="javascript:checkAll(document.myform.list)" style="color:#000000;"><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Check All</button></a> <a href="javascript:uncheckAll(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Uncheck All</button></a>  <a href="javascript:delcheck(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Delete</button></a>
         
                        </div><br /><br />
                    <input type="hidden" name="action" value="multidel">
					  <table class="display" id="example"> 
						<thead> 
						<tr>
							<th width="58">&nbsp;</th>
						    <th width="157">Categoris</th>
						    <th width="180">Tips</th>
						   
                            
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php $select_query=mysql_query("SELECT * FROM $tblname ORDER BY id"); 
						$row=mysql_num_rows($select_query);
						while($fetch_safity_tips=mysql_fetch_array($select_query)){
							
							$id=$fetch_safity_tips['id'];
							$cat_id=$fetch_safity_tips['cat_id'];
							$tips_des=$fetch_safity_tips['tips_des'];
							
							$select_categories_name="SELECT name FROM categories WHERE id='".$cat_id."'";
							$run_categories=mysql_query($select_categories_name);
							$fetch_categories=mysql_fetch_array($run_categories);
							$categories_name=$fetch_categories['name'];
							
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $categories_name; ?></td>
						    <td><?php echo $tips_des; ?></td>
					      
					       
						   
                             
						    
						    <td>
								<a class="btn_no_text btn ui-state-default ui-corner-all " title="Edit" href="edit-safity-tips.php?id=<?php echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>
                                
                                <a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete.php?id=<?php echo $id; ?>&action=<?php echo "delete";?>&tblname=<?php echo $tblname; ?>&cat_id=<?php echo $cat_id; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
									<span class="ui-icon ui-icon-circle-close"></span>
								</a>
                                
							</td>
						</tr>
						<?php } ?>
						
						</tbody>
                       
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