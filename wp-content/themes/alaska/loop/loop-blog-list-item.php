<?php
    global $post, $ts_alaska;
    $format = get_post_format();
    if( false === $format ){
        $format = 'standard';
    }
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
    <?php get_template_part( 'post-formats/post', $format ); ?>
    <div class="date-post">
        <span class="date"><?php the_time( 'd' ); ?></span>
        <span class="month"><?php the_time( 'M' ); ?></span>
    </div>
    <article>  
        <h3><a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php get_template_part('content-parts/blog', 'metas'); ?>
        
        <?php if ($ts_alaska['ts-blog-content']=='content'): ?>
        <div class="except-post"><?php the_content('<span class="continue-reading">'.esc_attr( $ts_alaska['ts-blog-reading-text'] ). '</span>'); ?></div>
        <?php else: ?>
            <?php if(empty( $post->post_excerpt )) : ?>
              <div class="except-post"> <?php the_content('<span class="continue-reading">'.esc_attr( $ts_alaska['ts-blog-reading-text'] ). '</span>'); ?></div>
            <?php else: ?>
            <div class="except-post"><?php the_excerpt(); ?></div>
            <a title="READ MORE" class="blog-read ts-button" href="<?php the_permalink(); ?>"><?php echo esc_attr( $ts_alaska['ts-blog-reading-text']); ?></a>
            <?php endif ?>
      <?php endif ?>
            <?php
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'themestudio' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>

        <?php get_template_part('content-parts/blog', 'social'); ?>
    </article>
</div>