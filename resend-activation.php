<?php
ob_start();

include("connection.php");

$email=$_REQUEST['email'];

$u=uniqid();

$select="SELECT first_name FROM registration WHERE email='".$email."'";

$run=mysql_query($select);
$fetch=mysql_fetch_array($run);

$first_name=$fetch['first_name'];

	
		$to =  $_POST['email'];
	$subject = 'Please active your new Elaxy account';
	//$headers = "From: ".$admininfo['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	

	$message.= '<html><body>';
	
	$message.='<table width="100%" border="0">';
  
  $message.='<tr><td align="center"><h2>Welcome</h2></td></tr>';
  
  $message.='<tr><td><img src="http://elaxy.co.uk/images/logo.png"></td></tr>';
  
  
  $message.='<tr><td height="57"><strong> Hi '. $first_name.",".'</strong></td></tr>';
  $message.='<tr><td height="48">Thanks for creating a Elaxy account. In order to activate your account, please click on the link below so that we can be sure that this email address belongs to you:</td></tr>';
  
  $message.='<tr><td height="54"><a href="http://elaxy.co.uk/activate-user.php?id='.$to.'&key='.$u.'">Activate your account</a></td>
    </tr>';
  $message.='<tr>
    <td height="82">If the link does not work for some reason you can also confirm your email address by copying and pasting the following link into your web browser address bar:</td>
    </tr>';
  $message.='<tr><td height="73"><a href="http://elaxy.co.uk/activate-user.php?id='.$to.'&key='.$u.'">http://elaxy.co.uk/activate-user.php?id='.$to.'&key='.$u.'</a></td></tr>';
  $message.='<tr><td>Thanks</td></tr>';
  $message.='<tr><td height="72">Elaxy Team</td></tr>';
  $message.='<tr>
    <td height="72">P.S. If you no longer want a Elaxy account or if you believe that this message was sent by mistake, please ignore this email. We will leave you alone and not trouble you again!</td>
  </tr>';
$message.='</table>';
	$message .= "</body></html>";
	
	$mail_sent=mail($to, $subject, $message, $headers);
	
	if($mail_sent){
		header("location:register-confirmation.php?email=$email");
	}

?>