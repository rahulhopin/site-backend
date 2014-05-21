<?php
require_once('conf/google.conf');
require_once('objects/utils.php');
class  GeoCoding
{

private $googleURL;
private $addresses;
var $mapped_cities = array('thane' => 'mumbai');

public function  __construct()
{
 $this->googleURL = GOOGLE_URL;
}

public function geocode($address){
 $address=urlencode($address);
 $geocodeURL = "http://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=false"; 
 Logger::do_log("Google api call: $geocodeURL");
 $ch = curl_init($geocodeURL);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
	$data = curl_exec($ch);
	$results = json_decode($data,true);
	curl_close($ch);
 $ret = array();
 if($results['status'] != 'OK'){
   Logger::do_log("Google geocoding call failed");
   return false;  
			//throw new APIException(array("code" =>"1" ,'reference'=>Logger::$rid, 'error' => 'Internal Error'));
 }
 $max=0;
 $winner=array();
 foreach($results['results'] as $result){
  similar_text($address, $result['formatted_address'],&$percent);
  if($max <= $percent){
   $max=$percent;
   $winner=$result;
  }
 }
 //Logger::do_log("Winner: " . print_r($winner,true));
 $ret['lat'] = $winner['geometry']['location']['lat'];
 $ret['lon'] = $winner['geometry']['location']['lng'];
 $addrs = $winner['address_components'];
 foreach($addrs as $addr){
  if(in_array('sublocality',$addr['types'])){ $ret['sublocality'] = $addr['long_name']; break;}
 }
 //if(!isset($ret['sublocality'])) $ret['sublocality'] = "na";
 return $ret;
}


public function reverseGeo($lat,$lng)
{
 //$lat =  '19.1154908';
 //$lng = '72.87269519999995';
 $geoCodeURL = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=false"; 
 Logger::do_log($geoCodeURL);

 $results = json_decode(file_get_contents($geoCodeURL), true); 
 $resp = array();
 $ret = array();
 if($results['status'] != 'OK'){
   Logger::do_log("Google geocoding call failed");
   return false;
 }
 $min=100000000;
 $winner=array();
 foreach($results['results'] as $result){
  $dist = Utils::geo2distance($lat,$lng,$result['geometry']['location']['lat'], $result['geometry']['location']['lng']);
  if($min >= $dist){
   $min=$dist;
   $winner=$result;
  }
 }
 //Logger::do_log("Winner: " . print_r($winner,true));
 $ret['formatted_address'] = $winner['formatted_address'];
 $addrs = $winner['address_components'];
 foreach($addrs as $addr){
  if(in_array('sublocality',$addr['types'])){ $ret['sublocality'] = $addr['long_name']; break;}
 }
 //if(!isset($ret['sublocality'])) $ret['sublocality'] = "na";
 return $ret;

 /*$results = $results['results'];
 foreach ($results as $subresult){
  $resp = array();
  $resp['formatted_address'] = $subresult['formatted_address'];
	 $subresult = $subresult['address_components'];
  foreach($subresult as $address){
   if($address['types'][0] == 'sublocality'){
    $locality_shortname = $address['short_name'];
    $locality_longname = $address['long_name'];
    $resp['sublocality_shortname'] = $locality_shortname ;
    $resp['sublocality_longname'] = $locality_longname;
   }
		 if($address['types'][0] == 'locality'){
			 $locality_shortname = $address['short_name'];
			 $locality_longname = $address['long_name'];
    $resp['locality_shortname'] = $locality_shortname ;
    $resp['locality_longname'] = $locality_longname;
		 }
   if($address['types'][0] == 'postal_code'){
			 $resp['postal_code'] = $address['short_name'];
   }
   if($address['types'][0] == 'administrative_area_level_1'){
 			$resp['state'] = $address['long_name'];
	 		$resp['state_code'] = $address['short_name'];
   } 
 		if($address['types'][0] == 'country'){
    $resp['country'] = $address['long_name'];
    $resp['coutry_code'] = $address['short_name'];
   }             
  }
  $this->addresses[] =$resp;
 } 
 return $this->addresses;*/
}


public function getCity($lat,$lan){
  $results = $this->reverseGeo($lat,$lan);
  $city='';
  foreach($results as $result){
    if(isset($result['locality_longname'])){
        $city= strtolower($result['locality_longname']) ;
        break;
      }
  }
  if(isset($this->mapped_cities[strtolower($city)])){
    $city = $this->mapped_cities[strtolower($city)];
  }
  return $city;
}

}
/*
$gc = new GeoCoding();
//$r = $gc->getCity('19.1231172','72.8771669');
$r = $gc->getCity('19.224','72.9177');
print_r($r);
*/
?>
