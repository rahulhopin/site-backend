<?php
ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . "/var/www/qa/html/rahul");
//this is a dynamic routing class entry point 
require('utils/siteutils.php');

$request_params = SiteUtils::parseRequest();
SiteUtils::buildGlobaldata();
$request_type =  $request_params['type'];
$GLOBALS['site'] = 1;  // this is only for site
$input = $request_params;

switch($request_type){
case 'home':
	include('home.php');
	break;
case 'search':
	include('search.php');
	break;
case 'user':
	include('user.php');
	break;
case 'postRequest':
	include('request.php');
	break;
case 'aboutus':
	include('aboutus.php');
	break;
case 'quickpeek':
	include('quickpeek.php');
	break;
case 'contact':
	include('contact.php');
	break;
case 'blog':
	include('blog.php');
	break;
case 'terms':
	include('terms.php');
	break;
case 'verifyemail':
	include('verifyemail.php');
	break;
case 'agent':
	include('agent.php');
	break;
case 'profile':
	include('profile.php');
	break;
case 'message':
	include('message.php');
	break;
case 'chattest':
	include('chattest.html');
	break;
default :
	include('404_redirect.php');
	break;
}










