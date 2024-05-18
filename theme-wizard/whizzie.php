<?php
/**
 * Wizard
 *
 * @package Whizzie
 * @author Catapult Themes
 * @since 1.0.0
 */


class ThemeWhizzie
{

	public static $is_valid_key = 'false';
	public static $theme_key = '';

	protected $version = '1.1.0';

	/** @var string Current theme name, used as namespace in actions. */
	protected $theme_name = '';
	protected $theme_title = '';

	/** @var string Wizard page slug and title. */
	protected $page_slug = '';
	protected $page_title = '';

	/** @var array Wizard steps set by user. */
	protected $config_steps = array();

	/**
	 * Relative plugin url for this plugin folder
	 * @since 1.0.0
	 * @var string
	 */
	protected $plugin_url = '';

	/**
	 * TGMPA instance storage
	 *
	 * @var object
	 */
	protected $tgmpa_instance;

	/**
	 * TGMPA Menu slug
	 *
	 * @var string
	 */
	protected $tgmpa_menu_slug = 'tgmpa-install-plugins';

	/**
	 * TGMPA Menu url
	 *
	 * @var string
	 */
	protected $tgmpa_url = 'themes.php?page=tgmpa-install-plugins';

	// Where to find the widget.wie file
	protected $widget_file_url = '';

	/**
	 * Constructor
	 *
	 * @param $vw_courier_serivce_pro_config	Our config parameters
	 */
	public function __construct($vw_courier_serivce_pro_config)
	{
		$this->set_vars($vw_courier_serivce_pro_config);
		$this->init();

		include_once (ABSPATH . 'wp-admin/includes/plugin.php');
	}

	public static function get_the_validation_status()
	{
		return get_option('vw_courier_serivce_pro_theme_validation_status');
	}

	public static function set_the_validation_status($is_valid)
	{
		update_option('vw_courier_serivce_pro_theme_validation_status', $is_valid);
	}

	public static function get_the_suspension_status()
	{
		return get_option('vw_courier_serivce_pro_theme_suspension_status');
	}

	public static function set_the_suspension_status($is_suspended)
	{
		update_option('vw_courier_serivce_pro_theme_suspension_status', $is_suspended);
	}

	public static function set_the_theme_key($the_key)
	{
		update_option('vw_pro_theme_key', $the_key);
	}

	public static function remove_the_theme_key()
	{
		delete_option('vw_pro_theme_key');
	}

	public static function get_the_theme_key()
	{
		return get_option('vw_pro_theme_key');
	}

	/**
	 * Set some settings
	 * @since 1.0.0
	 * @param $vw_courier_serivce_pro_config	Our config parameters
	 */
	public function set_vars($vw_courier_serivce_pro_config)
	{

		require_once trailingslashit(WHIZZIE_DIR) . 'tgm/tgm.php';
		require_once trailingslashit(WHIZZIE_DIR) . 'widgets/class-vw-widget-importer.php';

		if (isset($vw_courier_serivce_pro_config['page_slug'])) {
			$this->page_slug = esc_attr($vw_courier_serivce_pro_config['page_slug']);
		}
		if (isset($vw_courier_serivce_pro_config['page_title'])) {
			$this->page_title = esc_attr($vw_courier_serivce_pro_config['page_title']);
		}
		if (isset($vw_courier_serivce_pro_config['steps'])) {
			$this->config_steps = $vw_courier_serivce_pro_config['steps'];
		}

		$this->plugin_path = trailingslashit(dirname(__FILE__));
		$relative_url = str_replace(get_template_directory(), '', $this->plugin_path);
		$this->plugin_url = trailingslashit(get_template_directory_uri() . $relative_url);
		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get('Name');
		$this->theme_name = strtolower(preg_replace('#[^a-zA-Z]#', '', $current_theme->get('Name')));
		$this->page_slug = apply_filters($this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-wizard');
		$this->parent_slug = apply_filters($this->theme_name . '_theme_setup_wizard_parent_slug', '');

		$this->widget_file_url = trailingslashit(WHIZZIE_DIR) . 'widgets/vw-logistic-services-pro.wie';

	}

	/**
	 * Hooks and filters
	 * @since 1.0.0
	 */
	public function init()
	{

		if (class_exists('TGM_Plugin_Activation') && isset($GLOBALS['tgmpa'])) {
			add_action('init', array($this, 'get_tgmpa_instance'), 30);
			add_action('init', array($this, 'set_tgmpa_url'), 40);
		}

		add_action('after_switch_theme', array($this, 'redirect_to_wizard'));
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('admin_menu', array($this, 'menu_page'));
		add_action('admin_init', array($this, 'get_plugins'), 30);
		add_filter('tgmpa_load', array($this, 'tgmpa_load'), 10, 1);
		add_action('wp_ajax_setup_plugins', array($this, 'setup_plugins'));
		add_action('wp_ajax_setup_widgets', array($this, 'setup_widgets'));

		add_action('wp_ajax_setup_builder', array($this, 'setup_builder'));
		add_action('wp_ajax_wz_install_activate_ibtana', array($this, 'wz_install_activate_ibtana'));

		add_action('wp_ajax_wz_activate_vw_courier_serivce_pro', array($this, 'wz_activate_vw_courier_serivce_pro'));

		add_action('admin_enqueue_scripts', array($this, 'vw_courier_serivce_pro_admin_theme_style'));


	}

	public function redirect_to_wizard()
	{
		global $pagenow;
		if (is_admin() && 'themes.php' == $pagenow && isset($_GET['activated']) && current_user_can('manage_options')) {
			wp_redirect(admin_url('themes.php?page=' . esc_attr($this->page_slug)));
		}
	}

	public function enqueue_scripts()
	{
		wp_enqueue_style('theme-wizard-style', get_template_directory_uri() . '/theme-wizard/assets/css/theme-wizard-style.css');
		wp_register_script('theme-wizard-script', get_template_directory_uri() . '/theme-wizard/assets/js/theme-wizard-script.js', array('jquery'), time());
		wp_localize_script(
			'theme-wizard-script',
			'vw_courier_serivce_pro_whizzie_params',
			array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'wpnonce' => wp_create_nonce('whizzie_nonce'),
				'verify_text' => esc_html('verifying', 'vw-courier-serivce-pro'),
				'IBTANA_THEME_LICENCE_ENDPOINT' => IBTANA_THEME_LICENCE_ENDPOINT
			)
		);
		wp_enqueue_script('theme-wizard-script');
		wp_enqueue_script('tabs', get_template_directory_uri() . '/theme-wizard/getstarted/js/tab.js');
		wp_enqueue_script('vw-notify-popup', get_template_directory_uri() . '/assets/js/notify.min.js');
	}

