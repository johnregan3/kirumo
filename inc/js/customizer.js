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
				$( 'a:not(:hover), a:active, a:visited, a:visited:hover, .site-title a:hover, .main-navigation a:hover, .footer-wrap a:hover' ).css( {
					'color': '#0074a2'
				} );
				$( '.comment-list .comment-reply-link:hover, a.button, a.button:hover, button:hover, input[type="submit"]:hover' ).css( {
					'background-color': '#0074a2'
				} );
			} else {
				$( 'a:not(:hover), a:active, a:visited, a:visited:hover, .site-title a:hover, .main-navigation a:hover, .footer-wrap a:hover' ).css( {
					'color': to
				} );
				$( '.comment-list .comment-reply-link:hover, a.button, a.button:hover, button:hover, input[type="submit"]:hover' ).css( {
					'background-color': to
				} );
			}
		} );
	} );
	wp.customize( 'header_footer_color', function( value ) {
		value.bind( function( to ) {
			if ( '' === to ) {
				$( '#mobile-menu, .mobile-header, #site-navigation .sub-menu, #masthead, .footer-wrap, #nav-toggle, button, a.button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( {
					'background-color': '#333333'
				} );
			} else {
				$( '#mobile-menu, .mobile-header, #site-navigation .sub-menu, #masthead, .footer-wrap, #nav-toggle, button, a.button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( {
					'background-color': to
				} );
			}
		} );
	} );
	//Post Format Icons
	wp.customize( 'kirumo_post_format_icons', function( value ) {
		value.bind( function( to ) {
			if ( 'hide' === to ) {
				$( '.post-format-icon' ).css( {
					'display': 'none'
				} );
				$( '.post-format-content' ).css( {
					'margin-left': '0'
				} );
			} else {
				$( '.post-format-icon' ).css( {
					'display': 'block'
				} );
				$( '.post-format-content' ).css( {
					'margin-left': '3em'
				} );
			}
		} );
	} );
} )( jQuery );
