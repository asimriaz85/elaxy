

<!DOCTYPE html>







<html>







        <head>







        <?php require_once('inc/meta.php'); 















?>







        <link rel="stylesheet" href="main.css">







        <!--  <link href="uploadfile.css" rel="stylesheet">







   <script src="js/1.9.1-jquery.min.js"></script>







    <script src="jquery.uploadfile.min.js"></script> 







-->















        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />







        <link rel="stylesheet" href="js/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" />







        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>







        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>







        <!-- production -->







        <script type="text/javascript" src="js/plupload.full.min.js"></script>







        <script type="text/javascript" src="js/jquery.ui.plupload/jquery.ui.plupload.js"></script>















        <!--END-->







        <script type="text/javascript" src="js/crafty_postcode.class.js"></script>







        <script>







		var cp_access_token = "859f1-bb59b-8b522-00edc"; // ***** DON'T FORGET TO PUT YOUR ACCESS TOKEN HERE IN PLACE OF X's !!!! *****







		var cp_obj_1 = CraftyPostcodeCreate();







		cp_obj_1.set("access_token", cp_access_token); 







		cp_obj_1.set("first_res_line", "----- please select your address ----"); 







		cp_obj_1.set("res_autoselect", "0");







		cp_obj_1.set("result_elem_id", "crafty_postcode_result_display_1");







		cp_obj_1.set("form", "address");







		cp_obj_1.set("elem_company"  , "companyname"); // optional







		cp_obj_1.set("elem_street1"  , "address1");







		cp_obj_1.set("elem_street2"  , "address2"); // optional, but highly recommended







		cp_obj_1.set("elem_street3"  , "address3"); // optional







		cp_obj_1.set("elem_town"     , "town");







		cp_obj_1.set("elem_county"   , "county"); // optional







		cp_obj_1.set("elem_postcode" , "postcode");







		cp_obj_1.set("elem_house_num", "house_name"); // setting this results in the house name/number being separated onto its own line







		cp_obj_1.set("elem_udprn" 	 , "udprn"); // optional







		cp_obj_1.set("single_res_autoselect" , 1); // don't show a drop down box if only one matching address is found















	</script>















        <!--Vlidation-->















        <link rel="stylesheet" type="text/css" href="live-validation/stylesheets/jquery.validate.css" />







        <link rel="stylesheet" type="text/css" href="live-validation/stylesheets/style.css" />







        <script src="live-validation/javascripts/jquery.validate.js" type="text/javascript">







        </script>







        <script src="live-validation/javascripts/jquery.validation.functions.js" type="text/javascript">







        </script>







        <script type="text/javascript">







		  







		  







		  







		  







		  







		  







		  







		  







            /* <![CDATA[ */







            jQuery(function(){







                jQuery("#ValidField").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				







				jQuery("#ValidField01").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				







				 jQuery("#ValidField2").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				







				 jQuery("#ValidField3").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				







				 jQuery("#ValidField4").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				jQuery("#ValidField5").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				 jQuery("#ValidField6").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				 jQuery("#ValidField7").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				







				jQuery("#ValidField8").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				jQuery("#description11").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				







				jQuery("#datepicker").validate({







                    expression: "if (VAL) return true; else return false;",







                    message: "Please enter the Required field"







                });







				







				 







				







                jQuery("#ValidNumber").validate({







                    expression: "if (!isNaN(VAL) && VAL) return true; else return false;",







                    message: "Please enter a valid number"







                });







                







                







                jQuery("#ValidEmail").validate({







                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",







                    message: "Please enter a valid Email ID"







                });







                jQuery("#ValidPassword").validate({







                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",







                    message: "Please enter a valid Password"







                });







				







				jQuery("#ValidPassword1").validate({







                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",







                    message: "Please enter a valid Password"







                });







                jQuery("#ValidConfirmPassword").validate({







                    expression: "if ((VAL == jQuery('#ValidPassword').val()) && VAL) return true; else return false;",







                    message: "Confirm password field doesn't match the password field"







                });







                jQuery("#ValidSelection").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







               







			   jQuery("#ValidSelection2").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







				jQuery("#ValidSelection3").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







				jQuery("#ValidSelection4").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







				jQuery("#ValidSelection5").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







			   jQuery("#ValidRadio").validate({







                    expression: "if (isChecked(SelfID)) return true; else return false;",







                    message: "Please select a radio button"







                });







                







				







				jQuery("#ValidRadio2").validate({







                    expression: "if (isChecked(SelfID)) return true; else return false;",







                    message: "Please select a radio button"







                });







				







				jQuery("#ValidRadio3").validate({







                    expression: "if (isChecked(SelfID)) return true; else return false;",







                    message: "Please select a radio button"







                });







				







				jQuery("#ValidSelection").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







				







				jQuery("#ValidSelection2").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







				







				jQuery("#ValidSelection3").validate({







                    expression: "if (VAL != '') return true; else return false;",







                    message: "Please make a selection"







                });







				







				jQuery("#ValidRadio").validate({







                    expression: "if (isChecked(SelfID)) return true; else return false;",







                    message: "Please select a radio button"







                });







            });







            /* ]]> */







        </script>







        <!--END-->







        </head>















        <body>







<?php require_once('inc/header.php');















include("inc/login-security.php");















///Adsens code///















$select_left_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='post-ad' AND location='Left' AND status='Show'";







$run_left=mysql_query($select_left_adsen);







$fetch_left_adsen=mysql_fetch_array($run_left);







$adsen_left_image=$fetch_left_adsen['images'];







$ad_code_left=$fetch_left_adsen['ad_code'];























 $select_right_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='post-ad' AND location='Right' AND status='Show'";







$run_right=mysql_query($select_right_adsen);







$fetch_right_adsen=mysql_fetch_array($run_right);







$ad_code_right=$fetch_right_adsen['ad_code'];







$adsen_right_image=$fetch_right_adsen['images'];







