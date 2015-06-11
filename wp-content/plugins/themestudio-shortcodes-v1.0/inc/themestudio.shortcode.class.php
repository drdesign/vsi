<?php
/**
 * @package ThemeStudio_Shortcodes
 * @version 1.0
 */
if(!class_exists('themestudio_shortcodes')):
	class themestudio_shortcodes {

	}
endif;

class themestudio_shortcodes_fe extends themestudio_shortcodes {
	private $counter_class = 0;
//******************************************************************************************************/
// Globals Function
//******************************************************************************************************/
 	public function getExtraClass( $el_class ) {
			$output = '';
			if ( $el_class != '' ) {
				$output = " " . str_replace( ".", "", $el_class );
			}
			return $output;
		}

	public function getCSSAnimation( $css_animation,$data_wow_delay,$data_wow_duration) {
			$output = '';
			if ( $css_animation != '' ) {
				wp_enqueue_script( 'waypoints' );
				$output .= 'wow  ' . $css_animation.'"';
				$output .= 'data-wow-duration="'.$data_wow_duration.'"';
				$output .= 'data-wow-delay="'.$data_wow_delay.'"';
			}
			return $output;
		}
	public function ts_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
	}

	//*******************************************************Begin Shortcode****************************************************************//
//******************************************************************************************************/
// Section/ block title
//******************************************************************************************************/
	 static  function themestudio_title( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(
		   'el_class'=>'',
		   'css'=>'',
		   //custom
		   'title'=>'',
		   'fontsize_title'=>'',
		   'title_color'=>'',
		   'des_color'=>'',
		   'align_title'=>'',
		  ), $atts ));
			$extra_class = new themestudio_shortcodes_fe();
		    $el_class1 = $extra_class->getExtraClass($el_class);

			$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

			$html .='<div class="ts-section-title '.$css_class1.' '.$align_title.'" style="color:'.esc_attr($des_color).'">
				<h3 style="color:'.esc_attr($title_color).';font-size:'.esc_attr($fontsize_title).'px;">'.esc_attr($title).'</h3>';
			$html .= apply_filters('the_content', $content);
			$html .='</div>';
		 return $html;
		 }

//******************************************************************************************************/
// Call to action
//******************************************************************************************************/
	 static  function ts_call_to_action( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(
		   'el_class'=>'',
		   'css'=>'',
		   //custom
		   'ts_cta_title'=>'',
		   'ts_cta_title'=>'',
		   'color_title'=>'',
		   'ts_cta_text_link'=>'',
		   'ts_cta_url'=>'',
		   'color_hover_button'=>'',
		   'color_button'=>'',
		   'color_border_button'=>'',
		   'style_border_button'=>'',
		   'width_border_button'=>'',
		   'color_text_button'=>'',
		   'color_text_description'=>'',
		   'color_text_button_hover'=>'',

		  ), $atts ));
			$extra_class = new themestudio_shortcodes_fe();
		    $el_class1 = $extra_class->getExtraClass($el_class);

			$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

			$border_button_style ='border:'.$width_border_button.'px '.$style_border_button.' '.$color_border_button.'';


			$dem_button =rand(0,1000);
			$html .='<div class="ts-CTA">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
								<div class="ts-left-CTA" style="color:'.esc_attr($color_text_description).';">
									<h3 style="color:'.esc_attr( $color_title).';">'.apply_filters('the_title',$ts_cta_title).'</h3>';
			$html  .= apply_filters('the_content',$content);
			$html	.='</div>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-3 col-xs-12">
								<div class="ts-right-CTA ts-right-CTA-'.$dem_button.'">
									<a class="ts-style-button-cta" style="background:'.$color_button.';color:'.$color_text_button.';'.$border_button_style.'" href="'.esc_url($ts_cta_url).'">'.$ts_cta_text_link.'</a>
								</div>
							</div>
						</div>
					</div>
					<script>
						jQuery(document).ready(function(){
						  jQuery(".ts-right-CTA-'.$dem_button.' a.ts-style-button-cta").hover(function(){
						    jQuery(".ts-right-CTA-'.$dem_button.' a.ts-style-button-cta").css("background","'.esc_attr($color_hover_button).'");
						    jQuery(".ts-right-CTA-'.$dem_button.' a.ts-style-button-cta").css("color","'.esc_attr($color_text_button_hover).'");
						    },function(){
						    jQuery(".ts-right-CTA-'.$dem_button.' a.ts-style-button-cta").css("background","'.esc_attr($color_button).'");
						    jQuery(".ts-right-CTA-'.$dem_button.' a.ts-style-button-cta").css("color","'.esc_attr($color_text_button).'");
						  });
						});
					</script>';
		 return $html;
		 }
//******************************************************************************************************/
// Our Service
//******************************************************************************************************/
	 static  function ts_our_service( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(
		   'el_class'=>'',
		   'css'=>'',
		   'css_awesome'=>'',
		   //custom
		   'ts_service_title'=>'',
		   'ts_service_text_link'=>'',
		   'ts_service_url'=>'',
		   'choose_readmore'=>'',

		  ), $atts ));
			$extra_class = new themestudio_shortcodes_fe();
		    $el_class1 = $extra_class->getExtraClass($el_class);

			$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

			$html .='<div class="ts-service-style-1">
						<div class="service-title">
							<span class="service-icon"><i class="fa '.esc_attr($css_awesome).'"></i></span>
							<h3>'.esc_attr($ts_service_title).'</h3>
						</div>
						<div class="service-content">';
			$html .= apply_filters('the_content',$content);
			$html .='</div>';
		if($choose_readmore==1){
			$html .='<a class="read-more" href="'.esc_url($ts_service_url).'">'.esc_attr($ts_service_text_link).'<i class="fa fa-long-arrow-right"></i></a>';
				}
			$html .='</div>';
		 return $html;
		 }
       
//******************************************************************************************************/
// Pricing Table
//******************************************************************************************************/
static  function ts_pricing_table( $atts , $content = null) {
    	$html = '';
		 extract( shortcode_atts(
		  array(
		   'css' => '',
		   //custom
		   'pricing_table_style'=>'',
		   'pricing_title'=>'',
		   'pricing_price'=>'',
		   'pricing_unit'=>'',
		   'pricing_link_button'=>'',
		   'pricing_text_button'=>'',
		   'class_active'=>'',
		   'css_awesome'=>'',
		   'pricing_subtitle'=>'',
		   'price_description'=>'',
		   'image_service'=>'',

		  ), $atts ));

// Content
			if($pricing_table_style =='style1')	{
				$html .='<div class="ts-pricing-table-style1 '.$class_active.'">
								<div class="price-unit">
									<span class="price">'.$pricing_price.'</span>
									<span class="unit">'.$pricing_unit.'</span>
								</div>
								<h3>'.esc_attr($pricing_title).'</h3>';
				$html .= apply_filters('the_content',$content);
				$html .='<a class="cta_pricing" href="'.esc_url($pricing_link_button).'">'.$pricing_text_button.'</a>
							</div>';
			}elseif($pricing_table_style =='style3'){
				$html .='<div class="ts-pricing-table-style3 '.$class_active.'">
								<div class="price-icon">
									<span class="pricing-icon"><i class="fa '.esc_attr($css_awesome).'"></i></span>								
								</div>';
				$html .='		<div class="price-title">
									<h3>'.esc_attr($pricing_title).'</h3>
									<p>'.esc_attr( $pricing_subtitle).'</p>
								</div>';
				$html .='		<div class="price-unit">
									from
									<div class="price-unit">
										<span class="price">'.$pricing_price.'</span>
										<span class="unit">'.$pricing_unit.'</span>
									</div>	
									<p>'.apply_filters('the_title',$price_description).'</p>
								</div>';				
				$html .= apply_filters('the_content',$content);
				$html .='<a class="cta_pricing" href="'.esc_url($pricing_link_button).'">'.$pricing_text_button.'</a>
							</div>';
			}elseif($pricing_table_style=='style2'){
				$html .='<div class="ts-pricing-table-style2 '.$class_active.'">
							<h3>'.$pricing_title.'</h3>
							<div class="price-unit">
								<span class="price">'.$pricing_price.'</span>
								<span class="unit">'.$pricing_unit.'</span>
								</div>';
				$html .= apply_filters('the_content',$content);
				$html .='<a class="cta_pricing" href="'.esc_url($pricing_link_button).'">'.$pricing_text_button.'</a>
							</div>';
			}else{
				if(isset($image_service) && is_numeric($image_service))
			 {
			 	$image_service = wp_get_attachment_image_src($image_service,'full');
				$image_service = $image_service[0];
			 }
				$html .='<div class="ts-service-img">
							<div class="service-img">
								<figure><img alt="" src="'.esc_url($image_service).'"></figure>
							</div>
							<div class="service-content">
								<h4>'.$pricing_title.'</h4>';
				$html .= apply_filters('the_content',$content);	

				$html .='		
								<div class="ts-price-unit"><span class="price">'.esc_attr($pricing_price).'</span>/'.esc_attr( $pricing_unit).'</div>
								<a class="cta_pricing" href="'.esc_url($pricing_link_button).'">'.$pricing_text_button.'</a>
							</div>
						 </div>'	;
			}
		 return $html;
		 }
//******************************************************************************************************/
// FunFact
//******************************************************************************************************/
static  function ts_funfact( $atts , $content = null) {
    	$html = '';

		 extract( shortcode_atts(
		  array(
		   // alway
		   'css' => '',
		   //custom
		   'css_awesome' =>'',
		   'color_icon' =>'',
		   'color_border' =>'',
		   'color_text' =>'',
		   'number_funfact' =>'',
		   'unit_funfact' =>'',
		   'name_funfact' =>'',
		  ), $atts ));
			$html .='<div class="ts-funfact" style="border-color:'.esc_attr($color_border).';color:'.esc_attr($color_text).'">
							<span class="funfact-icon" style="color:'.esc_attr($color_icon).'"><i class="fa '.esc_attr($css_awesome).'"></i></span>
							<div class="funfact-number-unit">
								<span data-number="'.esc_attr($number_funfact).'" class="funfact-number">'.$number_funfact.'</span>';
								if($unit_funfact !=''){
			$html .='			<span class="funfact-unit">'.$unit_funfact.'</span>';
								}
			$html .='		</div>
							<h5 style="color:'.esc_attr($color_text).';">'.$name_funfact.'</h5>
					</div>';
		 return $html;
	}
//******************************************************************************************************/
// FunFact
//******************************************************************************************************/
static  function ts_funfact_style2( $atts , $content = null) {
    	$html = '';

		 extract( shortcode_atts(
		  array(
		   // alway
		   'css' => '',
		   //custom
		   'color_number' =>'',
		   'color_title' =>'',
		   'color_text' =>'',
		   'number_funfact' =>'',
		   'unit_funfact' =>'',
		   'name_funfact' =>'',
		  ), $atts ));

			$html .='<div class="ts-funfact ts-funfact-style2">
							<div class="funfact-number-unit" style="color:'.esc_attr($color_number).'">
								<span data-number="'.esc_attr($number_funfact).'" class="funfact-number">'.$number_funfact.'</span>';
								if($unit_funfact !=''){
			$html .='			<span class="funfact-unit">'.$unit_funfact.'</span>';
								}
			$html .='		</div>
							<div class="ts-funfact-info" style="color:'.esc_attr($color_text).'">
								<h5 style="color:'.esc_attr($color_title).'">'.$name_funfact.'</h5>
								'.apply_filters('the-content',$content).'
							</div>
					</div>';
		 return $html;
	}
