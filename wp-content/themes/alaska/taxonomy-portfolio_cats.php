<?php
	/**
	 * taxonomy-portfolio_cats.php
	 * The project archive used in ALASKA
	 * @author Vu Ngoc Linh
	 * @package ALASKA
	 * @since 1.0.0
	 */
	get_header();
	global $ts_alaska, $style;
?>
<section id="banner">
		<div class="banner portfolio-banner">
	        <div class="banner-content text-center">
	            <h1><?php echo get_queried_object()->name; ?></h1>
	            <span><?php echo $ts_alaska['portfolio_sub_title']; ?></span><br>
	            <div class="breadcrumbs"><?php ts_breadcrumbs(); ?><?php echo get_queried_object()->name; ?></div>
	        </div>
		</div>
</section>
<?php 
	if ($ts_alaska['show_hide_filter'] == 'show_filter_portfolio') {
		get_template_part( 'content-parts/portfolio', 'filter' );
	}
?>
<div class="container">
	
	<!-- End Banner -->
	<div id="grid-portfolio" class="cbp-l-grid-projects">
	    <ul>
	    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

		    		get_template_part( 'loop/loop-portfolio', 'item' );

					endwhile;
			  	else :
				    get_template_part('loop/content','none');

			  	endif;
	?>

	    </ul>
	</div>
</div>
<?php 
	echo function_exists('ts_pagination') ? ts_pagination() : posts_nav_link(); 
?>
<div class="cbp-l-loadMore-button">
<?php   if ( !is_null(get_next_posts_link()) ):
  	$npl=explode('"',get_next_posts_link());
    $npl_url=$npl[1];?>
      <a href="<?php echo esc_url( $npl_url ); ?>"  class="cbp-l-loadMore-button-link" title="<?php echo __('Next posts', 'themestudio') ?>"><?php echo __('LOAD MORE', 'themestudio') ?></a>
<?php endif ?>
</div>


<?php get_footer();