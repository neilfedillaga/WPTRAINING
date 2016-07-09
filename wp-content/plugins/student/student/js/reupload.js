jQuery(document).ready(function($) {

	var sortList = $( 'ul#custom-type-list' );
	var animation = $( '#loading-animation' );
	var pageTitle = $( 'div h2' );
	
	sortList.sortable({

		update: function( event, ui ) {
			animation.show();

			$.ajax({
				url: ajaxurl,
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'save_sort',
					order: sortList.sortable( 'toArray' ),
					security: WP_UPLOAD_FILE.security
				},
				success: function( response ) {
					$( 'div#message' ).remove();
					animation.hide();
					if( true === response.success ){
						pageTitle.after( '<div id="message" class="updated"><p>' + WP_UPLOAD_FILE.success + '</p></div>' );	
					}else{
						pageTitle.after( '<div id="message" class="updated"><p>' + WP_UPLOAD_FILE.failure + '</p></div>' );
					}
						
				 
				},
				error: function( error ) {
					$( 'div#message' ).remove();
					animation.hide();
					pageTitle.after( '<div id="message" class="error"><p>' + WP_UPLOAD_FILE.failure + '</p></div>' );
				 
					 
				}
			});
		}
	});

});

