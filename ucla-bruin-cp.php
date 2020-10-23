<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/scottgruber
 * @since             1.0.0
 * @package           Ucla_Bruin_Cp
 *
 * @wordpress-plugin
 * Plugin Name:       UCLA Bruin Custom Posts
 * Plugin URI:        https://github.com/ucla-ux/ucla-bruin-custom-posts
 * Description:       Brings custom post types to enhance WordPress for the UCLA community. Includes People, Events, Projects, Publications and Resources
 * Version:           1.0.0
 * Author:            Scott Gruber
 * Author URI:        https://github.com/scottgruber
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ucla-bruin-cp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'UCLA_BRUIN_CP_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ucla-bruin-cp-activator.php
 */
function activate_ucla_bruin_cp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ucla-bruin-cp-activator.php';
	Ucla_Bruin_Cp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ucla-bruin-cp-deactivator.php
 */
function deactivate_ucla_bruin_cp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ucla-bruin-cp-deactivator.php';
	Ucla_Bruin_Cp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ucla_bruin_cp' );
register_deactivation_hook( __FILE__, 'deactivate_ucla_bruin_cp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ucla-bruin-cp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ucla_bruin_cp() {

	$plugin = new Ucla_Bruin_Cp();
	$plugin->run();

}
run_ucla_bruin_cp();
