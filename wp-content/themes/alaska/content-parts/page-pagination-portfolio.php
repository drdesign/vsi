<?php
global $ts_alaska;
?>
<div class="pagenavigato">
	<div class="pagi">
		<?php if ( !is_null(get_previous_posts_link()) ) :
		     	$ppl=explode('"',get_previous_posts_link());
		     	$ppl_url=$ppl[1];?>
		          <a href="<?php echo esc_url( $ppl_url ); ?>" class="prev-page float-left" title="<?php echo __('Oder posts', 'themestudio') ?>"><i class="fa fa-caret-left"></i><?php echo __('Oder posts', 'themestudio') ?></a>
		<?php endif?>

		<?php   if ( !is_null(get_next_posts_link()) ):
		      	$npl=explode('"',get_next_posts_link());
		        $npl_url=$npl[1];?>
		          <a href="<?php echo esc_url( $npl_url ); ?>" class="next-page float-right" title="<?php echo __('Next posts', 'themestudio') ?>"><?php echo __('Next posts', 'themestudio') ?><i class="fa fa-caret-right"></i></a>
		<?php endif ?>

	</div>

</div>