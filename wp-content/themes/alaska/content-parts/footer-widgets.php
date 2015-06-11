<div class="container">
	<div class="row">
	<?php
		global $ts_alaska;

			switch($ts_alaska['ts-footer-number-widget'])
			{
				case '1':
					dynamic_sidebar('footer_widget_1');
				break;
				case '2':
					echo '<div class="col-lg-6 col-md-6 col-sm-6">';
						dynamic_sidebar('footer_widget_1');
					echo '</div>';
					echo '<div class="col-lg-6 col-md-6 col-sm-6 last">';
						dynamic_sidebar('footer_widget_2');
					echo '</div>';
				break;
				case '3':
					echo '<div class="col-lg-4 col-md-4 col-sm-6">';
						dynamic_sidebar('footer_widget_1');
					echo '</div>';
					echo '<div class="col-lg-4 col-md-4 col-sm-6">';
						dynamic_sidebar('footer_widget_2');
					echo '</div>';
					echo '<div class="col-lg-4 col-md-4 col-sm-6 last">';
						dynamic_sidebar('footer_widget_3');
					echo '</div>';
				break;
				case '4':
					echo '<div class="col-lg-3 col-md-3 col-sm-6">';
						dynamic_sidebar('footer_widget_1');
					echo '</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-6">';
						dynamic_sidebar('footer_widget_2');
					echo '</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-6">';
						dynamic_sidebar('footer_widget_3');
					echo '</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-6 last">';
						dynamic_sidebar('footer_widget_4');
					echo '</div>';
				break;
			}

		?>
	</div>
</div>