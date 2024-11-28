( function ( $ ) {
	'use strict';

	/*------------------------------------------------------------------
[Table of contents]

1. CUSTOM PRE DEFINE FUNCTION
2. MEANMENU INIT JS
3. DROPDOWN MENU RIGHT SIDE CUT FIXED

-------------------------------------------------------------------*/

	/*--------------------------------------------------------------
1. CUSTOM PRE DEFINE FUNCTION
------------------------------------------------------------*/
	/* is_exist() */
	jQuery.fn.is_exist = function () {
		return this.length;
	};

	$( function () {
		/*--------------------------------------------------------------
2. MEANMENU INIT JS
--------------------------------------------------------------*/
		// var lgtico_menu = $('.lgtico-menu');
		// if ( lgtico_menu.is_exist()) {
		//   lgtico_menu.meanmenu({
		//     meanMenuContainer: '.lgtico-nav-wrap',
		//     meanScreenWidth: "991"
		//   });
		// }

		/*--------------------------------------------------------------
3. DROPDOWN MENU RIGHT SIDE CUT FIXED
--------------------------------------------------------------*/
		$( '#primary-menu li' ).on( 'mouseenter mouseleave', function ( e ) {
			if ( $( 'ul', this ).length ) {
				// alert('55');
				var elm = $( 'ul.sub-menu', this );
				var off = elm.offset();
				var l = off.left;
				var w = elm.width();
				var docH = $( window ).height();
				var docW = $( window ).width();

				var isEntirelyVisible = l + w <= docW;

				if ( ! isEntirelyVisible ) {
					$( this ).addClass( 'edge-submenu' );
				} else {
					$( this ).removeClass( 'edge-submenu' );
				}
			}
		} );

		const slider = $( '.wp-block-limon-logo-slider' );
		if ( slider.is_exist() ) {
			const sliderSlick = slider.find(
				'.wp-block-limon-logo-slider-init'
			);
			const speed = sliderSlick.attr( 'speed' );
			slider.find( '.wp-block-limon-logo-slider-init' ).slick( {
				dots: false,
				infinite: true,
				slidesToShow: 8,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: speed,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 6,
						},
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 3,
						},
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 2,
						},
					},
				],
			} );
		}
	} ); /*End document ready*/
} )( jQuery );

document.addEventListener( 'DOMContentLoaded', () => {
	const ticTacToe = document.querySelector( '.wp-block-limon-team-members' );
	if ( ! ticTacToe ) return;

	const rows = parseInt( ticTacToe.dataset.rows, 10 );

	// Select all box elements
	const boxes = Array.from(
		ticTacToe.querySelectorAll( '.wp-block-limon-team-member' )
	);
	const totalBoxes = boxes.length;

	// Calculate how many full rows exist and the last row's start index
	const fullRows = Math.ceil( totalBoxes / rows );
	const lastRowStartIndex = ( fullRows - 1 ) * rows;

	// Apply classes dynamically
	boxes.forEach( ( box, index ) => {
		// First row
		if ( index < rows ) {
			box.classList.add( 'first-row' );
		}

		// Last row
		if ( index >= lastRowStartIndex ) {
			box.classList.add( 'last-row' );
		}

		// Add a class for the last column of each row
		if ( ( index + 1 ) % rows === 0 ) {
			box.classList.add( 'last-column' );
		}

		// Add bottom border to all rows except the last row
		if ( index < lastRowStartIndex ) {
			box.classList.add( 'has-bottom-border' );
		}
	} );
} );
