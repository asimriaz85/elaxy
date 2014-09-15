$to =  $row['email'];
	$subject = 'Request for Loan';
	$headers = "From: ".$admininfo['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message.='<table width="100%" border="0">
  <tr>
    <td colspan="2">Dear '.$row['fname']." ".$row['surname'].'<br> You apply for the loan..Your request for loan is send to admin for approvel. <br>Your application detail is as follow. </td>
  </tr>
  <tr>
    <td><strong>Loan Amount </strong></td>
    <td>&pound;'.$amount.'</td>
  </tr>
  <tr>
    <td><strong>Time Period</strong> </td>
    <td>'.$period.' Days</td>
  </tr>
  <tr>
    <td><strong>Repayment Date</strong> </td>
    <td>'.$date.'</td>
  </tr>
  <tr>
    <td><strong>Borrowing</strong></td>
    <td>&pound;'.$selectedAmount.'</td>
  </tr>
  <tr>
    <td><strong>Intrest &amp; Fees</strong> </td>
    <td>&pound;'.$interestAmount.'</td>
  </tr>
  <tr>
    <td><strong>Total to Repay</strong> </td>
    <td>&pound;'.$totalAmount.'</td>
  </tr>
  <tr>
    <td colspan="2">We will contact you within one business day.<br>Thank you<br>QuickBuddy Team<br>
www.Quickbuddy.co.uk
 </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>';
	$message .= "</body></html>";
	$send1=mail($to, $subject, $message, $headers);