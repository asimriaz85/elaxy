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


<div id="leftMenu">
  <details>
    <summary>Menu Item 1</summary>
    <a href="#">Subcategory A</a>
    <a href="#">Subcategory B</a>
    <a href="#">Subcategory C</a>
  </details>
  <details>
    <summary>Menu Item 2</summary>
    <a href="#">Subcategory A</a>
    <a href="#">Subcategory B</a>
  </details>
  <details>
    <summary>Menu Item 3</summary>
    <a href="#">Subcategory A</a>
    <a href="#">Subcategory B</a>
    <a href="#">Subcategory C</a>
    <a href="#">Subcategory D</a>
    <a href="#">Subcategory E</a>
  </details>
  <details>
    <summary>Menu Item 4</summary>
    <a href="#">Subcategory A</a>
    <a href="#">Subcategory B</a>
    <a href="#">Subcategory C</a>
  </details>
</div>
</body>
</html>