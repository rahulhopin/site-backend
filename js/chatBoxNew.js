(function($) {
    $.widget("ui.chatbox", {
        options: {
            id: null, //id for the DOM element            
            user: null, // can be anything associated with this chatbox
            hidden: false,
            offset: 0, // relative to right edge of the browser window
            width: 300, // width of the chatbox
	    zindex:1,
            boxClosed: function(id) {
            
            }, 
            boxManager: {           
                init: function(elem) {
                    this.elem = elem;
		    this.queue = new Object();
                },
                addMsg: function(peer, msg,unixtime,msgtime) {
                    var self = this;
                    var box = self.elem.uiChatboxLog;
		
                    var e = $('<div  class="chatmsg"><span class="chatmsgstatus"></span><label class="chatmsgname">'+peer+':</label><p class="chatmsgtext">'+msg+'</p></div>' );   	
		  if(unixtime!=null)
			e.attr('id',unixtime.getTime());
		  if(peer == 'me')
			e.find('.chatmsgstatus')[0].innerHTML = "Sending..";
		else
			e.find('.chatmsgstatus')[0].innerHTML = msgtime;
                    box.append(e);
                    e.hide();
                    e.fadeIn();
                    self._scrollToBottom();
                    if (!self.elem.uiChatboxTitlebar.hasClass("ui-chatbox-focustitlebar")
                        && !self.highlightLock) {
                        //self.highlightLock = true;
                        self.highlightBox();
                    }
                },
                highlightBox: function() {
                    var self = this;
                    self.elem.uiChatboxTitlebar.effect("highlight", {}, 100).delay(100)
					.effect("highlight", {}, 100).delay(100).effect("highlight", {}, 100).delay(100)
					.effect("highlight", {}, 100);
					//self._scrollToBottom();
                   
                },
		updateMsgStatus: function(msgid,msgstatus)
		{
		   var chatmsg =  this.elem.uiChatboxLog.find('#'+msgid).find('.chatmsgstatus')[0];
		   chatmsg.innerHTML = msgstatus;
		},
                toggleBox: function() {
                    this.elem.uiChatbox.toggle();
		    if (this.elem.uiChatboxContent.is(":visible")) 
	               this.elem.uiChatboxInputBox.focus();
                },
                _scrollToBottom: function() {
                    var box = this.elem.uiChatboxLog;
                    box.scrollTop(box.get(0).scrollHeight);
                },
		maximize: function(event) {   
		if (this.elem.uiChatboxContent.css("display")=="none")
				this.elem.uiChatboxContent.toggle();		
            if (this.elem.uiChatboxContent.is(":visible")) {
                this.elem.uiChatboxInputBox.focus();
            }
		}

            },
			sendMessage: function(msg) {
			  
              }
        },
        toggleContent: function(event) {
            this.uiChatboxContent.toggle();
            if (this.uiChatboxContent.is(":visible")) {
                this.uiChatboxInputBox.focus();
            }
        },
	        widget: function() {
            return this.uiChatbox
        },
        _create: function() {
            var self = this,            
           
            // chatbox
            uiChatbox = (self.uiChatbox = self.element)              
                .addClass('ui-chatbox')
                .focusin(function() {                    
                    self.uiChatboxTitlebar.addClass('ui-chat-focustitlebar');
                })
                .focusout(function() {
                    self.uiChatboxTitlebar.removeClass('ui-chat-focustitlebar');
                }),
            // titlebar
            uiChatboxTitlebar = (self.uiChatboxTitlebar = $('<div></div>'))
                .addClass('ui-chatbox-titlebar ui-chatbox-focustitlebar')
                .click(function(event) {
                    self.toggleContent(event);
                })
                .appendTo(uiChatbox),
            uiChatboxTitle = (self.uiChatboxTitle = $('<span></span>'))
                .html(self.options.user)
                .appendTo(uiChatboxTitlebar),
            uiChatboxTitlebarClose = (self.uiChatboxTitlebarClose = $('<a href="#"></a>'))
                .addClass('ui-chatbox-close')
                .click(function(event) {
                    uiChatbox.hide();  
                    self.options.boxClosed(self.options.id);
                    return false;
                })
                .appendTo(uiChatboxTitlebar),
            uiChatboxTitlebarMinimize = (self.uiChatboxTitlebarMinimize = $('<a href="#"></a>'))
                .addClass('ui-chatbox-minimize')
                .click(function(event) {
                    self.toggleContent(event);
                    return false;
                })
                .appendTo(uiChatboxTitlebar),
            // content
            uiChatboxContent = (self.uiChatboxContent = $('<div></div>'))
                .addClass('ui-chatbox-content')
                .appendTo(uiChatbox),
            uiChatboxLog = (self.uiChatboxLog = $('<div></div>'))
                .addClass('ui-chatbox-log')
                .appendTo(uiChatboxContent),
            uiChatboxInput = (self.uiChatboxInput = $('<div></div>'))
                .addClass('ui-chatbox-input')
                .click(function(event) {
                    // anything?
                })
                .appendTo(uiChatboxContent),
            uiChatboxInputBox = (self.uiChatboxInputBox = $('<textarea></textarea>'))
                .addClass('ui-chatbox-input-box')
                .appendTo(uiChatboxInput)
                .keydown(function(event) {
                    if (event.keyCode && event.keyCode == $.ui.keyCode.ENTER) {
                        msg = $.trim($(this).val());
                        if (msg.length > 0) {
			    var time = new Date();	
                            self.options.boxManager.addMsg("me", msg,time);
			    self.options.sendMessage(msg,time); // this sends msg thorough corresponding chatAdapter
                        }
                        $(this).val("");
                        return false;
                    }
                });
            // disable selection
            uiChatboxTitlebar.find('*').add(uiChatboxTitlebar).disableSelection();
            // switch focus to input box when whatever clicked
            uiChatboxContent.children().click(function() {
                // click on any children, set focus on input box
                self.uiChatboxInputBox.focus();
            });

            self.uiChatboxInputBox.focus();
            self._setWidth(self.options.width);
            self._position(self.options.offset);
            self.options.boxManager.init(self);
            if (!self.options.hidden) {
                uiChatbox.show();
            }
        },
        _setOption: function(option, value) {
            if (value != null) {
                switch (option) {
                case "hidden":
                    if (value)
                        this.uiChatbox.hide();
                    else
                        this.uiChatbox.show();
                    break;
                case "offset":
                    this._position(value);
                    break;
                case "width":
                    this._setWidth(value);
                    break;
                }
            }
            $.Widget.prototype._setOption.apply(this, arguments);
        },
        _setWidth: function(width) {
            this.uiChatbox.width(width + "px");
        },
        _position: function(offset) {
            this.uiChatbox.css("right", offset);
        }
    });
}(jQuery));
