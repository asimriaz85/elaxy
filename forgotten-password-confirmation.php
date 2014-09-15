<!DOCTYPE html>

<html><head>

<?php 

ob_start();

require_once('inc/meta.php'); ?>

<link href="css/login.css" rel="stylesheet" type="text/css" />



</head>



<body>





<?php require_once('inc/header.php'); 





?>





<section class="main-wrapper">

<?php require_once('inc/top_ads.php'); ?>







<div class="clear"></div>





<?php require_once('inc/search_bar.php'); ?>





<div class="clear"></div>







<div id="contant_area_home" style="width:1023px;">



<div id="login_div">

	<div id="wrappertop"></div>

    

    <?php 

if(isset($_REQUEST['submit'])){

	 $login_email=$_REQUEST['login_email']; 

	 

	  $select_status="SELECT * FROM registration WHERE email='".$login_email."'";

	 $run_status=mysql_query($select_status);

	 $fetch_u_status=mysql_fetch_array($run_status);

	 $status_u=$fetch_u_status['status'];

	 $email=$fetch_u_status['email'];

	 if($status_u!=1){

		 $error="Your account is blocked or deleted by admin";

		 ?>

         <script type="text/javascript">

<!--

window.location = "forgot-password.php?error_block=<?php echo $error; ?>"

//-->

</script>

         <?php

		 

		// header("location:forgot-password.php?error_block=$error");

	 }

	 

	 if($status_u==1 && $email==$login_email){

	$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';



if (preg_match($regex, $_REQUEST['login_email']) && !empty($_REQUEST['login_email'])) {



		$select_first_name="SELECT first_name FROM registration WHERE email='".$_REQUEST['login_email']."'";

		$run_query=mysql_query($select_first_name);

		$fetch=mysql_fetch_array($run_query);

		

		$first_name=$fetch['first_name'];



$u=uniqid();

					

						

			

			

						

			$to =  $_POST['login_email'];

	$subject = 'Elaxy forgotten password';

	$headers = "From: no-reply@elaxy.co.uk \r\n";

	$headers .= "MIME-Version: 1.0\r\n";

	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	

	



	$message.= '<html><body>';

	

	$message.='<table width="100%" border="0">';

  

 

  

  $message.='<tr><td width="40%"><img src="http://gravityweb.net/elaxy/images/logo.png"></td><td width="60%"> 		

<h3>Forgotten password</h3></td></tr>';

  

  

  

  $message.='<tr><td height="48">It’s important not to write down your password for security reasons – you don’t want someone else to log in on your account and access all of your ads; memorising it is therefore the most sensible course of action. However, if you can’t recall your password, simply enter your email address, click on ‘forgotten password’ and we’ll email you back with the information you need to reset it.</td></tr>';

  

 
  

  

  $message.='<tr><td height="54"><a href="http://gravityweb.net/elaxy/reset-password.php?id='.$to.'&key='.$u.'">Reset your password</a></td>

    </tr>';



	

	

	

 

  $message.='<tr><td>Thanks</td></tr>';

  $message.='<tr><td height="72">Elaxy Team</td></tr>';

  $message.='<tr>

    
    <td height="72" style="font-size:11px; border:1px solid #d6d6d6;">This email was sent to you by Elaxy.co.uk because you have subscribed  to our services as elaxy.ltd@gmail.com  on www.elaxy.co.uk. If you have any question or  would like more information, Please read  our  privacy policy and terms of business.Elaxy.co.uk Limited  is registered  in England  and Wales, with registration Number  03934849, Address: 66 Bromham  Road , Bedford, Bedfordshire ,United Kingdom, MK40 2QH.  © Copyright  2013  Elaxy.co.uk, All Rights Reserved. All designated brands and trademarks are the property of their individual owners. Elaxy.co.uk  and  its Logo are the trademarks of Elaxy.co.uk Limited.</td>

  </tr>';

$message.='</table>';

	$message .= "</body></html>";

	

	$mail_sent=mail($to, $subject, $message, $headers);





?>

    

    

			<div id="wrapper2" class="login_bg">

            <div><h1>Forgotten password</h1></div>

            <div><p>We have sent an email to <strong><?php echo $login_email; ?></strong> containing a link to activate your Elaxy account - please click on the link and your account will be activated. </p></div>

            <div>

            

            <div><h2>Having Problems?</h2></div>

            <div><p>If you do not receive the email in a few minutes then please check your junk email folder. If you still don't find the email then please check that you have spelt your email address correctly and <a href="forgot-password.php">try again</a>.</p></div>

            

            <!--<div>If you are still unable to reset your password, please<a href="contactus"> Help & Contact</a>.</div>-->

            <div>

            

							<div id="error"><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; } ?></div>

						

            </div>

					

				</div>   







</div>



<?php

	}



}

 else{

	$error="Invalid Email address";

header("location:forgot-password.php?error=$error");	

}

}

?>

		

</div>





</div>





</section>

<div class="clear"></div>



<?php require_once('inc/footer.php'); ?>





</body>

</html>

