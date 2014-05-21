<?php
include_once('controller.php');
include_once('Rest/UserService.php');
Class EmailController extends Controller{

public function action($input , $model){
	$dbobject = new dbclass();
        $dbobject->connect();
	$user = new UserService();
        $output = $user->verifyEmail($input);	
	return $output;
}

}
?>
