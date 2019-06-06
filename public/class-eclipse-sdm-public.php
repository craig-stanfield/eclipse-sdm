<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://eclipse-creative.com/
 * @since      1.0.0
 *
 * @package    Eclipse_SDM
 * @subpackage Eclipse_SDM/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Eclipse_SDM
 * @subpackage Eclipse_SDM/public
 * @author     Craig Stanfield <c.stanfield@eclipse-creative.com>
 */
class Eclipse_SDM_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eclipse_SDM_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eclipse_SDM_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eclipse-sdm-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eclipse_SDM_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eclipse_SDM_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eclipse-sdm-public.js', array( 'jquery' ), $this->version, false );

		$fields = get_field('key_values', 'options');
        $dataToBePassed = array();
        if ($fields) {
            foreach ( $fields as $key => $values ) {
                switch ( $values['type'] ) {
                    case 'blink':
                        $replace = '<a href="' . $values["linking_url"] . '"><strong>' . $values['replace'] . '</strong></a>';
                        break;
                    case 'link':
                        $replace = '<a href="' . $values["linking_url"] . '">' . $values['replace'] . '</a>';
                        break;
                    case 'highlight':
                        $replace = '<strong>' . $values['replace'] . '</strong>';
                        break;
                    default:
                        $replace = $values['replace'];
                }
                $dataToBePassed[ $values['search'] ] = $replace;
            }
        }
        wp_localize_script( $this->plugin_name, 'php_vars', $dataToBePassed );

	}

}
