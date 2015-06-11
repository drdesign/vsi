<?php
/**
 * @package ThemeStudio_Shortcodes
 * @version 1.0
 */
/*
Plugin Name: ThemeStudio Shortcodes
Plugin URI: http://themestudio.net/plugins/#shortcodes
Description: This plugin is required in order to run themes version 1.0 built by themestudio
Author: ThemeStudio
Text Domain: themestudio
Version: 1.0
Author URI: http://themestudio.net
*/

// define('THEMESTUDIO_SHORTCODE', true);
define('THEMESTUDIO_SHORTCODE_VERSION', '1.0');
define('THEMESTUDIO_SHORTCODE_PATH', dirname(__FILE__));

require THEMESTUDIO_SHORTCODE_PATH . '/inc/themestudio.shortcode.class.php';

if(!function_exists('print_admin_notices')):
	function print_admin_notices() {

	}
	add_action( 'admin_notices', 'print_admin_notices' );
endif;

if(!function_exists('add_plugin_css')):
	function add_plugin_css() {

	}
	add_action( 'admin_head', 'add_plugin_css' );
endif;

if(!function_exists('add_plugin_admin_css_js')):
function add_plugin_admin_css_js(){
	if(is_admin()){
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-sortable');
			
		wp_enqueue_style('ts-plugin-style' , plugin_dir_url(__FILE__).'assets/css/admin.css');
		wp_enqueue_script( 'ts-plugin-script',  plugin_dir_url(__FILE__).'assets/js/admin.js', 'jquery', '1.0.0', true); 
	}
}
add_action( 'admin_enqueue_scripts', 'add_plugin_admin_css_js' );
endif;

if(!function_exists('themestudio_add_styles_and_scripts')):
	function themestudio_add_styles_and_scripts(){
		
		if(!is_admin() && !is_login_page()){
			wp_enqueue_script('shortcodes-search-script', plugin_dir_url(__FILE__).'inc/js/mootools.js', 'jquery', '1.0.0', true); 
			
			global $smof_data;
			$new_lines = array("\r\n","\r","\n");

						
			
		}
	}
	add_action('wp_enqueue_scripts', 'themestudio_add_styles_and_scripts');
endif;

if(!function_exists('is_login_page')):
	function is_login_page() {
		return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	}
endif;


add_filter('deprecated_function_trigger_error', '_no_deprecated_func_alert');
function _no_deprecated_func_alert($x){
	return false;
}

function ts_shortcodes_content_action_init()
{
// Localization
	load_plugin_textdomain('themestudio', false, dirname(plugin_basename(__FILE__)));
}

// Add actions
add_action('init', 'ts_shortcodes_content_action_init');