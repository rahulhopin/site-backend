<?php
include_once('model/'.$mvc['model']);
include_once('view/'.$mvc['view']);
include_once('controller/'.$mvc['controller']);

$model = new $mvc['model_class'];
$view = new $mvc['view_class'];
$controller = new $mvc['controller_class'];


$output = $controller->action($input,$model);
$view->renderView($output);

?>
