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

<div id="contant_area" style="width:99%">







			
      
      <?php
	  $select_message="SELECT  user_id,id,post_id,name,email,message,date_time,f_name FROM message WHERE email='".$session_email."' GROUP BY post_id";
	$run_message=mysql_query($select_message);
	$num_message=mysql_num_rows($run_message);
	
	  ?>
      
			<div id="tabs_area">
	<div id="header">
	<?php include("inc/manage-menu.php"); ?>
	</div>
	<div id="main">
		<div id="contents">

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
	 
	 
	while($fetch_message=mysql_fetch_array($run_message)){
	    $post_id=$fetch_message['post_id'];
	$u_id=$fetch_message['user_id'];
	 $message_id=$fetch_message['id'];
	
	 $f_name=$fetch_message['f_name'];
	 $message_date_time=$fetch_message['date_time'];
	 
	 
	 
	 
	  $select="SELECT id,postcode_loaction_id,name FROM ad_price WHERE postcode_loaction_id='".$post_id."' AND name='".$f_name."'";
	$run=mysql_query($select);
	while($fetch=mysql_fetch_array($run)){
		
		 $postcode_loaction_id=$fetch['postcode_loaction_id'];
		
		$select_title="SELECT id,postcode_loaction_id,title FROM ad_title_description WHERE postcode_loaction_id='".$postcode_loaction_id."'";
		$run_title=mysql_query($select_title);
		$fetch_title=mysql_fetch_array($run_title);
		$title=$fetch_title['title'];
		
		
		$select_user_date="SELECT id,date FROM registration WHERE id='".$user_id."'";
		$run_select_date=mysql_query($select_user_date);
		$fetch_user_date=mysql_fetch_array($run_select_date);
		$user_date=$fetch_user_date['date'];
		
		$now = new DateTime(date("h:i:s",time()));
$exp = new DateTime($message_date_time);
$diff = $now->diff($exp);


	?>
                
                	<li onclick="showUser(this.value='<?php echo $post_id; ?>')">
                    	<span class="thumb"><img src="images/img1.jpg" width="52" height="52" alt="img"></span>
                        <div class="details">
                        	<span><em></em> <a href="#"><?php echo $f_name; ?></a> <small>&bull; <?php printf('%d hours, %d minutes, %d seconds', $diff->h, $diff->i, $diff->s);
?> </small></span>
                            <div class="categ"><img src="images/folder-ico.gif"><?php echo $title; ?></div>
                        </div>
                    </li>
                    <?php } } ?>
                	                                                                                
                </ul>
            </div>
        </div>
    </div>
    <div class="Right">
    	<div class="head">
        	<h1>Your add title</h1>
        </div>
         
        <div id="txtHint"></div> 
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