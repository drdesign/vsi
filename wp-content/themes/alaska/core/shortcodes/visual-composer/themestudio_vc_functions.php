<?php
if (class_exists('Vc_Manager')) {

	add_action( 'init', 'themestudio_register_vc_shortcodes' );
	function themestudio_register_vc_shortcodes() {
//****************************************************** Variable ******************************************************//
	$add_yes_no = array(
			'type' => 'dropdown',
			'heading' => __( 'Choose Animation', 'themestudio' ),
			'param_name' => 'onclick',
			'value' => array(
				__( 'No', 'themestudio' ) => 'no',
				__( 'Yes', 'themestudio' ) => 'yes'
			),
			'description' => __( 'Define action for choose event if needed.', 'themestudio' )
			);
	$add_css_animation = array(
		'type' => 'dropdown',
		'heading' => __( 'CSS Animation', 'themestudio' ),
		'param_name' => 'css_animation',
		'admin_label' => true,
		'value' => array(
			__( 'No', 'themestudio' ) => '',
			__( 'bounce', 'themestudio' ) => 'bounce',
			__( 'rubberBand', 'themestudio' ) => 'rubberBand',
			__( 'flash', 'themestudio' ) => 'flash',
			__( 'pulse', 'themestudio' ) => 'pulse',
			__( 'shake', 'themestudio' ) => 'shake',
			__( 'swing', 'themestudio' ) => 'swing',
			__( 'tada', 'themestudio' ) => 'tada',
			__( 'wobble', 'themestudio' ) => 'wobble',

__( 'bounceIn', 'themestudio' ) => 'bounceIn',
			__( 'bounceInDown', 'themestudio' ) => 'bounceInDown',
			__( 'bounceInLeft', 'themestudio' ) => 'bounceInLeft',
			__( 'bounceInRight', 'themestudio' ) => 'bounceInRight',
			__( 'bounceInUp', 'themestudio' ) => 'bounceInUp',
			__( 'bounceOut', 'themestudio' ) => 'bounceOut',
			__( 'bounceOutDown', 'themestudio' ) => 'bounceOutDown',
			__( 'bounceOutLeft', 'themestudio' ) => 'bounceOutLeft',
__( 'bounceOutRight', 'themestudio' ) => 'bounceOutRight',
			__( 'bounceOutUp', 'themestudio' ) => 'bounceOutUp',
			__( 'fadeIn', 'themestudio' ) => 'fadeIn',
			__( 'fadeInDown', 'themestudio' ) => 'fadeInDown',
			__( 'fadeInDownBig', 'themestudio' ) => 'fadeInDownBig',
			__( 'fadeInLeft', 'themestudio' ) => 'fadeInLeft',
			__( 'fadeInLeftBig', 'themestudio' ) => 'fadeInLeftBig',
			__( 'fadeInRight', 'themestudio' ) => 'fadeInRight',
__( 'fadeInRightBig', 'themestudio' ) => 'fadeInRightBig',
			__( 'fadeInUp', 'themestudio' ) => 'fadeInUp',
			__( 'fadeInUpBig', 'themestudio' ) => 'fadeInUpBig',
			__( 'fadeOut', 'themestudio' ) => 'fadeOut',
			__( 'fadeOutDown', 'themestudio' ) => 'fadeOutDown',
			__( 'fadeOutDownBig', 'themestudio' ) => 'fadeOutDownBig',
			__( 'fadeOutLeft', 'themestudio' ) => 'fadeOutLeft',
			__( 'fadeOutLeftBig', 'themestudio' ) => 'fadeOutLeftBig',
__( 'fadeOutRight', 'themestudio' ) => 'fadeOutRight',
			__( 'fadeOutRightBig', 'themestudio' ) => 'fadeOutRightBig',
			__( 'fadeOutUp', 'themestudio' ) => 'fadeOutUp',
			__( 'fadeOutUpBig', 'themestudio' ) => 'fadeOutUpBig',
			__( 'flip', 'themestudio' ) => 'flip',
			__( 'flipInX', 'themestudio' ) => 'flipInX',
			__( 'flipInY', 'themestudio' ) => 'flipInY',
			__( 'flipOutX', 'themestudio' ) => 'flipOutX',
__( 'flipOutY', 'themestudio' ) => 'flipOutY',
			__( 'lightSpeedIn', 'themestudio' ) => 'lightSpeedIn',
			__( 'lightSpeedOut', 'themestudio' ) => 'lightSpeedOut',
			__( 'rotateIn', 'themestudio' ) => 'rotateIn',
			__( 'rotateInDownLeft', 'themestudio' ) => 'rotateInDownLeft',
			__( 'rotateInDownRight', 'themestudio' ) => 'rotateInDownRight',
			__( 'rotateInUpLeft', 'themestudio' ) => 'rotateInUpLeft',
			__( 'rotateInUpRight', 'themestudio' ) => 'rotateInUpRight',
__( 'rotateOut', 'themestudio' ) => 'rotateOut',
			__( 'rotateOutDownLeft', 'themestudio' ) => 'rotateOutDownLeft',
			__( 'rotateOutDownRight', 'themestudio' ) => 'rotateOutDownRight',
			__( 'rotateOutUpLeft', 'themestudio' ) => 'rotateOutUpLeft',
			__( 'rotateOutUpRight', 'themestudio' ) => 'rotateOutUpRight',
			__( 'hinge', 'themestudio' ) => 'hinge',
			__( 'rollIn', 'themestudio' ) => 'rollIn',
			__( 'rollOut', 'themestudio' ) => 'rollOut',

			__( 'zoomIn', 'themestudio' ) => 'zoomIn',
			__( 'zoomInDown', 'themestudio' ) => 'zoomInDown',
			__( 'zoomInLeft', 'themestudio' ) => 'zoomInLeft',
			__( 'zoomInRight', 'themestudio' ) => 'zoomInRight',
			__( 'zoomInUp', 'themestudio' ) => 'zoomInUp',
			__( 'zoomOut', 'themestudio' ) => 'zoomOut',
			__( 'zoomOutDown', 'themestudio' ) => 'zoomOutDown',
			__( 'zoomOutLeft', 'themestudio' ) => 'zoomOutLeft',
			__( 'zoomOutRight', 'themestudio' ) => 'zoomOutRight',
			__( 'zoomOutUp', 'themestudio' ) => 'zoomOutUp',
			__( 'Appear from center', 'themestudio' ) => "appear"
		),
		'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'themestudio' ),
		'dependency' => array(
				'element' => 'onclick',
				'value' => array( 'yes' )
			)
	);


	$data_wow_delay = array(
					"type" => "textfield",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Data Wow Delay",'themestudio'),
		            "param_name" => "data_wow_delay",
		            "value" => "",
		            "description" => __("Data Wow Delay eg:0.2s,0.3s ...",'themestudio'),
		            'dependency' => array(
					'element' => 'onclick',
					'value' => array( 'yes' )
					)
		);
	$data_wow_duration = array(
					"type" => "textfield",
		            "holder" => "div",
		            "class" => "",
		            "heading" => __("Data Wow Duration",'themestudio'),
		            "param_name" => "data_wow_duration",
		            "value" => "",
		            "description" => __("Data Wow Duration eg:0.2s,0.3s ...",'themestudio'),
		            'dependency' => array(
					'element' => 'onclick',
					'value' => array( 'yes' )
					)
		);
	$add_css_style = array(
	     'type' => 'css_editor',
	     'heading' => __( 'Css', 'themestudio' ),
	     'param_name' => 'css',
	     'group' => __( 'Design options', 'themestudio' )
	    );

	$add_css_awesome = array(
		'type' => 'textfield',
		'heading' => __( 'font awesome icon class', 'themestudio' ),
		'param_name' => 'css_awesome',
		'admin_label' => true,
		'value' => '',
		'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a target="__blank" href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
	);

//WHMPRESS


//******************************************************************************************************/
// font basic
//******************************************************************************************************/
$add_css_basic = array(
		'type' => 'dropdown',
		'heading' => __( 'font Basic icon class', 'themestudio' ),
		'param_name' => 'css_basic',
		'admin_label' => true,
		'value' => array(
			__( 'No', 'themestudio' ) => '',
			__( 'icon-basic-joypad', 'themestudio' ) => 'icon-basic-joypad',
			__( 'icon-basic-keyboard', 'themestudio' ) => 'icon-basic-keyboard',
			__( 'icon-basic-laptop', 'themestudio' ) => 'icon-basic-laptop',
			__( 'icon-basic-accelerator', 'themestudio' ) => 'icon-basic-accelerator',
			__( 'icon-basic-alarm', 'themestudio' ) => 'icon-basic-alarm',
			__( 'icon-basic-anchor', 'themestudio' ) => 'icon-basic-anchor',
			__( 'icon-basic-anticlockwise', 'themestudio' ) => 'icon-basic-anticlockwise',
			__( 'icon-basic-archive', 'themestudio' ) => 'icon-basic-archive',
			__( 'icon-basic-archive-full', 'themestudio' ) => 'icon-basic-archive-full',
			__( 'icon-basic-ban', 'themestudio' ) => 'icon-basic-ban',
			),

		'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'themestudio' ),
	);

//******************************************************************************************************/
// Custom VC Row  
//******************************************************************************************************/
	$setting = array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __( "In container", 'themestudio' ),
				"param_name" => "container_class",
				"value" => array(
					__( "No container", 'themestudio' ) => "",
					__( "Inside container div", 'themestudio' ) => "container",
				),
				"description" => __( "With container class.", 'themestudio' ),
			);
			vc_add_param( 'vc_row', $setting );
	$setting = array(
				   'type' => 'colorpicker',
				   'holder' => 'div',
	        	   'class' => '',
				   'heading' => __( 'Background overlay', 'themestudio' ),
				   'param_name' => 'color_overlay',
				   'value' =>'',
				   'description' => ""
				   );			
			vc_add_param( 'vc_row', $setting );			
	$setting = array(
				   'type' => 'textfield',
				   'heading' => __( 'Custom section id', 'themestudio' ),
				   'param_name' => 'section_custom_id',
				   'value' =>'',
				   'description' => ""
				   );
			vc_add_param( 'vc_row', $setting );
		
	$setting = array(
					'type' => 'column_offset',
					'heading' => __('Responsiveness', 'js_composer'),
					'param_name' => 'offset',
					'group' => __( 'Width & Responsiveness', 'js_composer' ),
					'description' => __('Adjust column for different screen sizes. Control width, offset and visibility settings.', 'js_composer')
					);
			vc_add_param( 'vc_column_inner', $setting );		
//******************************************************************************************************/
// Custom VC TABS
//******************************************************************************************************/	
	$setting = array(
				   'type' => 'dropdown',
				   'heading' => __( 'Choose style tab', 'themestudio' ),
				   'param_name' => 'style_boder',
				  	'value'=>array(
						__( 'Style 1', 'themestudio' ) => '',
						__( 'Style 2', 'themestudio' ) => 'ts-tab-style2',
					),
				   'description' => ""
				   );
			vc_add_param( 'vc_tabs', $setting );		
//******************************************************************************************************/
// Accordion Overwrite Visual composer
//******************************************************************************************************/
vc_map( array(
	'name' => __( 'Accordion Shortcode', 'themestudio' ),
	'base' => 'vc_accordion',
	'show_settings_on_create' => false,
	'is_container' => true,	
	"category" => __('ALASKA Blocks','themestudio'),	
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Choose style accordion', 'themestudio' ),
			'param_name' => 'choose_style_accordion',
			'value' => array(											
					__( 'Style accordion 1', 'themestudio' ) => 'style1',				
					__( 'Style accordion 2', 'themestudio' ) => 'style2'				
				),
			'description' => __( 'Choose style accordion display on page.', 'themestudio' )
		),		
		array(
			'type' => 'textfield',
			'heading' => __( 'Widget title', 'themestudio' ),
			'param_name' => 'title',
			'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'themestudio' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Active section', 'themestudio' ),
			'param_name' => 'active_tab',
			'value' => array(											
					__( 'Active fisrt tab', 'themestudio' ) => '0',				
					__( 'No Active', 'themestudio' ) => 'false'				
				),
			'description' => __( 'Enter section number to be active on load or enter false to collapse all sections.', 'themestudio' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'themestudio' ),
			'param_name' => 'el_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themestudio' )
		)
	),
	'custom_markup' => '
	<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
	%content%
	</div>
	<div class="tab_controls">
	    <a class="add_tab" title="' . __( 'Add section', 'themestudio' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . __( 'Add section', 'themestudio' ) . '</span></a>
	</div>
	',
		'default_content' => '
	    [vc_accordion_tab title="' . __( 'Section 1', 'themestudio' ) . '"][/vc_accordion_tab]
	    [vc_accordion_tab title="' . __( 'Section 2', 'themestudio' ) . '"][/vc_accordion_tab]
	',
		'js_view' => 'VcAccordionView'
	) );
	vc_map( array(
		'name' => __( 'Section', 'themestudio' ),
		'base' => 'vc_accordion_tab',
		'allowed_container_element' => 'vc_row',
		'is_container' => true,
		'content_element' => false,
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'themestudio' ),
				'param_name' => 'title',
				'description' => __( 'Accordion section title.', 'themestudio' )
			),
		),
		'js_view' => 'VcAccordionTabView'
	) );
