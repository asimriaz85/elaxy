<?php
session_start();
	include("connection.php");
	include("inc/login-security.php");
	
	   $post_id01=$_REQUEST['q']; 
	 
	 
	 
	  $session_email001=$_SESSION['login_email_id'];
	
?>
<div class="body">
<?php
	
		 $select_replies="SELECT id,post_id,user_id,name,email,message,date_time FROM message WHERE post_id='".$post_id01."' ORDER BY id";
		$run_replies=mysql_query($select_replies);
		while($fetch_replies=mysql_fetch_array($run_replies)){
			
			$replies_msg=$fetch_replies['message'];
			$replies_date_time=$fetch_replies['date_time'];
			
			 $reply_email=$fetch_replies['email'];
			 $user_id=$fetch_replies['user_id'];
			 
			  $user_id_name="SELECT first_name  FROM  registration WHERE id='".$user_id."'" or die(mysql_error());
			 $run_user_id=mysql_query($user_id_name);
			 $fecth_user_name=mysql_fetch_array($run_user_id);
			 $first_name_user=$fecth_user_name['first_name'];
			
	
		 if($reply_email==$session_email001){ $class="myMessage"; }
		 
		 if($reply_email!=$session_email001){ $class="replyMessage"; } 
		 
		 
		 
		 
		 
?>


<div class="<?php echo $class; ?>">
            	<a href="#"><?php echo $first_name_user; ?> <small><?php echo $replies_date_time; ?></small></a>
                <p><?php echo $replies_msg; ?></p>
            </div>



        <?php
		
	}

?>
</div>
<div class="replyBox">
<form method="post" name="form1" action="getreply.php?f_name=<?php echo $f_name; ?>">
<input type="hidden" name="message_id" value="<?php echo $message_id; ?>">
    <!--<input type="hidden" name="user_id" value="<?php //echo $q; ?>">-->
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    
        	<textarea name="reply"></textarea>
            <input type="hidden" name="page_name" value="replies.php">
            <input type="submit" class="button" value="Reply" name="submit">
            </form>
        </div>

