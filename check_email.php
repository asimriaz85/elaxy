<?php
/*
	author: istockphp.com
*/
require_once("connection.php"); // require the db connection

/* catch the post data from ajax */

/*echo '<pre>';
print_r($_REQUEST);
echo '</pre>';

exit;*/

$first_name = $_POST['first_name']; 
$last_name = $_POST['last_name'];
$telephone_number=$_POST['telephone_number'];
$country=$_POST['country'];
$email = $_POST['email'];
$password=md5($_POST['password']);
$newsletter =$_POST['newsletter'];
$terms_condition=$_REQUEST['terms_condition'];
/*if($terms_condition=="true"){
	
	$terms_condition==1;
}*/

$status='0';
$u=uniqid();
$cDate=date("Y-m-d");

session_start();

$_SESSION['email']=$email;

$query = mysql_query("SELECT `email` FROM `registration` WHERE `email` = '$email'");
if(mysql_num_rows($query) == 1) { // if return 1, email exist.
	echo '1';
} if(mysql_num_rows($query) == 0) { // if return 1, email exist.
	
	
	/*$query = mysql_query("INSERT INTO `registration` (`first_name` ,`last_name`,`telephone_number` ,`email`,`password`,`newsletter`,`status`,`date`)
						VALUES ('$first_name', '$last_name',`$telephone_number`, '$email',`password`,`$newsletter`,`$status`,`$cDate`)");*/
						
						
						
						/*$insert="INSERT INTO registration(first_name,last_name,phone,country,email,password,newsletter,status,date)VALUES('".$first_name."','".$last_name."','".$telephone_number."','".$country."','".$email."','".$password."','".$newsletter."','".$status."','".$cDate."')";*/
						
						$insert="INSERT INTO registration(first_name,last_name,email,password,newsletter,status,date,terms_condition,country,phone)VALUES('".$first_name."','".$last_name."','".$email."','".$password."','".$newsletter."','".$status."','".$cDate."','".$terms_condition."','".$country."','".$telephone_number."')";
						
						$run=mysql_query($insert);
						
						
					$u=uniqid();
					
						
			
			
			$to =  $_POST['email'];
	$subject = 'Please Activate your New Elaxy Account';
	$headers = "From: Account  registration <no-reply@elaxy.co.uk>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	

	$message.= '<html><body>';
	
	$message.='<table width="100%" border="0">';
   $message.='<tr><td height="48"><img src="http://elaxy.co.uk/images/logo.png"></td></tr>';
  
  $message.='<tr><td height="48">To activate your account, click the link below. This will automatically activate your account and allow you to start posting whenever you wish.</td></tr>';
 
  
  $message.='<tr><td height="54"><a href="http://elaxy.co.uk/activate-user.php?id='.$to.'&key='.$u.'">Activate your account</a></td>
    </tr>';
  $message.='<tr>
    <td height="82">If you need any help, please Email us at support@elaxy.co.uk  with any questions you may have and we’ll get back to your as soon as possible, or visit our website at Elaxy.co.uk for information on our services.</td>
    </tr>';
 
  
  $message.='<tr><td>Thanks</td></tr>';
  $message.='<tr><td height="72">Elaxy Team</td></tr>';
  $message.='<tr>
   
    <td height="72" style="font-size:11px; border:1px solid #d6d6d6;">This email was sent to you by Elaxy.co.uk because you have subscribed  to our services as elaxy.ltd@gmail.com  on www.elaxy.co.uk. If you have any question or  would like more information, Please read  our  privacy policy and terms of business.Elaxy.co.uk Limited  is registered  in England  and Wales, with registration Number  03934849, Address: 66 Bromham  Road , Bedford, Bedfordshire ,United Kingdom, MK40 2QH.  © Copyright  2013  Elaxy.co.uk, All Rights Reserved. All designated brands and trademarks are the property of their individual owners. Elaxy.co.uk  and  its Logo are the trademarks of Elaxy.co.uk Limited.</td>
 
  </tr>';
$message.='</table>';
	$message .= "</body></html>";
	
	$mail_sent=mail($to, $subject, $message, $headers);
	
	
	
								
						
  }
?>