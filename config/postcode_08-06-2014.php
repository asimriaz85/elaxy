<?php
ob_start();
include("../connection.php");

	session_start();
	include("../inc/login-security.php");
	
	/* echo '<pre>';
	print_r($_REQUEST);
	echo '</pre>'; 
	
	exit;*/
	
	
	/*echo '<pre>';
	print_r($_SESSION);
	echo '</pre>'; 
	
	exit;*/
	
	
	
	
	
	$date_available1=$_REQUEST['date_available'];
	$pieces = explode("/", $date_available1);
$month01= $pieces[0]; // piece1
$date01=$pieces[1]; // piece2
$year01= $pieces[2]; // piece3

		
			 $date_available=$year01."-".$month01."-".$date01;


	
	//$rent_price=$_REQUEST['rent_price'];
	
	$property_type=$_REQUEST['property_type'];
	$rent_period=$_REQUEST['rent_period'];
	$no_rooms=$_REQUEST['no_rooms'];
	$acting_agent=$_REQUEST['acting_agent'];
	 
	$login_email_id=$_SESSION['login_email_id'];
	
	 $session_first_name=$_SESSION['first_name']; 
	
	$select_user_id="SELECT id FROM registration WHERE email='".$login_email_id."'";
	$run_user_id=mysql_query($select_user_id);
	$fetch_user_id=mysql_fetch_array($run_user_id);
	$user_id=$fetch_user_id['id'];
	
	
	
	$main_cat=$_REQUEST['main_cat'];
	 $sub_cat_id=$_REQUEST['sub_cat_id']; 
	$sub_sub_cat=$_REQUEST['sub_sub_cat']; 
	$sub_cat_child_child=$_REQUEST['sub_cat_child_child'];
	$sub_cat_child_child_child=$_REQUEST['sub_cat_child_child_child'];
	$postcode=$_REQUEST['postcode'];
	$companyname=$_REQUEST['companyname'];
	/*$house_name=$_REQUEST['house_name'];
	$address1=$_REQUEST['address1'];
	$address2=$_REQUEST['address2'];
	$address3=$_REQUEST['address3'];*/
	$town=$_REQUEST['town'];
	/*$county=$_REQUEST['county'];
	$udprn=$_REQUEST['udprn'];*/
	$mape=$_REQUEST['mape'];
	
		$title=$_REQUEST['title'];
	
	 $description=mysql_real_escape_string($_REQUEST['description']);  
	
	
	$link_website=$_REQUEST['link_website'];
	$link_website_price=$_REQUEST['link_website'];
	$link_site=$_REQUEST['link_site'];
	$youtube_link=$_REQUEST['youtube_link'];
	
	 $selectall=$_REQUEST['list'];
	
	$via_email=$_REQUEST['via_email'];
		$via_phone=$_REQUEST['via_phone'];
	
	$cdate=date('Y-m-d');
	
	$featured_p=$_REQUEST['featured_p'];
	
	$price=$_REQUEST['price'];
	
	$make=$_REQUEST['make'];
	$year=$_REQUEST['year'];
	$model=$_REQUEST['model'];
	$fuel_type=$_REQUEST['fuel_type'];
	$body_type=$_REQUEST['body_type'];
	$transmission=$_REQUEST['transmission'];
	$colour=$_REQUEST['colour'];
	$engine_size=$_REQUEST['engine_size'];
	$mileage=$_REQUEST['mileage'];
	$dealer=$_REQUEST['dealer'];
	
	
	///Job Entities//
	$jobcontract=$_REQUEST['jobcontract'];
	///End//
	
	
	///Session check////
	
	if(isset($session_email)){
		
		$select_user="SELECT * FROM registration WHERE email='".$login_email_id."'";
		$run_email=mysql_query($select_user);
		$fetch_status=mysql_fetch_array($run_email);
		$ustatus=$fetch['status'];
		$uemail=$fetch['email'];
		
		if(isset($session_email)){
		
		 $select_user="SELECT * FROM registration WHERE email='".$session_email."'";
		$run_email=mysql_query($select_user);
		$fetch_status=mysql_fetch_array($run_email);
		  $ustatus=$fetch_status['status'];
		$uemail=$fetch_status['email'];
		
		if($ustatus==0){
			
			session_start();
			$error="You are blocked by admin please contact with admin";
			$_session['error']=$error;
			?>
            <script type="text/javascript">
<!--
window.location = "login.php?error=<?php echo $error; ?>"
//-->
</script>
            <?php
			//header("location:login.php");
		}
		
		if($uemail!=$session_email){
			
			session_start();
			$error="Invalid User Name or Password";
			$_session['error']=$error;
			
			header("location:login.php");
		}
	}
	}
	////End///
	
	
	
	
	
	$select_cat_name="SELECT id,name,parent_off FROM categories WHERE id='".$sub_cat_id."'";
	$run_cat_name=mysql_query($select_cat_name);
	$fetch_cat_name=mysql_fetch_array($run_cat_name);
	
	  $cat_name=$fetch_cat_name['name']; 
	 $cat_id=$fetch_cat_name['parent_off'];
	 
	 $catchild_id="SELECT id,name FROM categories WHERE id='".$cat_id."'";
	 $run_child_id=mysql_query($catchild_id);
	 $fetch_child_id=mysql_fetch_array($run_child_id);
	 $parent_name=$fetch_child_id['name'];
	 
	 
	
	
	
	$insert1="INSERT INTO postcode_location(user_id,main_cat_id,sub_cat_id,sub_sub_cat,sub_cat_child_child,sub_cat_child_child_child,postcode,companyname,house_name,town,map,date,item_price)VALUES('".$user_id."','".$main_cat."','".$sub_cat_id."','".$sub_sub_cat."','".$sub_cat_child_child_child."','".$sub_cat_child_child_child."','".$postcode."','".$companyname."','".$house_name."','".$town."','".$mape."','".$cdate."','".$price."')";
	
	$run_insert1=mysql_query($insert1);
	
	
	
	$query = "SELECT MAX(id) FROM postcode_location"; 
	 
