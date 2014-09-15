





<?php

include("include/header.php");

include("include/login-security.php");
	
	
	
	$main_cat=$_REQUEST['main_cat'];
	$sub_cat_id=$_REQUEST['sub_cat_id'];
	 $sub_sub_cat=$_REQUEST['sub_sub_cat'];
	$sub_cat_child_child=$_REQUEST['sub_cat_child_child'];
	$sub_cat_child_child_child=$_REQUEST['sub_cat_child_child_child']; 
	
	
	$select_main_cat="SELECT id,name FROM categories WHERE id='".$main_cat."'";
	$run_main_cat=mysql_query($select_main_cat);
	$fetch_main_cat=mysql_fetch_array($run_main_cat);
	$main_category=$fetch_main_cat['name'];
	
	
	$select_child1="SELECT id,name FROM categories WHERE id='".$sub_cat_id."'";
	$run_child1=mysql_query($select_child1);
	$fetch_child1=mysql_fetch_array($run_child1);
	 $child1=$fetch_child1['name'];
	
	
	$select_child2="SELECT id,name FROM categories WHERE id='".$sub_sub_cat."'";
	$run_child2=mysql_query($select_child2);
	$fetch_child2=mysql_fetch_array($run_child2);
	 $child2=$fetch_child2['name'];
	
	
	$select_child3="SELECT id,name FROM categories WHERE id='".$sub_cat_child_child."'";
	$run_child3=mysql_query($select_child3);
	$fetch_child3=mysql_fetch_array($run_child3);
	 $child3=$fetch_child3['name'];
	
	
	$select_child4="SELECT id,name FROM categories WHERE id='".$sub_cat_child_child_child."'";
	$run_child4=mysql_query($select_child4);
	$fetch_child4=mysql_fetch_array($run_child4);
	 $child4=$fetch_child4['name'];
	
?>
<link rel="stylesheet" type="text/css" media="all" href="css/post-an-add.css">



<script type="text/javascript" src="js/crafty_postcode.class.js"></script>
	<script>
		var cp_access_token = "xxxxx-xxxxx-xxxxx-xxxxx"; // ***** DON'T FORGET TO PUT YOUR ACCESS TOKEN HERE IN PLACE OF X's !!!! *****
		var cp_obj_1 = CraftyPostcodeCreate();
		cp_obj_1.set("access_token", cp_access_token); 
		cp_obj_1.set("first_res_line", "----- please select your address ----"); 
		cp_obj_1.set("res_autoselect", "0");
		cp_obj_1.set("result_elem_id", "crafty_postcode_result_display_1");
		cp_obj_1.set("form", "address");
		cp_obj_1.set("elem_company"  , "companyname"); // optional
		cp_obj_1.set("elem_street1"  , "address1");
		cp_obj_1.set("elem_street2"  , "address2"); // optional, but highly recommended
		cp_obj_1.set("elem_street3"  , "address3"); // optional
		cp_obj_1.set("elem_town"     , "town");
		cp_obj_1.set("elem_county"   , "county"); // optional
		cp_obj_1.set("elem_postcode" , "postcode");
		cp_obj_1.set("elem_house_num", "house_name"); // setting this results in the house name/number being separated onto its own line
		cp_obj_1.set("elem_udprn" 	 , "udprn"); // optional
		cp_obj_1.set("single_res_autoselect" , 1); // don't show a drop down box if only one matching address is found

	</script>
    
    <!--Add images-->
    <script type="text/javascript" src="webroot/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="webroot/js/fileupload.js"></script>
<script type="text/javascript">

$(document).ready(function() {
 $('#vishal').ajaxfileuploader({SCRIPT: 'process.php',VALIDFORMAT:['jpeg','jpg','png','gif'],MAXUPLOAD:9,TABLEHEAD:{name:'name',imgname:'image name',operation:'Operation'}})

});
</script>
    <!--End-->
    
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

<div id="wrapper">


<div class="cleasr_both"></div>
 
                		
                        
                        	<div id="holder">
<div id="main" role="main" class="content-block">

<h1>Post an ad</h1>
<div class="cleasr_both2"></div>
<section class="post-ad-form-flow">
    <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">
    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Select a category</h2>
        
       <p class="p_postal_code"> <?php  if(isset($main_category)){ echo $main_category." "; } if(isset($child1)){ echo "> ". $child1." "; } if(isset($child2)){ echo "> ". $child2." "; } if(isset($child3)){ echo "> ". $child3." "; } if(isset($child4)){ echo "> ". $child4." "; } ?> </p>
    </fieldset>
    </form>