//******************************************************************************************************/
// Testimonials
//******************************************************************************************************/
static  function ts_testimonials( $atts , $content) {
	$html = $el_class = $css_animation = '';
		 extract( shortcode_atts(
		  array(
		   'css' 					 => '',
		   'onclick'				 =>'',
		   'css_animation' 			 =>'',
		   'data_wow_duration'		 =>'',
		   'data_wow_delay' 		 =>'',
		   'css_awesome'			 =>'',
		   //custom
		   'el_class' 				 => '',
		   'number_post_testimonial' => '',
		   'speed_slide'			 => '5',
		   'style_testimonial'		 => '',
		   'style_text_testimonial'	 => '',
		  ), $atts ));

		  global $post;
		  // General args
		$args = array(
			'posts_per_page'=>$number_post_testimonial,
			'post_type' => 'testimonial',

		);
		$ts_testimonial =  query_posts( $args );
		 $html .='';
		 if($style_testimonial == 'style1') {
				$html .='<div class="ts-testimonial-style1 ts-list-testimonial '.$style_text_testimonial.'" data-speed="'.$speed_slide.'">';
			              	foreach ($ts_testimonial as $post ) {
			              		$testimonials_name = get_post_meta( $post->ID, 'themestudio_testimonials_name', true );
								$testimonial_author_pos = get_post_meta( $post->ID, 'themestudio_testimonials_position', true );
								$testimonials_website = get_post_meta( $post->ID, 'themestudio_testimonials_website', true );
								$testimonials_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'testimonial' );
		 					$html .='<div class="ts-item-testimonial-1">';
								$html .='<div class="client-quote">
											<i class="fa fa-quote-left"></i><blockquote>';
											if($post->post_excerpt){
						                  			$html .= apply_filters('the_excerpt',$post->post_excerpt);
						                  		} else {
						                  			$html .= apply_filters('the_content',$post->post_content);
						                  		}
								$html .='</blockquote></div>';
								$html .='<div class="info-testimonial">
											<div class="client-avatar">
												<figure><img alt="" src="'.esc_url($testimonials_image[0]).'"></figure>
											</div>
											<div class="client-info">
												<span class="client-name">'.$testimonials_name.'</span>
												<span class="client-position">'.$testimonial_author_pos.'</span>
												<span class="client-website"><a href="'.esc_url($testimonials_website).'">'.$testimonials_website.'</a></span>
											</div>
										</div>';
							$html .='</div>';
				            }
							wp_reset_query();
				$html .='</div>';
		}else{
				$html .='<div class="ts-testimonial-style2 ts-list-testimonial '.$style_text_testimonial.'" data-speed="'.$speed_slide.'">';

							foreach ($ts_testimonial as $post ) {
								$testimonials_name = get_post_meta( $post->ID, 'themestudio_testimonials_name', true );
								$testimonial_author_pos = get_post_meta( $post->ID, 'themestudio_testimonials_position', true );
								$testimonials_website = get_post_meta( $post->ID, 'themestudio_testimonials_website', true );
								$testimonials_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'testimonial' );
								$html .= '<div class="ts-item-testimonial text-center">
											<div class="icon-quote-left"></div>
											<div class="client-quote">';
												if($post->post_excerpt){
						                  			$html .= apply_filters('the_excerpt',$post->post_excerpt);
						                  		} else {
						                  			$html .= apply_filters('the_content',$post->post_content);
						                  		}
								$html .='	</div>
											<div class="icon-quote-right"></div>
											<div class="info-testimonial">
												<div class="client-avatar">
													<figure><img src="'.esc_url($testimonials_image[0]).'" alt=""></figure>
												</div>
												<div class="client-info">
													<span class="client-name">'.$testimonials_name.'</span>
													<span class="client-position">'.$testimonial_author_pos.'</span>
													<span class="client-website"><a href="'.esc_url($testimonials_website).'">'.$testimonials_website.'</a></span>
												</div>
											</div>
										</div>';
									}
							wp_reset_query();
				$html .='</div>';
			}
		 return $html;

	}

//******************************************************************************************************/
// ts_accordion
//******************************************************************************************************/
static  function vc_accordion( $atts , $content) {
	wp_enqueue_script('jquery-ui-accordion');
	$el_class=$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
	//
	extract(shortcode_atts(array(
	    'choose_style_accordion' => '',
	    'title' => '',
	    'el_class' => '',
	    'active_tab' => '',
	), $atts));
	$css_class = $el_class;

	$dem = rand(5,1000);
	if($choose_style_accordion=='style1'){
		$output .= "\n\t\t".'<div class=" ts-acordion ts-acordion-'.$dem.'">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_accordion_heading'));
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		$output .= '</div>
				<script type="text/javascript">
				jQuery(document).ready(function($) {
					var icons = {
						header: "ts-header",
						activeHeader: "ts-active-header"
						};
						$( ".ts-acordion-'.$dem.'" ).accordion({
							icons: icons,
							active:'.$active_tab.',
							collapsible: true
						});
				});
				</script>';
	}else{
		$output .= "\n\t\t".'<div class=" ts-acordion ts-acordion-'.$choose_style_accordion.' ts-acordion-'.$dem.'">';
		$output .= wpb_widget_title(array('title' => $title, 'extraclass' => 'wpb_accordion_heading'));
		$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
		$output .= '</div>';
		$output .='<script type="text/javascript">
				jQuery(document).ready(function($) {
					var icons = {
						header: "fa fa-caret-right",
						activeHeader: "fa fa-caret-down"
						};
						$( ".ts-acordion-'.$dem.'" ).accordion({
							icons: icons,
							active:'.$active_tab.',
							collapsible: true
						});
				});
				</script>';
	}

	return $output;
	 }
//******************************************************************************************************/
// ts_accordion_tab
//******************************************************************************************************/
static  function vc_accordion_tab( $atts , $content) {
	$el_class=$output = $title = '';
		extract(shortcode_atts(array(
			'el_class'=>'',
			'title' => __("Section", "js_composer")
		), $atts));
			$css_class = $el_class;
			$output .='<h3></i>'.esc_attr($title).'</h3>
							 <div class="acordion-content">';
				$output .= ($content=='' || $content==' ') ? __("Empty section. Edit page to add content here.", "js_composer") : "\n\t\t\t\t" . wpb_js_remove_wpautop($content);
				$output .= 	'</div>';
			return $output;

		}
//******************************************************************************************************/
// Feature Item
//******************************************************************************************************/
static  function ts_feature( $atts , $content = null) {
    	$html = '';
		 extract( shortcode_atts(
		  array(
		   // alway
		   'css' => '',
		   //custom
		   'feature_tyle'=>'',
		   'css_awesome' =>'',
		   'color_icon' =>'',
		   'color_border_icon' =>'',
		   'position_feature' =>'',
		   'title_feature' =>'',
		   'color_title' =>'',
		   'link_title' =>'',
		  ), $atts ));

		 if($feature_tyle == 'style1'){
				$html .='<div class="ts-feature-item '.$position_feature.'">
							<div class="icon-feature" style="color:'.esc_attr($color_icon).'">
								<i class="fa '.esc_attr($css_awesome).'"></i>
							</div>
							<div class="info-feature">
								<h3><a href="'.esc_url( $link_title).'">'.esc_attr($title_feature).'</a></h3>';
				$html .= apply_filters('the_content',$content);
				$html .='	</div>
						</div>';
			}else{
				$html .='<div class="ts-feature-item-style2 '.$position_feature.'">
							<div class="tile-feature">
								<span class="icon-feature" style="color:'.esc_attr($color_icon).';border:2px solid '.esc_attr($color_border_icon).'"><i class="fa '.esc_attr($css_awesome).'"></i></span>
								<h3><a style="color:'.esc_attr($color_title).';" href="'.esc_url( $link_title).'">'.esc_attr($title_feature).'</a></h3>
							</div>
							<div class="info-feature">';
				$html .= apply_filters('the_content',$content);
				$html .='</div>
						</div>';
			}
		 return $html;
		 }
//******************************************************************************************************/
// Client Worker
//******************************************************************************************************/
    static  function ts_client_work( $atts , $content) {
	 $html = '';
    	 extract( shortcode_atts(
			array(
				'onclick' => 'link_image',
				'custom_links' => '',
				'img_size' => 'client-work',
				'images' => '',
				'el_class' => '',
				), $atts )
		);

    	if ( $images == '' ) $images = '-1,-2,-3';
			if ( $onclick == 'custom_link' ) {
				$custom_links = explode( ',', $custom_links );
			}
		$images = explode( ',', $images );
		$i = - 1;
		$html .= '<div class="ts-client-list"><ul>';
		foreach ( $images as $attach_id ):
			$i++;
			if ( $attach_id > 0 ) {
				$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
			} else {
				$post_thumbnail = array();
				$post_thumbnail['thumbnail'] = '<figure><img src="' . vc_asset_url( 'vc/no_image.png' ) . '" /></figure>';
				$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
			}
			$thumbnail = $post_thumbnail['thumbnail'];

			$html.= '<li class="client-item">';
			if ( $onclick == 'link_image' ){
				$p_img_large = $post_thumbnail['p_img_large'];
				$html.= '<a href="'.$p_img_large[0].'" >'.$thumbnail.'</a>';
			}
			elseif ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ){
				$html.= '<a href="'.$custom_links[$i].'" target="_blank">'.$thumbnail.'</a>';
			}
			else{
				$html.= $thumbnail ;
			}
			$html.= '</li>';
		endforeach;
		$html .= '</ul></div>';
		 return $html;
	}
//******************************************************************************************************/
// Lasted Blog
//******************************************************************************************************/
static  function ts_lasted_blog( $atts , $content = null) {
	$html = $class_4 = '';
    	extract( shortcode_atts(
			array(
				'css_class'=>'',
				'number_post'=>'5',
				'minheight_blog_item'=>'',
				), $atts )
		);
		$args = array(
					'posts_per_page' => $number_post,
					'post_type'=>'post',
					'suppress_filters' => false
				);
		$lasted_blog = get_posts( $args);

		$html .='<div class="ts-blog-slide">';
		foreach ($lasted_blog as $post ) {
			$blog_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
			$number_comment = get_comments_number($post->ID);
			$permalink = get_permalink($post->ID);
			$date = date("F j, Y",strtotime($post->post_date));
			$html .='<article class="ts-item-post '.$class_4.'" style="min-height:'.$minheight_blog_item.'">
						<a href="'.esc_url($permalink ).'"><figure><img src="'.esc_url($blog_image[0]).'" alt=""></figure></a>
						<div class="ts-main-recent-post">
							<h4><a href="'.esc_url($permalink ).'">'.esc_attr($post->post_title).'</a></h4>';
						if($post->post_excerpt){
			      			$html .= '<p>'.wp_trim_words(strip_tags($post->post_excerpt), 15, '').'</p>';
			      		} else {
			      			$html .= '<p>'.wp_trim_words(strip_tags($post->post_content),15, '').'<p>';
			      		}
			$html .='	</div>
						<div class="ts-item-post-footer">
							<time><a href="'.esc_url($permalink ).'"><i class="fa fa-clock-o"></i>'.$date.'</a></time>
							<a href="'.esc_url($permalink ).'"><i class="fa fa-comments-o"></i><span class="ts-comment-count">'.$number_comment.' Comments</span></a>
						</div>
					</article>';
		}
		$html .='</div>';
		$html .='<script type="text/javascript">
					jQuery(document).ready(function ($) {
						//SERVICE SLIDER
						if ($(".ts-blog-slide").length > 0) {
						    $(".ts-blog-slide").owlCarousel({
						    	items: 3,
						        autoPlay: 4000,
						        slideSpeed: 1000,
						        navigation: false,
						        pagination: false,
						        singleItem: false,
						        itemsCustom: [[0, 1],[320,1], [480, 1], [768, 2], [992, 2], [1200, 3]]
						    });
					}
					})
			</script>';
		return $html;
		 }
