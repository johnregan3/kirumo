/**
 * CSS for Theme Customizer
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Primary Link color.
	wp.customize( 'color_primary', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( 'a:not(:hover), a:active, a:visited, .site-title a:hover, .main-navigation a:hover' ).css( {
					'color': '#0074a2'
				} );
				$( '.comment-list .comment-reply-link:hover, a.button, a.button:hover' ).css( {
					'background-color': '#0074a2'
				} );
			} else {
				$( 'a:not(:hover), a:active, a:visited, .site-title a:hover, .main-navigation a:hover' ).css( {
					'color': to
				} );
				$( '.comment-list .comment-reply-link:hover, a.button, a.button:hover' ).css( {
					'background-color': to
				} );
			}
		} );
	} );
} )( jQuery );