</section>

<div class="cleasr_both2"></div>
<section class="post-ad-form-flow">
    <form class="post-ad-next-step form-flow-mergable" name="address" action="config/postcode.php" method="post" enctype="multipart/form-data">
    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Location</h2>
        
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email">Postcode:</div>
        <div id="reset_password_email"><input type="text" name="postcode" style="width: 100px;"/></div>
         <div id="reset_password_email"><button type="button" onclick="cp_obj_1.doLookup()">Find Address</button><br/>
		
       </div>
       
       </div>
       
       
       
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email">&nbsp;</div>
        <div id="reset_password_email"><div id="crafty_postcode_result_display_1" ></div></div>
         
       
       </div>
       
       
       
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email">Location:</div>
        
		<input type="hidden" name="companyname"/>	
		
		<input type="hidden" name="house_name"/>
		
		<input type="hidden" name="address1"/>	
 		<input type="hidden" name="address2"/>	
 		<input type="hidden" name="address3"/>	
		
	  	<input type="text" name="town"/>		
		
  		<input type="hidden" name="county"/>		
		
  		<input type="hidden" name="udprn"/>
       </div>
       
       
       <div class="p_postal_code2">Not sure what your postcode is?<a href="http://www.royalmail.com/postcode-finder" target="_blank"> Find it here</a> or <a href="#">manually select your location</a></div>
       
       <div class="clear_both11"></div>
       <hr class="hr_dot2" />
       <div id="marign_div">
       <input type="checkbox" name="mape" value="1" />&nbsp;&nbsp; Include a map on my ad
       </div>
        <div class="clear_both2"></div>
    </fieldset>
    </form>
    <!--///////////////////////////////-->
        <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">

    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Ad title</h2>
        
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email">Title*:</div>
        <div id="reset_password_email"><input type="text" name="title"/></div>
       </div>
       
       
       
       
       
       
       
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email5">&nbsp;</div>
        
		<div id="reset_password_email3"><input type="checkbox" class="urgent" name="urgnet_price" id="two" />&nbsp;&nbsp;<h3 id="urgent_button">URGENT</h3></div>
        <div id="reset_password_email4">£9.95 for 7 days - Up to 3 times more views and replies*. Perfect if you need to sell, rent or hire quickly. View example</div>
       </div>
       
      
       
       
        <div class="clear_both2"></div>
    </fieldset>
    </form>
    <!--/////////////////////-->
        <form class="post-ad-next-step form-flow-mergable" action="ajaximage.php" method="post" enctype="multipart/form-data" id="imageform">

    
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
       
        <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email">Add a youtube video link</div>
        <div id="reset_password_email"><input type="text" name="youtube" value="" /></div>
       </div>
       
       
       
        <div class="clear_both2"></div>
    </fieldset>
    </form>
    <!--//////////////////////////////-->
        <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">

    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Description</h2>
        
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email">Description*:</div>
        <div id="reset_password_email"><textarea name="description" cols="80" rows="30"></textarea></div>
       </div>
       
       
        <div class="clear_both2"></div>
    </fieldset>
    </form>
     <!--//////////////////////////////-->
         <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">

    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Add a link to your website?</h2>
        
        <div id="reset_password_div" class="p_postal_code">Link to your website for £7.50 - view example</div>
        
       <div id="reset_password_div" class="p_postal_code">
       <div id="reset_password_email"><input type="checkbox" name="link_website" value="1" />&nbsp;&nbsp;Link to your website</div>
        <div id="reset_password_email"><input type="text" name="link_site" /></div>
       </div>
       
       
        <div class="clear_both2"></div>
    </fieldset>
    </form>
    
    <!--//////-->
        <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">

    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Make your ad stand out! Select an option below to promote your ad</h2>
        
       <div id="checkboxlist">
        
       <div id="reset_password_email9" class="p_postal_code">
       <div id="reset_password_email6"><input type="checkbox" name="selectall[]" class="tf" value="urgent" id="one" />&nbsp;&nbsp;<h3 class="urgent-feature">URGENT</h3></div>
        <div id="reset_password_email7">Up to 3 times more views and replies*. Perfect if you need to sell, rent or hire quickly. View example</div>
        
         <div id="reset_password_email8">7 days - £9.95</div>
       </div>
       
       <div id="reset_password_email9" class="p_postal_code">
       <div id="reset_password_email6"><input type="checkbox" name="selectall[]" class="tf" value="featured" />&nbsp;&nbsp;<h3 class="featured">FEATURED</h3></div>
        <div id="reset_password_email7">Up to 7 times more views and replies*. Your ad will appear at the top of the listings for 3, 7 or 14 days. View example</div>
        
         <div id="reset_password_email8">
         <select name="featured">
         <option value="7_days_15.50">7 days - &pound;15.50</option>
         <option value="14_days_18.50">14 days - &pound;18.50</option>
         <option value="3_days_12.00">3 days - &pound;12.00</option>
         
         </select></div>
       </div>
       
       
       <div id="reset_password_email9" class="p_postal_code">
       <div id="reset_password_email6"><input type="checkbox" name="selectall[]" value="urgent" class="tf urgent" />&nbsp;&nbsp;<h3 class="spotlight">FEATURED</h3></div>
        <div id="reset_password_email7">Your ad will appear on the Gumtree homepage and will be seen by millions of people. View example</div>
        
         <div id="reset_password_email8">7 days - £23.50</div>
       </div>
       </div>
       <div id="reset_password_email9" class="p_postal_code"><input type="checkbox" name="selectall" class="selectall" value="selectall" />&nbsp;&nbsp;Select all</div>
       
        <div class="clear_both2"></div>
    </fieldset>
    </form>
    <!--////////////////////////////-->
        <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">

    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>How would you like to be contacted?</h2>
        
       <div  id="reset_password_div" class="p_postal_code">Please select at least one contact option for your ad</div>
        
       <div id="reset_password_email9" class="p_postal_code">
       <div id="reset_password_email6"><input type="checkbox" name="via_email" checked="checked" value="via_email" />&nbsp;&nbsp;Via email on</div>
        <div id="reset_password_email77"><input name="email" type="text" value="<?php echo $session_email; ?>" size="50" /></div>
        
         <div id="reset_password_email88">Your email address won't appear on your ad</div>
       </div>
       
       
       
       
       <div id="reset_password_email9" class="p_postal_code">
       <div id="reset_password_email6"><input type="checkbox" name="via_email" value="via_email" <?php echo $session_email; ?> />&nbsp;&nbsp; By phone on</div>
        <div id="reset_password_email77"><input name="phone" type="text"  size="50" value="<?php echo $session_phone; ?>" /></div>
        
         <div id="reset_password_email88">Contact Name&nbsp;&nbsp;<input name="name" type="text" value="<?php echo $session_first_name; ?>" size="50" /></div>
       </div>
       
        <div class="clear_both2"></div>
    </fieldset>
    
    </form>
    <!--////////////////////////////////-->
        <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">

    <fieldset id="post-ad-category-select" class="category-select ">
       
       <div class="total_amount_div">Total: &pound;0.00</div>
        <div class="clear_both2"></div>
    </fieldset>
    </form>
    <!--////////-->
        <form class="post-ad-next-step form-flow-mergable" action="config/postcode.php" method="post" enctype="multipart/form-data">

    
    <fieldset id="post-ad-category-select" class="category-select">
       
       <div id="reset_password_email9" class="p_postal_code">
       <div id="reset_password_email777">

By clicking 'Post my ad', you agree to Elaxy's terms of use and posting rules
</div>
        <div id="reset_password_email8"><input type="button" name="preview" value="preview my ad" /></div>
        
         <div id="reset_password_email8"><input type="submit" name="postad" value="post my ad" /></div>
       </div>
        <div class="clear_both2"></div>
    </fieldset>
    </form>
    *Average comparison in ad views and replies between ads that are not promoted and "urgent" or "featured" ads respectively, measured on the Elaxy website from March 2012 to March 2013
    
</section>

</div>

</div>
                
               
                
                
                </div>
    
   
<?php 
	include("include/footer.php");
	?>
    
    <script>
	$('.selectall').click(function() {
    if ($(this).is(':checked')) {
        $('div .tf').attr('checked', true);
		 $('div #two').attr('checked', true);
    } else {
        $('div .tf').attr('checked', false);
    }
});


$('#one, #two').click(function(event) {
    var checked = $(this).is(':checked');
    if (checked) {
        $('#one').attr('checked', true);
        $('#two').attr('checked', true);
        //$('#one, #two').toggle();
    }
    else {
        $('#one').attr('checked', false);
        $('#two').attr('checked', false);
    }
});
    

	</script>

</body>
</html>