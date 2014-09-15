<?php 
ob_start();
include('include/header.php');
 
 
 	$id=$_REQUEST['id'];
	
	if(isset($_REQUEST['submit'])){
	
	
	$up_announcements=$_REQUEST['announcements'];	
	
	
	 
	
	$update="UPDATE announcements SET announcements='$up_announcements' WHERE id='$id'";
	
		$run=mysql_query($update);
		
		if($run){
			
			$msg="Page updated successfully";
		}
		
	
	
	
	}
	
	 $select_page="SELECT id,announcements FROM announcements WHERE id='".$id."'";
	$run_select_page=mysql_query($select_page);
	$fetch_pages=mysql_fetch_array($run_select_page);
	
	$announcements=$fetch_pages['announcements'];
	
	
?>
 <!--Nice Editor-->
        <script src="nice_editor/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>


	<!--
    Dialogue box comment
    <div id="welcome" title="Welcome to Admintasia">
		<p><b>Admintasia</b> is a <b>lightweight</b>, fully and easily customisable <b>administration user interface</b>. Please proceed to the actual demo by clicking the button below. Enjoy !</p>
	</div>-->

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1> Edit Announcements</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Announcements                          </h1>
    <div class="divmar">
      <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit Announcements</font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td>Announcements</td>
      <td>:</td>
      <td><textarea name="announcements" cols="50" rows="10"><?php echo $announcements; ?></textarea>
        
      </tr>
    <tr>
      <td colspan="3"><div class="buttons" style="width:200px;">
                                      <button type="submit" value="Submit" class="ui-state-default ui-corner-all" id="saveForm" name="submit">Submit</button>

                                    <br /><br />
                          </div></td>
    </tr>
  </table>
                                    
                          </div>
                                    
                                    
                                    

					  </form>
						<div class="clearfix"></div>
					</div>
					

				</div>
				

			</div>
			<div class="clearfix"></div>
		</div>
<?php include('include/sidebar.php'); ?>

	</div>
	<div class="clearfix"></div>
<?php include('include/footer.php'); ?>
</body>
</html>