//******************************************************************************************************/
// Blockquote
//******************************************************************************************************/
vc_map( array(
   "name" => __("Block Quote", 'themestudio'),   
   "description" => "Display style blockquote",
   "base" => "ts_blockquote",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array( 
   		array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style quote', 'themestudio' ),
					'param_name' => 'choose_style_quote',
					'value' => array(
					__( 'Style 1', 'themestudio' ) => 'style1',
					__( 'Style 2', 'themestudio' ) => 'style2',			    						   				
					),			   
					'description' => __( 'Choose style for Blockquote.', 'themestudio' )
				  ),    		   		
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Author name",'themestudio'),
			    "param_name" => "name_author",
			    "value" => "Robert Smith",			   
			    "description" => __("Add author name for quote.",'themestudio')
	     	 ),
   		array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" =>'Synergistically supply global testing procedures through ethical scenarios develop empowered sticky leadership.',
              "description" => __("content",'themestudio')
          ),
   	)
) );
//******************************************************************************************************/
// Style button
//******************************************************************************************************/
$add_style_border = array(
		'type' => 'dropdown',
		'heading' => __( 'Choose style border', 'themestudio' ),
		'param_name' => 'style_border_button',	
		'value' =>array(
						__( 'solid','themestudio')=>'solid',
						__( 'dotted','themestudio')=>'dotted',
						__( 'dashed','themestudio')=>'dashed',
						__( 'none','themestudio')=>'none',
						__( 'hidden','themestudio')=>'hidden',
						__( 'double','themestudio')=>'double',
						__( 'groove','themestudio')=>'groove',
						__( 'ridge','themestudio')=>'ridge',
						__( 'inset','themestudio')=>'inset',
						__( 'outset','themestudio')=>'outset',
						__( 'initial','themestudio')=>'initial',
						__( 'inherit','themestudio')=>'inherit' 
				),
		'dependency' => array(
				'element' => 'border_button',
				'value' => array( 'yes' )
				),
		'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'themestudio' ),
	);
vc_map( array(
   "name" => __("Button Shortcode", 'themestudio'),   
   "base" => "ts_style_button",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(    		   	
   		array(
				'type' => 'dropdown',
				'heading' => __( 'Layout display', 'themestudio' ),
				'param_name' => 'size_button',
				'value' => array(
				__( 'Large', 'themestudio' ) => 'large',
				__( 'Normal', 'themestudio' ) => 'normal',			    						   
				__( 'Small', 'themestudio' ) => 'small',			    						   
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text button",'themestudio'),
			    "param_name" => "text_button",
			    "value" => __("Button","themestudio"),
			    "description" => __("Add button name for element",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Link button",'themestudio'),
			    "param_name" => "link_button",
			    "value" => "#",
			    "description" => __("Add button link for element",'themestudio')
	     	 ),
   		array(
				'type' => 'dropdown',
				'heading' => __( 'Postion button', 'themestudio' ),
				'param_name' => 'postion_button',
				'value' => array(
				__( 'Left', 'themestudio' ) => 'pull-left',
				__( 'Right', 'themestudio' ) => 'pull-right',			    						   				
				),			   
				'description' => __( 'Choose Postion display for button.', 'themestudio' )
			  ),
   		array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Color text","themestudio"),
		        "param_name" => "color_text_button",
		        "value" => '#ffffff', //Default color
		        "description" => __("Choose color for text ","themestudio")
	        ),
   		array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Color text hover","themestudio"),
		        "param_name" => "color_text_hover_button",
		        "value" => '#fd4326', //Default color
		        "description" => __("Choose color for text button when hover","themestudio")
	        ),
   		
   		array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("background button","themestudio"),
		        "param_name" => "color_button",
		        "value" => '#fd4326', //Default color
		        "description" => __("Choose color for button","themestudio")
	        ),
   		array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("background button hover","themestudio"),
		        "param_name" => "color_hover_button",
		        "value" => '#252525', //Default color
		        "description" => __("Choose color when hover button.","themestudio")
	        ),
   		
   		array(
				'type' => 'dropdown',
				'heading' => __( 'Choose border', 'themestudio' ),
				'param_name' => 'border_button',
				'value' => array(
				__( 'No border', 'themestudio' ) => 'no',
				__( 'Border', 'themestudio' ) => 'yes',			    						   				
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Width border button",'themestudio'),
			    "param_name" => "width_border_button",
			    "value" => "1",
			    'dependency' => array(
					'element' => 'border_button',
					'value' => array( 'yes' )
				),
			    "description" => __("Add border width for button",'themestudio')
	     	 ),
   		$add_style_border,
	 	array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __(" Choose color border","themestudio"),
		        "param_name" => "color_border_button",
		        "value" => '#42454a', //Default color
		        'dependency' => array(
					'element' => 'border_button',
					'value' => array( 'yes' )
				),
		        "description" => __("Choose color for border button","themestudio"),
	        ),
	    array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Width radius",'themestudio'),
			    "param_name" => "border_radius_width",
			    "value" => "0",
			    "description" => __("Enter number radius width for button",'themestudio')
	     	 ),    	           	
)));

//******************************************************************************************************/
// Call To Action
//******************************************************************************************************/

	vc_map( array(
	"name" => __("Call To action",'themestudio'),
    "base" => "ts_call_to_action",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array(
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Title",'themestudio'),
              "param_name" => "ts_cta_title",
              "value" => "Managed Dedicated Servers",
              "description" => __("Enter Call to action title ",'themestudio')
          ),
        array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Color title","themestudio"),
	        "param_name" => "color_title",
	        "value" => '#ffffff', //Default color
	        "description" => __("Choose color for Title","themestudio")
	        ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Text Action",'themestudio'),
              "param_name" => "ts_cta_text_link",
              "value" => "Get started",
              "description" => __("Enter Call to action text ",'themestudio')
          ),
        array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Text button color","themestudio"),
	        "param_name" => "color_text_button",
	        "value" => '#ffffff', //Default color
	        "description" => __("Choose color for Text button","themestudio")
	        ),
        array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Text button color hover","themestudio"),
	        "param_name" => "color_text_button_hover",
	        "value" => '#ffffff', //Default color
	        "description" => __("Choose color for Text button when hover","themestudio")
	        ),
        array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Background button","themestudio"),
	        "param_name" => "color_button",
	        "value" => '#fd4326', //Default color
	        "description" => __("Choose color for background button","themestudio")
	        ),
        array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Background button hover","themestudio"),
	        "param_name" => "color_hover_button",
	        "value" => '#2a2a2a', //Default color
	        "description" => __("Choose color for background button when hover.","themestudio")
	        ),
        array(
				'type' => 'dropdown',
				'heading' => __( 'Choose style border', 'themestudio' ),
				'param_name' => 'style_border_button',	
				'value' => array(
								__( 'solid','themestudio')=>'solid',
								__( 'dotted','themestudio')=>'dotted',
								__( 'dashed','themestudio')=>'dashed',
								__( 'none','themestudio')=>'none',
								__( 'hidden','themestudio')=>'hidden',
								__( 'double','themestudio')=>'double',
								__( 'groove','themestudio')=>'groove',
								__( 'ridge','themestudio')=>'ridge',
								__( 'inset','themestudio')=>'inset',
								__( 'outset','themestudio')=>'outset',
								__( 'initial','themestudio')=>'initial',
								__( 'inherit','themestudio')=>'inherit' 
				),
				'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'themestudio' ),
			),        	
        	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Border button color","themestudio"),
	        "param_name" => "color_border_button",
	        "value" => '#fd4326', //Default color
	        "description" => __("Choose color for border button","themestudio")
	        ),
	        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Width border button",'themestudio'),
              "param_name" => "width_border_button",
              "value" => "1",
              "description" => __("Enter width border button. default :1 ",'themestudio')
          	),
        
		array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Link Action",'themestudio'),
              "param_name" => "ts_cta_url",
              "value" => "#",
              "description" => __("Enter Call to action link ",'themestudio')
          ),
        array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Color Text call to action","themestudio"),
	        "param_name" => "color_text_description",
	        "value" => '#2a2a2a', //Default color
	        "description" => __("Choose color for text call to action ","themestudio")
	        ),
        array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" => __("Blazing performance, supreme flexibility & superior UK based support.",'themestudio'),
              "description" => __("Call to action  content",'themestudio')
          ),
		


        )));
//******************************************************************************************************/
// Client List
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Client List', 'themestudio' ),
	 'base' => 'ts_client_work',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(			  
			  array(
			   'type' => 'attach_images',
			   'heading' => __( 'Images', 'themestudio' ),
			   'param_name' => 'images',
			   'value' => '',
			   'description' => __( 'Select images from media library.', 'themestudio' )
			  ),
			  array(
			   'type' => 'textfield',
			   'heading' => __( 'Image size', 'themestudio' ),
			   'param_name' => 'img_size',
			   'value' =>'client-work',
			   'description' => __( 'Enter image size. Example: thumbnail, medium, large, full ,client-work . Leave empty to use "thumbnail" size.', 'themestudio' )
			  ),
			  array(
			   'type' => 'dropdown',
			   'heading' => __( 'On click', 'themestudio' ),
			   'param_name' => 'onclick',
			   'value' => array(
			    __( 'Open prettyPhoto', 'themestudio' ) => 'link_image',
			    __( 'Do nothing', 'themestudio' ) => 'link_no',
			    __( 'Open custom link', 'themestudio' ) => 'custom_link'
			   ),
			   'description' => __( 'What to do when slide is clicked?', 'themestudio' )
			  ),
			  array(
			   'type' => 'exploded_textarea',
			   'heading' => __( 'Custom links', 'themestudio' ),
			   'param_name' => 'custom_links',
			   'description' => __( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'themestudio' ),
			   'dependency' => array(
			    'element' => 'onclick',
			    'value' => array( 'custom_link' )
			   )
			  ),
			  array(
			   'type' => 'textfield',
			   'heading' => __( 'Extra class name', 'themestudio' ),
			   'param_name' => 'el_class',
			   'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themestudio' )
			  )
	 )
	) );
//******************************************************************************************************/
// Compare Table
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Compare Table', 'themestudio' ),
	 'base' => 'ts_pricing_hosting',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(			  
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Heading Pricing",'themestudio'),
			    "param_name" => "heading_hosting",
			    "value" => 'Single CPU, Multiple Cores (Intel Xeon E3)',
			    "description" => __("Add Heading Pricing for element",'themestudio')
      		),      		
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title Pricing",'themestudio'),
			    "param_name" => "content_title",
			    "value" => 'CPU|RAM|HARD DRIVER|BANDWIDTH|PRICE',
			    "description" => __("Add Heading Pricing for element",'themestudio')
      		),
      		array(
	          	"type" => "textarea_html",
	          	"holder" => "div",
	          	"class" => "",
	          	"heading" => __("Content",'themestudio'),
	          	"param_name" => "content",
	          	"value" => __("Xeon E3-1240 v34|Cores x 3.4 GHz|8GBDDR3|1TB|100TB|$99|mo|GET STARTED|#",'themestudio'),
	          	"description" => __("Add content",'themestudio')
	      		),

	)));
