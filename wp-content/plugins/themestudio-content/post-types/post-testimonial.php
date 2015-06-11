<?php
    /*
     * Register post type testimonial
    */
    function themestudio_testimonials_post_type() 
    {
        $labels = array(
            'name' 					=> __('Testimonial', 'post type general name', 'themestudio'),
            'singular_name' 		=> __('Testimonial', 'post type singular name', 'themestudio'),
            'add_new' 				=> __('Add New', 'testmonial', 'themestudio'),
            'all_items' 			=> __('All Testimonials', 'themestudio'),
            'add_new_item' 			=> __('Add New Testimonial', 'themestudio'),
            'edit_item' 			=> __('Edit Testimonial', 'themestudio'),
            'new_item' 				=> __('New Testimonial', 'themestudio'),
            'view_item' 			=> __('View Testimonial', 'themestudio'),
            'search_items' 			=> __('Search Testimonial', 'themestudio'),
            'not_found' 			=> __('No Testimonial Found', 'themestudio'),
            'not_found_in_trash' 	=> __('No Testimonial Found in Trash', 'themestudio'), 
            'parent_item_colon' 	=> '',
        );
        
        $args = array(
            'labels' 			=> $labels,
            'public' 			=> true,
            'show_ui' 			=> true,
            'capability_type' 	=> 'post',
            'hierarchical' 		=> false,
            'rewrite' 			=> array('slug' => 'testimonial-view', 'with_front' => true),
            'query_var' 		=> true,
            'show_in_nav_menus' => false,
            'menu_icon' 		=> 'dashicons-format-quote',
            'supports' 			=> array('title', 'thumbnail', 'excerpt', 'editor', 'author',),
        );
        
        register_post_type( 'testimonial' , $args );  
        
        // register_taxonomy('testimonials_cats', 
        //     array('testimonials'), 
        //     array(
        //         'hierarchical' 		=> true, 
        //         'label' 			=> 'Categories',
        //         'show_admin_column'	=>'true',
        //         'singular_label' 	=> 'Categories', 
        //         'rewrite' 			=> true,
        //         'query_var' 		=> true,
        //     )
        // );
    }
    add_action('init', 'themestudio_testimonials_post_type');
?>