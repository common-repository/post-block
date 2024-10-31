<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_fpblock_help';

//
// Create options
//
FPBLOCK::createOptions(
	$prefix,
	array(
		'menu_title'         => 'Help',
		'menu_slug'          => 'fancypost_help',
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
				'function' => 'fpblock_help_callback',
			),
		),
	),
);

function fpblock_help_callback() {
	?>
	<style>
	/* Hide all notices & other sections except the framework body && Display none */
	div#wpbody-content > *:not(.fpblock.fpblock-options),
	[id*="notice"], [class*="notice"], [class*="error"] {
		display: none !important;
	}
	.frhd-dashboard-nav nav a[href^="<?php echo admin_url(); ?>admin.php?page=fancypost_help"] {
		background-color: #fff;
		border-color: #dfdbdb;
		box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
	}
	/* Search Form */
	.frhd-help-search-wrap {
		max-width: 700px;
		margin: 0 auto;
		text-align: center;
		padding: 0 10px 40px;
	}
	/* Help Center */
	.frhd-help-center {
		max-width: 1100px;
		margin: 0 auto 90px;
	}
	.frhd-help-center .frhd-plugs-card-inner {
		padding: 30px;
	}
	a.frhd-plugs-card-action {
		position: absolute;
		left: 0;
		top: 0;
		right: 0;
		bottom: 0;
		transition: .3s;
	}
	a.frhd-plugs-card-action:hover {
		box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
	}
	/* Recommended Plugins */
	.fpblock-wrapper {
		max-width: 100%;
		border-radius: 0;
		box-shadow: 0 0;
	}
	.fpblock-content {
		background-color: #f0f0f1;
	}
	.frhd-plugs-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
		justify-content: center;
    }
    .frhd-plugs-card {
		position: relative;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
        display: flex;
        flex-basis: calc( 33.333% - 56px) !important;
        flex-direction: column;
    }
    .frhd-plug-details {
        display: flex;
        gap: 20px;
        padding: 20px;
    }
    .frhd-plug-body h4 {
        margin: 0;
        font-size: 16px;
    }
    .frhd-plug-status {
        padding: 20px;
        background: #f7f7f7;
        border-top: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
		margin-bottom: 0;
    	margin-top: auto;
    }
    .frhd-plug-status strong span {
        color: #adadad;
    }
    .frhd-content {
        position: relative;
        background-color: #fff;
        border-bottom: 1px solid #ddd;
        padding: 40px 10px 30px;
    }
    .frhd-content-inner {
        max-width: 1080px;
        margin: 0 auto;
    }
    .frhd-content-inner img {
        float: left;
        margin-right: 20px;
        max-width: 100px;
        margin-top: -20px;
    }
    .frhd-content h4 {
        margin: 0;
    }
    .frhd-plug-img img {
        min-width: 70px;
    }
	@media (max-width: 1400px) {
		.frhd-plugs-card {
			flex-basis: calc( 50% - 56px) !important;
		}
	}
	@media (max-width: 920px) {
		.frhd-plugs-card {
			flex-basis: calc( 100% - 56px) !important;
		}
	}
    </style>
	<div class="frhd-help-search-wrap">
        <h1>🎉 Hello! How can we help you today?</h1>
        <input id="frhd-search-input" class="regular-text code" type="text" placeholder="Search in the knowledge base">
        <button id="frhd-search-button" class="button button-primary">Search</button>
    </div>
    <script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {

		var input = document.getElementById('frhd-search-input');
		var button = document.getElementById('frhd-search-button');

		if (input && button) {
			button.addEventListener('click', function() {
				var query = input.value;
				var searchUrl = 'https://pluginic.com/?s=' + encodeURIComponent(query);
				window.open(searchUrl, '_blank'); // Open the search results in a new tab
			});
		}
	});
    </script>
	<div class="frhd-help-center">
		<div class="frhd-plugs-container">
			<div class="frhd-plugs-card">
				<div class="frhd-plugs-card-inner">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 18H17V16H7V18Z" fill="currentColor" /><path d="M17 14H7V12H17V14Z" fill="currentColor" /><path d="M7 10H11V8H7V10Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C4.34315 2 3 3.34315 3 5V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V9C21 5.13401 17.866 2 14 2H6ZM6 4H13V9H19V19C19 19.5523 18.5523 20 18 20H6C5.44772 20 5 19.5523 5 19V5C5 4.44772 5.44772 4 6 4ZM15 4.10002C16.6113 4.4271 17.9413 5.52906 18.584 7H15V4.10002Z" fill="currentColor" /></svg>
					<h4>Documentation</h4>
					<p>To get started with FancyPost, please refer to this guide for downloading, installing, and using.</p>
					<a href="#" class="frhd-plugs-card-action"></a>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plugs-card-inner">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.2607 21.9966C12.174 21.9988 12.0871 22 12 22C11.9128 22 11.8259 21.9988 11.7393 21.9966C7.68318 21.8928 4.22762 19.3738 2.7573 15.8242C1.74192 13.3674 1.7476 10.588 2.77433 8.13481C3.27688 6.93672 4.00599 5.85718 4.90808 4.94979L4.94983 4.90804C5.85259 4.01056 6.92574 3.28429 8.1165 2.78202C10.5894 1.74123 13.3958 1.73933 15.87 2.77633C17.0688 3.27993 18.1488 4.01042 19.0562 4.91407L19.0859 4.94373C19.9989 5.86054 20.7351 6.95351 21.2392 8.16721C21.7279 9.34662 21.9812 10.6006 21.999 11.8573C21.9997 11.9047 22 11.9523 22 12C22 12.0506 21.9996 12.1012 21.9989 12.1516C21.9376 16.2743 19.3814 19.7925 15.7731 21.2637C14.6481 21.7213 13.4566 21.9656 12.2607 21.9966ZM14.0322 15.4464L16.906 18.3202C14.0281 20.5599 9.97192 20.5599 7.09402 18.3202L9.96779 15.4464C11.2175 16.1845 12.7825 16.1845 14.0322 15.4464ZM8.55358 14.0322L5.67981 16.906C3.44007 14.0281 3.44007 9.97192 5.67981 7.09402L8.55358 9.96779C7.81548 11.2175 7.81548 12.7825 8.55358 14.0322ZM10.0824 12.5694C10.0773 12.5523 10.0725 12.5351 10.0679 12.5179C9.97738 12.179 9.97738 11.821 10.0679 11.4821C10.1556 11.1537 10.3282 10.8434 10.5858 10.5858C10.8299 10.3417 11.1213 10.1739 11.4306 10.0824C11.4477 10.0773 11.4649 10.0725 11.4821 10.0679C11.821 9.97738 12.179 9.97737 12.5179 10.0679C12.8463 10.1556 13.1566 10.3282 13.4142 10.5858C13.6583 10.8299 13.8261 11.1213 13.9176 11.4306C13.9227 11.4477 13.9275 11.4649 13.9321 11.4821C14.0226 11.821 14.0226 12.179 13.9321 12.5179C13.8444 12.8462 13.6718 13.1566 13.4142 13.4142C13.1701 13.6583 12.8787 13.8261 12.5694 13.9176C12.5523 13.9227 12.5351 13.9275 12.5179 13.9321C12.179 14.0226 11.821 14.0226 11.4821 13.9321C11.1538 13.8444 10.8434 13.6718 10.5858 13.4142C10.3417 13.1701 10.1739 12.8787 10.0824 12.5694ZM14.0322 8.55357C12.7825 7.81548 11.2175 7.81548 9.96779 8.55357L7.09402 5.6798C9.97192 3.44007 14.0281 3.44007 16.906 5.6798L14.0322 8.55357ZM18.3202 16.906C20.5599 14.0281 20.5599 9.97192 18.3202 7.09402L15.4464 9.96779C16.1845 11.2175 16.1845 12.7825 15.4464 14.0322L18.3202 16.906Z" fill="currentColor" /></svg>
					<h4>Support Ticket</h4>
					<p>Need one-to-one assistance? Get in touch with our Support team! We'd love the opportunity to help you.</p>
					<a href="#" class="frhd-plugs-card-action"></a>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plugs-card-inner">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5 7H19C19.5523 7 20 7.44771 20 8V16C20 16.5523 19.5523 17 19 17H5C4.44772 17 4 16.5523 4 16V8C4 7.44772 4.44772 7 5 7ZM2 8C2 6.34315 3.34315 5 5 5H19C20.6569 5 22 6.34315 22 8V16C22 17.6569 20.6569 19 19 19H5C3.34315 19 2 17.6569 2 16V8ZM10 9L14 12L10 15V9Z" fill="currentColor" /></svg>
					<h4>Videos</h4>
					<p>Check our video tutorials which cover everything you need to know about FancyPost.</p>
					<a href="#" class="frhd-plugs-card-action"></a>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plugs-card-inner">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.0122 5.57169L10.9252 4.48469C8.77734 2.33681 5.29493 2.33681 3.14705 4.48469C0.999162 6.63258 0.999162 10.115 3.14705 12.2629L11.9859 21.1017L11.9877 21.0999L12.014 21.1262L20.8528 12.2874C23.0007 10.1395 23.0007 6.65711 20.8528 4.50923C18.705 2.36134 15.2226 2.36134 13.0747 4.50923L12.0122 5.57169ZM11.9877 18.2715L16.9239 13.3352L18.3747 11.9342L18.3762 11.9356L19.4386 10.8732C20.8055 9.50635 20.8055 7.29028 19.4386 5.92344C18.0718 4.55661 15.8557 4.55661 14.4889 5.92344L12.0133 8.39904L12.006 8.3918L12.005 8.39287L9.51101 5.89891C8.14417 4.53207 5.92809 4.53207 4.56126 5.89891C3.19442 7.26574 3.19442 9.48182 4.56126 10.8487L7.10068 13.3881L7.10248 13.3863L11.9877 18.2715Z" fill="currentColor"/></svg>
					<h4>Show Your Love</h4>
					<p>Take your 2 minutes to review the plugin and spread the love to encourage us to keep it going.</p>
					<a href="#" class="frhd-plugs-card-action"></a>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plugs-card-inner">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 11C10.2091 11 12 9.20914 12 7C12 4.79086 10.2091 3 8 3C5.79086 3 4 4.79086 4 7C4 9.20914 5.79086 11 8 11ZM8 9C9.10457 9 10 8.10457 10 7C10 5.89543 9.10457 5 8 5C6.89543 5 6 5.89543 6 7C6 8.10457 6.89543 9 8 9Z" fill="currentColor"/><path d="M11 14C11.5523 14 12 14.4477 12 15V21H14V15C14 13.3431 12.6569 12 11 12H5C3.34315 12 2 13.3431 2 15V21H4V15C4 14.4477 4.44772 14 5 14H11Z" fill="currentColor"/><path d="M18 7H20V9H22V11H20V13H18V11H16V9H18V7Z" fill="currentColor"/></svg>
					<h4>Join the Community</h4>
					<p>Join the Facebook community and discuss with fellow developers & users.</p>
					<a href="#" class="frhd-plugs-card-action"></a>
				</div>
			</div>
		</div>
	</div>
	<h2 style="text-align: center;font-size: 28px;text-shadow: 2px 1px 3px #dac5ff;">🎈 Recommended Plugins</h2>
	<div class="frhd-recommend-plugs">
		<div class="frhd-plugs-container">
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( FPPB_URL . 'admin/img/hfc-logo.png' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>HFC - Header Footer Customizer</h4>
						<p class="frhd-plug-deta-text">The most beginner-friendly drag-and-drop WordPress Header & Footer builder. Make attractive mega menu and  Customize your header and footer with Gutenberg, add custom CSS, and scripts effortlessly.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'header-footer-customizer/header-footer-customizer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="#" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( FPPB_URL . 'admin/img/post-block-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FancyPost - Post Block</h4>
						<p class="frhd-plug-deta-text">Upgrade your WordPress site with customizable post blocks.  Easily customize layouts and styles to create visually stunning content. No coding skills needed—just install and start customizing.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'post-block/post-block.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=fancypost&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( FPPB_URL . 'admin/img/editorial-rating-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>Editorial Rating</h4>
						<p class="frhd-plug-deta-text">Add ratings and reviews to your posts easily. Boost user engagement with clear, customizable rating systems. Perfect for improving the credibility of your content and boost your new sales.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'editorial-rating/editorial-rating.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=editorial%2520rating%2520by%2520pluginic&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( FPPB_URL . 'admin/img/faqs-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FAQ Schema Ultimate</h4>
						<p class="frhd-plug-deta-text">Improve SEO and user experience with structured FAQ schema. Easily create and manage FAQs with responsive accordion, tab, and slider layouts. Make your FAQs more visible and engaging for users​.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'faq-schema-ultimate/faq-schema-ultimate.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=faq%2520schema%2520by%2520pluginic&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( FPPB_URL . 'admin/img/ytvgp-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FancyTube – Video Gallery</h4>
						<p class="frhd-plug-deta-text">Showcase your videos with beautiful galleries and playlists. Import videos seamlessly using the YouTube data API. Create fully responsive and lightweight video galleries, sliders, and popups to engage your audience effectively​.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'video-gallery-playlist/video-gallery-playlist.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=FancyTube&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
			<div class="frhd-plugs-card">
				<div class="frhd-plug-details">
					<div class="frhd-plug-img">
						<img src="<?php echo esc_url( FPPB_URL . 'admin/img/fancy-product-icon-128x128.gif' ); ?>">
					</div>
					<div class="frhd-plug-body">
						<h4>FancyProduct – Product View</h4>
						<p class="frhd-plug-deta-text">Display your products in stunning sliders and carousels. Increase sales by showcasing your products in an interactive and engaging format. Boost conversions with visually appealing product displays that attract and captivate your audience.</p>
					</div>
				</div>
				<div class="frhd-plug-status">
					<?php
					if ( in_array( 'video-gallery-playlist/video-gallery-playlist.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						
						echo '<strong>Status: <span style="color: green;">Active</span></strong>
						<a href="#" class="button button-primary button-disabled">Install Plugin</a>';
					} else {

						echo '<strong>Status: <span>Not Installed</span></strong>
						<a href="' . get_admin_url() . 'plugin-install.php?s=fancyproduct&tab=search&type=term" target="_blank" class="button button-primary">Install Plugin</a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
