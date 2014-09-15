<?php 
ob_start();
include('include/header.php');
?>


	

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				<div class="page-title ui-widget-content ui-corner-all">
					<h1> Email</h1>
					<div class="other">

					  <form action="" method="post" enctype="multipart/form-data" class="forms" name="form" >
                        <?php if(isset($error)) {?>  <div class="response-msg error ui-corner-all" style="height:20px;"><?php echo $error;?> </div><?php } ?>
        
        <?php if(isset($msg)){?><div class="response-msg success ui-corner-all"><?php echo $msg;  ?></div><?php } ?>
        
        				<h1>&nbsp;</h1>
    <h1>Email</h1>
                        
                       
                        
									<div class="divmar">
									
                                    
<?php

$select_newsletter="SELECT * FROM newsletter";
$run_newsletter=mysql_query($select_newsletter);
$fetch_news_letter=mysql_fetch_array($run_newsletter);
$subject01=$fetch_news_letter['subject'];
 $editor1 =$fetch_news_letter['editor1'];

$select_email="SELECT * FROM registration WHERE newsletter=1 AND status=1";
$run_email=mysql_query($select_email);
while($fetch_email=mysql_fetch_array($run_email)){
	
	
	
	
	
	$to_email=$fetch_email['email'];

                    $to=$to_email;
            $subject =$subject01;
     
            /*$headers = 'From: example@gmail.com' . "\r\n" .
            'Reply-To: example@gmail.com' . "\r\n" .
            "X-Mailer: PHP/" . phpversion()."\r\n";
     
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
     
            $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
     
            $message .=$editor1;
     
    
    $sent=mail($to, $subject, $message, $headers);*/
	
	
	//$headers = "From: ".$admininfo['email']." \r\n";
	
	$headers = 'From: support@elaxy.co.uk' . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	//$mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
	$message = $editor1;
	
	
	
	$mail_sent=mail($to, $subject, $message, $headers);
	
	
}

		if($mail_sent){
			echo "Newsletter Email to all Subscribers";
		}
?>
                                    
                                    
                                    </div>
                                    
                                    
                                    

					  </form>
						<div class="clearfix"></div>
					</div>
					

				</div>
				

			</div>
			<div class="clearfix"></div>
		</div>
<?php include('include/sidebar.php'); ?>

	</div>
	<div class="clearfix"></div>
<?php include('include/footer.php'); ?>
</body>
</html>