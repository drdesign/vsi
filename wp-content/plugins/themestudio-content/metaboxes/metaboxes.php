<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category ARIVA
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'themestudio_';	
	global $ts_alaska;
	$ts_alaska['sidebars'];
	$sidebars =  array( 'primary'=>'Primary Sidebar');

    if (is_array($ts_alaska['sidebars'])) {
	    foreach($ts_alaska['sidebars'] as $sidebar){
	    	$sidebar_id = strtolower (str_replace(" ","_",trim($sidebar)));
	    	$sidebars[$sidebar_id] = $sidebar;
	    }
	}
	/**
	 * Meta boxes
	 */
	$meta_boxes['portfolio_metabox'] = array(
		'id'         => 'themestudio_portfolio_metabox',
		'title'      => __( 'Portfolio Metas', 'themestudio' ),
		'pages'      => array( 'portfolio' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'    => __( 'Portfolio Type', 'themestudio' ),
				'id'      => $prefix . 'portfolio_type',
				'type'    => 'select',
				'options' => array(
					'image' => __( 'Image', 'themestudio' ),
					'slider'   => __( 'Slider', 'themestudio' ),
					'video'     => __( 'Video', 'themestudio' ),
					'soundcloud'=> __('Soundcloud', 'themestudio')
				),
			),
			array(
				'name' => __( 'Portfolio Image', 'themestudio' ),
				'desc' => __( 'Upload an image or enter a URL.', 'themestudio' ),
				'id'   => $prefix . 'portfolio_image',
				'type' => 'file',
			),
			array(
				'name'         => __( 'Portfolio slider', 'themestudio' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'themestudio' ),
				'id'           => $prefix . 'portfolio_slider',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => __( 'Portfolio Video', 'themestudio' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
				'id'   => $prefix . 'portfolio_video',
				'type' => 'oembed',
			),
			array(
				'name' => __( 'Portfolio Soundcloud', 'themestudio' ),
				'desc' => __( 'Enter a soundcloud URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
				'id'   => $prefix . 'portfolio_soundcloud',
				'type' => 'oembed',
			),
			array(
				'name' => 'Client Name',
				'std' => '',
				'id' => $prefix . 'title_meta',
				'type' => 'text',
			),
			array(
				'name' => __( 'Client\'s website URL', 'themestudio' ),
				'id'   => $prefix . 'portfolio_url',
				'type' => 'text_url',
				// 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
				// 'repeatable' => true,
			),			
		),
	);

	/**
	 * Service meta boxes
	 */
	$meta_boxes['service_metabox'] = array(

	  	'title' => 'Services metas',
	  	'pages' => array('service'),
	  	'context'    => 'normal',
	  	'id'         => 'themestudio_service_metabox',
	  	'priority'   => 'low',
	  	'show_names' => true, // Show field names on the left
	  	'fields' => array(
	  		array(
				'name' => 'Enter service icon',
				'desc'    => __( 'we use linea basic icon, please check http://linea.io/ for icon', 'themestudio' ),
				'std' => '?',
				'id' => $prefix . 'service_select_icon',
				'type' => 'text',
			),
			)
	  	);
	/**
	 * Feature meta boxes
	 */
	$meta_boxes['feature_metabox'] = array(

	  	'title' => 'Feature metas',
	  	'pages' => array('feature'),
	  	'context'    => 'normal',
	  	'id'         => 'themestudio_feature_metabox',
	  	'priority'   => 'low',
	  	'show_names' => true, // Show field names on the left
	  	'fields' => array(

			array(
				'name'    => __( 'Feature Type', 'themestudio' ),
				'id'      => $prefix . 'feature_type',
				'type'    => 'select',
				'options' => array(
					'image' => __( 'Image', 'themestudio' ),
					'slider'   => __( 'Slider', 'themestudio' ),
					'video'     => __( 'Video', 'themestudio' ),
					'soundcloud'=> __('Soundcloud', 'themestudio')
				),
			),
			array(
				'name' => __( 'Feature Image', 'themestudio' ),
				'desc' => __( 'Upload an image or enter a URL.', 'themestudio' ),
				'id'   => $prefix . 'feature_image',
				'type' => 'file',
			),
			array(
				'name'         => __( 'Feature slider', 'themestudio' ),
				'desc'         => __( 'Upload or add multiple images/attachments.', 'themestudio' ),
				'id'           => $prefix . 'feature_slider',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
				'name' => __( 'Feature Video', 'themestudio' ),
				'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
				'id'   => $prefix . 'feature_video',
				'type' => 'oembed',
			),
			array(
				'name' => __( 'Feature Soundcloud', 'themestudio' ),
				'desc' => __( 'Enter a soundcloud URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
				'id'   => $prefix . 'feature_soundcloud',
				'type' => 'oembed',
			),
			)
	  	);

	/**
	 * Meta boxes
	 */
	$meta_boxes['themestudio_testimonials_metabox'] = array(
		'id'         => 'themestudio_testimonials_metabox',
		'title'      => __( 'Testimonial Options', 'themestudio' ),
		'pages'      => array( 'testimonial' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Client name',
				'std' => '',
				'id' => $prefix . 'testimonials_name',
				'type' => 'text',
			),
			array(
				'name' => 'Client position',
				'std' => '',
				'id' => $prefix . 'testimonials_position',
				'type' => 'text',
			),
			array(
				'name' => 'Client website',
				'std' => '',
				'id' => $prefix . 'testimonials_website',
				'type' => 'text',
			),

		),
	);

	/**
	 * Meta boxes
	 */
	$meta_boxes['post_metabox'] = array(

	  'title' => 'Post metas',
	  'pages' => array('post'),
	  'context'    => 'normal',
	  'id'         => 'themestudio_post_metas',
	  'priority'   => 'low',
	  'show_names' => true, // Show field names on the left
	  'fields' => array(
		   array(
		       'name' => 'Image gallery',
		       'desc' => '',
		       'id' => $prefix .'image_gallery',
		       'type' => 'file_list',
		       'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		   ),
		   array(
		       'name' => 'Post image',
		       'desc' => 'Upload an image or enter an URL.',
		       'id' => $prefix . 'post_image',
		       'type' => 'file',
		       'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
		   ),
		   array(
		    'name' => __( 'Video oEmbed', 'themestudio' ),
		    'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
		    'id'   => $prefix . 'post_video_embed',
		    'type' => 'oembed',
		   ),
		   array(
		    'name' => __( 'Audio oEmbed', 'themestudio' ),
		    'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'themestudio' ),
		    'id'   => $prefix . 'post_audio_embed',
		    'type' => 'oembed',
		   ),
			array(
			    'name' => 'Quote content',
			    'default' => '',
			    'id' => $prefix . 'quote_content',
			    'desc' => __( '(Please insert max 140 character.)', 'themestudio' ),
			    'type' => 'text',
			),
		   array(
			    'name' => 'Quote author',
			    'default' => '',
			    'id' => $prefix . 'quote_author',
			    'desc' => __( '(Please insert max 140 character.)', 'themestudio' ),
			    'type' => 'text',
			),
			array(
			    'name' => 'Link description',
			    'default' => '',
			    'id' => $prefix . 'link_description',
			    'desc' => __( '(Please insert max 140 character.)', 'themestudio' ),
			    'type' => 'text',
			),
		   array(
		       'name' => 'Link url',
			   'desc' => __( 'Enter an URL.', 'themestudio' ),
		       'id' => $prefix . 'link_url',
		       'type' => 'text_url',
		   ),
	  	)

	);

	/**
	 * Metabox to be displayed on a single page ID
	 */

	$meta_boxes['page_metas'] = array(
		'id'         => 'page_metas',
		'title'      => __( 'Page Metabox', 'themestudio' ),
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Custom page title',
				'std' => '',
				'id' => $prefix . 'custom_page_title',
				'type' => 'text',
			),
			array(
				'name' => 'Custom page description',
				'std' => '',
				'id' => $prefix . 'custom_page_description',
				'type' => 'text',
			),
			array(
			    'name' => 'Show page banner',
			    'desc' => 'Show banner for this page',
			    'id' => $prefix . 'show_banner',
			    'type'    => 'select',
			    'options' => array(
			        'on' => __( 'Show page banner', 'themestudio' ),
			        'off'   => __( 'Hide page banner', 'themestudio' ),
			    ),
			    'default' => 'on',
			),
			array(
			    'name'    => 'Select Page Sidebar',
			    'desc'    => 'Select a sidebar',
			    'id'      => $prefix . 'page_sidebar',
			    'type'    => 'select',
			    'options' => $sidebars,
			    'default' => '',
			),
		)
	);

	/**
	 * Metabox for an options page. Will not be added automatically, but needs to be called with
	 * the `cmb_metabox_form` helper function. See wiki for more info.
	 */
	$meta_boxes['options_page'] = array(
		'id'      => 'options_page',
		'title'   => __( 'Theme Options Metabox', 'cmb' ),
		'show_on' => array( 'key' => 'options-page', 'value' => array( $prefix . 'theme_options', ), ),
		'fields'  => array(
			array(
				'name'    => __( 'Site Background Color', 'cmb' ),
				'id'      => $prefix . 'bg_color',
				'type'    => 'colorpicker',
				'default' => '#ffffff'
			),
		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once THEMESTUDIO_POSTTYPE_META_PATH . 'core/metaboxes/init.php';;

}