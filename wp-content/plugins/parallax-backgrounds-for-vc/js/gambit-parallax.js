
/*
 * Modernizr touch detection only
 */
if ( typeof( Modernizr ) === 'undefined' ) {
	;window.Modernizr=function(a,b,c){function v(a){i.cssText=a}function w(a,b){return v(l.join(a+";")+(b||""))}function x(a,b){return typeof a===b}function y(a,b){return!!~(""+a).indexOf(b)}function z(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:x(f,"function")?f.bind(d||b):f}return!1}var d="2.8.3",e={},f=b.documentElement,g="modernizr",h=b.createElement(g),i=h.style,j,k={}.toString,l=" -webkit- -moz- -o- -ms- ".split(" "),m={},n={},o={},p=[],q=p.slice,r,s=function(a,c,d,e){var h,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:g+(d+1),l.appendChild(j);return h=["&#173;",'<style id="s',g,'">',a,"</style>"].join(""),l.id=g,(m?l:n).innerHTML+=h,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=f.style.overflow,f.style.overflow="hidden",f.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),f.style.overflow=k),!!i},t={}.hasOwnProperty,u;!x(t,"undefined")&&!x(t.call,"undefined")?u=function(a,b){return t.call(a,b)}:u=function(a,b){return b in a&&x(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=q.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(q.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(q.call(arguments)))};return e}),m.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:s(["@media (",l.join("touch-enabled),("),g,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c};for(var A in m)u(m,A)&&(r=A.toLowerCase(),e[r]=m[A](),p.push((e[r]?"":"no-")+r));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)u(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof enableClasses!="undefined"&&enableClasses&&(f.className+=" "+(b?"":"no-")+a),e[a]=b}return e},v(""),h=j=null,e._version=d,e._prefixes=l,e.testStyles=s,e}(this,this.document);
}

/**
 * requestAnimationFrame polyfill
 *
 * http://paulirish.com/2011/requestanimationframe-for-smart-animating/
 * http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
 * requestAnimationFrame polyfill by Erik Möller. fixes from Paul Irish and Tino Zijdel
 * requestAnimationFrame polyfill under MIT license
 */
(function() {
	var lastTime = 0;
	var vendors = ['ms', 'moz', 'webkit', 'o'];
	for( var x = 0; x < vendors.length && ! window.requestAnimationFrame; ++x ) {
		window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
	}

	if (!window.requestAnimationFrame) {
		window.requestAnimationFrame = function( callback, element ) {
			return window.setTimeout( function() { callback(); }, 16 );
		};
	}
}());


// Don't re-initialize our variables since that can delete existing values
if ( typeof _gambitImageParallaxImages === 'undefined' ) {
	var _gambitImageParallaxImages = [];
	var _gambitScrollTop;
	var _gambitWindowHeight;
	var _gambitScrollLeft;
	var _gambitWindowWidth;
}


