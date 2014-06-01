<?php
require_once('RestService.php');
require_once('objects/user_details.php');
require_once('objects/request.php');
require_once('objects/feedback.php');
require_once('objects/dbclass.php');

class UserDetailsService extends RestService
{
	
	public function saveFBInfo($arguments)
	{
		$user_details = new UserDetails();
		$user_details->add($arguments);
	}

 public function getFBInfo($arguments){
		$user_details = new UserDetails();
		return $user_details->get($arguments); 
 }

 public function getReferers($arguments){
	$user_details = new UserDetails();
        $user_details->getReferers($arguments);

}
 public function saveReferrer($arguments){
        $user_details = new UserDetails();
        $user_details->saveReferers($arguments);

}
 public function getInfo($arguments){
  $requestobj = new Request();
  if(!isset($arguments['target_user_id'])){
   throw new APIException(array("code" =>"3" , 'error' => 'Required Fields are not set.'));
  }
  $dbobject = new dbclass();
  $sql = "select * from user_details where user_id = " . $arguments['target_user_id'];
  $result = $dbobject->execute($sql);
  if($result->num_rows > 0){
   $details = $result->fetch_assoc();
  }else{
   $details = array();
  }
  if(isset($arguments['insta']) && $arguments['insta'] == 0){
   $sql = "select * from carpool where user_id = " . $arguments['target_user_id'];
   $result = $dbobject->execute($sql);
   if($result->num_rows > 0){
    $request = $result->fetch_assoc();
   }else{
    throw new APIException(array("code" =>"2" , 'error' => 'No carpool requests exists'));
   }
   $requestobj->showMatches(array(array('match' => $arguments['target_user_id'], 'details' => $details, 'request' => $request)), 0, 1);
  }else{
   $sql = "select * from request where user_id = " . $arguments['target_user_id'];
   $result = $dbobject->execute($sql);
   if($result->num_rows > 0){
    $request = $result->fetch_assoc();
   }else{
    throw new APIException(array("code" =>"2" , 'error' => 'No Insta requests exists'));
   }
   $requestobj->showMatches(array(array('match' => $arguments['target_user_id'], 'percent'=>100,'details' => $details, 'request' => $request)), 0, 0);
  }
 }

 public function saveFeedBack($arguments)
 {
  $feedback = new Feedback();
  $feedback->savefeedback($arguments);

 }
 public function getUserFriends($arguments){
  $fbid = $arguments['fbid'];
  $start = $arguments['offset'];
  $limit = $arguments['limit'];
  $request = new Request();
  $friends = $request->getFriendsToInvite($fbid,$start,$limit);
  $json_msg = new JSONMessage();
  $json_msg->setBody (array("FriendsToInvite" =>$friends));
  echo $json_msg->getMessage(); 
 }

 public function inviteFriend($arguments){
  $from = $arguments['from'];
  $to = $arguments['to'];
  $dbobject = new dbclass();
  $sql = "update friends set invited=1 where fbid1=$from and fbid2 in ($to)";
  $dbobject->execute($sql);
  $json_msg = new JSONMessage();
  $json_msg->setBody (array("Success"=> $to));
  echo $json_msg->getMessage();
 }	

 public function saveContacts($arguments){
  $user_id = $arguments['user_id'];
  $username = $arguments['username'];
  $contacts = $arguments['contacts'];
  $dbobject = new dbclass();
  $sql = "insert into contacts (user_id,username,contacts) values ($user_id , '$username' , '$contacts')";
  $dbobject->execute($sql);
  $json_msg = new JSONMessage();
  $json_msg->setBody (array("Success"=> $user_id));
  echo $json_msg->getMessage();
 }

 public function getRideTicker($arguments){
   $request = new Request();
   //$matches = $request->getMacthes($arguments);
   //$count($matches < 10){
   $dbobject = new dbclass();
   $sql = "select fbid , firstname, location , src_locality ,src_address ,dst_address,lastupd from user_details u , request r where r.user_id = u.user_id order by lastupd desc limit 10";
  
   if(isset($arguments['area']))
   	$sql = "select fbid , firstname, location , src_locality ,src_address ,dst_address,lastupd from user_details u , request r where r.user_id = u.user_id and src_address like '%". $arguments['area'] .  "%' order by lastupd desc limit 10";
   $result = $dbobject->execute($sql);     
   $feed = array(); 
   while($row = $result->fetch_assoc()){
     $location =  unserialize($row['location']);
     $locality =  $row['src_locality'];
     $address = $row['src_address'];
     //if(empty($locality)){ 
      $parts = explode("," ,$address);
      $size  =count($parts);
      if($size >2 )
         $locality = $parts[$size-2] . ","  . $parts[$size-1];
      else if ($size > 1)
         $locality = $parts[$size-1];

     //}
      $req_time = "few minutes ago";
      $name= $row['firstname']; 
      $time = $row['lastupd'];
      $unix_time= strtotime($time);
      $current_time = time();
      $diff = $current_time - $unix_time;
      $mins = ceil($diff/60);
      if($mins < 60){
       $req_time = "$mins mins ago";
      }
     else
     {
       $hours = ceil($mins/60);
       if($hours < 24)
        $req_time = "$hours  hours ago";
       else{
         $days = ceil($hours/24);
         $req_time = "$days days ago";
      }
     }
      if(!empty($location['name']))
       $row['src_locality'] =  $name. " (" . $location['name'] . ")";
      else if(!empty($locality))
       $row['src_locality'] =  $name. " (" . $locality . ')';
     else
      $row['src_locality'] =  $name;

     $feed[] = array('fbid' => $row['fbid'], 'time' => $req_time , 'location' => $row['src_locality'] , 'src' => $row['src_address'] , 'dst' => $row['dst_address']);
   }
  $json_msg = new JSONMessage();
  $cutofftime = time();
  $json_msg->setBody (array("LiveFeed"=> $feed, 'cutofftime' => $cutofftime));
  return $json_msg->getMessage();

 }
}
