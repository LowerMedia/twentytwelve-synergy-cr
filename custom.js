/**
 *  Remove all reviews, except for one randomly chosen review
 *
 *
 */

jQuery(function() {
	console.log('DocURL: '+document.URL);
	console.log('WindowLocOrig: '+window.location.origin);
	console.log('WindowLocHref: '+window.location.href);
	if(window.location.origin+'/' === window.location.href){
		console.log('this is the home page');
	}

	//Target sidebar testimonials
	//set var to random id by calculating the number of entries and randomly picking one number
	var show_review_id = Math.floor((Math.random() * jQuery(".testimonial-wrap .hreview").size()) + 1);
	var count = 1;
	jQuery(".testimonial-wrap .hreview").each(function(){
		console.log('Count: '+count);
		console.log('Review ID: '+show_review_id);
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
