<?php
ob_start();

session_start();

 $_SESSION['login_email_id'];
 
 /*echo '<pre>';
 print_r($_REQUEST);
 echo '</pre>';*/

  $u1=$_REQUEST['u'];
 $sub_cat_id=$_REQUEST['sub_cat_id'];
 $feature=$_REQUEST['feature'];
 $f_id=$_REQUEST['f_id'];
 
 $u=$u1."&sub_cat_id=".$sub_cat_id."&feature=".$feature."&f_id=".$f_id
 
 
?>
<script type="text/javascript">
	function closeME() {
    parent.$.fancybox.close();
	}
</script>
<?php

if (@$_POST['Send']=="Send")
{
$name=$_POST['name'];
$email=$_POST['email'];





$admininfo="support@elaxy.co.uk";
	
	//$admininfo="faisalwebprogrammer@gmail.com";
	
	$to =  $email;
	$subject = 'Elaxy ad has been shared by your friend ' .$_SESSION['first_name']. '';
	$headers = "From: ".$admininfo." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message.='<table width="100%" border="0">
	
	
	<tr>
    <td><img src="http://gravityweb.net/elaxy/images/logo.png"></td>
    
  </tr>
	
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
  
  
</table>';
	$message .= "</body></html>";
	$send=mail($to, $subject, $message, $headers);
	
	if($send){
		
		$msg="email has been sent to $email";
	}
	
	}


?>



<form action="" method="post">
<?php if(isset($msg)){ echo $msg;  ?>&nbsp;&nbsp;<a href="#" onclick="closeME();">Close</a><?php } ?><br><br>
Your Name : <br />
<input name="name" type="text" value="<?php echo $_SESSION['first_name']; ?>" readonly><br /><br />
Friend's Email Address : <br />
<input name="email" type="text"><br /><br />
<input name="Send" type="submit" value="Send">
</form>


