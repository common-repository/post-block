<?php

/**
 * @link              https://pluginic.com
 * @since             1.0.0
 * @package           Post_Block
 *
 * @wordpress-plugin
 * Plugin Name:       FancyPost
 * Plugin URI:        https://pluginic.com/plugins/gutenberg-post-blocks/
 * Description:       <p><a href="https://pluginic.com/plugins/gutenberg-post-blocks/">FancyPost</a> is the premier Gutenberg Blocks plugin, offering a comprehensive collection of over 20+ free blocks, including post grids, post lists, post sliders, carousels, and more. Its advanced capabilities, such as dynamic site building and a vast array of design variations, make it the ideal choice for creating stunning News Magazine websites and blogs of all genres, including Personal Blogs, Travel Blogs, Fashion Blogs, Food Reviews, Recipe Blogs, and more.</p>
 * Version:           6.0.0
 * Author:            Pluginic
 * Author URI:        https://pluginic.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       post-block
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Defining.
 */
define( 'POST_BLOCK_VERSION', '6.0.0' );
define( 'FPPB_URL', plugin_dir_url( __FILE__ ) );
define( 'POST_BLOCK_DIR', plugin_dir_path( __FILE__ ) );
define( 'FPPB_BASE_FILE', plugin_basename( __FILE__ ) );
if ( defined( 'POST_BLOCK_VERSION' ) ) {

	$frhd_fppb_pro = file_exists( __DIR__ . '/admin/class-fancy-post-base.php' );

	if ( ! $frhd_fppb_pro ) {

		define( 'FPPB_COPY', 'ESSENTIAL' );
	} else {

		define( 'FPPB_COPY', 'PRESTIGE' );
	}
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-post-block-activator.php
 */
function activate_post_block() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-block-activator.php';
	Post_Block_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-post-block-deactivator.php
 */
function deactivate_post_block() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-block-deactivator.php';
	Post_Block_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_post_block' );
register_deactivation_hook( __FILE__, 'deactivate_post_block' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-post-block.php';
require_once POST_BLOCK_DIR . 'custom-fields/classes/setup.class.php';
require_once POST_BLOCK_DIR . 'custom-fields/options/admin-backup.php';
require_once POST_BLOCK_DIR . 'custom-fields/options/admin-options.php';
require_once POST_BLOCK_DIR . 'custom-fields/options/admin-license.php';
require_once POST_BLOCK_DIR . 'custom-fields/options/admin-pseo.php';
require_once POST_BLOCK_DIR . 'custom-fields/options/admin-help.php';
if ( 'ESSENTIAL' === FPPB_COPY ) {

	require_once POST_BLOCK_DIR . 'custom-fields/options/admin-features.php';
}
require_once POST_BLOCK_DIR . 'custom-fields/options/user-options.php';
require_once POST_BLOCK_DIR . 'custom-fields/options/post-options.php';
require_once POST_BLOCK_DIR . 'custom-fields/options/shortcode-options.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_post_block() {

	$plugin = new Post_Block();
	$plugin->run();

}
run_post_block();
