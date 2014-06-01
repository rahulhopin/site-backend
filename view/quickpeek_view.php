
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
<h3>Search for travellers going your way</h3>
<p>1) Enter <i>Source</i> and <i>Destination</i></p>
<p>2) Select <i>Daily</i> or <i>One Trip</i></p>
<p>3) Hit the <i>Search</i> button</p>
</div>	
<div id="progress_exploredetails"  style="display:none;">
<h3> Explore potential co-travellers </h3>
<p>1) Look at the profiles of potential co-travellers</p>
<p>2) Decide whom do you want to travel with</p>
	</div>	
<div id="progress_connectdetails"  style="display:none;">
<h3>Connect with co-travellers</h3>
<p>1) You can send email or chat with co-traveller</p>
<p>2) Hopin chat works across web and android app</p>
<p>3) Instant chat helps you find genuine carpools quickly</p>
</div>
	<div id="progress_commutedetails" style="display:none;">
<h3>Just Hopin!</h3>
<p>1) Negotiate the price and timing with the driver.</p>
<p>2) If no driver found nearby then you can hire a cab and split fare!</p>
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
<p> <strong>Hopin </strong> android application helps you to manage your rides on the move. Plan new rides, modify upcoming rides or commicate with the co-riders to check the status of current ride. Watch the video for a quick look at mobile app features  </p>
<a href="http://goo.gl/bi8mB9" >
<img style="width:60%;margin-top:50px;" src="/img/googleplay_download.png" class=" center img-responsive"/></a>
</div>
</div>


<div class="row center darktransparent feature" style="width:80%; margin-top:20px">
<div class="col-md-6">
<h2><strong style="color: rgb(93, 166, 41);font-weight: 400;">Find co-travellers in realtime with Instashare </strong></h2>
<p > <strong>Instashare</strong> helps you quickly find people who are travelling the same way. Just enter your destination and we will connect you to nearby users going your way. Share a ride, split fare and make friends on the way. A step towards easy and affordable travel.</p>
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
<p > <strong> Carpool</strong> has been redesigned to be simpler, intuitive and more beautiful than ever before. A clean interface which lets you find the right people to travel with. If you are driving and you have empty seats then you can <i>Offer ride</i> else <i>Take ride</i>.</p>
</div>
</div>

 <div class="row center darktransparent feature" style="width:80%; margin-top:20px;" >  
 <div class="col-md-offset-1 col-md-10">
 <h2 style="color: rgb(241, 98, 154);margin-top:5px;">Safe ride sharing for women</h2>
 <p style="margin-left:30px;margin-right:30px;"><span style="color:#66d634; font-style:bold;">Hopin</span> is committed to facilitating safe ride sharing for all. The app has a <i>female filter</i> feature which makes women visible to only female travellers. At the same time the <i>facebook filter</i> allows you to be visible to all of your  <span style="color: #0864ee;font-style:bold;">facebook</span> friends.</p>
</div>
</div>

 <div class="row center">
<form class="form-inline" role="form">
<h2 style="color:#807B7B;">Subscribe to receive updates</h2>
      <div class="form-group" id="emailaddress">        
        <input type="email" class="form-control"  placeholder="Email">
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
