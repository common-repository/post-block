<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_fpblock_options';

//
// Create options
//
FPBLOCK::createOptions(
	$prefix,
	array(
		'menu_title'         => 'Settings',
		'menu_slug'          => 'fancypost_opt',
		'menu_type'          => 'submenu',
		'menu_parent'        => 'fancypost-init',
		'sticky_header'      => false,
		'show_bar_menu'      => false,
		'show_search'        => true,
		'show_network_menu'  => false,
		'show_reset_section' => false,
		'menu_position'      => 5,
		'theme'              => 'light',
		'footer_credit'      => __( 'Giving a <a href="https://wordpress.org/plugins/" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating to this plugin.', 'post-block' ),
		'class'              => ( 'PRESTIGE' === FPPB_COPY ) ? 'frhd-fp-copy-pro' : 'frhd-fp-copy-lite',
	)
);

//
// Global Settings.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'title'  => 'Global Settings',
		'icon'   => 'fas fa-cogs',
		'fields' => array(
			//
			// Custom CSS for this page.
			//
			array(
				'type'    => 'content',
				'content' => '<style>
				.fpblock-field.fpblock-content-style-tag {
					display: none !important;
				}
				/* Switcher Box */
				.fpblock-field.fpblock-field-switcher_box {
					position: relative;
					display: inline-block;
					max-width: calc(33.333% - 90px);
					box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
					border-radius: 5px;
					margin: 20px;
					padding: 25px 25px 10px;
					background: #fff;
				}
				.fpblock--sb_title {
					display: flex;
					align-items: center;
					gap: 10px;
					margin-bottom: 20px;
				}
				.fpblock--sb_title span {
					font-size: 15px;
					font-weight: 500;
				}
				.fpblock--sb_s_desc {
					color: #7e7e7e;
				}
				.fpblock--sb_btm {
					display: flex;
					justify-content: space-between;
					align-items: center;
				}
				.fpblock--sources ul,
				.fpblock--sources ul li a {
					display: flex;
					align-items: center;
					gap: 5px;
				}
				.fpblock--sources ul {
					gap: 15px;
				}
				.fpblock--sources ul li a svg {
					fill: #3c434a;
				}
				.fpblock--sources ul li a {
					text-decoration: none;
					color: #222;
				}
				.fpblock--sources ul li a:hover {
					text-decoration: underline;
				}
				.fpblock--sb_inner {
					border-bottom: 1px solid #e7e7e7;
					margin-bottom: 10px;
					padding-bottom: 20px;
				}

				/* Badges */
				.fpblock--sbn:after {
					position: absolute;
					right: 0;
					top: 0;
					background: rgb(96 125 139 / 25%);
					border-color: rgb(96 125 139 / 40%);
					color: #607D8B;
					border: 1px solid rgb(96 125 139 / 40%);
					content: attr(badge-title);
					text-transform: uppercase;
					border-bottom-left-radius: 3px;
					display: inline-block;
					padding: 6px 7px;
					font-size: 10px;
					line-height: 10px;
					font-weight: bold;
				}
				.frhd-fp-copy-lite .fpblock--sb_wrap.fpblock--sbb-pro:after {
					background: rgb(233 30 99 / 25%);
					border-color: rgb(233 30 99 / 40%);
					color: #E91E63;
				}
				.fpblock--sb_wrap.fpblock--sbb-new:after {
					background: rgb(103 58 183 / 25%);
					border-color: rgb(103 58 183 / 40%);
					color: #673AB7;
				}
				/* Separator */
				.fpblock-field.fpblock-field-content.fpblock-content-separator {
					padding: 10px;
				}

				/* Inline Fieldset Field */
				.fpblock-field.fpblock-field-fieldset.fpblock-fieldset-inline .fpblock-fieldset .fpblock-fieldset-content {
					border: 0;
					display: flex;
					align-items: center;
					box-shadow: 0 0;
					gap: 15px;
				}
				.fpblock-field.fpblock-field-fieldset.fpblock-fieldset-inline .fpblock-field {
					width: fit-content;
					padding: 0;
					border: 0;
				}
				/* PRO Tags */
				.fpblock-field-switcher.fpblock-field-switcher-pro {
					background-color: rgb(156 39 176 / 7%);
				}
				.frhd-fp-copy-lite .fpblock-field-switcher-pro .fpblock-fieldset,
				.frhd-fp-copy-lite .fpblock-field-button_set-pro .fpblock--button-group,
				.frhd-fp-copy-lite .fpblock-field-image_select-pro .fpblock--image {
					position: relative;
				}
				.frhd-fp-copy-lite .fpblock-field-switcher-pro .fpblock-fieldset:before,
				.frhd-fp-copy-lite .fpblock-field-button_set-pro .fpblock--button-group:before,
				.frhd-fp-copy-lite .fpblock-field-select-pro .fpblock-fieldset .chosen-container:before {
					position: absolute;
					left: 2px;
					top: -20px;
					width: 32px;
					background: transparent;
					content: "PRO";
					color: #9c27b0;
					font-weight: bold;
					border: 2px solid #9c27b0;
					text-align: center;
					border-top-left-radius: 3px;
					border-top-right-radius: 3px;
				}
				.frhd-fp-copy-lite .fpblock-field-switcher-pro .fpblock--switcher {
					background: #9c27b0;
					pointer-events: none;
				}
				.frhd-fp-copy-lite .fpblock-field-button_set-pro .fpblock--button-group,
				.frhd-fp-copy-lite .fpblock-field-select-pro,
				.frhd-fp-copy-lite .fpblock-field-image_select-pro .fpblock--image-group {
					pointer-events: none;
				}
				.frhd-fp-copy-lite .fpblock-field-button_set-pro .fpblock--active {
					border-color: #9c27b0;
					background-color: #9c27b0;
				}
				.frhd-fp-copy-lite .fpblock-field-select-pro .fpblock-fieldset ul.chosen-choices {
					outline: 2px solid #9c27b0;
				}
				.frhd-fp-copy-lite .fpblock-field-select-pro li.search-choice {
					background: #9c27b0 !important;
					color: #fff !important;
				}
				.frhd-fp-copy-lite .fpblock-field-image_select-pro .fpblock--image:not(:first-child):after {
					position: absolute;
					right: 0;
					top: 0;
					width: 32px;
					background-color: #9c27b0;
					content: "PRO";
					color: #fff;
					font-weight: bold;
					border: 2px solid #9c27b0;
					text-align: center;
				}
				.frhd-fp-copy-lite .fpblock--sbb-pro .fpblock--switcher {
					pointer-events: none;
					opacity: .5;
				}
				.frhd-fp-copy-lite .fpblock-field-code-editor-pro {
					position: relative;
					pointer-events: none;
					background-color: rgb(156 39 176 / 7%);
				}
				.frhd-fp-copy-lite .fpblock-field-code-editor-pro:before {
					position: absolute;
					left: 0;
					top: 0px;
					width: 32px;
					background: #9c27b0;
					content: "PRO";
					color: #fff;
					font-weight: bold;
					border: aliceblue;
					text-align: center;
				}
				/* Others */
				.fpblock-theme-light .fpblock-nav-normal > ul li a[href="#tab=unlock-all-features"] {
					background: #E91E63;
					color: #fff;
				}
				.fpblock-field.fpblock-field-content.fpblock-field-switcher_box {
					background-image: linear-gradient(to bottom, #1C7CE0, #150051);
					color: #fff;
				}
				.fpblock-field-select.fpblock-field-mw-350 .chosen-container {
					max-width: 350px;
				}
				/* Responsive */
				@media (max-width: 1280px) {
					.fpblock-field.fpblock-field-switcher_box {
						max-width: calc(50% - 90px) !important;
					}
				}
				@media (max-width: 980px) {
					.fpblock-field.fpblock-field-switcher_box {
						max-width: 100% !important;
					}
				}
				</style>
				<script>
				(function ($) {
				$(document).ready(function(){
					$(\'a[href="#tab=block-to-shortcode"]\').click(function(e){
						e.preventDefault();
						window.location.href = window.location.origin + "/wp-admin/edit.php?post_type=frhdfp_blocks";
					});
					$(\'a[href="#tab=license"]\').click(function(e){
						e.preventDefault();
						window.location.href = window.location.origin + "/wp-admin/admin.php?page=fancypost_license";
					});
					$(\'a[href="#tab=backup"]\').click(function(e){
						e.preventDefault();
						window.location.href = window.location.origin + "/wp-admin/admin.php?page=fancypost_backup";
					});
					$(\'a[href="#tab=recommended"]\').click(function(e){
						e.preventDefault();
						window.location.href = window.location.origin + "/wp-admin/admin.php?page=fancypost_pseo";
					});
					$(\'a[href="#tab=help"]\').click(function(e){
						e.preventDefault();
						window.location.href = window.location.origin + "/wp-admin/admin.php?page=fancypost_help";
					});
					$(\'a[href="#tab=unlock-all-features"]\').click(function(e){
						e.preventDefault();
						window.location.href = window.location.origin + "/wp-admin/admin.php?page=fancypost_features";
					});
				});
				})(jQuery);
				</script>',
				'class'   => 'fpblock-content-style-tag',
			),

			//
			// Fields.
			//
			array(
				'id'       => 'fpblock_load_asset_globally',
				'type'     => 'switcher',
				'title'    => 'Load Assets Globally',
				'subtitle' => 'Load FancyPost assets site-wide.',
				'default'  => false,
			),
			array(
				'id'       => 'fpblock_default_max_width',
				'type'     => 'dimensions',
				'title'    => 'Default Maximum Width',
				'subtitle' => 'Default maximum width from blocks settings.',
				'height'   => false,
				'default'  => array(
				  'width'  => '1200',
				  'unit'   => 'px',
				),
			),
			array(
				'id'       => 'fpblock_heart_react_enable',
				'type'     => 'switcher',
				'title'    => '<svg style="width: 25px;height: 22px;margin-bottom: -6px;padding-right: 5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 114.86 90"><defs></defs><path fill="#5E30CC" d="M276.55,330.38a38.43,38.43,0,0,1-6-8.64,21.93,21.93,0,0,1-2.3-7.44A16.19,16.19,0,0,1,280,296.6H209.92a9.67,9.67,0,0,0-9.64,9.64V377a9.67,9.67,0,0,0,9.64,9.64h70.72a9.67,9.67,0,0,0,9.64-9.64v-34.6A78.6,78.6,0,0,1,276.55,330.38Zm-51.72-25.61a7.06,7.06,0,0,1,7.11,7,7.12,7.12,0,0,1-14.24.18A7.07,7.07,0,0,1,224.83,304.77Zm8.54,73.67H218.1v-4h15.27Zm18.48-9.65H218.1v-2.41h33.75Zm20.9-4.82H218.1v-2.41h54.65Zm0-4.82H218.1v-2.41h54.65Zm0-6.43H218.1v-4h54.65Zm-54.52-11.25c6-6.27,11.75-12.29,17.7-18.53l5.81,6.49c4.11-5.8,7.86-11.12,11.78-16.65,6.47,9.61,12.84,19.05,19.34,28.69Zm96.4-32.53a10.36,10.36,0,0,0-14.52-6.16,14.29,14.29,0,0,0-3.22,2.4,12.76,12.76,0,0,0-2.43,2.61,9.67,9.67,0,0,0-.92-1.11,41.55,41.55,0,0,0-3.11-2.83,9.89,9.89,0,0,0-8.58-1.91,10.5,10.5,0,0,0-8,11.71,16.82,16.82,0,0,0,1.75,5.58,33.28,33.28,0,0,0,5.17,7.39,74.32,74.32,0,0,0,13.44,11.6.4.4,0,0,0,.53,0,79.58,79.58,0,0,0,9.24-7.34,50.81,50.81,0,0,0,7.05-7.82,23.9,23.9,0,0,0,3.46-6.62A12.31,12.31,0,0,0,314.63,308.94Z" transform="translate(-200.28 -296.6)"/></svg>Heart React Enable',
				'subtitle' => 'Enable Heart React only for Post Grid Block.',
				'default'  => false,
				'class'    => 'fpblock-field-switcher-pro',
			),
			array(
				'id'         => 'fpblock_preloader_style',
				'type'       => 'radio',
				'title'      => 'Preloader Style',
				'subtitle'   => 'Preloader style in editor page.',
				'options'    => array(
				  'style-1' => 'Style 1',
				  'style-2' => 'Style 2',
				),
				'default'    => 'style-2'
			),
			array(
				'id'       => 'fpblock_all_cookies_disable',
				'type'     => 'switcher',
				'title'    => 'Disable All Cookies',
				'subtitle' => 'Disable all frontend cookies (Cookies used for Post View Count).',
				'default'  => false,
			),
			array(
				'id'       => 'fpblock_all_cookies_disable',
				'type'     => 'switcher',
				'title'    => 'Disable All Google Fonts',
				'subtitle' => 'Disable all Google fonts from frontend and backend FancyPost Blocks.',
				'default'  => false,
			),
			array(
				'id'       => 'fpblock_css_for_editor_page',
				'type'     => 'code_editor',
				'before'   => 'CSS For Editor Page<br>Styles are only working on editor page.',
				'settings' => array(
				  'theme'  => 'mbo',
				  'mode'   => 'css',
				),
				'default'  => '/**
 * Custom CSS gives you the flexibility to customize the look,
 * and you can write your custom css in here.
 * This is a premium feature & you need to PRO version for this feature.
 */',
				'class'    => 'fpblock-field-code-editor-pro',
			),
		),
	),
);

