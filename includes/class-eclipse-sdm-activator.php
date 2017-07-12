<?php

/**
 * Fired during plugin activation
 *
 * @link       http://eclipse-creative.com/
 * @since      1.0.0
 *
 * @package    Eclipse_SDM
 * @subpackage Eclipse_SDM/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Eclipse_SDM
 * @subpackage Eclipse_SDM/includes
 * @author     Craig Stanfield <c.stanfield@eclipse-creative.com>
 */
class Eclipse_SDM_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

	}
}
