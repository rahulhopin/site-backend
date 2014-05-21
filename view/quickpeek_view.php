
<?php
include_once('view.php');
Class QuickPeekView extends View{

public function renderView($output){

       $html = ' 
 <div class="row center darktransparent" style="width:80%; margin-top:20px">
<h2><strong style="text-align:center;color:#c5c8c3;" >How it works?</strong></h2>
				
<div class="row visible-lg" id="progressbar" style="margin-bottom:10px">

<div id="progress_search" class="col-md-offset-2 col-md-2 progressactive pointeronhoverorfocus">
<h4 style="margin-top:15px;">Search</h4>
</div> 
<div id="progress_explore" class="col-md-2 progressinactive pointeronhoverorfocus" >
<h4 style="margin-top:15px;">Find match</h4>
</div>
<div  id="progress_connect" class="col-md-2 progressinactive pointeronhoverorfocus" >
<h4 style="margin-top:15px;">Chat</h4>
</div>
<div id="progress_commute" class="col-md-2 progressinactive pointeronhoverorfocus" >
<h4 style="margin-top:15px;">Hop-in</h4>
</div>
</div>

<div class="row center " id="howitworksdetails">

<div id="progress_searchdetails"  >
<h3>Search travelers going your way</h3>
<p>1) Enter source and destination</p>
<p>2) Select DailyPool or OneTime pool</p>
<p>3) Hit the search button</p>
</div>	
<div id="progress_exploredetails"  style="display:none;">
<h3> Explore the matches.</h3>
<p>1) Look at the profiles of the matches</p>
<p>2) Decide whom do you want to travel with</p>
<p>(Facebook login helps to establish the credibility) </p>
	</div>	
<div id="progress_connectdetails"  style="display:none;">
<h3>Connect instantly to co-travelers</h3>
<p>1) You can drop a message from hopin website</p>
<p>2) Download android app to instantly chat with co-traveler</p>
<p>3) Chat helps you find genuine pools instantly</p>
</div>
	<div id="progress_commutedetails" style="display:none;">
<h3>Just Hopin!</h3>
<p>1) Negotiate the price and timing with the driver.</p>
<p>2) If no driver found you can hire cab and split fare!</p>
<p>3) Fix the ride yourself and Hopin!</p>
	</div>	
</div>

</div>


<div class="row center darktransparent feature" style="width:80%; margin-top:20px">
<div class="col-md-6 hidden-xs hidden-sm" style="background:black;" >
<video width="300" height="540" controls>  
  <source src="https://s3-us-west-2.amazonaws.com/hopinqa/videoandroidapp.mp4" type="video/mp4"/>
  <object data="https://s3-us-west-2.amazonaws.com/hopinqa/videoandroidapp.mp4" width="300" height="540">
    <embed src="https://s3-us-west-2.amazonaws.com/hopinqa/videoandroidapp.swf" width="300" height="540">
  </object> 
</video>
</div>
<div class="col-md-6" >;
<h2><strong style="color:rgb(93, 166, 41);font-weight:400;" >Carpool and Rideshare-Hopin</strong></h2>
<p> <strong> Android</strong> application helps you to manage your rides on the move. Plan new rides, modify upcoming rides or commicate with the co-riders to check the status of current ride. Watch the video for a quick look at mobile app features  </p>
<a href="http://goo.gl/bi8mB9" >
<img style="width:60%;margin-top:50px;" src="/img/googleplay_download.png" class=" center img-responsive"/></a>
</div>
</div>


<div class="row center darktransparent feature" style="width:80%; margin-top:20px">
<div class="col-md-6">
<h2><strong style="color: rgb(93, 166, 41);font-weight: 400;">Find co-travellers in realtime with Instashare </strong></h2>
<p > <strong>Instashare</strong>, first ever service to instantly find people who are travelling the same way. Just enter your destination and we will connect you to nearby users going your way. Share a ride, split fare and make friends on the way. A step towards easy and affordable travel.</p>
</div>
<div class="col-md-6" >
<img style="margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px" src="/img/instachat.gif" class="img-responsive"/>
</div>
</div>


<div class="row center darktransparent feature" style="width:80%; margin-top:20px">
<div class="col-md-6">
<img  style="margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:10px" src="/img/GalaxyS3.png" class="img-responsive">
</div>
<div class="col-md-6">
<h2><strong style="color: rgb(93, 166, 41);font-weight: 400;" >Plan your journey with Carpool</strong></h2>
<p > <strong> Carpool</strong> has been redesigned to be simpler, intuitive and more beautiful than ever before. A clean interface which lets you find the right people to travel with. List a ride or join a ride. As simple as that.</p>
</div>
</div>

 <div class="row center darktransparent feature" style="width:80%; margin-top:20px;" >  
 <div class="col-md-offset-1 col-md-10">
 <h2 style="color: rgb(241, 98, 154);margin-top:5px;">Oh! Did we tell you, we are women-friendly as well!</h2>
 <p style="margin-left:30px;margin-right:30px;">If you are a woman, <span style="color:#66d634; font-style:bold;">Hopin</span> allows you to switch on the female filter.This will allow only females to see and contact you. But, at the same time you can choose to be visible to all of your <span style="color: #0864ee;font-style:bold;">facebook</span> friends.</p>
</div>
</div>

 <div class="row center">
<form class="form-inline" role="form">
<h2 style="color:#807B7B;">Keep abreast with latest on hopin</h2>
      <div class="form-group" id="emailaddress">        
        <input type="email" class="form-control"  placeholder="Enter email">
      </div>   
<div class="form-group">	  
      <button id="notify-btn" class=" btn-default hopinbtn" style="margin-top:-2px;padding:7px;"><span>Subscribe</span> </button>
	  </div>
    </form>
</div>';
 
	parent::renderView($html);
}

}
?>
