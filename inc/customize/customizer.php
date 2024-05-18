<?php
/**
 * vw-courier-serivce-pro Theme Customizer
 *
 * @package vw-courier-serivce-pro
 */
/**
 * Loads custom control for layout settings
 */
function vw_courier_serivce_pro_custom_controls()
{
    require_once get_template_directory() . '/inc/customize/controls/admin/customize-texteditor-control.php';
    require_once get_template_directory() . '/inc/customize/controls/custom-controls.php';
    require_once get_template_directory() . '/inc/customize/controls/button-controls.php';

    // Inlcude the Alpha Color Picker control file.
    require_once get_template_directory() . '/inc/customize/controls/alpha-color-picker.php';
    get_stylesheet_directory_uri() . '/assets/js/alpha-color-picker.js';
    get_stylesheet_directory_uri() . '/assets/css/alpha-color-picker.css';

}
add_action('customize_register', 'vw_courier_serivce_pro_custom_controls');
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_courier_serivce_pro_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
        'selector' => '.logo a',
        'render_callback' => 'twentyfifteen_customize_partial_blogname',
    ));
    $wp_customize->selective_refresh->add_partial('blogdescription', array(
        'selector' => '.site-description',
        'render_callback' => 'twentyfifteen_customize_partial_blogdescription',
    ));

    $wp_customize->add_setting('vw_courier_serivce_pro_display_title', array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control('vw_courier_serivce_pro_display_title', array(
        'type' => 'checkbox',
        'label' => __('Show Title', 'vw-courier-serivce-pro'),
        'section' => 'title_tagline',
    )
    );
    $wp_customize->add_setting('vw_courier_serivce_pro_display_tagline', array(
        'default' => 'false',
        'sanitize_callback' => 'sanitize_text_field'
    )
    );
    $wp_customize->add_control('vw_courier_serivce_pro_display_tagline', array(
        'type' => 'checkbox',
        'label' => __('Show Tagline', 'vw-courier-serivce-pro'),
        'section' => 'title_tagline',
    )
    );
    //add home page setting pannel
    $wp_customize->add_panel('vw_courier_serivce_pro_panel_id', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Theme Settings', 'vw-courier-serivce-pro'),
        'description' => __('Description of what this panel does.', 'vw-courier-serivce-pro'),
    ));
    $font_array = array(
        '' => __('No Fonts', 'vw-courier-serivce-pro'),
        'Abril Fatface' => __('Abril Fatface', 'vw-courier-serivce-pro'),
        'Acme' => __('Acme', 'vw-courier-serivce-pro'),
        'Anton' => __('Anton', 'vw-courier-serivce-pro'),
        'Architects Daughter' => __('Architects Daughter', 'vw-courier-serivce-pro'),
        'Arimo' => __('Arimo', 'vw-courier-serivce-pro'),
        'Arsenal' => __('Arsenal', 'vw-courier-serivce-pro'),
        'Arvo' => __('Arvo', 'vw-courier-serivce-pro'),
        'Alegreya' => __('Alegreya', 'vw-courier-serivce-pro'),
        'Alfa Slab One' => __('Alfa Slab One', 'vw-courier-serivce-pro'),
        'Averia Serif Libre' => __('Averia Serif Libre', 'vw-courier-serivce-pro'),
        'Bangers' => __('Bangers', 'vw-courier-serivce-pro'),
        'Boogaloo' => __('Boogaloo', 'vw-courier-serivce-pro'),
        'Bad Script' => __('Bad Script', 'vw-courier-serivce-pro'),
        'Bitter' => __('Bitter', 'vw-courier-serivce-pro'),
        'Bree Serif' => __('Bree Serif', 'vw-courier-serivce-pro'),
        'BenchNine' => __('BenchNine', 'vw-courier-serivce-pro'),
        'Cabin' => __('Cabin', 'vw-courier-serivce-pro'),
        'Cardo' => __('Cardo', 'vw-courier-serivce-pro'),
        'Courgette' => __('Courgette', 'vw-courier-serivce-pro'),
        'Cherry Swash' => __('Cherry Swash', 'vw-courier-serivce-pro'),
        'Cormorant Garamond' => __('Cormorant Garamond', 'vw-courier-serivce-pro'),
        'Crimson Text' => __('Crimson Text', 'vw-courier-serivce-pro'),
        'Cuprum' => __('Cuprum', 'vw-courier-serivce-pro'),
        'Cookie' => __('Cookie', 'vw-courier-serivce-pro'),
        'Chewy' => __('Chewy', 'vw-courier-serivce-pro'),
        'Days One' => __('Days One', 'vw-courier-serivce-pro'),
        'Dosis' => __('Dosis', 'vw-courier-serivce-pro'),
        'Economica' => __('Economica', 'vw-courier-serivce-pro'),
        'Fredoka One' => __('Fredoka One', 'vw-courier-serivce-pro'),
        'Fjalla One' => __('Fjalla One', 'vw-courier-serivce-pro'),
        'Francois One' => __('Francois One', 'vw-courier-serivce-pro'),
        'Frank Ruhl Libre' => __('Frank Ruhl Libre', 'vw-courier-serivce-pro'),
        'Gloria Hallelujah' => __('Gloria Hallelujah', 'vw-courier-serivce-pro'),
        'Great Vibes' => __('Great Vibes', 'vw-courier-serivce-pro'),
        'Handlee' => __('Handlee', 'vw-courier-serivce-pro'),
        'Hammersmith One' => __('Hammersmith One', 'vw-courier-serivce-pro'),
        'Inconsolata' => __('Inconsolata', 'vw-courier-serivce-pro'),
        'Indie Flower' => __('Indie Flower', 'vw-courier-serivce-pro'),
        'IM Fell English SC' => __('IM Fell English SC', 'vw-courier-serivce-pro'),
        'Julius Sans One' => __('Julius Sans One', 'vw-courier-serivce-pro'),
        'Josefin Slab' => __('Josefin Slab', 'vw-courier-serivce-pro'),
        'Josefin Sans' => __('Josefin Sans', 'vw-courier-serivce-pro'),
        'Kanit' => __('Kanit', 'vw-courier-serivce-pro'),
        'Lobster' => __('Lobster', 'vw-courier-serivce-pro'),
        'Lato' => __('Lato', 'vw-courier-serivce-pro'),
        'Lora' => __('Lora', 'vw-courier-serivce-pro'),
        'Libre Baskerville' => __('Libre Baskerville', 'vw-courier-serivce-pro'),
        'Lobster Two' => __('Lobster Two', 'vw-courier-serivce-pro'),
        'Merriweather' => __('Merriweather', 'vw-courier-serivce-pro'),
        'Monda' => __('Monda', 'vw-courier-serivce-pro'),
        'Montserrat' => __('Montserrat', 'vw-courier-serivce-pro'),
        'Muli' => __('Muli', 'vw-courier-serivce-pro'),
        'Marck Script' => __('Marck Script', 'vw-courier-serivce-pro'),
        'Noto Serif' => __('Noto Serif', 'vw-courier-serivce-pro'),
        'Open Sans' => __('Open Sans', 'vw-courier-serivce-pro'),
        'Overpass' => __('Overpass', 'vw-courier-serivce-pro'),
        'Overpass Mono' => __('Overpass Mono', 'vw-courier-serivce-pro'),
        'Oxygen' => __('Oxygen', 'vw-courier-serivce-pro'),
        'Orbitron' => __('Orbitron', 'vw-courier-serivce-pro'),
        'Patua One' => __('Patua One', 'vw-courier-serivce-pro'),
        'Pacifico' => __('Pacifico', 'vw-courier-serivce-pro'),
        'Padauk' => __('Padauk', 'vw-courier-serivce-pro'),
        'Playball' => __('Playball', 'vw-courier-serivce-pro'),
        'Playfair Display' => __('Playfair Display', 'vw-courier-serivce-pro'),
        'PT Sans' => __('PT Sans', 'vw-courier-serivce-pro'),
        'Philosopher' => __('Philosopher', 'vw-courier-serivce-pro'),
        'Permanent Marker' => __('Permanent Marker', 'vw-courier-serivce-pro'),
        'Poiret One' => __('Poiret One', 'vw-courier-serivce-pro'),
        'Quicksand' => __('Quicksand', 'vw-courier-serivce-pro'),
        'Quattrocento Sans' => __('Quattrocento Sans', 'vw-courier-serivce-pro'),
        'Raleway' => __('Raleway', 'vw-courier-serivce-pro'),
        'Rubik' => __('Rubik', 'vw-courier-serivce-pro'),
        'Rokkitt' => __('Rokkitt', 'vw-courier-serivce-pro'),
        'Russo One' => __('Russo One', 'vw-courier-serivce-pro'),
        'Righteous' => __('Righteous', 'vw-courier-serivce-pro'),
        'Slabo' => __('Slabo', 'vw-courier-serivce-pro'),
        'Source Sans Pro' => __('Source Sans Pro', 'vw-courier-serivce-pro'),
        'Shadows Into Light Two' => __('Shadows Into Light Two', 'vw-courier-serivce-pro'),
        'Shadows Into Light' => __('Shadows Into Light', 'vw-courier-serivce-pro'),
        'Sacramento' => __('Sacramento', 'vw-courier-serivce-pro'),
        'Shrikhand' => __('Shrikhand', 'vw-courier-serivce-pro'),
        'Tangerine' => __('Tangerine', 'vw-courier-serivce-pro'),
        'Ubuntu' => __('Ubuntu', 'vw-courier-serivce-pro'),
        'VT323' => __('VT323', 'vw-courier-serivce-pro'),
        'Varela Round' => __('Varela Round', 'vw-courier-serivce-pro'),
        'Vampiro One' => __('Vampiro One', 'vw-courier-serivce-pro'),
        'Vollkorn' => __('Vollkorn', 'vw-courier-serivce-pro'),
        'Volkhov' => __('Volkhov', 'vw-courier-serivce-pro'),
        'Yanone Kaffeesatz' => __('Yanone Kaffeesatz', 'vw-courier-serivce-pro')
    );

    $Check_option = array(
        '' => __('Not Selected', 'logistics_services_pr'),
        'Check' => __('Check', 'vw_courier_serivce_pro'),
        'Uncheck' => __('Cross', 'vw_courier_serivce_pro'),
    );
    $font_weight_array = array(
        '' => __('Not Selected','vw-courier-serivce-pro'),
        '100' => __('100','vw-courier-serivce-pro'),
        '200' => __('200', 'vw-courier-serivce-pro'),
        '300' => __('300', 'vw-courier-serivce-pro'),
        '400' => __('400', 'vw-courier-serivce-pro'),
        '500' => __('500', 'vw-courier-serivce-pro'),
        '600' => __('600', 'vw-courier-serivce-pro'),
        '700' => __('700', 'vw-courier-serivce-pro'),
        '800' => __('800', 'vw-courier-serivce-pro'),
        '900' => __('900', 'vw-courier-serivce-pro'),
    );
    require_once get_template_directory() . '/inc/customize/controls/slider-line-control/slider-line-control.php';
    require_once get_template_directory() . '/inc/customize/controls/social-icons/social-icon-picker.php';

    require_once get_template_directory() . '/inc/customize/controls/customizer-text-radio-button/class/customizer-text-radio-button.php';
    require_once get_template_directory() . '/inc/customize/controls/customizer-seperator/class/customizer-seperator.php';
    require_once get_template_directory() . '/inc/customize/controls/customizer-notice/class/customizer-notice.php';

    require_once get_template_directory() . '/inc/customize/controls/customize-repeater/customize-repeater.php';

    if ((ThemeWhizzie::get_the_validation_status() === 'true') && (ThemeWhizzie::get_the_suspension_status() == 'false')) {
        require_once get_template_directory() . '/inc/customize/sections/customizer-custom-variables.php';
        // require_once get_template_directory() . '/inc/customize/sections/customizer-part-social-icons.php';
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-header.php';
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-slide.php';
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-home.php';
        require_once get_template_directory() . '/inc/customize/sections/customizer-part-footer.php';
        require_once get_template_directory() . '/inc/customize/sections/customizer-other-page.php';

    }
}
add_action('customize_register', 'vw_courier_serivce_pro_customize_register');
//Integer
function vw_courier_serivce_pro_sanitize_integer($input)
{
    if (is_numeric($input)) {
        return intval($input);
    }
}

