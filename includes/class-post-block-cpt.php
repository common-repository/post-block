<?php
/**
 * Define the custom post type functionality.
 *
 * Loads and defines the custom post type for this plugin
 * so that it is ready for admin menu under a different post type.
 *
 * @link       https://forhad.net/
 * @since      2.0.0
 *
 * @package    Header_Footer_Customizer
 * @subpackage Header_Footer_Customizer/includes
 */

/**
 * Define the custom post type functionality.
 */
class Post_Block_CPT {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Custom Post Type of the Plugin.
	 *
	 * @since    2.0.0
	 */
	public function frhdfp_post_type() {

		if ( post_type_exists( 'fancypost-init' ) ) {

			return;
		}

		$capability = apply_filters( 'frhdfp_blocks_ui_permission', 'manage_options' );
		$show_ui    = current_user_can( $capability ) ? true : false;
		$labels     = apply_filters(
			'frhdfp_blocks_post_type_labels',
			array(
				'name'               => esc_html_x( 'Block Groups', 'post-block' ),
				'singular_name'      => esc_html_x( 'Blocks', 'post-block' ),
				'add_new'            => esc_html__( 'Add Blocks', 'post-block' ),
				'add_new_item'       => esc_html__( 'Add New Block Group', 'post-block' ),
				'edit_item'          => esc_html__( 'Edit Block Group', 'post-block' ),
				'new_item'           => esc_html__( 'New Block Group', 'post-block' ),
				'view_item'          => esc_html__( 'View Block Group', 'post-block' ),
				'search_items'       => esc_html__( 'Search Blocks', 'post-block' ),
				'not_found'          => esc_html__( 'No Block Group found.', 'post-block' ),
				'not_found_in_trash' => esc_html__( 'No Block Group found in trash.', 'post-block' ),
				'parent_item_colon'  => esc_html__( 'Parent Item:', 'post-block' ),
				'menu_name'          => esc_html__( 'Block Settings', 'post-block' ),
				'all_items'          => esc_html__( 'Block Groups', 'post-block' ),
			)
		);

		$args = apply_filters(
			'frhdfp_blocks_post_type_args',
			array(
				'labels'              => $labels,
				'public'              => false,
				'hierarchical'        => false,
				'exclude_from_search' => true,
				'show_ui'             => $show_ui,
				'show_in_admin_bar'   => false,
				'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode( '<svg style="fill:rgba(240,246,252,.6);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M222.7 32.15C227.7 49.08 218.1 66.9 201.1 71.94C121.8 95.55 64 169.1 64 255.1C64 362 149.1 447.1 256 447.1C362 447.1 448 362 448 255.1C448 169.1 390.2 95.55 310.9 71.94C293.9 66.9 284.3 49.08 289.3 32.15C294.4 15.21 312.2 5.562 329.1 10.6C434.9 42.07 512 139.1 512 255.1C512 397.4 397.4 511.1 256 511.1C114.6 511.1 0 397.4 0 255.1C0 139.1 77.15 42.07 182.9 10.6C199.8 5.562 217.6 15.21 222.7 32.15V32.15z"/></svg>' ),
				'rewrite'             => false,
				'query_var'           => false,
				'imported'            => true,
				'supports'            => array( 'title', 'editor' ),
				'show_in_rest'        => true, // to enable the Gutenberg editor.
				'show_in_menu'        => false,
			)
		);
		register_post_type( 'frhdfp_blocks', $args );

	}

