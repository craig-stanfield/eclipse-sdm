<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://eclipse-creative.com/
 * @since             0.0.0
 * @package           Eclipse_SDM
 *
 * @wordpress-plugin
 * Plugin Name:       Eclipse Structured Data Markup Toolbox
 * Plugin URI:        https://www.eclipse-creative.com/wordpress-plugins/EclipseSDM/
 * Author URI:        https://www.eclipse-creative.com
 * Description:       Add structured data markup in ld+json format to desired pages
 * Version:           0.1.0
 * Email:             c.stanfield@eclipse-creative.com
 * Author:            Eclipse Creative Consultants Ltd.
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       eclipse-sdm
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
if( ! class_exists( 'Eclipse_SDM_Updater' ) ){
    include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
}
$updater = new Eclipse_SDM_Updater( __FILE__ );
$updater->set_username( 'craig-stanfield' );
$updater->set_repository( 'eclipse-sdm' );
/*
	$updater->authorize( 'abcdefghijk1234567890' ); // Your auth code goes here for private repos
*/
$updater->initialize();

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-eclipse-sdm-activator.php
 */
function activate_eclipse_sdm()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-eclipse-sdm-activator.php';
    Eclipse_SDM_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-eclipse-sdm-deactivator.php
 */
function deactivate_eclipse_sdm()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-eclipse-sdm-deactivator.php';
    Eclipse_SDM_Deactivator::deactivate();
}
register_activation_hook(__FILE__, 'activate_eclipse_sdm');
register_deactivation_hook(__FILE__, 'deactivate_eclipse_sdm');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-eclipse-sdm.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_eclipse_sdm()
{
    $plugin = new Eclipse_SDM();
    $plugin->run();

}
run_eclipse_sdm();

add_action('admin_menu', 'eclipse_sdm_setup_menu');

function eclipse_sdm_setup_menu()
{
    add_menu_page('Eclipse Structured Data Markup Settings', 'Eclipse SDM', 'manage_options', 'eclipse-sdm', 'eclipse_sdm_settings_init', 'dashicons-text');

}

function eclipse_sdm_settings_init() {
    $path_to_eclipse_sdm_admin_display_php = plugin_dir_path(__FILE__) . 'admin/partials/eclipse-sdm-admin-display.php';
    include_once($path_to_eclipse_sdm_admin_display_php);

}

// THIS IS WHERE ANY FUNCTIONS FOR THIS PLUGIN ARE ADDED IF NEEDED

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_1',
        'title' => 'My Group',
        'fields' => array (),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
    ));

    acf_add_local_field(array(
        'key' => 'field_1',
        'label' => 'Sub Title',
        'name' => 'sub_title',
        'type' => 'text',
        'parent' => 'group_1'
    ));

endif;

/*function my_acf_add_local_field_groups() {

    acf_add_local_field_group(array(
        'key' => 'group_1',
        'title' => 'My Group',
        'fields' => array (
            array (
                'key' => 'field_1',
                'label' => 'Sub Title',
                'name' => 'sub_title',
                'type' => 'text',
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
    ));

}

add_action('acf/init', 'my_acf_add_local_field_groups');*/
