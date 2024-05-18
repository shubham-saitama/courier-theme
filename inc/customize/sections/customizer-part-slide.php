<?php
$wp_customize->add_section('vw_courier_serivce_pro_slider_sec', array(
	'title' => __('Banner Slider', 'vw-courier-serivce-pro'),
	'description' => __('Add Slider setting here.', 'vw-courier-serivce-pro'),
	'panel' => 'vw_courier_serivce_pro_panel_id',
)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_enabledisable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_enabledisable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial('vw_courier_serivce_pro_slider_enabledisable', array(
	'selector' => '#slider .container',
	'render_callback' => 'vw_courier_serivce_pro_slider_sec',
)
);
$wp_customize->add_setting('vw_courier_serivce_pro_slider_bgcolor', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color'
)
);
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_courier_serivce_pro_slider_bgcolor', array(
	'label' => __('Background Color', 'vw-courier-serivce-pro'),
	'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'settings' => 'vw_courier_serivce_pro_slider_bgcolor',
)
));
$wp_customize->add_setting('vw_courier_serivce_pro_slider_bgimage', array(
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
)
);
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'vw_courier_serivce_pro_slider_bgimage', array(
	'label' => __('Background image ', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'settings' => 'vw_courier_serivce_pro_slider_bgimage'
)
));

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_image_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_slider_image_settings',
		array(
			'label' => __('Slider Images Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_slider_sec'
		)
	)
);
$wp_customize->add_setting('vw_courier_serivce_pro_slide_number',array(
	'default'	=> '',
	'sanitize_callback'	=> 'sanitize_text_field',
));
$wp_customize->add_control('vw_courier_serivce_pro_slide_number',array(
	'label'	=> __('Number of slides to show','vw-courier-serivce-pro'),
	'section'	=> 'vw_courier_serivce_pro_slider_sec',
	'type'		=> 'number'
));

$count =  get_theme_mod('vw_courier_serivce_pro_slide_number');
		
	for($i=1, $j=1; $i<=$count; $i++, $j++) {
		
		$wp_customize->add_setting('vw_courier_serivce_pro_slide_image'.$i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'vw_courier_serivce_pro_slide_image'.$i,
	        array(
	            'label' => __('Slider Image ','vw-courier-serivce-pro').$i.__(' (1600x562)','vw-courier-serivce-pro'),
				'description' => __('Ideal image is 1920x1080 px.', 'vw-courier-serivce-pro'),
	            'section' => 'vw_courier_serivce_pro_slider_sec',
	            'settings' => 'vw_courier_serivce_pro_slide_image'.$i
		)));
	}


$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_slider_heading_settings',
		array(
			'label' => __('Heading Typoghraphy', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_slider_sec'
		)
	)
);

$wp_customize->add_setting('vw_courier_serivce_pro_banner_tag', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
)
);
$wp_customize->add_control('vw_courier_serivce_pro_banner_tag', array(
	'label' => __('Banner Tag', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'setting' => 'vw_courier_serivce_pro_banner_tag',
	'type' => 'text'
)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_banner_tag_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_banner_tag_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('Banner Tag Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_banner_tag_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_banner_tag_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('Banner Tag Fonts', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_banner_tag_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_banner_tag_font_size',
	array(
		'label' => __('Banner Tag Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'setting' => 'vw_courier_serivce_pro_banner_tag_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_banner_tag_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_banner_tag_color',
		array(
			'label' => __('Banner Tag Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_slider_sec',
			'settings' => 'vw_courier_serivce_pro_banner_tag_color',
		)
	)
);


$wp_customize->add_setting('vw_courier_serivce_pro_slider_heading', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
)
);
$wp_customize->add_control('vw_courier_serivce_pro_slider_heading', array(
	'label' => __('Slider Heading', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'setting' => 'vw_courier_serivce_pro_slider_heading',
	'type' => 'text'
)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('Slider Heading Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('Slider Heading Fonts', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_heading_font_size',
	array(
		'label' => __('Slider Heading Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'setting' => 'vw_courier_serivce_pro_slider_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_slider_heading_color',
		array(
			'label' => __('Slider Heading Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_slider_sec',
			'settings' => 'vw_courier_serivce_pro_slider_heading_color',
		)
	)
);



$wp_customize->add_setting('vw_courier_serivce_pro_slider_text', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
)
);
$wp_customize->add_control('vw_courier_serivce_pro_slider_text', array(
	'label' => __('Slider Text', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'setting' => 'vw_courier_serivce_pro_slider_text',
	'type' => 'text'
)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_text_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_text_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('Slider Text Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_text_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_text_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('Slider Text Fonts', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_text_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_text_font_size',
	array(
		'label' => __('Slider Text Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'setting' => 'vw_courier_serivce_pro_slider_text_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_slider_text_color',
		array(
			'label' => __('Slider Text Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_slider_sec',
			'settings' => 'vw_courier_serivce_pro_slider_text_color',
		)
	)
);

$wp_customize->add_setting('vw_courier_serivce_pro_slider_btntext', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
)
);
$wp_customize->add_control('vw_courier_serivce_pro_slider_btntext', array(
	'label' => __('Button text', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'setting' => 'vw_courier_serivce_pro_slider_btntext',
	'type' => 'text'
)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_btntext_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_btntext_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('slider Button Text Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_btntext_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_btntext_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'label' => __('slider Button Text Fonts', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_btntext_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_slider_btntext_font_size',
	array(
		'label' => __('slider Button Text Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_slider_sec',
		'setting' => 'vw_courier_serivce_pro_slider_btntext_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_slider_btntext_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_slider_btntext_color',
		array(
			'label' => __('slider Button Text Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_slider_sec',
			'settings' => 'vw_courier_serivce_pro_slider_btntext_color',
		)
	)
);

$wp_customize->add_setting('vw_courier_serivce_pro_slider_btn_bgcolor_one', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_hex_color'
)
);
$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_courier_serivce_pro_slider_btn_bgcolor_one', array(
	'label' => __('Button Background Color', 'vw-courier-serivce-pro'),
	'description' => __('Apply both color one and color two to see changes', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'settings' => 'vw_courier_serivce_pro_slider_btn_bgcolor_one',
)
));

$wp_customize->add_setting('vw_courier_serivce_pro_cost_calcuator_shortcode', array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
)
);
$wp_customize->add_control('vw_courier_serivce_pro_cost_calcuator_shortcode', array(
	'label' => __('Banner Form Shortcode', 'vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_slider_sec',
	'setting' => 'vw_courier_serivce_pro_cost_calcuator_shortcode',
	'type' => 'text'
)
);
