<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/scottgruber
 * @since      1.0.0
 *
 * @package    Ucla_Bruin_Cp
 * @subpackage Ucla_Bruin_Cp/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ucla_Bruin_Cp
 * @subpackage Ucla_Bruin_Cp/includes
 * @author     Scott Gruber <scott.gruber@ucla.edu>
 */
class Ucla_Bruin_Cp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ucla-bruin-cp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
