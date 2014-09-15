<?php

session_start();

	include("connection.php");

	

	include("include/login-security.php");

	

	

	/*echo "<pre>";

	print_r($_REQUEST);

	echo "<pre>";*/

	

	 // echo $email=$_SESSION['login_email_id'];

	

	

	 

	 if(isset($_REQUEST['submit'])){

		 

		 $post_id=$_REQUEST['post_id'];

		 $user_id=$_REQUEST['user_id'];

		 $parent_id=$_REQUEST['parent_id'];

		 $reply=$_REQUEST['reply'];

		 $page_name=$_REQUEST['page_name'];

		 

		 

		 

		 $select_parent_name="SELECT id,first_name,email FROM registration WHERE id='".$parent_id."'";

		 $run_parent_name=mysql_query($select_parent_name);

		 $fetch_parent_name=mysql_fetch_array($run_parent_name);

		 $name=$fetch_parent_name['first_name'];

		  $email=$fetch_parent_name['email'];  

		 

		 $cdate=date('Y-m-d');

	  $ctime=date("G:i:s");

	  

	  $current_time=$cdate." ".$ctime;

		 

		

			 

		 

			 

			 $insert="INSERT INTO message(post_id,user_id,name,email,message,date_time,parent_id) VALUES('".$post_id."','".$parent_id."','".$name."','".$email."','".$reply."','".$current_time."','".$user_id."')";

		

			 $run=mysql_query($insert);

			 

			 if($run){

				 

				 	if($page_name=="inbox.php"){

				 ?>

                 

                 

                 <script type="text/javascript">

<!--

window.location = "replies.php?menu_name=replies.php"

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

window.location = "replies.php?menu_name=replies.php"

//-->

</script> 

            

            <?php 

		 }

		 

		 

	





?>