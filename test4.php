<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<ul class="accordian_child">
   <li><p id="itemone" onclick="getid();">Item One</p></li>
   <li><p id="itemtwo" onclick="getid();">Item Two</p></li>
   <li><p id="itemthree" onclick="getid();">Item Three</p></li>
   <li><p id="itemfour" onclick="getid();">Item Four</p></li>
   <li><p id="itemfive" onclick="getid();">Item Five</p></li>
   <li><p id="itemsix" onclick="getid();">Item Six</p></li>
  </ul>
  
<script type="text/javascript"> 

function getid(){
	
var myid = this.id;

document.getElementById(myid);	
	
alert(myid);
	
}

</script>
</body>
</html>