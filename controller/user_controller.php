<?php
include_once('controller.php');
include_once('Rest/UserDetailsService.php');
Class UserController extends Controller{

public function action($input , $model){
	$dbobject = new dbclass();
        $dbobject->connect();
	$request = new UserDetailsService();
	$user_id = SiteUtils::decrypt($input['id']);
	if($_COOKIE['network'] == 'fb')
		$input['fbid'] = $user_id;
	else
		$input['user_id'] = $user_id;
        $output = $request->getFBInfo($input);	
	return $output;
}

}
?>
