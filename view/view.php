<?php
require_once('Rest/ChatService.php');
Class View{

public function getFBLogin(){
 $fbid= FB_APP_ID;

$fb = '	<div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '. $fbid .',
          status     : true,
          cookie     : true,
          xfbml      : true
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, "script", "facebook-jssdk"));

    
    </script>';

return $fb;
}
public function addGATracking(){
return  '<script>  (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,"script","//www.google-analytics.com/analytics.js","ga");

  ga("create", "UA-39698394-4" , "hopin.co.in");
  ga("send", "pageview");

</script>';

}

public function getMetaTags(){
$tags = '<title> Carpool and RideShare - Hopin </title>
	<meta name="description" content="Daily carpool and rideshare. Share cabs and private vehicles and contribute to greener planet.">
	<meta name="keywords" content="Carpool, rideshare , Mumbai , Pune , Taxi ,  Delhi , Banglore, CA , California ,  Canada , Europe , Africa , India, daily commute , instant ride ">
	<meta charset="UTF-8">';
return $tags;
}

public function paintHead(){ // SEO and other stuff
 print ' <head>' . $this->getMetaTags() . '
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/hopin_mainnew.css" type="text/css" />
    <link rel="stylesheet" href="/css/hopin_list_nearbyuser.css" type="text/css" />
    <link rel="stylesheet" href="/css/hopin_list_agent.css" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.social.css" type="text/css" />
    <link rel="stylesheet" href="/css/bootstrap-datetimepicker.css" type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <link type="text/css" href="/css/chatbox.css" rel="stylesheet" />
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" 
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7B_JmOOy1C9lCXhRJhdLXUeZ36P_1RuM&libraries=places&sensor=false">
      </script>

      <script src="/js/hopin_main.js"></script>  
      <script src="/js/utils.js"></script>  
      <script src="/js/strophe.min.js"></script>  
      <script type="text/javascript" src="/js/chatBoxNew.js"></script>
      <script type="text/javascript" src="/js/chatManagerNew.js"></script>
      <script type="text/javascript" src="/js/chatBoxManagerNew.js"></script>
      <script type="text/javascript" src="/js/chatAdapterNew.js"></script>
      <script src="/js/state.js"></script>  
      <script src="/js/index.js"></script>  
      <script src="/js/login.js"></script>  
      <script src="/js/bootstrap-datetimepicker.js"></script>  
      <script src="/js/bootbox.min.js"></script>  
      <script src="/js/validator.js"></script> '. $this->addGATracking() .'
      <script src="/js/hopin_analytics.js"></script> 
      <!---favicon--->
      <link rel="shortcut icon" href="/img/favicon.png" type="image/icon"> 
      <link rel="icon" href="/img/favicon.png" type="image/icon">
    </head>
	 

';

}


public function generateLogin(){
	  global $request_params;
	  print $this->getFBLogin();

	  if(SiteUtils::isLoggedIn()){
	  $login = $request_params['login_type'];
	  if($login == 'fb'){
		$id = $request_params['login_id'];
		$picture= "http://graph.facebook.com/$id/picture";
		//if(!isset($_COOKIE['session_sid']))
		if($request_params['type'] == 'home' || $request_params['type'] == 'search')
			$this->ChatLogin($id);
	  }
	  else  if($login == 'email'){
		$id = $_COOKIE['networkID'];
		$picture = '/img/user.png';
          }

	  $userid =  SiteUtils::encrypt($id);
          $html = '<li class="hopoinnavbarlist pull-right dropdown"> <img class="img-responsive" src ="'. $picture . '">
          <a href="#" class="hopinnavbarbutton dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/user/?id=' . $userid .'">Profile</a></li>
            <li class="divider"></li>
            <li><a onclick="Login.FBLogout();return false;">Logout</a></li>
          </ul>
          </li>';
	 }
	 else {
		$html = '<ul class="hopoinnavbarlist pull-right">
               <li><a class="hopinnavbarbutton loginbutton " href="#" data-toggle="modal"
   data-target="#loginModal" >Log in</a></li>
      		</ul>';
        }

	return  $html;
}

public function paintHeader(){
 $this->paintHead();
 print '<body>
<div id="wrap">  ';
$this->paintNavBar();

}

public function paintNavBar()
{
	  print $this->getFBLogin();
 print ' <div class="hopinnavbar hidden-xs hidden-sm" >
     <div class="logoforbar pull-left">
	<a href="/"><img class="img-responsive" src="/img/small/carpoolhopincolor.png">	</a>
	</div>
	  <ul class="hopoinnavbarlist pull-left" style="margin-left:30px;">
         <li id="navbar_home"><a class="hopinnavbarbutton" href="/home" >Home</a></li>
		 <li id="navbar_quickpeek"><a class="hopinnavbarbutton" href="/quickpeek">Quick Look</a></li>
		 <li id="navbar_aboutus"><a class="hopinnavbarbutton" href="/aboutus">About Us</a></li>
		 <li id="navbar_contactus"><a class="hopinnavbarbutton" href="/contact">Contact Us</a></li>
      </ul>'.
		$this->generateLogin() .
     // '<ul class="hopoinnavbarlist pull-right">
     //		 <li><a class="hopinnavbarbutton loginbutton " href="#">Log in</a></li>
     // </ul>
	 
 '</div>'; 

}

