<?php
include_once('view.php');
include_once('utils/siteutils.inc');
Class SearchView extends View{

public function renderView($output){
	//print_r($output);
	$output = SiteUtils::formatAPIOutput($output);
	$matches = $output['NearbyUsers'];
	$loggedin  = false;
	if(SiteUtils::isLoggedIn()){
	$loggedin = true;	
	}
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
<h4>Chat</h4>
</div>
<div class="col-md-2 progressinactive" >
<h4>Hop-in</h4>
</div>
</div>
<div id="listcol" class=" col-md-offset-1 col-md-6">';
     if(count($matches)==0)
  {$html.='<div class="zeromatch">
<img class="image_responsive" src="/img/sad_smiley.png"/>
<h2><strong>Sorry no match found</strong></h2>
</div>';}
else
{
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
		if($loggedin){
			$email_link  = $fb_info['email'];
			$fb_link = 'http://www.facebook.com/' . $fbid;
		}
		$name = $fb_info['firstname'] . ' ' . $fb_info['lastname'];
		$html.='<div class="listrow clearfix"> <div class="col-md-3 " style="padding:0px;">';		
		$html .= '<img class="img-responsive thumbnailpic "  src="https://graph.facebook.com/' .$fbid.'/picture?type=large" alt="Image"  /></div>';
		$html .= '<div class="col-md-9 nearbyuseralldetails center"><div><a class="nearbyuserdetailsname" href="https://www.facebook.com/'.$fbid.'" >'.$name. '</a><img class="takeofferride_icon" src="/img/offerridecar_white_small.png">
			<div class="recency pull-right"><small>1 day ago</small></div></div>';
		$html .= '<div class="nearbyuserpersonaldetails ">
		<ul>
		<li>Works at <span class="personaldetailvalue">'.$worksat.' </span></li>
		<li>Studied at <span class="personaldetailvalue">'.$studyat.' </span></li>
		<li>City <span class="personaldetailvalue">'.$livesin.' </span></li>
		<li>HomeTown <span class="personaldetailvalue">'.$hometown.' </span></li>
		</ul>
		<a class="hidepersonaldetailbutton"></a>
		<hr>
		</div>';
	  	$html .= '<div class="nearbyusertraveldetails">
		<a class="expandpersonaldetailbutton"></a>
		<hr>
		<ul>
		<li class="nearbyusersource" >
		<strong>'.$location['src_address'].'</strong></li>
		<li class="nearbyuserdestination" ><strong>'.$location['dst_address'].'</strong> </li>	
		<li class="nearbyusertime" ><strong> '.$time.'</strong></li>
		</ul>	
</div>';
	$html .='<ul class="communicationbar">'.
'<li>
<a class="button " onclick="Util.emailUser(\''. $email_link .'\'); return false;" href="#"><img class="img-responsive" style="display:inline-block" src="/img/email_icon.png"> Send Email</a>
</li>
<li>
<a class="button " href="'.$fb_link . '" target="_blank"><img class="img-responsive" style="display:inline-block" src="/img/fb_icon.png"> Facebook Profile</a>
</li>
<li>
<a class="button " href="#"><img class="img-responsive" style="display:inline-block" src="/img/hopin_icon.png"> Hopin Profile</a>
</li>

</ul>

</div>
</div>';
	}
}
$html .='</div>


<div class="col-md-4">

<div id="search-box-searchpage" class="search-box row center" >

<form class="form" role="form">
      
        <i style="background:url(/img/source_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
       <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputsource" autocomplete="off" type="text"  class="textbox" placeholder="Enter source" ></span>
     
        
    <i style="background:url(/img/destination_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
         <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputdestination" autocomplete="off" type="text" class="textbox" placeholder="Enter destination" ></span>
      
 
 <div class="date form_datetime datepicker" style="text-align:center;display:block;" > 
 <div class = "radiogroup hide">
  <input type="radio" class="css-checkbox" name="radioonetimedailypool" id="radioonetime" >
 <label    class="onetimelabel css-label" style="margin-left:0;margin-right:8px;" >Onetime</label>
 <input type="radio" class="css-checkbox" name="radioonetimedailypool"  id="radiodailypool"  >
 <label   class="dailypoollabel css-label" style="margin-left:0">Dailypool</label>
 </div>
 <div class="datetimegroup" style="position:relative;">
 <i style="background:url(/img/time_clock.png) no-repeat;height:30px;width:20px;float:left;margin-top:16px;margin-right:6px;" ></i>
  <i class="removedateicon" ></i> 
 <span style="display:block;overflow:hidden;padding:4px;"> <input class="datetimebar textbox " placeholder="Enter time" readonly="" type="text" style="padding-right:20px;"></span>
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

<div class="extra-box-searchpage">
<h4>Similar rides</h4>
</div>
<div class="extra-box-searchpage">
<h4>Tips etc</h4>
</div>
</div>';
parent::renderView($html);

}

}
?>
