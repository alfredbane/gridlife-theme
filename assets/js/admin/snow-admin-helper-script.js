
(function($){

  "use strict";
	$(document).ready(function(){
		$(document).on('click','#top_stories', function() {

		  var targetIsChecked = $(this).prop("checked");

		  var currentID = $(this).parent().parent().find("th [name^='post']").val();

		  $.ajax({
		    type: "POST",
		    url: ajaxurl,
		    data: { 
		    		action: 'toggle_topstory', 
		    		fieldValue: targetIsChecked,
		    		currentID: currentID
		    	  }
		  }).done(function( data ) {
		  		// Nothing to be done
		 });
		  
		});
	});
}) (jQuery);