<?php
session_start();
	include("connection.php");
	
	include("include/login-security.php");
	
	 $email=$_SESSION['login_email_id'];
	
	
	 
	 if(isset($_REQUEST['submit'])){
		 
		  $message_id=$_REQUEST['message_id']; 
		 //$user_id=$_REQUEST['user_id'];
		 $reply=$_REQUEST['reply'];
		 $post_id=$_REQUEST['post_id'];
		  $page_name=$_REQUEST['page_name'];
		  $f_name=$_REQUEST['f_name'];
		 
		  $select_email="SELECT id,email,first_name FROM registration WHERE email='".$email."'";
		 $run_email=mysql_query($select_email);
		 $fetch_email=mysql_fetch_array($run_email);
		 
		 $name=$fetch_email['first_name'];
		 $user_id=$fetch_email['id'];
		 
		 $cdate=date("Y-m-d");
		 
		 if(!empty($reply)){
			 
		 
			 
			 $insert="INSERT INTO message(post_id,user_id,name,email,message,date_time,parent_id,f_name) VALUES('".$post_id."','".$user_id."','".$name."','".$email."','".$reply."','".$cdate."','".$message_id."','".$f_name."')";
			 
			 $run=mysql_query($insert);
			 
			 if($run){
				 
				 	if($page_name=="inbox.php"){
				 ?>
                 
                 
                 <script type="text/javascript">
<!--
window.location = "inbox.php?post_id=<?php echo $post_id; ?>"
//-->
</script>
                 <?php
				 
					}
					
					if($page_name=="replies.php"){
				 ?>
                 
                 
                 <script type="text/javascript">
<!--
window.location = "replies.php"
//-->
</script>
                 <?php
				 
					}
					
					
			 }
			 
		 } else{
			?>
           <script type="text/javascript">
<!--
window.location = "inbox.php?post_id=<?php echo $post_id; ?>"
//-->
</script> 
            
            <?php 
		 }
		 
		 
	 }
	


?>