	/**
	 * Change Blocks updated messages.
	 *
	 * @param string $messages The Update messages.
	 * @return statement
	 */
	public function frhdfp_updated_messages( $messages ) {
		global $post, $post_ID;
		$messages['frhdfp_blocks'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf( __( 'Blocks updated.', 'post-block' ) ),
			2  => '',
			3  => '',
			4  => __( ' updated.', 'post-block' ),
			5  => isset( $_GET['revision'] ) ? sprintf( esc_html( 'Blocks restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf( __( 'Blocks published.', 'post-block' ) ),
			7  => __( 'Blocks saved.', 'post-block' ),
			8  => sprintf( __( 'Blocks submitted.', 'post-block' ) ),
			9  => sprintf( wp_kses_post( 'Blocks scheduled for: <strong>%1$s</strong>.', 'post-block' ), date_i18n( __( 'M j, Y @ G:i', 'post-block' ), strtotime( $post->post_date ) ) ),
			10 => sprintf( __( 'Blocks draft updated.', 'post-block' ) ),
		);
		return $messages;
	}

	/**
	 * Add new custom columns.
	 *
	 * @param [type] $columns The columns.
	 * @return statement
	 */
	public function frhdfp_admin_column( $columns ) {
		return array(
			'cb'        => '<input type="checkbox" />',
			'title'     => __( 'Name', 'post-block' ),
			'shortcode' => __( 'Shortcode', 'post-block' ),
			'date'      => __( 'Date', 'post-block' ),
		);
	}

	/**
	 * Display admin columns content.
	 *
	 * @param mix    $column The columns.
	 * @param string $post_id The post ID.
	 * @return void
	 */
	public function frhdfp_admin_field( $column, $post_id ) {
		switch ( $column ) {
			case 'shortcode':
				echo '<input title="Copy the Shortcode" style="width:180px;padding:2px 12px;color:#e91e63;text-align:center;cursor:copy;" type="text" onClick="this.select();" readonly="readonly" value="[fpblock id=&quot;' . esc_attr( $post_id ) . '&quot;]"/>';
				break;
			default:
				echo '';
		}
	}

	/**
	 * Notice for header post type posts page.
	 */
	public function frhdfp_admin_notice_for_header() {

		$frhdfp_screen = get_current_screen();
		if( 'frhdfp_blocks' === $frhdfp_screen->post_type
			&& 'edit' === $frhdfp_screen->base ) {
			?>
			<style>
			/* Hide all kind of notices and error. */
			div#wpbody-content [class*="notice"]:not(#message):not(.frhdfp-header-notice),
			div#wpbody-content [class*="error"],
			#nri-slug-wrapper {
				display: none !important;
			}
			/* Notice */
			.frhdfp-header-notice {
				position: relative;
				margin: 1em;
				background: #F9F9F9;
				padding: 1em 1em 1em 2em;
				border-left: 4px solid #0074D9;
				box-shadow: 0 1px 1px rgba(0, 0, 0, 0.125);
				display: flex;
			}
			.frhdfp-header-notice:before {
				position: absolute;
				top: 50%;
				transform: translateY(-50%);
				left: -20px;
				border-radius: 50%;
				text-align: center;
				line-height: 34px;
				background-color: #fff;
				font-family: 'dashicons';
				font-size: 34px;
				color: #0074D9;
				content: "\f534";
			}
			</style>
			<div class="frhdfp-header-notice">
				<p>The allows you to show Gutenberg Blocks through Shortcode.<br><a href="#">Learn more.</a></p>
			</div>
			<?php
		}
	}

	/**
	 * Register a custom menu page in admin.
	 */
	function frhdfp_register_custom_menu_page() {

		add_submenu_page(
			'fancypost-init',
			esc_html__( 'Getting Started', 'post-block' ),
			esc_html__( 'Getting Started', 'post-block' ),
			'manage_options',
			'fancypost-init',
			array( $this, 'fancypost_getting_started' ),
		);

		add_submenu_page(
			'fancypost-init',
			esc_html__( 'Blocks', 'post-block' ),
			esc_html__( 'Blocks', 'post-block' ),
			'manage_options',
			'admin.php?page=fancypost_opt#tab=blocks'
		);

		add_submenu_page(
			'fancypost-init',
			esc_html__( 'Post Template', 'post-block' ),
			esc_html__( 'Post Template', 'post-block' ),
			'manage_options',
			'admin.php?page=fancypost_opt#tab=single-post-settings'
		);

		$frhdfp_custom_menu_icon = 'data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA2My42MyA5MCI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOiNmZmY7fTwvc3R5bGU+PC9kZWZzPjxwYXRoIGNsYXNzPSJjbHMtMSIgZD0iTTMyNS41OSw0MDIuNTNIMzA2LjF2MjIuNzNoMTkuNDlabTIwLjg4LDBIMzI3djIyLjczaDE5LjUxWm0xLjM2LDB2MjEuNThsMTguNy0yMS41OFptLTIyLjI0LDI0LjA5SDMwNi4xdjIyLjczaDE5LjQ5Wm0xLjM3LDB2MjEuNTlsMTguNjktMjEuNTlabS0yMC44NiwyNC4xVjQ3Mi4zbDE4LjY4LTIxLjU4Wm0xLDIyLjI4LDYyLjYtMzYuMTVMMzQ4Ljg3LDQyNC44Wm0tMSwxOS41M0wzMjcsNDYzLDMwNi4xLDQ3NVoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0zMDYuMSAtNDAyLjUzKSIvPjwvc3ZnPg==';

		add_submenu_page(
			'fancypost-init',
			'Block to Shortcode',
			'Block to Shortcode',
			'manage_options',
			'edit.php?post_type=frhdfp_blocks'
		);

		add_submenu_page(
			'fancypost-init',
			'+ Add Block',
			'+ Add Block',
			'manage_options',
			'post-new.php?post_type=frhdfp_blocks'
		);

		add_menu_page(
			__( 'FancyPost', 'post-block' ),
			__( 'FancyPost', 'post-block' ),
			'manage_options',
			'fancypost-init',
			array( $this, 'fancypost_getting_started' ),
			$frhdfp_custom_menu_icon,
			5
		);
	}

	/**
	 * Getting Started admin page.
	 */
	public function fancypost_getting_started() {

		include_once POST_BLOCK_DIR . 'admin/partials/page-getting-started.php';
	}

	/**
	 * Add action links.
	 *
	 * @param Array $actions Get all action links.
	 * @param Sting $plugin_file Get all plugin file paths.
	 * @return Array
	 */
	public function frhdfp_add_action_plugin( $actions, $plugin_file ) {

		static $plugin;

		if ( ! isset( $plugin ) ) {

			$plugin = FPPB_BASE_FILE;
		}

		if ( $plugin == $plugin_file ) {

			$site_link = array( 'support' => '<a href="https://pluginic.com/support/?ref=100" target="_blank">Support</a>' );
			$settings  = array( 'settings' => '<a href="' . esc_url( get_admin_url() . 'admin.php?page=fancypost-init' ) . '">' . __( 'Get Started', 'General' ) . '</a>' );

			// Add link before Deactivate.
			$actions = array_merge( $site_link, $actions );
			$actions = array_merge( $settings, $actions );

			// Add link after Deactivate.
			if ( 'ESSENTIAL' === FPPB_COPY ) {

				$actions[] = '<a href="https://pluginic.com/plugins/gutenberg-post-blocks/?ref=100">' . __( '<br><svg style="width: 14px;height: 14px;margin-bottom: -2px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="#4caf50" d="M35 19c0-2.062-.367-4.039-1.04-5.868-.46 5.389-3.333 8.157-6.335 6.868-2.812-1.208-.917-5.917-.777-8.164.236-3.809-.012-8.169-6.931-11.794 2.875 5.5.333 8.917-2.333 9.125-2.958.231-5.667-2.542-4.667-7.042-3.238 2.386-3.332 6.402-2.333 9 1.042 2.708-.042 4.958-2.583 5.208-2.84.28-4.418-3.041-2.963-8.333C2.52 10.965 1 14.805 1 19c0 9.389 7.611 17 17 17s17-7.611 17-17z"/><path fill="#cddc39" d="M28.394 23.999c.148 3.084-2.561 4.293-4.019 3.709-2.106-.843-1.541-2.291-2.083-5.291s-2.625-5.083-5.708-6c2.25 6.333-1.247 8.667-3.08 9.084-1.872.426-3.753-.001-3.968-4.007C7.352 23.668 6 26.676 6 30c0 .368.023.73.055 1.09C9.125 34.124 13.342 36 18 36s8.875-1.876 11.945-4.91c.032-.36.055-.722.055-1.09 0-2.187-.584-4.236-1.606-6.001z"/></svg><span style="font-weight: bold;color: #4caf50;"> Go Pro</span>', 'General' ) . '</a>';
			}
		}

		return $actions;
	}

}
