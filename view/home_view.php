<?php
include_once('view.php');
include_once('Rest/UserDetailsService.php');

Class HOMEView extends View{

public function renderView($output){
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
			<label style="font-size:16px;vertical-align:top;margin-left:8px;color:white">' . $name .' </label><label style="float:right;font-size:10px;margin-right:10px;color:white">'. $time  .'</label><li class="nearbyusersource" ><strong>' . $start .'</li><li class="nearbyuserdestination" ><strong>'. $dst .'  </li></ul></li>';

	}
       $html = ' <div class="row hidden-xs hidden-sm" id="progressbar" style="margin-top:70px;margin-bottom:100px;">
<div class="col-md-offset-2 col-md-2 progressactive" >
<div >
<h4>Search</h4>
</div>
</div> 
<div class="col-md-2 progressinactive" >
<h4>Find matches</h4>
</div>
<div class="col-md-2 progressinactive" >
<h4>Chat</h4>
</div>
<div class="col-md-2 progressinactive" >
<h4>Hop-in</h4>
</div>
</div>


<div  class="search-box row center" >

<form class="form" role="form">
      <div class=" col-sm-4" style="padding-left:0">
         <i style="background:url(/img/source_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
       <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputsource" autocomplete="off" type="text"  class="textbox" placeholder="Enter source" ></span>
      </div>
      <div class=" col-sm-4" style="padding-left:0">
        <i style="background:url(/img/destination_marker.png) no-repeat;height:30px;width:20px;float:left;margin-top:14px;margin-right:4px;" ></i>
         <span style="display:block;overflow:hidden;padding:4px;"> <input id="inputdestination" autocomplete="off" type="text" class="textbox" placeholder="Enter destination" ></span>
      </div>
  

 
 <div class="col-sm-3 date form_datetime datepicker" style="padding-left:10px;" > 
 <div class = "radiogroup">
  <input type="radio" class="css-checkbox" name="radioonetimedailypool" id="radioonetime" >
 <label    class="onetimelabel css-label" style="margin-left:0;margin-right:8px;" >Onetime</label>
 <input type="radio" class="css-checkbox" name="radioonetimedailypool"  id="radiodailypool"  >
 <label   class="dailypoollabel css-label" style="margin-left:0">Dailypool</label>
 </div>
 <div class="datetimegroup hide" style="position:relative;">
 <i style="background:url(/img/time_clock.png) no-repeat;height:30px;width:20px;float:left;margin-top:16px;margin-right:6px;" ></i>
  <i class="removedateicon" ></i> 
 <span style="display:block;overflow:hidden;padding:4px;"> <input class="datetimebar textbox " placeholder="Enter time" readonly="" type="text" style="padding-right:20px;"></span>

 </div>
 </div>

<div class="col-sm-1" style="padding:0;">
     <button type="submit" id="searchbutton" class="btn-default hopinbtn">Search</button>
</div>
   </form> 
</div>

<div class="ticker center hidden-xs hidden-sm">

<ul id="tickerul">
'. $ticker_html . '
</ul>

</div>
<div id="push"></div>

';

	parent::renderView($html);
}

}
?>