public function paintFooter(){//first closing </div> is of "wrap" class which makes view = full screen height
  print '   </div> 

<div class="modal fade in" id="loginModal" tabindex="-1" role="dialog" aria-hidden="false">

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header darkbackground">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#215;</button>
<h4 class="modal-title" style="color:white;font-size:20px;">Login / Sign-up</h4></div>
<div class="modal-body">
<span style="font-size:22px;color: #E21E1E;">Want to chat with co-travellers and fix ride instantly?</span> <a class="btn btn-social btn-facebook" onclick="Login.FBLogin();return false;">  <i class="fa fa-facebook" style="padding-top:8px;"></i> Sign in with Facebook</a>
<p>*we do <strong>not</strong> post on wall, only access basic public info</p>
<hr style="margin-top:30px;margin-bottom:30px;width:40%;float:left;">
<hr style="margin-top:30px;margin-bottom:30px;width:40%;float:right;"><label style=" font-size: 25px;position:relative;top:10px;">Or</label>
<div> <ul class="nav nav-tabs"> <li style="width:50%;font-weight: 700;font-size: 16px;" class="active"><a href="#login" data-toggle="tab">Login</a></li>  <li style="width:50%;font-weight: 700;font-size: 16px;"> <a href="#signup" data-toggle="tab">Sign-Up</a></li> </ul>
<div class="logintabs tab-content center" style="width:70%;margin-top:20px;">
<div class="tab-pane active" id="login">
<form role="form" data-toggle="validator">  <div class="signup-form-group">    <label for="formemail">Email address</label>    <input type="email" class="form-control" id="formemail" placeholder="Enter email" data-error="Bruh, that email address is invalid" required="">  </div>  <div class="signup-form-group">    <label for="formpassword">Password</label>    <input type="password" class="form-control" id="formpassword" placeholder="Password">  </div> <div class="signup-form-group"> <a type="submit" class="btn " onclick="Login.emailLogin();return false;" style="  background-color: hsl(122, 47%, 40%) !important; color: white; padding: 5px; font-size: 22px; margin-top: 20px;"><img src="/img/hopin_icon.png" style=" border-right: 1px solid rgba(0,0,0,0.2); padding-right: 5px;">  Login with hopin</a> </div></form>
</div>;
<div class="tab-pane" id="signup">
<form rolei="form">  <div class="signup-form-group">    <label for="name">Name</label>    <input type="text" class="form-control" id="name" placeholder="Enter Name">  </div>  <div class="signup-form-group">    <label for="formemail">Email address</label>    <input type="email" class="form-control" id="formemail" placeholder="Enter email">  </div>  <div class="signup-form-group">    <label for="formpassword">Password</label>    <input type="password" class="form-control" id="formpassword" placeholder="Password">  </div> <div class="signup-form-group"> <button type="submit" class="btn btn-success" style="font-size: 20px;margin-top: 15px;background-color: hsl(122, 47%, 40%);" onclick="Login.emailSignup();return false;">Register</button> </div></form>
</div>
<p id="loginstatus"> </p></div>
</div>
</div>
</div>
</div>
</div>

<div class="modal fade in" id="loginForChatModal" tabindex="-1" role="dialog" aria-hidden="false" >

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header" style="background: #4D6DB1;">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#215;</button>
<label class="modal-title" style="color:white;font-size:24px;padding-left:30px;">Facebook login required to chat</label>
</div>
<div class="modal-body">
<ul class="center">
<li>Establish your credentials</li>
<li>Develop trust among users</li>
</ul>
<a class="btn btn-social btn-facebook" onclick="Login.FBLogin();return false;">  <i class="fa fa-facebook" style="padding-top:8px;"></i> Sign in with Facebook</a>

<p>*we do <strong>not</strong> post on wall, only access basic public info</p>

</div>
</div>
 
</div>
</div>
<!--<div id="log" style="width:100%;height:300px;overflow-y:scroll;"></div>-->
<div id="footer" class="center hidden-xs hidden-sm ">

<span class="fine-print ">Copyright &copy; 2013, Hopin</span>
<a class="fine-print " href="terms" style="text-decoration:none;">Terms of Use</a>
</div>
</body>';
}

private function ChatLogin($fbid){
	$chat = new ChatService();
	$data = $chat->attachSession(array('username' => $fbid , 'user_id' => 1));
	$rid = $data['rid'];
	$sid = $data['sid'];
	unset($_COOKIE['session_rid']);
	unset($_COOKIE['session_sid']);
	setcookie("fbid" , $fbid , time() +  1200 , '/' , '.hopin.co.in');
	if(!isset($_COOKIE['fbname'])){
		$data =  file_get_contents("http://graph.facebook.com/$fbid");
		$data =  json_decode($data,true);
		$name = $data['name'];
		$name =  str_replace('+' , '' , $name);
		setcookie("fbname" ,  $name , time() + 30*24*60*60 , '/' , '.hopin.co.in');
	}
	setcookie("session_rid", $rid , time()+ 1200 , '/' , '.hopin.co.in');
	setcookie("session_sid", $sid , time()+ 1200 , '/' , '.hopin.co.in');
}
public function renderView($html){
//	var_dump($html);
	$this->paintHeader();
	print '<div id="content">' .$html .'</div>';
	$this->paintFooter();
}

}
?>
