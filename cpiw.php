<?php

/**
 * 
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Cpiw
 *
 * @wordpress-plugin
 * Plugin Name:       Cart Product Images Woocommmerce
 * Plugin URI:        https://wordpress.org/plugins/cart-product-images-woocommmerce/
 * Description:       Cart Images handle.
 * Version:           4.0.0
 * Author:            Adnan Hyder Pervez
 * Author URI:        https://profiles.wordpress.org/adnanhyder/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cpiw
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('CPIW_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cpiw-activator.php
 */
function activate_cpiw()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-cpiw-activator.php';
    Cpiw_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cpiw-deactivator.php
 */
function deactivate_cpiw()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-cpiw-deactivator.php';
    Cpiw_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_cpiw');
register_deactivation_hook(__FILE__, 'deactivate_cpiw');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-cpiw.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cpiw()
{

    $plugin = new Cpiw();
    $plugin->run();

}


/**
 * Check if WooCommerce is active
 **/
if (
in_array(
    'woocommerce/woocommerce.php',
    apply_filters('active_plugins', get_option('active_plugins'))
)
) {
    run_cpiw();
} else{
    function cpiw_admin_notice() { ?>
        <div class="updated">
            <p><?php _e( 'Please install WooCommerce for the plugin CPIW To work', 'cpiw' ); ?></p>
        </div>
        <?php
    }

    add_action( 'load-index.php',
        function(){
            add_action( 'admin_notices', 'cpiw_admin_notice' );
        }
    );
}