//******************************************************************************************************/
// Our Service Style 2
//******************************************************************************************************/
	 static  function ts_our_service_style2( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(
		   'el_class'=>'',
		   'css'=>'',
		   'css_awesome'=>'',
		   //custom
		   'ts_service_style'=>'',
		   'ts_service_title'=>'',
		   'ts_color_icon'=>'',
		   'ts_border_color_icon'=>'',
		   'ts_choose_image'=>'',
		   'image_service'=>'',
		   'url_image_service'=>'',
		  ), $atts ));
			$extra_class = new themestudio_shortcodes_fe();
		    $el_class1 = $extra_class->getExtraClass($el_class);

			$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
			if($ts_service_style=='style1'){
			$html .='<div class="ts-service-style-2">
								<span class="icon-service"><i class="fa '.esc_attr($css_awesome).'"></i></span>
								<h3><a href="'.esc_url( $url_image_service).'">'.$ts_service_title.'</a></h3>
								<div class="description-service">';
			$html .= apply_filters('the_content',$content);
			$html .='			</div>
						</div>';
			}elseif($ts_service_style=='style2'){
				$html .='<div class="ts-feature-item-2">
				      				<span class="feature-icon">
				      					<i class="fa '.esc_attr($css_awesome).'"></i>
				      				</span>
				      				<h3><a href="'.esc_url( $url_image_service).'">'.$ts_service_title.'</a></h3>
				      				<div class="feature-description">';
				$html .= apply_filters('the_content',$content);
				$html .='			</div>
				      			</div>';
			}elseif($ts_service_style=='style3'){
				$html .='<div class="ts-service-style-3 text-center">
				      				<span class="icon-service" style="color:'.esc_attr($ts_color_icon).'">
				      					<i class="fa '.esc_attr($css_awesome).'"></i>
				      				</span>
				      				<h3><a href="'.esc_url( $url_image_service).'">'.$ts_service_title.'</a></h3>
				      				<div class="description-service">';
				$html .= apply_filters('the_content',$content);
				$html .='			</div>
				      			</div>';
			}elseif($ts_service_style=='style4'){
				$html .='<div class="ts-service-style-4 text-center">';
							if(isset($image_service) && is_numeric($image_service))
							 {
							 	$image_service = wp_get_attachment_image_src($image_service,'full');
								$image_service = $image_service[0];
							 }
							if($ts_choose_image=='image'){
				$html .='	<a href="'.esc_url( $url_image_service).'"><figure><img alt="" src="'.esc_url($image_service).'"></figure></a>';
							}else{
				$html .='			<span class="icon-service" style="color:'.esc_attr($ts_color_icon).';border-color:'.esc_attr($ts_border_color_icon).'">
				      					<i class="fa '.esc_attr($css_awesome).'"></i>
				      				</span>';
				      			}
				$html .='			<h3><a href="'.esc_url( $url_image_service).'">'.$ts_service_title.'</a></h3>
				      				<div class="description-service">';
				$html .= apply_filters('the_content',$content);
				$html .='			</div>
				      			</div>';
			}elseif($ts_service_style=='style6') {
				$html .='<div class="ts-service-style-6">
							<div class="service-title">
								<span class="icon-service" style="color:'.esc_attr($ts_color_icon).'"><i class="fa '.esc_attr($css_awesome).'"></i></span>
								<h3><a href="'.esc_url( $url_image_service).'">'.$ts_service_title.'</a></h3>
							</div>
							<div class="description-service">';
				$html .= apply_filters('the_content',$content);
				$html .='	</div>
						</div>';
			}else{
				$html .='<div class="ts-service-style-5 text-center">
				      				<span class="icon-service">
				      					<i class="fa '.esc_attr($css_awesome).'"></i>
				      				</span>
				      				<h3><a href="'.esc_url( $url_image_service).'">'.$ts_service_title.'</a></h3>
				      				<div class="description-service">';
				$html .= apply_filters('the_content',$content);
				$html .='			</div>
				      			</div>';
			}
		 return $html;
		}
//******************************************************************************************************/
// Our Service Style 3
//******************************************************************************************************/
	 static  function ts_our_service_style3( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(		   
		   'css'=>'',
		   //custom
		   'image_service'=>'',
		   'url_image_service'=>'',
		   'ts_service_title'=>'',		   		   
		  ), $atts ));
			$extra_class = new themestudio_shortcodes_fe();		    

			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,$extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
			if(isset($image_service) && is_numeric($image_service))
			 {
			 	$image_service = wp_get_attachment_image_src($image_service,'full');
				$image_service = $image_service[0];
			 }
				
				$html .='<article class="ts-service-style3 '.$css_class.'">
							<a href="'.esc_url( $url_image_service).'"><figure><img alt="" src="'.esc_url($image_service).'"></figure></a>
							<a href="'.esc_url( $url_image_service).'"><h4>'.$ts_service_title.'</h4></a>';
				$html .= apply_filters('the_content',$content);
				$html .='</article>';			

		 return $html;
		}
//******************************************************************************************************/
// Twitter slide
//******************************************************************************************************/
static  function ts_twitter( $atts , $content = null) {
    	$html = $css ='';

		extract( shortcode_atts(
		array(
			'number_tweet'=>'',
			'css'=>'',
			//custom
			'number_twitter'=>''
		), $atts ));
		$tweets = array();
        if (class_exists('TwitterOAuth')) {
            $number = intval($number_tweet);
            $tweets = getTweets($number);
        }
		$html .= '<div class="ts-twitter-slide text-center">
				<i class="icon-twitter fa fa-twitter"></i>
				<div id="owl-twitter" class="twitter-slide">';
                if( $tweets){
                 foreach($tweets as $tweet){
        $html .='<div class="twitter-item">';
        $html .='<p>'.$tweet['text'].'</p>
        		<span class="twitter-title"><a href="https://twitter.com/'.get_option('tdf_user_timeline').'" target="_blank">@'.get_option('tdf_user_timeline').'</a></span>
                </div>';
             }} else {
        $html .='<div class="twitter-item">
                <p>Please install and config "oAuth Twitter Feed for Developers" plugin first! <a href="'.admin_url('plugins.php').'">Go to plugin</a></p>
                </div> ';
              }
		$html .='</div>
			</div>';


 		return $html;
	}
//******************************************************************************************************/
// Domain box price
//******************************************************************************************************/
static  function ts_domain_box_price( $atts , $content = null) {
    	$html = $css ='';

		extract( shortcode_atts(
		array(			
			'css'=>'',
			//custom
			'choose_style_display'=>'',
			'name_domain'=>'',
			'domain_img'=>'',
			'price_domain'=>'',
			'price_color'=>'',
			'color_border_price'=>'',
			'text_align'=>'',
			'class_new'=>''
		), $atts ));
			if(isset($domain_img) && is_numeric($domain_img))
			 {
			 	$domain_img = wp_get_attachment_image_src($domain_img,'full');
				$domain_img = $domain_img[0];
			 }
			$extra_class = new themestudio_shortcodes_fe();		    
			if($choose_style_display !='text'){
				$class_new='domain-img';
			}
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,$extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
		$html .='<div class="ts-domain-price-box '.esc_attr( $class_new).'" style="border-color:'.esc_attr( $color_border_price).';text-align:'.esc_attr( $text_align).'">';
					if($choose_style_display=='text'){						
		$html .='	<span class="domain-extension">'.esc_attr($name_domain).'</span>
						from';
					}else{
		$html .='<span class="domain-extension"><img alt="" src="'.esc_url($domain_img).'"></span>';					
					}
		$html .='	<span class="domain-price" style="color:'.esc_attr( $price_color).'">'.esc_attr($price_domain).'</span>					
				</div>';
		return $html;
	}
//******************************************************************************************************/
// Specail offer
//******************************************************************************************************/
static  function ts_special_offer( $atts , $content = null) {
    	$html = $css ='';

		extract( shortcode_atts(
		array(
			'css'=>'',
			//custom			
			'choose_style_special'=>'',
			'background_special'=>'',
			'title_special'=>'',
			'description_special'=>'',
			'price_special'=>'',
			'unit_special'=>'',
			'more_special_url'=>'',
			'more_special_text'=>'',
		), $atts ));
		
		if($choose_style_special=='style1'){
			if(isset($background_special) && is_numeric($background_special))
			 {
			 	$background_special = wp_get_attachment_image_src($background_special,'img175x174');
				$background_special = $background_special[0];
			 }
			$html .='<div class="ts-special-offer">
						<figure><img src="'.esc_url($background_special).'" alt=""></figure>
						<h3>'.$title_special.'</h3>
						<p>'.$description_special.'</p>
						<div class="ts-special-offer-content">';
		$html .= apply_filters('the_content',$content);
		$html .='			<div class="ts-offer-right">
								 <div class="ts-hosting-price">
								 	<p><span class="ts-special-offer-price">'.$price_special.'</span>
								 	<span class="ts-special-offer-unit">'.$unit_special.'</span></p>
								 </div>
								 <a href="'.esc_url($more_special_url).'">'.$more_special_text.'</a>
							</div>
							<!--/ts-offer-right-->
						</div>
					</div>';	
		}else{
			if(isset($background_special) && is_numeric($background_special))
			 {
			 	$background_special = wp_get_attachment_image_src($background_special,'full');
				$background_special = $background_special[0];
			 }
			$html .='<div class="ts-special-offer-style2">
					 	<div class="ts-offer-left"><h3>'.$title_special.'</h3>';
			$html .= '<div class="ts-offer-content">'.apply_filters('the_content',$content).'</div>';		
			$html .='      	<div class="ts-special2">
							 	<p><span class="ts-price">'.$price_special.'</span>
							 	<span class="ts-unit">/'.$unit_special.'</span></p>
							 	<a href="'.esc_url($more_special_url).'">'.$more_special_text.'</a>
							 </div>
						 </div>
					 <figure><img src="'.esc_url($background_special).'" alt=""></figure>';
			$html .='</div>';
		}	 		
		return $html;
	}
//******************************************************************************************************/
// pricing hosting
//******************************************************************************************************/
	static  function ts_pricing_hosting( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(
		   'el_class'=>'',
		   'css'=>'',
		   //custom
		   'heading_hosting'=>'',
		   'content_title'=>'',
		   'unit_hosting'=>'',
		  ), $atts ));

		$text_title = explode("|", $content_title);

		$html .='<table class="ts-compare-table ts-res-table">
				<thead>
					<tr class="ts-compare-heading">
						<th colspan="6">'.$heading_hosting.'</th>
					</tr>
					<tr class="title-compare-table">';
							for ($i=0; $i < 5 ; $i++) {
					$html .='<td>'.$text_title[$i].'</td>';
								}
					$html .='<td></td></tr>
				</thead>
				<tbody>';
					$content = stripcslashes( $content);
					$items   = preg_split( '/\t\r\n|\r|\n/', $content );
					foreach($items as $item){
						$extract = explode("|", $item);
		$html .= '	<tr>
						<td data-title="'.$text_title[0].'">
							<span class="compare-name">'.$extract[0].'</span>
							<span class="compare-line">'.$extract[1].'</span>
						</td>
						<td data-title="'.$text_title[1].'">'.$extract[2].'</td>
						<td data-title="'.$text_title[2].'">'.$extract[3].'</td>
						<td data-title="'.$text_title[3].'">'.$extract[4].'</td>
						<td data-title="'.$text_title[4].'">
							<span class="compare-price">'.$extract[5].'</span>
							<div class="compare-unit"><span class="top-unit">.00</span><span class="bt-unit">'.$extract[6].'</span></div>
						</td>
						<td class="no-title">
							<a href="'.esc_url(strip_tags($extract[8])).'" class="ts-bt cta-compare">'.strip_tags($extract[7]).'</a>							
						</td>
					</tr>';
					}
		$html .='</tbody></table>';
		return $html ;
	}
//******************************************************************************************************/
// Dropcap
//******************************************************************************************************/
	static  function ts_text_dropcap( $atts , $content = null) {
	// Attributes
	extract( shortcode_atts(
		array(
			'choose_style_dropcap'=>'',
			'first_text' => '',
			'background_color_fisttext' => '',
			'color_fisttext' => '',
		), $atts )
	);
	if($choose_style_dropcap=='style1'){
	 	$html = '<span class="ts-dropcap-'.$choose_style_dropcap.'" style="background-color:'.$background_color_fisttext.';color:'.$color_fisttext.';">'.$first_text.'</span>'.apply_filters('the_content', $content).'';
	}else{
		$html = '<span class="ts-dropcap-'.$choose_style_dropcap.'" style="color:'.$color_fisttext.'">'.$first_text.'</span>'.apply_filters('the_content', $content).'';
	}
	 return $html;
	 }
