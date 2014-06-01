<?php
include_once('view.php');
include_once('Rest/UserDetailsService.php');

Class HOMEView extends View{

public function renderView($output){
	  $dbobject = new dbclass();
        $dbobject->connect();

	$service  = new UserDetailsService();
        $arguments = array();
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
	
       $html = '

<div class="hidden-xs hidden-sm" style="height:50px;width:100%;">

    <div id="twitter-button" style="float:left;margin-top:15px;margin-left:20px;">
     <a  href="https://twitter.com/HopinTweet" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @HopinTweet</a>
    </div>
  <div id="gfollow"  style="float:left;display:inline-block;margin-top:15px;margin-left:10px;">
   <div class="g-follow" data-annotation="bubble" data-height="20" data-href="//plus.google.com/u/0/b/113116533496175147504" data-rel="author"></div>
</div>
    <div id="fb-like-solo" style="float:left;margin-top:15px;display:inline-block;"><!-- style="position:absolute;margin-right:20px;right:0px;z-index:100;display:inline;"> -->
      <div class="fb-like"  style="margin-left:10px;" data-href="http://www.facebook.com/hopin.co.in"
           data-send="false" data-width="225" data-show-faces="false">
      </div>
    </div>
 </div>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
 <div class="row hidden-md hidden-lg " style="padding-left:20px;padding-right:20px;padding-bottom:0;">
<img class="img-responsive center" src="/img/hopinletscommutesmallblack.png" style="padding:20px;">
</div>
<div class="row" id="searcharea" >
 


<div class="hidden-xs hidden-sm" style="font-weight:200;color:white;margin-top:30px;font-size:36px;width:100%;">Share rides, instantly!</div>
<div class="hidden-xs hidden-sm" id="socialcol">
<ul>
<li>
<a href="https://plus.google.com/113116533496175147504" rel="publisher" ><img src="/img/small/googleplus_gray.png" class="img-responsive" style="height:40px"></a></li>

<li><a href="http://goo.gl/T3JgGf" ><img src="/img/small/facebook_gray.png" class="img-responsive" style="height:40px"></a></li>


<li><a href="http://goo.gl/J6jpCf" ><img src="/img/small/twitter_gray.png" class="img-responsive" style="height:40px"></a></li>


<li><a href="http://goo.gl/7tCQLR" ><img src="/img/small/youtube_gray2.png" class="img-responsive" style="height:40px"></a></li>
</ul>
<a href="http://goo.gl/bi8mB9" style="position:absolute;margin-left:-40px;">
<img style="width:250px;margin-top:70px;" src="./img/googleplay_download.png" class="img-responsive"></a>
</div>
<div class="hidden-xs hidden-sm center" style="color:white;font-weight:400;font-size:25px;width:80%;text-align:left;padding-left:20px;">Find people going your way:</div>
<div class="hidden-md hidden-lg center" style="font:1.25em Arial,Tahoma,\'Bitstream Vera Sans\',sans-serif;color:white;font-weight:200;font-size:22px;text-align:center;margin-top:10px;margin-bottom:10px;">Find co-travellers </div>
<!--search box start-->
<div  class="search-box row center" id="search-box-homepage" >

<form class="form" role="form">
      <div class=" col-sm-4" style="padding-left:0;" >
         <i style="background:url(img/source_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
       <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputsource" autocomplete="off" type="text"  class="textbox" placeholder="Source" required></span>
      </div>
      <div class=" col-sm-4" style="padding-left:0;">
        <i style="background:url(img/destination_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
         <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputdestination" autocomplete="off" type="text" class="textbox" placeholder="Destination" required ></span>
      </div>
  

 
 <div class="col-sm-3 date form_datetime datepicker" style="padding:0px;" > 
 <div class = "radiogroup">
  <input type="radio" class="css-checkbox" name="radioonetimedailypool" id="radioonetime" >
 <label    class="onetimelabel css-label" style="margin-left:0;margin-right:8px;" onclick="State.instaride=1; State.instaClick(); return false;" >One Trip</label>
 <input type="radio" class="css-checkbox" name="radioonetimedailypool" id="radiodailypool" checked >
 <label   class="dailypoollabel css-label" style="margin-left:0" onclick="State.instaride=0; State.dailyPoolClick(); return false;">Daily</label>
 </div>
 <div class="datetimegroup hide" style="position:relative;">
 <i style="background:url(img/time_clock.png) no-repeat;height:30px;width:20px;float:left;margin-top:16px;margin-right:6px;" ></i>
  <i class="removedateicon" ></i> 
 <span style="display:block;overflow:hidden;padding:4px;"> <input class="datetimebar textbox " placeholder="Enter time" readonly="" type="text" style="padding-right:20px;"></span>

 </div>
 </div>

<div class="col-sm-1" style="padding:0;">
     <button type="submit" id="searchbutton" class="btn-default hopinbtn" style="padding:7px">Search</button>
</div>
   </form> 
</div>
<!--search box end-->
</div>
<div class="col-md-6 hidden-xs hidden-sm">
<h2 style="font:1.20em Arial,Tahoma,\'Bitstream Vera Sans\',sans-serif;font-size:22px;margin-top:30px;">People Hopin around the world</h2>
<div class="center ticker ">
<ul id="tickerul">' . $ticker_html .'
</ul>
</div>
<div class="tickerbottomshadow center" >
</div>
</div>
<div class="col-md-6 hidden-xs">
<div class="testimonials center" >
 <div class="row" id="testimonialpics" >

 <img class="img-responsive" src="./img/testimonialpics/harrison.png" style="box-shadow: 0px 0px 5px 2px #888888;">
 
 <img class="img-responsive" src="./img/testimonialpics/bennie.png" style="box-shadow: 0px 0px 5px 2px #888888;opacity:0.2">
 
 <img class="img-responsive" src="./img/testimonialpics/robert.png" style="box-shadow: 0px 0px 5px 2px #888888;opacity:0.2">
 
 <img class="img-responsive" src="./img/testimonialpics/stephnie.png" style="box-shadow: 0px 0px 5px 2px #888888;opacity:0.2" >

 <img class="img-responsive" src="./img/testimonialpics/tarahill.png" style="box-shadow: 0px 0px 5px 2px #888888;opacity:0.2">
<span class="stretch"></span>
 </div>
 <div class="row" id="testimonialtext" style="margin:0;">
 <p>
"Great app idea. I am going to print off flyers and place them around in Williston"
</p>
<p style="display:none">
"Traffic here is stupid. I will try to fly your flag, great idea. Save the planet, save your pocket."
</p>
<p style="display:none">
"Thanks a lot for such an amazing app. Looking forward to see this in action."
</p>
<p style="display:none">
"I will rate this app a 5 star and also share it with my 600 facebook friends. Again , really cool app."
</p>
<p style="display:none">
"You should market this app better. It has very huge potential if user base is good."
</p>
</div>
 </div>
<label style="font:1.75em Arial,Tahoma,\Bitstream Vera Sans\,sans-serif;font-size:18px;">TRAVEL PARTNER </label>
 <a data-toggle="modal"
   data-target="#corpcarpoolmodal" href="#" > <img class="center" src="./img/corporatecarpool.png" style="border-radius:10px;height:50px;vertical-align:middle;"> </a>

</div>
<div id="push"></div> 
<div id="corpcarpoolmodal" class="modal fade agentbanner in" role="dialog"  aria-hidden="false">  
<div class="modal-dialog modal-lg">
        <div class="modal-content">
<img  src="./img/corporatecarpool.jpg" >
 
</div>  
</div>
</div>
<p id="loginstatus"> </p></div>
</div>
</div>
</div>
</div>

';

$html.='<script type="text/javascript">  (function() {    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;    po.src = \'https://apis.google.com/js/platform.js\';    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);  })();</script>';
	parent::renderView($html);
}

}
?>
