<?php
/*
Plugin Name: Parallax Backgrounds for VC
Description: Adds new options to Visual Composer for adding parallax scrolling images & video backgrounds.
Author: Benjamin Intal - Gambit
Version: 3.6.1
Author URI: http://gambit.ph
Plugin URI: http://codecanyon.net/user/gambittech/portfolio
Text Domain: gambit-vc-parallax-bg
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

defined( 'VERSION_GAMBIT_VC_PARALLAX_BG' ) or define( 'VERSION_GAMBIT_VC_PARALLAX_BG', '3.6.1' );

defined( 'GAMBIT_VC_PARALLAX_BG' ) or define( 'GAMBIT_VC_PARALLAX_BG', 'gambit-vc-parallax-bg' );

require_once( 'inc/otf_regen_thumbs.php' );

if ( ! class_exists( 'GambitVCParallaxBackgrounds' ) ) {

	/**
	 * Parallax Background Class
	 *
	 * @since	1.0
	 */
	class GambitVCParallaxBackgrounds {

		private static $parallaxID = 1;

		const COMPATIBILITY_MODE = '_gambit_vc_prlx_bg_compat_mode';

		/**
		 * Constructor, checks for Visual Composer and defines hooks
		 *
		 * @return	void
		 * @since	1.0
		 */
		function __construct() {
			// Our translations
			add_action( 'plugins_loaded', array( $this, 'loadTextDomain' ), 1 );

			// Gambit links
			add_filter( 'plugin_row_meta', array( $this, 'pluginLinks' ), 10, 2 );

            add_action( 'after_setup_theme', array( $this, 'init' ), 1 );
			add_filter( 'gambit_add_parallax_div', array( __CLASS__, 'createParallaxDiv' ), 10, 3 );
            add_action( 'admin_head', array( $this, 'printAdminScripts' ) );

			// Activation instructions & CodeCanyon rating notices
			$this->createNotices();

			// Add plugin specific filters and actions here
			add_action( 'wp_head', array( $this, 'ie9Detector' ) );

			// Add a compatibility mode toggler
			add_filter( 'plugin_row_meta', array( $this, 'addCompatibilityModeToggle' ), 11, 2 );
			add_action( 'admin_init', array( $this, 'toggleCompatibilityMode' ) );
		}

		public function ie9Detector() {
			echo "<!--[if IE 9]> <script>var _gambitParallaxIE9 = true;</script> <![endif]-->";
		}


		/**
		 * Hook into Visual Composer
		 *
		 * @return	void
		 * @since	2.3
		 */
        public function init() {
			// Check if Visual Composer is installed
            if ( ! defined( 'WPB_VC_VERSION' ) ) {
                return;
            }

            if ( version_compare( WPB_VC_VERSION, '4.2', '<' ) ) {
        		add_action( 'init', array( $this, 'addParallaxParams' ), 100 );
            } else {

				// New feature in 3.1, compatibility mode. This is for themes that override
				// the VC row element, mostly embedded copied of VC do this
				$compatibilityMode = get_option( self::COMPATIBILITY_MODE );
				if ( ! empty( $compatibilityMode ) ) {
					add_action( 'admin_init', array( $this, 'addParallaxParams' ), 99999 );
				} else {

					// This is the normal method including the parallax parameters
	        		add_action( 'vc_after_mapping', array( $this, 'addParallaxParams' ) );
				}
            }
        }


		/**
		 * There is a bug in Visual Composer where the dependencies do not refresh if the settings
         * are inside a tab, this mini-script fixes this error
		 *
		 * @return	void
		 * @since	2.0
		 */
        public function printAdminScripts() {
            echo "<script>
                jQuery(document).ready(function(\$) {
                \$('body').on('click', '[role=tab]', function() { \$('[name=gmbt_prlx_bg_type]').trigger('change') });
                });
                </script>";
        }


		/**
		 * Loads the translations
		 *
		 * @return	void
		 * @since	1.0
		 */
		public function loadTextDomain() {
			load_plugin_textdomain( GAMBIT_VC_PARALLAX_BG, false, basename( dirname( __FILE__ ) ) . '/languages/' );
		}


		/**
		 * Creates the placeholder for the row with the parallax bg
		 *
		 * @param	string $output An empty string
		 * @param	array $atts The attributes of the vc_row shortcode
		 * @param	string $content The contents of vc_row
		 * @return	string The placeholder div
		 * @since	1.0
		 */
		public static function createParallaxDiv( $output, $atts, $content ) {
			extract( shortcode_atts( array(
				// Old parameter names, keep these for backward rendering compatibility
				'parallax'                => '',
				'speed'                   => '',
				'enable_mobile'           => '',
				'break_parents'           => '',
				// 'row_span'                => '',
                // BG type
                'gmbt_prlx_bg_type'       => '',
				'gmbt_background_position' => '',
				// Our new parameter names
				'gmbt_prlx_parallax'      => '',
				'gmbt_prlx_speed'         => '',
				'gmbt_prlx_enable_mobile' => '',
				'gmbt_prlx_break_parents' => '',
				'gmbt_background_repeat' => '',
				'gmbt_prlx_opacity' => '',
				// 'gmbt_prlx_dont_scale_image' => '',
				// 'gmbt_prlx_row_span'      => '',
				'gmbt_prlx_image'		  => '',
                // Video options
                'gmbt_prlx_video_mute' => '', // This is now also works with vimeo, but the name is still kept for backward compatibility
                'gmbt_prlx_video_youtube_loop_trigger' => '0',
				'gmbt_prlx_video' => '',
                'gmbt_prlx_smooth_scrolling' => '',
				'gmbt_prlx_video_aspect_ratio' => '',
				'gmbt_prlx_video_force_hd' => '',

				// Deprecated
				// FIXME: Probably a good idea to delete this after some version iterations (maybe on v3.2)
                'gmbt_prlx_video_vimeo'   => '', // Keep this for backward compatibility
                'gmbt_prlx_video_youtube' => '', // Keep this for backward compatibility

			), $atts ) );













			/*
			 * We're using new param names now, support the old ones
			 */

			if ( empty( $gmbt_prlx_parallax ) ) {
				$gmbt_prlx_parallax = $parallax;
			}
			if ( empty( $gmbt_prlx_speed ) ) {
				$gmbt_prlx_speed = $speed;
			}
			if ( empty( $gmbt_prlx_enable_mobile ) ) {
				$gmbt_prlx_enable_mobile = $enable_mobile;
			}
			if ( empty( $gmbt_prlx_break_parents ) ) {
				$gmbt_prlx_break_parents = $break_parents;
			}


			/*
			 * Main parallax method
			 */

            $type = 'video';
            if ( empty( $gmbt_prlx_bg_type ) || $gmbt_prlx_bg_type == 'parallax' ) {
                $type = 'parallax';
            }

			// If there isn't any image in the CSS, or if there isn't any image attribute, skip it
			$attachmentImage = self::getBackgroundAttachmentFromCSS( $atts, $gmbt_prlx_parallax, abs( (float) $gmbt_prlx_speed ), 'full' );
			//if ( $type == 'parallax' && empty( $gmbt_prlx_image ) && ! $attachmentImage ) {
			//	return '';
			//}

			if ( empty( $gmbt_prlx_parallax ) ) {
				return "";
			}


            /*
             * Enqueue scripts
             */

            $pluginData = get_plugin_data( __FILE__ );

            // Our main script
            wp_enqueue_script(
                'vc-row-parallax',
                plugins_url( 'js/min/script-min.js', __FILE__ ),
                array( 'jquery' ),
                VERSION_GAMBIT_VC_PARALLAX_BG,
                true
            );

            // Smooth Scroller
            if ( ! empty( $gmbt_prlx_smooth_scrolling ) ) {
				wp_enqueue_script(
	                'gambit-smooth-scroll',
	                plugins_url( 'js/min/gambit-smoothscroll-min.js', __FILE__ ),
	                array( 'jquery' ),
	                VERSION_GAMBIT_VC_PARALLAX_BG,
	                true
	            );
            }

			// Parallax styles

            wp_enqueue_style(
                'vc-row-parallax-styles',
                plugins_url( 'css/style.css', __FILE__ ),
                array(),
                VERSION_GAMBIT_VC_PARALLAX_BG
            );


			// gambit-bg-parallax is just a fail-safe class because some themes might use bg-parallax
			//$parallaxClass = ( $gmbt_prlx_parallax == "none" ) ? "" : "bg-parallax gambit-bg-parallax";
			//$parallaxClass = in_array( $gmbt_prlx_parallax, array( "none", "fixed", "up", "down", "left", "right", "bg-parallax" ) ) ? $parallaxClass : "";

			$parallaxClass = in_array( $gmbt_prlx_parallax, array( "none", "fixed", "up", "down", "left", "right", "bg-parallax" ) ) ? "bg-parallax gambit-bg-parallax" : "";

            if ( $type == 'video' ) {
                $parallaxClass = "bg-parallax gambit-bg-parallax";
            }
			$parallaxClass .= " " . $type;

            if ( ! $parallaxClass ) {
                return '';
            }

            $videoDiv = "";

			/*
			 * Form the video background
			 */

			// If this is empty, check the deprecated values, maybe those still have values
			// FIXME: Probably a good idea to delete this after some version iterations (maybe on v3.2)
			if ( empty( $gmbt_prlx_video ) ) {
				$gmbt_prlx_video = $gmbt_prlx_video_youtube;
				if ( ! empty( $gmbt_prlx_video_vimeo ) ) {
					$gmbt_prlx_video = $gmbt_prlx_video_vimeo;
				}
			}

            if ( $type == 'video' ) {
				$gmbt_prlx_video = self::getVideoProvider( $gmbt_prlx_video );
				if ( $gmbt_prlx_video['type'] == 'youtube' ) {
                    $videoDiv = "<div class='click-overrider'></div><div style='visibility: hidden' id='video-" . self::$parallaxID++ . "' data-youtube-video-id='" . $gmbt_prlx_video['id'] . "' data-force-hd='" . ( $gmbt_prlx_video_force_hd == 'forcehd' ? 'true' : 'false' ) . "' data-mute='" . ( $gmbt_prlx_video_mute == 'mute' ? 'true' : 'false' ) . "' data-loop-adjustment='" . $gmbt_prlx_video_youtube_loop_trigger . "' data-video-aspect-ratio='" . $gmbt_prlx_video_aspect_ratio . "'><div id='video-" . self::$parallaxID++ . "-inner'></div></div>";
                } else {
                    $videoDiv = '<script src="//f.vimeocdn.com/js/froogaloop2.min.js"></script><div class="click-overrider"></div><div id="video-' . self::$parallaxID . '" data-vimeo-video-id="' . $gmbt_prlx_video['id'] . '" data-mute="' . ( $gmbt_prlx_video_mute == 'mute' ? 'true' : 'false' ) . '" data-video-aspect-ratio="' . $gmbt_prlx_video_aspect_ratio . '"><iframe id="video-iframe-' . self::$parallaxID . '" src="//player.vimeo.com/video/' . $gmbt_prlx_video['id'] . '?api=1&player_id=video-iframe-' . self::$parallaxID++ . '&html5=1&autopause=0&autoplay=1&badge=0&byline=0&loop=1&title=0" frameborder="0"></iframe></div>';
                }
            }

			// We can get the ID of the background image (then get the dimensions via VC's background styling)

			/*
			 * Get the background image
			 */

			$bgImageWidth = '';
			$bgImageHeight = '';
			$bgImage = '';

			if ( $type == 'parallax' ) {

				// For normal "cover" parallax, use a special size
				// For pattern / "repeat" parallax, use the full image size
				$size = $gmbt_background_repeat == 'repeat' ? 'full' : 'cover';

				// Compatibility mode: for older installed copies of the plugin, we used VC's background image, try and get the ID from that
				$attachmentImage = self::getBackgroundAttachmentFromCSS( $atts, $gmbt_prlx_parallax, abs( (float) $gmbt_prlx_speed ), $size );
				$bgImageWidth = $attachmentImage !== false ? $attachmentImage[1] : '';
				$bgImageHeight = $attachmentImage !== false ? $attachmentImage[2] : '';
				$bgImage = $attachmentImage[0];

				// Else, try and use the new attribute
				if ( ! empty( $gmbt_prlx_image ) ) {
					$attachmentImage = self::getBackgroundAttachmentFromAttribute( $gmbt_prlx_image, $gmbt_prlx_parallax, abs( (float) $gmbt_prlx_speed ), $size );
					$bgImageWidth = $attachmentImage !== false ? $attachmentImage[1] : '';
					$bgImageHeight = $attachmentImage !== false ? $attachmentImage[2] : '';
					$bgImage = $attachmentImage[0];
				}

			}

			return  "<div class='" . esc_attr( $parallaxClass ) . "' " .
				"data-bg-align='" . esc_attr( $gmbt_background_position ) . "' " .
				"data-direction='" . esc_attr( $gmbt_prlx_parallax ) . "' " .
		        "data-mute='" . esc_attr( $gmbt_prlx_video_mute ) . "' " .
		        "data-opacity='" . esc_attr( $gmbt_prlx_opacity ) . "' " .
				"data-velocity='" . esc_attr( (float)$gmbt_prlx_speed * -1 ) . "' " .
				"data-mobile-enabled='" . esc_attr( $gmbt_prlx_enable_mobile ) . "' " .
				"data-break-parents='" . esc_attr( $gmbt_prlx_break_parents ) . "' " .
				"data-bg-height='" . esc_attr( $bgImageHeight ) . "' " .
				"data-bg-width='" . esc_attr( $bgImageWidth ) . "' " .
				"data-bg-image='" . esc_attr( $bgImage ) . "' " .
				"data-bg-repeat='" . esc_attr( empty( $gmbt_background_repeat ) ? 'false' : 'true' ) . "'>" . $videoDiv . "</div>";
		}


		/**
		 * Gets the Video ID & Provider from a video URL or ID
		 *
		 * @param 	$videoString string The URL or ID of a video
		 * @return	array container whether the video is a YouTube video or a Vimeo video along with the video ID
		 * @since	3.0
		 */
		protected static function getVideoProvider( $videoString ) {

			$videoString = trim( $videoString );

			/*
			 * Check for YouTube
			 */

			$videoID = false;
			if ( preg_match( '/youtube\.com\/watch\?v=([^\&\?\/]+)/', $videoString, $id ) ) {
				if ( count( $id > 1 ) ) {
					$videoID = $id[1];
				}
			} else if ( preg_match( '/youtube\.com\/embed\/([^\&\?\/]+)/', $videoString, $id ) ) {
				if ( count( $id > 1 ) ) {
					$videoID = $id[1];
				}
			} else if ( preg_match( '/youtube\.com\/v\/([^\&\?\/]+)/', $videoString, $id ) ) {
				if ( count( $id > 1 ) ) {
					$videoID = $id[1];
				}
			} else if ( preg_match( '/youtu\.be\/([^\&\?\/]+)/', $videoString, $id ) ) {
				if ( count( $id > 1 ) ) {
					$videoID = $id[1];
				}
			}

			if ( ! empty( $videoID ) ) {
				return array(
					'type' => 'youtube',
					'id' => $videoID
				);
			}

			/*
			 * Check for Vimeo
			 */

			if ( preg_match( '/vimeo\.com\/(\w*\/)*(\d+)/', $videoString, $id ) ) {
				if ( count( $id > 1 ) ) {
					$videoID = $id[ count( $id ) - 1 ];
				}
			}

			if ( ! empty( $videoID ) ) {
				return array(
					'type' => 'vimeo',
					'id' => $videoID
				);
			}

			/*
			 * Non-URL form
			 */

			if ( preg_match( '/^\d+$/', $videoString ) ) {
				return array(
					'type' => 'vimeo',
					'id' => $videoString
				);
			}

			return array(
				'type' => 'youtube',
				'id' => $videoString
			);
		}


		/**
		 * Finds the attachment object from the generated CSS by Visual Composer
		 *
		 * @return	void
		 * @since	3.0
		 */
		protected static function getBackgroundAttachmentFromCSS( $atts, $direction, $velocity, $size = 'cover' ) {
			if ( empty( $atts['css'] ) ) {
				return false;
			}
			if ( preg_match( '/\?id=(\d+)/', $atts['css'], $id ) === false ) {
				return false;
			}
			if ( count( $id ) < 2 ) {
				return false;
			}

			$id = $id[1];

			return wp_get_attachment_image_src( $id, 'full' );
		}


		/**
		 * Finds the attachment object from the generated CSS by Visual Composer
		 *
		 * @return	void
		 * @since	3.0
		 */
		protected static function getBackgroundAttachmentFromAttribute( $attachmentID, $direction, $velocity, $size = 'cover' ) {
			return wp_get_attachment_image_src( $attachmentID, 'full' );
		}


		/**
		 * Adds the parameter fields to the VC row
		 *
		 * @return	void
		 * @since	1.0
		 */
		public function addParallaxParams() {

			$setting = array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "Background Type", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_bg_type",
				"value" => array(
					__( "Image Parallax", GAMBIT_VC_PARALLAX_BG ) => "parallax",
					__( "Video", GAMBIT_VC_PARALLAX_BG ) => "video",
				),
				"description" => __( "No live previews are shown in the VC frontend edito due to the different structure of the editor. The normal background image is shown instead.", GAMBIT_VC_PARALLAX_BG ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "Breakout Row Background", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_break_parents",
				"value" => array(
					"Don't break out the row container" => "0",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 1, GAMBIT_VC_PARALLAX_BG ), 1 ) => "1",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 2, GAMBIT_VC_PARALLAX_BG ), 2 ) => "2",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 3, GAMBIT_VC_PARALLAX_BG ), 3 ) => "3",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 4, GAMBIT_VC_PARALLAX_BG ), 4 ) => "4",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 5, GAMBIT_VC_PARALLAX_BG ), 5 ) => "5",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 6, GAMBIT_VC_PARALLAX_BG ), 6 ) => "6",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 7, GAMBIT_VC_PARALLAX_BG ), 7 ) => "7",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 8, GAMBIT_VC_PARALLAX_BG ), 8 ) => "8",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 9, GAMBIT_VC_PARALLAX_BG ), 9 ) => "9",
					sprintf( _n( "Break out of 1 container", "Break out of %d containers", 10, GAMBIT_VC_PARALLAX_BG ), 10 ) => "10",
					__( "Break out of all containers (full page width)", GAMBIT_VC_PARALLAX_BG ) => "99",
				),
				"description" => __( "Your background images, background colors, image parallax and video backgrounds are contained inside a Visual Composer row, depending on your theme, this container may be too small for your needs. Adjust this option to let the backgruond stretch outside it's current container and occupy the parent container's width.", GAMBIT_VC_PARALLAX_BG ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "Enable Smooth Scrolling", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_smooth_scrolling",
				"value" => array( __( "Check this to enable smooth scrolling for the whole page. If at least one row has this checked, your entire page will scroll smoothly.", GAMBIT_VC_PARALLAX_BG ) => "gambit_parallax_enable_smooth_scroll" ),
				"description" => __( "", GAMBIT_VC_PARALLAX_BG ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "textfield",
				"class" => "",
				"heading" => __( "YouTube or Vimeo URL or Video ID", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_video",
				"value" => "",
				"description" => __( "Enter the URL to the video or the video ID of your YouTube or Vimeo video you want to use as your background. If your URL isn't showing a video, try inputting the video ID instead. <em>Ads will show up in the video if it has them.</em> No video will be shown if left blank. <strong>Tip: newly uploaded videos may not display right away and might show an error message</strong><br><br><strong>Videos will not show up in mobile devices because they handle videos differently. In those cases, please put in a background image the normal way (in the <em>Design Options</em> tab) and that will be shown instead.</strong><br /><br />Only videos set as public or unlisted can be used, private videos will not work.", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "video" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "Mute Video", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_video_mute",
				"value" => array( __( "Check this to mute your video.", GAMBIT_VC_PARALLAX_BG ) => "mute" ),
				"description" => __( "", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "video" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "YouTube force HD", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_video_force_hd",
				"value" => array( __( "Check to force YouTube video to load in HD 720p. Vimeo plus or PRO can force HD loading via their video's settings.", GAMBIT_VC_PARALLAX_BG ) => "forcehd" ),
				"description" => __( "", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "video" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "textfield",
				"class" => "",
				"heading" => __( "Opacity", GAMBIT_VC_PARALLAX_BG ),
				"param_name"  => "gmbt_prlx_opacity",
				"value" => "100",
				"description" => __( "You may set the opacity level for your video or parallax image.<strong><br />Please choose an integer value between 1 and 100.</strong>", GAMBIT_VC_PARALLAX_BG ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_parallax",
                    "value" => array( "none", "up", "down", "left", "right" ),
                ),
			);
			vc_add_param( 'vc_row', $setting );

			// $setting = array(
			// 	"type" => "textfield",
			// 	"class" => "",
			// 	"heading" => __( "YouTube Loop Triggering Refinement", GAMBIT_VC_PARALLAX_BG ),
			// 	"param_name" => "gmbt_prlx_video_youtube_loop_trigger",
			// 	"value" => "0",
			// 	"description" => '<div class="dashicons dashicons-megaphone" style="color: #e74c3c"></div> ' . __( "<strong>Use this if you see a noticeable dark video frame before the video loops.</strong> Because YouTube performs it's video looping with a huge noticeable delay, we try our best to guess when the video exactly ends and trigger a loop when we <em>just</em> reach the end. If there's a dark frame, put in a time here in milliseconds that we can use to push back the looping trigger. Try values from 5-100 milliseconds.", GAMBIT_VC_PARALLAX_BG ),
			//                 "dependency" => array(
			//                     "element" => "gmbt_prlx_bg_type",
			//                     "value" => array( "video" ),
			//                 ),
			// 	"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			// );
			// vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "textfield",
				"class" => "",
				"heading" => __( "Video Aspect Ratio", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_video_aspect_ratio",
				"value" => '16:9',
				"description" => __( "The video will be resized to maintain this aspect ratio, this is to prevent the video from showing any black bars. Enter an aspect ratio here such as: &quot;16:9&quot;, &quot;4:3&quot; or &quot;16:10&quot;. The default is &quot;16:9&quot;", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "video" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "Background Image Parallax", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_parallax",
				"value" => array(
					"No Parallax" => "none",
					"Fixed" => "fixed",
					"Up" => "up",
					"Down" => "down",
					"Left" => "left",
					"Right" => "right",

				),
				"description" => __( "You can select your background image to apply parallax to on the field below, or you can also head over to the <strong>Design Options</strong> tab and select an image there.</em></strong>", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "parallax" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "attach_image",
				"class" => "",
				"heading" => __( "Background Image", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_image",
				"description" => __( "Select your background image. <strong>Make sure that your image is of high resolution, we will resize the image to make it fit and to optimize it to achieve the best performance</strong>. You can use this field to input your image or use the image uploader provided in the <strong>Design Options</strong> tab.", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "parallax" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			// $setting = array(
			// 	"type" => "checkbox",
			// 	"class" => "",
			// 	"param_name" => "gmbt_prlx_dont_scale_image",
			// 	"value" => array( __( "Do not scale the background image depending on the row size.", GAMBIT_VC_PARALLAX_BG ) => "dont-scale" ),
			// 	"description" => __( "By default, the background is resized to fit the row size, small images get upsized and large images get downsized. Checking this will disable resizing.", GAMBIT_VC_PARALLAX_BG ),
			//                 "dependency" => array(
			//                     "element" => "gmbt_prlx_bg_type",
			//                     "value" => array( "parallax" ),
			//                 ),
			// 	"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			// );
			// vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "Background Style / Repeat", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_background_repeat",
				"value" => array(
					__( "Cover Whole Row (covers the whole row)", GAMBIT_VC_PARALLAX_BG ) => "",
					__( "Repeating Image Pattern", GAMBIT_VC_PARALLAX_BG ) => "repeat",
				),
				"description" => __( "Select whether the background image above should cover the whole row, or whether the image is a background seamless pattern.", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "parallax" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "Background Position / Alignment", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_background_position",
				"value" => array(
					__( "Centered", GAMBIT_VC_PARALLAX_BG ) => "",
					__( "Left (only applies to up, down parallax or fixed)", GAMBIT_VC_PARALLAX_BG ) => "left",
					__( "Right (only applies to up, down parallax or fixed)", GAMBIT_VC_PARALLAX_BG ) => "right",
					__( "Top (only applies to left or right parallax)", GAMBIT_VC_PARALLAX_BG ) => "top",
					__( "Bottom (only applies to left or right parallax)", GAMBIT_VC_PARALLAX_BG ) => "bottom",
				),
				"description" => __( "The alignment of the background / parallax image. Note that this most likely will only be noticeable in smaller screens, if the row is large enough, the image will most likely be fully visible. Use this if you want to ensure that a certain area will always be visible in your parallax in smaller screens.<br><br><strong>Not applicable to pattern backgrounds.</strong>", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "parallax" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "textfield",
				"class" => "",
				"heading" => __( "Parallax Speed", GAMBIT_VC_PARALLAX_BG ),
				"param_name" => "gmbt_prlx_speed",
				"value" => "0.3",
				"description" => __( "The movement speed, value should be between 0.1 and 1.0. A lower number means slower scrolling speed.", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "parallax" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );

			$setting = array(
				"type" => "checkbox",
				"class" => "",
				"param_name" => "gmbt_prlx_enable_mobile",
				"value" => array( __( "Check this to enable the parallax effect in mobile devices", GAMBIT_VC_PARALLAX_BG ) => "parallax-enable-mobile" ),
				"description" => __( "Parallax effects would most probably cause slowdowns when your site is viewed in mobile devices. If the device width is less than 980 pixels, then it is assumed that the site is being viewed in a mobile device.", GAMBIT_VC_PARALLAX_BG ),
                "dependency" => array(
                    "element" => "gmbt_prlx_bg_type",
                    "value" => array( "parallax" ),
                ),
				"group" => __( "Image Parallax / Video", GAMBIT_VC_PARALLAX_BG ),
			);
			vc_add_param( 'vc_row', $setting );
		}


		/**
		 * Adds plugin links
		 *
		 * @access	public
		 * @param	array $plugin_meta The current array of links
		 * @param	string $plugin_file The plugin file
		 * @return	array The current array of links together with our additions
		 * @since	2.6
		 **/
		public function pluginLinks( $plugin_meta, $plugin_file ) {
			if ( $plugin_file == plugin_basename( __FILE__ ) ) {
				$pluginData = get_plugin_data( __FILE__ );

				$plugin_meta[] = sprintf( "<a href='%s' target='_blank'>%s</a>",
					"http://support.gambit.ph?utm_source=" . urlencode( $pluginData['Name'] ) . "&utm_medium=plugin_link",
					__( "Get Customer Support", GAMBIT_VC_PARALLAX_BG )
				);
				$plugin_meta[] = sprintf( "<a href='%s' target='_blank'>%s</a>",
					"http://codecanyon.net/user/GambitTech/portfolio?utm_source=" . urlencode( $pluginData['Name'] ) . "&utm_medium=plugin_link",
					__( "Get More Plugins", GAMBIT_VC_PARALLAX_BG )
				);
			}
			return $plugin_meta;
		}


		/************************************************************************
		 * Activation instructions & CodeCanyon rating notices START
		 ************************************************************************/
		/**
		 * For theme developers who want to include our plugin, they will need
		 * to disable this section. This can be done by include this line
		 * in their theme:
		 *
		 * defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) or define( 'GAMBIT_DISABLE_RATING_NOTICE', true );
		 */

		/**
		 * Adds the hooks for the notices
		 *
		 * @access	protected
		 * @return	void
		 * @since	2.6
		 **/
		protected function createNotices() {
			register_activation_hook( __FILE__, array( $this, 'justActivated' ) );
			register_deactivation_hook( __FILE__, array( $this, 'justDeactivated' ) );

			if ( defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) ) {
				return;
			}

			add_action( 'admin_notices', array( $this, 'remindSettingsAndSupport' ) );
			add_action( 'admin_notices', array( $this, 'remindRating' ) );
			add_action( 'wp_ajax_' . __CLASS__ . '-ask-rate', array( $this, 'ajaxRemindHandler' ) );
		}


		/**
		 * Creates the transients for triggering the notices when the plugin is activated
		 *
		 * @return	void
		 * @since	2.6
		 **/
		public function justActivated() {
			delete_transient( __CLASS__ . '-activated' );

			if ( defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) ) {
				return;
			}

			set_transient( __CLASS__ . '-activated', time(), MINUTE_IN_SECONDS * 3 );

			delete_transient( __CLASS__ . '-ask-rate' );
			set_transient( __CLASS__ . '-ask-rate', time(), DAY_IN_SECONDS * 4 );

			update_option( __CLASS__ . '-ask-rate-placeholder', 1 );
		}


		/**
		 * Removes the transients & triggers when the plugin is deactivated
		 *
		 * @return	void
		 * @since	2.6
		 **/
		public function justDeactivated() {
			delete_transient( __CLASS__ . '-activated' );
			delete_transient( __CLASS__ . '-ask-rate' );
			delete_option( __CLASS__ . '-ask-rate-placeholder' );
		}


		/**
		 * Ajax handler for when a button is clicked in the 'ask rating' notice
		 *
		 * @return	void
		 * @since	2.6
		 **/
		public function ajaxRemindHandler() {
			check_ajax_referer( __CLASS__, '_nonce' );

			if ( $_POST['type'] == 'remove' ) {
				delete_option( __CLASS__ . '-ask-rate-placeholder' );
			} else { // remind
				set_transient( __CLASS__ . '-ask-rate', time(), DAY_IN_SECONDS );
			}

			die();
		}


		/**
		 * Displays the notice for reminding the user to rate our plugin
		 *
		 * @return	void
		 * @since	2.6
		 **/
		public function remindRating() {
			if ( defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) ) {
				return;
			}
			if ( get_option( __CLASS__ . '-ask-rate-placeholder' ) === false ) {
				return;
			}
			if ( get_transient( __CLASS__ . '-ask-rate' ) ) {
				return;
			}

			$pluginData = get_plugin_data( __FILE__ );
			$nonce = wp_create_nonce( __CLASS__ );

			echo '<div class="updated gambit-ask-rating" style="border-left-color: #3498db">
					<p>
						<img src="' . plugins_url( 'gambit-logo.png', __FILE__ ) . '" style="display: block; margin-bottom: 10px"/>
						<strong>' . sprintf( __( 'Enjoying %s?', GAMBIT_VC_PARALLAX_BG ), $pluginData['Name'] ) . '</strong><br>' .
						__( 'Help us out by rating our plugin 5 stars in CodeCanyon! This will allow us to create more awesome products and provide top notch customer support.', GAMBIT_VC_PARALLAX_BG ) . '<br>' .
						'<button data-href="http://codecanyon.net/downloads?utm_source=' . urlencode( $pluginData['Name'] ) . '&utm_medium=rate_notice#item-7049478" class="button button-primary" style="margin: 10px 10px 10px 0;">' . __( 'Rate us 5 stars in CodeCanyon :)', GAMBIT_VC_PARALLAX_BG ) . '</button>' .
						'<button class="button button-secondary remind" style="margin: 10px 10px 10px 0;">' . __( 'Remind me tomorrow', GAMBIT_VC_PARALLAX_BG ) . '</button>' .
						'<button class="button button-secondary nothanks" style="margin: 10px 0;">' . __( 'I&apos;ve already rated!', GAMBIT_VC_PARALLAX_BG ) . '</button>' .
						'<script>
						jQuery(document).ready(function($) {
							"use strict";

							$(".gambit-ask-rating button").click(function() {
								if ( $(this).is(".button-primary") ) {
									var $this = $(this);

									var data = {
										"_nonce": "' . $nonce . '",
										"action": "' . __CLASS__ . '-ask-rate",
										"type": "remove"
									};

									$.post(ajaxurl, data, function(response) {
										$this.parents(".updated:eq(0)").fadeOut();
										window.open($this.attr("data-href"), "_blank");
									});

								} else if ( $(this).is(".remind") ) {
									var $this = $(this);

									var data = {
										"_nonce": "' . $nonce . '",
										"action": "' . __CLASS__ . '-ask-rate",
										"type": "remind"
									};

									$.post(ajaxurl, data, function(response) {
										$this.parents(".updated:eq(0)").fadeOut();
									});

								} else if ( $(this).is(".nothanks") ) {
									var $this = $(this);

									var data = {
										"_nonce": "' . $nonce . '",
										"action": "' . __CLASS__ . '-ask-rate",
										"type": "remove"
									};

									$.post(ajaxurl, data, function(response) {
										$this.parents(".updated:eq(0)").fadeOut();
									});
								}
								return false;
							});
						});
						</script>
					</p>
				</div>';
		}


		/**
		 * Displays the notice that we have a support site and additional instructions
		 *
		 * @return	void
		 * @since	2.6
		 **/
		public function remindSettingsAndSupport() {
			if ( defined( 'GAMBIT_DISABLE_RATING_NOTICE' ) ) {
				return;
			}
			if ( ! get_transient( __CLASS__ . '-activated' ) ) {
				return;
			}

			$pluginData = get_plugin_data( __FILE__ );

			echo '<div class="updated" style="border-left-color: #3498db">
					<p>
						<img src="' . plugins_url( 'gambit-logo.png', __FILE__ ) . '" style="display: block; margin-bottom: 10px"/>
						<strong>' . sprintf( __( 'Thank you for activating %s!', GAMBIT_VC_PARALLAX_BG ), $pluginData['Name'] ) . '</strong><br>' .

						__( 'Now just edit your <strong>row settings</strong> in Visual Composer, add a background picture in the <strong>Design Options</strong> tab, then head on to the <strong>Image Parallax / Video</strong> tab to adjust your parallax.', GAMBIT_VC_PARALLAX_BG ) . '<br>' .

						__( 'If you need any support, you can leave us a ticket in our support site. The link to our support site is listed in the plugin details for future reference.', GAMBIT_VC_PARALLAX_BG ) . '<br>' .
						'<a href="http://support.gambit.ph?utm_source=' . urlencode( $pluginData['Name'] ) . '&utm_medium=activation_notice" class="gambit_ask_rate button button-default" style="margin: 10px 0;" target="_blank">' . __( 'Visit our support site', GAMBIT_VC_PARALLAX_BG ) . '</a>' .
						'<br>' .
						'<em style="color: #999">' . __( 'This notice will go away in a moment', GAMBIT_VC_PARALLAX_BG ) . '</em><br>
					</p>
				</div>';
		}


		/************************************************************************
		 * Activation instructions & CodeCanyon rating notices END
		 ************************************************************************/


		/**
		 * Adds an enabled/disable link for toggling compatiblity mode. Compatibility mode changes the
		 * hook so that the plugin will work in impractical situations where VC is embedded into a theme
		 *
		 * @access	public
		 * @param	array $plugin_meta The current array of links
		 * @param	string $plugin_file The plugin file
		 * @return	array The current array of links together with our additions
		 * @since	3.1
		 **/
		public function addCompatibilityModeToggle( $plugin_meta, $plugin_file ) {
			if ( $plugin_file == plugin_basename( __FILE__ ) ) {
				$pluginData = get_plugin_data( __FILE__ );

				$compatibilityMode = get_option( self::COMPATIBILITY_MODE );
				$nonce = wp_create_nonce( self::COMPATIBILITY_MODE );
				if ( empty( $compatibilityMode ) ) {
					$plugin_meta[] = sprintf( "<a href='%s' target='_self'>%s</a>",
						admin_url( "plugins.php?" . self::COMPATIBILITY_MODE . "=1&nonce=" . $nonce ),
						__( "Enable Compatibility Mode", GAMBIT_VC_PARALLAX_BG )
					);
				} else {
					$plugin_meta[] = sprintf( "<a href='%s' target='_self'>%s</a>",
						admin_url( "plugins.php?" . self::COMPATIBILITY_MODE . "=0&nonce=" . $nonce ),
						__( "Disable Compatibility Mode", GAMBIT_VC_PARALLAX_BG )
					);
				}
			}
			return $plugin_meta;
		}

		public function toggleCompatibilityMode() {
			if ( empty( $_REQUEST['nonce'] ) ) {
				return;
			}
			if ( ! wp_verify_nonce( $_REQUEST['nonce'], self::COMPATIBILITY_MODE ) ) {
				return;
			}

			if ( isset( $_REQUEST[ self::COMPATIBILITY_MODE ] ) ) {
				if ( empty( $_REQUEST[ self::COMPATIBILITY_MODE ] ) ) {
					delete_option( self::COMPATIBILITY_MODE );
				} else {
					update_option( self::COMPATIBILITY_MODE, '1' );
				}
				wp_redirect( admin_url( 'plugins.php' ) );
				die();
			}
		}
	}


	new GambitVCParallaxBackgrounds();
}



if ( ! function_exists( 'vc_theme_before_vc_row' ) ) {


	/**
	 * Adds the placeholder div right before the vc_row is printed
	 *
	 * @param	array $atts The attributes of the vc_row shortcode
	 * @param	string $content The contents of vc_row
	 * @return	string The placeholder div
	 * @since	1.0
	 */
	function vc_theme_before_vc_row($atts, $content = null) {
		return apply_filters( 'gambit_add_parallax_div', '', $atts, $content );
	}
}