//******************************************************************************************************/
// Team Member
//******************************************************************************************************/
    static  function ts_team_member( $atts , $content = null) {
    	$html = $el_class = $css_animation = '';

		 extract( shortcode_atts(
		  array(
		   // alway
		   'el_class' => '',
		   'css' => '',
		   //custom
		   'choose_style_team'=>'',
		   'bg_member'=>'',
		   'fa_tiwtter'=>'',
		   'fa_behance'=>'',
		   'fa_dribble'=>'',
		   'fa_facebook'=>'',
		   'fa_youtube'=>'',
		   'fa_google'=>'',
		   'fa_vine'=>'',
		   'fa_tumblr'=>'',
		   'name_member' =>'',
		   'member_postion' =>'',
		  ), $atts ));

		 if(isset($bg_member) && is_numeric($bg_member))
		 {

		 	$bg_member = wp_get_attachment_image_src($bg_member,'full');
			$bg_member = $bg_member[0];

		 }

		    $extra_class = new themestudio_shortcodes_fe();
		    $el_class1 = $extra_class->getExtraClass($el_class);

			$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
		if($choose_style_team=='style1'){
			$html .='<div class="team-item team-item-'.$choose_style_team.' text-center '.$css_class1.'"><figure><img alt="" src="'.esc_url($bg_member).'">';
			$html .='<ul class="social-network list-inline social-network-team">';
			if($fa_tiwtter !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_tiwtter).'"><i class="fa fa-twitter"></i></a></li>';
			}
			if($fa_facebook !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_facebook).'"><i class="fa fa-facebook"></i></a></li>';
			}
			if($fa_youtube !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_youtube).'"><i class="fa fa-youtube"></i></a></li>';
			}
			if($fa_google !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_google).'"><i class="fa fa-google-plus"></i></a></li>';
			}
			if($fa_behance !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_behance).'"><i class="fa fa-behance"></i></a></li>';
			}
			if($fa_dribble !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_dribble).'"><i class="fa fa-dribbble"></i></a></li>';
			}
			if($fa_vine !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_vine).'"><i class="fa fa-vine"></i></a></li>';
			}
			if($fa_tumblr !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_tumblr).'"><i class="fa fa-tumblr"></i></a></li>';
			}
            $html .='</ul>';
            $html .='</figure>';
            $html .='<h4>'.$name_member.'</h4>';
            $html .='<span>'.$member_postion.'</span>';
            $html .= apply_filters('the_content',strip_tags($content));
            $html .='</div>';
        }else{
        	$html .='<div class="text-center team-item-'.$choose_style_team.'">
        			 <figure><img class="img-circle" alt="" src="'.esc_url($bg_member).'"></figure>';
			$html .='<h4>'.$name_member.'</h4>';
            $html .='<span>'.$member_postion.'</span>';
            $html .='<ul class="social-network list-inline social-network-team">';
			if($fa_tiwtter !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_tiwtter).'"><i class="fa fa-twitter"></i></a></li>';
			}
			if($fa_facebook !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_facebook).'"><i class="fa fa-facebook"></i></a></li>';
			}
			if($fa_youtube !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_youtube).'"><i class="fa fa-youtube"></i></a></li>';
			}
			if($fa_google !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_google).'"><i class="fa fa-google-plus"></i></a></li>';
			}
			if($fa_behance !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_behance).'"><i class="fa fa-behance"></i></a></li>';
			}
			if($fa_dribble !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_dribble).'"><i class="fa fa-dribbble"></i></a></li>';
			}
			if($fa_vine !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_vine).'"><i class="fa fa-vine"></i></a></li>';
			}
			if($fa_tumblr !=''){
            	$html .='<li><a target="_blank" title="'.esc_attr($name_member).'" href="'.esc_url($fa_tumblr).'"><i class="fa fa-tumblr"></i></a></li>';
			}
            $html .='</ul>';
        	$html .='</div>';
        }
		 return $html;
		 }
//******************************************************************************************************/
/*	Skillbar Shortcode
//******************************************************************************************************/

static function ts_skillbar_shortcode( $atts, $content = null ) {
	$output = $el_class ='';

	extract( shortcode_atts( array(
		'css' => '',
		'values' => '',
		'units' => '%',
		'skillbar_background_color' => '',
		'percentbar_background_color' => '',
		'skill_bar_text_color' => '',
		'skill_bar_style' => '',
		'skill_bar_title' => '',
		'skill_bar_subtitle' => '',		
		'skill_bar_text_button' => '',
		'skill_bar_link_button' => '',
    ), $atts ) );

 	$extra_class = new themestudio_shortcodes_fe();
    $el_class1 = $extra_class->getExtraClass($el_class);
	$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column ' . $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

    $array_values = explode(",", $values);
	if($skill_bar_style=='skillbarstyle1'){

		$output .= '<div class=" '.$css_class1.'">';		
			$output .= '<div class="'.$skill_bar_style.'" style="color: '.$skill_bar_text_color.';">';
				foreach($array_values as $skill_value) {
					$data = explode("|", $skill_value);
					$output .= '<div class="skillbar clearfix " data-percent="'.$data['0'] . $units.'">
									<div class="skillbar-title"><span>'.$data['1'].'</span></div>
										<div class="skill-bar-bg" style="background: '.$skillbar_background_color.';">
										<div class="skillbar-bar" style="background: '.$percentbar_background_color.';">
											<div class="skill-bar-percent">'.$data['0'].$units .'</div>
										</div>
									</div>
								</div>';
			}

			$output .='</div>';
		$output .='</div>';

	}else {
	$output .= '<div class=" '.$css_class1.'">';	
		$output .= '<div class="'.$skill_bar_style.'" style="color: '.$skill_bar_text_color.';">';
		foreach($array_values as $skill_value) {
			$data = explode("|", $skill_value);
			$output .= '<div class="skillbar clearfix " data-percent="'.$data['0'] . $units.'">
								<div class="skill-bar-bg" style="background: '.$skillbar_background_color.';">
								<div class="skillbar-bar" style="background: '.$percentbar_background_color.';">
									<div class="skill-bar-percent"><span>'.$data['1'].'</span>('.$data['0'].$units .')</div>
								</div>
							</div>
						</div>';
		}
		$output .='</div>';
	$output .='</div>';
	}
	return $output;
}

//******************************************************************************************************/
// Box border
//******************************************************************************************************/
static  function ts_box_border( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'el_class' => '',
			'css'=>'',
			'title_box'=>'',
		), $atts ));
	$extra_class = new themestudio_shortcodes_fe();
	$el_class1 = $extra_class->getExtraClass($el_class);
	$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

	$html .='<div class="ts-box-border '.$css_class1.'">';
	$html .='<h3>'.$title_box.'</h3>';
	$html .= apply_filters('the_content',$content);
	$html .='</div>';
	return $html;
	}
//******************************************************************************************************/
// Process bar
//******************************************************************************************************/
static  function ts_process_bar( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'el_class' => '',
			'css'=>'',
			'title_skill'=>'',
			'number_skill'=>'',
			'unit_skill'=>'',
			'fontsize_skill' =>'',
			'dimension_skill'=>'',
			'width_skill'=>'',
			'color_skill'=>'',
			'bgcolor_skill'=>'',
			'color_title_skill'=>'',
			'color_text_skill'=>'',
		), $atts ));
	$extra_class = new themestudio_shortcodes_fe();
	$el_class1 = $extra_class->getExtraClass($el_class);
	$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
	$dem = rand(5,1000);
	$html .='<div class="item-circles '.$css_class1.'" style="color:'.$color_title_skill.';">
                <div class="circlestat circlestat-'.$dem.'" data-dimension="'.$dimension_skill.'" data-text="'.$number_skill.$unit_skill.'" data-width="'.$width_skill.'" data-fontsize="'.$fontsize_skill.'" data-percent="'.$number_skill.'" data-fgcolor="'.$color_skill.'" data-bgcolor="'.$bgcolor_skill.'" data-fill="transparent"></div>
                <div class="process_info text-center">
                	<h5 class="skill-title" style="color:'.$color_title_skill.';">'.$title_skill.'</h5>
                	<div class="skill-description" style="color:'.esc_attr($color_text_skill).';">'.apply_filters('the_content',$content).'</div>
            	</div>
            </div>
            <script type="text/javascript">
				jQuery(document).ready(function($) {
		        $(\'.circlestat-'.$dem.'\').circliful();
				});
			</script>';
	return $html;
	}

//******************************************************************************************************/
// CountDown
//******************************************************************************************************/
static  function ts_countdown( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'css'=>'',
			'el_class' => '',
			'countdown_style'=>'',
			'date_countdown'=>'',
		), $atts )
	);
		$extra_class = new themestudio_shortcodes_fe();
		$el_class1 = $extra_class->getExtraClass($el_class);
		$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );

	$dem = rand(1,1000);


	$html .='
	<div class="ts-countdown-'.$dem.' '.$countdown_style.' '.$css_class1.'">
	 	<div class="ts-date-countdown ts-day-count">
	        <span class="day-'.$dem.' date"></span>
	        <span class="month">DAY</span>
    	</div>
    	<div class="ts-date-countdown">
	        <span class="hour-'.$dem.' date"></span>
	        <span class="month">HOURS</span>
    	</div>
    	<div class="ts-date-countdown">
	        <span class="minute-'.$dem.' date"></span>
	        <span class="month">MINUTE</span>
    	</div>
    	<div class="ts-date-countdown">
	        <span class="second-'.$dem.' date"></span>
	        <span class="month">SECONDS</span>
    	</div>
	 </div>';


	$countdown_ts = stripcslashes( $date_countdown);
		$items   = preg_split( '/\t\r\n|\r|\n/', $countdown_ts );
		foreach($items as $item){
			$extracts = explode("|", $item);
			$extract_date = explode("/", $extracts[0]);
			$extract_time = explode("/", $extracts[1]);
	$html .='<script type="text/javascript">
				jQuery(function($){
				 $(\'.ts-countdown-'.$dem.'\').countdown(\''.$extract_date[0].'/'.$extract_date[1].'/'.$extract_date[2].' '.$extract_time[0].':'.$extract_time[1].':'.$extract_time[2].'\', function(event) {
			    	var ts_day = event.strftime(\'%-D\');
			    	var ts_hour = event.strftime(\'%-H\');
			    	var ts_minute = event.strftime(\'%-M\');
			    	var ts_second = event.strftime(\'%-S\');
			    	$(\'.day-'.$dem.'\').html(ts_day);
			    	$(\'.hour-'.$dem.'\').html(ts_hour);
			    	$(\'.minute-'.$dem.'\').html(ts_minute);
			    	$(\'.second-'.$dem.'\').html(ts_second);
			  });
			});
			</script>';
	}
	return $html;
	}
//******************************************************************************************************/
// style button
//******************************************************************************************************/
static  function ts_style_button( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'choose_border'=>'',
			'size_button'=>'',
			'text_button'=>'',
			'link_button'=>'',
			'postion_button'=>'',
			'color_button'=>'',
			'color_hover_button'=>'',
			'color_text_button'=>'',
			'color_text_hover_button'=>'',
			'border_button'=>'',
			'color_border_button'=>'',
			'style_border_button'=>'solid',
			'width_border_button'=>'2',
			'border_radius'=>'',
			'border_radius_width'=>'3',
		), $atts ));
	if($border_button=='yes'){
			$choose_border = 'border:'.$width_border_button.'px '.$style_border_button.' '.$color_border_button.';';
		}
	$border_radius = 'border-radius:'.$border_radius_width.'px;';
	$dem_button = rand(0,1000);
	$html .='<div class="ts-button-text ts-button-'.$dem_button.' '.esc_attr( $postion_button).'">
				<a href="'.esc_url($link_button).'" class="ts-style-button '.$size_button.'" style="background:'.$color_button.';color:'.$color_text_button.';'.$choose_border.' '.$border_radius. '">'.$text_button.'</a>
			</div>
			<script>
				jQuery(document).ready(function(){
				  jQuery(".ts-button-'.$dem_button.' a.ts-style-button").hover(function(){
				    jQuery(".ts-button-'.$dem_button.' a.ts-style-button").css("background","'.esc_attr($color_hover_button).'");
				    jQuery(".ts-button-'.$dem_button.' a.ts-style-button").css("color","'.esc_attr($color_text_hover_button).'");
				    jQuery(".ts-button-'.$dem_button.' a.ts-style-button").css("border-color","'.esc_attr($color_hover_button).'");
				    },function(){
				    jQuery(".ts-button-'.$dem_button.' a.ts-style-button").css("background","'.esc_attr($color_button).'");
				    jQuery(".ts-button-'.$dem_button.' a.ts-style-button").css("color","'.esc_attr($color_text_button).'");
				    jQuery(".ts-button-'.$dem_button.' a.ts-style-button").css("border-color","'.esc_attr($color_border_button).'");
				  });
				});
			</script>';
	return $html;
	}
//******************************************************************************************************/
// Readmor
//******************************************************************************************************/
static  function ts_readmore( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'css'=>'',
			'ts_choose_showmore'=>'',
			'ts_showmore'=>'',
			'ts_hiden'=>'',
			'ts_maxheight'=>'',
		), $atts ));
	if($ts_choose_showmore =='show'){
		$html .='<div class="description-content">'. apply_filters( 'the_content',$content).'</div>';
		$html .= '<script type="text/javascript">
					jQuery(function($){
						$(".description-content").readmore({
						  	speed: 1000,
						  	moreLink: \'<a class="ts-showmore" href="#">'.$ts_showmore.'</a>\',
							lessLink: \'<a class="ts-showmore" href="#">'.$ts_hiden.'</a>\',
						  	maxHeight:'.$ts_maxheight.'
						});
					});
				</script>';
	}else{
		$html .='<div class="ts-full-content">'.apply_filters('the_content',$content).'</div>';

	}
	return $html;
	}
