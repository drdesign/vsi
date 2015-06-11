<?php
global $ts_alaska;
$bg_url = $style = '';
$custom_page_title = get_post_meta( get_the_ID(), 'themestudio_custom_page_title', true );
$custom_page_description = get_post_meta( get_the_ID(), 'themestudio_custom_page_description', true );
$show_banner = get_post_meta( get_the_ID(), 'themestudio_show_banner', true );

    if (wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) )) {
        $bg_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
    }
    if ($custom_page_title == '') {
        $custom_page_title = get_the_title(get_the_ID());
    }
    
if ( is_front_page() && is_home() ) {
  // Default homepage
    $custom_page_title = $ts_alaska['ts-blog-title'];
    $custom_page_description = $ts_alaska['ts-blog-sub-title'];
    $bg_url = $ts_alaska['ts-blog-banner']['background-image'];
} elseif ( is_front_page() ) {
  // static homepage
} elseif ( is_home() ) {
  // blog page
    $custom_page_title = $ts_alaska['ts-blog-title'];
    $custom_page_description = $ts_alaska['ts-blog-sub-title'];
    $bg_url = $ts_alaska['ts-blog-banner']['background-image'];
    
} else {
  //everything else
}
    if ($bg_url !=''):
        $style = 'style="background-image:url('.$bg_url.') "';
    endif;
 ?>
 <?php if ($show_banner != 'off'): ?>
    <!-- Banner -->
    <section id="banner">
            <div class="banner parallax-section" <?php echo $style; ?>>
            <div class="overlay"></div>
                <div class="banner-content text-center">
                    <h1><?php echo esc_attr( $custom_page_title ) ?></h1>
                    <p><?php echo esc_attr( $custom_page_description )  ?></p>
                    <?php if (ts_get_breadcrumbs('/') != ''): ?>
                    <div class="breadcrumbs"><?php ts_breadcrumbs(); ?></div>
                    <?php endif ?>
                </div>
            </div>
    </section>
    <!-- End Banner -->
 <?php endif ?>
