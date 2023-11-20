<?php
/**
 * Plugin Name:       MonsterInsights - AMP Addon
 * Plugin URI:        https://www.monsterinsights.com
 * Description:       Adds AMP Tracking to MonsterInsights.
 * Author:            MonsterInsights Team
 * Author URI:        https://www.monsterinsights.com
 * Version:           1.7.0
 * Requires at least: 4.8.0
 * Requires PHP:      5.5
 * Text Domain:       monsterinsights-amp
 * Domain Path:       languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin class.
 *
 * @since 1.0.0
 *
 * @package MonsterInsights_AMP
 * @author  Chris Christoff
 */
class MonsterInsights_AMP {
	/**
	 * Holds the class object.
	 *
	 * @since 1.0.0
	 *
	 * @var object
	 */
	public static $instance;

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $version = '1.7.0';

	/**
	 * The name of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $plugin_name = 'MonsterInsights AMP';

	/**
	 * Unique plugin slug identifier.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $plugin_slug = 'monsterinsights-amp';

	/**
	 * Plugin file.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $file;

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->file = __FILE__;

		if ( ! $this->check_compatibility() ) {
			return;
		}

		// Define Addon Constant
		if ( ! defined( 'MONSTERINSIGHTS_AMP_VERSION' ) ) {
			define( 'MONSTERINSIGHTS_AMP_VERSION', $this->version );
		}

		// Load the plugin textdomain.
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

		// Load the updater
		add_action( 'monsterinsights_updater', array( $this, 'updater' ) );

		// Load the plugin.
		add_action( 'monsterinsights_load_plugins', array( $this, 'init' ), 99 );

		if ( ! defined( 'MONSTERINSIGHTS_PRO_VERSION' ) ) {
			// Make sure plugin is listed in Auto-update Disabled view
			add_filter( 'auto_update_plugin', array( $this, 'disable_auto_update' ), 10, 2 );

			// Display call-to-action to get Pro in order to enable auto-update
			add_filter( 'plugin_auto_update_setting_html', array( $this, 'modify_autoupdater_setting_html' ), 11, 2 );
		}
	}

	/**
	 * Check compatibility with PHP and WP, and display notices if necessary
	 *
	 * @return bool
	 * @since 1.4.10
	 */
	private function check_compatibility() {
		if ( defined( 'MONSTERINSIGHTS_FORCE_ACTIVATION' ) && MONSTERINSIGHTS_FORCE_ACTIVATION ) {
			return true;
		}

		require_once plugin_dir_path( __FILE__ ) . 'includes/compatibility-check.php';
		$compatibility = MonsterInsights_Amp_Compatibility_Check::get_instance();
		$compatibility->maybe_display_notice();

		return $compatibility->is_php_compatible() && $compatibility->is_wp_compatible();
	}

	/**
	 * Loads the plugin textdomain for translation.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( $this->plugin_slug, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Loads the plugin into WordPress.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		if ( ! defined( 'MONSTERINSIGHTS_PRO_VERSION' ) ) {
			// admin notice, MI not installed
			add_action( 'admin_notices', array( self::$instance, 'requires_monsterinsights' ) );

			return;
		}

		if ( ! defined( 'AMP__FILE__' ) ) {
			// Check if not on plugin install page to prevent confusion.
			if ( ! isset( $_GET['plugin'] ) || isset( $_GET['plugin'] ) && 'amp' !== $_GET['plugin'] ) {
				// AMP Plugin required
				add_action( 'admin_notices', array( self::$instance, 'requires_amp_plugin' ) );

				return;
			}
		}

		if ( version_compare( MONSTERINSIGHTS_VERSION, '7.1.0', '<' ) ) {
			// MonsterInsights version not supported
			add_action( 'admin_notices', array( self::$instance, 'requires_monsterinsights_version' ) );

			return;
		}

		// Load frontend components.
		$this->require_frontend();
	}

	/**
	 * Initializes the addon updater.
	 *
	 * @param string $key The user license key.
	 *
	 * @since 1.0.0
	 *
	 */
	function updater( $key ) {
		$args = array(
			'plugin_name' => $this->plugin_name,
			'plugin_slug' => $this->plugin_slug,
			'plugin_path' => plugin_basename( __FILE__ ),
			'plugin_url'  => trailingslashit( WP_PLUGIN_URL ) . $this->plugin_slug,
			'remote_url'  => 'https://www.monsterinsights.com/',
			'version'     => $this->version,
			'key'         => $key
		);

		$updater = new MonsterInsights_Updater( $args );
	}

