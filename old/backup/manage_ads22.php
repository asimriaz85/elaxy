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

////My Details///
if(isset($_REQUEST['update_my_details'])){
		
		
		
		$up_first_name=$_REQUEST['update_first_name'];
		$up_last_name=$_REQUEST['update_last_name'];
		$up_contact_number=$_REQUEST['update_contact_number'];
		$up_newsletter=$_REQUEST['update_newsletter'];
		
		if(!empty($up_first_name)&&!empty($up_last_name)&&!empty($up_contact_number)){
			
			 $update="UPDATE  registration SET first_name='$up_first_name',last_name='$up_last_name',phone='$up_contact_number',newsletter='$up_newsletter' WHERE email='$session_email'";
			$run=mysql_query($update);
			if($run){
				
				
				$error="Thanks - your details have now been updated";
				
			}
		}
		
		
	}
	
	$select_details="SELECT id,first_name,last_name,phone FROM registration WHERE email='".$session_email."'";
	$run_detail=mysql_query($select_details);
	$fetch_detail=mysql_fetch_array($run_detail);
	$first_name=$fetch_detail['first_name'];
	$last_name=$fetch_detail['last_name'];
	$contact_no=$fetch_detail['phone'];
	
	

///End///


///Manage////
$tbl_name="postcode_location";	

/* Get data. */
	 $sql = "SELECT *
FROM postcode_location
INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id  INNER JOIN ad_price ON ad_price.postcode_loaction_id=postcode_location.id AND postcode_location.user_id='".$user_id."'";	

$result = mysql_query($sql);
	
	$num_rows_views=mysql_num_rows($result);

 ?>


<section class="main-wrapper">
<?php require_once('inc/top_ads.php'); ?>



<div class="clear"></div>


<?php require_once('inc/search_bar.php'); ?>


<div class="clear"></div>

<div id="contant_area" style="width:99%">






<div id="simpaleTabs">
			<ul>
				<li><a href="#manage_ads">Manage my ads</a>
                </li>
				<li><a href="#twitter">My Details</a></li>
				<li><a href="#linkedin">Replies</a></li>
				
			</ul>
			<div id="manage_ads">
            
            <?php
			if($num_rows_views >0){
			?>
            
                  <table width="955" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th width="48"></th>
            <th width="101">Picture</th>
            <th width="117">Title</th>
            <th width="176">Description</th>
            <th width="134">Date Published</th>
            <th width="82">Status</th>
            <th width="80">Views</th>
             <th width="83">Replies</th>
              <th width="109">Options</th>
        </tr>
    </thead>

    <tbody>
    <?php
	$count=1;
		while($row = mysql_fetch_array($result))
		{
			
			    $add_id=$row['id'];
			   
			  
			   
  $publish_date=$row['date'];
  
  $status=$row['status'];
	
	
		
		




$title=$row['title'];
$description=$row['description'];

	
		
		
		 $ad_price_name=$row['name'];
		 $ad_price_days=$row['days'];
		
		$end_date=  date('Y-m-d', strtotime($publish_date. ' +'. $ad_price_days. 'day'));
		
		$cdate=date('Y-m-d');
		
		 $select_post_id="SELECT id,postcode_loaction_id FROM ad_price WHERE id='".$add_id."'";
		$run_postcode_id=mysql_query($select_post_id);
		$fetch_postcode_id=mysql_fetch_array($run_postcode_id);
		  $postcode_id=$fetch_postcode_id['postcode_loaction_id'];
		
		 $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$postcode_id."'  ";
			$run_image_query=mysql_query($select_image_query);
			
			$fetch_image_query=mysql_fetch_array($run_image_query);
			 $image_name=$fetch_image_query['file_name'];
		
		if($count%2==0){ $even_odd='pure-table-odd'; }
		if($count%2!=0){ $even_odd=''; }
		

?>
        <tr class="<?php echo $even_odd; ?>"  >
            <td><input name="" type="checkbox" value=""></td>
            <td><img src="uploads/<?php echo $image_name; ?>" width="75" height="75" /></td>
            <td><?php echo $title; ?></td>
            <td><?php echo substr($description, 0, 70)."....."; ?></td>
             <td><?php echo $publish_date; ?></td>
            <td><?php if($status==1){ echo "Active"; } if($status==0){ echo "Inactive"; } ?></td>
             <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><a href="update-ads.php?id=<?php echo $add_id; ?>">Update</a>&nbsp;|&nbsp;<a href="config/delete-ads.php?id=<?php echo $id2; ?>&page_name=<?php echo $page_name; ?>">Delete</a>&nbsp;|&nbsp;Improve</td>
        </tr>
        
         
        
         
        <?php $count++; } ?>
         

      
    </tbody>
</table>
<?php } ?>
                			</div>
			<div id="twitter">
            <form method="post" action="">
				<table width="955" class="pure-table pure-table-bordered">
  <tr>
    <td width="12%" height="36">First Name</td>
    <td width="88%"><input type="text" name="update_first_name" id="ValidField" value="<?php echo $first_name; ?>" /></td>
  </tr>
  <tr>
    <td height="38">Last Name</td>
    <td><input type="text" name="update_last_name" id="ValidField2" value="<?php echo $last_name; ?>" /></td>
  </tr>
  <tr>
    <td height="36">Contract No</td>
    <td><input type="text" name="update_contact_number" id="ValidNumber" value="<?php echo $contact_no; ?>" /></td>
  </tr>
  <tr>
    <td height="28" colspan="2"><input type="checkbox" name="update_newsletter" value="1" checked>&nbsp;I would like to receive news, offers and promotions from Elaxy</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="update_my_details" value="Update my details"></td>
  </tr>
</table>
</form>
	  </div>
      
      <?php
	  $select_message="SELECT  user_id,id,post_id,name,email,message,date_time,f_name FROM message WHERE email='".$session_email."' GROUP BY post_id";
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
		<script type="text/javascript">
			$(function() {
				$('#simpaleTabs').tabs();
			});
		</script>





</div>


</section>
<div class="clear"></div>

<?php require_once('inc/footer.php'); ?>


</body>
</html>