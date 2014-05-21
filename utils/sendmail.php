<?php


require '/usr/local/bin/aws-autoloader.php';
use Aws\Ses\SesClient;


class Mailer{

public static function  sendConfirmationMail($data){

$sub = 'Email Confirmation - Hopin';
$data['template'] = 'utils/confirmemail.html';
Mailer::sendmail($data, $sub);

}

public static function  sendContactMail($data){

$sub = 'Ride Share Rquest -  Hopin';
$data['template'] = 'utils/contactemail.html';
Mailer::sendContmail($data, $sub);

}

private static function sendmail($data, $subject){
$email = $data['email'];
$template = $data['template'];
$client = SesClient::factory(array(
    'key'    => 'AKIAIZYE6I2METOH3TNA',
    'secret' => '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',
    'region' => 'us-east-1'
));

 //always send mail to self everytime
 $list[] = array('name' => $data['name'] , 'email' => $email);

 foreach($list as $l){

	$name = $l['name'];
	$mail = $l['email'];
	$source = ' Hopin <mailer-no-reply@hopin.co.in>';
	$destination  = array(
	'ToAddresses' => array($mail));
	//'ToAddresses' => array('contact@hopin.co.in'));
	$a =  file_get_contents($template);
	$msg =  str_replace('{name}', $name , $a);
	$msg =  str_replace('{emaillink}' , $data['link'] , $msg);
	$message = array('Subject' =>  array( 'Data' => $subject) ,
		  'Body' => array('Html' =>  array ( 'Data' => $msg ))
		);

        sleep(1);
	$result =  $client->sendEmail(array('Source' => $source , 'Destination' => $destination , 'Message' => $message));
 }
}


private static function sendContmail($data, $subject){
$email = $data['email'];
$template = $data['template'];
$client = SesClient::factory(array(
    'key'    => 'AKIAIZYE6I2METOH3TNA',
    'secret' => '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',
    'region' => 'us-east-1'
));

 //always send mail to self everytime
 $list[] = array('name' => $data['name'] , 'email' => $email);

 foreach($list as $l){

	$name = $l['name'];
	$mail = $l['email'];
	$source = ' Hopin <mailer-no-reply@hopin.co.in>';
	$destination  = array(
	'ToAddresses' => array($mail));
	//'ToAddresses' => array('contact@hopin.co.in'));
	$a =  file_get_contents($template);
	$msg =  str_replace('{name}', $data['subject'] , $a);
	$msg =  str_replace('{message}', $data['message'] , $msg);
	$msg =  str_replace('{userlink}' , $data['profile'] , $msg);
	$message = array('Subject' =>  array( 'Data' => $subject) ,
		  'Body' => array('Html' =>  array ( 'Data' => $msg ))
		);

        sleep(1);
	$result =  $client->sendEmail(array('Source' => $source , 'Destination' => $destination , 'Message' => $message));
 }
}

}