//******************************************************************************************************/
// Contact hotline 			
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Contact Hotline', 'themestudio' ),
	 'base' => 'ts_contact_hotline',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(	
	 		$add_css_awesome,
	 		array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Color icon","themestudio"),
	        "param_name" => "color_icon",
	        "value" => '#fd4326', //Default color	        
	        "description" => __("Choose color for icon.","themestudio")
	        ),		  
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title Contact",'themestudio'),
			    "param_name" => "title_contact",
			    "value" => 'Support',
			    "description" => __("Add Title for element",'themestudio')
      		),      		      		
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Number phone",'themestudio'),
			    "param_name" => "phone_contact",
			    "value" => '',
			    "description" => __("Add Number phone  for element.eg :(888) 755-7585.",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Email",'themestudio'),
			    "param_name" => "text_email_contact",
			    "value" => '',
			    "description" => __("Add Email for element,eg : support@alaska.com.",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text link support",'themestudio'),
			    "param_name" => "text_contact",
			    "value" => '',
			    "description" => __("Add text link for element. eg:Click to chat",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Url support",'themestudio'),
			    "param_name" => "url_contact",
			    "value" => '#',
			    "description" => __("Add  url for element",'themestudio')
      		),

	)));
//******************************************************************************************************/
// Contact Information					
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Contact Information', 'themestudio' ),
	 'base' => 'ts_contact_infomation',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(		 				 
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title Contact",'themestudio'),
			    "param_name" => "title_contact",
			    "value" => 'Head Office',
			    "description" => __("Add Title for element",'themestudio')
      		),      		      		
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Address info",'themestudio'),
			    "param_name" => "address_contact",
			    "value" => '30 South Park Avenue, CA 94108 San Francisco USA',
			    "description" => __("Add text link for element",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Email",'themestudio'),
			    "param_name" => "text_email_contact",
			    "value" => 'support@alaska.com',
			    "description" => __("Add Email for element",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Number phone",'themestudio'),
			    "param_name" => "phone_contact",
			    "value" => '(888) 755-7585',
			    "description" => __("Add Number phone  for element",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Number fax",'themestudio'),
			    "param_name" => "fax_contact",
			    "value" => '(888) 755-7585',
			    "description" => __("Add  Number fax url for element",'themestudio')
      		),
      		$add_css_style,

	)));
//******************************************************************************************************/
// Content Box
//******************************************************************************************************/

vc_map( array(
   "name" => __("Content Box", 'themestudio'),   
   "base" => "ts_box_border",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(     		   		
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title ",'themestudio'),
			    "param_name" => "title_box",
			    "value" => "",
			    "description" => __("Add title for element",'themestudio')
	     	 ),
   		array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" =>'Compellingly transform plug-and-play expertise whereas efficient platforms. Authoritatively communicate quality sources vis-a-vis standards compliant partnerships.',
              "description" => __("content",'themestudio')
          ),
        array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Class name",'themestudio'),
			    "param_name" => "el_class",
			    "value" => "",
			    "description" => __("Add class name for element",'themestudio')
	     	 ), 
   		$add_css_style,
   	)
) );
//******************************************************************************************************/
// Countdown Shortcode
//******************************************************************************************************/

vc_map( array(
   "name" => __("Countdown Shortcode", 'themestudio'),   
   "base" => "ts_countdown",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(     		
   		
	    array(
				'type' => 'dropdown',
				'heading' => __( 'Layout display', 'themestudio' ),
				'param_name' => 'countdown_style',
				'value' => array(
				__( 'Countdown style 1', 'themestudio' ) => 'countdownstyle1',
				__( 'Countdown style 2', 'themestudio' ) => 'countdownstyle2',			    						   
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ), 	    		
	    array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Datetime",'themestudio'),
			    "param_name" => "date_countdown",
			    "value" => "2016/01/01|00/00/00",
			    "description" => __("Add date for element.Eg:YYYY/MM/DD|h/i/s",'themestudio')
	     	 ), 
	    array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Class name",'themestudio'),
			    "param_name" => "el_class",
			    "value" => "",
			    "description" => __("Add class name for element",'themestudio')
	     	 ), 	 	    			    	    		    
	    $add_css_style, 	  	    		

   	)
) );
//******************************************************************************************************/
// Data Table
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Data Table', 'themestudio' ),
	 'base' => 'ts_table_data',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(			  
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title box",'themestudio'),
			    "param_name" => "title_box",
			    "value" => 'Table data',
			    "description" => __("Add Title box for element",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Column table",'themestudio'),
			    "param_name" => "number_column",
			    "value" => '4',
			    "description" => __("Enter column table.",'themestudio')
      		),      		
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title table",'themestudio'),
			    "param_name" => "content_title",
			    "value" => 'Invoice #|Invoice Date|Due Date|Total',
			    "description" => __("Add Heading Pricing for element",'themestudio')
      		),
      		array(
	          	"type" => "textarea_html",
	          	"holder" => "div",
	          	"class" => "",
	          	"heading" => __("Content",'themestudio'),
	          	"param_name" => "content",
	          	"value" => __("8|11/08/2014|11/08/2014|$10.99 USD",'themestudio'),
	          	"description" => __("Add content",'themestudio')
	      		),

	)));
//******************************************************************************************************/
// Themestudio Domain box price
//******************************************************************************************************/		  
vc_map( array(
	 'name' => __( 'Domain Price Box', 'themestudio' ),
	 'base' => 'ts_domain_box_price',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(	
	 		array(
				'type' => 'dropdown',
				'heading' => __( 'Layout display', 'themestudio' ),
				'param_name' => 'choose_style_display',
				'value' => array(
				__( 'Display Text', 'themestudio' ) => 'text',
				__( 'Display Image', 'themestudio' ) => 'image',			    						   
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ),		  							
	     	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Name Domain",'themestudio'),
			    "param_name" => "name_domain",
			    "value" => __(".net",'themestudio'),
			    'dependency' => array(
					'element' => 'choose_style_display',
					'value' => array( 'text' )
				),
			    "description" => __("Add domain name for element. eg : .net,.org,.co,.com....",'themestudio')
	     	 ),
	     	array(
	            "type" => "attach_image",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Image domain","themestudio"),
	            "param_name" => "domain_img",
	            "value" => '',
	            'dependency' => array(
					'element' => 'choose_style_display',
					'value' => array( 'image' )
				),
	            "description" => __("Upload image domain","themestudio")
        	),
        	array(
				'type' => 'dropdown',
				'heading' => __( 'Postion text or image', 'themestudio' ),
				'param_name' => 'text_align',
				'value' => array(
					__( 'Right', 'themestudio' ) => 'right',
					__( 'Center', 'themestudio' ) => 'center',			    						   
					__( 'Left', 'themestudio' ) => 'left',			    						   
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ),
	     	array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Choose color price","themestudio"),
		        "param_name" => "price_color",
		        "value" => '',
		        "description" => __("Choose color diplay for price.","themestudio"),
	        ),
	        array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Choose color border","themestudio"),
		        "param_name" => "color_border_price",
		        "value" => '',
		        "description" => __("Choose color border diplay for price box.","themestudio"),
	        ),  
	     	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Price Domain",'themestudio'),
			    "param_name" => "price_domain",
			    "value" => __("$3.99",'themestudio'),
			    "description" => __("Add price domain for element",'themestudio')
	     	 ),    
	)));
//******************************************************************************************************/
// Expand/Colapse Content
//******************************************************************************************************/

vc_map( array(
   "name" => __("Expand/Collapse Content", 'themestudio'),   
   "base" => "ts_readmore",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(     		   		
   		array(
				'type' => 'dropdown',
				'heading' => __( 'Show/hide readmore', 'themestudio' ),
				'param_name' => 'ts_choose_showmore',
				'value' => array(
				__( 'show', 'themestudio' ) => 'show',
				__( 'Hide', 'themestudio' ) => 'hide',			    						   				
				),			   
				'description' => __( 'Choose show/hide readmore.', 'themestudio' )
			  ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text showmore",'themestudio'),
			    "param_name" => "ts_showmore",
			    "value" => "Expand",
			    'dependency' => array(
					'element' => 'ts_choose_showmore',
					'value' => array( 'show' )
				),
			    "description" => __("Add text showmore for element",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text hide",'themestudio'),
			    "param_name" => "ts_hiden",
			    "value" => "Collapse",
			    'dependency' => array(
					'element' => 'ts_choose_showmore',
					'value' => array( 'show' )
				),
			    "description" => __("Add text hide for element",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Height content",'themestudio'),
			    "param_name" => "ts_maxheight",
			    "value" => "80",
			    'dependency' => array(
					'element' => 'ts_choose_showmore',
					'value' => array( 'show' )
				),
			    "description" => __("Add Height for content.Eg:80,100,120...",'themestudio')
	     	 ),
	    array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" =>'Compellingly transform plug-and-play expertise whereas efficient platforms. Authoritatively communicate quality sources vis-a-vis standards compliant partnerships.',
              "description" => __("content",'themestudio')
          ),	    			    	    		    
	    $add_css_style, 	  	    		

   	)
) );
//******************************************************************************************************/
// Social Full icon
//******************************************************************************************************/
vc_map( array(
   "name" => __("Expand/Collapse Button", 'themestudio'),   
   "description" => "Display button view full icon",
   "base" => "ts_social_full",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(     		   		
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text button",'themestudio'),
			    "param_name" => "text_button_view",
			    "value" => "View Full Icon",			   
			    "description" => __("Add text for button view full icon",'themestudio')
	     	 ),
   	)
) );
//******************************************************************************************************/
// Feature  
//******************************************************************************************************/
	vc_map( array(
	"name" => __("Feature Content",'themestudio'),
    "base" => "ts_feature",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array(
    		array(
				'type' => 'dropdown',
				'heading' => __( 'Layout Feature', 'themestudio' ),
				'param_name' => 'feature_tyle',
				'value' => array(											
					__( 'Layout style 1', 'themestudio' ) => 'style1',				
					__( 'Layout style 2', 'themestudio' ) => 'style2',									
				),
				'description' => __( 'Choose Layout Feature item', 'themestudio' )
			), 
    	$add_css_awesome,    	
    	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color icon","themestudio"),
	        "param_name" => "color_icon",
	        "value" => '#fd4326',
	        "description" => __("Choose color for icon","themestudio"),
	        
	        ),
	    array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color border icon","themestudio"),
	        "param_name" => "color_border_icon",
	        "value" => '#fd4326',
	        'dependency' => array(
				'element' => 'feature_tyle',
				'value' => array( 'style2' )
			),
	        "description" => __("Choose color border icon","themestudio"),
	        
	        ),       
     	array(
			'type' => 'dropdown',
			'heading' => __( 'Postion Feature item', 'themestudio' ),
			'param_name' => 'position_feature',
			'value' => array(								
				__( 'Left', 'themestudio' ) => 'left',				
				__( 'Right', 'themestudio' ) => 'right'
			),
			'dependency' => array(
				'element' => 'feature_tyle',
				'value' => array( 'style1','style2' )
			),
			'description' => __( 'Choose Postion Feature item', 'themestudio' )
			),
      	array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Title Feature item",'themestudio'),
		    "param_name" => "title_feature",
		    "value" => '',
		    "description" => __("Add Feature item for element",'themestudio')
      		),
      	array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Url for title",'themestudio'),
		    "param_name" => "link_title",
		    "value" => '#',
		    "description" => __("Add link feature box for element",'themestudio')
      		),
      	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color title","themestudio"),
	        "param_name" => "color_title",
	        "value" => '#fd4326',
	        "description" => __("Choose color for title","themestudio"),
	        
	        ), 
      	array(
          	"type" => "textarea_html",
          	"holder" => "div",
          	"class" => "",
          	"heading" => __("Content",'themestudio'),
          	"param_name" => "content",
          	"value" => __("<p>Globally evolve e-business niches with best-of-breed technology. Monotonectally iterate backend infomediaries for excellent manufactured products. Dramatically disseminate</p>",'themestudio'),
          	"description" => __("Add content",'themestudio')
      		),
     
      )));	
