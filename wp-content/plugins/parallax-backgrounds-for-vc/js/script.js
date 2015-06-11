// @codekit-prepend "gambit-parallax.js"
// @codekit-append "gambit-video-bg.js"


/*
 * Disable showing/rendering the parallax in the VC's frontend editor
 */
jQuery(document).ready(function($) {
	"use strict";


	/*
	 * Disable showing/rendering the parallax in the VC's frontend editor
	 */
	if ( $('body').hasClass('vc_editor') ) {
		return;
	}


	/*
	 * Remove video background in mobile devices.
	 */

	// Remove the video for mobile devices
	function _isMobile() {
		return ( Modernizr.touch && jQuery(window).width() <= 1000 ) || // touch device estimate
	 	 	   ( window.screen.width <= 1281 && window.devicePixelRatio > 1 ); // device size estimate
	}
	if ( _isMobile() ) {
		$('.bg-parallax.video > div, .gambit-bg-parallax.video > div').remove();
	}


	/*
	 * Break out the sides of the row, retain the content placement
	 */
	var applyBreakOut = function() {
		"use strict";
		var $ = jQuery;

		$('.bg-parallax, .gambit-bg-parallax').each(function() {
			var $row = $(this).next();

			if ( $row.length == 0 ) {
				return;
			}

			if ( typeof $(this).attr('data-break-parents') === 'undefined' ) {
				return;
			}

			var breakNum = parseInt( $(this).attr('data-break-parents') );
			if ( isNaN( breakNum ) ) {
				return;
			}

			// Find the parent we're breaking away to
			var $parent = $row.parent();
			for ( var i = 0; i < breakNum; i++ ) {
				if ( $parent.is('html') ) {
					break;
				}
				$parent = $parent.parent();
			}

			// Remember the original margin & paddings, OR bring them back to their defaults
			if ( typeof $row.attr('data-orig-margin-left') === 'undefined' ) {
				$row.attr('data-orig-margin-left', $row.css('marginLeft'));
				$row.attr('data-orig-padding-left', $row.css('paddingLeft'));
				$row.attr('data-orig-margin-right', $row.css('marginRight'));
				$row.attr('data-orig-padding-right', $row.css('paddingRight'));
			} else {
				// we need to do it this way since !important cannot be placed by jQuery
				$row[0].style.removeProperty( 'margin-left' );
				$row[0].style.removeProperty( 'padding-left' );
				$row[0].style.removeProperty( 'margin-right' );
				$row[0].style.removeProperty( 'padding-right' );
				$row[0].style.setProperty( 'margin-left', $row.attr('data-orig-margin-left'), 'important' );
				$row[0].style.setProperty( 'padding-left', $row.attr('data-orig-padding-left'), 'important' );
				$row[0].style.setProperty( 'margin-right', $row.attr('data-orig-margin-right'), 'important' );
				$row[0].style.setProperty( 'padding-right', $row.attr('data-orig-padding-right'), 'important' );
			}

			// Compute dimensions & location
			var parentWidth = $parent.width() +
				              parseInt( $parent.css('paddingLeft') ) +
				              parseInt( $parent.css('paddingRight') );
			var rowWidth = $row.width() +
				           parseInt( $row.css('paddingLeft') ) +
				           parseInt( $row.css('paddingRight') );

			var left = $row.offset().left - $parent.offset().left;
			var right = ( $parent.offset().left + parentWidth ) - ( $row.offset().left + rowWidth );

			var marginLeft = parseFloat( $row.css('marginLeft') );
			var marginRight = parseFloat( $row.css('marginRight') );
			var paddingLeft = parseFloat( $row.css('paddingLeft') );
			var paddingRight = parseFloat( $row.css('paddingRight') );

			marginLeft -= left;
			paddingLeft += left;
			marginRight -= right;
			paddingRight += right;

			// Apply the new margin & paddings, we need to do it this way since !important cannot be
			// placed by jQuery
			$row[0].style.removeProperty( 'margin-left' );
			$row[0].style.removeProperty( 'padding-left' );
			$row[0].style.removeProperty( 'margin-right' );
			$row[0].style.removeProperty( 'padding-right' );
			$row[0].style.setProperty( 'margin-left', marginLeft + 'px', 'important' );
			$row[0].style.setProperty( 'padding-left', paddingLeft + 'px', 'important' );
			$row[0].style.setProperty( 'margin-right', marginRight + 'px', 'important' );
			$row[0].style.setProperty( 'padding-right', paddingRight + 'px', 'important' );

			$row.addClass( 'broke-out broke-out-' + breakNum );
		});
	};
	$(window).resize(applyBreakOut);
	applyBreakOut();

	// Hide the placeholder
	$('.bg-parallax, .gambit-bg-parallax').next().addClass('bg-parallax-parent');
	$('.bg-parallax.parallax, .gambit-bg-parallax.parallax').attr('style', '').css('display', 'none');



	/*
	 * Initialize the image parallax
	 */

	$('.bg-parallax.parallax, .gambit-bg-parallax.parallax').each(function() {
		$(this).gambitImageParallax({
			image: $(this).attr('data-bg-image'),
			direction: $(this).attr('data-direction'),
			mobileenabled: $(this).attr('data-mobile-enabled'),
			mobiledevice: _isMobile(),
			opacity: $(this).attr('data-opacity'),
			width: $(this).attr('data-bg-width'),
			height: $(this).attr('data-bg-height'),
			velocity: $(this).attr('data-velocity'),
			align: $(this).attr('data-bg-align'),
			repeat: $(this).attr('data-bg-repeat'),
			target: $(this).next(),
			complete: function() {
			}
		});
	});



	/*
	 * Initialize the video background
	 */

	// This is currently performed in the bg-video.js script FIXME


});