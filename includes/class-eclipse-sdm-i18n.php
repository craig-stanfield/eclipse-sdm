<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://eclipse-creative.com/
 * @since      1.0.0
 *
 * @package    Eclipse_SDM
 * @subpackage Eclipse_SDM/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Eclipse_SDM
 * @subpackage Eclipse_SDM/includes
 * @author     Craig Stanfield <c.stanfield@eclipse-creative.com>
 */
class Eclipse_SDM_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'eclipse-sdm',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
