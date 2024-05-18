<?php
/**
 * vw-courier-serivce-pro functions and definitions
 *
 * @package vw-courier-serivce-pro
 */

if (!function_exists('vw_courier_serivce_pro_setup')):
	// echo "<pre>";
// echo print_r($terms_content);
// echo "</pre>";
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function vw_courier_serivce_pro_setup()
	{
		$GLOBALS['content_width'] = apply_filters('vw_courier_serivce_pro_content_width', 640);
		if (!isset($content_width))
			$content_width = 640;
		load_theme_textdomain('vw-courier-serivce-pro', get_template_directory() . '/languages');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support('woocommerce');
		add_theme_support('custom-header');
		add_theme_support('title-tag');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
		add_theme_support('wc-template-functions');

		add_theme_support(
			'custom-logo',
			array(
				'height' => 240,
				'width' => 240,
				'flex-height' => true,
			)
		);
		add_image_size('vw-courier-serivce-pro-homepage-thumb', 240, 145, true);
		register_nav_menus(
			array(
				'primary' => __('Primary Menu', 'vw-courier-serivce-pro'),
				'footer1' => __('Footer Menu1', 'vw-courier-serivce-pro'),
				'footer2' => __('Footer Menu2', 'vw-courier-serivce-pro'),
			)
		);
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'f1f1f1'
			)
		);
		add_editor_style(array('assets/css/editor-style.css'));
	}
endif;
add_action('after_setup_theme', 'vw_courier_serivce_pro_setup');

/* Theme Widgets Setup */
function vw_courier_serivce_pro_widgets_init()
{
	register_sidebar(
		array(
			'name' => __('Blog Sidebar', 'vw-courier-serivce-pro'),
			'description' => __('Appears on blog page sidebar', 'vw-courier-serivce-pro'),
			'id' => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __('Page Sidebar', 'vw-courier-serivce-pro'),
			'description' => __('Appears on page sidebar', 'vw-courier-serivce-pro'),
			'id' => 'sidebar-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer Column 1', 'vw-courier-serivce-pro'),
			'description' => __('Appears on footer', 'vw-courier-serivce-pro'),
			'id' => 'footer-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer Column 2', 'vw-courier-serivce-pro'),
			'description' => __('Appears on footer', 'vw-courier-serivce-pro'),
			'id' => 'footer-2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer Column 3', 'vw-courier-serivce-pro'),
			'description' => __('Appears on footer', 'vw-courier-serivce-pro'),
			'id' => 'footer-3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer Column 4', 'vw-courier-serivce-pro'),
			'description' => __('Appears on footer', 'vw-courier-serivce-pro'),
			'id' => 'footer-4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);
}
add_action('widgets_init', 'vw_courier_serivce_pro_widgets_init');

/* Theme Font URL */
function vw_courier_serivce_pro_font_url()
{
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Roboto Condensed:400,700';
	$font_family[] = 'Open Sans';
	$font_family[] = 'Overpass';
	$font_family[] = 'Montserrat:300,400,600,700,800,900';
	$font_family[] = 'Playball:300,400,600,700,800,900';
	$font_family[] = 'Alegreya:300,400,600,700,800,900';
	$font_family[] = 'Julius Sans One';
	$font_family[] = 'Arsenal';
	$font_family[] = 'Slabo';
	$font_family[] = 'Lato';
	$font_family[] = 'Overpass Mono';
	$font_family[] = 'Source Sans Pro';
	$font_family[] = 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Merriweather';
	$font_family[] = 'Rubik';
	$font_family[] = 'Lora';
	$font_family[] = 'Ubuntu';
	$font_family[] = 'Cabin';
	$font_family[] = 'Arimo';
	$font_family[] = 'Playfair Display';
	$font_family[] = 'Quicksand';
	$font_family[] = 'Padauk';
	$font_family[] = 'Muli';
	$font_family[] = 'Inconsolata';
	$font_family[] = 'Bitter';
	$font_family[] = 'Pacifico';
	$font_family[] = 'Indie Flower';
	$font_family[] = 'VT323';
	$font_family[] = 'Dosis';
	$font_family[] = 'Frank Ruhl Libre';
	$font_family[] = 'Fjalla One';
	$font_family[] = 'Oxygen';
	$font_family[] = 'Arvo';
	$font_family[] = 'Noto Serif';
	$font_family[] = 'Lobster';
	$font_family[] = 'Crimson Text';
	$font_family[] = 'Yanone Kaffeesatz';
	$font_family[] = 'Anton';
	$font_family[] = 'Libre Baskerville';
	$font_family[] = 'Bree Serif';
	$font_family[] = 'Gloria Hallelujah';
	$font_family[] = 'Josefin Sans';
	$font_family[] = 'Abril Fatface';
	$font_family[] = 'Varela Round';
	$font_family[] = 'Vampiro One';
	$font_family[] = 'Shadows Into Light';
	$font_family[] = 'Cuprum';
	$font_family[] = 'Rokkitt';
	$font_family[] = 'Vollkorn';
	$font_family[] = 'Francois One';
	$font_family[] = 'Orbitron';
	$font_family[] = 'Patua One';
	$font_family[] = 'Acme';
	$font_family[] = 'Satisfy';
	$font_family[] = 'Josefin Slab';
	$font_family[] = 'Quattrocento Sans';
	$font_family[] = 'Architects Daughter';
	$font_family[] = 'Russo One';
	$font_family[] = 'Monda';
	$font_family[] = 'Righteous';
	$font_family[] = 'Lobster Two';
	$font_family[] = 'Hammersmith One';
	$font_family[] = 'Courgette';
	$font_family[] = 'Permanent Marker';
	$font_family[] = 'Cherry Swash';
	$font_family[] = 'Cormorant Garamond';
	$font_family[] = 'Poiret One';
	$font_family[] = 'BenchNine';
	$font_family[] = 'Economica';
	$font_family[] = 'Handlee';
	$font_family[] = 'Cardo';
	$font_family[] = 'Alfa Slab One';
	$font_family[] = 'Averia Serif Libre';
	$font_family[] = 'Cookie';
	$font_family[] = 'Chewy';
	$font_family[] = 'Great Vibes';
	$font_family[] = 'Coming Soon';
	$font_family[] = 'Philosopher';
	$font_family[] = 'Days One';
	$font_family[] = 'Kanit';
	$font_family[] = 'Shrikhand';
	$font_family[] = 'Tangerine';
	$font_family[] = 'IM Fell English SC';
	$font_family[] = 'Boogaloo';
	$font_family[] = 'Bangers';
	$font_family[] = 'Fredoka One';
	$font_family[] = 'Bad Script';
	$font_family[] = 'Volkhov';
	$font_family[] = 'Shadows Into Light Two';
	$font_family[] = 'Marck Script';
	$font_family[] = 'Sacramento';
	$font_family[] = 'Poppins';
	$font_family[] = 'PT Serif';
	$font_family[] = 'Work Sans';
	$query_args = array(
		'family' => urlencode(implode('|', $font_family)),
	);
	$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
	return $font_url;
}

