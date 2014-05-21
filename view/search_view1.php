<?php
include_once('view.php');
include_once('utils/siteutils.inc');
include_once('Rest/UserDetailsService.php');

Class SearchView extends View{

public function renderView($output){
	global  $input;
	$req_time  = 'Daily';
	$src = $input['src_address'];
	$parts = explode("," , $src);
	if(isset($parts[1]))
		$area = trim($parts[1]);
	else
		$area = trim ($parts[0]);
	$dst = $input['dst_address'];
	if(isset($_COOKIE['request_time']))
		$req_time = $_COOKIE['request_time'];
	//print_r($output);
//	echo $output;
	$output = SiteUtils::formatAPIOutput($output);
	$matches = $output['NearbyUsers'];
	 $loggedin  = false;
        if(SiteUtils::isLoggedIn()){
        $loggedin = true;
        }
	  $service  = new UserDetailsService();
        $arguments = array();
	$arguments['area'] = $area;
        $rides = $service->getRideTicker($arguments);
        $rides = SiteUtils::formatAPIOutput($rides);
        $data = $rides['LiveFeed'];

        $ticker_html ='';
        foreach($data as $d){

        $image =  $d['fbid'];
        $start = $d['src'];
        $dst = $d['dst'];
        $name = $d['location'];
        $time = $d['time'];

        $ticker_html .= '<li class="tickerrow" > 
                        <img src="https://graph.facebook.com/' . $image . '/picture?type=small"/>
                        <ul>
                        <label style="font-size:16px;vertical-align:top;margin-left:8px;color:green">' . $name .' </label><label style="float:right;font-size:10px;margin-right:10px;color:gray">'. $time  .'</label><li class="nearbyusersource" ><strong>' . $start .'</strong></li><li class="nearbyuserdestination" ><strong>'. $dst .' </strong> </li></ul></li>';

        }

	if(empty($ticker_html))
		$ticker_html = '<li class="tickerrow"> <ul> Sorry, we could not locate any rides in your vicinity. </ul></li>';
	$html ='<div class="row visible-lg" id="progressbar">
<div class="col-md-offset-2 col-md-2 progressinactive" >
<div >
<h4>Search</h4>
</div>
</div> 
<div class="col-md-2 progressactive" >
<h4>Found '.count($matches) .' match</h4>
</div>
<div class="col-md-2 progressinactive" >
<h4>Message</h4>
</div>
<div class="col-md-2 progressinactive" >
<h4>Hop-in</h4>
</div>
</div>
<div id="listcol" class=" col-md-offset-1 col-md-6">';
	foreach($matches as $match){
		$location['src_address'] = $match['loc_info']['src_info']['src_address'];
		$location['dst_address'] = $match['loc_info']['dst_info']['dst_address'];
		$time = $match['loc_info']['time_info'];
		$fb_info = $match['fb_info'];
		$fbid = $fb_info['fbid'];
		$worksat = $fb_info['works_at'];
		$studyat = $fb_info['study_at'];
		$livesin = $fb_info['lives_in'];
		$hometown = $fb_info['hometown'];
		$is_available = $match['other_info']['is_available'];
		$username = $match['other_info']['username'];
		$username = split("@",$username);
		$encrypted_mail = '';
		if($loggedin){
                        $email_link  = $fb_info['email'];
			$encrypted_mail = SiteUtils::encrypt($email_link);
                        $fb_link = 'http://www.facebook.com/' . $fbid;
                }

		$name = $fb_info['firstname'] . ' ' . $fb_info['lastname'];

		$datetime = new DateTime($time);
		$timeformatted = $datetime->format("l \, jS F \, g:i A");
		if($name == " ")
			$name = $username[0];
	  	$html .= '
		<div class="listrownearbyuser center clearfix">
		<div class="col-sm-3 nearbyuserpiccol clearfix" style="padding:0px;"> 
		<div class="nearbyuserpicscontainer clearfix">';
		$html .='
		<img class="img-responsive nearbyuserthumbnailpic center" src="https://graph.facebook.com/'.$fbid.'/picture?type=large"  alt=
		"Image"  />
		</div>
		</div>';
		$html.='
		<div class="col-sm-9" >
		<div class="nearbyuser_name">';
		if($is_available == "1"){
			$html.='<img  src="/img/chatonline.png" style="float:right;margin-top:5px"></img>';
		}		
		else{
			$html.='<img src="/img/chatoffline.png"i style="float:right;margin-top:5px"></img>';
		}
		$html.='<h3>'.$name.'</h3>
	 	<hr style="margin-top:3px;margin-bottom:5px;">
		</div>';
		$html.='
		<div class="row">
		<div class="nearbyusertraveldetails ">
		<ul>
		<li class="nearbyusersource"><strong> '.$location['src_address'].'</strong></li>';
		$html .='<li class="nearbyuserdestination"><strong>'.$location['dst_address'].'</strong></li>';
		$html .='<li class="nearbyusertime"> <strong>'.$timeformatted.'</strong></li></ul>';
	$html .='<div class="communicationbar">
<a class="chatwithindividual" onclick="Util.showChatPopUp(\''.$name.'\',\''.$fbid.'\'); return false;" href="#">Chat</a>
<a class="sendemailtoindividual" onclick="Util.showMessagePopUp(\''. $name . ' \' , \''. $encrypted_mail . ' \' , \''. $fbid . '\'); return false;" href="#">Email</a>
<a class="seehopinprofile" onclick="Util.showUserProfile(\''. $fbid .'\'); return false;" href="#">Hopin Profile</a>';
if(!empty($fbid)) $html.= '<a class="seeonfacebook" href="'.$fb_link . '" target="_blank" >See on Facebook</a>';
$html .= '</div>
</div>
</div>
</div>
</div>';
	}
if(count($matches) == 0){
$html.='<div class="zeromatch">

<img class="image_responsive" src="/img/sad_smiley.png"/>
<h2><strong>Sorry no match found</strong></h2>
</div>';}
$html .='</div>


<div class="col-md-4">


<div id="search-box-searchpage" class="search-box row center" >
<h2 style="font:1.25em Arial,Tahoma,\'Bitstream Vera Sans\',sans-serif;font-size:22px;margin-top:0px;text-align:center;font-weight:bold;">Your search</h2>
<form class="form" role="form">
      
        <i style="background:url(/img/source_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
       <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputsource" autocomplete="off" type="text"  class="textbox" placeholder="Enter source" onclick="State.instaride=1; State.instaClick(); return false;" value="'. $src  .'" required disabled></span>
     
        
    <i style="background:url(/img/destination_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
         <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputdestination" autocomplete="off" type="text" class="textbox" placeholder="Enter destination" onclick="State.instaride=0; State.dailyPoolClick(); return false;" required  value="'. $dst .'" disabled></span>
      
 
 <div class="date form_datetime datepicker" style="text-align:center;display:block;" > 
 <div class = "radiogroup hide">
  <input type="radio" class="css-checkbox" name="radioonetimedailypool" id="radioonetime" >
 <label    class="onetimelabel css-label" style="margin-left:0;margin-right:8px;" >Onetime</label>
 <input type="radio" class="css-checkbox" name="radioonetimedailypool"  id="radiodailypool"  >
 <label   class="dailypoollabel css-label" style="margin-left:0">Dailypool</label>
 </div>
 <div class="datetimegroup" style="position:relative;">
 <i style="background:url(/img/time_clock.png) no-repeat;height:30px;width:20px;float:left;margin-top:16px;margin-right:6px;" ></i>
  <i class="removedateicon" style="display:none;"></i> 
 <span style="display:block;overflow:hidden;padding:4px;"> <input class="datetimebar textbox " placeholder="Enter time" readonly="" type="text" style="padding-right:20px;" value="'. $req_time .'" disabled></span>
 </div>
 </div>

<div id="modifysearchbuttondiv" style="text-align:center;margin-top:10px;" >
     <button id="modifysearchbutton" class="btn-default hopinbtn" >Modify Search</button>
</div>
<div id="searchbuttondiv" style="text-align:center;margin-top:10px;display:none;" >
     <button type="submit" id="searchbutton" class="btn-default hopinbtn" >Search</button>
</div>
   </form> 
</div>

<div class=" hidden-xs hidden-sm">
<h2 style="font:1.25em Arial,Tahoma,\'Bitstream Vera Sans\',sans-serif;font-size:22px;margin-top:30px;">Rides In Your Area</h2>
<div class="center ticker " style="width:100%;">

<ul id="tickerul" style="top: 0px;">
'. $ticker_html.'
</ul>
</div>
<div class="tickerbottomshadow center" style="width:100%;margin-bottom:0;";
</div>
</div>
';

parent::renderView($html);

}

}
?>
