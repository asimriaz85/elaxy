

<?php include('include/header.php'); 

$tblname='categories';
?>


        
       <script type="text/javascript">
		
		
		$(".fancybox").fancybox({
    afterClose : function() {
        location.reload();
        return;
    }
});
		
	</script>
    
   
    

        <!--End Data table grids-->
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>Sub Categories</h3>
					
				</div>
				<div class="hastable">
                 <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
				  <form name="myform" class="pager-form" method="post" action="config/delete-categories.php?tblname=<?php echo $tblname; ?> &page_name=<?php echo $page_name; ?>">
                  
                  <div style="float:left; width:500px; margin-left:150px;"><a href="javascript:checkAll(document.myform.list)" style="color:#000000;"><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Check All</button></a> <a href="javascript:uncheckAll(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Uncheck All</button></a>  <a href="javascript:delcheck(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Delete</button></a>
         
                        </div>
                  
                    <input type="hidden" name="action" value="multidel">
					  <table class="display" id="example"> 
						<thead> 
						<tr>
							<th width="58">&nbsp;</th>
						    <th width="157">Subcategory Name</th>
						    <th width="154">Category Name</th>
						    <th width="154">Show Hide</th>
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php $select_query=mysql_query("SELECT * FROM categories WHERE parent_off!='0' ORDER BY id"); 
						$row=mysql_num_rows($select_query);
						while($fetch_categories=mysql_fetch_array($select_query)){
							
							$id=$fetch_categories['id'];
							$name=$fetch_categories['name'];
							$show_hide=$fetch_categories['show_hide'];
							$parent_off=$fetch_categories['parent_off'];
							
							$select_main_category="SELECT id,name FROM categories WHERE id='".$parent_off."'";
							$run_main_category=mysql_query($select_main_category);
							$fetch_main_categoty=mysql_fetch_array($run_main_category);
							$main_category=$fetch_main_categoty['name'];
							
							
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $name; ?></td>
						    <td><?php echo $main_category; ?></td>
						    <td> <?php echo $show_hide; ?></td>
						    
						    <td>
								<a class="btn_no_text btn ui-state-default ui-corner-all " title="Edit" href="edit-subcategories.php?id=<?php echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a><a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete-categories.php?id=<?php echo $id; ?>&action=<?php echo "delete";?>&tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
									<span class="ui-icon ui-icon-circle-close"></span>
								</a>
                                <a class="fancybox fancybox.iframe" href="add_sub_categories_management.php?id=<?php echo $id; ?>">Add Sub Categories</a>
							</td>
						</tr>
						<?php } ?>
						
						</tbody>
                        <tfoot>
		<tr>
			<th><input type="text" name="search_engine" value="Search engines" class="search_init" style="display:none;" /></th>
			<th><input type="text" name="search_browser" value="Subcategory Name" class="search_init" /></th>
			<th><input type="text" name="search_browser2" value="Category Name" class="search_init" /></th>
			<th><input type="text" name="search_version" value="Show Hide" class="search_init" /></th>
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