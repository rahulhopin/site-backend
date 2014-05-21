<?php
include_once('controller.php');
include_once('Rest/UserDetailsService.php');
Class ProfileController extends Controller{

public function action($input , $model){
	$dbobject = new dbclass();
        $dbobject->connect();
	$request = new UserDetailsService();
        $output = $request->getFBInfo($input);	
	return $output;
}

}
?>
