<?php // include("connection.php");

	



if(isset($_POST['submit'])){

      move_uploaded_file($_FILES["file"]["tmp_name"],
      $_FILES["file"]["name"]);
   }  
	
?>
<html>
<head><title>test</title></head>
<body>
<form  method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>

