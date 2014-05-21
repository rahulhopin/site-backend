<?php
//require_once("/home/gourav/Mooov/trunk/autoload.php");
require_once('RestService.php');
require_once('objects/chat.php');
require_once('objects/chat_bind.php');


class ChatService extends RestService {


	public function createUser($arguments){
		$user = new Chat();
		return $user->createUser($arguments);
	}

	 public function deleteUser($arguments){
                $user = new Chat();
                return $user->deleteUser($arguments);
        }

	public function attachSession($arguments){
		$user = new Chat();
		$u = $user->createUser($arguments);
		// decode the user
		$user_array  = json_decode($u , true);
		$username = $user_array['body']['username'];
		$password = $user_array['body']['password'];
		$connection = new Xmpp_Bosh();
		$connection->connect( $username , $password );
		$rid = $connection->getRid();
		$jid = $connection->getJid();
		$sid = $connection->getSid();
		$res['jid'] = $jid;
		$res['sid'] = $sid;
		$res['rid'] = $rid;
		return  $res;
	}        
}


?>
