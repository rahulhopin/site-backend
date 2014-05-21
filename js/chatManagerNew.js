
var BOSH_SERVICE = 'http://hopin.co.in/http-bind/'
//server doing binding directly else call this link
//var PREBIND_SERVICE = 'http://qa.hopin.co.in/http-pre-bind/';
var connection = null;
var chatAdapterList = new Array();
var chatManager = {
// list of all chat adapters
//one adapter corresponds to each open chat in current session
// chat manager creates adapters if not present else returns one

 getChatAdapter : function(chatid)
{
	var idx = chatAdapterList.indexOf(chatid);
	if(idx != -1)
	{
		//found an existing adapter 
		return chatAdapterList[idx];
	}
	else
	{
		//create one
		chatadapter = new chatAdapter();
		chatadapter.init(chatid);
		chatAdapterList.push(chatadapter);
		return chatadapter
	}
},
 onMessage :  function(msg) {    
    var from = Strophe.getNodeFromJid(msg.getAttribute('from'));
    var type = msg.getAttribute('type');
	if(type == 'chat' || type == null) //server ack is bad..it has not type,sbmsgtype. All it has is subject n body
	{
		chatadapter = chatManager.getChatAdapter(from);
		chatadapter.processMessage(msg);   
	}	
    return true;
},
onOwnMessage: function(msg) {
 
  console.log(msg);
  var elems = msg.getElementsByTagName('own-message');
  if (elems.length > 0) {
      var own = elems[0];
      var to = msg.getAttribute('to');
      var from = msg.getAttribute('from');
      var iq = $iq({
	  to: from,
	  type: 'error',
	  id: msg.getAttribute('id')
      }).cnode(own).up().c('error', {type: 'cancel', code: '501'})
      .c('feature-not-implemented', {xmlns: 'urn:ietf:params:xml:ns:xmpp-stanzas'});
 
      connection.sendIQ(iq);
  }
 
  return true;
}, 
onConnect: function(status)
{
    if (status == Strophe.Status.CONNECTING) {
  log('Strophe is connecting.');
    } else if (status == Strophe.Status.CONNFAIL) {
	log('Strophe failed to connect.');
	$('#connect').get(0).value = 'connect';
    } else if (status == Strophe.Status.DISCONNECTING) {
	log('Strophe is disconnecting.');
    } else if (status == Strophe.Status.DISCONNECTED) {
	log('Strophe is disconnected.');
	$('#connect').get(0).value = 'connect';
    } else if (status == Strophe.Status.CONNECTED) {
	log('Strophe is connected.');
	
	//connection.disconnect();
	log('ECHOBOT: Send a message to ' + connection.jid + 
	    ' to talk to me.');
	connection.addHandler(chatManager.onMessage, null,    'message', null, null,  null); 
	connection.addHandler(chatManager.onOwnMessage, null, 'iq', 'set', null,  null); 
	connection.send($pres().tree());
    } else if (status == Strophe.Status.ATTACHED){
       log('Strophe attached');
	
	connection.addHandler(chatManager.onMessage, null,    'message', null, null,  null); 
	connection.addHandler(chatManager.onOwnMessage, null, 'iq', 'set', null,  null); 
	connection.send($pres().tree());
}
    
},
attach: function(jid,sid,rid) {
    log('Prebind succeeded. Attaching...');

    connection = new Strophe.Connection(BOSH_SERVICE);
    connection.rawInput = rawInput;
    connection.rawOutput = rawOutput;
    
    connection.attach(jid,sid,rid,this.onConnect);
}
 
};
//for debugging
function log(msg) 
{

    $('#log').append('<div></div>').append(document.createTextNode(msg));
//   console.log(msg);
};
 
function rawInput(data)
{
    log('RECV: ' + data);
};
 
function rawOutput(data)
{
    log('SENT: ' + data);
};

$(document).ready(function(){
var rid = Util.getCookie('session_rid');
var sid = Util.getCookie('session_sid');
var fbid = Util.getCookie('fbid');
if(rid!=null && sid!="" && fbid!=null)
{
//	rid = parseInt(rid, 10) + 1
	//rid = Math.floor(Math.random() * 4294967295);
	jid = fbid+"@hopin.co.in/"+rid ;
	chatManager.attach(jid,sid,rid);
	
}

});