	public static function get_instance()
	{
		if (!self::$instance) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function tgmpa_load($status)
	{
		return is_admin() || current_user_can('install_themes');
	}

	/**
	 * Get configured TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function get_tgmpa_instance()
	{
		$this->tgmpa_instance = call_user_func(array(get_class($GLOBALS['tgmpa']), 'get_instance'));
	}

	/**
	 * Update $tgmpa_menu_slug and $tgmpa_parent_slug from TGMPA instance
	 *
	 * @access public
	 * @since 1.1.2
	 */
	public function set_tgmpa_url()
	{
		$this->tgmpa_menu_slug = (property_exists($this->tgmpa_instance, 'menu')) ? $this->tgmpa_instance->menu : $this->tgmpa_menu_slug;
		$this->tgmpa_menu_slug = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_menu_slug', $this->tgmpa_menu_slug);
		$tgmpa_parent_slug = (property_exists($this->tgmpa_instance, 'parent_slug') && $this->tgmpa_instance->parent_slug !== 'themes.php') ? 'admin.php' : 'themes.php';
		$this->tgmpa_url = apply_filters($this->theme_name . '_theme_setup_wizard_tgmpa_url', $tgmpa_parent_slug . '?page=' . $this->tgmpa_menu_slug);
	}

	/**
	 * Make a modal screen for the wizard
	 */
	public function menu_page()
	{
		add_menu_page(esc_html($this->page_title), esc_html($this->page_title), 'manage_options', $this->page_slug, array($this, 'vw_courier_serivce_pro_mostrar_guide'), get_template_directory_uri() . '/theme-wizard/assets/images/admin-menu.svg', 40);
	}

	public function activation_page()
	{
		$theme_key = ThemeWhizzie::get_the_theme_key();
		$validation_status = ThemeWhizzie::get_the_validation_status();
		?>
		<div class="wrap">
			<label><?php esc_html_e('Enter Your Theme License Key:', 'vw-courier-serivce-pro'); ?></label>
			<form id="vw_courier_serivce_pro_license_form">
				<input type="text" name="vw_courier_serivce_pro_license_key" value="<?php echo $theme_key ?>" <?php if ($validation_status === 'true') {
					   echo "disabled";
				   } ?> required placeholder="License Key" />
				<div class="licence-key-button-wrap">
					<button class="button" type="submit" name="button" <?php if ($validation_status === 'true') {
						echo "disabled";
					} ?>>
						<?php if ($validation_status === 'true') {
							?>
							Activated
							<?php
						} else { ?>
							Activate
							<?php
						}
						?>
					</button>

					<?php if ($validation_status === 'true') { ?>
						<button id="change--key" class="button" type="button" name="button">
							Change Key
						</button>
						<div class="next-button">
							<button id="start-now-next" class="button" type="button" name="button"
								onclick="openCity(event, 'demo_offer')">
								Next
							</button>
						</div>
					<?php } ?>
				</div>
			</form>
		</div>
		<?php
	}

	/**
	 * Make an interface for the wizard
	 */
	public function wizard_page()
	{

		tgmpa_load_bulk_installer();

		// install plugins with TGM.
		if (!class_exists('TGM_Plugin_Activation') || !isset($GLOBALS['tgmpa'])) {
			die('Failed to find TGM');
		}
		$url = wp_nonce_url(add_query_arg(array('plugins' => 'go')), 'whizzie-setup');

		// copied from TGM
		$method = ''; // Leave blank so WP_Filesystem can populate it as necessary.
		$fields = array_keys($_POST); // Extra fields to pass to WP_Filesystem.
		if (false === ($creds = request_filesystem_credentials(esc_url_raw($url), $method, false, false, $fields))) {
			return true; // Stop the normal page form from displaying, credential request form will be shown.
		}
		// Now we have some credentials, setup WP_Filesystem.
		if (!WP_Filesystem($creds)) {
			// Our credentials were no good, ask the user for them again.
			request_filesystem_credentials(esc_url_raw($url), $method, true, false, $fields);
			return true;
		}


		/* If we arrive here, we have the filesystem */ ?>
		<div class="wrap">
			<div class="wizard-logo-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/theme-wizard/assets/images/adminIcon.png'); ?>">
				<span class="wizard-main-title">
					<?php esc_html_e('Welcome to ', 'vw-courier-serivce-pro');
					echo $this->theme_title; ?>
				</span>
			</div>
			<?php echo '<div class="card whizzie-wrap">';
			// The wizard is a list with only one item visible at a time
			$steps = $this->get_steps();
			echo '<ul class="whizzie-menu vw-wizard-menu-page">';
			foreach ($steps as $step) {
				$class = 'step step-' . esc_attr($step['id']);
				echo '<li data-step="' . esc_attr($step['id']) . '" class="' . esc_attr($class) . '" >';
				printf(
					'<span class="wizard-main-title">%s</span>',
					esc_html($step['title'])
				);
				// $content is split into summary and detail
				$content = call_user_func(array($this, $step['view']));
				if (isset($content['summary'])) {
					printf(
						'<div class="summary">%s</div>',
						wp_kses_post($content['summary'])
					);
				}
				if (isset($content['detail'])) {
					// Add a link to see more detail
					printf('<div class="wz-require-plugins">');
					printf(
						'<div class="detail">%s</div>',
						$content['detail'] // Need to escape this
					);
					printf('</div>');
				}

				printf('<div class="wizard-button-wrapper">');
				if (ThemeWhizzie::get_the_validation_status() === 'true') {
					// The next button
					if (isset($step['button_text']) && $step['button_text']) {
						printf(
							'<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="%s" data-step="%s">%s</a></div>',
							esc_attr($step['callback']),
							esc_attr($step['id']),
							esc_html($step['button_text'])
						);
					}

					if (isset($step['button_text_one'])) {
						printf(
							'<div class="button-wrap button-wrap-one">
										<a href="#" class="button button-primary do-it" data-callback="install_widgets" data-step="widgets"><img src="' . get_template_directory_uri() . '/theme-wizard/assets/images/Customize-Icon.png"></a>
										<p class="demo-type-text">%s</p>
									</div>',
							esc_html($step['button_text_one'])
						);
					}
					if (isset($step['button_text_two'])) {
						printf(
							'<div class="button-wrap button-wrap-two">
										<a href="#" class="button button-primary do-it" data-step="widgets" data-callback="page_builder" id="ibtana_button"><img src="' . get_template_directory_uri() . '/theme-wizard/assets/images/Gutenberg-Icon.png"></a>
										<p class="demo-type-text">%s</p>
									</div>',
							esc_html($step['button_text_two'])
						);
					}

				} else {
					printf(
						'<div class="button-wrap"><a href="#" class="button button-primary key-activation-tab-click">%s</a></div>',
						esc_html(__('Activate Your License', 'vw-courier-serivce-pro'))
					);
				}
				printf('</div>');

				echo '</li>';
			}
			echo '</ul>';
			echo '<ul class="whizzie-nav wizard-icon-nav">';
			$stepI = 1;
			foreach ($steps as $step) {
				$stepAct = ($stepI == 1) ? 1 : 0;
				if (isset($step['icon_url']) && $step['icon_url']) {
					echo '<li class="nav-step-' . esc_attr($step['id']) . '" wizard-steps="step-' . esc_attr($step['id']) . '" data-enable="' . $stepAct . '">
							<img src="' . esc_attr($step['icon_url']) . '">
							</li>';
				}
				$stepI++;
			}
			echo '</ul>';
			?>
			<div class="step-loading"><span class="spinner">
					<img
						src="<?php echo esc_url(get_template_directory_uri() . '/theme-wizard/assets/images/Spinner-Animaion.gif'); ?>">
				</span></div>
			<?php echo '</div>'; ?>

		</div>
	<?php }
	/**
	 * Set options for the steps
	 * Incorporate any options set by the theme dev
	 * Return the array for the steps
	 * @return Array
	 */
	public function get_steps()
	{
		$dev_steps = $this->config_steps;
		$steps = array(
			'intro' => array(
				'id' => 'intro',
				'title' => __('', 'vw-courier-serivce-pro'),
				'icon' => 'dashboard',
				'view' => 'get_step_intro',
				// Callback for content
				'callback' => 'do_next_step',
				// Callback for JS
				'button_text' => __('Start Now', 'vw-courier-serivce-pro'),
				'can_skip' => false,
				// Show a skip button?
				'icon_url' => get_template_directory_uri() . '/theme-wizard/assets/images/Icons-01.svg'
			),
			'plugins' => array(
				'id' => 'plugins',
				'title' => __('Plugins', 'vw-courier-serivce-pro'),
				'icon' => 'admin-plugins',
				'view' => 'get_step_plugins',
				'callback' => 'install_plugins',
				'button_text' => __('Install Plugins', 'vw-courier-serivce-pro'),
				'can_skip' => true,
				'icon_url' => get_template_directory_uri() . '/theme-wizard/assets/images/Icons-02.svg'
			),
			'widgets' => array(
				'id' => 'widgets',
				'title' => __('Customizer', 'vw-courier-serivce-pro'),
				'icon' => 'welcome-widgets-menus',
				'view' => 'get_step_widgets',
				'callback' => 'install_widgets',
				'button_text_one' => __('Click On The Image To Import Customizer Demo', 'vw-courier-serivce-pro'),
				'button_text_two' => __('Click On The Image To Import Gutenberg Block Demo', 'vw-courier-serivce-pro'),
				'can_skip' => true,
				'icon_url' => get_template_directory_uri() . '/theme-wizard/assets/images/Icons-03.svg'
			),

			'done' => array(
				'id' => 'done',
				'title' => __('All Done', 'vw-courier-serivce-pro'),
				'icon' => 'yes',
				'view' => 'get_step_done',
				'callback' => '',
				'icon_url' => get_template_directory_uri() . '/theme-wizard/assets/images/Icons-04.svg'
			)
		);

		// Iterate through each step and replace with dev config values
		if ($dev_steps) {
			// Configurable elements - these are the only ones the dev can update from config.php
			$can_config = array('title', 'icon', 'button_text', 'can_skip', 'button_text_two');
			foreach ($dev_steps as $dev_step) {
				// We can only proceed if an ID exists and matches one of our IDs
				if (isset($dev_step['id'])) {
					$id = $dev_step['id'];
					if (isset($steps[$id])) {
						foreach ($can_config as $element) {
							if (isset($dev_step[$element])) {
								$steps[$id][$element] = $dev_step[$element];
							}
						}
					}
				}
			}
		}
		return $steps;
	}

	/**
	 * Print the content for the intro step
	 */
	public function get_step_intro()
	{ ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Thank you for choosing this ' . $this->theme_title . ' Theme. Using this quick setup wizard, you will be able to configure your new website and get it running in just a few minutes. Just follow these simple steps mentioned in the wizard and get started with your website.', 'vw-courier-serivce-pro'); ?>
			</p>
			<p>
				<?php esc_html_e('You may even skip the steps and get back to the dashboard if you have no time at the present moment. You can come back any time if you change your mind.', 'vw-courier-serivce-pro'); ?>
			</p>
		</div>
	<?php }

	public function get_step_importer()
	{ ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Thank you for choosing this ' . $this->theme_title . ' Theme. Using this quick setup wizard, you will be able to configure your new website and get it running in just a few minutes. Just follow these simple steps mentioned in the wizard and get started with your website.', 'vw-courier-serivce-pro'); ?>
			</p>
		</div>
	<?php }
	/**
	 * Get the content for the plugins step
	 * @return $content Array
	 */
	public function get_step_plugins()
	{
		$plugins = $this->get_plugins();
		$content = array(); ?>
		<div class="summary">
			<p>
				<?php esc_html_e('Additional plugins always make your website exceptional. Install these plugins by clicking the install button. You may also deactivate them from the dashboard.', 'vw-courier-serivce-pro') ?>
			</p>
		</div>
		<?php // The detail element is initially hidden from the user
				$content['detail'] = '<span class="wizard-plugin-count">' . count($plugins['all']) . '</span><ul class="whizzie-do-plugins">';
				$plugins['all'] = $this->moveArrayPosition($plugins['all'], 0, 14);
				// Add each plugin into a list
				foreach ($plugins['all'] as $slug => $plugin) {
					$content['detail'] .= '<li data-slug="' . esc_attr($slug) . '">' . esc_html($plugin['name']) . '<div class="wizard-plugin-title">';

					$content['detail'] .= '<span class="wizard-plugin-status">Installation Required</span><i class="spinner"></i></div></li>';

				}
				$content['detail'] .= '</ul>';

				return $content;
	}


	/**
	 * Print the content for the widgets step
	 * @since 1.1.0
	 */
	public function get_step_widgets()
	{ ?>
		<div class="summary">
			<p>
				<?php esc_html_e('This theme supports importing the demo content and adding widgets. Get them installed with the below button. Using the Customizer, it is possible to update or even deactivate them', 'vw-courier-serivce-pro'); ?>
			</p>
		</div>
	<?php }


	/**
	 * Print the content for the Design choices for the user
	 */

	public function get_step_design()
	{ ?>

		<div class="ibtana-design-product-row">
		</div>
		<div class="wizard-design-button-wrapper">
			<a href="#" class="button button-primary do-it" data-step="design" id="IbtanaImportButton"
				data-callback="inner_page_builder">Import</a>
		</div>

	<?php }
	/**
	 * Print the content for the final step
	 */
	public function get_step_done()
	{

		?>

		<div class="vw-setup-finish">
			<p>
				<?php echo esc_html('Your demo content has been imported successfully . Click on the finish button for more information.'); ?>
			</p>
			<div class="finish-buttons">
				<a href="<?php echo esc_url(admin_url('/customize.php')); ?>" class="wz-btn-customizer"
					target="_blank"><?php esc_html_e('Customize Your Demo', 'vw-courier-serivce-pro') ?></a>
				<a href="" class="wz-btn-builder"
					target="_blank"><?php esc_html_e('Customize Your Demo', 'vw-courier-serivce-pro'); ?></a>
				<a href="<?php echo esc_url(site_url()); ?>" class="wz-btn-visit-site"
					target="_blank"><?php esc_html_e('Visit Your Site', 'vw-courier-serivce-pro'); ?></a>
			</div>
			<div class="vw-finish-btn">
				<a href="javascript:void(0);" class="button button-primary" onclick="openCity(event, 'theme_info')"
					data-tab="theme_info">Finish</a>
			</div>
		</div>

	<?php }

	function moveArrayPosition(&$array, $a, $b)
	{
		$p1 = array_splice($array, $a, 1);
		$p2 = array_splice($array, 0, $b);
		$array = array_merge($p2, $p1, $array);
		return $array;
	}

	/**
	 * Get the plugins registered with TGMPA
	 */
	public function get_plugins()
	{

		$instance = call_user_func(array(get_class($GLOBALS['tgmpa']), 'get_instance'));
		$plugins = array(
			'all' => array(),
			'install' => array(),
			'update' => array(),
			'activate' => array()
		);
		foreach ($instance->plugins as $slug => $plugin) {
			if ($instance->is_plugin_active($slug) && false === $instance->does_plugin_have_update($slug)) {
				// Plugin is installed and up to date
				continue;
			} else {
				$plugins['all'][$slug] = $plugin;
				if (!$instance->is_plugin_installed($slug)) {
					$plugins['install'][$slug] = $plugin;
				} else {
					if (false !== $instance->does_plugin_have_update($slug)) {
						$plugins['update'][$slug] = $plugin;
					}
					if ($instance->can_plugin_activate($slug)) {
						$plugins['activate'][$slug] = $plugin;
					}
				}
			}
		}
		return $plugins;
	}

	public function setup_plugins()
	{

		if (!check_ajax_referer('whizzie_nonce', 'wpnonce') || empty($_POST['slug'])) {
			wp_send_json_error(array('error' => 1, 'message' => esc_html__('No Slug Found', 'vw-courier-serivce-pro')));
		}
		$json = array();
		// send back some json we use to hit up TGM
		$plugins = $this->get_plugins();

		// what are we doing with this plugin?
		foreach ($plugins['activate'] as $slug => $plugin) {
			if ($_POST['slug'] == $slug) {
				$json = array(
					'url' => admin_url($this->tgmpa_url),
					'plugin' => array($slug),
					'tgmpa-page' => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce' => wp_create_nonce('bulk-plugins'),
					'action' => 'tgmpa-bulk-activate',
					'action2' => -1,
					'message' => esc_html__('Activating Plugin', 'vw-courier-serivce-pro'),
				);
				break;
			}
		}
		foreach ($plugins['update'] as $slug => $plugin) {
			if ($_POST['slug'] == $slug) {
				$json = array(
					'url' => admin_url($this->tgmpa_url),
					'plugin' => array($slug),
					'tgmpa-page' => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce' => wp_create_nonce('bulk-plugins'),
					'action' => 'tgmpa-bulk-update',
					'action2' => -1,
					'message' => esc_html__('Updating Plugin', 'vw-courier-serivce-pro'),
				);
				break;
			}
		}
		foreach ($plugins['install'] as $slug => $plugin) {
			if ($_POST['slug'] == $slug) {
				$json = array(
					'url' => admin_url($this->tgmpa_url),
					'plugin' => array($slug),
					'tgmpa-page' => $this->tgmpa_menu_slug,
					'plugin_status' => 'all',
					'_wpnonce' => wp_create_nonce('bulk-plugins'),
					'action' => 'tgmpa-bulk-install',
					'action2' => -1,
					'message' => esc_html__('Installing Plugin', 'vw-courier-serivce-pro'),
				);
				break;
			}
		}
		if ($json) {
			$json['hash'] = md5(serialize($json)); // used for checking if duplicates happen, move to next plugin
			wp_send_json($json);
		} else {
			wp_send_json(array('done' => 1, 'message' => esc_html__('Success', 'vw-courier-serivce-pro')));
		}
		exit;
	}
	// ------- Create Nav Menu --------
	public function theme_create_customizer_nav_menu()
	{
		$lblg_themename = "";
		$menuname = $lblg_themename . 'Primary Menu';
		$bpmenulocation = 'primary';
		$menu_exists = wp_get_nav_menu_object($menuname);

		if (!$menu_exists) {
			$menu_id = wp_create_nav_menu($menuname);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Home'),
					'menu-item-classes' => 'home',
					'menu-item-url' => home_url('/'),
					'menu-item-status' => 'publish'
				)
			);

			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('About', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'About',
					'menu-item-url' => get_permalink(get_page_by_title('About Us')),
					'menu-item-status' => 'publish',
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Services', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'service',
					'menu-item-url' => get_permalink(get_page_by_title('Service')),
					'menu-item-status' => 'publish',
				)
			);
			$parent_page_item = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Pages', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Error 404', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'error',
					'menu-item-url' => get_permalink(get_page_by_title('Error 404')),
					'menu-item-status' => 'publish',
					'menu-item-parent-id' => $parent_page_item
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Delivery Policy', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'policy',
					'menu-item-url' => get_permalink(get_page_by_title('Delivery Policy')),
					'menu-item-status' => 'publish',
					'menu-item-parent-id' => $parent_page_item
				)
			);


			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Support', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'support',
					'menu-item-url' => get_permalink(get_page_by_title('Support Page')),
					'menu-item-status' => 'publish',
					'menu-item-parent-id' => $parent_page_item
				)
			);

			$parent_page_item_2 = wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Blog', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'blog',
					'menu-item-url' => get_permalink(get_page_by_title('Blog')),
					'menu-item-status' => 'publish',
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Blog Left Sidebar', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'policy',
					'menu-item-url' => get_permalink(get_page_by_title('Blog Left Sidebar')),
					'menu-item-status' => 'publish',
					'menu-item-parent-id' => $parent_page_item_2
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Blog Right Sidebar', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'policy',
					'menu-item-url' => get_permalink(get_page_by_title('Blog Right Sidebar')),
					'menu-item-status' => 'publish',
					'menu-item-parent-id' => $parent_page_item_2
				)
			);
			if (!has_nav_menu($bpmenulocation)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$bpmenulocation] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}
	}

	// }
	// ------- Create Footer Menu --------

	public function theme_create_customizer_footer_services_menu()
	{
		$main_menu_items = array(
			'Servicesarray' => array(
				'Air Freight',
				'Road Freight',
				'Ocean Freight',
				'Rail Freight',
				'Distribution',
				'Ware Housing'
			)
		);

		$menuname = 'Services';
		$bpmenulocation = 'footer1';
		$menu_exists = wp_get_nav_menu_object($menuname);

		if (!$menu_exists) {
			$menu_id = wp_create_nav_menu($menuname);

			foreach ($main_menu_items as $top_level_name => $column_titles) {
				foreach ($column_titles as $category_name) {
					$page = get_page_by_title($category_name, OBJECT, 'services');
					wp_update_nav_menu_item(
						$menu_id,
						0,
						array(
							'menu-item-title' => __($category_name, 'vw-courier-serivce-pro'),
							'menu-item-classes' => 'menu-category',
							'menu-item-url' => get_post_permalink($page->ID),
							'menu-item-status' => 'publish',
							'menu-item-parent-id' => $sub_menu_heading
						)
					);
				}

			}

			if (!has_nav_menu($bpmenulocation)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$bpmenulocation] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}

	}




	// ------- Create Footer Menu --------
	public function theme_create_customizer_footer_quick_links_menu()
	{
		$menuname = $lblg_themename . 'Quick Link';
		$bpmenulocation = 'footer2';
		$menu_exists = wp_get_nav_menu_object($menuname);

		if (!$menu_exists) {
			$menu_id = wp_create_nav_menu($menuname);

			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('About Us', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('About Us')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Services', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('Service')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Latest Posts', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('Blog')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Support Page', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'support-page',
					'menu-item-url' => get_permalink(get_page_by_title('Support Page')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Delivery Policy', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'policy-page',
					'menu-item-url' => get_permalink(get_page_by_title('Delivery Policy')),
					'menu-item-status' => 'publish'
				)
			);
			if (!has_nav_menu($bpmenulocation)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$bpmenulocation] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}
	}

	public function theme_create_customizer_footer_support_menu()
	{
		$lblg_themename = "";
		$menuname = $lblg_themename . 'Support Menu';
		$bpmenulocation = 'footer3';
		$menu_exists = wp_get_nav_menu_object($menuname);

		if (!$menu_exists) {
			$menu_id = wp_create_nav_menu($menuname);

			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Customer Support', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('Customer Support')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Delivery', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('Delivery')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Product Support', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('Product Support')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Orders & Shipping', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('Orders & Shipping')),
					'menu-item-status' => 'publish'
				)
			);
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title' => __('Contact Us', 'vw-courier-serivce-pro'),
					'menu-item-classes' => 'page',
					'menu-item-url' => get_permalink(get_page_by_title('Contact Us')),
					'menu-item-status' => 'publish'
				)
			);
			if (!has_nav_menu($bpmenulocation)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$bpmenulocation] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}
	}




	function isAssoc(array $arr)
	{
		if (array() === $arr)
			return false;
		return array_keys($arr) !== range(0, count($arr) - 1);
	}

	function create_product_attribute_wocommerce()
	{
		// Attribute Creation Code if a variable product needed to create

		$attribute_data = array(
			array(
				'name' => 'Color',
				'type' => 'color',
				'taxonomy' => 'pa_color',
				'data' => array(
					'Metallic Bronze' => '#aa8347',
					'Blue' => '#6b89bb',
					'Silver' => '#959595',
					'Green' => '#83a685'
				)
			)
		);
		$new_attribute_data = array();
		$old_attribute_taxonomies = wc_get_attribute_taxonomies();
		foreach ($attribute_data as $attribute_data_single) {
			$is_attribute_found = false;
			foreach ($old_attribute_taxonomies as $old_attribute_taxonomy) {
				if ($attribute_data_single['type'] === $old_attribute_taxonomy->attribute_type) {
					$is_attribute_found = true;
					break;
				}
			}
			if (!$is_attribute_found) {
				array_push($new_attribute_data, $attribute_data_single);
			}
		}

		foreach ($new_attribute_data as $attribute_single_args) {
			$args = array(
				'name' => __($attribute_single_args['name'], 'vw-courier-serivce-pro'),
				'type' => $attribute_single_args['type'],
				'orderby' => 'menu_order',
				'has_archives' => false,
			);
			$wc_create_attribute = wc_create_attribute($args);

			// if ( taxonomy_exists( $attribute_single_args['taxonomy'] ) ) {
			register_taxonomy($attribute_single_args['taxonomy'], array('product'), array());
			// }

			if (!is_wp_error($wc_create_attribute)) {

				if ((array_keys($attribute_single_args['data']) !== range(0, count($attribute_single_args['data']) - 1))) {
					foreach ($attribute_single_args['data'] as $single_data_key => $single_data) {
						$wp_insert_term = wp_insert_term($single_data_key, $attribute_single_args['taxonomy']);
						if (!is_wp_error($wp_insert_term)) {
							update_term_meta($wp_insert_term['term_id'], 'product_attribute_' . $attribute_single_args['type'], $single_data);
						}
					}
				} else {
					foreach ($attribute_single_args['data'] as $single_data_key => $single_data) {
						wp_insert_term($single_data, $attribute_single_args['taxonomy']);
					}
				}
			}
		}

		// Attribute Creation Code END
	}
	// Attribute Creation Code ENDs




	/**
	 * Imports the Demo Content
	 * @since 1.1.0
	 */
	public function setup_widgets()
	{

		ini_set('upload_max_filesize', '300M');
		ini_set('max_execution_time', '3000');

		// Create a auto listing page and assigned the template start
		$listing_title = 'Auto Listings';
		$listing_page_array = array(
			'post_type' => 'page',
			'post_title' => $listing_title,
			'post_status' => 'publish',
			'post_author' => 1
		);




		set_theme_mod('vw_courier_serivce_pro_inner_page_banner_bgimage', get_template_directory_uri() . '/assets/new-images/with-banner.png');
		// vw_title_banner_image_wp_custom_attachment START
		$image_url = get_template_directory_uri() . '/assets/new-images/with-banner.png';
		$upload_dir = wp_upload_dir();
		$image_data = file_get_contents($image_url);
		$filename = basename($image_url);
		if (wp_mkdir_p($upload_dir['path'])) {
			$file = $upload_dir['path'] . '/' . $filename;
		} else {
			$file = $upload_dir['basedir'] . '/' . $filename;
		}
		file_put_contents($file, $image_data);
		$wp_filetype = wp_check_filetype($filename, null);
		$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => sanitize_file_name($filename),
			'post_content' => '',
			'post_status' => 'inherit'
		);
		$attach_id = wp_insert_attachment($attachment, $file);
		require_once (ABSPATH . 'wp-admin/includes/image.php');
		$attach_data = wp_generate_attachment_metadata($attach_id, $file);
		wp_update_attachment_metadata($attach_id, $attach_data);
		$attachment_url = wp_get_attachment_url($attach_id);
		// vw_title_banner_image_wp_custom_attachment END







		//POST and update the customizer and other related data of VW Video Vlog Pro
		$home_id = '';
		$vw_blog_id = '';
		$page_id = '';
		$contact_id = '';
		// Create a front page and assigned the template
		$home_title = 'Home';
		$home_check = get_page_by_title($home_title);
		$home = array(
			'post_type' => 'page',
			'post_title' => $home_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'home'
		);
		$home_id = wp_insert_post($home);
		//Set the home page template
		add_post_meta($home_id, '_wp_page_template', 'page-template/home-page.php');

		//Set the static front page
		$home = get_page_by_title('Home');
		update_option('page_on_front', $home->ID);
		update_option('show_on_front', 'page');

		//  assign the banner image to the shop page
		$shop_page = get_page_by_title('Shop');
		add_post_meta($shop_page->ID, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);

		// $listing_page = get_page_by_title('Car Models');
		// add_post_meta( $listing_page->ID, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		// Create a blog Blog and assigned the template
		$blog_title = 'Blog';
		$blog_check = get_page_by_title($blog_title);
		$blog = array(
			'post_type' => 'page',
			'post_title' => $blog_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog'
		);
		$blog_id = wp_insert_post($blog);

		//Set the blog page template
		add_post_meta($blog_id, '_wp_page_template', 'page-template/blog-fullwidth-extend.php');
		add_post_meta($blog_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);
		// add_post_meta( $blog_id, '
		// ', $attachment_url );


		// Create a blog Blog and assigned the template
		// $car_title = 'Car Models';
		// $car_check = get_page_by_title($car_title);
		// $car = array(
		// 	'post_type' => 'page',
		// 	'post_title' => $car_title,
		// 	'post_status' => 'publish',
		// 	'post_author' => 1,
		// 	'post_slug' => 'car'
		// );
		// $car_id = wp_insert_post($car);
		//
		// //Set the car page template
		// add_post_meta( $car_id, '_wp_page_template', 'page-template/car-models.php' );
		// add_post_meta( $car_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url );

		$blog_title = 'Blog Left Sidebar';
		$blog = array(
			'post_type' => 'page',
			'post_title' => $blog_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog-left-sidebar'
		);
		$blog_id = wp_insert_post($blog);

		//Set the blog page template
		add_post_meta($blog_id, '_wp_page_template', 'page-template/blog-with-left-sidebar.php');
		add_post_meta($blog_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);

		$blog_title = 'Blog Right Sidebar';
		$blog = array(
			'post_type' => 'page',
			'post_title' => $blog_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog-right-sidebar'
		);
		$blog_id = wp_insert_post($blog);

		//Set the blog page template
		add_post_meta($blog_id, '_wp_page_template', 'page-template/blog-with-left-right-sidebar.php');
		add_post_meta($blog_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);

		// Create a Pages
		if (get_page_by_title('Page') == NULL) {
			$page_title = 'Page ';
			$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est. laborum.ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

			$page_check = get_page_by_title($page_title);
			$page = array(
				'post_type' => 'page',
				'post_title' => $page_title,
				'post_content' => $content,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug' => 'page'
			);
			$page_id = wp_insert_post($page);
			add_post_meta($page_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);
			$page_title = 'Page Left Sidebar';
			$content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

			$page_check = get_page_by_title($page_title);
			$vw_page = array(
				'post_type' => 'page',
				'post_title' => $page_title,
				'post_content' => $content,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug' => 'page-left'
			);
			$page_id = wp_insert_post($vw_page);

			//Set the blog page template
			add_post_meta($page_id, '_wp_page_template', 'page-template/page-with-left-sidebar.php');
			add_post_meta($page_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);

			$page_title = 'Page Right Sidebar';
			$content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semelTe obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel.';

			$page_check = get_page_by_title($page_title);
			$vw_page = array(
				'post_type' => 'page',
				'post_title' => $page_title,
				'post_content' => $content,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug' => 'page-right'
			);
			$page_id = wp_insert_post($vw_page);

			//Set the blog page template
			add_post_meta($page_id, '_wp_page_template', 'page-template/page-with-right-sidebar.php');
			add_post_meta($page_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);
		}
		// Create a contact page and assigned the template
		$contact_title = 'Contact Us';
		$contact_check = get_page_by_title($contact_title);
		$contact = array(
			'post_type' => 'page',
			'post_title' => $contact_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'contact'
		);
		$contact_id = wp_insert_post($contact);

		//Set the blog with right sidebar template
		add_post_meta($contact_id, '_wp_page_template', 'page-template/contact.php');
		add_post_meta($contact_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);


		$services_title = 'Service';
		$services_check = get_page_by_title($services_title);
		$services = array(
			'post_type' => 'page',
			'post_title' => $services_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'servicesPage'
		);
		$services_id = wp_insert_post($services);

		add_post_meta($services_id, '_wp_page_template', '/servicesPage.php');
		add_post_meta($services_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);

		// / Create a Terms page and assigned the template


		$contact_page = get_page_by_title('Contact Us');

		// sustainability page

		$sustainability_content = '
										<div id="Sustainable">
												<p class="sub-head-border position-relative text-center">
													SUSTAINABILITY
												</p>
												<h2 class="degree-heading text-center">
														Driving Towards a Sustainable Future
												</h2>
												<p class="degree-para text-center">
													Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
												</p>
												<div class="sus-inner-image row p-0">
													<div class="col-lg-6 col-md-6 col-sm-12 mb-2">
														<img src="' . get_template_directory_uri() . '/assets/images/sustainability/img1.png" />
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12">
																<div class="row">
																	<div class="col-lg-12 col-md-12 col-sm-12">
																		<img class="sus-img-one" src="' . get_template_directory_uri() . '/assets/images/sustainability/img2.png" />
																	</div>
																	<div class="col-lg-12 col-md-12 col-sm-12">
																		<img class="sus-img-two" src="' . get_template_directory_uri() . '/assets/images/sustainability/img3.png" />
																	</div>
																</div>
													</div>
												</div>
											<div class="sus-content">
			                <div class="sus-main-content">
			                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
			                 Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apriam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
												 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
												Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem apriam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.</p>
				              </div>
											<div>
			             </div>
							</div>
							</div>
