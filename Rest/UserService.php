<?php
//require_once("/home/gourav/Mooov/trunk/autoload.php");
require_once('RestService.php');
require_once('objects/user.php');
require_once('utils/siteutils.php');
require_once('objects/dbclass.php');
require_once("objects/exception.php");

class UserService extends RestService {


 public function addUser($arguments){
   $user = new User();
   $user->add($arguments);
  }
   
 public function sendMail($arguments){
	$email_id = $arguments['address'];
	$subject = $arguments['subject'];
	$msg = $arguments['message'];
	$profile = $arguments['profile'];
	$email_id = SiteUtils::decrypt($email_id);
	SiteUtils::sendEmail($email_id,$subject , $msg  , $profile);
		 $json_msg = new JSONMessage();
                 $json_msg->setBody("success");
                 echo $json_msg->getMessage();
 }     

 public function getUserID($arguments){
  $user = new User();
  $user->get($arguments);
 }

 public function addRegID($arguments){
  $user = new User();
  $user->addRegID($arguments);
 }

 // checks for existence of user
 public function checkUser($arguments){
  $db = new PDO('mysql:host=localhost;dbname=hopon_qa', 'root' , 'h0p1nadm1n');
  $email = $arguments['email'];
  $password = md5($arguments['password']);
  $sql = "select * from user where email=:email and password=:password";
  $stmt = $db->prepare($sql);
  $stmt->execute(array(':email' => $email,  ':password' => $password));

  if($stmt->rowCount() > 0){
		 $res = $stmt->fetch();
		 $json_msg = new JSONMessage();
                 $json_msg->setBody(array("user_id" => $res[0]['id']));
                 echo $json_msg->getMessage();
   }

  else {
	 throw new APIException(array("code" =>"3" ,'field'=>'email/password', 'error' => 'Incorrect email/password'));
  }
	 
 }


 public function verifyEmail($arguments){
  $db = new PDO('mysql:host=localhost;dbname=hopon_qa', 'root' , 'h0p1nadm1n');
  $token = $arguments['token'];
  $email = $arguments['email'];

  $id =  SiteUtils::decrypt($token);
  //Query temporary token to verify email
  $sql = "select * from user where email=:email  and id=:id";
  $stmt = $db->prepare($sql);
  $stmt->execute(array(':email' => $email , ':id' => $id) );

  if($stmt->rowCount() > 0){
    $sql1 = "update user set verified=1 where id=:id";
    $st = $db->prepare($sql1);
    $st->execute(array(':id' => $id));
   return true;
  }
  return false;
 }

}


?>
