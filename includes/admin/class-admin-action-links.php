<?php
/**
 * Add links to RESTjQuery on the plugins admin page.
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

class RESTjQuery_Action_Links {

	/**
	 * Constructor
	 */
	public function __construct() {
		add_filter( 'plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 2 );
	}

	/**
	 * Plugin row meta links
	 *
	 * @access public
	 * @param  array  $plugin_meta An array of the plugin's metadata.
	 * @param  string $plugin_file Path to the plugin file.
	 * @return array  $input
	 */
	public function plugin_row_meta( $plugin_meta, $plugin_file ) {
		// Check if this is defined.
		if ( ! defined( 'RESTJQUERY_PLUGIN_BASE' ) ) {
			define( 'RESTJQUERY_PLUGIN_BASE', null );
		}

		if ( RESTJQUERY_PLUGIN_BASE === $plugin_file ) {
			$row_meta = [
				'review' => '<a href="' . esc_url( RESTJQUERY_REVIEW_URL ) . '" aria-label="' . esc_attr( __( 'Review RESTjQuery on WordPress.org', 'wp-rest-api-jquery-support' ) ) . '" target="_blank">' . __( 'Leave a Review', 'wp-rest-api-jquery-support' ) . '</a>',
			];

			$plugin_meta = array_merge( $plugin_meta, $row_meta );
		}

		return $plugin_meta;
	}
}

new RESTjQuery_Action_Links();
