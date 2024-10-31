<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://pluginic.com
 * @since      1.0.0
 *
 * @package    Post_Block
 * @subpackage Post_Block/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Post_Block
 * @subpackage Post_Block/public
 * @author     Pluginic <hellopluginic@gmail.com>
 */
class Post_Block_Shortcode {

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
		$this->version     = $version;

	}

	public function fpblock_shortcode_execute( $atts ) {

		$post_id = intval( $atts['id'] );

		ob_start();

		$fpblock_query          = new WP_Query( 'post_type=frhdfp_blocks&p=' . $post_id );
		$fpblock_post_content   = $fpblock_query->posts[0]->post_content;
		$fpblock_blocks         = parse_blocks( $fpblock_post_content );
		$fpblock_content_markup = '';
		foreach ( $fpblock_blocks as $block ) {

			$fpblock_content_markup .= render_block( $block );
		}
		echo apply_filters( 'the_content', $fpblock_content_markup );

		return ob_get_clean();

	}

}