//******************************************************************************************************/
// FunFact
//******************************************************************************************************/
	vc_map( array(
	"name" => __("Funfact Shortcode",'themestudio'),
    "base" => "ts_funfact",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array( 
    $add_css_awesome,
    array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color icon","themestudio"),
	        "param_name" => "color_icon",
	        "value" => '#fd4326',
	        "description" => __("Choose color for icon","themestudio"),	        
	        ),
	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color border","themestudio"),
	        "param_name" => "color_border",
	        "value" => '#fd4326',
	        "description" => __("Choose color for border","themestudio"),	        
	        ),
	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color Text","themestudio"),
	        "param_name" => "color_text",
	        "value" => '$fd4326',
	        "description" => __("Choose color for Text","themestudio"),	        
	        ),                   
    array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Number Funfact",'themestudio'),
		    "param_name" => "number_funfact",
		    "value" => __("7854",'themestudio'),
		    "description" => __("Add number funfact on for element",'themestudio')
      ),
    array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Unit funfact",'themestudio'),
		    "param_name" => "unit_funfact",
		    "value" => '',
		    "description" => __("Add Unit funfact for element",'themestudio')
      ),
    array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Name Funfact",'themestudio'),
		    "param_name" => "name_funfact",
		    "value" => __("Data Transferred",'themestudio'),
		    "description" => __("Add Name Funfacr for element",'themestudio')
      ), 
      )));
//******************************************************************************************************/
// FunFact 2
//******************************************************************************************************/
	vc_map( array(
	"name" => __("ALASKA Funfact style 2",'themestudio'),
    "base" => "ts_funfact_style2",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array(     
    array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Number Funfact",'themestudio'),
		    "param_name" => "number_funfact",
		    "value" => __("7854",'themestudio'),
		    "description" => __("Add number funfact on for element",'themestudio')
      ),
    array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Unit funfact",'themestudio'),
		    "param_name" => "unit_funfact",
		    "value" => '',
		    "description" => __("Add Unit funfact for element",'themestudio')
      ),
    array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color Number","themestudio"),
	        "param_name" => "color_number",
	        "value" => '#fd4326',
	        "description" => __("Choose color for number","themestudio"),	        
	        ),
    array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Name Funfact",'themestudio'),
		    "param_name" => "name_funfact",
		    "value" => __("Data Transferred",'themestudio'),
		    "description" => __("Add Name Funfacr for element",'themestudio')
      ),
	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color title","themestudio"),
	        "param_name" => "color_title",
	        "value" => '#252525',
	        "description" => __("Choose color for title","themestudio"),	        
	        ),
	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color Text","themestudio"),
	        "param_name" => "color_text",
	        "value" => '#737373',
	        "description" => __("Choose color for Text","themestudio"),	        
	        ),                   
    array(
          	"type" => "textarea_html",
          	"holder" => "div",
          	"class" => "",
          	"heading" => __("Content",'themestudio'),
          	"param_name" => "content",
          	"value" => __("Compellingly transform plug-and-play expertise whereas.Authoritatively communicate quality sources vis-a-vis standards compliant.",'themestudio'),
          	"description" => __("Add content",'themestudio')
    		 ),   
      )));
//******************************************************************************************************/
// Google MAP
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Google MAP', 'themestudio' ),
	 'base' => 'themestudio_map_shortcode',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(	 					 
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Title map', 'themestudio' ),
				   'param_name' => 'title_map_title',
				   'value' => 'Themestudio',
				   'description' => __( 'Title for map info', 'themestudio' )
			 	),
			  array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Choose color map","themestudio"),
		        "param_name" => "colormap",
		        "value" => '#fd4326',
		        "description" => __("Choose color for map","themestudio"),	        
	        	),			  	
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Address', 'themestudio' ),
				   'param_name' => 'address',
				   'value' => 'Ngõ 176 Z115, Tân Thịnh, tp. Thái Nguyên, Thái Nguyên, Việt Nam',
				   'description' => __( 'Address for map info', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Latitude', 'themestudio' ),
				   'param_name' => 'lat',
				   'value' => '21.582668',
				   'description' => __( 'get lat long coordinates from an address <a href="http://www.latlong.net/convert-address-to-lat-long.html">click here</a>', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Longitude', 'themestudio' ),
				   'param_name' => 'long',
				   'value' => '105.807298',
				   'description' => __( 'get lat long coordinates from an address <a href="http://www.latlong.net/convert-address-to-lat-long.html">click here</a>', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Phone', 'themestudio' ),
				   'param_name' => 'title_map_phone',
				   'value' => '+84 (0) 1753 456789',
				   'description' => __( 'Phone for map info', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Email', 'themestudio' ),
				   'param_name' => 'title_map_email',
				   'value' => 'themestudio@gmail.com',
				   'description' => __( 'Phone for map info', 'themestudio' )
			  ),
			  	array(
				   'type' => 'textfield',
				   'heading' => __( 'Website', 'themestudio' ),
				   'param_name' => 'title_map_website',
				   'value' => 'themestudio.net',
				   'description' => __( 'Website for map info', 'themestudio' )
			  ),
			  array(
				   'type' => 'textfield',
				   'heading' => __( 'Add class', 'themestudio' ),
				   'param_name' => 'css_class',
				   'value' => '',
				   'description' => __( 'Add class for Block element', 'themestudio' )
			  ),
			  			  
	 )
	) );
//******************************************************************************************************/
// lasted blog
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Latest Posts', 'themestudio' ),
	 'base' => 'ts_lasted_blog',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(			  
			  array(
			   'type' => 'textfield',
			   'heading' => __( 'Number post display', 'themestudio' ),
			   'param_name' => 'number_post',
			   'value' => '',			   
			   'description' => __( 'Choose number posts display.', 'themestudio' )
			  ),
			  array(
			   'type' => 'textfield',
			   'heading' => __( 'Class min-height', 'themestudio' ),
			   'param_name' => 'minheight_blog_item',
			   'value'=>'495px',
			   'description' =>__('Class min-height for box','themestudio'),
			  )
	)));
//******************************************************************************************************/
// List Icons			ts_size_awesome	
//******************************************************************************************************/
vc_map( array(
   "name" => __("List Icons", 'themestudio'),   
   "base" => "ts_social_include",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(     		   		
   		array(
				'type' => 'dropdown',
				'heading' => __( 'Choose style social', 'themestudio' ),
				'param_name' => 'ts_choose_style_social',
				'value' => array(
				__( 'Style 1', 'themestudio' ) => 'style1',
				__( 'Style 2', 'themestudio' ) => 'style2',			    						   				
				__( 'Style 3', 'themestudio' ) => 'style3',			    						   				
				),			   
				'description' => __( 'Choose style for social.', 'themestudio' )
			  ),
		array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose color awesome","themestudio"),
	        "param_name" => "ts_color_awesome",
	        "value" => '#333333',
	        'dependency' => array(
					'element' => 'ts_choose_style_social',
					'value' => array( 'style1')
				),
	        "description" => __("Choose color for Awesome","themestudio"),	        
	        ),
	    array(
				'type' => 'dropdown',
				'heading' => __( 'Choose size social', 'themestudio' ),
				'param_name' => 'ts_size_awesome',
				'value' => array(
				__( 'fa-1x', 'themestudio' ) => 'fa-1x',
				__( 'fa-2x', 'themestudio' ) => 'fa-2x',			    						   				
				__( 'fa-3x', 'themestudio' ) => 'fa-3x',			    						   				
				__( 'fa-4x', 'themestudio' ) => 'fa-4x',			    						   				
				__( 'fa-5x', 'themestudio' ) => 'fa-5x',			    						   				
				),	
				'dependency' => array(
					'element' => 'ts_choose_style_social',
					'value' => array( 'style1')
				),		   
				'description' => __( 'Choose style for social.', 'themestudio' )
			  ),    	     		   	
	    array(
	         "type" => "textarea",
	         "class" => "",
	         "admin_label" => true,
	         "heading" => __("Font icon", 'themestudio'),
	         "param_name" => "ts_font_awesome",
	         "value" => "fa-facebook|fa_vine",
	         'dependency' => array(
					'element' => 'ts_choose_style_social',
					'value' => array( 'style1')
				),
	         "description" => __("Input graph values here. Divide values with linebreaks (Enter). Example: fa-facebook|fa_vine.", 'themestudio')
	      ),       		
   		array(
	         "type" => "textarea",
	         "class" => "",
	         "admin_label" => true,
	         "heading" => __("Icon and Tooltip", 'themestudio'),
	         "param_name" => "ts_tooltip_awesome",
	         "value" => "",
	         'dependency' => array(
					'element' => 'ts_choose_style_social',
					'value' => array( 'style2','style3')
				),
	         "description" => __("Input graph values here. Divide values with linebreaks (Enter). Example: Style 2: fa-facebook|Facebook. Style 3: fa-facebook|Facebook|#242424.", 'themestudio')
	      ),       		
   		

   	)
) );   
//******************************************************************************************************/
// List images 
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'List Images', 'themestudio' ),
	 'base' => 'ts_list_images',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(			  
			  array(
			   'type' => 'attach_images',
			   'heading' => __( 'Images', 'themestudio' ),
			   'param_name' => 'images',
			   'value' => '',
			   'description' => __( 'Select images from media library.', 'themestudio' )
			  ),			  
			  array(
			   'type' => 'dropdown',
			   'heading' => __( 'On click', 'themestudio' ),
			   'param_name' => 'onclick',
			   'value' => array(
			    __( 'Open prettyPhoto', 'themestudio' ) => 'link_image',
			    __( 'Do nothing', 'themestudio' ) => 'link_no',
			    __( 'Open custom link', 'themestudio' ) => 'custom_link'
			   ),
			   'description' => __( 'What to do when slide is clicked?', 'themestudio' )
			  ),
			  array(
			   'type' => 'exploded_textarea',
			   'heading' => __( 'Custom links', 'themestudio' ),
			   'param_name' => 'custom_links',
			   'description' => __( 'Enter links for each slide here. Divide links with linebreaks (Enter) . ', 'themestudio' ),
			   'dependency' => array(
			    'element' => 'onclick',
			    'value' => array( 'custom_link' )
			   )
			  ),
			  array(
			   'type' => 'textfield',
			   'heading' => __( 'Extra class name', 'themestudio' ),
			   'param_name' => 'el_class',
			   'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'themestudio' )
			  )
	 )
	) );
