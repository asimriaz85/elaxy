<?php
function getLatLong($code){
 $mapsApiKey = 'your-google-maps-api-key';
 $query = "http://maps.google.co.uk/maps/geo?q=".urlencode($code)."&output=json&key=".$mapsApiKey;
 $data = file_get_contents($query);
 // if data returned
 if($data){
  // convert into readable format
  $data = json_decode($data);
  $long = $data->Placemark[0]->Point->coordinates[0];
  $lat = $data->Placemark[0]->Point->coordinates[1];
  return array('Latitude'=>$lat,'Longitude'=>$long);
 }else{
  return false;
 }
}

print_r(getLatLong('SW1W 9TQ'));

 ?>