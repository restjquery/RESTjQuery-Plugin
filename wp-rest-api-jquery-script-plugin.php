<?php
/*
 * Plugin Name: WordPress REST API jQuery Support
 * Plugin URI:  https://sebastiendumont.com
 * Version:     1.0
 * Description: Includes support for WordPress jQuery REST API Wrapper script.
 * Author:      Sébastien Dumont
 * Author URI:  https://sebastiendumont.com
 *
 * Requires at least: 4.5
 * Tested up to: 4.7.3
 *
 * Copyright: © 2017 Sébastien Dumont
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
if ( ! defined('ABSPATH') ) exit; // Exit if accessed directly.

/**
 * Enqueues Script.
 *
 * @since 1.0
 */
function wp_rest_api_jquery_script() {
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'wp-rest-api-jquery', plugins_url( basename( plugin_dir_path(__FILE__) ), basename( __FILE__ ) ) . '/wp-rest-api-jquery' . $suffix . '.js', array( 'jquery' ), false, true );

	wp_localize_script( 'wp-rest-api-jquery', 'wprestapi_jquery_params', array(
		'siteURL' => get_option( 'siteurl' ),
		'nonce' => wp_create_nonce( 'wp_rest' ),
	));
}
add_action( 'wp_enqueue_scripts', 'wp_rest_api_jquery_script' );