//
// Block To Shortcode.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'title'  => 'Block To Shortcode',
		'icon'   => 'fas fa-code',
	)
);

//
// Block Settings.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'title'  => 'Blocks',
		'icon'   => 'fas fa-shapes',
		'fields' => array(

			array(
				'id'         => 'fpblock_block_disable_allowed',
				'type'       => 'switcher',
				'title'      => 'Allowed to Disable Blocks',
				// 'subtitle'   => '',
				'subtitle'   => '<span style="display: block;color: #F44336;min-width: 600px;margin-top: 20px;">If you unregister any blocks from here, sometimes other plugin\'s blocks may be missing. This occurs because wp_block_type_registry is not being used properly. Check the documentation here if you are proficient in coding: <a href="https://developer.wordpress.org/reference/classes/wp_block_type_registry/get_all_registered/" target="_blank">WP_Block_Type_Registry::get_all_registered()</a><br>So, only Allowed this if your site is not having compatibility issues or instructed to by support.</span>',
				'text_on'    => 'Allowed',
  				'text_off'   => 'Disallowed',
				'text_width' => 110,
				'default'    => false,
			),
			array(
				'type'    => 'subheading',
				'content' => 'Post Blocks<br><span style="font-weight: 100;color: #7e7e7e;margin-top: 3px;display: inline-block;">Blocks are directly involved with post query.</span>',
			),
			array(
				'id'         => 'fpblock_block_post_grid',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 91.15 90" fill="#5E30CC"><defs></defs><path d="M301.19,296.6H267.34a4.63,4.63,0,0,0-4.61,4.62v33.84a4.63,4.63,0,0,0,4.61,4.62h33.85a4.63,4.63,0,0,0,4.62-4.62V301.22A4.63,4.63,0,0,0,301.19,296.6Zm-26.71,3.91a3.39,3.39,0,0,1,3.41,3.35,3.41,3.41,0,0,1-6.82.09A3.38,3.38,0,0,1,274.48,300.51Zm4.09,35.26h-7.31v-1.92h7.31Zm8.85-4.61H271.26V330h16.16Zm10-2.31H271.26v-1.16h26.16Zm0-2.31H271.26v-1.15h26.16Zm0-3.08H271.26v-1.92h26.16Zm-26.1-5.38c2.87-3,5.62-5.89,8.48-8.87l2.77,3.11,5.64-8,9.26,13.73ZM253.11,296.6H219.27a4.63,4.63,0,0,0-4.62,4.62v33.84a4.63,4.63,0,0,0,4.62,4.62h33.84a4.63,4.63,0,0,0,4.62-4.62V301.22A4.63,4.63,0,0,0,253.11,296.6Zm-26.71,3.91a3.39,3.39,0,0,1,3.41,3.35A3.41,3.41,0,0,1,223,304,3.39,3.39,0,0,1,226.4,300.51Zm4.09,35.26h-7.31v-1.92h7.31Zm8.85-4.61H223.18V330h16.16Zm10-2.31H223.18v-1.16h26.16Zm0-2.31H223.18v-1.15h26.16Zm0-3.08H223.18v-1.92h26.16Zm-26.1-5.38,8.48-8.87,2.78,3.11,5.63-8,9.26,13.73Zm29.87,25.44H219.27a4.63,4.63,0,0,0-4.62,4.62V382a4.63,4.63,0,0,0,4.62,4.61h33.84a4.63,4.63,0,0,0,4.62-4.61V348.14A4.63,4.63,0,0,0,253.11,343.52Zm-26.71,3.91a3.39,3.39,0,0,1,3.41,3.36,3.41,3.41,0,0,1-6.82.08A3.4,3.4,0,0,1,226.4,347.43Zm4.09,35.26h-7.31v-1.92h7.31Zm8.85-4.61H223.18v-1.15h16.16Zm10-2.31H223.18v-1.15h26.16Zm0-2.31H223.18v-1.15h26.16Zm0-3.07H223.18v-1.93h26.16ZM223.24,365l8.48-8.87,2.78,3.11,5.63-8L249.39,365Zm77.95-21.48H267.34a4.63,4.63,0,0,0-4.61,4.62V382a4.63,4.63,0,0,0,4.61,4.61h33.85a4.63,4.63,0,0,0,4.62-4.61V348.14A4.63,4.63,0,0,0,301.19,343.52Zm-26.71,3.91a3.39,3.39,0,0,1,3.41,3.36,3.41,3.41,0,0,1-6.82.08A3.39,3.39,0,0,1,274.48,347.43Zm4.09,35.26h-7.31v-1.92h7.31Zm8.85-4.61H271.26v-1.15h16.16Zm10-2.31H271.26v-1.15h26.16Zm0-2.31H271.26v-1.15h26.16Zm0-3.07H271.26v-1.93h26.16ZM271.32,365l8.48-8.87,2.77,3.11,5.64-8L297.47,365Z" transform="translate(-214.65 -296.6)" /></svg><span>Post Grid</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Create beautiful grids to display your posts. Customize layouts and styles easily. Enhance your site\'s visual appeal.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_post_grid_interactive',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 69.9 69.02"><path d="M63.34,0H6.56C2.93,0,0,2.93,0,6.56v55.9c0,3.63,2.93,6.56,6.56,6.56h56.78c3.63,0,6.56-2.93,6.56-6.56V6.56c0-3.63-2.93-6.56-6.56-6.56ZM57.63,14.74c1.27-.52,2.54-1.03,3.8-1.54.38-.15.73-.15,1.02.15.23.24.28.54.16.85-.11.26-.31.4-.56.5-1.27.51-2.53,1.03-3.81,1.54-.58.23-1.01.08-1.2-.39-.19-.46.02-.88.59-1.11ZM52.4,10.19c.52-1.26,1.06-2.52,1.6-3.78.2-.48.56-.72,1.09-.55.47.15.63.64.41,1.19-.26.65-.54,1.28-.81,1.92-.26.62-.52,1.25-.79,1.86-.27.58-.66.76-1.13.56-.48-.21-.62-.61-.37-1.2ZM44.1,5.88c.25-.23.53-.28.84-.16.27.1.41.31.51.56.52,1.29,1.04,2.57,1.56,3.86.2.5.09.92-.42,1.13-.51.22-.88-.03-1.08-.52-.53-1.31-1.06-2.61-1.58-3.92-.14-.35-.12-.68.17-.95ZM43.56,30.59c.56-1.32,1.12-2.63,1.68-3.95.21-.48.59-.62,1.06-.47.44.14.6.63.4,1.14-.27.66-.56,1.32-.84,1.98,0,0,0-.01-.01-.01-.27.64-.54,1.28-.81,1.92-.22.5-.58.71-1.09.48-.49-.22-.58-.62-.39-1.09ZM36.65,13.2c.24-.53.67-.57,1.14-.37,1.28.53,2.56,1.08,3.84,1.62.48.21.7.58.53,1.1-.15.45-.65.61-1.2.39-.63-.25-1.24-.53-1.86-.79-.64-.27-1.28-.53-1.92-.81-.56-.26-.75-.66-.53-1.14ZM37.06,22.87c1.28-.53,2.57-1.05,3.85-1.57.36-.15.7-.08.97.18.23.23.29.53.16.82-.11.29-.31.43-.57.53-1.27.51-2.53,1.02-3.8,1.53-.6.23-1,.1-1.2-.38-.19-.47,0-.87.59-1.11ZM18.91,14.02l6.06,11.18,2.94-3.45,6.14,6.14-1.36,1.37-4.67-4.67-3.4,4-5.88-10.83-7.5,11.34-1.6-1.06,9.27-14.02ZM20.16,57.53h-10.52v-2.81h10.52v2.81ZM32.44,50.85H9.64v-1.75h22.8v1.75ZM46.83,47.7H9.64v-1.75h37.19v1.75ZM46.83,44.19H9.64v-1.75h37.19v1.75ZM46.83,39.98H9.64v-2.8h37.19v2.8ZM68.37,24.53c-1.81.59-3.61,1.18-5.54,1.8v1.02c1.91,2.12,3.71,4.14,5.55,6.13.48.53.52.82-.06,1.31-1.33,1.12-2.62,2.27-3.86,3.47-.49.48-.75.4-1.17-.08-.15-.17-.3-.35-.46-.52-1.37-1.55-2.76-3.08-4.14-4.62-.37-.42-.74-.85-1.12-1.26-.5-.57-.67-.5-.94.16-.75,1.78-1.54,3.55-2.33,5.32-.14.32-.22.74-.69.67-.39-.06-.38-.47-.46-.75-2.08-7.15-4.15-14.29-6.22-21.43-.08-.3-.29-.63.01-.9.3-.27.61-.04.89.07,3.62,1.48,7.23,2.94,10.86,4.43,1.38.56,2.76,1.13,4.14,1.69,1.89.77,3.77,1.54,5.66,2.32.3.11.77.13.7.63-.07.44-.5.44-.82.54Z"/></svg><span>Post Grid Interactive</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => ( 'ESSENTIAL' === FPPB_COPY ) ? 'pro' : '',
				'short_desc' => 'Add interactive hover effects to your grids. Engage your audience with animations. Make your content stand out.',
				'default'    => ( 'PRESTIGE' === FPPB_COPY ) ? true : false,
			),
			array(
				'id'         => 'fpblock_block_post_list',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M4.24,12.09c-.06.06-.11.09-.19.09-.35-.01-.7-.01-1.04-.01-.02-.02-.01-.03,0-.04.29-.3.56-.61.86-.9.37-.38.88-.41,1.3-.08-.35.28-.62.63-.93.94ZM6.16,11.28c-.31-.25-.73-.22-1.02.05-.27.26-.53.54-.8.84h2.73c-.32-.31-.58-.64-.91-.89ZM4.34,10.56c.21,0,.38-.18.38-.39s-.17-.39-.38-.39-.39.18-.39.39.17.39.39.39ZM6.16,5.31c-.31-.25-.73-.22-1.02.05-.27.26-.53.54-.8.84h2.73c-.32-.31-.58-.64-.91-.89ZM4.34,4.58c.21,0,.38-.17.38-.38s-.17-.39-.38-.39-.39.17-.39.39.17.38.39.38ZM16,1.46v13.08c0,.81-.65,1.46-1.45,1.46H1.47C.65,16,0,15.35,0,14.54V1.46C0,.65.65,0,1.47,0h13.06c.8,0,1.47.65,1.47,1.46ZM7.72,9.04c0-.33-.27-.6-.59-.6h-3.91c-.32,0-.59.27-.59.6v3.9c0,.33.27.59.59.59h3.91c.32,0,.59-.26.59-.59v-3.9ZM7.72,3.07c0-.33-.27-.6-.59-.6h-3.91c-.32,0-.59.27-.59.6v3.9c0,.33.27.59.59.59h3.91c.32,0,.59-.26.59-.59v-3.9ZM13.36,10.92c-.03-.28-.13-.5-.27-.5h-4.36c-.17,0-.29.21-.29.54,0,.35.1.56.27.56.04.03.05.03.08.03,1.39,0,2.81,0,4.22-.03.03,0,.08.03.13,0,.12-.1.22-.32.22-.6ZM13.36,4.95c-.03-.28-.13-.5-.27-.5h-4.36c-.17,0-.29.21-.29.54,0,.35.1.56.27.56.04.03.05.03.08.03,1.39,0,2.81,0,4.22-.03.03,0,.08.03.13,0,.12-.1.22-.32.22-.6ZM5.17,5.18c-.42-.33-.93-.3-1.3.08-.3.29-.57.6-.86.9-.01.01-.02.02,0,.04.34,0,.69,0,1.04,0,.08,0,.13-.03.19-.09.31-.31.58-.66.93-.94Z"/></svg><span>Post List</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Show your posts in a simple, clean list. Perfect for blogs and news sites. Keep your content organized and easy to read.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_post_trisect',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 137.92 90"><path d="M319.68,296.5H286.05a4.59,4.59,0,0,0-4.58,4.58v33.63a4.59,4.59,0,0,0,4.58,4.59h33.63a4.6,4.6,0,0,0,4.59-4.59V301.08A4.59,4.59,0,0,0,319.68,296.5Zm-26.54,3.88a3.37,3.37,0,0,1,3.39,3.33,3.39,3.39,0,0,1-6.78.09A3.37,3.37,0,0,1,293.14,300.38Zm4.07,35H290v-1.91h7.26Zm8.79-4.59H290v-1.14H306Zm9.93-2.29H290v-1.15h26Zm0-2.29H290V325.1h26Zm0-3.06H290v-1.91h26ZM290,317.84c2.84-3,5.58-5.85,8.42-8.81l2.75,3.08,5.61-7.91,9.2,13.64Zm29.67,25.79H286.05a4.6,4.6,0,0,0-4.58,4.59v33.63a4.59,4.59,0,0,0,4.58,4.58h33.63a4.59,4.59,0,0,0,4.59-4.58V348.22A4.6,4.6,0,0,0,319.68,343.63Zm-26.54,3.88a3.37,3.37,0,0,1,3.39,3.34,3.39,3.39,0,0,1-6.78.08A3.37,3.37,0,0,1,293.14,347.51Zm4.07,35H290v-1.91h7.26ZM306,378H290v-1.15H306Zm9.93-2.3H290v-1.14h26Zm0-2.29H290v-1.15h26Zm0-3.06H290v-1.91h26ZM290,365l8.42-8.81,2.75,3.09,5.61-7.92c3.08,4.57,6.1,9.06,9.2,13.64Zm-23.3-68.47H196a9.67,9.67,0,0,0-9.64,9.64v70.71A9.67,9.67,0,0,0,196,386.5h70.72a9.67,9.67,0,0,0,9.64-9.65V306.14A9.67,9.67,0,0,0,266.71,296.5Zm-55.81,8.16a7.08,7.08,0,0,1,7.12,7,7.13,7.13,0,0,1-14.25.17A7.08,7.08,0,0,1,210.9,304.66Zm8.55,73.68H204.18v-4h15.27Zm18.48-9.65H204.18v-2.41h33.75Zm20.89-4.82H204.18v-2.41h54.64Zm0-4.82H204.18v-2.41h54.64Zm0-6.43H204.18v-4h54.64ZM204.3,341.37,222,322.84l5.8,6.49,11.78-16.65,19.34,28.69Z" transform="translate(-186.35 -296.5)" /></svg><span>Post Trisect</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Display posts in a three-column layout. Ideal for highlighting multiple articles. Achieve a balanced, modern look.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_post_slider',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 125.45 90"><path d="M217.83,343.6c.09-.46.13-.93.19-1.39v-1.42c0-.07,0-.13,0-.2a11.16,11.16,0,0,0-1.38-4.76,11.86,11.86,0,0,0-10.15-6.39,11.19,11.19,0,0,0-6.66,1.69,11.84,11.84,0,0,0-5.9,9.86,11.16,11.16,0,0,0,1.4,6.17,11.86,11.86,0,0,0,8.55,6.22c.46.09.93.13,1.4.19h1.41l.19,0a11.09,11.09,0,0,0,4.23-1.1A11.93,11.93,0,0,0,217.83,343.6Zm-7.89,4.18-1.2,1.2-.61-.62L202,342.22a.85.85,0,0,1-.34-.83,1.44,1.44,0,0,1,.35-.61c2.19-2.21,4.4-4.41,6.6-6.61a1.29,1.29,0,0,1,.17-.16l1.24,1.23-6.31,6.31Zm81.5-3.49c-.11-.61-.16-1.23-.24-1.85v-1.88c0-.1,0-.19.05-.28a14.67,14.67,0,0,1,1.83-6.31,15.91,15.91,0,0,1,7.57-7.11V306.14A9.67,9.67,0,0,0,291,296.5H220.29a9.66,9.66,0,0,0-9.64,9.64v19.62a15.63,15.63,0,0,1,9.5,7.81,14.72,14.72,0,0,1,1.83,6.32,2.61,2.61,0,0,0,.06.27V342c-.08.61-.14,1.24-.25,1.85a15.84,15.84,0,0,1-9,11.73,13.53,13.53,0,0,1-2.15.85v20.38a9.67,9.67,0,0,0,9.64,9.65H291a9.68,9.68,0,0,0,9.65-9.65V356.11l-.21-.09A15.87,15.87,0,0,1,291.44,344.29Zm-56.25-39.64a7.08,7.08,0,0,1,7.12,7,7.12,7.12,0,0,1-14.24.17A7.07,7.07,0,0,1,235.19,304.65Zm8.55,73.68H228.47v-4h15.27Zm18.48-9.64H228.47v-2.41h33.75Zm20.89-4.82H228.47v-2.41h54.64Zm0-4.82H228.47v-2.41h54.64Zm0-6.43H228.47v-4h54.64ZM228.6,341.37l17.7-18.53,5.8,6.49c4.12-5.81,7.87-11.12,11.78-16.65,6.48,9.6,12.84,19.05,19.34,28.69Zm90.7-.38a11.83,11.83,0,0,0-5.91-9.86,11.18,11.18,0,0,0-6.66-1.69,11.86,11.86,0,0,0-10.14,6.39,11,11,0,0,0-1.38,4.76c0,.07,0,.13,0,.2v1.42c.06.46.1.93.19,1.39a11.93,11.93,0,0,0,6.76,8.83,11.09,11.09,0,0,0,4.23,1.1l.18,0H308c.47-.06.94-.1,1.4-.19a11.86,11.86,0,0,0,8.55-6.22A11.25,11.25,0,0,0,319.3,341Zm-8.11,1.23q-3.07,3.06-6.14,6.14l-.6.62-1.2-1.2,6.23-6.23-6.31-6.31,1.24-1.23.17.16,6.6,6.61a1.44,1.44,0,0,1,.35.61A.85.85,0,0,1,311.19,342.22Z" transform="translate(-193.87 -296.5)" /></svg><span>Post Slider</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Create dynamic sliders for your top posts. Customize transitions and styles effortlessly. Provide a smooth browsing experience.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_ajax_and_filter',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 91.15 90"><path d="M82.85,0H8.3C3.72,0,0,3.72,0,8.3v73.4c0,4.58,3.72,8.3,8.3,8.3h74.55c4.58,0,8.3-3.72,8.3-8.3V8.3c0-4.58-3.72-8.3-8.3-8.3ZM71.47,17.66c-6.47,8.54-12.94,17.09-19.45,25.61-.99,1.28-1.47,2.54-1.45,4.19.09,6.74-.01,13.48.07,20.23.02,1.64-.55,2.62-1.95,3.38-1.91,1.04-3.74,2.24-5.61,3.36-.64.38-1.27,1.08-2.09.6-.82-.48-.46-1.4-.47-2.12-.02-8.61-.04-17.22.02-25.82,0-1.36-.35-2.43-1.18-3.51-6.36-8.31-12.67-16.66-19-25-.35-.46-.72-.9-1.04-1.38-.94-1.45-.53-2.31,1.2-2.35,2.25-.05,4.5-.02,6.75-.02h18.3c8.16,0,16.31,0,24.47.01.73,0,1.59-.26,2.09.6.54.95-.17,1.57-.66,2.22Z" /></svg><span>Ajax & Filter</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => ( 'ESSENTIAL' === FPPB_COPY ) ? 'pro' : '',
				'short_desc' => 'Add advanced filtering to your grids and lists. Let users sort posts easily with Ajax. Improve content accessibility and navigation.',
				'default'    => ( 'PRESTIGE' === FPPB_COPY ) ? true : false,
			),
			array(
				'type'    => 'subheading',
				'content' => 'Site Builder Blocks<br><span style="font-weight: 100;color: #7e7e7e;margin-top: 3px;display: inline-block;">Blocks are not directly involved with post query.</span>',
			),
			array(
				'id'         => 'fpblock_block_heading',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 91.15 90"><path d="M82.85,0H8.3C3.72,0,0,3.72,0,8.3v73.4c0,4.58,3.72,8.3,8.3,8.3h74.55c4.58,0,8.3-3.72,8.3-8.3V8.3c0-4.58-3.72-8.3-8.3-8.3ZM76.39,21.95c-.67.95-1.77.85-2.71,1.03-3.77.75-3.41.15-3.41,4.19-.01,12.24,0,24.47,0,36.71,0,2.36.01,2.32,2.29,2.84,1.3.3,2.75.17,3.83,1.21v7.07c-.34.22-.71.13-1.07.13-7.53,0-15.07-.01-22.6.02-.77,0-1.23-.16-1.43-.63-.09-.2-.12-.47-.1-.82.08-1.7-.14-3.41.07-5.11.03-.16.05-.33.08-.5h0v-.07c.3-.55.83-.67,1.37-.79,1.1-.23,2.2-.51,3.33-.67.99-.13,1.37-.67,1.37-1.65-.01-4.34.01-8.7-.01-13.04,0-1.34-.16-1.46-1.66-1.47-5.73-.02-11.45-.01-17.16-.01-1.19,0-2.36.02-3.54,0-.91-.01-1.33.36-1.32,1.29.01,4.44,0,8.88,0,13.32,0,.93.41,1.37,1.31,1.57,1.37.31,2.8.36,4.12.89.1.07.2.13.28.2h.01c.34.09.43.4.44.8.01,0,.01,0,.01.02,0,.06.02.12.02.19.07,1.82.06,3.62.01,5.43-.01.18-.03.33-.07.46h0c-.14.39-.46.59-1.03.59-7.89-.03-15.79,0-23.69-.02-.15,0-.25-.08-.38-.13v-7.07c.89-.95,2.16-.86,3.29-1.1,2.97-.67,2.83-.3,2.83-3.48V26.53c0-3.01.19-2.81-2.76-3.39-.7-.14-1.42-.29-2.13-.45-.49-.11-.97-.25-1.23-.74v-7.07c7.86,0,15.72.02,23.58-.03,1.11,0,1.37.32,1.32,1.36-.09,1.57-.03,3.16-.03,4.75,0,.45.09.92-.38,1.22.15.01.27,0,.36-.04-.05.05-.09.1-.15.15-1.32.67-2.8.72-4.21,1.01-1.08.24-1.54.74-1.53,1.85.02,4.58.02,9.15,0,13.74,0,1.06.45,1.42,1.47,1.41,6.9-.01,13.81-.01,20.72.01,1.11,0,1.53-.42,1.52-1.52-.03-4.53-.03-9.07,0-13.6.01-1.19-.5-1.69-1.62-1.9-1.38-.27-2.8-.35-4.09-.98-.07-.05-.13-.11-.17-.17.08.03.2.05.35.04-.47-.31-.36-.79-.36-1.23,0-1.58.06-3.17-.02-4.75-.07-1.04.21-1.36,1.31-1.35,7.85.05,15.71.03,23.56.03v7.07Z" /></svg><span>Heading</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Create eye-catching headings for your content. Customize fonts, sizes, and colors. Make your titles stand out.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_heading_effect',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M14.53,0H1.47C.65,0,0,.65,0,1.46v13.08c0,.81.65,1.46,1.47,1.46h13.08c.8,0,1.45-.65,1.45-1.46V1.46c0-.81-.67-1.46-1.47-1.46ZM10.14,4.89c.3-.3.59-.57.91-.83.16-.15.36-.18.55-.09.2.06.26.21.29.41,0,.12-.06.27-.19.36-.29.27-.58.53-.88.77-.25.24-.55.27-.77.06-.2-.21-.16-.45.09-.68ZM7.49,3.05c0-.24.23-.42.48-.42.26-.03.49.15.49.42.03.21.03.44.03.65v.59c-.03.3-.22.48-.48.51-.29,0-.52-.21-.52-.48v-1.27ZM4.22,4.06c.16-.18.42-.24.61-.06.39.32.78.68,1.14,1.04.06.05.06.11.06.2,0,.18-.1.33-.29.42-.19.09-.36.06-.52-.06-.35-.33-.71-.62-1.03-.95-.17-.18-.13-.42.03-.59ZM11.95,13.36h-3.03c-.1,0-.16,0-.18-.08-.02,0-.02-.04-.02-.09.02-.21-.02-.41,0-.6,0-.02,0-.03.02-.07.04-.06.1-.08.18-.1.15-.01.27-.07.41-.09.14-.02.18-.07.18-.2v-1.53c0-.17-.02-.17-.22-.17h-2.62c-.12,0-.18.04-.18.15v1.57c0,.13.06.16.18.18.16.04.34.08.51.11h.04s.04.04.04.1v.69s-.04.09-.1.09h-3.03s-.06-.02-.08-.02v-.84c.12-.13.26-.11.42-.15.37-.07.35-.02.35-.37v-4.32c0-.37.02-.35-.33-.41-.08,0-.18-.03-.28-.05-.04,0-.12-.02-.16-.1v-.83h3c.17,0,.21.03.19.14-.02.21,0,.4,0,.58,0,.06.02.09-.06.17h.04c-.17.09-.35.09-.55.11-.14.04-.2.11-.2.22v1.64c0,.13.06.17.2.17h2.62c.16,0,.2-.04.2-.19v-1.62c0-.11-.06-.2-.2-.22-.16-.02-.34-.02-.51-.09,0,0-.04-.13-.04-.19v-.58c0-.09.02-.14.16-.13h3.03v.82c-.08.13-.2.12-.3.13-.49.08-.45,0-.45.49v4.3s.04.48.41.37v.02c.14.04.26.05.36.13v.86Z"/></svg><span>Heading Effect</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'badge_name' => ( 'ESSENTIAL' === FPPB_COPY ) ? 'pro' : '',
				'short_desc' => 'Add dynamic effects to your headings. Enhance visual appeal with animations. Make your titles more engaging.',
				'default'    => ( 'PRESTIGE' === FPPB_COPY ) ? true : false,
			),
			array(
				'id'         => 'fpblock_block_post_group',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 90 90"><path d="M306.4,307.3H235.69a9.67,9.67,0,0,0-9.64,9.64v70.72a9.67,9.67,0,0,0,9.64,9.64H306.4a9.67,9.67,0,0,0,9.65-9.64V316.94A9.67,9.67,0,0,0,306.4,307.3Zm-55.8,8.16a7.07,7.07,0,0,1,7.11,7,7.12,7.12,0,0,1-14.24.17A7.08,7.08,0,0,1,250.6,315.46Zm-3.66,72.14a3.22,3.22,0,1,1,3.21-3.22A3.22,3.22,0,0,1,246.94,387.6Zm0-10.45a3.22,3.22,0,1,1,3.21-3.21A3.21,3.21,0,0,1,246.94,377.15Zm0-10.45a3.22,3.22,0,1,1,3.21-3.21A3.21,3.21,0,0,1,246.94,366.7Zm51.43,19.69h-43.8v-4h43.8Zm0-10.45h-43.8v-4h43.8Zm0-10.44h-43.8v-4h43.8ZM244,352.18l17.7-18.54,5.81,6.5,11.78-16.65,19.34,28.69Z" transform="translate(-226.05 -307.3)" /></svg><span>Post Group</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Group your posts by category or tag. Display related content together. Keep your site organized.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_info_box',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M7.94,7.7c1.29.03,2.35-.92,2.38-2.11.03-1.2-1-2.19-2.29-2.2-1.28-.02-2.33.92-2.36,2.11-.03,1.19.99,2.18,2.27,2.21ZM7.87,4.17c.15-.06.33,0,.4.11.11.18,0,.46-.28.48-.16.01-.28-.08-.31-.23,0-.02,0-.05,0-.07,0-.13.07-.25.19-.29ZM7.73,5c.13-.07.31-.08.44.08.09.11.13.24.13.36,0,.13-.03.24-.06.35-.04.18-.09.36-.12.55-.02.11-.02.22.02.33.02.05.04.06.1.04.07-.02.11-.08.15-.13.03-.05.06-.09.07-.15,0-.02.01-.02.03,0,.03.02.06.05.1.07.01,0,.01.01,0,.03-.04.08-.09.15-.14.22-.1.12-.24.18-.39.2-.12.02-.24,0-.35-.05-.12-.05-.18-.15-.18-.27,0-.12.02-.24.04-.37.04-.21.11-.42.15-.64.02-.07.03-.15.03-.22,0-.08-.02-.1-.1-.08-.05.01-.1.03-.14.07-.01.01-.02.01-.03,0-.03-.03-.06-.06-.09-.09,0,0-.01-.01,0-.02.1-.11.2-.21.34-.28ZM8.95,11.48c0,.28-.11.5-.26.6-.05.03-.1,0-.14,0-1.58.03-3.17.03-4.73.03-.03,0-.04,0-.08-.03-.2,0-.31-.21-.31-.56s.13-.54.33-.54h4.88c.16,0,.27.22.31.5ZM14.53,0H1.47C.65,0,0,.65,0,1.46v13.08c0,.81.65,1.46,1.47,1.46h13.08c.8,0,1.45-.65,1.45-1.46V1.46C16,.65,15.33,0,14.53,0ZM13.29,12.37c0,.56-.45,1.01-1.01,1.01H3.56c-.56,0-1.01-.45-1.01-1.01V3.64c0-.56.45-1.01,1.01-1.01h8.72c.56,0,1.01.45,1.01,1.01v8.72ZM12.44,9.28c0,.28-.18.5-.42.6-.08.03-.17,0-.23,0-2.58.03-5.17.03-7.72.03-.05,0-.06,0-.13-.03-.32,0-.5-.21-.5-.56s.21-.54.54-.54h7.96c.26,0,.44.22.5.5Z"/></svg><span>Info Box</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Highlight important information in a box. Customize colors and icons. Make key details stand out.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_notice_box',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M14.54,0H1.46C.66,0,0,.66,0,1.48v13.04c0,.82.66,1.48,1.46,1.48h13.08c.81,0,1.46-.66,1.46-1.48V1.48c0-.82-.65-1.48-1.46-1.48ZM13.4,12.03c0,.72-.36,1.3-.81,1.3H3.38c-.45,0-.81-.58-.81-1.3V3.97c0-.72.36-1.3.81-1.3h9.21c.45,0,.81.58.81,1.3v8.06ZM4.97,9.75c.13.12.19.27.19.46,0,.16-.06.31-.18.43-.09.08-.18.14-.28.16-.05.01-.1.02-.15.02-.17,0-.32-.06-.44-.18-.12-.12-.18-.27-.18-.43,0-.17.06-.34.18-.44t.02,0c.07-.07.15-.12.24-.14.12-.04.24-.04.35-.01.09.02.18.07.25.14ZM5.04,5.37c.14.12.22.32.22.55,0,.07-.02.16-.04.25l-.37,2.83h-.62s-.06-.44-.06-.44l-.32-2.4s0-.06-.01-.08c-.01-.1-.02-.16-.02-.18,0-.23.08-.41.23-.54.18-.16.43-.22.65-.17.13.03.24.09.34.17h0ZM12.19,5.68c0,.14-.02.26-.06.36-.03.11-.09.19-.15.24h-.01s-.02.01-.03.01c-.02,0-.04-.01-.05-.01h-.02c-1.19.03-2.37.03-3.55.03h-.31s-.03,0-.07-.03c-.1,0-.18-.09-.21-.24-.03-.09-.04-.19-.04-.32,0-.33.11-.54.27-.54h3.98c.13,0,.22.22.25.5ZM12.02,7.47c.09.07.15.25.17.46,0,.15-.03.28-.07.39-.04.09-.08.17-.14.22-.04.02-.07,0-.1,0h-.01c-1.19.02-2.37.02-3.55.02h-.31s-.03,0-.07-.02c-.1,0-.17-.08-.21-.22-.03-.09-.04-.2-.04-.34,0-.28.07-.46.19-.51.02-.02.05-.03.08-.03h3.98s.05.01.08.03ZM9.84,9.75c.04.08.06.25.07.44,0,.28-.04.5-.1.6h-.01s-.02.01-.03.01c-.32.01-.65.02-.97.01-.22.01-.43.01-.65.01h-.3s-.02,0-.03-.03c-.08,0-.13-.21-.13-.56,0-.23.03-.4.07-.48.02-.04.04-.06.07-.06h1.96s.04.02.05.06Z"/></svg><span>Notice Box</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Create attention-grabbing notices. Customize background and text styles. Ensure important messages are seen.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_author_bio',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 91.15 90"><path d="M82.85,0H8.3C3.72,0,0,3.72,0,8.3v73.4c0,4.58,3.72,8.3,8.3,8.3h74.55c4.58,0,8.3-3.72,8.3-8.3V8.3c0-4.58-3.72-8.3-8.3-8.3ZM76.35,66.74c.02,1.17-.3,1.42-1.44,1.42-9.86-.05-19.72-.03-29.58-.03s-19.53-.02-29.29.03c-1.16.01-1.43-.3-1.43-1.43.04-14.5.04-28.98,0-43.47,0-1.17.31-1.42,1.45-1.42,19.62.04,39.24.04,58.86,0,1.18,0,1.43.3,1.43,1.43-.03,14.5-.03,28.98,0,43.47ZM29.21,37.96c-1.46-1.79-1.96-3.92-2.02-5.46-.03-4.55,2.15-6.87,5.62-6.69,2.83.14,4.8,2.37,4.87,5.68.05,2.2-.53,4.28-1.74,6.13-1.7,2.59-4.8,2.74-6.73.34ZM18.54,53.28c.09-1.28,0-2.57.04-3.85.09-4.18,3.26-7.74,7.4-8.41.9-.14,1.57.21,2.28.66,1.38.89,2.77,2.44,4.16,2.42,1.38,0,2.79-1.5,4.12-2.46,1.02-.73,2.01-.8,3.17-.46,3.89,1.15,6.65,4.73,6.7,8.79v.15c.04,4.37.05,4.41-4.2,5.28-3.21.67-6.45,1.16-9.48,1.09-4.61.05-8.84-.71-13.03-1.78-.82-.22-1.21-.52-1.16-1.43ZM53.19,39.92c.05-4.32.05-8.64,0-12.95-.01-.98.31-1.21,1.22-1.2,2.84.05,5.66.03,8.49.03s5.56.03,8.33-.03c.94-.03,1.22.24,1.22,1.2-.05,4.31-.05,8.64,0,12.96.01.98-.32,1.2-1.24,1.19-5.6-.04-11.21-.04-16.81,0-.93.01-1.22-.25-1.21-1.2ZM72.45,62.43v1.97c0,.49-.4.89-.89.89H19.42c-.49,0-.88-.4-.88-.89v-1.97c0-.48.39-.88.88-.88h52.14c.49,0,.89.4.89.88ZM72.46,46.37l.02,1.38c0,.49-.39.9-.88.9l-17.49.26c-.49,0-.9-.39-.9-.88l-.02-1.38c-.01-.49.38-.89.87-.9l17.5-.25c.49-.01.89.38.9.87ZM72.44,52.12l.02,1.38c0,.49-.38.89-.87.9l-17.5.25c-.48,0-.89-.38-.89-.87l-.02-1.39c-.01-.48.38-.89.87-.89l17.5-.26c.48-.01.89.39.89.88Z" /></svg><span>Author Bio</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Showcase author information with a bio box. Include photo, name, and description. Personalize your posts.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_pros_cons',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 91.15 90"><path d="M82.85,0H8.3C3.72,0,0,3.72,0,8.3v73.4c0,4.58,3.72,8.3,8.3,8.3h74.55c4.58,0,8.3-3.72,8.3-8.3V8.3c0-4.58-3.72-8.3-8.3-8.3ZM39.07,71.89c-3.63.01-7.25,0-10.88,0s-7.14.03-10.71-.01c-1.86-.02-2.88-1.48-2.06-2.85.43-.71,1.11-.94,1.93-.94,7.25.02,14.5.02,21.76,0,1.27,0,2.17.52,2.21,1.82.04,1.43-.95,1.96-2.25,1.97ZM38.96,63.12c-7.15,0-14.29-.01-21.43,0-1.3,0-2.25-.47-2.37-1.88-.09-1.2.87-1.91,2.46-1.91,3.58-.01,7.15,0,10.72,0s7.03-.01,10.55,0c1.6,0,2.54.72,2.44,1.92-.11,1.44-1.09,1.87-2.37,1.87ZM38.86,54.34c-7.08,0-14.17,0-21.26,0-1.59-.01-2.56-.79-2.44-1.97.17-1.5,1.2-1.85,2.56-1.83,3.57.04,7.14.01,10.71.01s6.93.02,10.39-.01c1.36,0,2.39.35,2.51,1.87.09,1.2-.85,1.92-2.47,1.93ZM28.28,45.3c-7.5.03-13.6-6.08-13.58-13.63.01-7.54,6.12-13.62,13.63-13.57,7.45.05,13.38,6.08,13.37,13.62-.01,7.5-5.99,13.55-13.42,13.58ZM73.51,71.89c-3.57.02-7.14,0-10.71,0s-6.93.01-10.39,0c-1.74-.01-2.71-.72-2.59-1.96.13-1.53,1.18-1.85,2.53-1.84,7.04.02,14.07.03,21.11,0,1.37-.01,2.38.36,2.51,1.86.11,1.19-.85,1.93-2.46,1.94ZM73.58,63.12c-7.14-.01-14.28,0-21.42,0-1.29,0-2.26-.46-2.35-1.89-.07-1.21.86-1.9,2.47-1.9,3.57-.01,7.14,0,10.71,0s7.04-.01,10.55,0c1.59,0,2.54.73,2.43,1.94-.13,1.41-1.09,1.85-2.39,1.85ZM73.57,54.35c-7.14,0-14.28,0-21.42,0-1.29,0-2.32-.46-2.32-1.9s.97-1.9,2.3-1.9c3.62.03,7.25.01,10.87.01s7.04-.01,10.55,0c1.58.01,2.54.75,2.42,1.95-.13,1.42-1.11,1.85-2.4,1.85ZM62.92,45.23c-7.52,0-13.48-5.97-13.48-13.52s5.96-13.58,13.41-13.61c7.53-.04,13.62,6.04,13.6,13.6-.02,7.47-6.08,13.52-13.53,13.53ZM65.86,31.7c-.09.96,1.45,1.57,2.11,2.49.61.84.6,1.74-.13,2.49-.81.83-1.74.79-2.62.09-.89-.67-1.47-2.19-2.5-2.06-.84.09-1.53,1.4-2.34,2.1-.81.68-1.72.67-2.5-.06-.83-.78-.84-1.72-.17-2.61.67-.9,2.18-1.48,2.09-2.5-.07-.86-1.34-1.58-2.03-2.4-.48-.58-.63-1.24-.27-1.97.33-.69.86-1.07,1.93-1.11.72-.06,1.24.69,1.86,1.29q1.57,1.57,3.1.05c.31-.3.59-.63.93-.89.85-.63,1.73-.66,2.5.09.75.74.8,1.66.15,2.48-.69.89-2.03,1.62-2.11,2.52ZM34.5,27.44c.93.97.63,1.97-.26,2.84-2.15,2.12-4.29,4.26-6.44,6.38-.9.9-1.9,1.07-2.87.19-1.18-1.1-2.32-2.27-3.43-3.45-.56-.59-.68-1.32-.32-2.1.35-.71.93-1.01,1.7-1.01,1.2,0,1.79.94,2.45,1.69.7.79,1.15.78,1.88-.01,1.38-1.51,2.89-2.92,4.34-4.37.93-.95,1.98-1.17,2.95-.16Z" /></svg><span>Pros Cons</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'List the pros and cons of a topic. Organize information clearly. Help users make informed decisions.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_advanced_button',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M12.04,5.74c0,.7-.56,1.26-1.26,1.26-.7.01-1.28-.56-1.28-1.26s.57-1.28,1.27-1.28,1.27.57,1.27,1.28ZM16,1.46v13.08c0,.81-.65,1.46-1.45,1.46H1.47C.65,16,0,15.35,0,14.54V1.46C0,.65.65,0,1.47,0h13.06c.8,0,1.47.65,1.47,1.46ZM12.12,8.45s-.06.03-.09.04c-.09.04-.21.07-.33.07-.14,0-.36-.05-.56-.28-.09-.1-.22-.16-.36-.16-.12,0-.23.04-.33.12-.21.23-.4.32-.61.32-.11,0-.21-.02-.32-.07-.18-.08-.36-.18-.52-.3-.27-.21-.36-.53-.26-.84.05-.14.04-.25-.01-.38-.07-.16-.18-.25-.38-.28-.34-.08-.55-.31-.6-.65-.01-.22-.01-.39,0-.57.05-.38.26-.61.6-.68.26-.06.42-.23.42-.48H2.52v8.03h9.6v-3.89ZM13.29,5.49c-.01-.13-.08-.19-.2-.21-.62-.13-.96-.72-.76-1.33.01-.02.02-.05.02-.08,0-.09-.03-.15-.11-.19-.12-.1-.28-.19-.43-.25-.1-.05-.2-.03-.28.06-.42.48-1.09.48-1.52,0-.09-.09-.17-.11-.3-.05-.14.06-.27.14-.4.23-.1.07-.14.16-.09.28.02.09.04.18.05.26v.1c-.01.49-.32.86-.81.97-.14.03-.19.08-.21.23-.01.15-.01.3,0,.46.02.13.07.2.2.23.35.06.6.25.75.58.09.24.1.48.02.73-.04.11,0,.21.07.28.14.09.29.18.44.24.11.05.2.03.28-.05.04-.05.07-.09.11-.12.43-.36,1.04-.31,1.4.1.1.11.19.13.32.07.1-.04.19-.1.28-.16.04-.02.06-.05.1-.07.13-.08.16-.17.11-.31-.06-.14-.08-.29-.05-.44.07-.45.36-.77.81-.86.12-.02.19-.09.2-.21.01-.17.01-.33,0-.49ZM4.13,9.92h6.38v-.93h-6.38v.93Z"/></svg><span>Advanced Button</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Add customizable buttons to your site. Choose from various styles and actions. Encourage user interaction.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_editorial_rating',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 91.15 90"><path d="M82.85,0H8.3C3.72,0,0,3.72,0,8.3v73.4c0,4.58,3.72,8.3,8.3,8.3h74.55c4.58,0,8.3-3.72,8.3-8.3V8.3c0-4.58-3.72-8.3-8.3-8.3ZM55.48,26.19c.04-.08.1-.15.16-.21l5.56-5.56c.22-.22.48-.35.75-.33.46,0,.76.19.95.54.2.35.18.71-.02,1.05-.09.13-.21.25-.31.36-1.77,1.77-3.54,3.54-5.3,5.3-.11.11-.23.22-.36.3-.44.28-.94.22-1.3-.15-.36-.36-.41-.87-.13-1.3ZM45.6,16.19c.59,0,1.06.52,1.03,1.11-.02.57-.52,1.01-1.08,1-.58-.01-1.05-.53-1.03-1.1.04-.57.53-1.02,1.08-1.01ZM44.52,22.07c0-.67.47-1.14,1.08-1.12.58.01,1.02.47,1.02,1.11.02.67.01,1.34.01,2.01,0,.61,0,1.23-.01,1.84,0,.67-.46,1.14-1.07,1.12-.59,0-1.03-.47-1.03-1.11-.02-1.28-.02-2.57,0-3.85ZM28.22,20.69c.19-.42.52-.6,1.07-.61.22-.01.47.15.69.37,1.82,1.83,3.66,3.65,5.48,5.48.5.5.51,1.11.08,1.56-.44.45-1.06.45-1.58-.07-1.83-1.82-3.66-3.65-5.49-5.48-.35-.36-.46-.78-.25-1.25ZM66.61,48.15c-3.28,2.37-6.56,4.76-9.87,7.14-1.23.9-1.42,1.48-.95,2.95,1.29,3.95,2.57,7.88,3.86,11.83.15.46.34.9.18,1.4-.33,1.01-1.45,1.27-2.46.55-2.66-1.94-5.29-3.89-7.95-5.81-.82-.62-1.65-1.24-2.51-1.82-.99-.71-1.71-.71-2.73.03-3.43,2.5-6.88,5.01-10.29,7.5-.43.31-.84.63-1.4.53-.95-.15-1.42-.99-1.08-2.06,1.27-3.91,2.54-7.81,3.83-11.73.66-2.01.54-2.38-1.2-3.64-3.21-2.32-6.42-4.64-9.64-6.94-.71-.52-1.37-1.04-1.03-2.04.32-1.02,1.21-.99,2.07-.99,2.02.01,4.06.01,6.1.01s4.24,0,6.39-.01c1.3,0,1.83-.4,2.24-1.66,1.29-4,2.59-8.01,3.89-12,.21-.63.43-1.24,1.15-1.43.84-.21,1.51.28,1.86,1.39,1.26,3.84,2.5,7.68,3.74,11.54.61,1.92.95,2.17,2.96,2.17h11.9c.87-.01,1.81-.06,2.12,1.02.33,1.08-.45,1.54-1.18,2.07Z"/></svg><span>Editorial Rating</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Display ratings with stars or points. Provide reviews and feedback visually. Enhance credibility of your content.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_video_popup',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M12.38,5.14h-7.12v7.32h7.12v-7.32ZM10.44,8.96l-1.52.92-1.52.91c-.13.07-.28-.02-.28-.15v-3.67c0-.14.15-.23.28-.15l1.52.9,1.52.92c.12.07.12.25,0,.32ZM14.52,0H1.43C.63,0-.02.66-.02,1.47v13.05c0,.81.65,1.48,1.45,1.48h13.09c.81,0,1.46-.67,1.46-1.48V1.47C15.98.66,15.33,0,14.52,0ZM3.69,11.62h-.06v.05h-.99V2.55h8.97v1.02H3.69v8.05ZM13.37,13.48H4.28V4.12h9.09v9.36Z"/></svg><span>Video Popup</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Capture your audience\'s attention with compelling videos. Provide dynamic content that informs, entertains, and converts.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_image_comparison',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 91.15 90"><path d="M23.77,61.9l15.73-17.03v17.03h-15.73ZM91.15,8.3v73.4c0,4.58-3.72,8.3-8.3,8.3H8.3c-4.58,0-8.3-3.72-8.3-8.3V8.3C0,3.72,3.72,0,8.3,0h74.55c4.58,0,8.3,3.72,8.3,8.3ZM45.6,75.08c-.04-10.03-.03-20.06-.03-30.09v-11.96c0-6.08,0-12.17.01-18.25,0-.46-.04-.7-.73-.68-1.78.05-3.57.03-5.36,0-.51,0-.68.11-.67.55.04,1.49-.02,2.97.03,4.46.02.54-.19.63-.78.63-5.21-.01-10.41-.01-15.61-.01-4.32,0-7.16,2.36-7.16,5.95v38.69c0,3.41,2.9,5.82,7,5.82,5.28,0,10.56,0,15.85-.01.52,0,.71.07.7.55-.04,1.52.01,3.03-.03,4.54,0,.44.16.55.67.54,1.74-.03,3.47-.04,5.21.01.71.01.9-.14.9-.74ZM75.85,25.19c0-2.96-3-5.43-6.56-5.45-5.46-.03-10.93,0-16.39-.02-.51,0-.6.13-.59.52.02,1.49.03,2.98-.01,4.46-.01.51.14.66.78.66,5.09-.02,10.19,0,15.29-.03.64,0,.76.16.76.66-.02,11.67-.02,23.34-.02,35,0,.21.07.43-.11.66-5.54-5.53-11.04-11.04-16.62-16.62-.04.17-.05.19-.05.21-.01,8.16-.01,16.33-.02,24.5-.01.39.16.45.58.45,5.49-.01,10.98.02,16.47-.02,3.51-.02,6.48-2.51,6.49-5.44.02-13.18.02-26.36,0-39.54ZM23.77,61.9h15.73v-17.03l-15.73,17.03ZM23.77,61.9h15.73v-17.03l-15.73,17.03Z" /></svg><span>Image Comparison</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Show before-and-after images. Allow users to compare visuals. Perfect for showcasing changes.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_table_of_content',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M14.55,0H1.45C.65,0,0,.66,0,1.47v13.05c0,.81.65,1.48,1.45,1.48h13.1c.8,0,1.45-.67,1.45-1.48V1.47C16,.66,15.35,0,14.55,0ZM13.35,12.42c0,.56-.45,1.02-1.01,1.02H3.63c-.56,0-1.01-.46-1.01-1.02V3.54c0-.56.45-1.02,1.01-1.02h8.71c.56,0,1.01.46,1.01,1.02v8.88ZM3.93,4.68c0-.46.37-.83.83-.83s.83.37.83.84-.36.83-.83.83-.83-.37-.83-.84ZM12.48,7.34c0,.28-.18.5-.41.6-.09.03-.17,0-.23,0-2.58.03-5.17.03-7.72.03-.05,0-.06,0-.14-.03-.32,0-.5-.21-.5-.56,0-.33.22-.54.54-.54h7.96c.26,0,.44.22.5.5ZM12.48,9.59c0,.28-.18.5-.41.61-.09.02-.17,0-.23,0-2.58.02-5.17.02-7.72.02-.05,0-.06,0-.14-.02-.32,0-.5-.21-.5-.56s.22-.54.54-.54h7.96c.26,0,.44.22.5.49ZM7.92,11.85c0,.28-.09.5-.21.6-.04.03-.08,0-.11,0-1.27.03-2.55.03-3.81.03t-.06-.03c-.16,0-.25-.21-.25-.56,0-.33.11-.54.27-.54h3.92c.13,0,.22.22.25.5Z"/></svg><span>Table of Content</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Create a table of contents for your posts. Improve navigation and readability. Enhance user experience.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_image_slider',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 16 16"><path d="M14.5,0H1.51C.68,0,0,.68,0,1.52v12.96c0,.84.67,1.52,1.5,1.52h12.99c.83,0,1.5-.68,1.5-1.52V1.52C16,.68,15.33,0,14.5,0ZM13.3,12.63c0,.47-.38.85-.85.85H3.42c-.47,0-.85-.38-.85-.85v-1.03c0-.48.38-.86.85-.86h9.03c.47,0,.85.38.85.86v1.03ZM13.3,9.64c0,.43-.09.52-.51.52h-4.79c-1.61,0-3.21.01-4.81,0-.37,0-.48-.11-.48-.48h-.01V3.03c0-.36.13-.48.49-.48h9.62c.38,0,.49.13.49.5v6.59ZM12.35,3.1H3.88c-.59,0-.64.05-.64.64v4.94c.08-.09.13-.14.18-.19.86-1.02,1.72-2.03,2.59-3.05.16-.18.31-.19.47,0,.78.86,1.56,1.72,2.33,2.58.07.08.12.1.22.03.47-.37.96-.72,1.43-1.08.14-.1.27-.12.4,0,.57.53,1.15,1.06,1.72,1.59.01,0,.02,0,.02.02.01.01.02.01.02.02.01.01.02.01.02.02l.03.03s.07.04.12.04v-4.35c0-.27,0-.54-.01-.8,0-.31-.12-.43-.43-.43ZM8.89,5.91c-.5,0-.89-.4-.88-.89,0-.48.39-.87.89-.87s.88.4.88.88-.4.88-.89.88ZM3.86,11.95h1.71v.46s-.01.01-.02.01h-1.71s.02.01.02.02l.57.45s.01.01.02.01c.02.02.02.03,0,.05-.11.08-.21.16-.32.25,0,.01-.01.01-.02.01h-.01s0-.01-.02-.02c-.3-.24-.6-.47-.9-.71-.12-.09-.24-.19-.36-.29t0-.02c.31-.24.61-.48.91-.72.12-.1.24-.19.35-.29.02-.01.03-.01.04,0,.11.09.21.17.32.25.02.02.02.03,0,.04-.21.16-.41.33-.61.49.01.01.02.01.03.01ZM12.14,11.45c.3.24.6.48.9.72t0,.02c-.12.1-.24.2-.36.29-.3.24-.59.47-.89.71-.01.01-.02.01-.02.02h-.01s-.02,0-.02-.01c-.11-.09-.22-.17-.32-.25-.02-.02-.02-.03,0-.05,0,0,.01-.01.02-.01l.56-.45s.02,0,.02-.02h-1.7s-.02,0-.02-.01v-.46h1.71s.02,0,.03-.01c-.2-.16-.41-.33-.61-.49-.02-.01-.02-.02,0-.04.11-.08.21-.16.32-.25.01-.01.02-.01.03,0,.12.1.24.19.36.29ZM7.24,12.11c0,.2-.17.36-.37.36s-.36-.16-.36-.36.16-.36.36-.36.37.16.37.36ZM8.3,12.11c0,.2-.17.36-.37.36s-.36-.16-.36-.36.16-.36.36-.36.37.16.37.36ZM9.36,12.11c0,.2-.16.36-.37.36s-.36-.16-.36-.36.16-.36.36-.36c.21,0,.37.16.37.36Z"/></svg><span>Image Slider</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Display multiple images in a slider. Customize transitions and styles. Create dynamic visual content.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_team_member',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 91.15 90"><path d="M82.85,0H8.3C3.72,0,0,3.72,0,8.3v73.4c0,4.58,3.72,8.3,8.3,8.3h74.55c4.58,0,8.3-3.72,8.3-8.3V8.3c0-4.58-3.72-8.3-8.3-8.3ZM75.3,59.71c-4.18-.03-8.37-.02-12.56-.01-.45,0-.8-.01-1.03-.55-2.02-4.62-5.4-7.82-10.11-9.61-.12-.05-.22-.13-.44-.26,1.58-1,2.88-2.18,3.9-3.65.13-.2.44-.29.68-.38,9.4-3.54,19.98,3.5,20.44,13.56.03.72-.18.9-.88.9ZM14.98,58.72c.63-10.08,10.84-16.86,20.36-13.5.28.1.6.15.78.42.99,1.46,2.26,2.62,3.95,3.68-1.93.74-3.57,1.56-5.05,2.69-2.39,1.82-4.24,4.09-5.44,6.85-.29.67-.65.85-1.34.85-4.09-.03-8.18-.04-12.27,0-.77,0-1.05-.15-.99-.99ZM52.91,30.77c-.55-.47-.61-.81-.34-1.43,1.95-4.42,7.11-6.57,11.61-4.79,4.64,1.83,6.93,6.98,5.19,11.67-1.68,4.52-6.74,6.92-11.33,5.46-1.19-.38-1.39-1.03-1.12-1.96-.03-3.65-1.31-6.64-4.01-8.95ZM36.51,39.36c.01-5.07,4.08-9.09,9.18-9.06,4.95.03,8.97,4.12,8.96,9.09,0,5.02-4.08,9.08-9.09,9.06-5.04-.02-9.07-4.07-9.05-9.09ZM60.74,63.94q.26,2.12-1.9,2.12h-13.28c-4.76,0-9.52-.02-14.28.01-.78.01-1.03-.16-.99-.99.39-7.75,6.9-14.08,14.81-14.36,7.75-.27,14.69,5.59,15.64,13.22ZM26.23,24.88c1.27-.63,2.62-.95,4.06-.95,3.6,0,6.97,2.24,8.33,5.48.22.55.19.87-.29,1.28-2.99,2.58-4.36,5.86-4.01,9.81.06.72-.36.84-.83,1.02-4.49,1.7-9.58-.43-11.51-4.82-1.95-4.46-.09-9.64,4.25-11.82Z" /></svg><span>Team Member</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Introduce your team with dedicated profiles behind your project or company. Add photos, names, and bios. Personalize your site.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_flip_card',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 512 512"><path d="M0 224c0 17.7 14.3 32 32 32s32-14.3 32-32c0-53 43-96 96-96H320v32c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l64-64c12.5-12.5 12.5-32.8 0-45.3l-64-64c-9.2-9.2-22.9-11.9-34.9-6.9S320 19.1 320 32V64H160C71.6 64 0 135.6 0 224zm512 64c0-17.7-14.3-32-32-32s-32 14.3-32 32c0 53-43 96-96 96H192V352c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9l-64 64c-12.5 12.5-12.5 32.8 0 45.3l64 64c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V448H352c88.4 0 160-71.6 160-160z"/></svg><span>Flip Card</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Place the Flip Card in your website to create interactive flip card content. Display information on both sides. Enhance engagement.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_instagram_feed',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 448 512"><path d="M0 64C0 46.3 14.3 32 32 32c229.8 0 416 186.2 416 416c0 17.7-14.3 32-32 32s-32-14.3-32-32C384 253.6 226.4 96 32 96C14.3 96 0 81.7 0 64zM0 416a64 64 0 1 1 128 0A64 64 0 1 1 0 416zM32 160c159.1 0 288 128.9 288 288c0 17.7-14.3 32-32 32s-32-14.3-32-32c0-123.7-100.3-224-224-224c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg><span>Instagram Feed</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Showcase your Instagram feed on your site. Keep content fresh and dynamic. Engage with your social audience.',
				'default'    => true,
			),
			array(
				'id'         => 'fpblock_block_accordion',
				'type'       => 'switcher_box',
				'swc_name'   => '<svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" fill="#5E30CC" viewBox="0 0 448 512"><path d="M0 64C0 46.3 14.3 32 32 32c229.8 0 416 186.2 416 416c0 17.7-14.3 32-32 32s-32-14.3-32-32C384 253.6 226.4 96 32 96C14.3 96 0 81.7 0 64zM0 416a64 64 0 1 1 128 0A64 64 0 1 1 0 416zM32 160c159.1 0 288 128.9 288 288c0 17.7-14.3 32-32 32s-32-14.3-32-32c0-123.7-100.3-224-224-224c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg><span>Accordion</span>',
				'demo_link'  => '#',
				'doc_link'   => '#',
				'video_link' => '#',
				'short_desc' => 'Accordion block is a great way to organize information neatly for collapsible content sections. Improve user navigation.',
				'default'    => true,
			),
			array(
				'type'    => 'content',
				'content' => '<div class="fpblock--sb_wrap">
					<div class="fpblock--sb_title"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="#fff" viewBox="0 0 448 512"><path d="M192 64v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V64c0-17.7-14.3-32-32-32H224c-17.7 0-32 14.3-32 32zM82.7 207c-15.3 8.8-20.5 28.4-11.7 43.7l32 55.4c8.8 15.3 28.4 20.5 43.7 11.7l55.4-32c15.3-8.8 20.5-28.4 11.7-43.7l-32-55.4c-8.8-15.3-28.4-20.5-43.7-11.7L82.7 207zM288 192c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H288zm64 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H352zM160 384v64c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zM32 352c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H96c17.7 0 32-14.3 32-32V384c0-17.7-14.3-32-32-32H32z"/></svg><span>Custom Block Development</span></div>
					<p>Need a custom Gutenberg block?</p><p>We\'ll develop it within days at 50% off. Get a solution that fits your needs and enhances your website\'s functionality.</p>
					<a href="https://pluginic.com/services/?ref=100" target="_blank" style="color: #fff;font-weight: bold;">Learn More →</a>
				</div>',
				'class'   => 'fpblock-field-switcher_box',
			),
		),
	)
);

