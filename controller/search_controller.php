<?php
include_once('controller.php');
include_once('Rest/RequestService.php');
Class SearchController extends Controller{

public function action($input , $model){
	$dbobject = new dbclass();
	Cache::init();
        $dbobject->connect();
	$request = new RequestService();
        	$output = $request->getCarpoolMatches($input);	
	/*if($input['ride_type'] == 0)
        	$output = $request->getCarpoolMatches($input);	
	else	
		$output = $request->getMatches($input);
	*/return $output;
}

}
?>
