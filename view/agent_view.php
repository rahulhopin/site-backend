<?php
include_once('view.php');
Class AgentView extends View{

public function renderView($output){

       $html = '
<div class="agentlistcontainer center">
 <h2 class="darkbackground" > Grouped rides in Mumbai </h2>

<!--lists begin---> 

<div class="agentlistrow center agentlightbackground clearfix" >
<div class="col-sm-3 agentpiccol clearfix" style="padding:0px;"> 
<div class="agentpicscontainer row clearfix">
<img class="img-responsive agentthumbnailpic center"  src="https://graph.facebook.com/649462845/picture?type=large" alt=
"Image"  />
<img class="img-responsive agentthumbnailpic center"  src="https://graph.facebook.com/536309667/picture?type=large" alt=
"Image" style="display:none;" />
<p class="agentthumbnaillayer center" style="opacity:0.8">2</p>
</div>
</div>
<div class="col-sm-9 tabbable" >
<div class="agenttravellocality">
<a class="btn btn-primary sendemailtoallbutton" href="#" style="float:right;display:inline;"><i class="glyphicon glyphicon-envelope"></i> Contact group </a>
<label>From:<strong> Powai</strong></label> <label>To:<strong> Andheri</strong></label>

</div>
<ul id="agenttablist" class="nav nav-tabs clearfix">
<li class="active agentnearbyuserdetailsname">
<a href="#tabarpitmishra" data-toggle="tab"  >Arpit Mishra </a>
</li>
<li class="agentnearbyuserdetailsname" >
<a  href="#tabrahulsaxena" data-toggle="tab"  >Rahul Saxena</a>
</li>
</ul>
<div id="tabcontent" class="tab-content">
<div class="row tab-pane fade active in" id="tabarpitmishra">

<div class="agentnearbyusertraveldetails ">
<ul>
<li class="agentnearbyusersource" >
<strong>Powai Vihar Complex, MHADA Colony 20 </strong>, Powai, Mumbai, Maharashtra, India</li>
<li class="agentnearbyuserdestination" ><strong>Band Stand, Byramji Jeejeebhoy Rd Stand, Byramji Jeej</strong>, Bandra West, Mumbai, Maharashtra, India  </li>
<li class="agentnearbyusertime" >Daily @ <strong>  9:00 am</strong></li>
</ul>
<div class="agentcommunicationbar">
<a class="sendemailtoindividual" href="#">Send message</a>
<a href="#">Hopin Profile</a>
<a href="#">See on Facebook</a>
</div>

</div>
</div>

<div class="row tab-pane fade" id="tabrahulsaxena">

<div class="agentnearbyusertraveldetails ">
<ul>
<li class="agentnearbyusersource" >
<strong>Powai Vihar Complex, MHADA Colony 20 </strong>, Powai, Mumbai, Maharashtra, India</li>
<li class="agentnearbyuserdestination" ><strong>Band Stand, Byramji Jeejeebhoy Rd Stand, Byramji Jeej</strong>, Bandra West, Mumbai, Maharashtra, India  </li>
<li class="agentnearbyusertime" >Daily @ <strong>  9:00 am</strong></li>
</ul>
<div class="agentcommunicationbar">
<a  href="#">Chat</a>
<a class="sendemailtoindividual"  href="#">Email</a>
<a href="#">Hopin Profile</a>
<a href="#">See on Facebook</a>
</div>

</div>
</div>

</div>
</div>
</div>



<div class="agentlistrow center agentmildbackground clearfix" >
<div class="col-sm-3 agentpiccol clearfix" style="padding:0px;"> 
<div class="agentpicscontainer row clearfix">
<img class="img-responsive agentthumbnailpic center"  src="https://graph.facebook.com/1134022647/picture?type=large" alt=
"Image"  />
<img class="img-responsive agentthumbnailpic center"  src="https://graph.facebook.com/742258029/picture?type=large" alt=
"Image" style="display:none;" />
<img class="img-responsive agentthumbnailpic center"  src="https://graph.facebook.com/700281077/picture?type=large" alt=
"Image" style="display:none;"  />
<p class="agentthumbnaillayer center" style="opacity:0.8">3</p>
</div>
</div>
<div class="col-sm-9 tabbable" >
<div class="agenttravellocality">
<a class="btn btn-primary sendemailtoallbutton" href="#" style="float:right;display:inline;"><i class="glyphicon glyphicon-envelope"></i> Contact group </a>
<label>From:<strong> Powai</strong></label> <label>To:<strong> Andheri</strong></label>

</div>
<ul id="agenttablist" class="nav nav-tabs clearfix">
<li class="active agentnearbyuserdetailsname">
<a href="#tababhijeetkumar" data-toggle="tab"  >Abhijeet Kumar </a>
</li>
<li class="agentnearbyuserdetailsname" >
<a  href="#tabgouravkhaneja" data-toggle="tab"  >Gourav Khaneja</a>
</li>
<li class="agentnearbyuserdetailsname">
<a  href="#tabmayankjaiswal" data-toggle="tab"  >Mayank Jaiswal </a>
</li>
</ul>
<div id="tabcontent" class="tab-content">
<div class="row tab-pane fade active in" id="tababhijeetkumar">

<div class="agentnearbyusertraveldetails ">
<ul>
<li class="agentnearbyusersource" >
<strong>Powai Vihar Complex, MHADA Colony 20 </strong>, Powai, Mumbai, Maharashtra, India</li>
<li class="agentnearbyuserdestination" ><strong>Band Stand, Byramji Jeejeebhoy Rd Stand, Byramji Jeej</strong>, Bandra West, Mumbai, Maharashtra, India  </li>
<li class="agentnearbyusertime" >Daily @ <strong>  9:00 am</strong></li>
</ul>
<div class="agentcommunicationbar">
<a class="sendemailtoindividual" href="#">Send message</a>
<a href="#">Hopin Profile</a>
<a href="#">See on Facebook</a>
</div>

</div>
</div>

<div class="row tab-pane fade " id="tabgouravkhaneja">

<div class="agentnearbyusertraveldetails ">
<ul>
<li class="agentnearbyusersource" >
<strong>Powai Vihar Complex, MHADA Colony 20 </strong>, Powai, Mumbai, Maharashtra, India</li>
<li class="agentnearbyuserdestination" ><strong>Band Stand, Byramji Jeejeebhoy Rd Stand, Byramji Jeej</strong>, Bandra West, Mumbai, Maharashtra, India  </li>
<li class="agentnearbyusertime" >Daily @ <strong>  9:00 am</strong></li>
</ul>
<div class="agentcommunicationbar">
<a class="sendemailtoindividual" href="#">Send message</a>
<a href="#">Hopin Profile</a>
<a href="#">See on Facebook</a>
</div>

</div>
</div>
<div class="row tab-pane fade " id="tabmayankjaiswal">

<div class="agentnearbyusertraveldetails ">
<ul>
<li class="agentnearbyusersource" >
<strong>Powai Vihar Complex, MHADA Colony 20 </strong>, Powai, Mumbai, Maharashtra, India</li>
<li class="agentnearbyuserdestination" ><strong>Band Stand, Byramji Jeejeebhoy Rd Stand, Byramji Jeej</strong>, Bandra West, Mumbai, Maharashtra, India  </li>
<li class="agentnearbyusertime" >Daily @ <strong>  9:00 am</strong></li>
</ul>
<div class="agentcommunicationbar">
<a class="sendemailtoindividual" href="#">Send message</a>
<a href="#">Hopin Profile</a>
<a href="#">See on Facebook</a>
</div>

</div>
</div>

</div>
</div>
</div>

<div class="agentlistrow center agentlightbackground clearfix" >
<div class="col-sm-3 agentpiccol clearfix" style="padding:0px;"> 
<div class="agentpicscontainer row clearfix">
<img class="img-responsive agentthumbnailpic center"  src="https://graph.facebook.com/668822023/picture?type=large" alt=
"Image"   />
<img class="img-responsive agentthumbnailpic center"  src="https://graph.facebook.com/674136843/picture?type=large" alt=
"Image" style="display:none;"  />
<p class="agentthumbnaillayer center" style="opacity:0.8">2</p>
</div>
</div>
<div class="col-sm-9 tabbable" >
<div class="agenttravellocality">
<a class="btn btn-primary sendemailtoallbutton" href="#" style="float:right;display:inline;"><i class="glyphicon glyphicon-envelope"></i> Contact group </a>
<label>From:<strong> Powai</strong></label> <label>To:<strong> Andheri</strong></label>

</div>
<ul id="agenttablist" class="nav nav-tabs agenttablist clearfix">
<li class="active agentnearbyuserdetailsname">
<a href="#tabsakshatmishra" data-toggle="tab"  >Akshat Mishra </a>
</li>
<li class="agentnearbyuserdetailsname" >
<a  href="#tabaimerbhat" data-toggle="tab"  >Aimer Bhat</a>
</li>
</ul>
<div id="tabcontent" class="tab-content">
<div class="row tab-pane fade active in" id="tabsakshatmishra">

<div class="agentnearbyusertraveldetails ">
<ul>
<li class="agentnearbyusersource" >
<strong>Powai Vihar Complex, MHADA Colony 20 </strong>, Powai, Mumbai, Maharashtra, India</li>
<li class="agentnearbyuserdestination" ><strong>Band Stand, Byramji Jeejeebhoy Rd Stand, Byramji Jeej</strong>, Bandra West, Mumbai, Maharashtra, India  </li>
<li class="agentnearbyusertime" >Daily @ <strong>  9:00 am</strong></li>
</ul>
<div class="agentcommunicationbar">
<a class="sendemailtoindividual" href="#">Send message</a>
<a href="#">Hopin Profile</a>
<a href="#">See on Facebook</a>
</div>

</div>
</div>

<div class="row tab-pane fade " id="tabaimerbhat">

<div class="agentnearbyusertraveldetails ">
<ul>
<li class="agentnearbyusersource" >
<strong>Powai Vihar Complex, MHADA Colony 20 </strong>, Powai, Mumbai, Maharashtra, India</li>
<li class="agentnearbyuserdestination" ><strong>Band Stand, Byramji Jeejeebhoy Rd Stand, Byramji Jeej</strong>, Bandra West, Mumbai, Maharashtra, India  </li>
<li class="agentnearbyusertime" >Daily @ <strong>  9:00 am</strong></li>
</ul>
<div class="agentcommunicationbar">
<a class="sendemailtoindividual" href="#">Send message</a>
<a href="#">Hopin Profile</a>
<a href="#">See on Facebook</a>
</div>

</div>
</div>

</div>
</div>
</div>
<!--lists end--->

<!---modeal--->
<div id="sendemailmodal" class="modal fade agentsendingmail" role="dialog" style="display: none; ">  
<div class="modal-dialog">
        <div class="modal-content">
<div class="modal-header darkbackground">  
<a class="close" data-dismiss="modal">x</a>  
<h3 >Send email message</h3>  
</div>  
<div class="modal-body clearfix">  
<form class="emailform clearfix" role="form">
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
                <li class="emailtoli"><span>Arpit Mishra</span><a class="emailtoliclose"></a>
                </li>                
                </ul>
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-sm-offset-1 col-sm-2 control-label hidden-xs"><label>Subject</label></div>
            <div class="col-sm-8">
                <input title="Subject" class="form-control" type="text">
            </div>
        </div>
        <div class="form-group clearfix">
            <div class="col-sm-offset-1 col-sm-2 control-label hidden-xs"><label>Message</label></div><div class="col-sm-8">
                <textarea rows="4" cols="20" class="form-control"></textarea>
            </div>
        </div>
    
</form>              
<a href="#" class="btn btn-success btn-block center sendemailbuttonform" data-dismiss="modal"><strong>Send</strong></a>
</div>  
 
</div>  
</div> 
</div>  
</div> 
<!--------->


'
;

	parent::renderView($html);
}

}
?>
