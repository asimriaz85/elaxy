<?php

	include("../connection.php");
	
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$ad_user_mail=$_REQUEST['ad_user_mail'];	
$title=$_REQUEST['title'];
$description=mysql_real_escape_string($_REQUEST['description']);

$update_status="UPDATE registration SET status='0' WHERE email='".$ad_user_mail."'";
$run_update=mysql_query($update_status);	

$emailmessage=mysql_real_escape_string($_POST['message']);

	$admininfo="support@elaxy.co.uk";
	
	$to =  $ad_user_mail;
	$subject = 'Elaxy account is blocked due to violation';
	$headers = "From: ".$admininfo." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message.='<table width="100%" border="0">
  <tr>
    <td colspan="2">Dear user, </td>
  </tr>
  <tr>
    <td>Your account is blocked due to violation of our terms and conditions.<br>
	Please contact support@elaxy.co.uk if you need help.</td>
   
  </tr>
  <tr>
    <td>Thank you</td>
    
  </tr>
  
</table>';
	$message .= "</body></html>";
	$send=mail($to, $subject, $message, $headers);


echo $ad_user_mail." is Blocked";

  

}


?>