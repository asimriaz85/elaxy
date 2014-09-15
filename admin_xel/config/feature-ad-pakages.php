<?php

include("../../connection.php");

		if(isset($_REQUEST['submit'])){
			
			$days=$_REQUEST['days'];
			$price=$_REQUEST['price'];
			
			if(!empty($days) && !empty($price)){
				
				 $insert="INSERT INTO feature_price(days,price)VALUES('".$days."','".$price."')";
				$run=mysql_query($insert);
				
				
				if($run){
					$msg="Price add successfully";
					header("Location:../feature-ad-pakages.php?msg=$msg");
				}
				else{
					
					$error="Price not added due to error!";
					header("Location:../feature-ad-pakages.php?error=$error&days=$days&price=$price");
				}
				
			} else{
				
				$error="Please fill all the fields!";
					header("Location:../feature-ad-pakages.php?error=$error&days=$days&price=$price");
				
			}
			
		}
?>