//******************************************************************************************************/
// List style 
//******************************************************************************************************/
vc_map( array(
   "name" => __("List Style", 'themestudio'),   
   "description" => "Display style list",
   "base" => "ts_list_style",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array( 
   		array(
				'type' => 'dropdown',
				'heading' => __( 'Choose style list', 'themestudio' ),
				'param_name' => 'choose_list_style',
				'value' => array(
				__( 'Default', 'themestudio' ) => 'default',
				__( 'Orderlist', 'themestudio' ) => 'orderlist',
				__( 'Style icon', 'themestudio' ) => 'icon',			    						   								
				__( 'Inline list', 'themestudio' ) => 'inline-style',			    						   								
				__( 'Unstyled list', 'themestudio' ) => 'unstyle',			    						   								
				),			   
				'description' => __( 'Choose style for social.', 'themestudio' )
			  ),
		array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Color icon","themestudio"),
	        "param_name" => "color_icon",
	        "value" => '#737373', //Default color
	        'dependency' => array(
					'element' => 'choose_list_style',
					'value' => array( 'default','icon')
				),	        	        		  
	        "description" => __("Choose color for icon.","themestudio")
	        ),	      		   		
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title list",'themestudio'),
			    "param_name" => "list_title",
			    "value" => "Custom list with icons",
			    'dependency' => array(
					'element' => 'choose_list_style',
					'value' => array( 'default','icon')
				),			   
			    "description" => __("Add title for list style",'themestudio')
	     	 ),
   		array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" =>'',
              "description" => __("Add content for list style.<br /> Default:1|Nam aliquet massa id gravida venenatis.|(url).<br /> Style icon:fa-facebook|Nam aliquet massa id gravida venenatis.|(url).<br />Unstyled:Nam aliquet massa id gravida venenatis.|(url).<br />
              						Inline list: add content <ul> <li> of editor.",'themestudio')
          ),
   	)
) );
//******************************************************************************************************/
// Messega box
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Notification Box', 'themestudio' ),
	 'base' => 'ts_notifications',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(
	 		array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Choose style Notification boxes or no boxes",'themestudio'),
					"param_name" => "choose_style_message_box",
					'value' => array(
					__( 'No boxes', 'themestudio' ) => 'no_boxed',
					__( 'Boxed', 'themestudio' ) => 'boxed',				  								 
					),
					'description' =>"Choose style Notification boxes or no boxes"					
		      ),
	 		array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Choose color",'themestudio'),
					"param_name" => "ts_color_title_message",
					'value' => array(
					__( 'No Color', 'themestudio' ) => 'no',
					__( 'Yes color', 'themestudio' ) => 'yes',				  								 
					),
					'dependency' => array(
							'element' => 'choose_style_message_box',
							'value' => array( 'boxed')
						),
					'description' =>"Choose color for title Notification boxes."					
		      ),
	 		array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Title box",'themestudio'),
              "param_name" => "ts_title_message",
              "value" => "Success..   Everything is good!",
              "description" => __("Add title for box.",'themestudio')
          ),
	 		array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __("Choose styles message box",'themestudio'),
					"param_name" => "choose_style_message",
					'value' => array(
					__( 'Info', 'themestudio' ) => 'info',
					__( 'Warning', 'themestudio' ) => 'warning',				  
					__( 'Success', 'themestudio' ) => 'success',				  
					__( 'Error', 'themestudio' ) => 'error',				  
					),
					'description' =>""					
		      ),
		    array(
		              "type" => "textarea_html",
		              "holder" => "div",
		              "class" => "",
		              "heading" => __("Message content",'themestudio'),
		              "param_name" => "content",
		              "value" => 'Credibly promote cross-platform internal or "organic" sources whereas real-time functionalities. Appropriately communicate leading-edge e-commerce and standardized best practices. Phosfluorescently empower error-free web services for fully researched internal or "organic" sources. ',
		              'dependency' => array(
							'element' => 'choose_style_message_box',
							'value' => array( 'boxed')
						),
		              "description" => __("Add text message for Block element",'themestudio')
	          ),		 					
)));

//******************************************************************************************************/
// Portfolio Shortcode
//******************************************************************************************************/
$portfolio_term = array();
     $portfolio_terms  =  get_terms("portfolio_cats"); 
        foreach( $portfolio_terms as $portfolio_cat ){        	
            $portfolio_term[$portfolio_cat->name] = $portfolio_cat->term_id;
	}

	vc_map( array(
	      "name" => __("Portfolio Shortcode",'themestudio'),
	      "base" => "ts_portfolio",
	      "class" => "",
	      "category" => __('ALASKA Blocks','themestudio'),
	      "params" => array(
	            		
      		array(
	            "type" => "dropdown",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Show/hide portfolio filter","themestudio"),
	            "param_name" => "portfolio_filter_switch",
	            'value' => array(
					__( 'Show filter', 'themestudio' ) => 'show-filter',
					__( 'Hide filter', 'themestudio' ) => 'hide-filter'
				),
		    ),		    
			array(
			'type' => 'checkbox',
			'heading' => __( 'Categories display', 'themestudio' ),
			'param_name' => 'portfolio_show_categories',
			'value' => $portfolio_term,			
			"description" => __("Add categories portfolio display on page.",'themestudio')
			),
		     
		    array(
	            "type" => "dropdown",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Choose portfolio container","themestudio"),
	            "param_name" => "portfolio_container",
	            'value' => array(
					__( 'Yes', 'themestudio' ) => 'yes',
					__( 'No', 'themestudio' ) => 'no'
				),
		    ),
		    array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Number portfolio per page ",'themestudio'),
              "param_name" => "posts_per_page",
              "value" => "12",
              "description" => __("Number portfolio per page ",'themestudio')
          ),		
		array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Portfolio item width",'themestudio'),
              "param_name" => "portfolio_item_width",
              "value" => "275",
              "description" => __("This option set width for portfolio item.Enter value width.",'themestudio')
          ),
		    array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Portfolio item height",'themestudio'),
              "param_name" => "portfolio_item_height",
              "value" => "245",
              "description" => __("This option set height for portfolio item.Enter value height.",'themestudio')
          ),
		array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Custom class",'themestudio'),
              "param_name" => "el_class",
              "value" => "",
              "description" => __("Add custom class for this shortcode block",'themestudio')
          ),    
		    $add_css_style,

	      )
	   ));
//******************************************************************************************************/
// Pricing Table	
//******************************************************************************************************/
	vc_map( array(
	"name" => __("Pricing Table",'themestudio'),
    "base" => "ts_pricing_table",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array(    
      array(
			'type' => 'dropdown',
			'heading' => __( 'Pricing table style ', 'themestudio' ),
			'param_name' => 'pricing_table_style',
			'value' => array(
				__( 'Layout style 1', 'themestudio' ) => 'style1',				
				__( 'Layout style 2', 'themestudio' ) => 'style2',
				__( 'Layout style 3', 'themestudio' ) => 'style3',
				__( 'Layout style 4', 'themestudio' ) => 'style4'
			),
			'description' => __( 'Choose Pricing table layout needed.', 'themestudio' )
		), 
      array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("Image service","themestudio"),
            "param_name" => "image_service",
            "value" => '',
            'dependency' => array(
					'element' => 'pricing_table_style',
					'value' => array( 'style4' )
					),
            "description" => __("Upload image service","themestudio")
        		),
      array(
			'type' => 'textfield',
			'heading' => __( 'font awesome icon class', 'themestudio' ),
			'param_name' => 'css_awesome',
			'admin_label' => true,
			'value' => '',
			'dependency' => array(
					'element' => 'pricing_table_style',
					'value' => array( 'style3' )
					),
			'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a target="__blank" href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
		),  
		array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Pricing Subtitle",'themestudio'),
		    "param_name" => "pricing_subtitle",
		    "value" => __("",'themestudio'),
		    'dependency' => array(
					'element' => 'pricing_table_style',
					'value' => array( 'style3' )
					),
		    "description" => __("Add Pricing Title for element",'themestudio')
      ),    
      array(
			'type' => 'dropdown',
			'heading' => __( 'Choose Active', 'themestudio' ),
			'param_name' => 'class_active',
			'value' => array(
				__( 'No Active', 'themestudio' ) => '',				
				__( 'Active', 'themestudio' ) => 'active'
			),
			'dependency' => array(
					'element' => 'pricing_table_style',
					'value' => array( 'style1','style2','style3' )
					),
			'description' => __( 'Choose active pricing needed.', 'themestudio' )
		),
      	   
       array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Pricing Title",'themestudio'),
		    "param_name" => "pricing_title",
		    "value" => __("Economy",'themestudio'),
		    "description" => __("Add Pricing Title for element",'themestudio')
      ),       
      array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Pricing Price",'themestudio'),
		    "param_name" => "pricing_price",
		    "value" => __("$3.99",'themestudio'),
		    "description" => __("Add Pricing Price for element",'themestudio')
      ),
      array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Pricing Price unit",'themestudio'),
		    "param_name" => "pricing_unit",
		    "value" => __("pm",'themestudio'),
		    "description" => __("Add Pricing Price unit for element",'themestudio')
      ),
      array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Price description",'themestudio'),
		    "param_name" => "price_description",
		    "value" => __("",'themestudio'),
		    'dependency' => array(
					'element' => 'pricing_table_style',
					'value' => array( 'style3' )
					),
		    "description" => __("Add Price description for element",'themestudio')
      ),            
      array(
          	"type" => "textarea_html",
          	"holder" => "div",
          	"class" => "",
          	"heading" => __("Content",'themestudio'),
          	"param_name" => "content",
          	"value" => __("<ul>
								<li>500 GB Disk Space</li>
								<li>100 Databases List</li>
								<li>Free Domain Registration</li>
								<li>1 Hosting Space</li>
								<li>FREE Ad Coupons</li>
							</ul>",'themestudio'),
          	"description" => __("Add content",'themestudio')
      ),
      array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Pricing Link Button",'themestudio'),
		    "param_name" => "pricing_link_button",
		    "value" => __("#",'themestudio'),
		    "description" => __("Add Pricing Link Button for element",'themestudio')
      ),
      array(
		    "type" => "textfield",
		    "holder" => "div",
		    "class" => "",
		    "heading" => __("Pricing Text Button",'themestudio'),
		    "param_name" => "pricing_text_button",
		    "value" => __("GET STARTED",'themestudio'),
		    "description" => __("Add Pricing Text Button for element",'themestudio')
      ),       
    )));
