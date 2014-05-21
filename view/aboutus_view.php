
<?php
include_once('view.php');
Class AboutUsView extends View{

public function renderView($output){
$html = ' <div class="darktransparent center" id="aboutus" style="width:80%; margin-top:20px">
 <h2 style="text-align:center;color:#c5c8c3;">About Us</h2>
 <p style="font-size:120%">Hopin is a non commercial platform that connects commuters going to same destination. Put your source and destination and find travelers around you going to same destination. See their profile , chat with them , negotiate price yourself and fix ride. It works anywhere and everywhere in the world where you can connect to internet. Its a cross platform application available on android and website and coming soon for iphone. We are open to suggestions and would love to hear from you about new features which you think should be present in <span style="color:#66d634; font-style:bold;">Hopin</span></p>
 </div>
 
 <div class="darktransparent center" id="hopinstory" style="width:80%; margin-top:20px">
 <h2 style="text-align:center;color:#c5c8c3;">The Hopin Story</h2>
 <p style="font-size:120%">It was one fine day in July 2012 that idea of <span style="color:#66d634;font-style:bold;">Hopin</span> was conceived. There was nothing unusual about it because it was everyday affair of we bunch of kgpians to talk over some or the other idea every night at dinner. We called it - "startup-startup". Its been a long journey since then and I must say that reality is very different from playing game. <br><br>
Talking about an idea is as easy as criticizing politicians but carrying it through is as difficult as actually doing something for your country. We were determined to do something this time. With 5 techies from CSE IITKGP 2010 batch we knew that we made a very formidable team. Four months down the line we had a prototype android app. Finishing touches take a lot of time and after lot of iterations over the UI we launched beta android app on 28th March 2013 on Google Play. We were overwhelmed with the response and users simply loved the interface and they found the app very useful. Continuous improvements and feature additions kept going and withing next 6 months we were out in full production mode. By 10 months from launch we crossed 5000 downloads without a single penny spent on advertising. We decided to create a website to enable users to Hopin even from their PCs and April 2014 saw the launch of first version of hopin.co.in . <br><br>Over the period many people contributed for hopin. Everything right from android app to iphone app*, from back end server to chat client, from logo to promotional videos has been developed by we bunch of friends and we are proud of it. If you feel you are interested in being part of Hopin Team then reach us at contact@hopin.co.in </p>
 </div>
 
 <div class="darktransparent center clearfix" id="hopinteam" style="width:80%; margin-top:20px">
 <h2 style="text-align:center;;color:#c5c8c3;">Team Hopin </h2>
 <div class="row">
 <div class="col-md-2 col-md-offset-1">
 <img class="img-responsive" src="/img/team/arpit.png" >
 <h5>Arpit Mishra</h5>
 <h6>IIT Kharagpur</h6>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/rahul.png">
 <h5>Rahul Saxena</h5>
 <h6>IIT Kharagpur</h6>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/mayank.png">
 <h5>Mayank Jaiswal</h5>
 <h6>IIT Kharagpur</h6>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/gourav.png">
 <h5>Gourav Khaneja</h5>
 <h6>IIT Kharagpur</h6>
 </div>
  <div class="col-md-2">
 <img class="img-responsive" src="/img/team/abhijeet.png">
 <h5>Abhijeet Kumar</h5>
 <h6>IIT Kharagpur</h6>
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
 <img class="img-responsive" src="/img/team/pratik.png">
 <h5>Pratik Jangale</h5>
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
 </div>
  
 
 <!--last in content to push view to wholw screen-->
 <div id="push"></div>';
	parent::renderView($html);
}

}
?>