/* Logo Resizer */
load_template(trailingslashit(get_template_directory()) . '/inc/logo/logo-resizer.php');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_courier_serivce_pro_customize
{
    /**
     * Returns the instance.
     *
     * @since  1.0.0
     * @access public
     * @return object
     */
    public static function get_instance()
    {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new self;
            $instance->setup_actions();
        }
        return $instance;
    }
    /**
     * Constructor method.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function __construct()
    {
    }
    /**
     * Sets up initial actions.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setup_actions()
    {
        // Register panels, sections, settings, controls, and partials.
        add_action('customize_register', array($this, 'sections'));
        add_action('customize_register', array($this, 'bundle'));
        // Register scripts and styles for the controls.
        add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
    }
    /**
     * Sets up the customizer sections.
     *
     * @since  1.0.0
     * @access public
     * @param  object  $manager
     * @return void
     */
    public function sections($manager)
    {
        // Load custom sections.
        load_template(trailingslashit(get_template_directory()) . '/inc/review-section.php');
        // Register custom section types.
        $manager->register_section_type('vw_courier_serivce_pro_customize_reviews_and_testimonials');
        // Register sections.
        $manager->add_section(
            new vw_courier_serivce_pro_customize_reviews_and_testimonials(
                $manager,
                'example_1',
                array(
                    'title' => esc_html__('Review & Testimonial', 'vw-courier-serivce-pro'),
                    'reviews_and_testimonials_text' => esc_html__('Rate Us', 'vw-courier-serivce-pro'),
                    'reviews_and_testimonials_url' => 'https://www.vwthemes.com/topic/reviews-and-testimonials/',
                    'priority' => 1,
                )
            )
        );
    }

    public function bundle($manager)
    {
        // Load custom sections.
        load_template(trailingslashit(get_template_directory()) . '/inc/review-section.php');
        // Register custom section types.
        $manager->register_section_type('vw_courier_serivce_pro_customize_reviews_and_testimonials');
        // Register sections.
        $manager->add_section(
            new vw_courier_serivce_pro_customize_reviews_and_testimonials(
                $manager,
                'example_2',
                array(
                    'title' => esc_html__('Theme Bundle', 'vw-courier-serivce-pro'),
                    'reviews_and_testimonials_text' => esc_html__('Buy Now', 'vw-courier-serivce-pro'),
                    'reviews_and_testimonials_url' => 'https://www.vwthemes.com/premium/theme-bundle/',
                    'priority' => 2,
                )
            )
        );
    }
    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts()
    {
        wp_enqueue_script('vw-courier-serivce-pro-customize-controls', trailingslashit(get_template_directory_uri()) . '/assets/js/customize-controls.js', array('customize-controls'));
        wp_enqueue_style('vw-courier-serivce-pro-customize-controls', trailingslashit(get_template_directory_uri()) . '/assets/css/customize-controls.css');
    }
}
// Doing this customizer thang!
vw_courier_serivce_pro_customize::get_instance();