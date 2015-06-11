<?php 

	if ( !function_exists('ts_service_post_type') ) {

		/*======== Register post type ========*/
		function ts_service_post_type()
		{
		    $labels = array(
		        'name' => __('Service', 'post type general name', 'themestudio'),
		        'singular_name' => __('Service', 'post type singular name', 'themestudio'),
		        'add_new' => __('Add New', 'service', 'themestudio'),
		        'all_items' => __('All Services', 'themestudio'),
		        'add_new_item' => __('Add New Service', 'themestudio'),
		        'edit_item' => __('Edit Service', 'themestudio'),
		        'new_item' => __('New Service', 'themestudio'),
		        'view_item' => __('View Service', 'themestudio'),
		        'search_items' => __('Search Service', 'themestudio'),
		        'not_found' =>  __('No Service Found', 'themestudio'),
		        'not_found_in_trash' => __('No Service Found in Trash', 'themestudio'),
		        'parent_item_colon' => ''
		    );

		    $args = array(
		        'labels' => $labels,
		        'public' => true,
		        'show_ui' => true,
		        'capability_type' => 'post',
		        'hierarchical' => false,
		        'rewrite' => array('slug' => 'service-view', 'with_front' => true),
		        'query_var' => true,
		        'show_in_nav_menus'=> false,
		        'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
            	'menu_icon' 		=> 'dashicons-star-filled',
		    );
		    add_theme_support( 'post-thumbnails' );
		    register_post_type( 'service' , $args );
		}
		add_action('init', 'ts_service_post_type');

	}

?>