$result = mysql_query($query) or die(mysql_error());

$row = mysql_fetch_array($result);
 $max_id=$row['MAX(id)'];


  function string_limit_words($string, $word_limit) {
   $words = explode(' ', $string);
   return implode(' ', array_slice($words, 0, $word_limit));
}

$utitle=mysql_real_escape_string($title);

$utitle=htmlentities($utitle);

$date=date("Y/m/d");

$newtitle=string_limit_words($utitle, 6);
$urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);

$newurltitle=str_replace(" ","-",$newtitle);
$url=$newurltitle;


	 $insert2="INSERT INTO ad_title_description(postcode_loaction_id,title,description,url)VALUES('".$max_id."','".$title."','".$description."','".$url."')";
	
	$run_insert2=mysql_query($insert2);
	
	
	if(!empty($link_website)){
	
	$insert3="INSERT INTO your_web_link(postcode_loaction_id,link_site,price)VALUES('".$max_id."','".$link_site."','".$link_website_price."')";
	
	$run_insert3=mysql_query($insert3);
	
	}
	
	if(!empty($youtube_link)){
	
	$insert_youtube="INSERT INTO youtube_link(postcode_loaction_id,youtube_link)VALUES('".$max_id."','".$youtube_link."')";
	
	$run_youtube=mysql_query($insert_youtube);
	
	}
	
	if(!empty($selectall)){
	
	$num= sizeof($selectall);
	for($i=0; $i<$num; $i++){
		   $element=$selectall[$i]; 
		  
		   $element2= str_replace("featured",$featured_p,$element);
		  
		  
		  $pieces = explode("_", $element2);
   $select_name= $pieces[0]; // piece1
  $select_price= $pieces[1]; // piece2
		 $select_days= $pieces[2]; 
		  
		  
		
		  
		  
		  
		 $insert4="INSERT INTO ad_price(postcode_loaction_id,name,price,days)VALUES('".$max_id."','".$select_name."','".$select_price."','".$select_days."')";
		 
		
		 
		 
		 $run_insert4=mysql_query($insert4);
		 
		 $msg="Your ad has been posted Successfully";
		 
	}
		}
		if(empty($selectall)){
			
			
$date1 = strtotime(date("Y-m-d", strtotime($cdate)) . " +1 month");
 $onemonth = date("Y-m-d",$date1);


$days = (strtotime($onemonth) - strtotime($cdate)) / (60 * 60 * 24);
 
	
		$free="Free Ad";	
			
			$insert6="INSERT INTO ad_price(postcode_loaction_id,name,price,days)VALUES('".$max_id."','".$free."','0','".$days."')";
			
			$run6=mysql_query($insert6);
			
			$msg="Your ad has been posted Successfully";
			
		}
		
	
	
	$insert5="INSERT INTO contact_via(postcode_loaction_id,via_email,via_phone)VALUES('".$max_id."','".$via_email."','".$via_phone."')";
	
	$run_insert5=mysql_query($insert5);
	
	
	 $uploader_count=$_REQUEST['uploader_count'];
	 
		 
		$uploader_count= $uploader_count-1;
	
	 
	
	for($i=0;$i<=$uploader_count;$i++){
		
			  $img_name="uploader_".$i."_tmpname";
		
		$im=$_REQUEST[$img_name];
		
		
		 $insert_img="INSERT INTO  users_images(postcode_loaction_id,file_name)VALUES('".$max_id."','".$im."')";
									$run_img=mysql_query($insert_img);
	
		
		
	}
	
	
	///Car Property
	if($cat_name=="Cars" || $cat_name=="Scooters" || $cat_name=="Adventure Bikes" || $cat_name=="Classic Bikes" || $cat_name=="Commuter Bikes" || $cat_name=="Custom Cruiser Bikes" || $cat_name=="Enduro Bikes" || $cat_name=="Mini Bikes" || $cat_name=="Moped" || $cat_name="Motocrosser Bikes" || $cat_name=="Naked Bikes" || $cat_name="Retro & Roadster" || $cat_name="Sidecars" || $cat_name="Sports Bikes" || $cat_name="Sports Tourer" || $cat_name="Super Moto" || $cat_name=="Super Sports" || $cat_name=="Three Wheeler" || $cat_name=="Tourer" || $cat_name="Trail Bikes " || $cat_name=="Trials Bikes"){
	
	$insert_vehicle="INSERT INTO vehicle_make_mode(postcode_loaction_id,make_id,year,model,fuel_type,body_type,transmission,colour,engine_size,mileage,dealer,price)VALUES('".$max_id."','".$make."','".$year."','".$model."','".$fuel_type."','".$body_type."','".$transmission."','".$colour."','".$engine_size."','".$mileage."','".$dealer."','".$price."')";
	
	$run_insert_vehicle=mysql_query($insert_vehicle);
	
	}
	
	///END car Property//
	
	////Property query///
	if($parent_name=='Flats & Houses'){
	 $insert_property="INSERT INTO property_holiday_rent(postcode_loaction_id,date_available,rent_price,rent_period,property_type,no_rooms,acting_agent)VALUES('".$max_id."','".$date_available."','".$price."','".$rent_period."','".$property_type."','".$no_rooms."','".$acting_agent."')";
	
	$run_insert_property=mysql_query($insert_property);
	

		
	}
	///END Property Query///
	
	///Job Contract query///
	 $insert_job_contract="INSERT INTO job_contract(postcode_loaction_id,job_contract,salary)VALUES('".$max_id."','".$jobcontract."','".$price."')";
	
	$run_job_contract=mysql_query($insert_job_contract);
	
	
	///END////
	
	$admininfo="no-reply@elaxy.co.uk";
	
	$to =  $_SESSION['login_email_id'];
	$subject = 'Elaxy is reviewing  your posted ad';
	$headers = "From: ".$admininfo['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	

	$message.= '<html><body>';
	
	$message.='<table width="100%" border="0">';
  
  
  
  
  $message.='<tr><td height="57"><strong> Dear '.$_SESSION['first_name'].',</strong></td></tr>';
  $message.='<tr><td height="48">This is an automated email on behalf of Elaxy.co.uk. Thank you for posting an ad with Elaxy. Your ad is currently under review and, upon approval, will be activated within the next two to Six hours. If you have any further questions, please email support@elaxy.co.uk.</td></tr>';

  $message.='<tr><td>Thank you for your patience,</td></tr>';
  $message.='<tr><td height="72">The Elaxy Team</td></tr>';
  
  
  $message.='<tr>
    <td height="72" style="font-size:11px; border:1px solid #d6d6d6;">This email was sent to you by Elaxy.co.uk because you have subscribed  to our services as elaxy.ltd@gmail.com  on www.elaxy.co.uk. If you have any question or  would like more information, Please read  our  privacy policy and terms of business.Elaxy.co.uk Limited  is registered  in England  and Wales, with registration Number  03934849, Address: 66 Bromham  Road , Bedford, Bedfordshire ,United Kingdom, MK40 2QH.  © Copyright  2013  Elaxy.co.uk, All Rights Reserved. All designated brands and trademarks are the property of their individual owners. Elaxy.co.uk  and  its Logo are the trademarks of Elaxy.co.uk Limited.</td>
  </tr>';
$message.='</table>';
	$message .= "</body></html>";
	
	$mail_sent=mail($to, $subject, $message, $headers);
	
	
	
	
	
session_start();


$_SESSION['msg'] = $msg;

$_SESSION['max_id']=$max_id;
	
	header("location:../post-submited.php");
	
	//header("location:../checkout.php?max_id=$max_id");
	
				
	
		
?>