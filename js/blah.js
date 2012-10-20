$(function(){
	$('#main').imagesLoaded(function(){
		
  /* only use masonry if window is wider than 700 */
	var w = $(window).width();
	if (w>700){
		var colObject = getColObject(w);
		setMargins(colObject.gutter);
		  $('#main').masonry({
		    // options
		    itemSelector : '.article',
		    columnWidth: colObject.width,
		    gutterWidth: colObject.gutter
		  }); /* end masonry function */
  	 } /* end if statement */
	
	$(window).resize(function() {
		var w = $(window).width();
		if (w>700){
			var colObject = getColObject(w);
			setMargins(colObject.gutter);
	    $('#main').masonry({  
		   	itemSelector : '.article',
		    columnWidth: colObject.width,
		    gutterWidth: colObject.gutter
	
	    });
	  } else {
			/* Remove all masonry markup */
	  	$('#main').masonry('destroy');
	  }
	});
	
	function getColObject(w){
/* 	Returns an object literal with width and gutter size for the column */
		var c = {width:300, gutter:30};
		
		var p = $('#page').width();
		c.gutter = .034 * p;
		
		if (w > 1100){	
			p = p/3;
			c.width = p - c.gutter;
		} else if (w > 700){
			p = p/2;
			c.width = p - c.gutter;
		}
		return c;
	}
	
	function setMargins(gutter){
		$('.article').css('margin-bottom', gutter);
		/* $('#header').css('margin-bottom', gutter*.9); */
	}
	
	 }); /* end imagesloaded function */

});

