<?php
require('config.php');


   $query = mysql_query("SELECT * FROM postcode_location");
	  
	  while($record = mysql_fetch_array($query))
	  {
	  
	       $address ="";
		  if($record['postcode']!="")
		   $address .= $record['postcode'];
		  
		  if($record['town']!="")
		  $address .= " ".$record['town']; 
		  
		  
		   if($record['city']!="")
		  $address .= " ".$record['city']; 
		  
		   if($record['county']!="")
		  $address .= " ".$record['county']; 
		  
		  if($record['country']!="")
		  $address .= " ".$record['country'];
		  
		
	  
	    $address2[] = array("Address" =>  $address , "Name" =>  '<b>'.$record['companyname'].'</b><br/><br/>'.$address);
	  }


/*$address = array(
		"1" => array("Address" => "BS37 5QX 35 Lavenham Road The Red Kite Baby Co Ltd Bristol Enquiries Line- 01454 326 555" , "Name" => "The Red Kite Baby Co Ltd"),
		"2" => array("Address" => "M26 1UL 3 Ashurst Grove 4 Little Tots Manchester 0845 867 6783" , "Name" => "4 Little Tots"),
		"3" => array("Address" => "DY2 7BJ 30 Churchill Precinct A Oakes- Babyland West Midlands 01384 255600" , "Name" => "Santacruz"),
		"4" => array("Address" => "BB5 1EH 57-59 Abbey Street Accrington Baby Centre Lancs 01254 230101" , "Name" => ""),
		"5" => array("Address" => "S62 6LH Unit 12 Gateway Court Affordable Baby Care Rotherham 01709 719192" , "Name" => ""),
		"6" => array("Address" => "BT33 0AD 35 Main Street Annetts Co Down 02843 722 957" , "Name" => "Goregaon"),
		"7" => array("Address" => "DN16 2RX 286 Ashby High Street Ashby Baby Centre North Lincs 01724 845 309" , "Name" => "Malad"),
		"8" => array("Address" => "DN14 0BP Mill Farm Babe-equip Great Heck 01977 663306" , "Name" => "Kandivili"),
		"9" => array("Address" => "LA14 1SB 10 - 14 Cavendish Street Baby Bitz Cumbria 01229 828988", "Name" => "Borivali"),
		"10" => array("Address" => "Ireland Chapel Street Baby Care Co. Mayo 00 353 949027422", "Name" => "Dahisar"),
		"11" => array("Address" => "LS18 4QB 96-98 New Road Side Baby Direct Ltd Leeds 0113 225 0505" , "Name" => "Mira Road"),
		"12" => array("Address" => "BD21 3PQ 61 - 62 New Market Hall Babycare Keighley 01535 601208" , "Name" => "Bhayander"),
		"13" => array("Address" => "DH1 4SJ Unit 1 The Gates Bambinos Durham City" , "Name" => "Naigaon"),
		"14" => array("Address" => "FY4 2JE 91 Highfield Road Bambinos Blackpool 01253 408944" , "Name" => "Vasai"),
		"15" => array("Address" => "KY1 1LD 346-348 High Street Babyland Scotland 01592 205 176" , "Name" => "Nallasopara"),
		"16" => array("Address" => "HD2 1UA Unit A, Trident Business Park Bambino Direct Leeds Road, Huddersfield 0844 774 6303" , "Name" => "Virar"),
		"17" => array("Address" => "CH5 1QB 72-74 Chester Road East Beehive Babyland Deeside 01244 830082" , "Name" => "Churchgate"),
		"18" => array("Address" => "NG34 7SY 49a Southgate Bennellies Lincolnshire 08455441932" , "Name" => "Charni Road"),
		"18" => array("Address" => "CW12 3SW 12 Knebworth Court Cabbage Patch Corner Cheshire 01260 270 542" , "Name" => "Grant Road"),
		"19" => array("Address" => "WS15 2DY Shop 8 Elegant Babies Rugeley" , "Name" => "Dadar"),
		"20" => array("Address" => "PR5 6ED 287 Station Road Early Days Preston 01772 335 485" , "Name" => "Mahim"),
		"21" => array("Address" => "BL2 2HR 129/131 Tonge Moor Road Euro Fancy Lancs 01204 384512" , "Name" => "King Circle"),
		"22" => array("Address" => "EH52 5AU Unit 4 Westerton Road First Furnishings Broxburn, West Lothian 01506 852842" , "Name" => "Worli"),
		);*/
		
		foreach($address2 as $Idx => $key){
		$addr = urlencode($key['Address']);
		$url = 'http://maps.google.com/maps/geo?q='.$addr.'&output=csv&sensor=false';
		//Initialize the Curl session
		$ch = curl_init();
		
		//Set curl to return the data instead of printing it to the browser.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//Set the URL
		curl_setopt($ch, CURLOPT_URL, $url);
		//Execute the fetch
		$data = curl_exec($ch);
		//Close the connection
		curl_close($ch);

		
	
	     //$get = file_get_contents($url);
		$records = explode(",",$data );
		
		//print_r($records) ;exit;
		
		$lat = $records[2];
		$lng = $records[3];
		
		$data2[] = array('Lat'=>$lat, 'Lng'=>$lng, 'Name'=>$key['Name']);
		
		// wait for 1 seconds
		usleep(1000);
		}
	echo json_encode($data2);
?>