<?php
ob_start();

session_start();

 $_SESSION['login_email_id'];

 $u=$_REQUEST['u'];
?>

<?php

if (@$_POST['Send']=="Send")
{
$name=$_POST['name'];
$email=$_POST['email'];





$admininfo="support@elaxy.co.uk";
	
	//$admininfo="faisalwebprogrammer@gmail.com";
	
	$to =  $email;
	$subject = 'Your friend' .$_SESSION['first_name']. 'share Elaxy Ad with you';
	$headers = "From: ".$admininfo." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message.='<table width="100%" border="0">
  <tr>
    <td colspan="2">Dear '.$email.', </td>
  </tr>
  <tr>
    <td><strong>Please visit the link given below.</strong></td>
   
  </tr>
  <tr>
    <td><a href="'.$u.'">'.$u.'</a></td>
    
  </tr>
  
  <tr>
    <td>Regards,</td>
    
  </tr>
  
  <tr>
    <td>Support Team</td>
    
  </tr>
  
  <tr>
    <td><img src="http://gravityweb.net/elaxy/images/logo.png"></td>
    
  </tr>
  
</table>';
	$message .= "</body></html>";
	$send=mail($to, $subject, $message, $headers);
	
	
	
	}


?>