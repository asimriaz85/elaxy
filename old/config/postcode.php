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
	$rent_period=$_REQUEST['rent_period'];
	$property_type=$_REQUEST['property_type'];
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


	 $insert2="INSERT INTO ad_title_description(postcode_loaction_id,title,description)VALUES('".$max_id."','".$title."','".$description."')";
	
	$run_insert2=mysql_query($insert2);
	
	
	if(!empty($link_website)){
	
	$insert3="INSERT INTO your_web_link(postcode_loaction_id,link_site,price)VALUES('".$max_id."','".$link_site."','".$link_website_price."')";
	
	$run_insert3=mysql_query($insert3);
	
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
		 
	}
		}
		if(empty($selectall)){
			
			
$date1 = strtotime(date("Y-m-d", strtotime($cdate)) . " +1 month");
 $onemonth = date("Y-m-d",$date1);


$days = (strtotime($onemonth) - strtotime($cdate)) / (60 * 60 * 24);
 
	
		$free="Free Ad";	
			
			$insert6="INSERT INTO ad_price(postcode_loaction_id,name,price,days)VALUES('".$max_id."','".$free."','0','".$days."')";
			
			$run6=mysql_query($insert6);
			
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
	if($cat_name=="Cars"){
	
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
	 $insert_job_contract="INSERT INTO job_contract(postcode_loaction_id,jobcontract)VALUES('".$max_id."','".$jobcontract."')";
	
	$run_job_contract=mysql_query($insert_job_contract);
	
	
	///END////
	
	
	
	$admininfo="support@elaxy.co.uk";
	
	//$admininfo="faisalwebprogrammer@gmail.com";
	
	$to =$_SESSION['login_email_id'];
	$subject = 'Elaxy Staff Receive Your Ad';
	$headers = "From: ".$admininfo." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message.='<table width="100%" border="0">
  <tr>
    <td colspan="2">Dear '.$_SESSION['first_name'].', </td>
  </tr>
  <tr>
    <td><strong>We have received your ad Our staff will review the add. It will be activated with in 4-6 hours.</strong></td>
   
  </tr>
  <tr>
    <td>If you have any further questions, please contact us back.</td>
    
  </tr>
  
  <tr>
    <td>Regards,</td>
    
  </tr>
  
  <tr>
    <td>Support Team</td>
    
  </tr>
  
  <tr>
    <td><img src="http://elaxy.co.uk/images/logo.png"></td>
    
  </tr>
  
</table>';
	$message .= "</body></html>";
	$send=mail($to, $subject, $message, $headers);
	
	
	
	
	
	header("location:../post-ad.php")
	
	//header("location:../checkout.php?max_id=$max_id");
	
				
		
		
?>