
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getCat(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('catdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	/////////////////////////////////////////////
	
	
	
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getsub(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	
	///////////////////////////////////////////
	
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getsubchild(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subsubdiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	/////////////////////////////////////////////////
	
	
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getsubsubchild(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subsubchild').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
			/////////////////////////////////////////////////
	
	
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getsubsubchild_id(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('subsubchild_id').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>

<style>
#main-menu1 li a.active, #main-menu1 a:hover {
text-decoration: underline;
color: #D9CD60;
}
</style>


<?php

include("include/header.php");

include("include/login-security.php");
	
	
?>
<link rel="stylesheet" type="text/css" media="all" href="css/post-an-add.css">
<!--<script type="text/javascript" src="js/head.js"></script>-->

<script>
$(document).ready(function(){
    $('.l1-cars-vans-motorbikes').click(function(){
        $('#subdiv').load('empty.php');
		$('#subsubdiv').load('empty.php');
    });
});


</script>


<div id="wrapper">


<div class="cleasr_both"></div>
 
                		
                        
                        	<div id="holder">
<div id="main" role="main" class="content-block">

<h1>Post an ad</h1>
<div class="cleasr_both2"></div>
<section class="post-ad-form-flow">
    <form class="post-ad-next-step form-flow-mergable" action="postcode.php" method="post" enctype="multipart/form-data">
    <fieldset id="post-ad-category-select" class="category-select ">
        <h2>Select a category</h2>
        
<div class="form-component form-grid   ">
    <ol>
        <li class="l1-grid">
            <div data-grid-level="1" class="grid-level-1-holder grid-level-holder">
                <ul class="grid-level grid-level-1">
                
                    <?php
					$select_categories="SELECT id,name,parent_off FROM categories WHERE parent_off='0' ORDER BY name";				$run_query=mysql_query($select_categories);
					while($fetch_query=mysql_fetch_array($run_query)){
					$cat_id=$fetch_query['id'];
					$name=$fetch_query['name'];
					
					$cat_image="SELECT id,cat_id,image FROM categories_image WHERE cat_id='".$cat_id."'";
					$run_image=mysql_query($cat_image);
					$fetch_image=mysql_fetch_array($run_image);
					
					$image=$fetch_image['image'];
					?>
                        
                       <li class="l1-cars-vans-motorbikes" onclick="getCat('findsub_cat.php?cat_id='+<?php echo $cat_id; ?>) " id="reload_<?php echo $cat_id; ?>">
                           <a href="#"><img src="ksdh348_@iy/media/logo_gallery/<?php echo $image; ?>" /><br /><?php echo $name; ?></a><input type="hidden" name="category_name" value="<?php echo $cat_id; ?>" />
                       </li>
                    
                       <?php } ?>
                    
                       
                    
                </ul>
            </div>
        </li>

        
            <li class="l2-plus-grid">
                <ol>
                        <li>
                            <div data-grid-level="2" class="grid-level-2-holder grid-level-holder" id="main-menu1">
                                <ul class="grid-level grid-level-2" >
                                   <div id="catdiv"></div>
                                </ul>
                            </div>
                        </li>
                        
                    
                        <li>
                            <div data-grid-level="3" class="grid-level-3-holder grid-level-holder" id="refresh_change" >
                                <ul class="grid-level grid-level-3">
                                    <div id="subdiv"></div>
                                </ul>
                            </div>
                        </li>
                        
                    
                        <li>
                            <div data-grid-level="4" class="grid-level-4-holder grid-level-holder">
                                <ul class="grid-level grid-level-4">
                                    <div id="subsubdiv"></div>
                                </ul>
                            </div>
                        </li>
                        
                    
                        <li>
                            <div data-grid-level="5" class="grid-level-5-holder grid-level-holder">
                                <ul class="grid-level grid-level-5">
                                    <div id="subsubchild"></div>
                                    <div id="subsubchild_id" style="display:none;"></div>
                                </ul>
                            </div>
                        </li>
                        
                    
                </ol>
            </li>
        
        
<div class="  form-hidden  form-component-mandatory form-component  ">
<input id="category-select_category_id" name="category_id" value="" type="hidden">
</div>

    </ol>
</div>




    </fieldset>
    
    
    <div style="display: block; height: 65px; margin-bottom: -65px; width: 1023px;" class="submit-button-wrapper-placeholder"></div><div style="width: 1023px;" class="submit-button-wrapper form-not-continuable js_floating">
        



<div class="   form-component form-submit ">
    
    <input id="category-select_submit-category" name="submit-category" class="button" value="Continue" data-parent-component="#post-ad-category-select" type="submit">
</div>



    </div>
    </form>
</section>
</div>

</div>
                
               
                
                
                </div>
<script>
		$(window).load(function(){
	$(".l1-cars-vans-motorbikes").click(function () {
        $(".l1-cars-vans-motorbikes").removeClass("unselected");
        $(".l1-cars-vans-motorbikes").removeClass("selected");
        $(this).addClass("selected").siblings().addClass("unselected");
	});
});//]]>


$(document).ready(function() {
  
        $("#left-box > li").click(function(){
        $("#left-box > li").removeClass('selected');
            $(this).addClass('selected');
        
        })
        
        
});

		</script>

    
   


</body>
</html>