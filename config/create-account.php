<?php
ob_start();
include("../connection.php");

/*echo '<pre>';
print_r($_REQUEST);
echo '</pre>';

exit;*/

if(isset($_REQUEST['submit'])){
	
	
	
	 $first_name=$_REQUEST['first_name'];
	 $last_name=$_REQUEST['last_name'];
	$telephone_number=$_REQUEST['telephone_number'];
	$email=$_REQUEST['email'];
	 $password=md5($_REQUEST['password']);
	$newsletter=$_REQUEST['newsletter'];
	$status='0';
	 $u=uniqid();
	$cDate=date("Y-m-d");
	
if(!empty($first_name)&& !empty($last_name)&&!empty($telephone_number)&&!empty($email)&&!empty($password)){
	
		
	
		  $insert="INSERT INTO registration(first_name,last_name,phone,email,password,newsletter,status,date)VALUES('".$first_name."','".$last_name."','".$telephone_number."','".$email."','".$password."','".$newsletter."','".$status."','".$cDate."')";
		
		$run=mysql_query($insert);
		
		if($run){
			
			$word1="doesn";
			$word2="'";
			$word3="t";
			$word=$word1.$word2.$word3;
			$to =  $email;
	$subject = 'Please active your new Elaxy account';
	//$headers = "From: ".$admininfo['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	
	$message.='<table width="100%" border="0">
  
  <tr>
    <td height="48"> <p>Now that you’ve filled out our registration form, created your Elaxy account and subscribed to our services, you need to activate your account so that you can get posting as soon as possible. We need to ensure that the email address you’ve provided us with in your registration form is correct so that we can contact you, should we need to, and so that you can log in to your account safely and quickly.</p></td>
    </tr>
  <tr>
  <tr>
  
    <td height="54"><a href="http://gravityweb.net/elaxy/activate-user.php?id=$email;&key=echo $uid;">Activate your account</a></td>
    </tr>
	
   <tr>
    <td height="48"> <p>Alternatively, simply copy and paste the following link in your address bar, click ‘go’ or press enter, and activate your account this way.</p></td>
    </tr>
  
  
  <tr>
    <td height="73"><a href="http://gravityweb.net/elaxy/activate-user.php?id=$email;&key=echo $uid;">http://gravityweb.net/elaxy/activate-user.php?id=echo $email;&amp;key=echo $uid;</a></td>
    </tr>
	
	
	<tr>
    <td height="82">If you need any help, please Email us at support@elaxy.co.uk  with any questions you may have and we’ll get back to your as soon as possible, or visit our website at Elaxy.co.uk for information on our services.</td>
    </tr>
	
  <tr>
    <td> 	

Thanks</td>
  </tr>
  <tr>
    <td height="72"> 	
      
    The Elaxy Team</td>
  </tr>
  <tr>
    <td height="72"><img src="http://gravityweb.net/elaxy/images/logo.png"></td>
  </tr>
</table>';
	$message .= "</body></html>";
	
	$mail_sent=mail($to, $subject, $message, $headers);
	
	if($mail_sent){
		
		header("location:../register-confirmation.php");
	}
			
		}
		
	
		}
}

?>