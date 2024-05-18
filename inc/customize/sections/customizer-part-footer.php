<?php

$wp_customize->add_section(
    'vw_courier_serivce_pro_footer_sec',
    array(
        'title' => __('Footer Settings', 'vw-courier-serivce-pro'),
        'description' => __('Add Get In Tech setting here.', 'vw-courier-serivce-pro'),
        'panel' => 'vw_courier_serivce_pro_panel_id',
    )
);

// $wp_customize->add_setting(
//     'vw_courier_serivce_pro_footer_enable',
//     array(
//         'default' => 'Enable',
//         'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
//     )
// );
// $wp_customize->add_control(
//     'vw_courier_serivce_pro_footer_enable',
//     array(
//         'type' => 'radio',
//         'label' => __('Do you want this section', 'vw-courier-serivce-pro'),
//         'section' => 'vw_courier_serivce_pro_footer_sec',
//         'choices' => array(
//             'Enable' => __('Enable', 'vw-courier-serivce-pro'),
//             'Disable' => __('Disable', 'vw-courier-serivce-pro')
//         ),
//     )
// );
$wp_customize->selective_refresh->add_partial(
    'vw_courier_serivce_pro_footer_enable',
    array(
        'selector' => '#footer .container',
        'render_callback' => 'vw_courier_serivce_pro_footer_sec',
    )
);
$wp_customize->add_setting(
    'vw_courier_serivce_pro_footer_bgcolor',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'vw_courier_serivce_pro_footer_bgcolor',
        array(
            'label' => __('Background Color', 'vw-courier-serivce-pro'),
            'section' => 'vw_courier_serivce_pro_footer_sec',
            'settings' => 'vw_courier_serivce_pro_footer_bgcolor',
        )
    )
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_bg_image',
	array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'vw_courier_serivce_pro_footer_bg_image',
		array(
			'label' => __('Background image ', 'vw-courier-serivce-pro'),
            'description' => __('Add an image atleast 1920x768 px'),
			'section' => 'vw_courier_serivce_pro_footer_sec',
			'settings' => 'vw_courier_serivce_pro_footer_bg_image'
		)
	)
);



$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_title_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_footer_title_settings',  
		array(
			'label' => __('Footer Text Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_footer_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_title_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_footer_title_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_footer_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_title_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_footer_title_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_footer_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_title_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_footer_title_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_footer_sec',
		'setting' => 'vw_courier_serivce_pro_footer_title_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_title_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_footer_title_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_footer_sec',
			'settings' => 'vw_courier_serivce_pro_footer_title_color',
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_headings_settings',
	array(
		'default' => '',
		'transport' => 'postMessage',
		'sanitize_callback' => 'vw_courier_serivce_pro_text_sanitization'
	)
);
$wp_customize->add_control(
	new VW_Themes_Seperator_custom_Control(
		$wp_customize,
		'vw_courier_serivce_pro_footer_headings_settings',
		array(
			'label' => __('Footer Headings Setting', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_footer_sec'
		)
	)
);


$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_headings_font_weight',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_footer_headings_font_weight',
	array(
		'section' => 'vw_courier_serivce_pro_footer_sec',
		'label' => __('Font Weight', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_weight_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_headings_font_family',
	array(
		'default' => '',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'vw_courier_serivce_pro_sanitize_choices'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_footer_headings_font_family',
	array(
		'section' => 'vw_courier_serivce_pro_footer_sec',
		'label' => __('Font Family', 'vw-courier-serivce-pro'),
		'type' => 'select',
		'choices' => $font_array,
	)
);

$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_headings_font_size',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'vw_courier_serivce_pro_footer_headings_font_size',
	array(
		'label' => __('Font Size', 'vw-courier-serivce-pro'),
		'description' =>__('Add font size in px', 'vw-courier-serivce-pro'),
		'section' => 'vw_courier_serivce_pro_footer_sec',
		'setting' => 'vw_courier_serivce_pro_footer_headings_font_size',
		'type' => 'number'
	)
);
$wp_customize->add_setting(
	'vw_courier_serivce_pro_footer_headings_color',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'vw_courier_serivce_pro_footer_headings_color',
		array(
			'label' => __('Color', 'vw-courier-serivce-pro'),
			'section' => 'vw_courier_serivce_pro_footer_sec',
			'settings' => 'vw_courier_serivce_pro_footer_headings_color',
		)
	)
);