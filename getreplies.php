<?php

session_start();

	include("connection.php");

	include("inc/login-security.php");

	

	    $post_id01=$_REQUEST['q']; 

	   

	   $pieces = explode("-", $post_id01);

 $post_id=$pieces[0]; // piece1

  $user_id=$pieces[1]; // piece2

 $parent_id=$pieces[2]; // piece3

	 

	  $session_email001=$_SESSION['login_email_id'];

	  

	  $cdate=date('Y-m-d');

	  $ctime=date("G:i:s");

	  

	  $current_time=$cdate." ".$ctime;

	  

	  $select_title="SELECT title FROM ad_title_description WHERE postcode_loaction_id='".$post_id."'";

	  $run_title=mysql_query($select_title);

	  $fetch_title=mysql_fetch_array($run_title);

	  $title=$fetch_title['title'];

	  

	

?>

<div class="head">

        	<h1><?php echo $title; ?></h1>

        </div>

<div class="body">

<?php

	

		 $select_replies="SELECT id,post_id,user_id,name,email,message,date_time,parent_id FROM message WHERE  parent_id IN('".$parent_id."','".$user_id."')AND post_id='".$post_id."'  ORDER BY id";

		$run_replies=mysql_query($select_replies);

		while($fetch_replies=mysql_fetch_array($run_replies)){

			

			$replies_msg=$fetch_replies['message'];

			$replies_date_time=$fetch_replies['date_time'];

			

			

			 $reply_email=$fetch_replies['email'];

			 $user_id=$fetch_replies['user_id'];

			 

			  $user_id_name="SELECT id,first_name  FROM  registration WHERE id='".$user_id."'" or die(mysql_error());

			 $run_user_id=mysql_query($user_id_name);

			 $fecth_user_name=mysql_fetch_array($run_user_id);

			 $first_name_user=$fecth_user_name['first_name'];

			

	

		 if($reply_email==$session_email001){ $class="myMessage"; }

		 

		 if($reply_email!=$session_email001){ $class="replyMessage"; } 

		 

		 

		 //$now = new DateTime(); // current date/time

$now = new DateTime("$current_time");

$ref = new DateTime("$replies_date_time");

$diff = $now->diff($ref);



		 

		 

		 

?>





<div class="<?php echo $class; ?>">

            	<a href="#"><?php echo $first_name_user; ?> <small><?php printf('%d days, %d hours, %d minutes', $diff->d, $diff->h, $diff->i); ?></small></a>

                <p><?php echo $replies_msg; ?></p>

            </div>







        <?php

		

	}



?>

</div>

<div class="replyBox">

<form method="post" name="form1" action="getreply_reply.php">



    

    

        	<textarea name="reply"></textarea>

            <input type="hidden" name="page_name" value="replies.php">

            <input type="submit" class="button" value="Reply" name="submit">
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
            <input type="hidden" name="parent_id" value="<?php echo $parent_id; ?>" />

            </form>

        </div>