//
// Single Post Settings.
//
FPBLOCK::createSection( $prefix, array(
	'id'    => 'basic_fields',
	'title' => 'Single Post Settings',
	'icon'  => 'fas fa-receipt',
	'fields' => array(

		array(
			'id'         => 'fpblock_smooth_scroll_show',
			'type'       => 'button_set',
			'title'      => 'Enable Smooth Scroll',
			'options'    => array(
			  'on-posts'   => 'Only Single Post Template',
			  'on-website' => 'Entire Website',
			),
			'default'    => 'on-posts',
			'class'      => 'fpblock-field-button_set-pro'
		),
		array(
			'id'         => 'fpblock_single_post_temp_enable',
			'type'       => 'switcher',
			'title'      => 'Single Post Template Execution',
			'default'    => false,
			'text_on'    => 'Activate',
			'text_off'   => 'Deactivate',
			'text_width' => 110,
		),
		array(
			'id'          => 'fpblock_single_post_type',
			'type'        => 'select',
			'title'       => 'Select a Post Type',
			'placeholder' => 'Select a post type',
			'options'     => 'post_types',
			'chosen'      => true,
  			'multiple'    => true,
			'query_args'  => array(
				'posts_per_page' => -1,
			),
			'default'     => 'post',
			'dependency'  => array( 'fpblock_single_post_temp_enable', '==', 'true' ),
			'class'       => 'fpblock-field-mw-350 fpblock-field-select-pro',
		),
		array(
			'id'         => 'fpblock_single_post_temp_select',
			'type'       => 'image_select',
			'title'      => 'Single Post Template Selection',
			'after'      => '<p style="display: flex;gap: 68px;margin-top: -10px;">
				<a href="#" target="_blank">Demo 1 ↗</a>
				<a href="#" target="_blank">Demo 2 ↗</a>
				<a href="#" target="_blank">Demo 3 ↗</a>
			</p>',
			'multiple'   => false,
			'options'    => array(
			  'value-1' => FPPB_URL . 'admin/img/fp-sp-template-1.png',
			  'value-2' => FPPB_URL . 'admin/img/fp-sp-template-1.png',
			  'value-3' => FPPB_URL . 'admin/img/fp-sp-template-1.png',
			),
			'default'    => 'value-1',
			'dependency' => array( 'fpblock_single_post_temp_enable', '==', 'true' ),
			'class'      => 'fpblock-field-image_select-pro',
		),
		array(
			'id'         => 'fpblock_toc_show',
			'type'       => 'switcher',
			'title'      => 'Show Table of Content',
			'default'    => true,
			'dependency' => array( 'fpblock_single_post_temp_enable', '==', 'true' ),
		),
		array(
			'id'          => 'fpblock_toc_counter',
			'type'        => 'select',
			'title'       => 'Table of Content Counter',
			'placeholder' => 'Select an option',
			'options'     => array(
			  'none'    => 'None',
			  'hyphen'  => 'Hyphen',
			  'numeric' => 'Numeric',
			  'bullet'  => 'Bullet',
			),
			'default'     => 'numeric',
			'dependency'  => array( 'fpblock_single_post_temp_enable|fpblock_toc_show', '==|==', 'true|true' ),
		),
		array(
			'id'         => 'fpblock_top_pobar_show',
			'type'       => 'switcher',
			'title'      => 'Show Top Progress Bar',
			'default'    => true,
			'dependency' => array( 'fpblock_single_post_temp_enable', '==', 'true' ),
		),
		array(
			'id'         => 'fpblock_social_icons_show',
			'type'       => 'switcher',
			'title'      => 'Show Social Share Icons',
			'default'    => true,
			'dependency' => array( 'fpblock_single_post_temp_enable', '==', 'true' ),
		),
		array(
			'id'         => 'fpblock_email_nl_show',
			'type'       => 'switcher',
			'title'      => 'Show Email Newsletter',
			'subtitle'   => 'Show email newsletter after content.',
			'default'    => true,
			'dependency' => array( 'fpblock_single_post_temp_enable', '==', 'true' ),
		),
		array(
			'id'            => 'fpblock_email_section_content',
			'type'          => 'wp_editor',
			'title'         => 'Email Section Content',
			'tinymce'       => true,
			'quicktags'     => true,
			'media_buttons' => true,
			'height'        => '150px',
			'default'       => '<img src="' . FPPB_URL . 'admin/img/c-logo.png" width="60" height="60" />
<h2>Get Weekly 5-Minute Business Advice</h2>
<p>C. newsletter is your digest of bite-sized. News, thought &amp; brand leadership, and entertainment. All in one email.</p>',
			'dependency'    => array( 'fpblock_single_post_temp_enable|fpblock_email_nl_show', '==|==', 'true|true' ),
		),
		array(
			'id'         => 'fpblock_email_shortcode',
			'type'       => 'text',
			'title'      => 'Newsletter Shortcode',
			'desc'       => 'Use Shortcode from Contact Form 7, WP Forms, Ninja Forms etc.',
			'default'    => '[contact-form-7 id="1"]',
			'dependency' => array( 'fpblock_single_post_temp_enable|fpblock_email_nl_show', '==|==', 'true|true' ),
		),
		array(
			'id'         => 'fpblock_author_bio_show',
			'type'       => 'switcher',
			'title'      => 'Show Author Bio',
			'default'    => true,
			'dependency' => array( 'fpblock_single_post_temp_enable', '==', 'true' ),
		),
		array(
			'id'       => 'fpblock_css_for_single_page',
			'type'     => 'code_editor',
			'before'   => 'Write CSS Here For Single Post Page',
			'settings' => array(
			  'theme'  => 'mbo',
			  'mode'   => 'css',
			),
			'default'  => '/**
 * Custom CSS gives you the flexibility to customize the look,
 * and you can write your custom css in here.
 * This is a premium feature & you need to PRO version for this feature.
 */',
			'class'    => 'fpblock-field-code-editor-pro',
		),
	),
) );