//******************************************************************************************************/
// Process bar
//******************************************************************************************************/
vc_map( array(
   "name" => __("Process Bar", 'themestudio'),   
   "base" => "ts_process_bar",   
   "class" => "",   
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(     		
   		
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title skill ",'themestudio'),
			    "param_name" => "title_skill",
			    "value" => __("Energistically evolve","themestudio"),
			    "description" => __("Add title for element",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Number skill ",'themestudio'),
			    "param_name" => "number_skill",
			    "value" => "75",
			    "description" => __("Add number for element",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Unit skill ",'themestudio'),
			    "param_name" => "unit_skill",
			    "value" => "%",
			    "description" => __("Add unit for element. Eg:%",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Fontsize skill ",'themestudio'),
			    "param_name" => "fontsize_skill",
			    "value" => "30",
			    "description" => __("Add fontsize for element. Eg:%",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Dimension skill ",'themestudio'),
			    "param_name" => "dimension_skill",
			    "value" => "127",
			    "description" => __("Add Dimension for element. Eg:255",'themestudio')
	     	 ),
   		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Width skill ",'themestudio'),
			    "param_name" => "width_skill",
			    "value" => "5",
			    "description" => __("Add Dimension for element. Eg:255",'themestudio')
	     	 ),
   		array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Skill bar background color","themestudio"),
		        "param_name" => "bgcolor_skill",
		        "value" => '#f3f3f3', //Default color
		        "description" => __("Choose color for skill bar background","themestudio")
	        ), 
	 	array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Percent bar background color","themestudio"),
		        "param_name" => "color_skill",
		        "value" => '#fd4326', //Default color
		        "description" => __("Choose color for percent bar","themestudio")
	        ),
   		array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Skill title color","themestudio"),
		        "param_name" => "color_title_skill",
		        "value" => '#252525', //Default color
		        "description" => __("Choose color for Title bar ","themestudio")
	        ),
	 	array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Skill text color","themestudio"),
		        "param_name" => "color_text_skill",
		        "value" => '#737373', //Default color
		        "description" => __("Choose color for percent text","themestudio")
	        ),
   		array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" =>'Compellingly transform plug-and-play expertise whereas efficient platforms. Authoritatively communicate quality sources vis-a-vis standards compliant partnerships.',
              "description" => __("content",'themestudio')
          ),
        array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Class name",'themestudio'),
			    "param_name" => "el_class",
			    "value" => "",
			    "description" => __("Add class name for element",'themestudio')
	     	 ),           		
   		$add_css_style,
   	)
) );
//******************************************************************************************************/
// Search Domain
//******************************************************************************************************/
	vc_map( array(
		"name" => __("Search Domain Box",'themestudio'),
	    "base" => "ts_search_domain",
	    "class" => "",
	    "category" => __('ALASKA Blocks','themestudio'),
	    "params" => array(
	    	array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Choose color text","themestudio"),
		        "param_name" => "color_domain_search",
		        "value" => '', //Default color
		        "description" => __("Choose color for text in box search domain","themestudio")
	        ),
	    	array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Choose color border","themestudio"),
		        "param_name" => "color_box_search",
		        "value" => '', //Default color
		        "description" => __("Choose color for border box search domain","themestudio")
	        ),
	        array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Choose color background input","themestudio"),
		        "param_name" => "color_domain_input",
		        "value" => '', //Default color
		        "description" => __("Choose color background for  box search domain","themestudio")
	        ),
	       
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Search Domain - Text Placehoder ",'themestudio'),
			    "param_name" => "text_placeholder",
			    "value" => __("Enter your Domain Name here...",'themestudio'),
			    "description" => __("Search Domain - Text Placehoder ",'themestudio')
	     	 ),
			array(
	          	"type" => "textarea",
	          	"holder" => "div",
	          	"class" => "",
	          	"heading" => __("Value Search ",'themestudio'),
	          	"param_name" => "select_option_search",
	          	"value" => "",
	          	"description" => __("Enter value Search <br/>	          							
	          						     eg:com|whois.verisign-grs.com,org|whois.pir.org,co|whois.nic.co",'themestudio')
	      	),
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text button Search",'themestudio'),
			    "param_name" => "search_text_button",
			    "value" => __("Search",'themestudio'),
			    "description" => __(" Text button Search",'themestudio')
	     	 ),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Choose link to whmcs', 'themestudio' ),
				'param_name' => 'link_to_whmcs',
				'value' => array(
					__( 'WHMCS BRIDGE', 'themestudio' ) => '1',				
					__( 'WHMCS', 'themestudio' ) => '0'
				),
				'description' => __( 'Link to WHMCS by whmcs-bridge plugin.', 'themestudio' )
			),
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Link Action Search",'themestudio'),
			    "param_name" => "search_link_button",
			    "value" => __("",'themestudio'),
			    "description" => __("Link actice button search",'themestudio')
	     	 ),			
			$add_css_style,
	    	)
	    ));
//******************************************************************************************************/
// Section/ Block title 
//******************************************************************************************************/

	vc_map( array(
	"name" => __("Section/Block Title",'themestudio'),
    "base" => "themestudio_title",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array(
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Title",'themestudio'),
              "param_name" => "title",
              "value" => "",
              "description" => __("Enter section title ",'themestudio')
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("font-size for title",'themestudio'),
              "param_name" => "fontsize_title",
              "value" => "30",
              "description" => __("Enter value font-size for title.",'themestudio')
          ),
  		 array(
				'type' => 'dropdown',
				'heading' => __( 'Align title', 'themestudio' ),
				'param_name' => 'align_title',
				'value' => array(											
					__( 'Center', 'themestudio' ) => 'text-center',				
					__( 'Left', 'themestudio' ) => 'text-left',				
					__( 'Right', 'themestudio' ) => 'text-right'
				),
				'description' => __( 'Choose Postion Title/Section', 'themestudio' )
			),
	 	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Title color","themestudio"),
	        "param_name" => "title_color",
	        "value" => '#252525', //Default color
	        "description" => __("Choose color for title","themestudio")
	        ), 
	 	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Description color","themestudio"),
	        "param_name" => "des_color",
	        "value" => '#737373', //Default color
	        "description" => __("Choose color for Description","themestudio")
	        ), 
	    array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" =>'',
              "description" => __("Subtitle content",'themestudio')
          ), 
	    $add_css_style,
    )
	));


//******************************************************************************************************/
// Our Service
//******************************************************************************************************/
	vc_map( array(
	"name" => __("Service Icon ",'themestudio'),
    "base" => "ts_our_service",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array(
	    	array(
			'type' => 'textfield',
			'heading' => __( 'font awesome icon class', 'themestudio' ),
			'param_name' => 'css_awesome',
			'admin_label' => true,
			'value' => '',
			'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a target="__blank" href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
		),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Title",'themestudio'),
              "param_name" => "ts_service_title",
              "value" => "Backups Available",
              "description" => __("Enter service title ",'themestudio')
          ),
        array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" => __("Compellingly transform plug-and-play expertise whereas efficient platforms. Authoritatively communicate quality sources vis-a-vis standards compliant partnerships.",'themestudio'),
              "description" => __("Service content",'themestudio')
          ),
        array(
				'type' => 'dropdown',
				'heading' => __( 'Show readmore', 'themestudio' ),
				'param_name' => 'choose_readmore',
				'value' => array(
					__( 'Show', 'themestudio' ) => '1',				
					__( 'Hide', 'themestudio' ) => '0'
				),
				'description' => __( 'Choose show/hide readmore.', 'themestudio' )
			),        
		array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Text service url",'themestudio'),
              "param_name" => "ts_service_text_link",
              "value" => "Read more",
              "description" => __("Enter Service readmore text ",'themestudio')
          ),
		array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Link service url",'themestudio'),
              "param_name" => "ts_service_url",
              "value" => "#",
              "description" => __("Enter readmore link ",'themestudio')
          ),


        )));
//******************************************************************************************************/
// Service Image
//******************************************************************************************************/		  
vc_map( array(
	 'name' => __( 'Service Image', 'themestudio' ),
	 'base' => 'ts_our_service_style3',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(
	 		
			array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("Image service","themestudio"),
            "param_name" => "image_service",
            "value" => '',       
            "description" => __("Upload image service","themestudio")
        		),														
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Url Service",'themestudio'),
			    "param_name" => "url_image_service",
			    "value" => '#',
			    "description" => __("Add link to service for element.",'themestudio'
			)
      		), array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title service item",'themestudio'),
			    "param_name" => "ts_service_title",
			    "value" => 'Brand & Indentity',
			    "description" => __("Add title service item for element",'themestudio')
      		),      		
	      	array(
	          	"type" => "textarea_html",
	          	"holder" => "div",
	          	"class" => "",
	          	"heading" => __("Content",'themestudio'),
	          	"param_name" => "content",
	          	"value" => __("Rapidiously architect performance based platforms before performance based customer service. Assertively seize ubiquitous functionalities via emerging manufactured products.Rapidiously architect performance based platforms before performance based customer service. Assertively seize ubiquitous functionalities via emerging manufactured products.",'themestudio'),
	          	"description" => __("Add content",'themestudio')
	      		), 
	      	$add_css_style,	 
	)));

//******************************************************************************************************/
// Our Service Style 2 
//******************************************************************************************************/
	vc_map( array(
	 'name' => __( 'Service Simple', 'themestudio' ),
	 'base' => 'ts_our_service_style2',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(			  
			array(
				'type' => 'dropdown',
				'heading' => __( 'Layout display', 'themestudio' ),
				'param_name' => 'ts_service_style',
				'value' => array(
				__( 'Layout style 1', 'themestudio' ) => 'style1',
				__( 'Layout style tab', 'themestudio' ) => 'style2',			    
				__( 'Layout style 3', 'themestudio' ) => 'style3',			    
				__( 'Layout style 4', 'themestudio' ) => 'style4',			    
				__( 'Layout style 5', 'themestudio' ) => 'style5',			    
				__( 'Layout style 6', 'themestudio' ) => 'style6',			    
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Choose icon or image', 'themestudio' ),
				'param_name' => 'ts_choose_image',
				'value' => array(
				__( 'Icon', 'themestudio' ) => 'icon',			    				
				__( 'Image', 'themestudio' ) => 'image',
				),
				'dependency' => array(
					'element' => 'ts_service_style',
					'value' => array('style4')
				),			   
				'description' => __( 'Choose style display.Note:You should choose icon or image.', 'themestudio' )
			  ),
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Url Service",'themestudio'),
			    "param_name" => "url_image_service",
			    "value" => '#',			   			    
			    "description" => __("Add link to service for element.",'themestudio')
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'font awesome icon class', 'themestudio' ),
				'param_name' => 'css_awesome',
				'admin_label' => true,
				'value' => '',
				'dependency' => array(
					'element' => 'ts_service_style',
					'value' => array('style1','style2','style3','style4','style5','style6'),
				),				
				'description' => __( 'Note:You should choose icon or image.Enter font icon awesome .eg: fa-facebook... . <a target="__blank" href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
			),
			array(
	            "type" => "attach_image",
	            "holder" => "div",
	            "class" => "",	            
	            "heading" => __("Image service","themestudio"),
	            "param_name" => "image_service",
	            "value" => '',
	            'dependency' => array(
					'element' => 'ts_service_style',
					'value' => array('style4')
				),
				'dependency' => array(
					'element' => 'ts_choose_image',
					'value' => 'image',
				),
	            "description" => __("Upload image service.Note:You should choose icon or image.","themestudio")
        	),
			array(
		        "type" => "colorpicker",
		        "holder" => "div",
		        "class" => "",
		        "heading" => __("Choose color icon","themestudio"),
		        "param_name" => "ts_color_icon",
		        "value" => '#fd4326',
		        "description" => __("Choose color for icon","themestudio"),
		        'dependency' => array(
					'element' => 'ts_service_style',
					'value' => array( 'style3','style4','style5','style6' )
					),
		       
	        ),
			array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Choose border color icon","themestudio"),
	        "param_name" => "ts_border_color_icon",
	        "value" => '#fd4326',
	        "description" => __("Choose border color for icon","themestudio"),
	        'dependency' => array(
				'element' => 'ts_service_style',
				'value' => array( 'style4' )
				),
	      
	        ),
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title service item",'themestudio'),
			    "param_name" => "ts_service_title",
			    "value" => 'System Admin',
			    "description" => __("Add title service item for element",'themestudio')
      		),
	      	array(
	          	"type" => "textarea_html",
	          	"holder" => "div",
	          	"class" => "",
	          	"heading" => __("Content",'themestudio'),
	          	"param_name" => "content",
	          	"value" => __("Compellingly transform plug-and-play expertise whereas efficient platforms. Authoritatively communicate ",'themestudio'),
	          	"description" => __("Add content",'themestudio')
	      		),  
	)));	
