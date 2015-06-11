<?php
/*
 * Plugin Name: ThemeStudio Post Types, Metaboxes
 * Plugin URI: http://themestudio.net
 * Description: Add new post type, taxonomy, metaboxes, shortcodes
 * Author: ThemeStudio Development Group
 * Text Domain: themestudio
 * Version: 1.0
 * Author URI: http://themestudio.net
 */
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // disable direct access
 }

 define( 'THEMESTUDIO_CONTENT_VERSION', '1.0' );
 define( 'THEMESTUDIO_CONTENT_URL', trailingslashit( plugins_url( 'themestudio-content' )));
 define( 'THEMESTUDIO_POSTTYPE_META_PATH', plugin_dir_path( __FILE__ ));

function ts_content_action_init()
{
// Localization
	load_plugin_textdomain('themestudio', false, dirname(plugin_basename(__FILE__)));
}

// Add actions
add_action('init', 'ts_content_action_init');


/**
 * Load custom post type
 */
 $postTypeArgs = array( 'portfolio', 'testimonial','megamenu' );
 if ( is_array( $postTypeArgs ) && !empty( $postTypeArgs ) ):

    foreach ( $postTypeArgs as $postType ):

        $postType = sanitize_key( $postType );

        $filePath = THEMESTUDIO_POSTTYPE_META_PATH . 'post-types/post-' . $postType . '.php';

        if ( file_exists( $filePath ) ):

            include_once $filePath;

        endif;

    endforeach;

 endif;

/**
 * Meta boxes
 */
 require_once THEMESTUDIO_POSTTYPE_META_PATH . 'inc/icon-fonts.php';
 require_once THEMESTUDIO_POSTTYPE_META_PATH . 'metaboxes/metaboxes.php';

 	if( !function_exists( 'themestudio_metabox_js' ) ) {

		/*
		 * Load metabox js,css
		*/
		function themestudio_metabox_js()
		{
		    if(is_admin())
		    {
		        wp_register_script('custommetabox', plugins_url( '/core/metaboxes/js/themestudio-metas.js',__FILE__  ) , false, THEMESTUDIO_CONTENT_VERSION, true);
		        wp_enqueue_script('custommetabox');
		    }
		}
		add_action('admin_enqueue_scripts','themestudio_metabox_js');

	}


?>