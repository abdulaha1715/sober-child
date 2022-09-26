;(function($) {	
	jQuery(document).ready(function($){

		// search toogle class
		jQuery(".thankyou-modal-close").click(function(){
			jQuery(".thankyou-full-width-modal").toggleClass("close-modal");
		});
		
		jQuery(".wc-terms-and-conditions").click(function(){
			jQuery(".wc-terms-and-conditions").toggleClass("open");
		});

	});

}(jQuery));
