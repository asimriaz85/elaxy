<!DOCTYPE html>
<html><head>
<?php require_once('inc/meta.php'); ?>
<link href="css/login.css" rel="stylesheet" type="text/css" />

</head>

<body>


<?php require_once('inc/header.php'); 

 $email=$_REQUEST['id'];
 
 include("include/header.php");
 
 	
		if(isset($email)){
			
			$status='1';
		
		$update="UPDATE  registration SET status='$status' WHERE email='$email'";
		$run=mysql_query($update);	
			
		}
?>




<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div id="contant_area_home" style="width:1023px;">

<div id="login_div">
	<div id="wrappertop"></div>
			<div id="wrapper2" class="login_bg">
            <div>
            
							<div id="error"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; } ?></div>
						
            </div>
					<div id="content">
                    
                    <div><img src="images/login-top.png" /></div>
                    
                    
                    
						
						
                        <div class="clear_both"></div>
						<h2>Your Elaxy account has been activated</h2><br>
                        <h2>Thanks for creating an account. Please login to start using your account.</h2>
						
					</div>
				</div>   



</div>


		
</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
