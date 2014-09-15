<?php
ob_start();
//Include connection.php for db//
include("connection.php");

include("include/session.php");

	
		$error=$_REQUEST['error'];

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Admintasia | Powerful backend admin user interface</title>
	<link href="style.css" rel="stylesheet" media="all" />
	<link href="" rel="stylesheet" title="style" media="all" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.7.2.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/cookie.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* EXAMPLE */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');

	</script>
	<![endif]-->
	<!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
</head>
<body>
	<div id="welcome_login" title="Welcome to Admin Panel">
		
        <?php
if($form->num_errors > 0){
	
	if($form->error("access")){
	?>
    
  <div class="response-msg error ui-corner-all"><?php echo $form->error("access"); ?></div>
   <?php } 
   
   if($form->error("attempt")){
	?>
  
    <div class="response-msg error ui-corner-all"><?php echo $form->error("attempt"); ?></div>
  <?php 
   }

}

if(isset($error)){
	?>
    <div class="response-msg error ui-corner-all"><?php echo $error; ?></div>
    <?php
}
?>
        
        
    
		
		<form action="process.php" method="post" enctype="multipart/form-data" class="forms" name="form">
			<ul>
				<li>
					<label for="email" class="desc">

						username:
					</label>
					<div>
                    
                    <input type="text" tabindex="1" maxlength="255" value="<?php echo $form->value("user"); ?>" class="field text full" name="user" id="email" />
                    
                   
                    
                  
						
					</div>
				</li>
				<li>
					<label for="password" class="desc">
						Password:
					</label>

					<div>
                    
                    <input type="password" tabindex="1" maxlength="255" value="<?php echo $form->value("pass"); ?>" class="field text full" name="pass" id="password" />
                   
						
					</div>
                    <div style="margin-top:100px; float:right;">
                    <input type="checkbox" name="remember" <?php if($form->value("remember") != ""){ echo "checked"; } ?>>
	<font size="2">Remember me next time &nbsp;&nbsp;&nbsp;&nbsp;</font>
	<input type="hidden" name="sublogin" value="1">
                      <input type="submit"  id="saveForm" value="Login" class="ui-state-default ui-corner-all" style=" height:30px;" />
                    </div>
			  </li>
			</ul>
		</form>
	</div>
</body>
</html>