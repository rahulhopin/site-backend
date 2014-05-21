

var Login  = {
  FBLogin: function(){
	  if(!State.isLoggedIn()){
  	  FB.login(function(response) {
            if (response.authResponse) {/*
                var url = "/api.php?__call=user.fbLogin&signed_request=" + response.authResponse.signedRequest + "&_marker=0";
                Util.call(url, function(o,status) {
                    if ( status == Util.SUCCESS ) {
			console.log('logged in fb !!');
                    }
                },
                null);
            }*/
			var userid = response.authResponse.userID;
        		Util.setCookie('network' , 'fb' );
			Util.setCookie('networkID' ,userid);
			Util.setCookie('fbid',userid);
			console.log('logged in fb with uid:'+userid);
			//console.log(response);
			location.reload();

//			Login.testchatlogin();
	}
        }, {scope: 'email'});

  }
 },
 FBLogout : function(){
	Util.clearCookie('network');
	Util.clearCookie('networkID');
	window.location = '/';
 },

 emailLogin : function(){
	password = $('#formpassword').val();
        email = $('#formemail').val();
        console.log('email signup');
        params  = new  Array();
        params['email'] =  email ;
        params['password'] =  password;
        params['site'] =  1;
        params['uuid'] =  'hopin';

	console.log(params);
	var url = '/api/UserService/checkUser/';
        Util.call(url,function(o,status){
                        response = Util.parseAPIresponse(o);
                        if(response.body != undefined){
                                Util.setCookie('network' , 'email' );
                                Util.setCookie('verified' , 1 );
                                Util.setCookie('networkID' , response.body.user_id);
                                location.reload();
                        }
                        else {
				$('#loginstatus').html(response.error.error);
                                console.log('login error');
                        }
                }, params, true);

 },
 
 emailSignup :  function(){
	name = $('#name').val();
	password = $('#formpassword').val();
	email = $('#formemail').val();
	console.log('email signup');
	params  = new  Array();
	params['email'] =  email ;
	params['password'] =  password;
	params['username'] =  name; 
	params['site'] =  1; 
	var url = '/api/UserService/addUser/';
	console.log(params);
	Util.call(url,function(o,status){
		  	response = Util.parseAPIresponse(o);
			if(response.body != undefined){
				Util.setCookie('network' , 'email' );
				Util.setCookie('verified' , 0 );
	                        Util.setCookie('networkID' , response.body.user_id);
				location.reload();
			}
			else {
				console.log('login error');
			}
		}, params, true);
 
 }

};
