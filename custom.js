/**
 *  Remove all reviews, except for one randomly chosen review
 *
 *
 */

jQuery(function() {
	//set var to random id by calculating the number of entries and randomly picking one number
	var show_review_id = Math.floor((Math.random() * jQuery(".hreview").size()) + 1);
	var count = 1;
	jQuery(".hreview").each(function(){
		//if the current id does not match the number, remove it
		if( count !== show_review_id ){
			jQuery(this).remove();
		}
		count++;
	});
});

/**
 *	Show hidden elements when the page has completed loading
 *
 *
 */

jQuery(document).ready(function() {
	jQuery('.hreview').show();
});

// jQuery(document).ready(function() {
// 	document.getElementsByTagName("html")[0].style.visibility = "visible";
// });