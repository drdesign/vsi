<?php
    /*
     * Register post type portfolio
    */
    function themestudio_post_type_portfolio() 
    {

        $labels = array(
            'name' 					=> __('Portfolio', 'post type general name', 'themestudio'),
            'singular_name' 		=> __('Portfolio', 'post type singular name', 'themestudio'),
            'add_new' 				=> __('Add New', 'portfolio', 'themestudio'),
            'all_items' 			=> __('All Portfolios', 'themestudio'),
            'add_new_item' 			=> __('Add New Portfolio', 'themestudio'),
            'edit_item' 			=> __('Edit Portfolio', 'themestudio'),
            'new_item' 				=> __('New Portfolio', 'themestudio'),
            'view_item' 			=> __('View Portfolio', 'themestudio'),
            'search_items' 			=> __('Search Portfolio', 'themestudio'),
            'not_found' 			=> __('No Portfolio Found', 'themestudio'),
            'not_found_in_trash' 	=> __('No Portfolio Found in Trash', 'themestudio'), 
            'parent_item_colon' 	=> '',
        );

        $args = array(
            'labels' 			=> $labels,
            'public' 			=> true,
            'show_ui' 			=> true,
            'capability_type' 	=> 'post',
            'taxonomies'          => array( 'portfolio_cats', ),
            'hierarchical' 		=> false,
            'rewrite' 			=> array('slug' => 'portfolio-view', 'with_front' => true),
            'query_var' 		=> true,
            'show_in_nav_menus' => true,
            'menu_icon' 		=> 'dashicons-list-view',
            'supports' 			=> array('title', 'thumbnail', 'excerpt', 'editor', 'author',),
        );

        register_post_type( 'portfolio' , $args );  
        $rewrite = array(
            'slug'                       => 'portfolio-category',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        register_taxonomy('portfolio_cats',
            array('portfolio'), 
            array(
                'hierarchical' 		=> true,
                'public'            => true,
                'label' 			=> 'Portfolio Categories',
                'show_admin_column'	=>'true',
                'singular_label' 	=> 'Category', 
                'query_var' 		=> true,
                'rewrite'           =>  $rewrite,
            )
        );
    }
    add_action('init', 'themestudio_post_type_portfolio');
?>