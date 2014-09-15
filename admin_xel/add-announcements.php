<?php 
ob_start();
include('include/header.php');
 
	
	$description=$_REQUEST['description'];
	
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
					<h1> Announcements</h1>
					<div class="other">

						<form action="config/add-announcements.php" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($_REQUEST['error'])) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $_REQUEST['error'];?> </div><?php } ?>
        
        <?php if(isset($_REQUEST['msg'])){?><div class="response-msg success ui-corner-all"><?php echo $_REQUEST['msg'];  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>AddAannouncements</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Add New Announcements</font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td>Announcements</td>
      <td>:</td>
      <td><textarea name="description" cols="50" rows="10"><?php echo $description; ?></textarea>
        
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