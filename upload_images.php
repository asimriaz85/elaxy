<?php
include("include/header.php");

include("include/login-security");
	
$id=$_REQUEST['id'];

?>

 <!--Add images-->
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.wallform.js"></script>

<script type="text/javascript" >
 $(document).ready(function() { 
		
            $('#photoimg').die('click').live('change', function()			{ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('v');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
					console.log('z');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
							console.log('d');
					 $("#imageloadstatus").hide();
					$("#imageloadbutton").show();
					} }).submit();
					
		
			});
        });
		
		
		<!--DELETE-->
		
function deletedata(id)
   
	
	{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("preview").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","config/delete.php?id="+id,true);
xmlhttp.send();
}

		<!--END--> 
</script>

<style>


.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}

</style>
    <!--END-->

<form class="post-ad-next-step form-flow-mergable" action="ajaximage.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" id="imageform">

    
    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Upload Images</h2>
        
        <div id='preview'>
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
  
 <tr>
    <td width="9%" align="center">Image</td>
    <td width="13%" align="center">Image Name</td>
    <td width="78%">Action</td>
  </tr>
        
<?php
    $select="SELECT id,file_name FROM users_images";
									$run_select=mysql_query($select);
									while($fetch_image=mysql_fetch_array($run_select)){
								?>
                                <tr>
    <td width="9%"><?php echo "<img src='uploads/".$fetch_image['file_name']."'  class='preview'>"; ?></td>
    <td width="13%"><?php echo $fetch_image['file_name']; ?></td>
    <td width="78%"><a onclick='deletedata(<?php echo $fetch_image['id'];?>)' style="cursor:pointer;">Delete</a></td>
  </tr>

                                
									
									
									
                                    
                                    
                                    
                                    <?php
								
									}
									
									?>
    </table>
	</div>
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email">&nbsp;</div>
        <div id="reset_password_email">Upload your image 
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<div id='imageloadbutton'>
<input type="file" name="photoimg" id="photoimg" />
</div></div>
       </div>
       
        
       
       
       
        <div class="clear_both2"></div>
    </fieldset>
    </form>
</body>
</html>