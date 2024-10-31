<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://pluginic.com
 * @since      1.0.0
 *
 * @package    Post_Block
 * @subpackage Post_Block/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Post_Block
 * @subpackage Post_Block/includes
 * @author     Pluginic <hellopluginic@gmail.com>
 */
class Post_Block {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Post_Block_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'POST_BLOCK_VERSION' ) ) {
			$this->version = POST_BLOCK_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'post-block';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

		add_action('wp_ajax_filter_posts_by_pagination', array($this, 'filter_posts_by_pagination'));
		add_action('wp_ajax_nopriv_filter_posts_by_pagination', array($this, 'filter_posts_by_pagination'));
	}

	/**
	 * Ajax Filter Pagination.
	 * Ajax call function.
	 */
	public function filter_posts_by_pagination() {

		$paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
		$categoryFilter = isset($_POST['categories']) ? array_map('intval', $_POST['categories']) : array();
	
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 6,
			'paged'          => $paged,
			'post_status'    => 'publish',
		);
	
		// Add category filter if selected
		if (!empty($categoryFilter)) {
			$args['category__in'] = $categoryFilter;
		}
	
		$query = new WP_Query($args);
	
		ob_start();
	
		echo '<div class="frhd-post-grid-wrap">
			<div class="frhd-post-grid-container">';
		while ($query->have_posts()) : $query->the_post();
			$featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
			$post_title     = get_the_title();
			$post_url       = get_the_permalink();
			$post_author    = get_the_author_posts_link();
			$post_mod_date  = get_the_modified_date();
			?>
			<div class="frhd-post-card">
				<?php
				if ( $featured_image ) {
					echo '<img src="' . esc_url($featured_image) . '" class="card-img-top" alt="' . $post_title . '">';
				} else {
					echo '<span class="card-img-top-missing"></span>';
				}
				?>
				<div class="card-body">
					<div class="frhd-card-post-meta">
					<?php echo wp_kses_post( $post_author ) . '<span>|</span>' . $post_mod_date; ?>
					</div>
					<h2 class="card-title"><a href="<?php echo $post_url; ?>"><?php echo esc_html($post_title); ?></a></h2>
					<a href="<?php echo $post_url; ?>" class="card-button">Read More <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9552 3.63015C12.1032 3.5069 12.2941 3.44746 12.4859 3.4649C12.6777 3.48233 12.8547 3.57522 12.978 3.72313L17.8203 9.53446C17.8841 9.60736 17.9326 9.69228 17.9631 9.78422C17.9936 9.87616 18.0054 9.97327 17.9978 10.0698C17.9901 10.1664 17.9633 10.2605 17.9188 10.3465C17.8743 10.4325 17.813 10.5088 17.7386 10.5708C17.6642 10.6328 17.5782 10.6793 17.4855 10.7076C17.3929 10.7358 17.2955 10.7453 17.1991 10.7353C17.1028 10.7254 17.0094 10.6963 16.9245 10.6498C16.8395 10.6032 16.7647 10.5401 16.7045 10.4643L11.8623 4.65294C11.739 4.50496 11.6796 4.31409 11.697 4.1223C11.7144 3.9305 11.8073 3.75348 11.9552 3.63015Z" fill="#F35D36"/><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9552 16.3688C11.8073 16.2455 11.7144 16.0684 11.697 15.8766C11.6796 15.6848 11.739 15.494 11.8623 15.346L16.7045 9.53467C16.7647 9.45879 16.8395 9.39572 16.9245 9.34917C17.0094 9.30261 17.1028 9.27352 17.1991 9.26359C17.2955 9.25366 17.3929 9.26311 17.4855 9.29136C17.5782 9.31962 17.6642 9.36612 17.7386 9.42813C17.813 9.49014 17.8743 9.56641 17.9188 9.65244C17.9633 9.73847 17.9901 9.83254 17.9978 9.9291C18.0054 10.0257 17.9936 10.1228 17.9631 10.2147C17.9326 10.3067 17.8841 10.3916 17.8203 10.4645L12.978 16.2758C12.8547 16.4237 12.6777 16.5166 12.4859 16.534C12.2941 16.5515 12.1032 16.492 11.9552 16.3688Z" fill="#F35D36"/><path fill-rule="evenodd" clip-rule="evenodd" d="M17.2617 9.99961C17.2617 10.1923 17.1852 10.377 17.049 10.5133C16.9127 10.6495 16.728 10.726 16.5353 10.726L2.73341 10.726C2.54075 10.726 2.35598 10.6495 2.21975 10.5133C2.08352 10.377 2.00699 10.1923 2.00699 9.99961C2.00699 9.80695 2.08352 9.62218 2.21975 9.48595C2.35598 9.34972 2.54075 9.27319 2.73341 9.27319L16.5353 9.27319C16.728 9.27319 16.9127 9.34973 17.049 9.48595C17.1852 9.62218 17.2617 9.80695 17.2617 9.99961Z" fill="#F35D36"/></svg></a>
				</div>
			</div>
		<?php
		endwhile;
		echo '</div>
		</div>';
	
		wp_reset_postdata();
		?>
		<div id="frhd_pagination_ajax_filter" class="frhd-pagination-wrap">
			<nav aria-label="page navigation">
				<?php
				// Dynamically determine the base URL
				$current_page_url = wp_get_referer();
				$base_url_no_query = preg_replace('/\?.*/', '', $current_page_url);
				$base_url_no_pagination = preg_replace('/\/page\/\d+/', '', $base_url_no_query); // Adjust regex as needed
				$dynamic_base = trailingslashit($base_url_no_pagination) . 'page/%#%/';
	
				// Modify paginate_links() call within filter_posts_by_pagination function
				echo paginate_links(array(
					'total'     => $query->max_num_pages,
					'current'   => $paged,
					'base'      => $dynamic_base,
					'format'    => '?paged=%#%',
					'add_args'  => false, // Set to false or adjust if you need to add extra query args
				));
				?>
			</nav>
		</div>
		<?php
	
		// Output the books
		$output = ob_get_clean();
		echo $output;
	
		wp_die();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Post_Block_Loader. Orchestrates the hooks of the plugin.
	 * - Post_Block_i18n. Defines internationalization functionality.
	 * - Post_Block_Admin. Defines all hooks for the admin area.
	 * - Post_Block_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-post-block-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-post-block-i18n.php';

		/**
		 * The class responsible for Custom Post Types
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-post-block-cpt.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-post-block-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-post-block-public.php';

		/**
		 * The class responsible for block output
		 * of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-post-block-output.php';

		/**
		 * The class responsible for block Shortcode
		 * of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-post-block-shortcode.php';

		$this->loader = new Post_Block_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Post_Block_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Post_Block_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Post_Block_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Plugin admin custom post types.
		$plugin_admin_cpt = new Post_Block_CPT( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'init', $plugin_admin_cpt, 'frhdfp_post_type' );
		$this->loader->add_filter( 'post_updated_messages', $plugin_admin_cpt, 'frhdfp_updated_messages', 10, 2 );
		$this->loader->add_filter( 'manage_frhdfp_blocks_posts_columns', $plugin_admin_cpt, 'frhdfp_admin_column' );
		$this->loader->add_action( 'manage_frhdfp_blocks_posts_custom_column', $plugin_admin_cpt, 'frhdfp_admin_field', 10, 2 );
		$this->loader->add_action( 'admin_notices', $plugin_admin_cpt, 'frhdfp_admin_notice_for_header' );
		$this->loader->add_action( 'admin_menu', $plugin_admin_cpt, 'frhdfp_register_custom_menu_page' );
		$this->loader->add_filter( 'plugin_action_links', $plugin_admin_cpt, 'frhdfp_add_action_plugin', 10, 5 );

		/**
		 * Custom Category For FancyPost.
		 */
		function frhd_register_layout_category( $categories ) {

			$new_category = array(
				'slug'  => 'fancypost',
				'title' => 'FancyPost | Gutenberg Post Blocks',
				'icon'  => 'fancypost-icon',
			);

			array_unshift( $categories, $new_category );

			return $categories;
		}
		if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
			add_filter( 'block_categories_all', 'frhd_register_layout_category' );
		} else {
			add_filter( 'block_categories', 'frhd_register_layout_category' );
		}

		/**
		 * Check the license key and make a notice in admin area.
		 */
		$has_frhdfp_license_key = get_option( "FancyPostPRO_lic_Key" , "" );
		if ( empty( $has_frhdfp_license_key ) && 'PRESTIGE' === FPPB_COPY ) {
			function fancypost_license_notice() {
				?>
				<div class="fancypost-license-notice notice error is-dismissible">
					<p><?php _e( 'Please active your license key for FancyPost PRO.<a href="' . get_site_url() . '/wp-admin/admin.php?page=fancypost_license" class="button button-secondary" style="margin-left: 10px;">Activate License</a>', 'post-block' ); ?></p>
				</div>
				<?php
			}
			function fancypost_license_notice_hook() {
				add_action('admin_notices', 'fancypost_license_notice');
			}
			add_action('admin_init', 'fancypost_license_notice_hook');
		}
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		// Get the options.
		$frhd_admin_opt_root             = get_option( '_fpblock_options' );
		$fpblock_single_post_temp_enable = isset( $frhd_admin_opt_root['fpblock_single_post_temp_enable'] ) ? $frhd_admin_opt_root['fpblock_single_post_temp_enable'] : '';
		$fpblock_block_disable_allowed   = isset( $frhd_admin_opt_root['fpblock_block_disable_allowed'] ) ? $frhd_admin_opt_root['fpblock_block_disable_allowed'] : '';

		// Public class.
		$plugin_public = new Post_Block_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		if ( $fpblock_single_post_temp_enable ) {
			
			$this->loader->add_action( 'single_template', $plugin_public, 'fpblock_cpt_template_execute' );
		}

		/**
		 * Shortcode.
		 * Block to Shortcode converter.
		 */
		$plugin_shortcode = new Post_Block_Shortcode( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'fpblock_action_tag_for_shortcode', $plugin_shortcode, 'fpblock_shortcode_execute' );
		add_shortcode( 'fpblock', array( $plugin_shortcode, 'fpblock_shortcode_execute' ) );

		// Block output.
		$plugin_block_output = new Post_Block_Public_Output( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'init', $plugin_block_output, 'frhd_render_block_core' );
		if ( $fpblock_block_disable_allowed ) {

			$this->loader->add_filter( 'allowed_block_types_all', $plugin_block_output, 'fpblock_global_unset_blocks' );
		}

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Post_Block_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
