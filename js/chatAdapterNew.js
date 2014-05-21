var chatAdapter = function(){
	var msgto = null;
	var msgfrom = null;
	var myname = null;
	var domain = "hopin.co.in";
      	var msgQueue = [];

	this.addToQueue = function(key,msgstatus)
	{
           msgQueue[key]=msgstatus;
	};
	this.deleteFromQueue = function(key)
	{
	   msgQueue[key]=null;
	};
	this.init = function(msgtofbid)
	{
	  msgto = msgtofbid;
	  msgfrom = Util.getCookie('fbid');
	  myname = Util.getCookie('fbname'); 
	};


	this.sendMessage = function(message,time)
	{		
	    	if(message){
		var reply = $msg({
		    from: msgfrom + "@" + domain,
			to: msgto + "@" + domain,
			type: 'chat'
		})
		.c('subject',myname).up()
		.c('body', message).up()
		.c('active', {xmlns: "http://jabber.org/protocol/chatstates"}).up()
		.c('properties', {xmlns: "http://www.jivesoftware.com/xmlns/xmpp/properties"})
		.c('property').c('name',{},'unique_id').c('value',{type:'long'},time.getTime()).up()
		.c('property').c('name',{},'sb_msg_type').c('value',{type:'integer'},200).up()
		.c('property').c('name',{},'time').c('value',{type:'string'},getTimeForChatMsg(time));
	  //   	this.addToQueue(time.getTime(),"Sending..");	
		connection.send(reply);
	 
		}
	};
	
	this.sendAck = function(msg,ackvalue)
	{	
		//this is incoming message whose ack we have to send
		//ack for blocked 700/delivered 600
		var msgto = Strophe.getBareJidFromJid(msg.getAttribute('to'));
		var msgfrom = Strophe.getBareJidFromJid(msg.getAttribute('from'));
		var msgtype = msg.getAttribute('type');		
		
		var time = new Date();
		if(msgtype === 'chat'){
		var reply = $msg({
		    from: msgto,
			to: msgfrom,
			type: 'chat'
		})
		.c('properties', {xmlns: "http://www.jivesoftware.com/xmlns/xmpp/properties"})
		.c('property').c('name',{},'unique_id').c('value',{type:'long'},getProperty(msg,'unique_id')).up()
		.c('property').c('name',{},'sb_msg_type').c('value',{type:'integer'},ackvalue).up() 
		.c('property').c('name',{},'time').c('value',{type:'strinog'},getProperty(msg,'time'));
		
		connection.send(reply);
	 
	//	log('I sent ack to:' + to + ' for msg:' + message);
		}
	};
	
	this.processMessage = function(msg)
	{
		var sbmsgtype = getProperty(msg,'sb_msg_type');	
		var msgfrom = Strophe.getNodeFromJid(msg.getAttribute('from')); //before '@'
		if(sbmsgtype == null ) //ack for a msg we sent and it reached server
		{ //todo: stop resending vala code
		  var subject = msg.getElementsByTagName('subject')[0].innerHTML;
		  if(subject=='hopin_server_ack'){
		  	var unique_id = msg.getElementsByTagName('body')[0].innerHTML;
		  	$('#'+msgfrom).chatbox('option','boxManager').updateMsgStatus(unique_id,"Sent"); 
		  }
		  //this.addToQueue(unique_id,"Sent");
		}
		else if( sbmsgtype == 600  || sbmsgtype == 700) //for a msg delivered (or delivered but that person blockedus)
		{
		  // put delivered(blocked) in msg view
		  var unique_id = getProperty(msg,'unique_id');
		 if(sbmsgtype== 600)
			  $('#'+msgfrom).chatbox('option','boxManager').updateMsgStatus(unique_id,"Delivered"); 
		  else
			  $('#'+msgfrom).chatbox('option','boxManager').updateMsgStatus(unique_id,"Blocked"); 
	//	  this.deleteFromQueue(unique_id);
		}
		else if( sbmsgtype == 200)
		{
		 // we got new chat msg..show on window
		var name = msg.getElementsByTagName('subject')[0].innerHTML;
		var msgtext = msg.getElementsByTagName('body')[0].innerHTML;
		var msgtime = getProperty(msg,'time');
		 chatBoxManager.showMessage(msgfrom,name,msgtext,msgtime);
		this.sendAck(msg,600);
		}
	};
};

function getProperty(msg,propertyToFind)
{
	var properties = msg.getElementsByTagName('property');
	for(i=0;i<properties.length;i++)
	{
		if(properties[i].childNodes[0].innerHTML == propertyToFind)
			return properties[i].childNodes[1].innerHTML;
	}
  return null;	
}

function padTime(n) {
         return (n < 10) ? '0' + n : n;
    }

function getTimeForChatMsg(time)
{
	var hours = time.getHours();
	var minutes = time.getMinutes();
	if (hours > 12) {
		hours -= 12;
	} else if (hours === 0) {
		hours = 12;
	}
	return padTime(hours) + ':' + padTime(minutes);
}
    