///END///























 















 $main_cat=$_REQUEST['main_cat'];







	$sub_cat_id=$_REQUEST['sub_cat_id'];







	 $sub_sub_cat=$_REQUEST['sub_sub_cat'];







	$sub_cat_child_child=$_REQUEST['sub_cat_child_child'];







	$sub_cat_child_child_child=$_REQUEST['sub_cat_child_child_child'];







	







	$select_maincat="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$main_cat."'";







	$run_maincat=mysql_query($select_maincat);







	$fetch_maincat=mysql_fetch_array($run_maincat);







	 $cat_maincat_name=$fetch_maincat['name'];







	$cat_maincat_id=$fetch_maincat['id'];







	







	$select_cat_id1="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_cat_id."'";







	$run_cat_id1=mysql_query($select_cat_id1);







	$fetch_cat_id1=mysql_fetch_array($run_cat_id1);







	 $cat_name1=$fetch_cat_id1['name'];







	$cat_name1_id=$fetch_cat_id1['id'];







	







	$select_cat_id2="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_sub_cat."'";







	$run_cat_id2=mysql_query($select_cat_id2);







	$fetch_cat_id2=mysql_fetch_array($run_cat_id2);







	  $cat_name2=$fetch_cat_id2['name'];







	$cat_name2_id=$fetch_cat_id2['id'];







	







	$select_cat_id3="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_cat_child_child."'";







	$run_cat_id3=mysql_query($select_cat_id3);







	$fetch_cat_id3=mysql_fetch_array($run_cat_id3);







	 $cat_name3=$fetch_cat_id3['name'];







	$cat_name3_id=$fetch_cat_id3['id'];







	







	$select_cat_id4="SELECT id,name FROM categories WHERE show_hide='Show' AND id='".$sub_cat_child_child_child."'";







	$run_cat_id4=mysql_query($select_cat_id4);







	$fetch_cat_id4=mysql_fetch_array($run_cat_id4);







	$cat_name4=$fetch_cat_id4['name'];







	$cat_name4_id=$fetch_cat_id4['id'];







	







	















?>







<section class="main-wrapper">







          <?php require_once('inc/top_ads.php'); ?>







          <div class="clear"></div>







          <?php require_once('inc/search_bar.php'); ?>







          <div class="clear"></div>







          <div class="left_ad">







    <?php if(!empty($ad_code_left)){ echo $ad_code_left; } else if(!empty($adsen_left_image)){?>







    <img src="ksdh348_@iy/media/large_gallery/<?php echo $adsen_left_image; ?>">







    <?php } ?>







  </div>







          <div id="contant_area">







    <form id="form" class="Active"  name="address" action="config/postcode.php" method="post" enctype="multipart/form-data">







   <!-- <input type="hidden" name="main_cat" value="<?php //echo $main_cat; ?>">-->







   







   <?php $cat=array($main_cat,$sub_cat_id,$sub_sub_cat,$sub_cat_child_child,$sub_cat_child_child,$sub_cat_child_child_child);







   







   







  $cat_filter= array_filter($cat);







  







  $mainid= end($cat_filter);







   







    ?>







              







			  <input type="hidden" name="main_cat" value="<?=$mainid?>">







			  







			  







			  







			 







             







              







             







              







              <div class="ad-box" style="margin-top:5px; margin-left:5px; color:#000; border:none;">







              <div class="catContainer">







              <h1>Post your Ad</h1>







              <div class="catSelect selected">







              <div class="Right">







        <div style="color:#F00; font-weight:bold; font-size:14px;">







                  <?php if(isset($_REQUEST['msg'])){ echo $msg=$_REQUEST['msg']; } ?>







                </div>







        <h4>Your Selected Category <a href="post-ad1.php">(back to change or edit)</a></h4>







        <div class="catHolder"> <span class="selected"><?php echo ucfirst($cat_maincat_name); ?></span><span><?php echo ucfirst($cat_name1); ?> </span>







                  <?php if(!empty($cat_name2)){ ?>







                  <span><?php echo ucfirst($cat_name2); ?></span>







                  <?php } if(!empty($cat_name3)){ ?>







                  <span><?php echo ucfirst($cat_name3); ?></span>







                  <?php } if(!empty($cat_name4)){ ?>







                  <span><?php echo ucfirst($cat_name4); ?></span>







                  <?php } ?>







                </div>







      </div>







              <div class="Right" id="postcode_loc">







        <h4>Postcode</h4>







        <div class="catHolder">







                  <label>Postcode<b>*</b>:</label>







                  <input type="text" name="postcode"  style="width: 100px;"/>







                </div>







        <div class="catHolder">







                  <button type="button" onclick="cp_obj_1.doLookup()">Find Address</button>







                  <div id="crafty_postcode_result_display_1" ></div>



<p>Not sure what your postcode is? <a href="http://www.royalmail.com/postcode-finder" target="_blank">Find it here</a> OR

  <a style="cursor:pointer; text-decoration:underline;" id="manual_loc">Manually select your location</a></p>

