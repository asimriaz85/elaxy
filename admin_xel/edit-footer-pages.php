<?php 
ob_start();
include('include/header.php');
 include("../connection.php");
 
 	$id=$_REQUEST['id'];
	
	if(isset($_REQUEST['submit'])){
	
	
	$up_description=$_REQUEST['description'];	
	
	 $value = htmlspecialchars($_POST['description']);
	 
	
	 $update="UPDATE pages SET description='$value' WHERE id='$id'";
	
		$run=mysql_query($update) or die( mysql_error());
		
		if($run){
			
			$msg="Page updated successfully";
		}
		
	
	
	
	}
	
	$select_page="SELECT id,page_name,description,status FROM pages WHERE id='".$id."'";
	$run_select_page=mysql_query($select_page);
	$fetch_pages=mysql_fetch_array($run_select_page);
	$name=$fetch_pages['page_name'];
	$description=$fetch_pages['description'];
	$hide_show=$fetch_pages['status'];
	
?>
 
<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/sample.js"></script>
<!--	<link rel="stylesheet" href="ckeditor/samples/sample.css">
-->

	<!--
    Dialogue box comment
    <div id="welcome" title="Welcome to Admintasia">
		<p><b>Admintasia</b> is a <b>lightweight</b>, fully and easily customisable <b>administration user interface</b>. Please proceed to the actual demo by clicking the button below. Enjoy !</p>
	</div>-->

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
    <h1>Edit Pages Content</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="854"  border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td colspan="3" bgcolor="#4180BE"><div align="center"><strong><font color="#FFFFFF">Edit Pages </font></strong></div></td>
    </tr>
    <tr>
      <td width="13%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="86%">&nbsp;</td>
    </tr>
    <tr>
      <td height="33">Name:</td>
      <td>:</td>
      <td><?php echo $name; ?></td>
    </tr>
    <tr>
      <td>Content:</td>
      <td>:</td>
      <td><textarea cols="80" id="editor1" name="description" rows="10">
			<?php echo $description; ?>
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