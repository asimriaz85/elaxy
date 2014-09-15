<?php

		ob_start();

error_reporting(0);
include("../../connection.php");
		
		if(isset($_REQUEST['submit'])){
			
			
			
			$state_name=$_REQUEST['state_name'];
			
			if(!empty($state_name)){
				
				 $select_state="SELECT state_name FROM states WHERE state_name='".$state_name."'";
				$run_state=mysql_query($select_state);
				$fetch_state_name=mysql_fetch_array($run_state);
				$state_name2=$fetch_state_name['state_name'];
				
				if($state_name==$state_name2){
					$error="State Name Already Exist!";
					
					header("location:../add-states.php?error=$error&state_name=$state_name");
				}
			
				if($state_name!=$state_name2){
					
					$insert="INSERT INTO states(state_name)VALUES('".$state_name."')";
					$run_insert=mysql_query($insert);
					
					if($run_insert){
						
						$msg="State Name Added Successfully";
					
					header("location:../add-states.php?msg=$msg");
					}
				}
				
			} else{
				
				$error="Please fill all the required Fields";
					
					header("location:../add-states.php?error=$error&state_name=$state_name");
			}
			
			
			
		}

?>