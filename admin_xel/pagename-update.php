<?php 
ob_start();
include('include/header.php');
 
 
 	$id=$_REQUEST['id'];
	
	if(isset($_REQUEST['submit'])){
	$up_name=$_REQUEST['name'];
	$up_hide_show=$_REQUEST['hide_show'];
	$up_title=$_REQUEST['title'];
	$up_keywords=$_REQUEST['keywords'];
	$up_meta_description=htmlspecialchars($_REQUEST['meta_description']);
	
	
	
	
	 $select_pagename="SELECT page_name FROM pages WHERE page_name='".$up_name."'";
		$run_page_name=mysql_query($select_pagename);
		$fetch_page_name=mysql_fetch_array($run_page_name);
		$page_name=$fetch_page_name['page_name'];
		
		
		$update2="UPDATE pages SET status ='$up_hide_show',title='$up_title',m_keywords='$up_keywords',meta_description='$up_meta_description' WHERE id=$id";
	
		$run2=mysql_query($update2);
		
		if($run2){
			
			$msg="Page status updated successfully";
		}
		
		
		if($page_name==$up_name){
			
			$error="Page Name already exist!";
	
		}
		
		if($page_name!=$up_name){
	
	$update="UPDATE pages SET page_name='$up_name',status ='$up_hide_show' WHERE id=$id";
	
		$run=mysql_query($update);
		
		if($run){
			
			$msg="Page updated successfully";
		}
		
		
		
		
	}
	
	
	}
	
	$select_page="SELECT * FROM pages WHERE id='".$id."'";
	$run_select_page=mysql_query($select_page);
	$fetch_pages=mysql_fetch_array($run_select_page);
	$name=$fetch_pages['page_name'];
	$description=$fetch_pages['description'];
	$hide_show=$fetch_pages['status'];
	$title=$fetch_pages['title'];
	$keywords=$fetch_pages['keywords'];
	$meta_description=$fetch_pages['meta_description'];
	
?>
 <script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/sample.js"></script>


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
    <h1>Edit Pages</h1>
                        
                       
                        
									<div class="divmar">
                                    
                                     
                               <table width="400"  border="0" align="center" cellpadding="2" cellspacing="0">
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
      <td><input name="name" type="text" id="name" size="20" value="<?php echo $name; ?>"></td>
    </tr>
    <tr>
      <td height="47">Title</td>
      <td>:</td>
      <td><input name="title" type="text" id="name2" size="20" value="<?php echo $title; ?>" /></td>
    </tr>
    <tr>
      <td height="47">Keywords</td>
      <td>:</td>
      <td><input name="keywords" type="text" id="name3" size="20" value="<?php echo $keywords; ?>" /></td>
    </tr>
    <tr>
      <td height="47">Description</td>
      <td>:</td>
      <td><textarea cols="80" id="editor1" name="meta_description" rows="10">
			<?php echo $meta_description; ?>
		</textarea><script>

			CKEDITOR.replace( 'editor1', {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
			});

		</script></td>
    </tr>
    <tr>
      <td height="47">Active/Notactive</td>
      <td>:</td>
      <td>
        <?php
                                    if(isset($hide_show)){
                                    ?>
        <select tabindex="1" class="field select small" name="hide_show" > 	                                   
          <option value="<?php echo $hide_show; ?>">
            <?php echo $hide_show; ?>
            </option>
          <option value="Show">
            Show
            </option>
          <option value="Hide">
            Hide
            </option>
          
          </select>
        <?php } else{ ?>
        
        <select tabindex="1" class="field select small" name="hide_show" > 
          
          <option value="Show">
            Show
            </option>
          <option value="Hide">
            Hide
            </option>
          
          </select>
        <?php } ?>
        </td>
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