//******************************************************************************************************/
// Social include
//******************************************************************************************************/
static  function ts_social_include( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'css'=>'',
			'ts_choose_style_social'=>'',
			'ts_font_awesome'=>'',
			'ts_tooltip_awesome'=>'',
			'ts_color_awesome'=>'',
			'ts_size_awesome'=>'',
		), $atts ));

	if($ts_choose_style_social =='style1'){		
		$html .='<div class="ts-social-'.esc_attr($ts_choose_style_social).'" style="color:'.esc_attr( $ts_color_awesome).'">';
		$array_values = explode("|", $ts_font_awesome);
				foreach ($array_values as $value) {
		$html .='<i class=" fa '.$value.' '.esc_attr( $ts_size_awesome).'"></i>';
				}
		$html .='</div>';

	}elseif($ts_choose_style_social =='style2'){
		$items = explode(",", $ts_tooltip_awesome);

		$html .='<div class="ts-social-'.esc_attr($ts_choose_style_social).'">';
				foreach ($items as $item) {
		$tooltip = explode("|", $item);
		$html .='<a class="ts-style-icon" data-toggle="tooltip" data-placement="top" title="'.$tooltip[1].'" href="#"><i class="fa '.$tooltip[0].'"></i></a>';
				}
		$html .='</div>
					<script>
						jQuery(document).ready(function($){
						  	$(\'[data-toggle="tooltip"]\').tooltip()
						});
					</script>';
	}else{
		$html .='<div class="ts-fa-list">';
				$items_3 = explode(",", strip_tags($ts_tooltip_awesome));
		$html .='<div class="ts-social-'.esc_attr($ts_choose_style_social).'">';
				foreach ($items_3 as $item) {
		$tooltip = explode("|", $item);
		$html .='<a class="ts-style-icon-'.$tooltip[0].'" data-toggle="tooltip" data-placement="top" title="'.$tooltip[1].'" href="#"><i class="fa '.$tooltip[0].'"></i></a>';
		$html .='<script>
						jQuery(document).ready(function(){
						  jQuery(\'[data-toggle="tooltip"]\').tooltip();
						  jQuery("a.ts-style-icon-'.$tooltip[0].'").hover(function(){
						    jQuery(this).css("background","'.esc_attr($tooltip[2]).'");
						    },function(){
						    jQuery(this).css("background","transparent");
						  });
						});
				</script>';
				}
		$html .='</div>';
	}

	return $html;
}
//******************************************************************************************************/
// Social include View Full Icon
//******************************************************************************************************/
static  function ts_social_full( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'text_button_view'=>'View Full Icon',
			'css_awesome'=>'',
		), $atts ));

		$html .='<p class="button-more text-center"><a href="#hide-block-icon" class="ts-button show-block">'.$text_button_view.'</a></p>
					<div  id="hide-block-icon" class="show-full-icon">';
					ob_start();
						get_template_part( 'content-parts/social','full' );
						$result = ob_get_contents();
					ob_end_clean();
					$html .= $result;
		$html .='</div><script type="text/javascript">
					jQuery(document).ready(function($) {						
						$(".show-full-icon").hide();
						$(".show-block").click(function(){
						    $(".show-full-icon").toggle();
						  });
						$(\'a[href^="#"]\').on(\'click\',function (e) {
						    e.preventDefault();

						    var target = this.hash;
						    var $target = $(target);

						    $(\'html, body\').stop().animate({
						        \'scrollTop\': $target.offset().top
						    }, 900, \'swing\', function () {
						        window.location.hash = target;
						    });
						});
					});
				 </script>';
	return $html;
}
//******************************************************************************************************/
// Blockquoctes
//******************************************************************************************************/
	static function ts_blockquote($atts, $content = ''){
		$html ='';
		extract( shortcode_atts(
		array(
			'choose_style_quote'=>'',
			'color_icon'=>'',
			'name_author' => '',
		), $atts ));
		if($choose_style_quote=='style1'){
			$html .='<div class="blog-quote-'.$choose_style_quote.' blog-quote">';
			$html .= apply_filters('the_content',$content);
			$html .='   <cite>'.esc_attr($name_author).'</cite>
					 </div>';
		}else{
			$html .='<div class="quote-type-'.$choose_style_quote.'">';
			$html .= apply_filters('the_content',$content);
			$html .='   <cite>'.esc_attr($name_author).'</cite>
					 </div>';
		}
		return $html;
	 }
//******************************************************************************************************/
/*	TS List Ul
//******************************************************************************************************/

static  function ts_list_style( $atts , $content = null) {
	// Attributes
	$html = '';
	extract( shortcode_atts(
		array(
			'choose_list_style'=>'',
			'list_title' => '',
			'color_icon'=>'',
		), $atts )
	);
	if($choose_list_style=='default'){
		$html .='<div class="ts-list-style">';
		$html .='<h4>'.apply_filters('the_title',$list_title).'</h4><ul>';
		$content = stripcslashes(strip_tags($content));
		$items_list   = preg_split( '/\t\r\n|\r|\n/', $content );
			foreach ($items_list as $item) {
		$item_list = explode("|", $item);
		$html .='<li>'.esc_attr($item_list[0]).'.<a href="'.esc_attr($item_list[2]).'">'.esc_attr($item_list[1]).'</a></li>';
			}
		$html .='</ul></div>';
	}elseif($choose_list_style=='orderlist'){
		$html .='<div class="ts-list-style ts-orderlist">';
		$html .='<h4>'.apply_filters('the_title',$list_title).'</h4><ul>';
		$content = stripcslashes(strip_tags($content));
		$items_list   = preg_split( '/\t\r\n|\r|\n/', $content );
			foreach ($items_list as $item) {
		$item_list = explode("|", $item);
		$html .='<li><a href="'.esc_attr($item_list[1]).'">'.esc_attr($item_list[0]).'</a></li>';
			}
		$html .='</ul></div>';
	}elseif($choose_list_style=='icon'){
		$html .='<div class="ts-list-style">';
		$html .='<h4>'.apply_filters('the_title',$list_title).'</h4><ul>';
		$content = stripcslashes(strip_tags($content));
		$items_list   = preg_split( '/\t\r\n|\r|\n/', $content );
			foreach ($items_list as $item) {
		$item_list = explode("|", $item);
		$html .='<li><span style="color:'.esc_attr($color_icon).';"><i class="fa '.esc_attr($item_list[0]).'"></i></span><a href="'.esc_attr($item_list[2]).'">'.esc_attr($item_list[1]).'</a></li>';
			}
		$html .='</ul></div>';
	}elseif($choose_list_style=='inline-style'){
		$html .='<div class="ts-list-ul">';
		$html .= apply_filters('the_content',strip_tags($content,'<ul>,<li>'));
		$html .='</div>';
	}else{
		$html .='<div class="ts-list-style underlist">';
		$html .='<h4>'.apply_filters('the_title',$list_title).'</h4><ul>';
		$content = stripcslashes(strip_tags($content));
		$items_list   = preg_split( '/\t\r\n|\r|\n/', $content );
			foreach ($items_list as $item) {
		$item_list = explode("|", $item);
		$html .='<li><a href="'.esc_attr($item_list[1]).'">'.esc_attr($item_list[0]).'</a></li>';
			}
	$html .='</ul></div>';
	}
	
	return $html;
}

//******************************************************************************************************/
/*	TS Table data
//******************************************************************************************************/
static  function ts_table_data( $atts , $content = null) {
    	$html = $css ='';

		 extract( shortcode_atts(
		  array(
		   'el_class'=>'',
		   'css'=>'',
		   //custom
		   'title_box'=>'',
		   'heading_hosting'=>'',
		   'content_title'=>'',
		   'unit_hosting'=>'',
		   'number_column'=>'',
		  ), $atts ));

		$text_title = explode("|", $content_title);
		$num = $number_column;

		$html .='<table class="ts-compare-table ts-data-table ts-res-table">
				<thead>
				<tr class="title-table-data">';
				for ($i=0; $i < $num ; $i++) {
					$html .='<th>'.$text_title[$i].'</th>';
						}
					$html .='</tr>
				</thead>
				<tbody>';

					$content = stripcslashes( $content);
					$items   = preg_split( '/\t\r\n|\r|\n/', $content );
					foreach($items as $item){
						$extract = explode("|", $item);
		$html .= '	<tr>';
						for ($i=0; $i < $num ; $i++) {
		$html .= '			<td data-title="'.$text_title[$i].'">'.$extract[$i].'</td>';
						}
		$html .= '	</tr>';
					}
		$html .='</tbody></table>';
		return $html ;
	}
//******************************************************************************************************/
// List images
//******************************************************************************************************/
    static  function ts_list_images( $atts , $content) {
	 $html = '';
    	 extract( shortcode_atts(
			array(
				'onclick' => 'link_image',
				'custom_links' => '',
				'img_size' => 'testimonial',
				'images' => '',
				'el_class' => '',
				), $atts )
		);

    	if ( $images == '' ) $images = '-1,-2,-3';
			if ( $onclick == 'custom_link' ) {
				$custom_links = explode( ',', $custom_links );
			}
		$images = explode( ',', $images );
		$i = - 1;
		$html .= '<div class="ts-list-images"><ul>';
		foreach ( $images as $attach_id ):
			if ( $attach_id > 0 ) {
				$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $attach_id, 'thumb_size' => $img_size ) );
			} else {
				$post_thumbnail = array();
				$post_thumbnail['thumbnail'] = '<figure><img src="' . vc_asset_url( 'vc/no_image.png' ) . '" /></figure>';
				$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
			}
			$thumbnail = $post_thumbnail['thumbnail'];

			$html.= '<li class="image-item">';
			if ( $onclick == 'link_image' ){
				$p_img_large = $post_thumbnail['p_img_large'];
				$html.= '<a href="'.$p_img_large[0].'" >'.$thumbnail.'</a>';
			}
			elseif ( $onclick == 'custom_link' && isset( $custom_links[$i] ) && $custom_links[$i] != '' ){
				$html.= '<a href="'.$custom_links[$i].' target="_blank">'.$thumbnail.'</a>';
			}
			else{
				$html.= $thumbnail ;
			}
			$html.= '</li>';
		endforeach;
		$html .= '</ul></div>';
		 return $html;
	}
//******************************************************************************************************/
// Contact hotline
//******************************************************************************************************/
static function ts_contact_hotline($atts, $content = ''){
		$html ='';
		extract( shortcode_atts(
		array(
			'css_awesome'=>'',
			'color_icon'=>'',
			'title_contact'=>'',
			'phone_contact'=>'',
			'text_email_contact' => '',
			'url_contact' => '',
			'text_contact' => '',
		), $atts ));
		$html .='<div class="ts-contact-hotline text-center">
					<div class="table-cell">
						<span class="ts-contact-icon" style="color:'.esc_attr( $color_icon).';"><i class="fa '.esc_attr($css_awesome).'"></i></span>
						<div class="ts-contact-info">
							<h4>'.apply_filters('the_title',$title_contact).'</h4>';
					if($phone_contact!=''){
		$html .='				<h3>'.esc_attr( $phone_contact).'</h3>';
					}
					if($text_email_contact!=''){
		$html .='		<a href="mailto:'.esc_attr($text_email_contact).'">'.esc_attr($text_email_contact).'</a>';
					}
					if($text_contact!=''){
		$html .='		<a href="'.esc_url($url_contact).'">'.esc_attr($text_contact).'</a>';
					}
		$html .='		</div>
					</div>
				</div>';
		return $html;
	 }