// custom thumbnail size 
add_image_size('custom-thumbnail', 240, 240, true);



/* Theme enqueue scripts */
function vw_courier_serivce_pro_scripts()
{
	$custom_css = "";
	wp_enqueue_style('vw-courier-serivce-pro-font', vw_courier_serivce_pro_font_url(), array());
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('vw-courier-serivce-pro-basic-style', get_stylesheet_uri());
	wp_style_add_data('vw-courier-serivce-pro-style', 'rtl', 'replace');


	if (is_rtl()) {
		wp_enqueue_style('rtl-style', get_template_directory_uri() . '/rtl-style.css', true, null, 'all');
		wp_add_inline_style('rtl-style', $custom_css);
		wp_enqueue_script('vw-courier-serivce-pro-customscripts-rtl', get_template_directory_uri() . '/assets/js/custom-rtl.js', array('jquery'), '', true);
	} else {
		// ---------- CSS Enqueue -----------


		wp_enqueue_style('other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css', true, null, 'all');
		wp_add_inline_style('other-page-style', $custom_css);
		wp_enqueue_style('home-page-style', get_template_directory_uri() . '/assets/css/main-css/home-page.css', true, null, 'all');
		wp_add_inline_style('home-page-style', $custom_css);

		if ('post' == get_post_type() && is_home()) {
			wp_enqueue_style('other-page-style', get_template_directory_uri() . '/assets/css/main-css/other-pages.css', true, null, 'all');
			wp_add_inline_style('other-page-style', $custom_css);
		}
		wp_enqueue_style('header-footer-style', get_template_directory_uri() . '/assets/css/main-css/header-footer.css', true, null, 'all');
		// wp_enqueue_style('vw-courier-serivce-pro', get_template_directory_uri() . '/assets/css/vw-courier-serivce-pro.css', true, null, 'all');

		/* Inline style sheet */
		require get_parent_theme_file_path('/inline_style.php');
		wp_add_inline_style('vw-courier-serivce-pro-basic-style', $custom_css);
		wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/main-css/mobile-main.css', true, null, 'screen and (max-width: 3000px) and (min-width: 320px)');

		wp_add_inline_style('header-footer-style', $custom_css);
		wp_add_inline_style('responsive-media-style', $custom_css);
	}

	if (function_exists('is_amp_endpoint') && is_amp_endpoint()) {
		wp_enqueue_style('amp-style', get_template_directory_uri() . '/assets/css/main-css/amp-style.css', true, null, 'all');
	} else {
		wp_enqueue_style('animation-wow', get_template_directory_uri() . '/assets/css/animate.css');
		wp_enqueue_style('owl-carousel-style', get_template_directory_uri() . '/assets/css/owl.carousel.css');
	}

	// wp_enqueue_style( 'animation-wow', get_template_directory_uri().'/assets/css/animate.css' );
	wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
	wp_enqueue_style('effect', get_template_directory_uri() . '/assets/css/effect.css');
	wp_enqueue_style('jquery-ui.min.css', get_template_directory_uri() . '/assets/css/jquery-ui.min.css');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true);
	wp_enqueue_script('waypoints', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js'	, array('jquery'), '', true);
	wp_enqueue_script('counterJs', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '', true);
	wp_enqueue_script('lightbox', get_template_directory_uri() . '/assets/js/html5lightbox.js', array('jquery'), '', true);
	wp_enqueue_script('bootstrap-notify-js', get_template_directory_uri() . '/assets/js/bootstrap-notify.min.js', array('bootstrap'));
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-ui-slider');

	global $wpdb;
	$product_price_max_query = "SELECT MAX( CAST( $wpdb->postmeta.meta_value AS SIGNED ) ) AS product_max_price FROM $wpdb->postmeta WHERE meta_key='%s'";
	$product_meta_price_max = $wpdb->get_row($wpdb->prepare($product_price_max_query, '_price'));

	$listing_price_max_query = "SELECT MAX( CAST( $wpdb->postmeta.meta_value AS SIGNED ) ) AS listing_max_price FROM $wpdb->postmeta WHERE meta_key='%s'";
	$listing_meta_price_max = $wpdb->get_row($wpdb->prepare($listing_price_max_query, '_al_listing_price'));

	$auto_listings_options = get_option('auto_listings_options');
	$currency_symbol = '$';
	if ($auto_listings_options) {
		$currency_symbol = isset($auto_listings_options['currency_symbol']) ? $auto_listings_options['currency_symbol'] : '$';
	}

	// *************************custom taxonomy for blogs **************************************
	function custom_taxonomy_fright_type()
	{
		$labels = array(
			'name' => 'Fright Types',
			'singular_name' => 'Fright Type',
			'search_items' => array(
				'Search Fright Types',
				// You can add more search item strings here if needed.
			),
			'all_items' => 'All Fright Types',
			'parent_item' => 'Parent Fright Type',
			'parent_item_colon' => 'Parent Fright Type:',
			'edit_item' => 'Edit Fright Type',
			'update_item' => 'Update Fright Type',
			'add_new_item' => 'Add New Fright Type',
			'new_item_name' => 'New Fright Type Name',
			'menu_name' => 'Fright Types',
		);

		$args = array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'fright-type'),
			// Adjust the slug as needed.
		);

		register_taxonomy('fright-type', array('post'), $args);
	}
	add_action('init', 'custom_taxonomy_fright_type');	

	// *************************custom taxonomy for blogs **************************************


	wp_register_script('vw-courier-serivce-pro-customscripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'));

	// // $vw_courier_serivce_pro_customscripts_obj = array(
	// // 	'is_home' =>  ( is_home() || is_front_page() ),
	// // 	'home_url' =>  home_url(),
	// // 	'is_rtl' => is_rtl(),
	// // 	'product_max_price'  =>  $product_meta_price_max->product_max_price,
	// // 	'listing_max_price'  => $listing_meta_price_max->listing_max_price,
	// // 	'listing_currency_symbol' => $currency_symbol,	// $vw_courier_serivce_pro_customscripts_obj = array(
	// // 	'is_home' =>  ( is_home() || is_front_page() ),
	// // 	'home_url' =>  home_url(),
	// // 	'is_rtl' => is_rtl(),
	// // 	'product_max_price'  =>  $product_meta_price_max->product_max_price,
	// // 	'listing_max_price'  => $listing_meta_price_max->listing_max_price,
	// // 	'listing_currency_symbol' => $currency_symbol,
	// // 	'get_woocommerce_currency_symbol' => get_woocommerce_currency_symbol(),
	// // 	'ajaxurl'				=>	admin_url('admin-ajax.php')
	// // );

	// // wp_localize_script('vw-courier-serivce-pro-customscripts', 'vw_courier_serivce_pro_customscripts_obj' ,$vw_courier_serivce_pro_customscripts_obj);

	// wp_enqueue_script('vw-courier-serivce-pro-customscripts');
	// // 	'get_woocommerce_currency_symbol' => get_woocommerce_currency_symbol(),
	// // 	'ajaxurl'				=>	admin_url('admin-ajax.php')
	// // );

	// // wp_localize_script('vw-courier-serivce-pro-customscripts', 'vw_courier_serivce_pro_customscripts_obj' ,$vw_courier_serivce_pro_customscripts_obj);

	wp_enqueue_script('vw-courier-serivce-pro-customscripts');

	wp_enqueue_script('vw-courier-serivce-pro-customscripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true);
	wp_enqueue_script('animation-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'));

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	wp_enqueue_style('vw-courier-serivce-pro-ie', get_template_directory_uri() . '/assets/css/ie.css', array('vw-courier-serivce-pro-basic-style'));
	wp_style_add_data('vw-courier-serivce-pro-ie', 'conditional', 'IE');
}
add_action('wp_enqueue_scripts', 'vw_courier_serivce_pro_scripts');

