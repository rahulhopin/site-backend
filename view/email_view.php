<?php
include_once('view.php');
Class EmailView extends View{

public function renderView($output){
 if($output)
	parent::renderView('<p> Email verified sucessfully </p>');
 else
	parent::renderView('<p> Email couldn\'t be verified. Please try again. </p>');

}
}