;(function ( $, window, document, undefined ) {
	// Create the defaults once
	var pluginName = "gambitImageParallax",
		defaults = {
			direction: 'up', // fixed
			mobileenabled: false,
			mobiledevice: false,
			width: '',
			height: '',
			align: 'center',
			opacity: '1',
			velocity: '.3',
			image: '', // The background image to use, if empty, the current background image is used
			target: '', // The element to apply the parallax to
			repeat: false,
			loopScroll: '',
			loopScrollTime: '2',
			removeOrig: false,
			complete: function() {}
	};

	// The actual plugin constructor
	function Plugin ( element, options ) {
		this.element = element;
		// jQuery has an extend method which merges the contents of two or
		// more objects, storing the result in the first object. The first object
		// is generally empty as we don't want to alter the default options for
		// future instances of the plugin
		this.settings = $.extend( {}, defaults, options );

		if ( this.settings.align == '' ) {
			this.settings.align = 'center';
		}

		this._defaults = defaults;
		this._name = pluginName;
		this.init();
	}

	// Avoid Plugin.prototype conflicts
	$.extend(Plugin.prototype, {
		init: function () {
			// Place initialization logic here
			// You already have access to the DOM element and
			// the options via the instance, e.g. this.element
			// and this.settings
			// you can add more functions like the one below and
			// call them like so: this.yourOtherFunction(this.element, this.settings).
			// console.log("xD");

			// $(window).bind( 'parallax', function() {
			// self.gambitImageParallax();
			// });

			// If there is no target, use the element as the target
			if ( this.settings.target === '' ) {
				this.settings.target = $(this.element);
			}
			
			this.settings.target.addClass( this.settings.direction );

			// If there is no image given, use the background image if there is one
			if ( this.settings.image === '' ) {
				//if ( typeof $(this.element).css('backgroundImage') !== 'undefined' && $(this.element).css('backgroundImage').toLowerCase() !== 'none' && $(this.element).css('backgroundImage') !== '' )
				if ( typeof $(this.element).css('backgroundImage') !== 'undefined' && $(this.element).css('backgroundImage') !== '' ) {
					this.settings.image = $(this.element).css('backgroundImage').replace( /url\(|\)|"|'/g, '' );
				}
			}

			_gambitImageParallaxImages.push( this );

			this.setup();

			this.settings.complete();
			
			this.containerWidth = 0;
			this.containerHeight = 0;
		},


		setup: function () {
			if ( this.settings.removeOrig !== false ) {
				$(this.element).remove();
			}

			this.resizeParallaxBackground();
		},


		doParallax: function () {
			// if it's a mobile device and not told to activate on mobile, stop.
			if ( this.settings.mobiledevice && !this.settings.mobileenabled ) {
				return;
			}

			// fixed backgrounds need no movement
			if ( this.settings.direction == 'fixed' ) {
				
				// Chrome retina bug where the background doesn't repaint
				// Bug report: https://code.google.com/p/chromium/issues/detail?id=366012
				if ( window.devicePixelRatio > 1 ) {
					$(this.settings.target).hide().show(0);
				}
				
				return;
			}

			// check if the container is in the view
			if ( ! this.isInView() ) {
				return;
			}

			// Continue moving the background
			var $target = this.settings.target.find('.parallax-inner');

			// Assert a minimum of 150 pixels of height globally. Prevents the illusion of parallaxes not rendering at all in empty fields.
			$target.css({
				minHeight: '150px'
			});
			
			// Retrigger a resize if the container's size suddenly changed
			var w = this.settings.target.width() + parseInt( this.settings.target.css( 'paddingRight' ) ) + parseInt( this.settings.target.css( 'paddingLeft' ) );
			var h = this.settings.target.height() + parseInt( this.settings.target.css( 'paddingTop' ) ) + parseInt( this.settings.target.css( 'paddingBottom' ) );
			if ( this.containerWidth !== 0 && this.containerHeight !== 0 && ( w !== this.containerWidth || h !== this.containerHeight ) ) {
				this.resizeParallaxBackground();
			}
			this.containerWidth = w;
			this.containerHeight = h;

			// If we don't have anything to scroll, stop
			if ( typeof $target === 'undefined' || $target.length === 0 ) {
				return;
			}

			// compute for the parallax amount
			var percentageScroll = (_gambitScrollTop - this.scrollTopMin) / (this.scrollTopMax - this.scrollTopMin);
			var dist = this.moveMax * percentageScroll;

			// change direction
			if ( this.settings.direction == 'left' || this.settings.direction == 'up' ) {
				dist *= -1;
			}

			// IE9 check, IE9 doesn't support 3d transforms, so fallback to 2d translate
			var translateHori = 'translate3d(';
			var translateHoriSuffix = 'px, 0px, 0px)';
			var translateVert = 'translate3d(0px, ';
			var translateVertSuffix = 'px, 0px)';
			if ( typeof _gambitParallaxIE9 !== 'undefined' ) {
				translateHori = 'translate(';
				translateHoriSuffix = 'px, 0px)';
				translateVert = 'translate(0px, ';
				translateVertSuffix = 'px)';
			}

			if ( $target.css('background-repeat') == "no-repeat" ) {
				if ( this.settings.direction == 'down' && dist < 0 ) {
					dist = 0;
				}
				if ( this.settings.direction == 'up' && dist > 0 ) {
					dist = 0;
				}
			}
			
			// Apply the parallax transforms
			// Use GPU here, use transition to force hardware acceleration
			// if ( this.settings.direction === 'fixed' ) {
			//
			// 	// For fixed direction, mimic the position of the scroll since doing a position: fixed
			// 	// inside an overflow: hidden doesn't work in Firefox
			// 	$target.css({
			// 		top: - this.settings.target.offset().top,
			// 		webkitTransition: 'webkitTransform 1ms linear',
			// 		mozTransition: 'mozTransform 1ms linear',
			// 		msTransition: 'msTransform 1ms linear',
			// 		oTransition: 'oTransform 1ms linear',
			// 		transition: 'transform 1ms linear',
			// 		webkitTransform: translateVert + _gambitScrollTop + translateVertSuffix,
			// 		mozTransform: translateVert + _gambitScrollTop + translateVertSuffix,
			// 		msTransform: translateVert + _gambitScrollTop + translateVertSuffix,
			// 		oTransform: translateVert + _gambitScrollTop + translateVertSuffix,
			// 		transform: translateVert + _gambitScrollTop + translateVertSuffix
			// 	});
			// }
			// else
			if ( this.settings.direction === 'left' || this.settings.direction === 'right' ) {
				$target.css({
					webkitTransition: 'webkitTransform 1ms linear',
					mozTransition: 'mozTransform 1ms linear',
					msTransition: 'msTransform 1ms linear',
					oTransition: 'oTransform 1ms linear',
					transition: 'transform 1ms linear',
					webkitTransform: translateHori + dist + translateHoriSuffix,
					mozTransform: translateHori + dist + translateHoriSuffix,
					msTransform: translateHori + dist + translateHoriSuffix,
					oTransform: translateHori + dist + translateHoriSuffix,
					transform: translateHori + dist + translateHoriSuffix
				});
			}
			else {
				$target.css({
					webkitTransition: 'webkitTransform 1ms linear',
					mozTransition: 'mozTransform 1ms linear',
					msTransition: 'msTransform 1ms linear',
					oTransition: 'oTransform 1ms linear',
					transition: 'transform 1ms linear',
					webkitTransform: translateVert + dist + translateVertSuffix,
					mozTransform: translateVert + dist + translateVertSuffix,
					msTransform: translateVert + dist + translateVertSuffix,
					oTransform: translateVert + dist + translateVertSuffix,
					transform: translateVert + dist + translateVertSuffix
				});
			}
		
			// In some browsers, parallax might get jumpy/shakey, this hack makes it better
			// by force-cancelling the transition duration
			$target.css({
				webkitTransition: 'webkitTransform -1ms linear',
				mozTransition: 'mozTransform -1ms linear',
				msTransition: 'msTransform -1ms linear',
				oTransition: 'oTransform -1ms linear',
				transition: 'transform -1ms linear',
			});
		},


		// Checks whether the container with the parallax is inside our viewport
		isInView: function() {
			var $target = this.settings.target;

			if ( typeof $target === 'undefined' || $target.length === 0 ) {
				return;
			}

			var elemTop = $target.offset().top;
			var elemHeight = $target.height() + parseInt( $target.css('paddingTop') ) + parseInt( $target.css('paddingBottom') );

			if ( elemTop + elemHeight < _gambitScrollTop || _gambitScrollTop + _gambitWindowHeight < elemTop ) {
				return false;
			}

			return true;
		},


		// Resizes the parallax to match the container size
		resizeParallaxBackground: function() {
			var $target = this.settings.target;
			if ( typeof $target === 'undefined' || $target.length === 0 ) {
				return;
			}


			// Repeat the background
			var isRepeat = this.settings.repeat === 'true' || this.settings.repeat === true || this.settings.repeat === 1;
			

			/*
			 * None, do not apply any parallax at all.
			 */

			if ( this.settings.direction === 'none' ) {

				// Stretch the image to fit the entire window
				var w = $target.width() + parseInt( $target.css( 'paddingRight' ) ) + parseInt( $target.css( 'paddingLeft' ) );

				// Compute position
				var position = $target.offset().left;
				if ( this.settings.align === 'center' ) {
					position = '50% 50%';
				}
				else if ( this.settings.align === 'left' ) {
					position = '0% 50%';
				}
				else if ( this.settings.align === 'right' ) {
					position = '100% 50%';
				}
				else if ( this.settings.align === 'top' ) {
					position = '50% 0%';
				}
				else if ( this.settings.align === 'bottom' ) {
					position = '50% 100%';
				}

				$target.css({
					opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
					backgroundSize: 'cover',
					backgroundAttachment: 'scroll',
					backgroundPosition: position,
					backgroundRepeat: 'no-repeat'
				});
				if ( this.settings.image !== '' && this.settings.image !== 'none' ) {
					$target.css({
						opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
						backgroundImage: 'url(' + this.settings.image + ')'
					});
				}

			/*
			 * Fixed, just stretch to fill up the entire container
			 */


			} else if ( this.settings.direction === 'fixed' ) {

				// if ( this.settings.direction === 'fixed' ) {
				$target.css({
					backgroundAttachment: 'fixed',
					backgroundRepeat: 'repeat'
				});
				// $target.attr(
				// 	'style',
				// 	'background-image: url(' + this.settings.image + ') !important;' + $target.attr( 'style' )
				// );
				if ( this.settings.image !== '' && this.settings.image !== 'none' ) {
					$target.attr( 'style', 'background-image: url(' + this.settings.image + ') !important;' + $target.attr('style') );
				}


				// // Stretch the image to fit the entire window
// 				var w = $target.width() + parseInt( $target.css( 'paddingRight' ) ) + parseInt( $target.css( 'paddingLeft' ) );
// 				var h = _gambitWindowHeight;
//
// 				// Compute left position
// 				var left = '0%';
// 				if ( this.settings.align === 'center' ) {
// 					left = '50%';
// 				} else if ( this.settings.align === 'right' ) {
// 					left = '100%';
// 				}
//
// 				if ( $target.find('.parallax-inner').length < 1 ) {
// 					$target.prepend('<div class="parallax-inner"></div>');
// 				}
//
// 				// Apply the required styles
// 				$target.css({
// 					position: 'relative',
// 					overflow: 'hidden',
// 					zIndex: 1
// 				})
// 				.attr('style', 'background-image: none !important; ' + $target.attr('style'))
// 				.find('.parallax-inner').css({
// 					pointerEvents: 'none',
// 					width: w,
// 					height: h,
// 					position: 'absolute',
// 					zIndex: -1,
// 					top: - this.settings.target.offset().top,
// 					left: 0,
// 					// position: 'fixed',
// 					opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
// 					backgroundPosition: left + ' 50%',
// 					backgroundAttachment: 'fixed',
// 					backgroundRepeat: isRepeat ? 'repeat' : 'no-repeat',
// 					backgroundImage: 'url(' + this.settings.image + ')',
//
// 					webkitTransition: 'webkitTransform 1ms linear',
// 					mozTransition: 'mozTransform 1ms linear',
// 					msTransition: 'msTransform 1ms linear',
// 					oTransition: 'oTransform 1ms linear',
// 					transition: 'transform 1ms linear',
// 					webkitTransform: 'translate3d(0px, 0px, 0px)',
// 					mozTransform: 'translate3d(0px, 0px, 0px)',
// 					msTransform: 'translate3d(0px, 0px, 0px)',
// 					oTransform: 'translate3d(0px, 0px, 0px)',
// 					transform: 'translate3d(0px, 0px, 0px)'
// 				});
//
// 				if ( this.settings.image !== '' && this.settings.image !== 'none' ) {
// 					$target.find('.parallax-inner').css({
// 						opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
// 						backgroundImage: 'url(' + this.settings.image + ')'
// 					});
// 				}


			/*
			 * Left & right parallax - Stretch the image to fit the height & extend the sides
			 */


			} else if ( this.settings.direction === 'left' || this.settings.direction === 'right' ) {

				// Stretch the image to fit the entire window
				var w = $target.width() + parseInt( $target.css( 'paddingRight' ) ) + parseInt( $target.css( 'paddingLeft' ) );
				var h = $target.height() + parseInt( $target.css( 'paddingTop' ) ) + parseInt( $target.css( 'paddingBottom' ) );
				var origW = w;
				w += 400 * Math.abs( parseFloat( this.settings.velocity ) );

				// Compute left position
				var top = '0%';
				if ( this.settings.align === 'center' ) {
					top = '50%';
				} else if ( this.settings.align === 'bottom' ) {
					top = '100%';
				}

				// Compute top position
				var left = 0;
				if ( this.settings.direction === 'right' ) {
					left -= w - origW;
				}

				if ( $target.find('.parallax-inner').length < 1 ) {
					$target.prepend('<div class="parallax-inner"></div>');
				}
				
				// Apply the required styles
				$target.css({
					position: 'relative',
					overflow: 'hidden',
					zIndex: 1
				})
				.attr('style', 'background-image: none !important; ' + $target.attr('style'))
				.find('.parallax-inner').css({
					pointerEvents: 'none',
					width: w,
					height: h,
					position: 'absolute',
					zIndex: -1,
					top: 0,
					left: left,
					opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
					backgroundPosition: isRepeat ? '0 0 ' : '50% ' + top,
					backgroundRepeat: isRepeat ? 'repeat' : 'no-repeat'
				});

				if ( this.settings.image !== '' && this.settings.image !== 'none' ) {
					$target.find('.parallax-inner').css({
						opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
						backgroundImage: 'url(' + this.settings.image + ')'
					});
				}

				// Compute for the positions to save cycles
				var scrollTopMin = 0;
				if ( $target.offset().top > _gambitWindowHeight ) {
					scrollTopMin = $target.offset().top - _gambitWindowHeight;
				}
				var scrollTopMax = $target.offset().top + $target.height() + parseInt( $target.css( 'paddingTop' ) ) + parseInt( $target.css( 'paddingBottom' ) );

				this.moveMax = w - origW;
				this.scrollTopMin = scrollTopMin;
				this.scrollTopMax = scrollTopMax;


			/*
			 * Up & down parallax - Stretch the image to fit the width & extend vertically
			 */


			} else { // Up or down
				// We have to add a bit more to DOWN since the page is scrolling as well,
				// or else it will not be visible
				var heightCompensate = 800;
				if ( this.settings.direction === 'down' ) {
					heightCompensate *= 1.2;
				}

				// Stretch the image to fit the entire window
				var w = $target.width() + parseInt( $target.css( 'paddingRight' ) ) + parseInt( $target.css( 'paddingLeft' ) );
				var h = $target.height() + parseInt( $target.css( 'paddingTop' ) ) + parseInt( $target.css( 'paddingBottom' ) );
				var origH = h;
				h += heightCompensate * Math.abs( parseFloat(this.settings.velocity) );

				// Compute left position
				var left = '0%';
				if ( this.settings.align === 'center' ) {
					left = '50%';
				} else if ( this.settings.align === 'right' ) {
					left = '100%';
				}

				// Compute top position
				var top = 0;
				if ( this.settings.direction === 'down' ) {
					top -= h - origH;
				}

				if ( $target.find('.parallax-inner').length < 1 ) {
					$target.prepend('<div class="parallax-inner"></div>');
				}

				// Apply the required styles
				$target.css({
					position: 'relative',
					overflow: 'hidden',
					zIndex: 1
				})
				.attr('style', 'background-image: none !important; ' + $target.attr('style'))
				.find('.parallax-inner').css({
					pointerEvents: 'none',
					width: w,
					height: h,
					position: 'absolute',
					zIndex: -1,
					top: top,
					left: 0,
					opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
					backgroundPosition: isRepeat ? '0' : left + ' 50%',
					backgroundRepeat: isRepeat ? 'repeat' : 'no-repeat'
				});

				if ( this.settings.image !== '' && this.settings.image !== 'none' ) {
					$target.find('.parallax-inner').css({
						opacity: Math.abs( parseFloat ( this.settings.opacity ) / 100 ),
						backgroundImage: 'url(' + this.settings.image + ')'
					});
				}

				// Compute for the positions to save cycles
				var scrollTopMin = 0;
				if ( $target.offset().top > _gambitWindowHeight ) {
					scrollTopMin = $target.offset().top - _gambitWindowHeight;
				}
				var scrollTopMax = $target.offset().top + $target.height() + parseInt( $target.css( 'paddingTop' ) ) + parseInt( $target.css( 'paddingBottom' ) );

				this.moveMax = h - origH;
				this.scrollTopMin = scrollTopMin;
				this.scrollTopMax = scrollTopMax;
			}
		},


		// Calculates the new size of an image to fit (css: cover) the container
		/* // DEPRECATED
		calculateAspectRatioFit: function( srcWidth, srcHeight, maxWidth, maxHeight ) {
			if ( srcWidth / srcHeight > maxWidth / maxHeight ) {
				return { width: Math.ceil( maxHeight * ( srcWidth / srcHeight ) ), height: maxHeight };
			} else if ( srcWidth / srcHeight < maxWidth / maxHeight ) {
				return { width: maxWidth, height: Math.ceil( maxWidth * ( srcHeight / srcWidth ) ) };
			} else {
				return { width: maxWidth, height: maxHeight };
			}
		}
		*/
	});


	// A really lightweight plugin wrapper around the constructor,
	// preventing against multiple instantiations
	$.fn[ pluginName ] = function ( options ) {
		this.each(function() {
			if ( !$.data( this, "plugin_" + pluginName ) ) {
				$.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
			}
		});

		// chain jQuery functions
		return this;
	};


})( jQuery, window, document );



function _gambitRefreshScroll() {
	var $ = jQuery;
	_gambitScrollTop = window.pageYOffset;//$(window).scrollTop();
	_gambitScrollLeft = window.pageXOffset;//$(window).scrollLeft();
}

function _gambitParallaxAll() {
	_gambitRefreshScroll();
	for ( var i = 0; i < _gambitImageParallaxImages.length; i++) {
		_gambitImageParallaxImages[ i ].doParallax();
	}
}

jQuery(document).ready(function($) {
	"use strict";

	$( window ).on(
		'scroll touchmove touchstart touchend gesturechange mousemove', function( e ) {
			requestAnimationFrame( _gambitParallaxAll );
		}
	);

	function mobileParallaxAll() {
		_gambitRefreshScroll();
		for ( var i = 0; i < _gambitImageParallaxImages.length; i++) {
			_gambitImageParallaxImages[ i ].doParallax();
		}
		requestAnimationFrame(mobileParallaxAll);
	}


	if ( ( Modernizr.touch && jQuery(window).width() <= 1024 ) || // touch device estimate
		 ( window.screen.width <= 1281 && window.devicePixelRatio > 1 ) ) { // device size estimate
		requestAnimationFrame(mobileParallaxAll);
	}


	// When the browser resizes, fix parallax size
	// Some browsers do not work if this is not performed after 1ms
	$(window).on( 'resize', function() {
		setTimeout( function() {
			var $ = jQuery;
			_gambitRefreshWindow();
			$.each( _gambitImageParallaxImages, function( i, parallax ) {
				parallax.resizeParallaxBackground();
			} );
		}, 1 );
	} );

	// setTimeout( parallaxAll, 1 );
	setTimeout( function() {
		var $ = jQuery;
		_gambitRefreshWindow();
		$.each( _gambitImageParallaxImages, function( i, parallax ) {
			parallax.resizeParallaxBackground();
		} );
	}, 1 );

	// setTimeout( parallaxAll, 100 );
	setTimeout( function() {
		var $ = jQuery;
		_gambitRefreshWindow();
		$.each( _gambitImageParallaxImages, function( i, parallax ) {
			parallax.resizeParallaxBackground();
		} );
	}, 100 );

	function _gambitRefreshWindow() {
		_gambitScrollTop = window.pageYOffset;//$(window).scrollTop();
		_gambitWindowHeight = $(window).height();
		_gambitScrollLeft = window.pageXOffset;//$(window).scrollLeft();
		_gambitWindowWidth = $(window).width();
	}
});