/* Implement the Custom Header feature. */
require get_parent_theme_file_path('/inc/custom-header.php');
/* Custom template tags for this theme. */
require get_parent_theme_file_path('/inc/template-tags.php');
/* Customizer additions. */
require get_parent_theme_file_path('/inc/customize/customizer.php');
/* wc-templatefunction */
// require get_parent_theme_file_path( 'inc/wc-template-functions.php' );
// require 'inc/wc-template-functions.php';
//about us
require get_template_directory() . '/inc/widget/about-us-widget.php';
// Contact-Widgets
require get_parent_theme_file_path('inc/widget/contact-widget.php');
// social-widgets
require get_parent_theme_file_path('inc/widget/socail-widget.php');





/**
 * Functions which enhance the theme by hooking into WordPress
 */
require get_parent_theme_file_path('inc/custom-functions.php');

require get_template_directory() . '/inc/verify_theme_version.php';
/* Theme Wizard */
require get_template_directory() . '/theme-wizard/config.php';
require get_parent_theme_file_path('/theme-wizard/plugin-activation.php');
// /* URL DEFINES */
// require get_parent_theme_file_path('custom-filter.php');
define('vw_courier_serivce_pro_SITE_URL', 'https://www.vwthemes.com/');
/* Theme Credit link */
function vw_courier_serivce_pro_credit_link()
{
	echo esc_html_e(' Design & Developed by', 'vw-courier-serivce-pro') . "<a href=" . esc_url(vw_courier_serivce_pro_SITE_URL) . " target='_blank'> VW Themes</a>";
}
/*Radio Button sanitization*/
function vw_courier_serivce_pro_sanitize_choices($input, $setting)
{
	global $wp_customize;
	$control = $wp_customize->get_control($setting->id);
	if (array_key_exists($input, $control->choices)) {
		return $input;
	} else {
		return $setting->default;
	}
}



/* Excerpt Read more overwrite */
function vw_courier_serivce_pro_excerpt_more($link)
{
	if (is_admin()) {
		return $link;
	}
	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url(get_permalink(get_the_ID())),
		/* translators: %s: Name of current post */
		sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'vw-courier-serivce-pro'), get_the_title(get_the_ID()))
	);
	return ' &hellip; ' . $link;
}
add_filter('excerpt_more', 'vw_courier_serivce_pro_excerpt_more');

define('vw_courier_serivce_pro_THEME_DOC', 'https://www.vwthemesdemo.com/docs/vw-courier-serivce-pro/');
define('vw_courier_serivce_pro_SUPPORT', 'https://www.vwthemes.com/support/vw-theme/');
define('vw_courier_serivce_pro_FAQ', 'https://www.vwthemes.com/faqs/');
define('vw_courier_serivce_pro_CONTACT', 'https://www.vwthemes.com/contact/');
define('vw_courier_serivce_pro_REVIEW', 'https://www.vwthemes.com/topic/reviews-and-testimonials/');

define('vw_courier_serivce_pro_banner_link', 'https://www.vwthemes.com/premium-plugin/vw-title-banner-plugin/');
define('vw_courier_serivce_pro_social_media_plugin', 'https://www.vwthemes.com/free-plugin/vw-social-media/');
define('vw_courier_serivce_pro_preloader_plugin', 'https://www.vwthemes.com/free-plugin/vw-preloader/');
define('vw_courier_serivce_pro_accordion_plugin', 'https://www.vwthemes.com/free-plugin/vw-accordion/');
define('vw_courier_serivce_pro_gallery_link', 'https://www.vwthemes.com/premium-plugin/vw-gallery-plugin/');
define('vw_courier_serivce_pro_footer_link', 'https://www.youtube.com/watch?v=7BvTpLh-RB8');

define('IBTANA_THEME_LICENCE_ENDPOINT', 'https://vwthemes.com/wp-json/ibtana-licence/v2/');

