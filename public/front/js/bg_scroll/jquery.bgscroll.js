(function() {
	$.fn.bgscroll = $.fn.bgScroll = function( options ) {
		
		if( !this.length ) return this;
		if( !options ) options = {};
		if( !window.scrollElements ) window.scrollElements = {};
		
		for( var i = 0; i < this.length; i++ ) {
			
			var allowedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			var randomId = '';
			for( var l = 0; l < 5; l++ ) randomId += allowedChars.charAt( Math.floor( Math.random() * allowedChars.length ) );
			
				this[ i ].current = 0;
				this[ i ].scrollSpeed = options.scrollSpeed ? options.scrollSpeed : 70;
				this[ i ].direction = options.direction ? options.direction : 'h';
				window.scrollElements[ randomId ] = this[ i ];
				
				eval( 'window[randomId]=function(){var axis=0;var e=window.scrollElements.' + randomId + ';e.current -= 1;if (e.direction == "h") axis = e.current + "px 0";else if (e.direction == "v") axis = "0 " + e.current + "px";else if (e.direction == "d") axis = e.current + "px " + e.current + "px";$( e ).css("background-position", axis);}' );
														 
				setInterval( 'window.' + randomId + '()', options.scrollSpeed ? options.scrollSpeed : 70 );
			}
			
			return this;
		}
})(jQuery);

