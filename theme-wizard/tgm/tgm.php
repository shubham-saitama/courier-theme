<?php

require get_template_directory() . '/theme-wizard/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function vw_courier_serivce_pro_register_recommended_plugins()
{
	$plugins = array(
		array(
			'name' => __('Cost Calculator Builder', 'vw-courier-serivce-pro'),
			'slug' => 'cost-calculator-builder',
			'source' => '',
			'required' => true,
			'force_activation' => false,
		),
		array(
			'name' => __('Contact Form 7', 'vw-courier-serivce-pro'),
			'slug' => 'contact-form-7',
			'required' => true,
			'force_activation' => false,
		),
		array(
			'name' => __('Order Tracking', 'vw-courier-serivce-pro'),
			'slug' => 'order-tracking',
			'source' => '',
			'required' => true,
			'force_activation' => false,
		),
		array(
			'name' => __('Classic Widgets', 'vw-courier-serivce-pro'),
			'slug' => 'classic-widgets',
			'source' => '',
			'required' => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Ibtana - WordPress Website Builder', 'vw-courier-serivce-pro' ),
			'slug'             => 'ibtana-visual-editor',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Ibtana - Ecommerce Product Addons', 'vw-courier-serivce-pro' ),
			'slug'             => 'ibtana-ecommerce-product-addons',
			'source'           => '',
			'required'         => true,
			'force_activation' => false,
		),
	);
	$vw_courier_serivce_pro_config = array();
	tgmpa($plugins, $vw_courier_serivce_pro_config);
}
add_action('tgmpa_register', 'vw_courier_serivce_pro_register_recommended_plugins');


