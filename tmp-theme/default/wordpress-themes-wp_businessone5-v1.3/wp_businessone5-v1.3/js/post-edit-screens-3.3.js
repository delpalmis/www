jQuery(document).ready(function($) {

	//
	// Generic post edit scripts
	//
	$('.btn-open-media').click(function() {
		var url = $('#add_image').attr('href');
		if(typeof url === 'undefined') {
			url = $('#content-add_media').attr('href');
		}
		tb_show('', url);
		return false;
	});


	//
	// Page edit scripts
	//
	if($('#page_template').length > 0) {
		// first run.
		var template_box = $('#page_template');
		var metabox = $('div#ci_page_product_listing_meta');
		metabox.hide();
		if(template_box.val() == 'template-product_listing.php')
			metabox.show();
	
	
		// show only the custom fields we need in the post screen
		$('#page_template').change(function(){
			if(template_box.val() == 'template-product_listing.php')
				metabox.show();
			else
				metabox.hide();
		});
	}

}); 
