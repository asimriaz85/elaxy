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
	//$headers = "From: ".$admininfo['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	

	$message.= '<html><body>';
	
	$message.='<table width="100%" border="0">';
  
  
  $message.='<tr><td height="48">Now that you’ve filled out our registration form, created your Elaxy account and subscribed to our services, you need to activate your account so that you can get posting as soon as possible. We need to ensure that the email address you’ve provided us with in your registration form is correct so that we can contact you, should we need to, and so that you can log in to your account safely and quickly.</td></tr>';
 
  
  $message.='<tr><td height="54"><a href="http://elaxy.co.uk/activate-user.php?id='.$to.'&key='.$u.'">Activate your account</a></td>
    </tr>';
  $message.='<tr>
    <td height="82">Alternatively, simply copy and paste the following link in your address bar, click ‘go’ or press enter, and activate your account this way.</td>
    </tr>';
  $message.='<tr><td height="73"><a href="http://elaxy.co.uk/activate-user.php?id='.$to.'&key='.$u.'">http://elaxy.co.uk/activate-user.php?id='.$to.'&key='.$u.'</a></td></tr>';
  
  $message.='<tr><td>If you need any help, please Email us at support@elaxy.co.uk  with any questions you may have and we’ll get back to your as soon as possible, or visit our website at Elaxy.co.uk for information on our services.</td></tr>';
  
  $message.='<tr><td>Thanks</td></tr>';
  $message.='<tr><td height="72">Elaxy Team</td></tr>';
  $message.='<tr>
   
    <td height="72"><img src="http://elaxy.co.uk/images/logo.png"></td>
 
  </tr>';
$message.='</table>';
	$message .= "</body></html>";
	
	$mail_sent=mail($to, $subject, $message, $headers);
	
	
	
								
						
  }
?>