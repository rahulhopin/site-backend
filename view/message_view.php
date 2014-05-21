<?php
include_once('view.php');
Class MessageView extends View{

public function renderView($output){

//encrypt the email
$email = $output['mail'];
$name = $output['name'];
$id = $_COOKIE['networkID'];

          $userid =  SiteUtils::encrypt($id);

$html = '<div class="modal-header darkbackground">  
<a class="close" data-dismiss="modal">x</a>  
<h3 >Send email message</h3>  
</div>  
<div class="modal-body clearfix">  
<form class="emailform clearfix" role="form">
<input type="hidden" id="message_email" value="'. $email .'" style="display:hidden;">
<input type="hidden" id="user_profile" value="'. "http://qa.hopin.co.in/user/?id=$userid" .'" style="display:hidden;">
<div class="form-group clearfix">
            <div class="col-sm-offset-1 col-sm-2 control-label hidden-xs"><label>From</label></div>
            <div class="col-sm-8">
                <input title="From" class="form-control" type="text" disabled>            
            </div>
        </div>
        <div class="emailto clearfix">
            <div class="col-sm-offset-1 col-sm-2 control-label hidden-xs"><label>To</label></div>
            <div class="col-sm-8">
                <ul class="emailtoul">
                <li class="emailtoli"><span>' . $name .'</span><a class="emailtoliclose"></a>
                </li>                
                </ul>
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-sm-offset-1 col-sm-2 control-label hidden-xs"><label>Subject</label></div>
            <div class="col-sm-8">
                <input id="message_box_subject" title="Subject" class="form-control" type="text">
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-sm-offset-1 col-sm-2 control-label hidden-xs"><label>Message</label></div><div class="col-sm-8">
                <textarea id="message_box_text" rows="4" cols="20" class="form-control"></textarea>
            </div>
        </div>
    
</form>              
<a onClick="Util.sendMail();return false;" href="#" class="btn btn-success btn-block center sendemailbuttonform" data-dismiss="modal"><strong>Send</strong></a>
</div>  
 
</div>  
</div> 
</div>  
</div> ';

echo $html;
}
}