//******************************************************************************************************/
// Skill Bars
//******************************************************************************************************/
vc_map( array(
   "name" => __("Skill Bar", 'themestudio'),
   "base" => "ts_skillbar_shortcode",   
   "description" => "Display your skills with style",
   "icon" => "icon-progress-bar",
   "class" => "skillbar_extended",
   "category" => __("ALASKA Blocks", 'themestudio'),
   "params" => array(   
   		array(
				'type' => 'dropdown',
				'heading' => __( 'Layout display', 'themestudio' ),
				'param_name' => 'skill_bar_style',
				'value' => array(
				__( 'Skillbar style 1', 'themestudio' ) => 'skillbarstyle1',
				__( 'Skillbar style 2', 'themestudio' ) => 'skillbarstyle2',			    						   
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ),
   			
	    array(
	         "type" => "exploded_textarea",
	         "class" => "",
	         "admin_label" => true,
	         "heading" => __("Graphic values", 'themestudio'),
	         "param_name" => "values",
	         "value" => "90|Development",
	         "description" => __("Input graph values here. Divide values with linebreaks (Enter). Example: 90|Development.", 'themestudio')
	      ),
	    array(
	         "type" => "textfield",
	         "holder" => "div",
	         "class" => "",
	         "admin_label" => true,
	         "heading" => __("Units", 'themestudio'),
	         "param_name" => "units",
	         "value" => "%",
	         "description" => __("Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.", 'themestudio')
	      ),
	 	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Skill bar background color","themestudio"),
	        "param_name" => "skillbar_background_color",
	        "value" => '#f3f3f3', //Default color
	        "description" => __("Choose color for skill bar background","themestudio")
	        ), 
	 	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Percent bar background color","themestudio"),
	        "param_name" => "percentbar_background_color",
	        "value" => '#fd4326', //Default color
	        "description" => __("Choose color for percent bar","themestudio")
	        ),
	 	array(
	        "type" => "colorpicker",
	        "holder" => "div",
	        "class" => "",
	        "heading" => __("Skill bar text color","themestudio"),
	        "param_name" => "skill_bar_text_color",
	        "value" => '#ffffff', //Default color
	        "description" => __("Choose color for percent text","themestudio")
	        ),
	    array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Skill bar description",'themestudio'),
              "param_name" => "content",
              "value" => "",
              'dependency' => array(
					'element' => 'skill_bar_style',
					'value' => array( 'skillbarstyle1' )
				),              
          ),          
 		$add_css_style,
   	)
) );
//******************************************************************************************************/
// Themestudio special offer
//******************************************************************************************************/		  
vc_map( array(
	 'name' => __( 'Special Offer', 'themestudio' ),
	 'base' => 'ts_special_offer',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(	
	 		array(
				'type' => 'dropdown',
				'heading' => __( 'Layout display', 'themestudio' ),
				'param_name' => 'choose_style_special',
				'value' => array(
				__( 'Special style 1', 'themestudio' ) => 'style1',
				__( 'Special style 2', 'themestudio' ) => 'style2',			    						   
				),			   
				'description' => __( 'Choose Layout display.', 'themestudio' )
			  ),	 
	     	 array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("Image special","themestudio"),
            "param_name" => "background_special",
            "value" => '',
            "description" => __("Upload image special","themestudio")
        		),			
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title special item",'themestudio'),
			    "param_name" => "title_special",
			    "value" => 'Host for your website',
			    "description" => __("Add title special item for element",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Description special item",'themestudio'),
			    "param_name" => "description_special",
			    "value" => 'Makings of this first generator on internet',
			    'dependency' => array(
					'element' => 'choose_style_special',
					'value' => array( 'style1' )
				),
			    "description" => __("Add title special item for element",'themestudio')
      		),
	      	array(
	          	"type" => "textarea_html",
	          	"holder" => "div",
	          	"class" => "",
	          	"heading" => __("Content",'themestudio'),
	          	"param_name" => "content",
	          	"value" =>'',
	          	"description" => __("Add content",'themestudio')
	      		),    
	     	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Price special item",'themestudio'),
			    "param_name" => "price_special",
			    "value" => '$4.99',
			    "description" => __("Add price special item for element. $4.99 per month, 30% discount",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Unit special item",'themestudio'),
			    "param_name" => "unit_special",
			    "value" => 'per month',
			    "description" => __("Add unit special item for element. Eg : per month, discount",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Link special item",'themestudio'),
			    "param_name" => "more_special_url",
			    "value" => '#',
			    "description" => __("Add url special item for element",'themestudio')
      		),
      		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Description special item",'themestudio'),
			    "param_name" => "more_special_text",
			    "value" => 'Learn more',
			    "description" => __("Add text for element",'themestudio')
      		),  
	)));
//******************************************************************************************************/
// Team Member
//******************************************************************************************************/
 vc_map( array(
   		"name" => __("Team Member",'themestudio'),
        "base" => "ts_team_member",
        "class" => "",
        "category" => __('ALASKA Blocks','themestudio'),
        "params" => array(
        array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style team', 'themestudio' ),
					'param_name' => 'choose_style_team',
					'value' => array(
					__( 'Style 1', 'themestudio' ) => 'style1',
					__( 'Style 2', 'themestudio' ) => 'style2',			    						   				
					),			   
					'description' => __( 'Choose style for Team member.', 'themestudio' )
				  ),	        	
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => __("Member's avatar","themestudio"),
            "param_name" => "bg_member",
            "value" => '',
            "description" => __("Upload member's avatar","themestudio")
        		),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's name",'themestudio'),
              "param_name" => "name_member",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's postion",'themestudio'),
              "param_name" => "member_postion",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's twitter url",'themestudio'),
              "param_name" => "fa_tiwtter",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's behance url",'themestudio'),
              "param_name" => "fa_behance",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's dribble url",'themestudio'),
              "param_name" => "fa_dribble",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's facebook url",'themestudio'),
              "param_name" => "fa_facebook",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's youtube url",'themestudio'),
              "param_name" => "fa_youtube",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's google url",'themestudio'),
              "param_name" => "fa_google",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's tumblr url",'themestudio'),
              "param_name" => "fa_tumblr",
              "value" => "",
              "description" => ""
          ),
        array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Member's vine url",'themestudio'),
              "param_name" => "fa_vine",
              "value" => "",
              "description" => ""
          ),       
        array(
              "type" => "textarea_html",
              "holder" => "div",
              "class" => "",
              "heading" => __("Content",'themestudio'),
              "param_name" => "content",
              "value" =>'',
               'dependency' => array(
					'element' => 'choose_style_team',
					'value' => array( 'style1' )
				),
              "description" => __("Story member content",'themestudio')
          ),        
          $add_css_style,
        )
   	));

//******************************************************************************************************/
// Testimonial
//******************************************************************************************************/
vc_map( array(
	"name" => __("Testimonial Shortcode",'themestudio'),
    "base" => "ts_testimonials",
    "class" => "",
    "category" => __('ALASKA Blocks','themestudio'),
    "params" => array(      	
      	array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Post Number",'themestudio'),
			"param_name" => "number_post_testimonial",
			"value" => __("3",'themestudio'),
			"description" => __("Number post display in testimonial",'themestudio')
      ),
      	array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Autoplay",'themestudio'),
			"param_name" => "speed_slide",
			"value" => __("4",'themestudio'),
			"description" => __("Enter value autoplay for slide. ",'themestudio')
      	),
      array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Layout style",'themestudio'),
			"param_name" => "style_testimonial",
			"value" => array( 'Layout style 1' => "style1",
							  'Layout style 2' => "style2",							  
								 ),
			"description" => __("Layout Display testimonial",'themestudio')
      ),
      array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => __("Style testimonial",'themestudio'),
			"param_name" => "style_text_testimonial",
			"value" => array( 'Light' => "light",
							  'Dark' => "dark",							  
								 ),
			'dependency' => array(
					'element' => 'style_testimonial',
					'value' => array( 'style2')
					),
			"description" => __("Layout Display testimonial",'themestudio')
      ),
      array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => __("Class name",'themestudio'),
			"param_name" => "el_class",
			"value" =>'',
			"description" => __("Add class name for element",'themestudio')
      ),	  
      )));
//******************************************************************************************************/
// Text Dropcap
//******************************************************************************************************/
vc_map( array(
	      "name" => __("Text Dropcap",'themestudio'),
	      "base" => "ts_text_dropcap",
	      "class" => "",
	      "category" => __('ALASKA Blocks','themestudio'),
	      "params" => array(
		      	array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style dropcap', 'themestudio' ),
					'param_name' => 'choose_style_dropcap',
					'value' => array(
					__( 'Style 1', 'themestudio' ) => 'style1',
					__( 'Style 2', 'themestudio' ) => 'style2',			    						   				
					),			   
					'description' => __( 'Choose style for dropcap.', 'themestudio' )
				  ),
      		 	array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __("First Text",'themestudio'),
					"param_name" => "first_text",
					"value" => "",
					"description" => __("First text dropcap",'themestudio')
		          ),
      		 	array(
		            "type" => "colorpicker",
			        "holder" => "div",
		            "class" => "",
		            "heading" => __("Background color first text dropcap","themestudio"),
		            "param_name" => "background_color_fisttext",
		            "value" => '#42454a', //Default color
		            'dependency' => array(
					'element' => 'choose_style_dropcap',
					'value' => array( 'style1')
					),
		            "description" => __("Background color first text dropcap","themestudio")
		        ),
		        array(
		            "type" => "colorpicker",
			        "holder" => "div",
		            "class" => "",
		            "heading" => __("Color first text dropcap","themestudio"),
		            "param_name" => "color_fisttext",
		            "value" => '#ffffff', //Default color		             
		            "description" => __("Color first text dropcap","themestudio")
		        ),
	      		 array(
					"type" => "textarea_html",
					"holder" => "div",
					"class" => "",
					"heading" => __("Content Text",'themestudio'),
					"param_name" => "content",
					"value" => "",
					"description" => __("Add content text drop cap",'themestudio')
		        ),
	      		
	      )
	   ));
//******************************************************************************************************/
// Themestudio Twitter
//******************************************************************************************************/		  
vc_map( array(
	 'name' => __( 'Twitter Shortcode', 'themestudio' ),
	 'base' => 'ts_twitter',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(			  				
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Number tweets",'themestudio'),
			    "param_name" => "number_tweet",
			    "value" => '4',
			    "description" => __("Enter number tweets for element",'themestudio')
	     	 ),  
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Class name",'themestudio'),
			    "param_name" => "el_class",
			    "value" => '',
			    "description" => __("Add class name for element",'themestudio')
	     	 ),     
	)));
//******************************************************************************************************/
// Divider Shortcode							
//******************************************************************************************************/		  
vc_map( array(
	 'name' => __( 'Divider Shortcode', 'themestudio' ),
	 'base' => 'ts_divider_shortcode',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(	
	 		array(
					'type' => 'dropdown',
					'heading' => __( 'Choose style divider', 'themestudio' ),
					'param_name' => 'choose_style_divider',
					'value' => array(
					__( 'Style 1', 'themestudio' ) => 'style1',
					__( 'Style 2', 'themestudio' ) => 'style2',			    						   				
					),			   
					'description' => __( 'Choose style for divider.', 'themestudio' )
				  ),	 		
			array(
					'type' => 'dropdown',
					'heading' => __( 'Choose width divider', 'themestudio' ),
					'param_name' => 'width_divider',
					'value' => array(
						__( 'Full width', 'themestudio' ) => '',
						__( 'Divider medium', 'themestudio' ) => 'divider-md',			    						   				
						__( 'Divider small', 'themestudio' ) => 'divider-sm',			    						   				
						),			   
					'description' => __( 'Choose width for divider.', 'themestudio' )
				  ),				  	 	
			array(
					'type' => 'dropdown',
					'heading' => __( 'Choose Style Text or Icon', 'themestudio' ),
					'param_name' => 'choose_icon_text',
					'value' => array(
					__( 'Divider text', 'themestudio' ) => 'text',
					__( 'Divider icon', 'themestudio' ) => 'icon',			    						   				
					),
					'dependency' => array(
					'element' => 'choose_style_divider',
					'value' => array( 'style2')
					),			   
					'description' => __( 'Choose style for divider display .', 'themestudio' )
				  ),	  		  				
			array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text divider",'themestudio'),
			    "param_name" => "title_divider",
			    "value" => 'Your text',
			    'dependency' => array(
					'element' => 'choose_icon_text',
					'value' => array( 'text')
					),
			    "description" => __("Add text for divider",'themestudio')
	     	 ),
	     	array(
	            "type" => "colorpicker",
		        "holder" => "div",
	            "class" => "",
	            "heading" => __("Color divider","themestudio"),
	            "param_name" => "color_divider",
	            "value" => '#ccc', //Default color
	            'dependency' => array(
					'element' => 'choose_style_divider',
					'value' => array( 'style2')
					),		             
	            "description" => __("Select color for divider","themestudio")
		        ),   
			array(			    			   
				'type' => 'textfield',
				"heading" => __("Icon divider",'themestudio'),
				"class" => "",
				"param_name" => "icon_divider",		
				'value' => '',
				'dependency' => array(
					'element' => 'choose_icon_text',
					'value' => array( 'icon')
					),
				'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
	     	 ),
			array(
					'type' => 'dropdown',
					'heading' => __( 'Choose divider parallel', 'themestudio' ),
					'param_name' => 'divider_style',
					'value' => array(
					__( 'One divider', 'themestudio' ) => '',
					__( 'Parallel lines', 'themestudio' ) => 'divider-2',			    						   												    						   			
					),
					'dependency' => array(
					'element' => 'choose_style_divider',
					'value' => array( 'style1')
					),			   
					'description' => __( 'Choose for divider.', 'themestudio' )
				  ),	     	       
	)));
