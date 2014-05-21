<?php
include_once('view.php');
Class ProfileView extends View{

public function renderView($output){
       $output = SiteUtils::formatAPIOutput($output);
 	$data = $output['fb_info'];
	$name = $data['firstname'] . ' ' . $data['lastname'];
	$work = $data['works_at'];
	$city =$data['lives_in'];
	$study = $data['study_at'];
	$hometown = $data['hometown'];
	$fbfriends = $data['friends_count'];
	$hopinfriends = count($output['HopinFriends']);
	$image = $data['image_url'];
	$fbid = $data['fbid'];
	if(strpos($image , 'facebook') !== false)
		$image .= '?type=large';
       $html = '
<link rel="stylesheet" href="/css/hopin_profile.css" type="text/css" />
<div class="profile center clearfix">
<div class="col-sm-3 profilepiccol clearfix" style="padding:0px;"> 
<div class="profilepicscontainer row clearfix">
<img class="img-responsive profilethumbnailpic center"  src="' . $image .'" alt=
"Image"  />
<ul >
<li><a href="http://www.facebook.com/'.$fbid.'">See on facebook</a></li>
</ul>
<div class="credentials clearfix">
<ul>
<li>Email <strong> Verified </strong></li>
<li>Facebook Friends <strong>'.$fbfriends .' </strong></li>
<li>Mutual friends <strong> '. $hopinfriends .' </strong></li>
</ul>

</div>
</div>
</div>
<div class="col-sm-9" >
<div class="profile_name">
<h3>'.$name.'</h3>
<!-- <label>Member since: <strong>12 Apr 2012</strong></label> | <label>Last seen at:<strong> 12:15 PM 10 Apr 2014</strong></label> -->
</div>
<div class="personaldetails clearfix">
<h4 > Profile </h4>
<hr>
<div class="row"><i style="background:url(/img/workicon.png) no-repeat;height:40px;width:40px;float:left;margin:6px;"></i><span style="display:block;"> Works at </span><label class="personaldetailvalue"  style="display:block;overflow:hidden;"> '. $work .' </label></div>

<div class="row"><i style="background:url(/img/educationicon.png) no-repeat;height:40px;width:40px;float:left;margin:6px;"></i><span style="display:block;"> Studied at </span><label class="personaldetailvalue" style="display:block;overflow:hidden;"> ' . $study .' </label></div>
<div class="col-sm-5" style="padding-left:0;">
<div class="row"><i style="background:url(/img/cityicon.png) no-repeat;height:40px;width:40px;float:left;margin:6px;"></i><span style="display:block;"> City </span><label class="personaldetailvalue"  style="display:block;overflow:hidden;">'. $city .' </label></div>

<div class="row"><i style="background:url(/img/homeicon.png) no-repeat;height:40px;width:40px;float:left;margin:6px;"></i><span style="display:block;"> Hometown </span><label class="personaldetailvalue" style="display:block;overflow:hidden;">' . $hometown .' </label></div>


</div>


</div>
</div>

';
	echo $html;
	//parent::renderView($html);
}

}
?>