</div>







      </div>







              <div class="Right postcode_town">







        <h4>Location</h4>







        <div class="catHolder">







                  <label>Postcode<b>*</b>:</label>







                  <input type="hidden" name="companyname"/>







                  <input type="hidden" name="house_name"/>







                  <input type="hidden" name="address1"/>







                  <input type="hidden" name="address2"/>







                  <input type="hidden" name="address3"/>







               <input type="text" name="town" />







                  <input type="hidden" name="county"/>







                  <input type="hidden" name="udprn"/>







                </div>







      </div>







              <div class="Right">







        <h4>Ad title</h4>







        <div class="catHolder">







                  <label>Title<b>*</b>:</label>







                  <input type="text" name="title" id="ValidField2"/>







                 







                </div>







      </div>







              







              <!--FOR RENT-->







              <?php







	







	 /*?>if($cat_name1){







    







    







    <div class="Right">







             	<h4>Flat & Houses</h4>







             	<div class="catHolder">







                	<label>Date<b>*</b>:</label>







                	<input type="text" name="date_available" id="datepicker"/>                                 







                </div>  







                </div>







        } */?>







              







              <!--END--> 







              







              <!--/////////////////////-->







              <?php 







	if($cat_name2=="Holiday Rentals" && $cat_maincat_name!="Jobs" && $cat_maincat_name!="Jobs"){







		







		







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







        <div class="catHolder">







                  <label>Rent<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







        <div class="catHolder">







                  <label>Rent Period<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="rent_period" id="ValidRadio_1" value="monthly" />







          Monthly&nbsp;&nbsp;







          <input type="radio" name="rent_period" value="weekly" id="ValidRadio_2" />







          Weekly </span> </div>







        <div class="catHolder">







                  <label>Property Type<b>*</b>:</label>







                  <span id="ValidRadio2" class="InputGroup">







          <input type="radio" name="property_type" value="house" id="ValidRadio_3" />







          House&nbsp;&nbsp;







          <input type="radio" name="property_type" value="flat" id="ValidRadio_4" />







          Flat </span> </div>







        <div class="catHolder">







                  <label>No Of rooms<b>*</b>:</label>







                  <select name="no_rooms" id="ValidSelection" style="float:left;">







            <option value="">Please Select</option>







            <option value="Studio">Studio</option>







            <?php 







		for($i=1;$i<=20;$i++){







		







		?>







            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Are you acting as an agent?<b>*</b>:</label>







                  <span id="ValidRadio3" class="InputGroup">







          <input type="radio" name="acting_agent" value="Agency" id="ValidRadio_5" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="acting_agent" value="Private" id="ValidRadio_6" />







          No </span> </div>







      </div>







              <?php } ?>







              <?php /*if($cat_name3=='studios' || $cat_name3=='1 bedroom' || $cat_name3=='3 bedrooms' ||$cat_name3=='3 bedrooms' || $cat_name3=='4 bedrooms' || $cat_name3=='5 + bedrooms' || $cat_name3=='short term' || $cat_name3=='bedsits'){*/

			 if($cat_name2=='Offered'){
		?>
              <div class="Right">
        <h4>Property details</h4>
        <div class="catHolder">
                  <label>Date Avilable<b>*</b>:</label>
                  <input type="text" name="date_available" id="datepicker"/>
                </div>
        <div class="catHolder">
                  <label>Rent<b>*</b>:</label>
                  <input type="text" name="price" id="ValidField4"/>
                </div>
        <div class="catHolder">
                  <label>Rent Period<b>*</b>:</label>
                  <span id="ValidRadio" class="InputGroup">
          <input type="radio" name="rent_period" id="ValidRadio_1" value="monthly" />
          Monthly&nbsp;&nbsp;
          <input type="radio" name="rent_period" value="weekly" id="ValidRadio_2" />
          Weekly </span> </div>
        <div class="catHolder">
                  <label>Property Type<b>*</b>:</label>
                  <span id="ValidRadio2" class="InputGroup">
          <input type="radio" name="property_type" value="house" id="ValidRadio_3" />
          House&nbsp;&nbsp;
          <input type="radio" name="property_type" value="flat" id="ValidRadio_4" />
          Flat </span> </div>
        <div class="catHolder">
                  <label>No Of rooms<b>*</b>:</label>
                  <select name="no_rooms" id="ValidSelection">
            <option value="">Please Select</option>
            <option value="Studio">Studio</option>
            <?php 
		for($i=1;$i<=20;$i++){
		?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
                </div>
                <div class="catHolder">
                  <label>Seller Type<b>*</b>:</label>
                  <span id="ValidRadio2" class="InputGroup">
          <input type="radio" name="property_type" value="Private" id="ValidRadio_5" />
          PRIVATE&nbsp;&nbsp;
          <input type="radio" name="property_type" value="agency" id="ValidRadio_6" />
          AGENCY </span> </div>
        <!--<div class="catHolder">







                  <label>Available for couples<b>*</b>:</label>







                  <span id="ValidRadio3" class="InputGroup">







          <input type="radio" name="acting_agent" value="Agency" id="ValidRadio_5" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="acting_agent" value="Private" id="ValidRadio_6" />







          No </span> </div>-->







      </div>







              <?php } ?>







              <?php







			 if($cat_name3=="Office Space Wanted"){







				?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







      </div>







              <?php 







				 







			 }







			 ?>







              <?php







			 if($cat_name3=="Parking Wanted"){







				?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







      </div>







              <?php 







				 







			 }







			 ?>







              <?php







			 if($cat_name3=="Wanted Storage & Garage"){







				?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







      </div>







              <?php 







				 







			 }







			 ?>







              <?php







			  /*?>if($cat_name3=="Short Term Wanted"){







				?>







                <div class="Right">







             	<h4>Property details</h4>







             	<div class="catHolder">







                	<label>Date Avilable<b>*</b>:</label>







                	<input type="text" name="date_available" id="datepicker"/>                                 







                </div>  







                                                       







             </div>







                <?php 







				 







			 }<?php */?>







              <?php /*?>  <?php if($cat_name1=='To Share' && $cat_name2=='Share Offered'){







		?><?php */?>







              <?php if($cat_name1=='To Share' && $cat_name2=='Share Offered'){







		?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







        <div class="catHolder">







                  <label>Rent<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







        <div class="catHolder">







                  <label>Rent Period<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="rent_period" id="ValidRadio_1" value="monthly" />







          Monthly&nbsp;&nbsp;







          <input type="radio" name="rent_period" value="weekly" id="ValidRadio_2" />







          Weekly </span> </div>







        <div class="catHolder">







                  <label>Property Type<b>*</b>:</label>







                  <span id="ValidRadio2" class="InputGroup">







          <input type="radio" name="property_type" value="house" id="ValidRadio_3" />







          House&nbsp;&nbsp;







          <input type="radio" name="property_type" value="flat" id="ValidRadio_4" />







          Flat </span> </div>







        <div class="catHolder">







                  <label>No Of rooms<b>*</b>:</label>







                  <select name="no_rooms" id="ValidSelection">







            <option value="">Please Select</option>







            <option value="Studio">Studio</option>







            <?php 







		for($i=1;$i<=20;$i++){







		







		?>







            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Available for couples<b>*</b>:</label>







                  <span id="ValidRadio3" class="InputGroup">







          <input type="radio" name="acting_agent" value="Agency" id="ValidRadio_5" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="acting_agent" value="Private" id="ValidRadio_6" />







          No </span> </div>







      </div>







              <?php } ?>







              







              <!--///////////////////////-->







              <?php /*?><?php if($cat_name1=='To Share' && $cat_name2=='share wanted'){







		?><?php */?>







              <?php if($cat_name2=='Share Wanted'){







		?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







      </div>







              <?php } ?>







              







              <!--//////-->







              <?php 







	if($cat_name2=="Office Space" && $cat_name3!="Office Space Wanted" || $cat_name2=="Parking"   ||   $cat_name3=="Offered Storage & Garage"  ) {







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







        <div class="catHolder">







                  <label>Rent<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







        <div class="catHolder">







                  <label>Rent Period<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="rent_period" id="ValidRadio_1" value="monthly" />







          Monthly&nbsp;&nbsp;







          <input type="radio" name="rent_period" value="weekly" id="ValidRadio_2" />







          Weekly </span> </div>







        <div class="catHolder">







                  <label>Are you acting as an agent<b>*</b>:</label>







                  <span id="ValidRadio3" class="InputGroup">







          <input type="radio" name="acting_agent" value="Agency" id="ValidRadio_5" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="acting_agent" value="Private" id="ValidRadio_6" />







          No </span> </div>







      </div>







              <?php } ?>







              







              <!--/////////////////////////////////-->







              <?php 







	if($cat_name3=="Space Wanted"){







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







      </div>







              <?php } ?>







              <?php 







	if($cat_name3=="Space Wanted"){







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







      </div>







              <?php } ?>







              







              <!--/////////////////////////////-->







              







              <?php 







	if($cat_name1=="Real Property for Sale"){







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







        <div class="catHolder">







                  <label>Property Type<b>*</b>:</label>







                  <span id="ValidRadio2" class="InputGroup">







          <input type="radio" name="property_type" value="house" id="ValidRadio_3" />







          House&nbsp;&nbsp;







          <input type="radio" name="property_type" value="flat" id="ValidRadio_4" />







          Flat </span> </div>







        <div class="catHolder">







                  <label>No Of rooms<b>*</b>:</label>







                  <select name="no_rooms" id="ValidSelection">







            <option value="">Please Select</option>







            <option value="Studio">Studio</option>







            <?php 







		for($i=1;$i<=20;$i++){







		







		?>







            <option value="<?php echo $i; ?>"><?php echo $i; ?> Bedroom(s)</option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Are you acting as an agent?<b>*</b>:</label>







                  <span id="ValidRadio3" class="InputGroup">







          <input type="radio" name="acting_agent" value="Agency" id="ValidRadio_5" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="acting_agent" value="Private" id="ValidRadio_6" />







          No </span> </div>







      </div>







              <?php } ?>







              







              <!--////////////////////////////////-->







              







              <?php 







	if($cat_name2=="Home Swap"){







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







        <div class="catHolder">







                  <label>Property Type<b>*</b>:</label>







                  <span id="ValidRadio2" class="InputGroup">







          <input type="radio" name="property_type" value="house" id="ValidRadio_3" />







          House&nbsp;&nbsp;







          <input type="radio" name="property_type" value="flat" id="ValidRadio_4" />







          Flat </span> </div>







        <div class="catHolder">







                  <label>No Of rooms<b>*</b>:</label>







                  <select name="no_rooms" id="ValidSelection">







            <option value="">Please Select</option>







            <option value="Studio">Studio</option>







            <?php 







		for($i=1;$i<=20;$i++){







		







		?>







            <option value="<?php echo $i; ?>"><?php echo $i; ?> Bedroom(s)</option>







            <?php } ?>







          </select>







                </div>







      </div>







              <?php } ?>







              







              <!--///////////////////////////-->







              







              <?php 







	if($cat_name3=="storage & garage"){







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







        <div class="catHolder">







                  <label>Rent<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







        <div class="catHolder">







                  <label>Rent Period<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="rent_period" id="ValidRadio_1" value="monthly" />







          Monthly&nbsp;&nbsp;







          <input type="radio" name="rent_period" value="weekly" id="ValidRadio_2" />







          Weekly </span> </div>







        <div class="catHolder">







                  <label>Are you acting as an agent<b>*</b>:</label>







                  <span id="ValidRadio3" class="InputGroup">







          <input type="radio" name="acting_agent" value="Agency" id="ValidRadio_5" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="acting_agent" value="Private" id="ValidRadio_6" />







          No </span> </div>







      </div>







              <?php } ?>







              <?php 







	if($cat_name2=="parking" ){







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker"/>







                </div>







        <div class="catHolder">







                  <label>Rent<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







        <div class="catHolder">







                  <label>Rent Period<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="rent_period" id="ValidRadio_1" value="monthly" />







          Monthly&nbsp;&nbsp;







          <input type="radio" name="rent_period" value="weekly" id="ValidRadio_2" />







          Weekly </span> </div>







        <div class="catHolder">







                  <label>Are you acting as an agent<b>*</b>:</label>







                  <span id="ValidRadio3" class="InputGroup">







          <input type="radio" name="acting_agent" value="Agency" id="ValidRadio_5" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="acting_agent" value="Private" id="ValidRadio_6" />







          No </span> </div>







      </div>







              <?php } ?>







              <?php 







	if($cat_name2=="Rentals Wanted"){







	?>







              <div class="Right">







        <h4>Property details</h4>







        <div class="catHolder">







                  <label>Date Avilable<b>*</b>:</label>







                  <input type="text" name="date_available" id="datepicker" class="datepicker"/>







                </div>







      </div>







              <?php } ?>







              







              <!--//////////////////////////////-->







              <?php if($cat_name1=="Cars" /*Vans Wanted*/ ){ ?>







              <div class="Right">







        <h4>Price you would like for your item?</h4>







        <!--<h4>Price</h4>-->







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <div class="Right">







        <div class="Right"> </div>







        <h4>Vehicle Specification</h4>







        <div class="catHolder">







                  <label>Make<b>*</b>:</label>







                  <?php $select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_name1_id."' order by name asc";







	$run_make=mysql_query($select_make);







	?>







                  <select name="make" id="ValidSelection">







            <?php 







	







	while($fetch_make=mysql_fetch_array($run_make)){







		$make_id=$fetch_make['id'];







		$make_name=$fetch_make['name'];







	?>







            <option value="<?php echo $make_id; ?>"<?php if($cat_name2_id==$make_id){?> selected="selected"<?php } ?>><?php echo ucfirst($make_name); ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Year<b>*</b>:</label>







                  <select name="year" id="ValidSelection2">







            <option value="">Please Select</option>







            <?php 







	$currentYear = date("Y"); 







	$years = range ($currentYear, 1930); 







	foreach ($years as $value) {







echo "<option value=\"$value\">$value</option>\n";







} 







	?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Model<b>*</b>:</label>







                  <input type="text" name="model" id="ValidField3" />







                </div>







        <div class="catHolder">







                  <label>Fuel Type<b>*</b>:</label>







                  <select name="fuel_type" id="ValidSelection3">







            <option value="">Please Select</option>







            <option value="Petrol">Petrol</option>







            <option value="Diesel">Diesel</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Body Type<b>*</b>:</label>







                  <select name="body_type" id="ValidSelection4">







            <option value="">Please Select</option>







            <option value="2 Door Saloon">2 Door Saloon</option>







            <option value="4 Door Saloon">4 Door Saloon</option>







            <option value="Saloon">Saloon</option>







            <option value="Convertible">Convertible</option>







            <option value="Coupe">Coupe</option>







            <option value="Estate">Estate</option>







            <option value="3 Door Hatchback">3 Door Hatchback</option>







            <option value="5 Door Hatchback">5 Door Hatchback</option>







            <option value="Sports">Sports</option>







            <option value="Light 4x4 Utility">Light 4x4 Utility</option>







            <option value="MPV">MPV</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Transmission<b>*</b>:</label>







                  <select name="transmission" id="ValidSelection5">







            <option value="">Please Select</option>







            <option value="Manual">Manual</option>







            <option value="Automatic">Automatic</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Colour<b>*</b>:</label>







                  <input type="text" name="colour" id="ValidField5" />







                </div>







        <div class="catHolder">







                  <label>Engine Size(CC)<b>*</b>:</label>







                  <input type="text" name="engine_size" id="ValidField7" />







                </div>







        <div class="catHolder">







                  <label>Mileage<b>*</b>:</label>







                  <input type="text" name="mileage" id="ValidField6" />







                </div>







        <div class="catHolder">







                  <label>Are you a Auto Trader?<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="dealer" value="Yes" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="dealer" value="No" />







          No </span> </div>







         







         <!--<div class="catHolder">







                  <label>Seller Type<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="sellertype" value="Trader" />







          Trader&nbsp;&nbsp;







          <input type="radio" name="sellertype" value="Private" />







          Private </span> </div>--> 







          







      </div>







              <?php } ?>







              <?php if($cat_name1=="Commercial Trucks"){ ?>







              <div class="Right">







        <h4>Price you would like for your item?</h4>







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







        <div class="Right"> </div>







        <h4>Vehicle Specification</h4>







        <div class="catHolder">







                  <label>Make<b>*</b>:</label>







                  <?php $select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='38' order by name asc";







	$run_make=mysql_query($select_make);







	?>







                  <select name="make" id="ValidSelection">







            <?php 







	







	while($fetch_make=mysql_fetch_array($run_make)){







		$make_id=$fetch_make['id'];







		$make_name=$fetch_make['name'];







	?>







            <option value="<?php echo $make_id; ?>"<?php if($cat_name2_id==$make_id){?> selected="selected"<?php } ?>><?php echo ucfirst($make_name); ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Year<b>*</b>:</label>







                  <select name="year" id="ValidSelection2">







            <option value="">Please Select</option>







            <?php 







	$currentYear = date("Y"); 







	$years = range ($currentYear, 1930); 







	foreach ($years as $value) {







echo "<option value=\"$value\">$value</option>\n";







} 







	?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Model<b>*</b>:</label>







                  <input type="text" name="model" id="ValidField3" />







                </div>







        <div class="catHolder">







                  <label>Fuel Type<b>*</b>:</label>







                  <select name="fuel_type" id="ValidSelection3">







            <option value="">Please Select</option>







            <option value="Petrol">Petrol</option>







            <option value="Diesel">Diesel</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Body Type<b>*</b>:</label>







                  <select name="body_type" id="ValidSelection4">







            <option value="">Please Select</option>







            <option value="2 Door Saloon">2 Door Saloon</option>







            <option value="4 Door Saloon">4 Door Saloon</option>







            <option value="Saloon">Saloon</option>







            <option value="Convertible">Convertible</option>







            <option value="Coupe">Coupe</option>







            <option value="Estate">Estate</option>







            <option value="3 Door Hatchback">3 Door Hatchback</option>







            <option value="5 Door Hatchback">5 Door Hatchback</option>







            <option value="Sports">Sports</option>







            <option value="Light 4x4 Utility">Light 4x4 Utility</option>







            <option value="MPV">MPV</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Transmission<b>*</b>:</label>







                  <select name="transmission" id="ValidSelection5">







            <option value="">Please Select</option>







            <option value="Manual">Manual</option>







            <option value="Automatic">Automatic</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Colour<b>*</b>:</label>







                  <input type="text" name="colour" id="ValidField5" />







                </div>







        <div class="catHolder">







                  <label>Engine Size(CC)<b>*</b>:</label>







                  <input type="text" name="engine_size" id="ValidField7" />







                </div>







        <div class="catHolder">







                  <label>Mileage<b>*</b>:</label>







                  <input type="text" name="mileage" id="ValidField6" />







                </div>







        <div class="catHolder">







                  <label>Are you a Auto Trader?<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="dealer" value="Yes" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="dealer" value="No" />







          No </span> </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Caravans"){ ?>







             <div class="Right">







              <h4>Price</h4>







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







                







                 <!--







        <div class="Right">







                  <h4>Price you would like for your item?</h4>







                </div>







        <h4>Vehicle Specification</h4>







      </div>-->







              <?php } ?>







              







              <?php if($cat_name1=="Caravans Parts & Accessories"){ ?>







             <div class="Right">







              <h4>Price</h4>







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







                







                 <!--







        <div class="Right">







                  <h4>Price you would like for your item?</h4>







                </div>







        <h4>Vehicle Specification</h4>







      </div>-->







              <?php } ?>







              







              <?php if($cat_name1=="Car Parts & Accessories"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Campervans Parts & Accessories"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Van Parts & Accessories"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Truck Parts & Accessories"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Boats"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Boat Parts & Accessories"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Motorhome Parts & Accessories"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Motorbike Parts & Accessories"){ ?>







              <div class="Right">







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Campervans"){ ?>







              <div class="Right">







        <h4>Price you would like for your item?</h4>







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







       </div>







        <div class="Right">







        <h4>Vehicle Specification</h4>







        <div class="catHolder">







                  <label>Make<b>*</b>:</label>







                  <?php







					







					







					 $select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='38' order by name asc";







	$run_make=mysql_query($select_make);







	?>







                  <select name="make" id="ValidSelection">







            <?php 







	







	while($fetch_make=mysql_fetch_array($run_make)){







		$make_id=$fetch_make['id'];







		$make_name=$fetch_make['name'];







	?>







            <option value="<?php echo $make_id; ?>"<?php if($cat_name2_id==$make_id){?> selected="selected"<?php } ?>><?php echo ucfirst($make_name); ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Year<b>*</b>:</label>







                  <select name="year" id="ValidSelection2">







            <option value="">Please Select</option>







            <?php 







	$currentYear = date("Y"); 







	$years = range ($currentYear, 1930); 







	foreach ($years as $value) {







echo "<option value=\"$value\">$value</option>\n";







} 







	?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Model<b>*</b>:</label>







                  <input type="text" name="model" id="ValidField3" />







                </div>







        <div class="catHolder">







                  <label>Fuel Type<b>*</b>:</label>







                  <select name="fuel_type" id="ValidSelection3">







            <option value="">Please Select</option>







            <option value="Petrol">Petrol</option>







            <option value="Diesel">Diesel</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Body Type<b>*</b>:</label>







                  <select name="body_type" id="ValidSelection4">







            <option value="">Please Select</option>







            <option value="2 Door Saloon">2 Door Saloon</option>







            <option value="4 Door Saloon">4 Door Saloon</option>







            <option value="Saloon">Saloon</option>







            <option value="Convertible">Convertible</option>







            <option value="Coupe">Coupe</option>







            <option value="Estate">Estate</option>







            <option value="3 Door Hatchback">3 Door Hatchback</option>







            <option value="5 Door Hatchback">5 Door Hatchback</option>







            <option value="Sports">Sports</option>







            <option value="Light 4x4 Utility">Light 4x4 Utility</option>







            <option value="MPV">MPV</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Transmission<b>*</b>:</label>







                  <select name="transmission" id="ValidSelection5">







            <option value="">Please Select</option>







            <option value="Manual">Manual</option>







            <option value="Automatic">Automatic</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Colour<b>*</b>:</label>







                  <input type="text" name="colour" id="ValidField5" />







                </div>







        <div class="catHolder">







                  <label>Engine Size(CC)<b>*</b>:</label>







                  <input type="text" name="engine_size" id="ValidField7" />







                </div>







        <div class="catHolder">







                  <label>Mileage<b>*</b>:</label>







                  <input type="text" name="mileage" id="ValidField6" />







                </div>







        <div class="catHolder">







                  <label>Are you a Auto Trader?<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="dealer" value="Yes" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="dealer" value="No" />







          No </span> </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Motorhomes"){ ?>







              <div class="Right">







        <div class="Right">







                  <h4>Price you would like for your item?</h4>







                  <div class="catHolder">







            <label>Price<b>*</b>:</label>







            <input type="text" name="price" id="ValidField4"/>







          </div>







                </div>







        <h4>Vehicle Specification</h4>







        <div class="catHolder">







                  <label>Make<b>*</b>:</label>







                  <?php







					







					







					 $select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='38' order by name asc";







	$run_make=mysql_query($select_make);







	?>







                  <select name="make" id="ValidSelection">







            <?php 







	







	while($fetch_make=mysql_fetch_array($run_make)){







		$make_id=$fetch_make['id'];







		$make_name=$fetch_make['name'];







	?>







            <option value="<?php echo $make_id; ?>"<?php if($cat_name2_id==$make_id){?> selected="selected"<?php } ?>><?php echo ucfirst($make_name); ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Year<b>*</b>:</label>







                  <select name="year" id="ValidSelection2">







            <option value="">Please Select</option>







            <?php 







	$currentYear = date("Y"); 







	$years = range ($currentYear, 1930); 







	foreach ($years as $value) {







echo "<option value=\"$value\">$value</option>\n";







} 







	?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Model<b>*</b>:</label>







                  <input type="text" name="model" id="ValidField3" />







                </div>







        <div class="catHolder">







                  <label>Fuel Type<b>*</b>:</label>







                  <select name="fuel_type" id="ValidSelection3">







            <option value="">Please Select</option>







            <option value="Petrol">Petrol</option>







            <option value="Diesel">Diesel</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Body Type<b>*</b>:</label>







                  <select name="body_type" id="ValidSelection4">







            <option value="">Please Select</option>







            <option value="2 Door Saloon">2 Door Saloon</option>







            <option value="4 Door Saloon">4 Door Saloon</option>







            <option value="Saloon">Saloon</option>







            <option value="Convertible">Convertible</option>







            <option value="Coupe">Coupe</option>







            <option value="Estate">Estate</option>







            <option value="3 Door Hatchback">3 Door Hatchback</option>







            <option value="5 Door Hatchback">5 Door Hatchback</option>







            <option value="Sports">Sports</option>







            <option value="Light 4x4 Utility">Light 4x4 Utility</option>







            <option value="MPV">MPV</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Transmission<b>*</b>:</label>







                  <select name="transmission" id="ValidSelection5">







            <option value="">Please Select</option>







            <option value="Manual">Manual</option>







            <option value="Automatic">Automatic</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Colour<b>*</b>:</label>







                  <input type="text" name="colour" id="ValidField5" />







                </div>







        <div class="catHolder">







                  <label>Engine Size(CC)<b>*</b>:</label>







                  <input type="text" name="engine_size" id="ValidField7" />







                </div>







        <div class="catHolder">







                  <label>Mileage<b>*</b>:</label>







                  <input type="text" name="mileage" id="ValidField6" />







                </div>







        <div class="catHolder">







                  <label>Are you a Auto Trader?<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="dealer" value="Yes" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="dealer" value="No" />







          No </span> </div>







      </div>







              <?php } ?>







              <?php if($cat_name1=="Vans" && $cat_name2!='Vans Wanted'){ ?>







              <div class="Right">







        <h4>Price you would like for your item?</h4>







        <div class="Right">







                  <div class="catHolder">







            <label>Price<b>*</b>:</label>







            <input type="text" name="price" id="ValidField4"/>







          </div>







                </div>







        <h4>Vehicle Specification</h4>







        <div class="catHolder">







                  <label>Make<b>*</b>:</label>







                  <?php







					







					







					 $select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='38' order by name asc";







	$run_make=mysql_query($select_make);







	?>







                  <select name="make" id="ValidSelection">







            <?php 







	







	while($fetch_make=mysql_fetch_array($run_make)){







		$make_id=$fetch_make['id'];







		$make_name=$fetch_make['name'];







	?>







            <option value="<?php echo $make_id; ?>"<?php if($cat_name2_id==$make_id){?> selected="selected"<?php } ?>><?php echo ucfirst($make_name); ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Year<b>*</b>:</label>







                  <select name="year" id="ValidSelection2">







            <option value="">Please Select</option>







            <?php 







	$currentYear = date("Y"); 







	$years = range ($currentYear, 1930); 







	foreach ($years as $value) {







echo "<option value=\"$value\">$value</option>\n";







} 







	?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Model<b>*</b>:</label>







                  <input type="text" name="model" id="ValidField3" />







                </div>







        <div class="catHolder">







                  <label>Fuel Type<b>*</b>:</label>







                  <select name="fuel_type" id="ValidSelection3">







            <option value="">Please Select</option>







            <option value="Petrol">Petrol</option>







            <option value="Diesel">Diesel</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Body Type<b>*</b>:</label>







                  <select name="body_type" id="ValidSelection4">







            <option value="">Please Select</option>







            <option value="2 Door Saloon">2 Door Saloon</option>







            <option value="4 Door Saloon">4 Door Saloon</option>







            <option value="Saloon">Saloon</option>







            <option value="Convertible">Convertible</option>







            <option value="Coupe">Coupe</option>







            <option value="Estate">Estate</option>







            <option value="3 Door Hatchback">3 Door Hatchback</option>







            <option value="5 Door Hatchback">5 Door Hatchback</option>







            <option value="Sports">Sports</option>







            <option value="Light 4x4 Utility">Light 4x4 Utility</option>







            <option value="MPV">MPV</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Transmission<b>*</b>:</label>







                  <select name="transmission" id="ValidSelection5">







            <option value="">Please Select</option>







            <option value="Manual">Manual</option>







            <option value="Automatic">Automatic</option>







            <option value="Other">Other</option>







          </select>







                </div>







        <div class="catHolder">







                  <label>Colour<b>*</b>:</label>







                  <input type="text" name="colour" id="ValidField5" />







                </div>







        <div class="catHolder">







                  <label>Engine Size(CC)<b>*</b>:</label>







                  <input type="text" name="engine_size" id="ValidField7" />







                </div>







        <div class="catHolder">







                  <label>Mileage<b>*</b>:</label>







                  <input type="text" name="mileage" id="ValidField6" />







                </div>







        <div class="catHolder">







                  <label>Are you a Auto Trader?<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="dealer" value="Yes" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="dealer" value="No" />







          No </span> </div>







      </div>







              <?php } ?>







              







              <!--//////////////////////////////-->







              <?php if($cat_maincat_name=="Jobs"){ ?>







              <div class="Right">







        <h4>Job Contract Type</h4>







        <div class="catHolder">







                  <label>Contract<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="jobcontract" value="Permanent" />







          Permanent&nbsp;&nbsp;







          <input type="radio" name="jobcontract" value="Temporary" />







          Temporary </span> </div>







        <div class="catHolder">







                  <label>Salary<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField8"/>







                </div>







                <div class="catHolder">







                  <label>Pay Type<b></b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="paytype" value="Monthly" />







          Monthly&nbsp;&nbsp;







          <input type="radio" name="paytype" value="Weekly" />







          Weekly </span>







              







      </div>







      







      <div class="catHolder">







                  <label>Are you an employment Agency<b></b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="empagency" value="Yes" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="empagency" value="No" />







          No </span>







              







      </div>







       







      </div>







              <?php } ?>







              







              <!--Motorbikes, Scooters & Parts-->







              <?php 







	if($cat_maincat_name=='Motorbikes, Scooters & Parts'&& $cat_name1!="Motorbike Parts & Accessories"){







		?>







              <div class="Right">







        <h4>Price you would like for your item?</h4>







        <div class="catHolder">







                  <label>Price<b>*</b>:</label>







                  <input type="text" name="price" id="ValidField4"/>







                </div>







                







                 <!--<div class="catHolder">







                  <label> Bike specification<b></b>:</label>







                  <input type="text" name="bikespec" id="ValidField8"/>







                </div>--> 







               







        <div class="catHolder">







                  <label>Make<b>*</b>:</label>







                  <?php $select_make="SELECT id,name,show_hide,parent_off FROM categories WHERE parent_off='".$cat_name1_id."' order by name asc";







	$run_make=mysql_query($select_make);







	?>







                  <select name="make" id="ValidSelection">







            <?php 







	







	while($fetch_make=mysql_fetch_array($run_make)){







		$make_id=$fetch_make['id'];







		$make_name=$fetch_make['name'];







	?>







            <option value="<?php echo $make_id; ?>"<?php if($cat_name2_id==$make_id){?> selected="selected"<?php } ?>><?php echo ucfirst($make_name); ?></option>







            <?php } ?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Year<b>*</b>:</label>







                  <select name="year" id="ValidSelection2">







            <option value="">Please Select</option>







            <?php 







	$currentYear = date("Y"); 







	$years = range ($currentYear, 1930); 







	foreach ($years as $value) {







echo "<option value=\"$value\">$value</option>\n";







} 







	?>







          </select>







                </div>







        <div class="catHolder">







                  <label>Model<b>*</b>:</label>







                  <input type="text" name="model" id="ValidField3" />







                </div>







        <div class="catHolder">







                  <label>Colour<b>*</b>:</label>







                  <input type="text" name="colour" id="ValidField5" />







                </div>







        <div class="catHolder">







                  <label>Engine Size(CC)<b>*</b>:</label>







                  <input type="text" name="engine_size" id="ValidField7" />







                </div>







        <div class="catHolder">







                  <label>Mileage<b>*</b>:</label>







                  <input type="text" name="mileage" id="ValidField6" />







                </div>







        <div class="catHolder">







                  <label>Are you a Auto Trader?<b>*</b>:</label>







                  <span id="ValidRadio" class="InputGroup">







          <input type="radio" name="dealer" value="Yes" />







          Yes&nbsp;&nbsp;







          <input type="radio" name="dealer" value="No" />







          No </span> </div>







      </div>







              <?php } ?>







              







              <!--END--> 







              







              <!--For Sale-->







              <?php 







	if($cat_maincat_name=='For Sale'){







		?>







              <div>







        <div class="Right">







                  <h4>Price you would like for your item?</h4>







                  <div class="catHolder">







            <label>Price<b>*</b>:</label>







            <input type="text" name="price" id="ValidField4"/>







          </div>







                </div>







        <?php







	}







	?>







        







        <!--END--> 







        







        <!--Pets, Animals & Equestrains-->







        <?php 







	if($cat_maincat_name=='Pets, Animals & Equestrains'){







		?>







        <div>







                  <div class="Right">







            <h4>Price you would like for your item?</h4>







            <div class="catHolder">







                      <label>Price<b>*</b>:</label>







                      <input type="text" name="price" id="ValidField4"/>







                    </div>







          </div>







                  <?php







	}







	?>







                  







                  <!--END--> 







                  







                  <!--Tractors & Plants-->







                  <?php 







	if($cat_maincat_name=='Tractors & Plants'){







		?>







                  <div>







            <div class="Right">







                      <h4>Price you would like for your item?</h4>







                      <div class="catHolder">







                <label>Price<b>*</b>:</label>







                <input type="text" name="price" id="ValidField4"/>







              </div>







                    </div>







            <?php







	}







	?>







            







            <!--END--> 







            







            <!--<div class="Right">







             	<h4>How much do you want for your item?</h4>







             	<div class="catHolder">







                	<label>Price<b>*</b>:</label>







                	<input type="text">                                  







                </div>                                            







             </div>-->







            <div class="Right">







                      <h4>Description</h4>







                      <div class="catHolder">







                <label>Description<b>*</b>:</label>







                <textarea name="description" cols="50" rows="10" id="description11" maxlength="5000"></textarea>







                <small>Maximum 5000 letters are allowed</small> </div>







                    </div>







            <div class="Right">







                      <h4>Ad Imges</h4>







                      <div class="">







                <div id="uploader">







                          <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>







                        </div>







                <div id="status"></div>







              </div>







                      <small>Maximum 10 images can be uploaded. You can drag and drop all images at once.</small> </div>







            <div class="Right">







                      <h4>Do you have a website? Add a free link!</h4>







                     <!-- <h5>Link to your website for free.</h5>-->







                      <div class="catHolder"> 







                <!--<p>Link to your website for <strong>£7.50</strong> - view example</p>-->







                <label>







                          <input type="checkbox" class="cb" onclick="doit()" name="link_website" rel="7.50" id="link_website" value="7.50" />







                          Link  to website : </label>







                <input type="text" name="link_site" />







              </div>







                    </div>







            <div class="Right">







                      <h4>Add a youtube link for your ad</h4>







                      <div class="catHolder">







                <label>Youtube Link:</label>







                <input type="text" name="youtube_link" />







              </div>







                    </div>







            <?php /*?><div class="Right">







             	<h4>Make your ad stand out! Select an option below to promote your ad</h4>







             	<div class="catHolder">







                	<p>Link to your website for <strong>£7.50</strong> - view example</p>







                	<label class="lable-p"><input type="checkbox" name="list[]" class="childCheckBox cb" value="urgent_9.95_7" id="one" rel="9.95" onclick="doit()" /> URGENT</label>







                	<p>Up to 3 times more views and replies*. Perfect if you need to sell, rent or hire quickly. View example <b>7 days - £9.95</b></p>







                	<label class="lable-p bg-colgreen"><input type="checkbox" name="list[]" class="childCheckBox cb" value="featured" rel="15.50" onclick="doit()" /> FEATURED</label>







                	<p>Up to 7 times more views and replies*. Your ad will appear at the top of the listings for 3, 7 or 14 days. View example







                    







                    <?php 







		 







		 $select_feature_pakage="SELECT id,days,price FROM  lime_price";







		 $run_feature_pakage=mysql_query($select_feature_pakage);







		 $num_rows_pakage=mysql_num_rows($run_feature_pakage);







		 ?>







                    <select name="featured_p" id="model">







         <?php 







		 







		  







		 while($fetch_lime_pake=mysql_fetch_array($run_feature_pakage)){







		 







		 $days_pack=$fetch_lime_pake['days'];







		 $price_pack=$fetch_lime_pake['price'];







		 







		 if($num_rows_pakage >0){







		 ?>







         







         <option value="<?php echo "feature_".$price_pack."_".$days_pack; ?>"><?php echo $days_pack." days - &pound;".$price_pack; ?> </option>







         <?php } }?>







         







         







         







         </select>







                    </p>







                    <label class="lable-p bg-colblue"><input type="checkbox" name="list[]" value="spotlight_23.50_7" class="childCheckBox cb" rel="23.50" onclick="doit()" /> Spotlight</label>







                	<p>Your ad will appear on the Gumtree homepage and will be seen by millions of people. View example <b>7 days - £23.50</b></p>                            







                </div>                                            







             </div><?php */?>







            <div class="Right">







                      <h4>What is your preferred contact option ?</h4>







                      <div class="catHolder">







                <p>Select either contact option for your ad</p>







                <label>Contact Name</label>







                <input name="name" type="text" readonly value="<?php echo $session_first_name; ?>"/>







                <p></p>







                <br>







                <br>







                <br>







                <label>







                          <input type="checkbox" name="via_email" checked="checked" value="<?php echo $session_email; ?>" />







                          Via email on</label>







                <input name="email" type="text" readonly value="<?php echo $session_email; ?>"/>







                <p>Your email address will not shown on your ad</p>







                <label>







                          <input type="checkbox" name="via_phone"  value="<?php echo $session_phone; ?>" />







                          By phone on</label>







                <input name="phone" type="text" readonly value="<?php echo $session_phone; ?>"/>







                <p>Your phone number will be shown on ad</p>







              </div>







                    </div>







            <!--<div class="Right">







             	<div class="catHolder" style="background:lightyellow">







                	<label><b>Total Amount:</b></label>







                	<span class="m0">$250.05</span>               







                </div>                                            







             </div>-->







            <div class="Right">







                      <div class="catHolder">







                <label style="width:60%; line-height:42px;">By clicking 'Submit', you agree to Elaxy's posting rules and terms of use.</label>







                <input id="category-select_submit-category" name="submit-category" class="button pull-right" value="Submit" data-parent-component="#post-ad-category-select" type="submit">







              </div>







                    </div>







            <!--<p>*Average comparison in ad views and replies between ads that are not promoted and "urgent" or "featured" ads respectively, measured on the Elaxy website from March 2012 to March 2013</p>--> 







          </div>







                </div>







      </div>







            </form>







    <div class="clear"></div>







    <div class="right_ad" style="top:-5px;">







              <?php if(!empty($ad_code_right)){ echo $ad_code_right; } else if(!empty($adsen_right_image)){?>







              <img src="admin_xel/media/large_gallery/<?php echo $adsen_right_image; ?>">







              <?php } ?>







            </div>







  </div>







        </section>







<div class="clear"></div>







<?php require_once('inc/footer.php'); ?>







<script type="text/javascript">







// Initialize the widget when the DOM is ready







$(function() {







	$("#uploader").plupload({







		// General settings







		runtimes : 'html5,flash,silverlight,html4',







		url : 'upload.php',















		// User can upload no more then 20 files in one go (sets multiple_queues to false)







		max_file_count: 10,







		







		chunk_size: '1mb',







		unique_names : true,















		// Resize images on clientside if we can







		//resize : {







			//width : 200, 







			//height : 200, 







			//quality : 90,







			//crop: true // crop to exact dimensions







	//	},







		







		filters : {







			// Maximum file size







			/*max_file_size : '1000mb',*/







			max_file_size : '500kb',







			// Specify what files to browse for







			mime_types: [







				{title : "Image files", extensions : "jpg,gif,png"},







				{title : "Zip files", extensions : "zip"}







			]







		},















		// Rename files by clicking on their titles







		rename: true,







		







		// Sort files







		sortable: true,















		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)







		dragdrop: true,















		// Views to activate







		views: {







			list: true,







			thumbs: true, // Show thumbs







			active: 'thumbs'







		},















		// Flash settings







		flash_swf_url : '../js/Moxie.swf',















		// Silverlight settings







		silverlight_xap_url : '../js/Moxie.xap'







	});























	// Handle the case when form was submitted before uploading has finished







	/*$('form').submit(function(e) {*/







		// Files in queue upload them first







		/*if ($('#uploader').plupload('getFiles').length > 0) {*/















			// When all files are uploaded submit form







			/*$('#uploader').on('complete', function() {







				$('form')[0].submit();







			});















			$('#uploader').plupload('start');







		} else {







			alert("You must have at least one file in the queue.");







		}*/







		







	







		







		/*return false;*/ // Keep the form from submitting







	/*});*/







});





$( "#manual_loc" ).click(function () {

  var str = "";

  //$( "select[name=make] option:selected" ).each(function() {

	  

     str = $("select[name=selcontry] option:selected").attr("value");

	 $("#postcode_loc").html("<div style='margin-left:20px; margin-top:20px;'><img src='images/loader.gif'> Please wait we proccess your request... </div> ");

	 $(".postcode_town").html("");

		$.post("manual_loc.php",{cid:str},function(result){

			

			

			$("#postcode_loc").html(result);

		  });	  

    //});

  });

</script>







</body>







</html>