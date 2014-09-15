<?php 
ob_start();
include('include/header.php');
require_once 'gd_engine/ThumbLib.inc.php';
include "gd_engine/gdengin.php";
 
	$id=$_REQUEST['id'];
	
	
	//Update//
	if(isset($_REQUEST['submit'])){
			
			 
			 $up_description=$_REQUEST['description'];
			 
	
	

	
	 $update_sponsored_link="UPDATE sponsored_links SET description='$up_description' WHERE id='$id'";
$query_cupdate_sponsored_link=mysql_query($update_sponsored_link) or die (mysql_error);

$msg="Update Successfully";




}


	
	
	//End//
	
	
	
		
			 $select="SELECT id,description FROM sponsored_links WHERE id='".$id."'";
			$run_query=mysql_query($select);
			$fetch=mysql_fetch_array($run_query);
			
			$description=$fetch['description'];
			
			
			
			
			
?>



	<!--
    Dialogue box comment
    <div id="welcome" title="Welcome to Admintasia">
		<p><b>Admintasia</b> is a <b>lightweight</b>, fully and easily customisable <b>administration user interface</b>. Please proceed to the actual demo by clicking the button below. Enjoy !</p>
	</div>-->

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1>Edit Sponsored Link</h1>
					<div class="other">

						<form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Sponsored Link</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="4" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit Sponsored Link</font></strong></div></td>
    </tr>
    <tr>
      <td width="31%">&nbsp;</td>
      <td width="2%">&nbsp;</td>
      <td width="67%" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="47">Description</td>
      <td>:</td>
      <td colspan="2"><label for="textarea"></label>
        <textarea name="description" id="textarea" cols="45" rows="5"><?php echo $description; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="4"><div class="buttons" style="width:200px;">
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