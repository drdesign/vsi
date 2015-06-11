<?php
class Ts_Custom_Flickr extends WP_Widget {
	function Ts_Custom_Flickr() {
		$widget_ops = array('classname' => 'Ts_Custom_Flickr', 'description' => 'Display your recent Flickr photos' );
		$this->WP_Widget('Ts_Custom_Flickr', THEMESTUDIO_THEME_NAME.' Flickr', $widget_ops);

	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
    	require_once get_template_directory() . '/core/apis/api_flickr.php';

		echo $before_widget;
    	$flickr_id = empty($instance['flickr_id']) ? ' ' : apply_filters('widget_title', $instance['flickr_id']);
		$title = $instance['title'];
		$title = empty($instance['title']) ? 'Photo Stream' : apply_filters('widget_title', $instance['title']);
		$items = empty($instance['items']) ? 6 :  $instance['items'];
		echo $before_title.$title.$after_title;

		if(!empty($items) && !empty($flickr_id))
		{
			$photos_arr = ts_get_flickr(array('type' => 'user', 'id' => $flickr_id, 'items' => $items));

			if(!empty($photos_arr))
			{
				echo '<div class="flickr flickr-widget">
					<ul class="content-flickr">';
                foreach($photos_arr as $photo)
                {
					echo '<li><a data-fancybox-group="prettyPhoto" class="zoom-icon fancybox" href="'.esc_url($photo['url']).'" title="'.esc_attr($photo['title']).'"><img src="'.esc_url($photo['thumb_url']).'" alt="" class="img_nofade" /></a></li>';
                }
				echo '</ul></div>';
			}
		}

		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['items'] = strip_tags($new_instance['items']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'flickr_id' => '', 'title' => '') );
		$items = strip_tags($instance['items']);
		$flickr_id = strip_tags($instance['flickr_id']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo $this->get_field_id('flickr_id'); ?>">Flickr ID <a href="http://idgettr.com/">Find your Flickr ID here</a>: <input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

			<p><label for="<?php echo $this->get_field_id('items'); ?>">Items (default 6): <input class="widefat" id="<?php echo $this->get_field_id('items'); ?>" name="<?php echo $this->get_field_name('items'); ?>" type="text" value="<?php echo esc_attr($items); ?>" /></label></p>
<?php
	}
}

function themestudio_flickr_widget() {
	register_widget( 'Ts_Custom_Flickr' );
}

add_action( 'widgets_init', 'themestudio_flickr_widget' );