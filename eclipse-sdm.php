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
 * @since             0.0.1
 * @package           Eclipse_SDM
 *
 * @wordpress-plugin
 * Plugin Name:       Eclipse Structured Data Markup Toolbox
 * Plugin URI:        https://www.eclipse-creative.com/wordpress-plugins/EclipseSDM/
 * Author URI:        https://www.eclipse-creative.com
 * Description:       Add SDM ld+json to pages with qa category pages and dynamic search & replace. Uses ACF in PHP don't create tables
 * Version:           2.1.2
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

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Search & Replace',
        'menu_title' => 'Search & Replace',
        'menu_slug'  => 'sar',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-search',
        'position'   => 88,
        'redirect'   => false
    ));

    acf_add_options_page(array(
        'page_title' => 'Eclipse Structured Data Markup',
        'menu_title' => 'Eclipse SDM',
        'menu_slug'  => 'sdm',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-text',
        'position'   => 89,
        'redirect'   => false
    ));

    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_5c0e727c19c9f',
            'title' => 'Search and Replace',
            'fields' => array(
                array(
                    'key' => 'field_5c0e7292c21b6',
                    'label' => 'Key Values',
                    'name' => 'key_values',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5c0e729ec21b7',
                            'label' => 'Search',
                            'name' => 'search',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0e72a6c21b8',
                            'label' => 'Replace',
                            'name' => 'replace',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0e86e4a520d',
                            'label' => 'Type',
                            'name' => 'type',
                            'type' => 'select',
                            'instructions' => 'Link adds a normal link, on some sites links need to be bold so use Bold Link we can just highlight a link without a link and finally we can just replace the text.',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                'link' => 'Link',
                                'blink' => 'Bold Link',
                                'highlight' => 'Highlight',
                                'replace' => 'Replace',
                            ),
                            'default_value' => array(
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'return_format' => 'value',
                            'ajax' => 0,
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_5c0e8743a520e',
                            'label' => 'Linking Url',
                            'name' => 'linking_url',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'sar',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

        acf_add_local_field_group(array(
            'key' => 'group_5c0feaf085bf5',
            'title' => 'Eclipse SDM',
            'fields' => array(
                array(
                    'key' => 'field_5c0feafcd5ec5',
                    'label' => 'Organisation',
                    'name' => 'organization',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => 'field_5c0feb46d5ec8',
                    'min' => 1,
                    'max' => 1,
                    'layout' => 'row',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5c0feb46d5ec8',
                            'label' => 'Name',
                            'name' => 'name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        /*array(
                            'key' => 'field_5c0feb51d5ec9',
                            'label' => 'Address',
                            'name' => 'address',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),*/
                        /*array(
                            'key' => 'field_5c0feb5ed5eca',
                            'label' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                        ),*/
                        /*array(
                            'key' => 'field_5c0feb6ed5ecb',
                            'label' => 'Telephone',
                            'name' => 'telephone',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),*/
                        array(
                            'key' => 'field_5c0feb7dd5ecc',
                            'label' => 'Logo',
                            'name' => 'logo',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'preview_size' => 'full',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_5ccfeb7dd5ecc',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_5c0feba2d5ecd',
                            'label' => 'URL',
                            'name' => 'url',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_5c0fed64d5ecc',
                            'label' => 'Same As',
                            'name' => 'same_as',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'collapsed' => '',
                            'min' => 0,
                            'max' => 16,
                            'layout' => 'row',
                            'button_label' => '',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5c4fed88d5edc',
                                    'label' => 'URL',
                                    'name' => 'url',
                                    'type' => 'url',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'placeholder' => '',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_5c0feb11d5ec6',
                    'label' => 'Person',
                    'name' => 'person',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => 'field_5c0febe3d5ece',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5c0febe3d5ece',
                            'label' => 'Name',
                            'name' => 'name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0fec27d5ecf',
                            'label' => 'Area Served',
                            'name' => 'area_served',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0fec38d5ed0',
                            'label' => 'Contact Type',
                            'name' => 'contact_type',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0fec48d5ed1',
                            'label' => 'email',
                            'name' => 'email',
                            'type' => 'email',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                        ),
                        array(
                            'key' => 'field_5c0fec55d5ed2',
                            'label' => 'Product Supported',
                            'name' => 'product_supported',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0fec68d5ed3',
                            'label' => 'Telephone',
                            'name' => 'telephone',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_5c0feb1fd5ec7',
                    'label' => 'Local Business',
                    'name' => 'local_business',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => 'field_5c0fecfcd5ed6',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'row',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5c0fad64d5edb',
                            'label' => 'Parent Organisation',
                            'name' => 'parent_organization',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'collapsed' => '',
                            'min' => 1,
                            'max' => 10,
                            'layout' => 'row',
                            'button_label' => '',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5c0fed68d5edc',
                                    'label' => 'Name',
                                    'name' => 'name',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'placeholder' => '',
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_5c0feca7d5ed4',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_5c0fecc9d5ed5',
                            'label' => 'Price Range',
                            'name' => 'price_range',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5d0eeec9d4ed5',
                            'label' => 'opening Hours',
                            'name' => 'opening_hours',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5d0fecc9d4ed5',
                            'label' => 'Address',
                            'name' => 'address',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0fecc9d7ed5',
                            'label' => 'HasMap',
                            'name' => 'hasmap',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0fecfcd5ed6',
                            'label' => 'Name',
                            'name' => 'name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5c0fed0dd5ed7',
                            'label' => 'Logo',
                            'name' => 'logo',
                            'type' => 'image',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'url',
                            'preview_size' => 'full',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                        array(
                            'key' => 'field_5c0fed2dd5ed8',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => '',
                            'new_lines' => '',
                        ),
                        array(
                            'key' => 'field_5c0fed41d5ed9',
                            'label' => 'URL',
                            'name' => 'url',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_5c0fed52d5eda',
                            'label' => 'Same As',
                            'name' => 'same_as',
                            'type' => 'url',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                        ),
                        array(
                            'key' => 'field_5c0fed64d5edb',
                            'label' => 'Geo',
                            'name' => 'geo',
                            'type' => 'repeater',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'collapsed' => '',
                            'min' => 1,
                            'max' => 1,
                            'layout' => 'row',
                            'button_label' => '',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_5c0fed88d5ede',
                                    'label' => 'Longitude',
                                    'name' => 'longitude',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'placeholder' => '',
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                                array(
                                    'key' => 'field_5c0fed90d5edf',
                                    'label' => 'Latitude',
                                    'name' => 'latitude',
                                    'type' => 'text',
                                    'instructions' => '',
                                    'required' => 0,
                                    'conditional_logic' => 0,
                                    'wrapper' => array(
                                        'width' => '',
                                        'class' => '',
                                        'id' => '',
                                    ),
                                    'default_value' => '',
                                    'placeholder' => '',
                                    'prepend' => '',
                                    'append' => '',
                                    'maxlength' => '',
                                ),
                            ),
                        ),
                        array(
                            'key' => 'field_5c0feda6d5ede',
                            'label' => 'Contact Point(s)',
                            'name' => 'contact',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                            ),
                            'default_value' => array(
                            ),
                            'allow_null' => 0,
                            'multiple' => 1,
                            'ui' => 0,
                            'ajax' => 0,
                            'return_format' => 'value',
                            'placeholder' => '',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'sdm',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => 1,
            'description' => '',
        ));

        acf_add_local_field_group(array(
            "key"=> "group_5cf7683ed2524",
            "title"=> "Q and A region",
            "fields"=> array(
            array(
                "key"=> "field_5cf7d93c97242",
                "label"=> "FAQPage mainEntity",
                "name"=> "faqpage_mainentity",
                "type"=> "repeater",
                "instructions"=> "",
                "required"=> 0,
                "conditional_logic"=> 0,
                "wrapper"=> array(
                "width"=> "",
                    "class"=> "",
                    "id"=> ""
                ),
                "collapsed"=> "field_5cf7d96f97243",
                "min"=> 0,
                "max"=> 0,
                "layout"=> "block",
                "button_label"=> "",
                "sub_fields"=> array(
                    array(
                        "key"=> "field_5cf7d96f97243",
                        "label"=> "Question",
                        "name"=> "name",
                        "type"=> "text",
                        "instructions"=> "",
                        "required"=> 1,
                        "conditional_logic"=> 0,
                        "wrapper"=> array(
                        "width"=> "",
                            "class"=> "",
                            "id"=> ""
                        ),
                        "default_value"=> "",
                        "placeholder"=> "",
                        "prepend"=> "",
                        "append"=> "",
                        "maxlength"=> ""
                    ),
                    array(
                        "key"=> "field_5cf7d9b497244",
                        "label"=> "Answer",
                        "name"=> "text",
                        "type"=> "textarea",
                        "instructions"=> "",
                        "required"=> 1,
                        "conditional_logic"=> 0,
                        "wrapper"=> array(
                        "width"=> "",
                            "class"=> "",
                            "id"=> ""
                        ),
                        "default_value"=> "",
                        "placeholder"=> "Enter the answer here",
                        "maxlength"=> "",
                        "rows"=> "",
                        "new_lines"=> ""
                    )
                )
            )
        ),
            "location"=> array(
            array(
                    array(
                        "param"=> "taxonomy",
                        "operator"=> "==",
                        "value"=> "category"
                    )
                )
            ),
            "menu_order"=> 0,
            "position"=> "normal",
            "style"=> "default",
            "label_placement"=> "top",
            "instruction_placement"=> "label",
            "hide_on_screen"=> "",
            "active"=> 1,
            "description"=> ""
        ));
    endif;
}

function acf_load_contact_point_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();

    if( have_rows('person', 'option') ) {
        while ( have_rows( 'person', 'option' ) ) {
            the_row();
                $value = get_sub_field( 'name' );
                $label = get_sub_field( 'name' );

                // append to choices
                $field['choices'][ $value ] = $label;
        }
    }

    // return the field
    return $field;

}

add_filter('acf/load_field/name=contact', 'acf_load_contact_point_field_choices');

function ecl_sdm_factory( $atts ) {
    $schema = '<script type="application/ld+json">';
    switch ( $atts['schema'] ) {
        case 'organisation':
            // This factory returns only the organization script
            $schema .= build_ecl_sdm(
                array(
                    0 => 'organization'
                )
            );
            break;
        case 'people':
            // This factory returns all people
            $schema .= build_ecl_sdm(
                array(
                    0 => 'people'
                )
            );
            break;
        case 'local_business':
            // This factory returns any Local Businesses
            $schema .= build_ecl_sdm(
                array(
                    0 => 'local_business'
                )
            );
            break;
        case 'all':
            // This factory returns organization, local businesses and all people
            $schema .= build_ecl_sdm(
                array(
                    0 => 'organization',
                    1 => 'local_business',
                    2 => 'person'
                )
            );
            break;
        case 'standard':
        default:
            // This factory returns organisation then local businesses with the contact points. this is the default
            $schema .= build_ecl_sdm(
                array(
                    0 => 'organization',
                    1 => 'local_business'
                )
            );
            break;

    }

    $schema .= '</script>';

    return $schema;
}

add_shortcode('ecl-sdm', 'ecl_sdm_factory');

/**
 * @param $schemas
 *
 * @return false|mixed|string|void
 */
function build_ecl_sdm( $schemas ) {
    $sdmData = array(
        '@context' => array(
            '@vocab' => 'https://schema.org'
        )

    );
    $sdmGraph = array();
    foreach ( $schemas as $schema ) {
        $sdmPart = array();
        $repeater = get_field($schema, 'option');
        $sdmPart['@context'] = 'http://schema.org';
        $sdmPart['@type']    = sdmName($schema, 'pascal');
        $sdmPart['@id']      = '#' . sdmName($schema, 'pascal');
        foreach ( $repeater as $fields ) {
            foreach ( $fields as $key => $value ) {
                if ( is_array( $value ) ) {
                    $k = '';
                    if ( $key == 'same_as' ) {
                        $tmp = array();
                        foreach ( $value as $url ) {
                            $tmp[] = $url['url'];
                        }
                        $sdmPart[ sdmName( $key, 'camel' ) ] = $tmp;
                    }
                    if ( $key == 'parent_organization') {
                        $tmp = array();
                        foreach ( $value as $i => $name ) {
                            $tmp['name'] = $name['name'];
                        }
                        $sdmPart[ sdmName( $key, 'camel' ) ] = $tmp;
                    }
                    if ( $key == 'geo') {
                        $tmp = array();
                        $tmp['@type'] = 'GeoCoordinates';
                        foreach ( $value as $i => $name ) {
                            $tmp['latitude'] = $name['latitude'];
                            $tmp['longitude'] = $name['longitude'];
                        }
                        $sdmPart[ sdmName( $key, 'camel' ) ] = $tmp;
                    }
                    if ( $key == 'contact') {
                        // we need to get people with the selected names
                        $people = get_field('person', 'option');
                        foreach ( $people as $person ) {
                            $tmp = array();
                            $tmp['@type'] = 'contactPoint';
                            $name = $person['name'];
                            if ( in_array( $name, $value ) ) {
                                // Add the contact details
                                foreach ( $person as $i => $v ) {
                                    $tmp[ sdmName( $i, 'camel' ) ] = $v;
                                }
                            }
                        }
                        $sdmPart['contactPoint'] = $tmp;
                    }
                } else {
                    $sdmPart[sdmName($key, 'camel')] = $value;
                }
            }
            $sdmGraph[] = $sdmPart;
        }
    }
    $sdmData['@graph'] = $sdmGraph;

    $sdmJson = json_encode($sdmData);

    return $sdmJson;
}

/**
 * Takes mixed text and converts it to snake_case, kebab-case, camelCase or PascalCase
 *
 * @param string $value
 * @param string $case
 *
 * @return string $name
 */
function sdmName( $value, $case ) {
    switch ($case) {
        case 'snake':
            $name = getSnakeCase($value);
            break;
        case 'kebab':
            $name = str_replace( '_', '-', getSnakeCase($value) );
            break;
        case 'camel':
            $name = ucwords(getSnakeCase($value), '_');
            $name[0] = strtolower($name[0]);
            $name = str_replace( '_', '', $name );
            break;
        case 'pascal':
            $name = ucwords(getSnakeCase($value), '_');
            $name = str_replace( '_', '', $name );
            break;
        default:
            $name = $value;
    }

    return $name;
}

function getSnakeCase( $string ) {
    $name = preg_replace("/[^A-Za-z0-9 ]/", ' ', $string);

    return preg_replace('!\s+!', '_', $name);
}