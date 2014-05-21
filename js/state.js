var State = {
 isLoggedIn:  function(){
	network = Util.getCookie('network');
	if(network.length > 1) {
		return true;
	}
	return false;
 },
 instaClick: function(){
	console.log('insta');
	State.ridetime = $('.datetimebar').val();
 },
 dailyPoolClick : function(){
	State.ridetime = '8';
	console.log('daily');
 }

};
State.network = '';
State.instaride =  0; 