//******************************************************************************************************/
// Contact infomation
//******************************************************************************************************/
static function ts_contact_infomation($atts, $content = ''){
		$html ='';
		extract( shortcode_atts(
		array(
			'css' => '',
			'el_class' => '',
			'title_contact'=>'',
			'address_contact'=>'',
			'text_email_contact' => '',
			'phone_contact'=>'',
			'fax_contact'=>'',
		), $atts ));
		$extra_class = new themestudio_shortcodes_fe();
	    $el_class1 = $extra_class->getExtraClass($el_class);

		$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
		$html .='<div class="ts-contact-infomation left '.$css_class1.'">
						<h4>'.apply_filters('the_title',$title_contact).'</h4>';
		$html .='				<p>'.esc_attr( $address_contact).'</p>';
		$html .='		<span>Email</span>: <a href="mailto:'.esc_url($text_email_contact).'">'.esc_attr($text_email_contact).'</a><br />
						<span>Phone</span>: '.esc_attr($phone_contact).'<br />
						<span>Fax</span>: '.esc_attr($fax_contact).'<br />	';
		$html .='</div>';
		return $html;
	 }
//******************************************************************************************************/
// Contact infomation
//******************************************************************************************************/
static function ts_portfolio($atts, $content = ''){
		$output ='';
		extract(shortcode_atts(array(
			'el_class' => '',
			'css' => '',
		   	// Custom
			"posts_per_page" => "",
			"portfolio_item_width" => "",
			"portfolio_item_height" => "",
			"portfolio_filter_switch" => "",
			"portfolio_container" => "",							
			"portfolio_show_categories" => "",			
		), $atts));

		$extra_class = new themestudio_shortcodes_fe();
	    $el_class1 = $extra_class->getExtraClass($el_class);

		$css_class1 = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class1 . $extra_class->ts_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		
		$cats = explode(',',$portfolio_show_categories);					
		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $posts_per_page,
			'tax_query' => array(
					    array(
					      'taxonomy' => 'portfolio_cats',
					      'field' => 'ids',
					      'terms' => $cats,
					    )
				    )  			
		);
		$block_query = new WP_Query( $args );		
			if ($portfolio_filter_switch == 'show-filter') {				    
				$output .='<div id="filters-portfolio" class="cbp-l-filters-alignLeft">
							    <div class="container">
							    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">'. __('All', 'themestudio').'</div>';				    
							    if ( $portfolio_show_categories == '' ) {							            
							               $output .=  __('Please schoose categories portfolio in shortcode.','themestudio');							            
							    }else{
							        $portfolio_terms = array();
							        $array_term= $cats;
							        foreach ($array_term as $term) {							        	
							         	$portfolio_terms  =  get_term($term,"portfolio_cats"); 									         	
						                $output .= '<div class="cbp-filter-item" data-filter=".'. $portfolio_terms->slug .'">'. $portfolio_terms->name .'</div>';
							        }
							    }    
						            			    
				$output .='    </div>
							</div>';
			}
			if($portfolio_container=='yes'){
				$output .= '<div class="container">';
			}
			$output .= '<div id="grid-portfolio" class="cbp-l-grid-projects '.$css_class1.'">
						    <ul>';
						    if ( $block_query->have_posts() ) :
					while ( $block_query->have_posts() ) : $block_query->the_post();
						global $ts_alaska, $post;
					    $portfolio_hover_color = get_post_meta( $post->ID, "themestudio_portfolio_hover_color", true );
					    $p_rgba = hex2rgb($portfolio_hover_color);
					    $portfolio_hover_style = 'style="background-color:rgba('.$p_rgba[0].', '.$p_rgba[1].', '.$p_rgba[2].', '.$ts_alaska['portfolio_hover_opacity'].')"';
					    $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							$output .= '<li class="cbp-item '.themestudio_isotope_terms().'" style="width:'.esc_attr($portfolio_item_width).'px; height:'.esc_attr( $portfolio_item_height).'px">
							<div class="cbp-caption">
								<div class="cbp-caption-defaultWrap">';
								 ob_start();
									the_post_thumbnail('portfolio-grid-4-full');
									$result = ob_get_contents();
								ob_end_clean();
								$output .= $result;
							$output .= '</div>
								<div class="cbp-caption-activeWrap">
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body">
											<a class="cbp-defaultPage cbp-l-caption-buttonLeft" href="';
											ob_start();
												the_permalink();
												$result = ob_get_contents();
											ob_end_clean();
											$output .= $result;
							$output .='">more info</a>
											<a data-title="';
												ob_start();
													the_title( );
													$result = ob_get_contents();
												ob_end_clean();
												$output .= $result;
							$output .= '" class="cbp-lightbox cbp-l-caption-buttonRight" href="'.esc_url($url).'">view larger</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cbp-l-grid-projects-title">';
								ob_start();
									the_title( );
									$result = ob_get_contents();
								ob_end_clean();
								$output .= $result;
								$output .='</div>
							<div class="cbp-l-grid-projects-desc">'. strip_tags(get_the_term_list(get_the_id(),'portfolio_cats', '',', ' ), '') .'</div>
										</li>';
						endwhile;						
						endif;						
						wp_reset_query(); 	
			$output .='</ul></div>';
			ob_start();
				get_template_part('content-parts/page', 'pagination-portfolio');
				$result = ob_get_contents();
			ob_end_clean();
			$output .= $result;
								
			//$output .= function_exists('ts_alaska_pagination') ? ts_alaska_pagination() : posts_nav_link(); 			
			
		if($portfolio_container=='yes'){
				$output .= '</div>';
			}
		return $output;
	 }
//******************************************************************************************************/
// ts_messagebox
//******************************************************************************************************/
static  function ts_notifications( $atts , $content) {
	$output = '';
		extract(shortcode_atts(array(
			'choose_style_message_box'=>'',
			'choose_style_message' => '',
			'ts_icon_message' => '',
			'ts_title_message' => '',
			'ts_color_title_message' => '',
			'color_title' => '',
		), $atts));
			if($choose_style_message=='info'){
				$ts_icon_message = '<span><i class="fa fa-info"></i></span>';
			}
			if($choose_style_message=='warning'){
				$ts_icon_message = '<span><i class="fa fa-exclamation"></i></span>';
			}
			if($choose_style_message=='success'){
				$ts_icon_message = '<span><i class="fa fa-check"></i></span>';
			}
			if($choose_style_message=='error'){
				$ts_icon_message = '<span><i class="fa fa-times"></i></span>';
			}
		if($ts_color_title_message=='yes'){
			$color_title ='ts-combined-notifications';
		}else{
			$color_title ='ts-message-'.$choose_style_message_box;
		}
		if($choose_style_message_box=='no_boxed'){
			$dem = rand(0,1000);
			$output .='<div id="ts-close-box-'.$dem.'" class="ts-message '.$choose_style_message.'">'.$ts_icon_message.'<div class="ts-message-content"><p>'.apply_filters('the_title',$ts_title_message).'</p></div><span class="ts-close" onclick="document.getElementById(\'ts-close-box-'.$dem.'\').style.display=\'none\'"><i class="fa fa-close"></i></span></div>';
		}else{
			$dem = rand(0,1000);
			$output .='<div id="ts-close-box-'.$dem.'" class="'.$color_title.' '.$choose_style_message.'" >
							<div class="ts-title-boxed">'.$ts_icon_message.'
								<div class="ts-message-content"><p>'.apply_filters('the_title',$ts_title_message).'</p></div>
								<span class="ts-close" onclick="document.getElementById(\'ts-close-box-'.$dem.'\').style.display=\'none\'"><i class="fa fa-close"></i><span>
							</div>
							<div class="ts-content-boxed">'.apply_filters('the_content',$content).'</div>
						</div>';
		}
		return $output;

		}
//******************************************************************************************************/
/*	MAP
//******************************************************************************************************/

