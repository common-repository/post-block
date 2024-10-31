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
class Post_Block_Public {

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
		 * defined in Post_Block_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Post_Block_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/post-block-public.css', array(), $this->version, 'all' );

		/**
		 * Post block style files.
		 */
		wp_register_style( 'post-grid-1', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-1.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-2', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-2.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-3', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-3.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-4', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-4.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-5', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-5.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-6', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-6.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-7', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-7.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-8', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-8.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-9', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-9.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-10', plugin_dir_url( __FILE__ ) . 'css/post-grid/post-grid-10.css', array(), POST_BLOCK_VERSION );

		/**
		 * Post block interactive style files.
		 */
		wp_register_style( 'post-grid-interactive-1', plugin_dir_url( __FILE__ ) . 'css/post-grid-interactive/post-grid-interactive-1.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-interactive-2', plugin_dir_url( __FILE__ ) . 'css/post-grid-interactive/post-grid-interactive-2.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-interactive-3', plugin_dir_url( __FILE__ ) . 'css/post-grid-interactive/post-grid-interactive-3.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-interactive-4', plugin_dir_url( __FILE__ ) . 'css/post-grid-interactive/post-grid-interactive-4.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-interactive-5', plugin_dir_url( __FILE__ ) . 'css/post-grid-interactive/post-grid-interactive-5.css', array(), POST_BLOCK_VERSION );
		wp_register_style( 'post-grid-interactive-6', plugin_dir_url( __FILE__ ) . 'css/post-grid-interactive/post-grid-interactive-6.css', array(), POST_BLOCK_VERSION );
		
		// Smooth Scroll.
		wp_register_style( 'smooth-scroll-style', plugin_dir_url( __FILE__ ) . 'css/smooth-scrollbar.css', array(), '1.0.0', 'all' );

		// Single Post Template.
		wp_register_style( 'single-post-template-1', plugin_dir_url( __FILE__ ) . 'css/single-post-template-1.css', array(), '1.0.0', 'all' );
		wp_register_style( 'single-post-template-2', plugin_dir_url( __FILE__ ) . 'css/single-post-template-2.css', array(), '1.0.0', 'all' );

		/**
		 * Conditions to check block exist.
		 */
		/* if ( has_block( 'fancypost/post-grid' ) ) {

            // wp_enqueue_script( 'slider-js', plugins_url( 'src/slider.js', __FILE__ ), array( 'jquery' ), '1.0.0', false );
            echo 'Yes, Post Grid Exist.';
        } else {

            echo 'No, Post Grid does not Exist.';
        } */

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
		 * defined in Post_Block_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Post_Block_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/post-block-public.js', array( 'jquery' ), $this->version, false );

		if ( has_block( 'fancypost/heading-effect' ) ) {

			wp_enqueue_script( $this->plugin_name . 'typefect', plugin_dir_url( __FILE__ ) . 'js/type-effect.js', array(), $this->version );
		}
		if ( has_block( 'fancypost/image-slider' ) || has_block( 'fancypost/post-slider' ) ) {

			wp_enqueue_script( $this->plugin_name . 'splide', plugin_dir_url( __FILE__ ) . 'js/splide.min.js', array(), '4.1.2', false );
			wp_enqueue_script( $this->plugin_name . 'slider', plugin_dir_url( __FILE__ ) . 'js/frhd-slider.js', array( $this->plugin_name . 'splide' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name . 'post-slider', plugin_dir_url( __FILE__ ) . 'js/frhd-post-slider.js', array( $this->plugin_name . 'splide' ), $this->version, false );
		}

		// Smooth Scroll.
		wp_register_script( 'smooth-scroll-script', plugin_dir_url( __FILE__ ) . 'js/smooth-scrollbar.js', array(), $this->version, true );

		// Single Post Template Script.
		wp_register_script( 'single-post-template', plugin_dir_url( __FILE__ ) . 'js/single-post-template.js', array( 'smooth-scroll-script' ), '1.0.0', false );

	}

	/**
	 * Template execute for Affiliate posts.
	 *
	 * @param String $template Page templates.
	 * @return Mixed
	 */
	public function fpblock_cpt_template_execute( $template ) {

		$frhd_admin_opt_root             = get_option( '_fpblock_options' );
		$fpblock_single_post_type_select = isset( $frhd_admin_opt_root['fpblock_single_post_type'] ) ? $frhd_admin_opt_root['fpblock_single_post_type'] : '';

		if ( is_singular( $fpblock_single_post_type_select ) ) {

			$template = POST_BLOCK_DIR . 'public/partials/single-post/frhd-post-template-1.php';

		}
		return $template;
	}

}
