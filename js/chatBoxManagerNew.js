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
var chatBoxManager = new function(){
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
  
this.showMessage = function(chatid, name, message,msgtime)
{
this.addBox(chatid, name); //this displays the box on screen
var manager = $("#" + chatid).chatbox("option", "boxManager");
if (name.indexOf(" ") < 0) 
 firstname = name; 
else 
 firstname = name.split(" ")[0];
manager.addMsg(firstname,message,null,msgtime);
}  
  
//this is main function which adds new box    
this.addBox = function(chatid, name) {
var idx1 = showList.indexOf(chatid);
var idx2 = boxList.indexOf(chatid);
if(idx1 != -1) {
   // found one in show box, but it might be minimized
    $("#"+chatid).chatbox("option","boxManager").maximize();	
}
else if(idx2 != -1) {
   // exists, but hidden
   // show it and put it back to showList
   $("#"+chatid).chatbox("option", "offset", getNextOffset());
   $("#"+chatid).chatbox("option", "boxManager").toggleBox();
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
  sendMessage : chatManager.getChatAdapter(chatid).sendMessage,
  boxClosed : boxClosedCallback
 });
   boxList.push(chatid);
   showList.push(chatid);
   nameList.push(name);
}
};
   
};

