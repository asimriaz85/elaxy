<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HTML5 CSS Easy Drop Menu System</title>
<style type="text/css">
body{ margin:0px; }
#leftMenu {
width: 15%;
min-width: 150px;
}
#leftMenu > details{
    
}
#leftMenu > details > summary{
cursor:pointer;
background: #DFEFFF;
margin:6px;
padding:8px;

}
#leftMenu > details > summary:hover{
background: #EFEFEF;
}
#leftMenu > details > summary::-webkit-details-marker{
/*display: none;*/
}
#leftMenu > details > a{
display:block;
text-decoration: none;
color:#000;
font-size:13px;
margin:3px 6px 3px 18px;
padding: 4px;
background: #EFEFEF;
}
#leftMenu > details > a:hover{
background: #DFEFFF;
font-weight: bold;
}
#leftMenu > details > a:before{
content: "- ";
}
</style>
</head>
<body>
<?php
include("connection.php");
$select="SELECT id,name FROM categories WHERE parent_off='0' AND show_hide='Show' ORDER BY name";
	$run=mysql_query($select);
		   ?>

<table width="225" border="0" cellspacing="5" cellpadding="2">
                        <tr>
                          <?php
		
		   
		   
          while($fetch=mysql_fetch_array($run)){
		
		$name=$fetch['name'];
	    $id=$fetch['id'];
		
		$select_image="SELECT image FROM categories_image WHERE cat_id='".$id."' ";
		$run_image=mysql_query($select_image);
		$fetch_image=mysql_fetch_array($run_image);
		
		$image=$fetch_image['image'];
			if($num==3){
			$num=0;
			echo "</tr><tr>";
}
			?>
                          <td height="104"><table width="200" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="2" >&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="26%"><img src="ksdh348_@iy/media/logo_gallery/<?php echo $image; ?>" /></td>
                                <td width="74%"><?php echo $name; ?></td>
                              </tr>
                              
                              <?php
	$select_sub_categories="SELECT id,name FROM categories WHERE parent_off='".$id."' AND show_hide='Show'";
	$run_sub_cat=mysql_query($select_sub_categories);
	while($fetch_sub_cat=mysql_fetch_array($run_sub_cat)){
		
		$sub_cat_id=$fetch_sub_cat['id'];
		$sub_cat_name=$fetch_sub_cat['name'];
	?>
                              <tr>
                                <td colspan="2">
                                
                                
                               <div id="leftMenu"> 
                                <details>
    <summary>aa</summary>
    <a href="#">Subcategory A</a>
    <a href="#">Subcategory A</a>
    
  </details></div></td>
                              </tr>
                              
                              <?php } ?>
                              <tr>
                                <td colspan="2" align="right">&nbsp;</td>
                              </tr>
                          </table></td>
                          <?php
			 $num++;
			}
	?>
                        </tr>
                      </table>