	/**
	 * Display MonsterInsights Pro CTA on Plugins -> autoupdater setting column
	 *
	 * @param string $html
	 * @param string $plugin_file
	 *
	 * @return string
	 */
	public function modify_autoupdater_setting_html( $html, $plugin_file ) {
		if ( plugin_basename( __FILE__ ) === $plugin_file &&
			 // If main plugin (free) happens to be enabled and already takes care of this, then bail
			 ! apply_filters( "monsterinsights_is_autoupdate_setting_html_filtered_" . $plugin_file, false )
		) {
			$html = sprintf(
				'<a href="%s">%s</a>',
				'https://www.monsterinsights.com/docs/go-lite-pro/?utm_source=liteplugin&utm_medium=plugins-autoupdate&utm_campaign=upgrade-to-autoupdate&utm_content=monsterinsights-amp',
				__( 'Enable the MonsterInsights PRO plugin to manage auto-updates', 'monsterinsights-amp' )
			);
		}

		return $html;
	}

	/**
	 * Disable auto-update.
	 *
	 * @param $update
	 * @param $item
	 *
	 * @return bool
	 */
	public function disable_auto_update( $update, $item ) {
		// If this is multisite and is not on the main site, return early.
		if ( is_multisite() && ! is_main_site() ) {
			return $update;
		}

		if ( isset( $item->id ) && plugin_basename( __FILE__ ) === $item->id ) {
			return false;
		}

		return $update;
	}

	/**
	 * Loads all frontend files into scope.
	 *
	 * @since 1.0.0
	 */
	public function require_frontend() {
		require plugin_dir_path( __FILE__ ) . 'includes/frontend/tracking.php';
	}

	/**
	 * Output a nag notice if the user does not have MI installed
	 *
	 * @access public
	 * @return    void
	 * @since 1.0.0
	 *
	 */
	public function requires_monsterinsights() {
		?>
		<div class="error">
			<p><?php esc_html_e( 'Please install MonsterInsights Pro to use the MonsterInsights AMP addon', 'monsterinsights-amp' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Output a nag notice if the user does not have MI version installed
	 *
	 * @access public
	 * @return    void
	 * @since 1.0.0
	 *
	 */
	public function requires_monsterinsights_version() {
		?>
		<div class="error">
			<p><?php esc_html_e( 'Please install or update MonsterInsights Pro version 7.4 or newer to use the MonsterInsights AMP addon', 'monsterinsights-amp' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Output a nag notice if the user does not have AMP plugin installed
	 *
	 * @access public
	 * @return    void
	 * @since 1.0.0
	 *
	 */
	public function requires_amp_plugin() {
		$url     = false;
		$plugins = get_plugins();
		$amp_key = 'amp/amp.php';
		if ( current_user_can( 'install_plugins' ) ) {
			if ( array_key_exists( $amp_key, $plugins ) ) {
				$url = wp_nonce_url( self_admin_url( 'plugins.php?action=activate&plugin=' . $amp_key ), 'activate-plugin_' . $amp_key );
			} else {
				$url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=amp' ), 'install-plugin_amp' );
			}
		}
		$text = __( 'The MonsterInsights AMP tracking addon is compatible with the official Google-developed AMP plugin for WordPress.', 'monsterinsights-amp' );
		?>
		<div class="error">
			<p>
				<?php
				if ( $url ) {
					printf( '<a href="%s">%s</a>', esc_url( $url ), esc_html( $text ) );
				} else {
					echo esc_html( $text );
				}
				?>
			</p>
		</div>
		<?php
	}

	/**
	 * Returns the singleton instance of the class.
	 *
	 * @return object The MonsterInsights_AMP object.
	 * @since 1.0.0
	 *
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof MonsterInsights_AMP ) ) {
			self::$instance = new MonsterInsights_AMP();
		}

		return self::$instance;
	}
}

// Load the main plugin class.
$MonsterInsights_AMP = MonsterInsights_AMP::get_instance();