';

		$sustainability = array(
			'post_type' => 'page',
			'post_content' => $sustainability_content,
			'post_title' => 'Sustainability',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'sustainability'
		);
		$sustainability_id = wp_insert_post($sustainability);
		add_post_meta($sustainability_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);



		// DileveryPolicy Page 

		$dileveryPolicy_content = '<h2 class="para-heading my-3">Shipping</h2>
<h4 class="para-que">How Do I Check The Status Of A Order?</h4>
<p class="answer mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

<h2 class="heading-que">How Do We Ship?</h2>
<p class="my-3"><h4>Parcel</h4>: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
<p class="my-3"><h4>Tracking Dilevery</h4>: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

<h2 class="heading-que my-3">How Do We Ship?</h2>
<ul class="mb-3">
    <li>Standard / 6-7 Days</li>
    <li>Ground / 3-4 Days</li>
    <li>Second Day Air / 2 Days</li>
    <li>Next Day Air / 1 Day</li>
    <li>International / Option Will Very-Fine Out At Checkout</li>
</ul>

<p class="mb-3">Please Note That This isn`t an expedited Shipping Method.</p>

<h5 class="my-2">Rates</h5>
<ul class="mb-3">
    <li class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</li>
    <li class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</li>
    <li class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</li>
</ul>

<h4 class="my-2"></h4>
<p class="mb-2"><h4>Standard Ground </h4>: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

';

		$dileveryPolicy = array(
			'post_type' => 'page',
			'post_content' => $dileveryPolicy_content,
			'post_title' => 'Delivery Policy',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'dileveryPolicy'
		);
		$dileveryPolicy_id = wp_insert_post($dileveryPolicy);
		add_post_meta($dileveryPolicy_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);




		// Support page 



		$supportPage_content =
			'
<h2>How To Get Support?</h2>

<h4>Dear customers, future customers and Friends!</h4>

<p>This support interface has all the tools we need to listen to your ideas and help you with your problems. Just choose your Department and write your questions or problems. We love feedback and satisfied customers. We promise that you will get answer for your question in 24 hours, so prepare to get satisfied.</p>

<hr>

<h4>If you have product related problem on your site please provide us the following things:</h4>

<p>This support interface has all the tools we need to listen to your ideas and help you with your problems. Just choose your Department and write your questions or problems. We love feedback and satisfied customers. We promise that you will get answer for your question in 24 hours, so prepare to get satisfied.</p>


<ul class="half-width">
    <li>Link to your site: To check your site...</li>
    <li>FTP access (optional): Sometimes we can`t solve the problems without it...</li>
    <li>Admin account: To dig in the site more deeply...</li>
    <li>Important: Please sure that you added your domain to our domain list here. We will be priority support for domains which are registered in our domain list.</li>
    <li>Order id: To identify yourself...</li>
    <li>Order id: To identify yourself...</li>
</ul>

<hr>

<h4>How to write a support message?<h4>

<ul>
	<li>Language: Please write us in the following languages: english.</li>
	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>
</ul>

<h2>Contact Us</h2>

<h4>Lorem Ipsum is simply dummy text of the printing</h4>

<ul>
    <li>Lorem Ipsum is simply dummy text of the printing</li>
    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>
</ul>

