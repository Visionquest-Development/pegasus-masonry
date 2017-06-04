(function( $ ) {
	'use strict';
	
	//this is for masonry / packery - it adds the item class to each image
	$('#masonry-grid').find('img').each(function() {       
		$(this).addClass('item');
	}); 
	
	// init Masonry
	/*var $grid = $('#masonry-grid').masonry({
		// options...
		columnWidth: 200,
		itemSelector: '.item'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry('layout');
	});
	*/
	
	var $grid = $('#masonry-grid').imagesLoaded( function() {
		// init Masonry after all images have loaded
		$grid.masonry({
			// options...
			//columnWidth: 200,
			itemSelector: '.item'
		});
	});
	
	
	/*

	
	//$('#masonry-grid').masonry({
		//columnWidth: 200,
		//itemSelector: '.item'
	//});
	
	//this is for packery to run
	// $('#grid').packery({
	  // // options
	  // itemSelector: '.item',
	  // percentPosition: true,
	  // gutter: 1
	// });
	
	*/

})( jQuery );