//-------- Bundle Notice ---------
add_action('admin_notices', 'vw_theme_bundle_admin_notice');
function vw_theme_bundle_admin_notice()
{
	?>
	<div class="notice bundle-notice is-dismissible">
		<div class="theme_box">
			<h3>
				<?php echo esc_html('Thank You For Purchasing VW Logistics Shipping Pro Theme', 'vw-courier-serivce-pro'); ?>
			</h3>
			<p>
				<?php echo esc_html('Get our all', 'sirat-pro'); ?>
				<strong>
					<?php echo esc_html('120+ Premium Themes', 'vw-courier-serivce-pro'); ?>
				</strong>
				<?php echo esc_html('worth $7021 With Our', 'vw-courier-serivce-pro'); ?>
				<strong>
					<?php echo esc_html('WP Theme Bundle', 'vw-courier-serivce-pro'); ?>
				</strong>
				<?php echo esc_html('in just $89.', 'vw-courier-serivce-pro'); ?>
			</p>

		</div>
		<div class="bubdle_button">
			<a href="https://www.vwthemes.com/premium/all-themes/" class="button button-primary button-hero" target="_blank"
				rel="noopener">
				<?php echo esc_html('Get Bundle at $89', 'vw-courier-serivce-pro'); ?>
			</a>
		</div>
	</div>
	<?php
}

add_action('switch_theme', 'vw_courier_serivce_pro_deactivate');
function vw_courier_serivce_pro_deactivate()
{
	ThemeWhizzie::remove_the_theme_key();
	ThemeWhizzie::set_the_validation_status('false');
}

define('CUSTOM_TEXT_DOMAIN', 'vw-courier-serivce-pro');
add_filter('woocommerce_add_to_cart_fragments', 'vw_courier_serivce_pro_wc_refresh_mini_cart_count');
function vw_courier_serivce_pro_wc_refresh_mini_cart_count($fragments)
{
	ob_start();
	$items_count = WC()->cart->get_cart_contents_count();
	?>
	<span class="cart-value">
		<?php echo $items_count ? $items_count : '0'; ?>
	</span>
	<?php
	$fragments['.cart-value'] = ob_get_clean();
	return $fragments;
}

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns()
	{
		return 3; // 3 products per row
	}
}
// Remove default WC image sizes
function remove_wc_image_sizes()
{
	remove_image_size('woocommerce_thumbnail');
	remove_image_size('woocommerce_single');
	remove_image_size('woocommerce_gallery_thumbnail');
	remove_image_size('shop_thumbnail');
}
add_action('init', 'remove_wc_image_sizes');

add_filter('woocommerce_gallery_thumbnail_size', function ($size) {
	return 'full';
});

add_action('wp_footer', 'single_added_to_cart_event');

function aw_include_script()
{

	if (!did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}

	wp_enqueue_script('awscript', get_stylesheet_directory_uri() . '/assets/js/admin_script.js', array('jquery'), null, false);
}
add_action('admin_enqueue_scripts', 'aw_include_script');


function single_added_to_cart_event()
{
	if (isset($_POST['add-to-cart']) && isset($_POST['quantity'])) {
		// Get added to cart product ID (or variation ID) and quantity (if needed)
		$quantity = $_POST['quantity'];
		$product_id = isset($_POST['variation_id']) ? $_POST['variation_id'] : $_POST['add-to-cart'];

		// JS code goes here below
		?>
		<script>
			jQuery(function ($) {
				alert('Product added to cart');
			});
		</script>
		<?php
	}
}
// buy now button
function buy_now_submit_form()
{
	?>
	<script>
		jQuery(document).ready(function () {
			// listen if someone clicks 'Buy Now' button
			jQuery('#buy_now_button').click(function () {
				// set value to 1
				jQuery('#is_buy_now').val('1');
				//submit the form
				jQuery('form.cart').submit();
			});
		});
	</script>
	<?php
}
add_action('woocommerce_after_add_to_cart_form', 'buy_now_submit_form');

add_filter('woocommerce_add_to_cart_redirect', 'redirect_to_checkout');
function redirect_to_checkout($redirect_url)
{
	if (isset($_REQUEST['is_buy_now']) && $_REQUEST['is_buy_now']) {
		global $woocommerce;
		$redirect_url = wc_get_checkout_url();
	}
	return $redirect_url;
}


//additional info tab
add_filter('woocommerce_product_tabs', 'woo_rename_tabs', 98);
function woo_rename_tabs($tabs)
{

	$tabs['additional_information']['title'] = __('Additional Information');

	$tabs['description']['priority'] = 5; // Description first
	$tabs['reviews']['priority'] = 15; //  Reviews third
	$tabs['additional_information']['priority'] = 10;

	$tabs['additional_information']['title'] = __('Additional Information');
	$tabs['additional_information']['callback'] = 'woocommerce_additional_information_callback';

	$tabs['description']['title'] = __('Description');

	// Rename the additional information tab
	return $tabs;
}

function woocommerce_additional_information_callback()
{
	echo 'This is the content of the additional information';
}

if (is_admin()) {
	add_action('admin_menu', 'vw_courier_serivce_pro_bn_custom_meta_product');
}
function vw_courier_serivce_pro_bn_custom_meta_product()
{
	add_meta_box('bn_meta', __('Information Meta', 'vw-courier-serivce-pro'), 'vw_courier_serivce_pro_bn_meta_callback_product', 'product', 'normal', 'high');
	// add_post_meta(69, 'age', 25);
}
function vw_courier_serivce_pro_bn_meta_callback_product($post)
{
	wp_nonce_field(basename(__FILE__), 'bn_nonce');
	$bn_stored_meta = get_post_meta($post->ID);
	$meta_year = get_post_meta($post->ID, 'meta-year', true);
	$meta_make = get_post_meta($post->ID, 'meta-make', true);
	$meta_body_style = get_post_meta($post->ID, 'meta-body-style', true);
	$meta_brands = get_post_meta($post->ID, 'meta-brands', true);
	?>
	<div id="property_stuff">
		<table id="list-table">
			<tbody id="the-list" data-wp-lists="list:meta">
				<tr id="meta-1">
					<td class="left">
						<?php esc_html_e('Year', 'vw-courier-serivce-pro') ?>
					</td>
					<td class="left">
						<input type="text" name="meta-year" id="meta-year" value="<?php echo esc_html($meta_year); ?>" />
					</td>
				</tr>
				<tr>
					<td class="left">
						<?php esc_html_e('Make', 'vw-courier-serivce-pro') ?>
					</td>
					<td class="left">
						<input name="meta-make" id="meta-make" value="<?php echo esc_html($meta_make); ?>" />
					</td>
				</tr>
				<tr id="meta-1">
					<td class="left">
						<?php esc_html_e('Body Style', 'vw-courier-serivce-pro') ?>
					</td>
					<td class="left">
						<input name="meta-body-style" id="meta-body-style"
							value="<?php echo esc_html($meta_body_style); ?>" />
					</td>
				</tr>
				<tr id="meta-1">
					<td class="left">
						<?php esc_html_e('Brand', 'vw-courier-serivce-pro') ?>
					</td>
					<td class="left">
						<input name="meta-brands" id="meta-brands" value="<?php echo esc_html($meta_brands); ?>" />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
}
function vw_courier_serivce_pro_bn_meta_save_product($post_id)
{
	if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	// Team Meta 1
	if (isset($_POST['meta-year'])) {
		update_post_meta($post_id, 'meta-year', sanitize_text_field($_POST['meta-year']));
	}
	if (isset($_POST['meta-make'])) {
		update_post_meta($post_id, 'meta-make', sanitize_text_field($_POST['meta-make']));
	}
	// Team Meta 2
	if (isset($_POST['meta-body-style'])) {
		update_post_meta($post_id, 'meta-body-style', sanitize_text_field($_POST['meta-body-style']));
	}
	if (isset($_POST['meta-brands'])) {
		update_post_meta($post_id, 'meta-brands', sanitize_text_field($_POST['meta-brands']));
	}
	if (isset($_POST['meta-url'])) {
		update_post_meta($post_id, 'meta-url', esc_url_raw($_POST['meta-url']));
	}
}
add_action('save_post', 'vw_courier_serivce_pro_bn_meta_save_product');



