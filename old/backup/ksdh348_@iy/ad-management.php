

<?php include('include/header.php'); 

$tblname='postcode_location';

?>
<script type="text/javascript">
		
		
		$(".fancybox").fancybox({
    afterClose : function() {
        location.reload();
        return;
    }
});
		
	</script>

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>Ad's Management</h3>
					
				</div>
				<div class="hastable">
                 <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
				  <form name="myform" class="pager-form" method="post" action="config/delete-ad.php?tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>">
                  
                  <div style="float:left; width:500px; margin-left:150px;"><a href="javascript:checkAll(document.myform.list)" style="color:#000000;"><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Check All</button></a> <a href="javascript:uncheckAll(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Uncheck All</button></a>  <a href="javascript:delcheck(document.myform.list)" style="color:#000000;" ><button type="button" class="ui-state-default ui-corner-all" id="saveForm">Delete</button></a>
         
                        </div>
                        <br /><br />
                    <input type="hidden" name="action" value="multidel">
					  <table class="display" id="example"> 
						<thead> 
						<tr>
							<th width="58">&nbsp;</th>
						    <th width="157">User Name</th>
						    <th width="180">Email</th>
						    <th width="154">Title</th>
                            <th width="154">Published Date</th>
                            <th width="154">Status</th>
                            
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php $select_query=mysql_query("SELECT id,user_id,date,status FROM postcode_location ORDER BY id DESC"); 
						$row=mysql_num_rows($select_query);
						while($fetch_ad=mysql_fetch_array($select_query)){
							
							$id=$fetch_ad['id'];
							$user_id=$fetch_ad['user_id'];
							$published_date=$fetch_ad['date'];
							$status=$fetch_ad['status'];
							
							$user_name="SELECT first_name,email FROM registration WHERE id='".$user_id."'";
							$run_user_name=mysql_query($user_name);
							$fetch_user_name=mysql_fetch_array($run_user_name);
							$first_name=$fetch_user_name['first_name'];
							$email=$fetch_user_name['email'];
							
							
							
							$select_ad_title_description="SELECT id,postcode_loaction_id,title,description FROM ad_title_description WHERE postcode_loaction_id ='".$id."' ";
$run_ad_title=mysql_query($select_ad_title_description);
$fetch_ad_title=mysql_fetch_array($run_ad_title);
$title=$fetch_ad_title['title'];
$description=$fetch_ad_title['description'];
							
							
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $first_name; ?></td>
						    <td><?php echo $email; ?></td>
					      <td><?php echo $title; ?></td>
					      <td><?php echo $published_date; ?></td> 
                         
						    <td><?php if($status==1){?>Active<?php } ?>
                           <?php if($status==0){?> Not Active<?php } ?>
                            </td>
						    
						    <td>
								<!--<a class="btn_no_text btn ui-state-default ui-corner-all fancybox fancybox.iframe" title="Edit" href="edit-ad.php?id=<?php //echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>-->
                                <a class="btn_no_text btn ui-state-default ui-corner-all" title="Edit View" href="edit-ad.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>&first_name=<?php echo $first_name; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>
                                <a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete-ad.php?id=<?php echo $id; ?>&action=<?php echo "delete";?>&tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
									<span class="ui-icon ui-icon-circle-close"></span>
								</a>
                                
							</td>
						</tr>
						<?php } ?>
						
						</tbody>
                        <tfoot>
		<tr>
			<th><input type="text" name="search_engine" value="Search engines" class="search_init" style="display:none;" /></th>
			<th><input type="text" name="search_browser" value="User Name" class="search_init" /></th>
			<th><input type="text" name="search_platform" value="Email" class="search_init" /></th>
			<th><input type="text" name="search_version" value="Title" class="search_init" /></th>
            <th><input type="text" name="search_version" value="Title" class="search_init" style="display:none;" /></th>
            <th><input type="text" name="search_version" value="Status" class="search_init" /></th>
			<th><input type="text" name="search_version" value="Title" class="search_init" style="display:none;" /></th>
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