

<?php include('include/header.php'); 

$tblname='sponsored_links';

?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>Sponsored Links Management</h3>
					
				</div>
				<div class="hastable">
                 <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
				  <form name="myform" class="pager-form" method="post" action="config/delete-sponsored-links.php?tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>">
                  
                  <div style="float:left; width:500px; margin-left:150px;"><a href="javascript:checkAll(document.myform.list)" style="color:#000000;"><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Check All</button></a> <a href="javascript:uncheckAll(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Uncheck All</button></a>  <a href="javascript:delcheck(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Delete</button></a>
         
                    </div><br /><br /><br />
                    <input type="hidden" name="action" value="multidel">
					  <table class="display" id="example"> 
						<thead> 
						<tr>
							<th width="58">&nbsp;</th>
						    <th>Description</th>
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php $select_query=mysql_query("SELECT * FROM sponsored_links ORDER BY id"); 
						$row=mysql_num_rows($select_query);
						while($fetch_sponsored=mysql_fetch_array($select_query)){
							
							$id=$fetch_sponsored['id'];
							$title=$fetch_sponsored['title'];
							$weblink=$fetch_sponsored['weblink'];
							$description=$fetch_sponsored['description'];
							$show_hide=$fetch_sponsored['show_hide'];
							$image=$fetch_sponsored['image'];
							
							
							
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    
                            
                            <td><?php echo $description; ?></td>
						    <td>
								<a class="btn_no_text btn ui-state-default ui-corner-all " title="Edit" href="edit-sponsored-link.php?id=<?php echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a><a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete-sponsored-links.php?id=<?php echo $id; ?>&action=<?php echo "delete";?>&tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
									<span class="ui-icon ui-icon-circle-close"></span>
								</a>
                               
							</td>
						</tr>
						<?php } ?>
						
						</tbody>
                        <tfoot>
		<!--<tr>
			<th><input type="text" name="search_engine" value="Search engines" class="search_init" style="display:none;" /></th>
			<th><input type="text" name="search_engine" value="description" class="search_init" /></th>
            <th><input type="text" name="search_grade" value="Search grades" class="search_init" style="display:none;" /></th>
		</tr>-->
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