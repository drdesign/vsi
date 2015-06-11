<?php 
global $ts_alaska;

?>
<ul class="blog-meta">
	<?php if( in_array('author',$ts_alaska['ts-blog-metas']) ) : ?>
		<li><i class="fa fa-user"><a href="<?php echo get_author_posts_url($post->post_author)   ?>"></i><?php echo get_the_author_meta('display_name' ); ?></a> </li>
	<?php endif; ?>
	<?php if( in_array('category',$ts_alaska['ts-blog-metas'])  && has_category() ) :  ?>
		<li><i class="fa fa-folder-open"></i> <?php the_category(', '); ?></li>
	<?php endif; ?>
	<?php if( in_array('comment',$ts_alaska['ts-blog-metas']) && comments_open() ) : ?>
		<li><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number( __('0 Comments','themestudio'), __('1 Comment','themestudio'), __('% Comments','themestudio') ); ?></a></li>
	<?php endif; ?>
	<?php if(has_tag()) { ?>
	<?php if( in_array('tags',$ts_alaska['ts-blog-metas']) ) :  ?>
		<li><i class="fa fa-tags"></i>
		<?php
            $posttags = get_the_tags();
            if ($posttags) {
                $tag_val = array();
              	foreach($posttags as $tag) {
              		$tag_link = get_tag_link( $tag->term_id );
                	$tag_val[] = '<a href="'.$tag_link.'">'.$tag->name.'</a>'; 
              	}
        ?>
            <span><?php echo implode(', ', $tag_val); ?></span>
        <?php } ?>
        </li>
	<?php endif; ?>
	<?php } ?>
</ul>