';

		$supportPagec = array(
			'post_type' => 'page',
			'post_content' => $supportPage_content,
			'post_title' => 'Support Page',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'supportpage'
		);
		$supportPage_id = wp_insert_post($supportPagec);
		add_post_meta($supportPage_id, '_wp_page_template', 'page-template/support-page.php');
		add_post_meta($supportPage_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);





		$menu_title = '2 Columns';
		$content = '[products  columns="2" orderby="date" order="DESC" visibility="visible"]';
		$menu = array(
			'post_type' => 'page',
			'post_title' => $menu_title,
			'post_content' => $content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'page'
		);
		$menu_id = wp_insert_post($menu);

		//Set the blog with right sidebar template
		add_post_meta($menu_id, '_wp_page_template', 'page-template/2-columns.php');
		add_post_meta($menu_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);

		// Create a contact page and assigned the template
		$menu_title = '3 Columns';
		$content = '[products  columns="3" orderby="date" order="DESC" visibility="visible"]';
		$menu = array(
			'post_type' => 'page',
			'post_title' => $menu_title,
			'post_content' => $content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'page'
		);
		$menu_id = wp_insert_post($menu);

		//Set the blog with right sidebar template
		add_post_meta($menu_id, '_wp_page_template', 'page-template/3-columns.php');
		add_post_meta($menu_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);

		// Create a  page and assigned the template
		$menu_title = '4 Columns';
		$content = '[products  columns="4" orderby="date" order="DESC" visibility="visible"]';
		$menu = array(
			'post_type' => 'page',
			'post_title' => $menu_title,
			'post_content' => $content,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'page'
		);
		$menu_id = wp_insert_post($menu);


		$aboutus_title = 'About Us';
		$aboutus = array(
			'post_type' => 'page',
			'post_title' => $aboutus_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'aboutus'
		);
		$aboutus_id = wp_insert_post($aboutus);

		add_post_meta($aboutus_id, '_wp_page_template', 'page-template/about-us.php');
		add_post_meta($aboutus_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);


		// $support_title = 'Support Page';
		// $support = array(
		// 	'post_type' => 'page',
		// 	'post_title' => $support_title,
		// 	'post_status' => 'publish',
		// 	'post_author' => 1,
		// 	'post_slug' => 'supportpage'
		// );
		// $support_id = wp_insert_post($support);

		// add_post_meta($support_id, '_wp_page_template', 'page-template/support-page.php');
		// add_post_meta($support_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);




		$getAquote_title = 'Get A Quote';
		$getAquote = array(
			'post_type' => 'page',
			'post_title' => $getAquote_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'getaquote'
		);
		$getAquote_id = wp_insert_post($getAquote);


		add_post_meta($getAquote_id, '_wp_page_template', 'page-template/getAquote.php');
		add_post_meta($getAquote_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);



		$error_title = 'Error 404';
		$error = array(
			'post_type' => 'page',
			'post_title' => $error_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'error-us'
		);
		$error_id = wp_insert_post($error);

		add_post_meta($error_id, '_wp_page_template', '/404.php');
		add_post_meta($error_id, 'vw_title_banner_image_wp_custom_attachment', $attachment_url);


		// -------------- Section Ordering ---------------
		set_theme_mod('vw_courier_serivce_pro_section_ordering_settings_repeater', 'section-slider,section-services,section-aboutUs,section-orderTracking,section-dilevarySteps,section-pricing,section-whyChooseUs,section-testimonials,section-our-team,section-GetInTouch,section-faq,section-blog-and-news');

		// topbar

		$topbar_social_icons = array(
			'vwsmp_facebook' => 'https://www.facebook.com/',
			'vwsmp_admin_check_facebook' => '1',
			'vwsmp_twitter' => 'https://www.twitter.com/',
			'vwsmp_admin_check_twitter' => '1',
			'vwsmp_instagram' => 'https://www.instagram.com/',
			'vwsmp_admin_check_instagram' => '1',
			'vwsmp_pinterest' => 'https://www.pinterest.com/',
			'vwsmp_admin_check_pinterest' => '1',
		);

		update_option('vwsmp_options', $topbar_social_icons);

		//Scroll Top
		set_theme_mod('vw_courier_serivce_pro_genral_section_show_scroll_top_icon', 'fas fa-angle-double-up');
		set_theme_mod('vw_courier_serivce_pro_hi_first_color', '#2962FF');
		set_theme_mod('vw_courier_serivce_pro_hi_scnd_color', '#ffffff');


		// topbar
		// For 'vw_courier_serivce_pro_topbar_enable'
		set_theme_mod('vw_courier_serivce_pro_topbar_enable', 'Enable'); // or 'Disable' based on your preference

		// For 'vw_courier_serivce_pro_topbar_bgimage'
		set_theme_mod('vw_courier_serivce_pro_topbar_bgimage', '');

		// For 'vw_logistics_servics_topbar_background_color'
		set_theme_mod('vw_logistics_servics_topbar_background_color', '#fff');

		// For 'vw_courier_serivce_pro_header_text_color'
		set_theme_mod('vw_courier_serivce_pro_header_text_color', '#fff');

		// For 'vw_courier_serivce_pro_header_text_font_family'
		set_theme_mod('vw_courier_serivce_pro_header_text_font_family', 'Lato');

		// For 'vw_courier_serivce_pro_header_text_font_size'
		set_theme_mod('vw_courier_serivce_pro_header_text_font_size', '16');

		// For 'vw_courier_serivce_pro_topbar_icon_color'	
		set_theme_mod('vw_courier_serivce_pro_topbar_icon_color', '');

		// For 'vw_courier_serivce_pro_topbar_left_icon_size'
		set_theme_mod('vw_courier_serivce_pro_topbar_left_icon_size', '14');

		// For 'vw_courier_serivce_pro_topbar_left_1'
		set_theme_mod('vw_courier_serivce_pro_topbar_left_1', '4b, Walse Street , USA');
		set_theme_mod('vw_courier_serivce_pro_topbar_left_link_1', 'https://www.google.com/maps/place/4+Wall+St,+New+York,+NY+10005,+USA/@40.707607,-74.0112856,17z/data=!3m1!4b1!4m6!3m5!1s0x89c25a1726a907a7:0xe05c573fc407be98!8m2!3d40.707607!4d-74.0112856!16s%2Fg%2F11f3vdhdfk?entry=ttu');

		// For 'vw_courier_serivce_pro_topbar_left_2'
		set_theme_mod('vw_courier_serivce_pro_topbar_left_2', 'vwtrans@gmail.com');
		set_theme_mod('vw_courier_serivce_pro_topbar_left_link_2', 'mailto:vwtrans@gmail.com');

		// For 'vw_courier_serivce_pro_topbar_left_3'
		set_theme_mod('vw_courier_serivce_pro_topbar_left_3', 'Mon – Sun: 9.00 am – 8.00pm');
		set_theme_mod('vw_courier_serivce_pro_topbar_left_link_3', '');


		set_theme_mod('vw_courier_serivce_pro_topbar_left_icon_1', 'fa fa-map-marker');
		set_theme_mod('vw_courier_serivce_pro_topbar_left_icon_2', 'fa fa-envelope');
		set_theme_mod('vw_courier_serivce_pro_topbar_left_icon_3', 'far fa-clock');
		// For 'vw_courier_serivce_pro_social_icons_1'
		set_theme_mod('vw_courier_serivce_pro_social_icons_1', 'fa-facebook-f');
		set_theme_mod('vw_courier_serivce_pro_social_icons_2', 'fab fa-twitter');
		set_theme_mod('vw_courier_serivce_pro_social_icons_3', 'fab fa-instagram');
		set_theme_mod('vw_courier_serivce_pro_social_icons_4', 'fab fa-whatsapp');

		// For 'vw_courier_serivce_pro_social_icons_link_1'
		set_theme_mod('vw_courier_serivce_pro_social_icons_link_1', 'https://facebook.com/');
		set_theme_mod('vw_courier_serivce_pro_social_icons_link_2', 'https://twitter.com/login?lang=en');
		set_theme_mod('vw_courier_serivce_pro_social_icons_link_3', 'https://www.instagram.com/');
		set_theme_mod('vw_courier_serivce_pro_social_icons_link_4', 'https://web.whatsapp.com/');

		set_theme_mod('vw_courier_serivce_pro_header_getQuote_button_text', 'Get A Quote');

		// For 'vw_courier_serivce_pro_topbar_icon_size'
		set_theme_mod('vw_courier_serivce_pro_topbar_icon_size', '20');

		// For 'vw_courier_serivce_pro_header_social_icon_color'
		set_theme_mod('vw_courier_serivce_pro_header_social_icon_color', '#fff');


		/* --------------- Slider---------------*/
		set_theme_mod('vw_courier_serivce_pro_slider_bgimage', get_template_directory_uri() . '/assets/images/header/header-bg.png');
		set_theme_mod('vw_courier_serivce_pro_slide_number', '3');
		set_theme_mod('vw_courier_serivce_pro_image_below_heading', get_template_directory_uri() . '/assets/new-images/Line.png');
		set_theme_mod('vw_courier_serivce_pro_order_tracking_bgimage', get_template_directory_uri() . '/assets/new-images/Footer-BG.png');
		set_theme_mod('vw_courier_serivce_pro_order_tracking_image', get_template_directory_uri() . '/assets/new-images/location.png');

		set_theme_mod('vw_logistic_services_slide_number', '3');

		//Slider Images section
		for ($i = 1; $i <= 3; $i++) {
			set_theme_mod('vw_courier_serivce_pro_slide_image' . $i, get_template_directory_uri() . '/assets/new-images/slider/SliderImg' . $i . '.png');
		}

		set_theme_mod('vw_courier_serivce_pro_banner_tag', 'THE BEST MOVING SERVICE EVER!');
		set_theme_mod('vw_courier_serivce_pro_slider_heading', 'Fast Shipping With Quality Service');
		set_theme_mod('vw_courier_serivce_pro_slider_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		set_theme_mod('vw_courier_serivce_pro_slider_btntext', 'Explore More');



		// about section 
		set_theme_mod('vw_courier_serivce_pro_about_section_headding_tagline', 'About Us');
		set_theme_mod('vw_courier_serivce_pro_about_section_headding', 'World Class Logistics And Service Transportation');
		set_theme_mod('vw_courier_serivce_pro_about_section_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod.');
		set_theme_mod('vw_courier_serivce_pro_pricing_section_paragraph', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmod.');
		set_theme_mod('vw_courier_serivce_pro_about_achivement1', 'Certificate & Award Winner');
		set_theme_mod('vw_courier_serivce_pro_about_achivement2', 'Provide Security On Shipment');
		set_theme_mod('vw_courier_serivce_pro_about_achivement_icon1', get_template_directory_uri() . '/assets/new-images/AboutUs/AWARD.png');
		set_theme_mod('vw_courier_serivce_pro_about_achivement_icon2', get_template_directory_uri() . '/assets/new-images/AboutUs/PROVIDESECRUTY.png');
		set_theme_mod('vw_courier_serivce_pro_about_achivement_point1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
		set_theme_mod('vw_courier_serivce_pro_about_achivement_point2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
		set_theme_mod('vw_courier_serivce_pro_pricing_section_points2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
		set_theme_mod('vw_courier_serivce_pro_pricing_section_points1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
		set_theme_mod('vw_courier_serivce_pro_pricing_section_points_icon', 'fa fa-check');
		set_theme_mod('vw_courier_serivce_pro_achivement_icon', 'fa fa-check');
		set_theme_mod('vw_courier_serivce_pro_about_btn_text', 'Learn More');
		set_theme_mod('vw_courier_serivce_pro_about_btn_link', '#');
		set_theme_mod('vw_courier_serivce_pro_about_left_main_image', get_template_directory_uri() . '/assets/new-images/AboutUs/AboutImg.png');
		set_theme_mod('vw_courier_serivce_pro_about_left_image_below', get_template_directory_uri() . '/assets/new-images/AboutUs/image-below.png');
		set_theme_mod('vw_courier_serivce_pro_about_left_floating_icon1', get_template_directory_uri() . '/assets/new-images/AboutUs/delivery.png');
		set_theme_mod('vw_courier_serivce_pro_about_left_floating_icon2', get_template_directory_uri() . '/assets/new-images/AboutUs/Cetificate.png');
		set_theme_mod('vw_courier_serivce_pro_about_years_of_service', '08');

		// banner calculator 








		// setting loader color 
		set_theme_mod('vw_courier_serivce_pro_products_spinner_bgcolor', '#fff');


		// steps to dilever 


		// Set suitable values using set_theme_mod function

		// Section Heading Tag
		set_theme_mod('vw_courier_serivce_pro_steps_heading_tag', 'How To Work');

		// Section Heading
		set_theme_mod('vw_courier_serivce_pro_steps_heading', '4 Easy steps To Deliver');

		// Step 1 Image
		set_theme_mod('vw_courier_serivce_pro_step1_image', get_template_directory_uri() . '/assets/new-images/HowToWork/product.png');

		// Step 1 Title
		set_theme_mod('vw_courier_serivce_pro_step1_title', 'Received your product');

		// Step 1 Description
		set_theme_mod('vw_courier_serivce_pro_step1_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.');

		// Step 2 Image
		set_theme_mod('vw_courier_serivce_pro_step2_image', get_template_directory_uri() . '/assets/new-images/HowToWork/warehouse.png');

		// Step 2 Title
		set_theme_mod('vw_courier_serivce_pro_step2_title', 'Warehousing');

		// Step 2 Description
		set_theme_mod('vw_courier_serivce_pro_step2_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.');

		// Step 3 Image
		set_theme_mod('vw_courier_serivce_pro_step3_image', get_template_directory_uri() . '/assets/new-images/HowToWork/noted.png');

		// Step 3 Title
		set_theme_mod('vw_courier_serivce_pro_step3_title', 'Package has been handed over');

		// Step 3 Description
		set_theme_mod('vw_courier_serivce_pro_step3_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.');

		// Step 4 Image
		set_theme_mod('vw_courier_serivce_pro_step4_image', get_template_directory_uri() . '/assets/new-images/HowToWork/deliverd.png');

		// Step 4 Title
		set_theme_mod('vw_courier_serivce_pro_step4_title', 'Package has been delivered');

		// Step 4 Description
		set_theme_mod('vw_courier_serivce_pro_step4_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.');

		// Steps Section Decoration Image
		set_theme_mod('vw_courier_serivce_pro_steps_section_decoration', get_template_directory_uri() . '/assets/new-images/HowToWork/plane.png');












		// Pricing section 
		// Set suitable values using set_theme_mod function

		// Section Heading Tag
		set_theme_mod('vw_courier_serivce_pro_pricing_section_heading_tag', 'Pricing');

		// Section Heading
		set_theme_mod('vw_courier_serivce_pro_pricing_section_heading', 'Effective & Affordable Plans');

		// Package Card 1

		// Package Name
		set_theme_mod('vw_courier_serivce_pro_pricing_pack_name1', 'Regular Package');

		// Package Price
		set_theme_mod('vw_courier_serivce_pro_pricing_pack_price1', '150');
		set_theme_mod('vw_courier_serivce_pro_pricing_pack_price_currency','$');
		// Number of features for Regular package
		set_theme_mod('vw_courier_serivce_pro_package_features1', '5');

		// Features for Regular package
		for ($i = 1; $i <= 3; $i++) {
			set_theme_mod('vw_courier_serivce_pro_feature' . $i, 'Regular Feature ' . $i);
			set_theme_mod('vw_courier_serivce_pro_pricing_Feature1_' . $i, 'fa fa-check');
		}
		set_theme_mod('vw_courier_serivce_pro_pricing_card_btn1_text', 'Get Start');
		set_theme_mod('vw_courier_serivce_pro_feature4', 'Regular Feature 4');
		set_theme_mod('vw_courier_serivce_pro_feature5', 'Regular Feature 5');
		set_theme_mod('vw_courier_serivce_pro_pricing_Feature1_4', 'fa fa-times');
		set_theme_mod('vw_courier_serivce_pro_pricing_Feature1_5', 'fa fa-times');

		// Package Card 2
		set_theme_mod('vw_courier_serivce_pro_package_settings2', 'Your package settings for card 2 here');

		// Package Name for Premium package
		set_theme_mod('vw_courier_serivce_pro_pricing_pack_name2', 'Premium Package');

		// Package Price for Premium package
		set_theme_mod('vw_courier_serivce_pro_pricing_pack_price2', '250');

		// Number of features for Premium package
		set_theme_mod('vw_courier_serivce_pro_package_features2', '5');

		set_theme_mod('vw_courier_serivce_pro_pricing_pack_icon1', get_template_directory_uri() . '/assets/new-images/Pricing/fast-delivery.png');
		set_theme_mod('vw_courier_serivce_pro_pricing_pack_icon2', get_template_directory_uri() . '/assets/new-images/Pricing/fast-delivery-2.png');

		// Features for Premium package
		for ($i = 1; $i <= 5; $i++) {
			set_theme_mod('vw_courier_serivce_pro_feature_premium' . $i, 'Premium Feature ' . $i);
			set_theme_mod('vw_courier_serivce_pro_pricing_feature_icon' . $i, 'fa fa-check');
		}
		set_theme_mod('vw_courier_serivce_pro_pricing_card_btn2_text', 'Get Start');
		set_theme_mod('vw_courier_serivce_pro_corner_png', get_template_directory_uri() . '/assets/new-images/Pricing/design.png');
		// order-tracking section 	


		set_theme_mod('vw_courier_serivce_pro_order_tracking_section_headding', 'Tracking Your Order');

		set_theme_mod('vw_courier_serivce_pro_testimonial_floating_image', get_template_directory_uri() . '/assets/new-images/testimonials/LightQuote.png');

		set_theme_mod('vw_courier_serivce_pro_testimonial_floating_image2', get_template_directory_uri() . "/assets/new-images/testimonials/quote.png");


		// Set suitable values using set_theme_mod function

		// Enable/Disable Section
		set_theme_mod('vw_courier_serivce_pro_whychooseus_enabledisable', 'Enable');

		// Background Color
		set_theme_mod('vw_courier_serivce_pro_whychooseus_bg_color', '');

		// Background Image
		set_theme_mod('vw_courier_serivce_pro_whychooseus_bg_image', get_template_directory_uri() . '/assets/new-images/WhyChooseUs/whychooseusBgS.png');

		// Background Image Attachment
		// set_theme_mod('vw_courier_serivce_pro_whychooseus_bg_image_attachment', 'vw-fixed');

		// Why Choose Heading Tag
		set_theme_mod('vw_courier_serivce_pro_about_whychooseus_heading_tag', 'Why Choose Us');

		// Why Choose Heading
		set_theme_mod('vw_courier_serivce_pro_about_whychooseus_heading', 'We Are The World`s Leading Shipping Service Provider');

		// Main Image
		set_theme_mod('vw_courier_serivce_pro_whychooseus_main_image', get_template_directory_uri() . '/assets/new-images/WhyChooseUs/image.png');

		// Video Icon
		// set_theme_mod('vw_courier_serivce_pro_whychooseus_video_icon', 'video-icon.png');
		set_theme_mod('vw_courier_serivce_pro_video_title', ' How It Work? watch video tour');
		// Text Fields
		set_theme_mod('vw_courier_serivce_pro_text_field1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim');

		set_theme_mod('vw_courier_serivce_pro_text_field2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim');

		set_theme_mod('vw_courier_serivce_pro_text_field3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim');

		// Counter Titles and Counts
		set_theme_mod('vw_courier_serivce_pro_counter1_title', 'Delivered packages.');
		set_theme_mod('vw_courier_serivce_pro_counter1_count', '55,555');

		set_theme_mod('vw_courier_serivce_pro_counter2_title', 'Satisfied Clients');
		set_theme_mod('vw_courier_serivce_pro_counter2_count', '9,500');

		set_theme_mod('vw_courier_serivce_pro_counter3_title', 'Tons of goods');
		set_theme_mod('vw_courier_serivce_pro_counter3_count', '7,000');

		set_theme_mod('vw_courier_serivce_pro_counter4_title', 'Countries covered');
		set_theme_mod('vw_courier_serivce_pro_counter4_count', '12000');
		set_theme_mod('vw_courier_serivce_pro_video_link', 'https://www.youtube.com/watch?v=Io98M2MoT1s&ab_channel=LogisticsManager');


		// FAQ Section 


		// Set suitable values using set_theme_mod function

		// Enable/Disable Section
		set_theme_mod('vw_courier_serivce_pro_faq_enable', 'Enable');

		// Background Color
		set_theme_mod('vw_courier_serivce_pro_faq_bgcolor', '#FFFFFF');

		// Background Image
		set_theme_mod('vw_courier_serivce_pro_faq_bgimage', '');
		// Background Image Attachment
		set_theme_mod('vw_courier_serivce_pro_faq_bgimage_setting', 'vw-fixed');

		// Heading Tagline
		set_theme_mod('vw_courier_serivce_pro_faq_heading_tagline', 'FAQ`s');

		// Section Heading
		set_theme_mod('vw_courier_serivce_pro_faq_heading', 'Frequently Asked Questions');
		set_theme_mod('vw_courier_serivce_pro_dropdown_icon_setting', 'fas fa-chevron-down');

		// FAQ Section Image
		set_theme_mod('vw_courier_serivce_pro_faq_image', get_template_directory_uri() . '/assets/new-images/faqs-img1.png');

		// Service Attribute 1
		set_theme_mod('vw_courier_serivce_pro_faq_service_attribute1_title', 'Reliable & Trustworthy');
		set_theme_mod('vw_courier_serivce_pro_faq_service_attribute1_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua');

		// Service Attribute 1 Icon
		set_theme_mod('vw_courier_serivce_pro_faq_service_attribute1_icon', get_template_directory_uri() . '/assets/new-images/Faq-icon.png');

		// Service Attribute 2
		set_theme_mod('vw_courier_serivce_pro_faq_service_attribute2_title', 'High Quality Material');
		set_theme_mod('vw_courier_serivce_pro_faq_service_attribute2_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua');

		// Service Attribute 2 Icon
		set_theme_mod('vw_courier_serivce_pro_faq_service_attribute2_icon', get_template_directory_uri() . '/assets/new-images/faq-icon2.png');

		// Number of Questions to Add
		set_theme_mod('vw_courier_serivce_pro_faq_count', '5');

		// Questions and Answers
		for ($i = 1; $i <= 5; $i++) {
			set_theme_mod('vw_courier_serivce_pro_faq1', 'How to send my percel?');
			set_theme_mod('vw_courier_serivce_pro_faq2', 'What is the best way to use service?');
			set_theme_mod('vw_courier_serivce_pro_faq3', 'Why Transico is very popualr?');
			set_theme_mod('vw_courier_serivce_pro_faq4', 'How to get refund from service?');
			set_theme_mod('vw_courier_serivce_pro_faq5', 'How to receive my percel?');
			set_theme_mod('vw_courier_serivce_pro_faq_answer' . $i, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua' . $i);
		}

		// FAQ Section end 

		// Our Team Section 
		// set heading 

		set_theme_mod('vw_courier_serivce_pro_our_team_heading_tag_font_text', 'Our Team');
		set_theme_mod('vw_courier_serivce_pro_our_team_heading_font_text', 'Meet The Excecutive Panel');
		// Dummy data for team members
		$team_members = array(
			array(
				'name' => 'Jessica Brown',
				'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
				'designation' => 'CEO',
				'facebook' => 'https://www.facebook.com/johndoe',
				'twitter' => 'https://www.twitter.com/johndoe',
				'instagram' => 'https://www.instagram.com/johndoe',
				'whatsapp' => '+1234567890',
			),
			array(
				'name' => 'Mandela Brown',
				'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				'designation' => 'Delivery Supervisor',
				'facebook' => 'https://www.facebook.com/Mandela',
				'twitter' => 'https://www.twitter.com/Mandela',
				'instagram' => 'https://www.instagram.com/Mandela',
				'whatsapp' => '+9876543210',
			),
			array(
				'name' => 'Swan Mickle',
				'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				'designation' => 'Customer Support',
				'facebook' => 'https://www.facebook.com/Swan',
				'twitter' => 'https://www.twitter.com/Swan',
				'instagram' => 'https://www.instagram.com/Swan',
				'whatsapp' => '+9876543210',
			),
			array(
				'name' => 'John Smith',
				'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
				'designation' => 'General Manager',
				'facebook' => 'https://www.facebook.com/Smith',
				'twitter' => 'https://www.twitter.com/Smith',
				'instagram' => 'https://www.instagram.com/Smith',
				'whatsapp' => '+9876543210',

			)
		);

		// Initialize the counter outside the loop
		$i = 1;

		foreach ($team_members as $member) {
			// Insert the post
			$dummy_post_args = array(
				'post_title' => $member['name'],
				'post_content' => $member['content'],
				'post_type' => 'our_team',
				'post_status' => 'publish',
			);

			$dummy_post_id = wp_insert_post($dummy_post_args);

			// Add dummy meta fields for the designation
			update_post_meta($dummy_post_id, '_our_team_designation', $member['designation']);

			// Add dummy social media links
			update_post_meta($dummy_post_id, '_our_team_facebook', $member['facebook']);
			update_post_meta($dummy_post_id, '_our_team_twitter', $member['twitter']);
			update_post_meta($dummy_post_id, '_our_team_instagram', $member['instagram']);
			update_post_meta($dummy_post_id, '_our_team_whatsapp', $member['whatsapp']);


			$image_url = get_template_directory_uri() . '/assets/new-images/team/team-' . $i . '.png';

			$image_name = 'team' . $i . '.png';
			$upload_dir = wp_upload_dir(); // Set upload folder
			$image_data = file_get_contents($image_url); // Get image data
			$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name); // Generate unique name
			$filename = basename($unique_file_name);

			// Check folder permission and define file location
			if (wp_mkdir_p($upload_dir['path'])) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}

			// Create the image file on the server
			file_put_contents($file, $image_data);

			// Check image file type
			$wp_filetype = wp_check_filetype($filename, null);

			// Set attachment data
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => sanitize_file_name($filename),
				'post_content' => '',
				'post_type' => 'attachment',
				// Change post type to 'attachment'
				'post_status' => 'inherit'
			);

			// Create the attachment
			$attach_id = wp_insert_attachment($attachment, $file, $dummy_post_id); // Use $dummy_post_id

			// Include image.php
			require_once (ABSPATH . 'wp-admin/includes/image.php');

			// Define attachment metadata
			$attach_data = wp_generate_attachment_metadata($attach_id, $file);

			// Assign metadata to attachment
			wp_update_attachment_metadata($attach_id, $attach_data);

			// And finally assign featured image to post
			set_post_thumbnail($dummy_post_id, $attach_id); // Use $dummy_post_id

			$i++; // Increment the counter
		}
		// Team Social icon settings 


		set_theme_mod('vw_courier_serivce_pro_social_icon1', 'fab fa-facebook-f');
		set_theme_mod('vw_courier_serivce_pro_social_icon3', 'fab fa-instagram');
		set_theme_mod('vw_courier_serivce_pro_social_icon2', 'fab fa-twitter');
		set_theme_mod('vw_courier_serivce_pro_social_icon4', 'fab fa-whatsapp');



		// Our Team Section End********************************


		//*********************** * GetInTouch Section *************************************

		// Section
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_sec', __('Get In Touch', 'vw-courier-serivce-pro'));

		// Enable/Disable Section
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_enable', 'Enable');

		// Background Color
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_bgcolor', '');

		// Background Image
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_bgimage', get_template_directory_uri() . '/assets/new-images/GetInTouch/IMG.png');

		// Background Image Attachment
		// set_theme_mod('vw_courier_serivce_pro_latest_GetInTouch_bg_image_attachment', 'vw-scroll');

		// Heading Tagline
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_heading_tagline', 'Get In Touch');

		// Heading
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_heading_font_text', 'We Provide Full Assistance In Freight And Warehousing.');

		// Section Description
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_section_desc', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form ...');

		// Support Text
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_support_text', 'Emergency Support');

		// Support Contact Number
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_support_contact_number', '1234567890');

		// Support Icon
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_support_icon', get_template_directory_uri() . '/assets/new-images/GetInTouch/emergency-call.png');

		// Feature 1 Icon
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_feature1_icon', get_template_directory_uri() . '/assets/new-images/GetInTouch/staff.png');

		// Feature 1 Title
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_feature1_title', 'Professional Staff');

		// Feature 1 Description
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_feature1_desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting.');

		// Feature 2 Icon
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_feature2_icon', get_template_directory_uri() . '/assets/new-images/GetInTouch/Delivery.png');

		// Feature 2 Title
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_feature2_title', 'Delivery Anywhere');

		// Feature 2 Description
		set_theme_mod('vw_courier_serivce_pro_GetInTouch_feature2_desc', 'Lorem Ipsum is simply dummy text of the printing and typesetting.');




		// Testimonials Section *************************

		$testimonials = array(
			array(
				'title' => 'Great Experience',
				'content' => '"I have been consistently impressed with the exceptional logistic services provided by [Logistic Company Name]. Their dedication to ensuring timely deliveries and efficient handling of shipments is truly commendable. The team`s attention to detail and commitment to customer satisfaction is evident in every interaction I`ve had with them.',
				'customer_name' => 'John Doe',
				'service_used' => 'Road Fright Service',
			),
			array(
				'title' => 'Highly Recommended',
				'content' => 'What stands out the most is their ability to adapt to unforeseen challenges. Even in the face of unexpected hurdles, the team at [Logistic Company Name] remains resilient and finds innovative solutions to keep shipments on track. It`s this dedication to going above and beyond that truly sets them apart.',
				'customer_name' => 'Jane Smith',
				'service_used' => 'Sea Fright Service',
			),
			// Add more testimonials here
		);

		// Incremented counter initialization
		$j = 1;

		foreach ($testimonials as $testimonial) {
			// Insert the post
			$testimonial_args = array(
				'post_title' => $testimonial['title'],
				'post_content' => $testimonial['content'],
				'post_type' => 'testimonials',
				'post_status' => 'publish',
			);

			$testimonial_id = wp_insert_post($testimonial_args);

			// Add testimonial meta fields
			update_post_meta($testimonial_id, '_customer_name', $testimonial['customer_name']);
			update_post_meta($testimonial_id, '_service_used', $testimonial['service_used']);

			// Corrected variable name for the image counter
			$image_url = get_template_directory_uri() . '/assets/new-images/testimonials/profile' . $j . '.png';

			$image_name = 'profile' . $j . '.png';
			$upload_dir = wp_upload_dir();
			$image_data = file_get_contents($image_url);
			$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
			$filename = basename($unique_file_name);

			if (wp_mkdir_p($upload_dir['path'])) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}

			file_put_contents($file, $image_data);

			$wp_filetype = wp_check_filetype($filename, null);

			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => sanitize_file_name($filename),
				'post_content' => '',
				'post_type' => 'attachment',
				'post_status' => 'inherit',
			);

			$attach_id = wp_insert_attachment($attachment, $file, $testimonial_id); // Use $testimonial_id

			require_once (ABSPATH . 'wp-admin/includes/image.php');

			$attach_data = wp_generate_attachment_metadata($attach_id, $file);
			wp_update_attachment_metadata($attach_id, $attach_data);

			set_post_thumbnail($testimonial_id, $attach_id); // Use $testimonial_id

			$j++; // Increment the counter
		}
		set_theme_mod('vw_courier_serivce_pro_testimonial_heading_tag_font_text', 'Testimonial');
		set_theme_mod('vw_courier_serivce_pro_testimonial_heading_font_text', 'Stories From Our Users');


		// ---------------our services---------------
		set_theme_mod('vw_courier_serivce_pro_our_services_sub_heading', 'Services');
		set_theme_mod('vw_courier_serivce_pro_our_services_heading', 'Trusted Logistic & Transport');
		set_theme_mod('vw_courier_serivce_pro_our_services_paragraph', "Stay on top of your car's scheduled maintenance with our hassle-free service options and keep your car running smoothly");

		set_theme_mod('vw_courier_serivce_pro_our_services_page_sub_heading', 'OUR SERVICES');
		set_theme_mod('vw_courier_serivce_pro_our_services_page_heading', "Services That We Offer");
		set_theme_mod('vw_courier_serivce_pro_our_services_page_paragraph', "Enhance your car's performance with our selection of high-quality car parts, designed for speed and power");
		$service_content = '
							<div class="main_content">
								<p class="sevices_para">ur airfreight staff attaches great importance to customizing the booking process for our customers. That’s why we strive to find the air freight solution that best suits your needs.We’ll ask you when the freight is available, what the required delivery date is, and if there potential to save on time or cost. Your answers to these and other questions help us decide if you should book the air freight as direct. We’ll also see if our sea-air service is a better solution for you.</p>
							</div>

							    <div id="service_detail">
							        <div class="content">
							          <div class="para_one sevices_para">
							            <p class="sevices_para">We have more than twenty years of experience. During that time, we’ve become expert in freight transportation by air and all its related services. We work closely with all major airlines around the world. Ongoing negotiations ensure that we always have the cargo space we need and the ability to offer you competitive rates even during the high season.</p>
							          </div>
							          <div class="para_two">
							            <p class="sevices_para">We have more than twenty years of experience. During that time, we’ve become expert in freight transportation by air and all its related services. We work closely with all major airlines around the world. Ongoing negotiations ensure that we always have the cargo space we need and the ability to offer you competitive rates even during the high season.</p>
							          </div>
							          
							        </div>
							    </div>';

		$services_name = array('Loading & Unloading', 'Commercial & Local', 'Storage Units', 'Rail Freight', 'Ware Housing', 'Distribution');
		for ($i = 1; $i <= 6; $i++) {
			$title = $services_name[$i - 1];
			$content = $service_content;
			// Create post object
			$my_post = array(
				'post_title' => wp_strip_all_tags($title),
				'post_content' => $content,
				'post_status' => 'publish',
				'post_type' => 'services',
			);

			// Insert the post into the database
			$post_id = wp_insert_post($my_post);
			update_post_meta($post_id, 'services_icon', get_template_directory_uri() . '/assets/new-images/Service/serviceIcon' . $i . '.png');
			$image_url = get_template_directory_uri() . '/assets/new-images/Service/Services0' . $i . '.png';
			$image_name = 'services' . $i . '.png';
			$upload_dir = wp_upload_dir(); // Set upload folder
			$image_data = file_get_contents($image_url); // Get image data
			$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name); // Generate unique name
			$filename = basename($unique_file_name); // Create image file name

			// Check folder permission and define file location
			if (wp_mkdir_p($upload_dir['path'])) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}
			// Create the image  file on the server
			file_put_contents($file, $image_data);

			// Check image file type
			$wp_filetype = wp_check_filetype($filename, null);

			// Set attachment data
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => sanitize_file_name($filename),
				'post_content' => '',
				'post_type' => 'services',
				'post_status' => 'inherit'
			);

			// Create the attachment
			$attach_id = wp_insert_attachment($attachment, $file, $post_id);

			// Include image.php
			require_once (ABSPATH . 'wp-admin/includes/image.php');

			// Define attachment metadata
			$attach_data = wp_generate_attachment_metadata($attach_id, $file);

			// Assign metadata to attachment
			wp_update_attachment_metadata($attach_id, $attach_data);

			// And finally assign featured image to post
			set_post_thumbnail($post_id, $attach_id);
			update_post_meta($post_id, 'service_bottom_question', 'How It Works?');
			update_post_meta($post_id, 'service_bottom_answer', 'We have more than twenty years of experience. During that time, we’ve become expert in freight transportation by air and all its related services. We work closely with all major airlines around the world. Ongoing negotiations ensure that we always have the cargo space we need and the ability to offer you competitive rates even during the high season.');
		}


		// Appointment form

		// appointment shortcode
		$cf7title = "appointment";
		$cf7content = '
		<div class="input-wrapper">
		<label for="pickup-address">Pickup Address:</label>
			[text* text-128 placeholder "Sending From"]
		</div>
		<div class="input-wrapper">
		<label for="drop-address">Drop Address:</label>
			[text* text-128 placeholder "Sending To"]
		</div>
		<div class="input-wrapper">
		<label for="phone-number">Phone Number:</label>
		   [tel* tel-81 placeholder "Enter Contact Number"]
		</div>
		
		<div class="input-wrapper dropdown">
		<label>Approximate Weight:</label>
			[select* menu-773 "small(1 to 10kg)" "medium(10 to 100kg)" "Large(100 to 1000kg)"]
		</div>
		<div class="submit-wrapper-banner">
			[submit id:Submit-btn "Get A Estimate"]
		</div>

					[_site_title] "[your-subject]"
					[_site_title] <abc@gmail.com>
					From: [your-name] <[your-email]>
					Subject: [your-subject]

					Message Body:
					[your-message]

					--
					This e-mail was sent from a contact form on [_site_title] ([_site_url])
					[_site_admin_email]
					Reply-To: [your-email]

					0
					0

					[_site_title] "[your-subject]"
					[_site_title] <abc@gmail.com>
					Message Body:
					[your-message]

					--
					This e-mail was sent from a contact form on [_site_title] ([_site_url])
					[your-email]
					Reply-To: [_site_admin_email]

					0
					0
					Thank you for your message. It has been sent.
					There was an error trying to send your message. Please try again later.
					One or more fields have an error. Please check and try again.
					There was an error trying to send your message. Please try again later.
					You must accept the terms and conditions before sending your message.
					The field is required.
					The field is too long.
					The field is too short.
					There was an unknown error uploading the file.
					You are not allowed to upload files of this type.
					The file is too big.
					There was an error uploading the file.';

		$cf7_post = array(
			'post_title' => wp_strip_all_tags($cf7title),
			'post_content' => $cf7content,
			'post_status' => 'publish',
			'post_type' => 'wpcf7_contact_form',
		);
		// Insert the post into the database
		$cf7post_id = wp_insert_post($cf7_post);

		add_post_meta($cf7post_id, "_form", '
		<div class="input-wrapper">
<label for="pickup-address">Pickup Address:</label>
    [text* text-128 placeholder "Sending From"]
</div>
<div class="input-wrapper">
<label for="drop-address">Drop Address:</label>
    [text* text-128 placeholder "Sending To"]
</div>
<div class="input-wrapper">
<label for="phone-number">Phone Number:</label>
   [tel* tel-81 placeholder "Enter Contact Number"]
</div>

<div class="input-wrapper dropdown">
<label>Approximate Weight:</label>
    [select* menu-773 "small(1 to 10kg)" "medium(10 to 100kg)" "Large(100 to 1000kg)"]
</div>
<div class="submit-wrapper-banner">
    [submit id:Submit-btn "Get A Estimate"]
</div>');

		$cf7mail_data = array(
			'subject' => '[_site_title] "[your-subject]"',
			'sender' => '[_site_title] <abc@gmail.com>',
			'body' => 'From: [your-name] <[your-email]>
					Subject: [your-subject]

					Message Body:
					[your-message]

					--
					This e-mail was sent from a contact form on [_site_title] ([_site_url])',
			'recipient' => '[_site_admin_email]',
			'additional_headers' => 'Reply-To: [your-email]',
			'attachments' => '',
			'use_html' => 0,
			'exclude_blank' => 0
		);

		add_post_meta($cf7post_id, "_mail", $cf7mail_data);
		// Gets term object from Tree in the database.

		$cf7shortcode = '[contact-form-7 id="' . $cf7post_id . '" title="' . $cf7title . '"]';

		set_theme_mod('vw_courier_serivce_pro_cost_calcuator_shortcode', $cf7shortcode);
		set_theme_mod('vw_logistics_servics_topbar_background_color', '#000');
		set_theme_mod('vw_courier_serivce_pro_res_open_menu_icon', 'fas fa-bars');


		// Sngle Services 

		// Set values for theme mods
		set_theme_mod('vw_courier_serivce_pro_single_service_list_title', 'Transportation Service');
		set_theme_mod('vw_courier_serivce_pro_single_service_list_length', 4);


		set_theme_mod('vw_courier_serivce_pro_single_services_list1', 'Aenean viverra pellentesque luctus.');
		set_theme_mod('vw_courier_serivce_pro_single_services_list2', 'Warehousing.');
		set_theme_mod('vw_courier_serivce_pro_single_services_list3', 'Warehouse Management Systems (WMS).');
		set_theme_mod('vw_courier_serivce_pro_single_services_list4', 'Freight Distribution.');


		set_theme_mod('vw_courier_serivce_pro_single_service_btn_txt', 'Book Now');
		set_theme_mod('vw_courier_serivce_pro_single_service_img', get_template_directory_uri() . '/assets/new-images/Blog/orr.png');

		set_theme_mod('vw_courier_serivce_pro_single_service_counter1_title', 'We Covered');
		set_theme_mod('vw_courier_serivce_pro_single_service_counter1', 158);
		set_theme_mod('vw_courier_serivce_pro_single_service_counter1_text', 'National Gateways');
		set_theme_mod('vw_courier_serivce_pro_single_service_counter1_img', get_template_directory_uri() . '/assets/new-images/Service/worldwide.png');

		set_theme_mod('vw_courier_serivce_pro_single_service_counter2_title', 'We Handeled');
		set_theme_mod('vw_courier_serivce_pro_single_service_counter2', 2058);
		set_theme_mod('vw_courier_serivce_pro_single_service_counter2_text', 'Tons of road fright');
		set_theme_mod('vw_courier_serivce_pro_single_service_counter2_img', get_template_directory_uri() . '/assets/new-images/Service/box.png');

		set_theme_mod('vw_courier_serivce_pro_single_service_widget_image', get_template_directory_uri() . '/assets/new-images/Service/ICON.png');
		set_theme_mod('vw_courier_serivce_pro_single_service_widget_title', 'Best Logistics Services');
		set_theme_mod('vw_courier_serivce_pro_single_service_widget_number', '123 456 7890');
		set_theme_mod('vw_courier_serivce_pro_single_service_widget_text', 'Call Us Anytime');






		// Recent post 

		// Set values for theme mods
		set_theme_mod('vw_courier_serivce_pro_single_blog_heading_tag', 'Posts');
		set_theme_mod('vw_courier_serivce_pro_single_blog_heading', 'Related Blog Posts');

		// Related Services 

		set_theme_mod('vw_courier_serivce_pro_single_services_heading_tag', 'Service');
		set_theme_mod('vw_courier_serivce_pro_single_services_heading', 'Related Services');



		// Recent post end 



		// About us page 
		// Set values for theme mods

		// About Us Page Section
		set_theme_mod('vw_courier_serivce_pro_aboutus_inner_bgcolor', '');
		set_theme_mod('vw_courier_serivce_pro_aboutus_inner_bgimage', '');
		set_theme_mod('vw_courier_serivce_pro_aboutus_inner_bg_attachment', 'vw-scroll');

		// Our Mission Section
		set_theme_mod('vw_courier_serivce_pro_aboutus_inner_mission_img', get_template_directory_uri() . '/assets/new-images/AboutUs/InnerPage/our-mission.png');
		set_theme_mod('vw_courier_serivce_pro_mission_heading', 'Our Mission Is To Give You Good Service');
		set_theme_mod('vw_courier_serivce_pro_mission_bold_text', 'to deliver unparalleled service excellence that sets new standards in your experience with us.');
		set_theme_mod('vw_courier_serivce_pro_mission_text', 'Our mission is to give you good service. At the core of our existence, we are driven by the unwavering commitment to provide you with the best possible experience. Every day, our dedicated team works tirelessly to ensure that you receive not just service but exceptional service that exceeds your expectations. We understand that your satisfaction is the measure of our success, and it fuels our determination to continuously improve and innovate. ');

		// The Best Section
		set_theme_mod('vw_courier_serivce_pro_aboutus_inner_best_bgimg', get_template_directory_uri() . '/assets/new-images/AboutUs/InnerPage/bg.png');
		set_theme_mod('vw_courier_serivce_pro_aboutus_inner_best_img', get_template_directory_uri() . '/assets/new-images/AboutUs/InnerPage/ment.png');
		set_theme_mod('vw_courier_serivce_pro_best_heading_tagline', 'Why We Are Best');
		set_theme_mod('vw_courier_serivce_pro_best_heading', 'A Few Reasons Choose Us Protect Yourself');
		set_theme_mod('vw_courier_serivce_pro_best_text', 'Happy Clients with Trust Score 4.7/5 (Based on 1,200 reviews).');

		// The Brand Section
		set_theme_mod('vw_courier_serivce_pro_brand_heading', 'The Trucking Brand');
		set_theme_mod('vw_courier_serivce_pro_brand_text', 'What sets Truking apart from its competitors is its relentless pursuit of excellence. Truking`s vehicles are renowned for their durability, efficiency, and cutting-edge technology. The brand`s commitment to research and development has resulted in a range of products that cater to a diverse spectrum of industries, from logistics and transportation to construction.');
		set_theme_mod('vw_courier_serivce_pro_about_inner_brand_list', 'Link to your site: To check your site...');
		set_theme_mod('vw_courier_serivce_pro_brand_image', get_template_directory_uri() . '/assets/new-images/AboutUs/InnerPage/truckingimage.png');
		// For 'vw_courier_serivce_pro_brand_list_length'
		set_theme_mod('vw_courier_serivce_pro_brand_list_length', '3');

		$licount = get_theme_mod('vw_courier_serivce_pro_brand_list_length');


		// For 'vw_courier_serivce_pro_brand_list_' . $i
		set_theme_mod('vw_courier_serivce_pro_brand_list_1', 'A Legacy of Innovation');
		set_theme_mod('vw_courier_serivce_pro_brand_list_2', 'Global Reach and Local Expertise');
		set_theme_mod('vw_courier_serivce_pro_brand_list_3', 'Sustainability and Responsibility');




		// Security Section
		set_theme_mod('vw_courier_serivce_pro_security_heading', 'Safety And Security');
		set_theme_mod('vw_courier_serivce_pro_security_text', 'Safety and security are paramount concerns for any transport site, whether it`s a transportation hub, a bus terminal, a train station, an airport, or even a shipping port. Ensuring the safety and security of passengers, employees, and infrastructure is crucial to providing a reliable and trustworthy transportation service. ');
		set_theme_mod('vw_courier_serivce_pro_security1_text', 'Describe the use of advanced surveillance cameras and monitoring systems to keep a close watch on all areas of the transport site.');
		set_theme_mod('vw_courier_serivce_pro_security_image', get_template_directory_uri() . '/assets/new-images/AboutUs/InnerPage/SAVE.png');

		// Client and Partners Section
		set_theme_mod('vw_courier_serivce_pro_client_heading', 'Client & Partners');
		set_theme_mod('vw_courier_serivce_pro_client_length', '4');

		for ($i = 1; $i <= 4; $i++) {
			set_theme_mod('vw_courier_serivce_pro_client_image' . $i, get_template_directory_uri() . '/assets/new-images/AboutUs/InnerPage/client' . $i . '.png');
		}

		// Distrubution Overview Section
		for ($i = 1; $i <= 4; $i++) {
			set_theme_mod('vw_courier_serivce_pro_overview_image' . $i, get_template_directory_uri() . '/assets/new-images/AboutUs/package-box-' . $i . '.png');

		}
		set_theme_mod('vw_courier_serivce_pro_overview_count1', '55,555');
		set_theme_mod('vw_courier_serivce_pro_overview_count2', '7,000');
		set_theme_mod('vw_courier_serivce_pro_overview_count3', '9,500');
		set_theme_mod('vw_courier_serivce_pro_overview_count4', '12,000');




		set_theme_mod('vw_courier_serivce_pro_overview_title1', 'Delivered packages');
		set_theme_mod('vw_courier_serivce_pro_overview_title2', 'Tons of goods');
		set_theme_mod('vw_courier_serivce_pro_overview_title3', 'Countries covered');
		set_theme_mod('vw_courier_serivce_pro_overview_title4', 'Satisfied Clients');



		// About us page end 


		// Get A Quote Page 
		set_theme_mod('vw_courier_serivce_pro_getaquote_page_bgcolor', '');

		// Set background image
		set_theme_mod('vw_courier_serivce_pro_getaquote_page_bgimage', '');

		// Set background image attachment
		set_theme_mod('vw_courier_serivce_pro_getaquote_page_bg_attachment', 'vw-fixed');

		// Set heading tagline
		set_theme_mod('vw_courier_serivce_pro_getaquote_page_heading_tag', 'Get A Quote');

		// Set page heading
		set_theme_mod('vw_courier_serivce_pro_getaquote_page_heading', 'Get In Touch With Us');

		// Set Option 1 Image URL
		set_theme_mod('vw_courier_serivce_pro_getaquote_icon1', get_template_directory_uri() . '/assets/new-images/GetInTouch/telephone.png');

		// Set Option 1 Title	`
		set_theme_mod('vw_courier_serivce_pro_getaquote_telephone', 'Telephone Number');

		// Set Option 1 Value 2
		set_theme_mod('vw_courier_serivce_pro_getaquote_telephone_number', '+91 1234567890');

		// Set Option 1 Value 1
		set_theme_mod('vw_courier_serivce_pro_getaquote_telephone_number2', '(111) 456-4545');

		// Set Option 2 Image URL
		set_theme_mod('vw_courier_serivce_pro_getaquote_icon2', get_template_directory_uri() . '/assets/new-images/GetInTouch/email.png');

		// Set Option 2 Title
		set_theme_mod('vw_courier_serivce_pro_getaquote_email', 'Email Address');

		// Set Option 2 Value
		set_theme_mod('vw_courier_serivce_pro_getaquote_email_id', 'vwtrans@gmail.com');

		// Set Option 3 Image URL
		set_theme_mod('vw_courier_serivce_pro_getaquote_icon3', get_template_directory_uri() . '/assets/new-images/GetInTouch/location.png');

		// Set Option 3 Title
		set_theme_mod('vw_courier_serivce_pro_getaquote_address', 'Office Address');

		// Set Option 3 Value
		set_theme_mod('vw_courier_serivce_pro_getaquote_office_address', 'Transport City NewYork');

		// Set Form Heading
		set_theme_mod('vw_courier_serivce_pro_getaquote_from_heading', 'Request A Free Quote');

		// Set Form Heading Tagline
		set_theme_mod('vw_courier_serivce_pro_getaquote_from_heading_tagline', 'Active & Ready to use Contact Form!');


		// Set Form Background Image URL
		set_theme_mod('vw_courier_serivce_pro_getaquote_from_bgImage', get_template_directory_uri() . '/assets/new-images/GetInTouch/bg.png');

		$cf7title = "Get A Quote";
		$cf7content = '
		<div class="row">
		<div class="input-wrap col-lg-6 col-md-12 col-12">[text* clientname class:name Placeholder "Name"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[tel* phone class:phone Placeholder "Phone"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* city class:cityOne Placeholder "City Departure"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* DeliveryCity class:cityTwo Placeholder "City Delivery"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[select* Categories class:categories "Categories" "Air Fright" "Sea Fright" "Road Fright" "Rail Fright"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* Dimentions class:dimentions Placeholder "Dimentions (__X__ m)"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[email* Email class:emailid Placeholder "Email"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* Incoterms class:iIncoterms Placeholder "Incoterms"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[number* GrossWeight min:0 max:9999 class:grossWeight Placeholder "Total Gross Weight (kgs)"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[textarea* Message class:message Placeholder "Message"]</div>
		</div>
		[submit id:submit-button class:submit "Submit"]
		</div>
		--
		This e-mail was sent from a contact form on [_site_title] ([_site_url])
		[_site_admin_email]
		Reply-To: [your-email]

		0
		0
		Subject: [your-subject]
                From:[name]
                contact number: [phone]
                Pickup:[city]
                Drop:[DeliveryCity]
                Categories: [Categories]
                Client Email:[Email]
                Gross Weight:[GrossWeight]
                Messsage:[Message]
		--
		This e-mail was sent from a contact form on [_site_title] ([_site_url])

		Reply-To: [_site_admin_email]

		0
		0
		Thank you for your message. It has been sent.
		There was an error trying to send your message. Please try again later.
		One or more fields have an error. Please check and try again.
		There was an error trying to send your message. Please try again later.
		You must accept the terms and conditions before sending your message.
		The field is required.
		The field is too long.
		The field is too short.
		There was an unknown error uploading the file.
		You are not allowed to upload files of this type.
		The file is too big.
		There was an error uploading the file.';

		$cf7_post = array(
			'post_title' => wp_strip_all_tags($cf7title),
			'post_content' => $cf7content,
			'post_status' => 'publish',
			'post_type' => 'wpcf7_contact_form',
		);
		// Insert the post into the database
		$cf7post_id = wp_insert_post($cf7_post);

		add_post_meta($cf7post_id, "_form", '<div class="row">
		<div class="input-wrap col-lg-6 col-md-12 col-12">[text* clientname class:name Placeholder "Name"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[tel* phone class:phone Placeholder "Phone"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* city class:cityOne Placeholder "City Departure"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* DeliveryCity class:cityTwo Placeholder "City Delivery"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[select* Categories class:categories "Categories" "Air Fright" "Sea Fright" "Road Fright" "Rail Fright"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* Dimentions class:dimentions Placeholder "Dimentions (__X__ m)"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[email* Email class:emailid Placeholder "Email"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[text* Incoterms class:iIncoterms Placeholder "Incoterms"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[number* GrossWeight min:0 max:9999 class:grossWeight Placeholder "Total Gross Weight (kgs)"]</div>
				<div class="input-wrap col-lg-6 col-md-12 col-12">[textarea* Message class:message Placeholder "Message"]</div>
		</div>
		[submit id:submit-button class:submit "Submit"]');


		$cf7mail_data = array(
			'subject' => '[_site_title] "[your-subject]"',
			'sender' => '[_site_title] <abc@gmail.com>',
			'body' => ' New quotation request!
			         From:[name]
			         contact number: [phone]
			         Pickup:[city]
			         Drop:[DeliveryCity]
			         Categories: [Categories]
			         Client Email:[Email]
			         Gross Weight:[GrossWeight]
			         Messsage:[Message]

					--
					This e-mail was sent from a contact form on [_site_title] ([_site_url])',
			'recipient' => '[_site_admin_email]',
			'additional_headers' => 'Reply-To: [your-email]',
			'attachments' => '',
			'use_html' => 0,
			'exclude_blank' => 0
		);
		add_post_meta($cf7post_id, "_mail", $cf7mail_data);
		// Gets term object from Tree in the database.

		$cf7shortcode = '[contact-form-7 id="' . $cf7post_id . '" title="' . $cf7title . '"]';

		// Set Get A Quote Form Shortcode
		set_theme_mod('vw_courier_serivce_pro_getaquote_from_shortcode', $cf7shortcode);



		// Support page 

		// For 'vw_courier_serivce_pro_contactus_page_bgcolor'
		set_theme_mod('vw_courier_serivce_pro_contactus_page_bgcolor', '');

		// For 'vw_courier_serivce_pro_contactus_page_bgimage'
		set_theme_mod('vw_courier_serivce_pro_contactus_page_bgimage', '');

		// For 'vw_courier_serivce_pro_contactus_page_bg_attachment'
		set_theme_mod('vw_courier_serivce_pro_contactus_page_bg_attachment', '');

		// For 'vw_courier_serivce_pro_contactus_contact_sectionheading'
		set_theme_mod('vw_courier_serivce_pro_contactus_contact_sectionheading', 'Contact Information');

		// For 'vw_courier_serivce_pro_contactus_contact_section_desc'
		set_theme_mod('vw_courier_serivce_pro_contactus_contact_section_desc', 'Fill up the contact form and our team will get back in touch with you within 24 hours.');

		// For 'vw_courier_serivce_pro_contactus_location_bg_image'
		set_theme_mod('vw_courier_serivce_pro_contactus_location_bg_image', get_template_directory_uri() . '/assets/new-images/Contactbgimages.png');

		// For 'vw_courier_serivce_pro_contactus_latitude'
		set_theme_mod('vw_courier_serivce_pro_contactus_latitude', '21.1458');

		// For 'vw_courier_serivce_pro_contactus_longitude'
		set_theme_mod('vw_courier_serivce_pro_contactus_longitude', '79.0882');



		$cf7title = "Contact Us Form";
		$cf7content = '
		<div class="row">
		<div class="input-wrapper">
			[text* name class:Name placeholder "Enter Your Name"]
		</div>
		<div class="input-wrapper">
			[tel* Phone-number class:PhoneNumber placeholder "Phone Number"]
		</div>
		<div class="input-wrapper">
			[email* Email class:Email placeholder "Enter Your Email"]
		</div>
		<div class="input-wrapper">
			[textarea* Message class:Message placeholder "Message"]
		</div>
		<div class="input-wrapper">
			[submit class:submit id:submit-button "Submit"]
		</div>
	</div>
	[_site_title] "[your-subject]"
	[_site_title] <abc@gmail.com>
	From: [your-name] <[your-email]>
	Subject: [your-subject]

	Message Body:
	[your-message]

	--
	This e-mail was sent from a contact form on [_site_title] ([_site_url])
	[_site_admin_email]
	Reply-To: [your-email]

	0
	0

	[_site_title] "[your-subject]"
	[_site_title] <abc@gmail.com>
	Message Body:
	[your-message]

	--
	This e-mail was sent from a contact form on [_site_title] ([_site_url])
	[your-email]
	Reply-To: [_site_admin_email]

	0
	0
	Thank you for your message. It has been sent.
	There was an error trying to send your message. Please try again later.
	One or more fields have an error. Please check and try again.
	There was an error trying to send your message. Please try again later.
	You must accept the terms and conditions before sending your message.
	The field is required.
	The field is too long.
	The field is too short.
	There was an unknown error uploading the file.
	You are not allowed to upload files of this type.
	The file is too big.
	There was an error uploading the file.';

		$cf7_post = array(
			'post_title' => wp_strip_all_tags($cf7title),
			'post_content' => $cf7content,
			'post_status' => 'publish',
			'post_type' => 'wpcf7_contact_form',
		);
		// Insert the post into the database
		$cf7post_id = wp_insert_post($cf7_post);

		add_post_meta($cf7post_id, "_form", '
		<div class="row">
			<div class="input-wrapper">
				[text* name class:Name placeholder "Enter Your Name"]
			</div>
			<div class="input-wrapper">
				[tel* Phone-number class:PhoneNumber placeholder "Phone Number"]
			</div>
			<div class="input-wrapper">
				[email* Email class:Email placeholder "Enter Your Email"]
			</div>
			<div class="input-wrapper">
				[textarea* Message class:Message placeholder "Message"]
			</div>
			<div class="input-wrapper">
				[submit class:submit id:submit-button "Submit"]
			</div>
		</div>');

		$cf7mail_data = array(
			'subject' => '[_site_title] "[your-subject]"',
			'sender' => '[_site_title] <abc@gmail.com>',
			'body' => 'From: [your-name] <[your-email]>
			Subject: [your-subject]

			Message Body:
			[your-message]

			--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])',
			'recipient' => '[_site_admin_email]',
			'additional_headers' => 'Reply-To: [your-email]',
			'attachments' => '',
			'use_html' => 0,
			'exclude_blank' => 0
		);

		add_post_meta($cf7post_id, "_mail", $cf7mail_data);
		// Gets term object from Tree in the database.

		$cf7shortcodeSupport = '[contact-form-7 id="' . $cf7post_id . '" title="' . $cf7title . '"]';


		// For 'vw_courier_serivce_pro_contactus_form'
		set_theme_mod('vw_courier_serivce_pro_contactus_form', $cf7shortcodeSupport);
		// support page end 

		/*--- Latest Post---*/
		set_theme_mod('vw_courier_serivce_pro_blog_heading_tagline', 'Blog');
		set_theme_mod('vw_courier_serivce_pro_blog_heading', 'Latest From The Blog');
		set_theme_mod('vw_courier_serivce_pro_latest_blog_and_news_number', 6);
		set_theme_mod('vw_courier_serivce_pro_news_readmore', 'Learn More');

		$blog_title = array("Gain Insights Into Supply Chain Management.", "Explore Initiative That Promot Sustainably Practices Within The Transport Industry.", "Sustainable Practices in Transportation and Warehousing.", "Customs Compliance and International Shipping", "Blockchain Technology in Logistics", "Enhancing the Shipping Experience", "Enhancing the Shipping Experience");
		$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
		$tags_to_add = array("Road Fright", "Ocean Fright", "Air Fright", "Rail Fright", "Road Fright", "Rail Fright", "Ocean Fright");
		for ($i = 0; $i <= 6; $i++) {
			$vw_title = $blog_title[$i];
			// Create post object
			$my_post = array(
				'post_title' => wp_strip_all_tags('Lorem ipsum is simple dummy text of the'),
				'post_title' => wp_strip_all_tags($vw_title),
				'post_content' => $content,
				'post_status' => 'publish',
				'post_type' => 'post'
			);
			// Insert the post into the database
			$post_id = wp_insert_post($my_post);

			// wp_set_object_terms( $post_id, $posts_categories_name[$i], 'category', true );

			update_post_meta($post_id, 'post-banner-image', get_template_directory_uri() . '/assets/images/Blog-header-Image.png');
			update_post_meta($post_id, 'post_para_1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptasqui');
			update_post_meta($post_id, 'post_para_2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
			update_post_meta($post_id, 'post_para_3', "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");
			update_post_meta($post_id, 'post_que', "Why do we use it?");
			update_post_meta($post_id, 'post_image_1', get_template_directory_uri() . '/assets/new-images/Blog/or.png');
			update_post_meta($post_id, 'post_image_2', get_template_directory_uri() . '/assets/new-images/Blog/orr.png');

			$image_url = get_template_directory_uri() . '/assets/new-images/Blog/blog' . $i . '.png';

			$image_name = 'blog' . $i . '.png';
			$upload_dir = wp_upload_dir(); // Set upload folder
			$image_data = file_get_contents($image_url); // Get image data
			$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name); // Generate unique name
			$filename = basename($unique_file_name); // Create image file name
			// Check folder permission and define file location
			if (wp_mkdir_p($upload_dir['path'])) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}

			// Create the image  file on the server
			file_put_contents($file, $image_data);

			// Check image file type
			$wp_filetype = wp_check_filetype($filename, null);

			// Set attachment data
			$attachment = array(
				'post_mime_type' => $wp_filetype['type'],
				'post_title' => sanitize_file_name($filename),
				'post_content' => '',
				'post_type' => 'post',
				'post_status' => 'inherit'
			);

			// Create the attachment
			$attach_id = wp_insert_attachment($attachment, $file, $post_id);

			// Include image.php
			require_once (ABSPATH . 'wp-admin/includes/image.php');

			// Define attachment metadata
			$attach_data = wp_generate_attachment_metadata($attach_id, $file);

			// Assign metadata to attachment
			wp_update_attachment_metadata($attach_id, $attach_data);

			// And finally assign featured image to post
			wp_set_post_tags($post_id, $tags_to_add[$i]);
			set_post_thumbnail($post_id, $attach_id);
		}

		// Faq Page
		set_theme_mod('vw_courier_serivce_pro_faq_temp_faq_number', '8');
		$faqque = array("What if I am not satisfied with my product? What are your return & exchange policies?", "How do I know that my frame or sunglasses fits me well?", "How do I know which size to buy?", "Where can I find my frame measurements?", "I am unsure of what my prescription is. Can you help me with that?", "How many days will it take to make & deliver my spectacles?", "How do I find out the Status of my order?", "How do I upload my lens power details?");


		for ($i = 1; $i <= 8; $i++) {
			//counter Number
			set_theme_mod('vw_courier_serivce_pro_faq_temp_faq_que' . $i, $faqque[$i - 1]);
			//Counter Title
			set_theme_mod('vw_courier_serivce_pro_faq_temp_faq_ans' . $i, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting remaining.');
		}

		// ------------contact us section-------------

		// Newsletter shortcode


		set_theme_mod('vw_courier_serivce_pro_order_tracking_shortcode', '[tracking-form]');
		set_theme_mod('vw_courier_serivce_pro_about_years_of_service_text', 'Year Of Seccess');
		set_theme_mod('vw_courier_serivce_pro_step_text_1', 'Step 1');
		set_theme_mod('vw_courier_serivce_pro_step_text_2', 'Step 2');
		set_theme_mod('vw_courier_serivce_pro_step_text_3', 'Step 3');
		set_theme_mod('vw_courier_serivce_pro_step_text_4', 'Step 4');
		// /footer
		// For 'vw_courier_serivce_pro_footer_enable'
		set_theme_mod('vw_courier_serivce_pro_footer_enable', 'Enable'); // or 'Disable' based on your preference

		// For 'vw_courier_serivce_pro_footer_bgcolor'
		set_theme_mod('vw_courier_serivce_pro_footer_bgcolor', '');

		// For 'vw_courier_serivce_pro_footer_bg_image'
		set_theme_mod('vw_courier_serivce_pro_footer_bg_image', get_template_directory_uri() . '/assets/new-images/Footer-BG.png');

		set_theme_mod('vw_courier_serivce_pro_footer_copyright_para', 'VW Transport WordPress Theme 2023. All Right Reserved');
		set_theme_mod('vw_courier_serivce_pro_footer_legal_info_text', 'Legal terms and information:');
		set_theme_mod('vw_courier_serivce_pro_footer_legal_info_privacy_text', 'Privacy Policy');
		set_theme_mod('vw_courier_serivce_pro_footer_legal_info_term_condition_text', 'Terms and Conditions');
		set_theme_mod('vw_courier_serivce_pro_testimonial_image_icon_text', 'Costomer Review');
		set_theme_mod('vw_courier_serivce_pro_testimonial_image_icon', get_template_directory_uri() . "/assets/new-images/testimonials/chat.png");
		//Background image


		set_theme_mod('vw_courier_serivce_pro_newsletter_sub_heading', 'NEWSLETTER');
		set_theme_mod('vw_courier_serivce_pro_newsletter_heading', 'Sign Up To Our Newsletter');
		set_theme_mod('vw_courier_serivce_pro_newsletter_paragraph', 'Stay up to date with the latest car trends, technologies, and news by signing up to our newsletter');
		set_theme_mod('vw_courier_serivce_pro_newsletter_form_info_text', 'Your e-mail is safe with us and will not be shared with other third-party websites');


		// Newsletter shortcode




		// Newsletter shortcode
		$cf7title = "Newsletter Form";
		$cf7content = '
		<div class="footer-form-wrapper">
		<div class="Form-input-wrapper">
			[email* email-462 placeholder "Email Address"]
		</div>
		<div class="Footer-submit-wrapper">
			[submit "Submit"]
		</div>
	</div>

			From: [your-name] <[your-email]>
			Subject: New Newsletter Subscriber!
			Add this email to subscriber list: [email-462]
					--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])
		
			[_site_admin_email]
			Reply-To: [your-email]
		
			0
			0
		
			[_site_title] "[your-subject]"
			[_site_title] <abc@gmail.com>
			Message Body:
			[your-message]
		
			--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])
			[your-email]
			Reply-To: [_site_admin_email]
		
			0
			0
			Thank you for subscribing.
			There was an error trying to send your message. Please try again later.
			One or more fields have an error. Please check and try again.
			There was an error trying to send your message. Please try again later.
			You must accept the terms and conditions before sending your message.
			The field is required.
			The field is too long.
			The field is too short.
			There was an unknown error uploading the file.
			You are not allowed to upload files of this type.
			The file is too big.
			There was an error uploading the file.';

		$cf7_post = array(
			'post_title' => wp_strip_all_tags($cf7title),
			'post_content' => $cf7content,
			'post_status' => 'publish',
			'post_type' => 'wpcf7_contact_form',
		);
		// Insert the post into the database
		$cf7post_id = wp_insert_post($cf7_post);

		add_post_meta($cf7post_id, "_form", '	
			<div class="footer-form-wrapper">
				<div class="Form-input-wrapper">
					[email* email-462 placeholder "Email Address"]
				</div>
				<div class="Footer-submit-wrapper">
					[submit "Submit"]
				</div>
			</div>');

		$cf7mail_data = array(
			'subject' => '[_site_title] "[your-subject]"',
			'sender' => '[_site_title] <abc@gmail.com>',
			'body' => 'From: [your-name] <[your-email]>
			Subject: [your-subject]
		
			Message Body:
			From: [your-name] <[your-email]>
			Subject: New Newsletter Subscriber!
			Add this email to subscriber list: [email-462]
					--
			This e-mail was sent from a contact form on [_site_title] ([_site_url])',
			'recipient' => '[_site_admin_email]',
			'additional_headers' => 'Reply-To: [your-email]',
			'attachments' => '',
			'use_html' => 0,
			'exclude_blank' => 0
		);

		add_post_meta($cf7post_id, "_mail", $cf7mail_data);
		// Gets term object from Tree in the database.

		$cf7shortcode = '[contact-form-7 id="' . $cf7post_id . '" title="' . $cf7title . '"]';

		set_theme_mod('vw_courier_serivce_pro_contactpage_shortcode', $cf7shortcode);




		//Contact From Title
		set_theme_mod('vw_courier_serivce_pro_contactpage_form_title', 'Contact Information');
		set_theme_mod('vw_courier_serivce_pro_contactpage_form_subtitle', 'Fill up the contact form and our team will get back in touch with you within 24 hours.');
		set_theme_mod('vw_courier_serivce_pro_contactpage_call_icon', 'fas fa-phone-volume');
		set_theme_mod('vw_courier_serivce_pro_contactpage_call', '+1 123 456 7890');
		set_theme_mod('vw_courier_serivce_pro_contactpage_address_icon', 'fas fa-envelope');
		set_theme_mod('vw_courier_serivce_pro_contactpage_address', 'hello@heyreviews.com');
		set_theme_mod('vw_courier_serivce_pro_address_latitude', '28.8027594');
		set_theme_mod('vw_courier_serivce_pro_address_longitude', '-105.9808615');
		set_theme_mod('vw_courier_serivce_pro_contact_page_form_bg_image', get_template_directory_uri() . '/assets/images/contact/contact-bg.png');
		// set_theme_mod( 'vw_courier_serivce_pro_contact_page_bg_image',get_template_directory_uri().'/assets/images/contact/contact-bg.png' );


		/*---------------Blog Page----------------------*/
		set_theme_mod('vw_courier_serivce_pro_blog_author', 'far fa-user');
		set_theme_mod('vw_courier_serivce_pro_blog_comment_icon', 'far fa-comments');
		set_theme_mod('vw_courier_serivce_pro_blog_fright_icon', 'fas fa-tags');

		// empty cart page START

		set_theme_mod('vw_courier_serivce_pro_empty_cart_page_icon', 'fa-regular fa-heart');
		set_theme_mod('vw_courier_serivce_pro_empty_cart_page_heading', 'WISHLIST IS EMPTY');
		set_theme_mod('vw_courier_serivce_pro_empty_cart_page_description', 'You Don\'t Have Any Products In The Wishlist Right Now. You Will Find A Lot Of Interesting Products In Out Online Store.');
		set_theme_mod('vw_courier_serivce_pro_empty_cart_page_btn_text', 'Continue Shopping');
		set_theme_mod('vw_courier_serivce_pro_empty_cart_page_btn_link', get_permalink(get_page_by_title('Shop ')));

		// empty cart page EnD


		set_theme_mod('vw_courier_serivce_pro_error_temp_bg_images', get_template_directory_uri() . '/assets/new-images/404.png');
		set_theme_mod('vw_courier_serivce_pro_404_page_heading', 'Ohh! Page Not Found');
		set_theme_mod('vw_courier_serivce_pro_404_page_content', 'It looks like nothing was found at this location. Click the button below to return home.');
		set_theme_mod('vw_courier_serivce_pro_404_page_button_text', 'Back to Home Page');


		// //about us page
		// set_theme_mod( 'vw_courier_serivce_pro_about_page_sec_image',get_template_directory_uri().'/assets/images/about-page/about-page.png' );
		// set_theme_mod('vw_courier_serivce_pro_about_page_heading','Lorem Ipsum Is Simple Dummy Text of The Printing and Typesetting Industry.');
		// set_theme_mod('vw_courier_serivce_pro_about_page_para',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");


		// set_theme_mod( 'vw_courier_serivce_pro_about_page_img_second',get_template_directory_uri().'/assets/images/about-page/about-page-two.png' );
		// set_theme_mod('vw_courier_serivce_pro_about_video_url', 'https://www.youtube.com/embed/D0UnqGm_miA');
		// set_theme_mod( 'vw_courier_serivce_pro_about_video_icon', 'fas fa-play' );
		// set_theme_mod('vw_courier_serivce_pro_about_sec_two_heading','Lorem Ipsum Is Simple Dummy Text of The Printing and Typesetting Industry.');
		// set_theme_mod('vw_courier_serivce_pro_about_sec_two_para',"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.");


		$this->theme_create_customizer_nav_menu();
		$this->theme_create_customizer_footer_services_menu();
		$this->theme_create_customizer_footer_quick_links_menu();
		$this->theme_create_customizer_footer_support_menu();


		$VW_Widget_Importer = new VW_Widget_Importer;
		$VW_Widget_Importer->import_widgets($this->widget_file_url);

		// echo "string";
		exit;
	}


	public function wz_activate_vw_courier_serivce_pro()
	{
		$vw_courier_serivce_pro_license_key = $_POST['vw_courier_serivce_pro_license_key'];

		$endpoint = IBTANA_THEME_LICENCE_ENDPOINT . 'ibtana_client_activate_premium_theme';

		$body = [
			'theme_license_key' => $vw_courier_serivce_pro_license_key,
			'site_url' => site_url(),
			'theme_text_domain' => wp_get_theme()->get('TextDomain')
		];
		$body = wp_json_encode($body);
		$options = [
			'body' => $body,
			'headers' => [
				'Content-Type' => 'application/json',
			]
		];
		$response = wp_remote_post($endpoint, $options);
		if (is_wp_error($response)) {
			ThemeWhizzie::remove_the_theme_key();
			ThemeWhizzie::set_the_validation_status('false');
			$response = array('status' => false, 'msg' => 'Something Went Wrong!');
			wp_send_json($response);
			exit;
		} else {
			$response_body = wp_remote_retrieve_body($response);
			$response_body = json_decode($response_body);

			if ($response_body->is_suspended == 1) {
				ThemeWhizzie::set_the_suspension_status('true');
			} else {
				ThemeWhizzie::set_the_suspension_status('false');
			}

			if ($response_body->status === false) {
				ThemeWhizzie::remove_the_theme_key();
				ThemeWhizzie::set_the_validation_status('false');
				$response = array('status' => false, 'msg' => $response_body->msg);
				wp_send_json($response);
				exit;
			} else {
				ThemeWhizzie::set_the_validation_status('true');
				ThemeWhizzie::set_the_theme_key($vw_courier_serivce_pro_license_key);
				$response = array('status' => true, 'msg' => 'Theme Activated Successfully!');
				wp_send_json($response);
				exit;
			}
		}
	}



	/**
	 * Imports Ibtana Builder Demo Content
	 * @since 1.1.0
	 */
	public function setup_builder()
	{
		$buildercontent = '';
		$resp_slug = '';
		$json_theme = array('base_theme_text_domain' => 'vw-courier-serivce-pro');
		$json_args = array(
			'method' => 'POST',
			'headers' => array(
				'Content-Type' => 'application/json'
			),
			'body' => json_encode($json_theme),
		);

		$request_data = wp_remote_post(IBTANA_THEME_LICENCE_ENDPOINT . 'get_client_ibtana_premium_theme_json_with_inner_pages', $json_args);
		$response_json = json_decode(wp_remote_retrieve_body($request_data));

		// echo '<pre>'; print_r($response_json->data); echo '</pre>';


		foreach ($response_json->data as $resp_json) {
			if ($resp_json->page_type = 'template') {
				$resp_slug = $resp_json->slug;
			}
		}

		$json_theme1 = array('premium_template_slug' => $resp_slug);
		$json_args1 = array(
			'method' => 'POST',
			'headers' => array(
				'Content-Type' => 'application/json'
			),
			'body' => json_encode($json_theme1),
		);

		$request_data1 = wp_remote_post(IBTANA_THEME_LICENCE_ENDPOINT . 'get_client_ibtana_premium_theme_json', $json_args1);
		$response_json1 = json_decode(wp_remote_retrieve_body($request_data1));
		/*	    print_r($response_json1->data);
		 */
		$buildercontent = $response_json1->data;



		$home_id;
		$blog_id = '';
		$contact_id = '';
		$page_id = '';
		$page_title = '';
		$page_slug = '';
		global $home_b;

		$page_title = 'Home Page';
		$page_slug = 'home-page';

		$page_check = get_page_by_title($page_title);
		$vw_page = array(
			'post_type' => 'page',
			'post_title' => $page_title,
			'post_content' => $buildercontent,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => $page_slug
		);
		$home_id = wp_insert_post(wp_slash($vw_page));
		add_post_meta($home_id, '_wp_page_template', 'page-template/ibtana-template.php');


		$home_b = get_page_by_title('Home Page');

		update_option('page_on_front', $home_b->ID);
		update_option('show_on_front', 'page');


		// Create a blog page and assigned the template
		$blog_title = 'Blog';
		$blog = array(
			'post_type' => 'page',
			'post_title' => $blog_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog'
		);
		$blog_id = wp_insert_post($blog);


		//Set the blog page template
		add_post_meta($blog_id, '_wp_page_template', 'page-template/blog-fullwidth-extend.php');


		// Create a Page
		if (get_page_by_title('Page') == NULL) {
			$page_title = 'Page ';
			$content = 'Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi. Sed quis scit si forte quod esset optima res pro me. sicut ea quae sentio. Qui vellem cadunt off ius desk ejus! Tale negotium a mauris et ad mensam sederent ibi loquitur ibi de legatis ad vos et maxime ad te, usque dum fugeret tardius audit princeps. Bene tamen fiduciam Ego got off semel';

			$page_check = get_page_by_title($page_title);
			$vw_page = array(
				'post_type' => 'page',
				'post_title' => $page_title,
				'post_content' => $content,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_slug' => 'page'
			);
			$page_id = wp_insert_post($vw_page);
		}

		// Create a contact page and assigned the template
		$contact_title = 'Contact Us';
		$contact = array(
			'post_type' => 'page',
			'post_title' => $contact_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'contact'
		);
		$contact_id = wp_insert_post($contact);

		//Set the blog with right sidebar template
		add_post_meta($contact_id, '_wp_page_template', 'page-template/contact.php');
		if (isset($home_b->ID)) {
			echo json_encode(['home_page_id' => $home_b->ID, 'home_page_url' => get_edit_post_link($home_b->ID, '')]);
		}

		$VW_Widget_Importer = new VW_Widget_Importer;
		$VW_Widget_Importer->import_widgets($this->widget_file_url);

		exit;

	}


	// ------------ Ibtana Activation Close -----------
	//guidline for about theme
	public function vw_courier_serivce_pro_mostrar_guide()
	{

		$display_string = '';

		// Check the validation Start
		$vw_courier_serivce_pro_license_key = ThemeWhizzie::get_the_theme_key();
		$endpoint = IBTANA_THEME_LICENCE_ENDPOINT . 'ibtana_client_premium_theme_check_activation_status';
		$body = [
			'theme_license_key' => $vw_courier_serivce_pro_license_key,
			'site_url' => site_url(),
			'theme_text_domain' => wp_get_theme()->get('TextDomain')
		];
		$body = wp_json_encode($body);
		$options = [
			'body' => $body,
			'headers' => [
				'Content-Type' => 'application/json',
			]
		];
		$response = wp_remote_post($endpoint, $options);
		if (is_wp_error($response)) {
			// ThemeWhizzie::set_the_validation_status('false');
		} else {
			$response_body = wp_remote_retrieve_body($response);
			$response_body = json_decode($response_body);

			if ($response_body->is_suspended == 1) {
				ThemeWhizzie::set_the_suspension_status('true');
			} else {
				ThemeWhizzie::set_the_suspension_status('false');
			}

			$display_string = isset($response_body->display_string) ? $response_body->display_string : '';

			if ($display_string != '') {
				if (strpos($display_string, '[THEME_NAME]') !== false) {
					$display_string = str_replace("[THEME_NAME]", "VW Logistics Shipping Pro", $display_string);
				}
				if (strpos($display_string, '[THEME_PERMALINK]') !== false) {
					$display_string = str_replace("[THEME_PERMALINK]", "https://www.vwthemes.com/themes/lens-wordpress-theme/", $display_string);
				}
				echo '<div class="notice is-dismissible error thb_admin_notices">' . $display_string . '</div>';
			}



			if ($response_body->status === false) {
				ThemeWhizzie::set_the_validation_status('false');
			} else {
				ThemeWhizzie::set_the_validation_status('true');
			}
		}
		// Check the validation END

		$theme_validation_status = ThemeWhizzie::get_the_validation_status();

		//custom function about theme customizer
		$return = add_query_arg(array());
		$theme = wp_get_theme('vw-courier-serivce-pro');

		?>

		<div class="wrapper-info get-stared-page-wrap">

			<div class="wrapper-info-content">
				<h2><?php _e('Welcome to VW Logistics Shipping Pro', 'vw-courier-serivce-pro'); ?> <span
						class="version">Version: <?php echo esc_html($theme['Version']); ?></span></h2>
				<p><?php _e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, block based and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.', 'vw-courier-serivce-pro'); ?>
				</p>
			</div>
			<div class="tab-sec theme-option-tab">
				<div class="tab">
					<button class="tablinks active" onclick="openCity(event, 'theme_activation')"
						data-tab="theme_activation"><?php _e('Key Activation', 'vw-courier-serivce-pro'); ?></button>
					<button class="tablinks wizard-tab" onclick="openCity(event, 'demo_offer')"
						data-tab="demo_offer"><?php _e('Setup Wizard', 'vw-courier-serivce-pro'); ?></button>
					<button class="tablinks" onclick="openCity(event, 'theme_info')"
						data-tab="theme_info"><?php _e('Support', 'vw-courier-serivce-pro'); ?></button>
					<button class="tablinks" onclick="openCity(event, 'plugins')"
						data-tab="plugins"><?php _e('Plugins', 'vw-courier-serivce-pro'); ?></button>
					<button class="tablinks other-product-tab"
						onclick="openCity(event, 'others_theme')"><?php esc_html_e('All Themes', 'vw-courier-serivce-pro'); ?></button>
				</div>

				<!-- Tab content -->
				<div id="theme_activation" class="tabcontent open">

					<div class="theme_activation-wrapper">
						<div class="theme_activation_spinner">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								style="margin:auto;background:#fff;display:block;" width="200px" height="200px"
								viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
								<g transform="translate(50,50)">
									<g transform="scale(0.7)">
										<circle cx="0" cy="0" r="50" fill="#0f81d0"></circle>
										<circle cx="0" cy="-28" r="15" fill="#cfd7dd">
											<animateTransform attributeName="transform" type="rotate" dur="1s"
												repeatCount="indefinite" keyTimes="0;1" values="0 0 0;360 0 0">
											</animateTransform>
										</circle>
									</g>
								</g>
							</svg>
						</div>
						<div class="theme-wizard-key-status">
							<?php
							if ($theme_validation_status === 'false') {
								esc_html_e('Theme License Key is not activated!', 'vw-courier-serivce-pro');
							} else {
								esc_html_e('Theme License is Activated!', 'vw-courier-serivce-pro');
							}
							?>
						</div>
						<?php $this->activation_page(); ?>
					</div>
				</div>
				<div id="demo_offer" class="tabcontent">
					<?php $this->wizard_page(); ?>
				</div>
				<div id="theme_info" class="tabcontent">
					<div class="col-left-inner">
						<h3><?php _e('VW Logistics Shipping Pro Information', 'vw-courier-serivce-pro'); ?></h3>
						<hr class="h3hr">
						<h4><?php _e('Theme Documentation', 'vw-courier-serivce-pro'); ?></h4>
						<p><?php _e('If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-courier-serivce-pro'); ?>
						</p>
						<div class="info-link">
							<a href="<?php echo esc_url(vw_courier_serivce_pro_THEME_DOC); ?>" target="_blank">
								<?php _e('Documentation', 'vw-courier-serivce-pro'); ?></a>
						</div>
						<hr>
						<h4><?php _e('Having Trouble, Need Support?', 'vw-courier-serivce-pro'); ?></h4>
						<p> <?php _e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-courier-serivce-pro'); ?>
						</p>
						<div class="info-link">
							<a href="<?php echo esc_url(vw_courier_serivce_pro_SUPPORT); ?>"
								target="_blank"><?php _e('Support Forum', 'vw-courier-serivce-pro'); ?></a>
						</div>
						<hr>
						<h4><?php _e('Reviews & Testimonials', 'vw-courier-serivce-pro'); ?></h4>
						<p> <?php _e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-courier-serivce-pro'); ?>
						</p>
						<div class="info-link">
							<a href="<?php echo esc_url(vw_courier_serivce_pro_REVIEW); ?>"
								target="_blank"><?php _e('Reviews', 'vw-courier-serivce-pro'); ?></a>
						</div>
					</div>
					<div class="col-right-inner">
						<div id="vw-demo-setup-guid">
							<h3><?php esc_html_e('Checkout our setup videos', 'vw-courier-serivce-pro'); ?></h3>
							<hr />
							<ul>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/nLB9E6BBBv0"><span
											class="dashicons dashicons-welcome-widgets-menus"></span>Setup Menu</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/gjccwcAK47o"><span
											class="dashicons dashicons-email-alt"></span>Setup Contact Page</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/7BvTpLh-RB8"><span
											class="dashicons dashicons-editor-table"></span>Setup Widgets</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/Mox298rk0Qo"><span
											class="dashicons dashicons-share"></span>Setup Social Icon</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/hLtS4sztAX4"><span
											class="dashicons dashicons-wordpress-alt"></span>Install WordPress Theme</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/8UxkXkix-ic"><span
											class="dashicons dashicons-admin-users"></span>Create WordPress User</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/1xGlbWOzQBg"><span
											class="dashicons dashicons-image-flip-horizontal"></span>Setup Slider</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/pJFF_wjdvcA"><span
											class="dashicons dashicons-database"></span>WordPress Backup</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/xXdnUTPG_6A"><span
											class="dashicons dashicons-instagram"></span>Connect Instagram</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/leLBzmbvdQQ"><span
											class="dashicons dashicons-table-col-delete"></span>Fix 404 Error</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/OPBONJBtO6g"><span
											class="dashicons dashicons-admin-page"></span>Setup Template Pages</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/j7veMuhcXYA"><span
											class="dashicons dashicons-video-alt3"></span>Create a New Post</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/ovcok3FPRto"><span
											class="dashicons dashicons-welcome-add-page"></span>Setup Shortcode Pages</a>
								</li>
								<li>
									<a href="javascript:void(0);"
										doc-video-url="https://www.youtube.com/embed/O6elK2kSHQw"><span
											class="dashicons dashicons-images-alt2"></span>Setup Gallery Plugin</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="wz-video-model">
				<span class="dashicons dashicons-no"></span>
				<iframe width="100%" src="" frameborder="0"
					allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
					allowfullscreen></iframe>
			</div>
			<div id="plugins" class="tabcontent">
				<div class="wizard-plugin-wrapper">
					<div class="o-product-row">
						<div class="plugin-col ibtana-plugin-col">
							<img
								src="<?php echo esc_url(get_template_directory_uri() . '/theme-wizard/assets/images/banner-772x250.png'); ?>">
							<h3><?php echo esc_html('Ibtana - WordPress Website Builder Plugin'); ?></h3>
							<p><?php echo esc_html('Ibtana Gutenberg Editor has ready made eye catching responsive templates build with custom blocks and options to extend Gutenberg’s default capabilities. You can easily import demo content for the block or templates with a single click'); ?>
							</p>
							<?php
							$plugin_ins = Vw_Premium_Theme_Plugin_Activation_Settings::get_instance();
							$vw_theme_actions = $plugin_ins->recommended_actions;

							if ($vw_theme_actions):
								foreach ($vw_theme_actions as $key => $vw_theme_actionValue):
									?>
									<div class="ibtana-activation-btn">
										<?php echo wp_kses_post($vw_theme_actionValue['link']); ?>
									</div>
								<?php endforeach;
							endif; ?>
						</div>
						<div class="plugin-col">
							<img
								src="<?php echo esc_url(get_template_directory_uri() . '/theme-wizard/assets/images/Ibtana-ecommerce-banner.png'); ?>">

							<h3><?php echo esc_html('Ibtana – Woocommerce Product Addons'); ?></h3>
							<p><?php echo esc_html('Ibtana – Ecommerce Product Addons is excellent for designing a highly customized product page that shows your products in a more prominent and interesting way. With these product add ons, creating unique product pages is now possible.'); ?>
							</p>
							<a href="<?php echo esc_url('https://www.vwthemes.com/plugins/woocommerce-product-add-ons/'); ?>"
								target="_blank"><?php echo esc_html('Buy Now'); ?></a>
						</div>
						<div class="plugin-col">
							<img
								src="<?php echo esc_url(get_template_directory_uri() . '/theme-wizard/assets/images/mega-menu.png'); ?>">

							<h3><?php echo esc_html('Ibtana- Mega Menu Addon'); ?></h3>
							<p><?php echo esc_html('View our mega menu demos or start the setup wizard which will guide you through all the steps to set up your menus.'); ?>
							</p>
							<a href="<?php echo esc_url('https://www.vwthemes.com/plugins/woocommerce-product-add-ons/'); ?>"
								target="_blank"><?php echo esc_html('Buy Now'); ?></a>
						</div>
						<div class="plugin-col">
							<img
								src="<?php echo esc_url(get_template_directory_uri() . '/theme-wizard/assets/images/VWThemes_banner_plugin.png'); ?>">
							<h3><?php echo esc_html('Title Banner Image Plugin'); ?></h3>
							<p><?php echo esc_html('If you are interested in adding the banner images, you check VW Title Banner Plugin. Its main speciality is that it permits user the addition of banner image on post, custom post or any page. '); ?>
							</p>
							<a href="<?php echo esc_url('https://www.vwthemes.com/premium-plugin/vw-title-banner-plugin/'); ?>"
								target="_blank"><?php echo esc_html('Buy Now'); ?></a>
						</div>

						<div class="plugin-col">
							<img
								src="<?php echo esc_url(get_template_directory_uri() . '/theme-wizard/assets/images/gallery_plugin_banner.png'); ?>">

							<h3><?php echo esc_html('VW Gallery Images Plugin'); ?></h3>
							<p><?php echo esc_html('The VW Gallery Plugin is an amazing WordPress gallery plugin. It helps you in creating the elegant gallery within few minutes. The VW Gallery plugin offers the advantage of displaying multiple galleries on a single page or post.'); ?>
							</p>
							<a href="<?php echo esc_url('https://www.vwthemes.com/premium-plugin/vw-gallery-plugin/'); ?>"
								target="_blank"><?php echo esc_html('Buy Now'); ?></a>
						</div>

					</div>
				</div>
			</div>
			<div id="others_theme" class="tabcontent">
				<script>

					var data_post = { "para": "1" };

					jQuery.ajax({
						method: "POST",
						url: "https://www.vwthemes.com/wp-json/ibtana-licence/v2/get_modal_contents",
						data: JSON.stringify(data_post),
						dataType: 'json',
						contentType: 'application/json',
					}).done(function (data) {
						/*console.log(data);*/
						var premium_data = data.data.products;
						for (var i = 0; i < premium_data.length; i++) {
							var premium_product = premium_data[i];
							var card_content = `<div class="o-products-col" data-id="` + premium_product.id + `">
																									  <div class="o-products-image">
																										  <img src="`+ premium_product.image + `">
																									  </div>
																									  <h3>`+ premium_product.title + `</h3>
																									  <a href="`+ premium_product.permalink + `" target="_blank">Buy Now</a>
																									  <a href="`+ premium_product.demo_url + `" target="_blank">View Demo</a>
																								  </div>`;
							jQuery('.wz-spinner-wrap').css('display', 'none');
							jQuery('#other-products .o-product-row').append(card_content);
						}

						var premium_category = data.data.sub;
						var active_class = ""
						/*console.log(premium_category.length);*/
						for (let i = 0; i < premium_category.length; i++) {
							if (i == 0) {
								active_class = "active";
							} else {
								active_class = "";
							}
							let premium_product = premium_category[i];
							let card_content = `<li data-ids="` + premium_product.product_ids + `" onclick="other_products(this);" class="` + active_class + `">
																									  `+ premium_product.name + `<span class="badge badge-info">` + premium_product.product_ids.length + `</span>
																								  </li>`;
							jQuery('.o-product-col-1 ul').append(card_content);
						}
					});

					function other_products(content) {

						jQuery('.o-product-col-1 ul li').attr('class', '');
						content.classList.add("active");
						var data_ids = jQuery(content).attr('data-ids');

						var id_arr = data_ids.split(',');
						jQuery('.o-product-row .o-products-col[data-id]').hide();
						for (var i = 0; i < id_arr.length; i++) {
							var single_id = id_arr[i];
							jQuery('.o-product-row .o-products-col[data-id="' + single_id + '"]').show();
						}

					}

				</script>
				<div id="other-products">
					<div class="wz-spinner-wrap">
						<div class="lds-dual-ring"></div>
					</div>
					<div class="o-product-main-row">
						<div class="o-product-col-1">
							<ul>

							</ul>
						</div>
						<div class="o-product-col-2">
							<div class="social-theme-search">
								<input class="themesearchinput" type="text" placeholder="Search Theme Here">
							</div>
							<div class="o-product-row" style="clear: both;">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

	<?php }


	// Add a Custom CSS file to WP Admin Area
	public function vw_courier_serivce_pro_admin_theme_style()
	{
		wp_enqueue_style('vw-courier-serivce-pro-font', $this->vw_courier_serivce_pro_admin_font_url(), array());
		wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/theme-wizard/getstarted/getstart.css');
		//( 'tab', get_template_directory_uri() . '/theme-wizard/getstarted/js/tab.js' );
	}

	// Theme Font URL
	public function vw_courier_serivce_pro_admin_font_url()
	{
		$font_url = '';
		$font_family = array();

		$font_family[] = 'Muli:300,400,600,700,800,900';

		$query_args = array(
			'family' => urlencode(implode('|', $font_family)),
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
		return $font_url;
	}

}
