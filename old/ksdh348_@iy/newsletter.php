<?php 
ob_start();
include('include/header.php');
if(isset($_REQUEST['submit'])){
		$editor=$_POST['editor1'];
		$subject=$_POST['subject'];
	
	if (!empty($_POST['editor1']) && !empty($_POST['subject']))
	
	$value = htmlspecialchars($_POST['editor1']);
{
	$select_num="SELECT id,editor1,subject FROM newsletter";
	$run_num=mysql_query($select_num);
	$num_rows=mysql_num_rows($run_num);
	
	
	if($num_rows==0){
			 
			
	
	$insert="INSERT INTO newsletter(subject,editor1)VALUES('".$subject."','".$editor."')";
	$run_insert=mysql_query($insert);
	
	if($run_insert){
		$msg="Newsletter added successfully";
		
	} if(!$run_insert){
		$error="Newsletter Not added due to error!";
	}
	
	}
	
	if($num_rows >0){
		
		$update="UPDATE newsletter SET subject='$subject',editor1='$editor'";
		$run_update=mysql_query($update);
		if($run_update){
			$msg="Newsletter updated successfully";
		}
		
	}
	
} 
	}
	
	$select_newsletter="SELECT * FROM newsletter";
	$run_select=mysql_query($select_newsletter);
	$fetch_newsletter=mysql_fetch_array($run_select);
	$subject001=$fetch_newsletter['subject'];
	$editor01=$fetch_newsletter['editor1'];
?>

<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/sample.js"></script>
<!--	<link rel="stylesheet" href="ckeditor/samples/sample.css">
-->
	

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1> Pages</h1>
					<div class="other">

					  <form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Create Newsletter</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="860"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Add News Letter</font></strong></div></td>
    </tr>
    <tr>
      <td width="10%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="89%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Subject</td>
      <td>:</td>
      <td><input name="subject" type="text" id="name" size="20" value="<?php echo $subject001; ?>"></td>
    </tr>
    
    
    
    
    <tr>
      <td>Content</td>
      <td>:</td>
      <td><textarea cols="80" id="editor1" name="editor1" rows="10">
			<?php echo $editor01; ?>
		</textarea>
        <script>

			CKEDITOR.replace( 'editor1', {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
			});

		</script>
        
      </tr>
    <tr>
      <td>
        <button type="submit" value="Submit" class="ui-state-default ui-corner-all" id="saveForm" name="submit">Submit</button>
        
        <br /><br />
        </td>
      <td>:</td>
      <td><a href="email_newsletter.php">Send Newsletter</a></td>
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