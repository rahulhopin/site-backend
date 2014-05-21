if(!Array.indexOf){
    Array.prototype.indexOf = function(obj){
for(var i=0; i<this.length; i++){
   if(this[i]==obj){
       return i;
   }
}
return -1;
    }
}
var chatboxManager = function(){
    // list of all opened boxes
    var boxList = new Array();
    // list of boxes shown on the page
    var showList = new Array();
    // list of first names, for in-page demo
    var nameList = new Array();
    var config = {
width : 300, //px
gap : 20,
maxBoxes : 4
    };
    var init = function(options) {
$.extend(config, options)
    };
    var delBox = function(id) {
// TODO
    };
	
    var getNextOffset = function() {
return (config.width + config.gap) * (showList.length%config.maxBoxes);
    };
	
var boxClosedCallback = function(id) {
// close button in the titlebar is clicked
var idx = showList.indexOf(id);
if(idx != -1) {
   showList.splice(idx, 1);
   diff = config.width + config.gap;
   for(var i = idx; i < showList.length; i++) {
offset = $("#" + showList[i]).chatbox("option", "offset");
$("#" + showList[i]).chatbox("option", "offset", offset - diff);
   }
}
else {
   alert("should not happen: " + id);
}
    };
    
//this is main function which adds new box    
var addBox = function(chatid, name) {
var idx1 = showList.indexOf(chatid);
var idx2 = boxList.indexOf(chatid);
if(idx1 != -1) {
   // found one in show box, do nothing
}
else if(idx2 != -1) {
   // exists, but hidden
   // show it and put it back to showList
   $(chatid).chatbox("option", "offset", getNextOffset());
   var manager = $(chatid).chatbox("option", "boxManager");
   manager.toggleBox();
   showList.push(chatid);
}
else{
   var el = $( "<div/>").appendTo( "body" );
   el.attr('id', chatid);
   $(el).chatbox({id : chatid,
  user : name, 
  hidden : false,
  width : config.width,
  offset : getNextOffset(),
  messageSent : messageSentCallback,
  boxClosed : boxClosedCallback
 });
   boxList.push(chatid);
   showList.push(chatid);
   nameList.push(name);
}
};
    
    
var messageSentCallback = function(id, user, msg) {
var idx = boxList.indexOf(id);
    };
    // not used in demo
    var dispatch = function(id, user, msg) {
$("#" + id).chatbox("option", "boxManager").addMsg(user, msg);
    }
    return {
init : init,
addBox : addBox,
delBox : delBox,
dispatch : dispatch
    };
}();

