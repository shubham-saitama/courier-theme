<?php


/*-----------------Services Section------------------------*/


$wp_customize->add_section(
	'vw_courier_serivce_pro_service_sec',
	array(
		'title' => __('Service Section', 'vw-courier-serivce-pro'),
		'description' => __('Add Service setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_service_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_service_sec',
	array(
		'selector' => '#our-services .container',
		'render_callback' => 'vw_courier_serivce_pro_service_sec',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_bgimage'
		)
	)
);
// $wp_customize->add_setting( 'vw_courier_serivce_pro_our_services_bgimage_setting', array(
//  'default'         => '',
//  'sanitize_callback' => 'vw_automobile_vacation_pro_sanitize_choices'
// ));
// $wp_customize->add_control('vw_courier_serivce_pro_our_services_bgimage_setting', array(
//  'type'      => 'radio',
//  'label'     => __('Choose image option', 'vw-courier-serivce-pro'),
//  'section'   => 'vw_courier_serivce_pro_service_sec',
//  'choices'   => array(
//  'vw-fixed'      => __( 'Fixed', 'vw-courier-serivce-pro' ),
//  'vw-scroll'      => __( 'Scroll', 'vw-courier-serivce-pro' ),
// )));

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_bgimage_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_bgimage_setting',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_service_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_sub_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_sub_heading_settings',
		array(
			'label' => __(' Our services Heading Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_sub_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_sub_heading',
	array(
		'label' => __('Heading Tagline', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_service_sec',
		'setting' => 'vw_courier_serivce_pro_our_services_sub_heading',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_sub_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_sub_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_service_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_sub_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_sub_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_service_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_sub_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_sub_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_service_sec',
		'setting' => 'vw_courier_serivce_pro_our_services_sub_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_sub_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_sub_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_sub_heading_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_heading_settings',
		array(
			'label' => __(' Our services Heading Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_heading',
	array(
		'label' => __('Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_service_sec',
		'setting' => 'vw_courier_serivce_pro_our_services_heading',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_service_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_service_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_service_sec',
		'setting' => 'vw_courier_serivce_pro_our_services_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_heading_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_slide_title_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_slide_title_settings',
		array(
			'label' => __(' Our services Slide Title Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_slide_title_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_slide_title_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_service_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_slide_title_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_slide_title_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_service_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_slide_title_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_services_slide_title_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_service_sec',
		'setting' => 'vw_courier_serivce_pro_our_services_slide_title_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_slide_title_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_slide_title_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_slide_title_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_icon_border_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_icon_border_color',
		array(
			'label' => __('Icon Border Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_icon_border_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_icon_hover_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_icon_hover_color',
		array(
			'label' => __('Icon Hover Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_icon_hover_color',
		)
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_services_card_border_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_services_card_border_color',
		array(
			'label' => __('Service Card Border Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_service_sec',
			'settings' => 'vw_courier_serivce_pro_our_services_card_border_color',
		)
	)
);
/*-----------------------SErvices Section Settings--------------------------*/



/*-------------------------------About Section----------------------------------------*/

$wp_customize->add_section(
	'vw_courier_serivce_pro_about_sec',
	array(
		'title' => __('About Section', 'vw-courier-serivce-pro'),
		'description' => __('Add About setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_about_bgcolor',
	array(
		'selector' => '#about-us .container',
		'render_callback' => 'twentyfifteen_customize_partial_vw_courier_serivce_pro_about_bgcolor',
	)
);
// 	$wp_customize->selective_refresh->add_partial( 'vw_courier_serivce_pro_about_enable', array(
// 		'selector' => '#about-us .container',
// 		'render_callback' => 'vw_courier_serivce_pro_about_sec',
// ));
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_settings',
		array(
			'label' => __('About Section Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_bgimage',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_bgimage'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_bgimage_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_bgimage_setting',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_right_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_right_settings',
		array(
			'label' => __('About Section Right Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_heading_settings',
		array(
			'label' => __('Section Heading Tagline', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_headding_tagline',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_headding_tagline',
	array(
		'label' => __('Heading Tagline', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_headding_tagline',
		'type' => 'text'
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_headding_tagline_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_headding_tagline_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_headding_tagline_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_headding_tagline_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_headding_tagline_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_headding_tagline_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_headding_tagline_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_headding_tagline_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_headding_tagline_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_section_headding_tagline_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);

$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_heading_settings',
		array(
			'label' => __('Section Heading', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_headding',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_headding',
	array(
		'label' => __('Section Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_headding',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_headding_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_section_headding_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_headding_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_section_headding_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_headding_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_section_headding_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_section_headding_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_headding_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_section_headding_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_section_section_headding_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_text_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_text_settings',
		array(
			'label' => __('About Section Text', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_text',
	array(
		'label' => __('Section Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_text',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_text_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_section_text_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_text_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_section_text_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_text_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_section_text_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_section_text_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_section_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_section_text_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_section_section_text_color',
		)
	)
);





$wp_customize->add_setting(
	'vw_courier_serivce_pro_body_section_ct_pallete',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_body_section_ct_pallete',
		array(
			'label' => __('Achivements', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement1',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_achivement1',
	array(
		'label' => __('Our Achivements Title 1', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_achivement1',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement_icon1',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_achivement_icon1',
		array(
			'label' => __('Achivement Icon Image 1', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_achivement_icon1'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement2',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_achivement2',
	array(
		'label' => __('Our Achivements Title 2', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_achivement2',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement_icon2',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_achivement_icon2',
		array(
			'label' => __('Achivement Icon Image 2', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_achivement_icon2'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_achivement_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'vw_courier_serivce_pro_achivement_icon',
		array(
			'settings' => 'vw_courier_serivce_pro_achivement_icon',
			'section' => 'vw_courier_serivce_pro_about_sec',
			'type' => 'icon',
			'label' => esc_html__('Achivement Point Icon', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement_point1',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_achivement_point1',
	array(
		'label' => __('Our Achivements Point', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'w_automobile_pro_about_achivement_point1',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement_point2',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_achivement_point2',
	array(
		'label' => __('Our Achivements Point', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'w_automobile_pro_about_achivement_point2',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement_point_setting',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_achivement_point_setting',
		array(
			'label' => __('Achivement Points Typography Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_achivement_point_sub_text_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_achivement_point_sub_text_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_achivement_point_sub_text_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_achivement_point_sub_text_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_achivement_point_sub_text_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_achivement_point_sub_text_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_achivement_point_sub_text_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_achivement_point_sub_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_achivement_point_sub_text_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_achivement_point_sub_text_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_btn_text_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_btn_text_settings',
		array(
			'label' => __('Button Text Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_btn_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'vw_courier_serivce_pro_about_btn_text',
	array(
		'label' => __('Add Button Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'w_automobile_pro_about_btn_text',
		'type' => 'text'
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_btn_text_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_btn_text_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_btn_text_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_btn_text_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_btn_text_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_btn_text_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_btn_text_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_btn_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_btn_text_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_section_btn_text_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_btn_text_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_btn_text_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_section_btn_text_bgcolor',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_achivement_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);

$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_achivement_settings',
		array(
			'label' => __('Achivement Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_achivement_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_achivement_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_achivement_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_achivement_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_about_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_achivement_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_section_achivement_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_section_achivement_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_section_achivement_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_section_achivement_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_section_achivement_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_left',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_left',
		array(
			'label' => __('About Left Section', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_left_main_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_left_main_image',
		array(
			'label' => __('About Left Main Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_left_main_image'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_left_image_below',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_left_image_below',
		array(
			'label' => __('Image below Main Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_left_image_below'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_left_floating_icon1',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_left_floating_icon1',
		array(
			'label' => __('Floating icon1', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_left_floating_icon1'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_left_floating_icon2',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_about_left_floating_icon2',
		array(
			'label' => __('Floating icon2', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_about_sec',
			'settings' => 'vw_courier_serivce_pro_about_left_floating_icon2'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_years_of_service',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_years_of_service',
	array(
		'label' => __('Add Number Of Years', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'w_automobile_pro_about_years_of_service',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_years_of_service_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_years_of_service_text',
	array(
		'label' => __('Years Text Setting', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_about_sec',
		'setting' => 'vw_courier_serivce_pro_about_years_of_service_text',
		'type' => 'text'
	)
);

// tracking section 



$wp_customize->add_section(
	'vw_courier_serivce_pro_order_tracking_sec',
	array(
		'title' => __('order tracking Section', 'vw-courier-serivce-pro'),
		'description' => __('Add order_tracking setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_order_tracking_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_order_tracking_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_order_tracking_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_order_tracking_bgcolor',
	array(
		'selector' => '#order_tracking-us .container',
		'render_callback' => 'twentyfifteen_customize_partial_vw_courier_serivce_pro_order_tracking_bgcolor',
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_order_tracking_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_order_tracking_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_order_tracking_sec',
			'settings' => 'vw_courier_serivce_pro_order_tracking_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_order_tracking_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_order_tracking_bgimage',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_order_tracking_sec',
			'description' => __('Ideal image is 1920x520 px.', 'vw-courier-serivce-pro'),
			'settings' => 'vw_courier_serivce_pro_order_tracking_bgimage'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_order_tracking_bgimage_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_order_tracking_bgimage_setting',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_order_tracking_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_order_tracking_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_order_tracking_image',
		array(
			'label' => __('Decoration Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_order_tracking_sec',
			'settings' => 'vw_courier_serivce_pro_order_tracking_image'
		)
	)
);


$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_order_tracking_section_heading_settings',
		array(
			'label' => __('Section Heading', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_order_tracking_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_order_tracking_section_headding',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_order_tracking_section_headding',
	array(
		'label' => __('Section Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_order_tracking_sec',
		'setting' => 'vw_courier_serivce_pro_order_tracking_section_headding',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_order_tracking_shortcode',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_order_tracking_shortcode',
	array(
		'label' => __('Tracking Shortcode', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_order_tracking_sec',
		'setting' => 'vw_courier_serivce_pro_order_tracking_shortcode',
		'type' => 'text'
	)
);



$wp_customize->add_section(
	'vw_courier_serivce_pro_steps_sec',
	array(
		'title' => __('Steps Section', 'vw-courier-serivce-pro'),
		'description' => __('Add steps setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_heading_tagline_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_heading_tagline_settings',
		array(
			'label' => __('Steps to Dilever Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_steps_bgcolor',
	array(
		'selector' => '#steps-us .container',
		'render_callback' => 'twentyfifteen_customize_partial_vw_courier_serivce_pro_steps_bgcolor',
	)
);
// 	$wp_customize->selective_refresh->add_partial( 'vw_courier_serivce_pro_steps_enable', array(
// 		'selector' => '#steps-us .container',
// 		'render_callback' => 'vw_courier_serivce_pro_steps_sec',
// ));
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_steps_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_bgimage',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_steps_bgimage'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_bgimage_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_bgimage_setting',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_heading_tagline_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_heading_tagline_settings',
		array(
			'label' => __('Heading Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_heading_tag',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_heading_tag',
	array(
		'label' => __('Section Heading Tagline', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_steps_heading_tag',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_tagline_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_section_heading_tagline_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_tagline_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_section_heading_tagline_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_tagline_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_section_heading_tagline_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_steps_section_heading_tagline_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_tagline_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_section_heading_tagline_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_steps_section_heading_tagline_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_heading_settings',
		array(
			'label' => __('Heading Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_heading',
	array(
		'label' => __('Section Heading ', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_steps_heading',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_section_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_section_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_steps_section_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_steps_section_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_section_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_steps_section_heading_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_title',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_title',
		array(
			'label' => __('Steps Input Fileds', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_step1_title',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step1_title',
	array(
		'label' => __('Step-1 Title', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step1_title',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_text_1',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_text_1',
	array(
		'label' => __('Step-1 Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step_text_1',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step1_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_step1_image',
		array(
			'label' => __('Step-1 Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_step1_image'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_step1_desc',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step1_desc',
	array(
		'label' => __('Step-1 Desription', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step1_desc',
		'type' => 'text'
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_step2_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_step2_image',
		array(
			'label' => __('Step-2 Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_step2_image'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_step2_title',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step2_title',
	array(
		'label' => __('Step-2 Title', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step2_title',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_text_2',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_text_2',
	array(
		'label' => __('Step-2 Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step_text_2',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step2_desc',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step2_desc',
	array(
		'label' => __('Step-2 Desription', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step1_desc',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_step3_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_step3_image',
		array(
			'label' => __('Step-3 Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_step3_image'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_step3_title',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step3_title',
	array(
		'label' => __('Step-3 Title', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step3_title',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_text_3',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_text_3',
	array(
		'label' => __('Step-3 Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step_text_3',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step3_desc',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step3_desc',
	array(
		'label' => __('Step-3 Desription', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step3_desc',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_step4_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_step4_image',
		array(
			'label' => __('Step-4 Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_step4_image'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step4_title',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step4_title',
	array(
		'label' => __('Step-4 Title', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_ste4_title',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_text_4',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_text_4',
	array(
		'label' => __('Step-4 Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step_text_4',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step4_desc',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step4_desc',
	array(
		'label' => __('Step-4  Desription', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step4_desc',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_title_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_step_title_settings',
		array(
			'label' => __('Steps Typography Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_title_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_title_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Title Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_title_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_title_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Title Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_title_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_title_heading_font_size',
	array(
		'label' => __('Title Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step_title_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_title_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_step_title_heading_color',
		array(
			'label' => __('Title Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_step_title_heading_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_desc_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_desc_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Step Description Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_desc_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_desc_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'label' => __('Step Description Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_desc_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_step_desc_heading_font_size',
	array(
		'label' => __('Step Description Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_steps_sec',
		'setting' => 'vw_courier_serivce_pro_step_desc_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_step_desc_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_step_desc_heading_color',
		array(
			'label' => __('Step Description Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_step_desc_heading_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_steps_section_decoration',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_steps_section_decoration',
		array(
			'label' => __('Steps Decoration Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_steps_sec',
			'settings' => 'vw_courier_serivce_pro_steps_section_decoration'
		)
	)
);

// pricing section 

$wp_customize->add_section(
	'vw_courier_serivce_pro_pricing_sec',
	array(
		'title' => __('Pricing Section', 'vw-courier-serivce-pro'),
		'description' => __('Add pricing detials here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_enabledisable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_enabledisable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_degree_sec_bg_color',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_degree_sec_bg_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_degree_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_degree_settings',
		array(
			'label' => __('Heading & Content Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);


$wp_customize->add_section(
	'vw_courier_serivce_pro_pricing_sec',
	array(
		'title' => __('Pricing Section', 'vw-courier-serivce-pro'),
		'description' => __('Add pricing detials here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_enabledisable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_enabledisable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_bg_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_bg_color',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_bg_color',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_bg_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_bg_image',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_bg_image'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_bg_image_attachment',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_bg_image_attachment',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_degree_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_degree_settings',
		array(
			'label' => __('Heading & Content Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_heading_tag_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_heading_tag_settings',
		array(
			'label' => __('Section heading_tag Tag Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_tag',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading_tag',
	array(
		'label' => __('Section heading_tag Tag', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_heading_tag',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_tag_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading_tag_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_tag_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading_tag_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_tag_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading_tag_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_heading_tag_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_tag_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_heading_tag_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_heading_tag_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading',
	array(
		'label' => __('Section Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_heading',
		'type' => 'text'
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_heading_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_paragraph_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_paragraph_settings',
		array(
			'label' => __('Section Paragraph Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_paragraph',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_paragraph',
	array(
		'label' => __('Section Paragraph', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_paragraph',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_section_paragraph_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_section_paragraph_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_section_paragraph_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_section_paragraph_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_section_paragraph_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_section_paragraph_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_section_paragraph_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_section_paragraph_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_section_paragraph_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_section_paragraph_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_points',
		array(
			'label' => __('Pricing Points', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_points_icon',
		array(
			'settings' => 'vw_courier_serivce_pro_pricing_section_points_icon',
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'type' => 'icon',
			'label' => esc_html__('Choose Pricing Points Icon', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points1',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_points1',
	array(
		'label' => __('Pricing point 1', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_points1',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points2',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_points2',
	array(
		'label' => __('Pricing point 2', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_points2',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_package_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_package_settings',
		array(
			'label' => __('Package Card Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_price_currency',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_price_currency',
	array(
		'label' => __('Price Currency', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_pack_price_currency',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_price_currency_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_price_currency_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_price_currency_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_price_currency_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_price_currency_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_price_currency_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_pack_price_currency_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_price_currency_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_pack_price_currency_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_pack_price_currency_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_package_settings1',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_package_settings1',
		array(
			'label' => __('Package Card 1', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_name1',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_name1',
	array(
		'label' => __('Package Name', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_pack_name1',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_price1',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_price1',
	array(
		'label' => __('Package Price', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_pack_price1',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_icon1',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_pack_icon1',
		array(
			'label' => __('Regular Pack Icon Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_pack_icon1'
		)
	)
);

// Regular package feature loop 

$wp_customize->add_setting(
	'vw_courier_serivce_pro_package_features1',
	array(
		'default' => '5',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'vw_courier_serivce_pro_package_features1',
	array(
		'label' => __('Number of features to include', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'type' => 'number'
	)
);

$count = get_theme_mod('vw_courier_serivce_pro_package_features1');

for ($i = 1, $j = 1; $i <= $count; $i++, $j++) {
	$wp_customize->add_setting(
		'vw_courier_serivce_pro_feature' . $i,
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'vw_courier_serivce_pro_feature' . $i,
		array(
			'label' => __('Feature ' . $i, 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'setting' => 'vw_courier_serivce_pro_feature' . $i,
			'type' => 'text'
		)
	);
	$wp_customize->add_setting(
		'vw_courier_serivce_pro_pricing_Feature1_'.$i,
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
			$wp_customize,
			'vw_courier_serivce_pro_pricing_Feature1_'.$i,
			array(
				'settings' => 'vw_courier_serivce_pro_pricing_Feature1_'.$i,
				'section' => 'vw_courier_serivce_pro_pricing_sec',
				'type' => 'icon',
				'label' => esc_html__('Feature ' .$i.' Icon', 'vw-courier-serivce-pro'),
			)
		)
	);
	
}

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_card_btn1_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_card_btn1_text',
	array(
		'label' => __('Button Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_card_btn1_text',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_card_btn1_link',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_card_btn1_link',
	array(
		'label' => __('Button Link', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_card_btn1_link',
		'type' => 'text'
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_package_settings2',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_package_settings2',
		array(
			'label' => __('Package Card 2', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_name2',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_name2',
	array(
		'label' => __('Package Name', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_pack_name2',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_price2',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_pack_price2',
	array(
		'label' => __('Package Price', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_pack_price2',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pack_icon2',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_pack_icon2',
		array(
			'label' => __('Premium Pack Icon Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_pack_icon2'
		)
	)
);

// Premium package feature loop 

$wp_customize->add_setting(
	'vw_courier_serivce_pro_package_features2',
	array(
		'default' => '5',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'vw_courier_serivce_pro_package_features2',
	array(
		'label' => __('Number of features to include', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'type' => 'number'
	)
);

$count2 = get_theme_mod('vw_courier_serivce_pro_package_features2');

for ($i = 1, $j = 1; $i <= $count2; $i++, $j++) {
	$wp_customize->add_setting(
		'vw_courier_serivce_pro_feature_premium' . $i,
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'vw_courier_serivce_pro_feature_premium' . $i,
		array(
			'label' => __('Feature ' . $i, 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'setting' => 'vw_courier_serivce_pro_feature_premium' . $i,
			'type' => 'text'
		)
	);
	$wp_customize->add_setting(
		'vw_courier_serivce_pro_pricing_feature_icon'.$i,
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
			$wp_customize,
			'vw_courier_serivce_pro_pricing_feature_icon'.$i,
			array(
				'settings' => 'vw_courier_serivce_pro_pricing_feature_icon'.$i,
				'section' => 'vw_courier_serivce_pro_pricing_sec',
				'type' => 'icon',
				'label' => esc_html__('Feature ' .$i.' Icon', 'vw-courier-serivce-pro'),
			)
		)
	);
}

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_card_btn2_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_card_btn2_text',
	array(
		'label' => __('Button Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_card_btn2_text',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_card_btn2_link',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_card_btn2_link',
	array(
		'label' => __('Button Link', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_card_btn2_link',
		'type' => 'text'
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_card_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_card_settings',
		array(
			'label' => __('Card Features Typography Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_points_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_points_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_points_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_points_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_points_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_points_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_points_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_card_title_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_card_title_settings',
		array(
			'label' => __('Card Title Typography Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);





$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_package_name_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_package_name_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_package_name_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_package_name_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_package_name_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_package_name_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_package_name_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_package_name_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(

		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_package_name_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_package_name_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_button_text_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_button_text_settings',
		array(
			'label' => __('Button Text Typography Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_button_text_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_button_text_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_button_text_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_button_text_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_button_text_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_pricing_section_button_text_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_pricing_sec',
		'setting' => 'vw_courier_serivce_pro_pricing_section_button_text_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_button_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(

		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_button_text_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_button_text_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_background_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_background_settings',
		array(
			'label' => __('Pricing Card Background Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pointtion_bgimage_regular',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_pointtion_bgimage_regular',
		array(
			'label' => __('Regular Pack BG Color', 'vw-courier-serivce-pro'),
			'description' => __('Add an image atleast 1920x768 px'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_pointtion_bgimage_regular',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_pointtion_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_pointtion_bgimage',
		array(
			'label' => __('Premium Pack BG Color', 'vw-courier-serivce-pro'),
			'description' => __('Add an image atleast 1920x768 px'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_pointtion_bgimage',
		)
	)
);





$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_card_text_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_card_text_settings',
		array(
			'label' => __('Card Text Color Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec'
		)
	)
);



$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_regular_package_name_color',
		array(
			'label' => __('Regular Pack Text Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_regular_package_name_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_button_text_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_package_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_pricing_section_package_text_color',
		array(
			'label' => __('Premium Pack Text Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_pricing_sec',
			'settings' => 'vw_courier_serivce_pro_pricing_section_package_text_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_pricing_section_regular_package_name_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
// pricing section ends 


// why Choose Us Section 

$wp_customize->add_section(
	'vw_courier_serivce_pro_whychooseus_sec',
	array(
		'title' => __('Why Choose Us Section', 'vw-courier-serivce-pro'),
		'description' => __('Add whychooseus detials here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_enabledisable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_enabledisable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_bg_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_bg_color',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_whychooseus_bg_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_bg_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_bg_image',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_whychooseus_bg_image'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_bg_image_attachment',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_bg_image_attachment',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_settings',
		array(
			'label' => __('Video section', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_tag_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_heading_tag_settings',
		array(
			'label' => __('Why Choose Us Heading Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_whychooseus_heading_tag',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_whychooseus_heading_tag',
	array(
		'label' => __('Heading Tagline', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_about_whychooseus_heading_tag',
		'type' => 'text'
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_tag_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_heading_tag_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_tag_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_heading_tag_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_tag_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_heading_tag_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_whychooseus_heading_tag_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_tag_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_heading_tag_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_whychooseus_heading_tag_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_heading_settings',
		array(
			'label' => __('Why Choose Us 
			Heading Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_about_whychooseus_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_about_whychooseus_heading',
	array(
		'label' => __('Section Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_about_whychooseus_heading',
		'type' => 'text'
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_whychooseus_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_whychooseus_heading_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_main_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_main_image',
		array(
			'label' => __('Why Choose Us Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_whychooseus_main_image'
		)
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_title_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_form_counter_sub_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_title_settings',
		array(
			'label' => __('Video Title Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);
$wp_customize->add_setting('vw_courier_serivce_pro_video_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_video_title',array(
	'label' => __('Video Title','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_video_title',
	'type' => 'text'
));



$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_video_title_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_video_title_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_video_title_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_video_title_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_video_title_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_whychooseus_video_title_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_whychooseus_video_title_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_whychooseus_video_title_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(

		$wp_customize,
		'vw_courier_serivce_pro_whychooseus_video_title_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_whychooseus_video_title_color',
		)
	)
);




$wp_customize->add_setting('vw_courier_serivce_pro_video_link',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_video_link',array(
	'label' => __('Video Link','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_video_link',
	'type' => 'text'
));
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_link_disable',
	array(
	  'default' => 0,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_courier_serivce_pro_switch_sanitization'
	)
  );
  $wp_customize->add_control(
	new vw_courier_serivce_pro_Toggle_Switch_Custom_control(
	  $wp_customize,
	  'vw_courier_serivce_pro_video_link_disable',
	  array(
		'label' => esc_html__('Video Box Disable', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec'
	  )
	)
  );






$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_para_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_text_para_settings',
		array(
			'label' => __('Section Paragraph Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);


$wp_customize->add_setting('vw_courier_serivce_pro_text_field1',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_text_field1',array(
	'label' => __('Text Para one','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_text_field1',
	'type' => 'text'
));
$wp_customize->add_setting('vw_courier_serivce_pro_text_field2',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_text_field2',array(
	'label' => __('Text Para Two','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_text_field2',
	'type' => 'text'
));
$wp_customize->add_setting('vw_courier_serivce_pro_text_field3',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_text_field3',array(
	'label' => __('Text Para Three','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_text_field3',
	'type' => 'text'
));

$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_field_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_text_field_settings',
		array(
			'label' => __('Section Paragraph Typography ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_field_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_text_field_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_field_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_text_field_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_field_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_text_field_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_text_field_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_field_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_text_field_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_text_field_color',
		)
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_counter_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_text_counter_settings',
		array(
			'label' => __('Counter Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);



$wp_customize->add_setting('vw_courier_serivce_pro_counter1_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter1_title',array(
	'label' => __('Counter 1 Title','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter1_title',
	'type' => 'text'
));

$wp_customize->add_setting('vw_courier_serivce_pro_counter1_count',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter1_count',array(
	'label' => __('Counter Number','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter1_count',
	'type' => 'text'
));



$wp_customize->add_setting('vw_courier_serivce_pro_counter2_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter2_title',array(
	'label' => __('Counter 2 Title','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter2_title',
	'type' => 'text'
));

$wp_customize->add_setting('vw_courier_serivce_pro_counter2_count',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter2_count',array(
	'label' => __('Counter Number','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter2_count',
	'type' => 'text'
));


$wp_customize->add_setting('vw_courier_serivce_pro_counter3_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter3_title',array(
	'label' => __('Counter 3 Title','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter3_title',
	'type' => 'text'
));

$wp_customize->add_setting('vw_courier_serivce_pro_counter3_count',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter3_count',array(
	'label' => __('Counter Number','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter3_count',
	'type' => 'text'
));


$wp_customize->add_setting('vw_courier_serivce_pro_counter4_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter4_title',array(
	'label' => __('Counter 4 Title','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter4_title',
	'type' => 'text'
));

$wp_customize->add_setting('vw_courier_serivce_pro_counter4_count',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_counter4_count',array(
	'label' => __('Counter Number','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_whychooseus_sec',
	'setting' => 'vw_courier_serivce_pro_counter4_count',
	'type' => 'text'
));

$wp_customize->add_setting(
	'vw_courier_serivce_pro_text_counter_text_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_text_counter_text_settings',
		array(
			'label' => __('Counter Typography Settings ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_text_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_counter_text_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Count Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_text_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_counter_text_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Count Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_text_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_counter_text_font_size',
	array(
		'label' => __('Count Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_counter_text_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_counter_text_color',
		array(
			'label' => __('Count Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_counter_text_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_title_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_counter_title_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Counter Title Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_title_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_counter_title_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'label' => __('Counter Title Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_title_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_counter_title_font_size',
	array(
		'label' => __('Counter Title Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_whychooseus_sec',
		'setting' => 'vw_courier_serivce_pro_counter_title_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_counter_title_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_counter_title_color',
		array(
			'label' => __('Counter Title Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_whychooseus_sec',
			'settings' => 'vw_courier_serivce_pro_counter_title_color',
		)
	)
);

// why Choose Us Section end	


// Testimonial Section 


$wp_customize->add_section(
	'vw_courier_serivce_pro_testimonial_sec',
	array(
		'title' => __('Testimonial Section', 'vw-courier-serivce-pro'),
		'description' => __('Add testimonial section setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_testimonial_enable',
	array(
		'selector' => '#blog-news .container',
		'render_callback' => 'vw_courier_serivce_pro_testimonial_sec',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_bgimage',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_bgimage'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_bgimage_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_bgimage_setting',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_tag_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_heading_tag_settings',
		array(
			'label' => __('Testimonial Heading Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_text',
	array(
		'label' => __('Heading Tagline', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_testimonial_heading_tag_font_text',
		'type' => 'text'
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_tag_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_testimonial_heading_tag_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_tag_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_heading_tag_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_heading_tag_color',
		)
	)
);





$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_heading_settings',
		array(
			'label' => __('Testimonial Heading Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_font_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_font_text',
	array(
		'label' => __(' Testimonial Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_testimonial_heading_font_text',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_image_icon_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_image_icon_text',
	array(
		'label' => __('Testimonial Image Icon Text', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_testimonial_image_icon_text',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_image_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_image_icon',
		array(
			'label' => __('Testimonial Icons Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_image_icon'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_testimonial_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_heading_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_text_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_text_heading_settings',
		array(
			'label' => __('Testimonial Text Typography', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_text_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_text_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_text_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_text_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_text_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_testimonial_text_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_testimonial_text_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_text_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_text_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_text_heading_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_client_name_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_client_name_heading_settings',
		array(
			'label' => __('Client Name Typography Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_client_name_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_client_name_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_client_name_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_client_name_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_client_name_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_client_name_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_client_name_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_client_name_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_client_name_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_client_name_heading_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_service_used_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_service_used_heading_settings',
		array(
			'label' => __('Service Used Typography Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_service_used_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_service_used_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_service_used_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_service_used_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_service_used_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_service_used_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_testimonial_sec',
		'setting' => 'vw_courier_serivce_pro_service_used_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_service_used_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_service_used_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_service_used_heading_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_floating_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_floating_image',
		array(
			'label' => __('Decoration image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_floating_image'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_testimonial_floating_image2',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_testimonial_floating_image2',
		array(
			'label' => __('Decoration image 2', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_testimonial_sec',
			'settings' => 'vw_courier_serivce_pro_testimonial_floating_image2'
		)
	)
);


// Testimonial End 


// Our team 


$wp_customize->add_section(
	'vw_courier_serivce_pro_our_team_sec',
	array(
		'title' => __('Our Team Section', 'vw-courier-serivce-pro'),
		'description' => __('Add Get In Touch setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_our_team_enable',
	array(
		'selector' => '#blog-news .container',
		'render_callback' => 'vw_courier_serivce_pro_our_team_sec',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_bgimage',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_bgimage'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_tagline_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_heading_tagline_settings',
		array(
			'label' => __('Our Team Heading Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_bgimage_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_bgimage_setting',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_tag_font_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_tag_font_text',
	array(
		'label' => __('Heading Tagline ', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'setting' => 'vw_courier_serivce_pro_our_team_heading_tag_font_text',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_tag_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_tag_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_tag_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_tag_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_tag_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_tag_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'setting' => 'vw_courier_serivce_pro_our_team_heading_tag_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_tag_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_heading_tag_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_heading_tag_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_heading_settings',
		array(
			'label' => __('Our Team Heading Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_font_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_font_text',
	array(
		'label' => __('Section Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'setting' => 'vw_courier_serivce_pro_our_team_heading_font_text',
		'type' => 'text'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'setting' => 'vw_courier_serivce_pro_our_team_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_heading_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_card_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_card_settings',
		array(
			'label' => __('Team card Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_card_bg_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_card_bg_color',
		array(
			'label' => __('Card Bg Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_card_bg_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_member_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_member_settings',
		array(
			'label' => __('Member Name Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_team_member_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_team_member_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_team_member_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_team_member_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_team_member_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_team_member_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'setting' => 'vw_courier_serivce_pro_our_team_team_member_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_team_member_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_team_member_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_team_member_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_designation_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_designation_settings',
		array(
			'label' => __('Member Designation Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_designation_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_designation_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_designation_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_designation_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_designation_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_our_team_designation_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_our_team_sec',
		'setting' => 'vw_courier_serivce_pro_our_team_designation_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_designation_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_designation_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_designation_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_team_social_icon_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_team_social_icon_settings',
		array(
			'label' => __('Social Icons Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec'
		)
	)
);

for($i=1; $i<=4; $i++){
	$wp_customize->add_setting(
		'vw_courier_serivce_pro_social_icon'. $i,
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control(
		new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
			$wp_customize,
			'vw_courier_serivce_pro_social_icon'. $i,
			array(
				'settings' => 'vw_courier_serivce_pro_social_icon'. $i,
				'section' => 'vw_courier_serivce_pro_our_team_sec',
				'type' => 'icon',
				'label' => esc_html__('Team Social Icon '. $i, 'vw-courier-serivce-pro'),
			)
		)
	);
}

$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_team_social_icon_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_team_social_icon_color',
		array(
			'label' => __('Icon Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_team_social_icon_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_our_team_team_social_icon_hover_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_our_team_team_social_icon_hover_color',
		array(
			'label' => __('Icon Hover Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_our_team_sec',
			'settings' => 'vw_courier_serivce_pro_our_team_team_social_icon_hover_color',
		)
	)
);

// our team end 


// section GetInTouch 


$wp_customize->add_section(
	'vw_courier_serivce_pro_GetInTouch_sec',
	array(
		'title' => __('Get In Touch', 'vw-courier-serivce-pro'),
		'description' => __('Add Get In Touch setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_GetInTouch_enable',
	array(
		'selector' => '#blog-news .container',
		'render_callback' => 'vw_courier_serivce_pro_GetInTouch_sec',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_bgimage',
		array(
			'label' => __('Background image', 'vw-courier-serivce-pro'),
			'description' => __('Ideal image is 1920x529 px.', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_bgimage'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_bg_image_attachment',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_bg_image_attachment',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_settings',
		array(
			'label' => __('Get In Touch Content Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_column_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_column_bgcolor',
		array(
			'label' => __('Get in touch Column BG', 'vw-courier-serivce-pro'),
			'description' => __('Section column background color.', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_column_bgcolor',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_heading_tagline_settings',
		array(
			'label' => __('Get In Touch Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);

$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_heading_tagline',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_heading_tagline',array(
	'label' => __('Heading Tagline','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_heading_tagline',
	'type' => 'text'
));

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_heading_tagline_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_tagline_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_heading_tagline_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_heading_tagline_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_heading_settings',
		array(
			'label' => __('Get In Touch Heading Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_font_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_heading_font_text',
	array(
		'label' => __(' Section Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_heading_font_text',
		'type' => 'text'
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_heading_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_section_desc_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_section_desc_settings',
		array(
			'label' => __('Get In Touch Section Description', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);






$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_section_desc',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_section_desc',array(
	'label' => __('Section description','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_section_desc',
	'type' => 'text'
));



$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_section_desc_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_section_desc_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_section_desc_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_section_desc_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_section_desc_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_section_desc_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_section_desc_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_section_desc_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_section_desc_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_section_desc_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_text_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_support_text_settings',
		array(
			'label' => __('Support Text Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);



$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_support_text',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_support_text',array(
	'label' => __('Support text','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_support_text',
	'type' => 'text'
));



$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_text_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_support_text_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_text_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_support_text_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_text_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_support_text_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_support_text_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_support_text_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_support_text_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_support_contact_number_settings',
		array(
			'label' => __('Phone Number Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);



$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_support_contact_number',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_support_contact_number',array(
	'label' => __('Support contact number','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_support_contact_number',
	'type' => 'text'
));




$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_support_contact_number_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_contact_number_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_support_contact_number_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_support_contact_number_color',
		)
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_support_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_support_icon',
		array(
			'label' => __('Support Icon', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_support_icon'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_latest_GetInTouch_settings_heading',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_latest_GetInTouch_settings_heading',
		array(
			'label' => __('Get In Touch Features', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_feature1_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_feature1_icon',
		array(
			'label' => __('Support Icon', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_feature1_icon'
		)
	)
);


$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_feature1_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_feature1_title',array(
	'label' => __('Feature 1 Title','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_feature1_title',
	'type' => 'text'
));

$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_feature1_desc',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_feature1_desc',array(
	'label' => __('Feature 1 Description','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_feature1_desc',
	'type' => 'text'
));


$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_feature2_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_feature2_icon',
		array(
			'label' => __('Support Icon', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_feature2_icon'
		)
	)
);


$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_feature2_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_feature2_title',array(
	'label' => __('Feature 2 Title','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_feature2_title',
	'type' => 'text'
));

$wp_customize->add_setting('vw_courier_serivce_pro_GetInTouch_feature2_desc',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_GetInTouch_feature2_desc',array(
	'label' => __('Feature 2 Description','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
	'setting' => 'vw_courier_serivce_pro_GetInTouch_feature2_desc',
	'type' => 'text'
));



$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_settings',
		array(
			'label' => __('Features Typography', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Title Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Title Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_font_size',
	array(
		'label' => __('Title Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_color',
		array(
			'label' => __('Title Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_title_color',
		)
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Description Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'label' => __('Description Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_font_size',
	array(
		'label' => __('Description Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
		'setting' => 'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_color',
		array(
			'label' => __('Description Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_GetInTouch_sec',
			'settings' => 'vw_courier_serivce_pro_GetInTouch_GetInTouch_feature_description_color',
		)
	)
);
// get in touch end 


// FAQ section 




$wp_customize->add_section(
	'vw_courier_serivce_pro_faq_sec',
	array(
		'title' => __('FAQ Section', 'vw-courier-serivce-pro'),
		'description' => __('Add faq setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_faq_bgcolor',
	array(
		'selector' => '#faq-us .container',
		'render_callback' => 'twentyfifteen_customize_partial_vw_courier_serivce_pro_faq_bgcolor',
	)
);
	$wp_customize->selective_refresh->add_partial( 'vw_courier_serivce_pro_faq_enable', array(
		'selector' => 'section#faq',
		'render_callback' => 'vw_courier_serivce_pro_faq_sec',
));
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_bgcolor',
	array(
		'default' => '#fff',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_bgimage',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_bgimage'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_bgimage_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_bgimage_setting',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_heading_tagline_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_heading_tagline_settings',
		array(
			'label' => __('FAQ Heading Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec'
		)
	)
);
$wp_customize->add_setting('vw_courier_serivce_pro_faq_heading_tagline',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_faq_heading_tagline',array(
	'label' => __('Heading Tag','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_faq_sec',
	'setting' => 'vw_courier_serivce_pro_faq_heading_tagline',
	'type' => 'text'
));





$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'heading_tagline' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'setting' => 'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_faq_feature_heading_tagline_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_heading_settings',
		array(
			'label' => __('FAQ Heading Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec'
		)
	)
);


$wp_customize->add_setting('vw_courier_serivce_pro_faq_heading',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_faq_heading',array(
	'label' => __('Section Heading','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_faq_sec',
	'setting' => 'vw_courier_serivce_pro_faq_heading',
	'type' => 'text'
));



$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'setting' => 'vw_courier_serivce_pro_faq_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_heading_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_image',
		array(
			'label' => __('FAQ Section Image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_image'
		)
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_attriute_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_attriute_settings',
		array(
			'label' => __('Service Attributes', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec'
		)
	)
);


$wp_customize->add_setting('vw_courier_serivce_pro_faq_service_attribute1_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_faq_service_attribute1_title',array(
	'label' => __('Service Attribute 1','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_faq_sec',
	'setting' => 'vw_courier_serivce_pro_faq_service_attribute1_title',
	'type' => 'text'
));
$wp_customize->add_setting('vw_courier_serivce_pro_faq_service_attribute1_desc',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_faq_service_attribute1_desc',array(
	'label' => __('Service Attribute 1 Description','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_faq_sec',
	'setting' => 'vw_courier_serivce_pro_faq_service_attribute1_desc',
	'type' => 'text'
));


$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute1_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_service_attribute1_icon',
		array(
			'label' => __('Service Attribute 1 image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_service_attribute1_icon'
		)
	)
);



$wp_customize->add_setting('vw_courier_serivce_pro_faq_service_attribute2_title',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_faq_service_attribute2_title',array(
	'label' => __('Service Attribute 2','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_faq_sec',
	'setting' => 'vw_courier_serivce_pro_faq_service_attribute2_title',
	'type' => 'text'
));
$wp_customize->add_setting('vw_courier_serivce_pro_faq_service_attribute2_desc',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_faq_service_attribute2_desc',array(
	'label' => __('Service Attribute 2 Description','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_faq_sec',
	'setting' => 'vw_courier_serivce_pro_faq_service_attribute2_desc',
	'type' => 'text'
));


$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute2_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_service_attribute2_icon',
		array(
			'label' => __('Service Attribute 2 image', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_service_attribute2_icon'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_attriute_typography_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_attriute_typography_settings',
		array(
			'label' => __('Service Attributes Typography Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_title_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_service_attribute_title_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Service Attribute Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_title_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_service_attribute_title_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Service Attribute Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_title_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_service_attribute_title_font_size',
	array(
		'label' => __('Service Attribute Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'setting' => 'vw_courier_serivce_pro_faq_service_attribute_title_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_title_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_service_attribute_title_color',
		array(
			'label' => __('Service Attribute Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_service_attribute_title_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_description_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_service_attribute_description_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Attribute Description Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_description_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_service_attribute_description_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Attribute Description Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_description_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_service_attribute_description_font_size',
	array(
		'label' => __('Attribute Description Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'setting' => 'vw_courier_serivce_pro_faq_service_attribute_description_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_service_attribute_description_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_service_attribute_description_color',
		array(
			'label' => __('Attribute Description Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_service_attribute_description_color',
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_settings',
		array(
			'label' => __('Questions And Answers Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_count',
	array(
		'default' => '5',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_count',
	array(
		'label' => __('Number Of Questions To Add', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'type' => 'number'
	)
);



$count = get_theme_mod('vw_courier_serivce_pro_faq_count');

for ($i = 1, $j = 1; $i <= $count; $i++, $j++) {
	$wp_customize->add_setting(
		'vw_courier_serivce_pro_faq' . $i,
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'vw_courier_serivce_pro_faq' . $i,
		array(
			'label' => __('Enter Question ' . $i, 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'setting' => 'vw_courier_serivce_pro_faq' . $i,
			'type' => 'text'
		)
	);
	$wp_customize->add_setting(
		'vw_courier_serivce_pro_faq_answer' . $i,
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'vw_courier_serivce_pro_faq_answer' . $i,
		array(
			'label' => __('Enter Answer ' . $i, 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'setting' => 'vw_courier_serivce_pro_faq_answer' . $i,
			'type' => 'text'
		)
	);
}

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_settings',
		array(
			'label' => __('Questions And Answers Typography Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec'
		)
	)
);




$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_question_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_question_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Question Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_question_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_question_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Question Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_question_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_question_font_size',
	array(
		'label' => __('Question Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'setting' => 'vw_courier_serivce_pro_faq_question_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_question_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_question_color',
		array(
			'label' => __('Question Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_question_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_answer_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_answer_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Answer Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_answer_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_answer_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'label' => __('Answer Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_answer_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_faq_answer_font_size',
	array(
		'label' => __('Answer Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_faq_sec',
		'setting' => 'vw_courier_serivce_pro_faq_answer_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_answer_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_answer_color',
		array(
			'label' => __('Answer Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_answer_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_dropdown_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_dropdown_settings',
		array(
			'label' => __('Accordion Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_dropdown_icon_setting',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'vw_courier_serivce_pro_dropdown_icon_setting',
		array(
			'settings' => 'vw_courier_serivce_pro_dropdown_icon_setting',
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'type' => 'icon',
			'label' => esc_html__('Accordion Icon', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_accordion_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_accordion_bgcolor',
		array(
			'label' => __('Accordion Background Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_accordion_bgcolor',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_faq_accordion_ans_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_faq_accordion_ans_bgcolor',
		array(
			'label' => __('Accordion Answer Background Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_faq_sec',
			'settings' => 'vw_courier_serivce_pro_faq_accordion_ans_bgcolor',
		)
	)
);



// FAQ Section end


$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_bg_color',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_bg_color',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_bg_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_bg_image',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_bg_image'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_bg_image_attachment',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_bg_image_attachment',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_content_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_content_settings',
		array(
			'label' => __('Video Content Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_sub_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_sub_heading',
	array(
		'label' => __('Sub Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_sec_sub_heading',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_heading',
	array(
		'label' => __('Heading', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_sec_heading',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_paragraph',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_paragraph',
	array(
		'label' => __('Paragraph', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_sec_paragraph',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_play_text',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_play_text',
	array(
		'label' => __('Video', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_play_text',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_video_url',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_video_url',
	array(
		'label' => __('Video Url', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_video_url',
		'type' => 'text'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_content_typography_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_content_typography_settings',
		array(
			'label' => __('Heading & Paragraph Typoghraphy', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_sub_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_sub_heading_color',
		array(
			'label' => __('Heading Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_sub_heading_color',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_sub_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_sub_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_video_sec',
		'label' => __('Heading Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_sub_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_sub_heading_font_size',
	array(
		'label' => __('Heading Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Sub Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_sec_sub_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_sub_heading_border_bottom_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_sub_heading_border_bottom_color',
		array(
			'label' => __('Heading Border Bottom Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_sub_heading_border_bottom_color',
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_heading_color',
		array(
			'label' => __('Heading Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_heading_color',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_video_sec',
		'label' => __('Heading Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_heading_font_size',
	array(
		'label' => __('Heading Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Sub Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_sec_heading_font_size',
		'type' => 'number'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_paragraph_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_paragraph_color',
		array(
			'label' => __('Paragraph Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_paragraph_color',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_paragraph_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_paragraph_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_video_sec',
		'label' => __('Paragraph Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_paragraph_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_video_sec_paragraph_font_size',
	array(
		'label' => __('Paragraph Font Size', 'vw-courier-serivce-pro'),
		'description' => __('Sub Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_video_sec',
		'setting' => 'vw_courier_serivce_pro_video_sec_paragraph_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_play_btn_text_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_play_btn_text_color',
		array(
			'label' => __('Play Text Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_play_btn_text_color',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_play_btn_bg_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_play_btn_bg_color',
		array(
			'label' => __('Play Background Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_play_btn_bg_color',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_video_sec_play_btn_border_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_video_sec_play_btn_border_color',
		array(
			'label' => __('Play Border Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_video_sec',
			'settings' => 'vw_courier_serivce_pro_video_sec_play_btn_border_color',
		)
	)
);



/*-----------------------Blog Section Settings--------------------------*/
$wp_customize->add_section(
	'vw_courier_serivce_pro_blog_and_news_sec',
	array(
		'title' => __('Blog Section', 'vw-courier-serivce-pro'),
		'description' => __('Add Blog & News setting here.', 'vw-courier-serivce-pro'),
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_latest_blog_and_news_enable',
	array(
		'default' => 'Enable',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_latest_blog_and_news_enable',
	array(
		'type' => 'radio',
		'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'choices' => array(
			'Enable' => __('Enable', 'vw-courier-serivce-pro'),
			'Disable' => __('Disable', 'vw-courier-serivce-pro')
		),
	)
);
$wp_customize->selective_refresh->add_partial(
	'vw_courier_serivce_pro_latest_blog_and_news_enable',
	array(
		'selector' => '#blog-news .container',
		'render_callback' => 'vw_courier_serivce_pro_blog_and_news_sec',
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_latest_blog_and_news_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_latest_blog_and_news_bgcolor',
		array(
			'label' => __('Background Color', 'vw-courier-serivce-pro'),
			'description' => __('Either add background color or background image, if you add both background color will be top most priority', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'settings' => 'vw_courier_serivce_pro_latest_blog_and_news_bgcolor',
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_latest_blog_and_news_bgimage',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_latest_blog_and_news_bgimage',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'settings' => 'vw_courier_serivce_pro_latest_blog_and_news_bgimage'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_latest_blog_and_news_bg_image_attachment',
	array(
		'default' => '',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_latest_blog_and_news_bg_image_attachment',
	array(
		'type' => 'radio',
		'label' => __('Choose image option', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'choices' => array(
			'fixed' => __('Fixed', 'vw-courier-serivce-pro'),
			'scroll' => __('Scroll', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_latest_blog_and_news_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_latest_blog_and_news_settings',
		array(
			'label' => __('Blog Content Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_blog_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_blog_blog_settings',
		array(
			'label' => __('Blog Heading Tagline Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec'
		)
	)
);

$wp_customize->add_setting('vw_courier_serivce_pro_blog_heading_tagline',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_blog_heading_tagline',array(
	'label' => __('Heading Tagline','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
	'setting' => 'vw_courier_serivce_pro_blog_heading_tagline',
	'type' => 'text'
));


$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_tagline_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_heading_tagline_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_tagline_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_heading_tagline_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_tagline_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_heading_tagline_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'setting' => 'vw_courier_serivce_pro_blog_heading_tagline_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_tagline_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_blog_heading_tagline_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'settings' => 'vw_courier_serivce_pro_blog_heading_tagline_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_blog_heading_settings',
		array(
			'label' => __('Blog Heading Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec'
		)
	)
);



$wp_customize->add_setting('vw_courier_serivce_pro_blog_heading',array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_courier_serivce_pro_blog_heading',array(
	'label' => __('Heading Tagline','vw-courier-serivce-pro'),
	'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
	'setting' => 'vw_courier_serivce_pro_blog_heading',
	'type' => 'text'
));


$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_heading_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_heading_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_heading_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'setting' => 'vw_courier_serivce_pro_blog_heading_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_heading_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_blog_heading_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'settings' => 'vw_courier_serivce_pro_blog_heading_color',
		)
	)
);





$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_card_icons_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_blog_card_icons_settings',
		array(
			'label' => __('Blog Card Icons Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_author',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'vw_courier_serivce_pro_blog_author',
		array(
			'settings' => 'vw_courier_serivce_pro_blog_author',
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'type' => 'icon',
			'label' => esc_html__('Author Icon', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_comment_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'vw_courier_serivce_pro_blog_comment_icon',
		array(
			'settings' => 'vw_courier_serivce_pro_blog_comment_icon',
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'type' => 'icon',
			'label' => esc_html__('Comment Icon', 'vw-courier-serivce-pro'),
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_fright_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'vw_courier_serivce_pro_blog_fright_icon',
		array(
			'settings' => 'vw_courier_serivce_pro_blog_fright_icon',
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'type' => 'icon',
			'label' => esc_html__('Fright Icon', 'vw-courier-serivce-pro'),
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_blog_title_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_blog_blog_title_settings',
		array(
			'label' => __('Blog Title Typography', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_blog_title_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_blog_title_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_blog_title_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_blog_title_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_blog_title_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_blog_blog_title_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
		'setting' => 'vw_courier_serivce_pro_blog_blog_title_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_blog_blog_title_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_blog_blog_title_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_blog_and_news_sec',
			'settings' => 'vw_courier_serivce_pro_blog_blog_title_color',
		)
	)
);







$wp_customize->add_section(
	'vw_courier_serivce_pro_post_product_general_settings',
	array(
		'title' => __('General Settings', 'vw-courier-serivce-pro'),
		'description' => __('See section settings below and do check documentation too.', 'vw-courier-serivce-pro'),
		'priority' => null,
		'panel' => 'vw_courier_serivce_pro_panel_id',
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_products_spinner_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_products_spinner_settings',
		array(
			'label' => __('Spinner Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_post_product_general_settings'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_products_spinner_enable',
	array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_courier_serivce_pro_switch_sanitization'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Toggle_Switch_Custom_control(
		$wp_customize,
		'vw_courier_serivce_pro_products_spinner_enable',
		array(
			'label' => esc_html__('Spinner Enable/Disable', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_post_product_general_settings'
		)
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_products_spinner_bgcolor',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_products_spinner_bgcolor',
		array(
			'label' => __('Spinner Background Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_post_product_general_settings',
			'settings' => 'vw_courier_serivce_pro_products_spinner_bgcolor',
		)
	)
);




/* --------- Spinner Opacity  ----------- */

$wp_customize->add_setting(
	'vw_courier_serivce_pro_spinner_opacity_color',
	array(
		'default' => '1',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);

$wp_customize->add_control(
	'vw_courier_serivce_pro_spinner_opacity_color',
	array(
		'label' => esc_html__('Spinner Loader Opacity', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_post_product_general_settings',
		'type' => 'select',
		'settings' => 'vw_courier_serivce_pro_spinner_opacity_color',
		'choices' => array(
			'0' => esc_attr('0', 'vw-courier-serivce-pro'),
			'0.1' => esc_attr('0.1', 'vw-courier-serivce-pro'),
			'0.2' => esc_attr('0.2', 'vw-courier-serivce-pro'),
			'0.3' => esc_attr('0.3', 'vw-courier-serivce-pro'),
			'0.4' => esc_attr('0.4', 'vw-courier-serivce-pro'),
			'0.5' => esc_attr('0.5', 'vw-courier-serivce-pro'),
			'0.6' => esc_attr('0.6', 'vw-courier-serivce-pro'),
			'0.7' => esc_attr('0.7', 'vw-courier-serivce-pro'),
			'0.8' => esc_attr('0.8', 'vw-courier-serivce-pro'),
			'0.9' => esc_attr('0.9', 'vw-courier-serivce-pro'),
			'1' => esc_attr('1', 'vw-courier-serivce-pro')
		),
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_general_settings_scroll_top',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_general_settings_scroll_top',
		array(
			'label' => __('Scroll Top Settings', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_post_product_general_settings'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_genral_section_show_scroll_top',
	array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_courier_serivce_pro_switch_sanitization'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Toggle_Switch_Custom_control(
		$wp_customize,
		'vw_courier_serivce_pro_genral_section_show_scroll_top',
		array(
			'label' => esc_html__('Show or Hide Scroll Top', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_post_product_general_settings'
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_genral_section_show_scroll_top_icon',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	new vw_courier_serivce_pro_Fontawesome_Icon_Chooser(
		$wp_customize,
		'vw_courier_serivce_pro_genral_section_show_scroll_top_icon',
		array(
			'settings' => 'vw_courier_serivce_pro_genral_section_show_scroll_top_icon',
			'section' => 'vw_courier_serivce_pro_post_product_general_settings',
			'type' => 'icon',
			'label' => esc_html__('Choose Scroll Top Icon', 'vw-courier-serivce-pro'),
		)
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_general_scroll_top_icon_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_genral_corner_decoration_section',
	array(
	  'default' => 0,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_courier_serivce_pro_switch_sanitization'
	)
  );
  $wp_customize->add_control(
	new vw_courier_serivce_pro_Toggle_Switch_Custom_control(
	  $wp_customize,
	  'vw_courier_serivce_pro_genral_corner_decoration_section',
	  array(
		'label' => esc_html__('Card Corner Design Disable', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_post_product_general_settings'
	  )
	)
  );


$wp_customize->add_setting(
	'vw_courier_serivce_pro_corner_png',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_corner_png',
		array(
			'label' => __('Corner Design PNG', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_post_product_general_settings',
			'settings' => 'vw_courier_serivce_pro_corner_png'
		)
	)
);



?>