//******************************************************************************************************/
// Pricing Table New							
//******************************************************************************************************/		  
vc_map( array(
	 'name' => __( 'Pricing Table(New)', 'themestudio' ),
	 'base' => 'ts_pricing_table_new',
	 "class" => "",
	 "category" => __('ALASKA Blocks','themestudio'),
	 'params' => array(
	 		array(
				'type' => 'dropdown',
				'heading' => __( 'Choose Number plan display', 'themestudio' ),
				'param_name' => 'choose_column',
				'value' => array(
					__( 'Two plan', 'themestudio' ) => '3',
					__( 'Three plan', 'themestudio' ) => '4',			    						   				
					__( 'Four plan', 'themestudio' ) => '5',			    						   				
				),						  
				'description' => __( 'Choose number plan display .', 'themestudio' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Choose style plan display', 'themestudio' ),
				'param_name' => 'choose_border',
				'value' => array(
					__( 'No border', 'themestudio' ) => 'no',
					__( 'Yes border', 'themestudio' ) => 'yes',			    						   											    						   			
				),						  
				'description' => __( 'Choose style plan display .', 'themestudio' )
			),	
	 	 		
	 		array(
		         "type" => "textarea",
		         "class" => "",
		         "admin_label" => true,
		         "heading" => __("Pricing Content", 'themestudio'),
		         "param_name" => "ts_pricing_content",
		         "value" => "Linux Web Hosting includes|Number of Websites,1,1,5,10
		         				Cloud hosting platform,Y,Y,N,Y",	         
		         "description" => __("Input graph values here. Divide values with linebreaks (Enter). <br />
		         						Example: Linux Web Hosting includes|Number of Websites,1,1,5,9 <br />
		         								 Cloud hosting platform,Y,Y,Y,N", 'themestudio')
	      	), 
	 		array(
	            "type" => "attach_image",
	            "holder" => "div",
	            "class" => "",
	            "heading" => __("Image pricing","themestudio"),
	            "param_name" => "img_pricing",
	            "value" => '',	            
	            "description" => __("Upload image pricing","themestudio")
        	),

	// Plan 1			
			array(			    			   
				'type' => 'textfield',
				"heading" => __("Icon Pricing",'themestudio'),
				"class" => "",
				"param_name" => "icon_prcing_1",		
				'value' => '',
				'group' => __( 'Plan one', 'themestudio' ),
				'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
	     	 ), 	
	 		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title pricing plan one",'themestudio'),
			    "param_name" => "title_pricing_1",			    
			    'group' => __( 'Plan one', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	 		array(
	            "type" => "colorpicker",
		        "holder" => "div",
	            "class" => "",
	            "heading" => __("Color border plan 1","themestudio"),
	            "param_name" => "color_border_1",
	            "value" => '', //Default color
	            'dependency' => array(
					'element' => 'choose_border',
					'value' => array( 'yes')
					),
				'group' => __( 'Plan one', 'themestudio' ),			             
	            "description" => __("Select color for plan 1","themestudio")
		        ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Price",'themestudio'),
			    "param_name" => "price_1",			    
			    'group' => __( 'Plan one', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("pence",'themestudio'),
			    "param_name" => "pence_pricing_1",			    
			    'group' => __( 'Plan one', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),    
	     	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Unit",'themestudio'),
			    "param_name" => "unit_pricing_1",			    
			    'group' => __( 'Plan one', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
			    "type" => "textarea",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("VAT prompt",'themestudio'),
			    "param_name" => "vatprompt",			    
			    'group' => __( 'Plan one', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textarea",
		         "class" => "",
		         "admin_label" => true,
		         "heading" => __("Description plan one", 'themestudio'),
		         "param_name" => "des_plan_one_1",
		         "value" => "",	 
		         'group' => __( 'Plan one', 'themestudio' ),        
		         "description" => __("Input description values here", 'themestudio')
	      	),
	      	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text button",'themestudio'),
			    "param_name" => "button_pricing_1",			    
			    'group' => __( 'Plan one', 'themestudio' ),
			    "description" => __("Enter text button for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textfield",
		         "class" => "",		         
		         "heading" => __("Link button", 'themestudio'),
		         "param_name" => "link_pricing_1",
		         "value" => "",	 
		         'group' => __( 'Plan one', 'themestudio' ),        
		         "description" => __("Input link pricing one values here", 'themestudio')
	      	), 
	// Plan 2 		
			array(			    			   
				'type' => 'textfield',
				"heading" => __("Icon Pricing",'themestudio'),
				"class" => "",
				"param_name" => "icon_prcing_2",		
				'value' => '',
				'group' => __( 'Plan Two', 'themestudio' ),
				'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
	     	 ), 	
	 		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title pricing plan one",'themestudio'),
			    "param_name" => "title_pricing_2",			    
			    'group' => __( 'Plan Two', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	 		array(
	            "type" => "colorpicker",
		        "holder" => "div",
	            "class" => "",
	            "heading" => __("Color border plan 2","themestudio"),
	            "param_name" => "color_border_2",
	            "value" => '', //Default color
	            'dependency' => array(
					'element' => 'choose_border',
					'value' => array( 'yes')
					),
				'group' => __( 'Plan Two', 'themestudio' ),			             
	            "description" => __("Select color for plan 2","themestudio")
		        ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Price",'themestudio'),
			    "param_name" => "price_2",			    
			    'group' => __( 'Plan Two', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("pence",'themestudio'),
			    "param_name" => "pence_pricing_2",			    
			    'group' => __( 'Plan Two', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),    
	     	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Unit",'themestudio'),
			    "param_name" => "unit_pricing_2",			    
			    'group' => __( 'Plan Two', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
			    "type" => "textarea",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("VAT prompt",'themestudio'),
			    "param_name" => "vatprompt_2",			    
			    'group' => __( 'Plan Two', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textarea",
		         "class" => "",
		         "admin_label" => true,
		         "heading" => __("Description plan one", 'themestudio'),
		         "param_name" => "des_plan_one_2",
		         "value" => "",	 
		         'group' => __( 'Plan Two', 'themestudio' ),        
		         "description" => __("Input description values here", 'themestudio')
	      	),
	      	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text button",'themestudio'),
			    "param_name" => "button_pricing_2",			    
			    'group' => __( 'Plan Two', 'themestudio' ),
			    "description" => __("Enter text button for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textfield",
		         "class" => "",		         
		         "heading" => __("Link button", 'themestudio'),
		         "param_name" => "link_pricing_2",
		         "value" => "",	 
		         'group' => __( 'Plan Two', 'themestudio' ),        
		         "description" => __("Input link pricing one values here", 'themestudio')
	      	), 
	// Plan 3     	  
			array(			    			   
				'type' => 'textfield',
				"heading" => __("Icon Pricing",'themestudio'),
				"class" => "",
				"param_name" => "icon_prcing_3",		
				'value' => '',
				'group' => __( 'Plan Three', 'themestudio' ),
				'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
	     	 ), 	
	 		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title pricing plan one",'themestudio'),
			    "param_name" => "title_pricing_3",			    
			    'group' => __( 'Plan Three', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	 		array(
	            "type" => "colorpicker",
		        "holder" => "div",
	            "class" => "",
	            "heading" => __("Color border plan 3","themestudio"),
	            "param_name" => "color_border_3",
	            "value" => '', //Default color
	            'dependency' => array(
					'element' => 'choose_border',
					'value' => array( 'yes')
					),
				'group' => __( 'Plan Three', 'themestudio' ),			             
	            "description" => __("Select color for plan 3","themestudio")
		        ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Price",'themestudio'),
			    "param_name" => "price_3",			    
			    'group' => __( 'Plan Three', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("pence",'themestudio'),
			    "param_name" => "pence_pricing_3",			    
			    'group' => __( 'Plan Three', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),    
	     	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Unit",'themestudio'),
			    "param_name" => "unit_pricing_3",			    
			    'group' => __( 'Plan Three', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
			    "type" => "textarea",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("VAT prompt",'themestudio'),
			    "param_name" => "vatprompt_3",			    
			    'group' => __( 'Plan Three', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textarea",
		         "class" => "",
		         "admin_label" => true,
		         "heading" => __("Description plan one", 'themestudio'),
		         "param_name" => "des_plan_one_3",
		         "value" => "",	 
		         'group' => __( 'Plan Three', 'themestudio' ),        
		         "description" => __("Input description values here", 'themestudio')
	      	),
	      	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text button",'themestudio'),
			    "param_name" => "button_pricing_3",			    
			    'group' => __( 'Plan Three', 'themestudio' ),
			    "description" => __("Enter text button for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textfield",
		         "class" => "",		         
		         "heading" => __("Link button", 'themestudio'),
		         "param_name" => "link_pricing_3",
		         "value" => "",	 
		         'group' => __( 'Plan Three', 'themestudio' ),        
		         "description" => __("Input link pricing one values here", 'themestudio')
	      	),  	
	// Plan 4     	  
			array(			    			   
				'type' => 'textfield',
				"heading" => __("Icon Pricing",'themestudio'),
				"class" => "",
				"param_name" => "icon_prcing_4",		
				'value' => '',
				'group' => __( 'Plan Four', 'themestudio' ),
				'description' => __( 'Enter font icon awesome .eg: fa-facebook... . <a href="http://fortawesome.github.io/Font-Awesome/icons/">click here.</a>', 'themestudio' ),
	     	 ), 	
	 		array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Title pricing plan one",'themestudio'),
			    "param_name" => "title_pricing_4",			    
			    'group' => __( 'Plan Four', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	 		array(
	            "type" => "colorpicker",
		        "holder" => "div",
	            "class" => "",
	            "heading" => __("Color border plan 4","themestudio"),
	            "param_name" => "color_border_4",
	            "value" => '', //Default color
	            'dependency' => array(
					'element' => 'choose_border',
					'value' => array( 'yes')
					),		             
	            'group' => __( 'Plan Four', 'themestudio' ),
	            "description" => __("Select color for plan 4","themestudio")
		        ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Price",'themestudio'),
			    "param_name" => "price_4",			    
			    'group' => __( 'Plan Four', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	 array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("pence",'themestudio'),
			    "param_name" => "pence_pricing_4",			    
			    'group' => __( 'Plan Four', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),    
	     	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Unit",'themestudio'),
			    "param_name" => "unit_pricing_4",			    
			    'group' => __( 'Plan Four', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
			    "type" => "textarea",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("VAT prompt",'themestudio'),
			    "param_name" => "vatprompt_4",			    
			    'group' => __( 'Plan Four', 'themestudio' ),
			    "description" => __("Enter Value for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textarea",
		         "class" => "",
		         "admin_label" => true,
		         "heading" => __("Description plan one", 'themestudio'),
		         "param_name" => "des_plan_one_4",
		         "value" => "",	 
		         'group' => __( 'Plan Four', 'themestudio' ),        
		         "description" => __("Input description values here", 'themestudio')
	      	),
	      	array(
			    "type" => "textfield",
			    "holder" => "div",
			    "class" => "",
			    "heading" => __("Text button",'themestudio'),
			    "param_name" => "button_pricing_4",			    
			    'group' => __( 'Plan Four', 'themestudio' ),
			    "description" => __("Enter text button for element",'themestudio')
	     	 ),
	     	array(
		         "type" => "textfield",
		         "class" => "",		         
		         "heading" => __("Link button", 'themestudio'),
		         "param_name" => "link_pricing_4",
		         "value" => "",	 
		         'group' => __( 'Plan Four', 'themestudio' ),        
		         "description" => __("Input link pricing one values here", 'themestudio')
	      	),       	
	 )));
	}
}
?>