<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_fpblock_backup';

//
// Create options
//
FPBLOCK::createOptions(
	$prefix,
	array(
		'menu_title'         => '皿 Backup',
		'menu_slug'          => 'fancypost_backup',
		'menu_type'          => 'submenu',
		'menu_parent'        => 'fancypost-init',
		'sticky_header'      => false,
		'show_bar_menu'      => false,
		'show_search'        => false,
		'show_network_menu'  => false,
		'show_reset_section' => false,
		'show_reset_all'     => false,
		'save_defaults'      => false,
		'menu_position'      => 5,
		'theme'              => 'light',
		'footer_credit'      => '',
		'show_footer'        => false,
	)
);

//
// Global Settings.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'fields' => array(

			array(
				'type'     => 'callback',
				'function' => 'fpblock_backup_callback',
			),
		),
	),
);

function fpblock_backup_callback() {
	?>
	<style>
	/* Hide all notices & other sections except the framework body && Display none */
	div#wpbody-content > *:not(.fpblock.fpblock-options),
	[id*="notice"], [class*="notice"], [class*="error"] {
		display: none !important;
	}
	.frhd-dashboard-nav nav a[href^="<?php echo admin_url(); ?>admin.php?page=fancypost_backup"] {
		background-color: #fff;
		border-color: #dfdbdb;
		box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
	}
	/* Form */
	.frhd-ie-wrapper h2 {
		font-size: 24px !important;
		font-weight: bold !important;
	}
	.frhd-ie-wrapper input[type="file"] {
		padding: 3px 0;
		cursor: pointer;
		border: 1px solid rgb(227 227 227);
		border-radius: 3px;
		color: rgb(100 116 139);
		margin-right: 7px;
	}
	span.frhd-nav-badge {
		color: #f18500;
		vertical-align: super;
		font-size: 9px;
		font-weight: 700;
		padding-left: 2px;
		margin-top: -10px;
	}
	.frhd-ie-form-wrapper {
		display: flex;
		gap: 20px;
		flex-wrap: wrap;
	}
	.frhd-import,
	.frhd-export{
		box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
		padding: 20px;
	}
	.frhd-ie-form-wrapper h4 {
		margin-bottom: 10px;
	}
	</style>
	<?php
	echo '<div class="frhd-ie-wrapper wrap">';
	echo '<h2>Block to Shortcode Import - Export</h2>';
	echo '<p style="max-width: 500px;">Easily import and export all your shortcodes with just a few clicks. Transfer blocks effortlessly to simplify your workflow. Ensure smooth integration and management of your content.</p>';
	echo '<div class="frhd-ie-form-wrapper">';
	
	// Import Form.
	echo '<div class="frhd-import">';
	echo '<form method="post" enctype="multipart/form-data">';
	echo '<h4>Import all Shortcode:</h4>';
	echo '<input type="file" name="custom_import_file" />';
	echo '<input type="submit" class="button button-primary" name="custom_import_submit" value="Import" />';
	echo '</form>';

	// Handle Import Process.
	if ( isset( $_POST['custom_import_submit'] ) && ! empty( $_FILES['custom_import_file']['tmp_name'] ) ) {
		$file = $_FILES['custom_import_file']['tmp_name'];
		$import_data = file_get_contents( $file );

		// Process the import data
		echo '<div class="frhd-ie-notifications">';
		if ( ! empty( $import_data ) ) {
			$imported_posts = json_decode( $import_data, true );

			if ( $imported_posts ) {

				foreach ( $imported_posts as $imported_post ) {
					$post_args = array(
						'post_title'   => $imported_post['title'],
						'post_content' => $imported_post['content'],
						'post_type'    => 'frhdfp_blocks', // Ensure the correct post type
						'post_status'  => 'publish', // Set post status as needed
					);

					// Check if post already exists by title
					$existing_post_query = new WP_Query( array(
						'post_type'      => 'frhdfp_blocks',
						'post_title'     => $imported_post['title'],
						'posts_per_page' => 1,
					) );

					if ( $existing_post_query->have_posts() ) {
						$existing_post = $existing_post_query->post;
						// Update existing post
						$post_args['ID'] = $existing_post->ID;
						wp_update_post( $post_args );
					} else {
						// Create new post
						wp_insert_post( $post_args );
					}
				}
				echo '<p style="color: green;margin-top: 10px;">Import successful!</p>';
			} else {
				echo 'Error: Failed to decode import data.';
			}
		} else {
			echo 'Error: No data found in the import file.';
		}
		echo '</div>';
	}
	echo '</div>';

	// Create Export Functionality.
	echo '<div class="frhd-export" style="align-self: baseline;">
	<h4>Export all Shortcode:</h4>';
	echo '<a class="button button-primary" href="' . admin_url( 'admin-ajax.php?action=shortcode_export' ) . '">Export</a>';
	echo '</div>
		</div>
	</div>';
}

/**
 * Handle The Shortcode Export.
 */
function handle_block_shortcode_export() {

	// Fetch data for the post type.
	$posts = get_posts(
		array(
			'post_type'   => 'frhdfp_blocks',
			'numberposts' => -1,
		)
	);

	// Prepare export data
	$export_data = array();
	foreach ( $posts as $post ) {
		$export_data[] = array(
			'title'   => $post->post_title,
			'content' => $post->post_content,
		);
	}

	// Convert data to JSON format
	$export_json = json_encode( $export_data );

	// Filename with timestamp
	$filename = 'frhdfp_blocks_backup_' . current_time('timestamp') . '.json';

	// Set headers for file download
	header( 'Content-Type: application/json' );
	header( 'Content-Disposition: attachment; filename="' . $filename . '"' );
	header( 'Expires: 0' );
	header( 'Cache-Control: must-revalidate' );
	header( 'Pragma: public' );

	// Output JSON content for download
	echo $export_json;

	// Terminate script
	wp_die();
}
add_action( 'wp_ajax_shortcode_export', 'handle_block_shortcode_export' );
