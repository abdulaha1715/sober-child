;(function($) {	
	jQuery(document).ready(function($){

		// search toogle class
		jQuery(".thankyou-modal-close").click(function(){
			jQuery(".thankyou-full-width-modal").toggleClass("close-modal");
		});
		
		jQuery(".checkbox").click(function(){
			// jQuery(".wc-terms-and-conditions").toggleClass("open");
			alert("Ok");
		});
        
        jQuery(".cclwplus").click(function() {
            var currentVal = parseInt($(this).next("#qty1").val());
            if (currentVal != NaN) {
                jQuery(this).next("#qty1").val(currentVal + 1);
            }
        });

        jQuery(".cclwminus").click(function() {
            var currentVal = parseInt($(this).prev("#qty1").val());
            if (currentVal != NaN) {
                if(currentVal > 0){
                	jQuery(this).prev("#qty1").val(currentVal - 1);
                }

            }
        });

	});

}(jQuery));


let diffAdd = document.querySelector("#ship-to-different-address>label");
diffAdd.style.fontSize="1.6rem";