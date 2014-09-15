<?php session_start();
  include('lib/db_setting.php');
  include('lib/db.class.php');
 include('lib/ads_title.class.php');

?>
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
xmlhttp.open("GET","getreplies.php?q="+str,true);
xmlhttp.send();
}


		
</script>


</head>

<body>
<?php require_once('inc/header.php');

include("inc/login-security.php");





 ?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:100.1%">







			
      
      <?php
	   $select_message="SELECT DISTINCT(parent_id), user_id,id,post_id,name,email,message,date_time,f_name FROM message WHERE parent_id='".$user_id."'";
	$run_message=mysql_query($select_message);
	$num_message=mysql_num_rows($run_message);
	$fetch_message=mysql_fetch_array($run_message);
	  ?>
      
			<div id="tabs_area">
	<div id="header">
	<?php include("inc/manage-menu.php"); ?>
	</div>
	<div id="main" style="height:488px;">
		<div id="contents">

				<div class="messageContainer">
  	<div class="Left">
    	<div class="head">
        	<h1>Messages</h1>
            <span><em>Inbox(<?php echo $num_message; ?>)</em> <!--<a href="#">All</a> <a href="#" class="pull-right">Mark all as Read</a>--></span>
        </div>
        <div class="body1">
       	  <div class="search"><input type="text"> <input type="submit" value=""></div>
            <div class="inboxMessages">
            	<ul>
                <?php 
	  do{
	 
	
	    $post_id=$fetch_message['post_id'];
		
		$adname=Ads_title_class::find_by_postid($post_id);
		
		
		
	 $sender_id=$fetch_message['user_id'];
	 $u_name=$fetch_message['name'];
	 $message_id=$fetch_message['id'];
	
	 $f_name=$fetch_message['f_name'];
	 $message_date_time=$fetch_message['date_time'];
	 
	 $select_sender="SELECT id,first_name FROM registration WHERE id='".$sender_id."'";
	 $run_sender=mysql_query($select_sender);
	 $fetch_sender=mysql_fetch_array($run_sender);
	 $sender_name=$fetch_sender['first_name'];
	
	 ?>
     <li onclick="showUser(this.value='<?php echo $post_id."-".$sender_id."-".$user_id; ?>')">
                    	<!--<span class="thumb"><img src="images/img1.jpg" width="52" height="52" alt="img"></span>-->
                        <div class="details">
                        	<span><em></em> <a href="#"><?php echo $u_name; ?></a> <small>&bull; <?php //printf('%d hours, %d minutes, %d seconds', $diff->h, $diff->i, $diff->s);
?> </small></span>
                            <div class="categ"><img src="images/folder-ico.gif"><?php echo $adname->title; ?></div>
                            
                        </div>
                        
                        <div><?php echo $user_f_name; ?></div>
                    </li>
                    <?php  }while($fetch_message=mysql_fetch_array($run_message)); ?>
                	                                                                                
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
		



</div></div>

</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>