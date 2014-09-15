<?php 
ob_start();
error_reporting(0);
include("../connection.php");



if(isset($_REQUEST['Login'])){
	
	
			
			  $login_email_id=$_REQUEST['login_email'];
			  $login_password=$_REQUEST['login_password'];
			 $enc_password=md5($login_password);
			
			if(!empty($login_email_id) && !empty($login_password)){
				
				$status='1';
				//Select username and password from login//
				
				 $select_login="SELECT * FROM registration WHERE email='".$login_email_id."' AND password='".$enc_password."' AND status='".$status."'";
				$run_query=mysql_query($select_login);
				$fetch_login=mysql_fetch_array($run_query);
				
				
				
						$userid=$fetch_login['id'];		
				   $user_email_id=$fetch_login['email'];
				 $pass=$fetch_login['password'];  
				 $u_name=$fetch_login['first_name'];
				 $u_last_name=$fetch_login['last_name'];
				 $u_contact_number=$fetch_login['phone'];
				 $u_status=$fetch_login['status'];
				
									if($login_email_id==$user_email_id && $enc_password==$pass){
										
							session_start();
		$_SESSION['userid']=$userid;
			   $_SESSION['login_email_id'] =$user_email_id;  
			  $_SESSION['login_password'] = $pass;
			  $_SESSION['first_name']=$u_name;
			  $_SESSION['last_name']=$u_last_name;	
			  $_SESSION['phone']=$u_contact_number;
			  $_SESSION['status']=$u_status;
			
			header("Location:../manage_ads.php");		
										
									}
									else {
										$error="Invalid User Name or Password";
										
										session_start();
										$_SESSION['error']=$error;
										
										header("location:../login.php");
										
									}
				
				
			}
			
			else{
			$error="Please Enter USer Name And Password";
			
			session_start();
			$_SESSION['error']=$error;
			header("location:../login.php");	
				
			}
			
		}



?>