static function themestudio_map_shortcode( $atts, $content = null ) {
		$output	='';
		extract( shortcode_atts( array(
			'css_basic'=>'',
			'address' => '',
			'lat'=>'21.582668',
			'long'=>'105.807298',
			'title_map_title'=>'',
			'title_map_phone'=>'',
			'title_map_email'=>'',
			'title_map_website'=>'',
			'colormap'=>'',
	    ), $atts ) );

		// $prepAddr = str_replace(' ','+',$address);		
		// $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?&address='.$prepAddr.'&sensor=false');
		// $output_ge= json_decode($geocode);
		 // $lat = $output_ge->results[0]->geometry->location->lat;
		 // $long = $output_ge->results[0]->geometry->location->lng;			


		$output .='';
		$output .=' <div class="map-contact">
				 	<div id="map-canvas" style="height:451px;width:100%;"></div>
					</div>
				<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript">
					   function initialize() {
						    var styles = [
						      {
						        stylers: [
						          { hue: "'.$colormap.'" }
						        ]
						      },{
						        featureType: "road",
						        elementType: "geometry",
						        stylers: [
						          { lightness: 100 },
						          { visibility: "simplified" }
						        ]
						      },{
						        featureType: "road",
						        elementType: "labels",
						        stylers: [
						          { visibility: "off" }
						        ]
						      }
						    ];


						     var styledMap = new google.maps.StyledMapType(styles,
						    {name: "Styled Map"});

						    var mapCanvas = document.getElementById("map-canvas");
						    var mapOptions = {
						        center: new google.maps.LatLng('.$lat.', '.$long.'),
						        zoom: 15,
						        mapTypeControlOptions: {
						          mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
						        },
						        panControl: false,
							    zoomControl: true,							    
						        scrollwheel: false,
							    navigationControl: false,
							    mapTypeControl: true,
							    scaleControl: false,
							    // draggable: false,

						      }
						    var map = new google.maps.Map(mapCanvas, mapOptions);
						    map.mapTypes.set("map_style", styledMap);
						    map.setMapTypeId("map_style");


						    	var locations = [
									[\''.$title_map_title.'\', \''.$address.'\', \''.$title_map_phone.'\', \''.$title_map_email.'\', \''.$title_map_website.'\','.$lat.', '.$long.']
									        ];
											var i;
											var description;
											var telephone;
											var email;
											var web;
											var marker;
											var link;
									        for (i = 0; i < locations.length; i++) {
												if (locations[i][1] ==\'undefined\'){ description =\'\';} else { description = locations[i][1];}
												if (locations[i][2] ==\'undefined\'){ telephone =\'\';} else { telephone = locations[i][2];}
												if (locations[i][3] ==\'undefined\'){ email =\'\';} else { email = locations[i][3];}
												if (locations[i][4] ==\'undefined\'){ web =\'\';} else { web = locations[i][4];}
									            marker = new google.maps.Marker({

									                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
									                map: map,
									                title: locations[i][0],
									                desc: description,
									                tel: telephone,
									                email: email,
									                web: web
									            });
									            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web);
									        }


							  	function bindInfoWindow(marker, map, title, desc, telephone, email, web) {
								    if (web.substring(0, 7) != "http://") {
								    link = "http://" + web;
								    } else {
								    link = web;
								    }
								    // iw.open(map,marker);
								      google.maps.event.addListener(marker, "click", function() {
								             var html= "<div style=\'color:#000;background-color:#fff;padding:5px;width:200px;\'><h4>"+title+"</h4><p>"+desc+"</p><i class=\'fa fa-phone\'></i> "+telephone+"<br/><i class=\'fa fa-envelope\'></i><a href=\'mailto:"+email+"\' >  "+email+"</a><br/><i class=\'fa fa-globe\'></i><a target=\'_blank\' href=\'"+link+"\'\' >  "+web+"</a></div>";
								             var iw = new google.maps.InfoWindow({content:html});
								            iw.open(map,marker);
								      });
								}
						    }
						    google.maps.event.addDomListener(window, "load", initialize);

				</script>';

		return $output;
}
//******************************************************************************************************/
/*	Divider
//******************************************************************************************************/
static  function ts_divider_shortcode( $atts , $content) {
	$output = '';
		extract(shortcode_atts(array(
			'choose_style_divider'=>'',
			'choose_icon_text'=>'',			
			'title_divider'=>'',			
			'color_divider'=>'',			
			'icon_divider'=>'',
			'width_divider'	=>'',
			'divider_style'	=>'',
			'style_divider'	=>'',			
			'width_d'	=>'',
		), $atts));
			
			if($width_divider=='divider-md'){
				$width_d = 'divider-md';
			}elseif($width_divider=='divider-sm'){
				$width_d = 'divider-sm';
			}else{
				$width_d = '';
			}			
			if($divider_style=='divider-2'){
				$style_divider = 'divider-2';
			}
		if($choose_style_divider=='style1'){			
			$output .='<hr class="divider-hr '.$style_divider.' ' .$width_d.'">';			
		}else {
			if($choose_icon_text=='text'){
				$output .='<div class="divider ts-divider-'.esc_attr($choose_icon_text).' ' .$width_d.'">
							 	<div class="divider-content">
							 		<span style="color: '.esc_attr($color_divider).'">'.apply_filters('the_title',$title_divider).'</span>
							 	</div>
							</div>';				
			}else{
				$output .='<div class="divider ts-divider-'.esc_attr($choose_icon_text).' ' .$width_d.'">
							 	<div class="divider-content">
							 		<i style="color:'.esc_attr($color_divider).'" class="fa '.$icon_divider.' fa-1x"></i>
							 	</div>
							</div>';
			}
		}
	return $output;	
}
//******************************************************************************************************/
/*	Pricing Table New
//******************************************************************************************************/
static  function ts_pricing_table_new( $atts , $content) {
	$output = '';
		extract(shortcode_atts(array(
			'choose_column'=>'',
			'choose_border'=>'',
			'ts_pricing_content'=>'',
			'img_pricing'=>'',

			'icon_prcing_1'=>'',	
			'title_pricing_1'=>'',	
			'price_1'=>'',	
			'pence_pricing_1'=>'',	
			'unit_pricing_1'=>'',	
			'des_plan_one_1'=>'',	
			'vatprompt'=>'',	
			'button_pricing_1'=>'',	
			'link_pricing_1'=>'',
			'color_border_1'=>'',


			'icon_prcing_2'=>'',	
			'title_pricing_2'=>'',	
			'price_2'=>'',	
			'pence_pricing_2'=>'',	
			'unit_pricing_2'=>'',	
			'des_plan_one_2'=>'',	
			'vatprompt_2'=>'',	
			'button_pricing_2'=>'',	
			'link_pricing_2'=>'',
			'color_border_2'=>'',	

			'icon_prcing_3'=>'',	
			'title_pricing_3'=>'',	
			'price_3'=>'',	
			'pence_pricing_3'=>'',	
			'unit_pricing_3'=>'',	
			'des_plan_one_3'=>'',	
			'vatprompt_3'=>'',	
			'button_pricing_3'=>'',	
			'link_pricing_3'=>'',
			'color_border_3'=>'',

			'icon_prcing_4'=>'',	
			'title_pricing_4'=>'',	
			'price_4'=>'',	
			'pence_pricing_4'=>'',	
			'unit_pricing_4'=>'',	
			'des_plan_one_4'=>'',	
			'vatprompt_4'=>'',	
			'button_pricing_4'=>'',	
			'link_pricing_4'=>'',
			'color_border_4'=>'',

			'borber_1'=>'',
			'borber_2'=>'',
			'borber_3'=>'',
			'borber_4'=>'',
		), $atts));
			if(isset($img_pricing) && is_numeric($img_pricing))
							 {
							 	$img_pricing = wp_get_attachment_image_src($img_pricing,'img216x460');
								$img_pricing = $img_pricing[0];
							 }
			if($choose_border=='yes'){
				if($color_border_1!=''){					
					$borber_1 = 'style="border:2px solid '.esc_attr( $color_border_1).';"';
				}
				if($color_border_2!=''){					
					$borber_2 = 'style="border:2px solid '.esc_attr( $color_border_2).';"';
				}
				if($color_border_3!=''){					
					$borber_3 = 'style="border:2px solid '.esc_attr( $color_border_3).';"';
				}
				if($color_border_4!=''){					
					$borber_4 = 'style="border:2px solid '.esc_attr( $color_border_4).';"';
				}
			}				 
			

			$output .='<div class="ts-pricingtable-5">
						<table>
							<tr class="section-info">
								<td class="ts-pricing-img"><figure><img alt="" src="'.esc_url($img_pricing).'"></figure></td>
								<td>
									<div class="ts-pricing-item" '.$borber_1.'>
										<span class="price-icon"><i class="fa '.esc_attr($icon_prcing_1).'"></i></span>
										<h3 class="price-title">'.esc_attr($title_pricing_1).'</h3>
										<div class="price-unit-vat">
											<div class="price-unit">
												<span class="price">'.esc_attr( $price_1).'.</span>
												<span class="unit">'.esc_attr( $pence_pricing_1 ).' / <span class="per-month">'.esc_attr( $unit_pricing_1).'</span></span>
											</div>	
											<p>'.apply_filters('the_title',$vatprompt).'</p>
										</div>
										<div class="desc">'.esc_attr( $des_plan_one_1).'</div>
										<div class="section-feature visible-xs">';
										$items_respon   = preg_split( '/\t\r\n|\r|\n/', $ts_pricing_content );
										foreach($items_respon as $item_res){
											$exts_res = explode("|", $item_res);						
											foreach($exts_res as $ext_res){
											$ex_res = explode(",", $ext_res);
												if(count($ex_res)==1){	
												$output .=' <h3 class="title-feature">'.$ex_res[0].'</h3>';
												}			
												$output .= '<ul>';
												if(count($ex_res)!=1){																	
														$ex_res[1]=strip_tags($ex_res[1]);
														if($ex_res[1]=='Y'){													
															$ex_res[1]='<span class="ts-icon-check"><i class="fa fa-check"></i>';
														}elseif($ex_res[1]=='N'){													
															$ex_res[1]='<span class="ts-icon-close"><i class="fa fa-close"></i></span>';
														}				
														$output .= '<li><label>'.esc_attr($ex_res[0]).'</label>'.$ex_res[1].'</li>';										
													 	
												}
														$output .= '</ul>';
											}
										}	
									$output .='						
										</div>
										<a href="'.esc_url($link_pricing_1).'" class="ts-bt-pricing">'.esc_attr($button_pricing_1).'</a>
									</div>
								</td>
								<td>
									<div class="ts-pricing-item" '.$borber_2.'>
										<span class="price-icon"><i class="fa '.esc_attr($icon_prcing_2).'"></i></span>
										<h3 class="price-title">'.esc_attr($title_pricing_2).'</h3>
										<div class="price-unit-vat">
											<div class="price-unit">
												<span class="price">'.esc_attr( $price_2).'.</span>
												<span class="unit">'.esc_attr( $pence_pricing_2 ).' / <span class="per-month">'.esc_attr( $unit_pricing_2).'</span></span>
											</div>	
											<p>'.apply_filters('the_title',$vatprompt_2).'</p>
										</div>
										<div class="desc">'.esc_attr( $des_plan_one_2).'</div>
										<div class="section-feature visible-xs">';
										$items_respon_2   = preg_split( '/\t\r\n|\r|\n/', $ts_pricing_content );
											foreach($items_respon_2 as $item_res_2){
												$exts_res_2 = explode("|", $item_res_2);						
												foreach($exts_res_2 as $ext_res_2){
												$ex_res_2 = explode(",", $ext_res_2);
													if(count($ex_res_2)==1){	
													$output .=' <h3 class="title-feature">'.$ex_res_2[0].'</h3>';
													}			
													$output .= '<ul>';
													if(count($ex_res_2)!=1){																	
															$ex_res_2[2]=strip_tags($ex_res_2[2]);
															if($ex_res_2[2]=='Y'){													
																$ex_res_2[2]='<span class="ts-icon-check"><i class="fa fa-check"></i>';
															}elseif($ex_res_2[2]=='N'){													
																$ex_res_2[2]='<span class="ts-icon-close"><i class="fa fa-close"></i></span>';
															}				
															$output .= '<li><label>'.esc_attr($ex_res_2[0]).'</label>'.$ex_res_2[2].'</li>';																								 	
													}
															$output .= '</ul>';
												}
											}
										$output .='
										</div>
										<a href="'.esc_url($link_pricing_2).'" class="ts-bt-pricing">'.esc_attr($button_pricing_2).'</a>
									</div>
								</td>';
								if($choose_column=='4'||$choose_column=='5'){
			$output	.='			<td>
									<div class="ts-pricing-item" '.$borber_3.'>
										<span class="price-icon"><i class="fa '.esc_attr($icon_prcing_3).'"></i></span>
										<h3 class="price-title">'.esc_attr($title_pricing_3).'</h3>
										<div class="price-unit-vat">
											<div class="price-unit">
												<span class="price">'.esc_attr( $price_3).'.</span>
												<span class="unit">'.esc_attr( $pence_pricing_3 ).' / <span class="per-month">'.esc_attr( $unit_pricing_3).'</span></span>
											</div>	
											<p>'.apply_filters('the_title',$vatprompt_3).'</p>
										</div>
										<div class="desc">'.esc_attr( $des_plan_one_3).'</div>
										<div class="section-feature visible-xs">';
										$items_respon_3   = preg_split( '/\t\r\n|\r|\n/', $ts_pricing_content );
											foreach($items_respon_3 as $item_res_3){
												$exts_res_3 = explode("|", $item_res_3);						
												foreach($exts_res_3 as $ext_res_3){
												$ex_res_3 = explode(",", $ext_res_3);
													if(count($ex_res_3)==1){	
													$output .=' <h3 class="title-feature">'.$ex_res_3[0].'</h3>';
													}			
													$output .= '<ul>';
													if(count($ex_res_3)!=1){																	
															$ex_res_3[3]=strip_tags($ex_res_3[3]);
															if($ex_res_3[3]=='Y'){													
																$ex_res_3[3]='<span class="ts-icon-check"><i class="fa fa-check"></i>';
															}elseif($ex_res_3[3]=='N'){													
																$ex_res_3[3]='<span class="ts-icon-close"><i class="fa fa-close"></i></span>';
															}				
															$output .= '<li><label>'.esc_attr($ex_res_3[0]).'</label>'.$ex_res_3[3].'</li>';										
														 	
													}
															$output .= '</ul>';
												}
											}
									$output	.='
										</div>
										<a href="'.esc_url($link_pricing_3).'" class="ts-bt-pricing">'.esc_attr($button_pricing_3).'</a>
									</div>
								</td>';
							}
			if($choose_column=='5'){
			$output	.='			<td>
								<div class="ts-pricing-item" '.$borber_4.'>
										<span class="price-icon"><i class="fa '.esc_attr($icon_prcing_4).'"></i></span>
										<h3 class="price-title">'.esc_attr($title_pricing_4).'</h3>
										<div class="price-unit-vat">
											<div class="price-unit">
												<span class="price">'.esc_attr( $price_4).'.</span>
												<span class="unit">'.esc_attr( $pence_pricing_4 ).' / <span class="per-month">'.esc_attr( $unit_pricing_4).'</span></span>
											</div>	
											<p>'.apply_filters('the_title',$vatprompt_4).'</p>
										</div>
										<div class="desc">'.esc_attr( $des_plan_one_4).'</div>
										<div class="section-feature visible-xs">';
										$items_respon_4   = preg_split( '/\t\r\n|\r|\n/', $ts_pricing_content );
											foreach($items_respon_4 as $item_res_4){
												$exts_res_4 = explode("|", $item_res_4);						
												foreach($exts_res_4 as $ext_res_4){
												$ex_res_4 = explode(",", $ext_res_4);
													if(count($ex_res_4)==1){	
													$output .=' <h3 class="title-feature">'.$ex_res_4[0].'</h3>';
													}			
													$output .= '<ul>';
													if(count($ex_res_4)!=1){																	
															$ex_res_4[3]=strip_tags($ex_res_4[3]);
															if($ex_res_4[3]=='Y'){													
																$ex_res_4[3]='<span class="ts-icon-check"><i class="fa fa-check"></i>';
															}elseif($ex_res_4[3]=='N'){													
																$ex_res_4[3]='<span class="ts-icon-close"><i class="fa fa-close"></i></span>';
															}				
															$output .= '<li><label>'.esc_attr($ex_res_4[0]).'</label>'.$ex_res_4[3].'</li>';										
														 	
													}
															$output .= '</ul>';
												}
											}
									$output	.='
										</div>
										<a href="'.esc_url($link_pricing_4).'" class="ts-bt-pricing">'.esc_attr($button_pricing_4).'</a>
									</div>
								</td>';
							}					
			$output	.=			'</tr>';							
						$items_contents   = preg_split( '/\t\r\n|\r|\n/', $ts_pricing_content );
						foreach($items_contents as $item){
							$exts = explode("|", $item);						
							foreach($exts as $ext){
							$ex = explode(",", $ext);
							if(count($ex)==1){	
							$output .=' <tr class="hidden-xs">
											<td colspan="'.esc_attr($choose_column ).'" class="title-feature">'.$ex[0].'</td>
										</tr>';
							}			
										$output .= '<tr class="hidden-xs list-feature">';
										if(count($ex)!=1){							
											for ($i=0; $i < $choose_column; $i++) { 
												$ex[$i]=strip_tags($ex[$i]);
												if($ex[$i]=='Y'){
													$a = 'aa';
													$class_pricing='ts-icon-check';
													$ex[$i]='<i class="fa fa-check"></i>';
												}elseif($ex[$i]=='N'){
													$class_pricing='ts-icon-close';
													$ex[$i]='<i class="fa fa-close"></i>';
												}else{
													$class_pricing = '';
												}				
												$output .= '<td><span class="inner-td '.esc_attr( $class_pricing).'">'.$ex[$i].'</span></td>';										
											 }	
												$output .= '</tr>';
										}
							}
						}		
							
			$output .='		<tr class="pricing-footer hidden-xs">
								<td></td>
								<td>
									<div class="ts-footer-price">
										<div class="price-unit">
											<span class="price">'.esc_attr( $price_1).'.</span>
											<span class="unit">'.esc_attr( $pence_pricing_1 ).'/'.esc_attr( $unit_pricing_1).'</span>
										</div>	
										<p>'.apply_filters('the_title',$vatprompt).'</p>
										<a href="'.esc_url($link_pricing_1).'" class="ts-bt-pricing">'.esc_attr($button_pricing_1).'</a>
									</div>
								</td>
								<td>
									<div class="ts-footer-price">
										<div class="price-unit">
											<span class="price">'.esc_attr( $price_2).'.</span>
											<span class="unit">'.esc_attr( $pence_pricing_2 ).'/'.esc_attr( $unit_pricing_2).'</span>
										</div>	
										<p>'.apply_filters('the_title',$vatprompt_2).'</p>
										<a href="'.esc_url($link_pricing_2).'" class="ts-bt-pricing">'.esc_attr($button_pricing_2).'</a>
									</div>
								</td>';
								if($choose_column=='4'||$choose_column=='5'){
			$output .='			<td>
									<div class="ts-footer-price">
										<div class="price-unit">
											<span class="price">'.esc_attr( $price_3).'.</span>
											<span class="unit">'.esc_attr( $pence_pricing_3 ).'/'.esc_attr( $unit_pricing_3).'</span>
										</div>	
										<p>'.apply_filters('the_title',$vatprompt_3).'</p>
										<a href="'.esc_url($link_pricing_3).'" class="ts-bt-pricing">'.esc_attr($button_pricing_3).'</a>
									</div>
								</td>';
								}
								if($choose_column=='5'){
			$output .='			<td>
									<div class="ts-footer-price">
										<div class="price-unit">
											<span class="price">'.esc_attr( $price_4).'.</span>
											<span class="unit">'.esc_attr( $pence_pricing_4 ).'/'.esc_attr( $unit_pricing_4).'</span>
										</div>	
										<p>'.apply_filters('the_title',$vatprompt_4).'</p>
										<a href="'.esc_url($link_pricing_4).'" class="ts-bt-pricing">'.esc_attr($button_pricing_4).'</a>
									</div>
								</td>';
								}
			$output .='		</tr>
						</table>
					</div>
					';				

	return $output;	
}
//******************************************************************************************************/
/*	whmpress Pricing Table
//******************************************************************************************************/
static  function ts_whmpress_pricetable( $atts , $content) {
	$output = '';
		extract(shortcode_atts(array(
			'choose_column'=>'',
			)));
		$html ='';
	return $html;
}

//******************************************************************************************************/
// Search Domain
//******************************************************************************************************/
static function ts_search_domain( $atts , $content = null)
    {        
        $args = $list = array(); $html = $tldList = null;
        $args['select_option_search'] = $args['search_link_button'] = $args['link_to_whmcs'] = null;
        extract( shortcode_atts( $args, $atts ) );
        
        $server_list = ( isset( $select_option_search ) && !empty( $select_option_search ) ) ? $select_option_search : null;
        
        if ( !empty( $server_list ) )
        {
            $server_list = explode("\n", $server_list);
            foreach ( $server_list as $item )
            {
                if ( isset( $item ) && !empty( $item ) )
                {
                    $item = explode( "|", $item );
                    $tld        = ( isset( $item[0] ) && !empty( $item[0] ) ) ? $item[0] : null;
                    $server     = ( isset( $item[1] ) && !empty( $item[1] ) ) ? $item[1] : null;
                    $response   = ( isset( $item[2] ) && !empty( $item[2] ) ) ? $item[2] : null;
                    $check      = false;
                    
                    if ( $tld && $server )
                    {
                        $item = array();
                        $item['tld']        = $tld;
                        $item['server']     = $server;
                        $item['response']   = $response;
                        $item['check']      = $check;
                        $list[] = $item;
                    }
                }
            }
            
            
            $i = 0;
            foreach ($list as $value)
            {
                if ($value['check'] == true) {
                    $checked = " checked='checked' ";
                } else {
                    $checked = " ";
                }
                
        		$tldList .= '<td><input type="checkbox" name="tld_'.$value['tld'].'"'.$checked.' />.'.$value['tld'].'</td>';
                
                $i++;
        		if ($i > 4) {
        		    $i = 0;
        		    $tldList .= '</tr><tr>';
        		}
        	}
        }
        
        $server_list = array();
        
        $server_list_tmp = $select_option_search;
        if ( !empty( $server_list_tmp ) ) {
            $server_list = explode("<br />", $server_list_tmp);
        }
        
        $server_list = ( !empty( $server_list ) ) ? implode( ",", $server_list ) : '';
        
        $url   = plugin_dir_url(__FILE__).'whois/whois.php';
        
        $html .= '<div id="content-whois">';
		    $html .= '<form id="whois" action="'.$url.'" method="post" class="ts-search-whois">';
				$html .= '<div id="domain">';
					$html .= '<div class="l1">';		    
						$html .= '<span style="font-size:18px;">www.</span>';
						$html .= '<input type="text" name="domain" class="input"/>';
                        $html .= '<input type="hidden" name="search_link_button" value="'.$search_link_button.'" />';
                        $html .= '<input type="hidden" name="select_option_search" value="'.$server_list.'" />';
                        $html .= '<input type="hidden" name="select_option_whmcs" value="'.$link_to_whmcs.'" />';
						$html .= '<input name="Submit" type="submit" value="Search" class="input" onclick="TS_Check_Domain(); return false;" />';	 
					$html .= '</div>';
					$html .= '<div class="r">';
						$html .= '<p align="center" style="font-size:14px;">(e.g yourcompany)</p>';
					$html .= '</div>';
					$html .= '<div class="l2">';
						$html .= '<table width="250" border="0" cellspacing="3" cellpadding="0">';
                            $html .= '<tr>';
								$html .= $tldList;
                            $html .= '</tr>';
                        $html .= '</table>';
			  		$html .= '</div>';
			   $html .= '</div>';
			$html .= '</form>';
		$html .= '<div id="log"><div id="log_res" align="center"><!-- search results --></div></div>';
        $html .= '</div>';
        return $html;
    }

//*********************************************End Shortcode ****************************************************************************//
}
	/*My shortcodes */
add_shortcode( 'themestudio_title', array('themestudio_shortcodes_fe','themestudio_title') );
add_shortcode( 'ts_call_to_action', array('themestudio_shortcodes_fe','ts_call_to_action') );
add_shortcode( 'ts_search_domain', array('themestudio_shortcodes_fe','ts_search_domain') );
add_shortcode( 'ts_pricing_table', array('themestudio_shortcodes_fe','ts_pricing_table') );
add_shortcode( 'ts_funfact', array('themestudio_shortcodes_fe','ts_funfact') );
add_shortcode( 'ts_funfact_style2', array('themestudio_shortcodes_fe','ts_funfact_style2') );
add_shortcode( 'ts_testimonials', array('themestudio_shortcodes_fe','ts_testimonials') );
add_shortcode( 'vc_accordion', array('themestudio_shortcodes_fe','vc_accordion') );
add_shortcode( 'vc_accordion_tab', array('themestudio_shortcodes_fe','vc_accordion_tab') );
add_shortcode( 'ts_feature', array('themestudio_shortcodes_fe','ts_feature') );
add_shortcode( 'ts_client_work', array('themestudio_shortcodes_fe','ts_client_work') );
add_shortcode( 'ts_lasted_blog', array('themestudio_shortcodes_fe','ts_lasted_blog') );
add_shortcode( 'ts_our_service', array('themestudio_shortcodes_fe','ts_our_service') );
add_shortcode( 'ts_our_service_style2', array('themestudio_shortcodes_fe','ts_our_service_style2') );
add_shortcode( 'ts_our_service_style3', array('themestudio_shortcodes_fe','ts_our_service_style3') );
add_shortcode( 'ts_twitter', array('themestudio_shortcodes_fe','ts_twitter') );
add_shortcode( 'ts_domain_box_price', array('themestudio_shortcodes_fe','ts_domain_box_price') );
add_shortcode( 'ts_special_offer', array('themestudio_shortcodes_fe','ts_special_offer') );
add_shortcode( 'ts_pricing_hosting', array('themestudio_shortcodes_fe','ts_pricing_hosting') );
add_shortcode( 'ts_text_dropcap', array('themestudio_shortcodes_fe','ts_text_dropcap') );
add_shortcode( 'ts_team_member', array('themestudio_shortcodes_fe','ts_team_member') );
add_shortcode( 'ts_skillbar_shortcode', array('themestudio_shortcodes_fe','ts_skillbar_shortcode') );
add_shortcode( 'ts_box_border', array('themestudio_shortcodes_fe','ts_box_border') );
add_shortcode( 'ts_process_bar', array('themestudio_shortcodes_fe','ts_process_bar') );
add_shortcode( 'ts_countdown', array('themestudio_shortcodes_fe','ts_countdown') );
add_shortcode( 'ts_style_button', array('themestudio_shortcodes_fe','ts_style_button') );
add_shortcode( 'ts_readmore', array('themestudio_shortcodes_fe','ts_readmore') );
add_shortcode( 'ts_social_include', array('themestudio_shortcodes_fe','ts_social_include') );
add_shortcode( 'ts_social_full', array('themestudio_shortcodes_fe','ts_social_full') );
add_shortcode( 'ts_blockquote', array('themestudio_shortcodes_fe','ts_blockquote') );
add_shortcode( 'ts_list_style', array('themestudio_shortcodes_fe','ts_list_style') );
add_shortcode( 'ts_table_data', array('themestudio_shortcodes_fe','ts_table_data') );
add_shortcode( 'ts_list_images', array('themestudio_shortcodes_fe','ts_list_images') );
add_shortcode( 'ts_contact_hotline', array('themestudio_shortcodes_fe','ts_contact_hotline') );
add_shortcode( 'ts_contact_infomation', array('themestudio_shortcodes_fe','ts_contact_infomation') );
add_shortcode( 'ts_portfolio', array('themestudio_shortcodes_fe','ts_portfolio') );
add_shortcode( 'ts_notifications', array('themestudio_shortcodes_fe','ts_notifications') );
add_shortcode( 'themestudio_map_shortcode', array('themestudio_shortcodes_fe','themestudio_map_shortcode'));
add_shortcode( 'ts_divider_shortcode', array('themestudio_shortcodes_fe','ts_divider_shortcode'));
add_shortcode( 'ts_pricing_table_new', array('themestudio_shortcodes_fe','ts_pricing_table_new'));
