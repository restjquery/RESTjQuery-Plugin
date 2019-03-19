<?php
/**
 * Run on plugin install.
 *
 * @since   1.0.0
 * @package RESTjQuery
 * @author  Sébastien Dumont
 * @link    https://sebastiendumont.com
 * @license GPL-2.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * RESTjQuery_Install Class
 */
class RESTjQuery_Install {

	/**
	 * Constructor
	 */
	public function __construct() {
		register_activation_hook( RESTJQUERY_PLUGIN_FILE, array( $this, 'register_install_date' ) );
	}

	/*
	 * Register plugin defaults
	 */
	public function register_install_date() {
		if ( is_admin() ) {
			if ( ! get_option( 'restjquery_date_installed' ) ) {
				add_option( 'restjquery_date_installed', date( 'Y-m-d h:i:s' ) );
			}
		}
	}
}

return new RESTjQuery_Install();