// *************************custom post-types and their meta fields **************************************

function custom_post_type_services()
{
	$labels = array(
		'name' => 'Services',
		'singular_name' => 'Service',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Service',
		'edit_item' => 'Edit Service',
		'new_item' => 'New Service',
		'view_item' => 'View Service',
		'search_items' => 'Search Services',
		'not_found' => 'No services found',
		'not_found_in_trash' => 'No services found in Trash',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'services'),
		'menu_icon' => 'dashicons-portfolio',
		// Choose an appropriate icon
		'supports' => array('title', 'editor', 'page-attributes', 'post-thumbnails', 'thumbnail'),
	);

	register_post_type('services', $args);
}
add_action('init', 'custom_post_type_services');


function add_services_icon_meta_box()
{
	add_meta_box(
		'services_icon_meta_box',
		'Service Icon',
		'render_services_icon_meta_box',
		'services',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_services_icon_meta_box');

function render_services_icon_meta_box($post)
{
	wp_nonce_field('services_icon_nonce', 'services_icon_nonce');
	$icon = get_post_meta($post->ID, 'services_icon', true);

	echo '<label for="services_icon">Upload an icon for the service:</label>';
	echo '<input type="text" id="services_icon" name="services_icon" value="' . esc_attr($icon) . '" size="40">';
	echo '<input type="button" class="button button-primary" value="Upload Image" id="services_icon_upload">';
}

function save_services_icon_meta($post_id)
{
	if (!isset($_POST['services_icon_nonce']) || !wp_verify_nonce($_POST['services_icon_nonce'], 'services_icon_nonce')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (isset($_POST['services_icon'])) {
		update_post_meta($post_id, 'services_icon', sanitize_text_field($_POST['services_icon']));
	}
}
add_action('save_post', 'save_services_icon_meta');


function enqueue_services_admin_scripts($hook)
{
	if ('post.php' != $hook && 'post-new.php' != $hook) {
		return;
	}
	wp_enqueue_media();
	wp_enqueue_script('services-admin-script', get_template_directory_uri() . '/assets/js/services-admin.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'enqueue_services_admin_scripts');

function add_service_bottom_fields_meta_boxes()
{
	add_meta_box(
		'service_bottom_question_meta_box',
		'Service Bottom Question',
		'render_service_bottom_question_meta_box',
		'services',
		'normal',
		'high'
	);

	add_meta_box(
		'service_bottom_answer_meta_box',
		'Service Bottom Answer',
		'render_service_bottom_answer_meta_box',
		'services',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_service_bottom_fields_meta_boxes');

function render_service_bottom_question_meta_box($post)
{
	wp_nonce_field('service_bottom_question_nonce', 'service_bottom_question_nonce');
	$question = get_post_meta($post->ID, 'service_bottom_question', true);

	echo '<label for="service_bottom_question">Service Bottom Question:</label>';
	echo '<input type="text" id="service_bottom_question" name="service_bottom_question" value="' . esc_attr($question) . '" size="40">';
}

function render_service_bottom_answer_meta_box($post)
{
	wp_nonce_field('service_bottom_answer_nonce', 'service_bottom_answer_nonce');
	$answer = get_post_meta($post->ID, 'service_bottom_answer', true);

	echo '<label for="service_bottom_answer">Service Bottom Answer:</label>';
	echo '<textarea id="service_bottom_answer" name="service_bottom_answer" rows="4" cols="50">' . esc_textarea($answer) . '</textarea>';
}

function save_service_bottom_fields_meta($post_id)
{
	if (
		!isset($_POST['service_bottom_question_nonce'])
		|| !isset($_POST['service_bottom_answer_nonce'])
		|| !wp_verify_nonce($_POST['service_bottom_question_nonce'], 'service_bottom_question_nonce')
		|| !wp_verify_nonce($_POST['service_bottom_answer_nonce'], 'service_bottom_answer_nonce')
	) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (isset($_POST['service_bottom_question'])) {
		update_post_meta($post_id, 'service_bottom_question', sanitize_text_field($_POST['service_bottom_question']));
	}

	if (isset($_POST['service_bottom_answer'])) {
		update_post_meta($post_id, 'service_bottom_answer', sanitize_text_field($_POST['service_bottom_answer']));
	}
}
add_action('save_post', 'save_service_bottom_fields_meta');


// **************************** Our Team ****************************


// ******************************* Testimonials section ************************
function custom_testimonials_post_type()
{
	$labels = array(
		'name' => 'Testimonials',
		'singular_name' => 'Testimonial',
		'menu_name' => 'Testimonials',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Testimonial',
		'edit_item' => 'Edit Testimonial',
		'new_item' => 'New Testimonial',
		'view_item' => 'View Testimonial',
		'search_items' => 'Search Testimonials',
		'not_found' => 'No Testimonials found',
		'not_found_in_trash' => 'No Testimonials found in Trash',
		'parent_item_colon' => 'Parent Testimonial:',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'testimonials'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor', 'thumbnail'),
		// You can customize the supported features
	);

	register_post_type('testimonials', $args);
	function add_testimonial_meta_box()
	{
		add_meta_box(
			'testimonial_meta_box',
			'Testimonial Details',
			'display_testimonial_meta_box',
			'testimonials',
			'normal',
			'high'
		);
	}
	add_action('add_meta_boxes', 'add_testimonial_meta_box');

	function display_testimonial_meta_box($post)
	{
		$customer_name = get_post_meta($post->ID, '_customer_name', true);
		$service_used = get_post_meta($post->ID, '_service_used', true);
		?>

		<label for="customer_name">Customer Name:</label>
		<input type="text" id="customer_name" name="customer_name" value="<?php echo esc_attr($customer_name); ?>"><br>

		<label for="service_used">Service Used:</label>
		<input type="text" id="service_used" name="service_used" value="<?php echo esc_attr($service_used); ?>"><br>

		<?php
	}

	function save_testimonial_meta_data($post_id)
	{
		if (isset($_POST['customer_name'])) {
			update_post_meta($post_id, '_customer_name', sanitize_text_field($_POST['customer_name']));
		}

		if (isset($_POST['service_used'])) {
			update_post_meta($post_id, '_service_used', sanitize_text_field($_POST['service_used']));
		}
	}
	add_action('save_post', 'save_testimonial_meta_data');

}
add_action('init', 'custom_testimonials_post_type');




// post meta fields 
function custom_add_post_meta_field()
{
	add_meta_box(
		'custom_post_paras',
		'Custom Post Paragraphs',
		'custom_render_meta_field',
		'post',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'custom_add_post_meta_field');

function custom_render_meta_field($post)
{
	$post_para_1 = get_post_meta($post->ID, 'post_para_1', true);
	$post_para_2 = get_post_meta($post->ID, 'post_para_2', true);
	$post_para_3 = get_post_meta($post->ID, 'post_para_3', true);
	$post_que = get_post_meta($post->ID, 'post_que', true);
	$post_image_1 = get_post_meta($post->ID, 'post_image_1', true);
	$post_image_2 = get_post_meta($post->ID, 'post_image_2', true);
	?>
	<label for="post_para_1">Custom Paragraph 1:</label>
	<textarea style="width:100%" id="post_para_1" name="post_para_1"><?php echo esc_textarea($post_para_1); ?></textarea>

	<label for="post_para_2">Custom Paragraph 2:</label>
	<textarea style="width:100%" id="post_para_2" name="post_para_2"><?php echo esc_textarea($post_para_2); ?></textarea>

	<label for="post_para_3">Custom Paragraph 3:</label>
	<textarea style="width:100%" id="post_para_3" name="post_para_3"><?php echo esc_textarea($post_para_3); ?></textarea>

	<label for="post_que">Post Question:</label>
	<textarea style="width:100%" id="post_que" name="post_que"><?php echo esc_textarea($post_que); ?></textarea>

	<label for="post_image_1">Image 1:</label>
	<div class="custom-media-uploader" style="width:100%">
		<input type="text" id="post_image_1" name="post_image_1" value="<?php echo esc_attr($post_image_1); ?>" />
		<input type="button" class="button button-secondary custom-media-upload" value="Upload Image" />
	</div>

	<label for="post_image_2">Image 2:</label>
	<div class="custom-media-uploader" style="width:100%">
		<input type="text" id="post_image_2" name="post_image_2" value="<?php echo esc_attr($post_image_2); ?>" />
		<input type="button" class="button button-secondary custom-media-upload" value="Upload Image" />
	</div>

	<script>
		jQuery(document).ready(function ($) {
			$('.custom-media-upload').click(function (e) {
				e.preventDefault();
				var customUploader = wp.media({
					title: 'Choose Image',
					button: { text: 'Choose Image' },
					multiple: false
				});
				customUploader.on('select', function () {
					var attachment = customUploader.state().get('selection').first().toJSON();
					$(this).prev('input[type="text"]').val(attachment.url);
				});
				customUploader.open();
			});
		});
	</script>
	<?php
}

function custom_save_post_meta($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	if (!current_user_can('edit_post', $post_id))
		return;

	$custom_fields = ['post_para_1', 'post_para_2', 'post_para_3', 'post_que'];

	foreach ($custom_fields as $field) {
		if (isset($_POST[$field])) {
			update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
		}
	}
}
add_action('save_post', 'custom_save_post_meta');














// ******************************* Testimonials section ************************


// Register Custom Post Type

function create_our_team_post_type()
{
	$labels = array(
		'name' => 'Our Team',
		'singular_name' => 'Team Member',
		'menu_name' => 'Our Team',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Team Member',
		'edit_item' => 'Edit Team Member',
		'new_item' => 'New Team Member',
		'view_item' => 'View Team Member',
		'view_items' => 'View Team Members',
		'search_items' => 'Search Team Members',
		'not_found' => 'No Team Members found',
		'not_found_in_trash' => 'No Team Members found in Trash',
		'parent_item_colon' => 'Parent Team Member:',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-groups',
		// You can choose a different dashicon or use a URL to a custom icon
		'menu_position' => 20,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('our_team', $args);
	function our_team_add_designation_field()
	{
		add_meta_box(
			'our_team_designation',
			'Designation',
			'our_team_designation_field_callback',
			'our_team',
			'normal',
			'default'
		);
	}
	add_action('add_meta_boxes', 'our_team_add_designation_field');

	function our_team_designation_field_callback($post)
	{
		$designation = get_post_meta($post->ID, '_our_team_designation', true);

		echo '<label for="our_team_designation">Designation: </label>';
		echo '<input type="text" id="our_team_designation" name="our_team_designation" value="' . esc_attr($designation) . '" style="width: 100%;">';
	}

	function our_team_save_designation_field($post_id)
	{
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		if (isset($_POST['our_team_designation'])) {
			update_post_meta($post_id, '_our_team_designation', sanitize_text_field($_POST['our_team_designation']));
		}
	}
	add_action('save_post', 'our_team_save_designation_field');

	function our_team_add_social_fields()
	{
		add_meta_box(
			'our_team_social',
			'Social Media Links',
			'our_team_social_field_callback',
			'our_team',
			'normal',
			'default'
		);
	}
	add_action('add_meta_boxes', 'our_team_add_social_fields');

	function our_team_social_field_callback($post)
	{
		$facebook = get_post_meta($post->ID, '_our_team_facebook', true);
		$twitter = get_post_meta($post->ID, '_our_team_twitter', true);
		$instagram = get_post_meta($post->ID, '_our_team_instagram', true);
		$whatsapp = get_post_meta($post->ID, '_our_team_whatsapp', true);

		echo '<label for="our_team_facebook">Social Icon 1 URL: </label>';
		echo '<input type="text" id="our_team_facebook" name="our_team_facebook" value="' . esc_attr($facebook) . '" style="width: 100%;"><br>';

		echo '<label for="our_team_twitter">Social Icon 2 URL: </label>';
		echo '<input type="text" id="our_team_twitter" name="our_team_twitter" value="' . esc_attr($twitter) . '" style="width: 100%;"><br>';

		echo '<label for="our_team_instagram">Social Icon 3 URL: </label>';
		echo '<input type="text" id="our_team_instagram" name="our_team_instagram" value="' . esc_attr($instagram) . '" style="width: 100%;"><br>';

		echo '<label for="our_team_whatsapp">Social Icon 4 URL: </label>';
		echo '<input type="text" id="our_team_whatsapp" name="our_team_whatsapp" value="' . esc_attr($whatsapp) . '" style="width: 100%;">';
	}

	function our_team_save_social_fields($post_id)
	{
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		$fields = array('facebook', 'twitter', 'instagram', 'whatsapp');
		foreach ($fields as $field) {
			if (isset($_POST['our_team_' . $field])) {
				update_post_meta($post_id, '_our_team_' . $field, sanitize_text_field($_POST['our_team_' . $field]));
			}
		}
	}
	add_action('save_post', 'our_team_save_social_fields');



}
add_action('init', 'create_our_team_post_type');



// *************************custom post-types and their meta fields **************************************

function get_variation_data()
{
	$variation_id = $_POST['variation_id'];

	$variation = wc_get_product($variation_id);

	$variation_data = array(
		'price_html' => $variation->get_price_html(),
		'image_html' => $variation->get_image()
	);

	wp_send_json($variation_data);
}
add_action('wp_ajax_get_variation_data', 'get_variation_data');
add_action('wp_ajax_nopriv_get_variation_data', 'get_variation_data');



// -*-*--*-*-*-*-*-*-*-*-* listing Start-*-*-*-*-*-*-*-*-*-*-*
if (is_admin()) {
	add_action('admin_menu', 'vw_courier_serivce_pro_posttype_bn_custom_meta_listing');
}
function vw_courier_serivce_pro_posttype_bn_custom_meta_listing()
{
	add_meta_box('bn_meta', __('Single Page Details', 'vw-courier-serivce-pro-posttype'), 'vw_courier_serivce_pro_posttype_bn_meta_callback_listing', 'auto-listing', 'normal', 'high');
}
function vw_courier_serivce_pro_posttype_bn_meta_callback_listing($post)
{
	wp_nonce_field(basename(__FILE__), 'bn_nonce');
	$bn_stored_meta = get_post_meta($post->ID);
	$meta_list_para = get_post_meta($post->ID, 'meta-list-para', true);
	$meta_list_para1 = get_post_meta($post->ID, 'meta-list-para1', true);
	$meta_list_para2 = get_post_meta($post->ID, 'meta-list-para2', true);
	$meta_list_para3 = get_post_meta($post->ID, 'meta-list-para3', true);
	$meta_list_para4 = get_post_meta($post->ID, 'meta-list-para4', true);
	$meta_list_para5 = get_post_meta($post->ID, 'meta-list-para5', true);
	$meta_list_para6 = get_post_meta($post->ID, 'meta-list-para6', true);

	?>
	<div>
		<label>
			<?php esc_html_e('Single List 1', 'vw-courier-serivce-pro-posttype') ?>
		</label>
		<div><input class="mb-2" name="meta-list-para" id="meta-list-para"
				value="<?php echo esc_html($meta_list_para); ?>" />
		</div>
	</div>
	<div>
		<label>
			<?php esc_html_e('Single List 2', 'vw-courier-serivce-pro-posttype') ?>
		</label>
		<div><input name="meta-list-para1" id="meta-list-para1" value="<?php echo esc_html($meta_list_para1); ?>" />
		</div>
	</div>
	<div>
		<label>
			<?php esc_html_e('Single List 2', 'vw-courier-serivce-pro-posttype') ?>
		</label>
		<div><input name="meta-list-para2" id="meta-list-para2" value="<?php echo esc_html($meta_list_para2); ?>" />
		</div>
	</div>
	<div>
		<label>
			<?php esc_html_e('Single List 3', 'vw-courier-serivce-pro-posttype') ?>
		</label>
		<div><input name="meta-list-para3" id="meta-list-para3" value="<?php echo esc_html($meta_list_para3); ?>" />
		</div>
	</div>
	<div>
		<label>
			<?php esc_html_e('Single List 4', 'vw-courier-serivce-pro-posttype') ?>
		</label>
		<div><input name="meta-list-para4" id="meta-list-para4" value="<?php echo esc_html($meta_list_para4); ?>" />
		</div>
	</div>
	<div>
		<label>
			<?php esc_html_e('Single List 5', 'vw-courier-serivce-pro-posttype') ?>
		</label>
		<div><input name="meta-list-para5" id="meta-list-para5" value="<?php echo esc_html($meta_list_para5); ?>" />
		</div>
	</div>
	<div>
		<label>
			<?php esc_html_e('Single List 6', 'vw-courier-serivce-pro-posttype') ?>
		</label>
		<div><input name="meta-list-para6" id="meta-list-para6" value="<?php echo esc_html($meta_list_para6); ?>" />
		</div>
	</div>
	<?php
}
function vw_courier_serivce_pro_posttype_bn_meta_save_news($post_id)
{
	if (!isset($_POST['bn_nonce']) || !wp_verify_nonce($_POST['bn_nonce'], basename(__FILE__))) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	// Team Meta 1
	if (isset($_POST['meta-list-para'])) {
		update_post_meta($post_id, 'meta-list-para', sanitize_text_field($_POST['meta-list-para']));
	}

	if (isset($_POST['meta-list-para1'])) {
		update_post_meta($post_id, 'meta-list-para1', sanitize_text_field($_POST['meta-list-para1']));
	}

	if (isset($_POST['meta-list-para2'])) {
		update_post_meta($post_id, 'meta-list-para2', sanitize_text_field($_POST['meta-list-para2']));
	}

	if (isset($_POST['meta-list-para3'])) {
		update_post_meta($post_id, 'meta_list_para3', sanitize_text_field($_POST['meta_list_para3']));
	}

	if (isset($_POST['meta-list-para4'])) {
		update_post_meta($post_id, 'meta-list-para4', sanitize_text_field($_POST['meta-list-para4']));
	}

	if (isset($_POST['meta-list-para4'])) {
		update_post_meta($post_id, 'meta_list_para4', sanitize_text_field($_POST['meta_list_para4']));
	}

	if (isset($_POST['meta-list-para5'])) {
		update_post_meta($post_id, 'meta_list_para5', sanitize_text_field($_POST['meta_list_para5']));
	}

	if (isset($_POST['meta-list-para6'])) {
		update_post_meta($post_id, 'meta_list_para6', sanitize_text_field($_POST['meta_list_para6']));
	}
}
add_action('save_post', 'vw_courier_serivce_pro_posttype_bn_meta_save_news');
// -*-*--*-*-*-*-*-*-*-*-* listing End -*-*-*-*-*-*-*-*-*-*-*



ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '55M');


// services widget area 
function custom_services_sidebar()
{
	register_sidebar(
		array(
			'name' => 'Services Sidebar',
			'id' => 'services-sidebar',
			'description' => 'Widget area for displaying services.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		)
	);
}
add_action('widgets_init', 'custom_services_sidebar');

class Custom_Services_Widget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct(
			'custom_services_widget',
			'Custom Services Widget',
			array('description' => 'A widget to display a list of custom post type "services."')
		);
	}

	public function widget($args, $instance)
	{
		echo $args['before_widget'];
		$title = apply_filters('widget_title', $instance['title']);
		$current_service_id = 0; // Initialize the current service ID variable

		// Check if the current page is a single service post
		if (is_singular('services')) {
			global $post;
			$current_service_id = $post->ID;
		}

		if (!empty($title)) {
			echo $args['before_title'] . $title . $args['after_title'];
		} else {
			echo $args['before_title'] . 'Services' . $args['after_title'];
		}

		$query_args = array(
			'post_type' => 'services',
			'posts_per_page' => -1,
		);

		$services = new WP_Query($query_args);

		if ($services->have_posts()):
			echo '<ul class="services-list">';
			while ($services->have_posts()):
				$services->the_post();
				$service_id = get_the_ID();
				$active_class = ($service_id === $current_service_id) ? 'active' : ''; // Add 'active' class if it's the current service
				echo '<li class="service-title ' . $active_class . '"><i class="fa-solid fa-chevron-down"></i><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
			endwhile;
			echo '</ul>';
			wp_reset_postdata();
		else:
			echo '<p>No services found.</p>';
		endif;

		echo $args['after_widget'];
	}

	public function form($instance)
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
				name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php
	}

	public function update($new_instance, $old_instance)
	{
		// This method handles updating the widget's settings when saved in the WordPress admin, but you have it set to do nothing.
		// You may want to add update logic if you want to allow widget customization in the admin.
		// Update the widget's settings when saved in the WordPress admin
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field($new_instance['title']);
		return $instance;
	}
}

// Register the custom widget
function register_custom_services_widget()
{
	register_widget('Custom_Services_Widget');
}
add_action('widgets_init', 'register_custom_services_widget');

function add_custom_widget_to_sidebar()
{
	$sidebar_id = 'services-sidebar'; // Replace with the actual sidebar ID
	$widget_id = 'custom_services_widget'; // Replace with your widget's ID

	if (is_active_sidebar($sidebar_id)) {
		$widgets = wp_get_sidebars_widgets();
		if (!isset($widgets[$sidebar_id])) {
			$widgets[$sidebar_id] = array();
		}

		// Add your custom widget to the sidebar by default
		if (!in_array($widget_id, $widgets[$sidebar_id])) {
			array_push($widgets[$sidebar_id], $widget_id);
			wp_set_sidebars_widgets($widgets);
		}
	}
}
add_action('after_switch_theme', 'add_custom_widget_to_sidebar');



// phone number wdget 
class Custom_Image_Phone_Widget extends WP_Widget
{
	public function __construct()
	{
		parent::__construct(
			'custom_image_phone_widget',
			'Image and Phone Widget',
			array(
				'description' => 'A custom widget for adding an image and a phone number.',
			)
		);
	}

	public function widget($args, $instance)
	{
		extract($args);

		$title = apply_filters('widget_title', $instance['title']);
		$phone = esc_html($instance['phone']);
		$image_id = intval($instance['image_id']);
		$image_url = wp_get_attachment_url($image_id);

		echo $before_widget;

		if (!empty($title)) {
			echo $before_title . $title . $after_title;
		}

		if (!empty($image_url)) {
			echo '<img src="' . $image_url . '" alt="Image" />';
		}

		if (!empty($phone)) {
			echo '<p>Phone Number: ' . $phone . '</p>';
		}

		echo $after_widget;
	}

	public function form($instance)
	{
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
		$image_id = intval($instance['image_id']);

		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Widget Title:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
				name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('image_id'); ?>">Image Upload:</label>
			<input class="widefat custom_media_id" id="<?php echo $this->get_field_id('image_id'); ?>"
				name="<?php echo $this->get_field_name('image_id'); ?>" type="hidden" value="<?php echo $image_id; ?>" />
		<div class="custom_media_preview">
			<?php
			if (!empty($image_id)) {
				echo wp_get_attachment_image($image_id, 'thumbnail');
			}
			?>
		</div>
		<input type="button" class="button custom_media_button" value="Upload Image" onclick="customMediaUploader(this);" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>">Phone Number:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>"
				name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" />
		</p>

		<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['phone'] = (!empty($new_instance['phone'])) ? strip_tags($new_instance['phone']) : '';
		$instance['image_id'] = intval($new_instance['image_id']);
		return $instance;
	}
}

function register_custom_image_phone_widget()
{
	register_widget('Custom_Image_Phone_Widget');
}

add_action('widgets_init', 'register_custom_image_phone_widget');









// widget area end 

/**
 * Exclude products from a particular category on the shop page
 */
function custom_pre_get_posts_query($q)
{

	$tax_query = (array) $q->get('tax_query');

	$tax_query[] = array(
		'taxonomy' => 'product_cat',
		'field' => 'slug',
		'terms' => array('Galore'),
		// Don't display products in the clothing category on the shop page.
		'operator' => 'NOT IN'
	);


	$q->set('tax_query', $tax_query);

}
add_action('woocommerce_product_query', 'custom_pre_get_posts_query');