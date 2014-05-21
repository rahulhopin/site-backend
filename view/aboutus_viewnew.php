
<?php
include_once('view.php');
Class AboutUsView extends View{

public function renderView($output){

$html = ' <div class="darktransparent center" id="aboutus" style="width:80%; margin-top:20px">
 <h2 style="text-align:center;color:#c5c8c3;">What is Hopin?</h2>
<p>
<span style="color:#66d634; font-style:bold;">Hopin</span> is a completely free (noncommercial) platform for the everyday commuter to be able to share a ride. Drivers can offer empty seats and passengers can find a ride to their destination. Credibility of users is ensured by <span style="color: #7DACF3;font-style:bold;">facebook</span> login. People can check <span style="color: #7DACF3;font-style:bold;">facebook</span> profiles of co-travellers and choose who they want to ride with. You can send them email or chat with them using our inbuilt chat messenger, impress them with your charm to let you ride for free or decide on whether you will pay or accept payments in cash or in kind. We have no business what so ever on how you decide to trade with them. 
</p>
 </div>
';
 
$html .='

 <div class="darktransparent center clearfix" id="hopinteam" style="width:80%; margin-top:20px">
 <h2 style="text-align:center;;color:#c5c8c3;">Team Hopin </h2>
 <div class="row">
 <div class="col-md-2 col-md-offset-1">
 <img class="img-responsive" src="/img/team/arpit.png" >
 <h5>Arpit Mishra</h5>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/rahul.png">
 <h5>Rahul Saxena</h5>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/mayank.png">
 <h5>Mayank Jaiswal</h5>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/gourav.png">
 <h5>Gourav Khaneja</h5>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/abhijeet.png">
 <h5>Abhijeet Kumar</h5>
 </div>
 </div>
  <div class="row">
 <div class="col-md-2 col-md-offset-1">
 <img class="img-responsive" src="/img/team/pragya.png" >
 <h5>Pragya Tiwari</h5> 
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/akshat.png">
 <h5>Akshat Mishra</h5> 
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/prerak.png">
 <h5>Prerak Garg</h5>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/mohini.png">
 <h5>Mohini Bawiskar</h5> 
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/aimer.png">
 <h5>Aimer Bhat</h5>
 </div>
</div>
<br>
<p>
<span style="font-size:17px"><strong> A bunch of young enthusiasts, paralyzed by traffic congestion but driven by conviction to create an impeccable solution.</strong></span><br><br>
<span style="color:#66d634; font-style:bold;">Hopin</span> is a brainchild of 6 IIT Kharagpur graduates of 2010 batch. The idea was conceived in July 2012 and put into action in March 2013 with android app “<span style="color:#66d634; font-style:bold;">Carpool and Rideshare – Hopin</span>
” on Google Play. <br><br>
We had started with a vision and as we began moving some friends who shared our passion joined in. From designing the logo, creating the chat server, working on the android and the iOS app, creating this website, to creating promotional videos, writing blogs, or just spreading the word by shouting out <span style="color:#66d634; font-style:bold;">Hopin</span> at the top of our lungs as we walked on the streets, would not have been possible if it wasn’t for the formidable team who share the same passion and come from different walks of life. Today as we look back, we are no longer just the  6 flat mates who wanted to create a legacy, but we are a big group of <strong>HOPPERS</strong> who are working tirelessly and for FREE, towards getting the world to <span style="color:#66d634; font-style:bold;">Hopin</span> with us.<br><br>
If you feel you are ready to hopin and be a part of the <strong>Team Hopin</strong> then reach out to us at <strong>contact@hopin.co.in</strong>

</p>
</div>
';
 $html.='
  
 <!--last in content to push view to wholw screen-->
 <div id="push"></div>';
	parent::renderView($html);
}

}
?>
