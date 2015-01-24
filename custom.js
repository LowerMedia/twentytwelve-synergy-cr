

jQuery(document).ready(function() {
	jQuery('.hreview').show();
});

//ADD THE DASHICON SPAN AFTER THE DIV SO OUR :BEFORE STYLES WORK
jQuery(function() {

	

	console.log(jQuery(".hreview").size());
	var show_review_id = Math.floor((Math.random() * jQuery(".hreview").size()) + 1);
	var count = 1;
	jQuery(".hreview").each(function(){

		if( count !== show_review_id ){
			jQuery(this).remove();
		}
		count++;

	});

});