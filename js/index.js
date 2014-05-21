var myapp={};
myapp['srcLatLong']=undefined;
myapp['dstLatLong']=undefined;
var startplace = '';
var destplace = '';

function initSrcDstAutocomplete()
{
   var input_src = $('#inputsource')[0];//document.getElementById('inputsource');
   var input_dest = $('#inputdestination')[0]; //document.getElementById('inputdestination');
   var options = {
     //    types: ['establishment']
   };

   autocomplete_src = new google.maps.places.Autocomplete(input_src, options);
   autocomplete_dest = new google.maps.places.Autocomplete(input_dest, options);

    google.maps.event.addListener(autocomplete_src, 'place_changed', function() {
   	startplace = autocomplete_src.getPlace();
    	if (!startplace.geometry) {
     	 return;
    	}
    });

    google.maps.event.addListener(autocomplete_dest, 'place_changed', function() {
    	destplace = autocomplete_dest.getPlace();
    	if (!destplace.geometry) {
      	 return;
    	}
    });
		
 }



$(document).ready(function(){
	initSrcDstAutocomplete();
	   // disable enter key press
	   $("form").bind("keypress", function(e) {
              if (e.keyCode == 13) {
                 return false;
              }
           });
});




