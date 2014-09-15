<!DOCTYPE html>
<html>
<head>
<?php require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
 <script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getmessages.php?q="+str,true);
xmlhttp.send();
}


		
</script>


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");

$post_id=$_REQUEST['post_id'];
	$title=$_REQUEST['t'];
?>




<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:100.1%">






<div id="tabs_area">
			
            <div id="header">
	<?php include("inc/manage-menu.php"); ?>
	</div>
		<div id="main">
		<div id="contents">	
			
      
      <?php
	 $select_message="SELECT id,post_id,user_id,name,email,message,date_time FROM message WHERE post_id='".$post_id."'";
	$run_message=mysql_query($select_message);
	$num_message=mysql_num_rows($run_message);
	
	  ?>
      
			<div id="linkedin">
				<div class="messageContainer">
  	<div class="Left">
    	<div class="head">
        	<h1>Messages</h1>
            <span><em>Inbox(<?php echo $num_message; ?>)</em> <a href="#">All</a> <a href="#" class="pull-right">Mark all as Read</a></span>
        </div>
        <div class="body1">
       	  <div class="search"><input type="text"> <input type="submit" value=""></div>
            <div class="inboxMessages">
            	<ul>
                <?php 
	 
	 
	 
	 $select_message2="SELECT DISTINCT user_id,date_time,parent_id FROM message WHERE post_id='".$post_id."' AND email!='".$session_email."'";
	$run_message2=mysql_query($select_message2);
	
	$fetch_message1=mysql_fetch_array($run_message2);
	 $sender_id=$fetch_message1['user_id'];
	 $date_time=$fetch_message1['date_time'];
	  $message_id=$fetch_message['id'];
	  
	  $f_name=$fetch_message['f_name'];
	 $message_date_time=$fetch_message['date_time'];
	
	$users="SELECT id,first_name,last_name FROM registration WHERE id='".$sender_id."'";
	$run_users=mysql_query($users);
	$fetch_users=mysql_fetch_array($run_users);
	$num_user=mysql_num_rows($run_users);
		
		$sender_name=$fetch_users['first_name'];
		
		
		/*$select_title="SELECT postcode_loaction_id,title FROM ad_title_description WHERE postcode_loaction_id='".$post_id."'";
		$run_title_name_message=mysql_query($select_title);
		$fetch_title_msg=mysql_fetch_array($run_title_name);
		$title_name_msg=$fetch_title_msg['title'];*/
		
		$now = new DateTime(date("h:i:s",time()));
$exp = new DateTime($date_time);
$diff = $now->diff($exp);

if($num_user!=0){
	
	?>
                
                	<li onclick="showUser(this.value='<?php echo $post_id."-".$sender_id."-".$user_id; ?>')">
                    	<!--<span class="thumb"><img src="images/img1.jpg" width="52" height="52" alt="img"></span>-->
                        <div class="details">
                        	<span><em></em> <a href="#"><?php echo $sender_name; ?></a> <small>&bull; <?php printf('%d hours, %d minutes, %d seconds', $diff->h, $diff->i, $diff->s);
?>  </small></span>
                            <div class="categ"><img src="images/folder-ico.gif"><?php echo $title_name_msg; ?></div>
                        </div>
                    </li>
                    <?php  } ?>
                	                                                                                
                </ul>
            </div>
        </div>
    </div>
    <div class="Right">
    	
         
        <div id="txtHint">
        <div class="head">
        	<h1>Your add title</h1>
        </div>
        
        </div> 
    </div>
  </div>
			</div>
			
		</div>
		</div>
</div>




</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>