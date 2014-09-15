<!DOCTYPE html>
<html><head>
<style>
#active_account{
margin-top:20px; 
background-color:#EAEAD6; 
min-height:130px;	
}

#h2_div{
padding-top:10px; padding-left:52px;	
}
#h2_p{
padding-left:50px; padding-top:20px;color:#333333	
}
#problem_h2{
color:#333333;	
}

#problem_h2 a{
	color:#36F;
}

#problem_h2 a:hover{
	color: #F30;
	text-decoration:underline;
}



#resend_p{
color:#333333;	
}

#resend_p a{
	color:#36F;
}

#resend_p a:hover{
	color: #F30;
	text-decoration:underline;
}
</style>
<?php require_once('inc/meta.php'); ?>



</head>

<body>


<?php require_once('inc/header.php'); 
$email=$_REQUEST['email'];
?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>
<div id="contant_area_home" style="width:1023px;">

<div style="margin-left:10px; margin-right:10px;">
 <div id="active_account">
        <div id="h2_div">
			<h2>All that's left is to activate your account</h2>
            </div>
                    <div id="h2_p">We have sent an email to <strong><?php echo $email; ?></strong> containing a link to activate your Elaxy account - please click on the link and your account will be activated.</div>
                </div>
                <div style="padding-top:20px;">
    			<h2>Problems?</h2>
                <p id="problem_h2">If you do not receive the email in a few minutes then please check your junk email folder. If you still don't find the email then please check that you have spelt your email address correctly and if it is correct we can <a href="resend-activation.php?email=<?php echo $email; ?>">resend the email</a>.</p>
    			</div>
                <p id="resend_p">If the email address you used is incorrect, please <a href="create-account.php">create a new account</a>.</p>
 
		
</div>


</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>
