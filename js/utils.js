var Util = {

  call : function(urlToCall, callbackName, params, isPost) {
    var dataString = '';
    for ( var i in params) {
      dataString += i + "=" + params[i] + "&";
    }
    requestType = "GET";
    if (isPost) {
      requestType = "POST"
    }

    $.ajax({
      type : requestType,
      url : urlToCall,
      data : dataString,
      success : function(data) {
        if (callbackName !== '' && callbackName != 'undefined'
            && callbackName != null)
          callbackName(data, Util.SUCCESS);
      },
      error : function(data) {
        if (callbackName !== '' && callbackName != 'undefined'
            && callbackName != null)
          callbackName(data, Util.ERROR);
      }
    });
  },

 getCookie : function(cookieName) {
    if (document.cookie.length > 0) {
            var cookieNameEq = cookieName + "=";
            var cookies = document.cookie.split(";");
            for (var i=0; i < cookies.length; i++) {
                var cookie = cookies[i];
                while (cookie.charAt(0) == ' ') {
                    cookie = cookie.substring(1,cookie.length);
                }
                if (cookie.indexOf(cookieNameEq) == 0) {
                    return cookie.substring(cookieNameEq.length,cookie.length);
                }
            }
    }
    return "";
  },

 setCookie : function(cookieName, cookieValue, nDays, isDomainLess) {
    if (nDays === undefined || nDays == null || nDays == 0)
      var nDays = 30;
    if (isDomainLess === undefined)
      var isDomainLess = false;

    var today = new Date();
    var expire = new Date();

    expire.setTime(today.getTime() + 3600000 * 24 * nDays);

    if (!isDomainLess) {
      document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + ";path=/;domain=.hopin.co.in";
    } else {
      document.cookie = cookieName + "=" + escape(cookieValue) + ";expires=" + expire.toGMTString() + "";
    }
  },

  clearCookie:  function( name ) {
      document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/;domain=.hopin.co.in';
  },

  emailUser : function(emailid){
	if(State.isLoggedIn()){
		Util.sendGmail(emailid);
	}	
	else{
		html = 'Please login to send email to user';
		bootbox.alert(html);
	}
  },


  sendMail : function(){
	var params = Array();
	params['uuid'] =  'hopin';
	params['address'] = $('#message_email').val();
	params['subject'] = $('#message_box_subject').val();
	params['message'] = $('#message_box_text').val();
	params['profile'] = $('#user_profile').val();
	var url = '/api/UserService/sendMail/';
        Util.call(url,function(o,status){
                        response = Util.parseAPIresponse(o);
                        if(response != undefined){
                                bootbox.alert(response);
                        }
                        else {
                                 bootbox.alert('Problem sending message. Please try again.');
                        }
                }, params, true);

  },
 
  sendGmail :  function(emailid){
	var str = 'http://mail.google.com/mail/?view=cm&fs=1'+
              '&to=' + emailid +
              '&su= Hopin Rideshare' 
              '&body=' 
              '&ui=1';
    	location.href = str;

  },

 parseAPIresponse : function(data , code){
	response  =  JSON.parse(data);
	console.log(response);
	return response;
 },

  showUserProfile :  function(id){
	if(id.length == 0 ){
		bootbox.alert('This person is unavaialble for contact.');
		return;
	}
	var params = Array();
	params['uuid'] =  'hopin';
	params['fbid'] = id;
	params['user_id'] = id;
	var url = '/profile/';
	// profile view will alwas have id="profile"+id
	// if we ave already once fetched profile them show it
	if($('#profile'+id).length>0)
	  $('#profile'+id).modal();
	else	
           Util.call(url,function(o,status){
                        response = o;
                        if(response != undefined){
			//	bootbox.alert(response);
		        	Util.showModal("profile"+id,response);
                        }
                        else {
                                 bootbox.alert('Problem fetching Profile info. Please try again.');
                        }
                }, params, true);
	

  },

  showMessagePopUp :  function(name, mail ,id){
	if(State.isLoggedIn()){
        var params  = Array();
	params['mail'] = mail;
	params['name'] = name;
        var url = '/message/';
	if(id.length  == 0){
		bootbox.alert('This person is unavaialble for contact.');
		return;
	}
        Util.call(url,function(o,status){
                        response = o;
                        if(response != undefined){
                                bootbox.alert(response);
                        }
                        else {
                                 bootbox.alert('Problem fetching Profile info. Please try again.');
                        }
                }, params, true);
	}
	else{
	$('#loginModal').modal();
        }
	

  },

 showChatPopUp :  function(name,fbid){
	if(fbid.length == 0){
		bootbox.alert('This person is un-available for contact.');
		return;
	}
	if(State.isLoggedIn()){
                chatBoxManager.addBox(fbid,name);
	}
	else{
	$('#loginForChatModal').modal();
        }
	

  },

 showModal: function (id,response){
	if($('#'+id).length>0)
		$('#'+id).modal();
	else{
		var modalhtml = '<div class="modal" role="dialog" aria-hidden="false" ><div class="modal-dialog "><div class="modal-content"><div class="modal-body"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#215;</button>';
		modalhtml +=response;
		modalhtml+='</div></div> </div></div>';
                var modalobj = $(modalhtml);
		modalobj.attr('id',id);
		$('body').append(modalobj);
		$('#'+id).modal();
	}
}
 
};

  Util.SUCCESS = 'success';
  Util.ERROR = 'error';
  Util.inactive = false;
  Util.pagetitle = document.title;
  Util.KEY_ENTER = 13;
