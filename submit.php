<?php

	include("connection.php");
	

$f_name=base64_decode($_REQUEST['n']);	
$post_id=$_REQUEST['post_id'];

$user_id=base64_decode($_REQUEST['u']);
$return = $_REQUEST['re'];	
$name=($_REQUEST['name']);
$email=($_REQUEST['email']);
$phone=($_REQUEST['phone']);
$message=($_REQUEST['message']);
	
	 $time1=date("Y-m-d");
	 $time2=date("G:i:s");
	 $time=$time1." ".$time2;
	$select="SELECT user_id FROM postcode_location WHERE id='".$post_id."'";
	$run_select=mysql_query($select);
	$fetch_user=mysql_fetch_array($run_select);
	
	$parent_id=$fetch_user['user_id'];
	
	$sender_user="SELECT email FROM  registration WHERE id='".$parent_id."'";
	$run_user=mysql_query($sender_user);
	$fetch_sender=mysql_fetch_array($run_user);
	$sender_email=$fetch_sender['email'];
	
	
	

	 $insert="INSERT INTo message(post_id,user_id,name,email,message,f_name,date_time,phone,parent_id) VALUES('".$post_id."','".$user_id."','".$name."','".$email."','".$message."','".$f_name."','".$time."','".$phone."','".$parent_id."')";

$run=mysql_query($insert);


	$admininfo="support@elaxy.co.uk";
	
	$to =  $sender_email;
	$subject = 'Message on Elaxy Ad';
	//$headers = "From: ".$admininfo['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	

	$message.= '<html><body>';
	
	$message.='<table width="100%" border="0">';
  
  
  
  
  $message.='<tr><td height="57"><strong> Dear '.$f_name.',</strong></td></tr>';
  $message.='<tr><td height="48"><strong>Message has been sent to our Elaxy User on your Ad. </strong></td></tr>';
  $message.='<tr><td height="48"><strong>'.$message.'</strong></td></tr>';

  $message.='<tr><td>Regards,</td></tr>';
  $message.='<tr><td height="72">Elaxy Team</td></tr>';
  $message.='<tr>
    <td height="72">Support Team</td>
  </tr>';
  
  $message.='<tr>
    <td height="72"><img src="http://gravityweb.net/elaxy/images/logo.png"></td>
  </tr>';
$message.='</table>';
	$message .= "</body></html>";
	
	$mail_sent=mail($to, $subject, $message, $headers);

?>
<div style="color:#F00; font-weight:bold;"><?php echo "Thank You  your email has been sent successfully ! "; ?><a href="<?=$return?>">Return to Ad page</a></div>

  
