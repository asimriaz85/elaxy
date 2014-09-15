<?php

class adsens
{

public function Display_Ads($pagename,$location){
	
	$select_left_adsen="SELECT id,ad_code,images FROM adsens_ad WHERE ad_page_name='{$pagename}' AND location='{$location}' AND status='Show'";
$run_left=mysql_query($select_left_adsen);
$fetch_left_adsen=mysql_fetch_array($run_left);
$adsen_left_image=$fetch_left_adsen['images'];
$ad_code_left=$fetch_left_adsen['ad_code'];

$ad=array('Image'=>$adsen_left_image,'AdCode'=>$ad_code_left);
return $ad;
	
	}




}

?>