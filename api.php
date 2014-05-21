<?php
//require '/home/gourav/Mooov/trunk/autoload.php';
require("Rest/ServiceFactory.php");
require_once "objects/JSONMessage.php";

ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . "/var/www/html");
//echo "Welcome\n";
$url = $_SERVER['REQUEST_URI'];
$response = "";
$serviceFactory = new ServiceFactory($url);
$response = $serviceFactory->serve();


echo $response;

?>
