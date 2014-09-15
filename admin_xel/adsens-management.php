

<?php include('include/header.php'); 

$tblname='adsens_ad';

?>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="title">
					<h3>Adsens Management</h3>
					
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
						    <th width="157">Page Name</th>
						    <th width="180">Location</th>
						    <th width="180">Images</th>
						    <th width="180">Adsen Code</th>
						    <th width="154">Status</th>
                            
						    <th width="143" style="width:132px">Options</th> 
						</tr> 
						</thead> 
						<tbody> 
                        <?php 
						
						 $select_query="SELECT * FROM adsens_ad";
						$run=mysql_query($select_query);
						$row=mysql_num_rows($run);
						while($fetch_ad=mysql_fetch_array($run)){
							
							$id=$fetch_ad['id'];
							$ad_page_name=$fetch_ad['ad_page_name'];
							$location=$fetch_ad['location'];
							$status=$fetch_ad['status'];
							$ad_code=$fetch_ad['ad_code'];
							$images=$fetch_ad['images'];
							
							
							
							
							
							
							
							
							
						?>
						<tr> 
							<td class="center">
                            <input name="list[]" type="checkbox"  id="list" value="<?php echo $id; ?>" />
                           
						    <td><?php echo $ad_page_name; ?></td>
						    <td><?php echo $location; ?></td>
						    <td><img src="media/logo_gallery/<?php echo $images; ?>" /><?php ?></td>
						    <td><?php echo $ad_code; ?></td>
					      <td><?php if($status=='Show'){?>Active<?php } ?>
                           <?php if($status=='Hide'){?> Not Active<?php } ?>
                            </td>
						    
						    <td>
								<!--<a class="btn_no_text btn ui-state-default ui-corner-all fancybox fancybox.iframe" title="Edit" href="edit-ad.php?id=<?php //echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>-->
                                <a class="btn_no_text btn ui-state-default ui-corner-all" title="Edit View" href="edit-adsens.php?id=<?php echo $id; ?>">
									<span class="ui-icon ui-icon-wrench"></span>
								</a>
                                <a class="btn_no_text btn ui-state-default ui-corner-all " title="Delete" href="config/delete-ad.php?id=<?php echo $id; ?>&action=<?php echo "delete";?>&tblname=<?php echo $tblname; ?>&page_name=<?php echo $page_name; ?>" onclick="javascript:return confirm('Are you sure you want to delete this?')">
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