//
// Backup.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'title'  => 'Backup',
		'icon'   => 'fa fa-rotate-left',
	)
);

//
// License.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'title'  => 'License',
		'icon'   => 'fas fa-fingerprint',
	)
);

//
// Version Control.
//
FPBLOCK::createSection( $prefix, array(
	'id'    => 'basic_fields',
	'title' => 'Version Control',
	'icon'  => 'fas fa-project-diagram',
	'fields' => array(
		array(
			'id'     => 'opt-fieldset-1',
			'type'   => 'fieldset',
			'title'  => 'Rollback to Previous Version',
			'fields' => array(
				array(
					'id'          => 'fpblock-version-rollback',
					'type'        => 'select',
					'placeholder' => 'Select a version',
					'options'     => array(
					  '2-0-0'  => '2.0.0',
					  '1-4-0'  => '1.4.0',
					  '1-3-0'  => '1.3.0',
					  '1-1-0'  => '1.1.0',
					  '1-0-0'  => '1.0.0',
					),
				),
				array(
					'type'    => 'content',
					'content' => '<a href="#" class="button">Rollback</a>',
					'class'   => 'fpblock-content-separator',
				),
			),
			'class' => 'fpblock-fieldset-inline',
		),
		array(
			'id'       => 'fpblock-beta-active',
			'type'     => 'switcher',
			'title'    => 'Enable Beta',
			'desc'     => 'Enable this option to turn on beta updates and be notified when a new beta version of Spectra is available. The beta version will not install automatically, you will have to install it when you get a notification. It is recommended to try beta on a test environment only.',
			'default'  => false
		),
		array(
			'id'       => 'fpblock-legacy-active',
			'type'     => 'switcher',
			'title'    => 'Enable Legacy Blocks',
			'desc'     => 'Enable this option to enable the support of our Legacy Blocks on the site.',
			'default'  => false
		),
	),
) );

//
// Recommended.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'title'  => 'Recommended',
		'icon'   => 'fas fa-tint',
	)
);

//
// Help.
//
FPBLOCK::createSection(
	$prefix,
	array(
		'title'  => 'Help',
		'icon'   => 'fas fa-life-ring',
	)
);

//
// Unlock All Features.
//
if ( 'ESSENTIAL' === FPPB_COPY ) {

	FPBLOCK::createSection(
		$prefix,
		array(
			'title'  => 'Unlock All Features',
			'icon'   => 'fas fa-unlock-alt',
		)
	);
}
