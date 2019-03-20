<?php
/*
 * Plugin Name: RESTjQuery
 * Plugin URI: https://wordpress.org/plugins/wp-rest-api-jquery-support/
 * Description: Provides the RESTjQuery script to be used on the frontend of your WordPress site.
 * Author: Sébastien Dumont
 * Author URI: https://sebastiendumont.com
 * Version: 1.0.0
 * Text Domain: wp-rest-api-jquery-support
 * Domain Path: /languages/

 * RESTjQuery is free software: you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License 
 * as published by the Free Software Foundation, either 
 * version 2 of the License, or any later version.
 *
 * You should have received a copy of the GNU General Public License
 * along with RESTjQuery. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package RESTjQuery
 * @author  Sébastien Dumont
 * @link    https://sebastiendumont.com
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RESTjQuery' ) ) {
	class RESTjQuery {

		/**
		 * @var RESTjQuery - The single instance of the class.
		 *
		 * @access protected
		 * @static
		 * @since  1.0.0
		 */
		protected static $_instance = null;

		/**
		 * Plugin Version
		 *
		 * @access public
		 * @static
		 * @since  1.0.0
		 */
		public static $version = '1.0.0';

		/**
		 * Main RESTjQuery Instance.
		 *
		 * Ensures only one instance of RESTjQuery is loaded or can be loaded.
		 *
		 * @access public
		 * @static
		 * @since  1.0.0
		 * @see    RESTjQuery()
		 * @return RESTjQuery - Main instance
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Throw error on object clone.
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Cloning this object is forbidden.', 'wp-rest-api-jquery-support' ), self::$version );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, __( 'Unserializing instances of this class is forbidden.', 'wp-rest-api-jquery-support' ), self::$version );
		}

		/**
		 * The Constructor.
		 * 
		 * @access public
		 * @since  1.0.0
		 */
		public function __construct() {
			$this->constants();
			$this->includes();

			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ), 99 );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Setup plugin constants.
		 *
		 * @access private
		 * @since  1.0.0
		 * @return void
		 */
		private function constants() {
			$this->define( 'RESTJQUERY_VERSION', self::$version );
			$this->define( 'RESTJQUERY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			$this->define( 'RESTJQUERY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			$this->define( 'RESTJQUERY_PLUGIN_FILE', __FILE__ );
			$this->define( 'RESTJQUERY_PLUGIN_BASE', plugin_basename( __FILE__ ) );
			$this->define( 'RESTJQUERY_SUPPORT_URL', 'https://wordpress.org/support/plugin/wp-rest-api-jquery-support' );
			$this->define( 'RESTJQUERY_REVIEW_URL', 'https://wordpress.org/support/plugin/wp-rest-api-jquery-support/reviews/' );
		}

		/**
		 * Define constant if not already set.
		 *
		 * @access private
		 * @since  1.0.0
		 * @param  string|string $name Name of the definition.
		 * @param  string|bool   $value Default value.
		 */
		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		/**
		 * Include required files.
		 *
		 * @access private
		 * @since  1.0.0
		 * @return void
		 */
		private function includes() {
			if ( is_admin() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
				require_once( 'includes/admin/class-admin-action-links.php' );
				require_once( 'includes/admin/class-admin-feedback.php' );
				require_once( 'includes/admin/class-admin-install.php' );
			}
		}

		/**
		 * Load the plugin text domain once the plugin has initialized.
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'wp-rest-api-jquery-support', false, dirname( plugin_basename( RESTJQUERY_PLUGIN_DIR ) ) . '/languages/' );
		}

		/**
		 * Load JS only on the front end for a single post.
		 *
		 * @access public
		 * @since  1.0.0
		 * @return void
		 */
		public function enqueue_scripts() {
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_register_script( 'restjquery', RESTJQUERY_PLUGIN_URL . 'restjquery' . $suffix . '.js', array( 'jquery' ), self::$version, true );
			wp_enqueue_script( 'restjquery' );

			wp_localize_script( 'restjquery', 'restjquery_params', array(
				'site_url' => esc_url_raw( get_option( 'siteurl' ) ),
				'nonce'    => wp_create_nonce( 'wp_rest' ),
			));
		}

	} // END class

} // END if class exists

return RESTjQuery::instance();
