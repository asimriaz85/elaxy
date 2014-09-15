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
//$telephone_number=$_POST['telephone_number'];
//$country=$_POST['country'];
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
						
						$insert="INSERT INTO registration(first_name,last_name,email,password,newsletter,status,date,terms_condition)VALUES('".$first_name."','".$last_name."','".$email."','".$password."','".$newsletter."','".$status."','".$cDate."','".$terms_condition."')";
						
						$run=mysql_query($insert);
						
						
					$u=uniqid();
					
						
			
			
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
	
	
	
								
						
  }
?>