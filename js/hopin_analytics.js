//geneic addlistener for cross browser compatibility
function addListener(element, type, callback) {
 if (element.addEventListener) element.addEventListener(type, callback);
 else if (element.attachEvent) element.attachEvent('on' + type, callback);
};

var ha = 
{
	
	sendLabel:function(category,action,label)
	{
		ga('send','event',category,action,label);
	},
	sendLabelValue:function(category,action,label,value)
	{
		ga('send','event',category,action,label,value);
	},
	sendField:function(category,action,field)
	{
		ga('send','event',category,action,field);
	}
	
}

$(document).ready(function(){
//nav bar buttons
$(".hopinnavbarbutton").on("click",function(){
var navBarButtonText = this.innerHTML;
ha.sendLabel("NavBar","ButtonClick","navbar_"+navBarButtonText);
});


//logout
$('#logoutbutton').on('click',function(){
ha.sendLabel("NavBar","ButtonClick","navbar_Logout");
});

//profile
$('#selfprofile').on('click',function(){
ha.sendLabel("NavBar","ButtonClick","navbar_Profile");
});

$('#search-box-homepage #searchbutton').on('click',function(){
ha.sendLabel("HomeView","ButtonClick","Search");
});


$('.onetimelabel').on('click',function(){
ha.sendLabel("HomeView","ButtonClick","OneTimePool");
});

$('.dailypoollabel').on('click',function(){
ha.sendLabel("HomeView","ButtonClick","DailyPool");
});

$('.chatwithindividual').on('click',function(){
ha.sendLabel("SearchView","ButtonClick","Chat");
});

$('.sendemailtoindividual').on('click',function(){
ha.sendLabel("SearchView","ButtonClick","Email");
});

$('.seeonfacebook').on('click',function(){
ha.sendLabel("SearchView","ButtonClick","See on facebook");
});

$('.seehopinprofile').on('click',function(){
ha.sendLabel("SearchView","ButtonClick","Hopin Profile");
});

$('#modifysearchbutton').on('click',function(){
ha.sendLabel("SearchView","ButtonClick","Modify Search");
});

$('#search-box-searchpage #searchbutton').on('click',function(){
ha.sendLabel("SearchView","ButtonClick","Search");
});

});

