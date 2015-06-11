<?php
/*-----------------------------------------------------------------------------------*/
/* MEGA MENU
/*-----------------------------------------------------------------------------------*/
function themestudio_post_type_megamenu() {

    $labels = array(
        'name' => __( 'Mega Menu', 'themestudio' ),
        'singular_name' => __( 'Mega Menu Item', 'themestudio' ),
        'add_new' => __( 'Add New', 'themestudio' ),
        'add_new_item' => __( 'Add New Menu Item', 'themestudio' ),
        'edit_item' => __( 'Edit Menu Item', 'themestudio' ),
        'new_item' => __( 'New Menu Item', 'themestudio' ),
        'view_item' => __( 'View Menu Item', 'themestudio' ),
        'search_items' => __( 'Search Menu Items', 'themestudio' ),
        'not_found' => __( 'No Menu Items found', 'themestudio' ),
        'not_found_in_trash' => __( 'No Menu Items found in Trash', 'themestudio' ),
        'parent_item_colon' => __( 'Parent Menu Item:', 'themestudio' ),
        'menu_name' => __( 'Mega Menu', 'themestudio' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => __('Mega Menus.', 'themestudio'),
        'supports' => array( 'title', 'editor' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 40,
        'show_in_nav_menus' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );

    register_post_type( 'megamenu', $args );
}
add_action( 'init', 'themestudio_post_type_megamenu' );

?>