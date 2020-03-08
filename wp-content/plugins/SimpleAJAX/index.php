<?php
/**
 * This plugin demonstrates how to use the WordPress Ajax APIs.
 *
 * @package           SimpleAJAX
 *
 * @wordpress-plugin
 * Plugin Name:       SimpleAJAX
 * Description:       A simple demonstration of the WordPress Ajax APIs.
 * Version:           1.0.0
 * Author:            Demento
 * Author URI:        https://tommcfarlin.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'Controllers/*.php' ) as $file ) {

	include_once $file;
}



/**
 * Instantiates the main class and initializes the plugin.
 */
function wpa_start_plugin() {

	$methodsAJAX=get_class_methods('SimpleAJAX');
	unset($methodsAJAX[array_search('__construct', $methodsAJAX)]);

	$plugin = new SimpleAJAX($methodsAJAX);

}

wpa_start_plugin();