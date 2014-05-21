<?php
error_log("===== verify ==");
	$mvc = array('model' => 'model.php', 'view' => 'agent_view.php' , 'controller' => 'email_controller.php',
		      'model_class' => 'Model' , 'view_class' => 'AgentView' , 'controller_class' => 'EmailController' 
	            );

	include('routing.php');

?>
