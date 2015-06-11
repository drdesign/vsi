<?php
    /*
     * Register post type feature
    */
    function themestudio_post_type_feature() 
    {

        $labels = array(
            'name' 					=> __('Feature', 'post type general name', 'themestudio'),
            'singular_name' 		=> __('Feature', 'post type singular name', 'themestudio'),
            'add_new' 				=> __('Add New', 'feature', 'themestudio'),
            'all_items' 			=> __('All Features', 'themestudio'),
            'add_new_item' 			=> __('Add New Feature', 'themestudio'),
            'edit_item' 			=> __('Edit Feature', 'themestudio'),
            'new_item' 				=> __('New Feature', 'themestudio'),
            'view_item' 			=> __('View Feature', 'themestudio'),
            'search_items' 			=> __('Search Feature', 'themestudio'),
            'not_found' 			=> __('No Feature Found', 'themestudio'),
            'not_found_in_trash' 	=> __('No Feature Found in Trash', 'themestudio'), 
            'parent_item_colon' 	=> '',
        );

        $args = array(
            'labels' 			=> $labels,
            'public' 			=> true,
            'show_ui' 			=> true,
            'capability_type' 	=> 'post',
            'taxonomies'          => array( 'feature_cats', ),
            'hierarchical' 		=> false,
            'rewrite' 			=> array('slug' => 'feature-view', 'with_front' => true),
            'query_var' 		=> true,
            'show_in_nav_menus' => true,
            'menu_icon'         => 'dashicons-awards',
            'supports' 			=> array('title', 'thumbnail', 'excerpt', 'editor', 'author',),
        );

        register_post_type( 'feature' , $args );  
        $rewrite = array(
            'slug'                       => 'feature-category',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        register_taxonomy('feature_cats',
            array('feature'), 
            array(
                'hierarchical' 		=> true,
                'public'            => true,
                'label' 			=> 'Feature Categories',
                'show_admin_column'	=>'true',
                'singular_label' 	=> 'Category', 
                'query_var' 		=> true,
                'rewrite'           =>  $rewrite,
            )
        );
    }
    add_action('init', 'themestudio_post_type_feature');
?>