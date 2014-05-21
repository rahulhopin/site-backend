$(document).ready(function(){ 
  $('#navbar_quickpeek').click(function(){
    window.location.replace("quickpeek.html");
  });
  $('#navbar_blog').click(function(){
    $( "#content" ).load( "http://www.hopin.co.in" );
  });
  
  $('#searchbutton').click(function(event){
	
     var src_lat = startplace.geometry.location.lat();
  var src_lng = startplace.geometry.location.lng();
  var dst_lat = destplace.geometry.location.lat();
  var dst_lng = destplace.geometry.location.lng();
  var src_address = startplace.address_components[0].long_name + ' ,' + startplace.address_components[1].long_name;
  var dst_address = destplace.address_components[0].long_name + ' ,' + destplace.address_components[1].long_name;

  var ride_type= 0;
  Util.clearCookie('request_time');
  if(State.instaride == 1){
       ride_type= 1;
       Util.setCookie('request_time',  $('.datetimebar').val());
  }

  var url = '/search/?' + 'src_latitude=' + src_lat + '&src_longitude=' + src_lng + '&dst_latitude=' + dst_lat + '&dst_longitude=' + dst_lng + '&src_address=' + src_address + '&dst_address=' + dst_address + "&ride_type=" + ride_type ;
  var params = 'src_latitude=' + src_lat + '&src_longitude=' + src_lng + '&dst_latitude=' + dst_lat + '&dst_longitude=' + dst_lng + '&src_address=' + src_address + '&dst_address=' + dst_address + "&ride_type=" + ride_type ;

       Util.setCookie('request_params' , params);
  console.log(url);
  window.location = url;
 
	event.preventDefault();
  });
  //modify search
   $("#modifysearchbutton").click(function(event){
   $("#modifysearchbuttondiv").hide();     
   $("#inputsource").prop('disabled', false);
   $("#inputsource").val("");
   $("#inputsource").attr("placeholder", "Enter source");     
   $("#inputdestination").prop('disabled', false);
   $("#inputdestination").val("");
   $("#inputdestination").attr("placeholder", "Enter source");
   $("#datetimeinput").prop('disabled', false);
   $(".removedateicon").show();
   $(".removedateicon").click();
   $("#searchbuttondiv").show(); 
   event.preventDefault();
});
 
 //for list slider  
  $(".expandpersonaldetailbutton").click(function(){
   $(this).parent().slideUp( 500 );
});
 
  $(".hidepersonaldetailbutton").click(function(){   
   $(this).parent().parent().find(".nearbyusertraveldetails").slideDown( 500 );
}); 

//date time picker
$('.datepicker').datetimepicker({
format: "dd M - hh:ii P",
showMeridian: true,
autoclose: true,
todayBtn: false,
minuteStep: 15,
 pickerPosition: "bottom-right"
});

//general functions to hide show a div
$.fn.visible = function() {
    $(this).css({'visibility': 'visible'});
};

$.fn.invisible = function() {
    $(this).css({'visibility': 'hidden'});
};


//set background
$.fn.changebackground = function () {
	var background = 'url(/img/background/backgroundhighway' + Math.floor(Math.random()*10)%6 + '.jpg)';
	$('#wrap').css({'background-image': background });
};
//:$.fn.changebackground();

//<!--how it works-->
var interval = null;
var progressArray = new Array("#progress_search","#progress_explore","#progress_connect","#progress_commute");
var progressArrayDetails = new Array("#progress_searchdetails","#progress_exploredetails","#progress_connectdetails","#progress_commutedetails");
$.fn.howitworks = function () {
var currentActive = 0;
var nextActive = 1;
interval = setInterval(function() {			
	$(progressArray[currentActive]).removeClass("progressactive");
	$(progressArray[currentActive]).addClass("progressinactive");	
	$(progressArray[nextActive]).removeClass("progressinactive");
	$(progressArray[nextActive]).addClass("progressactive");	
	$(progressArrayDetails[currentActive]).hide();
	$(progressArrayDetails[nextActive]).show();
	currentActive = nextActive;	
	nextActive = (nextActive+1)%4;
},6000);
};
$.fn.howitworks();  //start rotation

//on click of a progress button
$('#progress_search').click(function()
{
	$(this).setProgressButtonOnClick();
});
$('#progress_explore').click(function()
{
	$(this).setProgressButtonOnClick();
});
$('#progress_connect').click(function()
{
	$(this).setProgressButtonOnClick();
});
$('#progress_commute').click(function()
{
	$(this).setProgressButtonOnClick();
});
$.fn.setProgressButtonOnClick = function()
{
 clearInterval(interval);
 $(this).removeClass("progressinactive");
 $(this).addClass("progressactive");
 for(var i=0;i<4;i++)
 {
	if('#'+$(this).attr('id')==progressArray[i])
	{
		$(progressArray[i]).removeClass("progressinactive");
		$(progressArray[i]).addClass("progressactive");
		$(progressArrayDetails[i]).show();
	}
	else
	{
		$(progressArray[i]).removeClass("progressactive");
		$(progressArray[i]).addClass("progressinactive");
		$(progressArrayDetails[i]).hide();
	}
 }
};

//main page ticker
$.fn.runticker = function()
{
	var tickerul = $('#tickerul');
	setInterval(function(){
    var firstelem = $('li:first',tickerul);
	var secondelem =$('li:lt(1)',tickerul);
	tickerul.animate({top:'-83px'},"slow","swing",function(){
		firstelem.remove();
		tickerul.append("<li class=\"tickerrow\" >" + firstelem.html() +"</li>");
		tickerul.css({top:'0px'});
	});
	
	
    
  },4000);
};
$.fn.runticker();


$.fn.runtestimonails = function()
{
	var testimonialpic = $('#testimonialpics');
	var testimonialtext = $('#testimonialtext');
	var i = 1;
    var j = testimonialpic.children().length;	
	setInterval(function(){
	$('img:nth-child('+i+')',testimonialpic).fadeTo(600,0.2);		
	$('p:nth-child('+i+')',testimonialtext).fadeOut(600,'linear',function()
	{
		i=((i+1)%j);
		if(i==0)
			i = 1;
		$('img:nth-child('+i+')',testimonialpic).fadeTo(600,1);		
		$('p:nth-child('+i+')',testimonialtext).fadeIn(600,'linear');
	});
  },4000);
}
$.fn.runtestimonails();

$('.listrow').hover(
 function()
 {
 $(this).find('.thumbnaillayer').fadeTo("fast",0.0);
 },
 function()
 {
 $(this).find('.thumbnaillayer').fadeTo("fast",0.8);
 });
 
 $('.nearbyuserdetailsname').click(function(){
    var indexactive = $(this).index() + 1;
	var thislistrow = $(this).closest('.listrow');
	var thispicscontainer = thislistrow.find('.picscontainer');
    for(var i=1 ; i<$(this).parent().children().length+1; i++)
    {
        if(i != indexactive)
            $('img:nth-child('+i+')',thispicscontainer).fadeOut();
    };
    $('img:nth-child('+indexactive+')',thispicscontainer).fadeIn();
    }
 );
 
 $('.emailtoul').on('click', 'a', function(){
    $(this).parent('li').remove();
    return false;
});


 $('.sendemailtoallbutton').click(function(e)
 {
    var emailmodal = $('#sendemailmodal');
    var emailul = emailmodal.find('.emailtoul');
    emailul.empty();
    var tablistingroup = $(this).parent().parent().find('#tablist');
    $('li',tablistingroup).each(function(){
        emailul.append('<li class="emailtoli"><span>'+ $('a',this).text()+'</span><a class="emailtoliclose"></a></li>');
    });
    emailmodal.modal();    
    e.preventDefault();
    return false;
 });

 $('.sendemailtoindividual').click(function(e)
 {
	var thislistrow = $(this).closest('.listrow');
	var activelistelement = thislistrow.find('.active.nearbyuserdetailsname');
	 var emailmodal = $('#sendemailmodal');
    var emailul = emailmodal.find('.emailtoul');
    emailul.empty();
    emailul.append('<li class="emailtoli"><span>'+ $('a',activelistelement).text()+'</span><a class="emailtoliclose"></a></li>');
  
    emailmodal.modal();    
    e.preventDefault();
    return false;
 });

});

